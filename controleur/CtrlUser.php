<?php
namespace controleur;
use config\Validation;

class CtrlUser {

    /**
     * Controleur constructor.
     */
    function __construct() {
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();
        //debut
        //on initialise un tableau d'erreur
    }//fin constructeur


    function Reinit() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        global $dsn, $user, $pass; // Variables globales pour la BDD
        $con=new \config\Connection($dsn,$user,$pass);
        $newsGateway = new \DAL\NewsGateway($con);
        $num = 1;
        $start = ($num - 1) * 10;
        $limit = 10;
        $results = $newsGateway->findByCountry('FR', $start, $limit);
        require ($rep.$vues['mainPage']);
    }

    function connectionAdmin(){
        global $rep,$vues;

        $dVue = array (
            'admin' => "",
            'mdp' => "",
        );

        require ($rep.$vues['connectionAdmin']);
    }

    function connection($login, $mdp){
        $login = Sanitize::stringsanitize($login);
        $mdp = Sanitize::stringsanitize($mdp);

        $admin = new Admin($login, hash("sba512", $mdp));
        if ($admin == NULL) {
            return NULL;
        }
        session_start();
        $session['username'] = $admin->getUserName();
    }

    static function validationFormulaire() {
        global $rep,$vues;
        //si exception, ca remonte !!!
        $admin=$_POST['txtAdmin']; // txtAdmin = nom du champ texte dans le formulaire
        $mdp=$_POST['txtmdp'];

        Validation::val_form($admin,$mdp);

        connection($admin, $mdp);

        echo "connexion réussie";
        require ($rep.$vues['connectionAdmin']);
    }

    function consulterNews(array $dVueEreur){

    }
    function erreur404(array $dVueErreur){

    }

}//fin class
?>
