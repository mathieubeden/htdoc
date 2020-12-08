<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="blog de parole de geek">
    <title>bienvenu</title>
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
        <?php if(isset($_COOKIE['user'])){echo '<a class="boton" href="connect.php">'.$_COOKIE['user'].'</a>';} ?>
        <a class='boton' href="insertion.php">ajouter un article</a>
    </div>
    <br><br>
    <h1 style='margin-left:23%;'>blog de Parole De Geek en programmation orienté objet</h1>
  <br>  
  <?php
        // Connexion à la base de données
       $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', ''); //’mysql:host=$host;dbname=$db;charset=utf8’
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if ($base) {
        $sql = "SELECT * FROM blog";
        // Préparation de la requête
       $resultat = $base->query('SELECT * FROM blog');
            
        // Affichage de chaques entrées une à une
        while ($donnees = $resultat->fetch()){
            $date=$donnees['date'];
            echo"<div onclick=\"window.location.href='./modelet.php?title=".$donnees['titre']."&user=".$donnees['user']."'\" class='bord'>";
            echo"<div class='title'>".$donnees['titre']."</div><p class='writen'>ecrit par : ".$donnees['user']."</p><p class='writen'>publié le ".$date."</p><p class='comm'>".$donnees['comm']."</p>";
            if(file_exists("./photo/".$donnees['id'].".jpg"))echo "<a href='./photo/".$donnees['id'].".jpg'><img src='./photo/".$donnees['id'].".jpg'  width='70%' alt='404' ></a><br><br>";
            echo'</div>';
        }

        }

        ?>
</body>
</html>

