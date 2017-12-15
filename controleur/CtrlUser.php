<?php
namespace controleur;
use config\Validation;

class CtrlUser {

    /**
     * Controleur constructor.
     */
    function __construct($route) {
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

                case "connectionAdmin":
                    $this->connectionAdmin($dVueEreur);
                    break;

                case "validationFormulaire":
                    $this->validationFormulaire();
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
        global $dsn, $user, $pass; // Variables globales pour la BDD
        $con=new \config\Connection($dsn,$user,$pass);
        $newsGateway = new \modeles\NewsGateway($con);
        $num = 1;
        $start = ($num - 1) * 10;
        $limit = 10;
        $results = $newsGateway->findByCountry('FR', $start, $limit);
        require ($rep.$vues['mainPage']);
    }
    function connectionAdmin(array $dVueEreur){
        global $rep,$vues;

        $dVue = array (
            'admin' => "",
            'mdp' => "",
        );
        require ($rep.$vues['connectionAdmin']);
    }

    function validationFormulaire(array $dVueEreur) {
        global $rep,$vues;
        //si exception, ca remonte !!!
        $admin=$_POST['txtAdmin']; // txtAdmin = nom du champ texte dans le formulaire
        $mdp=$_POST['txtmdp'];
        Validation::val_form($admin,$mdp,$dVueEreur);

            $model = new Admin($admin, $mdp);
            $data=$model->get_data();

        $dVue = array (
            'admin' => $admin,
            'mdp' => $mdp,
            'data' => $data,
            );
        require ($rep.$vues['connectionAdmin']);
        echo $data;
    }
    function consulterNews(array $dVueEreur){

    }
    function erreur404(array $dVueErreur){

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
}//fin class
?>
