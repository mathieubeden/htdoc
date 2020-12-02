<?php

include('vehicule.php');
include('deux_roue.php');
include('quatre_roue.php');
include('voiture.php');
include('camion.php');

$voiture= new vehicule('noir',1500);
$voiture->rouler();
$voiture->ajouter_personne(70);
echo $voiture->get_poids().'kg<br>';

echo'<br>';

$voiture2= new voiture('vert',1400);
$voiture2->ajouter_personne(65);
$voiture2->ajouter_personne(65);
echo 'une voiture de couleur '.$voiture2->get_color().'et pesant '.$voiture2->get_poids().'kg<br>';
$voiture2->ajouter_pneu_neige(2);
$voiture2->repeindre('bleu');
echo 'une voiture de couleur '.$voiture2->get_color().' et ayans '.$voiture2->get_pneu_neige().' pneus neige<br>';



?>