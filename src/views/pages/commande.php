<?php

$title = 'commande';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>
<div class="commande_container">
    COMMANDE PAGE
    <form class="commande_box" action="/actions/commande.php" method="post">
        <input class="case1" type="text" name="adresse">
        <input class="case1" type="submit" value="finaliser ma commande">
    </form>

    <?php 
    if(isset($_GET["commande"])){

        echo "Il n'y a plus de stock de " . $_GET["commande"];

    }
    ?>
</div>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
  
body {
    font-family: 'Inter', sans-serif;
    background-color: black;
}
.commande_container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    text-align: center;
    padding-bottom: 13rem;

}

.commande_box {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.case1 {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px; /* Ajustez la taille de la police selon vos besoins */
    width: 23rem;
}

.case1[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
</style>
<?php
$page_content = ob_get_clean();
