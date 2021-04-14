<?php
include 'Head.php';
include 'Header.php';

$mode = $_GET['mode'];
if ($mode != "ajout")
{
    $idChoisi = $_GET['id']; // on recupere l'id choisi par l'utilisateur
    $client = ClientsManager::findById($idChoisi); // on recupere le client correspondant
}
else
{
    $client = new Clients();
}
switch ($mode)
{
    case "ajout":
        $dis = "";
        $submit = '<button type="submit">Ajouter</button>';
        break;
    case "modif":
        $dis = "";
        $submit = '<button type="submit">Modifier</button>';
        break;
    case "detail":
        $dis = " disabled ";
        $submit = "";
        break;
    case "suppression":
        $dis = " disabled ";
        $submit = '<button type="submit">Supprimer</button>';
        break;
}
echo '
<form action="ActionClient.php?mode='.$mode.'" method="post">';
if ($mode != "ajout")
{
    echo '<input type="text" name="idClient" value="' . $client->getIdClient() . '"  hidden/> ';
}

echo '

    <div>
        <label for="nomClient">Nom : </label>
        <input name="nomClient" value="' . $client->getNomClient() . '" ' . $dis . '/>
    </div>
    <div>
        <label for="prenomClient">Prenom : </label>
        <input name="prenomClient"  value="' . $client->getPrenomClient() . '"' . $dis . ' />
    </div>
    <div>
        <label for="adresse">Adresse : </label>
        <input name="adresse"  value="' . $client->getAdresse() . '" ' . $dis . '/>
    </div>
    <div>
        <label for="ville">Ville : </label>
        <input name="ville"  value="' . $client->getVille() . '" ' . $dis . '/>
    </div>';
echo '
    <div class="btn">
        '.$submit.'
        <button type="reset"><a href="../../index.php">Annuler</a></button>
    </div>
</form>';
