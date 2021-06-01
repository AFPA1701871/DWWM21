<?php
    class Vuecommandes{
    
        /*******************************************************************Attributs**************************************************************************** */
        private $_idCommande;
        private $_idClient;
        private $_nomClient;
        private $_prenomClient;
        private $_dateCommande;
        private $_quantiteCommande;
        private $_idArticle;
        private $_descriptionArticle;
        private $_prixArticle;
    
        /*******************************************************************Accesseurs*************************************************************************** */
    
        public function getIdCommande(){
                return $this->_idCommande;
        }

        public function setIdCommande($idCommande){
                $this->_idCommande = $idCommande;
        }

        public function getIdClient(){
                return $this->_idClient;
        }

        public function setIdClient($idClient){
                $this->_idClient = $idClient;
        }

        public function getNomClient(){
                return $this->_nomClient;
        }

        public function setNomClient($nomClient){
                $this->_nomClient = $nomClient;
        }

        public function getPrenomClient(){
                return $this->_prenomClient;
        }

        public function setPrenomClient($prenomClient){
                $this->_prenomClient = $prenomClient;
        }

        public function getDateCommande(){
                return $this->_dateCommande;
        }

        public function setDateCommande($dateCommande){
                $this->_dateCommande = $dateCommande;
        }

        public function getQuantiteCommande(){
                return $this->_quantiteCommande;
        }

        public function setQuantiteCommande($quantiteCommande){
                $this->_quantiteCommande = $quantiteCommande;
        }

        public function getIdArticle(){
                return $this->_idArticle;
        }

        public function setIdArticle($idArticle){
                $this->_idArticle = $idArticle;
        }

        public function getDescriptionArticle(){
                return $this->_descriptionArticle;
        }

        public function setDescriptionArticle($descriptionArticle){
                $this->_descriptionArticle = $descriptionArticle;
        }

        public function getPrixArticle(){
                return $this->_prixArticle;
        }

        public function setPrixArticle($prixArticle){
                $this->_prixArticle = $prixArticle;
        }

        /*******************************************************************Constructeur************************************************************************* */
    
        public function __construct(array $options = []){
            if (!empty($options)){ // empty : renvoi vrai si le tableau est vide
                $this->hydrate($options);
            }
        }
        public function hydrate($data){
            foreach ($data as $key => $value){
                $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
                if (is_callable([$this, $methode])){ // is_callable verifie que la methode existe
                    $this->$methode($value);
                }
            }
        }
    
        /*******************************************************************Autres Méthodes*********************************************************************** */
    }
?>