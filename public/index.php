<?php

require_once '../vendor/autoload.php';
require_once '../config/init.php';

use App\Core\Router;
use App\Core\Routes;

// Initialisation des routes
$routes = new Routes();
$routes->add('/admin/logs/{page}', \App\Controllers\AdminController::class, 'logs');

// Initialisation du routeur
$router = new Router($routes);

// Simuler une requête entrante
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Dispatch pour traiter la requête
$router->dispatch($requestUri, $requestMethod);