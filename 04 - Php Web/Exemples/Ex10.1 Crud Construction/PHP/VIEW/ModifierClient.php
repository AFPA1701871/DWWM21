<?php

include 'Head.php';

var_dump($_POST);
$cl = new Clients($_POST);
var_dump($cl);
ClientsManager::update($cl);
header("location:../../index.php");