<?php

include('classy.php');
include('poiscaille.php');
include('chat.php');

echo '<br><br>';

$banane=new poiscaille('gris',10);
$banane->setType(true);
$banane2=new poiscaille('gris',9);
$banane2->setType(false);

$banane->manger($banane2);
//lire le type par l'accesseur de sa propre classe
echo "Le type du poisson mangé est:".$banane2->getType()."<br />";
//lire le poids par l'accesseur de la classe mère
echo "Le poids du poisson mangé est:".$banane2->get_poids()." kg<br />" ;

echo'cette banane pèse '.$banane->get_poids().'kg, a une jolis couleur '.$banane->get_couleur().' et est '.$banane->getType().'.<br>';

$mangue=new chat('rouge', 7);
$mangue->setRace('corona');

echo'cette mangue pèse '.$mangue->get_poids().'kg, a une jolis couleur '.$mangue->get_couleur().' et est de race '.$mangue->getRace().'.<br>';

$banane->nager();
$mangue->miauler();

echo'il y a '.classy::get_compt().' formes de vie<br>';
$mangue->respire('corona');
$banane->respire('corona');



?>