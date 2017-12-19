<?php

namespace config;

class Validation
{

    static function val_action($action)
    {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string &$admin, string &$mdp)
    {
        if (!isset($admin) || $admin == "") {
            $dVueErreur[] = "pas de nom administrateur";
            $admin = "";
        }

        if ($admin != filter_var($admin, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $admin = "";

        }

        if (!isset($mdp) || $mdp == "" || !filter_var($mdp, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "pas de mdp";
            $mdp = "";
        }
    }

    static function val_ajout(string &$url, string &$site){
        $dVueErreur = array();
        if (!isset($url) || $url == "") {
            $dVueErreur[] = "pas d'url pour le fichier XML";
            $url = "";
        }

        if ($url != filter_var($url, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $url = "";
        } else {
            if (!Validation::fichierDistantExiste($url)) {
                if(false == file_get_contents($url,0,null,0,1)){
                    $dVueErreur[] = "URL du flux RSS innexistant (ou introuvable, vérifiez votre connexion internet)";
                }
            }
            return $dVueErreur;
        }

        if (!isset($site) || $site == "" || !filter_var($site, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "pas de nom de site";
            $site = "";
        }
    }
    static function fichierDistantExiste($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(curl_exec($ch)!==FALSE){
            return true;
        }
        else{
            return false;
        }
    }
}
?>