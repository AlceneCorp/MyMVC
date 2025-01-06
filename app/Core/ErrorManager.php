<?php

namespace App\Core;

class ErrorManager
{
    /**
     * Liste des messages d'erreur.
     *
     * @var array
     */
    private static array $errorMessages = 
    [
        400 => "Requête invalide. Veuillez vérifier votre demande.",
        401 => "Accès non autorisé. Vous devez être connecté pour accéder à cette page.",
        402 => "Paiement requis. Cette ressource nécessite une action de paiement.",
        403 => "Accès interdit. Vous n'avez pas les permissions nécessaires.",
        404 => "Ressource introuvable. La page demandée n'existe pas.",
        500 => "Erreur interne du serveur. Veuillez réessayer plus tard.",
        503 => "Service indisponible. Le serveur est actuellement surchargé ou en maintenance.",

        80001 => "Echec de la tentative de connexion",
        80002 => "Identifiants incorrects, veuillez réessayer.",
        80003 => "Veuillez entrer un autre nom d\'utilisateur.",
        80004 => "Une erreur est survenue lors de l\'inscription. Veuillez réessayer.",
        80005 => "Veuillez entrer un email valide et un mot de passe d\'au moins 8 caractères.",
        80006 => "Les mots de passe ne correspondent pas.",
        80007 => "Tous les champs doivent être remplis."
    ];

    /**
     * Récupère le message d'erreur associé à un code d'erreur.
     *
     * @param int $errorCode
     * @return string
     */
    public static function getErrorMessage(int $errorCode): string
    {
        return self::$errorMessages[$errorCode] ?? "Erreur inconnue. Veuillez contacter l'administrateur.";
    }

    /**
     * Ajoute ou met à jour un message d'erreur personnalisé.
     *
     * @param int $errorCode
     * @param string $errorMessage
     * @return void
     */
    public static function addOrUpdateErrorMessage(int $errorCode, string $errorMessage): void
    {
        self::$errorMessages[$errorCode] = $errorMessage;
    }

    /**
     * Supprime un message d'erreur de la liste.
     *
     * @param int $errorCode
     * @return void
     */
    public static function removeErrorMessage(int $errorCode): void
    {
        unset(self::$errorMessages[$errorCode]);
    }

    /**
     * Retourne la liste complète des messages d'erreur.
     *
     * @return array
     */
    public static function getAllErrorMessages(): array
    {
        return self::$errorMessages;
    }
}
