<?php

$title = 'home';

if(isset($_GET["disconnect"]) && $_GET["disconnect"] == 'true')
{
    session_destroy();
    header('Location: /?p=home');
}

ob_start();?>

   <main class="box_glo">
            <form class="bar1" action="/?p=produit" method="post">
                <div class="search-container">
                    <input class="searchbar" type="text" id="searchbar" name="produit" placeholder="Rechercher des articles">
                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass search-icon" style="color: black;"></i></button>
                </div>
            </form>
            <form class="bar2" action="/?p=categorie" method="post">
                <div class="search-container">
                    <input class="searchbar" type="text" id="searchbar" name="cate" placeholder="Rechercher des categorie">
                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass search-icon" style="color: black;"></i></button>
                </div>
            </form>
    </main>
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
.box_glo{
    padding-bottom: 32rem;

}
.bar1{
    display: flex;
    justify-content: center;
    padding-top: 51px;
}
</style>
<?php
$page_content = ob_get_clean();
