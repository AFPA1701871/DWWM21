<?php
class Auteur
{

    /*****************Attributs***************** */
    private $_nom;
    private $_prenom;
    private $_ddn;
    private $_ddd=null;

    /*****************Accesseurs***************** */

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($_nom)
    {
        $this->_nom = $_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($_prenom)
    {
        $this->_prenom = $_prenom;
    }

    public function getDdn()
    {
        return $this->_ddn;
    }

    public function setDdn($_ddn)
    {
        $this->_ddn = $_ddn;
    }

    public function getDdd()
    {
        return $this->_ddd;
    }

    public function setDdd($_ddd)
    {
        $this->_ddd = $_ddd;
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
        $rep = "Nom : ".$this->getNom()." ".$this->getPrenom()."\n\t\tDate de naissance : ".$this->getDdn()->format("d-m-y");
        $rep .= $this->getDdd()!=null?"\n\t\tDate de décès : ".$this->getDdd()->format("d-m-y")."\n":"\n";
        return $rep;
    }
    public function equalsTo(Auteur $a)
    {
        return (($a->getNom()==$this->getNom()) && ($a->getPrenom()==$this->getPrenom()) && ($a->getDdn()==$this->getDdn()) && ($a->getDdd()==$this->getDdd()));
    }
    
}