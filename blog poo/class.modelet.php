<?php

class modelet{
    private $id;
    private $user;

    public function __construct($id,$user){
        $this->id=$id;
        $this->user=$user;
    }
    public function supression(){
        //supression de l'article
        $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM blog WHERE id=:id AND user=:user";
        // Préparation de la requête avec les marqueurs
        $resultat = $base->prepare($sql);
        $resultat->execute(array('id' => $this->id,'user'=>$this->user));
        $resultat->closeCursor();
    }
    public function modifier($titre,$comm){
        //verification du user et du pass
        $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
        $base->exec('SET NAMES utf8');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `blog` SET titre=:titre,comm=:comm WHERE id=:id and user=:user";
        // Préparation de la requête avec les marqueurs
        $resultat = $base->prepare($sql);
        $resultat->execute(array('id' => $this->id,'titre' => $titre,'comm' => $comm,'user'=>$this->user));
    }
}

?>