<?php

namespace App\Modules\Questorium\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Modules\Questorium\Models\Result; // Importation de la classe Result, représentant un modèle d'entité de la base de données

/**
 * Class ResultManager
 * Cette classe gère les opérations liées à la manipulation des instances de Result dans la base de données.
 */
class ResultManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de Result à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Result|null Retourne une instance de Result ou null si aucune correspondance.
     */
    public function findOneResult(array $param_Data = [], array $param_Parameters = []) : ?Result
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('result', Result::class, $param_Data, $param_Parameters);
    }


    /**
     * Récupère une seule instance de Result avec une recherche signée dans la base de données.
     * 
     * Cette méthode est utilisée pour effectuer une recherche dans la table result avec une logique spécifique liée aux "signatures" (signées).
     * Elle retourne une seule instance de Result ou null si aucune correspondance n'est trouvée.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Result|null Retourne une instance de Result ou null si aucune correspondance.
     */
    public function findOneSignResult(array $param_Data = [], array $param_Parameters = []) : ?Result
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOneSign('result', Result::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de Result à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de Result.
     */
    public function findAllResult(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('result', Result::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de Result dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addResult(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('result', $param_Data);
    }

    /**
     * Met à jour une instance de Result dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateResult(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('result', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de Result dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteResult(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('result', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de Result dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countResult(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('result', Result::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table result.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateResult() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('result');
    }
}
