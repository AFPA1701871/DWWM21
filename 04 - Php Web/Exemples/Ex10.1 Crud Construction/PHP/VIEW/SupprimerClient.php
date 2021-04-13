<?php

include 'Head.php';

var_dump($_POST);
$cl = new Clients($_POST);
var_dump($cl);
ClientsManager::delete($cl);
header("location:../../index.php");