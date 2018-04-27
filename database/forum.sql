-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2018 at 03:10 AM
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
  `name` longtext,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ReplyId`),
  KEY `CategoryId` (`CategoryId`),
  KEY `SubcategoryId` (`SubcategoryId`),
  KEY `TopicId` (`TopicId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`ReplyId`, `CategoryId`, `SubcategoryId`, `TopicId`, `Author`, `Reply`, `Date_Posted`, `name`, `type`) VALUES
(1, 1, 2, 4, 'test1', '<br />with your small white dick', '2018-04-16', '', ''),
(2, 1, 2, 4, 'test1', 'with your small white cock', '2018-04-16', '', ''),
(3, 2, 3, 5, 'test1', 'bbb', '2018-04-21', '', ''),
(4, 1, 2, 1, 'test1', 'pussy~', '2018-04-21', '', ''),
(5, 2, 3, 7, 'test1', 'dumb', '2018-04-22', '', ''),
(6, 2, 3, 7, 'test1', 'dumb', '2018-04-22', '', ''),
(7, 2, 3, 5, 'test1', 'asdasdsa', '2018-04-27', '5ae27dfbbddc78.51800607.mp4', 'video/mp4'),
(8, 2, 3, 5, 'test1', '', '2018-04-27', '5ae27e0f029aa0.42846871.jpg', 'image/jpeg'),
(9, 2, 3, 6, 'test1', '', '2018-04-27', '5ae27f477e7224.75717069.jpg', 'image/jpeg'),
(10, 2, 3, 6, 'test1', 'assddff', '2018-04-27', '5ae27faa8e5617.54823339.jpg', 'image/jpeg'),
(11, 2, 3, 6, 'test1', 'zzzz', '2018-04-27', '', ''),
(12, 2, 3, 6, 'test1', 'zzzz', '2018-04-27', '', ''),
(13, 2, 3, 7, 'test1', '', '2018-04-27', '5ae28a7b69f8c9.79701236.gif', 'image/gif'),
(14, 2, 3, 5, 'test1', '', '2018-04-27', '', ''),
(15, 2, 3, 5, 'test1', 'asdas', '2018-04-27', '', ''),
(16, 2, 3, 5, 'test1', '', '2018-04-27', '5ae28c3c1cdfc6.37374599.gif', 'image/gif'),
(17, 2, 3, 5, 'test1', '', '2018-04-27', '', ''),
(18, 2, 3, 7, 'test1', '', '2018-04-27', '', '');

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
  `name` longtext,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`TopicId`),
  KEY `CategoryId` (`CategoryId`),
  KEY `SubcategoryId` (`SubcategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TopicId`, `CategoryId`, `SubcategoryId`, `Author`, `Title`, `Content`, `Date_Posted`, `User_Views`, `replies`, `name`, `type`) VALUES
(1, 1, 2, 'Joshua', 'Pussy', 'Where to find pussy in malaysia ?', '2017-12-17', 118, 0, NULL, NULL),
(2, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 106, 0, NULL, NULL),
(3, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 120, 0, NULL, NULL),
(4, 1, 2, 'me', 'How to do this', 'fuck your mom Suck A dick you black Fuck', '2018-04-16', 165, 0, NULL, NULL),
(5, 2, 3, 'test1', 'aaa', 'aaa', '2018-04-21', 113, 4, NULL, NULL),
(6, 2, 3, 'test1', 'asdasd', 'asdas', '2018-04-27', 20, 1, '5ae27f379a7ac1.04626547.mp4', 'video/mp4'),
(7, 2, 3, 'test1', '', '', '2018-04-27', 12, 2, '5ae28a464e5dc1.17886853.gif', 'image/gif'),
(8, 2, 3, 'test1', 'sadas', 'sadsasadas', '2018-04-27', 1, 0, '', ''),
(9, 1, 1, 'test1', 'sadassadas', 'asdas', '2018-04-27', 1, 0, '', ''),
(10, 1, 1, 'test1', '', '', '2018-04-27', 1, 0, '', ''),
(11, 1, 1, 'test1', 'sdasdassad', 'sadsa', '2018-04-27', 1, 0, '', '');

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
