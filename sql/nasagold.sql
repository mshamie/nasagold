-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2015 at 02:56 PM
-- Server version: 5.6.19
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nasagold_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'agent', 'Agent Nasagold'),
(3, 'user', 'Normal User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ns_bank`
--

DROP TABLE IF EXISTS `ns_bank`;
CREATE TABLE IF NOT EXISTS `ns_bank` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(120) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ns_bank`
--

INSERT INTO `ns_bank` (`BankID`, `BankName`, `Status`) VALUES
(1, 'MAYBANK', 1),
(2, 'RHB', 1),
(3, 'BIMB', 1),
(4, 'CIMB', 1),
(5, 'PUBLIC', 1),
(6, 'AMBANK', 1),
(7, 'HSBC', 1),
(8, 'HONG LEONG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ns_cashback`
--

DROP TABLE IF EXISTS `ns_cashback`;
CREATE TABLE IF NOT EXISTS `ns_cashback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `StatusPayment` int(11) DEFAULT '0' COMMENT '0 = Unpaid, 1 = Paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ns_cashback_payment`
--

DROP TABLE IF EXISTS `ns_cashback_payment`;
CREATE TABLE IF NOT EXISTS `ns_cashback_payment` (
  `CashBackID` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentType` int(11) NOT NULL COMMENT '1 = Cash, 2 = Cheque, 3 = EFT',
  `PaidAmount` decimal(10,2) NOT NULL,
  `Note` text COMMENT 'Note for payment made'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ns_client`
--

DROP TABLE IF EXISTS `ns_client`;
CREATE TABLE IF NOT EXISTS `ns_client` (
  `ClientID` int(11) NOT NULL AUTO_INCREMENT,
  `AgentID` int(11) DEFAULT NULL,
  `FullName` varchar(160) DEFAULT NULL,
  `ClientIC` varchar(60) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `PostalCode` int(5) DEFAULT NULL,
  `City` varchar(60) DEFAULT NULL,
  `RegionID` int(11) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL,
  `DateJoin` date DEFAULT NULL,
  `ClientPhone` varchar(16) DEFAULT NULL,
  `ClientEmail` varchar(60) DEFAULT NULL,
  `Pewaris` varchar(120) DEFAULT NULL,
  `PewarisPhone` varchar(60) DEFAULT NULL,
  `PewarisKP` varchar(60) DEFAULT NULL,
  `BankID` int(11) DEFAULT NULL,
  `AccountNo` varchar(60) DEFAULT NULL,
  `ClientStatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `ns_client`
--

INSERT INTO `ns_client` (`ClientID`, `AgentID`, `FullName`, `ClientIC`, `Address`, `PostalCode`, `City`, `RegionID`, `CountryID`, `DateJoin`, `ClientPhone`, `ClientEmail`, `Pewaris`, `PewarisPhone`, `PewarisKP`, `BankID`, `AccountNo`, `ClientStatus`) VALUES
(1, 2, 'Nor Syam Ahmad', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 'AMSYAR', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 3, 'FATEHAH', '', 'LOT 89, KG BARI 2', 17070, 'KOTA MELAKA', 3, 3, '2015-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 2, 'AMSYAR', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(5, 2, 'AMSYAR', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(6, 2, 'asdasd sdasd', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(7, 2, 'Fatimah Hamid', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(8, 2, 'asdasdasd', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(9, 2, 'asd', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(10, 2, 'ewr', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(11, 2, 'ewr', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(12, 2, 'ewr', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(13, 2, 'asd233', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(14, 2, 'qwwwwwwww', '', 'Lot pr 255, Kg Parit Bulat', 16060, 'KOTA BHARU', 3, 3, '2015-06-24', NULL, NULL, NULL, NULL, NULL, 3, '234234', 1),
(15, 2, 'WAN GHAFAR WAN YUSOFF', '', 'LOT 46, KG JENERIH PUTAT, JLN TEMBESU', 15150, 'MELAKA', 3, 3, '2015-06-28', NULL, NULL, NULL, NULL, NULL, 3, '123123123123123123', 1),
(16, 3, 'ZUBRI BIN HARUN', '', 'LOT 46, KG JENERIH PUTAT, JLN TEMBESU', 19009, 'KOTA BHARU', 3, 3, '2015-06-29', NULL, NULL, 'SURATA', '09809808', '7509490345098345', 6, '90000001928800123', 1),
(17, 3, 'WAN HUSIN WAN JAMAK', '8973928723987', 'LOT 46, KG JENERIH PUTAT, JLN TEMBESU', 18200, 'KOTA BHARU', 4, 1, '2015-06-29', '234234', 'asd@mail.com', 'suraya at six o''clock', '234234', '234234234', 4, '1231231231231432434', 1),
(18, 3, 'ROSMAH MANSOR', '890998938983', 'LOT 78, TING 6/A12, TAMAN MAWAR, SHAH ALAM', 17000, 'SHAH ALAM', 10, 1, '2015-06-02', '123213', 'qwe@lkj.com', 'MAT NAJIB BIN RAZAK', '092813098123', '98239823982398', 1, '6240909000123', 1),
(19, 2, 'FARIDAH BT SEMAIL', '780908037898', 'PT56, JALAN LERENG KIRI, TAMAN SETIA BATU', 12400, 'KOTA BHARU SATU', 5, 1, '2015-06-29', '0921398123', 'sadasd@mail.co', '', '', '', 1, '264535309120938', 1),
(20, 5, 'FATIMAH HAMID', '750607036089', 'LOT 78, TING 6/A12, TAMAN MAWAR, SHAH ALAM', 12300, 'BANDAR MELAKA', 4, 1, '2015-06-30', '01299898', '', 'HAMID BIN JABAR', '092193823', '89029838923', 3, '78239879872312312', 1),
(21, 6, 'WAN JUNAIDI WAN HAMIN', '750607036077', 'LOT 46, KG JENERIH PUTAT, JLN TEMBESU', 17200, 'TEMBESU', 11, 1, '2015-06-30', '09823098213', 'saya@local.co', '', '', '', 4, '732090900022000123', 1),
(22, 19, 'WAN MOHD HAFIZI B WAN HUSIN', '850112 03 5971', 'LOT 1907, LORONG KUBUR TERAP, KG KOTA', 15100, 'KOTA BHARU', 3, 1, '2015-07-07', '017 9224911', 'wmh_fizi85@yahoo.com', 'ZAINI B CHE NIK', '0139350991', '', 1, '162263535848', 1),
(23, 8, 'EZHAM ZUKHAIRY BIN ZULKIFLI', '850814-05-5491', '62C KG PILAH TENGAH', 72000, 'KUALA PILAH', 5, 1, '2015-01-03', '012-2455459', 'ezham85@gmail.com', 'ANIZA BT MOHD ANUAR', '', '', 2, '1550-7400-0310-94', 1),
(24, 8, 'KHAIRULNIZAM BIN ZAHAR', '730807-01-5161', 'MP 1254, JALAN MP 10, TAMAN MELAKA PERDANA', 78000, 'ALOR GAJAH', 4, 1, '2015-01-16', '011-11671740', 'ibsns@gmail.com', 'INTAN SARENA BINTI SARIP', '', '', 1, '1142-0957-6672', 1),
(25, 25, 'MOHAMMAD HELMI B. HAZIZAN', '901005-06-6147', 'NO 39, TAMAN MAWAR 1, SUNGAI RUAN', 27500, 'RAUB', 6, 1, '2015-01-13', '017-9451707', '', 'HAZIZAN B. SALLEH', '019-9473422', '', 4, '06060001975208', 1),
(26, 25, 'IRWAN BIN KIFLI', '910430-12-5333', 'IRWAN BIN KIFLI, PEJABAT IMIGRESEN KUKUP', 82300, 'PONTIAN', 1, 1, '2015-01-29', '016-8274796', 'wanazriel22@gmail.com', 'KIFLI BIN POLO', '', '', 1, '160149003927', 1),
(27, 25, 'MOHAMMAD ALIF HAIKAL B. ANUAR', '950831-10-5217', 'NO 19, JALAN 10 TAMAN BUKIT KUCHAI', 47100, 'PUCHONG', 10, 1, '2015-01-29', '012-3856854/018-', 'aliffhaikal360@yahoo.com', 'AMIRA SYAHIRAH BT. ANUAR', '012-3856854', '', 4, '12760012104525', 1),
(28, 25, 'MUHAMMAD SYAHIRRAN ABD RAHMAN', '831212-03-5529', 'UNIT B3-10-33, BLOCK B3, KONDO KEPONG SENTRAL, JALAN PUNCAK DESA2, TAMAN PUNCAK DESA', 52100, 'KEPONG', 10, 1, '2015-01-31', '014-6529052', 'thechessglobal@gmail.com', 'SHAFIQAH BINTI ABD RAHMAN', '', '', 1, '564829051578[ THE CHESS GLOBAL RESOURCES]', 1),
(29, 25, 'MUHAMMAD FIRDAUS BIN MAT HASSAN', '901230-03-5339', 'NO 63, TAMAN MUHIBBAH BUKIT KOMAN ', 27600, 'RAUB', 6, 1, '2015-02-12', '017-9787274', 'muhammadfirdausmathassan@yahoo.com', 'ELLYANA SURIANI BINTI CHE LAH', '', '930526-06-5812', 1, '156114297197', 1),
(30, 25, 'MOHAMMAD MOTTAQI BIN SULAIMAN', '810429-08-6535', 'NO 37, KG BUKIT BANJIR, MERBAU PULAS', 9300, 'KUALA KETIL', 2, 1, '2015-02-16', '019-5254135', '', 'INTAN JULIANA BINITI IDRIS', '010-4049461', ' 820929-02-5850', 1, '108039004514', 1),
(31, 25, 'AHMAD FAHAMI BIN SHAARI', '891017-14-5401', 'NO 559L BLOCK FLAT SRI PAHANG BUKIT BANGSAR', 59200, 'BANGSAR', 12, 1, '2015-02-20', '013-2603044', 'fahamikpdnkk@yahoo.com', 'SITI ROHAYU BINTI MOHD FAIZAL LIM', '017-3565181', '', 1, '1643-6061-1413', 1),
(32, 25, 'NOOR NADRAH BT ABD AZIZ', '880714-01-5372', '30-12-5 VILLA ANSKASH, JLN SENTUL BAHAGIA', 51000, 'SENTUL', 12, 1, '2015-02-21', '013-2989170', 'nadrahaziz@bmail.com', 'JAMILTON KAMILAH BT ABD AZIZ', '013-5190114', '', 3, '02048020341247', 1),
(33, 25, 'MOHD ISWADE BIN ISHAK', '860812-23-6415', 'B2-12 BLOCK B, JALAN MEDAN 32, TAMAN MEDAN BARU', 46000, 'PETALING JAYA', 10, 1, '2015-02-23', '013-3391634', 'mohdiswade@yahoo.com', 'NOORAZLINDA BT. ALI', '012-3379743', '870423-43-5110', 2, '11816800026264', 1),
(34, 20, 'MOHD NOORHAFIZ BIN NORDIN', '830406-09-5015', 'NO. 14, TAMAN SRI TUNJONG,', 2400, 'BESERI', 8, 1, '2015-04-03', '012-5697468', 'kemilauniaga@gmail.com', 'NURUL ADAWIYAH BINTI MOKHTAR', '013-4501258', '860209-02-5306', 2, '1-09013-0009205-8', 1),
(35, 20, 'MOHD RADZI BIN ZAINOL', '830128-08-5449', 'P/S 100, KG SALANG, JALAN KAKI BUKIT,', 1000, 'KANGAR', 8, 1, '2015-04-06', '013-5151741', 'emarzie@gmail.com', 'FAIZAHWATI BINTI AZALI', '019-4311300', '830117-08-5718', 2, '1-59018-0002498-9', 1),
(36, 20, 'MOHD AZHAR BIN JAMIAL', '820925-14-5871', 'NO. 53, LORONG JAWI JAYA 11, TAMAN JAWI JAYA,', 14200, 'SUNGAI JAWI, SPS,', 9, 1, '2015-04-15', '019-5488842', 'rahzabiz@yahoo.com', 'SALMIAH BINTI SAIDIN', '019-4045877', '', 1, '557401512134  (RAHZABIZ ENTERPRISE)', 1),
(37, 20, 'ISMAIL BIN DIN', '660102-09-5279', '8A, LORONG JAMBU AIR, KAMPUNG TELOK JAMBU, BINTONG,', 1000, 'KANGAR', 8, 1, '2015-04-16', '019-5705279', 'puterameranti@yahoo.com', 'SURIANI BINTI JAAFAR', '019-5775060', '690830-11-5060', 2, '10901300091930', 1),
(38, 43, 'SITI NADIA BINTI SHAMSUDDIN', '880610065708', 'NO.76 FELDA CHIKU 2', 18300, 'GUA MUSANG', 3, 1, '2015-06-27', '60196366342', '', 'AHMAD ROSWADI BIN ABDULLAH', '60139893544', '820623065649', 2, '15604400086958', 1),
(39, 20, 'MOHD NASIR BIN MOHD JAMIL', '860306-26-5635', 'NO. 98, KAMPUNG ALOR BATU, MUKIM GELONG, ', 6000, 'JITRA', 2, 1, '2015-04-17', '012-4969957', '', 'MOHD JAMIL BIN ABU', '012-4362855', '', 1, '152068700381', 1),
(40, 20, 'IZYAN BINTI MAHMOD', '831129-02-5012', 'NO. 7, LORONG CIKU 1, KAMPUNG GURU,', 1000, 'KANGAR', 8, 1, '2015-04-28', '012-6439355', 'maimoriez@yahoo.com', 'HARIDAH BINTI ABD RAZAK', '013-4326263', '', 1, '162106684080', 1),
(41, 20, 'AHMAD MUSTAFA BIN MOKHTAR', '901027-02-6103', 'NO. 65, KAMPUNG PAYA SENA,', 6720, 'PENDANG', 2, 1, '2015-04-17', '013-4905292', 'amustaffa4477@icloud.com', 'ROHIYATI BINTI AHMAD', '013-4603001', '', 3, '02011020878792', 1),
(42, 20, 'NORASHIKIN BINTI ABDUR RASHID', '870524-02-5946', 'LOT 2641, KG PAYA NONGMI, JALAN ULU PAUH,', 6010, 'CHANGLUN', 2, 1, '2015-05-26', '012-4947654', 'ckin5946@gmail.com', 'ABDUR RASHID BIN YAAKOB', '019-5584681', '', 1, '152219012667', 1),
(43, 20, 'MOHAMAD ZULHAIMI BIN ISHAK', '850925-07-5487', '129-C, JALAN KAMPUNG SENTUA, UTAN AJI,', 1000, 'KANGAR', 8, 1, '2015-06-25', '013-5936256', 'ibnuishak85@gmail.com', 'NUR HAFIZA BINTI JAMALUDIN', '017-5016039', '', 2, '1-58196-0006625-0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ns_country`
--

DROP TABLE IF EXISTS `ns_country`;
CREATE TABLE IF NOT EXISTS `ns_country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_country`
--

INSERT INTO `ns_country` (`CountryID`, `CountryName`) VALUES
(1, 'MALAYSIA'),
(2, 'INDONESIA'),
(3, 'BRUNIE'),
(4, 'SINGAPORE');

-- --------------------------------------------------------

--
-- Table structure for table `ns_document`
--

DROP TABLE IF EXISTS `ns_document`;
CREATE TABLE IF NOT EXISTS `ns_document` (
  `OwnerID` int(11) DEFAULT NULL,
  `DocumentName` varchar(253) DEFAULT NULL,
  `DocumentType` int(11) DEFAULT NULL COMMENT '1 = User Profile, 2 = IC Pelanggan, 3 = Barang Simpanan',
  `DocumentURL` varchar(120) DEFAULT NULL,
  `DateUpload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DocumentStatus` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Avialable, 0 = Soft Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_document`
--

INSERT INTO `ns_document` (`OwnerID`, `DocumentName`, `DocumentType`, `DocumentURL`, `DateUpload`, `DocumentStatus`) VALUES
(18, 'Rantai emas 28', 3, 'imagetest.jpg', '2015-06-29 05:05:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ns_saving`
--

DROP TABLE IF EXISTS `ns_saving`;
CREATE TABLE IF NOT EXISTS `ns_saving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OwnerID` int(11) DEFAULT NULL COMMENT 'Owner for this transaction',
  `NotaSimpanan` varchar(253) DEFAULT NULL,
  `JumlahBerat` varchar(70) NOT NULL,
  `NilaiSimpanan` decimal(10,2) DEFAULT NULL,
  `TarikhSimpanan` date DEFAULT NULL,
  `TarikhPengeluaran` date DEFAULT NULL,
  `StatusSimpanan` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Simpanan, 2 = Pengeluaran',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ns_saving`
--

INSERT INTO `ns_saving` (`id`, `OwnerID`, `NotaSimpanan`, `JumlahBerat`, `NilaiSimpanan`, `TarikhSimpanan`, `TarikhPengeluaran`, `StatusSimpanan`) VALUES
(1, 2, 'Cicin besar gajah', '200', '11000.00', '2015-06-10', NULL, 1),
(2, 2, 'Rantai kaki dan leher', '280', '2300.00', '2015-06-02', NULL, 1),
(3, 18, 'Simpan Cincin 2Kg', '320', '120000.00', '2015-06-05', NULL, 1),
(4, 18, 'Gelang Lama', '150', '19200.00', '2015-06-03', '2015-06-26', 2),
(5, 21, 'GELANG, RANTAI, CINCIN DAN ANTING-ANTING', '23', '4300.00', '2015-07-01', NULL, 1),
(6, 23, 'BARANG KEMAS', '162.28', '130.00', '2015-01-03', NULL, 1),
(7, 24, 'CASH BANK-IN', '50', '50.00', '2015-01-16', NULL, 1),
(8, 25, 'CASH [BANK-IN]', '50G', '7000.00', '2015-01-13', NULL, 1),
(9, 26, 'CASH [BANK-IN]', '10', '0.00', '2015-01-29', NULL, 1),
(10, 27, 'CASH [BANK-IN]', '50', '7.00', '2015-01-29', NULL, 1),
(11, 28, 'CASH[BANK-IN]', '30G', '0.00', '2015-01-31', NULL, 1),
(12, 29, 'CASH[BANK-IN]', '80', '0.00', '2015-02-12', NULL, 1),
(13, 30, 'CASH [BANK-IN]', '10G', '1.00', '2015-02-16', NULL, 1),
(14, 31, 'CASH[BANK-IN]', '50', '7.00', '2015-07-20', NULL, 1),
(15, 32, 'CASH[BANK-IN]', '10', '1.00', '2015-02-21', NULL, 1),
(16, 25, 'CASH [BANK-IN]', '50', '7.00', '2015-01-13', NULL, 1),
(17, 33, 'CASH[BANK-IN]', '30', '4.00', '2015-02-23', NULL, 1),
(18, 34, 'CASH (BANK-IN) + AGREEMENT', '10', '1627.00', '2015-04-03', NULL, 1),
(19, 35, 'CASH (BANK-IN)', '10', '1550.00', '2015-04-06', NULL, 1),
(20, 36, 'CASH (BANK-IN)', '10', '1550.00', '2015-04-15', NULL, 1),
(21, 37, 'CASH (BANK-IN) + AGREEMENT', '10', '1627.00', '0000-00-00', NULL, 1),
(22, 39, 'CASH (BANK-IN) + AGREEMENT', '50', '7750.00', '0000-00-00', NULL, 1),
(23, 40, 'CASH (BANK-IN) + AGREEMENT', '57', '8835.00', '0000-00-00', NULL, 1),
(24, 41, 'CASH (BANK-IN) + AGREEMENT', '5', '775.00', '0000-00-00', NULL, 1),
(25, 42, 'CASH (BANK-IN)', '10', '1650.00', '0000-00-00', NULL, 1),
(26, 37, 'CASH (BANK-IN)', '50', '8000.00', '0000-00-00', NULL, 1),
(27, 43, 'CASH (BANK-IN)', '20', '3200.00', '0000-00-00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ns_sessions`
--

DROP TABLE IF EXISTS `ns_sessions`;
CREATE TABLE IF NOT EXISTS `ns_sessions` (
  `ai` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`ai`),
  UNIQUE KEY `ci_sessions_id_ip` (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=219 ;

--
-- Dumping data for table `ns_sessions`
--

INSERT INTO `ns_sessions` (`ai`, `id`, `ip_address`, `timestamp`, `data`) VALUES
(201, 'abe74e5753efcb179fdb45f8f0f4e7036ce6fe2b', '175.142.87.37', 1436708826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730383738323b),
(200, '719c37972f1d4c53d29c375109b290b0eaa04c4e', '175.138.67.74', 1436706322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730363235363b),
(194, '03208d9580f4e181429a2a387036cd636fd4a2f1', '118.100.112.231', 1436699267, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639393236373b),
(195, '4e816a360a7ee687b44384315109cb71e0b64a92', '183.171.175.170', 1436699472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639393437313b),
(196, 'd43bea4f4ae2b3684d896c44591e77b983787f04', '183.171.175.170', 1436699972, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639393437313b),
(197, '4da66a6e4407374d2df35f91c7a2e76600ea40ee', '175.138.67.74', 1436706101, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730353731313b),
(198, 'd2cd4372acf7eacb64697a06a755de0a7b9c5938', '175.138.67.74', 1436706166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730353731313b),
(199, '4508d590f10023cded727d1568a1137371f5b55b', '183.171.173.83', 1436705985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730353932333b),
(192, '9a84f67098997c5581830f4c5551c2b10fe885f4', '175.142.87.37', 1436695938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639353933383b),
(193, 'e57b4b0577cb7bb1581be12ad7b2b181084c22f8', '113.210.134.71', 1436698422, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639373932303b6964656e746974797c733a32303a2277616469676f6c64383240676d61696c2e636f6d223b757365726e616d657c733a32363a2241484d414420524f53574144492042494e20414244554c4c4148223b656d61696c7c733a32303a2277616469676f6c64383240676d61696c2e636f6d223b757365725f69647c733a323a223433223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343336343431393438223b),
(182, '1c8993db5a3cff1f5175e34ba130c29d6238ee16', '113.210.131.140', 1436681170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363638303437303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343336353630303032223b),
(188, '7fafeb99ca159b178e3124e9450f6cc52f00de20', '103.251.200.194', 1436688211, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363638383139303b6964656e746974797c733a31373a227a756c3730313040676d61696c2e636f6d223b757365726e616d657c733a32333a224d4f4844205a554c52414944492042494e204a55534f46223b656d61696c7c733a31373a227a756c3730313040676d61696c2e636f6d223b757365725f69647c733a323a223334223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343336353337363333223b),
(184, 'd77c34882fb41f2cd330e98f94c006c547489439', '183.171.174.234', 1436681724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363638303730383b),
(191, '54ed271a3b9a777aaac41ba895de88e4db4eb273', '113.210.6.109', 1436696116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363639353634323b),
(186, '88f8e1b8d9c63030d5de59f7281204a5aa4edded', '103.251.200.194', 1436688188, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363638383135343b),
(202, 'e9268f48ef17522dcd96b6a3818f2b46edef62d8', '203.82.80.38', 1436709691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363730393635343b),
(204, 'a7390903acfdc4461ef7336a89128b8440622ca3', '1.9.97.204', 1436712411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363731323431313b),
(205, 'cb4a5d1594efa202ae1ea96a90c665b77e306d3f', '175.142.87.37', 1436712914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363731323931343b),
(212, '7a586c0451631350b90db7c2f595ee30afa42764', '175.144.232.82', 1436714457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363731343435373b),
(211, '865e9d0b43742994dd9d3fded37647824ae364a8', '175.142.87.37', 1436714387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363731333634333b6964656e746974797c733a31383a22726f736c697a61406b63732e636f6d2e6d79223b757365726e616d657c733a31363a22524f534c495a41204254205741484142223b656d61696c7c733a31383a22726f736c697a61406b63732e636f6d2e6d79223b757365725f69647c733a313a2236223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343336343832353431223b),
(216, '8dc5cd5b7ebe0fb05b09a4112a8d7beb59ad4d25', '::1', 1436686591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363638363537373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c4e3b),
(217, '08a00e1f016f1d68cdedb333e2c0b9c03e2eaeb6', '::1', 1436760192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433363736303035353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343336363836353830223b),
(218, '2beef407fa42e625b805d00e3aa4d5a2ca9989f1', '::1', 1438239012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433383233393031323b);

-- --------------------------------------------------------

--
-- Table structure for table `ns_state`
--

DROP TABLE IF EXISTS `ns_state`;
CREATE TABLE IF NOT EXISTS `ns_state` (
  `StateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ns_state`
--

INSERT INTO `ns_state` (`StateID`, `StateName`) VALUES
(1, 'JOHOR'),
(2, 'KEDAH'),
(3, 'KELANTAN'),
(4, 'MELAKA'),
(5, 'NEGERI SEMBILAN'),
(6, 'PAHANG'),
(7, 'PERAK'),
(8, 'PERLIS'),
(9, 'PULAU PINANG'),
(10, 'SELANGOR'),
(11, 'TERENGGANU'),
(12, 'W. P. KUALA LUMPUR'),
(13, 'SABAH'),
(14, 'SARAWAK'),
(18, 'W.P. LABUAN'),
(19, 'W.P. PUTRAJAYA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `UserAvatar` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `active`, `last_login`, `first_name`, `last_name`, `UserAvatar`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'd76zNoKVbGK7ZpaBnbixge19716eac117a80dd29', 1435343119, '.gxluJ3isDnD321Iek1t3e', 1268889823, 1, 1436760057, 'ADMINISTRATOR', 'ADMIN', '07033c4ab34888139e6e13a49d5b9c2f.jpg'),
(2, '::1', 'shahmi mohamed', '$2y$08$3eH3j3LYa9xO3kj/Zy9FA.Tb4Vno.2jw6Sy3q2lCqCT470Cum/um2', 'FO0I5ub/rEcS34B/LJJ5A.', 'shamie@kcs.com.my', NULL, '5MAQOeVAvz.jKYS2C5nDM.41bdaa5f2c1df7bbfe', 1435704810, NULL, 1435167920, 1, NULL, 'Shahmi', 'Mohamed', 'KEL Computer Station Sdn Bhd'),
(6, '103.21.47.85', 'ROSLIZA BT WAHAB', '$2y$08$3SVAJ3fIbSF094M0h.1PQOk75j9WlZNJ3IBaB9XEVM9sNP.vZdKzy', 'ftOiJGOc/slL/K8OjDWWqO', 'rosliza@kcs.com.my', NULL, 'QVeg7ITWWXCNeP7u1Of8Iu65c454b738d2650e09', 1435763415, 'kbx1Q.9U6a4G6gkjzjX8cO', 1435503907, 1, 1436686572, 'Rosliza', 'Wahab', 'f5f89872b28c52c8b1c7d4d13665bb31.jpeg'),
(7, '103.21.47.85', 'wan abdul zaki abdullah', '$2y$08$IQpsSy1P45S8ywETDpu46O6YvOsBZ8LELTV9iu3h4xGsFlQbS8Lq6', 'szwxo.JqhTXy7.Z.JzBpju', 'zaki@mail.co', NULL, NULL, NULL, NULL, 1435704465, 1, NULL, 'WAN ABDUL ZAKI', 'ABDULLAH', NULL),
(8, '113.210.128.221', 'MUHAMMAD HAFIZI ROSLI', '$2y$08$xXLaa9vMRx3Sc8rOLAUQjenZ/gmMZrXS5eK5YNHLyvinOg9FIpIHq', 'S7fp/CObavA0jVqlIlcLYu', 'fijie93@gmail.com', NULL, 'LNuaQWoduSUxLPBtb4g2-O6e9d6c91bb4ac38763', 1436226803, NULL, 1435705748, 1, NULL, 'MUHAMMAD HAFIZI', 'ROSLI', 'e5b0d080b795add4e00665aeeb46736c.jpg'),
(9, '183.171.163.21', 'payeh farez', '$2y$08$rqYz389I3lVyDsND4ZNbreBBmmCyCU8Sev69piSHDsCQw8.RFPBVm', 'laUNs8jefz9p3Y8ZwH6Aze', 'berehkelate@gmail.com.com', NULL, '.zQS0-M5HOlr3c2MENy1J.420ccbc87ef2c1c076', 1435707119, NULL, 1435706887, 1, NULL, 'PAYEH', 'FAREZ', NULL),
(10, '115.134.164.208', 'zuhri zulfadli', '$2y$08$FY85tHHbNzqlQI8ZQNBt2e4wg.kg0RzgD8.FllMwZTGGC7kAROr/S', 'SPy/gVMrnehGD6sgLiYm6.', 'rajazuhri@gmail.com', NULL, NULL, NULL, NULL, 1435707441, 1, NULL, 'ZUHRI', 'ZULFADLI', NULL),
(11, '183.171.170.33', 'rashdee abdrani', '$2y$08$kBVd4mDCWNSB87pc.T/1Ye2wgLbzMgCC1J2c5kwIXaJHebxhqG0LO', 'GFhReINnz4S75P6IApBMUu', 'mohdrasdiabdrani@yahoo.com', NULL, 'aCkvPRjrhvnwiHc.k6vUX.a7519f232d1cbec886', 1435708766, NULL, 1435708679, 1, NULL, 'RASHDEE', 'ABDRANI', NULL),
(12, '183.171.170.33', 'rashdee abdrani1', '$2y$08$ELxbJSreHsrQAVJzSsxjAuB5/TwiiUpbyHhdB6TDsKKYFMzoarMPq', '3zmQbQ3.aKE1vausPrDFyu', 'fos_rashdee74@yahoo.com', '58fa942d07bed4c1d89f6a16c92a3a1f59cf186b', 'uIElTvrlOy0I1QQwVPFbKOf07a93b8b0d42df60a', 1435709119, NULL, 1435708891, 0, NULL, 'RASHDEE', 'ABDRANI', NULL),
(13, '183.171.171.254', 'saiful 5227', '$2y$08$K5VF5AYC.aAtMj245.eot.D3psEITaOXOgNVDbVXpTB7n8mojSbWu', 'NBkj4gkL6EfHkxNds9AXCO', 'saifulb@selayanghospital.gov', NULL, NULL, NULL, NULL, 1435708950, 1, NULL, 'SAIFUL', '5227', NULL),
(14, '123.136.106.35', 'saiful bahri awang isa', '$2y$08$lLkVJ00Q7G27I6.8yecxT.qPdWPXbKyTDWNzdGqrL6RWdoFrKc08q', 'O.Zpl5AtwMPsWht4Ctcr5e', 'saifulb@selayanghospital.gov.my', NULL, NULL, NULL, NULL, 1435709829, 1, NULL, 'SAIFUL BAHRI', 'AWANG ISA', NULL),
(15, '149.129.5.182', 'MOHD HAFIDZ ABDUL HAMID', '$2y$08$XGy0T4QtE56jM98f717YKe51oC4oDHC1K7vl7QA5zNR2VxEclxCGG', 'KIyMDxnNwN6tNTGIm4v7Wu', 'mohdhafidz@live.com.my', NULL, NULL, NULL, 'sBMV/q.Faq0gExyj48FFHu', 1435725952, 1, NULL, 'MOHD HAFIDZ', 'ABDUL HAMID', NULL),
(16, '113.210.135.78', 'RAZLAN EFFENDI BIN TO''', '$2y$08$lVZfTKlsQMl6p1Y5mi.vmOI0IBS712hqaqMeClMZGsv4tE3vlIqq2', '6TTvHKND3.0bQ4wzx6HkIO', 'zeroclubrazlan@gmail.com', NULL, NULL, NULL, 'bs8za8pRj9EHtOcW8iMrTu', 1435727759, 1, NULL, 'RAZLAN EFFENDI', 'BIN TO''', 'a7c955a39c1ba0d7e3bd49a1e4f976eb.jpg'),
(17, '113.210.133.11', 'ahmad roswadi', '$2y$08$OzusKbgOMuwGsJlXBhs9R.oMRPg59DwnIddBz2KO3oNVzhYjcUNFO', '.h3O6p964GQsr8ppEMb2ve', 'diedia17@yahoo.com.my', NULL, NULL, NULL, NULL, 1435748622, 1, NULL, 'AHMAD', 'ROSWADI', NULL),
(18, '183.171.169.204', 'ariff mokhtaruddin', '$2y$08$V8fQHoSJsyPs6BshOh/Kg.UzjPALUl74uhrmtr7K1/wYhupD12iDa', 'vU/pAv/g3UjwEn70WsHwC.', 'ariffazza76@gmail.com', NULL, 'WYjLGffOytygGep3FZ3Fmefbb3b71ccb3df5e89a', 1435750682, NULL, 1435750153, 1, NULL, 'ARIFF', 'MOKHTARUDDIN', NULL),
(19, '210.186.53.65', 'MOHD SYAHIDAN BIN SIDIK.', '$2y$08$/3XrrNn5ucvrOwrEwwwtCOACUyvoa4y7XaVh/sxOf.FAktaCooDRC', 'gjZJ5LlUCirBs12.Ux/joO', 'mengkawak44@gmail.com', NULL, NULL, NULL, NULL, 1435752272, 1, NULL, 'MOHD SYAHIDAN', 'SIDIK', '08736680d6251612d9ab46658940ebae.jpg'),
(20, '115.164.220.8', 'MOHD NOORHAFIZ BIN NORDIN', '$2y$08$tdFwI281.J6dFUp3eWmStuL9PWTrLdBoCW7TSOyWNqa1zDm8Mqwii', '5AWBTYoV26F.8aayvmWlN.', 'kemilauniaga@gmail.com', NULL, NULL, NULL, NULL, 1435753174, 1, NULL, 'MOHD NOORHAFIZ', 'BIN NORDIN', NULL),
(21, '183.171.167.155', 'khalifa yusof', '$2y$08$pWuxgXhe90.ZxX3KGpkfOORHH7ogusH/3fuMEC1F.kJ72L2jTz3GW', '6iz/.gUY9ErDMAUHxiY5nu', 'lamp_lampard@yahoo.com', NULL, NULL, NULL, 'x5zKkvsMXvRAyOepzr5DJu', 1435755739, 1, NULL, 'KHALIFA', 'YUSOF', NULL),
(22, '103.1.145.153', 'ISMAIL BIN IBRAHIM', '$2y$08$T.Pzr8bSAqO9sx0O6QjReeXHUTQIAsBHPYZWLSt5lu2xjXFRnOCVC', 'ld0pvXJNUqbzCvfDd1uwQu', 'gerbangsejahteraenterprise@gmail.com', NULL, NULL, NULL, NULL, 1435758988, 1, NULL, 'ISMAIL', 'IBRAHIM', 'ed1902eced1e7da8c8800c0bdfa88bf1.jpg'),
(23, '183.171.167.248', 'amirul farez', '$2y$08$snfeGN/NYPlaP7FFdUwfOeoH1.RUaWYGpAE/IrrNA/K14.ZXj7.9q', 'ANwQ3LZmaZRWiS3tMgnLC.', 'berehkelate@gmail.com', NULL, NULL, NULL, NULL, 1435760522, 1, NULL, 'AMIRUL', 'FAREZ', NULL),
(24, '115.164.185.17', 'syed sufi syed abu bakar', '$2y$08$Qc5504XTVMSDfBAYLrC.tuX8xXL.tuYYNyzOW6NwPddjAxHLoDPkK', 'lV.FgrY2GRd2sdbzHfzOvu', 'sufi_8804@yahoo.com', NULL, NULL, NULL, NULL, 1435770063, 1, NULL, 'SYED SUFI', 'SYED ABU BAKAR', NULL),
(25, '175.138.83.224', 'MUHAMMAD QUSYAIRI BIN KHALILUDDIN', '$2y$08$oTkm8GjF7NAcFcLlxKDbrOCbQyJCFkpUSrPliznpIZVqr354hnmOa', 'RWBH/hvOm9e.ruayf8JgHe', 'dak_job93@yahoo.com', NULL, NULL, NULL, NULL, 1435771315, 1, NULL, 'MUHAMMAD', 'QUSYAIRI', '4e51c3f3f0599523ed9e58ab4c40516c.jpg'),
(26, '175.138.83.224', 'MUHAMMAD NOR HISHAM BIN ABD MALEK', '$2y$08$nMJjpyIpSzGfgfALz65KyOQPC19BZArKuGyHlOGDSFT1BMiXUdh62', 'uWcoO0JV28eA.mI5TVM/cO', 'shamnasagold@gmail.com', NULL, NULL, NULL, NULL, 1435772398, 1, NULL, 'MUHAMMAD NOR HISHAM', 'ABD MALEK', '7c158be68d6eb89a2605c8ac99482ef3.jpg'),
(27, '113.210.135.133', 'rafit mahadi', '$2y$08$.wz57GM2bbeWUeH7qPGHgeLji4mKQD5w69/7KUE7yT6ez9mQDs4m2', 'PUzO1OpzJWF2vJHSR36j4O', 'rafiqmahadi14@gmail.com', NULL, NULL, NULL, 'o762sYNLIMs8bzusDP5dKu', 1435776503, 1, NULL, 'RAFIT', 'MAHADI', NULL),
(28, '168.235.194.110', 'siti norbaiyah yahya', '$2y$08$cCvkOj2uiJveg8M9VcuIJuPTVF2pXFuXje.PSpTTIcuZdt99aAsUu', 'aw1/CNkh9GoGvPpFLdaZte', 'anggundsiti@gmail.com', NULL, NULL, NULL, NULL, 1435785858, 1, NULL, 'SITI NORBAIYAH', 'YAHYA', NULL),
(29, '183.171.164.125', 'rashdee abdrani2', '$2y$08$wWPUtNDxmpRY0Yut8atTduyeeRnwORalvZe6tgQYoSVyos3MOIBni', 'DnkhQe6bbQuN5cddAkfXWO', 'fos_rashdee1974@yahoo.com', '163352a39e2c41a33490f4799bf0c484298f42f3', 'oT51dzOReeHMclv.uUsPEuf22abc074b9ae12322', 1436341102, NULL, 1436003633, 0, NULL, 'RASHDEE', 'ABDRANI', NULL),
(30, '110.159.143.71', 'hairul malah jakpar', '$2y$08$WMtmrP0wPd6FJG2h6hHWieHx9kZ4R72Q1FKLi1zRECAJ421hMsQcO', 'I3pavfxHmSSBeNZCengE/e', 'nur2226@gmail.com', 'e22c1f85580565ed466a55095d84a3a2a42ba18b', NULL, NULL, NULL, 1436006529, 0, NULL, 'HAIRUL MALAH', 'JAKPAR', NULL),
(31, '60.49.72.37', 'masitah ab jalar', '$2y$08$4eRJLPNXFvoPW3tbS11b3u5HXKZEWIR999VY1lWfRrSX5iKP3.41m', 'Oz1kQtqysXusEl2xkms8oO', 'hattidin2@gmail.com', '037c7d7361ab65285dd6d24d9a78077018de52bd', 'WuaF5VK6eCtKs9AAlhvMfe98f4105bc505dc79b1', 1436549958, 'T6P5zbqbQoQ2OMRA37VQmu', 1436009117, 0, NULL, 'MASITAH', 'AB JALAR', '2033714693c876514bc621c9b927c4d5.jpg'),
(32, '210.186.54.186', 'WAN SHAMSUDDIN BIN WAN IBRAHIM', '$2y$08$93qKPg8B5CocqYptnZEtWuNzDCMk3/.iAxOV7UMChbeRy/Yxk81Ei', '.Zxd0AbeAT1CPSpP8.wr.u', 'dinlatihpandu@gmail.com', NULL, NULL, NULL, NULL, 1436023699, 1, NULL, 'WAN SHAMSUDDIN BIN WAN IBRAHIM', 'DIN', NULL),
(33, '60.54.66.100', 'sumaiyah mior badri', '$2y$08$H1rTVXdTiqb.PHgc4hmEEe2bYCGnreCkjO.iFTVEJ849qzBN6FIBq', 'ZW7Dax9GMajGqCc39fBCAe', 'suemaya587@yahoo.com', NULL, NULL, NULL, 'MA1N4ZE9WRN/XlKZfKwdsu', 1436024482, 1, NULL, 'SUMAIYAH', 'MIOR BADRI', NULL),
(34, '103.251.200.194', 'MOHD ZULRAIDI BIN JUSOF', '$2y$08$02/dn7mpIN3k8fSsotKc1OtiDjvqVJ8ZGxfr3LfqKTJCb4hidJ5ry', 'sUCURtiZu2LXE3WlqY2HTO', 'zul7010@gmail.com', NULL, 'Novk2-zAy6JGbJM8FyrLlOe5c7552c509900b90e', 1436358411, NULL, 1436024486, 1, NULL, 'MOHD ZULRAIDI', 'JUSOF', NULL),
(35, '219.93.15.19', 'azlan alias', '$2y$08$vMNJUguGRk/IJsOSc51BgenQODj8u/3pDEqf6Zg2KAWfvxACDLu6C', 'ZD23nLdd2b8sw32kdMkhlu', 'arelan2689@gmail.com', NULL, 'ogbs59avXxVOkzIE8iQsMO452a8e9c38f84bbbe8', 1436025137, NULL, 1436025065, 1, NULL, 'AZLAN', 'ALIAS', '455cbf0ea7542a8fb8c8bdb9eef44aaa.jpg'),
(36, '103.251.200.194', 'mohd zulraidi jusof1', '$2y$08$4XXH.9leH5mtwpja4oPk/eV73.u9fmoKut8PAmuhWVa.A9d9SduF6', 'hA2iKg7ra/Az0aPWSJwcue', 'zulnaga325@yahoo.com', 'a2ff22b0aaa5561939c1be6e5dc264d6a7edc809', 'hfWOs71eYaocWujqvdrsj.3ffa392b751efc1f17', 1436098321, NULL, 1436098234, 0, NULL, 'MOHD ZULRAIDI', 'JUSOF', NULL),
(37, '60.53.6.129', 'azhrul anuar hj tajudin', '$2y$08$Dd/TyFvhd83Fwr352iuce.fx5VYnbxL4LQzxN/g3FN6U1UxRKQPOW', 'VWjwdIz/6S.sMuPDhWOOi.', 'kurt_kuben@yahoo.com', NULL, NULL, NULL, NULL, 1436200923, 1, NULL, 'AZHRUL ANUAR', 'HJ TAJUDIN', 'ca84b859c954eed5018b5d36d60aeaa4.jpg'),
(38, '123.136.112.75', 'ALIF HAIKAL', '$2y$08$p4QogJXbFcZAmU5ADxWDa.ogoLJe32Y./.pYIkBkPV8X5KWnQm/Y2', 'LNV.cMnNPqFDW8DT69Frcu', 'alifhaikal360@yahoo.com', NULL, 'ZG6BZLa75K7M-PriMTCxu8be214c1ce410a5393', 1436384614, NULL, 1436305788, 1, NULL, 'ALIF', 'HAIKAL', NULL),
(39, '123.136.112.75', 'alif haikal1', '$2y$08$A8D0g9LUcOJYnsmnglqiNusl6TBD04ZaUuWv60GWoTsCPEhPpsTau', 'kNsouwOMt5ng5S9U/r8uYO', 'hykal20@yahoo.com', 'bf2a083197e0177ae32babab59a09372c38fc103', NULL, NULL, NULL, 1436306399, 0, NULL, 'ALIF', 'HAIKAL', NULL),
(40, '123.136.112.75', 'alif haikal2', '$2y$08$5gjBEfSlVrD3jHLSCx6K4eujpL4M5O7jp7zSdYgV2nuSv0ZY73cdu', 'khMdwT1UNeXBWBtiwH8rq.', 'hykal20@gmail.com', '2abc21b8b27a4c62793bb24d232e08c9b5fab507', NULL, NULL, NULL, 1436306497, 0, NULL, 'ALIF', 'HAIKAL', NULL),
(41, '123.136.112.75', 'alif haikal3', '$2y$08$d5Qd3LRsAgB0HEXbc8Vfn.yiJAByJRBQGuEdtgLjHWGJeLqdJyu.G', 'qTRnxzxpGAVM4CdWu.IYKu', 'hieqal20@yahoo.com', '8446f3c634ff63b00eb037a8512b6ffd9d4f46a8', NULL, NULL, NULL, 1436306754, 0, NULL, 'ALIF', 'HAIKAL', NULL),
(42, '1.32.73.56', 'HAFIZIE IBRAHIM', '$2y$08$qoMvn0BWGb2SI3htZM0nGe09deLC9hS14OO/fopyRTRWUXemJ/rZe', 'OSI.ONjHRovvQYk.NT0CfO', 'arepiz_firz@yahoo.com', NULL, NULL, NULL, NULL, 1436310675, 1, NULL, 'HAFIZIE', 'IBRAHIM', '1e04dbe9aeacb277d5224cfc3a41cee5.jpeg'),
(43, '113.210.133.58', 'AHMAD ROSWADI BIN ABDULLAH', '$2y$08$LjZYAF304LGdQs3nPA9uJeJFUpZQobBIfXpfS8oHNx.8xGx14eerW', 'TySByASNtO58HznKQtiNHu', 'wadigold82@gmail.com', NULL, NULL, NULL, NULL, 1436330460, 1, NULL, 'AHMAD', 'ROSWADI', '0b204516c82d78812dd6bdac92bd7bf3.jpg'),
(44, '113.210.128.153', 'yusoff b mat nassan mat hassan', '$2y$08$FNi96eWjULj3HvwqJQwyEek1Mm7p1HgTYQBDveZ7D1MMDypLx1h1i', '4cUhRD34rM/hTf.m/s4bw.', 'ladunnimulia@gmail.com', NULL, NULL, NULL, NULL, 1436338017, 1, NULL, 'YUSOFF B MAT NASSAN', 'MAT HASSAN', NULL),
(45, '161.139.152.216', 'YUSRAN BIN ISA', '$2y$08$P6I7Hvk1wVxyzNKRe8FjL.tyfFtg1ff2BhkONAWNLcH/dRIrfVNTG', 'vIyV36IniVdANEbTFkO2Pe', 'are_yus2010@yahoo.com', NULL, NULL, NULL, NULL, 1436349766, 1, NULL, 'YUSRAN', 'ISA', '0c10bd5c772388bb94624d5cba0e8fa1.jpg'),
(46, '161.139.152.216', 'noor athirah md ariff', '$2y$08$UsJOnbllbzoa8XaRuMrZ3uB9TfxpRRBYQsEVNdxwEJpa0oQtQW4DK', 'Il6vbYtAqSDX9NoY0M2HZ.', 'nathirah12@gmail.com', NULL, NULL, NULL, NULL, 1436349858, 1, NULL, 'NOOR ATHIRAH', 'MD ARIFF', NULL),
(47, '115.164.210.57', 'hafiz pjack', '$2y$08$RqNPvxrjG6FhN.zrw9drseN7Pvmlo8R6HnYptPgNMHItTwKqF/lxu', 'w7uFJqlikxmRlovrhnwif.', 'hafiz_jack1610@yahoo.com', NULL, NULL, NULL, NULL, 1436352130, 1, NULL, 'HAFIZ', 'PJACK', '2873a96a32e4da97d0774aee6e617913.jpg'),
(48, '183.171.172.25', 'anasrollah  amir', '$2y$08$tur4frR42yE1MQJwX1yLqOtbLrVPIvNLyhd5yDONPi5jTePaJVeti', '6t4cOmkn1oPzAo9I.yPrYe', 'anasrollah@ymail.com', NULL, NULL, NULL, NULL, 1436368961, 1, NULL, 'ANASROLLAH ', 'AMIR', NULL),
(49, '175.140.34.137', 'NOR AINA BINTI MOHD RATHI', '$2y$08$n3UOpLriLYXjoAAsR1vQEeZzM4y6Pp/2ob8SBc1CAFQAnnPAbl4XC', '6xhUISPN1hVnnBWJlyCBqO', 'apaiqayyum@gmail.com', NULL, NULL, NULL, NULL, 1436370719, 1, NULL, 'NOR AINA ', 'MOHD RATHI', 'ca02048689d6b7809d70035ed4b0e640.jpg'),
(50, '183.171.172.114', 'mohd suhaimi ramli', '$2y$08$aR7pTfWU2roO37qsi5mlV.uQBaStDtoqjUKZUHUJaqkXtvOmg8eMy', 'lAChR0Pl6auCFaiUkEEH/e', 'sollarrich@gmail.com', NULL, NULL, NULL, NULL, 1436384882, 1, NULL, 'MOHD SUHAIMI', 'RAMLI', NULL),
(51, '103.245.88.248', 'yana diyana', '$2y$08$IJKSPXs52fRlBnffY.T/zu1hR3e.x4zHvEgOx4Y6WcgwMyy/y6gDO', '9cwMaL18U5HGKj8knPhLxO', 'diyanaahmad.diyana@gmail.com', NULL, NULL, NULL, NULL, 1436431084, 1, NULL, 'YANA', 'DIYANA', NULL),
(52, '203.82.80.242', 'NOR KHATIJAH BINTI OTHMAN ', '$2y$08$8LcEr6allnxq2aIBqitZ..glduGiiRi7QiFKD2OVZtqALeU.dkQ1y', 'VGw4WgaIH9BkoRY45bXlbO', 'mohdkhairul1337@gmail.com', NULL, NULL, NULL, NULL, 1436442297, 1, NULL, 'NOR KHATIJAH ', 'NORKHATIJAH ', NULL),
(53, '183.171.161.122', 'afandi hamzah', '$2y$08$eg/CmqDfbck3Ql1sSFvtUeT.qeq3ygaYFW8wztIqI7rABuRp35pm6', 'Pcn9GXjrTEc09ZkLxNNGVe', 'afandi3030@yahoo.com', NULL, NULL, NULL, NULL, 1436451896, 1, NULL, 'AFANDI', 'HAMZAH', '4e805ae243b6b8c54219cc2666cb108d.jpg'),
(54, '113.210.0.77', 'sahizan  hamzah', '$2y$08$Qps/8SadgF3uc0ytEPCQdO6GPY/bLxzAe9kLp6mfqc900CbSzQIQu', 'rY.5tuHdmB.ubifMKYnMLO', 'sahizan22771@gmail.com', NULL, NULL, NULL, NULL, 1436465833, 1, NULL, 'SAHIZAN ', 'HAMZAH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(14, 1, 1),
(26, 2, 2),
(23, 6, 2),
(59, 7, 2),
(60, 8, 2),
(62, 9, 2),
(63, 10, 2),
(64, 11, 2),
(33, 12, 3),
(65, 13, 2),
(66, 14, 2),
(67, 15, 2),
(68, 16, 2),
(69, 17, 2),
(80, 18, 2),
(70, 19, 2),
(71, 20, 2),
(79, 21, 2),
(81, 22, 2),
(83, 23, 2),
(84, 24, 2),
(86, 25, 2),
(87, 26, 2),
(85, 27, 2),
(82, 28, 2),
(50, 29, 3),
(78, 30, 2),
(77, 31, 2),
(76, 32, 2),
(75, 33, 2),
(74, 34, 2),
(73, 35, 2),
(72, 36, 2),
(61, 37, 2),
(106, 38, 2),
(89, 39, 3),
(90, 40, 3),
(91, 41, 3),
(107, 42, 2),
(108, 43, 2),
(105, 44, 2),
(104, 45, 2),
(103, 46, 2),
(102, 47, 2),
(101, 48, 2),
(100, 49, 2),
(110, 50, 2),
(118, 51, 2),
(117, 52, 2),
(116, 53, 2),
(115, 54, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `UserID` int(11) DEFAULT NULL,
  `UserIC` varchar(16) DEFAULT NULL,
  `UserAddress` varchar(253) DEFAULT NULL,
  `UserPostalCode` int(5) DEFAULT NULL,
  `UserCity` varchar(60) DEFAULT NULL,
  `UserRegionID` int(11) DEFAULT NULL,
  `UserCountryID` int(11) DEFAULT NULL,
  `UserPhone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`UserID`, `UserIC`, `UserAddress`, `UserPostalCode`, `UserCity`, `UserRegionID`, `UserCountryID`, `UserPhone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '770912115398', 'KG BUNUT PAYONG, JALAN KUALA KRAI', 16150, '16150', 3, 1, '0129648595'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '750607036089', 'KG BUNUT PAYONG, TAMAN PETUALANG 3', 15050, 'KOTA BHARU', 3, 1, '09-743 3535'),
(6, '750607036089', 'LOT 266, LORONG HJ WAN HASAN, KG BUNUT PAYONG', 16150, 'KOTA BHARU', 3, 1, '012998293823'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '930918146363', 'NO 12 JALAN TK 5/13 TAMAN MAWAR', 47100, 'PUCHONG', 10, 1, '017-6226427'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '860112035217', '7-3-14 GUGUSAN TANJUNG,JALAN CECAWI,6/19C,SEKSYEN 6 KOTA DAMANSARA,PETALING JAYA SELANGOR.. ', 47810, 'PETALING JAYA', 10, 1, '01115724996'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '820814035637', 'LOT 1,JALAN 35, SELAYANG BARU, BATU CAVES', 68100, 'BATU CAVES', 10, 1, '0126436775'),
(15, '781220016579', 'C-8-07 RITZE PERDANA EXECUTIVE SUITES, DAMANSARA PERDANA', 47820, 'PETALING JAYA', 10, 1, '0192883720'),
(16, '840703035595', 'NO.24 TAMAN MUHAMMAD 2, JLN LOMBONG PERAK 2, SEKSYEN 29', 40460, 'SHAH ALAM', 10, 1, '0176814188'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '760428085853', '37 JLN SR2/1D COUNTRY HOMES', 48000, 'RAWANG', 10, 1, '+60192818755'),
(19, '820612-03-5065', 'F38 RAKR BACHOK 3', 16300, 'BACHOK', 3, 1, '012-3555710'),
(20, '830406095015', 'NO 14, TAMAN SRI TUNJONG,', 2400, 'BESERI', 8, 1, '0125697468'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '880623235403', 'NO 12, JALAN SEJAHTERA 19, TAMAN NUSA DAMAI', 81700, 'PASIR GUDANG', 1, 1, '019-7498699'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '930115-01-6805', 'NO 16, JLN TK5/23 TAMAN MAWAR ', 47100, 'PUCHONG', 10, 1, '017-2273490'),
(26, '900424055501', 'BLOK C-3-11 PPR SERI SEMARAK', 53200, 'SETAPAK', 12, 1, '0132798500'),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '820520-03-6028', 'A-15-17, PPR HICOM, SEKSYEN 26', 40150, 'SHAH ALAM', 10, 1, '0192947235'),
(32, '710813 11 5099', '151 KG. PENGKALAN BERANGAN', 21040, 'MARANG', 11, 1, '019 9769336'),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '730711035459', 'NO 26 JALAN PULAI JAYA 3,BANDAR PULAI JAYA ,SKUDAI', 81300, 'JOHOR BHARU', 1, 1, '0127711973'),
(35, '890602145803', 'NO.J10-12 BLOK J, TAMAN DESARIA,', 46000, 'PETALING JAYA', 10, 1, '0193175675'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '820309-05-5215', 'BLOK A-9-1 DESA TUANKU MARIAM, JALAN BUKU 5,OFF JALAN PADANG TEMBAK', 50634, 'KUALA LUMPUR', 12, 1, '0172558194'),
(38, '950831-10-5217', 'NO 19 JLN 10 TMN BKT KUCHAI', 47100, 'PUCHONG', 10, 1, '018 2545099'),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '871015-06-5725', 'NO 48 JLN TAMING IMPIAN 1, TMN TAMING IMPIAN', 43000, 'KAJANG', 10, 1, '019-2880991'),
(43, '820623-06-5649', 'NO.76 FELDA CHIKU 2', 18300, 'GUA MUSANG', 3, 1, '0139893544'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '', '31,JALAN 7/153A TAMAN ANGKASA, BATU 6 1/2 JALAN PUCHONG', 58200, 'KUALA LUMPUR', 12, 1, '013 7777 558'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '901016115071', '107 KG PADANG MIDIN', 21400, 'KUALA TERENGGANU', 11, 1, '+60104188818'),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '760624085666', 'NO 27 JALAN CEMPAKA 19 TAMAN CEMPAKA', 68000, 'AMPANG', 10, 1, '0126300795'),
(50, '800215025703', 'BT 8 3/4 JALAN BUKIT PINANG', 6200, 'ALOR SETAR', 2, 1, '+60125204023'),
(51, '861225525524', 'NO 18 JALAN PAUS 1, TAMAN INDAH JAYA', 86000, 'KLUANG', 1, 1, '017-7756457'),
(52, '710630015976', '11-6 JLN PJS3/46,TMN SRI MANJA SQUARE ONE, BATU 6 1/2 JLN KLANG LAMA ', 46000, 'PETALING JAYA', 10, 1, '0183251952 '),
(53, '580406045457', 'NO.3B JALAN PANDAN INDAH 6/8', 55100, 'KUALA LUMPUR', 12, 1, '0133817865'),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
