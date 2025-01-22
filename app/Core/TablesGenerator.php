<?php

namespace App\Core;

use App\Core\DatabaseManager;

class TablesGenerator extends DatabaseManager
{
	public function generateModels() : void
	{
		foreach($this->coreTables as $table)
		{
			parent::generateModelClass($table);
		}
	}

	public function generateManagers() : void
	{
		foreach($this->coreTables as $table)
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