DROP DATABASE baseproduits;
CREATE DATABASE IF NOT EXISTS baseproduits ;
USE baseproduits;


DROP TABLE IF EXISTS produits;
CREATE TABLE IF NOT EXISTS produits (
  idProduit int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  libelleProduit varchar(50) NOT NULL,
  prix int(11) NOT NULL,
  dateDePeremption date NOT NULL
) ENGINE=InnoDB ;

--
-- Chargement des données de la table produits
--

INSERT INTO produits (idProduit, libelleProduit, prix, dateDePeremption) VALUES(1, 'gomme', 2, '2020-11-30');
INSERT INTO produits (idProduit, libelleProduit, prix, dateDePeremption) VALUES(2, 'crayon', 1, '2020-11-30');


DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `NomClient` varchar(50) NOT NULL,
  `PrenomClient` varchar(50) NOT NULL,
  `Adresse` varchar(250) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
