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

    protected $twig;

    private $logsManager;
    private $visitorManager;

    public function __construct()
    {
        $this->routes = new Routes();
        $this->logsManager = new LogsManager();
        $this->visitorManager = new VisitorManager();

        $routesArray = require __dir__ . '\\..\\..\\config\\routes.php';

        foreach($routesArray as $route)
        {
            $this->routes->add($route['url'], $route['controller'], $route['method'], $route['params'], $route['perm']);
        }

        $pathViews = __dir__ . '/../Views/';

        // Initialiser le chargeur Twig pour charger les templates à partir du répertoire des vues
        $loader = new FilesystemLoader($pathViews);
        $this->twig = new Environment($loader, [
            'debug' => ConfigManager::get("SITE.twig_debug.value"),            // Optionnel : activer le mode debug
        ]);
        
        $this->twig->addGlobal('base_url', $this->getBaseUrl());
        $this->twig->addGlobal('is_login', (SessionsManager::get('USERS') ? SessionsManager::get('USERS') : null));
        $this->twig->addGlobal('logo', (ConfigManager::get('SITE.site_logo.value') ? ConfigManager::get('SITE.site_logo.value') : null));
        $this->twig->addGlobal('color_1', ConfigManager::get('SITE.site_color_1.value'));
        $this->twig->addGlobal('color_2', ConfigManager::get('SITE.site_color_2.value'));
        

        $menuManager = new MenuManager();
        $menuGenerate = "";
        try
        {
            foreach($menuManager->findAllMenu(['IS_ACTIVE' => 1], ['ORDER BY' => 'ORDERS ASC']) as $menu)
            {
                if($menu->getPERMISSIONS_ID() === null)
                {
                    $menuGenerate .= '<li class="nav-item">';
                    $menuGenerate .= '<a href="'. $this->getBaseUrl() . $menu->getURL() . '" class="nav-link text-white">'.$menu->getTITLE().'</a>';
                    $menuGenerate .= '</li>';
                }
                else
                {
                    if(SessionsManager::has('USERS'))
                    {
                        $route = $this->routes->find($_SERVER['REQUEST_URI']);
                        if($route)
                        {
                            if(CoreManager::checkPerm($_SERVER['REQUEST_URI'], $route['perm']))
                            {
                                $menuGenerate .= '<li class="nav-item">';
                                $menuGenerate .= '<a href="'. $this->getBaseUrl() . $menu->getURL() . '" class="nav-link text-white">'.$menu->getTITLE().'</a>';
                                $menuGenerate .= '</li>';
                            }
                        }
                    }
                }
            }
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }



        $this->twig->addGlobal('menu', $menuGenerate);

        // Ajouter la fonction asset
        $this->twig->addFunction(new TwigFunction('asset', function ($path) 
        {
            return '/assets/' . ltrim($path, '/');
        }));
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
            if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                $controller = new $controllerName($this->twig);

                if(ConfigManager::get("SECURITY.maintenance_mode.value") && !CoreManager::checkPerm('', 'perform_maintenance'))
                {
                    $controller->render('maintenance/maintenance.twig');
                }

                if(CoreManager::checkPerm($requestUri, $perm))
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
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(500), 'error_code' => 500]);
            http_response_code(500);

            CoreManager::addLogs('ERROR', 'APPLICATION', 'Controller ou méthode introuvable pour ' . $controllerName . '::' . $methodName);
        } 
        else 
        {
            CoreManager::addLogs('ERROR', 'APPLICATION', 'Route non trouvée pour ' . $requestUri);

            // Route non trouvée
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => ErrorManager::getErrorMessage(404), 'error_code' => 404]);
            http_response_code(404);
        }
    }
}
