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
        <input type="text" name="sexe">
        <label for="categorie_id">ID Categorie : </label>
        <input type="text" name="categorie_id">
        <label for="stock">Stock : </label>
        <input type="text" name="stock">
        <label for="nom">Nom : </label>
        <input type="text" name="nom">
        <input type="submit" value="Ajouter">
    </form>
</div>
<?php
$page_content = ob_get_clean();
