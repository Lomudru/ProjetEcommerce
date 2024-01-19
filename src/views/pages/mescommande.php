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

                <td>
                    <?php
                    $content = "";
                    $commande_content;
                    $commander = $BDD->select("SELECT commande_content FROM commande WHERE user_id = ? AND commande_id = ?", [$_SESSION["user_id"], $commande->commande_id], "Commande");
                    foreach($commander as $commande){
                        foreach(json_decode($commande->commande_content) as $vetementCommander){
                            $vetement = $BDD->select("SELECT nom FROM vetements WHERE v_id = ?", [$vetementCommander], "Vetement");
                            $content .= $vetement[0]->nom .", ";
                        }
                    }
                    echo $content;
                    ?>
                </td>

                <td><?= $commande->statut; ?></td>
    
                <td><?= $commande->date; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
