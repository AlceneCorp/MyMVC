<?php

namespace App\Modules\Test\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;


class TestController extends Controller
{
	private array $tables = 
	[
		'Test'
	];

	public function install()
	{
		$databaseManager = new DatabaseManager();
		$query = "
			CREATE TABLE test (
				id INT AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(100) NOT NULL,
				email VARCHAR(100) NOT NULL UNIQUE,
				created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		";

		$databaseManager->rawQuery($query);

		foreach($this->tables as $table)
		{
			$databaseManager->generateModelClass($table, 'App\\Modules\\Test\\Models', '..\\app\\Modules\\Test\\Models\\');
			$databaseManager->generateManagersClass($table, 'App\\Modules\\Test\\', 'App\\Modules\\Test\\Managers', '..\\app\\Modules\\Test\\Managers\\');
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
