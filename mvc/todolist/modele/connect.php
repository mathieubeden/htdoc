<?php
require 'modele.php';
class connect extends modele{
    private $user;
    private $pass;

    private function __construct()
    {
        $this->bdd=$this->getBdd();
    }

    public function verific($user,$pass){
        $sql="select id,username from user where username=? and password=?";
        $arr=array("username"=>$user,"password"=>$pass);
        $this->executerRequete($sql, $arr);
        if ($billet->rowCount() > 0)
            return true;
    }



}