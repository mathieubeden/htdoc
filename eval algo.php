<form action="#" method="post">
    <input type="text" placeholder="texte à coder" require name="string">
    <input type="number" placeholder="de comben à decaler" require max="26" name="decalage">
    <input type="submit" value="decaler">



</form>
<?php
if(isset($_POST['string'])){//on recupere les vals du forme
$str=$_POST['string'];
$decal=$_POST['decalage'];//pas plus de 26
$alpha=["a","b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
     "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];//alphabet défini mais peut etre remplacer par un autre dico(ex: asci)
for($i=0;$i<strlen($str);$i++){
    $alphatemp=array_search($str[$i],$alpha);//recupération de la position de la lettre dans le dico alpha
    $str[$i]=$alpha[(int)$alphatemp+$decal];//decalage
}
echo '<h2>'.$str.'</h2>';
}
else{
    echo 'error';
}