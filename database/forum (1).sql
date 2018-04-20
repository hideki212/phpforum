-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2018 at 09:55 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Category` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryId`),
  UNIQUE KEY `Category` (`Category`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `Category`) VALUES
(1, 'General Discussions'),
(2, 'Malaysia Online Casinos');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `ReplyId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryId` int(10) UNSIGNED DEFAULT NULL,
  `SubcategoryId` int(10) UNSIGNED DEFAULT NULL,
  `TopicId` int(10) UNSIGNED DEFAULT NULL,
  `Author` varchar(50) NOT NULL,
  `Reply` text NOT NULL,
  `Date_Posted` date NOT NULL,
  PRIMARY KEY (`ReplyId`),
  KEY `CategoryId` (`CategoryId`),
  KEY `SubcategoryId` (`SubcategoryId`),
  KEY `TopicId` (`TopicId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`ReplyId`, `CategoryId`, `SubcategoryId`, `TopicId`, `Author`, `Reply`, `Date_Posted`) VALUES
(1, 1, 2, 4, 'test1', '<br />with your small white dick', '2018-04-16'),
(2, 1, 2, 4, 'test1', 'with your small white cock', '2018-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `SubcategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryId` int(10) UNSIGNED DEFAULT NULL,
  `SubcategoryName` varchar(255) NOT NULL,
  `SubcategoryDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SubcategoryId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`SubcategoryId`, `CategoryId`, `SubcategoryName`, `SubcategoryDescription`) VALUES
(1, 1, 'General', 'Discuss anything here '),
(2, 1, 'Other Stuff', 'Other Random General Stuff'),
(3, 2, 'New Casinos', 'Find and post new casinos here'),
(4, 2, 'Bonuses', 'Find and post bonuses here '),
(5, 2, 'Complaints', 'Post your complaints here ');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `TopicId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryId` int(10) UNSIGNED DEFAULT NULL,
  `SubcategoryId` int(10) UNSIGNED DEFAULT NULL,
  `Author` varchar(50) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Content` text NOT NULL,
  `Date_Posted` date NOT NULL,
  `User_Views` int(11) NOT NULL,
  `replies` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`TopicId`),
  KEY `CategoryId` (`CategoryId`),
  KEY `SubcategoryId` (`SubcategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TopicId`, `CategoryId`, `SubcategoryId`, `Author`, `Title`, `Content`, `Date_Posted`, `User_Views`, `replies`) VALUES
(1, 1, 2, 'Joshua', 'Pussy', 'Where to find pussy in malaysia ?', '2017-12-17', 113, 0),
(2, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 102, 0),
(3, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 109, 0),
(4, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 141, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `replies` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `date`, `replies`) VALUES
(1, 'test1', '8cb2237d0679ca88db6464eac60da96345513964', 'test@test.com', '2018-04-16', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
