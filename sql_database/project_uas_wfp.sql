-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas_wfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `deskripsi` varchar(45) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fasilitas_products1_idx` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nomor_telepon` varchar(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `rating` double NOT NULL,
  `image` varchar(45) NOT NULL,
  `tipe_hotels_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hotels_tipe_hotels_idx` (`tipe_hotels_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE IF NOT EXISTS `pegawais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` enum('Owner','Staff') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE IF NOT EXISTS `pelanggans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `image` varchar(45) NOT NULL,
  `tipe_products_id` int(11) NOT NULL,
  `hotels_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_tipe_products1_idx` (`tipe_products_id`),
  KEY `fk_products_hotels1_idx` (`hotels_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_transaksi`
--

CREATE TABLE IF NOT EXISTS `product_transaksi` (
  `transaksis_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  PRIMARY KEY (`transaksis_id`,`products_id`),
  KEY `fk_transaksis_has_products_products1_idx` (`products_id`),
  KEY `fk_transaksis_has_products_transaksis1_idx` (`transaksis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_hotels`
--

CREATE TABLE IF NOT EXISTS `tipe_hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_products`
--

CREATE TABLE IF NOT EXISTS `tipe_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE IF NOT EXISTS `transaksis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(45) NOT NULL,
  `pelanggans_id` int(11) NOT NULL,
  `pegawais_id` int(11) NOT NULL,
  `total_sebelum` double NOT NULL,
  `total_sesudah_pajak` double NOT NULL,
  `poin_terpakai` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_transaksis_pelanggans1_idx` (`pelanggans_id`),
  KEY `fk_transaksis_pegawais1_idx` (`pegawais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fk_fasilitas_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `fk_hotels_tipe_hotels` FOREIGN KEY (`tipe_hotels_id`) REFERENCES `tipe_hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_hotels1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_tipe_products1` FOREIGN KEY (`tipe_products_id`) REFERENCES `tipe_products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_transaksi`
--
ALTER TABLE `product_transaksi`
  ADD CONSTRAINT `fk_transaksis_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksis_has_products_transaksis1` FOREIGN KEY (`transaksis_id`) REFERENCES `transaksis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `fk_transaksis_pegawais1` FOREIGN KEY (`pegawais_id`) REFERENCES `pegawais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksis_pelanggans1` FOREIGN KEY (`pelanggans_id`) REFERENCES `pelanggans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
