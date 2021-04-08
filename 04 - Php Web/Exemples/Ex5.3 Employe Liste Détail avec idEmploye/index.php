<?php
function autoload($classe)
{
    require $classe . ".Class.php";
}
spl_autoload_register("autoload");

include "ListeDonnees.php";
if (isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case "liste":
            $page = "ListeEmployes.php";
            $titre = "Liste des employés";
            break;
        case "detail":
            // je recupere l'id
            $id = $_GET["id"];
            //je parcours les employes pour trouver "le bon"
            foreach ($listeEmployes as $employe)
            {
                if ($employe->getId() == $id)
                {
                    $employeChoisi=$employe;
                }
            }
            $page = "detail.php";
            $titre = "Un employe : ". $employeChoisi->getPrenom();
            break;
        default:
            $page = "ListeEmployes.php";
            $titre = "Liste des employés";
            break;
    }
}
else
{
    $page = "ListeEmployes.php";
    $titre = "Liste des employés";
}
include "head.php";
include "header.php";
include $page;
