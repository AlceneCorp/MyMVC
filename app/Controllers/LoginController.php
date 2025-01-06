<?php

namespace App\Controllers;

use App\Core\CoreManager;
use App\Core\ErrorManager;
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
					CoreManager::addLogs('INFO', 'USERS', $user->getUSERNAME() . ' s\'est connecté');

					//Mise a jour de 	LAST_LOGIN
					$usersManager->updateUsers(['LAST_LOGIN' => date('Y-m-d H:i:s')], $user->getID());

					header('Location:' . URL . '/admin/dashboard');
				}
				else 
				{
					CoreManager::addLogs('ERROR', 'USERS', ErrorManager::getErrorMessage(80001));
					echo $this->twig->render('login/login.twig', 
					[
						'error' => ErrorManager::getErrorMessage(80002),
					]);
				}
			}
		}

		$this->render('login/login.twig');
	}

	public function register()
    {
        $error = "";
        $success = "";
        // Vérifie si la requête est POST et qu'aucun utilisateur n'est connecté
        if (isset($_POST) && SessionsManager::get('USERS') === null && $_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            // Vérifie que tous les champs nécessaires sont définis
            if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) 
            {
                $username = trim($_POST['username']);
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                

                // Vérifie que le mot de passe et la confirmation correspondent
                if ($password === $confirm_password) {
                    // Validation supplémentaire (exemple : email valide, mot de passe robuste)
                    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8) 
                    {
                        // Hash du mot de passe
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                        // Ajout de l'utilisateur à la base de données (exemple avec PDO)
                        try 
                        {
                             $usersManager = new UsersManager();

                             if(!$usersManager->findOneUsers(['USERNAME' => $username]))
                             {
                                 $usersManager->addUsers([
                                     'USERNAME' => $username,
                                     'EMAIL' => $email,
                                     'PASSWORD' => $hashed_password
                                 ]);
                                 CoreManager::addLogs('INFO', 'USERS', 'Le compte de ' . $username . ' vient d\'être créé.');
                                 $success = 'Votre compte a été créé avec succès. <a class="text-decoration-none text-primary fw-bold ms-1" href="'.URL.'/login">Connectez-vous.</a>';
                             }
                             else
                             {
                                 $error = ErrorManager::getErrorMessage(80003);
                             }
                        } 
                        catch (Exception $e) 
                        {
                            // Gestion des erreurs liées à la base de données
                            $error = ErrorManager::getErrorMessage(80004);
                        }
                    } 
                    else 
                    {
                        // Email invalide ou mot de passe trop faible
                        $error = ErrorManager::getErrorMessage(80005);
                    }
                } 
                else 
                {
                    // Les mots de passe ne correspondent pas
                    $error = ErrorManager::getErrorMessage(80006);
                }
            } 
            else 
            {
                // Tous les champs ne sont pas remplis
                $error = ErrorManager::getErrorMessage(80007);
            }
        }

        // Rend la vue d'enregistrement avec des messages d'erreur ou de succès
        $this->render('login/register.twig', [
            'error' => $error,
            'success' => $success
        ]);
    }


	public function logout()
	{
		if(SessionsManager::get('USERS') !== null)
		{
			$logsManager = new LogsManager();
			CoreManager::addLogs('INFO', 'USERS', SessionsManager::get('USERS')->getUSERNAME() . ' s\'est déconnecté');
			SessionsManager::destroy();
		}

		header("location:" . URL);
	}
}