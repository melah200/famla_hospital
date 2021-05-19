-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 19. Mai 2021 um 16:27
-- Server-Version: 5.7.31
-- PHP-Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tabellenstruktur für Tabelle `admintb`
--

DROP TABLE IF EXISTS `admintb`;
CREATE TABLE IF NOT EXISTS `admintb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admintb`
--

INSERT INTO `admintb` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', '$2y$12$.awQ9nBKUQt8MAJ3Ew8./eTKeu2bkzNhYdmcxkGT/vv0iEpAoE97.', 'vanessa', 'djieya');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appointmenttb`
--

DROP TABLE IF EXISTS `appointmenttb`;
CREATE TABLE IF NOT EXISTS `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(4, 1, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-14', '10:00:00', 1, 0),
(4, 2, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '10:00:00', 0, 1),
(4, 3, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Amit', 1000, '2020-02-19', '03:00:00', 0, 1),
(11, 4, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'ashok', 500, '2020-02-29', '20:00:00', 1, 1),
(4, 5, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '12:00:00', 1, 1),
(4, 6, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-26', '15:00:00', 0, 1),
(2, 8, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'Ganesh', 550, '2020-03-21', '10:00:00', 1, 1),
(5, 9, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'Ganesh', 550, '2020-03-19', '20:00:00', 1, 0),
(4, 10, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '0000-00-00', '14:00:00', 1, 0),
(4, 11, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-03-27', '15:00:00', 1, 1),
(9, 12, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Kumar', 800, '2020-03-26', '12:00:00', 1, 1),
(9, 13, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Tiwary', 450, '2020-03-26', '14:00:00', 1, 1),
(12, 14, 'Armel', 'bel', 'Male', 'melah200@yahoo.fr', '3234545565', 'Dinesh', 700, '2021-02-28', '12:00:00', 1, 1),
(12, 15, 'Armel', 'bel', 'Male', 'melah200@yahoo.fr', '3234545565', 'ashok', 500, '2021-02-28', '12:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `befunde`
--

DROP TABLE IF EXISTS `befunde`;
CREATE TABLE IF NOT EXISTS `befunde` (
  `idB` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateBefunde` date NOT NULL,
  `befunde` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `diagnostic`
--

DROP TABLE IF EXISTS `diagnostic`;
CREATE TABLE IF NOT EXISTS `diagnostic` (
  `idD` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateDiagnoctic` date NOT NULL,
  `typ` text NOT NULL,
  `text` varchar(50) NOT NULL,
  `codessys` varchar(20) NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`idD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctb`
--

DROP TABLE IF EXISTS `doctb`;
CREATE TABLE IF NOT EXISTS `doctb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `doctb`
--

INSERT INTO `doctb` (`username`, `password`, `email`, `spec`, `docFees`) VALUES
('ashok', 'ashok123', 'ashok@gmail.com', 'General', 500),
('arun', 'arun123', 'arun@gmail.com', 'Cardiologist', 600),
('Dinesh', 'dinesh123', 'dinesh@gmail.com', 'General', 700),
('Ganesh', 'ganesh123', 'ganesh@gmail.com', 'Pediatrician', 550),
('Kumar', 'kumar123', 'kumar@gmail.com', 'Pediatrician', 800),
('Amit', 'amit123', 'amit@gmail.com', 'Cardiologist', 1000),
('Abbis', 'abbis123', 'abbis@gmail.com', 'Neurologist', 1500),
('Tiwary', 'tiwary123', 'tiwary@gmail.com', 'Pediatrician', 450);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `idDo` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateDokument` date NOT NULL,
  `title` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`idDo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthday` varchar(16) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_access` varchar(30) NOT NULL,
  `user_function` varchar(30) NOT NULL,
  `registrationDate` varchar(12) NOT NULL,
  `registrationTime` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `birthday`, `username`, `password`, `employee_id`, `status`, `user_access`, `user_function`, `registrationDate`, `registrationTime`) VALUES
(6, 'laura', 'kraft', '1990-01-01', 'laura', '$2y$12$nU4fC37FrPOdL4DMNckV1ePMBOXlec3FA9tbExI/0T80Eex/5ar4y', 33622, 'active', 'employee', 'nurse', '17-03-2021', '09:02:46'),
(3, 'frank', 'doe', '12.05.2000', 'employe', '$2y$12$k6691PFx4Vj9MH8oCsbRbulGK.Bx4TMNZWBA9/5cpY10ChPEVY89K', 3089, 'active', 'employee', 'doctor', '', ''),
(4, 'channel', 'coco', '2021-03-11', 'coco', '$2y$12$hgsQg825G1xsKlzdMOfdfezSk9zPIE2GtDK.HUPeMRLGpzvV7Pq9C', 59544, 'active', 'employee', 'infimiere', '10-03-2021', '17:32:27'),
(5, 'John', 'Doc', '2021-03-09', 'john', '$2y$12$fTY5mnbqP1l6r2eSbNOtEe6NT9nWgZzAbzs6gS19ngQePNgaWuJz6', 84693, 'active', 'employee', 'Doctor', '11-03-2021', '08:15:45'),
(7, 'ABCDE', 'Dimanche', '2021-03-20', 'ABCD', '$2y$12$EY7VErogUpJ.9x3m1Nzzu.5hZc3y7f6X4eOmtAwfcUlPPo3bEe3nS', 37410, 'active', 'employee', 'nurse', '21-03-2021', '13:21:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `idH` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `zeitraume` date NOT NULL,
  `Station_Raum` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idH`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `impfung`
--

DROP TABLE IF EXISTS `impfung`;
CREATE TABLE IF NOT EXISTS `impfung` (
  `idI` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateImpfung` date NOT NULL,
  `nameImpfung` varchar(50) NOT NULL,
  `krankkeit` text NOT NULL,
  `dosis` varchar(100) NOT NULL,
  PRIMARY KEY (`idI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `maßnahmen`
--

DROP TABLE IF EXISTS `maßnahmen`;
CREATE TABLE IF NOT EXISTS `maßnahmen` (
  `idM` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateMaßnahme` date NOT NULL,
  `maßnahme` text NOT NULL,
  PRIMARY KEY (`idM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medikationplan`
--

DROP TABLE IF EXISTS `medikationplan`;
CREATE TABLE IF NOT EXISTS `medikationplan` (
  `idMP` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateMedicationplan` date NOT NULL,
  `medicament` varchar(50) NOT NULL,
  `freq` varchar(50) NOT NULL,
  `tagesprofil` text NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`idMP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notfalldaten`
--

DROP TABLE IF EXISTS `notfalldaten`;
CREATE TABLE IF NOT EXISTS `notfalldaten` (
  `idN` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `Angabe` text NOT NULL,
  `ausprägung` text NOT NULL,
  PRIMARY KEY (`idN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patreg`
--

DROP TABLE IF EXISTS `patreg`;
CREATE TABLE IF NOT EXISTS `patreg` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthday` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bloodtype` enum('A','B','AB','O') NOT NULL,
  `rhesus` enum('+','-') NOT NULL,
  `registrationDate` varchar(12) NOT NULL,
  `registrationTime` varchar(16) NOT NULL,
  `patient_id` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `birthday`, `email`, `phone`, `address`, `bloodtype`, `rhesus`, `registrationDate`, `registrationTime`, `patient_id`) VALUES
(35, 'koko', 'koko', 'Male', '2021-03-13', 'kloklo@gmx.de', '494967676', 'street 5656', 'AB', '+', '10-03-2021', '00:58:07', 38072),
(36, 'Bertrand', 'Takam', 'Male', '2021-03-11', 'kloklo@gmx.de', '494967676', 'street 5656', 'AB', '+', '10-03-2021', '00:59:02', 77056),
(37, 'ursula', 'klima', 'Female', '1960-12-15', '', '25467895321', '', 'A', '+', '17-03-2021', '07:57:47', 12229),
(38, 'ursula', 'klima', 'Female', '1960-12-12', '', '25467895321', '', 'O', '+', '17-03-2021', '09:15:59', 28041);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prestb`
--

DROP TABLE IF EXISTS `prestb`;
CREATE TABLE IF NOT EXISTS `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganesh', 2, 8, 'Alia', 'Bhatt', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumar', 9, 12, 'William', 'Blake', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwary', 9, 13, 'William', 'Blake', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `untersuchung`
--

DROP TABLE IF EXISTS `untersuchung`;
CREATE TABLE IF NOT EXISTS `untersuchung` (
  `idU` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateUntersuchung` date NOT NULL,
  `untersuchung` text NOT NULL,
  `untersuchung_ergebnisse` text NOT NULL,
  `notizen` text NOT NULL,
  PRIMARY KEY (`idU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
