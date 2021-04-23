<?php
/* Autoload permet de charger toutes les classes necessaires */
function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php"))
    {
        require "PHP/CONTROLLER/" . $classe . ".Class.php";
    }
    if (file_exists("PHP/MODEL/" . $classe . ".Class.php"))
    {
        require "PHP/MODEL/" . $classe . ".Class.php";
    }
}

/**
 * Méthode qui permet d'affichre une page en fonction de ces paramètres
 * $page tableau contenant 3 valeurs    le chemein d'acces à la page
 *                                      le nom de la page
 *                                      le titre à afficher sur la page
 */
function AfficherPage($page)
{
    $chemin = $page[0];
    $nom = $page[1];
    $titre = $page[2];
    $connexionNecessaire = $page[3];
    $roleNecessaire = $page[4];
    /*   if ($connexionNecessaire && !isset($_SESSION['utilisateur']))
    {
    include 'PHP/VIEW/404.php';
    }
    else
    {
    include 'PHP/VIEW/Head.php';
    include 'PHP/VIEW/Header.php';
    include 'PHP/VIEW/Nav.php';
    include $chemin . $nom . '.php'; //Chargement de la page en fonction du chemin et du nom
    include 'PHP/VIEW/Footer.php';
    }
     */

    include 'PHP/VIEW/Head.php';
    include 'PHP/VIEW/Header.php';
    include 'PHP/VIEW/Nav.php';
    if (($connexionNecessaire && !isset($_SESSION['utilisateur']))
        //qqn sans connection alors qu'il faut etre connecté
         ||
        //qqn avec une connection mais pas le bon role
        (isset($_SESSION['utilisateur']) && !in_array($_SESSION['utilisateur']->getRole(), $roleNecessaire)))
    {
        $chemin = "PHP/VIEW/";
        $nom = "Accueil";
    }
    include $chemin . $nom . '.php'; //Chargement de la page en fonction du chemin et du nom
    include 'PHP/VIEW/Footer.php';

}

/**
 * fonction qui ramène le texte dans la bonne langue
 */
function texte($codetexte)
{
    global $lang; //on appel la variable globale
    return TexteManager::findByCodes($lang, $codetexte);
}

function crypte($mot) //fonction qui crypte le mot de passe
{
    return md5(md5($mot) . strlen($mot));
}
