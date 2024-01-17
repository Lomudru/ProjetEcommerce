<?php

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST['id'])) {
    if(isset($_SESSION['panier'])) {
        $tableau = $_SESSION['panier'];
    } else {
        $tableau = [];
    }
    array_push($tableau, $_POST['id']);
    $_SESSION['panier'] = $tableau;
}

header('Location: /?p=panier');