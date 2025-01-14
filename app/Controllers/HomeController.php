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
		if(isset($_POST))
		{
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
			{

			}
		}

		$this->render('home/contact.twig');
	}
}