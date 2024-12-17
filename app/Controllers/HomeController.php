<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
	public function home()
	{
		$this->render('home/home.twig');
	}

	public function logs($page = 1)
	{
		$this->render('home/logs.twig', ['page' => $page]);
	}
}