<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modif ou del</title>
</head>
<script>

function modoudel(event){// change la visibilité du formulaire en fonction de si tu veut supprimer ou modifier
    if(event.target[1].selected==true){
       document.getElementById('titre').style.display='none';
        document.getElementById('comm').style.display='none';
        document.getElementById('lab1').style.display='none';
        document.getElementById('lab2').style.display='none';
    }else  if(event.target[0].selected==true){
       document.getElementById('titre').style.display='inline-block';
        document.getElementById('comm').style.display='inline-block';
        document.getElementById('lab1').style.display='inline-block';
        document.getElementById('lab2').style.display='inline-block';
    }
}

</script>
<style>

select{
    border-radius:10px;
    margin-top:3%;
}
body{
    text-align:center;
}
input{
    border-radius:5px;
}
textarea{
    border-radius:5px;
}

</style>
<body>
    

<?php
include('./class.modelet.php');
if($_COOKIE['user']==$_GET['user']){//verifi que c'est ton article (de toute facon si ce n'est pas le tien et que tu passe quand meme ca va rien faire)

    if(!isset($_POST['titre'])){//generation du formulaire

    echo '<form action="./modelet.php?id='.$_GET['id'].'&user='.$_GET['user'].'" method="POST"><select onchange="modoudel(event);" name = "choix"><option  value = "modif" selected>modifier</option><option value = "delet">supprimer</option></select> <br><br><label id="lab1" for="titre">titre : </label><br><input type="text" name="titre" id="titre"><br><label  id="lab2" for="comm">commentaire : </label><br><textarea style="width:20%;height:20%;" id="comm" name="comm"></textarea><br><input type="submit" value="soumission"></form>';


    }
    else{//pour modifier ou deleter
        $model=new modelet($_GET['id'],$_COOKIE['user']);//suprime
        if($_POST['choix']=="delet"){
            $model->supression();
            header('location:blogoo.php');
        }
        else if($_POST['choix']=="modif"){
            $model->modifier($_POST['titre'],$_POST['comm']);//modifie
            header('location:blogoo.php');
        }

    }
}
else{//si tu n'est pas le créateur de l'article
    header('location:connect.php');
}
?>
    <br><button onclick="window.location.href='./blogoo.php'">retourner au blog</button><br>
</body>
</html>