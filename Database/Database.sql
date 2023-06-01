-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2023 at 03:15 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it21351440`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `cus_id`, `name`, `code`, `password`) VALUES
(1, 1, 'rajarata123', 'rajarata123', 'rajarata123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `username`, `password`, `email`, `address`, `mobile`) VALUES
(1, 'rajarata123', 'rajarata123', '', '', ''),
(2, 'thaditha', '123', 'thaditharodrigo22@gmail.com', '1-H/11/Jayawadanagama Hosing Scheme, Wickramasinghapura, Battarmulla', '076-1149905'),
(3, 'manuja', '123', 'manuja@gmail.com', 'kalapulwawa road,Dambulla', '077-1234567'),
(4, 'sachin', '123', 'schin@gmail.com', 'aSFas', '011-2345678');

-- --------------------------------------------------------

--
-- Table structure for table `head_admin`
--

DROP TABLE IF EXISTS `head_admin`;
CREATE TABLE IF NOT EXISTS `head_admin` (
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(150) NOT NULL,
  `discount` float NOT NULL,
  `img_path` mediumtext NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `category`, `name`, `price`, `description`, `discount`, `img_path`) VALUES
(1, 'vegetables', 'CARROT 500g', 289, '', 0.12, 'item_images/carrot.jpg'),
(2, 'vegetables', 'Onion 1KG', 400, '', 0, 'item_images/onion.jpeg'),
(3, 'fruits', 'GREEN APPLE 1kg', 1273, '', 0.1, 'item_images/apple.jpg'),
(4, 'fruits', 'STRWABERRY 100g', 600, '', 0, 'item_images/Strawberries.jpg'),
(5, 'dairy', 'KRAFT CHEDDAR 500g', 1360, '', 0.05, 'item_images/cheese.jpg'),
(6, 'dairy', 'AMBEWELA FRESH MILK 1L', 520, '', 0, 'item_images/milk.jpeg'),
(7, 'grocery', 'GARLIC POWDER 200g', 345, '', 0, 'item_images/garlic-powder.jpeg'),
(8, 'grocery', 'TOOTH BRUSH (6 PACK)', 599, '1 FOR FREE PACK!!', 0.17, 'item_images/tooth-brush.jpg'),
(9, 'fish', 'THALAPATH 1kg', 2100, '', 0, 'item_images/meatfish.jpg'),
(10, 'fish', 'PRAWNS 1kg', 1478, 'JAFFNA SMALL PRAWN', 0.08, 'item_images/prawns.jpg'),
(11, 'meat', 'CHICKEN MEATBALLS 500g', 689, '', 0, 'item_images/meat.jpeg'),
(12, 'meat', 'NORLAND TURKEY', 1970, 'SPECIAL CHRISTMAS DISCOUNT', 0.16, 'item_images/turkey.jpg'),
(14, 'vegetables', 'POTATOES 1kg', 450, '', 0, 'item_images/Potatoes.webp'),
(16, 'fruits', 'MAngo', 110, '', 0.1, 'item_images/mango.webp');

-- --------------------------------------------------------

--
-- Table structure for table `purch_history`
--

DROP TABLE IF EXISTS `purch_history`;
CREATE TABLE IF NOT EXISTS `purch_history` (
  `purch_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `item_count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`purch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purch_history`
--

INSERT INTO `purch_history` (`purch_id`, `cus_id`, `cus_name`, `item_count`, `price`, `date`) VALUES
(1, 2, 'thaditha', 5, 2300, '2022-12-02'),
(2, 2, 'Manuja', 15, 17896, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  PRIMARY KEY (`wish_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `pro_id`, `cus_id`, `name`, `price`, `discount`) VALUES
(16, 3, 1, 'GREEN APPLE 1kg', 1145.7, 0.1),
(13, 10, 1, 'PRAWNS 1kg', 1359.76, 0.08);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
