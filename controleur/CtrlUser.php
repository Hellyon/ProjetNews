<?php
namespace controleur;
use config\Validation;
use DAL\AdminGateway;
use DAL\NewsGateway;
use parser\XmlParser;

class CtrlUser {

    /**
     * Controleur constructor.
     */
    function __construct() {
    }//fin constructeur


    function Reinit($con) {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $gtw = new NewsGateway($con);
        $results = $gtw->selectAll();
        $parser = new XmlParser($results);
        $parser->parseAllRss();
        $parserResults = $parser->getResult();
        require($rep.$vues['mainPage']);
    }

    function connexionAdmin(){
        global $rep,$vues;
        $dVue = array (
            'admin' => "",
            'mdp' => "",
        );

        require ($rep.$vues['connexionAdmin']);
    }

 /*   static function connexion($login, $mdp){

        $admin = new \modeles\Admin($login, hash("ripemd160", $mdp));
        if ($admin == NULL) {
            return NULL;
        }
        $session['username'] = $admin->getUserName();
    }*/

    static function validationConnexion($con) {
        global $rep,$vues;
        //si exception, ca remonte !!!
        $admin=$_POST['txtAdmin']; // txtAdmin = nom du champ texte dans le formulaire
        $mdp=$_POST['txtmdp'];

        Validation::val_form($admin,$mdp);

        try{
            $adminGateway =new AdminGateway($con);
            $message = $adminGateway->connexionAdmin($admin, $mdp);
            echo $message;
        }
        catch (\PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
            }
        catch (Exception $e2) {
            $dVueEreur[] =	"Erreurdinattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }

    function consulterNews(array $dVueEreur){

    }
    function erreur404(array $dVueErreur){
        global $rep, $vues;
        $dVueErreur[] =	"EREEUR 404 - INTROUVABLE</br>La page demandée n'existe pas !!";
        require ($rep.$vues['erreur']);
    }
    function erreur041(array  $dVueErreur){
        global $rep, $vues;
        $dVueErreur[] =	"EREEUR 401 - UNAUTHORIZED</br> Accès non identifiée interdite !!";
        require ($rep.$vues['erreur']);
    }

}
