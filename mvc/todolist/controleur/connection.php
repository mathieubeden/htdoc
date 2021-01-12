<?php
require '../modele/connect.php';


if(isset($_POST['user'])){
$user=htmlspecialchars($_POST['user']);
hash('ripemd160', $_POST['pass']);
$connect=new connect;
$verif=$connect=>verivic($user,$pass);
if($verif){
    //vueAcueuil.pgh
}
}