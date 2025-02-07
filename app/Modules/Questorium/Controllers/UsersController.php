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

use App\Modules\Questorium\Models\Quiz;


class UsersController extends Controller
{
    private $_usersQuizManager;
    private $_quizManager;
    private $_categoriesManager;
    private $_questionsManager;
    private $_answersManager;
    private $_subAnswersManager;

    public function __construct($param_twig)
    {
        $this->twig = $param_twig;
        $this->_usersQuizManager = new UsersQuizManager();
        $this->_quizManager = new QuizManager();
        $this->_categoriesManager = new CategoriesManager();
        $this->_questionsManager = new QuestionsManager();
        $this->_answersManager = new AnswersManager();
        $this->_subAnswersManager = new SubanswersManager();
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
        // Récupérer le quiz avec le slug
        $quiz = $this->_quizManager->findOneQuiz(['SLUG' => CoreManager::encrypt($quiz_slug)]);

        if (!$quiz) 
        {
            return $this->render('error.twig', ['error_message' => 'Quiz introuvable']);
        }

        // Récupérer toutes les catégories du quiz
        $categories = $this->_categoriesManager->findAllCategories(['QUIZ_ID' => $quiz->getID()], ['ORDER BY' => 'ID ASC']);
        $categories_index -= 1; // Ajuster l'index car l'URL commence à 1

        if (!isset($categories[$categories_index])) 
        {
            return $this->render('error.twig', ['error_message' => 'Catégorie introuvable']);
        }

        $current_category = $categories[$categories_index];

        // Récupérer toutes les questions de la catégorie actuelle
        $questions = $this->_questionsManager->findAllQuestions(['CATEGORIES_ID' => $current_category->getID()], ['ORDER BY' => 'ID ASC']);
        $questions_index -= 1; // Ajuster l'index car l'URL commence à 1

        if (!isset($questions[$questions_index])) 
        {
            return $this->render('error.twig', ['error_message' => 'Question introuvable']);
        }

        $current_question = $questions[$questions_index];

        // Récupérer les réponses pour la question actuelle
        $answers = $this->_answersManager->findAllAnswers(['QUESTIONS_ID' => $current_question->getID()]);
        $answers_with_subanswers = [];

        // Récupérer les sous-réponses pour chaque réponse
        foreach ($answers as $answer) 
        {
            $subanswers = $this->_subAnswersManager->findAllSubanswers(['ANSWERS_ID' => $answer->getID()]);
            $answers_with_subanswers[$answer->getID()] = $subanswers;
        }

        // Gestion de la navigation
        $next_question_index = null;
        $previous_question_index = null;

    
        // Si c'est la première question, on règle correctement la navigation
        if ($questions_index === 0) 
        {
            $next_question_index = 2; // Forcer l'index de la question suivante à 2 (1-based)
        } 
        else if ($questions_index + 1 < count($questions)) 
        {
            $next_question_index = $questions_index + 2; // Avancer normalement
        }

        // Log de débogage pour vérifier les indices de navigation
        error_log("Next Question Index (1-based): " . $next_question_index);

        // Si c'est la dernière question de la catégorie, on gère la catégorie suivante
        if ($questions_index + 1 >= count($questions)) 
        {
            // Si on est à la dernière question et qu'il n'y a pas de question suivante
            if (!isset($categories[$categories_index + 1])) 
            {
                // On est à la fin du questionnaire, on redirige vers la page de fin
                $next_question_index = 0;
            } 
            else 
            {
                // Passer à la catégorie suivante
                $next_category = $categories[$categories_index + 1];
                $next_questions = $this->_questionsManager->findAllQuestions(['CATEGORIES_ID' => $next_category->getID()], ['ORDER BY' => 'ID ASC']);

                

                if (!empty($next_questions)) 
                {
                    $next_question_index = 1; // Passer à la première question de la nouvelle catégorie
                    $categories_index += 1; // Passer à la catégorie suivante
                }
            }
        }

        

        // Navigation vers la question précédente
        if ($questions_index > 0) 
        {
            $previous_question_index = $questions_index; // Retourner à la question précédente
        }

        return $this->render('user/viewQuestionnaire.twig', [
            'quiz' => $quiz,
            'categories' => $categories,
            'current_category' => $current_category,
            'current_question' => $current_question,
            'answers' => $answers,
            'answers_with_subanswers' => $answers_with_subanswers,
            'next_question_index' => $next_question_index,
            'previous_question_index' => $previous_question_index,
            'quiz_slug' => $quiz_slug,
            'categories_index' => $categories_index + 1, // Ajuster pour l'URL
            'questions_index' => $questions_index + 1,    // Ajuster pour l'URL
            'user' => SessionsManager::get('USERS'),
            'skipQuestion' => false
        ]);
    }


    public function finishQuestionnaire($quiz_slug)
    {
        // Récupérer le quiz avec le slug
        $quiz = $this->_quizManager->findOneQuiz(['SLUG' => CoreManager::encrypt($quiz_slug)]);

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