<?php
namespace controleur;
use config\Validation;

class CtrlAdmin  {

    /**
     * Controleur constructor.
     */
    function __construct() {
    }//fin constructeur


    function Reinit() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $dVue = array (
        );
        require ($rep.$vues['mainPage']);
    }

    function deconnexion() {
        session_destroy();
        session_start();
        echo '<div align="center">Vous êtes à présent déconnecté
        <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">Cliquez ici pour revenir à la page précédente.</a> 
        <a href="./index.php">Cliquez ici pour revenir à la page principale.</a></div>';
    }
    function gererNews(array $dVueEreur){

    }
    function supprimerNews(array $dVueEreur){

    }
    function ajouterNews(array $dVueEreur){

    }
}//fin class
?>
