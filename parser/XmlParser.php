<?php
 
/**
 * Classe parsant un fichier xml et affichant les informations sous la forme
 * d'une hierarchie de texte
 */
namespace parser;
use SimpleXMLElement;

class XmlParser
{
    private $result = array();
    private $depth;

    public function __construct()
    {
        $this->depth = 0;
        $this->result = array();
    }

    public function getResult()
    {
        return $this->result;
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