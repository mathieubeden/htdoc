<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <title>uploader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
    </head>
    <body>
        <form action="cho7.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
            <p>Choisissez une photo avec une taille inférieure à 3 Mo.</p>
            <input type="file" name="photo">
            <br />
            <input type="submit" name="ok" value="Envoyer">
        </form>
    </body>
</html>
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
                    echo 'veuiller envoyer une photeh';
            }
        } 
        else if($_FILES){
            
            if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {
                $chemin_destination = 'taca/';          
                $_FILES['photo']['name']='test.jpg';
                move_uploaded_file($_FILES['photo']['tmp_name'],
                $chemin_destination.$_FILES['photo']['name']);
                echo "<img src='./taca/test.jpg' alt='error' ><br>";
            }
            else {
                echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.<br>";
            }
        }
    }
    ?>
</pre>