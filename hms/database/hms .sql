-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 27. Jun 2021 um 19:08
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `activity`
--

INSERT INTO `activity` (`idA`, `pid`, `dateMassnahme`, `massnahme`) VALUES
(1, 5, '2021-07-01', 'ein corona Schnelltest wurde gemacht');

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
  `remark` varchar(255) NOT NULL,
  `sms` enum('0','1') NOT NULL,
  `app_status` enum('upcoming','perceived','cancelled') NOT NULL DEFAULT 'upcoming',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Daten für Tabelle `addappointment`
--

INSERT INTO `addappointment` (`id`, `patient`, `doctor`, `app_date`, `starttime`, `endtime`, `remark`, `sms`, `app_status`) VALUES
(1, '4', 'Kanga', '2021-04-16', '07:00', '08:00', 'für eine Untersuchung', '1', 'perceived'),
(2, '2', 'Amadou', '2021-04-18', '08:15', '09:15', 'Impfung', '1', 'cancelled'),
(5, '3', 'kamto', '2021-04-11', '20:00', '21:00', 'OP', '0', 'upcoming'),
(7, '10', '4', '2021-07-01', '10:00', '10:30', 'Fieber', '0', 'upcoming'),
(8, '10', '2', '2021-07-01', '10:30', '11:00', 'kopfschmerzen', '0', 'upcoming');

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
(3, '45421', 2, '', '3,33', 40000, 10, 36000, 40000, '', '', 0, 0),
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `befunde`
--

INSERT INTO `befunde` (`idB`, `pid`, `dateBefunde`, `befunde`, `description`) VALUES
(3, 2, '2021-04-28', '', ''),
(4, 2, '2021-04-29', '', ''),
(6, 5, '2021-07-01', 'positiv an Corona', 'Der Patient leidet unter unter Kopfschmerzen, hustet, hat kein Appetit, hat fieber');

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
  `codessys` text NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`idD`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `diagnostic`
--

INSERT INTO `diagnostic` (`idD`, `pid`, `dateDiagnoctic`, `typ`, `text`, `codessys`, `code`) VALUES
(1, 2, '2021-05-11', 'Diagnose', 'cancer de poumon', 'ABCD', 'ABDC'),
(2, 2, '2021-04-27', 'OP', 'cancer', '123', '329874');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `document`
--

INSERT INTO `document` (`idDo`, `pid`, `dateDokument`, `title`, `Description`, `fileUploaded`) VALUES
(1, 2, '2021-06-14', 'butterfly', 'nichts', '1623741094_butterfly.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `examination`
--

INSERT INTO `examination` (`idE`, `pid`, `dateUntersuchung`, `untersuchung`, `untersuchung_ergebnisse`, `notizen`) VALUES
(1, 2, '2021-05-12', 'palpation de la poitrine', 'presence d une masse', ''),
(2, 5, '2021-07-01', 'hÃ¶re auf den Atem, Fieber messen', 'langsame Atmen,  39 Grad', 'Das Atmen ist langsam und mit GerÃ¤usch');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `history`
--

INSERT INTO `history` (`idH`, `pid`, `zeitraume`, `Station_Raum`, `description`) VALUES
(1, 2, '2021-05-18', 'A/201', 'enter'),
(2, 2, '2021-05-15', 'C/135', 'sortir'),
(3, 5, '2021-07-01', 'isoliertes Station/ raum 101', 'der patiient wurde fÃ¼r eine Woche stationÃ¤r behandelt');

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

--
-- Daten für Tabelle `impfung`
--

INSERT INTO `impfung` (`idI`, `pid`, `dateImpfung`, `nameImpfung`, `krankheit`, `dosis`) VALUES
(1, 2, '2021-05-20', 'corona', 'xxxxx', 'xxxx');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `medikationplan`
--

INSERT INTO `medikationplan` (`idMP`, `pid`, `dateMedicationplan`, `medicament`, `freq`, `tagesprofil`, `Description`) VALUES
(1, 2, '2021-05-28', '', 'xxx', 'xxx', 'xxx'),
(2, 5, '2021-07-01', 'Ibuprofen', '3 Tagen', '1 morgen, 1 Mittag, 1 Abend', 'Der Patient muss erstmal was essen, bevor er die Tablette nimmt.');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `patientregister`
--

INSERT INTO `patientregister` (`id`, `doctor`, `name`, `email`, `password`, `address`, `phone`, `gender`, `birthdate`, `bloodgroup`, `imageupload`, `status`, `hasrecord`) VALUES
(2, '', ' Nikita', 'niku@gmail.com', '', 'Vani', '8482838002', 'Female', '2018-05-08', 'B+', 'Tulips.jpg', '1', '1'),
(3, '', ' Dhanu', 'dhanu@gmail.com', '', 'Nashik', '8482838002', 'Female', '2018-05-01', 'B+', 'Chrysanthemum.jpg', '1', '0'),
(4, '', ' Yogita', 'yogita@gmail.com', '', 'Shivaji Nagar', '8482838002', 'Female', '2018-05-05', 'A+', 'Hydrangeas.jpg', '1', '0'),
(5, '', 'Tamo steve', 'tamosteve@yahoo.fr', '', 'kamkop2, BP514', '002378710862', 'Male', '1988-08-02', 'B+', '', '1', '1'),
(6, '', ' kamdem boris ', 'kamdemboris@yahoo.fr', '', 'marche A, BP 513', '002374710562', 'Male', '1992-10-08', 'A-', '', '0', '0'),
(7, '', ' kemlo aurelie', 'kemloaurelie@yahoo.fr', '', 'Tamdja, BP 515', '0023799999999', 'Female', '1991-09-20', 'B+', '', '1', '0'),
(8, '', 'siaka therese', 'siakatherese@yahoo.fr', '', 'diocesse, BP515', '0023766872471', 'Female', '1992-02-24', 'B-', '', '1', '0');

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
