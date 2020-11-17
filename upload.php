<pre>
 <?php 
    if(issset($_FILES)){
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
                    echo "La taille du fichier que vous avez envoyé est nulle." ; break;
            }
        } 
        else if($_FILES){
            
            if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {
                $chemin_destination = 'taca/';          

                move_uploaded_file($_FILES['photo']['tmp_name'],
                $chemin_destination.$_FILES['photo']['name']);
                $size=round(filesize($_FILES['photo'])/1000);
                rename($_FILES['photo']['name'],$_POST['title'].'.jpg');
            }
            else {
                echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.<br>";
            }
        }
    }
    //
    ?>
</pre>    