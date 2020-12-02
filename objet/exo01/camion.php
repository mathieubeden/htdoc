<?php
class camion extends quatre_roues{
private $longueur;

public function ajouter_remorque($longueur_rem){
    $this->longueur+=$longueur;
}
public function get_longueur(){
    return $this->longueur;
}
}
?>