<?php

namespace App\Controllers;

use App\Core\CoreManager;
use App\Core\Controller;
use App\Core\ConfigManager;
use App\Core\SessionsManager;

use App\Managers\SettingsCategoriesManager;
use App\Managers\SettingsManager;
use App\Managers\LogsManager;
use App\Managers\UsersManager;


class AdminController extends Controller
{
	
	public function dashboard()
	{
		$usersManager = new UsersManager();
		$logsManager = new LogsManager();

		echo $this->render('admin/dashboard.twig',
		[
			'users_count' => $usersManager->countUsers(),
			'log_count' => $logsManager->countLogs(),
			'log_count_warning' => $logsManager->countLogs(['LEVEL' => 'WARNING']),
			'log_count_error' => $logsManager->countLogs(['LEVEL' => 'ERROR']) + $logsManager->countLogs(['LEVEL' => 'CRITICAL']),
			'log_recent_activity' => $logsManager->findAllLogs(['CATEGORY' => 'USERS'], ['LIMIT' => '10', 'ORDER BY' => 'ID DESC'])
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

		if ($page > $totalPages) 
		{
			$page = $totalPages; // Rediriger vers la dernière page si la page demandée est trop grande
		}

		$this->render('admin/users.twig',
		[
			'users' => $users,               // Tableau des utilisateurs
			'currentPage' => $page,  // Page actuelle
			'totalPages' => $totalPages
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

		$categories = $settingsCategoriesManager->findAllSettingsCategories();
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
}