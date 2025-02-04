<?php

namespace App\Core;

use App\Core\ConfigManager;

class FileManager 
{
    public static function makeFolder(string $uploadDir): void
    {
        $path = __DIR__ . '\\..\\..\\public\\assets' . $uploadDir;
        
        if (!is_dir($path)) 
        {
            if (!mkdir($path, 0777, true) && !is_dir($path)) 
            {
                throw new \Exception('Impossible de créer le répertoire : ' . $uploadDir);
            }
        }
    }

    public static function uploadFile(string $uploadDir, string $inputName): ?string
    {
        self::makeFolder($uploadDir); // Assure que le dossier existe
        if (empty($_FILES[$inputName]['name'])) 
        {
            return null;
        }

        $file = $_FILES[$inputName];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $maxFileSize = ConfigManager::get('SITE.max_file_upload_size.value') * 1024 * 1024;


        if (!in_array($fileExtension, $allowedExtensions) || $file['size'] > $maxFileSize) 
        {
            return null;
        }

        

        $fileName = $file['name'];
        $uploadPath = $uploadDir . $fileName;
        $fullPath = __DIR__ . "\\..\\..\\public\\assets" . $uploadPath;


        return move_uploaded_file($file['tmp_name'], $fullPath) ? $uploadPath : null;
    }
}
