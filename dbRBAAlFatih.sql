/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - dbrbaalfatih
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbrbaalfatih` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbrbaalfatih`;

/*Table structure for table `tblsantri` */

DROP TABLE IF EXISTS `tblsantri`;

CREATE TABLE `tblsantri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSantri` varchar(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `panggilan` varchar(20) DEFAULT NULL,
  `tptLahir` varchar(20) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `jnsKel` varchar(10) DEFAULT NULL,
  `tlp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `namaAyah` varchar(50) DEFAULT NULL,
  `namaIbu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsantri` */

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`user`,`realname`,`password`,`level`,`foto`) values 
(1,'rizal','Rizal Purnomo','rhino','Administrator',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
