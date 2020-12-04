<?php

include('vehicule.php');
include('deux_roue.php');
include('quatre_roue.php');
include('voiture.php');
include('camion.php');


echo'<br>';

$voiture2= new voiture('vert',1400);
$voiture2->ajouter_personne(65);
$voiture2->ajouter_personne(65);
echo 'une voiture de couleur '.$voiture2->get_color().'et pesant '.$voiture2->get_poids().'kg<br>';
$voiture2->ajouter_pneu_neige(2);
$voiture2->repeindre('bleu');
echo 'une voiture de couleur '.$voiture2->get_color().' et ayans '.$voiture2->get_pneu_neige().' pneus neige<br>';

echo'<br>';

$moto=new deux_roues('noir',120);
$moto->ajouter_personne(80);
$moto->mettre_essence(20);
echo 'une voiture de couleur '.$moto->get_color().'et pesant '.$moto->get_poids().'kg<br>';

echo'<br>';

$camion=new camion('bleu',10000,2,10);
$camion->ajouter_personne(80);
$camion->ajouter_remorque(5);
echo 'un camion de couleur '.$camion->get_color().'et pesant '.$camion->get_poids().', d\'une longueur de '.$camion->get_longueur().', avec '.$camion->get_porte().' portes<br>';



?>