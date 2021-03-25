<?php
class Video extends Document
{

    /*****************Attributs***************** */
    private $_avecSousTitres;

    /*****************Accesseurs***************** */

    public function getAvecSousTitres()
    {
        return $this->_avecSousTitres;
    }

    public function setAvecSousTitres($_avecSousTitres)
    {
        $this->_avecSousTitres = $_avecSousTitres;

        return $this;
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
        return $this->getAvecSousTitres()?parent::toString()."\navec sous titre":parent::toString()." sans sous titre";
    }

    

    
}