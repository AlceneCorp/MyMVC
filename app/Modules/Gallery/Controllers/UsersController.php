<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Managers\PermissionsManager;

use App\Modules\Gallery\Managers\GalleryImagesManager;
use App\Modules\Gallery\Managers\GalleryCategoriesManager;

class UsersController extends Controller
{
	public function list()
	{
		$imagesManager = new GalleryImagesManager();
        $catsManager   = new GalleryCategoriesManager();

        // 1) Récup des catégories
        $categories = $catsManager->findAllGalleryCategories(); // attends des entities avec getID/NAME/SLUG
        $groups = [];

        foreach ($categories as $c) {
            $cid = (int) $c->getID();
            $groups[$cid] = [
                'ID'     => $cid,
                'NAME'   => $c->getNAME(),
                'SLUG'   => $c->getSLUG(),
                'IMAGES' => [],
            ];
        }

        // 2) Récup de toutes les images (si beaucoup, vois la note perfs plus bas)
        $images = $imagesManager->findAllGalleryImages(); // entities avec getGALLERY_CATEGORY_ID(), getFILE_PATH(), etc.

        // 3) Dispatch des images dans leur catégorie (ou "Non classé")
        $UNCAT_KEY = 'UNCAT';
        $groups[$UNCAT_KEY] = [
            'ID'     => null,
            'NAME'   => 'Non classé',
            'SLUG'   => 'uncategorized',
            'IMAGES' => [],
        ];

        foreach ($images as $img) {
            $cid = $img->getGALLERY_CATEGORY_ID();
            if ($cid !== null && isset($groups[(int)$cid])) {
                $groups[(int)$cid]['IMAGES'][] = $img;
            } else {
                $groups[$UNCAT_KEY]['IMAGES'][] = $img;
            }
        }

        // 4) Ordonner : alpha par nom, "Non classé" en dernier
        $ordered = array_values($groups);
        usort($ordered, function ($a, $b) use ($UNCAT_KEY) {
            if ($a['ID'] === null && $b['ID'] !== null) return 1;
            if ($b['ID'] === null && $a['ID'] !== null) return -1;
            return strcasecmp($a['NAME'], $b['NAME']);
        });

        $this->render('user/galleryList.twig', [
            'groups' => $ordered,
            // passe aussi éventuellement baseAssetsUrl si tu l’utilises dans l’img src
        ]);
	}

	public function detail()
	{

		$this->render('user/galleryItem.twig');
	}
}