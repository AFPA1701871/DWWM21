<?php

class GetList_quelquesoit_la_table {
	
	public static function getListByFiltre($table,$tabColonnes,$filtre,$api){
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
					$in.="'".$value[$j]."',";
				}
				$laCondition.=" IN (".substr($in,0,-1).") ";
			// Valeur toute simple
			}else{
				$laCondition.="='".$value."'";
			}

			$i++;
		}
		
		/* 		transformation du tableu de colonne en liste  		*/
		$listeColonnes = implode(",",$tabColonnes);
		var_dump("SELECT ".$listeColonnes." FROM ".$table." " .$laCondition);
 		$db=DBConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT ".$listeColonnes." FROM ".$table." " .$laCondition);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			if($donnees != false){
				$liste[]=($api)?$donnees:new $table($donnees);
			}
		}
		return $liste;
	}

}