<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\SessionsManager;

use App\Managers\UsersManager;
use App\Managers\LogsManager;

class LoginController extends Controller
{
	public function login()
	{
		$usersManager = new UsersManager();
		$logsManager = new LogsManager();

		if(isset($_POST) && SessionsManager::get('USERS') === null && $_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(isset($_POST['login']) && isset($_POST['password']))
			{
				$login = $_POST['login'];
				$password = $_POST['password'];

				$user = $usersManager->findOneUsers(['USERNAME' => $login], []);

				if($user && password_verify($password, $user->getPASSWORD()))
				{
					SessionsManager::set('USERS', $user);
					addLogs('SUCCESS', 'USERS', $user->getUSERNAME() . ' s\'est connecté');

					//Mise a jour de 	LAST_LOGIN
					$usersManager->updateUsers(['LAST_LOGIN' => date('Y-m-d H:i:s')], $user->getID());

					header('Location:' . URL . '/admin/dashboard');
				}
				else 
				{
					addLogs('ERROR', 'USERS', 'Echec de la tentative de connexion');
					echo $this->twig->render('login/login.twig', 
					[
						'error' => 'Identifiants incorrects, veuillez réessayer.',
					]);
				}
			}
		}

		$this->render('login/login.twig');
	}

	public function register()
	{

	}

	public function logout()
	{
		if(SessionsManager::get('USERS') !== null)
		{
			$logsManager = new LogsManager();
			addLogs('SUCCESS', 'USERS', SessionsManager::get('USERS')->getUSERNAME() . ' s\'est déconnecté');
			SessionsManager::destroy();
		}

		header("location:" . URL);
	}
}