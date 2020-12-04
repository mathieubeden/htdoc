<?php

class quatre_roues extends vehicule{
    protected $nombre_portes;

    public function repeindre($color){
        $this->couleur=$color;
    }
    public function __construct ( $nombre_portes=2){
        $this->nombre_portes = $nombre_portes; 
    }
    public function get_color(){
       return $this->couleur;
    }
    public function get_porte(){
       return $this->nombre_portes;
    }
}

?>