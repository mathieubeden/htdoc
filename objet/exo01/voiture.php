<?php

class voiture extends quatre_roues{
    private $nombre_pneu_neige;

    public function ajouter_pneu_neige($nombre){
        $this->nombre_pneu_neige+=$nombre;
    }
    public function enlever_pneu_neige($nombre){
        $this->nombre_pneu_neige-=$nombre;
    }
    public function get_pneu_neige(){
        return $this->nombre_pneu_neige;
    }
}

?>