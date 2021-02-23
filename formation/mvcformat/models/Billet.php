<?php

require_once 'models/Modele.php';


class Billet extends Modele
{

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets()
    {
        $sql = 'select * from forma1 order by id desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */


    public function postuler($post)
    {
        extract($post);
        if(!$this->rechercherGars($nom, $prenom)){
        $sql = "INSERT INTO forma1 (nom, prenom, intit, debut, fin, email) VALUES (?, ?, ?, ?, ?,?)";
        $this->executerRequete($sql, array($nom, $prenom, $intit, $debut, $fin, $email));}
        else throw new Exception("tu t'est trompé de dimension, tu éxiste déja dans cette univers");
    }

    public function suprimerbillet($id)
    {
        $sql = 'delete from forma1 where id=?'; // delet le mec
        $this->executerRequete($sql, array($id));
    }
    public function rechercherGars($nom, $prenom)
    {
        $sql = "SELECT * from forma1 where nom=:nom and nom=:pre "; // delet le mec
        $tru=$this->executerRequete($sql, array('nom'=>$nom,'pre'=>$prenom));
        if($tru){return true;}
    }
}
