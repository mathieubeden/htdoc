<?php

require_once 'models/Billet.php';
require_once 'views/vue.php';

class ControleurBillet {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    public function postuler($post) {
        if($post['debut']>$post['fin']){
            throw new Exception("la date ne fonctionne que dans une ligne temporelle inversé");
        }
        $this->billet->postuler($post);
    }

    public function debilleter($ids) {
        // supression
        foreach($ids as $id){
            $this->billet->suprimerBillet($id);
        }
    }

}

