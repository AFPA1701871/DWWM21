<?php 
    class ManagerFiltre{
    public static function getList($filtre=[],$api=false){//!\ si api est renseignée, filtre doit l'etre aussi ! (mais un tableau vide, ça compte)
		$db = DbConnect::getDb();
		$liste=[];
		$string="";
		foreach ($filtre as $key => $valeur) {
			if(!is_array($valeur))$valeur=[$valeur];//getion du cas où c'est pas un tableau
			$boutDeString="(";
			foreach ($valeur as $value) {
				if($boutDeString!="(")$boutDeString.=" OR ";//en gros.. si une valeur est déjà dans le boutDeString, faut rajouter du OR 
				$boutDeString.=$key."='".$value."'";
			}
			$boutDeString.=")";
			//si le string etait vide, faut précéder la valeur avec WHERE, sinon, il faut un AND
			$string?$string.=" AND ".$boutDeString:$string=" WHERE ".$boutDeString;
		}
		var_dump('SELECT * FROM vuecommandes'.$string);
		$q=$db->query('SELECT * FROM vuecommandes'.$string);
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			if ($donnees != false)$api?$liste[] = $donnees:$liste[] = new Vuecommandes($donnees);
		}
		return $liste;
	}
}
?>