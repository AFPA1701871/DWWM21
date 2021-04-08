<?php
echo '<section class="colonne">';
$agenceEnCours = $listeEmployes[0]->getAgence()->getNom();
echo '<div class="agence">';
echo '<div>'.$agenceEnCours.'</div>';
for ($i=0; $i < count($listeEmployes); $i++) { 
    if ($listeEmployes[$i]->getAgence()->getNom()!=$agenceEnCours)
    {
        echo '</div><div class="agence">';//on change d'agence
        $agenceEnCours = $listeEmployes[$i]->getAgence()->getNom();
        echo '<div>'.$agenceEnCours.'</div>';
    }
    echo '<a href="index.php?page=detail&id='.$i.'"><div>'.$listeEmployes[$i]->getNom().' '.$listeEmployes[$i]->getPrenom().'</div></a>';
}
echo '</div>'; // fermeture div agence
echo '</section>';