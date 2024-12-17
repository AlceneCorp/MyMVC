<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Managers\SettingsCategoriesManager;
use App\Managers\SettingsManager;

class AdminController extends Controller
{
	public function logs($page = 1)
	{
		$this->render('home/logs.twig', ['page' => $page]);
	}


	public function settings()
	{
		$settingsCategoriesManager = new SettingsCategoriesManager();
		$settingsManager = new SettingsManager();

		$categories = $settingsCategoriesManager->findAllSettingsCategories();
		$settings = $settingsManager->findAllSettings([], ['KEY' => 'ASC']);

		// On regroupe les paramètres par catégorie
		$grouped_settings = [];
		foreach ($settings as $setting) {
			$grouped_settings[$setting->getSETTINGS_CATEGORIES_ID()][] = $setting;
		}

		// Passer les catégories et les paramètres au template
		$this->render('admin/settings.twig', [
			'settings_categories' => $categories,
			'grouped_settings' => $grouped_settings
		]);
	}
}