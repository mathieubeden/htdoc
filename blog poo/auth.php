<?php 
class auth{
    private $user;
    private $pass;

    public function __construct($user,$pass){
        $this->user=$user;
        $this->pass=$pass; 
    }
    public function verification_user(){//verifi si c'est le bon login et le bon mdp
        $pass=hash('ripemd160', $this->pass);//hash le mot de passe pour le comparer avec le hash de la bdd
        try{
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
            $base->exec('SET NAMES utf8');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT nom, pass FROM users WHERE nom=:nom AND pass=:pass";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('nom' => $this->user,'pass' => $pass));
            $ligne = $resultat->fetch();
                if(isset($ligne['nom'])){//si le login est bon
                    return true;
                }  
            }
            catch(Exception $e){
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            }
    }
}