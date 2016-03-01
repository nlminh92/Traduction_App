-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 05:41 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tratu`
--

-- --------------------------------------------------------

--
-- Table structure for table `giai_nghia_tu`
--

DROP TABLE IF EXISTS `giai_nghia_tu`;
CREATE TABLE IF NOT EXISTS `giai_nghia_tu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tu_id` int(11) NOT NULL,
  `loai_tu` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nghia_vn` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta_vn` text COLLATE utf8_unicode_ci,
  `nghia_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta_en` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `tu_id` (`tu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE IF NOT EXISTS `tai_khoan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '123456', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tu_moi`
--

DROP TABLE IF EXISTS `tu_moi`;
CREATE TABLE IF NOT EXISTS `tu_moi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tu_moi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phien_am_1` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phien_am_2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phien_am_3` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tu_dong_nghia` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tu_lien_quan` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tac_gia` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tu_moi` (`tu_moi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
