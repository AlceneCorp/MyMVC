<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\UsersProfile; // Importation de la classe UsersProfile, représentant un modèle d'entité de la base de données

/**
 * Class UsersProfileManager
 * Cette classe gère les opérations liées à la manipulation des instances de UsersProfile dans la base de données.
 */
class UsersProfileManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de UsersProfile à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return UsersProfile|null Retourne une instance de UsersProfile ou null si aucune correspondance.
     */
    public function findOneUsersProfile(array $param_Data = [], array $param_Parameters = []) : ?UsersProfile
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de UsersProfile à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de UsersProfile.
     */
    public function findAllUsersProfile(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de UsersProfile dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addUsersProfile(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('users_profile', $param_Data);
    }

    /**
     * Met à jour une instance de UsersProfile dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateUsersProfile(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('users_profile', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de UsersProfile dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteUsersProfile(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('users_profile', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de UsersProfile dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countUsersProfile(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table users_profile.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateUsersProfile() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('users_profile');
    }
}
