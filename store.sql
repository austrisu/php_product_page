-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2018 at 05:59 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `product_name`, `product_price`, `product_type_name`) VALUES
(87, 'JU 798123', 'Chair', 50.12, 'type_furniture'),
(83, 'FR123123', 'Fifty shades of gray', 20.5, 'type_book'),
(82, 'FR123123', 'Fifty shades of gray', 20.5, 'type_book'),
(103, 'gy 6782', 'Good book', 50.14, 'type_book'),
(104, 'gy 6782', 'Good book', 50.14, 'type_book'),
(105, 'gy 6782', 'Good book', 50.14, 'type_book'),
(106, 'gy 6782', 'Good book', 50.14, 'type_book'),
(100, 'TY 4569', 'IKEA-table', 5.99, 'type_furniture'),
(101, 'TY 4569', 'IKEA-table', 5.99, 'type_furniture'),
(107, 'HY1123', 'Acme', 23.5, 'type_dvd'),
(74, 'HU123', 'Jacobs cronung', 12.5, 'type_dvd'),
(99, 'TY 4569', 'IKEA-table', 5.99, 'type_furniture');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_type_data` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_id`, `product_type_data`) VALUES
(52, 106, '2'),
(53, 107, '100'),
(49, 103, '2'),
(19, 74, '100'),
(27, 82, '15'),
(28, 83, '15'),
(47, 101, '50 X 60 X 70'),
(32, 87, '12 X 5 X 60'),
(51, 105, '2'),
(46, 100, '50 X 60 X 70'),
(41, 0, '23 X 12 X 34'),
(50, 104, '2'),
(45, 99, '50 X 60 X 70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
