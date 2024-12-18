<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Logs; // Importation de la classe Logs, représentant un modèle d'entité de la base de données

class LogsManager extends DatabaseManager // Déclaration de la classe LogsManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de Logs à partir de la base de données
    public function findOneLogs(array $param_Data = [], array $param_Parameters = []) : ?Logs
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('logs', Logs::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de Logs à partir de la base de données
    public function findAllLogs(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('logs', Logs::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de Logs dans la base de données
    public function addLogs(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('logs', $param_Data);
    }

    // Méthode pour mettre à jour une instance de Logs dans la base de données
    public function updateLogs(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('logs', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de Logs dans la base de données
    public function deleteLogs(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('logs', $param_Data);
    }

    // Méthode pour compter les enregistrements avec parametres
    public function countLogs(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('logs', Logs::class, $param_Data, $param_Parameters);
    }

    // Méthode pour vider (TRUNCATE) la table logs
    public function truncateLogs() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('logs');
    }
}
