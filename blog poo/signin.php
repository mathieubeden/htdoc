<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
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
    <h2>inscription</h2>
    <?php
        include('./auth.php');
        include('./signer.php');
        //echo hash('ripemd160', 'root');
        if(isset($_POST['user'])){
            //recuperation de tout ce qui vien du poste
            $verific=new auth($_POST['user'],$_POST['pass']);

            if($verific->verification_user()){//verification de l'existance et de la validité de l'user
                echo "<h2>l'utilisateur existe déja</h2>";
            }else{
                $base = new PDO('mysql:host=127.0.0.1;dbname=blogoo', 'root', '');//connection a la base de donnée
                $base->exec("SET NAMES utf8");
                $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sign=new Signer($base);
                $sign->sign_on($_POST['user'],$_POST['pass']);
                setcookie('user', $_POST['user'], time()+3600);
                header('location:blogoo.php');
            }
        
        }

    ?><br>
    <br><button onclick="window.location.href='./blogoo.php'">aller au blog</button><br>
    <br><button onclick="window.location.href='./connect.php'">se connecter</button><br>
    <form action="./signin.php" method="post">
    user : <input type="text" name='user'/><br><br>
    password : <input type="password" name="pass" id="pass"><br><br>
    <input type="submit" value="connection">
    </form>
</body>
    
</html>