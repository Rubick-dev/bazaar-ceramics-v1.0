SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bazaarceramics_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bazaarceramics_db` ;
CREATE SCHEMA IF NOT EXISTS `bazaarceramics_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bazaarceramics_db` ;

-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`GlazeType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`GlazeType` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`GlazeType` (
  `ProductGlazeTypeCode` CHAR(3) NOT NULL,
  `ProductGlazeType` CHAR(30) NOT NULL,
  PRIMARY KEY (`ProductGlazeTypeCode`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`Product` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`Product` (
  `ProductID` CHAR(10) NOT NULL,
  `ProductGlazeTypeCode` CHAR(3) NOT NULL,
  `ProductTitle` CHAR(30) NOT NULL,
  `ProductDescription` VARCHAR(150) NOT NULL,
  `ProductPrice` DECIMAL(5,2) NOT NULL DEFAULT 0.00,
  `ProductSize` CHAR(20) NOT NULL,
  PRIMARY KEY (`ProductID`, `ProductGlazeTypeCode`),
  INDEX `fk_Product_GlazeType1_idx` (`ProductGlazeTypeCode` ASC),
  CONSTRAINT `fk_Product_GlazeType1`
    FOREIGN KEY (`ProductGlazeTypeCode`)
    REFERENCES `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`Customer` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`Customer` (
  `CustomerID` INT(3) NOT NULL AUTO_INCREMENT,
  `CustomerGivenName` CHAR(30) NOT NULL,
  `CustomerLastName` CHAR(30) NOT NULL,
  `CustomerEmail` VARCHAR(80) NULL,
  `CustomerAddress` VARCHAR(50) NOT NULL,
  `CustomerSuburb` VARCHAR(45) NULL,
  `CustomerState` VARCHAR(5) NULL,
  `CustomerPostCode` VARCHAR(4) NULL,
  `CustomerCountry` VARCHAR(45) NULL,
  `CustomerPhoneNumber` CHAR(10) NOT NULL,
  `CustomerAccountFlag` TINYINT(1) NOT NULL DEFAULT False,
  PRIMARY KEY (`CustomerID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`Orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`Orders` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`Orders` (
  `OrderID` INT NOT NULL AUTO_INCREMENT,
  `CustomerID` INT(3) NOT NULL,
  `OrderDate` DATE NOT NULL,
  PRIMARY KEY (`OrderID`, `CustomerID`),
  CONSTRAINT `FK_OrderCustomer`
    FOREIGN KEY (`CustomerID`)
    REFERENCES `bazaarceramics_db`.`Customer` (`CustomerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`AccountCustomer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`AccountCustomer` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`AccountCustomer` (
  `AccountCustomerID` INT(3) NOT NULL,
  `AccountCustomerNumber` CHAR(10) NOT NULL,
  `AccountBusinessName` CHAR(30) NOT NULL,
  `AccountBusinessAddress` VARCHAR(50) NOT NULL,
  `AccountBusinessSuburb` VARCHAR(45) NOT NULL,
  `AccountBusinessState` VARCHAR(5) NOT NULL,
  `AccountBusinessPostCode` VARCHAR(45) NOT NULL,
  `AccountContactName` VARCHAR(60) NOT NULL,
  `AccountContactNumber` CHAR(10) NOT NULL,
  `AccountCustomerEmail` VARCHAR(80) NOT NULL,
  `AccountCustomerURL` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`AccountCustomerID`),
  CONSTRAINT `AccountFK`
    FOREIGN KEY (`AccountCustomerID`)
    REFERENCES `bazaarceramics_db`.`Customer` (`CustomerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`OrderLine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`OrderLine` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`OrderLine` (
  `OrderID` INT NOT NULL,
  `ProductID` CHAR(10) NOT NULL,
  `OrderQuantity` INT NULL,
  PRIMARY KEY (`OrderID`, `ProductID`),
  INDEX `FK_OrderProduct_idx` (`ProductID` ASC),
  CONSTRAINT `FK_OrderNumber`
    FOREIGN KEY (`OrderID`)
    REFERENCES `bazaarceramics_db`.`Orders` (`OrderID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_OrderProduct`
    FOREIGN KEY (`ProductID`)
    REFERENCES `bazaarceramics_db`.`Product` (`ProductID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bazaarceramics_db`.`Member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bazaarceramics_db`.`Member` ;

CREATE TABLE IF NOT EXISTS `bazaarceramics_db`.`Member` (
  `CustomerID` INT NOT NULL,
  `UserID` VARCHAR(45) NULL,
  `HashedPassword` VARCHAR(128) NULL,
  PRIMARY KEY (`CustomerID`),
  INDEX `User` (`UserID` ASC),
  CONSTRAINT `FK_CustomerID`
    FOREIGN KEY (`CustomerID`)
    REFERENCES `bazaarceramics_db`.`Customer` (`CustomerID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`GlazeType`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('CPR', 'Copper Red');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('CHN', 'Chun');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('HCA', 'High Calcium');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('BGC', 'Blue Green Crystalline');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('ISL', 'Iron stoneware and lustre');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('DMC', 'Dry Matt Calcium');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('SWR', 'Slip ware');
INSERT INTO `bazaarceramics_db`.`GlazeType` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES ('SCG', 'Slip and clear glaze');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`Product`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot020', 'CPR', 'Copper Red Dish 001', 'Shallow Copper Red dish form showing distinctive qualities of this traditional reduction fired glaze.  Fired to 1300 degrees', 450.00, '50cm diameter');
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot030', 'CPR', 'Copper Red Vase 002', 'Tall Slim Copper Red vase form showing distinctive qualities of this traditional reduction fired glaze. Fired to 1300 degrees.', 870.00, '40cm tall');
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot060', 'HCA', 'Cyan Dish 004', 'Shallow High Calcium Cyan dish showing a distinctive burnt copper rim. Fired to 1400 degrees.', 950.00, '55cm diameter');
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot080', 'HCA', 'Light Blue Cup Set 003', 'Cup and Saucer set in Light Blue with white trim and a distinctive yellow wheat motif.', 106.00, '30cm diameter');
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot090', 'HCA', 'Tungsten Blue Dish 006', 'Deep Tungsten Blue dish form showing distinctive qualities of modern firing techniques. Fired to 1650 degrees.', 399.00, '45cm diameter');
INSERT INTO `bazaarceramics_db`.`Product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES ('bcpot120', 'ISL', 'Earthen Vase 005', 'Tall Wide Earthen Ware Vase form showing traditional glazing techniques.', 999.00, '49cm tall');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`Customer`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`Customer` (`CustomerID`, `CustomerGivenName`, `CustomerLastName`, `CustomerEmail`, `CustomerAddress`, `CustomerSuburb`, `CustomerState`, `CustomerPostCode`, `CustomerCountry`, `CustomerPhoneNumber`, `CustomerAccountFlag`) VALUES (001, 'Charlie', 'Sheena', 'csheena@gmail.com', '56 This St ', 'Someplace', 'Vic', '3345', 'Australia', '0349745458', False);
INSERT INTO `bazaarceramics_db`.`Customer` (`CustomerID`, `CustomerGivenName`, `CustomerLastName`, `CustomerEmail`, `CustomerAddress`, `CustomerSuburb`, `CustomerState`, `CustomerPostCode`, `CustomerCountry`, `CustomerPhoneNumber`, `CustomerAccountFlag`) VALUES (NULL, 'Susan', 'Dey', 'onemoredey@hotmail.com', '21 Today St', 'Right Nowville', 'NSW', '2121', 'Australia', '0295723146', False);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`Orders`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`Orders` (`OrderID`, `CustomerID`, `OrderDate`) VALUES (100, 2, '2016-09-10');
INSERT INTO `bazaarceramics_db`.`Orders` (`OrderID`, `CustomerID`, `OrderDate`) VALUES (NULL, 1, '2016-05-31');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`AccountCustomer`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`AccountCustomer` (`AccountCustomerID`, `AccountCustomerNumber`, `AccountBusinessName`, `AccountBusinessAddress`, `AccountBusinessSuburb`, `AccountBusinessState`, `AccountBusinessPostCode`, `AccountContactName`, `AccountContactNumber`, `AccountCustomerEmail`, `AccountCustomerURL`) VALUES (2, '102042', 'A Brand New Dey', '16 That St', 'Laterville', 'NSW', '2121', 'Roger Moore', '0295723641', 'sales@brandnewdey.com.au', 'www.brandnewday.com.au');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bazaarceramics_db`.`OrderLine`
-- -----------------------------------------------------
START TRANSACTION;
USE `bazaarceramics_db`;
INSERT INTO `bazaarceramics_db`.`OrderLine` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES (100, 'bcpot020', 5);
INSERT INTO `bazaarceramics_db`.`OrderLine` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES (100, 'bcpot120', 1);
INSERT INTO `bazaarceramics_db`.`OrderLine` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES (101, 'bcpot020', 10);
INSERT INTO `bazaarceramics_db`.`OrderLine` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES (101, 'bcpot030', 3);
INSERT INTO `bazaarceramics_db`.`OrderLine` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES (101, 'bcpot060', 2);

COMMIT;

