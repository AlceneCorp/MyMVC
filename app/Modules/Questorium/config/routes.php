<?php

use App\Core\CoreManager;
use App\Core\ConfigManager;

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
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/quiz/',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/categories/',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/questions/',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/admin/answers/',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/questorium/createusers',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/categories/{categories_id}',
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
				'url' => ConfigManager::get('SITE.root_path.value').'/questorium/help',
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
		'url' => ConfigManager::get('SITE.root_path.value').'/questionnaire/',
		'controller' => \App\Modules\Questorium\Controllers\UsersController::class,
		'method' => 'startQuestionnaire',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '<i class="fas fa-question-circle"></i>',
		'inMenu' => CoreManager::checkPerm('respond_to_questionnaire'),
		'children' => []
	],
	[
		'name' => 'Questionnaire',
		'url' => ConfigManager::get('SITE.root_path.value').'/questionnaire/{quiz_slug}/{categories_index}/{questions_index}',
		'controller' => \App\Modules\Questorium\Controllers\UsersController::class,
		'method' => 'showQuestionnaire',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '<i class="fas fa-question-circle"></i>',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => 'Questionnaire',
		'url' => ConfigManager::get('SITE.root_path.value').'/questionnaire/{quiz_slug}/finish',
		'controller' => \App\Modules\Questorium\Controllers\UsersController::class,
		'method' => 'finishQuestionnaire',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '<i class="fas fa-question-circle"></i>',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/quiz',
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
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/categories',
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
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/questions',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxQuestions',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/answers',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxAnswers',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/autoload',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxAutoLoad',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/resultinsert',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxResultInsert',
		'params' => [],
		'perm' => 'respond_to_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/quizdel/{quiz_id}',
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
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/categoriesdel/{categories_id}',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxCategoriesDel',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/questionsdel/{questions_id}',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxQuestionsDel',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/questorium/ajax/answersdel/{answers_id}',
		'controller' => \App\Modules\Questorium\Controllers\AjaxController::class,
		'method' => 'ajaxAnswersDel',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/questorium/regenerate',
		'controller' => \App\Modules\Questorium\Controllers\QuestoriumController::class,
		'method' => 'regenerateSQL',
		'params' => [],
		'perm' => 'create_questionnaire',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	]
];