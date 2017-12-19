<?php

if(!isset($_SESSION['pseudo_admin'])){
    session_start();
}
else{
    if($_SESSION['pseudo_admin'] != filter_var($_SESSION['pseudo_admin'], FILTER_SANITIZE_STRING)){
        print("Session expirée : Déconnexion");
        header('Location: index.php?route=deconnexion');
        exit();
    }
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
$myLibLoader = new SplClassLoader('parser', './');
$myLibLoader->register();

//Header du site
require("vues/header.php");
try{
    $con = new \config\Connexion($dsn, $user, $pass);
    $ctrl = new \controleur\FrontCtrl($routes, $con);
}
catch(PDOException $e){
    global $rep, $vues;
    $dVueErreur[] =	"Erreur connection à la base de données !!";
    require ($rep.$vues['erreur']);
}


if(!isset($_SESSION['pseudo_admin'])){
    echo('<div><a href="index.php?route=connexionAdmin">Connexion Administrateur</a></div>');
}
else{
    echo('<div><a href="index.php?route=deconnexion">Se deconnecter</a></div>');
    echo('<div><a href="index.php?route=supprimerRSS">Ajouter flux RSS</a></div>');
    echo('<div><a href="index.php?route=ajouterRSS">Supprimer flux RSS</a></div>');
}
?>