
CREATE DATABASE IF NOT EXISTS `userconnect` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `userconnect`;

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 Admin 2 User',
  `pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `motDePasse`, `adresseMail`, `role`, `pseudo`) VALUES
(2, 'sd', 'sd', '6226f7cbe59e99a90b5cef6f94f966fd', 'sd', 1, 'sd'),
(5, 'qs', 'qs', '304854e2e79de0f96dc5477fef38a18f', 'qs', 1, 'qs'),
(6, 'tr', 'rt', '822050d9ae3c47f54bee71b85fce1487', 'rt', 1, 'rt');
