<?php

namespace App\Core;

class SessionsManager
{
    /**
     * Démarre une session si elle n'est pas déjà active.
     */
    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }
    }

    /**
     * Définit une valeur dans la session.
     *
     * @param string $key La clé de la donnée.
     * @param mixed $value La valeur associée.
     */
    public static function set(string $key, mixed $value): void
    {
        self::startSession();
        $_SESSION[URL][$key] = $value;
    }

    /**
     * Récupère une valeur depuis la session.
     *
     * @param string $key La clé de la donnée.
     * @param mixed $default Valeur par défaut si la clé n'existe pas.
     * @return mixed La valeur de la session ou la valeur par défaut.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        self::startSession();
        return $_SESSION[URL][$key] ?? $default;
    }

    /**
     * Vérifie si une clé existe dans la session.
     *
     * @param string $key La clé à vérifier.
     * @return bool True si la clé existe, sinon False.
     */
    public static function has(string $key): bool
    {
        self::startSession();
        return isset($_SESSION[URL][$key]);
    }

    /**
     * Supprime une clé de la session.
     *
     * @param string $key La clé à supprimer.
     */
    public static function remove(string $key): void
    {
        self::startSession();
        unset($_SESSION[URL][$key]);
    }

    /**
     * Vide complètement la session.
     */
    public static function clear(): void
    {
        self::startSession();
        session_unset();
    }

    /**
     * Détruit la session en cours.
     */
    public static function destroy(): void
    {
        if (session_status() !== PHP_SESSION_NONE) {
            session_unset();
            session_destroy();
        }
    }
}
