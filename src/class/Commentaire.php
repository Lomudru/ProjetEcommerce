<?php

class Commentaire {
    public $commentaire_id;
    public $user_id;
    public $v_id;
    public $commentaire_note;
    public $commentaire_message;

    public static function register($user_id, $v_id, $commentaire_note, $commentaire_message) {
        $comment = new Commentaire();
        $comment->user_id = $user_id;
        $comment->commande_id = $v_id;
        $comment->commentaire_note = $commentaire_note;
        $comment->commentaire_message = $commentaire_message;

        return $comment;
    }
}
