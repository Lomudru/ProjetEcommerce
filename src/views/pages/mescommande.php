<?php

$title = 'Mes Commandes';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

$tableauCommande = $BDD->select("SELECT * FROM commande WHERE user_id = ?", [$_SESSION["user_id"]] ,"Commande");

ob_start();?>
<main>
    <div class="box">
        <table>
            <tr class="title-box">
                <td class="title">Adresse</td>
                <td class="title">Contenu de la commande</td>
                <td class="title">Statut</td>
                <td class="title">Date</td>
            </tr>
            <?php foreach($tableauCommande as $commande): ?>
            <tr class="info-box">
                <td class="info-box-td"><?= $commande->adresse; ?></td>

                <td class="info-box-td"><?= $commande->commande_content; ?></td>

                <td class="info-box-td"><?= $commande->commande_content; ?></td>

                <td class="info-box-td"><?= $commande->statut; ?></td>
    
                <td class="info-box-td"><?= $commande->date; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
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
        padding-top: 100px;
        padding-bottom: 100px;
        display: flex;
        justify-content: center;
    }

    .box {
        border: 1px solid #898989;
        padding: 20px 100px;
    }
    .title-box {
        display: flex;
        gap: 200px;
    }
    .title {
        padding-bottom: 20px;
    }

    .info-box {
        display: flex;
        flex-direction: row;
        justify-content: start;
        gap: 200px;
    }

    .info-box-td {
        display: flex;
    }

    tbody {
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
    }


</style>

<?php
$page_content = ob_get_clean();
