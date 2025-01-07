<?php 

namespace App\Core;

use App\Core\ErrorManager;

use App\Managers\SettingsManager;
use App\Managers\SettingsCategoriesManager;

/**
 * Class ConfigManager
 * 
 * Gère les configurations de l'application en permettant le chargement, 
 * la définition, la récupération et la manipulation de paramètres de configuration.
 */
class ConfigManager
{
    /**
     * @var array Contient les paramètres de configuration chargés.
     */
    private static array $settings = [];

    /**
     * Charge les paramètres de configuration depuis un tableau ou un fichier PHP.
     *
     * @param array|string $config Le tableau de configuration ou le chemin vers un fichier PHP de configuration.
     * @throws \Exception Si le fichier spécifié n'existe pas ou ne peut pas être inclus.
     */
    private static function load($config): void
    {
        if (is_array($config)) 
        {
            self::$settings = $config;
        } 
        elseif (file_exists($config)) 
        {
            self::$settings = include $config;
        } 
        else 
        {
            throw new \Exception(ErrorManager::getErrorMessage(10000));
        }
    }

    /**
     * Initialise la classe ConfigManager avec les configurations données.
     *
     * @param array|string $config Le tableau de configuration ou le chemin vers un fichier PHP de configuration.
     * @throws \Exception Si une erreur survient lors du chargement des configurations.
     */
    public static function init($config): void
    {
        try 
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
        catch (\Exception $e) 
        {
            throw new \Exception(ErrorManager::getErrorMessage(10001) . $e->getMessage());
        }
    }

    /**
     * Récupère une valeur de configuration.
     *
     * @param string $key La clé de la configuration à récupérer, peut utiliser une syntaxe en point pour les sous-clés.
     * @param mixed $default La valeur par défaut à retourner si la clé n'est pas trouvée.
     * @return mixed La valeur de configuration ou la valeur par défaut si non trouvée.
     */
    public static function get(string $key, $default = null)
    {
        if (strpos($key, '.') !== false) 
        {
            $keys = explode('.', $key);
            $value = self::$settings;

            foreach ($keys as $keyPart) 
            {
                if (!isset($value[$keyPart])) 
                {
                    return $default;
                }
                $value = $value[$keyPart];
            }

            return $value;
        }

        return self::$settings[$key] ?? $default;
    }

    /**
     * Définit une valeur de configuration.
     *
     * @param string $key La clé de configuration à définir.
     * @param mixed $value La valeur à définir pour la clé donnée.
     */
    public static function set(string $key, $value): void
    {
        self::$settings[$key] = $value;
    }

    /**
     * Vérifie si une clé de configuration existe.
     *
     * @param string $key La clé à vérifier.
     * @return bool True si la clé existe, sinon False.
     */
    public static function exists(string $key): bool
    {
        return array_key_exists($key, self::$settings);
    }

    /**
     * Supprime une clé de configuration.
     *
     * @param string $key La clé à supprimer.
     */
    public static function remove(string $key): void
    {
        unset(self::$settings[$key]);
    }

    /**
     * Récupère tous les paramètres de configuration.
     *
     * @return array Un tableau contenant toutes les configurations chargées.
     */
    public static function getAll(): array
    {
        return self::$settings;
    }

    /**
     * Affiche la configuration à des fins de débogage.
     * 
     * Note: Cette méthode ne doit être utilisée que dans des environnements de développement.
     */
    public static function debug(): void
    {
        var_dump(self::$settings);
    }
}