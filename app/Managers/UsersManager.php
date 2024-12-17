<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Users; // Importation de la classe Users, représentant un modèle d'entité de la base de données

class UsersManager extends DatabaseManager // Déclaration de la classe UsersManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de Users à partir de la base de données
    public function findOneUsers(array $param_Data = [], array $param_Parameters = []) : ?Users
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('users', Users::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de Users à partir de la base de données
    public function findAllUsers(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('users', Users::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de Users dans la base de données
    public function addUsers(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('users', $param_Data);
    }

    // Méthode pour mettre à jour une instance de Users dans la base de données
    public function updateUsers(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('users', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de Users dans la base de données
    public function deleteUsers(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('users', $param_Data);
    }

    // Méthode pour vider (TRUNCATE) la table users
    public function truncateUsers() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('users');
    }
}
