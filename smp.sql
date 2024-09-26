-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 12:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `antaret`
--

CREATE TABLE `antaret` (
  `antariid` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(50) NOT NULL,
  `datalindjes` date DEFAULT NULL,
  `nrpersonal` bigint(20) DEFAULT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fjalekalimi` varchar(30) DEFAULT NULL,
  `roli` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antaret`
--

INSERT INTO `antaret` (`antariid`, `emri`, `mbiemri`, `datalindjes`, `nrpersonal`, `telefoni`, `email`, `fjalekalimi`, `roli`) VALUES
(1, 'burim', 'avdiu', '1983-09-26', 123456789, '045899099', 'burim.avdiu@tick-ks.com', '123456', b'1'),
(2, 'Rinas', 'Drenica', '1983-09-26', 123456789, '044999999', 'rinasdrenica@tick-ks.com', '123456', b'0'),
(3, 'Ragip', 'GJinovci', '1983-09-26', 123456789, '044999999', 'ragipgjinovci@tick-ks.com', '123456', b'0'),
(4, 'Leon', 'Abimi', '1983-09-26', 123456789, '044999999', 'leonabimi@tick-ks.com', '123456', b'0'),
(5, 'Kastriot', 'Bislimi', '1983-09-26', 123456789, '044999999', 'kastriotbislimi@tick-ks.com', '123456', b'0'),
(6, 'Arian', 'Shala', '1983-09-26', 123456789, '044999999', 'arianshala@tick-ks.com', '123456', b'0'),
(7, 'Marigona', 'Mazreku', '1983-09-26', 123456789, '044999999', 'marigonamazreku@tick-ks.com', '123456', b'0'),
(8, 'Altin', 'Bejta', '1983-09-26', 123456789, '044999999', 'altinbejta@tick-ks.com', '123456', b'0'),
(9, 'Lum', 'Pireva', '1983-09-26', 123456789, '044999999', 'lumpireva@tick-ks.com', '123456', b'0'),
(27, 'besa', 'zeqiri', NULL, NULL, '0444444', 'besa@gmail.com', '123456', b'1'),
(28, 'Enes', 'Shabani', NULL, NULL, '045151555', 'enesshabani@probitacademy.com', NULL, NULL),
(29, 'Enes', 'Shabani', NULL, NULL, '045151555', 'enesshabani@probitacademy.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projektet`
--

CREATE TABLE `projektet` (
  `projektiid` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `datafillimit` date NOT NULL,
  `datambarimit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projektet`
--

INSERT INTO `projektet` (`projektiid`, `emri`, `pershkrimi`, `datafillimit`, `datambarimit`) VALUES
(1, 'SMP', 'Projekti qe mundeson menaxhimin e puneve qe kryhen nga anetaret', '2019-06-17', '2019-08-03'),
(2, 'PROBIT', 'Web faqja per probit', '2019-01-17', '2019-10-03'),
(3, 'Financa', 'Projekti per menaxhimin e financave', '2018-01-17', '2019-10-03'),
(4, 'TICK', 'Menaxhimi i studentave', '2019-01-17', '2021-10-03'),
(5, 'PROBIT', 'Projeket per klientat', '2019-01-17', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `punet`
--

CREATE TABLE `punet` (
  `punaid` int(11) NOT NULL,
  `antariid` int(11) NOT NULL,
  `projektiid` int(11) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `pershkrimi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punet`
--

INSERT INTO `punet` (`punaid`, `antariid`, `projektiid`, `data`, `pershkrimi`) VALUES
(99, 1, 5, '2020-12-12 00:00:00', '00\r\n'),
(100, 2, 1, '2019-07-16 00:00:00', 'permirsimi i html css'),
(101, 3, 1, '2019-07-17 00:00:00', 'filtime me jquery'),
(102, 3, 1, '2019-07-16 00:00:00', 'formen per regjistrimin e antareve'),
(103, 1, 1, '2019-07-18 00:00:00', 'krijimin e databazes'),
(104, 4, 1, '2019-07-19 00:00:00', 'permirsimi i db'),
(105, 4, 1, '2019-07-20 00:00:00', 'permirsimi i db'),
(106, 5, 1, '2019-07-21 00:00:00', 'pyetsor per anetaret CRUD'),
(107, 5, 1, '2019-07-21 00:00:00', 'PHP funksionet per CRUD te anetaret'),
(108, 6, 1, '2019-07-16 00:00:00', 'PHP permirsime te anetaret'),
(109, 2, 1, '2019-07-16 00:00:00', 'permirsimi i db'),
(110, 3, 1, '2019-07-16 00:00:00', 'permirsimi i html css'),
(114, 1, 5, '2020-12-12 00:00:00', 'ppppkklkklkl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antaret`
--
ALTER TABLE `antaret`
  ADD PRIMARY KEY (`antariid`);

--
-- Indexes for table `projektet`
--
ALTER TABLE `projektet`
  ADD PRIMARY KEY (`projektiid`);

--
-- Indexes for table `punet`
--
ALTER TABLE `punet`
  ADD PRIMARY KEY (`punaid`),
  ADD KEY `antariid` (`antariid`),
  ADD KEY `projektiid` (`projektiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antaret`
--
ALTER TABLE `antaret`
  MODIFY `antariid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `projektet`
--
ALTER TABLE `projektet`
  MODIFY `projektiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `punet`
--
ALTER TABLE `punet`
  MODIFY `punaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `punet`
--
ALTER TABLE `punet`
  ADD CONSTRAINT `punet_ibfk_1` FOREIGN KEY (`antariid`) REFERENCES `antaret` (`antariid`),
  ADD CONSTRAINT `punet_ibfk_2` FOREIGN KEY (`projektiid`) REFERENCES `projektet` (`projektiid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
