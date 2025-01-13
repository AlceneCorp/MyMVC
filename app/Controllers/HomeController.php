<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
	public function home()
	{
		$this->render('home/home.twig');
	}

	public function contact()
	{
		$this->render('home/contact.twig');
	}
}