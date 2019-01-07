-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 12:54 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_brg` varchar(6) NOT NULL,
  `nm_brg` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok_min` int(5) NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `satuan`, `harga_jual`, `harga_beli`, `stok_min`, `desc`, `image`) VALUES
('B-0001', 'Ayam Rebus', 'buah', 10000, 4000, 1, 'Ayam direbus jadi empuk', 'ayam3.jpg'),
('B-0002', 'Ayam Goreng', 'buah', 40000, 4000, 1, 'Hasuuuuu', 'ayam6.jpg'),
('B-0003', 'Ayam Madu', 'buah', 79999, 8000, 1, 'hhahahahaha', 'ayam5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE IF NOT EXISTS `gerai` (
  `kd_gerai` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sms` varchar(20) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_gerai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`kd_gerai`, `nama`, `phone`, `sms`, `latitude`, `longitude`) VALUES
('G-0001', 'Gerai Mangkang', '083842327765', '083842327765', '-6.978074', '110.344456'),
('G-0002', 'Gerai Krapyak', '083195934508', '083195934508', '-6.983810', '110.366648');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `id_jual` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gerai` varchar(10) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `total` decimal(11,0) DEFAULT NULL,
  `bayar` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_jual`, `kd_gerai`, `user_id`, `total`, `bayar`) VALUES
(37, 'G-0001', 'Nando', '40000', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `list_jual`
--

CREATE TABLE IF NOT EXISTS `list_jual` (
  `id_terjual` int(11) NOT NULL AUTO_INCREMENT,
  `id_jual` int(11) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  PRIMARY KEY (`id_terjual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `list_jual`
--

INSERT INTO `list_jual` (`id_terjual`, `id_jual`, `kd_brg`) VALUES
(16, 37, 'B-0002');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `kd_gerai` varchar(10) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kd_gerai`,`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kd_gerai`, `kd_brg`, `stok`) VALUES
('G-0001', 'B-0001', 100),
('G-0001', 'B-0002', 40),
('G-0002', 'B-0003', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `hak_akses`) VALUES
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('Lak', 'Lak', '1868169105c7ffce0f46e730a56bb65e', 0),
('Nando', 'Nando', 'e4ea7b52c9a6d16b811e37aa7aa2dbe9', 0),
('q', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 0),
('Raissa', 'Raissa', '6928a5fb4eb367396a0b1e374fb69a54', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
