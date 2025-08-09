<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Core\FileManager;
use App\Core\ConfigManager;
use App\Core\CoreManager;

use App\Modules\Gallery\Managers\GalleryImagesManager;

class AjaxGalleryController extends Controller
{
    /**
     * Upload d’une image
     */
    public function upload(): void
    {
        $manager = new GalleryImagesManager();

        if (empty($_FILES['image']['name'])) 
        {
            $this->json(['ok' => false, 'error' => 'NO_FILE']);
            return;
        }


        $maxMo   = ConfigManager::get('SITE.max_file_upload_size.value') * 1024 * 1024;

        // Vérification taille
        if ($_FILES['image']['size'] > $maxMo) 
        {
            $this->json(['ok' => false, 'error' => 'FILE_TOO_LARGE']);
            return;
        }
        $uploadDir = "\\images\\gallery\\". CoreManager::slug($_POST['category']) ."\\";
        // Upload du fichier
        $upload = FileManager::uploadFile($uploadDir, 'image');

        if (!$upload) 
        {
            //$this->json(['ok' => false, 'error' => 'UPLOAD_FAILED']);
            echo json_encode(['ok' => false, 'error' => 'UPLOAD_FAILED']);
            return;
        }

        $image = $manager->findOneGalleryImages(['FILE_PATH' => $uploadDir . $_FILES['image']['name']]);

        if($image)
        {
            // Sauvegarde en DB
            $manager->updateGalleryImages([
                'TITLE'       => $_POST['title'] ?? '',
                'DESCRIPTION' => $_POST['description'] ?? '',
                'FILE_PATH'   => $uploadDir . $_FILES['image']['name'],
                'CATEGORY'    => $_POST['category'] ?? '',
                'SLUG'        => CoreManager::slug($_FILES['image']['name']) ?? '',
                'CREATED_AT'  => date('Y-m-d H:i:s'),
            ], $image->getID());
        }
        else
        {
            // Sauvegarde en DB
            $id = $manager->addGalleryImages([
                'TITLE'       => $_POST['title'] ?? '',
                'DESCRIPTION' => $_POST['description'] ?? '',
                'FILE_PATH'   => $uploadDir . $_FILES['image']['name'],
                'CATEGORY'    => $_POST['category'] ?? '',
                'SLUG'        => CoreManager::slug($_FILES['image']['name']) ?? '',
                'CREATED_AT'  => date('Y-m-d H:i:s'),
            ]);
        }

        

        //$this->json(['ok' => true, 'id' => $id, 'path' => $upload['path']]);
    }

    /**
     * Suppression d’une image
     */
    public function delete(int $id): void
    {
        $manager = new GalleryImagesManager();
        $ok = $manager->deleteGalleryImages([ "ID" => $id]);

        $this->json(['ok' => (bool)$ok]);
    }

    /**
     * Mise à jour des infos d’une image
     */
    public function update(int $id): void
    {
        $manager = new GalleryImagesManager();
        $ok = $manager->updateGalleryImages([
            'TITLE'       => $_POST['title'] ?? '',
            'DESCRIPTION' => $_POST['description'] ?? '',
            'CATEGORY'    => $_POST['category'] ?? '',
        ], $id);

        $this->json(['ok' => (bool)$ok]);
    }
}