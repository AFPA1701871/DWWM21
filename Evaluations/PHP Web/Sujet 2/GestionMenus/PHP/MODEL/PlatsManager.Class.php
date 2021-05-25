<?php

class PlatsManager 
{
	public static function add(Plats $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Plats (libellePlat,nbCalories,idMenu) VALUES (:libellePlat,:nbCalories,:idMenu)");
		$q->bindValue(":libellePlat", $obj->getLibellePlat());
		$q->bindValue(":nbCalories", $obj->getNbCalories());
		$q->bindValue(":idMenu", $obj->getIdMenu());
		$q->execute();
	}

	public static function update(Plats $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Plats SET idPlat=:idPlat,libellePlat=:libellePlat,nbCalories=:nbCalories,idMenu=:idMenu WHERE idPlat=:idPlat");
		$q->bindValue(":idPlat", $obj->getIdPlat());
		$q->bindValue(":libellePlat", $obj->getLibellePlat());
		$q->bindValue(":nbCalories", $obj->getNbCalories());
		$q->bindValue(":idMenu", $obj->getIdMenu());
		$q->execute();
	}
	public static function delete(Plats $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Plats WHERE idPlat=" .$obj->getIdPlat());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Plats WHERE idPlat =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Plats($results);
		}
		else
		{
			return false;
		}
	}
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Plats");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Plats($donnees);
			}
		}
		return $liste;
	}
}