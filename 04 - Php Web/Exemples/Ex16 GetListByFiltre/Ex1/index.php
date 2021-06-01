<?php
function ChargerClasse($classe){
	if (file_exists($classe . ".Class.php")){
		require $classe . ".Class.php";
	}
}
spl_autoload_register("ChargerClasse");
Parametre::init();
DbConnect::init();

var_dump(ManagerFiltre::getList());
var_dump(ManagerFiltre::getList(["idClient"=>2]));
var_dump(ManagerFiltre::getList(["idClient"=>2,"idArticle"=>5]));
var_dump(ManagerFiltre::getList(["idClient"=>[2,5]]));
var_dump(ManagerFiltre::getList(["nomClient"=>["talon","durant"],"idArticle"=>[1,6,5,2],"quantiteCommande"=>[1,9]]));
?>