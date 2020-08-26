-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 aug 2020 om 08:37
-- Serverversie: 10.4.10-MariaDB
-- PHP-versie: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `arrivingport`
--

DROP TABLE IF EXISTS `arrivingport`;
CREATE TABLE IF NOT EXISTS `arrivingport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timepassend` time NOT NULL,
  `datepassend` date NOT NULL,
  `pilotboardtime` time NOT NULL,
  `pilotboarddate` date NOT NULL,
  `distsailedNM` int(11) NOT NULL,
  `berthtime` time NOT NULL,
  `berthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `atsea`
--

DROP TABLE IF EXISTS `atsea`;
CREATE TABLE IF NOT EXISTS `atsea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seacondition` varchar(64) NOT NULL,
  `speedknots` varchar(128) NOT NULL,
  `pilotdistNM` int(11) NOT NULL,
  `pilottime` time NOT NULL,
  `pilotdate` date NOT NULL,
  `destport` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargodescription` varchar(1000) NOT NULL,
  `cargodimM` varchar(256) NOT NULL,
  `cargoweightT` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `departport`
--

DROP TABLE IF EXISTS `departport`;
CREATE TABLE IF NOT EXISTS `departport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargocomptime` time NOT NULL,
  `departtime` time NOT NULL,
  `departdate` date NOT NULL,
  `droptime` time NOT NULL,
  `dropdate` date NOT NULL,
  `nextport` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `general`
--

DROP TABLE IF EXISTS `general`;
CREATE TABLE IF NOT EXISTS `general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship` varchar(64) NOT NULL,
  `captain` varchar(128) NOT NULL,
  `curtime` time NOT NULL,
  `curdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
