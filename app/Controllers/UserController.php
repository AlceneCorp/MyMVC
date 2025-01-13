<?php

namespace App\Controllers;

use App\Core\CoreManager;
use App\Core\Controller;
use App\Core\SessionsManager;
use App\Core\ConfigManager;

use App\Managers\UsersManager;
use App\Managers\UsersProfileManager;



class UserController extends Controller
{
	public function myProfil()
    {
        $usersManager = new UsersManager();
        $usersProfileManager = new UsersProfileManager();
        $user_id = SessionsManager::get('USERS')->getID();

        if(isset($_POST))
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['USERS_ID'] ?? $user_id;

                $uploadDir = '\\images\\avatars\\' . $userId . '\\';

                if (!is_dir(__DIR__ . '\\..\\..\\public\\assets' . $uploadDir)) 
                {
                    if (!mkdir(__DIR__ . '\\..\\..\\public\\assets' . $uploadDir, 0777, true) && !is_dir(__DIR__ . '\\..\\..\\public\\assets' . $uploadDir)) 
                    {
                        // Gestion d'erreur si le répertoire ne peut pas être créé
                        throw new \Exception('Impossible de créer le répertoire : ' . $uploadDir);
                    }
                }

                if (CoreManager::checkPerm('edit_other_profiles')) 
                {
                    // Permet de modifier le profil de quelqu'un en ayant la permission
                }

                $firstName = $_POST['FIRST_NAME'] ?? null;
                $lastName = $_POST['LAST_NAME'] ?? null;
                $email = $_POST['EMAIL'] ?? null;
                $phoneNumber = $_POST['PHONE_NUMBER'] ?? null;
                $birthday = $_POST['BIRTHDAY'] ?? null;
                $gender = $_POST['GENDER'] ?? null;
                $address = $_POST['ADDRESS'] ?? null;
                $aboutMe = $_POST['ABOUT_ME'] ?? null;

                // Gestion de l'upload de l'image
                $profilePictureUrl = null;
                if (!empty($_FILES['PROFILE_PICTURE']['name'])) 
                {
                    $file = $_FILES['PROFILE_PICTURE'];

                    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    $maxFileSize = ConfigManager::get('SITE.max_file_upload_size.value') * 1024 * 1024;

                    // Vérifications
                    if (in_array(strtolower($fileExtension), $allowedExtensions) && $file['size'] <= $maxFileSize) 
                    {
                        $fileName = $file['name'] . '.' . $fileExtension;
                        $uploadPath = $uploadDir . $fileName;
                        // Déplacer le fichier
                        if (move_uploaded_file($file['tmp_name'], __DIR__ . '\\..\\..\\public\\assets\\' . $uploadPath)) 
                        {
                            $profilePictureUrl = $uploadPath;
                            
                        }
                    } 
                }

                $datas = [
                        'FIRST_NAME' => $firstName,
                        'LAST_NAME' => $lastName,
                        'EMAIL' => $email,
                        'PHONE_NUMBER' => $phoneNumber,
                        'BIRTHDAY' => $birthday,
                        'GENDER' => $gender,
                        'ADDRESS' => $address,
                        'ABOUT_ME' => $aboutMe,
                        'PROFILE_PICTURE' => $profilePictureUrl
                    ];

                $userProfile = $usersProfileManager->findOneUsersProfile(['USERS_ID' => $userId]);

                if($userProfile)
                {
                    $userProfileId = $userProfile->getID();
                }
                else
                {
                    //Le profil utilisateur n'existe pas alors on le créé
                    $userProfileId = $usersProfileManager->addUsersProfile(['USERS_ID' => $userId]);

                    CoreManager::addLogs('INFO', 'USERS', "Profil utilisateur créé pour l'ID utilisateur $userId.");
                }

                // Filtrage des données pour ne conserver que celles qui ne sont pas null
                foreach ($datas as $key => $value) 
                {
                    if ($value !== null && $value !== '') 
                    {
                        // Mise à jour du profil pour chaque champ non nul
                        $usersProfileManager->updateUsersProfile([$key => $value], $userProfileId);
                    }
                }  
            }
        }

        $this->render('user/myprofil.twig', [
            'user' => $usersManager->findOneUsers(['ID' => $user_id]),
            'profile' => $usersProfileManager->findOneUsersProfile(['USERS_ID' => $user_id]),
        ]);
    }

}