<?php

namespace App\Core;

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

		}
    }
}