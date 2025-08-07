-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2018 at 11:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverId` varchar(32) NOT NULL,
  `fullname` varchar(34) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `address` varchar(22) NOT NULL,
  `phoneNo` varchar(22) NOT NULL,
  `plateNum` varchar(30) NOT NULL,
  `CompanyId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverId`, `fullname`, `sex`, `address`, `phoneNo`, `plateNum`, `CompanyId`) VALUES
('DE0001', 'Amanuel Ayele', 'Male', 'Addis Ababa', '+25911811708', 'OR0003', '2'),
('DE0002', 'Dagimawi Moges', 'Male', 'Addis Ababa', '+251920719292', 'OR0004', '2'),
('DH0001', 'Etefa Belachew', 'Male', 'Hawassa', '+251922222222', 'AA0001', '1'),
('DH0002', 'Bekalu nakachew', 'Male', 'Hawassa', '+251933339189', 'AA0002', '1'),
('DH0003', 'Amanuel Ayele', 'Male', 'assosa', '+251922229129', 'DH787800', '1'),
('DI0001', 'Aden Aberham', 'Male', 'Asella', '+25927307859', 'AF0007', '3'),
('DI0002', 'Betty Tesfaye', 'Female', 'Hawassa', '+2519132121', 'BG0005', '3'),
('DS0001', 'Huje Abebe', 'Male', 'Hawassa', '+25133248888', 'DB0002', '4'),
('DS0002', 'hj', 'female', 'aa', 'aa', 'DH787800', '4');

-- --------------------------------------------------------

--
-- Table structure for table `gpsdata`
--

CREATE TABLE `gpsdata` (
  `plateNum` varchar(34) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `latitude` varchar(45) NOT NULL,
  `longitude` varchar(45) NOT NULL,
  `speed` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpsdata`
--

INSERT INTO `gpsdata` (`plateNum`, `date`, `time`, `latitude`, `longitude`, `speed`) VALUES
('AA0001', '2018-05-23', '04:22:37', '8.9806', '38.7578', '67'),
('AA0002', '2018-06-10', '03:14:23', '10.0620', '34.5473', '212'),
('AF0007', '2018-05-01', '12:15:09', '11.7559', '40.9587', '90'),
('BG0005', '2018-05-13', '03:27:35', '10.0620', '34.5473', '89'),
('DB0002', '2018-05-22', '05:19:31', '7.0504', '38.4955', '80'),
('OR0003', '2018-05-14', '13:13:27', '7.6739', '36.8358', '67'),
('OR0004', '2018-05-17', '03:15:09', '8.5263', '39.2583', '120');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `CompanyId` varchar(30) NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`CompanyId`, `CompanyName`, `address`, `phoneNo`, `email`, `Password`) VALUES
('1', 'HUIOTT', 'Hawassa,ethiopia', '+251916161616', 'info@hu.com', '3aa00f6bf44ef9dedba2bdaaefd02941'),
('2', 'Ethiopian Airlines', 'Addis Ababa, Ethiopia', '+2519111111212', 'info@ethiopianairlines.com', '3aa00f6bf44ef9dedba2bdaaefd02941'),
('2323', 'hello world', 'usa', '+2511112121212', 'amityagm@hotmail.com', '3aa00f6bf44ef9dedba2bdaaefd02941'),
('3', 'INSA', 'Addis Ababa', '+251111111111', 'insa@ethiopia.com', '3aa00f6bf44ef9dedba2bdaaefd02941'),
('4', 'SICTA', 'Hawassa,ethiopia', '+251916161515', 'sicta@gmail.com', '3aa00f6bf44ef9dedba2bdaaefd02941');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`) VALUES
(1, 'beki', 'beki', '3aa00f6bf44ef9dedba2bdaaefd02941');

-- --------------------------------------------------------

--
-- Table structure for table `vechicle`
--

CREATE TABLE `vechicle` (
  `plateNum` varchar(30) NOT NULL,
  `CompanyId` varchar(30) NOT NULL,
  `vechType` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vechicle`
--

INSERT INTO `vechicle` (`plateNum`, `CompanyId`, `vechType`, `brand`) VALUES
('AA', 'AA', '4', 'AA'),
('AA0001', '1', 'Picup', 'FORD'),
('AA0002', '1', 'MINIBUS', 'TOYOTA'),
('AF0007', '3', 'LORRY', 'FSR'),
('BG0005', '3', 'LORRY', 'ISUZU'),
('DB0002', '4', 'HOME AUTHO', 'LIFAN'),
('DB00024', 'LIFAN 620', '4', 'HOME AUTH'),
('DH787800', '1', 'HOME AUTHO', 'COROLA'),
('OR0003', '2', 'V8', 'LANDCRUSER'),
('OR0004', '2', 'LORRY', 'CYNOTRACK'),
('sd', 'sd', '4', 'sd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `gpsdata`
--
ALTER TABLE `gpsdata`
  ADD PRIMARY KEY (`plateNum`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vechicle`
--
ALTER TABLE `vechicle`
  ADD PRIMARY KEY (`plateNum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
