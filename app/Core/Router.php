<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

use App\Core\Routes;

class Router
{
    private $routes;

    protected $twig;

    public function __construct()
    {
        $this->routes = new Routes();

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


        if ($route) 
        {
            $controllerName = $route['controller'];
            $methodName = $route['method'];
            $params = $route['params'];

            // Vérifier si le contrôleur existe
            if (class_exists($controllerName) && method_exists($controllerName, $methodName)) 
            {
                $controller = new $controllerName($this->twig);
                call_user_func_array([$controller, $methodName], $params);
                return;
            }

            // Contrôleur ou méthode introuvable
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => 'Erreur interne.', 'error_code' => 500]);
            http_response_code(500);
            echo "Controller or method not found.";
        } 
        else 
        {
            // Route non trouvée
            $controller = new Controller($this->twig);
            $controller->render('error/error.twig', ['error_message' => 'Page non trouvée.', 'error_code' => 404]);
            http_response_code(404);
        }
    }
}
