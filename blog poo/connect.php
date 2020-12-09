<?php
include('./auth.php');
    //echo hash('ripemd160', 'root');
    if(isset($_POST['user'])){
        //recuperation de tout ce qui vien du poste
        $verific=new auth($_POST['user'],$_POST['pass']);

        if($verific->verification_user()){//verification de l'existance et de la validité de l'user
            setcookie('user', $_POST['user'], time()+900);
            header('location:blogoo.php');
        }else{
            echo "nom d'utilisateur ou mot de passe incorrect";
        }
       
    }

?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>connection</title>
    </head>
    <style>
    
    body{
        text-align:center;
        
    }
    form{
        margin-top:3%;
    }
    input{
        border-radius:5px;
    }
    
    </style>
    <body>
    <h1>connection</h1>
    <h2><?php if(isset($_COOKIE['user'])){echo 'your current user is : '.$_COOKIE['user'];}?></h2>
    
    <br><button onclick="window.location.href='./signin.php'">s'inscrire</button><br>
        <form action="./connect.php" method="post">
        user : <input type="text" name='user'/><br><br>
        password : <input type="password" name="pass" id="pass"><br><br>
        <input type="submit" value="connection">
        </form>
        <br><br><button onclick="window.location.href='./blogoo.php'">go back</button><br>
    </body>
    </html>