<?php
class Manager{
    private $base;
    private $date;

    public function __construct ($base){ // recup de la bdd
        $this->base = $base;
        $this->date = date("Y-m-d H:i:s");
    }
    public function insert_art($article){

        $sql="INSERT INTO blog (titre,comm,user,date) VALUES (:titre,:comm,:user,:date)";
        $resultat = $this->base->prepare($sql);
        $resultat->execute(array('titre' =>$article->get_titre(),'comm' =>$article->get_comm(),'user' => $article->get_user(),"date"=> $this->date));
    }
    
}




?>