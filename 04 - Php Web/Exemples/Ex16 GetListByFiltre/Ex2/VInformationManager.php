<?php

class vInformationManager {
	
	public static function getListByFiltre($filtre,$api){
		$laCondition="";
		$operateur="";
		$i=0;
		// Boucle sur les filtres
		foreach ($filtre as $key => $value) {
			$operateur=($i==0)?" WHERE ":" AND ";
			$laCondition.=$operateur.$key;

			// Si c'est un array 
			if(is_array($value)){
				// Boucle sur le tableau pour affichage dans le IN
				$in="";
				for ($j=0; $j <count($value) ; $j++) { 
					$in.=$value.",";
				}
				$laCondition.=" IN (".substr($in,0,-1).") ";
			// Valeur toute simple
			}else{
				$laCondition.="=".$value;
			}

			$i++;
		}
		// var_dump($laCondition);

 		$db=DBConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM vInformation" .$laCondition);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			if($donnees != false){
				$liste[]=($api)?$donnees:new vInformation($donnees);
			}
		}
		return $liste;
	}

}