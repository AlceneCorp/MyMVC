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
					$logsManager->addLogs(['LEVEL' => 'SUCCESS', 'CATEGORY' => 'USERS', 'MESSAGE' => $user->getUSERNAME() . ' s\'est connecté', 'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $_SERVER['REQUEST_METHOD'], 'URI' => BASE_URL . $_SERVER['REQUEST_URI']]);
					header('Location:' . URL . '/admin/dashboard');
				}
				else 
				{
					$logsManager->addLogs(['LEVEL' => 'ERROR', 'CATEGORY' => 'USERS', 'MESSAGE' => 'Echec de la tentative de connexion', 'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $_SERVER['REQUEST_METHOD'], 'URI' => BASE_URL . $_SERVER['REQUEST_URI']]);
					echo $this->twig->render('login/login.twig', [
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
		
		$logsManager = new LogsManager();

		$logsManager->addLogs(['LEVEL' => 'SUCCESS', 'CATEGORY' => 'USERS', 'MESSAGE' => SessionsManager::get('USERS')->getUSERNAME() . ' s\'est déconnecté', 'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0), 'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'], 'METHOD' => $_SERVER['REQUEST_METHOD'], 'URI' => BASE_URL . $_SERVER['REQUEST_URI']]);

		SessionsManager::destroy();

		header("location:" . URL);
	}
}