<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'billet') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0) {
                    billet($idBillet);
                }
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
        }
        if ($_GET['action'] == 'deldel') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0) {
                    deldel($idBillet);
                    accueil();
                }
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
        }
        if ($_GET['action'] == 'billplus') {
                    bilus($_POST);
                    accueil();
                
            
        }
        if ($_GET['action'] == 'comdel') {
            if (isset($_GET['id'])) {
                $idcom = intval($_GET['id']);
                if ($idcom != 0) {
                    delcomer($idcom);
                    billet($_GET['id2']);
                }
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
        }
        if ($_GET['action'] == 'complus') {
            if (isset($_GET['id'])) {
                $idcom = intval($_GET['id']);
                if ($idcom != 0) {
                    pluscomer($_POST,$_GET['id2']);
                    billet($_GET['id2']);
                }
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
        }
        else
            throw new Exception("Action non valide");
    }
    else {  // aucune action définie : affichage de l'accueil
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}