<?php

class User {
    public $id;
    public $email;
    public $username;
    public $password;
    public $role;
    public $created_at;
    public $last_ip;
    
    public static function register($email, $username, $password) {
        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->role = 0;
        $user->setPassword($password);
        $user->last_ip = $_SERVER['REMOTE_ADDR'];
        return $user;
    }
    
    public static function getByEmail($email) {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $query->fetch(); // si pas de result , c'est false;
        return $user;
    }
    
    public function setPassword($password) {
        $this->password = hash('sha256', $password);
        return $this->password;
    }
    
    public function verifyPassword($password) {
        return (hash('sha256', $password) === $this->password); // true ou false
    }
    
    public function save() {
        global $db;
        $query = $db->prepare('INSERT INTO users (email, username, password, role, last_ip) VALUES(?, ?, ?, ?, ?)');
        $query->execute([
            $user->email,
            $user->username,
            $user->password,
            $user->role,
            $user->last_ip
        ]);
        return $db->lastInsertId();
    }
}
