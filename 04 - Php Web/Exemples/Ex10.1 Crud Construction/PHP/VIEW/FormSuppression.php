<?php
include 'Head.php';
include 'Header.php';
$idChoisi = $_GET['id']; // on recupere l'id choisi par l'utilisateur
$client = ClientsManager::findById($idChoisi); // on recupere le client correspondant

echo '
<form action="SupprimerClient.php" method="post">
   <input type="text" name="idClient" value="'.$client->getIdClient().'" hidden/>
    <div> 
        <label for="nomClient">Nom : </label>
        <input name="nomClient" value="'.$client->getNomClient().'" disabled/>
    </div>
    <div> 
        <label for="prenomClient">Prenom : </label>
        <input name="prenomClient"  value="'.$client->getPrenomClient().'"disabled/>
    </div>
    <div> 
        <label for="adresse">Adresse : </label>
        <input name="adresse"  value="'.$client->getAdresse().'" disabled />
    </div>
    <div> 
        <label for="ville">Ville : </label>
        <input name="ville"  value="'.$client->getVille().'" disabled />
    </div>
    <div class="btn"> 
    <button type="submit">Supprimer</button>
    <button type="reset"><a href="../../index.php">Annuler</a></button>
    </div>
</form>';