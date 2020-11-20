<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="blog de parole de geek">
    <title>bienvenus <?php echo $_COOKIE['user'];?></title>
</head>
<style>
    .bord{
        border : black solid 1px;
        width : 50%;
        display : block;
        margin:20px;
        margin-left:19%;
        text-align:center;
        border-radius:10px
    }
    .boton{
        border : black solid 1px;
        width : 80%;
        display : inline-block;
        margin:10px;
        text-align:center;
        border-radius:10px;
        padding:7px;
        transition:0.5s;
    }
    .boton:hover{
        background-color: red;
        color:white;
        transition:0.5s;
    }
    .redrok{
        position:fixed;
        right:0px;
    }
    .comm{
        width:90% !important;
        display:inline-block;
    }
    p {
        text-indent: 30px;
        font-size:25px
    }
    .title{
        text-transform: uppercase;
        text-align:center;
         text-indent: 30px;
         color : red;
         font-size:200%;
         margin-top:10px
    }
    .writen{
        font-size:15px;
        color:blue
    }

</style>
<body>
    <div class="redrok">
        <a class='boton' href="ajblog.php">ajouter un article</a><br> 
        <a class='boton' href="modif.php">modifier un article</a><br> 
        <a class='boton' href="delet.php">suprimer un article</a><br> 
    </div>
    <br><br>
    <h1 style='margin-left:23%;'>blog de Parole De Geek</h1>
  <br>  
  <?php
        // Connexion à la base de données
        $base = mysqli_connect("127.0.0.1", "root", "", "basalt");
        if ($base) {
        $sql = "SELECT user, pass ,title,commentary,date FROM blog WHERE 1";
        // Préparation de la requête
        $resultat = mysqli_prepare($base, $sql);
        // Exécution-de la requête.
        $ok = mysqli_stmt_execute($resultat);
        if ($ok !== FALSE) {
        

        // Association des variables de résultat.
        $ok = mysqli_stmt_bind_result($resultat,$user,$pass,$title,$commentary,$date);
        // Lecture des valeurs.
        while (mysqli_stmt_fetch($resultat)) {//géneration du blog
        if(isset($title)){
            echo"<div onclick=\"window.location.href='./modif.php?title=$title'\" class='bord'>";
            echo"<div class='title'>$title</div><p class='writen'>ecrit par : $user</p><p class='writen'>publié le $date</p><p class='comm'>$commentary</p>";
            if(file_exists("./pho/$title.jpg"))echo "<a href='./pho/$title.jpg'><img src='./pho/$title.jpg'  width='70%' alt='404' ></a><br><br>";
            echo'</div>';
        }
        }

        }
        if (mysqli_close($base)) {//affichage des éreures
        }
        }
        else {
        printf('Erreur %d : %s.<br/>',mysqli_connect_errno(),mysqli_connect_error());
        }

        ?>
</body>
</html>

