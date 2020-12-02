<?php

class deux_roues extends vehicule{
    private $cylindree;

    public function mettre_essence($litre){
        $this->poids+=$litre;
    }
    public function get_cilyndré($litre){
        return $this->cylindree;
    }
}

?>