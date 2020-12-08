<?php

include('./article.php');
include('./manager.php');
if($_COOKIE['user']!==$_POST['user']){
    header('location:connect.php');
}
$article=new Article();
if(isset($_POST)){// definition de l'article (la photo sera defini seulement par l'id de l'article)
    $article->set_all($_POST);
}

$base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');//connection a la base de donnée
$base->exec("SET NAMES utf8");
$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$manager=new Manager($base);

if(isset($_POST)){//inser l'article dans la base de donnée
    $manager->insert_art($article);
}

?>
<pre>
 <?php 
    if(isset($_FILES)){
        if ($_FILES['photo']['error']) {
            switch ($_FILES['photo']['error']){
                case 1: // UPLOAD_ERR_INI_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le serveur.";
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le formulaire.";
                    break;
                case 3: // UPLOAD_ERR_PARTIAL
                    echo "L'envoi du fichier a été interrompu pendant le transfert.";
                    break;
                case 4: // UPLOAD_ERR_NO_FILE
                    break;
            }
        } 
        else if($_FILES){
            $id=0;
        try
            {
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', ''); //recupération des id's pour recupérer l'id de l'article
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // Récupèration des données de la table Personne
            $resultat = $base->query('SELECT id FROM blog');
            
            // Affichage de chaques entrées une à une
            while ($donnees = $resultat->fetch())
            {
                $id=$donnees['id'];
            }
            $resultat->closeCursor(); // Fermeture de la requête
            }
            catch(Exception $e)
            {
            // message en cas d'erreur
            die('Erreur : '.$e->getMessage());
        }
            
            if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {
                $chemin_destination = 'photo/';  //definition du chemin de destination
                $_FILES['photo']['name']=$id.'.jpg';// renomage de la photo par l'id de l'article
                move_uploaded_file($_FILES['photo']['tmp_name'],
                $chemin_destination.$_FILES['photo']['name']);
                header('location:insertion.php');
            }
            else {//si sa merde
                echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.<br>";
            }
        }
    }
    //fin d'insertion
    ?>
</pre>    




