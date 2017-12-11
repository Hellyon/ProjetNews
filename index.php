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

if(isset($_GET['route'])){
    if(isset($routes[$_GET['route']])){
        $ctrl=new $_GET['ctrl']($routes[$_GET['route']]['ctrl']);
        if(!isset ($_GET['action'])){
            //$ctrl->erreur404();
        }
        $ctrl->$action();
    }
}
else{
    $ctrl = new \controleur\CtrlUser();
}
?>