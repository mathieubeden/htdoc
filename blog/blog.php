<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenus <?php echo $_COOKIE['user'];?></title>
</head>
<style>
    .bord{
        border : black solid 1px;
        width : 45%;
        display : inline-block;
        margin:10px;
        text-align:center;
        border-radius:10px
    }
    .boton{
        border : black solid 1px;
        width : 10%;
        display : inline-block;
        margin:10px;
        text-align:center;
        border-radius:10px;
        padding:10px;
        transition:0.5s;
    }
    .boton:hover{
        background-color: red;
        color:white;
        transition:0.5s;
    }
</style>
<body>
<a class='boton' href="modif.php">modifier un article</a><br> 
<a class='boton' href="delet.php">suprimer un article</a><br> 
<a class='boton' href="ajblog.php">ajouter un article</a><br> 
  <br>  <?php
// Connexion à la base de données
$base = mysqli_connect("127.0.0.1", "root", "", "basalt");
if ($base) {
$sql = "SELECT user, pass ,title,commentary FROM blog WHERE 1";
// Préparation de la requête
$resultat = mysqli_prepare($base, $sql);
echo'<br>';
// Liaison des paramètres.
// Exécution-de la requête.
$ok = mysqli_stmt_execute($resultat);
if ($ok == FALSE) {
}
else {

// Association des variables de résultat.
$ok = mysqli_stmt_bind_result($resultat,$user,$pass,$title,$commentary);
// Lecture des valeurs.
while (mysqli_stmt_fetch($resultat)) {//géneration du blog
echo'<div class="bord">';
echo"<h3>$title</h3><p>ecrit par $user</p><p>$commentary</p>";
echo "<a href='./pho/$title.jpg'><img src='./pho/$title.jpg'  width='60%' alt='error' ></a><br><br>";
echo'</div>';
}
mysqli_stmt_close($resultat);//déconnection

}
if (mysqli_close($base)) {
}
else {
echo 'Echec de la déconnexion.';
}
}
else {
printf('Erreur %d : %s.<br/>',mysqli_connect_errno(),mysqli_connect_error());
}

?>
</body>
</html>

