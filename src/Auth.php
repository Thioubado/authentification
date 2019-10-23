<?php
namespace App;

use PDO;

class Auth{

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user(): ?User
    {

    }


    public function login(string $username, string $password): ?User
    {
        // Trouve l'utilisasteur correspondant au username
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute(['username' => $username]);
        $query->setFetchMode(PDO::FETCH_CLASS, user::class);
        $user = $query->fetch();
        if($user=== false){
            return null;
        }
        // On vérifie le password_verifie de l'utilisateur corresponde
    }
}