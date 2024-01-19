<?php

$title = 'categorie';
if(isset($_GET["sexe"]) && ($_GET["sexe"] == "HOMME" || $_GET["sexe"] == "FEMME")){
    $TableauCategorie = $BDD->select("SELECT * FROM vetements WHERE sexe = :sexe AND prix IS NOT NULL",[':sexe' => $_GET['sexe']], "Vetement");
}else{
    header("Location: /?p=home");
    die();
}


ob_start();?>
<div>
    <table>
        <?php 
            foreach ($TableauCategorie as $vetement) : ?>
                <tr>
                    <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><img src="<?= "img/id_img/".$vetement->v_id."/image.png" ?>"></a></td>
                    <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><?= $vetement->nom ?></a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
