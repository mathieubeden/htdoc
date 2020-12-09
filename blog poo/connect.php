<?php
include('./auth.php');
    //echo hash('ripemd160', 'root');
    if(isset($_POST['user'])){
        //recuperation de tout ce qui vien du poste
        $verific=new auth($_POST['user'],$_POST['pass']);

        if($verific->verification_user()){//verification de l'existance et de la validité de l'user
            setcookie('user', $_POST['user'], time()+3600);
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
        margin-top:10%;
    }
    input{
        border-radius:5px;
    }
    
    </style>
    <body>
    <h1>connection</h1>
        <form action="./connect.php" method="post">
        user : <input type="text" name='user'/><br><br>
        password : <input type="password" name="pass" id="pass"><br><br>
        <input type="submit" value="connection">
        </form>
    </body>
    </html>