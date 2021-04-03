-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 03. Apr 2021 um 13:07
-- Server-Version: 5.7.24
-- PHP-Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `famla`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patienthealthinfo`
--

DROP TABLE IF EXISTS `patienthealthinfo`;
CREATE TABLE IF NOT EXISTS `patienthealthinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `bloodtype` varchar(3) DEFAULT NULL,
  `rhesus` varchar(1) DEFAULT NULL,
  `allergies` text,
  `bloodpressure` varchar(20) DEFAULT NULL,
  `heartrate` varchar(20) DEFAULT NULL,
  `symptom` text,
  `diagnostic` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `patienthealthinfo`
--

INSERT INTO `patienthealthinfo` (`id`, `patient_id`, `bloodtype`, `rhesus`, `allergies`, `bloodpressure`, `heartrate`, `symptom`, `diagnostic`) VALUES
(1, 60204, 'O', '-', 'Milk, orange', '12', '120', 'fieber', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
