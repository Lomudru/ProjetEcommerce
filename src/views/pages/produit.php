<?php

$title = 'produit';

if (isset($_POST['produit'])) {
    $TableauVetements = $BDD->select("SELECT V.v_id, V.taille, V.couleur, V.matiere, V.prix, V.sexe, V.categorie_id, V.stock, V.nom
    FROM vetements as V
    LEFT JOIN categorie AS C
    ON V.categorie_id = C.categorie_id
    WHERE nom LIKE :nom
    ORDER BY V.taille ASC,V.prix ASC,V.sexe ASC;",[':nom' => '%'.$_POST['produit'].'%'], "Vetement");
}

ob_start();?>
<div>
    <table>
        <?php 
        if (isset($_POST['produit'])):
            foreach ($TableauVetements as $vetement) : ?>

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
