<?php

return 
[
	[
		'url' => '/MyMVC/',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/accueil',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/login',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'login',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/logout',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'logout',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/register',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'register',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/logs/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/logs',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => ['page' => 1],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/settings',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'settings',
		'params' => [],
		'perm' => 'edit_site_settings'
	],
	[
		'url' => '/MyMVC/admin',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'dashboard',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/dashboard',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'dashboard',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/ajax/dashboard',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxAdminDashboard',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/users/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => [],
		'perm' => ''
	],
	[
		'url' => '/MyMVC/admin/users',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => ['page' => 1],
		'perm' => ''
	]
];