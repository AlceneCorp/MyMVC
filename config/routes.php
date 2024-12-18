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
		'url' => '/MyMVC/accueil/',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'home',
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
	]
];