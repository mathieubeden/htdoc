<?php
class Article{
    private $titre;
    private $comm;
    private $user;
    private $photo;

    public function get_all(){//retourn toute les valeurs
        return array('titre'=>$this->titre,'comm'=>$this->comm,'user'=>$this->user,'photo'=>$this->photo);
    }
    public function set_all($all){//defini toute les valeurs (utiliser $_POST de préférence mais foncionne aussi avec une autre array)
        $this->titre=htmlspecialchars($all['titre']);
        $this->comm=htmlspecialchars($all['comm']);
        $this->user=htmlspecialchars($all['user']);
    }
    public function set_photo($photo){
        $this->photo=$photo;
    }
    public function get_photo(){
       return (string)$this->photo;
    }
    public function get_titre(){//retourn le titre
        return $this->titre;
    }
    public function get_comm(){//retourn le comm
        return $this->comm;
    }
    public function get_user(){//retourn return le user
        return $this->user;
    }
    
}




?>