<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 13/12/17
 * Time: 19:39
 */

namespace DAL;


class AdminGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }
}