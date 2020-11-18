
<form action="ajblog.php?miss=<?php if(isset($_GET['miss'])){echo (int)$_GET['miss'];}else{echo 0;}?>" method="POST" enctype="multipart/form-data">
                 user : <input required type="text" name="user"><br>
              pass : <input required type="password" name="pass" id="pren"><br>
titre : <input required type="text" name="title" id="title"><br>
       commentaire : <textarea style='width:20%;height:20%;' required id="commentary" name="commentary"></textarea><br>
         photo : <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg"><br>
                       <input type="submit" value="envoyer">
    </form>
<h3><?php if(isset($_GET['miss'])&&$_GET['miss']>=1){echo "fails  ".($_GET['miss'])."<br>";}; ?></h3>
<a href="blog.php">aller au blog</a>
<?php
//hash('ripemd160', 'root');
    //recuperation de tout ce qui vien du poste
    if(isset($_POST['pass'])){
        $_POST['pass']=hash('ripemd160', $_POST['pass']);
    }
if(isset($_POST['user'])&&isset($_POST['pass'])){//verification du uset et du pass
        try{
            $base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT user, pass FROM blog WHERE user=:user AND pass=:pass";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('user' => $_POST['user'],'pass' => $_POST['pass']));
            $ligne = $resultat->fetch();
                if(isset($ligne['user'])){//si le login est bon
                    inputing();
                }
                
                $resultat->closeCursor();
            }
            catch(Exception $e)
            {
                // message en cas d'erreur
                die('Erreur : '.$e->getMessage());
            }
        




    }


function inputing(){
    if(isset($_POST['user'])){
    if(true){
        try  //ajout des post dans la bdd
        {
        $base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO blog (user, pass, title, commentary) VALUES (:user, :pass, :title, :commentary)";
        // Préparation de la requête avec les marqueurs
        $resultat = $base->prepare($sql);
        $resultat->execute(array('user' => $_POST['user'],'pass' => $_POST['pass'],'title' => $_POST['title'],'commentary' =>$_POST['commentary']));
        $id=$base->lastInsertId();
        $resultat->closeCursor();
        }
        catch(Exception $e)
        {
        // message en cas d'erreur
        die('Erreur : '.$e->getMessage());
        }
       
    }
    else{
        if(isset($_GET['miss'])){$_GET['miss']+=1;}else{$_GET['miss']=1;}
        header('location:ajblog.php?miss='.(int)$_GET['miss']+=1);
    }
}
if(isset($_FILES['photo'])){
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
            
            if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {//renomage et déplacement du temp ver le dossier des images
                $chemin_destination = 'pho/';          
                $_FILES['photo']['name']=$_POST['title'].'.jpg';
                move_uploaded_file($_FILES['photo']['tmp_name'],
                $chemin_destination.$_FILES['photo']['name']);
                setcookie("user",$_POST['user'],time()+8180);//change l'user logué
            }
            else {
                echo "érreur interne<br>";
            }
        }
    }

}


?>