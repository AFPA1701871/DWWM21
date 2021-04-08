<?php
$id = $_GET["id"];
echo '<div>'.$listeEmployes[$id]->toString().'</div>';
echo '<a href="index.php?page=liste">Retour<div>';