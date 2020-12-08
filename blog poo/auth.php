<?php 
class auth{
    private $user;
    private $pass;

    public function __construct($user,$pass){
        $this->user=$user;
        $this->pass=$pass; 
    }
    public function verification_user(){
        //verification du user et du pass
     $pass=hash('ripemd160', $this->pass);
        try{
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
            $base->exec('SET NAMES utf8');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT nom, pass FROM users WHERE nom=:user AND pass=:pass";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('user' => $this->user,'pass' => $pass));
            $ligne = $resultat->fetch();
                if(isset($ligne['user'])){//si le login est bon
                    return true;
                }
                
               
            }
            catch(Exception $e)
            {
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            
        




    }
    }
}