<?php
define("VITESSE_LUMIERE",'299742km/s');
echo'<br>la vitesse de la lumiere est egale a '.VITESSE_LUMIERE;

echo'<br><br>';
define('PI',3.141592);
echo 'la valeur entiere de pi est égale a '.(int)PI;
echo'<br><br>';
echo"ton ip est : ".$_SERVER['REMOTE_ADDR'].'<br><br>';
echo "moi je suis ".$_SERVER['HTTP_HOST'];

echo'<br><br>';
if (isset($_COOKIE['nom'])) {
echo'bonjour '.$_COOKIE['nom'];
}
echo'<br><br>';
for ($i = 1; $i <= 20; $i++)
{
    if($i<10){
        echo '<b style="color:green"> '.$i;
    echo '</b>';
    }
    else{
        echo '<b style="color:red"> '.$i;
    echo '</b>';
    }
}

echo'<br><br>';
function facta($fact){
        if($fact === 0){
            return 1;
        }
        else{
            return $fact*facta($fact-1);
        }
    }

echo 'la factoriel de 8 = '.facta(8).'. la factoriel de 15 = '.facta(15).'. la factoriel de 25 = '.facta(25);

echo'<br>';


$v1=[];
$v2=[];
$s=1;
for ($j = 1; $j <= 10; $j++){
    $s=(int)$j+10;
    array_push($v1,$j);
    array_push($v2,($s));
}
$v1=implode(" / ",$v1);
$v2=implode(" / ",$v2);
echo'<br><br>'.$v1;
echo'<br><br>'.$v2;
$v3=[];
for($j = 1; $j <= 10; $j++){
    array_push($v3,rand(1,100));
}
asort($v3);
$txt=implode(" / ",$v3);
echo'<br><br>'.$txt;
echo'<br><br><br>';

$tab1=[6,25,35,6];
$tab2=[12,24,46];
$scht=0;
for ($i = 1; $i <= count($tab2); $i++){
    for ($j = 1; $j <= count($tab1); $j++){
        $scht+=((int)$tab2[$i-1]*(int)$tab1[$j-1]);
    }
}
echo $scht;
echo'<br><br>';

$tab_caracteristique_dupont = array("prénom" => "PAUL","profession" => "ministre","age" => 50);
$tab_caracteristique_durand = array("prénom" => "ROBERT","profession" => "agriculteur","age" => 45);
$tab_personne['DUPONT'] = $tab_caracteristique_dupont;
$tab_personne['DURAND'] = $tab_caracteristique_durand;

echo'<table border=1>';
echo'<tr><td>key</td><td colspan=2>value</td></tr>';
foreach($tab_personne as $key => $value){
    echo'<tr>';
    echo'<td rowspan=4>'.$key;
    echo'</td>';
    echo'<td>key';
    echo'</td>';
    echo'<td>value';
    echo'</td>';
    foreach($tab_personne[$key] as $key2 => $value){
        echo'<tr>';
       echo'<td>'.$key2;
       echo'</td>';
       echo'<td>'.$tab_personne[$key][$key2];
       echo'</td>';
       echo'</tr>';
    }
    echo'</tr>';
}
echo'</table>';
echo'<br><br>';

$pras='lompriom';
$pras=strtoupper($pras);
echo$pras;
echo'<br><br>';
$pras=substr($pras,2,3);
echo$pras;
echo'<br><br>';

$email = "jean.dupont@france.fr";
$position = strpos($email,'@');
$position2 = strpos($email,'.');
if($position&&$position2){
    echo'email correct';
}
else{
    echo'email incorrect';
}
echo'<br><br>';

$num=-684;
if(preg_match("/^-?[0-9]{1,3}$/",$num)==true){
    echo 'true';
}
else{
    echo 'false';
}
echo'<br><br>';

if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2,4}$/","1/1/02")==true){
    echo 'true';
}
else{
    echo 'false';
}
echo'<br><br>';

function convFranc($fran){
        $fran*=100;
        $fran/=6.5;
        $fran=(int)$fran;
        return $fran/100;
    }
for($i = 1 ; $i <= 1001 ; $i+=50){
    echo'<p>'.($i-1).' franc = '.convFranc($i-1).' euros</p>';
}
echo'<br><br>';

function factm($fact){
        if($fact === 0){
            return 1;
        }
        else{
            return $fact*factm($fact-1);
        }
    }

echo 'la factoriel de 8 = '.factm(8).'. la factoriel de 15 = '.factm(15).'. la factoriel de 25 = '.factm(25);
echo'<br><br>';

$demo=[];
$mots=["maman","jojo","bobo","roro","jim","wesh","unrevelent","romarin","white",'traveler'];
function alea($mots){
    global $demo;
    $dej=1;
    $max=1;
    while($dej==1&&$max<count($mots)){
        $aleat=array_rand($mots);
        $vera=$mots[$aleat];
        if(!array_search($vera,$demo)){
            $dej=0;
        }else{
            $max+=1;
        }
        
    }
        array_push($demo,$vera);
        $demo=array_unique($demo);
        return $demo;
}
echo'<br><br>';
for($i=1;$i<=(int)rand(0,10);$i++){
    alea($mots);
}
print_r($demo);
echo'<br><br>';
if($_ENV){
    $contenu = file_get_contents('test.txt');
    file_put_contents("test.txt",'machine os : '.$contenu.$_ENV['OS'].' machine name: '.$_ENV['COMPUTERNAME'].' user: '.$_ENV['USERNAME'].' ip: '.$_SERVER['REMOTE_ADDR']."\n");
}
?>
<br>
