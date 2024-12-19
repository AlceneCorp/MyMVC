<?php

use App\Core\ConfigManager;
use App\Core\DatabaseManager;
use App\Core\TablesGenerator;
use App\Core\SessionsManager;

use App\Managers\LogsManager;


error_reporting(E_ALL);
ini_set('display_errors', 1);

SessionsManager::startSession();

$fileSetting = include 'config.php';
ConfigManager::init($fileSetting);

$logsManager = new LogsManager();


// Détecter le protocole (HTTP ou HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Hôte (nom de domaine ou IP)
$host = $_SERVER['HTTP_HOST'];

// Chemin vers le dossier racine de l'application
$projectPath = dirname($_SERVER['SCRIPT_NAME']);

define("URL", rtrim("$protocol://$host$projectPath", '/'));
define("BASE_URL", rtrim("$protocol://$host", '/'));


//var_dump(ConfigManager::getAll());
if(ConfigManager::get("SITE.debug.value"))
{
    $tablegen = new TablesGenerator();
    $tablegen->generateAll();

    $logsManager->addLogs(['LEVEL' => 'DEBUG', 'CATEGORY' => 'SYSTEM', 'MESSAGE' => 'Les fichiers App\\Models et App\\Managers ont été générés et synchronisés avec le site.', 'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $_SERVER['REQUEST_METHOD'], 'URI' => BASE_URL . $_SERVER['REQUEST_URI']]);
}

