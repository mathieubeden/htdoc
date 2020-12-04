<?php

abstract class vehicule{
    protected $couleur;
    protected $poids;

    public function __construct ($couleur, $poids=100){
        $this->couleur = $couleur; 
        $this->poids = $poids;
        }

    public function rouler(){
        if($this->poids>=5){
            //$this->poids-=0; //conso de carbu
            echo 'broum broum<br>';
        }else{
        echo 'broum iiiiiiiik boum slakalakalak pouf zut !<br>';
        }
    }
    abstract public function ajouter_personne($personne);
    public function get_poids(){
        return $this->poids;
    }
    public function get_color(){
        return $this->couleur;
    }
    
}

?>