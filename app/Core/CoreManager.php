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

        set_time_limit(ConfigManager::get("SITE.site_timeout.value"));

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

        

        // Remplace les caractères accentués (fallback si Intl n'est pas dispo)
        $text = strtr($text, [
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'ý' => 'y', 'ÿ' => 'y',
            'ç' => 'c', 'ñ' => 'n',
            'œ' => 'oe', 'æ' => 'ae', 'ß' => 'ss', 'ð' => 'd', 'ø' => 'o', 'þ' => 'th',
            'ª' => 'a', 'º' => 'o', '&' => 'et'
        ]);

        // Remplace tout ce qui n'est pas alphanumérique ou un tiret par un tiret
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);

        // Remplace les tirets consécutifs
        $text = preg_replace('/-+/', '-', $text);

        // Supprime les tirets en trop (au début ou à la fin)
        $text = trim($text, '-');

        return $text ?: 'n-a';
    }

    public static function verif($param_Data)
    {
        return ((isset($_POST[$param_Data]) && is_numeric($_POST[$param_Data]) && $_POST[$param_Data] > 0) ? (int)$_POST[$param_Data] : 0);
    }

    public static function generateRandomString($size)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for($i = 0; $i < $size; $i++)
        {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function ShowLogs($param_Message)
    {
        echo '
            <div class="row">
                <div class="col-md-6 mt-5 offset-3">
                    <div class="text-center p-5 shadow-lg rounded bg-white" 
                         style="box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);  animation: fadeIn 1s;">
                        <h1 class="display-1 text-danger mb-4 animate__animated animate__shakeX">
                            <i class="fa fa-exclamation-triangle"></i>
                        </h1>
                        <h2 class="display-5 fw-bold text-dark mb-3">Oups, une erreur est survenue !</h2>
                        <p class="lead text-muted mb-4">
                            Nous avons rencontré un problème en traitant votre requête.
                        </p>
                        <p class="text-danger fw-bold fs-5 mb-3">
                            Code d\'erreur : <strong> ' . $param_Message . '</strong>
                        </p>
                    </div>
                </div>
            </div>
        ';
    }
}