<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Core\FileManager;
use App\Core\ConfigManager;
use App\Core\CoreManager;

use App\Modules\Gallery\Managers\GalleryImagesManager;
use App\Modules\Gallery\Managers\GalleryCategoriesManager;

class AjaxGalleryController extends Controller
{
    /**
     * Upload d’une image
     */
    public function upload(): void
    {
        $galleryImagesManager     = new GalleryImagesManager();
        $galleryCategoriesManager = new GalleryCategoriesManager();

        // 1) Fichier présent ?
        if (empty($_FILES['image']) || empty($_FILES['image']['name']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $this->json(['ok' => false, 'error' => 'NO_FILE']);
            return;
        }

        // 2) Taille max
        $maxBytes = (int) ConfigManager::get('SITE.max_file_upload_size.value') * 1024 * 1024;
        if ((int)$_FILES['image']['size'] > $maxBytes) {
            $this->json(['ok' => false, 'error' => 'FILE_TOO_LARGE']);
            return;
        }

        // (facultatif) 3) Sécurité MIME
        if (class_exists('finfo')) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime  = $finfo->file($_FILES['image']['tmp_name']);
            $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
            if (!in_array($mime, $allowed, true)) {
                $this->json(['ok' => false, 'error' => 'INVALID_MIME']);
                return;
            }
        }

        // 4) Catégorie (par NOM) -> slug + ID
        $categoryName = trim($_POST['category'] ?? '');
        $categorySlug = $categoryName !== '' ? CoreManager::slug($categoryName) : 'uncategorized';

        // On cherche d’abord par SLUG (plus stable), sinon par NAME
        $categorie = $galleryCategoriesManager->findOneGalleryCategories(['SLUG' => $categorySlug]);
        if (!$categorie && $categoryName !== '') {
            $categorie = $galleryCategoriesManager->findOneGalleryCategories(['NAME' => $categoryName]);
        }

        if ($categorie) {
            $categorie_id = (int) $categorie->getID();
            // Option : si le NAME diffère mais que c'est bien la même catégorie, on peut le resync
            if (method_exists($categorie, 'getNAME') && $categorie->getNAME() !== $categoryName && $categoryName !== '') {
                $galleryCategoriesManager->updateGalleryCategories([
                    'NAME' => $categoryName,
                    'SLUG' => $categorySlug
                ], $categorie_id);
            }
        } else {
            // Création si nom donné, sinon NULL (non classée)
            $categorie_id = $categoryName !== '' ? (int) $galleryCategoriesManager->addGalleryCategories([
                'NAME'       => $categoryName,
                'SLUG'       => $categorySlug,
                'CREATED_AT' => date('Y-m-d H:i:s'),
            ]) : null;
        }

        // 5) Dossier d’upload (toujours en / pour cohérence URL)
        $uploadDir = '/images/gallery/' . $categorySlug . '/';

        // 6) Upload physique
        $upload = FileManager::uploadFile($uploadDir, 'image');
        if (!$upload) {
            $this->json(['ok' => false, 'error' => 'UPLOAD_FAILED']);
            return;
        }

        // Certaines libs renvoient le chemin final (avec renommage anti-collision)
        $storedPath = is_array($upload) && !empty($upload['path'])
            ? $upload['path']
            : ($uploadDir . $_FILES['image']['name']);

        // 7) Déduplication par FILE_PATH
        $image = $galleryImagesManager->findOneGalleryImages(['FILE_PATH' => $storedPath]);

        // SLUG image à partir du nom réel
        $filename  = basename($storedPath);
        $imageSlug = CoreManager::slug(pathinfo($filename, PATHINFO_FILENAME));

        $payload = [
            'TITLE'               => $_POST['title'] ?? '',
            'DESCRIPTION'         => $_POST['description'] ?? '',
            'FILE_PATH'           => $storedPath,
            'GALLERY_CATEGORY_ID' => $categorie_id,
            'SLUG'                => $imageSlug,
            'CREATED_AT'          => date('Y-m-d H:i:s'),
        ];

        if ($image) {
            $galleryImagesManager->updateGalleryImages($payload, $image->getID());
            $id = (int) $image->getID();
        } else {
            $id = (int) $galleryImagesManager->addGalleryImages($payload);
        }

        // 8) Réponse JSON propre
        $this->json(['ok' => true, 'id' => $id, 'path' => $storedPath]);
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