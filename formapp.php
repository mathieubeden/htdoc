<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
    <form action="formapp.php" method="get">
    
    <input type="number" name="nba" value="5" id="nba" max="2500">
    <br><br>
    <input type="submit" value="sub">
    </form>
</body>
<style>

.momo{
    width:150px;
    border:black 2px solid;
    padding:5px
}

</style>
</html>

<?php 

$demo=[];

include("./mots.php");

function alea($mots){
    global $demo;
    $dej=1;
    $max=1;
    while($dej>=1&&$max<count($mots)-1){
        $aleat=round(rand(0,count($mots)));
        $vera=$mots[$aleat];
        if(!array_search($vera,$demo)){
            $dej=0;
        }else{
            $max+=1;
        }
        
    }
        array_push($demo,$vera);
        $demo=array_unique($demo);
        return $demo[count($demo)-1];
}
echo'<br><br>';

if(isset($_GET['nba'])){
    $nba=$_GET['nba'];
}
if($nba<=1){$nba=1;}
if($nba>2500){
    echo 'le nombre est trop long. éssayez avec un nombre plus petit que 2500 (question de performance)';
}
else{
    echo"nombre de mots : $nba <br>";
    for($i=1;$i<=$nba;$i++){
        echo '<p class="momo" onclick="alert(event.target.innerHTML)">'.alea($mots).'</p>';
    }
}


?>


