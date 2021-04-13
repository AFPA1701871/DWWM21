<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    if (file_exists("./CSS/style.css"))
        {
            echo '<link rel="stylesheet" href="./CSS/style.css">'; // quand on vient de index.php
        }
        else if (file_exists("../../CSS/style.css"))
        {
            echo '<link rel="stylesheet" href="../../CSS/style.css">';  // quand on vient du dossier VIEW
        }
        ?>
</head>

<?php
/* Autoload permet de charger toutes les classes necessaires */
function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php"))
    {
        require "PHP/CONTROLLER/" . $classe . ".Class.php"; // quand on vient de index.php
    }
    else if (file_exists("../CONTROLLER/" . $classe . ".Class.php"))
    {
        require "../CONTROLLER/" . $classe . ".Class.php"; // quand on vient du dossier VIEW
    }
    if (file_exists("PHP/MODEL/" . $classe . ".Class.php"))
    {
        require "PHP/MODEL/" . $classe . ".Class.php"; // quand on vient de index.php
    }
    else if (file_exists("../MODEL/" . $classe . ".Class.php"))
    {
        require "../MODEL/" . $classe . ".Class.php"; // quand on vient du dossier VIEW

    }
}
spl_autoload_register("ChargerClasse");

DbConnect::init();