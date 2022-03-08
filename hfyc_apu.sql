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
-- Database: `hfyc_apu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminTP` varchar(8) NOT NULL,
  `AdminAddress` varchar(1000) NOT NULL,
  `AdminDescription` varchar(1000) NOT NULL,
  `AdminAge` int(11) NOT NULL,
  `AdminPhoneNumber` varchar(13) NOT NULL,
  `AdminGender` varchar(6) NOT NULL,
  `AdminImgStatus` int(2) NOT NULL,
  `AdminChillBuds` int(2) NOT NULL,
  PRIMARY KEY (`AdminID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserID`, `AdminName`, `AdminTP`, `AdminAddress`, `AdminDescription`, `AdminAge`, `AdminPhoneNumber`, `AdminGender`, `AdminImgStatus`, `AdminChillBuds`) VALUES
(1, 9, 'Jason Todd', 'TP055343', 'Jalan', 'i am an admin', 20, '014-6321806', 'Male', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chillbuds-user`
--

DROP TABLE IF EXISTS `chillbuds-user`;
CREATE TABLE IF NOT EXISTS `chillbuds-user` (
  `ChillBudsID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  PRIMARY KEY (`ChillBudsID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `consultation_info`
--

DROP TABLE IF EXISTS `consultation_info`;
CREATE TABLE IF NOT EXISTS `consultation_info` (
  `ConsultID` int(11) NOT NULL AUTO_INCREMENT,
  `ConsultorID` varchar(255) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ConsultType` varchar(255) DEFAULT NULL,
  `ConsultDate` varchar(255) NOT NULL,
  `ConsultStartTime` varchar(255) NOT NULL,
  `ConsultEndTime` varchar(255) NOT NULL,
  `ConsultFeedback` varchar(5000) DEFAULT NULL,
  `ConsultRating` int(11) DEFAULT NULL,
  `ConsultationSessionID` int(11) NOT NULL,
  PRIMARY KEY (`ConsultID`),
  UNIQUE KEY `ConsultationSessionID` (`ConsultationSessionID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation_info`
--

INSERT INTO `consultation_info` (`ConsultID`, `ConsultorID`, `UserID`, `ConsultType`, `ConsultDate`, `ConsultStartTime`, `ConsultEndTime`, `ConsultFeedback`, `ConsultRating`, `ConsultationSessionID`) VALUES
(21, 'TP066454', 11, 'Fitness Consultation', '2021-02-26', '3:30 PM', '6:00 PM', 'Nice Consultation, Learnt alot from him', 10, 21),
(22, 'TP066454', 11, 'Fitness Consultation', '2021-02-24', '16:30 PM', '07:30 AM', NULL, NULL, 19),
(23, 'TP066454', 11, 'Fitness Consultation', '2021-02-25', '1:30 PM', '2:30 PM', NULL, NULL, 20),
(24, 'TP02933', 17, 'Career Consultation', '2021-03-12', '09:30 AM', '10:00 AM', NULL, NULL, 22),
(25, 'TP066454', 11, 'Fitness Consultation', '2021-03-31', '4:30 PM', '5:00 PM', NULL, NULL, 23),
(26, 'TP066454', 11, 'Fitness Consultation', '2021-03-18', '5:00 PM', '5:30 PM', NULL, NULL, 24),
(27, 'TP066454', 11, 'Fitness Consultation', '2021-03-19', '10:30 AM', '11:00 AM', NULL, NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `consultor`
--

DROP TABLE IF EXISTS `consultor`;
CREATE TABLE IF NOT EXISTS `consultor` (
  `ConsultorID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ConsultorName` varchar(255) NOT NULL,
  `ConsultorTP` varchar(8) NOT NULL,
  `ConsultorAddress` varchar(1000) NOT NULL,
  `ConsultorDescription` varchar(1000) NOT NULL,
  `ConsultorAge` int(11) NOT NULL,
  `ConsultorPhoneNumber` varchar(13) NOT NULL,
  `ConsultorGender` varchar(6) NOT NULL,
  `ConsultorImgStatus` int(2) NOT NULL,
  `ConsultorChillBuds` int(2) NOT NULL,
  `ConsultorService` varchar(100) NOT NULL,
  PRIMARY KEY (`ConsultorID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultor`
--

INSERT INTO `consultor` (`ConsultorID`, `UserID`, `ConsultorName`, `ConsultorTP`, `ConsultorAddress`, `ConsultorDescription`, `ConsultorAge`, `ConsultorPhoneNumber`, `ConsultorGender`, `ConsultorImgStatus`, `ConsultorChillBuds`, `ConsultorService`) VALUES
(1, 10, 'John Taylor', 'TP066454', 'Jalan Aincrad', 'I am a consultor in APU', 20, '014-6321806', 'Male', 1, 1, 'Fitness Consultation'),
(2, 15, 'Ryan', 'TP055343', 'Jalan', 'I am an consultor', 20, '014-6321806', 'Male', 0, 0, 'Mental Health Consultation'),
(3, 16, 'jeremy_staff', 'TP02933', 'Kuala', 'Jeremy Consultor Here', 20, '011-9283744', 'Male', 0, 0, 'Career Consultation');

-- --------------------------------------------------------

--
-- Table structure for table `consultor_consultation`
--

DROP TABLE IF EXISTS `consultor_consultation`;
CREATE TABLE IF NOT EXISTS `consultor_consultation` (
  `Consultation_ID` int(50) NOT NULL AUTO_INCREMENT,
  `Consult_Date` date NOT NULL,
  `Start_Time` varchar(50) COLLATE utf8_bin NOT NULL,
  `End_Time` varchar(50) COLLATE utf8_bin NOT NULL,
  `Consultor_ID` varchar(50) COLLATE utf8_bin NOT NULL,
  `ConsultationVenue` varchar(50) COLLATE utf8_bin NOT NULL,
  `SlotStatus` varchar(12) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Consultation_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `consultor_consultation`
--

INSERT INTO `consultor_consultation` (`Consultation_ID`, `Consult_Date`, `Start_Time`, `End_Time`, `Consultor_ID`, `ConsultationVenue`, `SlotStatus`) VALUES
(19, '2021-02-24', '16:30 PM', '07:30 AM', 'TP066454', 'Microsoft Teams', 'Past'),
(20, '2021-02-25', '1:30 PM', '2:30 PM', 'TP066454', 'Microsoft Teams', 'Past'),
(21, '2021-02-26', '3:30 PM', '6:00 PM', 'TP066454', 'Microsoft Teams', 'Past'),
(22, '2021-03-12', '09:30 AM', '10:00 AM', 'TP02933', 'Microsoft Teams', 'Ongoing'),
(23, '2021-03-31', '4:30 PM', '5:00 PM', 'TP066454', 'Microsoft Teams', 'Past'),
(24, '2021-03-18', '5:00 PM', '5:30 PM', 'TP066454', 'Discord', 'Ongoing'),
(25, '2021-03-19', '10:30 AM', '11:00 AM', 'TP066454', 'Microsoft Teams', 'Ongoing'),
(26, '2021-03-18', '09:30 AM', '10:00 AM', 'TP066454', 'Discord', 'Available'),
(27, '2021-03-13', '11:00 AM', '12:00 PM', 'TP066454', 'Discord', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `latest-news_comments`
--

DROP TABLE IF EXISTS `latest-news_comments`;
CREATE TABLE IF NOT EXISTS `latest-news_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Comment` text COLLATE utf8_bin NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `News_ID` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `latest-news_comments`
--

INSERT INTO `latest-news_comments` (`ID`, `UserID`, `Comment`, `CreatedOn`, `News_ID`) VALUES
(6, 9, 'News #1 Comment #1', '2021-03-10 01:15:02', 1),
(7, 11, 'Comment #1 ', '2021-03-10 21:08:45', 2),
(8, 11, 'Comment #2', '2021-03-10 21:08:50', 2),
(9, 11, 'Comment #3', '2021-03-10 21:08:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `latest-news_replies`
--

DROP TABLE IF EXISTS `latest-news_replies`;
CREATE TABLE IF NOT EXISTS `latest-news_replies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CommentID` int(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Comment` text COLLATE utf8_bin NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `News_ID` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `latest-news_replies_ibfk_1` (`CommentID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `latest-news_replies`
--

INSERT INTO `latest-news_replies` (`ID`, `CommentID`, `UserID`, `Comment`, `CreatedOn`, `News_ID`) VALUES
(1, 1, 11, 'Lol Haha', '2021-03-02 01:38:46', 2),
(11, 4, 10, 'u are gae', '2021-03-03 17:13:11', 1),
(12, 4, 10, 'Hahah whu u gae', '2021-03-03 17:14:04', 1),
(13, 6, 9, 'News #1 Reply #1.1', '2021-03-10 01:15:12', 1),
(14, 6, 9, 'News #1 Reply #1.2', '2021-03-10 01:15:23', 1),
(15, 6, 9, 'News #1 Reply #1.3', '2021-03-10 01:15:27', 1),
(16, 13, 9, 'News #1 Reply #1.1.1', '2021-03-10 01:15:48', 1),
(18, 6, 11, 'News #1 Reply #1.4', '2021-03-10 01:16:48', 1),
(19, 9, 11, 'Comment #3 Reply #1', '2021-03-10 21:09:03', 2),
(20, 9, 11, 'Comment #3 Reply #2', '2021-03-10 21:09:10', 2),
(21, 9, 11, 'Comment #3 Reply #3', '2021-03-10 21:09:14', 2),
(22, 19, 11, 'Comment #3 Reply #1.1', '2021-03-10 21:09:24', 2),
(23, 19, 11, 'Comment #3 Reply #1.2', '2021-03-10 21:10:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_data`
--

DROP TABLE IF EXISTS `news_data`;
CREATE TABLE IF NOT EXISTS `news_data` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` varchar(255) NOT NULL,
  `NewsDate` varchar(255) NOT NULL,
  `NewsTitle` varchar(255) NOT NULL,
  `NewsContent` mediumtext NOT NULL,
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_data`
--

INSERT INTO `news_data` (`NewsID`, `AdminID`, `NewsDate`, `NewsTitle`, `NewsContent`) VALUES
(1, '1', '11-9-2001', 'Ryan and Prem gaeee', ' Prem and Ryan Responses: What the fuck did you just fucking say about me, you little bitch? \r\n            I’ll have you know I graduated top of my class in the Navy Seals, and I’ve been involved in numerous secret raids on Al-Quaeda, and I have over 300 confirmed kills. I am trained in gorilla warfare and I’m the top sniper in the entire US armed forces. \r\n            You are nothing to me but just another target. \r\n            I will wipe you the fuck out with precision the likes of which has never been seen before on this Earth, mark my fucking words. \r\n            You think you can get away with saying that shit to me over the Internet? \r\n            Think again, fucker. As we speak I am contacting my secret network of spies across the USA and your IP is being traced right now so you better prepare for the storm, maggot. \r\n            The storm that wipes out the pathetic little thing you call your life. You’re fucking dead, kid. I can be anywhere, anytime, and I can kill you in over 700, and that’s just with my bare hands. \r\n            Not only am I extensively trained in unarmed combat, but I have access to the entire arsenal of the United States Marine Corps and I will use it to its full extent to wipe your miserable ass off the face of the continent. \r\n            If only you could have known what unholy retribution your little “clever” comment was about to bring down upon you, maybe you would have held your fucking tongue. But you couldn’t, and now you’re paying the price. \r\n            I will shit fury all over you and you will drown in it. You’re fucking dead, kiddo.'),
(2, '1', '1-1-2001', 'Hentai and why its so good', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, '1', '2-5-2021', 'Emergence Review', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(4, '1', '2021-02-26', '', 'asdasdasdasdasd'),
(5, '1', '2021-02-26', 'The size of jo momma, has finally been revealed by leading scientist, Johnny Sins', 'Penis'),
(6, '1', '2021-02-26', 'penis penis penis', 'Wubulabudubdub'),
(7, '1', '2021-02-26', 'Location where jo momma farted, has finally been revealed!!!', 'Penis'),
(8, '1', '2021-03-04', 'About Akihabara', 'Akihabara is a nice city in Japan'),
(9, '1', '2021-03-04', 'About Keikyu', 'Keikyu is Nice');

-- --------------------------------------------------------

--
-- Table structure for table `normal_user`
--

DROP TABLE IF EXISTS `normal_user`;
CREATE TABLE IF NOT EXISTS `normal_user` (
  `NormalUserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `NormalUserName` varchar(255) NOT NULL,
  `NormalUserTP` varchar(8) NOT NULL,
  `NormalUserAddress` varchar(1000) NOT NULL,
  `NormalUserDescription` varchar(1000) NOT NULL,
  `NormalUserAge` int(11) NOT NULL,
  `NormalUserPhoneNumber` varchar(13) NOT NULL,
  `NormalUserGender` varchar(6) NOT NULL,
  `NormalUserImgStatus` int(2) NOT NULL,
  `NormalUserChillBuds` int(2) NOT NULL,
  PRIMARY KEY (`NormalUserID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_user`
--

INSERT INTO `normal_user` (`NormalUserID`, `UserID`, `NormalUserName`, `NormalUserTP`, `NormalUserAddress`, `NormalUserDescription`, `NormalUserAge`, `NormalUserPhoneNumber`, `NormalUserGender`, `NormalUserImgStatus`, `NormalUserChillBuds`) VALUES
(1, 11, 'Ryan Lim Fang Yung', 'TP055343', '8, Jalan Bukit Indah 3/21, Taman Bukit Indah, 68000 Ampang', 'Fk My Life', 19, '014-6321806', 'Male', 1, 1),
(2, 17, 'jeremy_student', 'TP123456', 'Kuala', 'I am APU user Jeremy ', 20, '011-92837099', 'Male', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

DROP TABLE IF EXISTS `reset`;
CREATE TABLE IF NOT EXISTS `reset` (
  `ResetID` int(255) NOT NULL AUTO_INCREMENT,
  `ResetEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `ResetSelector` varchar(500) COLLATE utf8_bin NOT NULL,
  `ResetToken` varchar(500) COLLATE utf8_bin NOT NULL,
  `ResetExpires` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ResetID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`ResetID`, `ResetEmail`, `ResetSelector`, `ResetToken`, `ResetExpires`) VALUES
(5, 'ryanlimfangyung@live.com', '8d78c062d950042f', '$2y$10$D4.SmyveJMt1kHoALEcdFurfm7LvaF1K7aEPPeJiFZf/ouk/Pd6py', '1615054713'),
(6, 'ryanlimfangyung@live.com', 'c7076a746478bbb7', '$2y$10$T90NRWLmT98eJQscURxmLu3z5fObXBgVeW05YP5GindwXiZy8ToT6', '1615054815'),
(7, 'tp055343@mail.apu.edu.my', 'c2d67191efced3a3', '$2y$10$Av4DMKJ2Bw/g9RYIDUXsXeLTZEWU8j6sYYvmcVl1kZc13gepIX4d2', '1615277290'),
(8, 'tp055343@mail.apu.edu.my', 'ded08980cf3ac765', '$2y$10$4OjQo098vGs95RLWF0tON.IWzvNjJd50sy3xAss96nQZ2CeRw5GRq', '1615445659');

-- --------------------------------------------------------

--
-- Table structure for table `talk-it-out_comments`
--

DROP TABLE IF EXISTS `talk-it-out_comments`;
CREATE TABLE IF NOT EXISTS `talk-it-out_comments` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Comment` text COLLATE utf8_bin NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `Post_ID` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talk-it-out_comments`
--

INSERT INTO `talk-it-out_comments` (`ID`, `UserID`, `Comment`, `CreatedOn`, `Post_ID`) VALUES
(7, 11, 'Post #1 Comment #3', '2021-02-28 01:10:35', 1),
(8, 11, 'Post #2 Comment #1', '2021-02-28 01:12:13', 2),
(9, 11, 'Post #2 Comment #2', '2021-02-28 01:12:21', 2),
(10, 11, 'Post #2 Comment #3', '2021-02-28 01:12:24', 2),
(11, 11, 'Post #3 Comment #1', '2021-02-28 21:20:17', 3),
(12, 11, 'Post #4 Comment #1', '2021-03-01 15:56:50', 4),
(13, 10, 'Haha I am John Taylor Thank you', '2021-03-03 15:29:27', 6),
(14, 11, 'Second Post Haha', '2021-03-03 16:41:59', 6),
(15, 11, 'Post #1 Comment #4', '2021-03-09 02:51:57', 1),
(16, 11, 'Post #1 Comment #5', '2021-03-12 00:12:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `talk-it-out_replies`
--

DROP TABLE IF EXISTS `talk-it-out_replies`;
CREATE TABLE IF NOT EXISTS `talk-it-out_replies` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `CommentID` int(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Comment` text COLLATE utf8_bin NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `Post_ID` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`) USING BTREE,
  KEY `CommentID` (`CommentID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talk-it-out_replies`
--

INSERT INTO `talk-it-out_replies` (`ID`, `CommentID`, `UserID`, `Comment`, `CreatedOn`, `Post_ID`) VALUES
(13, 5, 11, 'Post #1 Reply #1', '2021-02-28 00:37:13', 1),
(16, 7, 11, 'Post #1 Reply #3', '2021-02-28 01:10:47', 1),
(17, 13, 11, 'Post #1 Reply #1.1', '2021-02-28 01:10:57', 1),
(18, 8, 11, 'Post #2 Reply #1', '2021-02-28 01:12:32', 2),
(19, 9, 11, 'Post #2 Reply #2', '2021-02-28 01:12:37', 2),
(20, 10, 11, 'Post #2 Reply #3', '2021-02-28 01:12:41', 2),
(21, 20, 11, 'Post #2 Reply #3.3', '2021-02-28 01:12:45', 2),
(22, 18, 11, 'Post #2 Reply #1.1', '2021-02-28 01:12:50', 2),
(23, 12, 11, 'Post #4 Reply #2', '2021-03-01 15:57:00', 4),
(24, 13, 11, 'haha nice to meet u ', '2021-03-03 16:41:51', 6),
(25, 10, 10, 'Consultor Comment ', '2021-03-03 16:53:18', 2),
(26, 10, 10, 'Another Consultor Comment', '2021-03-03 16:54:31', 2),
(27, 7, 11, 'Post #1 Reply #3.2', '2021-03-09 00:50:39', 1),
(28, 7, 11, 'Post #1 Reply #3.2', '2021-03-09 00:51:06', 1),
(30, 28, 11, 'Post #1 Reply 3.2.2', '2021-03-09 01:32:03', 1),
(31, 15, 11, 'Post #1 Reply #4.1', '2021-03-09 02:52:06', 1),
(32, 15, 11, 'Post #1 Reply #4.2', '2021-03-09 02:52:10', 1),
(33, 15, 11, 'Post #1 Reply #4.3', '2021-03-09 02:52:13', 1),
(34, 15, 11, 'Post #1 Reply #4.4', '2021-03-09 02:52:17', 1),
(35, 34, 9, 'Post #1 Reply #4.4.1', '2021-03-09 15:43:15', 1),
(36, 35, 9, 'Post #1 Reply #4.4.1.1', '2021-03-09 15:43:38', 1),
(37, 15, 9, 'Post #1 Reply #4.5', '2021-03-09 15:53:17', 1),
(38, 37, 9, 'Post #1 Reply #4.5.1', '2021-03-09 15:53:28', 1),
(39, 20, 11, 'Post #2 Reply #3.4', '2021-03-10 21:10:49', 2),
(40, 15, 11, 'Post #1 Reply #4.6', '2021-03-10 23:14:39', 1),
(41, 16, 11, 'Post #1 Reply #5.1', '2021-03-12 00:13:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `talk-it-out_upvotes`
--

DROP TABLE IF EXISTS `talk-it-out_upvotes`;
CREATE TABLE IF NOT EXISTS `talk-it-out_upvotes` (
  `UpvoteID` int(255) NOT NULL AUTO_INCREMENT,
  `PostID` int(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UpvoteState` int(2) NOT NULL,
  `DownvoteState` int(2) NOT NULL,
  PRIMARY KEY (`UpvoteID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talk-it-out_upvotes`
--

INSERT INTO `talk-it-out_upvotes` (`UpvoteID`, `PostID`, `UserID`, `UpvoteState`, `DownvoteState`) VALUES
(1, 1, 11, 1, 0),
(12, 2, 11, 1, 0),
(13, 3, 11, 1, 0),
(14, 1, 10, 1, 0),
(15, 1, 9, 1, 0),
(16, 2, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `talk_it_out_post`
--

DROP TABLE IF EXISTS `talk_it_out_post`;
CREATE TABLE IF NOT EXISTS `talk_it_out_post` (
  `Post_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Post_Title` varchar(50) COLLATE utf8_bin NOT NULL,
  `Post_Content` longtext COLLATE utf8_bin NOT NULL,
  `Post_Date_Time` datetime NOT NULL,
  `UserID` int(20) NOT NULL,
  `Post_Upvote` int(255) NOT NULL,
  PRIMARY KEY (`Post_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talk_it_out_post`
--

INSERT INTO `talk_it_out_post` (`Post_ID`, `Post_Title`, `Post_Content`, `Post_Date_Time`, `UserID`, `Post_Upvote`) VALUES
(1, 'Post #1', 'This is a test', '2021-02-27 08:45:23', 11, 3),
(2, 'Post #2', 'This is another test', '2021-02-27 08:46:56', 11, 3),
(3, 'Post #3', 'Penguins are cute birds.', '2021-02-28 13:20:01', 11, 3),
(4, 'Post #4', 'Something Here', '2021-03-01 07:56:11', 11, 0),
(5, 'Post #5', 'Post Number 5', '2021-03-01 16:00:12', 11, 0),
(6, 'Post #6', 'Post By John Taylor', '2021-03-03 07:22:08', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` tinytext NOT NULL,
  `UserPassword` longtext NOT NULL,
  `UserRole` varchar(9) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `UserPassword`, `UserRole`, `UserEmail`) VALUES
(9, 'lim', '$2y$10$fC84IcGFlDSu/Vd6DsfmVePxuUksYBKCq/ZZNbqmkyAz8FmwTU..6', 'admin', 'tp055343@mail.apu.edu.my'),
(10, 'lim_consultor', '$2y$10$V1orTvuz3mNeWBKd5fGZ2e/kYitSHgredUTwHD6yb7pPJMjNjK6z2', 'consultor', 'johntaylor@mail.com'),
(11, 'lim_student', '$2y$10$jES8RYMi6YUqnJGNTW0gt.v0CqtMnqc2DZ0fqrggd9YmpwpxeO.mW', 'student', 'ryanlimfangyung@live.com'),
(15, 'lim_consultor2', '$2y$10$ikf18Pvj8hbs3SZG6OHBwuFkyDXRsFNh/eRNHQpjaa2968ueSdR0S', 'consultor', 'tp055343@mail.apu.edu.my'),
(16, 'jeremy_consultor', '$2y$10$OxcRkFs4.UMg1xE5hGso7e/wlky1UPL.Tdi1OVWaMFUssVCpaVNna', 'consultor', 'jeremy@mail.com'),
(17, 'jeremy_user', '$2y$10$LFIQRVAmDXAxZNYBqH6ZG.TfsovXABvGPYmnpBOdx0kZRgvx5JIaq', 'student', 'jeremy@mail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chillbuds-user`
--
ALTER TABLE `chillbuds-user`
  ADD CONSTRAINT `chillbuds-user_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `latest-news_comments`
--
ALTER TABLE `latest-news_comments`
  ADD CONSTRAINT `latest-news_comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_user`
--
ALTER TABLE `normal_user`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `talk-it-out_comments`
--
ALTER TABLE `talk-it-out_comments`
  ADD CONSTRAINT `talk-it-out_comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
