<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;


use App\Managers\PermissionsManager;

class QuestoriumController extends Controller
{
	private array $tables = 
	[
	    'answers' => "CREATE TABLE `answers` (
          `ANSWERS_ID` int(11) NOT NULL AUTO_INCREMENT,
          `ANSWERS_QUESTIONS_ID` int(11) NOT NULL,
          `ANSWERS_TEXT` text NOT NULL,
          `ANSWERS_TYPE` int(11) NOT NULL,
          `ANSWERS_MIN` int(11) NOT NULL DEFAULT '0',
          `ANSWERS_MAX` int(11) NOT NULL DEFAULT '10',
          `ANSWERS_VALUES` tinyint(1) NOT NULL DEFAULT '0',
          `ANSWERS_QUESTIONS_CONDITION` int(11) NOT NULL,
          PRIMARY KEY (`ANSWERS_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=latin1;",

        'categories' => "CREATE TABLE `categories` (
          `CATEGORIES_ID` int(11) NOT NULL AUTO_INCREMENT,
          `CATEGORIES_QUIZ_ID` int(11) NOT NULL,
          `CATEGORIES_TEXT` text NOT NULL,
          `CATEGORIES_DESC` text NOT NULL,
          `CATEGORIES_STYLE` text NOT NULL,
          `CATEGORIES_COLOR` text NOT NULL,
          PRIMARY KEY (`CATEGORIES_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;",

        'questions' => "CREATE TABLE `questions` (
          `QUESTIONS_ID` int(11) NOT NULL AUTO_INCREMENT,
          `QUESTIONS_CATEGORIES_ID` int(11) NOT NULL,
          `QUESTIONS_TEXT` text NOT NULL,
          `QUESTIONS_STYLE` text NOT NULL,
          `QUESTIONS_ANSWERS_CONDITION_ID` int(11) NOT NULL DEFAULT '0',
          `QUESTIONS_ANSWERS_CONDITION_VALUES` int(11) DEFAULT '0',
          PRIMARY KEY (`QUESTIONS_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;",

        'quiz' => "CREATE TABLE `quiz` (
          `QUIZ_ID` int(11) NOT NULL AUTO_INCREMENT,
          `QUIZ_TEXT` text NOT NULL,
          `QUIZ_START` datetime NOT NULL,
          `QUIZ_END` datetime NOT NULL,
          `QUIZ_DESC` text NOT NULL,
          `QUIZ_LOGO` text NOT NULL,
          `QUIZ_STYLE` text NOT NULL,
          PRIMARY KEY (`QUIZ_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;",

        'result' => "CREATE TABLE `result` (
          `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT,
          `RESULT_ACCOUNTS_ID` int(11) NOT NULL,
          `RESULT_QUIZ_ID` int(11) NOT NULL,
          `RESULT_CATEGORIES_ID` int(11) NOT NULL,
          `RESULT_QUESTIONS_ID` int(11) NOT NULL,
          `RESULT_ANSWERS_ID` int(11) NOT NULL,
          `RESULT_SUBANSWERS_ID` int(11) NOT NULL,
          `RESULT_VALUES` text CHARACTER SET latin1 NOT NULL,
          `RESULT_TIMESTAMP` int(11) NOT NULL,
          PRIMARY KEY (`RESULT_ID`)
        ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;",

        'subanswers' => "CREATE TABLE `subanswers` (
          `SUBANSWERS_ID` int(11) NOT NULL AUTO_INCREMENT,
          `SUBANSWERS_ANSWERS_ID` int(11) NOT NULL,
          `SUBANSWERS_TEXT` text NOT NULL,
          `SUBANSWERS_VALUES` text NOT NULL,
          PRIMARY KEY (`SUBANSWERS_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=434 DEFAULT CHARSET=utf8;"

	];

	private array $permissions = 
    [
        [
            'NAME' => 'create_questionnaire',
            'FULLNAME' => 'Créer un questionnaire',
            'DESCRIPTION' => 'Permet de créer de nouveaux questionnaires.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'edit_questionnaire',
            'FULLNAME' => 'Modifier un questionnaire',
            'DESCRIPTION' => 'Permet de modifier un questionnaire existant.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'delete_questionnaire',
            'FULLNAME' => 'Supprimer un questionnaire',
            'DESCRIPTION' => 'Permet de supprimer un questionnaire.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'view_questionnaire',
            'FULLNAME' => 'Voir les questionnaires',
            'DESCRIPTION' => 'Permet de consulter tous les questionnaires existants.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'respond_to_questionnaire',
            'FULLNAME' => 'Répondre à un questionnaire',
            'DESCRIPTION' => 'Permet de répondre aux questionnaires disponibles.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 1
        ],
        [
            'NAME' => 'export_results',
            'FULLNAME' => 'Exporter les résultats',
            'DESCRIPTION' => 'Permet d\'exporter les résultats des questionnaires sous différents formats.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'manage_questionnaire_settings',
            'FULLNAME' => 'Gérer les paramètres du questionnaire',
            'DESCRIPTION' => 'Permet de modifier les paramètres globaux du module de questionnaires.',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'view_questionnaire_stats',
            'FULLNAME' => 'Voir les statistiques des questionnaires',
            'DESCRIPTION' => 'Permet de consulter les statistiques des questionnaires (réponses, taux de complétion, etc.).',
            'ORDERS' => 5,
            'AUTO_ATTRIBUTE' => 0
        ],
    ];

    private $moduleName = "Questorium";


	public function install()
	{
        $permissionsManager = new PermissionsManager();

        $databaseManager = new DatabaseManager();
		
		foreach($this->tables as $table => $req)
		{
			$databaseManager->rawQuery($req);
			$databaseManager->generateModelClass($table, "App\\Modules\\{$this->moduleName}\\Models", "..\\app\\Modules\\{$this->moduleName}\\Models\\");
			$databaseManager->generateManagersClass($table, "App\\Modules\\{$this->moduleName}\\", "App\\Modules\\{$this->moduleName}\\Managers", "..\\app\\Modules\\{$this->moduleName}\\Managers\\");
		}

        foreach($this->permissions as $permission)
        {
            $perm_id = $permissionsManager->addPermissions($permission);
        }
	}

	public function uninstall()
	{
        $permissionsManager = new PermissionsManager();

        $databaseManager = new DatabaseManager();
		

        foreach($this->tables as $table => $req)
		{
            $query = "DROP TABLE IF EXISTS {$table}";
		    $databaseManager->rawQuery($query);
        }

        foreach($this->permissions as $permission)
        {
            $permissionsManager->deletePermissions($permission);
        }
	}
}