-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2015 at 08:11 PM
-- Server version: 5.6.20
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buzzer`
--
CREATE DATABASE IF NOT EXISTS `buzzer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `buzzer`;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `TeamName` varchar(40) NOT NULL,
  `IPAddress` varchar(100) NOT NULL,
  `PressTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `TeamName`, `IPAddress`, `PressTime`) VALUES
(1, 'jill', '127.0.0.1', '2015-02-15 18:08:23'),
(2, 'kio', '127.0.0.1', '2015-02-15 18:11:03'),
(3, 'lk', '127.0.0.1', '2015-02-15 18:17:06'),
(4, 'kl', '127.0.0.1', '2015-02-15 19:49:20'),
(5, 'hjk', '127.0.0.1', NULL),
(6, 'hjk', '127.0.0.1', NULL),
(7, 'bm', '127.0.0.1', NULL),
(8, 'jk', '127.0.0.1', '2015-02-15 18:50:00'),
(9, 'jol', '127.0.0.1', '2015-02-15 18:50:40'),
(10, 'io', '127.0.0.1', NULL),
(11, 'mk', '127.0.0.1', NULL),
(12, 'hj', '127.0.0.1', NULL),
(13, 'a', '127.0.0.1', NULL),
(14, 'oil', '127.0.0.1', NULL),
(15, 'jki', '127.0.0.1', NULL),
(16, 'jkx', '127.0.0.1', NULL),
(17, 'n', '127.0.0.1', '2015-02-15 19:28:20'),
(18, 'bn', '127.0.0.1', '2015-02-15 19:36:45'),
(19, 'bk', '127.0.0.1', '2015-02-15 19:41:00'),
(20, 'ji', '127.0.0.1', '2015-02-15 19:43:09'),
(21, 'nm', '127.0.0.1', '2015-02-15 19:46:27'),
(22, 'jl', '127.0.0.1', '2015-02-15 19:47:03'),
(23, 'nml', '127.0.0.1', '2015-02-15 19:48:52'),
(24, 'kl', '127.0.0.1', '2015-02-15 19:49:20'),
(25, 'l', '127.0.0.1', '2015-02-15 19:49:50'),
(26, 'cv', '127.0.0.1', '2015-02-15 19:50:36'),
(27, 'mc', '127.0.0.1', '2015-02-15 19:51:56'),
(28, 'md', '127.0.0.1', '2015-02-15 19:52:25'),
(29, 'ms', '127.0.0.1', '2015-02-15 19:53:13'),
(30, 'ty', '127.0.0.1', '2015-02-15 19:55:21'),
(31, 'gh', '127.0.0.1', '2015-02-15 19:56:49'),
(32, 'bnl', '127.0.0.1', '2015-02-15 19:57:32'),
(33, 'jkl', '127.0.0.1', '2015-02-15 20:09:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
