<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/init.php';

use App\Core\Router;


// Initialisation du routeur
$router = new Router();


$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Dispatch pour traiter la requête
$router->dispatch($requestUri, $requestMethod);