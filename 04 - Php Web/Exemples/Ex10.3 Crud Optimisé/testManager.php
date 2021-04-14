<?php

/* Test classe Client */
$c = new Clients(["nomClient"=>"Dupond","prenomClient"=>"toto","adresse"=>"test","ville"=>"testt"]);
// var_dump($c);
// echo $c->toString();



/* Test ClientsManager */
// ClientsManager::add($c);
 $c1=ClientsManager::findById(2);
// echo $c1->toString();

// // var_dump(ClientsManager::getListe());
// $c1->setNomClient("test");
// ClientsManager::update($c1);
// $c1=ClientsManager::findById(2);
// echo $c1->toString();

ClientsManager::delete($c1);
var_dump(ClientsManager::getList());