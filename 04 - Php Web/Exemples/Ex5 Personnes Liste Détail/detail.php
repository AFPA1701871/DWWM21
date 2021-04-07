<?php

include "head.php";
include "header.php";
include "listePersonne.php";

/* La variable $_GET contient les couples clé / valeur passés dans l'URL*/


/*  Dans le cas ou les id sont successifs dans le tableau*/
// $i=$_GET['id'];
// echo '<div class="ligne">';

//     echo '  <div class="personne colonne">
//         <div class="nom"> '.$personnes[$i]->getNom().' '.$personnes[$i]->getPrenom().'</div>
//         <div class="age">'.$personnes[$i]->getAge().'</div>
//         </div>';

// echo '</div>';
/*sinon*



/*  Dans le cas ou les id NE sont PAS successifs dans le tableau*/
$idRecherche = $_GET['id'];
foreach ($personnes as $unePersonne)
{
    if ($unePersonne->getIdPersonne() == $idRecherche)
    {
        echo '<div class="ligne">';

        echo '  <div class="personne colonne">
        <div class="nom"> ' . $unePersonne->getNom() . ' ' . $unePersonne->getPrenom() . '</div>
        <div class="age">' . $unePersonne->getAge() . '</div>
        </div>';

        echo '</div>';
    }
}


echo '<a href="page.php">Retour</a>';