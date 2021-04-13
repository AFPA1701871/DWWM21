<?php
$listeClients = ClientsManager::getList();
echo '<div class="liste colonne">';
echo '<a href="PHP/VIEW/FormAjouter.php"> <button>Ajouter</button></a>';
  
if (count($listeClients)>0)
{
    foreach ($listeClients as $unClient)
    {
        echo '<div> <div class = "client">' . $unClient->getNomClient() . ' ' . $unClient->getPrenomClient() . '</div>';
        echo '<div class="btn">
    <a href="PHP/VIEW/Detail.php?id=' . $unClient->getIdClient() . '"> <button>Détail</button></a>
    <div class="mini"></div>
    <a href="PHP/VIEW/FormDetail.php?id=' . $unClient->getIdClient() . '"> <button>Détail Formulaire</button></a>
    <div class="mini"></div>
    <a href="PHP/VIEW/FormModifier.php?id=' . $unClient->getIdClient() . '"> <button>Modifier</button></a>
    <div class="mini"></div>
    <a href="PHP/VIEW/FormSuppression.php?id=' . $unClient->getIdClient() . '"> <button>Supprimer</button></a>
    </div></div>';
    }
}
else
{
    echo '<h1>Pas de Clients</h1>';
}

echo '</div>';
