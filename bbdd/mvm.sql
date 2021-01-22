
-- -----------------------------------------------------
-- Schema mvm
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mvm` ;

-- -----------------------------------------------------
-- Schema mvm
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mvm` DEFAULT CHARACTER SET utf8 ;
USE `mvm` ;

-- -----------------------------------------------------
-- Table `mvm`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvm`.`roles` ;

CREATE TABLE IF NOT EXISTS `mvm`.`roles` (
  `idrol` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvm`.`register`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvm`.`register` ;

CREATE TABLE IF NOT EXISTS `mvm`.`register` (
  `idrol` INT NOT NULL,
  `user` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(45) NULL,
  `observations` VARCHAR(255) NULL,
  PRIMARY KEY (`idrol`, `user`),
  CONSTRAINT `idrol`
    FOREIGN KEY (`idrol`)
    REFERENCES `mvm`.`roles` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO roles (description) Values ('Alumne');
INSERT INTO roles (description) Values ('Empresa');
INSERT INTO roles (description) Values ('Ex alumne');
