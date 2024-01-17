<?php

$title = 'categorie';

if (isset($_POST['cate'])) {
    $TableauCategorie = $BDD->select("SELECT V.v_id, V.taille, V.couleur, V.matiere, V.prix, V.sexe, V.stock, V.nom
    FROM categorie AS C
    LEFT JOIN vetements AS V
    ON C.categorie_id = V.categorie_id
     WHERE `categorie` LIKE :nom;",[':nom' => '%'.$_POST['cate'].'%'], "Vetement");
}

ob_start();?>
<div>
    <table>
        <?php 
        if (isset($_POST['cate'])):
            foreach ($TableauCategorie as $vetement) : ?>

                <tr>

                <td><?php echo $vetement->nom; ?></td>

                <td><?php echo $vetement->taille; ?></td>

                <td><?php echo $vetement->couleur; ?></td>

                <td><?php echo $vetement->matiere; ?></td>

                <td><?php echo $vetement->prix; ?></td>

                </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
