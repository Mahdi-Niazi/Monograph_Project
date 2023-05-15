SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
CREATE SCHEMA IF NOT EXISTS `awcci_members` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;
USE `awcci_members` ;

-- -----------------------------------------------------
-- Table `awcci_members`.`event_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`event_types` (
  `Event_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NOT NULL ,
  PRIMARY KEY (`Event_type_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`membership_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`membership_types` (
  `membership_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NOT NULL ,
  PRIMARY KEY (`membership_type_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`events` (
  `Event_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `membership_type_id` INT(11) NULL DEFAULT NULL ,
  `membership_id` INT(11) NULL DEFAULT NULL ,
  `Event_Name` VARCHAR(128) NOT NULL ,
  `Event_Description` TEXT NULL DEFAULT NULL ,
  `Event_Date` DATE NOT NULL ,
  `Event_Venue` VARCHAR(128) NOT NULL ,
  `Event_Organizer` VARCHAR(64) NULL DEFAULT NULL ,
  `Event_Partner` VARCHAR(64) NULL DEFAULT NULL ,
  `Event_Photo` VARCHAR(128) NULL DEFAULT NULL ,
  `Event_Coordinator_Name` VARCHAR(128) NULL DEFAULT NULL ,
  `Event_Coordinator_Phone` VARCHAR(128) NULL DEFAULT NULL ,
  `Event_Coordinator_Email` VARCHAR(128) NOT NULL ,
  `Event_type_id` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`Event_id`) ,
  INDEX `event_fk` (`Event_type_id` ASC) ,
  INDEX `member_type_fk` (`membership_type_id` ASC) ,
  CONSTRAINT `event_fk`
    FOREIGN KEY (`Event_type_id` )
    REFERENCES `awcci_members`.`event_types` (`Event_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `member_type_fk`
    FOREIGN KEY (`membership_type_id` )
    REFERENCES `awcci_members`.`membership_types` (`membership_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`member_infos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`member_infos` (
  `member_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Firstname` VARCHAR(32) NOT NULL ,
  `Lastname` VARCHAR(32) NOT NULL ,
  `Email` VARCHAR(128) NULL DEFAULT NULL ,
  `Phone_number` CHAR(10) NOT NULL ,
  `Gender` TINYINT(1) NOT NULL ,
  `Dob` DATE NOT NULL ,
  `Address_Country` VARCHAR(128) NULL DEFAULT NULL ,
  `Address_City` VARCHAR(128) NULL DEFAULT NULL ,
  `Address_District` VARCHAR(128) NULL DEFAULT NULL ,
  `Address_Street` VARCHAR(128) NULL DEFAULT NULL ,
  `photo` VARCHAR(128) NULL DEFAULT NULL ,
  `Nic` VARCHAR(64) NOT NULL ,
  `Nic_photo` VARCHAR(128) NULL DEFAULT NULL ,
  `Education_level` VARCHAR(128) NOT NULL ,
  `Education_field` VARCHAR(128) NULL DEFAULT NULL ,
  `Extra_Training` VARCHAR(128) NULL DEFAULT NULL ,
  `m_Language` VARCHAR(64) NOT NULL ,
  `Nationality` VARCHAR(128) NOT NULL ,
  `Other_nationality` VARCHAR(128) NULL DEFAULT NULL ,
  `POSITION` VARCHAR(64) NOT NULL ,
  `updated_at` TIMESTAMP NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`member_id`) ,
  UNIQUE INDEX `Nic` (`Nic` ASC) ,
  UNIQUE INDEX `Email` (`Email` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`member_companies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`member_companies` (
  `Business_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `member_id` INT(11) NOT NULL DEFAULT '1' ,
  `Business_Name` VARCHAR(128) NOT NULL ,
  `Business_Email` VARCHAR(160) NOT NULL ,
  `Business_Phone_Number` CHAR(10) NULL DEFAULT NULL ,
  `Business_Website` VARCHAR(128) NULL DEFAULT NULL ,
  `Business_sector` VARCHAR(128) NULL DEFAULT NULL ,
  `Business_Starting_date` DATE NULL DEFAULT NULL ,
  `Business_Starting_Capital` INT(11) NULL DEFAULT NULL ,
  `Business_Capital_Currency` VARCHAR(64) NULL DEFAULT NULL ,
  `Business_Annual_Revenue` INT(11) NULL DEFAULT NULL ,
  `Business_Annual_Currency` VARCHAR(64) NULL DEFAULT NULL ,
  `Business_Employee_Male` INT(11) NULL DEFAULT NULL ,
  `Business_Employee_Female` INT(11) NULL DEFAULT NULL ,
  `Business_Membership` VARCHAR(255) NULL DEFAULT NULL ,
  `Business_Investment` VARCHAR(128) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`Business_id`) ,
  INDEX `member_company_fk` (`member_id` ASC) ,
  INDEX `member_id_fk` (`member_id` ASC) ,
  CONSTRAINT `member_id_fk`
    FOREIGN KEY (`member_id` )
    REFERENCES `awcci_members`.`member_infos` (`member_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`memberships`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`memberships` (
  `membership_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `member_id` INT(11) NULL DEFAULT NULL ,
  `Membership_type_id` INT(11) NULL DEFAULT NULL ,
  `Business_id` INT(11) NULL DEFAULT NULL ,
  `Membership_Fee` INT(11) NOT NULL ,
  `Membership_fee_currency` VARCHAR(64) NOT NULL ,
  `Membership_Register_date` DATE NOT NULL ,
  `Membership_status` VARCHAR(255) NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `updated_at` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`membership_id`) ,
  INDEX `membership_fk` (`Membership_type_id` ASC) ,
  INDEX `Business_id_fk` (`Business_id` ASC) ,
  INDEX `member_id_fk` (`member_id` ASC) ,
  INDEX `member_info_fk` (`member_id` ASC) ,
  INDEX `membership_type_fk` (`Membership_type_id` ASC) ,
  INDEX `business_fk` (`Business_id` ASC) ,
  CONSTRAINT `member_info_fk`
    FOREIGN KEY (`member_id` )
    REFERENCES `awcci_members`.`member_infos` (`member_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `membership_type_fk`
    FOREIGN KEY (`Membership_type_id` )
    REFERENCES `awcci_members`.`membership_types` (`membership_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `business_fk`
    FOREIGN KEY (`Business_id` )
    REFERENCES `awcci_members`.`member_companies` (`Business_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `awcci_members`.`member_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`member_users` (
  `user_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `member_id` INT(11) NOT NULL ,
  `membership_id` INT(11) NOT NULL ,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `password` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `member_id_fk` (`member_id` ASC, `membership_id` ASC) ,
  INDEX `member_fk` (`member_id` ASC) ,
  INDEX `membership_id_fk` (`membership_id` ASC) ,
  CONSTRAINT `member_fk`
    FOREIGN KEY (`member_id` )
    REFERENCES `awcci_members`.`member_infos` (`member_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `membership_id_fk`
    FOREIGN KEY (`membership_id` )
    REFERENCES `awcci_members`.`memberships` (`membership_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `awcci_members`.`migrations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `migration` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `batch` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `awcci_members`.`news`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `awcci_members`.`news` (
  `News_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Event_id` INT(11) NULL DEFAULT NULL ,
  `News_title` TEXT NULL DEFAULT NULL ,
  `News_description` TEXT NULL DEFAULT NULL ,
  `News_date` DATE NULL DEFAULT NULL ,
  `News_photo` VARCHAR(128) NULL DEFAULT NULL ,
  `News_visit` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`News_id`) ,
  INDEX `news_fk` (`Event_id` ASC) ,
  INDEX `event_fk` (`Event_id` ASC) ,
  CONSTRAINT `event_fk`
    FOREIGN KEY (`Event_id` )
    REFERENCES `awcci_members`.`events` (`Event_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
