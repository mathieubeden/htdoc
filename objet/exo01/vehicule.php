<?php

class vehicule{
    protected $couleur;
    protected $poids;

    public function __construct ($couleur, $poids=100){
        $this->couleur = $couleur; 
        $this->poids = $poids;
        }

    public function rouler(){
        if($this->poids>=5){
            $this->poids-=0;
            echo 'broum broum<br>';
        }else{
        echo 'broum iiiiiiiik boum slakalakalak pouf zut !<br>';
        }
    }
    public function ajouter_personne($personne){
        echo 'clouk frouch frouh plouk bioup bioup en voiture simone !<br>';
        $this->poids+=$personne;
    }
    public function get_poids(){
        return $this->poids;
    }
    public function get_color(){
        return $this->couleur;
    }
    
}

?>