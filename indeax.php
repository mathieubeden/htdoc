<?php
try
{
$base = new PDO('mysql:host=127.0.0.1;dbname=basalt', 'root', '');
$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//appelle de la procédure stockée et de la requête récupérant le paramètre de sortie.
$statement = $base->prepare('CALL cube(:entree, @sortie); SELECT @sortie AS sortie;');
$entree = 45889;
$statement->bindParam(':entree', $entree);
//exécution de la procédure stockée
$statement->execute();
$statement->nextRowset();
//lecture du paramètre de sortie
$row = $statement->fetchObject();
echo "La valeur ".$entree." au cube est:".$row->sortie;

}
catch(Exception $e)
{

// message en cas d'erreur
die('Erreur : '.$e->getMessage());

} ?>