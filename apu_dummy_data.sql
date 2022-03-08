-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2021 at 02:41 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apu_dummy_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `Intake_ID` int(19) NOT NULL,
  `Course_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_tp` varchar(8) NOT NULL,
  `staff_password` longtext NOT NULL,
  `staff_name` varchar(1000) NOT NULL,
  `staff_age` int(2) NOT NULL,
  `staff_role` varchar(50) NOT NULL,
  `staff_email` varchar(320) NOT NULL,
  `staff_dept` varchar(18) NOT NULL,
  `staff_phone` varchar(13) NOT NULL,
  `staff_address` varchar(255) NOT NULL,
  `staff_gender` tinytext NOT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `staff_tp` (`staff_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_tp`, `staff_password`, `staff_name`, `staff_age`, `staff_role`, `staff_email`, `staff_dept`, `staff_phone`, `staff_address`, `staff_gender`) VALUES
(1, 'TP055343', '$2a$04$EV4FhilsNigvL2mmAx7/xOYUsu0mwjMJWybQQnNvMnZbPA8S4AsTC', 'Ryan Lim Fang Yung', 20, 'admin', 'tp055343@mail.apu.edu.my', 'APU', '014-6321806', 'Jalan Bukit Indah, Ampang, Selangor', 'Male'),
(2, 'TP055646', '$2a$04$cEeNEb919Aj4Gi3QppwIZud.yI4BWGHwBwgCzMfIE88Tn2PC338.K', 'John Cena', 22, 'Consultor', 'john@wwe.com', 'Teaching Dept', '019-30948938', 'Jalan Ampang', 'Female'),
(3, 'TP02933', '$2a$04$XSNZ8zpnJUbGQMdtflhDU.KCyn5WA8YWNolvloTey72nMfqjpI8oK', 'jeremy_staff', 20, 'Lecturer', 'jeremy@mail.com', 'SoE', '011-9283744', 'Kuala Lumpur', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_tp` varchar(8) NOT NULL,
  `student_password` longtext NOT NULL,
  `student_name` varchar(1000) NOT NULL,
  `student_age` int(2) NOT NULL,
  `student_email` varchar(320) NOT NULL,
  `student_intake` varchar(18) NOT NULL,
  `student_phone` varchar(13) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_gender` tinytext NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_tp` (`student_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_tp`, `student_password`, `student_name`, `student_age`, `student_email`, `student_intake`, `student_phone`, `student_address`, `student_gender`) VALUES
(1, 'TP055343', '$2a$04$A0mP.KQwcFfhy8.FrJAWB.q1TOX5JnZ7FNoRp90Cx.VmnrJ5uNxrW', 'Ryan Lim Fang Yung', 20, 'tp055343@mail.apu.edu.my', 'UCDF1905ICT(SE)', '014-6321806', 'Jalan Bukit Indah, Ampang', 'Male'),
(2, 'TP123456', '$2a$04$fxIwb5iTPu3u7w.m3z0iAey3VjBPuEnr78L5AhdiaS/MSAwE.pD.q', 'jeremy_student', 20, 'jeremy@mail.com', 'UCDF1905ICT(SE)', '011-92837099', 'Kuala Lumpur', 'Male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
