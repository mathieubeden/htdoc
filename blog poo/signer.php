<?php
class Signer{
    private $base;

    public function __construct ($base){ // recup de la bdd
        $this->base = $base;
    }
    public function sign_on($user,$pass){//insertion de l'article dans la base de données
        $pass=$pass=hash('ripemd160', $pass);
        $sql="INSERT INTO users (nom,pass) VALUES (:nom,:pass)";
        $resultat = $this->base->prepare($sql);
        $resultat->execute(array('nom' => $user,"pass"=> $pass));
    }
    
}




?>