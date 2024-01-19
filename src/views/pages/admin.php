<?php

$title = 'admin';

if(isset($_SESSION['user_id']))
{
    $role = $BDD->getByIdUser('utilisateur',$_SESSION['user_id'],'User');

    if($role->role == 0)
    {
        header("Location: /?p=home");
        die();
    }
}else{
    header("Location: /?p=home");
    die();
}

$TableauVetements = $BDD->selectAll("SELECT * FROM vetements", "Vetement");

ob_start();?>
<div class="tableau-container">
    <table class="tab_admin">
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
    <div class="bouton_ajout"><a href="/?p=ajouter">Ajouter un article</a></div>
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

.tableau-container {
    max-width: 800px; 
    margin: 165px auto;
}

.tab_admin {
    width: 100%;
    border-collapse: collapse; 
    background-color: black;
    height: 16rem;
    border-radius: 3px;

}

.tab_admin, .tab_admin th, .tab_admin td {
    border: 1px solid gray;
    text-align: center; 
    vertical-align: middle; 
    padding: 8px;
}
.bouton_ajout{
    display: flex;
    justify-content: center;
    padding: 2rem;
}
.bouton_ajout a {
    color: white;
    font-size: 20px;
}
</style>
<?php
$page_content = ob_get_clean();
