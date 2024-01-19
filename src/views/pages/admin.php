<?php

$title = 'admin';

if(!isset($_SESSION['user_id']))
{
    $role = $BDD->getByIdUser('utilisateur',$_SESSION['user_id'],'User');

    if($role->role == 0)
    {
        header("Location: /?p=home");
        die();
    }
}

$TableauVetements = $BDD->selectAll("SELECT * FROM vetements", "Vetement");

ob_start();?>
<div>
    <table>
        <tr>
            <td>Nom</td>
            <td>taille</td>
            <td>Couleur</td>
            <td>Matiere</td>
            <td>SEXE</td>
            <td>prix</td>
            <td>Stock</td>
            <td>CATEGORIE</td>
        </tr>
        <?php foreach($TableauVetements as $vetement): ?>
            <tr>

                <td><?= $vetement->nom; ?></td>

                <td><?= $vetement->taille; ?></td>

                <td><?= $vetement->couleur; ?></td>

                <td><?= $vetement->matiere; ?></td>

                <td><?= $vetement->sexe; ?></td>

                <td><?= $vetement->prix; ?></td>

                <td><?= $vetement->stock; ?></td>

                <td>
                    <?php 
                        $categorie = $BDD->select("SELECT categorie FROM categorie WHERE categorie_id = ?", [$vetement->categorie_id],"Categorie");
                        echo $categorie[0]->categorie;
                    ?>
                </td>
                
                <td>
                    <form action="/?p=modifier" method="post" style="padding-top: 0;">
                        <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
                        <input type="submit" value="Modifier">
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/?p=ajouter">Ajouter Un article</a>
</div>
<?php
$page_content = ob_get_clean();
