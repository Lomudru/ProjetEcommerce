<?php

$title = 'Panier';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>


<main>
    <?php if(isset($_SESSION["panier"])):?>
            <?php
            foreach ($_SESSION['panier'] as $article):?>
            <div class="all">
                <table>
                    <tr>
                        <?php $articleFromId = $BDD->getById('vetements', $article, 'Vetement');
                        ?>

                        <td>Nom : <?php echo $articleFromId->nom; ?></td>
                        <td>Taille : <?php echo $articleFromId->taille; ?></td>
                        <td>Couleur : <?php echo $articleFromId->couleur; ?></td>
                        <td>Matière : <?php echo $articleFromId->matiere; ?></td>
                        <td>Prix : <?php echo $articleFromId->prix; ?></td>
                    </tr>
                </table>
                <?php endforeach;
                ?>
                <button style="background-color: black; color: white; padding: 10px 30px; border: none; margin-bottom: 50px; cursor: pointer; margin-top: 20px;"><a href="/?p=commande">Commander</a></button>
            </div>
        <?php else:?>
        <p>panier vide</p>
    <?php endif;?>
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
    }

    .all {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding-top: 50px;
        padding-bottom: 50px;
        gap: 20px;
    }

    /* table {
        display: flex;
        justify-content: center;
    } */
    tr {
        display: flex;
        flex-direction: column;
    }
</style>

<?php
$page_content = ob_get_clean();
