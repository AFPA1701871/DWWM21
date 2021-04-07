<?php

include "head.php";
include "header.php";
include "listePersonne.php";

echo '<div class="ligne">';
$compteur = 0;
for ($i=0;$i<count($personnes);$i++) // parcourir tous les noms
{
    echo '  <div class="personne colonne">
    <a href="detail.php?id='.$personnes[$i]->getIdPersonne().'">
    <div class="cache">'.$personnes[$i]->getIdPersonne().'</div>
        <div class="nom"> '.$personnes[$i]->getNom().' '.$personnes[$i]->getPrenom().'</div></a>
        </div>';
    $compteur++;
    if ($compteur ==4)      // permet de gérer la présentation Toutes les 4 personnes, on passe à la ligne
    {
        echo '</div>';
        echo '<div class="ligne">';
        $compteur=0;
    }
}
echo '</div>';

