<?php
namespace controleur;
use config\Validation;

class CtrlAdmin  {

    /**
     * Controleur constructor.
     */
    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();
        //debut
        //on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

            switch($action) {

                //pas d'action, on r�initialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;

                case "gererNews":
                    $this->gererNews($dVueEreur);
                    break;
                case "deconnection":
                    $this->deconnection($dVueEreur);
                    break;
                //mauvaise action
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;
            }

        }
        catch (PDOException $e){
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2){
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        //fin
        exit(0);
    }//fin constructeur


    function Reinit() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $dVue = array (
        );
        require ($rep.$vues['mainPage']);
    }

    function deconnection(array $dVueEreur) {

    }
    function gererNews(array $dVueEreur){

    }
    function supprimerNews(array $dVueEreur){

    }
    function ajouterNews(array $dVueEreur){

    }
}//fin class
?>
