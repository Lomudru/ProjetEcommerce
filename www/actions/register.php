<?php

require_once __DIR__ . '/../../src/init.php';

if (!isset($_POST['email'])) {
    $_SESSION['error_message'] = "Pas d'email";
    header('Location: /?p=register');
    die();
}

if (!isset($_POST['password'])) {
    $_SESSION['error_message'] = "Pas de password";
    header('Location: /?p=register');
    die();
}

if (!isset($_POST['cpassword'])) {
    set_errors("Pas de confirmation de password", 'register');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Email incorrect";
    header('Location: /?p=register');
    die();
}

if ($_POST['password'] !== $_POST['cpassword']) {
    $_SESSION['error_message'] = "Les mots de passe ne correspondent pas";
    header('Location: /?p=register');
    die();
}

$hashedmdp = hash('sha256', $_POST["password"]);

$user_id = $BDD->insert("INSERT INTO utilisateur(email,mdp,role) VALUES(?,?,?)",
[$_POST["email"],$hashedmdp,0]);
// auto connect after register
$_SESSION['user_id'] = $user_id;

header('Location: /?p=home');
