/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - dbrbaalfatih
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tblkelas` */

insert  into `tblkelas`(`id`,`idKelas`,`namaKelas`,`idUser`) values 
(1,'19001','Jilid 1','19002'),
(4,'19002','Jilid 2','19003'),
(5,'19003','Jilid 3','19004'),
(6,'19004','Jilid 4','19005'),
(7,'19005','Jilid 5','19006');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblsantri` */

insert  into `tblsantri`(`id`,`idSantri`,`idKelas`,`nama`,`panggilan`,`tmpLahir`,`tglLahir`,`jnsKel`,`tlp`,`alamat`,`namaAyah`,`namaIbu`,`email`) values 
(2,'19001','19001','Rasya Pranaja Hakim','Rasya','Jakarta','2017-02-26','L','0858 1934 2720','Jl. Cempaka 3 No.263','Rahman Hakim','Retno Ayu',''),
(5,'19002','19001','Hafizah','Hafizah','','2019-12-14','P','','','','',''),
(6,'19003','19002','Nindy Dwi Aryanti','Nindy','Jakarta','2013-06-01','L','','Kodam y','Mugiyono','Suci Haryanti','');

/*Table structure for table `tbltabungan` */

DROP TABLE IF EXISTS `tbltabungan`;

CREATE TABLE `tbltabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTabungan` varchar(5) DEFAULT NULL,
  `idSantri` varchar(5) DEFAULT NULL,
  `idUser` varchar(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbltabungan` */

insert  into `tbltabungan`(`id`,`idTabungan`,`idSantri`,`idUser`,`tanggal`,`debet`,`kredit`,`ket`) values 
(6,'19001','19001','19001','2020-01-02 09:55:47',100000,0,'Test'),
(7,'19002','19001','19001','2020-01-04 09:56:07',0,50000,'Test Ambil'),
(8,'19003','19003','19001','2020-02-05 21:10:20',260000,0,'');

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
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`iduser`,`user`,`realname`,`password`,`jnsKel`,`level`,`foto`,`lastLogin`) values 
(1,'19001','rizal','Rizal Purnomo','rhino','L','Administrator',NULL,'2021-06-01 04:38:08'),
(2,'19002','anggun','Anggun Sukma Al Batul','anggunsayangrizal','P','Pengajar',NULL,'2021-05-31 16:13:33'),
(3,'19003','Dzulfikri ','Dzulfikri Ali Mubarak','sukma','L','Pengajar',NULL,NULL),
(4,'19004','Nisbach','Nisbach Nur Muhammad','Sukma','L','Pengajar',NULL,NULL),
(5,'19005','Desi','Desiarti Narita Fauzi','Sukma','P','Pengajar',NULL,NULL),
(6,'19006','Suryadi','Suryadi ','Sukma','L','Pengajar',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
