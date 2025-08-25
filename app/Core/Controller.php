<?php

namespace App\Core;

use App\Core\SessionsManager;

use App\Managers\ArticlesManager;

class Controller
{
	protected $twig;
	
	protected $articlesManager;

	protected $api;
    protected $pathBase;

	public function __construct($param_twig)
	{
		$this->twig = $param_twig;
		$this->articlesManager = new ArticlesManager();

		$this->api = 'http://109.219.112.85:7035/api/videos'; // <-- ADAPTE
        $this->pathBase = '/videos'; 
	}

	// Méthode pour afficher un template Twig avec les données passées
	public function render(string $template, array $data = [])
	{
		try 
		{
			// 1) Calcule le path courant, sans le root_path (ex: /MyMVC)
			$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
			$rootPath = \App\Core\ConfigManager::get('SITE.root_path.value') ?? '';

			if (!empty($rootPath) && $rootPath !== '/' && str_starts_with($requestPath, $rootPath)) 
			{
				$requestPath = substr($requestPath, strlen($rootPath));
				if ($requestPath === '') 
				{
					$requestPath = '/';
				}
			}

			// 2) Injecte currentRoute si absent
			if (!array_key_exists('currentRoute', $data)) 
			{
				$data['currentRoute'] = rtrim($requestPath, '/');
				if ($data['currentRoute'] === '') 
				{
					$data['currentRoute'] = '/';
				}
			}

			// 3) Uniformise url/base_url si absents (utile dans tes partials)
			if (!array_key_exists('url', $data)) 
			{
				$data['url'] = $rootPath;
			}
			if (!array_key_exists('base_url', $data)) 
			{
				$data['base_url'] = $rootPath;
			}

			echo $this->twig->render($template, $data);
		} 
		catch (\Exception $e) 
		{
			throw new \Exception(\App\Core\ErrorManager::getErrorMessage(500) . " : " . $e->getMessage());
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