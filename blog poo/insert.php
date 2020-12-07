<?php

include('./article.php');
include('./manager.php');

$article=new Article();
if(isset($_POST)){
    $article->set_all($_POST);
    $article->set_photo((string)$_FILES['photo']['name']);
}

$base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');
$base->exec("SET NAMES utf8");
$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$manager=new Manager($base);

if(isset($_POST)){
    $manager->insert_art($article);
}

?>
<pre>
 <?php 
    if(isset($_FILES)){
        if ($_FILES['photo']['error']) {
            switch ($_FILES['photo']['error']){
                case 1: // UPLOAD_ERR_INI_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le serveur
                    (paramètre upload_max_filesize du fichier php.ini).";
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le
                    formulaire (paramètre post_max_size du fichier php.ini).";
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
            $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', ''); //’mysql:host=$host;dbname=$db;charset=utf8’
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
                $chemin_destination = 'photo/';  
                $_FILES['photo']['name']=$id.'.jpg';
                move_uploaded_file($_FILES['photo']['tmp_name'],
                $chemin_destination.$_FILES['photo']['name']);
            }
            else {
                echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.<br>";
            }
        }
    }
    //
    ?>
</pre>    




