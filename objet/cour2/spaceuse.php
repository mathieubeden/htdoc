<?php 
namespace Projet;
include('spacename.php'); // Affichage de l’espace de noms courant.
echo 'Espace de noms courant = ', __NAMESPACE__,'<br />';
\Biliotheque\maFonction(); //Appel du namespace Biliotheque à la racine
use \Biliotheque as biblio; // alias d’un namespace
echo biblio\PI."<br />";
use \Biliotheque\Animal as anio; // alias d’une classe
$chien = new anio(); //Appel de l'alias de la classe Animal$chien->setCouleur("noir");
echo "La couleur du chien est:".$chien->getCouleur();

?>