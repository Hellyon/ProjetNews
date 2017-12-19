<?php

namespace modeles;
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 25/11/17
 * Time: 10:26
 */
class News
{
    private $url;
    private $site;

    public function __construct($url, $site)
    {
        $this->url = $url;
        $this->site = $site;
    }

    public function getSite(){
        return $this->site;
    }
}