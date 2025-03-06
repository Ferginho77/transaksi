-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for diskon
CREATE DATABASE IF NOT EXISTS `diskon` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `diskon`;

-- Dumping structure for table diskon.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `IdBarang` int NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(50) DEFAULT NULL,
  `Harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FotoBarang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TotalDiskon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table diskon.barang: ~1 rows (approximately)
INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Harga`, `FotoBarang`, `TotalDiskon`) VALUES
	(27, 'erspo', '100000', 'Sandy Walsh.jpeg', '50'),
	(28, 'Manchester United 24/25', '100000', 'emyu.jpeg', NULL);

-- Dumping structure for table diskon.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `IdTransaksi` int NOT NULL AUTO_INCREMENT,
  `Jumlah` varchar(50) DEFAULT NULL,
  `TotalHarga` varchar(255) DEFAULT NULL,
  `IdBarang` int DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  PRIMARY KEY (`IdTransaksi`),
  KEY `FK_transaksi_barang` (`IdBarang`),
  KEY `FK_transaksi_user` (`IdUser`),
  CONSTRAINT `FK_transaksi_barang` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transaksi_user` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table diskon.transaksi: ~0 rows (approximately)
INSERT INTO `transaksi` (`IdTransaksi`, `Jumlah`, `TotalHarga`, `IdBarang`, `IdUser`) VALUES
	(9, '2', '100000', 27, 4),
	(10, '2', '200000', 28, 4);

-- Dumping structure for table diskon.user
CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `NamaLengkap` varchar(50) DEFAULT NULL,
  `Role` enum('Admin','Pengguna') DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table diskon.user: ~5 rows (approximately)
INSERT INTO `user` (`IdUser`, `Username`, `Password`, `NamaLengkap`, `Role`) VALUES
	(1, 'Fergie', '$2y$10$U4NKWZFkt6HpmGyFSKIIne1AsN8Rh3HCuW1rw.70jzmNVqvB//OnK', 'Fergies', 'Admin'),
	(2, 'Fergieesss', '$2y$10$oJxyJy8LGxaZTnMB9UzxuOnUugISMMhg0.GDmtHnuN6Pz0nqDxQYm', 'Nananggg', 'Pengguna'),
	(3, 'Nanangwoy', '$2y$10$r4vBpiEGEci/bepncWO8pes0lSyqXWMkQ/ye5tp28VDVrt4mvLpJW', 'Nananggg', 'Pengguna'),
	(4, 'Nanang', '$2y$10$hkM3vxkzYQn9XbQV.Dvnf.dNKfGAMApA9BUJ/oBPqLscMuJ/shmrO', 'Nananggg', 'Pengguna'),
	(5, 'adada', '$2y$10$SB8IpPBI0272WJkhLyrjROsrgUD.TZKmY7si7/SbvnlVdlUHRD1gm', 'sasasa', 'Pengguna');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
