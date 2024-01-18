<?php

require_once __DIR__ . '/../../src/init.php';
if(isset($_POST["changement"])){
    $BDD->updateCommande("commande",["id"=>$_POST["id"], "statut"=>$_POST["changement"]]);
}
header("Location: /?p=admincommande");