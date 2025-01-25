<?php

use App\Core\CoreManager;

return 
[
	[
		'name' => 'Admin Questorium',
		'url' => '',
		'controller' => '',
		'method' => '',
		'params' => [],
		'perm' => 'manage_questionnaire_settings',
		'icon' => '<i class="fas fa-list"></i>',
		'inMenu' => CoreManager::checkPerm('manage_questionnaire_settings'),
		'children' => 
		[
			[
				'name' => 'Creation Questionnaire',
				'url' => '/MyMVC/admin/quiz/',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'createQuiz',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '<i class="fas fa-poll"></i>',
				'inMenu' => CoreManager::checkPerm('create_questionnaire'),
				'children' => []
			],
			[
				'name' => 'Creation Catégories',
				'url' => '/MyMVC/admin/categories/',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'createCategories',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '',
				'inMenu' => false,
				'children' => []
			],
			[
				'name' => 'Creation Questions',
				'url' => '/MyMVC/questions/{questions_id}',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'createQuestions',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '',
				'inMenu' => false,
				'children' => []
			],
			[
				'name' => 'Creation Réponse',
				'url' => '/MyMVC/answers/{answers_id}',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'createAnswers',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '',
				'inMenu' => false,
				'children' => []
			],
			[
				'name' => 'Creation Utilisateurs',
				'url' => '/MyMVC/categories/{categories_id}',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'createUsers',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '<i class="fas fa-users"></i>',
				'inMenu' => true,
				'children' => []
			],
			[
				'name' => 'Analyse des Résultats',
				'url' => '/MyMVC/categories/{categories_id}',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'resultQuiz',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '<i class="fas fa-chart-bar"></i>',
				'inMenu' => true,
				'children' => []
			],
			[
				'name' => 'Aide',
				'url' => '/MyMVC/questorium/help',
				'controller' => \App\Modules\Questorium\Controllers\AdminController::class,
				'method' => 'help',
				'params' => [],
				'perm' => 'create_questionnaire',
				'icon' => '<i class="fas fa-question-circle"></i>',
				'inMenu' => true,
				'children' => []
			]
		]
	],
	[
		'name' => 'Questionnaire',
		'url' => '/MyMVC/questionnaire',
		'controller' => \App\Modules\Questorium\Controllers\UsersController::class,
		'method' => 'showQuestionnaire',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '<i class="fas fa-question-circle"></i>',
		'inMenu' => CoreManager::checkPerm('respond_to_questionnaire'),
		'children' => []
	],
	[
		'name' => '',
		'url' => '/MyMVC/questorium/ajax/quiz',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxQuiz',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => '/MyMVC/questorium/ajax/categories',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxCategories',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => '/MyMVC/questorium/ajax/quizdel/{quiz_id}',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxQuizDel',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => '/MyMVC/questorium/ajax/categoriesdel/{categories_id}',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxQuizDel',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	]
];