<?php
class BaseDocumentaire
{

    /*****************Attributs***************** */
    private $_listeDocuments;

    /*****************Accesseurs***************** */
    public function getListeDocuments()
    {
        return $this->_listeDocuments;
    }

    public function setListeDocuments($_listeDocuments)
    {
        $this->_listeDocuments = $_listeDocuments;

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
        $rep = "";
        $liste = $this->getListeDocuments();
        usort($liste, ["Document", "compareTo"]);
        foreach ($liste as $doc)
        {
            $rep .= $doc->toString() . "\n";
        }
        return $rep;
    }
    public function recherche(array $criteres)
    {
        $rep=[];
        $liste = $this->getListeDocuments();
        foreach ($liste as $doc)
        {
            if ($this->correspond($criteres, $doc))
            {
                $rep[] = $doc->toString();
            }
        }
        return $rep;
    }
    private function correspond(array $criteres, $doc)
    {
        $tab = ["titre" => ["all", ['getTitre']],"emprunte" => ["all", ['estEmprunte']], "nom" => ["all", ['getAuteur', 'getNom']],
            "prenom" => ["all", ['getAuteur', 'getPrenom']], "nbPages" => ["Livre", ['getNbPages']],
            "avecSousTitres" => ["Video", ['getAvecSousTitres']], "duree" => ["Audio", ['getDuree']]];
        foreach ($criteres as $unCritere => $uneValeur)
        {
            $compare = false;
            if ($tab[$unCritere][0] == "all") // si le type n'est pas precisé
            {
                 $compare = true;
            }
            elseif (get_class($doc) == $tab[$unCritere][0]) //on verifie que le doc est du bon type
            {
                $compare = true;
            }
            else return false;  // le type ne correspond pas, le doc ne correspond donc pas
            if ($compare)
            {
                $methodes = $tab[$unCritere][1];
                $res = $doc;
                foreach ($methodes as $uneMethode) //on execute les méthodes tour à tour pour avancer dans les objets
                {
                    $res = $res->$uneMethode();
                }
                if ($res != $uneValeur) //on compare la valeur de l'objet à la valeur du critère
                {
                    return false;   //le critère ne correspond pas
                }
            }
        }
        return true;    //aucun critère ne correspond pas, donc le doc correspond
    }
}
