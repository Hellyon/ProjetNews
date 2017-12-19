<?php
/**
 * Created by PhpStorm.
 * User: Ilyac
 * Date: 20/12/2017
 * Time: 00:18
 */

namespace modeles;


class NbNews
{
    private $nbNews;

    public function __construct(int $nbNews)
    {
        $this->nbNews = $nbNews;
    }

    public function getNbNews(){
        return $this->nbNews;
    }
}