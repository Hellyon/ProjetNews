<?php
 
/**
 * Classe parsant un fichier xml et affichant les informations sous la forme
 * d'une hierarchie de texte
 */
namespace parser;
use SimpleXMLElement;

class XmlParser
{
    private $pathTab;
    private $result = array();
    private $depth;

    public function __construct($pathTab)
    {
        $this->pathTab = $pathTab;
        $this->depth = 0;
        $this->result = array();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function parseAllRss()
    {
        foreach ($this->pathTab as $path) {
            $this->result[] = $this->parse($path['url']);
        }
    }

    /**
     * Parse le fichier et met le resultat dans Result
     */
    public function parse($path)
    {
        if(!file_get_contents($path)){
            global $rep, $vues;
            $dVueErreur[] =	"Erreur lecture du flux RSS !!";
            require ($rep.$vues['erreur']);
        }
        else{
            $content = file_get_contents($path);
            $result = new SimpleXMLElement($content);
            return $result;
        }
    }
}