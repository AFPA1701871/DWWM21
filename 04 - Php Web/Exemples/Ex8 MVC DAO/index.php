<?php

include "PHP/VIEW/Head.php";
include "PHP/VIEW/Header.php";

$liste = ProduitsManager::getList();
var_dump($liste);