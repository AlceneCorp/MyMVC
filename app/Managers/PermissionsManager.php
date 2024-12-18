<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Permissions; // Importation de la classe Permissions, représentant un modèle d'entité de la base de données

class PermissionsManager extends DatabaseManager // Déclaration de la classe PermissionsManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de Permissions à partir de la base de données
    public function findOnePermissions(array $param_Data = [], array $param_Parameters = []) : ?Permissions
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('permissions', Permissions::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de Permissions à partir de la base de données
    public function findAllPermissions(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('permissions', Permissions::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de Permissions dans la base de données
    public function addPermissions(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('permissions', $param_Data);
    }

    // Méthode pour mettre à jour une instance de Permissions dans la base de données
    public function updatePermissions(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('permissions', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de Permissions dans la base de données
    public function deletePermissions(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('permissions', $param_Data);
    }

    // Méthode pour vider (TRUNCATE) la table permissions
    public function truncatePermissions() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('permissions');
    }
}
