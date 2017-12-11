<?php
namespace modeles;
use config\Connection;
use PDO;
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 25/11/17
 * Time: 10:19
 */
    class NewsGateway{

        private $con;

        public function __construct(Connection $con){
            $this->con = $con;
        }
        public function insert($url, $titre, $date, $pays, $miniature, $site){
            $query ="INSERT INTO News values(:url, :titre, :dat, :pays, :miniature, :site);";
            $this->con->executeQuery($query, array(":url" => array ($url, PDO::PARAM_STR),
                ":titre" => array($titre, PDO::PARAM_STR), ":dat" => array (DateTime::createFromFormat("d-m-Y H:i:s", $date)->format("Y-m-d H:i:s"), PDO::PARAM_STR),
                ":pays" => array ($pays, PDO::PARAM_STR), ":miniature" => array ($miniature, PDO::PARAM_STR),
                ":site" => array ($site, PDO::PARAM_STR)));
            $results=$this->con->getResults();
            return $results;
        }
        public function findByCountry($pays, $start, $limit){
            $query = "SELECT * FROM News WHERE pays = :pays LIMIT :start, :limit;";
            $this->con->executeQuery($query, array(":pays" => array($pays, PDO::PARAM_STR), ":start" => array($start, PDO::PARAM_INT), ":limit" => array($limit, PDO::PARAM_INT)));
            $results = $this->con->getResults();
            return $this->getInstance($results);
        }
        private function getInstance(array $results){
            $retour =[];
            foreach($results as $news){
                $retour[]=new News($news['url'], $news['titre'], $news['date'], $news['pays'], $news['miniature'], $news["site"]);
            }
            return $retour;
        }
    }