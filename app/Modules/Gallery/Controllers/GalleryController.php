<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Managers\PermissionsManager;

class GalleryController extends Controller
{
    private array $tables = 
    [
        'gallery_categories' => "CREATE TABLE `gallery_categories` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `NAME` varchar(255) NOT NULL,
            `SLUG` varchar(255) NOT NULL,
            `CREATED_AT` datetime NOT NULL,
            PRIMARY KEY (`ID`),
            UNIQUE KEY `UQ_GALLERY_CATEGORIES_SLUG` (`SLUG`),
            UNIQUE KEY `UQ_GALLERY_CATEGORIES_NAME` (`NAME`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;",

        'gallery_images' => "CREATE TABLE `gallery_images` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `GALLERY_CATEGORY_ID` int(11) DEFAULT NULL,
            `TITLE` text NOT NULL,
            `DESCRIPTION` text NOT NULL,
            `FILE_PATH` text NOT NULL,
            `SLUG` varchar(255) NOT NULL,
            `CREATED_AT` datetime NOT NULL,
            PRIMARY KEY (`ID`),
            KEY `IDX_GALLERY_IMAGES_CATEGORY` (`GALLERY_CATEGORY_ID`),
            CONSTRAINT `FK_GALLERY_IMAGES_CATEGORY`
                FOREIGN KEY (`GALLERY_CATEGORY_ID`) REFERENCES `gallery_categories` (`ID`)
                ON DELETE SET NULL ON UPDATE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;"
    ];

    private array $permissions = [
        [
            'NAME' => 'manage_gallery',
            'FULLNAME' => 'Gérer la galerie',
            'DESCRIPTION' => 'Permet d’ajouter, modifier et supprimer des images dans la galerie.',
            'ORDERS' => 10,
            'AUTO_ATTRIBUTE' => 0
        ],
        [
            'NAME' => 'view_gallery',
            'FULLNAME' => 'Voir la galerie',
            'DESCRIPTION' => 'Permet de voir les images de la galerie.',
            'ORDERS' => 10,
            'AUTO_ATTRIBUTE' => 1
        ]
    ];

    private $moduleName = "Gallery";

    public function install()
    {
        $permissionsManager = new PermissionsManager();
        $databaseManager = new DatabaseManager();

        // Création des tables
        foreach ($this->tables as $req) {
            $databaseManager->rawQuery($req);
        }

        // Génération des classes Model/Manager
        $this->generateSQL();

        // Ajout des permissions
        foreach ($this->permissions as $permission) {
            $permissionsManager->addPermissions($permission);
        }
    }

    public function generateSQL()
    {
        $databaseManager = new DatabaseManager();

        foreach ($this->tables as $table => $req) {
            $databaseManager->generateModelClass(
                $table,
                "App\\Modules\\{$this->moduleName}\\Models",
                "..\\app\\Modules\\{$this->moduleName}\\Models\\"
            );
            $databaseManager->generateManagersClass(
                $table,
                "App\\Modules\\{$this->moduleName}\\Models\\",
                "App\\Modules\\{$this->moduleName}\\Managers",
                "..\\app\\Modules\\{$this->moduleName}\\Managers\\"
            );
        }
    }

    public function regenerateSQL()
    {
        $this->generateSQL();
        header("location: " . URL . "/admin/mods");
        exit;
    }

    public function uninstall()
    {
        $permissionsManager = new PermissionsManager();
        $databaseManager = new DatabaseManager();

        // Suppression des tables
        foreach ($this->tables as $table => $req) {
            $databaseManager->rawQuery("DROP TABLE IF EXISTS {$table}");
        }

        // Suppression des permissions
        foreach ($this->permissions as $permission) {
            $permissionsManager->deletePermissions($permission);
        }
    }
}
