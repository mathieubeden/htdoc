<?php

class quatre_roues extends vehicule{
    protected $nombre_portes;

    public function repeindre($color){
        $this->couleur=$color;
    }
    public function get_color(){
       return $this->couleur;
    }
}

?>