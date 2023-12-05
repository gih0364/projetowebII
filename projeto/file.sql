-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema virtuallibary
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema virtuallibary
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `virtuallibary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `virtuallibary` ;

-- -----------------------------------------------------
-- Table `virtuallibary`.`registerbooks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`registerbooks` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(50) NOT NULL,
  `Gender` VARCHAR(20) NOT NULL,
  `Chapters` INT NULL DEFAULT NULL,
  `Author` VARCHAR(50) NOT NULL,
  `Description` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `virtuallibary`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`books` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(50) NOT NULL,
  `Gender` VARCHAR(20) NOT NULL,
  `Chapters` INT NOT NULL DEFAULT NULL,
  `Author` VARCHAR(50) NOT NULL,
  `Description` TEXT NOT NULL,
  `registerbooks_id` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_books_registerbooks1_idx` (`registerbooks_id` ASC) VISIBLE,
  CONSTRAINT `fk_books_registerbooks1`
    FOREIGN KEY (`registerbooks_id`)
    REFERENCES `virtuallibary`.`registerbooks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `virtuallibary`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`usuarios` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(40) NOT NULL,
  `password` CHAR(60) NOT NULL,
  `books_id` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_books1_idx` (`books_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_books1`
    FOREIGN KEY (`books_id`)
    REFERENCES `virtuallibary`.`books` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `virtuallibary`.`cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`cadastro` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(40) NOT NULL,
  `password` CHAR(60) NOT NULL,
  `usuarios_id` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cadastro_usuarios1_idx` (`usuarios_id` ASC) VISIBLE,
  CONSTRAINT `fk_cadastro_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `virtuallibary`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;