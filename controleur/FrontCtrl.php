<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 13/12/17
 * Time: 18:52
 */

namespace controleur;

class FrontCtrl {

    function __construct()
    {
        $dVueEreur = array ();
        if(isset($_GET['route'])){
            print("bite");
            if(isset($routes[$_GET['route']])){
                print("bite");
                $ctrl=new $_GET['ctrl']($routes[$_GET['route']]['ctrl']);
                if(!isset ($_GET['action'])){
                    $ctrl->erreur404();
                }
                print("toast");
                $ctrl->$_GET['route']($dVueEreur);
            }
        }
        else {
            $ctrl = new CtrlUser();
        }
    }
}