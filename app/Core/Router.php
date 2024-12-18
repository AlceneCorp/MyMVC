<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

use App\Core\Routes;
use App\Core\SessionsManager;

use App\Managers\LogsManager;

class Router
{
    private $routes;

    protected $twig;

    private $logsManager;

    public function __construct()
    {
        $this->routes = new Routes();
        $this->logsManager = new LogsManager();

        $routesArray = require __dir__ . '\\..\\..\\config\\routes.php';

        foreach($routesArray as $route)
        {
            $this->routes->add($route['url'], $route['controller'], $route['method'], $route['params']);
        }

        $pathViews = __dir__ . '/../Views/';

        // Initialiser le chargeur Twig pour charger les templates à partir du répertoire des vues
        $loader = new FilesystemLoader($pathViews); // Remplacez 'path/to/templates' par le répertoire de vos templates Twig
        $this->twig = new Environment($loader, [
            'debug' => false,            // Optionnel : activer le mode debug
        ]);

        $this->twig->addGlobal('base_url', $this->getBaseUrl());

        // Ajouter la fonction asset
        $this->twig->addFunction(new TwigFunction('asset', function ($path) {
            return '/assets/' . ltrim($path, '/');
        }));
    }

    function getBaseUrl() {
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
        $this->logsManager->addLogs(['LEVEL' => 'INFO', 'CATEGORY' => 'APPLICATION', 'MESSAGE' => 'Requête reçue pour ' . $requestUri . ' avec la méthode ' . $requestMethod, 'USERS_ID' => $user_id, 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $requestMethod, 'URI' => BASE_URL . $requestUri]);

        if ($route) 
        {
            $controllerName = $route['controller'];
            $methodName = $route['method'];
            $params = $route['params'];

            // Vérifier si le contrôleur existe
            if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                $controller = new $controllerName($this->twig);
                call_user_func_array([$controller, $methodName], $params);

                // Log de succès après l'exécution
                $this->logsManager->addLogs([
                    'LEVEL' => 'SUCCESS', 
                    'CATEGORY' => 'APPLICATION', 
                    'MESSAGE' => $controllerName . '::' . $methodName . '(' . json_encode($params) . ')',
                    'USERS_ID' => $user_id,
                    'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'],
                    'METHOD' => $requestMethod,
                    'URI' => BASE_URL . $requestUri
                ]);

                return;
            }

            // Contrôleur ou méthode introuvable
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => 'Erreur interne.', 'error_code' => 500]);
            http_response_code(500);

            // Log d'erreur pour contrôleur/méthode introuvable
            $this->logsManager->addLogs([
                'LEVEL' => 'ERROR', 
                'CATEGORY' => 'APPLICATION', 
                'MESSAGE' => 'Controller ou méthode introuvable pour ' . $controllerName . '::' . $methodName,
                'USERS_ID' => $user_id,
                'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'],
                'METHOD' => $requestMethod,
                'URI' => BASE_URL . $requestUri
            ]);
        } 
        else 
        {
            // Log d'erreur pour route non trouvée
            $this->logsManager->addLogs([
                'LEVEL' => 'WARNING', 
                'CATEGORY' => 'APPLICATION', 
                'MESSAGE' => 'Route non trouvée pour ' . $requestUri,
                'USERS_ID' => $user_id,
                'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'],
                'METHOD' => $requestMethod,
                'URI' => BASE_URL . $requestUri
            ]);

            // Route non trouvée
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => 'Page non trouvée.', 'error_code' => 404]);
            http_response_code(404);
        }
    }

}
