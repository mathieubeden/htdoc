<?php

class Chat extends classy{

    private $race; //race du chat

    //accesseurs

    final public function getRace(){

        return $this->race; //retourne la race

    }
    public function setRace($race){

        $this->race = $race; //écrit dans l'attribut race

    }
    //méthode
    public function miauler(){

        echo "Miaou <br />";

    }
    public function respire(){

        echo "ron ron<br />";

    }

}
?>