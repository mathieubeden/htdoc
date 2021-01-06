<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    public function billeter($auteur, $contenu) {
        // Sauvegarde du commentaire
        $this->billet->ajouterBillet($auteur, $contenu);
    }

    public function debilleter($id) {
        // Sauvegarde du commentaire
        $this->billet->suprimerBillet($id);
    }

    public function decommenter($id) {
        // Sauvegarde du commentaire
        $this->commentaire->suprimercomm($id);
    }

}

