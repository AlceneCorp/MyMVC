<?php 

namespace App\Core;

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
