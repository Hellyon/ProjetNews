<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 13/12/17
 * Time: 18:52
 */

namespace controleur;

class FrontCtrl {

    function __construct($routes, $con)
    {
        try{
            $dVueErreur = array ();
            if(isset($_GET['route'])){
                if(isset($routes[$_GET['route']])){
                    if((isset($routes[$_GET['route']]['admin']) && isset($_SESSION['pseudo_admin']) || !isset($routes[$_GET['route']]['admin']))){
                        $ctrl=new $routes[$_GET['route']]['ctrl']();
                        if(isset ($routes[$_GET['route']]['param'])){
                            $ctrl->{$routes[$_GET['route']]['action']}($con);
                        }
                        else{
                            $ctrl->{$routes[$_GET['route']]['action']}();
                        }
                    }
                    else{
                        $ctrl = new CtrlUser();
                        $ctrl->{$routes[$_GET['route']]['erreur']}($dVueErreur);
                    }
                }
                else{
                    $ctrl = new CtrlUser();
                    $ctrl->erreur404($dVueErreur);
                }
            }
            else {
                $action=NULL;
                $ctrl = new CtrlUser();
                $ctrl->Reinit($con);
            }
        }
       catch(\PDOException $e){
           global $rep, $vues;
           $dVueErreur[] =	"Erreur connection à la base de données !!";
           require ($rep.$vues['erreur']);
       }
       catch(\Exception $e){
           global $rep, $vues;
           $dVueErreur[] =	"Erreur innatendue !!";
           require ($rep.$vues['erreur']);
       }
    }
}