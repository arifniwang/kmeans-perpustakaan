# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.32)
# Database: ta_kmeans_perpustakaan
# Generation Time: 2021-08-29 15:35:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`)
VALUES
	('admin','d41d8cd98f00b204e9800998ecf8427e','Admin Perusahaan','admin.perusahaan@yahoo.com','081267771344','admin');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table buku
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori`)
VALUES
	('B-0011','kacil Koya','Cerita'),
	('B-0012','kehidupan Duafa','Agama'),
	('B-0013','Puasa Sunnah','Agama'),
	('B-0014','Kemerdekaan India','Sosial'),
	('B-0015','Bakti Pahlawan','Sosial');

/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table buku_dipinjam
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buku_dipinjam`;

CREATE TABLE `buku_dipinjam` (
  `id_member` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(4) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `jumlah_buku_dipinjam` int(4) NOT NULL,
  `jumlah_kategori_sosial` int(4) NOT NULL,
  `jumlah_kategori_agama` int(4) NOT NULL,
  `jumlah_kategori_cerita` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buku_dipinjam` WRITE;
/*!40000 ALTER TABLE `buku_dipinjam` DISABLE KEYS */;

INSERT INTO `buku_dipinjam` (`id_member`, `jenis_kelamin`, `usia`, `kode_buku`, `jumlah_buku_dipinjam`, `jumlah_kategori_sosial`, `jumlah_kategori_agama`, `jumlah_kategori_cerita`)
VALUES
	('M001','2',3,'B-0011 B-0012',2,0,1,1),
	('M002','2',2,'B-0013',1,0,1,0),
	('M003','1',2,'B-0014 B-0015',2,2,0,0),
	('M004','2',2,'B-0014 B-0015',2,2,0,0),
	('M005','1',3,'B-0014 B-0015',2,2,0,0),
	('M006','2',2,'B-0011 B-0012',2,0,1,1),
	('M007','2',3,'B-0011 B-0012 B-0013',3,0,2,1);

/*!40000 ALTER TABLE `buku_dipinjam` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table centroid
# ------------------------------------------------------------

DROP TABLE IF EXISTS `centroid`;

CREATE TABLE `centroid` (
  `id_centroid` int(5) NOT NULL AUTO_INCREMENT,
  `data_centroid` varchar(255) NOT NULL,
  PRIMARY KEY (`id_centroid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `centroid` WRITE;
/*!40000 ALTER TABLE `centroid` DISABLE KEYS */;

INSERT INTO `centroid` (`id_centroid`, `data_centroid`)
VALUES
	(15,'1, 1, 2, 1, 2, 2'),
	(16,'2, 3, 3, 2, 2, 1'),
	(17,'1, 5, 5, 1, 2, 2');

/*!40000 ALTER TABLE `centroid` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dana
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dana`;

CREATE TABLE `dana` (
  `dana_saat_ini` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `dana` WRITE;
/*!40000 ALTER TABLE `dana` DISABLE KEYS */;

INSERT INTO `dana` (`dana_saat_ini`)
VALUES
	(10000);

/*!40000 ALTER TABLE `dana` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table diagram
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diagram`;

CREATE TABLE `diagram` (
  `id_diagram` int(5) NOT NULL AUTO_INCREMENT,
  `x` text NOT NULL,
  `y` text NOT NULL,
  PRIMARY KEY (`id_diagram`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `diagram` WRITE;
/*!40000 ALTER TABLE `diagram` DISABLE KEYS */;

INSERT INTO `diagram` (`id_diagram`, `x`, `y`)
VALUES
	(1,'2,',''),
	(2,'1,',''),
	(3,'',' 30,'),
	(4,'',' 23,');

/*!40000 ALTER TABLE `diagram` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table diagram_centroid
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diagram_centroid`;

CREATE TABLE `diagram_centroid` (
  `id_diagram_centroid` int(5) NOT NULL AUTO_INCREMENT,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  PRIMARY KEY (`id_diagram_centroid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `diagram_centroid` WRITE;
/*!40000 ALTER TABLE `diagram_centroid` DISABLE KEYS */;

INSERT INTO `diagram_centroid` (`id_diagram_centroid`, `x`, `y`)
VALUES
	(1,'2,',''),
	(2,'1,',''),
	(3,'',' 30,'),
	(4,'',' 22,');

/*!40000 ALTER TABLE `diagram_centroid` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hasil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(255) NOT NULL,
  `data1` int(11) DEFAULT NULL,
  `data2` int(11) DEFAULT NULL,
  `data3` int(11) DEFAULT NULL,
  `data4` int(11) DEFAULT NULL,
  `data5` int(11) DEFAULT NULL,
  `data6` int(11) DEFAULT NULL,
  `cluster1` varchar(255) DEFAULT NULL,
  `cluster2` varchar(255) DEFAULT NULL,
  `cluster3` varchar(255) DEFAULT NULL,
  `objek_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `hasil` WRITE;
/*!40000 ALTER TABLE `hasil` DISABLE KEYS */;

INSERT INTO `hasil` (`id`, `object`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `cluster1`, `cluster2`, `cluster3`, `objek_id`)
VALUES
	(1,'M001',2,3,2,0,1,1,'No','Yes','Yes',1),
	(2,'M002',2,2,1,0,1,0,'No','Yes','No',2),
	(3,'M003',1,2,2,2,0,0,'Yes','No','No',3),
	(4,'M004',2,2,2,2,0,0,'Yes','No','No',4),
	(5,'M005',1,3,2,2,0,0,'Yes','No','No',5),
	(6,'M006',2,2,2,0,1,1,'No','Yes','Yes',6);

/*!40000 ALTER TABLE `hasil` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table objek
# ------------------------------------------------------------

DROP TABLE IF EXISTS `objek`;

CREATE TABLE `objek` (
  `id_objek` int(5) NOT NULL AUTO_INCREMENT,
  `nama_objek` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id_objek`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `objek` WRITE;
/*!40000 ALTER TABLE `objek` DISABLE KEYS */;

INSERT INTO `objek` (`id_objek`, `nama_objek`, `data`)
VALUES
	(1,'Arif Niwang','2,3,2,0,1,1'),
	(2,'Sapta Agung','2,2,1,0,1,0'),
	(3,'Dinda Gustian','1,2,2,2,0,0'),
	(4,'Muhammad Alfian','2,2,2,2,0,0'),
	(5,'Anisha Tiarasani','1,3,2,2,0,0'),
	(6,'Faris','2,2,2,0,1,1');

/*!40000 ALTER TABLE `objek` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pinjaman
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pinjaman`;

CREATE TABLE `pinjaman` (
  `id_member` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(10) NOT NULL,
  `tanggal_sekarang` varchar(50) NOT NULL,
  `jumlah_buku_dipinjam` int(4) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `tanggal_pengembalian` varchar(50) NOT NULL,
  `buku_apa_saja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pinjaman` WRITE;
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;

INSERT INTO `pinjaman` (`id_member`, `nama`, `jenis_kelamin`, `usia`, `tanggal_sekarang`, `jumlah_buku_dipinjam`, `total_bayar`, `tanggal_pengembalian`, `buku_apa_saja`)
VALUES
	('M001','Arif Niwang','2',3,'2021-08-29',2,'10000','2021-08-30','B-0011 B-0012'),
	('M002','Sapta Agung','2',2,'2021-08-29',1,'10000','2021-08-30','B-0013'),
	('M003','Dinda Gustian','1',2,'2021-08-29',2,'20000','2021-08-31','B-0014 B-0015'),
	('M004','Muhammad Alfian','2',2,'2021-08-30',2,'20000','2021-09-01','B-0014 B-0015'),
	('M005','Anisha Tiarasani','1',3,'2021-08-29',2,'20000','2021-08-31','B-0014 B-0015'),
	('M006','Faris','2',2,'2021-08-29',2,'20000','2021-08-31','B-0011 B-0012'),
	('M007','Angga','2',3,'2021-08-29',3,'20000','2021-08-31','B-0011 B-0012 B-0013');

/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table satukan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `satukan`;

CREATE TABLE `satukan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `satukan` WRITE;
/*!40000 ALTER TABLE `satukan` DISABLE KEYS */;

INSERT INTO `satukan` (`id`, `data`)
VALUES
	(1,'2,1,'),
	(2,' 30, 23,'),
	(3,'2,1,'),
	(4,' 30, 22,');

/*!40000 ALTER TABLE `satukan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
