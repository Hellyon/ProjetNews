<?php
/**
 * Created by PhpStorm.
 * User: Ilyac
 * Date: 20/12/2017
 * Time: 00:20
 */

namespace DAL;
use PDO;

class NbNewsGateway
{
    private $con;

    public function __construct(\config\Connexion $con)
    {
        $this->con = $con;
    }

    public function updateNbNews($nbNews)
    {
        $query = ('UPDATE NbNews SET nbNews = :nbNews WHERE id = 1;');
        $this->con->executeQuery($query, array(":nbNews" => array ($nbNews, PDO::PARAM_INT)));
        return '<div>Le nombre de news à afficher a bien été mis à jour !<p><a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">Cliquez ici pour revenir à la page précédente.</a> 
            <br /><br /><a href="index.php">Cliquez ici pour revenir à la page d accueil.</a></p></div>';

    }

    public function selectNbNews()
    {
        $query = ('SELECT nbNews FROM NbNews WHERE id = 1;');
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();

        return $this->getInstance($results);
    }

    private function getInstance(array $results){
        foreach($results as $nbNews){
            return new \modeles\NbNews($nbNews['nbNews']);
        }
        return NULL;
    }
}