-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 09. Apr 2021 um 16:54
-- Server-Version: 5.7.26
-- PHP-Version: 7.2.18

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
-- Tabellenstruktur für Tabelle `addappointment`
--

DROP TABLE IF EXISTS `addappointment`;
CREATE TABLE IF NOT EXISTS `addappointment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `patient` varchar(25) NOT NULL,
  `doctor` varchar(25) NOT NULL,
  `app_date` varchar(100) NOT NULL,
  `starttime` varchar(100) DEFAULT NULL,
  `endtime` varchar(100) DEFAULT NULL,
  `remark` varchar(20) NOT NULL,
  `sms` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Daten für Tabelle `addappointment`
--

INSERT INTO `addappointment` (`id`, `patient`, `doctor`, `app_date`, `starttime`, `endtime`, `remark`, `sms`) VALUES
(1, '1', '', '2018-05-16', '07:00', '08:00', 'srtggt', '1'),
(2, '2', '', '2018-05-16', '08:15', '09:15', 'trhu', '1'),
(3, '3', '', '2018-05-28', '09:00', '10:00', 'dhanu', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `addfiles`
--

INSERT INTO `addfiles` (`id`, `doc_date`, `patient`, `title`, `file`) VALUES
(2, ' 2018-05-16', '2', 'Niku', 'Koala.jpg'),
(3, ' 2018-05-16', '1', 'Stitle', 'Tulips.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Daten für Tabelle `addmedicalhistory`
--

INSERT INTO `addmedicalhistory` (`id`, `date`, `patient`, `description`) VALUES
(1, '2018-04-17', ' 1', '<p>daddfds</p>');

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
(3, '', 2, '', '', 0, 0, 0, 0, '', '', 0, 0),
(4, '', 3, '', '', 0, 0, 0, 0, '', '', 0, 0),
(5, '', 4, '', '', 0, 0, 0, 0, '', '', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(9, 'test service');

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
  `phone` varchar(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `imageupload` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `patientregister`
--

INSERT INTO `patientregister` (`id`, `doctor`, `name`, `email`, `password`, `address`, `phone`, `gender`, `birthdate`, `bloodgroup`, `imageupload`, `status`) VALUES
(2, '', ' Nikita', 'niku@gmail.com', '', 'Vani', '8482838002', 'Female', '2018-05-08', 'B+', 'Tulips.jpg', '1'),
(3, '', ' Dhanu', 'dhanu@gmail.com', '', 'Nashik', '8482838002', 'Female', '2018-05-01', 'B+', 'Chrysanthemum.jpg', '1'),
(4, '', ' Yogita', 'yogita@gmail.com', '', 'Shivaji Nagar', '8482838002', 'Female', '2018-05-05', 'A+', 'Hydrangeas.jpg', '1');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
