<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
    $billets = getBillets();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}

function deldel($idBillet){
    delbillet($idBillet);
}

function delcomer($idcom){
    delcom($idcom);
}

function pluscomer($post,$id){
    complus($id,$post['auteur'],$post['contenu']);
}

function bilus($post){
    billplus($post['titre'],$post['contenu']);
}



