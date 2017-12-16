<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 13/12/17
 * Time: 18:52
 */

namespace controleur;

class FrontCtrl {

    function __construct($routes)
    {
        $dVueEreur = array ();
        if(isset($_GET['route'])){
            if(isset($routes[$_GET['route']])){
                $ctrl=new $routes[$_GET['route']]['ctrl']();
                if(!isset ($routes[$_GET['route']]['action'])){
                    $ctrl->Reinit();
                }
                $ctrl->{$routes[$_GET['route']]['action']}();
            }
        }
        else {
            $action=NULL;
            $ctrl = new CtrlUser();
            $ctrl->Reinit();
        }
    }
}