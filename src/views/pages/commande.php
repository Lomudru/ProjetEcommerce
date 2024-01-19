<?php

$title = 'commande';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>
<div>
    COMMANDE PAGE
    <form action="/actions/commande.php" method="post">
        <input type="text" name="adresse">
        <input type="submit" value="finaliser ma commande">
    </form>

    <?php 
    if(isset($_GET["commande"])){

        echo "Il n'y a plus de stock de " . $_GET["commande"];

    }
    ?>
</div>
<?php
$page_content = ob_get_clean();
