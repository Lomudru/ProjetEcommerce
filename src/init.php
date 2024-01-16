<?php
session_start();

// require_once __DIR__ . '/db.php';

// config du site
$existing_pages = ['home', 'login', 'register'];

// les classes
require_once __DIR__ . '/class/User.php';

// tous les utilitaires
require_once __DIR__ . '/utils/error.php';
