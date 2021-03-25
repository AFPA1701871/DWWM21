<?php
class Audio extends Document
{

    /*****************Attributs***************** */
    private $_duree;

    /*****************Accesseurs***************** */

    public function getDuree()
    {
        return $this->_duree;
    }

    public function setDuree($_duree)
    {
        $this->_duree = $_duree;

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
        return parent::toString()."\ndurée : ".$this->getDuree();
    }
}