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
			exit;
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
			exit;
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

	public function createAnswers()
	{
		var_dump($_POST);
		$quizManager = new QuizManager();
		$categoriesManager = new CategoriesManager();
		$questionsManager = new QuestionsManager();
		$answersManager = new AnswersManager();
		$subanswersManager = new SubanswersManager();
		
		$answer_edit = null;
		$subanswer_edit = null;

		$subanswers = null;

		$types = 
		[
			2 => "Choix Unique",
			5 => "Choix Multiple",
			1 => "Numérique",
			4 => "Zone de texte",
			3 => "Sous-Réponse"
		];

		$selectedType = (CoreManager::Verif("ANSWERS_ID") > 0) ? $answersManager->findOneAnswers(['ID' => CoreManager::Verif('ANSWERS_ID')])->getTYPE() : 0;

		if(isset($_POST['ANSWERS_ID']))
		{
			$answer_edit = $answersManager->findOneAnswers(['ID' => CoreManager::Verif('ANSWERS_ID')]);
			$subanswers = $subanswersManager->findAllSubanswers(['ANSWERS_ID' => $answer_edit->getID()]);

			if(isset($_POST['SUBANSWERS_ID']))
			{
				$subanswer_edit = $subanswersManager->findOneSubanswers(['ANSWERS_ID' => $answer_edit->getID()]);
			}
		}

		//Answers
		if(isset($_POST))
		{
			if(isset($_POST['ANSWERS_TEXT']) && isset($_POST['QUESTIONS_ID']) && isset($_POST['ANSWERS_TYPE']))
			{
				$data = 
				[
					'TEXT' => CoreManager::encrypt($_POST['ANSWERS_TEXT']),
					'QUESTIONS_ID' => $_POST['QUESTIONS_ID'],
					'TYPE' => $_POST['ANSWERS_TYPE'],
					'QUESTIONS_CONDITION' => $_POST["QUESTIONS_CONDITION"], // Correction : éviter la duplication
					'VALUES' => ((isset($_POST["ANSWERS_VALUES_SWITCH"]) && $_POST["ANSWERS_VALUES_SWITCH"] == "on") ? 1 : 0),
					'MIN' => $_POST["ANSWERS_MIN"] ?? 0,
					'MAX' => $_POST["ANSWERS_MAX"] ?? 0
				];

				if(isset($_POST["ANSWERS_ID"])  && CoreManager::verif('ANSWERS_ID') > 0)
				{
					$answers_id = $_POST["ANSWERS_ID"];

					$answersManager->updateAnswers($data, $answers_id);
				}
				else
				{
					$answersManager->addAnswers($data);
				}
			}
		}

		//Subanswers
		if(isset($_POST))
		{
			if(isset($_POST['SUBANSWERS_TEXT']) && isset($_POST['ANSWERS_ID']) && isset($_POST['QUESTIONS_ID']))
			{
				$data = 
				[
					'ANSWERS_ID' => $_POST['ANSWERS_ID'], 
					'TEXT' => CoreManager::encrypt($_POST['SUBANSWERS_TEXT'])
				];

				if(isset($_POST['SUBANSWERS_ID']) && CoreManager::verif('SUBANSWERS_ID') > 0)
				{
					$subanswers_id = $_POST["SUBANSWERS_ID"];
					$subanswersManager->updateSubanswers($data, $subanswers_id);
				}
				else
				{
					if(isset($_POST['QUESTIONS_ID']))
					{
						$question_id = $_POST['QUESTIONS_ID'];

						foreach($answersManager->findAllAnswers(['QUESTIONS_ID' => $question_id]) as $answer)
						{
							if($answer->getQUESTIONS_ID() == $question_id)
							{
								$subanswersManager->addSubanswers($data);
							}
						}
					}
				}
			}
		}


		$this->render('admin/viewCreationAnswers.twig',
		[
			'quiz' => $quizManager->findOneQuiz(['ID' => $_POST['QUIZ_ID']]),
			'categories' => $categoriesManager->findOneCategories(['ID' => $_POST['CATEGORIES_ID']]),
			'questions' => $questionsManager->findOneQuestions(['ID' => $_POST['QUESTIONS_ID']]),
			'answers' => $answersManager->findAllAnswers(['QUESTIONS_ID' => $_POST['QUESTIONS_ID']]),
			
			'subanswers' => $subanswers,
			'types' => $types,
			'selectedType' => $selectedType,
			'answers_edit' => $answer_edit,
			'subanswers_edit' => $subanswer_edit
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