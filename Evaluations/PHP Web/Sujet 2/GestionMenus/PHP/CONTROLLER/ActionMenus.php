<?php
var_dump($_POST);
$mode = $_GET['mode'];

$obj = new Menus($_POST);
switch ($mode) {
    case "ajouter":
        {
            MenusManager::add($obj);
            break;
        }
    case "modifier":
        {
            MenusManager::update($obj);
            break;
        }
    case "supprimer":
        {
            $obj=new Menus(["idMenu"=>$_GET['id']]);
            MenusManager::delete($obj);
            break;
        }

}
header("location:index.php?page=ListeMenus");
