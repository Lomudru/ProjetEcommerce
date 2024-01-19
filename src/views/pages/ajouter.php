<?php

$title = 'Ajouter';

if(!isset($_SESSION['user_id']))
{
    $role = $BDD->getByIdUser('utilisateur',$_SESSION['user_id'],'User');

    if($role->role == 0)
    {
        header("Location: /?p=home");
        die();
    }
}

ob_start();?>
<div>
    <form action="/actions/ajouter.php" method="post" style="flex-direction: column;">
        <label for="taille">Taille : </label>
        <input type="text" name="taille">
        <label for="couleur">Couleur : </label>
        <input type="text" name="couleur">
        <label for="matiere">Matière : </label>
        <input type="text" name="matiere">
        <label for="prix">Prix : </label>
        <input type="text" name="prix">
        <label for="sexe">Sexe : </label>
        <select name="sexe">
            <option value="">Choisir un sexe</option>
            <option value="HOMME">Homme</option>
            <option value="FEMME">Femme</option>
        </select>
        <label for="categorie_id">ID Categorie : </label>
        <select name="categorie_id">
                <option value="">Rechercher une catégorie</option>
                <?php 
                    $categorie = $BDD->selectAll("SELECT categorie,categorie_id FROM categorie", "Categorie");
                    foreach($categorie as $cate){ ?>
                        <option value="<?= $cate->categorie_id ?>"><?= $cate->categorie ?></option>
                    <?php } ?>
                ?>
        </select>
        <label for="stock">Stock : </label>
        <input type="text" name="stock">
        <label for="nom">Nom : </label>
        <input type="text" name="nom">
        <input type="submit" value="Ajouter">
    </form>
</div>
<?php
$page_content = ob_get_clean();
