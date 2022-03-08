-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 08:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myversionofhfyc`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation_info`
--

CREATE TABLE `consultation_info` (
  `ConsultID` int(11) NOT NULL,
  `ConsultorID` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ConsultType` varchar(255) NOT NULL,
  `ConsultDate` varchar(255) NOT NULL,
  `ConsultStartTime` varchar(255) NOT NULL,
  `ConsultEndTime` varchar(255) NOT NULL,
  `ConsultFeedback` varchar(5000) NOT NULL,
  `ConsultRating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation_slot`
--

CREATE TABLE `consultation_slot` (
  `ConsultSlotID` int(11) NOT NULL,
  `ConsultDate` date NOT NULL,
  `Start_Time` varchar(50) NOT NULL,
  `End_Time` varchar(50) NOT NULL,
  `Consultor_ID` int(11) NOT NULL,
  `Consultation_Venue` varchar(1000) NOT NULL,
  `SlotStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation_slot`
--

INSERT INTO `consultation_slot` (`ConsultSlotID`, `ConsultDate`, `Start_Time`, `End_Time`, `Consultor_ID`, `Consultation_Venue`, `SlotStatus`) VALUES
(1, '2021-02-08', '02:00 AM', '05:30 AM', 2, '', 'Available'),
(2, '2021-02-12', '07:00 PM', '07:30 PM', 3, '', 'Available'),
(3, '2021-02-09', '02:30 AM', '02:45 AM', 3, '', 'Available'),
(4, '2021-02-09', '05:30 AM', '07:30 AM', 0, '', 'Available'),
(7, '2021-02-09', '07:00 PM', '07:30 PM', 3, '', 'Available'),
(8, '2021-02-10', '9.30 PM', '10.00 PM', 2, '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserAge` int(11) NOT NULL,
  `UserRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserAge`, `UserRole`) VALUES
(1, 'Sia Bin Prem', 69, 'User'),
(2, 'Mia Khalifa', 17, 'Consultor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation_info`
--
ALTER TABLE `consultation_info`
  ADD PRIMARY KEY (`ConsultID`);

--
-- Indexes for table `consultation_slot`
--
ALTER TABLE `consultation_slot`
  ADD PRIMARY KEY (`ConsultSlotID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation_info`
--
ALTER TABLE `consultation_info`
  MODIFY `ConsultID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation_slot`
--
ALTER TABLE `consultation_slot`
  MODIFY `ConsultSlotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
