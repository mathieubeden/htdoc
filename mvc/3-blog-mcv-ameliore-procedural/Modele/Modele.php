<?php

// Renvoie la liste des billets du blog
function getBillets() {
    $bdd = getBdd();
    $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc');
    return $billets;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' where BIL_ID=?');
    $billet->execute(array($idBillet));
    if ($billet->rowCount() > 0)
        return $billet->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
}
//delete les coms et le billet
function delBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->prepare('delete from t_commentaire where BIL_ID=?');
    $billet->execute(array((int)$idBillet));
    $billet = $bdd->prepare('delete from t_billet where BIL_ID=?');
    $billet->execute(array((int)$idBillet));
    header('location:index.php');
}
//delete juste un com
function delcom($idCom) {
    $bdd = getBdd();
    $billet = $bdd->prepare('delete from t_commentaire where COM_ID=?');
    $billet->execute(array((int)$idCom));
}
//ajt un com
function complus($id,$auth,$cont) {
    $bdd = getBdd();
    $billet = $bdd->prepare('INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) VALUES (?,?,?,?)');
    $billet->execute(array(time(),$auth,$cont,$id));
}
//ajt un bill
function billplus($titr,$cont) {
    $bdd = getBdd();
    $billet = $bdd->prepare('INSERT INTO t_billet(BIL_TITRE, BIL_CONTENU) VALUES (?,?)');
    $billet->execute(array($titr,$cont,));
}

// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID=?');
    $commentaires->execute(array($idBillet));
    return $commentaires;
}

// Effectue la connexion à la BDD

// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=mda;charset=utf8', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}