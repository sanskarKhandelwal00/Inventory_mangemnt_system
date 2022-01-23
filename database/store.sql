-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2021 at 11:14 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT 0,
  `brand_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'nise', 1, 1),
(2, 'asgyhg', 1, 1),
(3, 'csfd', 1, 2),
(4, 'ff', 1, 1),
(5, 'sans', 1, 1),
(6, 'sansak', 1, 1),
(7, 'hvgd', 2, 1),
(8, 'ddhv', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'gh', 1, 1),
(2, 'sanska', 1, 1),
(3, 'hshvg', 1, 1),
(4, 'hdggf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

DROP TABLE IF EXISTS `client_info`;
CREATE TABLE IF NOT EXISTS `client_info` (
  `cname` varchar(30) NOT NULL,
  `cgstno` varchar(30) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `ccity` varchar(30) NOT NULL,
  `cstate` varchar(30) NOT NULL,
  `cpostal` int(20) NOT NULL,
  `cphno` int(15) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `cwebsite` varchar(30) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`cname`, `cgstno`, `caddress`, `ccity`, `cstate`, `cpostal`, `cphno`, `cemail`, `cwebsite`, `cdate`) VALUES
('Rahul Enterprise', '54555', 'gftdrs', 'hvgg', 'Maharashtra', 444485, 454548, 'sanna@hdh.com', 'ggfxd', '0065-05-06'),
('pdnjb', '484515', 'dhbv', 'dbfhv', 'bchvh', 5454, 544, 'sanna@hdh.com', 'www.sshh.com', '0844-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`) VALUES
(1, '2021-05-14', 'sanskar ', '76204747', '150.00', '27.00', '177.00', '20', '157.00', '150', '7.00', 1, 1, 1, '27.00', 1, 1),
(2, '2021-05-10', 'Rahul Enterprise', '987641215', '30.00', '5.40', '35.40', '00', '35.40', '100', '-64.60', 2, 1, 1, '5.40', 1, 1),
(3, '2021-05-11', 'Rahul Enterprise', '987641215', '60.00', '10.80', '70.80', '00', '70.80', '50', '20.80', 1, 2, 1, '10.80', 1, 1),
(4, '2021-05-03', 'Rahul Enterprise', '987641215', '59.00', '10.62', '69.62', '00', '69.62', '10', '59.62', 1, 1, 1, '10.62', 1, 1),
(5, '2021-06-08', '4848484', '500', '30.00', '5.40', '35.40', '32', '3.40', '622', '-618.60', 1, 1, 1, '5.40', 1, 1),
(6, '2021-06-09', '4848484', '987654321', '30.00', '5.40', '35.40', '4', '31.40', '54', '-22.60', 1, 1, 2, '5.40', 1, 1),
(7, '2021-06-08', '4848484', '987654321', '59.00', '10.62', '69.62', '56', '13.62', '4', '9.62', 2, 1, 1, '10.62', 1, 1),
(8, '2021-06-11', '4848484', '987654321', '472.00', '84.96', '556.96', '25', '531.96', '26', '505.96', 1, 2, 1, '84.96', 1, 1),
(9, '2021-06-11', '4848484', '987654321', '30.00', '5.40', '35.40', '5', '30.40', '4', '26.40', 1, 1, 1, '5.40', 1, 1),
(10, '2021-06-09', '544', '987654321', '1070.00', '192.60', '1262.60', '54', '1208.60', '200', '1008.60', 2, 3, 1, '192.60', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 20, '5', '30', '150.00', 1),
(2, 2, 20, '1', '30', '30.00', 1),
(3, 3, 20, '2', '30', '60.00', 1),
(4, 4, 21, '1', '59', '59.00', 1),
(5, 5, 20, '1', '30', '30.00', 1),
(6, 6, 20, '1', '30', '30.00', 1),
(7, 7, 21, '1', '59', '59.00', 1),
(8, 8, 21, '8', '59', '472.00', 1),
(9, 9, 20, '1', '30', '30.00', 1),
(10, 10, 22, '52', '20', '1040.00', 1),
(11, 10, 20, '1', '30', '30.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(20, 'poma', 'tj', 1, 1, '-642', '30', 1, 1),
(21, 'pro', '../assests/images/185208230660ae1cccd23b0.png', 2, 1, '42', '59', 1, 1),
(22, 'psaj', '../assests/images/30535168960b4bdc6dbe62.png', 3, 1, '2', '20', 1, 1),
(23, 'qfyhfg', '../assests/images/71438737060bfaa0696bde.png', 1, 1, '520', '66', 2, 1),
(24, 'hdbvg', '../assests/images/161248352660c48f53c2514.png', 1, 1, '58', '20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
