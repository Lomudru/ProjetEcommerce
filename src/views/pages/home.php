<?php

$title = 'home';

if(isset($_GET["disconnect"]) && $_GET["disconnect"] == 'true')
{
    unset($_SESSION["user_id"]);
}

ob_start();?>

   <main>
            <form action="/?p=produit" method="post">
                <div class="search-container">
                    <input class="searchbar" type="text" id="searchbar" name="produit" placeholder="Rechercher des articles">
                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass search-icon" style="color: black;"></i></button>
                </div>
            </form>
            <form action="/?p=categorie" method="post">
                <div class="search-container">
                    <input class="searchbar" type="text" id="searchbar" name="cate" placeholder="Rechercher des categorie">
                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass search-icon" style="color: black;"></i></button>
                </div>
            </form>

        <div>
      </div>
    </main>

<?php
$page_content = ob_get_clean();
