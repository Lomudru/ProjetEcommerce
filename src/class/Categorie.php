<?php

class Categorie {
    public $categorie_id;
    public $categorie;

    public static function register($categorie) {
        $cate = new Categorie();
        $cate->categorie = $categorie;
        return $cate;
    }
}
