<?php

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST["key"])){
    unset($_SESSION["panier"][$_POST["key"]]);
    if(sizeof($_SESSION["panier"]) == 0){
        unset($_SESSION["panier"]);
    }
}
header("Location: /?p=panier");