<?php

return 
[
	[
		'url' => '/MyMVC/',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => []
	],
	[
		'url' => '/MyMVC/accueil',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
		'params' => []
	],
	[
		'url' => '/MyMVC/login',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'login',
		'params' => []
	],
	[
		'url' => '/MyMVC/logout',
		'controller' => \App\Controllers\LoginController::class,
		'method' => 'logout',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/logs/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/logs',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'logs',
		'params' => ['page' => 1]
	],
	[
		'url' => '/MyMVC/admin/settings',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'settings',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/dashboard',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'dashboard',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/ajax/dashboard',
		'controller' => \App\Controllers\AjaxController::class,
		'method' => 'ajaxAdminDashboard',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/users/{page}',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/users',
		'controller' => \App\Controllers\AdminController::class,
		'method' => 'users',
		'params' => ['page' => 1]
	]
];