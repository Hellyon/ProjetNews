<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

$dConfig['includes']= array('controleur/Validation.php');

//BD

$user= 'ilbenjello';
$pass='ilbenjello';
$dsn='mysql:host=hina;dbname=dbilbenjello';

//Vues

$vues['erreur']='vues/erreur.php';
$vues['connectionAdmin']='vues/connectionAdmin.php';
$vues['mainPage']='vues/mainPage.php';

?>