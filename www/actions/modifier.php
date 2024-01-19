<?php

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST["nom"])){
    foreach($_POST as $key => $post){
        if($post == ""){
            $_POST[$key] = null;
        }
    }
    if(isset($_FILES["img"])){
        if(!file_exists("../img/id_img/" . $_POST["id"])){
            mkdir("../img/id_img/" . $_POST["id"]);   
        }
        $uploaddir = '../img/id_img/' . $_POST["id"] . "/";
        $uploadfile = $uploaddir . basename("image.png");
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    if($_POST["sexe"] == ""){
        unset($_POST["sexe"]);
    }
    if($_POST["categorie_id"] == ""){
        unset($_POST["categorie_id"]);
    }
    $BDD->update('vetements', $_POST);
}

header('Location: /?p=admin');