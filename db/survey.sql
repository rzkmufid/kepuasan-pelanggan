-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 08:07 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelayananofline`
--

CREATE TABLE IF NOT EXISTS `pelayananofline` (
`id` int(11) NOT NULL,
  `kepuasan` enum('baik','buruk','biasa','sangat baik') NOT NULL,
  `pilihan` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pelayananofline`
--

INSERT INTO `pelayananofline` (`id`, `kepuasan`, `pilihan`, `komentar`, `createdate`) VALUES
(10, 'sangat baik', 'Kenyamanan', 'tessss', '2023-01-04 11:44:14'),
(11, 'biasa', 'Pelayanan', 'aaaaa', '2023-01-04 23:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `tanswer`
--

CREATE TABLE IF NOT EXISTS `tanswer` (
`Id` int(11) NOT NULL,
  `descriptionId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `companyId` varchar(50) NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `jawabanA` int(11) NOT NULL,
  `jawabanB` int(11) NOT NULL,
  `jawabanC` int(11) NOT NULL,
  `jawabanD` int(11) NOT NULL,
  `jawabanE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=220 ;

--
-- Dumping data for table `tanswer`
--

INSERT INTO `tanswer` (`Id`, `descriptionId`, `groupId`, `companyId`, `jawaban`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`) VALUES
(206, 23, 7, '20230104 065642', 'E', 0, 0, 0, 0, 1),
(207, 24, 7, '20230104 065642', 'C', 0, 0, 1, 0, 0),
(208, 25, 7, '20230104 065642', 'A', 1, 0, 0, 0, 0),
(209, 26, 9, '20230104 065642', 'B', 0, 1, 0, 0, 0),
(210, 27, 9, '20230104 065642', 'D', 0, 0, 0, 1, 0),
(211, 28, 9, '20230104 065642', 'C', 0, 0, 1, 0, 0),
(212, 41, 9, '20230104 065642', 'A', 1, 0, 0, 0, 0),
(213, 23, 7, '20230104 065706', 'A', 1, 0, 0, 0, 0),
(214, 24, 7, '20230104 065706', 'C', 0, 0, 1, 0, 0),
(215, 25, 7, '20230104 065706', 'E', 0, 0, 0, 0, 1),
(216, 26, 9, '20230104 065706', 'E', 0, 0, 0, 0, 1),
(217, 27, 9, '20230104 065706', 'C', 0, 0, 1, 0, 0),
(218, 28, 9, '20230104 065706', 'B', 0, 1, 0, 0, 0),
(219, 41, 9, '20230104 065706', 'D', 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tcompany`
--

CREATE TABLE IF NOT EXISTS `tcompany` (
  `companyId` varchar(50) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `companyAddress` text NOT NULL,
  `companyPhoneHp` varchar(30) NOT NULL,
  `dateSurvey` datetime NOT NULL,
  `suggestion` text NOT NULL,
  `product` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcompany`
--

INSERT INTO `tcompany` (`companyId`, `companyName`, `companyAddress`, `companyPhoneHp`, `dateSurvey`, `suggestion`, `product`) VALUES
('20230104 065642', 'Nasabah 20230104 065642', 'Alamat 20230104 065642', '08065642', '2023-01-05 00:56:42', 'tes', 'Umum'),
('20230104 065706', 'Nasabah 20230104 065706', 'Alamat 20230104 065706', '08065706', '2023-01-05 00:57:06', 'tes 2', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tdescription`
--

CREATE TABLE IF NOT EXISTS `tdescription` (
`descriptionId` int(11) NOT NULL,
  `description` text NOT NULL,
  `groupId` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `ModifiedUser` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tdescription`
--

INSERT INTO `tdescription` (`descriptionId`, `description`, `groupId`, `CreatedDate`, `CreatedUser`, `ModifiedDate`, `ModifiedUser`) VALUES
(23, 'Keramahan Customer Service', 7, '2016-05-02 03:15:43', 1, '0000-00-00 00:00:00', 0),
(24, 'Kecepatan Respon Customer Service', 7, '2016-05-02 03:16:02', 1, '0000-00-00 00:00:00', 0),
(25, 'Solusi yang Diberikan', 7, '2016-05-02 03:16:25', 1, '0000-00-00 00:00:00', 0),
(26, 'Kualitas jaringan pada jam sibuk', 9, '2016-05-02 03:17:27', 1, '0000-00-00 00:00:00', 0),
(27, 'Kualitas Jaringan telefon  pada saat cuaca buruk', 9, '2016-05-02 03:17:48', 1, '0000-00-00 00:00:00', 0),
(28, 'Kecepatan Penanganan Jika ada masalah pada jaringan telefon', 9, '2016-05-02 03:18:44', 1, '0000-00-00 00:00:00', 0),
(41, '							sdsdsssss				', 9, '2016-09-29 16:28:53', 1, '2016-09-29 16:29:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgroup`
--

CREATE TABLE IF NOT EXISTS `tgroup` (
`groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `ModifiedUser` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tgroup`
--

INSERT INTO `tgroup` (`groupId`, `groupName`, `CreatedDate`, `CreatedUser`, `ModifiedDate`, `ModifiedUser`) VALUES
(7, 'Pelayanan Konsumen', '2016-05-02 03:11:42', 1, '0000-00-00 00:00:00', 0),
(9, 'Kulitas Jaringan Telefon', '2016-05-02 03:12:26', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
`userId` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`userId`, `username`, `password`, `fullname`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'Super');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelayananofline`
--
ALTER TABLE `pelayananofline`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanswer`
--
ALTER TABLE `tanswer`
 ADD PRIMARY KEY (`Id`), ADD KEY `descriptionId` (`descriptionId`), ADD KEY `groupId` (`groupId`), ADD KEY `groupId_2` (`groupId`), ADD KEY `companyId` (`companyId`), ADD KEY `groupId_3` (`groupId`), ADD KEY `companyId_2` (`companyId`);

--
-- Indexes for table `tcompany`
--
ALTER TABLE `tcompany`
 ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `tdescription`
--
ALTER TABLE `tdescription`
 ADD PRIMARY KEY (`descriptionId`), ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `tgroup`
--
ALTER TABLE `tgroup`
 ADD PRIMARY KEY (`groupId`), ADD KEY `CreatedUser` (`CreatedUser`,`ModifiedUser`), ADD KEY `CreatedUser_2` (`CreatedUser`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
 ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelayananofline`
--
ALTER TABLE `pelayananofline`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tanswer`
--
ALTER TABLE `tanswer`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `tdescription`
--
ALTER TABLE `tdescription`
MODIFY `descriptionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tgroup`
--
ALTER TABLE `tgroup`
MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanswer`
--
ALTER TABLE `tanswer`
ADD CONSTRAINT `tanswer_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `tcompany` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tanswer_ibfk_3` FOREIGN KEY (`groupId`) REFERENCES `tgroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tanswer_ibfk_4` FOREIGN KEY (`descriptionId`) REFERENCES `tdescription` (`descriptionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tdescription`
--
ALTER TABLE `tdescription`
ADD CONSTRAINT `tdescription_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `tgroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
