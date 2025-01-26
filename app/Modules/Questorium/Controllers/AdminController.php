<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Core\CoreManager;

use App\Managers\PermissionsManager;

use App\Modules\Questorium\Managers\QuizManager;
use App\Modules\Questorium\Managers\CategoriesManager;
use App\Modules\Questorium\Managers\QuestionsManager;
use App\Modules\Questorium\Managers\AnswersManager;
use App\Modules\Questorium\Managers\SubanswersManager;

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

	public function createQuestions()
	{
		$quizManager = new QuizManager();
		$categoriesManager = new CategoriesManager();
		$questionsManager = new QuestionsManager();
		$answersManager = new AnswersManager();

		$question_edit = null;
		$allQuestions = [];
		$allAnswers = [];

		if(!isset($_POST['QUIZ_ID']) && !isset($_POST['CATEGORIES_ID']))
		{
			header('Location: ' . URL . "/admin/quiz");
		}

		if(isset($_POST['QUESTIONS_ID']))
		{
			$question_edit = $questionsManager->findOneQuestions(['ID' => $_POST['QUESTIONS_ID']]);
		}

		foreach($categoriesManager->findAllCategories(['QUIZ_ID' => $_POST['QUIZ_ID']]) as $categorie)
		{
			foreach($questionsManager->findAllQuestions(['CATEGORIES_ID' => $categorie->getID()]) as $question)
			{
				$selected = ((CoreManager::verif('QUESTIONS_ID') > 0 && $questionsManager->findOneQuestions(['ID' => CoreManager::verif('QUESTIONS_ID')])->getANSWERS_CONDITION_ID() == $question->getID()) || ($question->getID() == CoreManager::verif('ANSWERS_QUESTIONS_CONDITION'))) ? " selected" : "";
				$color = CoreManager::decrypt($categorie->getCOLOR());
				$allQuestions[] = "<option value=\"".$question->getID()."\" $selected style=\"color:{$color}\">" . CoreManager::decrypt($question->getTEXT()) . "</option>";
			}
		}

		if(CoreManager::verif('ANSWERS_QUESTIONS_CONDITION') > 0)
		{
			foreach($answersManager->findAllAnswers(['QUESTIONS_CONDITION' => CoreManager::verif('ANSWERS_QUESTIONS_CONDITION')]) as $answer)
			{
				$selected = (CoreManager::verif('QUESTIONS_ID') > 0 && $answer->getID() == $questionsManager->findOneQuestions(['ID' => CoreManager::verif('QUESTIONS_ID')])->getANSWERS_CONDITION_VALUES()) ? "checked=\"checked\"" : "";

				$allAnswers[] = "<div class=\"mb-2\"><label><input {$selected} class=\"form-check-input\" type=\"radio\" value=\"" . $answer->getID() . "\" name=\"ANSWERS_QUESTIONS_CONDITION_VALUES\">" . CoreManager::decrypt($answer->getTEXT()) . "</label></div>";
			}
		}

		$this->render('admin/viewCreationQuestions.twig',
		[
			'quiz' => $quizManager->findOneQuiz(['ID' => $_POST['QUIZ_ID']]),
			'categories' => $categoriesManager->findOneCategories(['QUIZ_ID' => $_POST['QUIZ_ID']]),
			'questions' => $questionsManager->findAllQuestions(['CATEGORIES_ID' => $_POST['CATEGORIES_ID']]),
			'question_edit' => $question_edit,
			'allQuestions' => $allQuestions,
			'allAnswers' => $allAnswers,
			'condition' => (CoreManager::verif("QUESTIONS_ID") > 0 && $questionsManager->findOneQuestions(['ID' => CoreManager::verif('QUESTIONS_ID')])->getANSWERS_CONDITION_VALUES() > 0 && !CoreManager::verif("ANSWERS_QUESTIONS_CONDITION") )
		]);
	}

	public function create_questionnaire()
	{
		$this->render('admin/viewCreationAnswers.twig');
	}

	public function help()
	{
		$this->render('admin/help.twig');
	}
}