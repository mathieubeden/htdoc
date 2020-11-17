<?php

        $user=htmlspecialchars(addslashes(trim($_POST['user'])));
        $pass=htmlspecialchars(addslashes(trim($_POST['pass'])));
try
{
$base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', ''); //’mysql:host=$host;dbname=$db;charset=utf8’
$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// Récupèration des données de la table Personne
$resultat = $base->query('SELECT nom,prenom FROM personne WHERE nom="'.$user.'" AND prenom="'.$pass.'"');

// Affichage de chaques entrées une à une
    if($resultat->rowCount()){
        $ok=true;
        echo 'ok';
    }

$resultat->closeCursor(); // Fermeture de la requête
}
catch(Exception $e)
{
// message en cas d'erreur
die('Erreur : '.$e->getMessage());
}
if(!$ok){
    $fail+=1;
    header("Location:login.php?miss=$fail");
}
?>




