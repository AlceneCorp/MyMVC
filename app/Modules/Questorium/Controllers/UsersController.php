<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Core\SessionsManager;


use App\Managers\PermissionsManager;

use App\Modules\Questorium\Managers\UsersQuizManager;

class UsersController extends Controller
{
	public function showQuestionnaire()
	{
		$usersQuizManager = new UsersQuizManager();

		$quiz = $usersQuizManager->findOneUsersQuiz(['USERS_ID' => SessionsManager::get('USERS')->getID()]);
		$quiz_id = 0;

		if($quiz)
		{
			$quiz_id = $quiz->getQUIZ_ID();
		}

		$this->render('user/viewQuestorium.twig');
	}
}