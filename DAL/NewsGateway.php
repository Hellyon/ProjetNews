<?php
namespace DAL;
use config\Connexion;
use PDO;
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 25/11/17
 * Time: 10:19
 */
    class NewsGateway{

        private $con;

        public function __construct(Connexion $con){
            $this->con = $con;
        }
        public function insert($url, $site){
            $query ="INSERT INTO News values(:url, :site);";
            $this->con->executeQuery($query, array(":url" => array ($url, PDO::PARAM_STR),
                ":site" => array ($site, PDO::PARAM_STR)));
            return ('<div align="center">Le flux RSS de '.$site.' a bien été ajouté avec l\'adresse suivante : </br>'.$url.'<p><a href='.htmlspecialchars($_SERVER['HTTP_REFERER']).'>Cliquez ici pour revenir à la page précédente.</a> 
            <br /><br /><a href="index.php">Cliquez ici pour revenir à la page d accueil.</a></p></div>');
        }

        public function delete($site){
            $query ="DELETE FROM News WHERE site = :site;";
            $this->con->executeQuery($query, array(":site" => array ($site, PDO::PARAM_STR)));
            if(isset($_SESSION['site'])){
                if(filter_var($_SESSION['site'],FILTER_SANITIZE_STRING) == $site){
                    unset($_SESSION['site']);
                }
            }
            return ('<div align="center">Le flux RSS de '.$site.' a bien été supprimé<p><a href='.htmlspecialchars($_SERVER['HTTP_REFERER']).'>Cliquez ici pour revenir à la page précédente.</a> 
            <br /><br /><a href="index.php">Cliquez ici pour revenir à la page d accueil.</a></p></div>');
        }

        public function findByCountry($pays, $start, $limit){

            $query = "SELECT * FROM News WHERE pays = :pays LIMIT :start, :limit;";
            $this->con->executeQuery($query, array(":pays" => array($pays, PDO::PARAM_STR), ":start" => array($start, PDO::PARAM_INT), ":limit" => array($limit, PDO::PARAM_INT)));
            $results = $this->con->getResults();
            return $this->getInstance($results);
        }

        private function getInstance(array $results){
            $retour = array();
            foreach($results as $news){
                $retour[]= new \modeles\News($news['url'], $news['site']);
            }
            return $retour;
        }

        public function findAll(){
            $query = "SELECT * FROM News;";
            $this->con->executeQuery($query);
            $results = $this->con->getResults();

            return $this->getInstance($results);
        }

        public function selectAll(){
            $query = "SELECT * FROM News;";
            $this->con->executeQuery($query);
            $results = $this->con->getResults();
            return $results;
        }

        public function selectFeed($site){
            $query = "SELECT * FROM News WHERE site = :site;";
            $this->con->executeQuery($query, array(":site" => array($site, PDO::PARAM_STR)));
            $results = $this->con->getResults();
            return $results;
        }
    }