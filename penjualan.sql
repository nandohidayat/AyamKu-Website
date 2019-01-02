-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 02:39 AM
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
  `harga` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(5) NOT NULL,
  `stok_min` int(5) NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `satuan`, `harga`, `harga_beli`, `stok`, `stok_min`, `desc`, `image`) VALUES
('B-0001', 'Ayam Rebus', 'buah', 10000, 4000, 40, 1, 'Ayam direbus jadi empuk', 'ayam3.jpg'),
('B-0002', 'Ayam Goreng', 'buah', 40000, 4000, 2, 1, 'Hasuuuuu', 'ayam6.jpg'),
('B-0003', 'Ayam Madu', 'buah', 79999, 8000, 200, 1, 'hhahahahaha', 'ayam5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `total` decimal(11,0) DEFAULT NULL,
  `bayar` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id`, `user_id`, `total`, `bayar`) VALUES
(2, 'Nando', '10000', '20000'),
(4, 'Raissa', '79999', '90000'),
(5, 'Nando', '40000', '50000'),
(6, 'Lak', '40000', '50000'),
(7, 'Lak', '89999', '100000'),
(8, 'Lak', '79999', '100000'),
(9, 'Lak', '10000', '20000'),
(10, 'Lak', '40000', '50000'),
(11, 'Lak', '40000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `kota`) VALUES
(1, 'Semarang'),
(2, 'Demak'),
(3, 'Kendal'),
(4, 'Kudus'),
(5, 'Ungaran'),
(6, 'Jeporo');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `pname`, `price`) VALUES
(1, 'jagung', '1000.00'),
(2, 'jagung', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `password`, `hak_akses`) VALUES
(1, 'admin', 'paijo', '21232f297a57a5a743894a0e4a801fc3', 0),
(6, 'Nando', 'Nando', 'e4ea7b52c9a6d16b811e37aa7aa2dbe9', 0),
(7, 'Raissa', 'Raissa', '6928a5fb4eb367396a0b1e374fb69a54', 0),
(8, 'Lak', 'Lak', '1868169105c7ffce0f46e730a56bb65e', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
