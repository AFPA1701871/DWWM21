<?php

if (isset($_SESSION['utilisateur']))
{
    if ($_SESSION['utilisateur']->getRole() == 1)
    {

        $classeCouleur = "blue"; // l'admin voir les boutons bleu
    }
    else
    {
        $classeCouleur = "green"; //les utilisateurs Vert
    }

    echo '<nav>
    <button class="crudBtn crudBtnRetour ' . $classeCouleur . '"><a href="index.php?codePage=listeProduit">Produits</a></button>
    <button class="crudBtn crudBtnRetour ' . $classeCouleur . '"><a href="index.php?codePage=listeCategorie">Categories</a></button>
        </nav>';
}
