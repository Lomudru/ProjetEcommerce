<?php

require_once __DIR__ . "/../../src/init.php";


if(isset($_POST["id"])){
    if($_POST["note"] == ""){
        header("Location: /?p=home");
        die();
    }
    if($_POST["message"] == ""){
        header("Location: /?p=home");
        die();
    }

    $BDD->insert("INSERT INTO commentaire(user_id, v_id, commentaire_note, commentaire_message) VALUE(?,?,?,?)", [$_SESSION["user_id"], $_POST["id"], $_POST["note"], $_POST["message"]]);
    header("Location: /?p=produit&produit=". $_POST["produit"]);
    die();
}

header("Location: /?p=home");