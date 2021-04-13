<?php
$listeClients = ClientsManager::getList();
echo '<div class="liste colonne">';
echo '<a href="PHP/VIEW/FormClient.php?mode=ajout"> <button>Ajouter</button></a>';
  
if (count($listeClients)>0)
{
    foreach ($listeClients as $unClient)
    {
        echo '<div> <div class = "client">' . $unClient->getNomClient() . ' ' . $unClient->getPrenomClient() . '</div>';
        echo '<div class="btn">
   <a href="PHP/VIEW/FormClient.php?mode=detail&id=' . $unClient->getIdClient() . '"> <button>Détail Formulaire</button></a>
    <div class="mini"></div>
    <a href="PHP/VIEW/FormClient.php?mode=modif&id=' . $unClient->getIdClient() . '"> <button>Modifier</button></a>
    <div class="mini"></div>
    <a href="PHP/VIEW/FormClient.php?mode=supression&id=' . $unClient->getIdClient() . '"> <button>Supprimer</button></a>
    </div></div>';
    }
}
else
{
    echo '<h1>Pas de Clients</h1>';
}

echo '</div>';
