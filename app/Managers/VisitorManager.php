<?php

namespace App\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Models\Visitor; // Importation de la classe Visitor, représentant un modèle d'entité de la base de données

class VisitorManager extends DatabaseManager // Déclaration de la classe VisitorManager qui hérite de la classe DatabaseManager
{
    // Méthode pour récupérer une seule instance de Visitor à partir de la base de données
    public function findOneVisitor(array $param_Data = [], array $param_Parameters = []) : ?Visitor
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('visitor', Visitor::class, $param_Data, $param_Parameters);
    }

    // Méthode pour récupérer toutes les instances de Visitor à partir de la base de données
    public function findAllVisitor(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('visitor', Visitor::class, $param_Data, $param_Parameters);
    }

    // Méthode pour ajouter une nouvelle instance de Visitor dans la base de données
    public function addVisitor(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('visitor', $param_Data);
    }

    // Méthode pour mettre à jour une instance de Visitor dans la base de données
    public function updateVisitor(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('visitor', $param_Data, $param_id);
    }

    // Méthode pour supprimer une instance de Visitor dans la base de données
    public function deleteVisitor(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('visitor', $param_Data);
    }

    // Méthode pour compter les enregistrements avec parametres
    public function countVisitor(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('visitor', Visitor::class, $param_Data, $param_Parameters);
    }

    // Méthode pour vider (TRUNCATE) la table visitor
    public function truncateVisitor() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('visitor');
    }
}
