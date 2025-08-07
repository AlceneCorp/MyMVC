<?php

namespace App\Core;

use App\Core\DatabaseManager;
use App\Core\CoreManager;

class TablesGenerator extends DatabaseManager
{
	public function generateModels() : void
	{
		foreach(CoreManager::GetCoreTables() as $table)
		{
			parent::generateModelClass($table);
		}
	}

	public function generateManagers() : void
	{
		foreach(CoreManager::GetCoreTables() as $table)
		{
			parent::generateManagersClass($table);
		}
	}

	public function generateAll() : void
	{
		$this->generateModels();
		$this->generateManagers();
	}
}