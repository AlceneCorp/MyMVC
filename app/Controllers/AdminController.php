<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\ConfigManager;
use App\Core\SessionsManager;

use App\Managers\SettingsCategoriesManager;
use App\Managers\SettingsManager;
use App\Managers\LogsManager;


class AdminController extends Controller
{
	
	public function dashboard()
	{
		echo $this->render('admin/dashboard.twig');
	}

	public function logs($page = 1)
	{
		$logsPerPage = ConfigManager::get('SECURITY.logsPerPage.value');
		$offset = ($page - 1) * $logsPerPage;

		// S'assurer que la page est valide
		if ($page < 1) {
			$page = 1; // Redirige vers la première page si la page est inférieure à 1
		}

		$logsManager = new LogsManager();

		// Récupérer les logs avec les paramètres de pagination
		$logs = $logsManager->findAllLogs([], ['ORDER BY' => 'ID DESC', 'LIMIT' => $logsPerPage, 'OFFSET' => $offset]);


		// Calculer le nombre total de logs
		$totalLogs = $logsManager->countLogs();
		$totalPages = ceil($totalLogs / $logsPerPage);

		// S'assurer que la page ne dépasse pas le nombre total de pages
		if ($page > $totalPages) {
			$page = $totalPages; // Rediriger vers la dernière page si la page demandée est trop grande
		}

		// Passer les données à la vue
		$this->render('admin/logs.twig', [
			'logs' => $logs,
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
						
						$logsManager->addLogs(['LEVEL' => 'SUCCESS', 'CATEGORY' => 'CONFIG', 'MESSAGE' => $category .'.' . $key . ' => ' . $value, 'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $_SERVER['REQUEST_METHOD'], 'URI' => BASE_URL . $_SERVER['REQUEST_URI']]);
					}
				}
			}
		}


		/*
		if(isset($_POST['data']))
		{
			foreach($_POST['data'] as $key => $value)
			{

					
			}
		}*/

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