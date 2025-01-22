<?php

return 
[
	[
		'name' => 'Test',
		'url' => '/MyMVC/test',
		'controller' => \App\Modules\Test\Controllers\TestController::class,
		'method' => 'home',
		'params' => [],
		'perm' => '',
		'icon' => '<i class="fas fa-puzzle-piece"></i>',
		'inMenu' => true,
		'children' => []
	]
];