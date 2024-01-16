<?php

require_once __DIR__ . '/../../src/init.php';

if (!isset($_POST['email'])) {
    $_SESSION['error_message'] = "Pas d'email";
    header('Location: /?p=register');
    die();
}

if (!isset($_POST['username'])) {
    $_SESSION['error_message'] = "Pas de username";
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

$username_len = strlen($_POST['username']);

if ($username_len < 3 || $username_len > 12) {
    $_SESSION['error_message'] = "Longueur de username incorrect (doit etre entre 3 et 12)";
    header('Location: /?p=register');
    die();
}

$user = User::register($_POST['email'], $_POST['username'], $_POST['password']);
$user_id = $user->save();

// auto connect after register
$_SESSION['user_id'] = $user_id;

header('Location: /?p=home');
