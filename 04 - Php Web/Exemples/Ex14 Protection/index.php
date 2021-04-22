<?PHP

include "./PHP/Outils.php";
spl_autoload_register("ChargerClasse");

//on active la connexion à la base de données
Parametre::init();
DbConnect::init();

session_start(); // initialise la variable de Session

/***************************GESTION DES LANGUES ******************/
// on recupere la langue de l'URL
if (isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}

//on prend la langue de la session sinon FR par défaut
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'FR';


/* création d'u tableau de redirection, en fonction du codePage, on choisit la page à afficher */
$routes = [
    "default" => ["PHP/VIEW/", "test", "Identification",false],

    "inscription" => ["PHP/VIEW/", "FormInscription", "Identification",false],
    "actionInscription" => ["PHP/VIEW/", "actionInscription", "Erreur",false],
    "connection" => ["PHP/VIEW/", "FormConnection", "Identification",false],
    "actionConnection" => ["PHP/VIEW/", "actionConnection", "Erreur",false],
    "accueil" => ["PHP/VIEW/", "Accueil", "Accueil",false],
    "deconnection" => ["PHP/VIEW/", "Actiondeconnection", "Erreur",true],
  
    "listeProduit" => ["PHP/VIEW/", "ListeProduit", "Liste de produits",true],
    "formProduit" => ["PHP/VIEW/", "FormProduit", "Détail du produit",true],
    "actionProduit" => ["PHP/VIEW/", "ActionProduit", "Mise à jour du produit",true],
    
    "listeCategorie" => ["PHP/VIEW/", "ListeCategorie", "Liste des Catégories",true],
    "formCategorie" => ["PHP/VIEW/", "FormCategorie", "Gestion des catégories",true],
    "actionCategorie" => ["PHP/VIEW/", "ActionCategorie", "Mise à jour du produit",true]
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
