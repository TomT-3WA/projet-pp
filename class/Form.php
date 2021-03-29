<?php
declare(strict_types=1);

// Dépendance UserModel
require 'UserModel.php';

class Form {
    public bool $statut = false;

    public array $error;

    public UserModel $userModel;

    public function __construct(PDO $pdo, string $name, string $pwd, string $email = null, string $avatar = null) {
        // Init des champs dans le model
        $this->userModel = new UserModel($name, $pwd, $pdo);
        $this->error = [];
    }

    // Connexion
    public function login(): bool {
        // Test empty pseudo depuis le user model
        if(!empty($this->userModel->getPseudo())) {
            // Test empty Pwd depuis le user model
            if(!empty($this->userModel->getMdp())) {
                // Find User If exists
                if ($this->userModel->isMember()) {
                    // Tout s'est bien passé
                    return $this->statut = true;
                } else {
                    array_push($this->error,$this->userModel->getError());
                }
            } else
            //var_dump($this->error);die;
                array_push($this->error,"Mot de passe vide");
        } else
            //var_dump($this->error);die;
            array_push($this->error,"Pseudo vide");

        // Mise à disposition des erreurs dans la session (créer un objet SESSION ???)
        // Count error
        return $this->statut = false;
    }

    // Inscription
    public function signIn(): bool {
        // Test empty pseudo depuis le user model
        if(!empty($this->userModel->getPseudo())) {
            // Test empty Pwd depuis le user model
            if(!empty($this->userModel->getMdp())) {
                // Test empty Pwd depuis le user model
            } else
            //var_dump($this->error);die;
                array_push($this->error,"Mot de passe vide");
        } else
            //var_dump($this->error);die;
            array_push($this->error,"Pseudo vide");

        // Mise à disposition des erreurs dans la session (créer un objet SESSION ???)
        // Count error
        return $this->statut = false;
    }

    public function getError(): array {
        return $this->error ?? [];
    }

}