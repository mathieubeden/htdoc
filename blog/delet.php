
<form action="delet.php?miss=<?php if(isset($_GET['miss'])){echo (int)$_GET['miss'];}else{echo 0;}?>" method="POST" enctype="multipart/form-data">
      user : <input required type="text" name="user"><br>
      pass : <input required type="password" name="pass" id="pass"><br>
     titre : <input required type="text" name="title" id="title"><br>
             <input type="submit" value="envoyer">
</form>
<h3><?php if(isset($_GET['miss'])){echo "fails  ".($_GET['miss'])."<br>";}; ?></h3>
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
                        deputing();
                    }

                    $resultat->closeCursor();
                }
                catch(Exception $e)
                {
                    // message en cas d'erreur
                    die('Erreur : '.$e->getMessage());
                }
            




        }


    function deputing(){
        if(isset($_POST['user'])){
        if(true){
            try  //ajout des post dans la bdd
            {
            $base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM blog WHERE user=:user AND title=:title";
            // Préparation de la requête avec les marqueurs
            $resultat = $base->prepare($sql);
            $resultat->execute(array('user' => $_POST['user'],'pass' => $_POST['pass'],'title' => $_POST['title']));
            $id=$base->lastInsertId();
            $resultat->closeCursor();
            }
            catch(Exception $e)
            {
            // message en cas d'erreur
            die('Erreur : '.$e->getMessage());
            }
        
        }
    }


    }


?>