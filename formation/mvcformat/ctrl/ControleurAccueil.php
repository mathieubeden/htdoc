<?php

require_once 'models/Billet.php';
require_once 'views/vue.php';

class ControleurAccueil {


    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function accueil() {
       $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
       $vue->generer(array('billets' => $billets));
    }

}

