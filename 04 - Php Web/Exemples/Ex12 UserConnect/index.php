<?PHP
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
spl_autoload_register("ChargerClasse");

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

    include 'PHP/VIEW/Head.php';
    include 'PHP/VIEW/Header.php';
    include 'PHP/VIEW/Nav.php';
    include $chemin . $nom . '.php'; //Chargement de la page en fonction du chemin et du nom
    include 'PHP/VIEW/Footer.php';
}

function crypte($mot) //fonction qui crypte le mot de passe
{
    return md5(md5($mot) . strlen($mot));
}


//on active la connexion à la base de données
DbConnect::init();
session_start();  // initialise la variable de Session
/* création d'u tableau de redirection, en fonction du codePage, on choisit la page à afficher */
$routes = [
    "default" => ["PHP/VIEW/", "Accueil", "Accueil"],

    "inscription" => ["PHP/VIEW/", "FormInscription", "Identification"],
    "actionInscription" => ["PHP/VIEW/", "actionInscription", "Erreur détectée"],
    "connection" => ["PHP/VIEW/", "FormConnection", "Identification"],
    "actionConnection" => ["PHP/VIEW/", "actionConnection", "Erreur détectée"],
    "accueil" => ["PHP/VIEW/", "Accueil", "Accueil"],
    "deconnection" => ["PHP/VIEW/", "Actiondeconnection", "Erreur détectée"],
    "admin" => ["PHP/VIEW/", "Admin", "Admin"],
    "user" => ["PHP/VIEW/", "User", "User"]
   
];

if (isset($_GET["codePage"]))
{

    $codePage = $_GET["codePage"];

    //Si cette route existe dans le tableau des routes
    if (isset($routes[$codePage]))
    {
        //Afficher la page correspondante
        AfficherPage($routes[$codePage]);
    }
    else
    {
        //Sinon afficher la page par defaut
        AfficherPage($routes["default"]);
    }

}
else
{
    //Sinon afficher la page par defaut
    AfficherPage($routes["default"]);

}