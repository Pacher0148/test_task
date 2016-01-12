-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2016 at 11:37 PM
-- Server version: 5.6.27-0ubuntu1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'http://www.apheresis.org/global_graphics/default-store-350x350.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`) VALUES
(1, 'product1', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(2, 'product2', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(3, 'product3', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(4, 'product4', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(5, 'product5', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(6, 'product6', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(7, 'product7', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(8, 'product8', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(9, 'product9', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(10, 'product10', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(11, 'product11', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(12, 'product12', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg'),
(13, 'product13', 'http://izumi-hayashi.com/wp-content/uploads/2014/03/L021o-150x150.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate_and_comment`
--

CREATE TABLE IF NOT EXISTS `rate_and_comment` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `productId` int(10) unsigned NOT NULL,
  `rate` tinyint(3) unsigned DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate_and_comment`
--

INSERT INTO `rate_and_comment` (`id`, `userId`, `productId`, `rate`, `comment`) VALUES
(1, 1, 2, 3, 'comment 13'),
(2, 1, 3, 4, 'comment 14'),
(3, 1, 1, 2, 'comment 12'),
(4, 1, 4, 1, 'comment 11'),
(5, 1, 5, 5, 'comment 15'),
(6, 2, 1, 5, 'comment 25'),
(7, 2, 2, 4, 'comment 24'),
(8, 2, 3, 3, 'comment 23'),
(9, 2, 4, 2, 'comment 22'),
(10, 2, 5, 1, 'comment 21'),
(11, 3, 1, 3, 'comment 33'),
(12, 3, 2, 3, 'comment 33'),
(13, 3, 3, 3, 'comment 33'),
(14, 3, 4, 3, 'comment 33'),
(15, 3, 5, 3, 'comment 33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`) VALUES
(1, 'user1', 'e23d0b599656e3bea4924a25d72c03c47312c198'),
(2, 'user2', 'fc91919d9e8921ec2a0b78bc3170295459eeb0db'),
(3, 'user3', '9b83c2c3df7d5c7efce14d3c03f8d6417448c916');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `rate_and_comment`
--
ALTER TABLE `rate_and_comment`
  ADD PRIMARY KEY (`id`,`userId`,`productId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rate_and_comment`
--
ALTER TABLE `rate_and_comment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
