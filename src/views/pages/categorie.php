<?php

$title = 'categorie';

if (isset($_POST['cate'])) {
    $TableauCategorie = $BDD->select("SELECT V.v_id, V.taille, V.couleur, V.matiere, V.prix, V.sexe, V.stock, V.nom
    FROM categorie AS C
    LEFT JOIN vetements AS V
    ON C.categorie_id = V.categorie_id
    WHERE `categorie` LIKE :nom AND prix IS NOT NULL",[':nom' => '%'.$_POST['cate'].'%'], "Vetement");
    if(sizeof($TableauCategorie) == 0){
        header("Location: /?p=home");
    }
}

ob_start();?>
<div>
    <table>
        <?php 
        if (isset($_POST['cate'])):
            foreach ($TableauCategorie as $vetement) : ?>
                <tr>
                    <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><img src="<?= "img/id_img/".$vetement->v_id."/image.png" ?>"></a></td>
                    <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><?= $vetement->nom ?></a></td>
                </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
