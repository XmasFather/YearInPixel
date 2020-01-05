-- MySQL Script generated by MySQL Workbench
-- Fri Jan  3 13:45:42 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mwe20_qmarolle_yip
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mwe20_qmarolle_yip
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mwe20_qmarolle_yip` DEFAULT CHARACTER SET utf8mb4 ;
USE `mwe20_qmarolle_yip` ;

-- -----------------------------------------------------
-- Table `mwe20_qmarolle_yip`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mwe20_qmarolle_yip`.`utilisateur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(250) NOT NULL,
  `pseudo` VARCHAR(45) NOT NULL,
  `motdepasse` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mwe20_qmarolle_yip`.`humeur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mwe20_qmarolle_yip`.`humeur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `couleur` VARCHAR(6) NOT NULL,
  `intitule` VARCHAR(45) NOT NULL,
  `utilisateur_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_humeur_utilisateur1_idx` (`utilisateur_id` ASC) VISIBLE,
  CONSTRAINT `fk_humeur_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `mwe20_qmarolle_yip`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mwe20_qmarolle_yip`.`pixel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mwe20_qmarolle_yip`.`pixel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `jour` DATE NOT NULL,
  `utilisateur_id` INT NOT NULL,
  `humeur_id` INT NOT NULL,
  `symbole` VARCHAR(4) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pixel_utilisateur_idx` (`utilisateur_id` ASC) VISIBLE,
  INDEX `fk_pixel_humeur1_idx` (`humeur_id` ASC) VISIBLE,
  CONSTRAINT `fk_pixel_utilisateur`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `mwe20_qmarolle_yip`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pixel_humeur1`
    FOREIGN KEY (`humeur_id`)
    REFERENCES `mwe20_qmarolle_yip`.`humeur` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;