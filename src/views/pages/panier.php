<?php

$title = 'Panier';

if(!isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>


<div>
    <?php if(isset($_SESSION["panier"])):?>
            <?php
            foreach ($_SESSION['panier'] as $article):?>
            <table>
                <tr>
                    <td>Nom</td>
                    <td>Taille</td>
                    <td>Couleur</td>
                    <td>Matiere</td>
                    <td>Prix</td>
                    <td>Stock</td>
                </tr>

                <tr>
                    <?php $articleFromId = $BDD->getById('vetements', $article, 'Vetement');
                    ?>

                    <td><?php echo $articleFromId->nom; ?></td>
                    <td><?php echo $articleFromId->taille; ?></td>
                    <td><?php echo $articleFromId->couleur; ?></td>
                    <td><?php echo $articleFromId->matiere; ?></td>
                    <td><?php echo $articleFromId->prix; ?></td>
                    <td><?php echo $articleFromId->stock; ?></td>
                </tr>
            </table>
            <?php endforeach;
            ?>
            <button><a href="/?p=commande">Commander</a></button>
        <?php else:?>
        <p>panier vide</p>
    <?php endif;?>

    
</div>
<?php
$page_content = ob_get_clean();
