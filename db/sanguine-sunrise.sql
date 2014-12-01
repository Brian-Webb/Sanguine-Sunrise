SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `exponent_sanguine-sunrise`.`battlenet_Character_Classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exponent_sanguine-sunrise`.`battlenet_Character_Classes` ;

CREATE TABLE IF NOT EXISTS `exponent_sanguine-sunrise`.`battlenet_Character_Classes` (
  `id` INT UNSIGNED NOT NULL,
  `mask` INT UNSIGNED NOT NULL,
  `powerType` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exponent_sanguine-sunrise`.`battlenet_Character_Races`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exponent_sanguine-sunrise`.`battlenet_Character_Races` ;

CREATE TABLE IF NOT EXISTS `exponent_sanguine-sunrise`.`battlenet_Character_Races` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mask` INT UNSIGNED NOT NULL,
  `side` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exponent_sanguine-sunrise`.`battlenet_Character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exponent_sanguine-sunrise`.`battlenet_Character` ;

CREATE TABLE IF NOT EXISTS `exponent_sanguine-sunrise`.`battlenet_Character` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `level` INT UNSIGNED NOT NULL,
  `thumbnail` VARCHAR(255) NOT NULL,
  `class` INT UNSIGNED NOT NULL,
  `race` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `bc_class_idx` (`class` ASC),
  INDEX `bc_race_idx` (`race` ASC),
  CONSTRAINT `bc_class`
    FOREIGN KEY (`class`)
    REFERENCES `exponent_sanguine-sunrise`.`battlenet_Character_Classes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `bc_race`
    FOREIGN KEY (`race`)
    REFERENCES `exponent_sanguine-sunrise`.`battlenet_Character_Races` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exponent_sanguine-sunrise`.`battlenet_Guild`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exponent_sanguine-sunrise`.`battlenet_Guild` ;

CREATE TABLE IF NOT EXISTS `exponent_sanguine-sunrise`.`battlenet_Guild` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `level` INT UNSIGNED NOT NULL,
  `side` INT UNSIGNED NOT NULL,
  `achievementPoints` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
