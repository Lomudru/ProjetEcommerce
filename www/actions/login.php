<?php

require_once __DIR__ . '/../../src/init.php';

if (!isset($_POST['email'])) {
    $_SESSION['error_message'] = "Pas d'email";
    header('Location: /?p=login');
    die();
}

if (!isset($_POST['password'])) {
    $_SESSION['error_message'] = "Pas de password";
    header('Location: /?p=login');
    die();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Email incorrect";
    header('Location: /?p=login');
    die();
}

$user = $BDD->getBy('utilisateur','email',$_POST['email'],'User');
if ($user !== false) {
    if (hash('sha256', $_POST['password']) == $user->mdp) {
        // all good
        $_SESSION['user_id'] = $user->user_id;
        header('Location: /?p=home');
        die();
    }
}

// not good
set_errors('Bad login', 'login');
