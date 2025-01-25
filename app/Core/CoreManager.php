<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

use App\Core\SessionsManager;
use App\Core\ConfigManager;
use App\Core\DatabaseManager;
use App\Core\TablesGenerator;
use App\Core\ErrorManager;

use App\Managers\LogsManager;
use App\Managers\UsersManager;
use App\Managers\PermissionsManager;
use App\Managers\UsersPermissionsManager;

class CoreManager
{
    private static $twig;

    public static function initTwig(array $pathViews)
    {
        $loader = new FilesystemLoader($pathViews);
        self::$twig = new Environment($loader, [
            'debug' => ConfigManager::get("SITE.twig_debug.value"),      
            'cache' => false
        ]);
    }

    public static function getTwig()
    {
        return self::$twig;
    }

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

        error_log($param_Category . " | " . $param_Level . " | " . $param_Message);
    }

    public static function init()
    {
        //Démarrage des sessions
        SessionsManager::startSession();

        //Récupération des Config du site
        $fileSetting = include __DIR__ . '/../../config/config.php';
        ConfigManager::init($fileSetting);

        // Charger les configurations des modules
        self::loadModuleConfigs();

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
            ini_set('error_log', __DIR__ . '/../../logs/php_errors_dev.log'); // Chemin pour les logs d'erreur

            $tablegen = new TablesGenerator();
            $tablegen->generateAll();

            CoreManager::addLogs('DEBUG', 'SYSTEM', ErrorManager::getErrorMessage(20000));
        }
        else
        {
            // Environnement de production
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT); // Ignore les erreurs mineures
            ini_set('display_errors', 0); // Ne pas afficher les erreurs à l'écran
            ini_set('display_startup_errors', 0); // Masquer les erreurs de démarrage
            ini_set('log_errors', 1); // Enregistrer les erreurs dans un fichier de log
            ini_set('error_log', __DIR__ . '/../../logs/php_errors_prod.log'); // Chemin pour les logs d'erreur
        }
    }

    private static function loadModuleConfigs(): void
    {
        // Chemin vers le dossier des modules
        $modulesDir = __DIR__ . '/../../app/Modules';
        $modulesConfig = [];

        // Parcours de chaque module
        foreach (glob($modulesDir . '/*', GLOB_ONLYDIR) as $moduleDir) 
        {
            $moduleName = basename($moduleDir);
            $moduleConfigFile = $moduleDir . '/config/config.php';

            // Si le fichier de configuration du module existe, on l'inclut
            if (file_exists($moduleConfigFile)) {
                $moduleConfig = include $moduleConfigFile;

                // Ajouter la configuration du module au tableau global des configurations
                $modulesConfig = array_merge($modulesConfig, $moduleConfig);
            }


            // Ajouter les configurations des modules à la configuration globale
            if (!empty($modulesConfig)) 
            {
                ConfigManager::set('modules', $modulesConfig);
            }
        }
    }

    public static function checkPerm($param_Perm)
	{
        $retour = false;
		try
		{
			if(!empty($param_Perm))
			{
				if(SessionsManager::has('USERS'))
				{
					$userManager = new UsersManager();
					$permissionManager = new PermissionsManager();
					$usersPermissionManager = new UsersPermissionsManager();

					$permission = $permissionManager->findOnePermissions(['NAME' => $param_Perm]);


					if($permission)
					{
						$usersPerm = $usersPermissionManager->findOneUsersPermissions(['USERS_ID' => SessionsManager::get('USERS')->getID(), 'PERMISSIONS_ID' => $permission->getID()]);

						if($usersPerm)
						{
							$retour =  true;
						}
					}
				}
			}
			else
			{
				$retour =  true;
			}
		}
		catch (\Exception $e)
		{
            throw new \Exception(ErrorManager::getErrorMessage(50000));
		}
        return $retour;
	}

    public static function encrypt($param_Data)
	{
		$Data = $param_Data;
		$Cypher = ConfigManager::get('SECURITY.encryption_cypher.value');
        $Key = ConfigManager::get('SECURITY.encryption_key.value');

		$iv_Length = openssl_cipher_iv_length($Cypher);
		$Option = 0;
		
		$Encryption_iv = '1234567891011121';
		
		
		return openssl_encrypt($Data, $Cypher, $Key, $Option, $Encryption_iv);
	}

    public static function Decrypt($param_Data)
	{
		$Data = $param_Data;
		$Cypher = ConfigManager::get('SECURITY.encryption_cypher.value');
        $Key = ConfigManager::get('SECURITY.encryption_key.value');

		$iv_Length = openssl_cipher_iv_length($Cypher);
		$Option = 0;
		
		$Decryption_iv = '1234567891011121';
		
		
		return openssl_decrypt($Data, $Cypher, $Key, $Option, $Decryption_iv);
	}

    public static function slug(string $text): string
    {
        // Convertit en minuscules
        $text = mb_strtolower($text, 'UTF-8');

        // Remplace les caractères accentués
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);

        // Supprime tout ce qui n'est pas alphanumérique ou un tiret
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);

        // Supprime les tirets en trop (au début ou à la fin)
        $text = trim($text, '-');

        // Retourne le slug
        return $text ?: 'n-a';
    }
}