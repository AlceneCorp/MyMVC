<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\CoreManager;

use App\Modules\Questorium\Managers\QuizManager;
use App\Modules\Questorium\Managers\CategoriesManager;
use App\Modules\Questorium\Managers\QuestionsManager;
use App\Modules\Questorium\Managers\AnswersManager;
use App\Modules\Questorium\Managers\SubanswersManager;

class AjaxController extends Controller
{
	public function ajaxQuizDel($quiz_id)
	{

	}

	public function ajaxQuiz()
	{
		$quizManager = new QuizManager();

		if (isset($_POST))
		{
			if(isset($_POST['QUIZ_TEXT']) && isset($_POST['QUIZ_START']) && isset($_POST['QUIZ_END']))
			{
				
				$data = 
				[
					'TEXT' => CoreManager::encrypt($_POST['QUIZ_TEXT']),
					'DESC' => CoreManager::encrypt($_POST['QUIZ_DESC']) ?? null,
					'START' => $_POST['QUIZ_START'],
					'END' => $_POST['QUIZ_END'],
					'LOGO' => CoreManager::encrypt($_POST['QUIZ_LOGO']) ?? null
				];

				if(isset($_POST['QUIZ_ID']) && $_POST['QUIZ_ID'] > 0)
				{
					$id = $_POST['QUIZ_ID'];
					$quizManager->updateQuiz($data, $id);
				}
				else
				{
					$quizManager->addQuiz($data);
				}
			}
		}
	}

	public function ajaxCategories()
	{
		$categoriesManager = new CategoriesManager();

		if (isset($_POST))
		{
			if(isset($_POST['CATEGORIES_TEXT']) && isset($_POST['CATEGORIES_QUIZ_ID']) && $_POST['CATEGORIES_TEXT'] != '')
			{
				$data = 
				[
					'TEXT' => CoreManager::encrypt($_POST['CATEGORIES_TEXT']),
					'DESC' => CoreManager::encrypt($_POST['CATEGORIES_DESC']) ?? null,
					'COLOR' => CoreManager::encrypt($_POST['CATEGORIES_COLOR']) ?? null,
					'QUIZ_ID' => $_POST['CATEGORIES_QUIZ_ID']
				];

				if(isset($_POST['CATEGORIES_ID']) && $_POST['CATEGORIES_ID'] > 0)
				{
					$id = $_POST['CATEGORIES_ID'];
					$categoriesManager->updateCategories($data, $id);
				}
				else
				{
					$categoriesManager->addCategories($data);
				}
			}
		}
	}

	public function ajaxQuestions()
	{
		$questionsManager = new QuestionsManager();

		if(isset($_POST))
		{
			if(isset($_POST['QUESTIONS_TEXT']) && isset($_POST['CATEGORIES_ID']))
			{
				$data = 
				[
					'TEXT' => CoreManager::encrypt($_POST['QUESTIONS_TEXT']),
					'CATEGORIES_ID' => $_POST['CATEGORIES_ID'],
					'ANSWERS_CONDITION_ID' => $_POST["ANSWERS_QUESTIONS_CONDITION"] ?? 0,
					'ANSWERS_CONDITION_VALUES' => $_POST["ANSWERS_QUESTIONS_CONDITION_VALUES"] ?? 0
				];

				echo json_encode($data);

				if(isset($_POST['QUESTIONS_ID']) && $_POST['QUESTIONS_ID'] > 0)
				{
					$id = $_POST['QUESTIONS_ID'];
					$questionsManager->updateQuestions($data, $id);
				}
				else
				{
					$questionsManager->addQuestions($data);
				}
			}
		}
	}
}