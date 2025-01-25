<?php

namespace App\Modules\Test\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;


class TestController extends Controller
{
	private array $tables = 
	[
		'Test' => "CREATE TABLE test (
				id INT AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(100) NOT NULL,
				email VARCHAR(100) NOT NULL UNIQUE,
				created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)"
	];

	private $moduleName = "Test";

	public function install()
	{
		$databaseManager = new DatabaseManager();
		
		foreach($this->tables as $table => $req)
		{
			$databaseManager->rawQuery($req);
			$databaseManager->generateModelClass($table, "App\\Modules\\{$this->moduleName}\\Models", "..\\app\\Modules\\{$this->moduleName}\\Models\\");
			$databaseManager->generateManagersClass($table, "App\\Modules\\{$this->moduleName}\\", "App\\Modules\\{$this->moduleName}\\Managers", "..\\app\\Modules\\{$this->moduleName}\\Managers\\");
		}
	}

	public function uninstall()
	{
		$databaseManager = new DatabaseManager();
		$query = "DROP TABLE IF EXISTS test";

		$databaseManager->rawQuery($query);

	}

	public function home()
	{
		$this->render('home.twig');
	}
}
