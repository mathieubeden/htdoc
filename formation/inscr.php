<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lagon</title>
</head>
<body>
    <form action="verific.php?ok=<?php if(isset($_GET['ok'])){echo $_GET['ok'];}?>" method="post">
                 nom : <input required type="text" name="nom"><br>
              prenom : <input required type="text" name="prenom" id="pren"><br>
intitulé de formtion : <input required type="text" name="intit" id="intit"><br>
       date de début : <input required type="date" name="debut" id="debut"><br>
         date de fin : <input required type="date" name="fin" id="fin"><br>
       adresse email : <input required type="email" name="email" id="email"><br>
                       <input required type="checkbox" name="cluf" id="cluf"> j'accept les condition visible sur ce <a href="cluf.php">lien</a><br>
                       <input type="submit" value="envoyer">
    </form>
    <h3><?php if(isset($_GET['miss'])){ //verifi les gets et te souhaite la bienvenu ou une érreur
        if($_GET['miss']==2){
             if(isset($_GET['id'])){
                echo "bienvenu. vous avez été corectement enregistré avec l'id ".$_GET['id'].".";
             }
        }
        
        else{echo "des champs sont invalide ou manquant";}
        } ?></h3>


<?php
try{
  $base = new PDO('mysql:host=127.0.0.1;dbname=formation1', 'root', '');
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT Nom, Prenom,intit FROM forma1";// Préparation de la requête avec les marqueurs
  $resultat = $base->prepare($sql);
  $resultat->execute();
  while ($ligne = $resultat->fetch()){
    echo 'Nom : '.$ligne['Nom'].', Prénom : '.$ligne['Prenom'].', intitulé : '.$ligne['intit'].'<br />';
  }
  $resultat->closeCursor();
}
catch(Exception $e){
  // message en cas d'erreur
  die('Erreur : '.$e->getMessage());
}
?>
</body>
</html>