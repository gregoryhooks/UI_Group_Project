-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2015 at 04:38 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE if EXISTS perfectpc;
CREATE DATABASE perfectpc;
USE perfectpc;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfectpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `builds`
--

CREATE TABLE IF NOT EXISTS `builds` (
  `buildId` varchar(255) NOT NULL,
  `caseId` varchar(255) NOT NULL,
  `mboardId` varchar(255) NOT NULL,
  `cpuId` varchar(255) NOT NULL,
  `ramId` varchar(255) NOT NULL,
  `hdriveId` varchar(255) NOT NULL,
  `gpuId` varchar(255) NOT NULL,
  `powersupId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `caseId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Style` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`caseId`, `Make`, `Model`, `Color`, `Style`, `Size`, `Price`) VALUES
('case00', 'Thermaltake', 'CoreV71', 'Black', 'Open', 'Full', 143.83),
('case01', 'Corsair', '750D', 'Black', 'Open', 'Full', 149.99),
('case02', 'Lian', 'PC-D600', 'Aluminum', 'Closed', 'full', 399.99),
('case03', 'BitFenix', 'Prodigy M', 'Orange', 'open', 'mid', 105),
('case04', 'BitFenix', 'Prodigy M', 'Green', 'open', 'mid', 82.94),
('case05', 'BitFenix', 'Prodigy M', 'blue', 'open', 'mid', 89.99),
('case06', 'BitFenix', 'Prodigy M', 'white', 'open', 'mid', 98.28),
('case07', 'Corsair', '250D', 'black', 'closed', 'mini', 84.99),
('case08', 'BitFenix', 'Neos', 'red/black', 'closed', 'full', 59.99),
('case09', 'Thermaltake', 'A71', 'blue/black', 'open', 'full', 128.73);

-- --------------------------------------------------------

--
-- Table structure for table `cpus`
--

CREATE TABLE IF NOT EXISTS `cpus` (
  `cpuId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Speed(GHz)` float NOT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpus`
--

INSERT INTO `cpus` (`cpuId`, `Make`, `Model`, `Speed(GHz)`, `Price`) VALUES
('1cpuA01', 'AMD', '860k', 3.7, 74.99),
('1cpuAG0', 'AMD', 'A4-7300', 3.8, 39.95),
('1cpuI08', 'Intel', 'g1820', 2.7, 46.5),
('3cpuA00', 'AMD', 'FX 8350', 4, 169.99),
('3cpuA06', 'AMD', 'FX 6350', 3.9, 125.95),
('3cpuI02', 'Intel', 'i5-6600k', 3.5, 268.99),
('3cpuI03', 'Intel', 'i5-4690k', 3.5, 227.99),
('4cpuA07', 'AMD', 'FX 9590', 4.7, 227.5),
('4cpuI04', 'Intel', 'i7-6700k', 4, 364.99),
('4cpuI05', 'Intel', 'i7-4790k', 4, 331.49);

-- --------------------------------------------------------

--
-- Table structure for table `gpus`
--

CREATE TABLE IF NOT EXISTS `gpus` (
  `gpuId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Speed(GHz)` float NOT NULL,
  `Memory(GB)` int(16) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpus`
--

INSERT INTO `gpus` (`gpuId`, `Make`, `Model`, `Speed(GHz)`, `Memory(GB)`, `price`) VALUES
('1gpuPG06', 'PNY', '210', 0, 1, 38.99),
('2gpuMG07', 'MSI', 'GT610', 0.81, 2, 46.99),
('4gpuPV09', 'PNY', '410', 0.5, 1, 119.99),
('5gpuGG04', 'Gigabyte', 'GTX750', 1.033, 2, 134.99),
('6gpuAG02', 'ASUS', 'GTX960', 1.228, 2, 199.99),
('7gpuMG00', 'MSI', 'GTX907', 0.701, 4, 339.99),
('7gpuXR08', 'XFX', 'R9270', 0.9, 2, 167.89),
('8gpuMG01', 'MSI', 'GTX980', 1, 6, 659.99),
('8gpuXR03', 'XFX', 'R9280x', 1, 3, 239.99),
('9gpuHN05', 'HP', 'K4200', 1, 4, 744.82);

-- --------------------------------------------------------

--
-- Table structure for table `harddrives`
--

CREATE TABLE IF NOT EXISTS `harddrives` (
  `hdriveId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Speed` int(16) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harddrives`
--

INSERT INTO `harddrives` (`hdriveId`, `Make`, `Model`, `Size`, `Speed`, `price`) VALUES
('1hdd04', 'Seagate', 'ST325031AS', '250GB', 7200, 24.99),
('1hdd05', 'Western Digital', 'WD2500AAJB', '250GB', 7200, 36),
('3hdd01', 'Western Digital', 'WD10EZEX', '1TB', 7200, 52.99),
('3hdd02', 'Seagate', 'ST1000DN003', '1TB', 7200, 49.99),
('6hdd00', 'Seagate', 'ST3000DM001', '3TB', 7200, 89.99),
('7hdd06', 'Kingston', 'SMS200s3/60G', '60gb', 0, 46.99),
('7hdd07', 'Samsung', '850 EVO', '1TB', 0, 367.99),
('7hdd08', 'Intel', 'SSDMCEAC120B301', '120GB', 0, 157.99),
('7hdd09', 'Crucial', 'M500', '480GB', 0, 399.99),
('8hdd03', 'HGST', 'Deskstar', '4TB', 7200, 169.99);

-- --------------------------------------------------------

--
-- Table structure for table `memory`
--

CREATE TABLE IF NOT EXISTS `memory` (
  `ramId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Size(GB)` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memory`
--

INSERT INTO `memory` (`ramId`, `Make`, `Model`, `Size(GB)`, `Type`, `price`) VALUES
('16ram304', 'IBM', '46W0672', '16GB', 'DDR3', 229.99),
('1ram106', 'Corsair', 'VS1GB400C3', '1GB', 'DDR', 29.81),
('4ram200', 'G.SKILL', 'F2-6400CL5D-4GBPQ', '4GB', 'DDR2', 49.99),
('4ram301', 'G.SKILL', 'F3-12800CL', '4GB', 'DDR3', 52.99),
('4ram305', 'Team', 'TPD38G1600C11DC01', '4GB', 'DDR3', 34.99),
('8ram403', 'AddOn', 'AA2133D4DR8N/8G', '8GB', 'DDR4', 240.99),
('8ramD02', 'default', 'ACOES11', '8gb', 'DIMM', 245);

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE IF NOT EXISTS `motherboards` (
  `mboardId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `PCI Slots` int(8) NOT NULL,
  `Memory Type` varchar(255) NOT NULL,
  `Memory Slots` int(8) NOT NULL,
  `USB Ports` int(8) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`mboardId`, `Make`, `Model`, `PCI Slots`, `Memory Type`, `Memory Slots`, `USB Ports`, `price`) VALUES
('2mb07A', 'MSI', 'AM1', 1, 'DDR3', 2, 2, 24.99),
('3mb06I', 'ECS', 'B85H3-M9', 1, 'DDR3', 2, 4, 45.99),
('4mb04A', 'Gigabyte', 'GA-AM1M-S2P', 2, 'DDR3', 2, 4, 37.5),
('4mb05A', 'ASUS', 'A68HM-K', 2, 'DDR3', 2, 4, 54.99),
('6mb00I', 'Gigabyte', 'GA-Z170-HD3P', 3, 'DDR4', 4, 4, 124.99),
('6mb01I', 'ASUS', 'Z170-A LGA 1151', 2, 'DDR4', 3, 6, 154.99),
('6MB02A', 'ASUS', 'ROG CROSSBLADE RANGER', 3, 'DDR3', 4, 6, 152.99),
('8mb08A', 'ASUS', 'Crosshair', 3, 'DDR3', 4, 8, 220.94),
('8mb09I', 'ASUS', 'Q87M-E', 2, 'DDR3', 4, 6, 1299.99),
('9mb07I', 'ASRock', 'WS-E/10G', 7, 'DDR4', 4, 8, 649.74);

-- --------------------------------------------------------

--
-- Table structure for table `psupplies`
--

CREATE TABLE IF NOT EXISTS `psupplies` (
  `psupplyId` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Watts` int(8) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psupplies`
--

INSERT INTO `psupplies` (`psupplyId`, `Make`, `Model`, `Watts`, `price`) VALUES
('2ps05', 'Logisys', '550w', 550, 26.99),
('4ps01', 'Antec', 'EA650', 650, 79.99),
('4ps06', 'Antec', 'Platiunum', 750, 115.99),
('4ps08', 'Antec', 'EA-550', 550, 62.99),
('5ps00', 'Corsair', 'RM750', 750, 119.99),
('5ps04', 'Thermaltake', 'Smart Series', 750, 67.78),
('5ps09', 'Antex', 'EDGE', 650, 109.95),
('7ps02', 'Sea Sonic', 'SS-760XP2', 760, 159.99),
('9ps03', 'Corsair', 'HX1000i', 1000, 209.99),
('9ps07', 'Corsair', 'HX1200i', 1200, 259.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`) VALUES
('1', 'greg', 'hash123', 'greg@email.com'),
('2', 'eric', 'hash123', 'eric@gmail.com'),
('3', 'heather', 'hash123', 'heather@email.com'),
('4', 'travis', 'hash123', 'travis@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `usersaves`
--

CREATE TABLE IF NOT EXISTS `usersaves` (
  `userID` int(11) NOT NULL,
  `partID` varchar(255) NOT NULL,
  FOREIGN KEY (userID) REFERENCES users(userID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`buildId`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`caseId`);

--
-- Indexes for table `cpus`
--
ALTER TABLE `cpus`
  ADD PRIMARY KEY (`cpuId`);

--
-- Indexes for table `gpus`
--
ALTER TABLE `gpus`
  ADD PRIMARY KEY (`gpuId`);

--
-- Indexes for table `harddrives`
--
ALTER TABLE `harddrives`
  ADD PRIMARY KEY (`hdriveId`);

--
-- Indexes for table `memory`
--
ALTER TABLE `memory`
  ADD PRIMARY KEY (`ramId`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`mboardId`);

--
-- Indexes for table `psupplies`
--
ALTER TABLE `psupplies`
  ADD PRIMARY KEY (`psupplyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
