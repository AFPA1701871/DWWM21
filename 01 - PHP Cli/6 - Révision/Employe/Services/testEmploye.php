<?php
function ChargerClasse($classe)
{
    require "../Entities/".$classe.".Class.php";
}
spl_autoload_register("ChargerClasse");


$e1 = new Employe(["nom"=>"Dupond","prenom"=>"toto", "dateEmbauche"=>new DateTime("2015-01-01"),"fonction"=>"employe","salaire"=>12, "service"=>"compta"]);
// var_dump($e1);
echo $e1->anciennete();