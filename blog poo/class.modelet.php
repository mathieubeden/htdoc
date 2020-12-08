<?php

class modelet{
    private $id;

    public function __construct($id){
        $this->id=$id;
    }
    public function supression(){
        //supression de l'article
        try{
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
            $base->exec('SET NAMES utf8');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM `blog` WHERE id=:id";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('id' => $this->id));
            catch(Exception $e){
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            }
    }
    public function modifier($titre,$comm){
            //verification du user et du pass
        try{
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
            $base->exec('SET NAMES utf8');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `blog` SET titre=:titre,comm=:comm WHERE id=:id";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('id' => $this->id,'titre' => $titre,'comm' => $comm));
            catch(Exception $e){
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            }
    }
    }
}

?>