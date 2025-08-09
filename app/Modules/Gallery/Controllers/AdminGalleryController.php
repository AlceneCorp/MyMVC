<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Modules\Gallery\Managers\GalleryImagesManager;

class AdminGalleryController extends Controller
{
    /**
     * Liste toutes les images (admin)
     */
    public function index(): void
    {
        $manager = new GalleryImagesManager();
        $images  = $manager->findAllGalleryImages();

        $this->render('admin/viewGalleryList.twig', [
            'images' => $images
        ]);
    }

    /**
     * Formulaire d’upload d’image
     */
    public function upload(): void
    {
        $this->render('admin/viewGalleryUpload.twig');
    }

    public function generateSQL()
    {
        $databaseManager = new DatabaseManager();

        foreach($this->tables as $table => $req)
		{
			$databaseManager->generateModelClass($table, "App\\Modules\\{$this->moduleName}\\Models", "..\\app\\Modules\\{$this->moduleName}\\Models\\");
			$databaseManager->generateManagersClass($table, "App\\Modules\\{$this->moduleName}\\Models\\", "App\\Modules\\{$this->moduleName}\\Managers", "..\\app\\Modules\\{$this->moduleName}\\Managers\\");
		}
    }

    public function regenerateSQL()
    {
        $this->generateSQL();

        header("location: " . URL . "/admin/mods");
        exit;
    }
}