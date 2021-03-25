<?php
function ChargerClasse($classe)
{
    require $classe.".Class.php";
}
spl_autoload_register("ChargerClasse");
$a1 = new Auteur(["nom"=>"truc","prenom"=>"toto","ddn"=>new DateTime("1950-01-01"),"ddd"=>new DateTime("1950-02-01")]);
$a2 = new Auteur(["nom"=>"machin","prenom"=>"titi","ddn"=>new DateTime("1950-01-01"),"ddd"=>new DateTime("1950-02-01")]);
$tousLesDocs[]=new Document(["titre"=>"titre1","auteur"=>$a1,"emprunte"=>true]);
$tousLesDocs[]=new Livre(["titre"=>"titre2","auteur"=>$a2,"emprunte"=>true,"nbPages"=>12]);
$tousLesDocs[]=new Video(["titre"=>"titre3","auteur"=>$a1,"emprunte"=>false,"avecSousTitres"=>true]);
$tousLesDocs[]=new Audio(["titre"=>"titre4","auteur"=>$a1,"emprunte"=>true,"duree"=>12]);
$tousLesDocs[]=new Audio(["titre"=>"titre5","auteur"=>$a1,"emprunte"=>false,"duree"=>20]);

$baseDocs= new BaseDocumentaire(["listeDocuments"=>$tousLesDocs]);
//echo $baseDocs->toString();
$rech=$baseDocs->recherche(["emprunte"=>true,"nom"=>"truc"]);
foreach($rech as $doc)
echo $doc."\n";




