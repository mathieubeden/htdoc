<?php
    $users="glouglou";
    $passw="rate";
    $fail=0;
    if (isset($_GET['miss'])) {
        $fail=$_GET['miss'];
    }
    
    if(isset($_POST["user"])){
        $user=htmlspecialchars(addslashes(trim($_POST['user'])));
        $pass=htmlspecialchars(addslashes(trim($_POST['pass'])));
        try
            {
            $base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // Récupération des données de la table Personne
            $resultat = $base->query('SELECT * FROM Personne WHERE nom=$user AND prenom=$pass');
            $res=$resultat->rowCount();
            $resultat->closeCursor(); // Fermeture de la requête
            }
            catch(Exception $e)
            {
            // message en cas d'erreur
            die($res=false);
        if($res){
            echo'<h1>login correct</h1>';
            $contenu = file_get_contents('fail.txt');
            file_put_contents("fail.txt","bonjour .\n");
            $fail=0;
        }
        else if(!isset($_POST)){
            header('Location:logar.php?test=miss');
            $fail+=1;
        }
        else{
            $contenu = file_get_contents('fail.txt');
            file_put_contents("fail.txt",$contenu."\n".$_POST['user'].' et '.$_POST['pass'].' non correct');
            echo'<h1>login incorrect</h1>';
            $fail+=1;
        }
            }}
?>
<br>
<button onclick="window.location.href = './logar.php?miss=<?= $fail?>'">réessayer</button>