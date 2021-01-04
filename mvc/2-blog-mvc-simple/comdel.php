<?php

require 'Modele.php';

try {
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
        delcom($_GET['id']);
        header('location:./billet.php?id='.$_GET['id2']);
        }
        else
            throw new Exception("Identifiant de billet incorrect");
    }
    else
        throw new Exception("Aucun identifiant de billet");
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}