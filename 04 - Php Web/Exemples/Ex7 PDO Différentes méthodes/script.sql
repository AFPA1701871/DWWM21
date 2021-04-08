#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE IF EXISTS testConnect;

CREATE DATABASE IF NOT EXISTS testConnect;

USE testConnect;

#------------------------------------------------------------
# Table: Personnes
#------------------------------------------------------------
CREATE TABLE Personnes(
    idPersonne Int NOT NULL Auto_increment PRIMARY KEY,
    nom Varchar (200) NOT NULL,
    prenom Varchar (200) NOT NULL,
    age Int(12) NOT NULL
) ENGINE = InnoDB;

INSERT INTO `personnes` (`idPersonne`, `nom`, `prenom`, `age`) VALUES
(1, 'Test', 'toto', 25),
(2, 'Duval', 'titi', 32),
(3, 'Zoro', 'Inconnu', 45);