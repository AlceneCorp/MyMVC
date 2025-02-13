<?php

namespace App\Modules\Questorium\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Modules\Questorium\Models\Questions; // Importation de la classe Questions, représentant un modèle d'entité de la base de données

/**
 * Class QuestionsManager
 * Cette classe gère les opérations liées à la manipulation des instances de Questions dans la base de données.
 */
class QuestionsManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de Questions à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Questions|null Retourne une instance de Questions ou null si aucune correspondance.
     */
    public function findOneQuestions(array $param_Data = [], array $param_Parameters = []) : ?Questions
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('questions', Questions::class, $param_Data, $param_Parameters);
    }


    /**
     * Récupère une seule instance de Questions avec une recherche signée dans la base de données.
     * 
     * Cette méthode est utilisée pour effectuer une recherche dans la table questions avec une logique spécifique liée aux "signatures" (signées).
     * Elle retourne une seule instance de Questions ou null si aucune correspondance n'est trouvée.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Questions|null Retourne une instance de Questions ou null si aucune correspondance.
     */
    public function findOneSignQuestions(array $param_Data = [], array $param_Parameters = []) : ?Questions
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOneSign('questions', Questions::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de Questions à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de Questions.
     */
    public function findAllQuestions(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('questions', Questions::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de Questions dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addQuestions(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('questions', $param_Data);
    }

    /**
     * Met à jour une instance de Questions dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateQuestions(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('questions', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de Questions dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteQuestions(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('questions', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de Questions dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countQuestions(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('questions', Questions::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table questions.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateQuestions() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('questions');
    }
}
