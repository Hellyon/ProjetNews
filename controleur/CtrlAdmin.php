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
        echo '<div align="center"<p>Vous êtes à présent déconnecté <br />
        Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
        pour revenir à la page précédente.<br />
        Cliquez <a href="./index.php">ici</a> pour revenir à la page principale</p></div>';
    }
    function gererNews(array $dVueEreur){

    }
    function supprimerNews(array $dVueEreur){

    }
    function ajouterNews(array $dVueEreur){

    }
}//fin class
?>
