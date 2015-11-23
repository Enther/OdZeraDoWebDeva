-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2015 at 11:41 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ksiazki`
--

-- --------------------------------------------------------

--
-- Table structure for table `regal`
--

CREATE TABLE IF NOT EXISTS `regal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tytul` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `recenzja` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `regal`
--

INSERT INTO `regal` (`id`, `autor`, `tytul`, `recenzja`) VALUES
(11, 'rrrrrrr', 'rrrrrr', 'rrrrrrrr'),
(12, 'werw', 'wer', 'er');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
