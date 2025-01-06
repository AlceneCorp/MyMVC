<?php

namespace App\Core;

use App\Core\SessionsManager;

use App\Managers\UsersManager;
use App\Managers\PermissionsManager;
use App\Managers\UsersPermissionsManager;

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
			throw new \Exception(ErrorManager::getErrorMessage(500));
		}
    }

	public function checkPerm($param_Slug, $param_Perm)
	{
		try
		{
			if(!empty($param_Perm))
			{
				if(SessionsManager::get('USERS') !== null)
				{
					$userManager = new UsersManager();
					$permissionManager = new PermissionsManager();
					$usersPermissionManager = new UsersPermissionsManager();

					$permission = $permissionManager->findOnePermissions(['NAME' => $param_Perm]);


					if($permission)
					{
						$usersPerm = $usersPermissionManager->findOneUsersPermissions(['USERS_ID' => SessionsManager::get('USERS')->getID(), 'PERMISSIONS_ID' => $permission->getID()]);

						if($usersPerm)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					else
					{
						throw new \Exception(ErrorManager::getErrorMessage(50000));
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
		}
		catch (\Exception $e)
		{

		}
	}
}