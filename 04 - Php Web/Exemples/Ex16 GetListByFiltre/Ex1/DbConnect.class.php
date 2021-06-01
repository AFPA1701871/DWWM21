<?php
class DbConnect{
	private static $db;

	public static function getDb(){
		return DbConnect::$db;
	}

	public static function init(){
		try {
			self::$db = new PDO('mysql:host=' . Parametre::getHost() . ';port=' . Parametre::getPort() . ';dbname=' . Parametre::getDbname() . ';charset=utf8', Parametre::getLogin(), Parametre::getPwd());
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
	}
}


// script sql

/*CREATE view Vuecommandes as 
select a.idArticle,a.descriptionArticle,a.prixArticle,c.idClient,c.nomClient,c.prenomClient, 
c.dateEntreeClient, co.idCommande, co.dateCommande, co.quantiteCommande 
from articles as a 
inner join commandes as co ON co.idArticle=a.idArticle 
inner join clients as c on c.idClient=co.idClient */
?>