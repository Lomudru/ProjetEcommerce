<?php

class Commande {
    public $commande_id;
    public $adresse;
    public $commande_content;
    public $statut;
    public $date;
    public $date_maj;

    public static function register($adresse, $commande_content, $statut, $date, $date_maj) {
        $com = new Commande();
        $com->adresse = $adresse;
        $com->commande_content = $commande_content;
        $com->statut = $statut;
        $com->date = $date;
        $com->date_maj = $date_maj;


        return $com;
    }
}
