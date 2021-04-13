<?php
include 'Head.php';
include 'Header.php';
$idChoisi = $_GET['id']; // on recupere l'id choisi par l'utilisateur
$client = ClientsManager::findById($idChoisi); // on recupere le client correspondant

echo '
<form action="ModifierClient.php" method="post">
   <input type="text" name="idClient" value="'.$client->getIdClient().'" hidden/>
    <div> 
        <label for="nomClient">Nom : </label>
        <input name="nomClient" value="'.$client->getNomClient().'"  />
    </div>
    <div> 
        <label for="prenomClient">Prenom : </label>
        <input name="prenomClient"  value="'.$client->getPrenomClient().'"   />
    </div>
    <div> 
        <label for="adresse">Adresse : </label>
        <input name="adresse"  value="'.$client->getAdresse().'"  />
    </div>
    <div> 
        <label for="ville">Ville : </label>
        <input name="ville"  value="'.$client->getVille().'"  />
    </div>
    <div class="btn"> 
    <button type="submit">Modifier</button>
    <button type="reset"><a href="../../index.php">Annuler</a></button>
    </div>
</form>';