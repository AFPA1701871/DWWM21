<?php
var_dump($_POST);
$mode = $_GET['mode'];

$obj = new Plats($_POST);
switch ($mode) {
    case "ajouter":
        {
            PlatsManager::add($obj);
            break;
        }
    case "modifier":
        {
            PlatsManager::update($obj);
            break;
        }
    case "supprimer":
        {
            $obj=new Plats(["idPlat"=>$_GET['id']]);
            PlatsManager::delete($obj);
            break;
        }

}
header("location:index.php?page=ListePlats");
