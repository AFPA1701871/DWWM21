<?php
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
echo '<div>' . $employeChoisi->toString() . '</div>';

echo '<a href="index.php?page=liste">Retour<div>';
