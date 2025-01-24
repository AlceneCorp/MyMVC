<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

use App\Core\CoreManager;
use App\Core\Routes;
use App\Core\SessionsManager;

use App\Managers\LogsManager;
use App\Managers\VisitorManager;
use App\Managers\MenuManager;

class Router
{
    private $routes;

    private $logsManager;
    private $visitorManager;


   public function __construct()
    {
        $this->routes = new Routes();
        $this->logsManager = new LogsManager();
        $this->visitorManager = new VisitorManager();

        $routesArray = require __DIR__ . '\\..\\..\\config\\routes.php';

        //var_dump(ConfigManager::get('modules'));

        foreach ($routesArray as $route) 
        {
            $this->routes->add($route['name'], $route['url'], $route['controller'], $route['method'], $route['params'], $route['perm'], $route['inMenu']);

            // Vérification des enfants
            if (!empty($route['children'])) 
            {
                $this->addChildRoutes($route['children']);
            }
        }

        $pathViews = [];

        if(ConfigManager::get('modules'))
        {
            //var_dump(ConfigManager::get('modules'));

            foreach(ConfigManager::get('modules') as $key => $module)
            {
                //var_dump(ConfigManager::get('modules.' . $key . '.active.value'));
                if(ConfigManager::get('modules.' . $key . '.active.value'))
                {
                    $moduleRoute = require __DIR__ . '\\..\\Modules\\' . $key . '\\config\\routes.php';
                    $routesArray = array_merge($routesArray, $moduleRoute);
                    $pathViews[] = __DIR__ . '\\..\\Modules\\' . $key . '\\Views';
                    foreach($moduleRoute as $route)
                    {
                        $this->routes->add($route['name'], $route['url'], $route['controller'], $route['method'], $route['params'], $route['perm'], $route['inMenu']);

                        // Vérification des enfants
                        if (!empty($route['children'])) 
                        {
                            $this->addChildRoutes($route['children']);
                        }
                    }
                }  
            }
        }

        $pathViews[] = __DIR__ . '/../Views/';

        CoreManager::initTwig($pathViews);
        

        CoreManager::getTwig()->addExtension(new \Twig\Extension\DebugExtension());
        CoreManager::getTwig()->addGlobal('base_url', $this->getBaseUrl());
        CoreManager::getTwig()->addGlobal('is_login', SessionsManager::get('USERS') ?? null);

        // Génération du menu à partir des routes
        $menuGenerate = $this->generateMenu($routesArray);

        CoreManager::getTwig()->addGlobal('menu', $menuGenerate);

        // Ajouter la fonction asset
        CoreManager::getTwig()->addFunction(new TwigFunction('asset', fn($path) => '/assets/' . ltrim($path, '/')));

        CoreManager::getTwig()->addFunction(new TwigFunction('checkPerm', fn($param1) => CoreManager::checkPerm($param1)));

        CoreManager::getTwig()->addFunction(new TwigFunction('config', function (...$params) 
        {
            // Concaténer tous les paramètres en une seule chaîne
            $key = implode('', $params);
            return ConfigManager::get($key);
        }));

        CoreManager::getTwig()->addFunction(new TwigFunction('encrypt', fn($data) => CoreManager::encrypt($data)));
        CoreManager::getTwig()->addFunction(new TwigFunction('decrypt', fn($data) => CoreManager::decrypt($data)));
    }

    /**
     * Génère le menu HTML à partir des routes.
     *
     * @param array $routes
     * @return string
     */
    private function generateMenu(array $routes): string
    {
        $menuGenerate = '';

        foreach ($routes as $route) 
        {
            if (!empty($route['perm']) && CoreManager::checkPerm($route['perm'])) 
            {
                continue;
            }

            $menuGenerate .= '<li class="nav-item">';
        
            if (!empty($route['children'])) 
            {
                if($route['inMenu'])
                {
                    $menuGenerate .= '<div class="dropend">';
                    // Menu déroulant
                    $menuGenerate .= '<a class="nav-link text-white me-4" href="#" id="' . $route['name'] . '" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                    $menuGenerate .= $route['icon'] . ' ' . $route['name'];
                    $menuGenerate .= '</a>';
                    $menuGenerate .= '<ul class="dropdown-menu bg-dark text-white" aria-labelledby="' . $route['name'] . '">';
            
                    foreach ($route['children'] as $child) 
                    {
                        if (CoreManager::checkPerm($child['perm'])) 
                        {
                            $menuGenerate .= '<li><a class="dropdown-item text-white p-4" href="' . $child['url'] . '">' . $child['icon'] . ' ' . $child['name'] . '</a></li>';
                        }
                    }

                    $menuGenerate .= '</ul>';
                    $menuGenerate .= '</div>';

                }
            } 
            else 
            {
                if($route['inMenu'] && CoreManager::checkPerm($route['perm']))
                {
                    $menuGenerate .= '<div class="dropend">';
                    // Lien simple
                    $menuGenerate .= '<a class="nav-link text-white me-4" href="' . $route['url'] . '">' . $route['icon'] . ' ' . $route['name'] . '</a>';
                    $menuGenerate .= '</div>';
                }
            }

            $menuGenerate .= '</li>';
        }

        return $menuGenerate;
    }

    /**
     * Fonction récursive pour ajouter les routes enfants.
     *
     * @param array $children
     * @return void
     */
    private function addChildRoutes(array $children)
    {
        foreach ($children as $child) 
        {
            $this->routes->add($child['name'], $child['url'], $child['controller'], $child['method'], $child['params'], $child['perm']);
    
            if (!empty($child['children'])) 
            {
                $this->addChildRoutes($child['children']); // Appel récursif pour les enfants
            }
        }
    }


    function getBaseUrl() 
    {
        // Détecter le protocole (HTTP ou HTTPS)
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

        // Hôte (nom de domaine ou IP)
        $host = $_SERVER['HTTP_HOST'];

        // Chemin vers le dossier racine de l'application
        $projectPath = dirname($_SERVER['SCRIPT_NAME']);
    
        // Construire l'URL de base
        return rtrim("$protocol://$host$projectPath", '/');
    }

    /**
     * Gère une requête entrante.
     * 
     * @param string $requestUri URI de la requête.
     * @param string $requestMethod Méthode HTTP.
     */
    public function dispatch(string $requestUri, string $requestMethod)
    {
        // Trouver la route correspondante
        $route = $this->routes->find($requestUri);

        // Récupérer l'ID de l'utilisateur si connecté
        $user_id = SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0;

        // Logs pour la requête initiale
        if(ConfigManager::get("SITE.debug.value"))
        {
            CoreManager::addLogs('DEBUG', 'APPLICATION', $requestUri);
        }
            
        if ($route) 
        {
            $controllerName = $route['controller'];
            $methodName = $route['method'];
            $params = $route['params'];
            $perm = $route['perm'];

            // Vérifier si le contrôleur existe
            if (class_exists($controllerName) && method_exists($controllerName, $methodName)) 
            {
                $controller = new $controllerName(CoreManager::getTwig());

                if(ConfigManager::get("SECURITY.maintenance_mode.value") && !CoreManager::checkPerm('perform_maintenance'))
                {
                    $controller->render('maintenance/maintenance.twig');
                }

                if(CoreManager::checkPerm($perm))
                {
                    call_user_func_array([$controller, $methodName], $params);

                    if(ConfigManager::get("SITE.log_visitor.value"))
                    {
                        $this->visitorManager->addVisitor(['VISIT_DATE' => date('Y-m-d'), 'PAGE_VISITED' => (str_replace('/MyMVC/', '', $requestUri) ? str_replace('/MyMVC/', '', $requestUri) : 'accueil'), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR']]);
                    }

                    if(ConfigManager::get("SITE.debug.value"))
                    {
                        CoreManager::addLogs('DEBUG', 'APPLICATION', $controllerName . '::' . $methodName . '(' . json_encode($params) . ')');
                    }
                }
                else
                {
                    if(SessionsManager::has('USERS'))
                    {
                        $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(403), 'error_code' => 403]);
                    }
                    else
                    {
                        $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(401), 'error_code' => 401]);
                    }
                }

                return;
            }

            // Contrôleur ou méthode introuvable
            $controller = new Controller(CoreManager::getTwig());
            $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(500), 'error_code' => 500]);
            http_response_code(500);

            CoreManager::addLogs('ERROR', 'APPLICATION', 'Controller ou méthode introuvable pour ' . $controllerName . '::' . $methodName);
        } 
        else 
        {
            CoreManager::addLogs('ERROR', 'APPLICATION', 'Route non trouvée pour ' . $requestUri);

            // Route non trouvée
            $controller = new Controller(CoreManager::getTwig());
            $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(404), 'error_code' => 404]);
            http_response_code(404);
        }
    }
}
