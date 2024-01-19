<?php

$title = 'home';

if(isset($_GET["disconnect"]) && $_GET["disconnect"] == 'true')
{
    session_destroy();
    header('Location: /?p=home');
}

ob_start();?>

<main>
        <form action="/?p=produit" method="post">
            <div class="search-container">
                <input class="searchbar" type="text" id="searchbar" name="produit" placeholder="Rechercher des articles">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass search-icon" style="color: black;"></i></button>
            </div>
        </form>
        <form action="/?p=categorie" method="post" >
                <select name="cate" onchange="this.form.submit()">
                    <option value="">Rechercher une catégorie</option>
                    <?php 
                        $categorie = $BDD->selectAll("SELECT categorie FROM categorie", "Categorie");
                        foreach($categorie as $cate){ ?>
                            <option value="<?= $cate->categorie ?>"><?= $cate->categorie ?></option>
                        <?php } ?>
                    ?>
                </select>
        </form>
        <table>
            <?php 
                $vetements = $BDD->selectAll("SELECT v_id, nom FROM vetements WHERE prix IS NOT NULL LIMIT 25", "Vetement");
                foreach($vetements as $vetement){ ?>
                    <tr>
                        <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><img src="<?= "img/id_img/".$vetement->v_id."/image.png" ?>"></a></td>
                        <td><a href="/?p=produit&produit=<?= $vetement->nom ?>"><?= $vetement->nom ?></a></td>
                    </tr>
                <?php } ?>
        </table>
</main>

<?php
$page_content = ob_get_clean();
