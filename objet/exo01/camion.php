<?php
class camion extends quatre_roues{
private $longueur;

public function __construct ($couleur,$poids,$nombre_portes, $longueur=3){
        $this->longueur = $longueur;
        $this->couleur = $couleur; 
        $this->poids = $poids; 
        $this->nombre_portes = (int)$nombre_portes; 
        }
public function ajouter_remorque($longueur_rem){
    $this->longueur+=$longueur_rem;
}
public function get_longueur(){
    return $this->longueur;
}
}
?>