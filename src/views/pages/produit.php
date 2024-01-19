<?php

$title = 'produit';

if (isset($_POST['produit'])) {
    $TableauVetements = $BDD->select("SELECT V.v_id, V.taille, V.couleur, V.matiere, V.prix, V.sexe, C.categorie, V.stock, V.nom
    FROM vetements as V
    LEFT JOIN categorie AS C
    ON V.categorie_id = C.categorie_id
    WHERE nom LIKE :nom
    ORDER BY V.taille ASC,V.prix ASC,V.sexe ASC;",[':nom' => '%'.$_POST['produit'].'%'], "Vetement");
}elseif(isset($_GET["produit"])){
    $TableauVetements = $BDD->select("SELECT V.v_id, V.taille, V.couleur, V.matiere, V.prix, V.sexe, C.categorie, V.stock, V.nom
    FROM vetements as V
    LEFT JOIN categorie AS C
    ON V.categorie_id = C.categorie_id
    WHERE nom LIKE :nom
    ORDER BY V.taille ASC,V.prix ASC,V.sexe ASC;",[':nom' => '%'.$_GET["produit"].'%'], "Vetement");
}

ob_start();?>
<div>
    <table>
        <?php 
        if (isset($_POST['produit']) || isset($_GET["produit"])):
            foreach ($TableauVetements as $vetement) :
                if(isset($_SESSION["user_id"])){
                    $autorizeComment = false;
                    $commander = $BDD->select("SELECT commande_content FROM commande WHERE user_id = ?", [$_SESSION["user_id"]], "Commande");
                    foreach($commander as $commande){
                        foreach(json_decode($commande->commande_content) as $vetementCommander){
                            if($vetement->v_id == $vetementCommander){
                                $autorizeComment = true;
                            }
                        }
                    }
                }
                ?>
                <tr>

                    <td><?php echo $vetement->nom; ?></td>

                    <td><?php echo $vetement->taille; ?></td>

                    <td><?php echo $vetement->couleur; ?></td>

                    <td><?php echo $vetement->matiere; ?></td>

                    <td><?php echo $vetement->prix; ?></td>

                    <td>
                        <?php 
                        if(isset($_SESSION['user_id']))
                        { ?>
                            <form action="/actions/ajouterPanier.php" method="post">
                                <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
                                <input type="submit" value="Ajouter au panier">
                            </form>
                       <?php }
                        ?>
                    </td>
                    <?php if($autorizeComment): ?>
                        <td>
                            <form action="/actions/commenter.php" method="post">
                                <input type="text" name="produit" value="<?= $vetement->nom ?>" hidden>
                                <input type="text" name="id" value="<?= $vetement->v_id ?>" hidden>
                                <select name="note" required>
                                    <option value="">Choisissez une note</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <label for="message">Commenter : </label>
                                <textarea name="message" cols="30" rows="10" required></textarea>
                                <input type="submit" value="Envoyer le commentaire">
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php 
                    $TableauCommentaire = $BDD->select("SELECT * FROM commentaire WHERE v_id = ?", [$vetement->v_id], "Commentaire");
                    foreach($TableauCommentaire as $commentaire){
                        ?>
                        <tr>
                            <td>Note : <?= $commentaire->commentaire_note ?> / 5</td>
                        </tr>
                        <tr>
                            <td>
                                <?= $commentaire->commentaire_message ?>
                            </td>
                        </tr>
                    <?php } ?>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
$page_content = ob_get_clean();
