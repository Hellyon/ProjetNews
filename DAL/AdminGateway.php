<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 13/12/17
 * Time: 19:39
 */

namespace DAL;
use PDO;

class AdminGateway
{
    private $con;

    public function __construct(\config\Connexion $con)
    {
        $this->con = $con;
    }

    public function connexionAdmin($admin, $mdp)
    {
        $query = ('SELECT * FROM Admin WHERE pseudo_admin = :admin');
        $this->con->executeQuery($query, array(":admin" => array($admin, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        $admin = $this->getInstance($results);
        if ($admin != NULL && $admin->getMdp() == $mdp) { //Accès OK
            $_SESSION['pseudo_admin'] = $admin->getUserName();
            $_SESSION['droits'] = 2;
            return "<div align =center><p>Bienvenue " . $_SESSION['pseudo_admin']. ',
                vous êtes maintenant connecté!</p>
                <p><a href="index.php">Cliquez ici pour revenir à la page d accueil.</a></p></div>';
        }
        else // Accès pas OK !
        {
            return '<div align="center"><p>Une erreur s\'est produite 
            pendant votre identification.<br /> Le mot de passe ou le pseudo 
                entré n\'est pas correcte.</p><p><a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">Cliquez ici pour revenir à la page précédente.</a> 
            <br /><br /><a href="index.php">Cliquez ici pour revenir à la page d accueil.</a></p></div>';
        }
    }

    private function getInstance(array $results){
        foreach($results as $admin){
            return new \modeles\Admin($admin['login'], $admin['mdp']);
        }
        return NULL;
    }
}