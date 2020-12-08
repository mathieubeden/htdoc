<?php

if($_COOKIE['user']==$_GET['user']){

if(isset($_GET['id'])){//pour le form

}
else{//pour modifier ou deleter

    if($_POST['choix']=="delet"){

    }
    else if($_POST['choix']=="modif"){
        
    }

}




}
else{
    header('location:connect.php');
}
?>