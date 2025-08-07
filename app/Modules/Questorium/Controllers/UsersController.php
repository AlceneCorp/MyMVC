<?php

namespace App\Modules\Questorium\Controllers;

use App\Core\CoreManager;
use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Core\SessionsManager;


use App\Managers\PermissionsManager;

use App\Modules\Questorium\Managers\UsersQuizManager;
use App\Modules\Questorium\Managers\QuizManager;
use App\Modules\Questorium\Managers\CategoriesManager;
use App\Modules\Questorium\Managers\QuestionsManager;
use App\Modules\Questorium\Managers\AnswersManager;
use App\Modules\Questorium\Managers\SubanswersManager;
use App\Modules\Questorium\Managers\ResultManager;

use App\Modules\Questorium\Models\Quiz;


class UsersController extends Controller
{
    private $_usersQuizManager;
    private $_quizManager;
    private $_categoriesManager;
    private $_questionsManager;
    private $_answersManager;
    private $_subAnswersManager;
    private $_resultManager;

    public function __construct($param_twig)
    {
        $this->twig = $param_twig;
        $this->_usersQuizManager = new UsersQuizManager();
        $this->_quizManager = new QuizManager();
        $this->_categoriesManager = new CategoriesManager();
        $this->_questionsManager = new QuestionsManager();
        $this->_answersManager = new AnswersManager();
        $this->_subAnswersManager = new SubanswersManager();
        $this->_resultManager = new ResultManager();
    }

	public function startQuestionnaire()
	{
        $usersQuiz = $this->_usersQuizManager->findOneUsersQuiz(['USERS_ID' => SessionsManager::get('USERS')->getID()]);
		// Récupérer les détails du quiz avec son slug
		$quiz = $this->_quizManager->findOneQuiz(['ID' => $usersQuiz->getQUIZ_ID()]);

		// Vérifier si le quiz existe
		if (!$quiz) {
			return $this->render('error.twig', ['error_message' => 'Quiz introuvable']);
		}

		// Passer les données nécessaires à la vue
		return $this->render('user/start_questionnaire.twig', [
			'quiz' => $quiz
		]);
	}

    public function showQuestionnaire($quiz_slug, $categories_index, $questions_index)
    {
        $usersQuiz = $this->_usersQuizManager->findOneUsersQuiz(['USERS_ID' => SessionsManager::get('USERS')->getID()]);
		// Récupérer les détails du quiz avec son slug
		$quiz = $this->_quizManager->findOneQuiz(['ID' => $usersQuiz->getQUIZ_ID()]);

        // Récupérer le quiz avec le slug
        $quiz = $this->_quizManager->findOneQuiz(['SLUG' => CoreManager::encrypt($quiz_slug), 'ID' => $quiz->getID()]);
        if (!$quiz) 
        {
            return $this->render('error\error.twig', ['error_message' => 'Quiz introuvable']);
        }

        // Récupérer toutes les catégories du quiz
        $categories = $this->_categoriesManager->findAllCategories(['QUIZ_ID' => $quiz->getID()], ['ORDER BY' => 'ID ASC']);
        $categories_index -= 1; // Ajuster car l'URL commence à 1

        if (!isset($categories[$categories_index])) 
        {
            return $this->render('error\error.twig', ['error_message' => 'Catégorie introuvable']);
        }

        $current_category = $categories[$categories_index];
        $questions = $this->_questionsManager->findAllQuestions(['CATEGORIES_ID' => $current_category->getID()], ['ORDER BY' => 'ID ASC']);
        $questions_index -= 1; // Ajuster car l'URL commence à 1

        if (!isset($questions[$questions_index])) 
        {
            return $this->render('error\error.twig', ['error_message' => 'Question introuvable']);
        }

        $current_question = $questions[$questions_index];
        $answers = $this->_answersManager->findAllAnswers(['QUESTIONS_ID' => $current_question->getID()]);
        $answers_with_subanswers = [];
    
        foreach ($answers as $answer) 
        {
            $subanswers = $this->_subAnswersManager->findAllSubanswers(['ANSWERS_ID' => $answer->getID()]);
            $answers_with_subanswers[$answer->getID()] = $subanswers;
        }

        // Gestion des indices de navigation
        $previous_questions_index = 1;
        $next_questions_index = null;
        $previous_categorie_index = 1;
        $next_categorie_index = null;

        // Déterminer la question précédente
        if ($questions_index > 0) 
        {
            $previous_questions_index = $questions_index;
            $previous_categorie_index = $categories_index + 1;
        } 
        elseif ($categories_index > 0) 
        {
            $previous_categorie_index = $categories_index;
            $previous_category = $categories[$categories_index - 1];
            $previous_questions = $this->_questionsManager->findAllQuestions(['CATEGORIES_ID' => $previous_category->getID()], ['ORDER BY' => 'ID ASC']);
            if (!empty($previous_questions)) 
            {
                $previous_questions_index = count($previous_questions);
            }
        }

        // Déterminer la question suivante
        if ($questions_index + 1 < count($questions)) 
        {
            $next_questions_index = $questions_index + 2;
            $next_categorie_index = $categories_index + 1;
        } 
        elseif ($categories_index + 1 < count($categories)) 
        {
            $next_categorie_index = $categories_index + 2;
            $next_category = $categories[$categories_index + 1];
            $next_questions = $this->_questionsManager->findAllQuestions(['CATEGORIES_ID' => $next_category->getID()], ['ORDER BY' => 'ID ASC']);

            if (!empty($next_questions)) 
            {
                $next_questions_index = 1;
            }
        }

        


        //var_dump($this->_questionsManager->findOneSignQuestions([['ID', '>', $current_question->getID()]]));
        //var_dump($this->_questionsManager->findOneSignQuestions([['ID', '<', $current_question->getID()]], ['ORDER BY' => 'ID DESC']));

        return $this->render('user/viewQuestionnaire.twig', [
            'quiz' => $quiz,
            'categories' => $categories,
            'current_category' => $current_category,
            'current_question' => $current_question,
            'answers' => $answers,
            'answers_with_subanswers' => $answers_with_subanswers,
            'previous_questions_index' => $previous_questions_index,
            'next_questions_index' => $next_questions_index ?? null,
            'previous_categorie_index' => $previous_categorie_index,
            'next_categorie_index' => $next_categorie_index ?? $categories_index + 1,
            'quiz_slug' => $quiz_slug,
            'categories_index' => $categories_index + 1,
            'questions_index' => $questions_index + 1,
            'user' => SessionsManager::get('USERS'),
            'skipQuestion' => false
        ]);
    }



    public function finishQuestionnaire($quiz_slug)
    {
        $usersQuiz = $this->_usersQuizManager->findOneUsersQuiz(['USERS_ID' => SessionsManager::get('USERS')->getID()]);
		// Récupérer les détails du quiz avec son slug
		$quiz = $this->_quizManager->findOneQuiz(['ID' => $usersQuiz->getQUIZ_ID()]);

        // Récupérer le quiz avec le slug
        $quiz = $this->_quizManager->findOneQuiz(['SLUG' => CoreManager::encrypt($quiz_slug), 'ID' => $quiz->getID()]);

        if (!$quiz) 
        {
            return $this->render('error/error.twig', ['error_message' => 'Quiz introuvable']);
        }

        // Passer les données à la vue
        return $this->render('user/finish_questionnaire.twig', [
            'quiz' => $quiz
        ]);
    }
}