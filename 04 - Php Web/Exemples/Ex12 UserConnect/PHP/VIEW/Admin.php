<?php
//on vérifie qu"'il s'agit bien d'un administrateur et pas d'une surcharge URL

if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']->getRole() == 1)
{
    echo '<h1>Je suis administrateur</h1>';
}
else
{
    header("url=index.php?codePage=accueil");
}