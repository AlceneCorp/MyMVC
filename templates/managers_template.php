<?php

namespace {{Namespace}}; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use {{Useobject}}{{ObjectName}}; // Importation de la classe {{ObjectName}}, représentant un modèle d'entité de la base de données

/**
 * Class {{ObjectName}}Manager
 * Cette classe gère les opérations liées à la manipulation des instances de {{ObjectName}} dans la base de données.
 */
class {{ObjectName}}Manager extends DatabaseManager
{
    /**
     * Récupère une seule instance de {{ObjectName}} à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return {{ObjectName}}|null Retourne une instance de {{ObjectName}} ou null si aucune correspondance.
     */
    public function findOne{{ObjectName}}(array $param_Data = [], array $param_Parameters = []) : ?{{ObjectName}}
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('{{TableName}}', {{ObjectName}}::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de {{ObjectName}} à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de {{ObjectName}}.
     */
    public function findAll{{ObjectName}}(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('{{TableName}}', {{ObjectName}}::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de {{ObjectName}} dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function add{{ObjectName}}(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('{{TableName}}', $param_Data);
    }

    /**
     * Met à jour une instance de {{ObjectName}} dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function update{{ObjectName}}(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('{{TableName}}', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de {{ObjectName}} dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function delete{{ObjectName}}(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('{{TableName}}', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de {{ObjectName}} dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function count{{ObjectName}}(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('{{TableName}}', {{ObjectName}}::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table {{TableName}}.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncate{{ObjectName}}() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('{{TableName}}');
    }
}
