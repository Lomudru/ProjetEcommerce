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
<main>
    <div class="all-form">
        <form class="form1" action="/actions/modifier.php" method="post" style="flex-direction: column;">
            <?php foreach($vetements as $vetement): ?>
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
            <input type="text" name="sexe" value="<?= $vetement->sexe ?>">
            <label for="cate">ID Categorie : </label>
            <input type="text" name="categorie_id" value="<?= $vetement->categorie_id ?>">
            <label for="stock">Stock : </label>
            <input type="text" name="stock" value="<?= $vetement->stock ?>">
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="<?= $vetement->nom ?>">
            <?php endforeach; ?>
            <input type="submit" value="Modifier" style="padding: 10px 30px; background-color: black; color: white; border:none; width: 30%; cursor: pointer">
        </form>
        <form class="form2" action="/actions/supprimer.php" method="post">
            <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
            <input type="submit" value="Supprimer" style="padding: 10px 30px; background-color: black; color: white; border:none; width: 30%; cursor: pointer">
        </form>
    </div>
</main>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    main {
        background-color: white;
        color: black;
        display: flex;
        justify-content: center;
    }

    .all-form {
        width: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    form {
        display: flex;
        flex-direction: column;
        padding-left: 200px;
    }
    .form1 {
        display: flex;
        width: 30%;
        gap: 10px;
        padding-bottom: 70px;
        width: 1200px;
    }

    .form2 {
        display: flex;
        flex-direction: column;
        width: 30%;
        width: 1200px;
        padding-bottom: 30px;
        margin-top: -100px;
    }
</style>
<?php
$page_content = ob_get_clean();
