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

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Email incorrect";
    header('Location: /?p=register');
    die();
}

$user = User::getByEmail($_POST['email']);
if ($user !== false) {
    $validPassword = $user->verifyPassword($_POST['password']);
    if ($validPassword) {
        // all good
        $_SESSION['user_id'] = $user->id;
        header('Location: /?p=home');
        die();
    }
}

// not good
set_errors('Bad login', 'login');
