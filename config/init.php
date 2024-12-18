<?php

use App\Core\ConfigManager;
use App\Core\DatabaseManager;
use App\Core\TablesGenerator;

use App\Core\SessionsManager;

error_reporting(E_ALL);
ini_set('display_errors', 1);

SessionsManager::startSession();

$fileSetting = include 'config.php';
ConfigManager::init($fileSetting);


// Détecter le protocole (HTTP ou HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Hôte (nom de domaine ou IP)
$host = $_SERVER['HTTP_HOST'];

// Chemin vers le dossier racine de l'application
$projectPath = dirname($_SERVER['SCRIPT_NAME']);

define("URL", rtrim("$protocol://$host$projectPath", '/'));


//var_dump(ConfigManager::getAll());
if(ConfigManager::get("SITE.debug.value"))
{
    $tablegen = new TablesGenerator();
    $tablegen->generateAll();
}

