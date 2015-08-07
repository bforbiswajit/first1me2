-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 03:08 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firstme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `firstName`, `lastName`, `status`) VALUES
(1, 'demo@demo.com', '13ri7ZYSbl9CA', 'Biswajit', 'Bardhan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `displayName` varchar(30) NOT NULL,
  `shortDesc` varchar(255) NOT NULL,
  `longDesc` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL,
  `pseudoSubscriptionCount` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `displayName`, `shortDesc`, `longDesc`, `createdOn`, `status`, `pseudoSubscriptionCount`) VALUES
(1, 'Demo', 'Demo Short Desc', 'Demo Long Desc', '2015-06-13 11:13:15', '1', 0),
(2, 'hello', 'hello hello', 'aohidfopahdfoa', '2015-07-06 11:09:38', '1', 0),
(3, 'Apps', 'Category for Apps', 'Apps', '2015-07-13 07:34:37', '1', 0),
(4, 'Automotive', 'Category for Automotive', 'Automotive', '2015-07-13 07:35:02', '1', 0),
(5, 'Babies & Kids', 'Category for Babies & Kids', 'Babies & Kids', '2015-07-13 07:35:32', '1', 0),
(6, 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty & Personal Care', '2015-07-13 07:35:57', '1', 0),
(7, 'Books and Magazines', 'Books and Magazines Category', 'Books and Magazines', '2015-07-13 07:36:30', '1', 0),
(8, 'Cell Phones & Tablets', 'Cell Phones & Tablets', 'Cell Phones & Tablets', '2015-07-13 07:37:22', '1', 0),
(9, 'Fashion & Accessories', 'Fashion & Accessories', 'Fashion & Accessories', '2015-07-13 07:37:41', '1', 0),
(10, 'Computers & Electronics', 'Computers & Electronics', 'Computers & Electronics', '2015-07-13 07:38:18', '1', 0),
(11, 'Food & Restaurants', 'Food & Restaurants', 'Food & Restaurants', '2015-07-13 07:38:34', '1', 0),
(12, 'Health & Fitness', 'Health & Fitness', 'Health & Fitness', '2015-07-13 07:48:27', '1', 0),
(13, 'Home & Garden', 'Home & Garden', 'Home & Garden', '2015-07-13 07:48:57', '1', 0),
(14, 'Jewelry & Watches', 'Jewelry & Watches', 'Jewelry & Watches', '2015-07-13 07:49:09', '1', 0),
(15, 'Movies & Entertainment', 'Movies & Entertainment', 'Movies & Entertainment', '2015-07-13 07:49:24', '1', 0),
(16, 'demo category', 'demo', 'demo demo', '2015-07-21 01:47:13', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentsId` int(15) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `dealId` int(10) unsigned NOT NULL,
  `commentedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentsId`),
  KEY `userId` (`userId`),
  KEY `dealId` (`dealId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `categoryId` int(5) unsigned DEFAULT NULL,
  `vendorId` int(10) unsigned DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumbnailImg` varchar(160) NOT NULL,
  `bigImg` varchar(160) NOT NULL,
  `shortDesc` varchar(255) NOT NULL,
  `longDesc` text NOT NULL,
  `likes` int(5) NOT NULL,
  `views` int(10) NOT NULL,
  `pseudoViews` int(10) DEFAULT NULL,
  `expiresOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`),
  KEY `vendorId` (`vendorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `name`, `categoryId`, `vendorId`, `createdOn`, `thumbnailImg`, `bigImg`, `shortDesc`, `longDesc`, `likes`, `views`, `pseudoViews`, `expiresOn`, `status`) VALUES
(1, 'Demo Deal', 1, 1, '2015-07-05 10:12:14', '/public/images/deal/thumb/1.png', '/public/images/deal/big/1.png', 'Lorem ipsum dolor sit amet, consectetur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 22, NULL, '2015-07-06 00:00:00', '1'),
(2, 'Customize Your Car Looks', 4, 1, '2015-07-13 20:23:52', '/public/images/deal/thumb/2.png', '/public/images/deal/big/2.png', 'Lorem ipsum dolor sit amet', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 15, 0, '2015-08-20 00:00:00', '1'),
(3, 'Low cost used cars', 4, 1, '2015-07-13 20:23:59', '/public/images/deal/thumb/3.png', '/public/images/deal/big/3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 1, 0, '2015-07-20 00:00:00', '1'),
(4, 'Grab your Galaxy S6', 8, 1, '2015-07-13 21:30:59', '/public/images/deal/thumb/4.png', '/public/images/deal/big/4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.', 0, 9, 0, '2015-08-15 00:00:00', '1'),
(5, 'Seagate 1TB portable HDD @4000', 10, 1, '2015-07-13 21:43:48', '/public/images/deal/thumb/5.png', '/public/images/deal/big/5.png', 'Duis aute irure in voluptate velit. uis aute irure.', 'Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.', 0, 4, 0, '2015-07-31 00:00:00', '1'),
(6, 'MI 10400mah PowerBank 999 only', 10, 1, '2015-07-14 00:40:40', '/public/images/deal/thumb/6.png', '/public/images/deal/big/6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', 'test description', 0, 1, 0, '2015-07-31 00:00:00', '1'),
(7, 'Rolex Submariner best prize', 14, 1, '2015-07-14 00:42:11', '/public/images/deal/thumb/7.png', '/public/images/deal/big/7.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 0, 4, 0, '2015-07-31 00:00:00', '1'),
(8, 'iPhone 6 Plus a click away.', 8, 1, '2015-07-14 00:58:40', '/public/images/deal/thumb/8.png', '/public/images/deal/big/8.png', 'Lorem  dolor sit , consectetur adipiscing el ita ipsum  met.', 'Laure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Krrure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 8, 0, '2015-09-30 00:00:00', '1'),
(9, 'Beautify your interior', 13, 1, '2015-07-14 01:03:13', '/public/images/deal/thumb/9.png', '/public/images/deal/big/9.png', 'velit esse cillum dolore eu fugiat nulla pariatur.', 'Irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 3, 0, '2015-08-13 00:00:00', '1'),
(10, 'Mi 4i at unbelievable cost', 10, 1, '2015-07-16 12:06:41', '/public/images/deal/thumb/10.png', '/public/images/deal/big/10.png', 'Lorem ipsum consectetur adipiscing elit, sed do eiusmod.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 0, 6, 0, '2015-07-25 00:00:00', '1'),
(11, 'Tanishq Bridal Collection', 14, 1, '2015-07-21 00:05:33', '/public/images/deal/thumb/11.png', '/public/images/deal/big/11.png', 'adipiscing elit, sed do nt ut .', 'Konsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 3, 0, '2015-11-01 00:00:00', '1'),
(12, 'Win Bahubali Tickets', 15, 1, '2015-07-21 00:13:55', '/public/images/deal/thumb/12.png', '/public/images/deal/big/12.png', 'Daonstur sed do eiusmod tempor  ut labore et dolore aliqua.', 'Tameor adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 4, 0, '2015-07-25 00:00:00', '1'),
(13, 'Bajrangi Bhaijan Premier', 15, 1, '2015-07-21 00:25:17', '/public/images/deal/thumb/13.png', '/public/images/deal/big/13.png', 'Lorem Ipsum onsectetur adipis agna aliqua.', 'Danstur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 4, 0, '2015-07-25 00:00:00', '1'),
(14, 'Flat 20% Off on Making Charge', 14, 1, '2015-07-21 00:26:46', '/public/images/deal/thumb/14.png', '/public/images/deal/big/14.png', 'Lonsectetu ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 4, 0, '2015-11-01 00:00:00', '1'),
(15, 'Demo deal', 11, 1, '2015-07-21 00:28:56', '/public/images/deal/thumb/15.png', '/public/images/deal/big/15.png', 'didunt ut labore et dolore magna aliqua.', 'Lonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 6, 0, '2015-11-01 00:00:00', '1'),
(16, 'Minions @ BookMyShow.com', 15, 1, '2015-07-21 01:02:18', '/public/images/deal/thumb/16.png', '/public/images/deal/big/16.png', 'Lorem ipsum dolor sit amet, sed do eiusmod.', 'Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ddipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 4, 0, '2015-07-25 00:00:00', '1'),
(17, '15% Off @ Low Land', 7, 1, '2015-07-21 01:03:50', '/public/images/deal/thumb/17.png', '/public/images/deal/big/17.png', 'Lorem ipsum dolor sit amet, consectetur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 0, 7, 0, '2015-08-03 00:00:00', '1'),
(18, 'Gym Instruments upto 45% off', 12, 1, '2015-07-23 09:04:27', '/public/images/deal/thumb/18.jpg', '/public/images/deal/big/18.jpg', 'Lorem ipsum dolor sit amet, lit, sed do eiusmod.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 0, 2, 0, '2015-07-31 00:00:00', '1'),
(19, 'Apple Desktop', 10, 1, '2015-07-24 17:17:33', '/public/images/deal/thumb/19.jpg', '/public/images/deal/big/19.jpg', '15% off on all desktop', 'Buy today and get flat 15% OFF an all Apple desktop at Chroma. \r\nAlso win Exciting gift vouchers and goodies.\r\n*Conditions Apply', 0, 2, 0, '2015-07-26 00:00:00', '1'),
(20, 'Ray-ban Sunglasses', 9, 1, '2015-07-24 17:21:39', '/public/images/deal/thumb/20.jpg', '/public/images/deal/big/20.jpg', 'End of Season - FLAT 25% on Sunglasses', 'Valid only for weekend.\r\n End of Season - F L A T 25% on Ray-ban Sunglasses', 0, 3, 0, '2015-08-01 00:00:00', '1'),
(21, 'Demo Deal', 6, 1, '2015-08-03 17:35:20', '/public/images/deal/thumb/21.jpg', '/public/images/deal/big/21.jpg', 'Test', 'Demo description', 0, 0, 0, '2015-10-02 18:30:00', '1'),
(22, 'test', 9, 1, '2015-08-03 17:41:28', '/public/images/deal/thumb/default.png', '/public/images/deal/big/default.png', 'demo', 'demo', 0, 0, 0, '2015-10-02 18:30:00', '1'),
(23, 'test', 9, 1, '2015-08-03 17:53:46', '/public/images/deal/thumb/23.jpg', '/public/images/deal/big/23.jpg', 'demo', 'demo', 0, 0, 0, '2015-10-02 18:30:00', '1'),
(24, 'demo', 2, 1, '2015-08-03 18:03:12', '/public/images/deal/thumb/24.png', '/public/images/deal/big/24.png', 'demo', 'demo', 0, 0, 0, '2015-09-04 18:30:00', '1'),
(25, 'demo', 1, 1, '2015-08-03 18:37:48', '/public/images/deal/thumb/25.jpg', '/public/images/deal/big/25.jpg', 'demo', 'demo', 0, 0, 0, '2015-09-03 18:30:00', '1'),
(26, 'demo', 1, 1, '2015-08-03 18:39:59', '/public/images/deal/thumb/26.jpg', '/public/images/deal/big/26.jpg', 'demo', 'demo', 0, 0, 0, '2015-09-03 18:30:00', '1'),
(27, 'demo', 1, 1, '2015-08-03 18:42:03', '/public/images/deal/thumb/27.jpg', '/public/images/deal/big/27.jpg', 'demo', 'demo', 0, 0, 0, '2015-09-03 18:30:00', '1'),
(28, 'gcm test', 1, 1, '2015-08-03 18:43:20', '/public/images/deal/thumb/28.jpg', '/public/images/deal/big/28.jpg', 'test', 'test', 0, 0, 0, '2015-09-03 18:30:00', '1'),
(29, 'oijfo', 1, 1, '2015-08-03 18:46:13', '/public/images/deal/thumb/29.jpg', '/public/images/deal/big/29.jpg', 'dfj', 'osijfg', 0, 0, 0, '2015-08-28 18:30:00', '1'),
(30, 'asdfasfd', 1, 1, '2015-08-03 19:08:09', '/public/images/deal/thumb/30.jpg', '/public/images/deal/big/30.jpg', 'asfasf', 'asdfasf', 0, 0, 0, '2015-09-01 18:30:00', '1'),
(31, 'demo', 2, 1, '2015-08-03 19:10:50', '/public/images/deal/thumb/31.png', '/public/images/deal/big/31.png', 'demo', 'demo', 0, 0, 0, '2015-09-03 18:30:00', '1'),
(32, 'demo', 3, 1, '2015-08-03 19:13:11', '/public/images/deal/thumb/32.jpg', '/public/images/deal/big/32.jpg', 'kbkbkbkb', 'jhkjkb', 0, 0, 0, '2015-09-04 18:30:00', '1'),
(33, 'demo', 3, 1, '2015-08-03 19:13:38', '/public/images/deal/thumb/33.jpg', '/public/images/deal/big/33.jpg', 'kbkbkbkb', 'jhkjkb', 0, 0, 0, '2015-09-04 18:30:00', '1'),
(34, 'demo', 16, 1, '2015-08-03 19:15:59', '/public/images/deal/thumb/34.jpg', '/public/images/deal/big/34.jpg', 'kbkbkbkb', 'jhkjkb', 0, 0, 0, '2015-09-04 18:30:00', '1'),
(35, 'demo', 16, 1, '2015-08-03 19:17:03', '/public/images/deal/thumb/35.jpg', '/public/images/deal/big/35.jpg', 'kbkbkbkb', 'jhkjkb', 0, 0, 0, '2015-09-04 18:30:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deal_region`
--

CREATE TABLE IF NOT EXISTS `deal_region` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `dealId` int(10) unsigned NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dealregion_ibfk_1` (`dealId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `deal_region`
--

INSERT INTO `deal_region` (`id`, `dealId`, `country`, `city`, `state`) VALUES
(1, 21, 'India', 'Kolkata', 'West Bengal'),
(2, 23, 'India', 'Pune', 'Maharashtra'),
(3, 24, '', 'Delhi', 'India'),
(4, 25, 'India', 'Tatanagar', 'Jharkhand'),
(5, 26, 'India', 'Tatanagar', 'Jharkhand'),
(6, 27, 'India', 'Tatanagar', 'Jharkhand'),
(7, 28, 'India', 'Tembhurni', 'Maharashtra'),
(8, 29, 'India', 'Kolkata', 'West Bengal'),
(10, 31, 'India', 'Thane', 'Maharashtra'),
(11, 32, 'India', 'Kolhapur', 'Maharashtra'),
(12, 33, 'India', 'Kolhapur', 'Maharashtra'),
(13, 34, 'India', 'Kolhapur', 'Maharashtra'),
(14, 35, 'India', 'Kolhapur', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `seen`
--

CREATE TABLE IF NOT EXISTS `seen` (
  `relationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `dealId` int(10) unsigned NOT NULL,
  `favourite` varchar(1) NOT NULL,
  `rating` int(2) NOT NULL,
  PRIMARY KEY (`relationId`),
  KEY `userId` (`userId`),
  KEY `dealId` (`dealId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `seen`
--

INSERT INTO `seen` (`relationId`, `userId`, `dealId`, `favourite`, `rating`) VALUES
(1, 4, 1, '0', 0),
(2, 2, 1, '0', 0),
(3, 6, 1, '0', 0),
(4, 7, 1, '0', 0),
(5, 9, 1, '0', 0),
(6, 9, 2, '0', 0),
(7, 9, 5, '0', 0),
(8, 9, 4, '0', 0),
(9, 9, 8, '0', 0),
(10, 9, 7, '0', 0),
(11, 10, 2, '0', 0),
(12, 10, 1, '0', 0),
(13, 10, 9, '0', 0),
(14, 10, 6, '0', 0),
(15, 10, 4, '0', 0),
(16, 10, 8, '0', 0),
(17, 10, 5, '0', 0),
(18, 10, 3, '0', 0),
(19, 10, 10, '0', 0),
(20, 3, 2, '0', 0),
(21, 3, 17, '0', 0),
(22, 3, 8, '0', 0),
(23, 3, 13, '0', 0),
(24, 3, 15, '0', 0),
(25, 3, 12, '0', 0),
(26, 3, 4, '0', 0),
(27, 13, 2, '0', 0),
(28, 13, 16, '0', 0),
(29, 13, 14, '0', 0),
(30, 13, 15, '0', 0),
(31, 13, 10, '0', 0),
(32, 13, 11, '0', 0),
(33, 13, 13, '0', 0),
(34, 13, 17, '0', 0),
(35, 13, 12, '0', 0),
(36, 13, 19, '0', 0),
(37, 13, 20, '0', 0),
(38, 14, 9, '0', 0),
(39, 14, 14, '0', 0),
(40, 14, 12, '0', 0),
(41, 14, 16, '0', 0),
(42, 13, 8, '0', 0),
(43, 1, 4, '0', 0),
(44, 1, 20, '0', 0),
(45, 1, 8, '0', 0),
(46, 1, 2, '0', 0),
(47, 1, 5, '0', 0),
(48, 1, 10, '0', 0),
(49, 1, 19, '0', 0),
(50, 1, 15, '0', 0),
(51, 1, 18, '0', 0),
(52, 1, 9, '0', 0),
(53, 1, 7, '0', 0),
(54, 1, 11, '0', 0),
(55, 1, 14, '0', 0),
(56, 1, 12, '0', 0),
(57, 1, 13, '0', 0),
(58, 1, 16, '0', 0),
(59, 14, 20, '0', 0),
(60, 3, 5, '0', 0),
(61, 3, 18, '0', 0),
(62, 3, 7, '0', 0),
(63, 16, 17, '0', 0),
(64, 16, 11, '0', 0),
(65, 16, 7, '0', 0),
(66, 16, 15, '0', 0),
(67, 18, 2, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subscriptionId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `categoryId` int(5) unsigned NOT NULL,
  `subscribedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriptionId`),
  KEY `userId` (`userId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=406 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscriptionId`, `userId`, `categoryId`, `subscribedOn`) VALUES
(1, 2, 1, '2015-06-29 13:58:07'),
(2, 4, 1, '2015-07-09 22:34:25'),
(3, 4, 2, '2015-07-09 22:34:25'),
(4, 6, 1, '2015-07-12 13:57:46'),
(5, 6, 2, '2015-07-12 13:57:46'),
(9, 8, 1, '2015-07-12 14:41:17'),
(10, 8, 2, '2015-07-12 14:41:17'),
(11, 9, 1, '2015-07-12 14:43:32'),
(12, 9, 1, '2015-07-12 14:43:32'),
(15, 9, 2, '2015-07-12 20:40:00'),
(17, 7, 1, '2015-07-13 10:13:06'),
(18, 7, 2, '2015-07-13 10:13:07'),
(19, 7, 11, '2015-07-13 10:13:07'),
(20, 7, 12, '2015-07-13 10:13:07'),
(21, 7, 13, '2015-07-13 10:13:07'),
(22, 7, 14, '2015-07-13 10:13:07'),
(23, 7, 15, '2015-07-13 10:13:07'),
(63, 9, 3, '2015-07-14 21:28:33'),
(64, 9, 4, '2015-07-14 21:28:33'),
(65, 9, 5, '2015-07-14 21:28:33'),
(66, 9, 6, '2015-07-14 21:28:33'),
(67, 9, 7, '2015-07-14 21:28:33'),
(68, 9, 8, '2015-07-14 21:28:33'),
(69, 9, 9, '2015-07-14 21:28:33'),
(70, 9, 10, '2015-07-14 21:28:33'),
(71, 9, 11, '2015-07-14 21:28:33'),
(73, 9, 13, '2015-07-14 21:28:33'),
(74, 9, 14, '2015-07-14 21:28:33'),
(75, 9, 15, '2015-07-14 21:28:33'),
(107, 10, 1, '2015-07-15 01:31:19'),
(108, 16, 2, '2015-07-15 01:32:21'),
(109, 10, 3, '2015-07-15 01:32:21'),
(110, 10, 4, '2015-07-15 01:32:21'),
(122, 10, 5, '2015-07-15 12:24:14'),
(123, 10, 6, '2015-07-15 12:24:14'),
(124, 10, 7, '2015-07-15 12:24:14'),
(125, 10, 8, '2015-07-15 12:24:14'),
(126, 10, 9, '2015-07-15 12:24:14'),
(127, 10, 10, '2015-07-15 12:24:14'),
(128, 10, 11, '2015-07-15 12:24:14'),
(129, 10, 12, '2015-07-15 12:24:14'),
(130, 10, 13, '2015-07-15 12:24:14'),
(131, 10, 14, '2015-07-15 12:24:14'),
(132, 10, 15, '2015-07-15 12:24:14'),
(133, 11, 1, '2015-07-17 21:03:25'),
(134, 11, 2, '2015-07-17 21:03:25'),
(135, 11, 3, '2015-07-17 21:03:25'),
(136, 11, 4, '2015-07-17 21:03:25'),
(137, 11, 5, '2015-07-17 21:03:25'),
(138, 11, 6, '2015-07-17 21:03:25'),
(139, 11, 7, '2015-07-17 21:03:25'),
(140, 11, 8, '2015-07-17 21:03:25'),
(141, 11, 9, '2015-07-17 21:03:25'),
(142, 11, 10, '2015-07-17 21:03:25'),
(143, 11, 11, '2015-07-17 21:03:25'),
(144, 11, 12, '2015-07-17 21:03:25'),
(145, 11, 13, '2015-07-17 21:03:25'),
(146, 11, 14, '2015-07-17 21:03:25'),
(147, 11, 15, '2015-07-17 21:03:25'),
(148, 12, 1, '2015-07-17 21:07:39'),
(149, 12, 2, '2015-07-17 21:07:39'),
(150, 12, 3, '2015-07-17 21:07:39'),
(151, 12, 4, '2015-07-17 21:07:39'),
(152, 12, 5, '2015-07-17 21:07:39'),
(153, 12, 6, '2015-07-17 21:07:39'),
(154, 12, 7, '2015-07-17 21:07:39'),
(155, 12, 8, '2015-07-17 21:07:39'),
(156, 12, 9, '2015-07-17 21:07:39'),
(157, 12, 10, '2015-07-17 21:07:39'),
(158, 12, 11, '2015-07-17 21:07:39'),
(159, 12, 12, '2015-07-17 21:07:39'),
(160, 12, 13, '2015-07-17 21:07:39'),
(161, 12, 14, '2015-07-17 21:07:39'),
(162, 12, 15, '2015-07-17 21:07:39'),
(241, 14, 11, '2015-07-24 18:00:48'),
(246, 14, 9, '2015-07-24 18:02:05'),
(264, 3, 1, '2015-07-24 20:30:51'),
(281, 3, 4, '2015-07-24 20:32:38'),
(288, 13, 2, '2015-07-24 20:33:38'),
(289, 13, 3, '2015-07-24 20:33:38'),
(300, 1, 4, '2015-07-25 00:24:31'),
(301, 1, 5, '2015-07-25 00:24:31'),
(302, 1, 8, '2015-07-25 00:24:31'),
(303, 1, 9, '2015-07-25 00:24:31'),
(304, 1, 10, '2015-07-25 00:25:27'),
(305, 1, 11, '2015-07-25 00:25:27'),
(306, 1, 12, '2015-07-25 00:25:27'),
(307, 1, 13, '2015-07-25 00:25:27'),
(308, 1, 14, '2015-07-25 00:25:27'),
(309, 1, 15, '2015-07-25 00:25:27'),
(310, 3, 2, '2015-07-26 20:02:42'),
(311, 3, 3, '2015-07-26 20:02:42'),
(312, 3, 5, '2015-07-26 20:02:42'),
(313, 3, 6, '2015-07-26 20:02:42'),
(314, 3, 7, '2015-07-26 20:02:42'),
(315, 3, 8, '2015-07-26 20:02:42'),
(316, 3, 9, '2015-07-26 20:02:42'),
(317, 3, 10, '2015-07-26 20:02:42'),
(318, 3, 11, '2015-07-26 20:02:42'),
(319, 3, 12, '2015-07-26 20:02:42'),
(320, 3, 13, '2015-07-26 20:02:42'),
(321, 3, 14, '2015-07-26 20:02:42'),
(322, 3, 15, '2015-07-26 20:02:42'),
(323, 3, 16, '2015-07-26 20:02:42'),
(324, 13, 1, '2015-07-26 20:49:35'),
(338, 15, 1, '2015-07-26 23:45:27'),
(339, 15, 2, '2015-07-26 23:45:27'),
(340, 15, 3, '2015-07-26 23:45:27'),
(341, 15, 4, '2015-07-26 23:45:27'),
(342, 15, 5, '2015-07-26 23:45:27'),
(343, 15, 6, '2015-07-26 23:45:27'),
(344, 15, 7, '2015-07-26 23:45:27'),
(345, 15, 8, '2015-07-26 23:45:27'),
(346, 15, 9, '2015-07-26 23:45:27'),
(347, 15, 10, '2015-07-26 23:45:27'),
(348, 15, 11, '2015-07-26 23:45:27'),
(349, 15, 12, '2015-07-26 23:45:27'),
(350, 15, 13, '2015-07-26 23:45:27'),
(351, 15, 14, '2015-07-26 23:45:27'),
(352, 15, 15, '2015-07-26 23:45:27'),
(353, 15, 16, '2015-07-26 23:45:27'),
(354, 13, 4, '2015-07-27 00:55:29'),
(355, 13, 5, '2015-07-27 00:55:29'),
(356, 13, 6, '2015-07-27 00:55:29'),
(357, 13, 7, '2015-07-27 00:55:29'),
(358, 16, 1, '2015-07-28 02:21:02'),
(359, 16, 2, '2015-07-28 02:21:02'),
(360, 16, 3, '2015-07-28 02:21:02'),
(361, 16, 4, '2015-07-28 02:21:02'),
(362, 16, 5, '2015-07-28 02:21:03'),
(363, 16, 6, '2015-07-28 02:21:03'),
(364, 16, 7, '2015-07-28 02:21:03'),
(365, 16, 8, '2015-07-28 02:21:03'),
(366, 16, 9, '2015-07-28 02:21:03'),
(367, 16, 10, '2015-07-28 02:21:03'),
(368, 16, 11, '2015-07-28 02:21:03'),
(369, 16, 12, '2015-07-28 02:21:03'),
(370, 16, 13, '2015-07-28 02:21:03'),
(371, 16, 14, '2015-07-28 02:21:03'),
(372, 16, 15, '2015-07-28 02:21:03'),
(373, 16, 16, '2015-07-28 02:21:03'),
(374, 17, 1, '2015-07-28 22:36:35'),
(375, 17, 2, '2015-07-28 22:36:35'),
(376, 17, 3, '2015-07-28 22:36:35'),
(377, 17, 4, '2015-07-28 22:36:35'),
(378, 17, 5, '2015-07-28 22:36:35'),
(379, 17, 6, '2015-07-28 22:36:35'),
(380, 17, 7, '2015-07-28 22:36:35'),
(381, 17, 8, '2015-07-28 22:36:35'),
(382, 17, 9, '2015-07-28 22:36:35'),
(383, 17, 10, '2015-07-28 22:36:35'),
(384, 17, 11, '2015-07-28 22:36:35'),
(385, 17, 12, '2015-07-28 22:36:35'),
(386, 17, 13, '2015-07-28 22:36:35'),
(387, 17, 14, '2015-07-28 22:36:35'),
(388, 17, 15, '2015-07-28 22:36:35'),
(389, 17, 16, '2015-07-28 22:36:35'),
(390, 18, 1, '2015-07-29 00:03:13'),
(391, 18, 2, '2015-07-29 00:03:13'),
(392, 18, 3, '2015-07-29 00:03:13'),
(393, 18, 4, '2015-07-29 00:03:13'),
(394, 18, 5, '2015-07-29 00:03:13'),
(395, 18, 6, '2015-07-29 00:03:13'),
(396, 18, 7, '2015-07-29 00:03:13'),
(397, 18, 8, '2015-07-29 00:03:13'),
(398, 18, 9, '2015-07-29 00:03:13'),
(399, 18, 10, '2015-07-29 00:03:14'),
(400, 18, 11, '2015-07-29 00:03:14'),
(401, 18, 12, '2015-07-29 00:03:14'),
(402, 18, 13, '2015-07-29 00:03:14'),
(403, 18, 14, '2015-07-29 00:03:14'),
(404, 18, 15, '2015-07-29 00:03:14'),
(405, 18, 16, '2015-07-29 00:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `os` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fbStatus` varchar(1) NOT NULL,
  `registeredOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `os`, `token`, `firstName`, `lastName`, `email`, `mobile`, `country`, `state`, `city`, `password`, `fbStatus`, `registeredOn`) VALUES
(1, 'iOS 9', '-', 'Biswajit', 'Bardhan', 'bforbiswajit@outlook.com', '9762577346', 'India', '', 'Pune', '24/4Hb15npAe.', '0', '2015-07-11 07:20:42'),
(2, 'Android 4.2.2', '-', 'Danish', 'Nadaf', 'danishn@cybage.com', '9876543210', 'India', '', 'Pune', '18nDMhanAU0hs', '0', '2015-07-11 07:20:42'),
(3, 'iOS 8.3', '12345', 'Tushar', 'Katakdound', 'tushar02.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '29jAIVogFgTLg', '0', '2015-07-11 07:20:42'),
(4, 'Android', '12345', 'Tushar', 'Katakdound', 'abc.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '24alwVoc4uJA6', '1', '2015-07-11 07:20:42'),
(5, 'Android', '12345', 'Tushar', 'Katakdound', 'tinu02.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '27iuCbiEVVgV.', '0', '2015-07-12 12:34:26'),
(6, 'Android', '12345', 'Tushar', 'Katakdound', 'tushar.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '27iuCbiEVVgV.', '0', '2015-07-12 13:50:10'),
(7, 'Android', '12345', 'danish', 'nadaf', 'danishnadaf@gmail.com', '8793700938', 'India', '', 'Pune', '21Cnlz3R/lOSo', '1', '2015-07-12 14:32:49'),
(8, 'Android', '12345', 'Tushar', 'Katakdound', 't.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '22Qs4eXwOpzhM', '0', '2015-07-12 14:41:11'),
(9, 'Android', '12345', 'Tushar', 'Katakdound', 'tushar@gmail.com', '8983472919', 'India', '', 'Pune', '16MPw8fXNKuLw', '0', '2015-07-12 14:43:18'),
(10, 'Android', '12345', 'danish', 'nadaf', 'danishnadaf1@gmail.com', '8793700938', 'India', '', 'Pune', '22Qs4eXwOpzhM', '0', '2015-07-15 01:27:24'),
(11, 'Android', '12345', 'Tushar', 'Katakdound', 'king02.katakdound@gmail.com', '8983472919', 'India', '', 'Pune', '27BAKy3Efkrbk', '0', '2015-07-17 21:03:08'),
(12, 'Android', '12345', 'Tushar', 'Katakdound', 'tu02.katakdound@gmail.com', '8983472919', 'America', '', 'Pune', '25scwPWKPL3u2', '0', '2015-07-17 21:07:31'),
(13, 'Android', '12345', 'danish', 'nadaf', 'danishn@technokratz.in', '8793700938', 'India', '', 'Pune', '22zIcKfv036hs', '0', '2015-07-24 14:19:15'),
(14, 'Android', '12345', 'Abhishek', 'More', 'abhishekmore@gmail.com', '9822094656', 'India', '', 'Pune', '22aWC8J8BG.uQ', '0', '2015-07-24 18:00:26'),
(15, 'Android', '12345', 'Milind', 'Katakdound', 'sunil02.katakdound@gmail.com', '9421058940', 'India', '', 'Pune', '28erUYQjwNPek', '0', '2015-07-26 23:45:15'),
(16, 'Android', 'dW5DKwQceZw:APA91bGlxf3JfXR8XTo6UKKuE73QJ6qbT1CrvT-nMjj-UKf68ylUXncq9R77zxOzDtZFgymHRe9cMMZ9zyGIJf1BbFF1wn6Gl0_dCsIa_SesMYjLKkrcHXs4yAl-9etu9L9EfNzZKXPs', 'Tushar', 'Katakdound', 'tushar02.katakdound@technokrat', '8983472919', 'India', '', 'Pune', '35saZ1IJNhQ8Y', '0', '2015-07-28 02:20:49'),
(17, 'Android', 'eCvXZn7srXM:APA91bED0E79uUcHBWKURKSXQIFScuPuTUE5TBg6uhssPeMK4Uj2I_BBk7AgUcqJxAt6kgcZ0xwbQEXtaiQ2eAnuneCiN58NNwEnuhj9lsUmy1CV-uyNIQO1FHJn2l4viNYI8hW_mR50', 'Tushar', 'Katakdound', 'king.katakdound@technokratz.co', '8983472919', 'India', '', 'Pune', '31QVoY8q4ORsA', '0', '2015-07-28 22:34:51'),
(18, 'Android', 'fexKWPwqHG8:APA91bEyBJ_HdN49wyHRWQnkr9vdnTjOrNURTFXWJslf7JG-ea89t7I_JPaHT3100M8L6pYlMu7qf9KjJ1fa2SozTFN_8CFW2izlml1Qm9tih-FOd1y9_HSzbmtTAuhDnMK45xmHZhUX', 'Tushar', 'Katakdound', 'asd123@gmail.com', '8983472919', 'India', '', 'Pune', '16wmi9Sjo68Mo', '0', '2015-07-29 00:02:52'),
(20, 'Android 5', 'fexKWPwqHG8:APA91bEyBJ_HdN49wyHRWQnkr9vdnTjOrNURTFXWJslf7JG-ea89t7I_JPaHT3100M8L6pYlMu7qf9KjJ1fa2SozTFN_8CFW2izlml1Qm9tih-FOd1y9_HSzbmtTAuhDnMK45xmHZhUX', 'Shritesh', 'Avlani', 'shritesh.avlani@example.com', '3214569870', 'India', 'Gujrat', 'Gandhinagar', '27CTA8PEUosXA', '0', '2015-08-03 19:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` int(250) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `email`, `username`, `password`, `lastLogin`, `name`) VALUES
(1, 'bforbiswajit@outlook.com', 'bforbiswajit', 12345, '2015-07-05 10:10:26', 'Biswajit');

-- --------------------------------------------------------

--
-- Table structure for table `vendorinfo`
--

CREATE TABLE IF NOT EXISTS `vendorinfo` (
  `vendorId` int(10) unsigned NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `businessTitle` varchar(60) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `registeredOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vendorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendorinfo`
--

INSERT INTO `vendorinfo` (`vendorId`, `firstName`, `lastName`, `businessTitle`, `desc`, `registeredOn`) VALUES
(1, 'Biswajit', 'Bardhan', 'Technokratz', 'Software Development', '2015-07-05 10:11:05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`dealId`) REFERENCES `deals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `deals_ibfk_2` FOREIGN KEY (`vendorId`) REFERENCES `vendor` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `deal_region`
--
ALTER TABLE `deal_region`
  ADD CONSTRAINT `dealregion_ibfk_1` FOREIGN KEY (`dealId`) REFERENCES `deals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seen`
--
ALTER TABLE `seen`
  ADD CONSTRAINT `seen_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seen_ibfk_2` FOREIGN KEY (`dealId`) REFERENCES `deals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendorinfo`
--
ALTER TABLE `vendorinfo`
  ADD CONSTRAINT `vendorinfo_ibfk_1` FOREIGN KEY (`vendorId`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
