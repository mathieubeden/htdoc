<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modif ou del</title>
</head>
<script>

function modoudel(event){
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
<body>
    

<?php
include('./class.modelet.php');
if($_COOKIE['user']==$_GET['user']){

    if(!isset($_POST['titre'])){

    echo '<form action="./modelet.php?id='.$_GET['id'].'&user='.$_GET['user'].'" method="POST"><select onchange="modoudel(event);" name = "choix"><option  value = "modif" selected>modifier</option><option value = "delet">supprimer</option></select> <br><label id="lab1" for="titre">titre : </label><br><input type="text" name="titre" id="titre"><br><label  id="lab2" for="comm">commentaire : </label><br><textarea style="width:20%;height:20%;" id="comm" name="comm"></textarea><br><input type="submit" value="soumission"></form>';


    }
    else{//pour modifier ou deleter
        $model=new modelet($_GET['id'],$_COOKIE['user']);
        if($_POST['choix']=="delet"){
            $model->supression();
            header('location:blogoo.php');
        }
        else if($_POST['choix']=="modif"){
            $model->modifier($_POST['titre'],$_POST['comm']);
            header('location:blogoo.php');
        }

    }
}
else{
    header('location:connect.php');
}
?>
</body>
</html>