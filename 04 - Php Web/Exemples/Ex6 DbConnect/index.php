<?php
function autoload($classe)
{
    require $classe . ".Class.php";
}
spl_autoload_register("autoload");

try { // permet de reperer les erreurs dans les instructions suivantes
    $db = new PDO('mysql:host=localhost;dbname=phpexemple;port=3306', 'root', '');
}
catch (Exception $e) // s'execute au déclenchement d'erreur
{
    if ($e->getCode() == 1049)
    {
        echo "le nom de la base est incorrect";
        die();
    }
    else if ($e->getCode() == 1045)
    {
        echo "erreur dans le mot de passe";
        die();// permet d'arreter l'application
    }
    else
    {
        die('erreur : '. $e->getMessage());
    }
}
echo "base de données connectée";
$requete = $db->query("SELECT * from clients where idClient=4");
// var_dump($requete);
$reponse = $requete->fetch(PDO::FETCH_ASSOC);
// var_dump($reponse);
$client1 = new Clients($reponse);
// var_dump($client1);
echo '<div>'.$client1->toString().'</div>';