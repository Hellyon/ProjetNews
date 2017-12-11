<?php
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
$cont = new \controleur\CtrlUser();

if(isset($_GET['route'])){
    if(isset($routes[$_GET['route']])){
        
    }
}


?>