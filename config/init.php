<?php

use App\Core\ConfigManager;
use App\Core\DatabaseManager;
use App\Core\TablesGenerator;

use App\Managers\SettingsManager;
use App\Managers\SettingsCategoriesManager;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$fileSetting = include 'config.php';
ConfigManager::init($fileSetting);

$settingsCategoriesManager = new SettingsCategoriesManager();
$settingsManager = new SettingsManager();
$configManager = new ConfigManager();

// Détecter le protocole (HTTP ou HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Hôte (nom de domaine ou IP)
$host = $_SERVER['HTTP_HOST'];

// Chemin vers le dossier racine de l'application
$projectPath = dirname($_SERVER['SCRIPT_NAME']);

define("URL", rtrim("$protocol://$host$projectPath", '/'));

foreach ($settingsCategoriesManager->findAllSettingsCategories() as $settingscategorie) 
{
    $categoryName = $settingscategorie->getNAME();
    $arraySettings = [];

    // Initialiser la catégorie si elle n'existe pas déjà dans ConfigManager
    if (!ConfigManager::exists($categoryName)) 
    {
        ConfigManager::set($categoryName, []);
    }

    // Boucle pour ajouter les paramètres dans la catégorie
    foreach ($settingsManager->findAllSettings(['AUTOLOAD' => 1]) as $setting) 
    {
        $settingKey = $setting->getNAME();
        $settingValue = $setting->getVALUE();

        // Vérifier si la clé existe déjà dans la catégorie, pour éviter de l'écraser
        $existingCategory = ConfigManager::get($categoryName);

        // Ajouter ou mettre à jour le paramètre dans la catégorie
        $existingCategory[$settingKey] = [
            'value' => $settingValue,
            'type' => $setting->getTYPE(),
            'description' => $setting->getDESCRIPTION(),
            'readonly' => false
        ];

        // Enregistrer à nouveau la catégorie avec les paramètres mis à jour
        ConfigManager::set($categoryName, $existingCategory);
    }
}

//var_dump(ConfigManager::getAll());
if(ConfigManager::get("SITE.debug.value"))
{
    $tablegen = new TablesGenerator();
    $tablegen->generateAll();
}

