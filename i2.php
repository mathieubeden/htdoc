
<?php 
echo date("l d M o G:i:s").'<br><br>';


$contenu = file_get_contents('reda.txt');
file_put_contents("reda.txt",((int)$contenu+1));

$contenu = file_get_contents('reda.txt');
echo $contenu;

echo'<br><br>';

$nbf=0;
if($contenu>=200){echo'ça fais beaucoup là. non ?';}

if ($pointeur = opendir('./img')) {
    while (false !== ($fichier = readdir($pointeur))) { 
        if ($fichier != "." && $fichier != "..") {
            $nbf+=1;
        }
    }
}
closedir($pointeur);

session_start();
$_SESSION['nom'] = $_ENV['USERNAME'];
setcookie("nom",$_SESSION['nom'],time()+3600);


$tm1=microtime(TRUE);

for($i=1;$i<=$nbf;$i++){
    $cud = file_get_contents('img.txt');
    copy("./img/img$i.gif","./archive/arch$i.gif");
    file_put_contents("./img.txt",$cud."./img/img$i.gif mesurant ".round(filesize("./img/img$i.gif")/1000)." ko \n");
}



$tm2=microtime(TRUE);
$tm3=round(($tm2-$tm1)*1000);

touch("./archive/log.txt");

$cud2 = file_get_contents('./archive/log.txt');
file_put_contents("./archive/log.txt",$cud2.'archivé en '.$tm3." milliseconde \n");

echo 'images archivés en '.($tm3).' millisecondes';

echo'<br><br>';


$a=[3,8,15,16];
$b=[];
for($i=1;$i<=20;$i++){
    array_push($b,$i);
    if(in_array($i,$a)){
            array_pop($b);
        }
}
print_r($b);


?> 
