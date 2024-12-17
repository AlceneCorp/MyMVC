<?php

namespace App\Core;

class SettingsManager
{
    /**
     * Contenu des paramètres chargés.
     * @var array
     */
    private static array $settings = [];

    /**
     * Charge les paramètres depuis un fichier PHP.
     */
    private static function load(string $filePath): void
    {
        if (file_exists($filePath)) 
        {
            // Inclure le fichier PHP qui retourne le tableau de configuration
            self::$settings = include $filePath;
        }
        else
        {
            die('Fichier de configuration introuvable.');
        }
    }

    /**
     * Initialise la classe avec le fichier de configuration.
     *
     * @param string $filePath Chemin vers le fichier de configuration PHP.
     */
    public static function init(string $filePath): void
    {
        self::load($filePath);
    }

    /**
     * Récupère une valeur de configuration.
     *
     * @param string $key
     * @param mixed $default Valeur par défaut si la clé n'existe pas.
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return self::$settings[$key] ?? $default;
    }

    /**
     * Définit une valeur de configuration.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, $value): void
    {
        self::$settings[$key] = $value;
    }

    /**
     * Vérifie si une clé de configuration existe.
     *
     * @param string $key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        return array_key_exists($key, self::$settings);
    }

    /**
     * Supprime une clé de configuration.
     *
     * @param string $key
     */
    public static function remove(string $key): void
    {
        unset(self::$settings[$key]);
    }

    /**
     * Récupère tous les paramètres.
     *
     * @return array
     */
    public static function getAll(): array
    {
        return self::$settings;
    }
}
