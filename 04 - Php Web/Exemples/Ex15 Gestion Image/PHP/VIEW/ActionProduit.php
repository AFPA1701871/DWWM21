<?php
var_dump($_POST);
var_dump($_FILES);
$p = new Produits($_POST);
var_dump($p);
switch ($_GET['mode']) {
    case "ajout":
        {   
            //on upload l'image
            $leNom = uniqid('prod_') . '.'.explode("/",$_FILES['image']['type'])[1];
            move_uploaded_file($_FILES['image']['tmp_name'],"IMG/".$leNom);
            $p->setImage("IMG/".$leNom);

            ProduitsManager::add($p);
            break;
        }
    case "modif":
        {
            // si changement d'image
            if(isset($_FILES["image"]))
            {
                //on upload l'image
                $leNom = uniqid('prod_') . '.'.explode("/",$_FILES['image']['type'])[1];
                move_uploaded_file($_FILES['image']['tmp_name'],"IMG/".$leNom);
                $p->setImage("IMG/".$leNom);
                //on supprime l'ancienne image
                $fichier = ProduitsManager::findById($p->getIdProduit())->getIm
            }
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