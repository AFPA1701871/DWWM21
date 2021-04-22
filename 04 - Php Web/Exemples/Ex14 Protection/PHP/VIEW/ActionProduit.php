<?php
var_dump($_POST);
$p = new Produits($_POST);

var_dump($p);
switch ($_GET['mode']) {
    case "ajout":
        {
            ProduitsManager::add($p);
            break;
        }
    case "modif":
        {
            
            ProduitsManager::update($p);
            break;
        }
    case "delete":
        {
            
            ProduitsManager::delete($p);
            break;
        }
}

//header("location:index.php?codePage=listeProduit");