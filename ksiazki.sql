-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2015 at 10:19 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.15-1+deb.sury.org~trusty+1

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `regal`
--

INSERT INTO `regal` (`id`, `autor`, `tytul`, `recenzja`) VALUES
(15, 'ert', 'ert', 'ert'),
(16, 'ert', 'ert', 'ert'),
(17, 'ert', 'ert', 'ert'),
(18, 'ert', 'ert', 'ert'),
(19, 'ert', 'ert', 'ert'),
(20, 'ert', 'ert', 'ert'),
(21, 'ert', 'ert', 'ert'),
(22, 'wer', 'we', 'wer'),
(23, 'aaaaaaaaaa', 'rrrrrr', 'rrrrrrrr'),
(24, 'aaaa', 'rrrrrr', 'rrrrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'dyktek', '46f94c8de14fb36680850768ff1b7f2a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
