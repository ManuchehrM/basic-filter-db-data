/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.0.38-MariaDB : Database - dbfilter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbfilter` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbfilter`;

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `brand` */

insert  into `brand`(`id`,`brand`,`status`) values 
(1,'Lexus',1),
(2,'Toyota',1),
(3,'Mercedes',1),
(4,'BMW',1),
(5,'Ford',1),
(6,'Audi',1),
(7,'Nissan',1),
(8,'Hunday',1),
(9,'Opel',1),
(10,'Volkswagen',NULL);

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `engine_type_id` int(11) DEFAULT NULL,
  `drive_type_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `engine_type_id` (`engine_type_id`),
  KEY `car_ibfk_1` (`drive_type_id`),
  KEY `model_id` (`model_id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`drive_type_id`) REFERENCES `drive_type` (`id`),
  CONSTRAINT `car_ibfk_2` FOREIGN KEY (`engine_type_id`) REFERENCES `engine_type` (`id`),
  CONSTRAINT `car_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `car_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `car` */

insert  into `car`(`id`,`brand_id`,`model_id`,`engine_type_id`,`drive_type_id`,`status`) values 
(1,1,1,1,2,1),
(2,1,1,3,1,1),
(3,1,2,2,1,1),
(4,1,3,1,2,1),
(5,1,4,2,1,1),
(6,1,5,3,2,1),
(7,2,6,1,1,1),
(8,2,6,2,2,1),
(9,2,6,3,1,1),
(10,2,7,3,1,1),
(11,2,8,2,1,1),
(12,2,9,1,1,1),
(13,2,8,1,1,1),
(14,3,10,1,1,1),
(15,3,11,1,2,1),
(16,3,10,2,2,1),
(17,3,11,2,2,1),
(18,3,13,2,2,1),
(19,3,12,1,1,1),
(20,4,14,1,2,1),
(21,4,15,1,1,1),
(22,4,16,2,2,1),
(23,4,17,2,1,1),
(25,4,14,2,2,1),
(26,5,18,2,1,1),
(27,5,18,1,1,1),
(28,5,19,1,1,1),
(29,5,20,2,1,1),
(30,6,21,1,1,1),
(31,6,22,2,2,1),
(32,6,23,1,2,1),
(33,6,24,2,1,1),
(34,7,25,2,2,1),
(35,7,26,1,1,1),
(36,7,27,1,2,1),
(37,7,28,3,1,1),
(38,7,29,1,2,1),
(39,7,30,2,1,1),
(40,8,31,1,1,1),
(41,8,32,2,2,1),
(42,8,33,3,2,1),
(43,8,34,1,1,1),
(44,8,35,1,1,1),
(45,9,36,2,2,1),
(46,9,37,1,1,1),
(47,9,38,3,2,1),
(48,9,39,2,1,1),
(49,10,40,1,2,1),
(50,10,41,1,1,1),
(51,10,42,3,1,1),
(52,10,43,2,2,1);

/*Table structure for table `drive_type` */

DROP TABLE IF EXISTS `drive_type`;

CREATE TABLE `drive_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drive` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `drive_type` */

insert  into `drive_type`(`id`,`drive`) values 
(1,'Полный'),
(2,'Передний');

/*Table structure for table `engine_type` */

DROP TABLE IF EXISTS `engine_type`;

CREATE TABLE `engine_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engine` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `engine_type` */

insert  into `engine_type`(`id`,`engine`) values 
(1,'Бензин'),
(2,'Дизел'),
(3,'Гибрид');

/*Table structure for table `model` */

DROP TABLE IF EXISTS `model`;

CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `model` */

insert  into `model`(`id`,`brand_id`,`model`) values 
(1,1,'ES'),
(2,1,'GX'),
(3,1,'RX'),
(4,1,'NX'),
(5,1,'UX'),
(6,2,'Camry'),
(7,2,'Carolla'),
(8,2,'Crown'),
(9,2,'Tundra'),
(10,3,'C-Class'),
(11,3,'E-Class'),
(12,3,'S-Class'),
(13,3,'Sprinter'),
(14,4,'X6'),
(15,4,'X5'),
(16,4,'X7'),
(17,4,'X3'),
(18,5,'Focus'),
(19,5,'Mustang'),
(20,5,'Mondeo'),
(21,6,'A7'),
(22,6,'A8'),
(23,6,'Q8'),
(24,6,'A5'),
(25,7,'X-trail'),
(26,7,'Maxima'),
(27,7,'Patrol'),
(28,7,'Teana'),
(29,7,'Almera'),
(30,7,'Qashkay'),
(31,8,'Sonata'),
(32,8,'Solaris'),
(33,8,'Tucson'),
(34,8,'Avante'),
(35,8,'Porter'),
(36,9,'Astra'),
(37,9,'Vectra-V'),
(38,9,'Vectra-B'),
(39,9,'Caravan'),
(40,10,'Golf'),
(41,10,'Polo'),
(42,10,'Passat'),
(43,10,'Jetta');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
