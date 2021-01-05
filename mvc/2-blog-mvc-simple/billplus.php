<?php

require 'Modele.php';


        billplus($_POST['titre'],$_POST['contenu']);
        header('location:./index.php');
 