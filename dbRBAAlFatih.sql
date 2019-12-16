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

/*Table structure for table `tblkelas` */

DROP TABLE IF EXISTS `tblkelas`;

CREATE TABLE `tblkelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idKelas` varchar(5) DEFAULT NULL,
  `namaKelas` varchar(50) DEFAULT NULL,
  `idUser` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblkelas` */

insert  into `tblkelas`(`id`,`idKelas`,`namaKelas`,`idUser`) values 
(1,'19001','Jilid 1','19002'),
(2,'19002','Jilid 2','19001');

/*Table structure for table `tblsantri` */

DROP TABLE IF EXISTS `tblsantri`;

CREATE TABLE `tblsantri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSantri` varchar(5) DEFAULT NULL,
  `idKelas` varchar(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `panggilan` varchar(20) DEFAULT NULL,
  `tmpLahir` varchar(20) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `jnsKel` varchar(10) DEFAULT NULL,
  `tlp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `namaAyah` varchar(50) DEFAULT NULL,
  `namaIbu` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblsantri` */

insert  into `tblsantri`(`id`,`idSantri`,`idKelas`,`nama`,`panggilan`,`tmpLahir`,`tglLahir`,`jnsKel`,`tlp`,`alamat`,`namaAyah`,`namaIbu`,`email`) values 
(2,'19001','19001','Rasya Pranaja Hakim','Rasya','Jakarta','2017-02-26','L','0858 1934 2720','Jl. Cempaka 3 No.263','Rahman Hakim','Retno Ayu','');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(5) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jnsKel` varchar(5) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`iduser`,`user`,`realname`,`password`,`jnsKel`,`level`,`foto`) values 
(1,'19001','rizal','Rizal Purnomo','rhino','L','Administrator',NULL),
(2,'19002','anggun','Anggun Sukma Al Batul','sukma','P','Administrator',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
