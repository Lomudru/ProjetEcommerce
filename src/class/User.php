<?php

class User {
    public $user_id;
    public $email;
    public $mdp;
    public $role;

    public static function register($email, $mdp) {
        $user = new User();
        $user->email = $email;
        $user->role = 0;
        $user->setPassword($mdp);
        return $user;
    }
    
    /*
    public static function getByEmail($email) {
        global $db;
        $query = $db->prepare('SELECT * FROM utilisateur WHERE email = ?');
        $query->execute([$email]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $query->fetch(); // si pas de result , c'est false;
        return $user;
    }
    */
    
    public function setPassword($mdp) {
        $this->mdp = hash('sha256', $mdp);
        return $this->mdp;
    }
    
    public function verifyPassword($mdp) {
        return (hash('sha256', $mdp) === $this->mdp); // true ou false
    }

}
