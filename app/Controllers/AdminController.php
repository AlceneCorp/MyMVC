<?php

namespace App\Controllers;

use App\Core\CoreManager;
use App\Core\Controller;
use App\Core\ConfigManager;
use App\Core\SessionsManager;
use App\Core\DatabaseManager;
use App\Core\ModulesManager;

use App\Managers\SettingsCategoriesManager;
use App\Managers\SettingsManager;
use App\Managers\LogsManager;
use App\Managers\UsersManager;
use App\Managers\UsersProfileManager;
use App\Managers\PermissionsManager;
use App\Managers\UsersPermissionsManager;


class AdminController extends Controller
{

	protected function isAjax(): bool
	{
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
			   strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
	}
	
	public function dashboard()
	{
		$usersManager = new UsersManager();
		$logsManager = new LogsManager();
		$dataBaseManager = new DatabaseManager();

		// Récupération de l'OS
		$os = PHP_OS;

		// Variables par défaut
		$activeQueries = [];
		$openFiles = 0;
		$mysqlVersion = '';
		$apacheProcesses = 0;
		$uptime = 'Indisponible';




		
		if(ConfigManager::get('SITE.show_informations_details.value'))
		{
			// Vérification de l'OS pour exécuter les commandes spécifiques
			if (stripos($os, 'WIN') !== false) 
			{
				// Windows : Commandes spécifiques à Windows
				$activeQueries = $dataBaseManager->rawQuery("SHOW PROCESSLIST");

				$openFiles = 0;
				$mysqlVersion = $dataBaseManager->rawQuery("SELECT VERSION() AS version")[0]['version'];

				// Nombre de processus Apache actifs
				$apacheProcesses = shell_exec('tasklist /FI "IMAGENAME eq httpd.exe"');
				$apacheProcesses = substr_count($apacheProcesses, 'httpd.exe');

				// Temps écoulé depuis le dernier redémarrage (Windows)
				$uptime = shell_exec('powershell -ExecutionPolicy Bypass -NoProfile -Command "[Console]::OutputEncoding = [System.Text.Encoding]::UTF8; (Get-CimInstance Win32_OperatingSystem).LastBootUpTime | Get-Date -Format \'dddd d MMMM yyyy HH:mm:ss\'"');
				$uptime = $uptime ? trim($uptime) : 'Indisponible';

			} 
			else 
			{
				// Linux / Unix-like : Commandes spécifiques à Unix
				$activeQueries = $dataBaseManager->rawQuery("SHOW PROCESSLIST");
				$openFiles = shell_exec('lsof -u www-data | wc -l');
				$mysqlVersion = $dataBaseManager->rawQuery("SELECT VERSION() AS version")[0]['version'];

				// Nombre de processus Apache actifs (Linux)
				$apacheProcesses = shell_exec('ps -C apache2 --no-header | wc -l');

				// Temps écoulé depuis le dernier redémarrage (Linux)
				$uptime = shell_exec('uptime -p');
				$uptime = $uptime ? trim($uptime) : 'Indisponible';
			}

			// Rassembler l'état du serveur
			$status = [
				'mysql' => $dataBaseManager->isConnectionActive(),
				'php_version' => PHP_VERSION,
				'os' => $os,
				'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
				'server_ip' => gethostbyname(gethostname()),
				'max_execution_time' => ini_get('max_execution_time') . ' secondes',
				'upload_max_filesize' => ini_get('upload_max_filesize'),
				'post_max_size' => ini_get('post_max_size'),
				'response_time' => round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 2) . ' secondes',
				'mysql_active_queries' => count($activeQueries),
				'php_memory_usage' => round(memory_get_usage(true) / 1024 / 1024, 2) . ' MB',
				'open_files' => $openFiles ?? 0,
				'mysql_version' => $mysqlVersion,
				'apache_processes' => $apacheProcesses ?? 0,
				'server_uptime' => $uptime,
			];

		}
		else
		{
			$status = [];
		}

		// Rendu de la vue
		echo $this->render('admin/dashboard.twig', [
			'users_count' => $usersManager->countUsers(),
			'log_count' => $logsManager->countLogs(),
			'log_count_warning' => $logsManager->countLogs(['LEVEL' => 'WARNING']),
			'log_count_error' => $logsManager->countLogs(['LEVEL' => 'ERROR']),
			'log_count_critical' => $logsManager->countLogs(['LEVEL' => 'CRITICAL']),
			'log_recent_activity' => $logsManager->findAllLogs(['CATEGORY' => 'USERS'], ['LIMIT' => '10', 'ORDER BY' => 'ID DESC']),
			'server_status' => $status
		]);
	}

	public function users($page = 1)
	{
		$usersPerPages = ConfigManager::get('SECURITY.usersPerPages.value');
		$offset = ($page - 1) * $usersPerPages;

		if ($page < 1) 
		{
			$page = 1; // Redirige vers la première page si la page est inférieure à 1
		}

		$usersManager = new UsersManager();
		$users = $usersManager->findAllUsers([], ['ORDER BY' => 'ID ASC', 'LIMIT' => $usersPerPages, 'OFFSET' => $offset]);

		$totalUsers = $usersManager->countUsers();
		$totalPages = ceil($totalUsers / $usersPerPages);

		if ($page > $totalPages) {
			$page = $totalPages; // Rediriger vers la dernière page si la page demandée est trop grande
		}

		// Utiliser un tableau pour stocker les utilisateurs avec leurs permissions
		$usersWithPermissions = [];
		$usersPermissionsManager = new UsersPermissionsManager();
		$permissionsManager = new PermissionsManager();  // Utilisation de ton PermissionsManager existant

		foreach ($users as $user) 
		{
			// Récupérer les permissions de l'utilisateur depuis UsersPermissions
			$usersPermissions = $usersPermissionsManager->findAllUsersPermissions(['USERS_ID' => $user->getID()]);

			// Créer un tableau de permissions
			$permissions = [];
			
			// Si des permissions existent, les ajouter au tableau
			foreach ($usersPermissions as $userPermission) 
			{
				// Utiliser findAllPermissions pour récupérer toutes les permissions, puis extraire celle correspondant à l'ID
				$permissionsArray = $permissionsManager->findAllPermissions(['ID' => $userPermission->getPERMISSIONS_ID()]);
				if ($permissionsArray) 
				{
					// Si la permission existe, l'ajouter dans le tableau
					foreach ($permissionsArray as $permission) 
					{
						$permissions[] = $permission; // Ou tout autre attribut que tu souhaites
					}
				}
			}

			// Ajouter l'utilisateur et ses permissions dans le tableau final
			$usersWithPermissions[] = 
			[
				'user' => $user,
				'permissions' => $permissions
			];
		}


		// Rendre la vue avec les utilisateurs et leurs permissions
		$this->render('admin/users.twig', 
		[
			'usersWithPermissions' => $usersWithPermissions,  // Passer les utilisateurs avec leurs permissions à la vue
			'currentPage' => $page,
			'totalPages' => $totalPages
		]);
	}

	public function usersPermissions($user)
	{
		$usersManager = new UsersManager();
		$permissionsManager = new PermissionsManager();
		$usersPermissionsManager = new UsersPermissionsManager();


		if(isset($_POST['permissions']))
		{
			$permissions = $_POST['permissions'] ?? [];

			// Supprimer les anciennes permissions
			$usersPermissionsManager->deleteUsersPermissions(['USERS_ID' => $user]);

			// Ajouter les nouvelles permissions
			foreach ($permissions as $permissionId) 
			{
				$usersPermissionsManager->addUsersPermissions(['USERS_ID' => $user, 'PERMISSIONS_ID' => $permissionId]);
			}
		}

		// Récupérer tous les utilisateurs
		$users = $usersManager->findAllUsers(['ID' => $user]);

		// Récupérer toutes les permissions disponibles
		$allPermissions = $permissionsManager->findAllPermissions([], ['ORDER BY' => 'ORDERS ASC']);

		// Créer un tableau avec les permissions de chaque utilisateur
		$usersWithPermissions = [];
		foreach ($users as $user) 
		{
			// Récupérer les permissions de l'utilisateur
			$userPermissions = $usersPermissionsManager->findAllUsersPermissions(['USERS_ID' => $user->getID()]);
			$permissionsIds = array_map(function ($permission) 
			{
				return $permission->getPERMISSIONS_ID();
			}, $userPermissions);
			$usersWithPermissions[] = [
				'user' => $user,
				'permissionsIds' => $permissionsIds
			];
		}

		$this->render('admin/users_permissions.twig', [
			'usersWithPermissions' => $usersWithPermissions,
			'allPermissions' => $allPermissions
		]);
	}



	public function logs($page = 1)
	{
		$logsPerPage = ConfigManager::get('SECURITY.logsPerPage.value');
		$offset = ($page - 1) * $logsPerPage;

		// S'assurer que la page est valide
		if ($page < 1) 
		{
			$page = 1; // Redirige vers la première page si la page est inférieure à 1
		}

		$logsManager = new LogsManager();
		$usersManager = new UsersManager();

		// Récupérer les logs avec les paramètres de pagination
		$logs = $logsManager->findAllLogs([], ['ORDER BY' => 'ID DESC', 'LIMIT' => $logsPerPage, 'OFFSET' => $offset]);


		// Calculer le nombre total de logs
		$totalLogs = $logsManager->countLogs();
		$totalPages = ceil($totalLogs / $logsPerPage);

		// S'assurer que la page ne dépasse pas le nombre total de pages
		if ($page > $totalPages) {
			$page = $totalPages; // Rediriger vers la dernière page si la page demandée est trop grande
		}

		$users = $usersManager->findAllUsers();

		$usersArray = [];
		foreach ($users as $user) 
		{
			$usersArray[$user->getID()] = $user->getUSERNAME();
		}

		// Passer les données à la vue
		$this->render('admin/logs.twig', [
			'logs' => $logs,
			'users' => $usersArray,
			'currentPage' => $page,
			'totalPages' => $totalPages,
			'baseUrl' => URL
		]);
	}


	public function settings()
	{
		$settingsCategoriesManager = new SettingsCategoriesManager();
		$settingsManager = new SettingsManager();
		$logsManager = new LogsManager();


		if(isset($_POST['data']))
		{
			foreach($_POST['data'] as $category => $value)
			{
				foreach($_POST['data'][$category] as $key => $value)
				{
					if(ConfigManager::get($category.'.'.$key.'.value') != $value)
					{
						$settingsManager->updateSettings(['NAME' => $key, 'VALUE' => $value], $settingsManager->findOneSettings(['NAME' => $key])->getID());
						
						CoreManager::addLogs('SUCCESS', 'CONFIG', $category .'.' . $key . ' => ' . $value);

					}
				}
			}
		}

		$categories = $settingsCategoriesManager->findAllSettingsCategories([], ['ORDER BY' => 'ORDERS ASC']);
		$settings = $settingsManager->findAllSettings([], ['ORDER BY' => 'TYPE DESC, NAME ASC']);

		// On regroupe les paramètres par catégorie
		$grouped_settings = [];
		foreach ($settings as $setting) 
		{
			$grouped_settings[$setting->getSETTINGS_CATEGORIES_ID()][] = $setting;
		}

		// Passer les catégories et les paramètres au template
		$this->render('admin/settings.twig', [
			'settings_categories' => $categories,
			'grouped_settings' => $grouped_settings
		]);
	}

	public function blockUser($user_id)
	{
		$usersManager = new UsersManager();

		$usersManager->updateUsers(['STATUS' => 'banned'], $user_id);

		CoreManager::addLogs(
			'WARNING', 
			'USERS', 
			"L'utilisateur [ID: {$user_id}] a été banni par ". SessionsManager::get('USERS')->getUSERNAME() ."."
		);

		header('Location:' . URL . '/admin/users');
	}

	public function unBlockUser($user_id)
	{
		$usersManager = new UsersManager();

		$usersManager->updateUsers(['STATUS' => 'active'], $user_id);

		CoreManager::addLogs(
			'SUCCESS', 
			'USERS', 
			"L'utilisateur [ID: {$user_id}] a été débanni par ". SessionsManager::get('USERS')->getUSERNAME() ."."
		);

		header('Location:' . URL . '/admin/users');
	}

	public function viewUserProfil($user_id)
	{
		$usersManager = new UsersManager();
		$usersProfileManager = new UsersProfileManager();
		
		$this->render('admin/view_user.twig', [
            'user' => $usersManager->findOneUsers(['ID' => $user_id]),
            'profile' => $usersProfileManager->findOneUsersProfile(['USERS_ID' => $user_id]),
        ]);
	}

	public function mods()
	{

		if($_POST)
		{
			if(isset($_POST['module_name']) && isset($_POST['module_status']))
			{
				ModulesManager::setModuleActive($_POST['module_name'], $_POST['module_status']);
			}
		}

		$this->render('admin/modules.twig', [
			'modules' => ModulesManager::detectModules()
		]);
	}

	public function genImages()
	{


		$prompt = $_POST['prompt'] ?? '';
		$negative = $_POST['negative_prompt'] ?? '';

		if (empty(trim($prompt))) {
			// Prompt vide
			if ($this->isAjax()) {
				echo $this->twig->render('admin/include/error.twig', ['error' => 'Le prompt ne peut pas être vide.']);
				exit;
			} else {
				$this->render('admin/genImages.twig', [
					'error' => 'Le prompt ne peut pas être vide.',
					'prompt' => $prompt,
					'negative_prompt' => $negative,
				]);
				exit;
			}
		}

		$api_url = "http://" . ConfigManager::get('API.sd_ip.value') . ":" . ConfigManager::get('API.sd_port.value') . "/sdapi/v1/txt2img";
		$data = [
			'prompt' => $prompt,
			'negative_prompt' => $negative . " ugly, blurry, bad anatomy, extra limbs, disfigured, deformed, duplicate, low quality, lowres, bad hands, bad proportions, watermark, signature, open clothes, bad hands, wrong anatomy, missing fingers, extra fingers, blurry, deformed, poorly drawn hands, poorly drawn face, poorly drawn body, disfigured, mutated hands",
			'steps' => ConfigManager::get('API.sd_step.value'),
			'width' => ConfigManager::get('API.sd_width.value'),
			'height' => ConfigManager::get('API.sd_height.value'),
			'cfg_scale' => ConfigManager::get('API.sd_scale.value'),
			'sampler_name' => 'Heun',
			'scheduler' => 'Karras',
		];

		$options = [
			'http' => [
				'header'  => "Content-type: application/json",
				'method'  => 'POST',
				'content' => json_encode($data),
				'timeout' => 6000, // optionnel : timeout en secondes
			]
		];

		$context  = stream_context_create($options);
		$response = @file_get_contents($api_url, false, $context);

		if ($response === false) {
			$errorMessage = 'Erreur de connexion à l\'API Stable Diffusion.';
			if ($this->isAjax()) {
				echo $this->twig->render('admin/include/error.twig', ['error' => $errorMessage]);
				exit;
			} else {
				$this->render('admin/genImages.twig', [
					'error' => $errorMessage,
					'prompt' => $prompt,
					'negative_prompt' => $negative,
				]);
				exit;
			}
		}

		$json = json_decode($response, true);
		if (!isset($json['images'][0])) 
		{
			$errorMessage = 'Aucune image générée par l\'API.';
			if ($this->isAjax()) 
			{
				echo $this->twig->render('admin/include/error.twig', ['error' => $errorMessage]);
				exit;
			}
			else 
			{
				$this->render('admin/genImages.twig', [
					'error' => $errorMessage,
					'prompt' => $prompt,
					'negative_prompt' => $negative,
				]);
				exit;
			}
		}

		if(ConfigManager::get("SITE.debug.value"))
        {
            CoreManager::addLogs('DEBUG', 'APPLICATION', "Génération d'images :\n\rPrompt : " . $prompt);
        }

		$base64Image = $json['images'][0];

		// Enregistre localement l'image (optionnel, peut être utile pour url statique)
		$imageData = base64_decode($base64Image);
		$uploadDir = __DIR__ . '/../../public/uploads/';
		if (!is_dir($uploadDir)) 
		{
			mkdir($uploadDir, 0755, true);
		}
		$filename = 'generated_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.png';
		$filepath = $uploadDir . $filename;
		file_put_contents($filepath, $imageData);
		$imageUrl = '/uploads/' . $filename;

		// Réponse Ajax : uniquement l’image encodée en base64 (pour éviter une requête supplémentaire)
		if ($this->isAjax()) 
		{
			echo $this->twig->render('admin/include/image.twig', ['image' => $base64Image]);
			exit;
		}

		// Requête normale (non-AJAX) — afficher la page complète
		$this->render('admin/genImages.twig', [
			'image' => $base64Image,
			'imageUrl' => $imageUrl,
			'prompt' => $prompt,
			'negative_prompt' => $negative,
		]);
	}

}