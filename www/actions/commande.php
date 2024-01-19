<?php 

require_once __DIR__ . '/../../src/init.php';

if(isset($_POST["adresse"])){

    if(isset($_SESSION["panier"])){

        $valideid = [];
        
        foreach($_SESSION["panier"] as $a_id)
        {
           $stock = $BDD->getById("vetements",$a_id,'Vetement');
           
           if($stock->stock == 0){

                header("Location: /?p=commande&commande=" . $stock->nom);
                die();
           }
           else{
             array_push($valideid,[$stock->v_id,$stock->stock]);

           }
        }

        foreach($valideid as $id)
        {
            $BDD->update("vetements",['id' => $id[0], 'stock' => $id[1]-1]);
        }

        $BDD->insert("INSERT INTO commande(adresse,commande_content,statut,date,user_id) VALUES(?,?,?,NOW(),?)",
        [$_POST['adresse'],json_encode($_SESSION['panier']),'NEW', $_SESSION["user_id"]]);

        unset($_SESSION["panier"]);
    }
}

header("Location: /?p=home");