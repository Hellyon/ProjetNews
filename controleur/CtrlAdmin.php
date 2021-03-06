<?php
namespace controleur;
use config\Validation;
use DAL\NbNewsGateway;
use DAL\NewsGateway;

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

    function ajouterRSS(){
        global $rep,$vues;
        $dVue = array (
            'url' => "",
            'site' => "",
        );

        require ($rep.$vues['ajouterRSS']);
    }

    static function validationAjouterRSS($con) {
        global $rep,$vues;
        //si exception, ca remonte !!!
        $url=$_POST['txturl']; // txturl = nom du champ texte dans le formulaire
        $site=$_POST['txtsite'];

        $dVueErreur = Validation::val_ajout($url, $site);
        if(isset($dVueErreur) && count($dVueErreur) >= 1){
            require ($rep.$vues['erreur']);
            return;
        }

        try{
            $newsGateway =new NewsGateway($con);
            $message = $newsGateway->insert($url, $site);
            echo $message;
        }
        catch (\PDOException $e) {
            //si erreur BD
            $dVueErreur[] =	"$e";
            require ($rep.$vues['erreur']);
        }
        catch (Exception $e2) {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }

    function supprimerRSS($con){
        global $rep,$vues;
        $dVue = array (
            'url' => "",
            'site' => "",
        );
        $newsGateway = new NewsGateway($con);
        $tRSS = $newsGateway->findAll();

        require ($rep.$vues['supprimerRSS']);
    }
    function validationSupprimerRSS($con){
         global $rep,$vues;
        //si exception, ca remonte !!!
        $site=$_POST['txtsite']; // nom du site à supprimer de la liste de flux
        $dVueErreur = Validation::val_supp($site);
        if(isset($dVueErreur) && count($dVueErreur) >= 1){
            require ($rep.$vues['erreur']);
            return;
        }

        try{
            $newsGateway =new NewsGateway($con);
            $message = $newsGateway->delete($site);
            echo $message;
        }
        catch (\PDOException $e) {
            //si erreur BD
            $dVueErreur[] =	"$e";
            require ($rep.$vues['erreur']);
        }
        catch (Exception $e2) {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }
    function updateNbNews($con){
        global $rep,$vues;
        $dVue = array (
            'nbNews' => "",
        );
        $nbNewsGateway = new \DAL\NbNewsGateway($con);


        require ($rep.$vues['updateNbNews']);
    }
    function validationUpdateNbNews($con){
        global $rep,$vues;
        //si exception, ca remonte !!!
        $nbNews=$_POST['txtNbNews']; // nom du site à supprimer de la liste de flux

        $dVueErreur = Validation::val_supp($nbNews);
        if(isset($dVueErreur) && count($dVueErreur) >= 1){
            require ($rep.$vues['erreur']);
            return;
        }

        try{
            $nbnewsGateway =new NbNewsGateway($con);
            $message = $nbnewsGateway->updateNbNews($nbNews);
            echo $message;
        }
        catch (\PDOException $e) {
            //si erreur BD
            $dVueErreur[] =	"$e";
            require ($rep.$vues['erreur']);
        }
        catch (Exception $e2) {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }
}//fin class
?>
