-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Agendamentos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Agendamentos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Agendamentos` DEFAULT CHARACTER SET utf8 ;
USE `Agendamentos` ;

-- -----------------------------------------------------
-- Table `Agendamentos`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agendamentos`.`administrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `nome_administrador` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `login` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `senha` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`id_administrador`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
PACK_KEYS = DEFAULT
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `Agendamentos`.`Agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agendamentos`.`Agendamento` (
  `idAgendamento` INT NOT NULL AUTO_INCREMENT,
  `DataAgentamento` DATETIME NOT NULL,
  `status_agendamento` ENUM('espera', 'confirmado', 'desmarcado') NOT NULL DEFAULT 'espera',
  `imagem` LONGBLOB NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `time` DATETIME NOT NULL,
  PRIMARY KEY (`idAgendamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Agendamentos`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agendamentos`.`Cliente` (
  `id_Cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `login_cliente` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `Agendamento_idAgendamento` INT NOT NULL,
  `administrador_id_administrador` INT NOT NULL,
  `numero_cliente` VARCHAR(16) NULL,
  PRIMARY KEY (`id_Cliente`),
  UNIQUE INDEX `login_cliente_UNIQUE` (`login_cliente` ASC),
  INDEX `fk_Cliente_Agendamento_idx` (`Agendamento_idAgendamento` ASC),
  INDEX `fk_Cliente_administrador1_idx` (`administrador_id_administrador` ASC),
  CONSTRAINT `fk_Cliente_Agendamento`
    FOREIGN KEY (`Agendamento_idAgendamento`)
    REFERENCES `Agendamentos`.`Agendamento` (`idAgendamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_administrador1`
    FOREIGN KEY (`administrador_id_administrador`)
    REFERENCES `Agendamentos`.`administrador` (`id_administrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
