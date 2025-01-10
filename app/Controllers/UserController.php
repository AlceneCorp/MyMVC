<?php

namespace App\Controllers;

use App\Core\CoreManager;
use App\Core\Controller;

use App\Managers\UserManager;
use App\Managers\UsersProfileManager;


class UserController extends Controller
{
	public function myProfil()
	{
		
		


		$this->render('user/myprofil.twig');
	}
}