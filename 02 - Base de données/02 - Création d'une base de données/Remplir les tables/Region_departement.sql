CREATE DATABASE region_departement;

USE region_departement;

CREATE TABLE `region_departement`.`regions` (
    `idRegion` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `libelleRegion` VARCHAR(50) NOT NULL,
    `numeroRegion` INT NOT NULL,
    `nombreDepartement` INT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `region_departement`.`departements` (
    `idDepartement` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `numeroDepartement` VARCHAR(3) NOT NULL,
    `libelleDepartement` VARCHAR(50) NOT NULL,
    `idRegion` INT NULL
) ENGINE = InnoDB;

ALTER TABLE
    `departements`
ADD CONSTRAINT `FK_Departement_region` 
    FOREIGN KEY (`idRegion`) REFERENCES `regions`(`idRegion`);