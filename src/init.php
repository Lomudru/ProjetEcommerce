<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once __DIR__ . '/db.php';

// config du site
$existing_pages = ['home', 'login', 'register', 'produit', 'categorie', 'admin', 'modifier', 'ajouter', 'panier','commande','admincommande', "mescommande"];

// les classes
require_once __DIR__ . '/class/User.php';
require_once __DIR__ . '/class/DbManager.php';
require_once __DIR__ . '/class/Vetement.php';
require_once __DIR__ . '/class/Categorie.php';
require_once __DIR__ . '/class/Commande.php';
require_once __DIR__ . '/class/Commentaire.php';

$BDD = new DbManager($db);


// tous les utilitaires
require_once __DIR__ . '/utils/error.php';
