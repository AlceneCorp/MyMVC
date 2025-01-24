<?php

namespace App\Modules\Questorium\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Modules\Questorium\Subanswers; // Importation de la classe Subanswers, représentant un modèle d'entité de la base de données

/**
 * Class SubanswersManager
 * Cette classe gère les opérations liées à la manipulation des instances de Subanswers dans la base de données.
 */
class SubanswersManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de Subanswers à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Subanswers|null Retourne une instance de Subanswers ou null si aucune correspondance.
     */
    public function findOneSubanswers(array $param_Data = [], array $param_Parameters = []) : ?Subanswers
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('subanswers', Subanswers::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de Subanswers à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de Subanswers.
     */
    public function findAllSubanswers(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('subanswers', Subanswers::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de Subanswers dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addSubanswers(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('subanswers', $param_Data);
    }

    /**
     * Met à jour une instance de Subanswers dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateSubanswers(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('subanswers', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de Subanswers dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteSubanswers(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('subanswers', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de Subanswers dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countSubanswers(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('subanswers', Subanswers::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table subanswers.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateSubanswers() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('subanswers');
    }
}
