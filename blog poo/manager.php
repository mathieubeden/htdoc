<?php
class Manager{
    private $base;
    private $date;

    public function __construct ($base){ // recup de la bdd
        $this->base = $base;
        $this->date = date("d/m/Y à H:i");
    }
    public function insert_art($article){//insertion de l'article dans la base de données

        $sql="INSERT INTO blog (titre,comm,user,date) VALUES (:titre,:comm,:user,:date)";
        $resultat = $this->base->prepare($sql);
        $resultat->execute(array('titre' =>$article->get_titre(),'comm' =>$article->get_comm(),'user' => $article->get_user(),"date"=> $this->date));
    }
    
}




?>