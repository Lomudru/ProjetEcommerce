<?php

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST["id"])){
    $BDD->removeById('vetements', $_POST["id"]);
}

header('Location: /?p=admin');