<?php

namespace App\Core;

use App\Core\SessionsManager;

use App\Managers\ArticlesManager;

class Controller
{
	protected $twig;
	
	protected $articlesManager;

	public function __construct($param_twig)
	{
		$this->twig = $param_twig;
		$this->articlesManager = new ArticlesManager();
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
			throw new \Exception(ErrorManager::getErrorMessage(500) . " : " . $e->getMessage());
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

	/**
	 * Envoie une réponse JSON et termine le script.
	 *
	 * @param mixed $data Données à encoder en JSON
	 * @param int $statusCode Code HTTP à renvoyer (par défaut 200)
	 */
	protected function json($data, int $statusCode = 200): void
	{
		// Code HTTP
		http_response_code($statusCode);

		// Headers
		header('Content-Type: application/json; charset=utf-8');
		header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
		header('Pragma: no-cache');

		// Encodage JSON
		$json = json_encode(
			$data,
			JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
		);

		if ($json === false) {
			// Si erreur d'encodage, on renvoie un JSON minimal d'erreur
			$json = json_encode([
				'ok'    => false,
				'error' => 'JSON_ENCODE_ERROR: ' . json_last_error_msg()
			]);
			http_response_code(500);
		}

		echo $json;
		exit;
	}

	protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}