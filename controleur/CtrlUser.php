<?php
namespace controleur;
use config\Validation;
use DAL\AdminGateway;
use DAL\NbNewsGateway;
use DAL\NewsGateway;
use parser\XmlParser;

class CtrlUser {

    /**
     * Controleur constructor.
     */
    function __construct() {
    }//fin constructeur


    function Reinit($con) {
        $site = NULL;
        $gtwNb = new NbNewsGateway($con);
        $nbNews = $gtwNb->selectNbNews();
        if(isset($_GET['site'])){
            $site = filter_var($_GET['site'],FILTER_SANITIZE_STRING);
            if($site != $_GET['site']){
                $site = NULL;
            }
        }
        if($site != NULL){
            $_SESSION['site'] = $site;
        }
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $gtw = new NewsGateway($con);
        $results = $gtw->selectAll();
        if(isset($_SESSION['site'])) {
            $result = $gtw->selectFeed($_SESSION['site']);
            $parser = new XmlParser();
            if ($result == NULL)
                $site = NULL;
            else {
                $parserResults = $parser->parse($result[0]['url']);
            }
        }
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
            //si erreur BD
            $dVueErreur[] =	"Erreur BD inattendue!!! ";
            require ($rep.$vues['erreur']);
            }
        catch (Exception $e2) {

            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }
        function erreur404(array $dVueErreur){
        global $rep, $vues;
        $dVueErreur[] =	"EREEUR 404 - INTROUVABLE</br>La page demandée n'existe pas !!";
        require ($rep.$vues['erreur']);
    }
    function erreur403(array $dVueErreur){        global $rep, $vues;
        $dVueErreur[] =	"EREEUR 403 - INTERDIT</br>Accès interdit !!";
        require ($rep.$vues['erreur']);
    }
    function erreur401(array  $dVueErreur){
        global $rep, $vues;
        $dVueErreur[] =	"EREEUR 401 - NON AUTORISE</br> Accès non autorisée !!";
        require ($rep.$vues['erreur']);
    }
}
