
CREATE TABLE `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nomClient` varchar(30) CHARACTER SET latin1 NOT NULL,
  `prenomClient` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresseClient` varchar(255) CHARACTER SET latin1 NOT NULL,
  `villeClient` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `clients` (`idClient`, `nomClient`, `prenomClient`, `adresseClient`, `villeClient`) VALUES
(1, 'truc', 'toto', 'ici', 'ville_la'),
(2, 'machin', 'titi', 'rue de titi', 'villi');
