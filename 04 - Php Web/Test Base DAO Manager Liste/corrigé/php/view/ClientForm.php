<?php
$mode = $_GET["m"];
if ($mode != "ajout")
{
    $id = $_GET["id"];
    $client = ClientManager::findById($id);
}
echo '<div class="formulaire">
        <form action="index.php?p=ClientAction&m=' . $mode . '" method = "POST">
            <div> 
                <label for="nomClient">Nom : </label>
                <input type="text" id="nomClient" name="nomClient" placeholder="Nom du client"  required autofocus  ';
                    if ($mode != "ajout")
                    {
                        echo 'value ="' . $client->getNomClient() . '"';
                    }
echo '          >
            </div>';
if ($mode != "ajout")
{
    echo '  <input type="text" id="idClient" name="idClient" hidden value = "' . $client->getIdClient() . '">';
}
echo '      <div>  
                <label for="prenomClient">Prenom : </label>
                <input type="text" id="prenomClient" name="prenomClient" placeholder="Prenom du client" required ';
                    if ($mode != "ajout")
                    {
                        echo 'value ="' . $client->getPrenomClient() . '"';
                    }
echo '          >
            </div>
            <div> 
                <label for="adresseClient">Adresse : </label>
                <input type="text" id="adresseClient" name="adresseClient" placeholder="Adresse du Client" required ';
                    if ($mode != "ajout")
                    {
                        echo 'value ="' . $client->getAdresseClient() . '"';
                    }
echo '          >
            </div>
            <div> 
                <label for="villeClient">Ville : </label>
                <input type="text" id="villeClient" name="villeClient" placeholder="Ville du Client" required ';
                    if ($mode != "ajout")
                    {
                        echo 'value ="' . $client->getVilleClient() . '"';
                    }
echo '          >
            </div> ';
echo '      <div class="centrer">
                <button class="bouton" id="submit" type="submit ">';
                    switch ($mode)
                    {
                        case "ajout":echo 'Ajouter';
                            break;
                        case "modif":echo 'Modifier';
                            break;
                        case "suppr":echo 'Supprimer';
                            break;
                    }
echo '          </button>
            </div>
        </form>
    </div>';
