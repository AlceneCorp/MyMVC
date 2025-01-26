<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Core\CoreManager;

use App\Managers\PermissionsManager;

use App\Modules\Questorium\Managers\QuizManager;
use App\Modules\Questorium\Managers\CategoriesManager;

class AdminController extends Controller
{
	public function createQuiz()
	{
		$quizManager = new QuizManager();

		$quiz_edit = null;

		if(isset($_POST['QUIZ_ID']))
		{
			$quiz_edit = $quizManager->findOneQuiz(['ID' => $_POST['QUIZ_ID']]);
		}


		$this->render('admin/viewCreationQuiz.twig',
		[
			'quiz' => $quizManager->findAllQuiz(),
			'quiz_edit' => $quiz_edit
		]);
	}

	public function createCategories()
	{
		$quizManager = new QuizManager();
		$categoriesManager = new CategoriesManager();

		$categorie_edit = null;


		if(!isset($_POST['QUIZ_ID']))
		{
			header('Location: ' . URL . "/admin/quiz");
		}

		if(isset($_POST['CATEGORIES_ID']))
		{
			$categorie_edit = $categoriesManager->findOneCategories(['ID' => $_POST['CATEGORIES_ID']]);
		}


		$this->render('admin/viewCreationCategories.twig',
		[
			'quiz' => $quizManager->findOneQuiz(['ID' => $_POST['QUIZ_ID']]),
			'categories' => $categoriesManager->findAllCategories(['QUIZ_ID' => $_POST['QUIZ_ID']]),
			'categorie_edit' => $categorie_edit
		]);
	}

	public function help()
	{
		$this->render('admin/help.twig');
	}
}