<?php
class ClientManager
{
    public static function add(Client $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO clients (idClient,nomClient,prenomClient,adresseClient,villeClient) VALUES (:idClient,:nomClient,:prenomClient,:adresseClient,:villeClient)");
        $q->bindValue(":idClient", $obj->getIdClient());
        $q->bindValue(":nomClient", $obj->getNomClient());
        $q->bindValue(":prenomClient", $obj->getPrenomClient());
        $q->bindValue(":adresseClient", $obj->getAdresseClient());
        $q->bindValue(":villeClient", $obj->getVilleClient());
        $q->execute();
    }

    public static function update(Client $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE clients SET  nomClient=:nomClient, prenomClient=:prenomClient, adresseClient=:adresseClient, villeClient=:villeClient WHERE idclient=:idClient");
        $q->bindValue(":idClient", $obj->getIdClient());
        $q->bindValue(":nomClient", $obj->getNomClient());
        $q->bindValue(":prenomClient", $obj->getPrenomClient());
        $q->bindValue(":adresseClient", $obj->getAdresseClient());
        $q->bindValue(":villeClient", $obj->getVilleClient());
        $q->execute();
    }

    public static function delete(Client $obj)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM clients WHERE idclient=" . $obj->getIdclient());
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM clients WHERE idclient=$id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false)
        {
            return new Client($results);
        }
        else
        {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $clients = [];
        $q = $db->query("SELECT * FROM clients");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $clients[] = new Client($donnees);
            }
        }
        return $clients;
    }

}
