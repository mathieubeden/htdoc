<?php

abstract class classy {

    private $poids=1;
    private $couleur='bleu';
    protected static $compteur=0;



    const PLEG=1;
    const PMOY=5;
    const PLOU=10;

    public function __construct ($couleur, $poids=10){
        $this->couleur = $couleur; 
        $this->poids = $poids;
        self::$compteur+=1;
        }

    public function manger(classy $mangai){
        if($this->poids>$mangai->poids){
            $this->poids = $this->poids + $mangai->poids;
            $mangai->poids = 0;
            $mangai->couleur = "";
            echo'nomm nomm !<br>';
            unset($mangai);
            self::$compteur-=1;
        }else{
            echo 'pas nomm nomm !<br>';
        }
    }
    public static function se_deplacer(){
       echo'moving...<br>';
    }
    public function mc_do(){
        $this->poids+=1;
    }
    public function get_couleur(){
        return $this->couleur;
    }
    public static function get_compt(){
        return self::$compteur;
    }
    public function set_couleur($couleur){
        $this->couleur=$couleur;
    }
    public function get_poids(){
        return $this->poids;
    }
    public function set_poids($poids){
        $this->poids=$poids;
    }
    public function __destruct(){
        if(self::$compteur>=1){
            self::$compteur-=1;
        }
        
    }
    abstract public function respire();


}

?>