<?php 

namespace App\Core;

use App\Managers\SettingsManager;
use App\Managers\SettingsCategoriesManager;

class ConfigManager
{
    private static array $settings = [];

    // Charge les paramètres depuis un tableau ou un fichier PHP
    private static function load($config): void
    {
        if (is_array($config)) {
            self::$settings = $config;
        } elseif (file_exists($config)) {
            self::$settings = include $config;
        }
    }

    // Initialise la classe avec un fichier ou un tableau
    public static function init($config): void
    {
        self::load($config);

        $settingsCategoriesManager = new SettingsCategoriesManager();
        $settingsManager = new SettingsManager();


        foreach ($settingsCategoriesManager->findAllSettingsCategories() as $settingscategorie) 
        {
            $categoryName = $settingscategorie->getNAME();
            $arraySettings = [];

            // Initialiser la catégorie si elle n'existe pas déjà dans ConfigManager
            if (!ConfigManager::exists($categoryName)) 
            {
                ConfigManager::set($categoryName, []);
            }

            // Boucle pour ajouter les paramètres dans la catégorie
            foreach ($settingsManager->findAllSettings(['AUTOLOAD' => 1]) as $setting) 
            {
                $settingKey = $setting->getNAME();
                $settingValue = $setting->getVALUE();

                // Vérifier si la clé existe déjà dans la catégorie, pour éviter de l'écraser
                $existingCategory = ConfigManager::get($categoryName);

                // Ajouter ou mettre à jour le paramètre dans la catégorie
                $existingCategory[$settingKey] = [
                    'value' => $settingValue,
                    'type' => $setting->getTYPE(),
                    'description' => $setting->getDESCRIPTION(),
                    'readonly' => false
                ];

                // Enregistrer à nouveau la catégorie avec les paramètres mis à jour
                ConfigManager::set($categoryName, $existingCategory);
            }
        }
    }

    // Récupère une valeur de configuration
    public static function get(string $key, $default = null)
    {
        if (strpos($key, '.') !== false) {
            $keys = explode('.', $key);
            $value = self::$settings;

            foreach ($keys as $keyPart) {
                if (!isset($value[$keyPart])) {
                    return $default;
                }
                $value = $value[$keyPart];
            }

            return $value;
        }

        return self::$settings[$key] ?? $default;
    }

    // Définit une valeur de configuration
    public static function set(string $key, $value): void
    {
        self::$settings[$key] = $value;
    }

    // Vérifie si une clé existe
    public static function exists(string $key): bool
    {
        return array_key_exists($key, self::$settings);
    }

    // Supprime une clé de configuration
    public static function remove(string $key): void
    {
        unset(self::$settings[$key]);
    }

    // Récupère tous les paramètres
    public static function getAll(): array
    {
        return self::$settings;
    }

    // Pour déboguer et afficher la configuration
    public static function debug(): void
    {
        var_dump(self::$settings);
    }
}
