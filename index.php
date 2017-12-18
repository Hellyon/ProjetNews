<?php
if(!isset($_SESSION['pseudo_admin'])){
    session_start();
}
//chargement config
require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/config/routes.php');

//autoloader conforme norme PSR-0
require_once(__DIR__.'/config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('controleur', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('modeles', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('DAL', './');
$myLibLoader->register();

//Header du site
require("vues/header.php");
$con = new \config\Connexion($dsn, $user, $pass);
$ctrl = new \controleur\FrontCtrl($routes, $con);

if(!isset($_SESSION['pseudo_admin'])){
    echo('<div><a href="index.php?route=connexionAdmin">Connexion Administrateur</a></div>');
}
else{
    echo('<div><a href="index.php?route=deconnexion">Se deconnecter</a></div>');
}
?>