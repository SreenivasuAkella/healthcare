CREATE DATABASE /*IF NOT EXISTS*/`healthcare`;
USE `healthcare`;

CREATE TABLE `healthcare`.`paitent`(
  `userid`   VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL ,
  `phone` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(255) 
  );
CREATE TABLE `healthcare`.`doctor`(
  `userid`   VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL ,
  `phone` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(255) 
  );
CREATE TABLE `healthcare`.`docdoings`(
  `Username` VARCHAR(50) NOT NULL ,
  `Datapdf` MEDIUMBLOB NOT NULL ,
 `whenup` DATE DEFAULT CURRENT_TIMESTAMP,
  `priid` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(priid)
  );
CREATE TABLE `healthcare`.`addrequests`(
  `orgid` VARCHAR(50) NOT NULL ,
  `orgname` VARCHAR(50) NOT NULL ,
  `patientid` VARCHAR(50) NOT NULL ,
  `requestedon` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `data` MEDIUMBLOB NOT NULL 
);
CREATE TABLE `healthcare`.`patdoings`(
  `patpriid` INT(11) NOT NULL AUTO_INCREMENT,
  `patwhenup` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patdatapdf` MEDIUMBLOB NOT NULL,
  `patpdfname` VARBINARY  
  `patuserid` VARCHAR(50) NOT NULL,
  PRIMARY KEY(patpriid)
);
INSERT INTO `paitent`(`userid`,`username`, `phone`,`password`) VALUES
  ('SreenivasuAkella','Asreenivasu',  '9676180949', 'e5a55afa1a37d42a009ae2c26d3579c2');

INSERT INTO `doctor`(`userid`,`username`, `phone`,`password`) VALUES
  ('SreenivasuAkella','Asreenivasu',  '9676180949', 'e5a55afa1a37d42a009ae2c26d3579c2');