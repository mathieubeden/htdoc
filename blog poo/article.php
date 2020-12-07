<?php
class Article{
    private $titre;
    private $comm;
    private $user;

    public function get_all(){//retourn toute les valeurs
        return array('titre'=>$this->titre,'comm'=>$this->comm,'user'=>$this->user);
    }
    public function set_titre(){//retourn toute les valeurs
        return array('titre'=>$this->titre,'comm'=>$this->comm,'user'=>$this->user);
    }
    
}

















?>