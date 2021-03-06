-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 30. Jun 2021 um 05:36
-- Server-Version: 5.7.26
-- PHP-Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `idA` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateMassnahme` date NOT NULL,
  `massnahme` text NOT NULL,
  PRIMARY KEY (`idA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addappointment`
--

DROP TABLE IF EXISTS `addappointment`;
CREATE TABLE IF NOT EXISTS `addappointment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `patient` varchar(25) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `doctor` varchar(25) NOT NULL,
  `app_date` varchar(50) NOT NULL,
  `starttime` varchar(100) DEFAULT NULL,
  `endtime` varchar(100) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sms` enum('0','1') NOT NULL DEFAULT '0',
  `app_status` enum('upcoming','perceived','cancelled') NOT NULL DEFAULT 'upcoming',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Daten für Tabelle `addappointment`
--

INSERT INTO `addappointment` (`id`, `patient`, `name`, `phone`, `email`, `doctor`, `app_date`, `starttime`, `endtime`, `remark`, `sms`, `app_status`) VALUES
(1, '4', NULL, NULL, NULL, 'Kanga', '2021-04-16', '07:00', '08:00', 'für eine Untersuchung', '1', 'perceived'),
(2, '2', NULL, NULL, NULL, 'Amadou', '2021-04-18', '08:15', '09:15', 'Impfung', '1', 'cancelled'),
(5, '3', NULL, NULL, NULL, 'kamto', '2021-04-11', '20:00', '21:00', 'OP', '0', 'upcoming'),
(14, NULL, 'carmelo', 12345678, 'hjhjdhjd@jhjwh.com', 'Doctor name', '2021-07-01', '09:30', '10:00:00', 'Dummy', '0', 'upcoming'),
(15, NULL, 'Steffen', 12345678, 'steffen@yahoo.com', 'Doctor name', '2021-06-30', '07:30', '08:00:00', 'for control', '0', 'upcoming'),
(21, '3', 'Dhanu', NULL, NULL, 'Doctor name', '2021-06-30', '09:30', '10:00:00', '', '0', 'upcoming');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adddeposit`
--

DROP TABLE IF EXISTS `adddeposit`;
CREATE TABLE IF NOT EXISTS `adddeposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient` int(11) NOT NULL,
  `invoice` int(20) NOT NULL,
  `depositammount` int(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `adddeposit`
--

INSERT INTO `adddeposit` (`id`, `patient`, `invoice`, `depositammount`, `date`) VALUES
(1, 1, 150, 2000, '2018-02-05'),
(2, 1, 150, 6000, '2018-02-05'),
(3, 0, 450, 2000, '2018-02-06'),
(4, 0, 500, 3000, '2018-02-06'),
(5, 0, 910, 5000, '2018-02-14'),
(6, 0, 910, 5000, '2018-02-14'),
(7, 0, 6, 1000, '2018-02-14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addfiles`
--

DROP TABLE IF EXISTS `addfiles`;
CREATE TABLE IF NOT EXISTS `addfiles` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `doc_date` varchar(100) NOT NULL,
  `patient` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `addfiles`
--

INSERT INTO `addfiles` (`id`, `doc_date`, `patient`, `title`, `file`) VALUES
(3, ' 2018-05-16', '1', 'Stitle', 'Tulips.jpg'),
(4, ' 2021-04-14', '2', '', 'nurse.png'),
(5, ' 2021-04-28', '', '', ''),
(6, ' 2021-04-28', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addmedicalhistory`
--

DROP TABLE IF EXISTS `addmedicalhistory`;
CREATE TABLE IF NOT EXISTS `addmedicalhistory` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `patient` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Daten für Tabelle `addmedicalhistory`
--

INSERT INTO `addmedicalhistory` (`id`, `date`, `patient`, `description`) VALUES
(1, '2018-04-17', ' 1', '<p>daddfds</p>'),
(2, '2021-05-08', '2', '<p>apendix</p>\r\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addnewmedicine`
--

DROP TABLE IF EXISTS `addnewmedicine`;
CREATE TABLE IF NOT EXISTS `addnewmedicine` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `genericname` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `effect` varchar(30) NOT NULL,
  `expiredate` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `addnewmedicine`
--

INSERT INTO `addnewmedicine` (`id`, `name`, `category`, `price`, `quantity`, `genericname`, `company`, `effect`, `expiredate`) VALUES
(2, 'snehal', '15', 500, 50, 'bhvf', 'dvfsfv', '1dsfvgsfg', '2020'),
(4, 'Nikita', '5', 200, 12, 'dfgdyt', 'Mr.Sagar Adhav', 'rttrt', '2022'),
(6, 'medicine', '6', 200, 12, 'dfgd', 'Mr.Sagar Adhav', 'hhgfh', '2222'),
(7, 'test medicine', '5', 6000, 50, 'test generic', 'test', 'sadasd', '2022');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addnewpres`
--

DROP TABLE IF EXISTS `addnewpres`;
CREATE TABLE IF NOT EXISTS `addnewpres` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `patient` varchar(30) NOT NULL,
  `history` text NOT NULL,
  `medication` text NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `addnewpres`
--

INSERT INTO `addnewpres` (`id`, `date`, `patient`, `history`, `medication`, `note`) VALUES
(1, '2018-03-22', '1', '<p>GHNGHTH</p>', '<p>GHNGHTH</p>', '<p>GHNGHTH</p>'),
(2, '2018-05-09', '2', '<p>aderwsrft</p>\r\n', '<p>ygrthyg</p>\r\n', '<p>thjfh&nbsp;</p>\r\n'),
(3, '2018-05-16', '3', '<p>fdzffvsf</p>\r\n', '<p>fgbdbh</p>\r\n', '<p>ghbgv</p>\r\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addpayment`
--

DROP TABLE IF EXISTS `addpayment`;
CREATE TABLE IF NOT EXISTS `addpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `patient` int(30) NOT NULL,
  `refdbydoctor` varchar(30) NOT NULL,
  `categoryselect` varchar(30) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `addp_discount` int(11) NOT NULL,
  `grosstotal` int(11) NOT NULL,
  `amountreceived` int(11) NOT NULL,
  `depositammount` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `vatper` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `addpayment`
--

INSERT INTO `addpayment` (`id`, `invoice`, `patient`, `refdbydoctor`, `categoryselect`, `subtotal`, `addp_discount`, `grosstotal`, `amountreceived`, `depositammount`, `date`, `vatper`, `discount`) VALUES
(1, '', 1, '', '', 0, 0, 0, 0, '', '', 0, 0),
(2, 'INV-00000001', 1, '', '1,1,4,7', 2746, 25, 2060, 65000, '5000', '2018-05-16', 0, 0),
(3, '45421', 2, '', '', 0, 0, 0, 0, '', '', 0, 0),
(4, '', 3, '', '', 0, 0, 0, 0, '', '', 0, 0),
(5, '', 4, '', '', 0, 0, 0, 0, '', '', 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `text` text NOT NULL,
  `codessys` text NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`idD`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `fileUploaded` text NOT NULL,
  PRIMARY KEY (`idDo`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `examination`
--

DROP TABLE IF EXISTS `examination`;
CREATE TABLE IF NOT EXISTS `examination` (
  `idE` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `dateUntersuchung` date NOT NULL,
  `untersuchung` text NOT NULL,
  `untersuchung_ergebnisse` text NOT NULL,
  `notizen` text NOT NULL,
  PRIMARY KEY (`idE`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `krankheit` text NOT NULL,
  `dosis` varchar(100) NOT NULL,
  PRIMARY KEY (`idI`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `profile`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'download.jpg', 'Nikhil', 'Bhalerao', 'admin@admin.com', '202cb962ac59075b964b07152d234b70'),
(2, '', 'admin', 'Doc', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mainservices`
--

DROP TABLE IF EXISTS `mainservices`;
CREATE TABLE IF NOT EXISTS `mainservices` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `mainservicename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `mainservices`
--

INSERT INTO `mainservices` (`id`, `mainservicename`) VALUES
(1, 'E.C.G'),
(2, 'Admission fees'),
(3, 'Ambulance'),
(4, 'Oxyen'),
(5, 'USG-Pregnancy Pro'),
(7, 'Service'),
(8, 'services1'),
(9, 'test service'),
(10, 'famla12'),
(12, 'famla'),
(13, 'famla12'),
(14, 'famla123');

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
-- Tabellenstruktur für Tabelle `medicinecategory`
--

DROP TABLE IF EXISTS `medicinecategory`;
CREATE TABLE IF NOT EXISTS `medicinecategory` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `medicinecategory`
--

INSERT INTO `medicinecategory` (`id`, `category`, `description`) VALUES
(5, 'tablet', 'abc'),
(6, 'capsule', 'gnghn'),
(9, 'bbb', 'dfsxf'),
(14, 'kkk', 'hhrt'),
(15, 'vitamin V', 'afsdf'),
(16, 'test', 'ESGAZ'),
(17, 'AAAA', 'sfsdef'),
(18, 'test category', 'tghhfgdhfdrft');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notfalldaten`
--

DROP TABLE IF EXISTS `notfalldaten`;
CREATE TABLE IF NOT EXISTS `notfalldaten` (
  `idN` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `Angabe` text NOT NULL,
  `auspraegung` text NOT NULL,
  PRIMARY KEY (`idN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patientinfo`
--

DROP TABLE IF EXISTS `patientinfo`;
CREATE TABLE IF NOT EXISTS `patientinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(20) NOT NULL,
  `profilepic` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `patientinfo`
--

INSERT INTO `patientinfo` (`id`, `patient_id`, `profilepic`, `firstname`, `middlename`, `lastname`, `gender`, `bloodgroup`, `birthdate`, `phone`, `address`, `email`, `password`, `status`) VALUES
(1, 1, 'Tulips.jpg', 'snehal', '', '', 'Female', 'B+', '2018-02-19', '8484822137', 'K.Sukene', 'snehal@gmail.com', '', '0'),
(2, 2, 'Tulips.jpg', 'monika', 'raj', 'shinde', 'Female', 'AB+ ', '2018-02-12', '9552030527', 'Ozar', 'mona@yahoomail.com', 'mona', '0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patientregister`
--

DROP TABLE IF EXISTS `patientregister`;
CREATE TABLE IF NOT EXISTS `patientregister` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(30) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `imageupload` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `hasrecord` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `patientregister`
--

INSERT INTO `patientregister` (`id`, `doctor`, `name`, `email`, `password`, `address`, `phone`, `gender`, `birthdate`, `bloodgroup`, `imageupload`, `status`, `hasrecord`) VALUES
(2, '', ' Nikita', 'niku@gmail.com', '', 'Vani', '8482838002', 'Female', '2018-05-08', 'B+', 'Tulips.jpg', '1', '0'),
(3, '', ' Dhanu', 'dhanu@gmail.com', '', 'Nashik', '8482838002', 'Female', '2018-05-01', 'B+', 'Chrysanthemum.jpg', '1', '0'),
(4, '', ' Yogita', 'yogita@gmail.com', '', 'Shivaji Nagar', '8482838002', 'Female', '2018-05-05', 'A+', 'Hydrangeas.jpg', '1', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profileid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `changepassword` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`profileid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `profile`
--

INSERT INTO `profile` (`profileid`, `name`, `changepassword`, `email`) VALUES
(1, 'snehal', 'snehal', 'snehal@gmail.com'),
(2, 'Nisha', 'nisha', 'nisha@gmail.com'),
(3, 'Ashwini', 'ashwini', 'ashu@gmail.com'),
(4, 'kajal', 'kajal', 'kajal@gmail.com'),
(5, '', '', ''),
(6, 'Neha', '123', 'neha@gmail.com'),
(7, 'Dhanu', 'dhanu', 'dhanu@gmail.com'),
(8, 'Nikita ', 'nikita', 'nikita@gmail.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subservices`
--

DROP TABLE IF EXISTS `subservices`;
CREATE TABLE IF NOT EXISTS `subservices` (
  `service_id` int(100) NOT NULL AUTO_INCREMENT,
  `sid` int(100) NOT NULL,
  `subservicename` varchar(100) NOT NULL,
  `Fee` int(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `subservices`
--

INSERT INTO `subservices` (`service_id`, `sid`, `subservicename`, `Fee`) VALUES
(1, 1, 'aaa', 123),
(2, 3, 'bbb', 500),
(3, 3, 'sfedgtg', 500),
(4, 2, 'kkkkkk', 10000),
(5, 4, 'HbAlc', 1000),
(6, 5, 'USG-sub', 2000),
(7, 7, 'sub-service', 1500),
(9, 9, 'test sub service', 8000);

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
