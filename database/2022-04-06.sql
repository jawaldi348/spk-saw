/*
SQLyog Ultimate v12.4.3 (32 bit)
MySQL - 10.1.34-MariaDB : Database - spk_saw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spk_saw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spk_saw`;

/*Table structure for table `biodata` */

DROP TABLE IF EXISTS `biodata`;

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` char(5) DEFAULT NULL,
  `id_kriteria` char(5) DEFAULT NULL,
  `id_subkriteria` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_biodata`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

/*Data for the table `biodata` */

insert  into `biodata`(`id_biodata`,`id_mahasiswa`,`id_kriteria`,`id_subkriteria`) values 
(1,'1','K1','KS3'),
(2,'1','K2','KS4'),
(3,'2','K1','KS1'),
(4,'2','K2','KS4'),
(6,'1','K4','KS15'),
(7,'1','K5','KS19'),
(9,'2','K4','KS15'),
(10,'2','K5','KS19'),
(11,'3','K1','KS3'),
(12,'3','K2','KS4'),
(13,'3','K3','KS10'),
(14,'3','K4','KS12'),
(15,'3','K5','KS16'),
(16,'4','K1','KS1'),
(17,'4','K2','KS4'),
(19,'4','K4','KS12'),
(20,'4','K5','KS19'),
(21,'5','K1','KS2'),
(22,'5','K2','KS4'),
(24,'5','K4','KS15'),
(25,'5','K5','KS19'),
(26,'6','K1','KS3'),
(27,'6','K2','KS4'),
(28,'6','K3','KS8'),
(29,'6','K4','KS14'),
(30,'6','K5','KS16'),
(31,'7','K1','KS3'),
(32,'7','K2','KS4'),
(34,'7','K4','KS13'),
(35,'7','K5','KS16'),
(36,'8','K1','KS3'),
(37,'8','K2','KS5'),
(39,'8','K4','KS15'),
(40,'8','K5','KS18'),
(41,'9','K1','KS3'),
(42,'9','K2','KS6'),
(44,'9','K4','KS13'),
(45,'9','K5','KS19'),
(46,'10','K1','KS3'),
(47,'10','K2','KS4'),
(48,'10','K3','KS7'),
(49,'10','K4','KS13'),
(50,'10','K5','KS18'),
(51,'11','K1','KS3'),
(52,'11','K2','KS5'),
(53,'11','K3','KS9'),
(54,'11','K4','KS15'),
(55,'11','K5','KS18'),
(56,'12','K1','KS3'),
(57,'12','K2','KS4'),
(59,'12','K4','KS14'),
(60,'12','K5','KS17'),
(61,'13','K1','KS3'),
(62,'13','K2','KS4'),
(63,'13','K3','KS7'),
(64,'13','K4','KS12'),
(65,'13','K5','KS16'),
(66,'14','K1','KS3'),
(67,'14','K2','KS5'),
(68,'14','K3','KS10'),
(69,'14','K4','KS15'),
(70,'14','K5','KS16'),
(71,'15','K1','KS1'),
(72,'15','K2','KS4'),
(74,'15','K4','KS13'),
(75,'15','K5','KS19'),
(76,'16','K1','KS1'),
(77,'16','K2','KS4'),
(78,'16','K3','KS8'),
(79,'16','K4','KS13'),
(80,'16','K5','KS17'),
(81,'17','K1','KS2'),
(82,'17','K2','KS5'),
(83,'17','K3','KS7'),
(84,'17','K4','KS12'),
(85,'17','K5','KS18'),
(86,'15','K3','KS10'),
(87,'1','K3','KS7'),
(88,'2','K3','KS10'),
(89,'4','K3','KS10'),
(90,'5','K3','KS10'),
(91,'7','K3','KS10'),
(92,'8','K3','KS10'),
(93,'9','K3','KS10'),
(94,'12','K3','KS10');

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `kode_kriteria` char(5) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `bobot_kriteria` double DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`kode_kriteria`,`nama_kriteria`,`bobot_kriteria`) values 
('K1','Kartu',0.4),
('K2','Tanggungan',0.2),
('K3','Penghasilan',0.2),
('K4','Prestasi',0.15),
('K5','Jarak Pusat Kota',0.05);

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `kode_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_mhs` int(11) DEFAULT NULL,
  `nodaftar_mhs` varchar(50) DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `username_mhs` varchar(50) DEFAULT NULL,
  `password_mhs` varchar(100) DEFAULT NULL,
  `status_terima` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`kode_mhs`,`idtahun_mhs`,`nodaftar_mhs`,`nama_mhs`,`username_mhs`,`password_mhs`,`status_terima`) values 
(1,1,'1101','Inriani Sitohang','mhs1','202cb962ac59075b964b07152d234b70',0),
(2,1,'1102','Erlisna Telaumbanua','mhs2','202cb962ac59075b964b07152d234b70',0),
(3,1,'1103','Bewanolo Telaumbanua','mhs3','202cb962ac59075b964b07152d234b70',0),
(4,1,'1104','Emmanuel Zega','mhs4','202cb962ac59075b964b07152d234b70',0),
(5,1,'1105','Pricilla Br.Hutabarat','mhs5','202cb962ac59075b964b07152d234b70',0),
(6,1,'1106','Muhammad Asril','mhs6','202cb962ac59075b964b07152d234b70',0),
(7,1,'1107','Revina Nelti Juniati Br Gultom','mhs7','202cb962ac59075b964b07152d234b70',0),
(8,1,'1108','Mushab Furqon Hidayah','mhs8','202cb962ac59075b964b07152d234b70',0),
(9,1,'1109','Dea Paramita','mhs9','202cb962ac59075b964b07152d234b70',0),
(10,1,'1110','Fatimah','mhs10','202cb962ac59075b964b07152d234b70',0),
(11,1,'1111','CHRISTIAN LEO CHANRA SITOHANG','mhs11','202cb962ac59075b964b07152d234b70',0),
(12,1,'1112','Perdyan Syah','mhs12','202cb962ac59075b964b07152d234b70',0),
(13,1,'1505','Cinta Qeenan','cinta05','859ef5a035e6da4437533ff58985e001',0),
(14,1,'2405','Fiqy Toni','Fiqy24','e5cd0a68bca05a452dc3af52c6f12159',0),
(15,1,'0601','Angelica','angel06','e07eec0388eaeef6a584c8b2f3fed632',0),
(16,1,'12345','siska enjelina saragih','siska123','40159ac8fd3c00cb696f847442264fc0',0),
(17,1,'1102','Karina Tan','karin26','08c9e7f51b1844b77151ff8d76f1518f',0);

/*Table structure for table `subkriteria` */

DROP TABLE IF EXISTS `subkriteria`;

CREATE TABLE `subkriteria` (
  `kode_subkriteria` char(5) NOT NULL,
  `kriteria_subkriteria` char(5) DEFAULT NULL,
  `nama_subkriteria` varchar(50) DEFAULT NULL,
  `bobot_subkriteria` double DEFAULT NULL,
  PRIMARY KEY (`kode_subkriteria`),
  KEY `kriteria_subkriteria` (`kriteria_subkriteria`),
  CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kriteria_subkriteria`) REFERENCES `kriteria` (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subkriteria` */

insert  into `subkriteria`(`kode_subkriteria`,`kriteria_subkriteria`,`nama_subkriteria`,`bobot_subkriteria`) values 
('KS1','K1','KIP',1),
('KS10','K3','Tidak berpenghasilan - <= Rp. 800.000',0.25),
('KS12','K4','Ada Nasional',1),
('KS13','K4','Ada Provinsi',0.75),
('KS14','K4','Ada Kota',0.5),
('KS15','K4','Tidak Ada',0.25),
('KS16','K5','>15 Km',1),
('KS17','K5','11-14 Km',0.75),
('KS18','K5','6-10 Km',0.5),
('KS19','K5','0-5 Km',0.25),
('KS2','K1','KKS',0.75),
('KS20','K1','PKH',0.25),
('KS3','K1','SKTM',0.5),
('KS4','K2','>3',1),
('KS5','K2','2',0.75),
('KS6','K2','1',0.25),
('KS7','K3','>Rp. 3.000.000',1),
('KS8','K3','Rp. 1.500.001 - Rp. 3.000.000',0.75),
('KS9','K3','Rp. 800.000 - Rp. 1.500.000',0.5);

/*Table structure for table `tahun_akademik` */

DROP TABLE IF EXISTS `tahun_akademik`;

CREATE TABLE `tahun_akademik` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun` char(10) DEFAULT NULL,
  `status_tahun` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tahun_akademik` */

insert  into `tahun_akademik`(`id_tahun`,`nama_tahun`,`status_tahun`) values 
(1,'2021/2022',1),
(3,'2022/2023',0),
(4,'2023/2024',0);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`) values 
(1,'Kepala Bagian Kemahasiswaan','827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
