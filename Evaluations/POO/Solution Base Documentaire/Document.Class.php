<?php
class Document
{

    /*****************Attributs***************** */
    private $_titre;
    private $_auteur;
    private $_emprunte; // booléen, vrai si le document est emprunté

    /*****************Accesseurs***************** */
    public function getTitre()
    {
        return $this->_titre;
    }

    public function setTitre($_titre)
    {
        $this->_titre = $_titre;
    }

    public function getAuteur()
    {
        return $this->_auteur;
    }
/******v1 */
    // public function setAuteur($_auteur)
    // {
    //     $this->_auteur = $_auteur;
    // }
    public function setAuteur(Auteur $_auteur)
    {
        $this->_auteur = $_auteur;
    }

    public function estEmprunte()
    {
        return $this->_emprunte;
    }

    public function setEmprunte(bool $b)
    {
        $this->_emprunte = $b;
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
      //v1   $rep = "Titre : ".$this->getTitre()." Auteur : ".$this->getAuteur()." état d'emprunt : ";
        $rep = "\nType : ".get_class($this)."\nTitre : ".$this->getTitre()."\nAuteur : ".$this->getAuteur()->toString()."état d'emprunt : ";
        $rep .= $this->estEmprunte()?"est emprunté":"est disponible"."\n";
        return $rep;
    }
    public function equalsTo(Document $doc)
    {
      // v1  return (($doc->getTitre()==$this->getTitre())&& ($doc->getAuteur()==$this->getAuteur()));
        return (($doc->getTitre()==$this->getTitre())&& ($this->getAuteur()->equalsTo($doc->getAuteur())));
    }
    static public function compareTo(Document $doc1,Document $doc2)
    {
        if ($doc1->getTitre()==$doc2->getTitre())
        return 0;
        elseif ($doc1->getTitre()>$doc2->getTitre())
        return 1;
        return -1;
    }
    

    
}