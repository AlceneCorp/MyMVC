<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Settings; // Importation de la classe Settings, représentant un modèle d'entité de la base de données

class SettingsManager extends DatabaseManager // Déclaration de la classe SettingsManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de Settings à partir de la base de données
    public function findOneSettings(array $param_Data = [], array $param_Parameters = []) : ?Settings
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('settings', Settings::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de Settings à partir de la base de données
    public function findAllSettings(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('settings', Settings::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de Settings dans la base de données
    public function addSettings(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('settings', $param_Data);
    }

    // Méthode pour mettre à jour une instance de Settings dans la base de données
    public function updateSettings(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('settings', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de Settings dans la base de données
    public function deleteSettings(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('settings', $param_Data);
    }

    // Méthode pour vider (TRUNCATE) la table settings
    public function truncateSettings() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('settings');
    }
}
