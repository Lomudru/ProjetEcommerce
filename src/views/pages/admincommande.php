<?php

$title = 'admincommande';


if(isset($_POST["tri"]) && $_POST["tri"] != "ALL"){ 
    $tableauCommande = $BDD->selectAll("SELECT * FROM commande WHERE statut = '".$_POST["tri"]."'","Commande");
}
else{
    
    if(isset($_GET["order"])&& $_GET["order"]== "true"){
        $tableauCommande = $BDD->selectAll("SELECT * FROM commande ORDER BY date DESC","Commande");
    }
    else{
        $tableauCommande = $BDD->selectAll("SELECT * FROM commande","Commande");
    }
}



ob_start();?>
<div class="page-container">
    Admincommande
    <form class="form-container" action="/?p=admincommande" method="post">
        <select class="select-container" name="tri" onchange="this.form.submit()">
            <option value="">trier par statut</option>
            <option value="ALL">tout</option>
            <option value="NEW">nouveau</option>
            <option value="SENT">envoyer</option>
            <option value="FINISHED">terminer</option>
            <option value="CANCELED">annuler</option>
            <option value="RETURN_USER">retour</option>
        </select>
    </form>
    <a class="link-container" href="/?p=admincommande&order=true">trier par date</a> 
    <table class="custom-table">
        <tr>
            <td>adresse</td>
            <td>commande_content</td>
            <td>statut</td>
            <td>date</td>
        </tr>
        <?php foreach($tableauCommande as $commande): ?>
            <tr>

                <td><?= $commande->adresse; ?></td>

                <td><?= $commande->commande_content; ?></td>

                <td><?= $commande->statut; ?></td>

                <td><?= $commande->date; ?></td>
                <td>
                    <form action="/actions/tricommande.php" method="post">
                        <input type="text" value="<?= $commande->commande_id?>" name="id" hidden>
                        <select name="changement" onchange="this.form.submit()">
                            <option value="">changer le statut</option>
                            <option value="NEW">nouveau</option>
                            <option value="SENT">envoyer</option>
                            <option value="FINISHED">terminer</option>
                            <option value="CANCELED">annuler</option>
                            <option value="RETURN_USER">retour</option>
                        </select>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
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

.page-container {
    max-width: 800px; 
    margin: 90px auto;
}

.section-header {
    margin-bottom: 10px;
}

.form-container,
.table-container {
    margin-bottom: 20px;
}

.select-container,
.link-container {
    margin-right: 10px;
    border: red;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table, .custom-table th, .custom-table td {
    border: 1px solid gray;
    text-align: center;
    padding: 8px;
}
</style>
<?php
$page_content = ob_get_clean();
