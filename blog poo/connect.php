<?php
include('./auth.php');
    //echo hash('ripemd160', 'root');
    if(isset($_POST['user'])){
        //recuperation de tout ce qui vien du poste
        $verific=new auth($_POST['user'],$_POST['pass']);

        if($verific->verification_user()){
            setcookie($_POST['user'], $value, time()+600);
            header('location:blogoo.php');
        }else{
            echo 'false';
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
    <body>
        <form action="./connect.php" method="post">
        user : <input type="text" name='user'/><br>
        psw : <input type="password" name="pass" id="pass"><br><br>
        <input type="submit" value="connection">
        </form>
    </body>
    </html>