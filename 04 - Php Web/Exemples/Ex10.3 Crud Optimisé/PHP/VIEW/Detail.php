<?php
include 'Head.php';
include 'Header.php';
$idChoisi = $_GET['id']; // on recupere l'id choisi par l'utilisateur
$client = ClientsManager::findById($idChoisi); // on recupere le client correspondant

echo '
<div class="page colonne">
    <div class="entete">'.$client->getNomClient()."   ".$client->getPrenomClient().'</div>
    <div>'.$client->getAdresse().'
        <br>
        '.$client->getVille().'
    </div>
    <button type="reset"><a href="../../index.php">Annuler</a></button>
</div>';