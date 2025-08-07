<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Articles; // Importation de la classe Articles, représentant un modèle d'entité de la base de données

/**
 * Class ArticlesManager
 * Cette classe gère les opérations liées à la manipulation des instances de Articles dans la base de données.
 */
class ArticlesManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de Articles à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Articles|null Retourne une instance de Articles ou null si aucune correspondance.
     */
    public function findOneArticles(array $param_Data = [], array $param_Parameters = []) : ?Articles
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('articles', Articles::class, $param_Data, $param_Parameters);
    }


    /**
     * Récupère une seule instance de Articles avec une recherche signée dans la base de données.
     * 
     * Cette méthode est utilisée pour effectuer une recherche dans la table articles avec une logique spécifique liée aux "signatures" (signées).
     * Elle retourne une seule instance de Articles ou null si aucune correspondance n'est trouvée.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return Articles|null Retourne une instance de Articles ou null si aucune correspondance.
     */
    public function findOneSignArticles(array $param_Data = [], array $param_Parameters = []) : ?Articles
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOneSign('articles', Articles::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de Articles à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de Articles.
     */
    public function findAllArticles(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('articles', Articles::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de Articles dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addArticles(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('articles', $param_Data);
    }

    /**
     * Met à jour une instance de Articles dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateArticles(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('articles', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de Articles dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteArticles(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('articles', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de Articles dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countArticles(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('articles', Articles::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table articles.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateArticles() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('articles');
    }
}
