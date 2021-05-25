<?php

class Plats 
{

	/*****************Attributs***************** */

	private $_idPlat;
	private $_libellePlat;
	private $_nbCalories;
	private $_idMenu;

	/***************** Accesseurs ***************** */


	public function getIdPlat()
	{
		return $this->_idPlat;
	}

	public function setIdPlat($idPlat)
	{
		$this->_idPlat=$idPlat;
	}

	public function getLibellePlat()
	{
		return $this->_libellePlat;
	}

	public function setLibellePlat($libellePlat)
	{
		$this->_libellePlat=$libellePlat;
	}

	public function getNbCalories()
	{
		return $this->_nbCalories;
	}

	public function setNbCalories($nbCalories)
	{
		$this->_nbCalories=$nbCalories;
	}

	public function getIdMenu()
	{
		return $this->_idMenu;
	}

	public function setIdMenu($idMenu)
	{
		$this->_idMenu=$idMenu;
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
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
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
		return "IdPlat : ".$this->getIdPlat()."LibellePlat : ".$this->getLibellePlat()."NbCalories : ".$this->getNbCalories()."IdMenu : ".$this->getIdMenu()."\n";
	}


	
	/* Renvoit Vrai si lobjet en paramètre est égal 
	* à l'objet appelant
	*
	* @param [type] $obj
	* @return bool
	*/
	public function equalsTo($obj)
	{
		return;
	}


	/**
	* Compare l'objet à un autre
	* Renvoi 1 si le 1er est >
	*        0 si ils sont égaux
	*      - 1 si le 1er est <
	*
	* @param [type] $obj1
	* @param [type] $obj2
	* @return Integer
	*/
	public function compareTo($obj)
	{
		return;
	}
}