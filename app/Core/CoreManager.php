<?php

namespace App\Core;

use App\Managers\LogsManager;
use App\Core\SessionsManager;
use App\Core\ConfigManager;
use App\Core\DatabaseManager;
use App\Core\TablesGenerator;

class CoreManager
{
	public static function addLogs($param_Level, $param_Category, $param_Message)
    {
	    $logManager = new LogsManager();

	    // Log de succès après l'exécution
        $logManager->addLogs([
            'LEVEL' => $param_Level, 
            'CATEGORY' => $param_Category, 
            'MESSAGE' => $param_Message,
            'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0),
            'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'],
            'METHOD' => $_SERVER['REQUEST_METHOD'],
            'URI' => BASE_URL . $_SERVER['REQUEST_URI']
        ]);
    }

    public static function init()
    {
        //Démarrage des sessions
        SessionsManager::startSession();

        //Récupération des Config
        $fileSetting = include __DIR__ . '/../../config/config.php';
        ConfigManager::init($fileSetting);


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
            // Environnement de développement
            error_reporting(E_ALL); // Signale toutes les erreurs, avertissements et notices
            ini_set('display_errors', 1); // Affiche les erreurs à l'écran
            ini_set('display_startup_errors', 1); // Affiche les erreurs lors du démarrage de PHP
            ini_set('log_errors', 1); // Active l'enregistrement des erreurs dans les logs
            ini_set('error_log', __DIR__ . '/logs/php_errors_dev.log'); // Chemin pour les logs d'erreur


            $tablegen = new TablesGenerator();
            $tablegen->generateAll();

            CoreManager::addLogs('DEBUG', 'SYSTEM', 'Les fichiers App\\Models et App\\Managers ont été générés et synchronisés avec le site.');
        }
        else
        {
            // Environnement de production
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT); // Ignore les erreurs mineures
            ini_set('display_errors', 0); // Ne pas afficher les erreurs à l'écran
            ini_set('display_startup_errors', 0); // Masquer les erreurs de démarrage
            ini_set('log_errors', 1); // Enregistrer les erreurs dans un fichier de log
            ini_set('error_log', __DIR__ . '/logs/php_errors_prod.log'); // Chemin pour les logs d'erreur
        }
    }
}