<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\Controller;
use App\Core\CoreManager;
use App\Core\FileManager;
use App\Core\SessionsManager;

use App\Modules\Questorium\Managers\QuizManager;
use App\Modules\Questorium\Managers\CategoriesManager;
use App\Modules\Questorium\Managers\QuestionsManager;
use App\Modules\Questorium\Managers\AnswersManager;
use App\Modules\Questorium\Managers\SubanswersManager;
use App\Modules\Questorium\Managers\ResultManager;

class AjaxController extends Controller
{
	public function ajaxQuizDel($quiz_id)
	{
		header('Content-Type: application/json; charset=utf-8');

		// Validation simple
		$quizId = (int)$quiz_id;
		if ($quizId <= 0) {
			http_response_code(400);
			echo json_encode(['error' => 'Invalid quiz_id']);
			return;
		}

		// Managers
		$quizManager        = new QuizManager();
		$categoriesManager  = new CategoriesManager();
		$questionsManager   = new QuestionsManager();
		$answersManager     = new AnswersManager();
		$subanswersManager  = new SubanswersManager();
		$resultManager      = new ResultManager();

		try {
			// 1) (Optionnel mais recommandé) Purge des résultats liés au quiz
			//    -> évite de garder des lignes orphelines dans Result.
			$results = $resultManager->findAllResult(['QUIZ_ID' => $quizId]) ?? [];
			foreach ($results as $res) {
				$resultManager->deleteResult($res->getID());
			}

			// 2) Parcours des catégories du quiz
			$categories = $categoriesManager->findAllCategories(['QUIZ_ID' => $quizId]) ?? [];
			foreach ($categories as $cat) {
				$catId = $cat->getID();

				// 3) Parcours des questions de la catégorie
				$questions = $questionsManager->findAllQuestions(['CATEGORIES_ID' => $catId]) ?? [];
				foreach ($questions as $q) {
					$qId = $q->getID();

					// 4) Parcours des réponses de la question
					$answers = $answersManager->findAllAnswers(['QUESTIONS_ID' => $qId]) ?? [];
					foreach ($answers as $a) {
						$aId = $a->getID();

						// 5) Parcours des sous-réponses de la réponse
						$subs = $subanswersManager->findAllSubanswers(['ANSWERS_ID' => $aId]) ?? [];
						foreach ($subs as $sa) {
							$subanswersManager->deleteSubanswers($sa->getID());
						}

						// 6) Suppression de la réponse
						$answersManager->deleteAnswers($aId);
					}

					// 7) Suppression de la question
					$questionsManager->deleteQuestions($qId);
				}

				// 8) Suppression de la catégorie
				$categoriesManager->deleteCategories($catId);
			}

			// 9) Suppression du quiz
			$quizManager->deleteQuiz($quizId);

			echo json_encode(['status' => 'ok', 'quiz_id' => $quizId]);
		} catch (\Throwable $e) {
			// Remonte une erreur JSON propre
			http_response_code(500);
			echo json_encode([
				'error' => 'Deletion failed',
				'message' => $e->getMessage()
			]);
		}
	}

	public function ajaxQuiz()
	{
		$quizManager = new QuizManager();

		if (isset($_POST))
		{
			if(isset($_POST['QUIZ_TEXT']) && isset($_POST['QUIZ_START']) && isset($_POST['QUIZ_END']))
			{
				if($_POST['QUIZ_TEXT'] !== "")
				{
					$uploadDir = "\\images\\questorium\\logo\\".CoreManager::slug($_POST['QUIZ_TEXT'])."\\";

					echo $pictureUrl = FileManager::uploadFile($uploadDir, 'QUIZ_LOGO');

					$data = 
					[
						'TEXT' => CoreManager::encrypt($_POST['QUIZ_TEXT']),
						'DESC' => CoreManager::encrypt($_POST['QUIZ_DESC']) ?? null,
						'START' => $_POST['QUIZ_START'],
						'END' => $_POST['QUIZ_END'],
						'LOGO' => CoreManager::encrypt($pictureUrl),
						'SLUG' => CoreManager::encrypt(CoreManager::slug($_POST['QUIZ_TEXT']))
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

	public function ajaxAutoLoad()
	{
		$users_id = SessionsManager::get('USERS')->getID();
		$var = null;

		$resultManager = new ResultManager();

		foreach($resultManager->findAllResult(['USERS_ID' => $users_id, 'QUESTIONS_ID' => $_POST['QUESTIONS_ID']]) as $res)
		{
			$index = $users_id . "_" . $_POST["QUIZ_ID"] . "_" . $res->getCATEGORIES_ID() . "_" . $res->getQUESTIONS_ID() . "_" . $res->getANSWERS_ID() . "_" . $res->getSUBANSWERS_ID();

			if($res->getSUBANSWERS_ID() == 0)
			{
				$index = substr($index, 0, -2);
			}

			$var["RESULT"][$index] = CoreManager::decrypt($res->getVALUE());
		}
		echo json_encode($var);
	}

	public function ajaxResultInsert()
	{
		$resultManager = new ResultManager();
		$questionsManager = new QuestionsManager();
		//MultiAnswer | Checkbox
		if(isset($_POST["MULANSWER"]) && isset($_POST["ACCOUNTS_ID"]) && isset($_POST["QUIZ_ID"]) && isset($_POST["CATEGORIES_ID"]) && isset($_POST["QUESTIONS_ID"]) && isset($_POST["ANSWERS_ID"]))
		{

			$data = 
			[
				'USERS_ID' => $_POST["ACCOUNTS_ID"],
				'QUIZ_ID' => $_POST["QUIZ_ID"],
				'CATEGORIES_ID' => $_POST["CATEGORIES_ID"],
				'QUESTIONS_ID' => $_POST["QUESTIONS_ID"],
				'ANSWERS_ID' => $_POST["ANSWERS_ID"]
			];

			$result = $resultManager->findOneResult($data);

			

			$data = array_merge($data, ['VALUE' => CoreManager::encrypt($_POST["RESULT_VALUES"]), 'TIMESTAMP' => time()]);

			if($result)
			{
				//update
				$resultManager->updateResult($data, $result->getID());
			}
			else
			{
				//add
				$resultManager->addResult($data);
			}
		}
		else if(isset($_POST["ANSWER"]) && isset($_POST["ACCOUNTS_ID"]) && isset($_POST["QUIZ_ID"]) && isset($_POST["CATEGORIES_ID"]) && isset($_POST["QUESTIONS_ID"]) && isset($_POST["ANSWERS_ID"]))
		{
			$data = 
			[
				'USERS_ID' => $_POST["ACCOUNTS_ID"],
				'QUIZ_ID' => $_POST["QUIZ_ID"],
				'CATEGORIES_ID' => $_POST["CATEGORIES_ID"],
				'QUESTIONS_ID' => $_POST["QUESTIONS_ID"]								
			];

			$result = $resultManager->findOneResult($data);

			

			$data = array_merge($data, ['VALUE' => CoreManager::encrypt($_POST["RESULT_VALUES"]), 'TIMESTAMP' => time(), 'ANSWERS_ID' => $_POST["ANSWERS_ID"]]);

			if($result)
			{
				//update
				$resultManager->updateResult($data, $result->getID());
			}
			else
			{
				//add
				$resultManager->addResult($data);
			}
		}
		else if(isset($_POST["SUBANSWERS"]) && isset($_POST["ACCOUNTS_ID"]) && isset($_POST["QUIZ_ID"]) && isset($_POST["CATEGORIES_ID"]) && isset($_POST["QUESTIONS_ID"]) && isset($_POST["ANSWERS_ID"]) && isset($_POST["SUBANSWERS_ID"]))
		{
			$data = 
			[
				'USERS_ID' => $_POST["ACCOUNTS_ID"],
				'QUIZ_ID' => $_POST["QUIZ_ID"],
				'CATEGORIES_ID' => $_POST["CATEGORIES_ID"],
				'QUESTIONS_ID' => $_POST["QUESTIONS_ID"],
				'ANSWERS_ID' => $_POST["ANSWERS_ID"]
			];

			$result = $resultManager->findOneResult($data);

			$data = array_merge($data, ['VALUE' => CoreManager::encrypt($_POST["RESULT_VALUES"]), 'TIMESTAMP' => time(), 'SUBANSWERS_ID' => $_POST["SUBANSWERS_ID"]]);

			if($result)
			{
				//update
				$resultManager->updateResult($data, $result->getID());
			}
			else
			{
				//add
				$resultManager->addResult($data);
			}
		}
		
		//Calcul des liens suivant et précédent.
		if(isset($_POST['NEXT_QUESTIONS_INDEX']) && isset($_POST['PREV_QUESTIONS_INDEX']))
		{

			//Gestion conditions
			$quiz_slug = $_POST['QUIZ_SLUG'];

			
			$values = array
			(
				"PREV" => $this->GetPrevQuestionLink($_POST["CATEGORIES_ID"], $_POST['QUESTIONS_ID'], $quiz_slug, $_POST['PREV_CATEGORIES_INDEX'], $_POST['PREV_QUESTIONS_INDEX']),
				"NEXT" => $this->GetNextQuestionLink($_POST["CATEGORIES_ID"], $_POST['QUESTIONS_ID'], $quiz_slug, $_POST['NEXT_CATEGORIES_INDEX'], $_POST['NEXT_QUESTIONS_INDEX'])
			);

			echo json_encode($values);
		}
	}

	private function GetNextQuestionLink($param_CategriesID, $param_QuestionID, $quiz_slug, $categories_index, $index_boucle)
	{
		$resultManager = new ResultManager();
		$questionsManager = new QuestionsManager();


		while($nextQuestion = $questionsManager->findOneSignQuestions([['ID', ">", $param_QuestionID], ['CATEGORIES_ID', '=', $param_CategriesID]], ['ORDER BY' => 'ID ASC']))
		{
			$param_QuestionID = $nextQuestion->getID();

			if ($nextQuestion->getANSWERS_CONDITION_ID() == 0 && $nextQuestion->getANSWERS_CONDITION_VALUES() == 0) 
			{
				return URL . "/questionnaire/{$quiz_slug}/{$categories_index}/{$index_boucle}";
			}
			else
			{
				// Vérification de la condition de la réponse
				$condition = $resultManager->findOneResult([
					'USERS_ID' => SessionsManager::get('USERS')->getID(),
					'QUIZ_ID' => $_POST["QUIZ_ID"],
					'QUESTIONS_ID' => $nextQuestion->getANSWERS_CONDITION_ID(),
					'ANSWERS_ID' => $nextQuestion->getANSWERS_CONDITION_VALUES()
				]);

				// Si la condition est remplie, on avance l'index, sinon on passe à la question suivante
				if ($condition) 
				{
					//On casse la bouche
					break;
				} 
				else 
				{
					$index_boucle++;  // Avancer l'index même si la condition n'est pas remplie
				}
			}
		}

		return  URL . "/questionnaire/{$quiz_slug}/{$categories_index}/{$index_boucle}";
	}

	private function GetPrevQuestionLink($param_CategriesID, $param_QuestionID, $quiz_slug, $categories_index, $index_boucle)
	{
		$resultManager = new ResultManager();
		$questionsManager = new QuestionsManager();
    
		while($previousQuestion = $questionsManager->findOneSignQuestions([['ID', "<", $param_QuestionID], ['CATEGORIES_ID', '=', $param_CategriesID]], ['ORDER BY' => 'ID DESC']))
		{
			$param_QuestionID = $previousQuestion->getID();
			// Si la question précédente n'a pas de condition, on retourne directement le lien
			if ($previousQuestion->getANSWERS_CONDITION_ID() == 0 && $previousQuestion->getANSWERS_CONDITION_VALUES() == 0) 
			{
				return URL . "/questionnaire/{$quiz_slug}/{$categories_index}/{$index_boucle}";
			}
			else
			{
				// Vérification de la condition de la réponse
				$condition = $resultManager->findOneResult([
					'USERS_ID' => SessionsManager::get('USERS')->getID(),
					'QUIZ_ID' => $_POST["QUIZ_ID"],
					'QUESTIONS_ID' => $previousQuestion->getANSWERS_CONDITION_ID(),
					'ANSWERS_ID' => $previousQuestion->getANSWERS_CONDITION_VALUES()
				]);

				// Si la condition est remplie, on avance l'index, sinon on passe à la question suivante
				if ($condition) 
				{
					break;
				} 
				else 
				{
					$index_boucle--;  // Avancer l'index même si la condition n'est pas remplie
				}
			}
		}

		return URL . "/questionnaire/{$quiz_slug}/{$categories_index}/{$index_boucle}";
	}
}