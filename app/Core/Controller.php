<?php

namespace App\Core;

use App\Core\SessionsManager;



class Controller
{
	protected $twig;

	public function __construct($param_twig)
	{
		$this->twig = $param_twig;
	}

	// Méthode pour afficher un template Twig avec les données passées
    public function render(string $template, array $data = [])
    {
		try
		{
			echo $this->twig->render($template, $data);
		}
		catch (\Exception $e)
		{
			throw new \Exception(ErrorManager::getErrorMessage(500));
		}
    }

	protected function deleteModulesFiles($moduleName)
	{
		// Définir les chemins des fichiers à supprimer
		$modelPath = __DIR__ . "\\..\\Models\\{$moduleName}.php";
		$managerPath = __DIR__ . "\\..\\Managers\\{$moduleName}Manager.php";

		// Supprimer le fichier modèle s'il existe
		if (file_exists($modelPath)) 
		{
			if (!unlink($modelPath)) 
			{
				throw new \Exception("Impossible de supprimer le fichier modèle : {$modelPath}");
			}
		}

		// Supprimer le fichier manager s'il existe
		if (file_exists($managerPath)) 
		{
			if (!unlink($managerPath)) 
			{
				throw new \Exception("Impossible de supprimer le fichier manager : {$managerPath}");
			}
		}
	}
}