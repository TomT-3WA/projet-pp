<?php
declare(strict_types=1);

// Dépendance UserModel
require 'UserModel.php';

class Form {
    public bool $isValid = false;

    public array $error;

    public UserModel $userModel;

    public function __construct(PDO $pdo, string $name, string $pwd, string $email = null, string $avatar = null) {
        // Init des champs dans le model
        $this->userModel = new UserModel($name, $pwd, $email, $avatar, $pdo);
        $this->error = [];
    }

    // Connexion
    public function login(): bool {
        // Test empty pseudo depuis le user model
        if(!empty($this->userModel->getNickName())) {
            // Test empty Pwd depuis le user model
            if(!empty($this->userModel->getPassword())) {
                // Find User If exists
                if ($this->userModel->isMember()) {
                    // Tout s'est bien passé
                    return $this->isValid = true;
                } else {
                    array_push($this->error,$this->userModel->getError());
                }
            } else
            //var_dump($this->error);die;
                array_push($this->error,"Password vide");
        } else
            //var_dump($this->error);die;
            array_push($this->error,"Pseudo vide");

        // Mise à disposition des erreurs dans la session (créer un objet SESSION ???)
        // Count error
        return $this->isValid = false;
    }

    // Inscription
    public function signIn(): bool {
        // Test empty pseudo depuis le user model
        if(!empty($this->userModel->getNickName())) {
            // Test empty Pwd depuis le user model
            if(!empty($this->userModel->getPassword())) {
                // Test empty Pwd depuis le user model
                if(!empty($this->userModel->getEmail())
                    && filter_var($this->userModel->getEmail(), FILTER_VALIDATE_EMAIL)) {
                    // Find User If exists
                    if (is_numeric($this->userModel->insert(
                            $this->userModel->getNickName(),
                            $this->userModel->getPassword(),
                            $this->userModel->getEmail(),
                            $this->userModel->getAvatar()))) {
                        // Tout s'est bien passé
                        return $this->isValid = true;
                    } else {
                        array_push($this->error,$this->userModel->getError());
                    }
                } else
                    array_push($this->error,"Email vide");
            } else
            //var_dump($this->error);die;
                array_push($this->error,"Password vide");
        } else
            //var_dump($this->error);die;
            array_push($this->error,"Pseudo vide");

        // Mise à disposition des erreurs dans la session (créer un objet SESSION ???)
        // Count error
        return $this->isValid = false;
    }

    public function getError(): array {
        return $this->error ?? [];
    }

}