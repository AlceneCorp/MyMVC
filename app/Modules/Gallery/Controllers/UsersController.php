<?php

namespace App\Modules\Gallery\Controllers;

use App\Core\Controller;
use App\Core\DatabaseManager;
use App\Managers\PermissionsManager;

use App\Modules\Gallery\Managers\GalleryImagesManager;

class UsersController extends Controller
{
	public function list()
	{
		$manager = new GalleryImagesManager();
		$images = $manager->findAllGalleryImages();


		$this->render('user/galleryList.twig', ['images' => $images]);
	}

	public function detail()
	{

		$this->render('user/galleryItem.twig');
	}
}