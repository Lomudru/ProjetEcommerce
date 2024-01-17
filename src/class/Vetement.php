<?php

class Vetement {
    public $v_id;
    public $taille;
    public $couleur;
    public $matiere;
    public $prix;
    public $sexe;
    public $categorie_id;
    public $stock;
    public $nom;
    
    public static function CreateVetement($taille, $couleur, $matiere, $prix, $sexe, $categorie_id,$stock,$nom) {
        $vetement = new Vetement();
        $vetement->taille = $taille;
        $vetement->couleur = $couleur;
        $vetement->matiere = $matiere;
        $vetement->prix = $prix;
        $vetement->sexe = $sexe;
        $vetement->categorie_id = $categorie_id;
        $vetement->stock = $stock;
        $vetement->nom = $nom;
        return $vetement;
    }
    
   /* public static function getBySexe($sexe) {
        global $db;
        $query = $db->prepare('SELECT * FROM vetements WHERE sexe = ?');
        $query->execute([$sexe]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Vetement');
        $vetement = $query->fetch(); // si pas de result , c'est false;
        return $vetement;
    }

    public static function getByCategorie($categorie_id) {
        global $db;
        $query = $db->prepare('SELECT * FROM vetements WHERE categorie_id = ?');
        $query->execute([$categorie_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $vetement = $query->fetch(); // si pas de result , c'est false;
        return $vetement;
    }
    
    public function AddVetement() {
        global $db;
        $query = $db->prepare('INSERT INTO vetements (v_id, taille, couleur, matiere, prix, sexe, categorie_id, stock) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([
            $this->v_id,
            $this->taille,
            $vetement->couleur,
            $vetement->matiere,
            $vetement->prix,
            $vetement->sexe,
            $vetement->categorie_id,
            $vetement->stock,
        ]);
        return $db->lastInsertId();
    }
    */
}
