<?php 

namespace Notre_projet;

include('spacename.php'); // Affichage de l’espace de noms courant.

echo 'Espace de noms courant = ', __NAMESPACE__,'<br />';

maFonction(); //Appel du namespace Biliotheque à la racine

use \Biliotheque as bilibo; // alias d’un namespace

echo bilibo\PI."<br />";

use \Biliotheque\Animal as anio;
use function Biliotheque\maFonction;

// alias d’une classe

$chien = new anio(); //Appel de l'alias de la classe Animal$chien->setCouleur("noir");

$chien->setCouleur('blouge');

echo "La couleur du chien est : ".$chien->getCouleur();

?>