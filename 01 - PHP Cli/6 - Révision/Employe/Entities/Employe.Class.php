<?php

class Employe
{

    /*****************Attributs***************** */
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaire;
    private $_service;
    private static $_compteur = 0;

    /*****************Accesseurs***************** */

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getDateEmbauche()
    {
        return $this->_dateEmbauche;
    }

    public function setDateEmbauche($dateEmbauche)
    {
        $this->_dateEmbauche = $dateEmbauche;
    }

    public function getFonction()
    {
        return $this->_fonction;
    }

    public function setFonction($fonction)
    {
        $this->_fonction = $fonction;
    }

    public function getSalaire()
    {
        return $this->_salaire;
    }

    public function setSalaire($salaire)
    {
        $this->_salaire = $salaire;
    }

    public function getService()
    {
        return $this->_service;
    }

    public function setService($service)
    {
        $this->_service = $service;
    }
    public static function getCompteur()
    {
        return self::$_compteur;
    }

    /*****************Constructeur***************** */

    public function __construct(array $options = [])
    {
        if (!empty($options)) // empty : renvoi vrai si le tableau est vide
        {
            $this->hydrate($options);
        }
        self::$_compteur++;
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

    /**
     * Transforme l'objet en chaine de caractères
     *
     * @return String
     */
    public function toString()
    {
        $aff = "\n\n*** SALARIE ***\n";
        $aff .= "Nom :" . $this->getNom() . "\nPrenom :" . $this->getPrenom() . "\nDateEmbauche :" . $this->getDateEmbauche()->format('Y-m-d') . "\nPosteEntreprise :" . $this->getFonction() . "\nSalaire annuel :" . $this->getSalaire() . "K€\nService :" . $this->getService() . "\n";
        $aff .= "Il reçoit une prime de " . $this->prime() . "K€\n";
        return $aff;
    }

    /**
     * Renvoi vrai si l'objet en paramètre est égal à l'objet appelant
     *
     * @param [type] $obj
     * @return bool
     */
    public function equalsTo($obj)
    {
        return true;
    }
    /**
     * Compare 2 objets
     * Renvoi 1 si le 1er est >
     *        0 si ils sont égaux
     *        -1 si le 1er est <
     *
     * @param [type] $obj1
     * @param [type] $obj2
     * @return void
     */
    public static function compareTo($obj1, $obj2)
    {
        if ($obj1->getNom() > $obj2->getNom())
        {
            return 1;
        }
        else if ($obj1->getNom() < $obj2->getNom())
        {
            return -1;
        }
        else if ($obj1->getPrenom() > $obj2->getPrenom())
        {
            return 1;
        }
        else if ($obj1->getPrenom() < $obj2->getPrenom())
        {
            return -1;
        }
        else
        {
            return 0;
        }
    }

    public static function compareToService($obj1, $obj2)
    {
        if ($obj1->getService() > $obj2->getService())
        {
            return 1;
        }
        else if ($obj1->getService() < $obj2->getService())
        {
            return -1;
        }
        else
        { // si les services sont les mêmes, on rappele la fonction de tri par Nom Prenom
            return self::compareTo($obj1, $obj2);
        }
    }

/**
 * calcul l'anciennete en année
 *
 * @return int  nb d'année d'ancienneté
 */
    private function anciennete()
    {
        $dateJour = new DateTime("NOW");
        $diff = $dateJour->diff($this->getDateEmbauche());
        return $diff->format("%y");
    }

    /**
     * fonction qui calcul la prime globale
     *
     * @return int renvoi le montant de la prime
     */
    public function prime()
    {
        /* calcul prime sur salaire */
        $primeS = $this->primeSalaire();
        /* calcul prime sur ancienneté */
        $primeA = $this->primeAnciennete();
        return $primeS + $primeA;
    }
/**
 * applique 5% du salaire
 *
 * @return int  montant de la prime
 */
    public function primeSalaire()
    {
        return $this->getSalaire() * 0.05;
    }
/**
 * prime de 2% du salaire par anne d'ancienneté
 *
 * @return int montant de la prime
 */
    public function primeAnciennete()
    {
        return $this->getSalaire() * 0.02 * $this->anciennete();
    }

}
