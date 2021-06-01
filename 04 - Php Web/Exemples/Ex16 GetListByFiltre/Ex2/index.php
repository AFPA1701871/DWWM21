<?php
function ChargerClasse($classe){
	if (file_exists($classe . ".Class.php")){
		require $classe . ".Class.php";
	}
}
spl_autoload_register("ChargerClasse");
Parametre::init();
DbConnect::init();

var_dump(GetList_quelquesoit_la_table::getListByFiltre("Vuecommandes",["idArticle","descriptionArticle"],["idClient"=>2],false));
var_dump(GetList_quelquesoit_la_table::getListByFiltre("Vuecommandes",["idArticle","descriptionArticle"],["idClient"=>2,"idArticle"=>5],false));
var_dump(GetList_quelquesoit_la_table::getListByFiltre("Vuecommandes",["idArticle","descriptionArticle"],["idClient"=>[2,5]],false));
var_dump(GetList_quelquesoit_la_table::getListByFiltre("Vuecommandes",["idArticle","descriptionArticle"],["nomClient"=>["talon","durant"],"idArticle"=>[1,6,5,2],"quantiteCommande"=>[1,9]],false));
?>