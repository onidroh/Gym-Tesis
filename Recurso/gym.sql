/*
 * FOS^2.
 * Oscar Escobar Moraga
 */ 
 
CREATE DATABASE IF NOT EXISTS 'Gym';
-- -----------------------------------------------------
-- Schema Gym
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Gym` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
-- -----------------------------------------------------
-- Schema gym_db
-- -----------------------------------------------------
USE `Gym` ;

-- -----------------------------------------------------
-- Table `Gym`.`Estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Estado` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `NomEstado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Rol` (
  `idRol` INT NOT NULL AUTO_INCREMENT,
  `nomRol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `rutUsuario` VARCHAR(9) NOT NULL,
  `nomUsuario` VARCHAR(45) NOT NULL,
  `passUsuario` VARCHAR(60) NOT NULL,
  `mailUsuario` VARCHAR(45) NULL,
  `fonoUsuario` VARCHAR(10) NULL,
  `Estado_idEstado` INT NOT NULL,
  `Rol_idRol` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `rutUsuario_UNIQUE` (`rutUsuario` ASC) VISIBLE,
  INDEX `fk_Usuario_Estado1_idx` (`Estado_idEstado` ASC) VISIBLE,
  INDEX `fk_Usuario_Rol1_idx` (`Rol_idRol` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `Gym`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Rol1`
    FOREIGN KEY (`Rol_idRol`)
    REFERENCES `Gym`.`Rol` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Hora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Hora` (
  `idHora` INT NOT NULL AUTO_INCREMENT,
  `hora_iniHora` TIME NULL,
  `hora_finHora` TIME NULL,
  `diaHora` VARCHAR(10) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idHora`),
  INDEX `fk_Hora_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Hora_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `Gym`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Sala` (
  `idSala` INT NOT NULL AUTO_INCREMENT,
  `nomSala` VARCHAR(45) NOT NULL,
  `capSala` INT NULL,
  PRIMARY KEY (`idSala`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Clase` (
  `idClase` INT NOT NULL AUTO_INCREMENT,
  `fechaClase` DATE NOT NULL,
  `Sala_idSala` INT NOT NULL,
  `Hora_idHora` INT NOT NULL,
  PRIMARY KEY (`idClase`),
  INDEX `fk_Clase_Sala_idx` (`Sala_idSala` ASC) VISIBLE,
  INDEX `fk_Clase_Hora1_idx` (`Hora_idHora` ASC) VISIBLE,
  CONSTRAINT `fk_Clase_Sala`
    FOREIGN KEY (`Sala_idSala`)
    REFERENCES `Gym`.`Sala` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Hora1`
    FOREIGN KEY (`Hora_idHora`)
    REFERENCES `Gym`.`Hora` (`idHora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Reserva` (
  `idReserva` INT NOT NULL AUTO_INCREMENT,
  `fechaReserva` DATE NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  `Clase_idClase` INT NOT NULL,
  PRIMARY KEY (`idReserva`),
  INDEX `fk_Reserva_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  INDEX `fk_Reserva_Clase1_idx` (`Clase_idClase` ASC) VISIBLE,
  CONSTRAINT `fk_Reserva_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `Gym`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Clase1`
    FOREIGN KEY (`Clase_idClase`)
    REFERENCES `Gym`.`Clase` (`idClase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gym`.`Mantencion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gym`.`Mantencion` (
  `Sala_idSala` INT NOT NULL,
  `Estado_idEstado` INT NOT NULL,
  `fechaMantencion` VARCHAR(45) NULL,
  `descMantencion` TEXT(1) NULL,
  PRIMARY KEY (`Sala_idSala`, `Estado_idEstado`),
  INDEX `fk_Sala_has_Estado_Estado1_idx` (`Estado_idEstado` ASC) VISIBLE,
  INDEX `fk_Sala_has_Estado_Sala1_idx` (`Sala_idSala` ASC) VISIBLE,
  CONSTRAINT `fk_Sala_has_Estado_Sala1`
    FOREIGN KEY (`Sala_idSala`)
    REFERENCES `Gym`.`Sala` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sala_has_Estado_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `Gym`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;