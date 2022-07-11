-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 08:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apcs_ass`
--

CREATE TABLE `apcs_ass` (
  `No.` int(100) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `Name` text NOT NULL,
  `Lecturer` text NOT NULL,
  `DOMid` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(10000) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apcs_ass`
--

INSERT INTO `apcs_ass` (`No.`, `Code`, `Name`, `Lecturer`, `DOMid`, `Date`, `Email`, `Pass`, `total`) VALUES
(28, 'bit123', 'Organizational Behaviour', 'Jane N', 'bit123', '2022-07-07', 'janendirangu49@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 70),
(29, 'ICS 1223', 'computer science', 'Jane N', 'ICS_1223', '2022-07-09', 'janendirangu49@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 70),
(30, 'BBB 123', 'campus life', 'Mercy Kioko', 'BBB_123', '2022-07-09', 'janendirangu721@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 70),
(31, 'bt 123', 'test', 'Jane N', 'bt_123', '2022-07-09', 'Johnndirangu721@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 70);

-- --------------------------------------------------------

--
-- Table structure for table `bbb_123`
--

CREATE TABLE `bbb_123` (
  `Adm_Num` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bit123`
--

CREATE TABLE `bit123` (
  `Adm_Num` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bt_123`
--

CREATE TABLE `bt_123` (
  `Adm_Num` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ics_1223`
--

CREATE TABLE `ics_1223` (
  `Adm_Num` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_bbc123`
--

CREATE TABLE `_bbc123` (
  `Adm_Num` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apcs_ass`
--
ALTER TABLE `apcs_ass`
  ADD PRIMARY KEY (`No.`);

--
-- Indexes for table `bbb_123`
--
ALTER TABLE `bbb_123`
  ADD PRIMARY KEY (`Adm_Num`);

--
-- Indexes for table `bit123`
--
ALTER TABLE `bit123`
  ADD PRIMARY KEY (`Adm_Num`);

--
-- Indexes for table `bt_123`
--
ALTER TABLE `bt_123`
  ADD PRIMARY KEY (`Adm_Num`);

--
-- Indexes for table `ics_1223`
--
ALTER TABLE `ics_1223`
  ADD PRIMARY KEY (`Adm_Num`);

--
-- Indexes for table `_bbc123`
--
ALTER TABLE `_bbc123`
  ADD PRIMARY KEY (`Adm_Num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apcs_ass`
--
ALTER TABLE `apcs_ass`
  MODIFY `No.` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
