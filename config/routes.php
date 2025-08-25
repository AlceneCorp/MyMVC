<?php

use App\Core\CoreManager;
use App\Core\SessionsManager;
use App\Core\ConfigManager;

return 
[
	[
		'name' => 'Accueil',
		'url' => ConfigManager::get('SITE.root_path.value').'/',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => 'Accueil',
		'url' => ConfigManager::get('SITE.root_path.value').'/accueil',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-home"></i>',
		'inMenu' => true,
		'children' => []
	],
	[
		'name' => 'Articles',
		'url' => ConfigManager::get('SITE.root_path.value').'/articles',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'articles',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-newspaper"></i>',
		'inMenu' => true,
		'children' => []
	],
	[
		'name' => 'Articles Détail',
		'url' => ConfigManager::get('SITE.root_path.value').'/article/{id}',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'article_details',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-newspaper"></i>',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/features',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'features',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-newspaper"></i>',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => 'Prise de contact',
		'url' => ConfigManager::get('SITE.root_path.value').'/contact',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'contact',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-envelope"></i>',
		'inMenu' => true,
		'children' => []
	],
	[
		'name' => 'Connecté ('. (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getUSERNAME() : 'Inconnu') .')',
		'url' => '',
		'controller' => '',
		'method' => '',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-user-check"></i>',
		'inMenu' => SessionsManager::has('USERS'),
		'children' => 
		[
			[
				'name' => '',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'dashboard',
				'params' => [],
				'perm' => 'view_site_statistics',
				'icon' => '<i class="fas fa-tachometer-alt me-3 fs-4"></i>',
				'inMenu' => false,
				'children' => []
			],
			[
				'name' => 'Panel Administrateur',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/dashboard',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'dashboard',
				'params' => [],
				'perm' => 'view_site_statistics',
				'icon' => '<i class="fas fa-tachometer-alt me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('view_site_statistics'),
				'children' => []
			],
			[
				'name' => 'Mon Profil',
				'url' => ConfigManager::get('SITE.root_path.value').'/user/myprofil',
				'controller' => \App\Controllers\UserController::class,
				'method' => 'myProfil',
				'params' => [],
				'perm' => 'edit_own_profil',
				'icon' => '<i class="fas fa-user me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('edit_own_profil'),
				'children' => []
			],
			[
				'name' => 'Utilisateurs',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/users',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'users',
				'params' => ['page' => 1],
				'perm' => 'manage_user_groups',
				'icon' => '<i class="fas fa-users me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('manage_user_groups'),
				'children' => []
			],
			[
				'name' => 'Modules',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/mods',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'mods',
				'params' => [],
				'perm' => 'manage_plugins',
				'icon' => '<i class="fas fa-puzzle-piece me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('manage_plugins'),
				'children' => []
			],
			[
				'name' => 'Configuration',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/settings',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'settings',
				'params' => [],
				'perm' => 'edit_site_settings',
				'icon' => '<i class="fas fa-cogs me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('edit_site_settings'),
				'children' => []
			],
			[
				'name' => 'Logs',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/logs',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'logs',
				'params' => ['page' => 1],
				'perm' => 'manage_error_logs',
				'icon' => '<i class="fas fa-book me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('manage_error_logs'),
				'children' => []
			],
			[
				'name' => 'Génération d\'images',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/genimages',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'genImages',
				'params' => [],
				'perm' => 'view_site_statistics',
				'icon' => '<i class="fas fa-wand-magic-sparkles me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('view_site_statistics'),
				'children' => []
			],
			[
				'name' => 'Vidéos',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/videos',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'index',
				'params' => [],
				'perm' => '',
				'icon' => '<i class="fas fa-film me-3 fs-4"></i>',
				'inMenu' => SessionsManager::has('USERS'),
				'children' => []
			],
			[
				'name' => 'Vidéos',
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/videos/{id}',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'show',
				'params' => [],
				'perm' => '',
				'icon' => '<i class="fas fa-film me-3 fs-4"></i>',
				'inMenu' => false,
				'children' => []
			],
			[
				'name' => 'Se Déconnecter',
				'url' => ConfigManager::get('SITE.root_path.value').'/logout',
				'controller' => \App\Controllers\LoginController::class,
				'method' => 'logout',
				'params' => [],
				'icon' => '<i class="fas fa-sign-out-alt me-3 fs-4"></i>',
				'perm' => '',
				'inMenu' => SessionsManager::has('USERS'),
				'children' => []
			]
		]
	],
	[
		'name' => 'Se connecter <i class="fas fa-sign-in-alt me-2"></i>',
		'url' => ConfigManager::get('SITE.root_path.value').'/login',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'login',
		'params' => [],
		'perm' => '',
		'icon' => '',
		'inMenu' => !SessionsManager::has('USERS'),
		'children' => []
	],
	[
		'name' => 'S\'enregistrer',
		'url' => ConfigManager::get('SITE.root_path.value').'/register',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'register',
		'params' => [],
		'perm' => '',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/logs/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => [],
		'perm' => 'manage_error_logs',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/ajax/dashboard',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxAdminDashboard',
		'params' => [],
		'perm' => 'view_site_statistics',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/users/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => [],
		'perm' => 'manage_user_groups',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/block/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'blockUser',
		'params' => [],
		'perm' => 'block_user',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/unblock/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'unBlockUser',
		'params' => [],
		'perm' => 'unblock_user',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/unblock/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'unBlockUser',
		'params' => [],
		'perm' => 'unblock_user',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/edit-permissions/{user}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'usersPermissions',
		'params' => [],
		'perm' => 'manage_permissions',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/users/view-profil/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'viewUserProfil',
		'params' => [],
		'perm' => 'view_other_profiles',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/clearlogs',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'clearLogs',
		'params' => [],
		'perm' => 'manage_error_logs',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/ajax/logs/summary',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxLogsSummary',
		'params' => [],
		'perm' => 'manage_error_logs',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/ajax/logs/last',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxLogsLast',
		'params' => [],
		'perm' => 'manage_error_logs',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/ajax/logs/export',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'exportLogs',
		'params' => [],
		'perm' => 'manage_error_logs',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	]
];