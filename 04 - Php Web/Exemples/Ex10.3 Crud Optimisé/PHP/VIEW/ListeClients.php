<?php
$listeClients = ClientsManager::getList();
echo '<div class="btn"><a href="PHP/VIEW/FormClient.php?mode=ajout"><button>Ajout</button></a></div>';
echo '<div class="liste colonne">';
foreach($listeClients as $unClient)
{
   echo '<div> <div class = "client">'.$unClient->getNomClient().' '. $unClient->getPrenomClient() .'</div>';
   echo '<div class="btn">
   <a href="PHP/VIEW/FormClient.php?mode=detail&id='.$unClient->getIdClient().'"> <button>Détail</button></a>
   <a href="PHP/VIEW/FormClient.php?mode=modif&id='.$unClient->getIdClient().'"> <button>Modifier</button></a>
   <a href="PHP/VIEW/FormClient.php?mode=suppression&id='.$unClient->getIdClient().'"> <button>Supprimer</button></a>
   </div></div>';
}

echo '</div>';