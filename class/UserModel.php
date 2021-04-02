<?php
declare(strict_types=1);

// Ici il faudra appeler la dependance permettant de se connecter à une bdd

class UserModel {
    private int $id;
    private string $nickName;
    private string $password;
    private string $email;
    private string $avatar;
    private DateTime $created_at;

    private bool $isValid = false;
    private PDO $connect;
    private string $errorMsg;

    public function __construct(string $nickName, string $password, string $email, string $avatar, PDO $pdo) {
        $this->nickName = $nickName;
        $this->password = $password;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->created_at = new DateTime;

        $this->connect = $pdo;
    }

    // Getters / Setters
    public function getNickName(): string {
        return $this->nickName;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getAvatar(): string {
        return $this->avatar;
    }

    // Methods
    public function getError(): string {
        return $this->errorMsg;
    }

    // Methods Datas Access
    public function isMember(): bool {
        try {
            // Get datas from db to match user
            if ($user = $this->findByNickname($this->nickName)) {
                // Test si correspondance avec les datas existantes
                if($this->nickName === $user['pseudo']) {
                    // Test si correspondance avec les datas existantes
                    if($this->password === $user['mdp']) {
                        return $this->isValid = true;
                    } else
                        throw new PDOException("Mot de pass incorrect");
                } else
                    throw new PDOException("Nickname incorrect");
            } else
                throw new PDOException("Utilisateur inconnu");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->isValid = false;
    }

    public function findByNickname(string $pseudo): ?array {
        // SELECT name, pwd, email From user Where name LIKE %'value'%
        $sql = "SELECT id_utilisateur, pseudo, mdp, email, created_at From utilisateurs Where pseudo LIKE :pseudo";

        // Contruire la requête
        $q = $this->connect->prepare($sql);

        // Transmettre le paramètre
        $q->execute([':pseudo' => "%".$pseudo."%"]);

        $user = $q->fetch();

        // Récupérer le résultat
        // Renvoi du résultat
        return !$user ? [] : $user;
    }

    public function findByEmail(string $email): ?array {
        // SELECT name, pwd, email From user Where name LIKE %'value'%
        $sql = "SELECT id_utilisateur, pseudo, mdp, email, created_at From utilisateurs Where email LIKE :email";

        // Contruire la requête
        $q = $this->connect->prepare($sql);

        // Transmettre le paramètre
        $q->execute([':email' => "%".$email."%"]);

        $user = $q->fetch();

        // Récupérer le résultat
        // Renvoi du résultat
        return !$user ? [] : $user;
    }

    // Insert One
    public function insert(string $nickName, string $pass, string $email, string $avatar='') {
        // Vérifier le doublon
        try {
            // Get datas from db to match user
            if ($user = $this->findByNickname($this->nickName) || $user = $this->findByEmail($this->email)) {
                // Membre déjà existant
                throw new PDOException("Un utilisateur existe déjà avec ce pseudo ou email !!! ");
            } else {
                // Insertion du user
                // SELECT name, pwd, email From user Where name LIKE %'value'%
                $sql =
                    "INSERT INTO `utilisateurs`(`pseudo`, `email`, `mdp`, `photo_utilisateur`, `created_at`)
                    VALUES (:pseudo, :email, :pass, :avatar, now())";

                // Contruire la requête
                $q = $this->connect->prepare($sql);

                // Transmettre le paramètre
                $q->execute([
                    ':pseudo' => $nickName,
                    ':email'  => $email,
                    ':pass'   => $pass,
                    ':avatar' => empty($avatar) ? null : $avatar
                ]);

                return $q->lastInsertId;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        return $this->isValid = false;

    }

}