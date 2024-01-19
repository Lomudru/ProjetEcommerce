<?php

$title = 'Modifier';

if(!isset($_SESSION['user_id']))
{
    $role = $BDD->getByIdUser('utilisateur',$_SESSION['user_id'],'User');

    if($role->role == 0)
    {
        header("Location: /?p=home");
        die();
    }
}

if(isset($_POST["id"])){
    $vetements = $BDD->select("SELECT * FROM vetements WHERE v_id = ?", str_split($_POST["id"]), "Vetement");
}

ob_start();?>
<div>
    <form action="/actions/modifier.php" method="post" enctype="multipart/form-data" style="flex-direction: column;">
        <?php foreach($vetements as $vetement): ?>
            <input type="file" name="img">
            <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
            <label for="taille">Taille : </label>
            <input type="text" name="taille" value="<?= $vetement->taille ?>">
            <label for="couleur">Couleur : </label>
            <input type="text" name="couleur" value="<?= $vetement->couleur ?>">
            <label for="matiere">Matière : </label>
            <input type="text" name="matiere" value="<?= $vetement->matiere ?>">
            <label for="prix">Prix : </label>
            <input type="text" name="prix" value="<?= $vetement->prix ?>">
            <label for="sexe">Sexe : </label>
            <select name="sexe">
                <option value="">Choisir un sexe</option>
                <option value="HOMME">Homme</option>
                <option value="FEMME">Femme</option>
            </select>
            <label for="categorie_id">Categorie : </label>
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
            <input type="text" name="stock" value="<?= $vetement->stock ?>">
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="<?= $vetement->nom ?>">
        <?php endforeach; ?>
        <input type="submit" value="Modifier">
    </form>
    <form action="/actions/supprimer.php" method="post">
        <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
        <input type="submit" value="Supprimer">
    </form>
</div>
<?php
$page_content = ob_get_clean();
