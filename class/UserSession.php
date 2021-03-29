<?php
declare(strict_types=1);

// Ici il faudra appeler la dependance permettant de se connecter à une bdd

class UserSession {
    public static function init() {
        // test if session exists or not
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function connectUser(string $nom, string $role): void {
        $_SESSION['utilisateurs']['nom'] = $nom;
        $_SESSION['utilisateurs']['role'] = $role;
    }

    public static function disconnectUser(string $nom): void {
        if($_SESSION['utilisateurs']['nom'] === $nom) {
            unset($_SESSION['utilisateurs']);
            session_destroy();
        }
    }

    public static function isConnected(): bool {
        return !empty($_SESSION['utilisateurs']['nom']) ? true : false;
    }

    /**
     * TODO Error
     */
    public static function getUserConnected(): string{
        return self::isConnected() ? $_SESSION['utilisateurs']['nom'] : 'Nom Inconnu';
    }

    /**
     * TODO Error
     */
    public static function getUserRole(): string {
        return self::isConnected() ? $_SESSION['user']['role'] : 'Role Inconnu';
    }

}