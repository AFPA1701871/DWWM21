<?php
$p = new Client($_POST);
xxx
{
    case "ajout":
        ClientManager::add($p);
        break;
    case "modif":
        ClientManager::update($p);
        break;
    case "suppr":
        ClientManager::delete($p);
        break;
}
header("location:index.php?p=accueil");
