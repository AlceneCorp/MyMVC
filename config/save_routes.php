<?php

return 
[
	[
		'url' => '/MyMVC/',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/accueil',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/login',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'login',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/logout',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'logout',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/register',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'register',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/contact',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'contact',
		'params' => [],
		'perm' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/logs/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => [],
		'perm' => 'manage_error_logs',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/logs',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => ['page' => 1],
		'perm' => 'manage_error_logs',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/settings',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'settings',
		'params' => [],
		'perm' => 'edit_site_settings',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'dashboard',
		'params' => [],
		'perm' => 'view_site_statistics',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/dashboard',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'dashboard',
		'params' => [],
		'perm' => 'view_site_statistics',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/ajax/dashboard',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxAdminDashboard',
		'params' => [],
		'perm' => 'view_site_statistics',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/users/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => [],
		'perm' => 'manage_user_groups',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/users',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => ['page' => 1],
		'perm' => 'manage_user_groups',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/block/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'blockUser',
		'params' => [],
		'perm' => 'block_user',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/unblock/{user_id}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'unBlockUser',
		'params' => [],
		'perm' => 'unblock_user',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/admin/edit-permissions/{user}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'usersPermissions',
		'params' => [],
		'perm' => 'manage_permissions',
		'inMenu' => false,
		'children' => []
	],
	[
		'url' => '/MyMVC/user/myprofil',
		'controller' => \App\Controllers\UserController::class,
		'method' => 'myProfil',
		'params' => [],
		'perm' => 'edit_own_profil',
		'inMenu' => false,
		'children' => []
	]
];