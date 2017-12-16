<?php
require("vues/header.html");
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

$ctrl = new \controleur\FrontCtrl($routes);
?>