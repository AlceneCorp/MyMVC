<?php

namespace App\Modules\Questorium\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Modules\Questorium\Categories; // Importation de la classe Categories, représentant un modèle d'entité de la base de données

/**
 * Class CategoriesManager
 * Cette classe gère les opérations liées à la manipulation des instances de Categories dans la base de données.
 */
class CategoriesManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de Categories à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Categories|null Retourne une instance de Categories ou null si aucune correspondance.
     */
    public function findOneCategories(array $param_Data = [], array $param_Parameters = []) : ?Categories
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('categories', Categories::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de Categories à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de Categories.
     */
    public function findAllCategories(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('categories', Categories::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de Categories dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addCategories(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('categories', $param_Data);
    }

    /**
     * Met à jour une instance de Categories dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateCategories(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('categories', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de Categories dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteCategories(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('categories', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de Categories dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countCategories(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('categories', Categories::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table categories.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateCategories() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('categories');
    }
}
