<?php
class Clients
{

    /*****************Attributs***************** */
    private $_idClient;
    private $_nomClient;
    private $_prenomClient;
    private $_adresseClient;
    private $_villeClient;

    /*****************Accesseurs***************** */

    public function getIdClient()
    {
        return $this->_idClient;
    }

    public function setIdClient($idClient)
    {
        $this->_idClient = $idClient;
    }

    public function getNomClient()
    {
        return $this->_nomClient;
    }

    public function setNomClient($nomClient)
    {
        $this->_nomClient = $nomClient;
    }

    public function getPrenomClient()
    {
        return $this->_prenomClient;
    }

    public function setPrenomClient($prenomClient)
    {
        $this->_prenomClient = $prenomClient;
    }

    public function getAdresseClient()
    {
        return $this->_adresseClient;
    }

    public function setAdresseClient($adresseClient)
    {
        $this->_adresseClient = $adresseClient;
    }

    public function getVilleClient()
    {
        return $this->_villeClient;
    }

    public function setVilleClient($villeClient)
    {
        $this->_villeClient = $villeClient;
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
        return $this->getNomClient().' '.$this->getPrenomClient();
    }
}
