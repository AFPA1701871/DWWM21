<?php
class Livre extends Document
{

    /*****************Attributs***************** */
    private $_nbPages;

    /*****************Accesseurs***************** */

    public function getNbPages()
    {
        return $this->_nbPages;
    }
    public function setNbPages($_nbPages)
    {
        $this->_nbPages = $_nbPages;
    }
    /*****************Constructeur***************** */

    public function __construct(array $options = [])
    {
        if (!empty($options)) // empty : renvoi vrai si le tableau est vide
        {
            $this->hydrate($options);
        }
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
            if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
            {
                $this->$methode($value);
            }
        }
    }

    /*****************Autres Méthodes***************** */
    public function toString()
    {
        return parent::toString()."\nNombre de Pages : ".$this->getNbPages();
    }

    
}