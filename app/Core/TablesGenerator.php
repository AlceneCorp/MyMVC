<?php

namespace App\Core;

use App\Core\DatabaseManager;

class TablesGenerator extends DatabaseManager
{
	public function generateModels() : void
	{
		foreach(parent::getAllTables() as $table)
		{
			parent::generateModelClass($table);
		}
	}

	public function generateManagers() : void
	{
		parent::generateManagersClass();
	}

	public function generateAll() : void
	{
		$this->generateModels();
		$this->generateManagers();
	}
}