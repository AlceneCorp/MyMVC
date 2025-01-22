<?php

use App\Core\CoreManager;
use App\Core\SessionsManager;

return 
[
	[
		'name' => 'Accueil',
		'url' => '/MyMVC/',
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
		'url' => '/MyMVC/accueil',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-home"></i>',
		'inMenu' => true,
		'children' => []
	],
	[
		'name' => 'Contact',
		'url' => '/MyMVC/contact',
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
				'name' => 'Panel Administrateur',
				'url' => '/MyMVC/admin/dashboard',
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
				'url' => '/MyMVC/user/myprofil',
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
				'url' => '/MyMVC/admin/users',
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
				'url' => '/MyMVC/admin/mods',
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
				'url' => '/MyMVC/admin/settings',
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
				'url' => '/MyMVC/admin/logs',
				'controller' => \App\Controllers\AdminController::class,
				'method' => 'logs',
				'params' => ['page' => 1],
				'perm' => 'manage_error_logs',
				'icon' => '<i class="fas fa-book me-3 fs-4"></i>',
				'inMenu' => CoreManager::checkPerm('manage_error_logs'),
				'children' => []
			],
			[
				'name' => 'Se Déconnecter',
				'url' => '/MyMVC/logout',
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
		'url' => '/MyMVC/login',
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
		'url' => '/MyMVC/register',
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
		'url' => '/MyMVC/admin/logs/{page}',
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
		'url' => '/MyMVC/admin/ajax/dashboard',
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
		'url' => '/MyMVC/admin/users/{page}',
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
		'url' => '/MyMVC/admin/block/{user_id}',
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
		'url' => '/MyMVC/admin/unblock/{user_id}',
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
		'url' => '/MyMVC/admin/unblock/{user_id}',
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
		'url' => '/MyMVC/admin/edit-permissions/{user}',
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
		'url' => '/MyMVC/admin/users/view-profil/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'viewUserProfil',
		'params' => [],
		'perm' => 'view_other_profiles',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	]
];