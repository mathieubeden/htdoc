<?php
    //recuperation de tout ce qui vien du poste
    if(isset($_POST)){
        $nom=htmlspecialchars(addslashes(trim($_POST['nom'])));
        $prenom=htmlspecialchars(addslashes(trim($_POST['prenom'])));
        $intit=htmlspecialchars(addslashes(trim($_POST['intit'])));
        $debut=$_POST['debut'];
        $fin=$_POST['fin'];
        $email=$_POST['email'];
    }
    if(isset($_GET['ok'])){
        if($_GET['ok']==1){
            try {//ajout des post dans la bdd
                $base = new PDO('mysql:host=127.0.0.1;dbname=formation1', 'root', '');
                $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO forma1 (nom, prenom, intit, debut, fin, email) VALUES (:nom, :prenom, :intit, :debut, :fin, :email)";
                // Préparation de la requête avec les marqueurs
                $resultat = $base->prepare($sql);
                $resultat->execute(array('nom' => $nom,'prenom' => $prenom,'intit' => $intit,'debut' =>$debut,'fin' =>$fin,'email' =>$email));
                $id=$base->lastInsertId();
                $resultat->closeCursor();
            }
            catch(Exception $e){
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            }
            //sortie
            header("location:inscr.php?miss=2&id=$id");
        }
        else{
            header('location:inscr.php?miss=1');
        }
    }
    else{
            header('location:inscr.php?miss=1');
    }



?>