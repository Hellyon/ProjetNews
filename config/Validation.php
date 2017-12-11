<?php

namespace config;

class Validation {

    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
            //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
            // This is equivalent to:
            //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
        }
    }

    static function val_form(string &$admin, string &$mdp, &$dVueEreur) {

        if (!isset($admin)||$admin=="") {
            $dVueEreur[] =	"pas de nom administrateur";
            $admin="";
        }

        if ($admin != filter_var($admin, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $admin="";

        }

        if (!isset($mdp)||$mdp==""||!filter_var($mdp, FILTER_VALIDATE_STR)) {
            $dVueEreur[] =	"pas de mdp";
            $mdp="";
        }

    }

}
?>