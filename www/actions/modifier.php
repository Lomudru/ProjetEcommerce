<?php

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST["nom"])){
    foreach($_POST as $key => $post){
        if($post == ""){
            $_POST[$key] = null;
        }
    }
    $BDD->update('vetements', $_POST);
}

header('Location: /?p=admin');