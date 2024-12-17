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
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'logs',
		'params' => []
	],
	[
		'url' => '/MyMVC/admin/logs',
		'controller' => \App\Controllers\HomeController::class,
		'method' => 'logs',
		'params' => ['page' => 1]
	]
];