<?php

    namespace modeles;
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 02/12/17
 * Time: 11:30
 */
class Admin
{
    private $mdp;
    private $admin;

    public function __construct(String $admin,String $mdp)
    {
        $this->admin=$admin;
        $this->mdp = $mdp;
    }

    function get_data()
    {
        return "Mon modèle ne fait rien";
    }

}