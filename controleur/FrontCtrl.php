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
                    $ctrl->erreur401($dVueErreur);
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
}