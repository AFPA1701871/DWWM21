<?php
include 'Head.php';
include 'Header.php';
$mode = $_GET["mode"];
if ($mode != "ajout")
{
    $idChoisi = $_GET['id']; // on recupere l'id choisi par l'utilisateur
    $client = ClientsManager::findById($idChoisi); // on recupere le client correspondant
}
?>
<form action="ActionClient.php?mode=<?=$mode?>" method="post">

   <?php if ($mode!="ajout") echo '<input type="text" name="idClient" value="'. $client->getIdClient().'"  hidden/> ';?>
    <div>
        <label for="nomClient">Nom : </label>
        <input name="nomClient" value="<?php if ($mode!="ajout") echo $client->getNomClient() ?>"  
                        <?php if($mode == "detail" || $mode == "supression") echo "disabled"?>/>
    </div>
    <div>
        <label for="prenomClient">Prenom : </label>
        <input name="prenomClient"  value="<?php if ($mode!="ajout") echo $client->getPrenomClient() ?>"  
                        <?php if($mode == "detail" || $mode == "supression") echo "disabled"?> />
    </div>
    <div>
        <label for="adresse">Adresse : </label>
        <input name="adresse"  value="<?php if ($mode!="ajout") echo $client->getAdresse() ?>" 
                        <?php if($mode == "detail" || $mode == "supression") echo "disabled"?>/>
    </div>
    <div>
        <label for="ville">Ville : </label>
        <input name="ville"  value="<?php if ($mode!="ajout") echo $client->getVille() ?>" 
                        <?php if($mode == "detail" || $mode == "supression") echo "disabled"?> />
    </div>
    <div class="btn">
    <?php
    switch ($mode)
    {
        case "ajout": echo' <button type="submit">Ajouter</button>'; break;
        case "modif": echo' <button type="submit">Modifier</button>'; break;
        case "supression": echo' <button type="submit">Supprimer</button>'; break;
    
    }
    echo '
    <button type="reset"><a href="../../index.php">Annuler</a></button>
    </div>
</form>';

