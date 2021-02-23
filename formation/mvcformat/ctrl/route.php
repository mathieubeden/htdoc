<?php

require_once 'views/vue.php';
require_once 'ctrl/ControleurAccueil.php';
require_once 'ctrl/ControleurBillet.php';
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
                if ($_GET['action'] == 'inscrir') {

                } else if ($_GET['action'] == 'incript') { //

                    $this->ctrlBillet->postuler($_POST);
                    $this->ctrlAccueil->accueil();
                } else if ($_GET['action'] == 'modificateur') { //
                    header('location:https://youtu.be/dQw4w9WgXcQ');
                } else if ($_GET['action'] == 'delete') {
                    $this->ctrlBillet->debilleter($_POST['id']);
                    $this->ctrlAccueil->accueil();
                } else
                    header('location:https://youtu.be/dQw4w9WgXcQ');
            } else {  // aucune action définie : affichage de l'accueil
               $this->ctrlAccueil->accueil();
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

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }
}
