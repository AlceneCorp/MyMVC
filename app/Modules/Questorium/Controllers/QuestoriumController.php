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
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `QUESTIONS_ID` int(11) NOT NULL,
            `TEXT` text NOT NULL,
            `TYPE` int(11) NOT NULL,
            `MIN` int(11) NOT NULL DEFAULT '0',
            `MAX` int(11) NOT NULL DEFAULT '10',
            `VALUES` tinyint(1) NOT NULL DEFAULT '0',
            `QUESTIONS_CONDITION` int(11) NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;",

        'categories' => "CREATE TABLE `categories` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `QUIZ_ID` int(11) NOT NULL,
            `TEXT` text NOT NULL,
            `DESC` text NOT NULL,
            `STYLE` text NOT NULL,
            `COLOR` text NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;",

        'questions' => "CREATE TABLE `questions` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `CATEGORIES_ID` int(11) NOT NULL,
            `TEXT` text NOT NULL,
            `STYLE` text NOT NULL,
            `ANSWERS_CONDITION_ID` int(11) NOT NULL DEFAULT '0',
            `ANSWERS_CONDITION_VALUES` int(11) DEFAULT '0',
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;",

        'quiz' => "CREATE TABLE `quiz` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `TEXT` text NOT NULL,
            `START` datetime NOT NULL,
            `END` datetime NOT NULL,
            `DESC` text NOT NULL,
            `LOGO` text NOT NULL,
            `SLUG` text NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;",

        'result' => "CREATE TABLE `result` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `ACCOUNTS_ID` int(11) NOT NULL,
            `QUIZ_ID` int(11) NOT NULL,
            `CATEGORIES_ID` int(11) NOT NULL,
            `QUESTIONS_ID` int(11) NOT NULL,
            `ANSWERS_ID` int(11) NOT NULL,
            `SUBANSWERS_ID` int(11) NOT NULL,
            `VALUES` text CHARACTER SET latin1 NOT NULL,
            `TIMESTAMP` int(11) NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;",

        'subanswers' => "CREATE TABLE `subanswers` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `ANSWERS_ID` int(11) NOT NULL,
            `TEXT` text NOT NULL,
            `VALUES` text NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;",

        'users_quiz' => "CREATE TABLE `users_quiz` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `USERS_ID` int(11) NOT NULL,
            `QUIZ_ID` int(11) NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;"

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
        }

        $this->generateModels();

        foreach($this->permissions as $permission)
        {
            $perm_id = $permissionsManager->addPermissions($permission);
        }
	}

    public function generateSQL()
    {
        $databaseManager = new DatabaseManager();

        foreach($this->tables as $table => $req)
		{
			$databaseManager->generateModelClass($table, "App\\Modules\\{$this->moduleName}\\Models", "..\\app\\Modules\\{$this->moduleName}\\Models\\");
			$databaseManager->generateManagersClass($table, "App\\Modules\\{$this->moduleName}\\Models\\", "App\\Modules\\{$this->moduleName}\\Managers", "..\\app\\Modules\\{$this->moduleName}\\Managers\\");
		}
    }

    public function regenerateSQL()
    {
        $this->generateSQL();

        header("location: " . URL . "/admin/mods");
        exit;
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