<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\SettingsCategories; // Importation de la classe SettingsCategories, représentant un modèle d'entité de la base de données

class SettingsCategoriesManager extends DatabaseManager // Déclaration de la classe SettingsCategoriesManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de SettingsCategories à partir de la base de données
    public function findOneSettingsCategories(array $param_Data = [], array $param_Parameters = []) : ?SettingsCategories
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('settings_categories', SettingsCategories::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de SettingsCategories à partir de la base de données
    public function findAllSettingsCategories(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('settings_categories', SettingsCategories::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de SettingsCategories dans la base de données
    public function addSettingsCategories(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('settings_categories', $param_Data);
    }

    // Méthode pour mettre à jour une instance de SettingsCategories dans la base de données
    public function updateSettingsCategories(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('settings_categories', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de SettingsCategories dans la base de données
    public function deleteSettingsCategories(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('settings_categories', $param_Data);
    }

    // Méthode pour compter les enregistrements avec parametres
    public function countSettingsCategories(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('settings_categories', SettingsCategories::class, $param_Data, $param_Parameters);
    }

    // Méthode pour vider (TRUNCATE) la table settings_categories
    public function truncateSettingsCategories() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('settings_categories');
    }
}
