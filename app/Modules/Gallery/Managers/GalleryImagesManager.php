<?php

namespace App\Modules\Gallery\Managers; // Déclaration du namespace, indiquant que cette classe se trouve dans le dossier App/Managers

use App\Core\DatabaseManager; // Importation de la classe DatabaseManager qui contient les méthodes génériques pour manipuler la base de données
use App\Modules\Gallery\Models\GalleryImages; // Importation de la classe GalleryImages, représentant un modèle d'entité de la base de données

/**
 * Class GalleryImagesManager
 * Cette classe gère les opérations liées à la manipulation des instances de GalleryImages dans la base de données.
 */
class GalleryImagesManager extends DatabaseManager
{
    /**
     * Récupère une seule instance de GalleryImages à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return GalleryImages|null Retourne une instance de GalleryImages ou null si aucune correspondance.
     */
    public function findOneGalleryImages(array $param_Data = [], array $param_Parameters = []) : ?GalleryImages
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOne('gallery_images', GalleryImages::class, $param_Data, $param_Parameters);
    }


    /**
     * Récupère une seule instance de GalleryImages avec une recherche signée dans la base de données.
     * 
     * Cette méthode est utilisée pour effectuer une recherche dans la table gallery_images avec une logique spécifique liée aux "signatures" (signées).
     * Elle retourne une seule instance de GalleryImages ou null si aucune correspondance n'est trouvée.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return GalleryImages|null Retourne une instance de GalleryImages ou null si aucune correspondance.
     */
    public function findOneSignGalleryImages(array $param_Data = [], array $param_Parameters = []) : ?GalleryImages
    {
        // Appel à la méthode findOne de DatabaseManager avec les paramètres nécessaires pour rechercher une seule entrée dans la table
        return parent::findOneSign('gallery_images', GalleryImages::class, $param_Data, $param_Parameters);
    }

    /**
     * Récupère toutes les instances de GalleryImages à partir de la base de données.
     * 
     * @param array $param_Data Données à utiliser pour filtrer la recherche.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return array Tableau d'instances de GalleryImages.
     */
    public function findAllGalleryImages(array $param_Data = [], array $param_Parameters = []) : array
    {
        // Appel à la méthode findAll de DatabaseManager pour récupérer toutes les entrées dans la table
        return parent::findAll('gallery_images', GalleryImages::class, $param_Data, $param_Parameters);
    }

    /**
     * Ajoute une nouvelle instance de GalleryImages dans la base de données.
     * 
     * @param array $param_Data Données à insérer dans la table.
     * @return int Retourne l'ID de l'élément inséré.
     */
    public function addGalleryImages(array $param_Data) : int
    {
        // Appel à la méthode insert de DatabaseManager pour insérer de nouvelles données dans la table
        return parent::insert('gallery_images', $param_Data);
    }

    /**
     * Met à jour une instance de GalleryImages dans la base de données.
     * 
     * @param array $param_Data Données à mettre à jour.
     * @param int $param_id ID de l'élément à mettre à jour.
     * @return int Nombre d'éléments affectés par la mise à jour.
     */
    public function updateGalleryImages(array $param_Data, $param_id) : int
    {
        // Appel à la méthode update de DatabaseManager pour mettre à jour les données de la table, en utilisant l'ID spécifié comme critère de mise à jour
        return parent::update('gallery_images', $param_Data, $param_id);
    }

    /**
     * Supprime une instance de GalleryImages dans la base de données.
     * 
     * @param array $param_Data Données permettant de trouver l'élément à supprimer.
     * @return bool Retourne true si la suppression a réussi, sinon false.
     */
    public function deleteGalleryImages(array $param_Data) : bool
    {
        // Appel à la méthode delete de DatabaseManager pour supprimer des données de la table
        return parent::delete('gallery_images', $param_Data);
    }

    /**
     * Compte le nombre d'enregistrements de GalleryImages dans la base de données en fonction des paramètres.
     * 
     * @param array $param_Data Données à utiliser pour filtrer les enregistrements.
     * @param array $param_Parameters Paramètres supplémentaires pour la requête.
     * @return int Le nombre d'enregistrements correspondant aux critères.
     */
    public function countGalleryImages(array $param_Data = [], array $param_Parameters = []) : int
    {
        return parent::count('gallery_images', GalleryImages::class, $param_Data, $param_Parameters);
    }

    /**
     * Vide (TRUNCATE) la table gallery_images.
     * 
     * @return bool Retourne true si l'opération a réussi, sinon false.
     */
    public function truncateGalleryImages() : bool
    {
        // Appel à la méthode truncate de DatabaseManager pour supprimer toutes les lignes de la table
        return parent::truncate('gallery_images');
    }
}
