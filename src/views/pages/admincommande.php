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
<div>
    Admincommande
    <form action="/?p=admincommande" method="post">
        <select name="tri" onchange="this.form.submit()">
            <option value="">trier par statut</option>
            <option value="ALL">tout</option>
            <option value="NEW">nouveau</option>
            <option value="SENT">envoyer</option>
            <option value="FINISHED">terminer</option>
            <option value="CANCELED">annuler</option>
            <option value="RETURN_USER">retour</option>
        </select>
    </form>
    <a href="/?p=admincommande&order=true">trier par date</a> 
    <table>
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
<?php
$page_content = ob_get_clean();
