<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';
class Routeur
{

    private $ctrlAccueil;
    private $ctrlBillet;

    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {//afficher un billet de blog
                    

                } else if ($_GET['action'] == 'commenter') {//ajute un com au billet
                    

                } else if ($_GET['action'] == 'billeter') {//ajoute un billet
                    

                } else if ($_GET['action'] == 'debilleter') {//suprimme le billet
                    

                } else if ($_GET['action'] == 'decomm') {//suprime le com
                    

                } else
                    throw new Exception("Action non valide");
            } else {  // aucune action définie : affichage de l'accueil
                
            }
        } //erreur d'affichage
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}