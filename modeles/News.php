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
    private $titre;
    private $date;
    private $pays;
    private $miniature;
    private $site;

    public function __construct($url, $titre, $date, $pays, $miniature, $site)
    {
        $this->url = $url;
        $this->titre = $titre;
        $this->date = $date;
        $this->pays = $pays;
        $this->miniature = $miniature;
        $this->site = $site;
    }

    public function __toString()
    {
        return "<td> le $this->date </td>
                <td><img src='/images/$this->miniature'>$this->site</td>
                <td><a href='$this->url'>$this->titre</a></td>";
    }
}