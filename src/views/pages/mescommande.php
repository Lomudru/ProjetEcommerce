<?php

$title = 'Mes Commandes';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

$tableauCommande = $BDD->select("SELECT * FROM commande WHERE user_id = ?", [$_SESSION["user_id"]] ,"Commande");

ob_start();?>
<div>
    <table>
        <tr>
            <td>adresse</td>
            <td>Contenu de la commande</td>
            <td>statut</td>
            <td>date</td>
        </tr>
        <?php foreach($tableauCommande as $commande): ?>
            <tr>

                <td><?= $commande->adresse; ?></td>

                <td><?= $commande->commande_content; ?></td>

                <td><?= $commande->statut; ?></td>
    
                <td><?= $commande->date; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
