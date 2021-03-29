<?php
declare(strict_types=1);

// Ici il faudra appeler la dependance permettant de se connecter à une bdd

class UserModel {
    private int $id_utilisateur;
    private string $pseudo;
    private string $mdp;
    private string $email;
    private string $photo_utilisateur;
    private DateTime $created_at;

    private bool $statut = false;
    private PDO $connect;
    private string $errorMsg;

    public function __construct(string $pseudo, string $mdp, string $email, PDO $pdo) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->email = $email;
        $this->created_at = new DateTime;

        $this->connect = $pdo;
    }

    // Getters / Setters
    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getMdp(): string {
        return $this->mdp;
    }

    // Methods
    public function getError(): string {
        return $this->errorMsg;
    }

    // Methods Datas Access
    public function isMember(): bool {
        try {
            // Get datas from db to match user
            if ($user = $this->findByPseudo($this->pseudo)) {
                // Test si correspondance avec les datas existantes
                if($this->pseudo === $user['pseudo']) {
                    // Test si correspondance avec les datas existantes
                    if($this->mdp === $user['mdp']) {
                        return $this->statut = true;
                    } else
                        throw new PDOException("Mot de pass incorrect");
                } else
                    throw new PDOException("Pseudo incorrect");
            } else
                throw new PDOException("Utilisateur inconnu");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        return $this->statut = false;
    }

    public function findByPseudo(string $pseudo): ?array {
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
    public function insert(string $pseudo, string $mdp, string $email, string $photo_utilisateur='') {
        // Vérifier le doublon
        try {
            // Get datas from db to match user
            if ($user = $this->findByPseudo($this->pseudo) || $user = $this->findByEmail($this->email)) {
                // Membre déjà existant
                throw new PDOException("Un utilisateur existe déjà avec ce pseudo ou email !!! ");
            } else {
                // Insertion du user
                // SELECT name, pwd, email From user Where name LIKE %'value'%
                $sql =
                    "INSERT INTO `utilisateurs`(`pseudo`, `email`, `mdp`, `photo_utilisateur`, `created_at`)
                    VALUES (:pseudo, :email, :mdp, :photo_utilisateur, now())";

                // Contruire la requête
                $q = $this->connect->prepare($sql);

                // Transmettre le paramètre
                $q->execute([
                    ':pseudo' => $pseudo,
                    ':email'  => $email,
                    ':mdp'   => $mdp,
                    ':photo_utilisateur' => empty($photo_utilisateur) ? null : $photo_utilisateur
                ]);

                return $q->lastInsertId;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        return $this->statut = false;



    }


}