<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\UsersProfile; // Importation de la classe UsersProfile, représentant un modèle d'entité de la base de données

class UsersProfileManager extends DatabaseManager // Déclaration de la classe UsersProfileManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de UsersProfile à partir de la base de données
    public function findOneUsersProfile(array $param_Data = [], array $param_Parameters = []) : ?UsersProfile
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de UsersProfile à partir de la base de données
    public function findAllUsersProfile(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de UsersProfile dans la base de données
    public function addUsersProfile(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('users_profile', $param_Data);
    }

    // Méthode pour mettre à jour une instance de UsersProfile dans la base de données
    public function updateUsersProfile(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('users_profile', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de UsersProfile dans la base de données
    public function deleteUsersProfile(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('users_profile', $param_Data);
    }

    // Méthode pour compter les enregistrements avec parametres
    public function countUsersProfile(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('users_profile', UsersProfile::class, $param_Data, $param_Parameters);
    }

    // Méthode pour vider (TRUNCATE) la table users_profile
    public function truncateUsersProfile() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('users_profile');
    }
}
