<?php
var_dump($_POST);
var_dump($_FILES);
$p = new Produits($_POST);
var_dump($p);
switch ($_GET['mode'])
{
    case "ajout":
            {
            $p->setImage(chargerImage());
            ProduitsManager::add($p);
            break;
        }
    case "modif":
            {
            // si changement d'image
            if (isset($_FILES["image"]))
            {
                //on upload l'image
                $p->setImage(chargerImage());
                //on supprime l'ancienne image
                $fichier = (ProduitsManager::findById($p->getIdProduit()))->getImage();
                unlink($fichier);
            }
            ProduitsManager::update($p);
            break;
        }
    case "delete":
            {
            $fichier = (ProduitsManager::findById($p->getIdProduit()))->getImage();
            unlink($fichier);
            ProduitsManager::delete($p);
            break;
        }
}

header("location:index.php?codePage=listeProduit");

function chargerImage()
{
    if (is_uploaded_file($_FILES['image']['tmp_name']))
    {
        $leNom = "IMG/" . uniqid('prod_') . '.' . explode("/", $_FILES['image']['type'])[1];
        move_uploaded_file($_FILES['image']['tmp_name'], $leNom);
    }
    return $leNom;
}
