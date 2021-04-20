<?php
function ChargerClasse($classe)
{
    if (file_exists("php/Controller/" . $classe . ".Class.php")) {
        require "php/Controller/" . $classe . ".Class.php";
    }

    if (file_exists("php/Model/" . $classe . ".Class.php")) {
        require "php/Model/" . $classe . ".Class.php";
    }

}
spl_autoload_register("ChargerClasse");
function AfficherPage($nom)
{
    include 'php/view/head.php';
    include 'php/view/header.php';
    include 'php/view/' . $nom . '.php';
    include 'php/view/footer.php';
}

DbConnect::init();
if (isset($_GET["p"])) {
    switch ($_GET["p"]) {
        case "ClientAction":
            AfficherPage("ClientAction");
            break;
        case "ClientForm":
            AfficherPage("ClientForm");
            break;
        case "accueil":
            AfficherPage("Clientliste");
            break;
    }
} else {
    AfficherPage("Clientliste");
}
