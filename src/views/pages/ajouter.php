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
<divclass="page-container">
    <form class="custom-form" action="/actions/ajouter.php" method="post" style="flex-direction: column;">
        <label for="taille">Taille : </label>
        <input class="form-input" type="text" name="taille">
        <label class="form-input" for="couleur">Couleur : </label>
        <input class="form-input" type="text" name="couleur">
        <label class="form-input" for="matiere">Matière : </label>
        <input class="form-input" type="text" name="matiere">
        <label class="form-input" for="prix">Prix : </label>
        <input class="form-input" type="text" name="prix">
        <label class="form-input" for="sexe">Sexe : </label>
        <input class="form-input" type="text" name="sexe">
        <label class="form-input" for="categorie_id">ID Categorie : </label>
        <input class="form-input" type="text" name="categorie_id">
        <label class="form-input" for="stock">Stock : </label>
        <input class="form-input" type="text" name="stock">
        <label class="form-input" for="nom">Nom : </label>
        <input class="form-input" type="text" name="nom">
        <input class="submit-button" type="submit" value="Ajouter">
    </form>
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

</style>
<?php
$page_content = ob_get_clean();
