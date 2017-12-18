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
        public function insert($url){
            $query ="INSERT INTO News values(:url);";
            $this->con->executeQuery($query, array(":url" => array ($url, PDO::PARAM_STR)));
            $results=$this->con->getResults();
            return $results;
        }

        public function findByCountry($pays, $start, $limit){
            $query = "SELECT * FROM News WHERE pays = :pays LIMIT :start, :limit;";
            $this->con->executeQuery($query, array(":pays" => array($pays, PDO::PARAM_STR), ":start" => array($start, PDO::PARAM_INT), ":limit" => array($limit, PDO::PARAM_INT)));
            $results = $this->con->getResults();
            return $results;
        }

        public function selectAll(){
            $query = "SELECT * FROM News;";
            $this->con->executeQuery($query);
            $results = $this->con->getResults();
            return $results;
        }
    }