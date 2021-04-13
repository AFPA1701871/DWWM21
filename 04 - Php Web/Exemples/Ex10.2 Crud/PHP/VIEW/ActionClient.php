<?php

include 'Head.php';
var_dump($_POST);
$cl = new Clients($_POST);
switch ($_GET["mode"])
{
    case "ajout" : ClientsManager::add($cl);break;
    case "modif" : ClientsManager::update($cl);break;
    case "supression" : ClientsManager::delete($cl);break;
    
}

header("location:../../index.php");