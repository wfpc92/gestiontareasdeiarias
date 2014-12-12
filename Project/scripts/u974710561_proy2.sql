-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema u974710561_proy2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema u974710561_proy2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u974710561_proy2` DEFAULT CHARACTER SET latin1 ;
USE `u974710561_proy2` ;

-- -----------------------------------------------------
-- Table `u974710561_proy2`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`usuario` (
  `id_usuario` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(100) NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `contrasena` VARCHAR(50) NOT NULL,
  `nivel_admin` TINYINT(1) UNSIGNED NOT NULL COMMENT '0:usuario,1:admin',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `CORREO_UNIQUE` (`correo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`categoria` (
  `id_categoria` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(100) NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `id_usuario` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_categoria`),
  INDEX `fk_categoria_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_categoria_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `u974710561_proy2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`actividad` (
  `id_actividad` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_actividad` VARCHAR(100) NOT NULL,
  `id_categoria` INT(10) UNSIGNED NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_actividad`),
  INDEX `fk_actividad_categoria1_idx` (`id_categoria` ASC),
  CONSTRAINT `fk_actividad_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `u974710561_proy2`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`tipo_tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`tipo_tarea` (
  `id_tipo_tarea` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `id_usuario` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_tipo_tarea`),
  UNIQUE INDEX `NOMBRE_UNIQUE` (`nombre` ASC),
  INDEX `fk_tipo_tarea_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_tipo_tarea_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `u974710561_proy2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`tarea` (
  `id_tarea` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tarea` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(255) NULL DEFAULT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `fecha_inicio` TIMESTAMP NOT NULL DEFAULT '2000-01-01',
  `prioridad` VARCHAR(10) NOT NULL DEFAULT 'MEDIA',
  `estado` VARCHAR(10) NOT NULL DEFAULT 'NUEVA',
  `inamovible` VARCHAR(10) NOT NULL DEFAULT 'SI',
  `diaria` VARCHAR(2) NOT NULL DEFAULT 'NO',
  `id_actividad` INT(10) UNSIGNED NULL DEFAULT NULL,
  `id_usuario` INT(10) UNSIGNED NULL DEFAULT NULL,
  `id_tipo_tarea` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_tarea`),
  INDEX `fk_tarea_actividad1_idx` (`id_actividad` ASC),
  INDEX `fk_tarea_usuario1_idx` (`id_usuario` ASC),
  INDEX `fk_TAREA_TIPO_TAREA1_idx` (`id_tipo_tarea` ASC),
  CONSTRAINT `fk_TAREA_TIPO_TAREA1`
    FOREIGN KEY (`id_tipo_tarea`)
    REFERENCES `u974710561_proy2`.`tipo_tarea` (`id_tipo_tarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_actividad1`
    FOREIGN KEY (`id_actividad`)
    REFERENCES `u974710561_proy2`.`actividad` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `u974710561_proy2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`registro_tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`registro_tarea` (
  `id_registro_tarea` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tarea` INT(10) UNSIGNED NOT NULL,
  `fecha_inicio` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `duracion` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_registro_tarea`),
  INDEX `fk_registro_tarea_tarea` (`id_tarea` ASC),
  CONSTRAINT `fk_registro_tarea_tarea`
    FOREIGN KEY (`id_tarea`)
    REFERENCES `u974710561_proy2`.`tarea` (`id_tarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `u974710561_proy2`.`productividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u974710561_proy2`.`productividad` (
  `id_productividad` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_productividad` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productividad` VARCHAR(10) NOT NULL DEFAULT 'MEDIA',
  `id_usuario` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_productividad`),
  INDEX `fk_productividad_usuario1_idx` (`id_usuario` ASC),
  UNIQUE INDEX `fecha_productividad_UNIQUE` (`fecha_productividad` ASC),
  CONSTRAINT `fk_productividad_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `u974710561_proy2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

