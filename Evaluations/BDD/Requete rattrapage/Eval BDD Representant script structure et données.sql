
--
-- Base de données :  `GestionRepresentant`
--
DROP DATABASE IF EXISTS `GestionRepresentant`;
CREATE DATABASE IF NOT EXISTS `GestionRepresentant` DEFAULT CHARACTER SET utf8 ;
USE `GestionRepresentant`;
-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `NomClient` varchar(25) DEFAULT NULL,
  `VilleClient` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `IdProduit` int(11) NOT NULL AUTO_INCREMENT,
  `NomProduit` varchar(25) DEFAULT NULL,
  `CouleurProduit` varchar(25) DEFAULT NULL,
  `PoidsProduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdProduit`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `representants`
--

DROP TABLE IF EXISTS `representants`;
CREATE TABLE IF NOT EXISTS `representants` (
  `IdRepres` int(11) NOT NULL AUTO_INCREMENT,
  `NomRepres` varchar(25) DEFAULT NULL,
  `VilleRepres` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdRepres`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `IdVente` int(11) NOT NULL AUTO_INCREMENT,
  `IdRepres` int(11) DEFAULT NULL,
  `IdProduit` int(11) DEFAULT NULL,
  `IdClient` int(11) DEFAULT NULL,
  `Quantité` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdVente`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
COMMIT;

ALTER TABLE `ventes` ADD FOREIGN KEY (`IdClient`) REFERENCES `clients`(`IdClient`); 
ALTER TABLE `ventes` ADD FOREIGN KEY (`IdProduit`) REFERENCES `produits`(`IdProduit`); 
ALTER TABLE `ventes` ADD FOREIGN KEY (`IdRepres`) REFERENCES `representants`(`IdRepres`);





INSERT INTO REPRESENTANTS (IdRepres, NomRepres, VilleRepres) VALUES (1, 'Stephane', 'Lyon');
INSERT INTO REPRESENTANTS (IdRepres, NomRepres, VilleRepres) VALUES (2, 'Benjamin', 'Paris');
INSERT INTO REPRESENTANTS (IdRepres, NomRepres, VilleRepres) VALUES (3, 'Leonard', 'Lyon');
INSERT INTO REPRESENTANTS (IdRepres, NomRepres, VilleRepres) VALUES (4, 'Antoine', 'Brest');
INSERT INTO REPRESENTANTS (IdRepres, NomRepres, VilleRepres) VALUES (5, 'Bruno', 'Bayonne');

INSERT INTO PRODUITS (IdProduit, NomProduit, CouleurProduit, PoidsProduit) VALUES (1, 'Aspirateur', 'Rouge', 3546);
INSERT INTO PRODUITS (IdProduit, NomProduit, CouleurProduit, PoidsProduit) VALUES (2, 'Trottinette', 'Bleu', 1423);
INSERT INTO PRODUITS (IdProduit, NomProduit, CouleurProduit, PoidsProduit) VALUES (3, 'Chaise', 'Blanc', 3827);
INSERT INTO PRODUITS (IdProduit, NomProduit, CouleurProduit, PoidsProduit) VALUES (4, 'Tapis', 'Rouge', 1423);

INSERT INTO CLIENTS (IdClient, NomClient, VilleClient) VALUES (1, 'Alice', 'Lyon');
INSERT INTO CLIENTS (IdClient, NomClient, VilleClient) VALUES (2, 'Bruno', 'Lyon');
INSERT INTO CLIENTS (IdClient, NomClient, VilleClient) VALUES (3, 'Charles', 'Compiègne');
INSERT INTO CLIENTS (IdClient, NomClient, VilleClient) VALUES (4, 'Denis', 'Montpellier');
INSERT INTO CLIENTS (IdClient, NomClient, VilleClient) VALUES (5, 'Emile', 'Strasbourg');

INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(1,1,	1,	1,	1);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(2,1,	1,	2,	1);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(3,2,	2,	3,	1);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(4,4,	3,	3,	200);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(5,3,	4,	2,	190);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(6,1,	3,	2,	300);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(7,3,	1,	2,	120);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(8,3,	1,	4,	120);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(9,3,	4,	4,	2);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(10,3,	1,	1,	3);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(11,3,	4,	1,	5);
INSERT	INTO	VENTES	(IdVente, IdRepres,	IdProduit,	IdClient,	Quantité)	VALUES	(12,3,	1,	3,	1);