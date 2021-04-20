
CREATE DATABASE IF NOT EXISTS `multilingue` ;
USE `multilingue`;

DROP TABLE IF EXISTS `texte`;
CREATE TABLE IF NOT EXISTS `texte` (
  `idTexte` int(11) NOT NULL AUTO_INCREMENT,
  `codeTexte` varchar(20) NOT NULL,
  `codeLangue` varchar(2) NOT NULL,
  `Texte` varchar(200) NOT NULL,
  PRIMARY KEY (`idTexte`),
  KEY `Code Texte` (`codeTexte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `texte`
--

INSERT INTO `texte` (`idTexte`, `codeTexte`, `codeLangue`, `Texte`) VALUES
(null, 'Accueil', 'FR', 'Accueil'),
(null, 'titrePage', 'FR', 'Gestion des articles'),
(null, 'accueil', 'EN', 'Home'),
(null, 'titrePage', 'EN', 'Article Management'),
(null, 'Afficher', 'EN', 'Display'),
(null, 'Modifier', 'EN', 'Update'),
(null, 'Supprimer', 'EN', 'Remove'),
(null, 'Afficher', 'FR', 'Afficher'),
(null, 'Modifier', 'FR', 'Modifier'),
(null, 'Supprimer', 'FR', 'Supprimer'),
(null, 'art1', 'FR', 'c\'est un article '),
(null, 'art1', 'EN', 'this is an article');