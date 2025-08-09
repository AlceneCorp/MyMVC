<?php

use App\Core\CoreManager;
use App\Core\ConfigManager;

return [
    // ===== ADMIN =====
    [
        'name' => 'Admin Galerie',
        'url' => '',
        'controller' => \App\Modules\Gallery\Controllers\AdminGalleryController::class,
        'method' => 'index',
        'params' => [],
        'perm' => 'manage_gallery',
        'icon' => '<i class="fas fa-images"></i>',
        'inMenu' => CoreManager::checkPerm('manage_gallery'),
        'children' => 
        [
            [
                'name' => 'Admin Galerie',
                'url' => ConfigManager::get('SITE.root_path.value').'/admin/gallery/',
                'controller' => \App\Modules\Gallery\Controllers\AdminGalleryController::class,
                'method' => 'index',
                'params' => [],
                'perm' => 'manage_gallery',
                'icon' => '<i class="fas fa-images"></i>',
                'inMenu' => CoreManager::checkPerm('manage_gallery'),
                'children' => []
            ],
            [
                'name' => 'Galerie - Upload',
                'url' => ConfigManager::get('SITE.root_path.value').'/admin/gallery/upload',
                'controller' => \App\Modules\Gallery\Controllers\AdminGalleryController::class,
                'method' => 'upload',
                'params' => [],
                'perm' => 'manage_gallery',
                'icon' => '<i class="fas fa-upload"></i>',
                'inMenu' => CoreManager::checkPerm('manage_gallery'),
                'children' => []
            ]
        ]
    ],

    // ===== PUBLIC / USER =====
    [
        'name' => 'Galerie',
        'url' => ConfigManager::get('SITE.root_path.value').'/gallery',
        'controller' => \App\Modules\Gallery\Controllers\UsersController::class,
        'method' => 'list',
        'params' => [],
        'perm' => 'view_gallery',
        'icon' => '<i class="fas fa-images"></i>',
        'inMenu' => true,
        'children' => []
    ],
    [
        'name' => 'Galerie - Détail',
        'url' => ConfigManager::get('SITE.root_path.value').'/gallery/{slug}',
        'controller' => \App\Modules\Gallery\Controllers\UsersController::class,
        'method' => 'detail',
        'params' => [],
        'perm' => 'view_gallery',
        'icon' => '<i class="fas fa-image"></i>',
        'inMenu' => false,
        'children' => []
    ],

    // ===== AJAX (ADMIN) =====
    [
        'name' => 'Galerie - AJAX Upload',
        'url' => ConfigManager::get('SITE.root_path.value').'/gallery/ajax/upload',
        'controller' => \App\Modules\Gallery\Controllers\AjaxGalleryController::class,
        'method' => 'upload',
        'params' => [],
        'perm' => 'manage_gallery',
        'icon' => '',
        'inMenu' => false,
        'children' => []
    ],
    [
        'name' => 'Galerie - AJAX Delete',
        'url' => ConfigManager::get('SITE.root_path.value').'/gallery/ajax/delete/{id}',
        'controller' => \App\Modules\Gallery\Controllers\AjaxGalleryController::class,
        'method' => 'delete',
        'params' => [],
        'perm' => 'manage_gallery',
        'icon' => '',
        'inMenu' => false,
        'children' => []
    ],
    [
        'name' => 'Galerie - AJAX Update',
        'url' => ConfigManager::get('SITE.root_path.value').'/gallery/ajax/update/{id}',
        'controller' => \App\Modules\Gallery\Controllers\AjaxGalleryController::class,
        'method' => 'update',
        'params' => [],
        'perm' => 'manage_gallery',
        'icon' => '',
        'inMenu' => false,
        'children' => []
    ],
	[
		'name' => '',
		'url' => ConfigManager::get('SITE.root_path.value').'/admin/gallery/regenerate',
		'controller' => \App\Modules\Gallery\Controllers\GalleryController::class,
		'method' => 'regenerateSQL',
		'params' => [],
		'perm' => 'manage_gallery',
		'icon' => '',
		'inMenu' => false,
		'children' => []
	]
];
