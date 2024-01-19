<?php

require_once __DIR__ . '/../../src/init.php';


if(isset($_POST["nom"])){
    foreach($_POST as $key => $post){
        if($post == ""){
            $_POST[$key] = null;
        }
    }
    if(intval($_POST["prix"]) == 0){
        echo "ok";
        $_POST["prix"] = NULL;
    }
    if(intval($_POST["stock"]) == 0){
        $_POST["stock"] = NULL;
    }
    $BDD->insert("INSERT INTO vetements(taille, couleur, matiere, prix, sexe, categorie_id, stock, nom) VALUE(?,?,?,?,?,?,?,?)", array_values($_POST));
}

header('Location: /?p=admin');
