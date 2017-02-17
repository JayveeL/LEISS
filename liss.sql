-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 11:03 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liss`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_list`
--

CREATE TABLE IF NOT EXISTS `borrowed_list` (
  `bListID` int(11) NOT NULL,
  `borrowerIDNum` double DEFAULT NULL,
  `labID` int(11) DEFAULT NULL,
  `compSerialNum` varchar(50) DEFAULT NULL,
  `eqpSerialNum` varchar(50) DEFAULT NULL,
  `borrowedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher` varchar(50) DEFAULT NULL,
  `inCharge` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE IF NOT EXISTS `component` (
  `compSerialNum` varchar(50) NOT NULL,
  `compName` varchar(50) NOT NULL,
  `labID` int(11) NOT NULL,
  `price` double NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `move` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`compSerialNum`, `compName`, `labID`, `price`, `dateAdded`, `move`) VALUES
('00000', 'qwqwqw', 4, 12, '2017-02-16 09:36:16', 0),
('112222289hkuhkh', 'qwqqq', 3, 3311, '2017-02-16 09:36:16', 0),
('1200000', 'wewewe', 4, 4, '2017-02-16 09:36:16', 0),
('1212', 'ererrr', 1, 3333, '2017-02-16 09:36:16', 0),
('123', 'Comp1', 1, 12, '2017-02-16 09:36:16', 0),
('1230', 'Comp8', 6, 12, '2017-02-16 09:36:16', 1),
('1231', 'Comp9', 3, 12, '2017-02-16 09:36:16', 0),
('1234', 'Comp2', 2, 12, '2017-02-16 09:36:16', 0),
('1235', 'Comp3', 1, 12, '2017-02-16 09:36:16', 0),
('1236', 'Comp4', 1, 12, '2017-02-16 09:36:16', 0),
('1237', 'Comp5', 2, 12, '2017-02-16 09:36:16', 0),
('1238', 'Comp6', 1, 12, '2017-02-16 09:36:16', 0),
('1239', 'Comp7', 3, 12, '2017-02-16 09:36:16', 0),
('1999999', 'qwqwqwq', 1, 2222, '2017-02-16 09:36:16', 0),
('22221114444', 'qwqwqw', 4, 122, '2017-02-16 09:36:16', 0),
('2222qwqw', 'aaa', 6, 3, '2017-02-16 09:36:16', 0),
('33333', 'commmm', 6, 1111, '2017-02-16 09:36:16', 0),
('333333', 'qrttt', 4, 331, '2017-02-16 09:36:16', 0),
('444qqqq', 'qwqwqwqwqw', 4, 0, '2017-02-16 09:36:16', 0),
('65656', 'yeyeyey', 1, 1, '2017-02-16 09:36:16', 0),
('90000', 'qwwww', 1, 4, '2017-02-16 09:36:16', 0),
('90000000', 'www', 1, 2, '2017-02-16 09:36:16', 0),
('rreee', '1212', 6, 5, '2017-02-16 09:38:36', 0),
('yty1212', 'ttttt', 4, 12, '2017-02-16 09:36:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `damaged_list`
--

CREATE TABLE IF NOT EXISTS `damaged_list` (
  `dListID` int(20) unsigned NOT NULL,
  `damagerIDNum` double DEFAULT NULL,
  `labID` int(11) DEFAULT NULL,
  `compSerialNum` varchar(50) DEFAULT NULL,
  `eqpSerialNum` varchar(50) DEFAULT NULL,
  `dateReported` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damaged_list`
--

INSERT INTO `damaged_list` (`dListID`, `damagerIDNum`, `labID`, `compSerialNum`, `eqpSerialNum`, `dateReported`, `teacher`) VALUES
(4, 13105873, 2, NULL, '216578', '2017-02-16 08:09:48', 'qwwww'),
(6, 13105873, 2, NULL, '23232', '2017-02-16 08:09:48', 'qwwww'),
(7, 13105873, 2, NULL, '534534', '2017-02-16 08:09:48', 'qwwww'),
(8, 13105873, 2, NULL, 'oooo', '2017-02-16 08:09:49', 'qwwww'),
(10, 13105873, 6, NULL, '122222444', '2017-02-16 10:02:50', 'test'),
(12, 13105873, 6, '1230', NULL, '2017-02-16 12:21:24', 'qwqqw');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `eqpSerialNum` varchar(50) NOT NULL,
  `eqpName` varchar(50) NOT NULL,
  `labID` int(11) NOT NULL,
  `price` double NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `move` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eqpSerialNum`, `eqpName`, `labID`, `price`, `dateAdded`, `move`) VALUES
('', '', 1, 0, '2017-02-16 09:35:47', 0),
('0967', 'NewEqp', 2, 12, '2017-02-16 09:35:47', 1),
('1', 'qqwEdit', 1, 89, '2017-02-16 09:35:47', 0),
('11', 'test9', 1, 12, '2017-02-16 09:35:47', 1),
('1212', 'pr', 1, 2, '2017-02-16 09:35:47', 5),
('121212', 'rerererer', 1, 2211, '2017-02-16 09:35:47', 0),
('121212134', 'eweq', 4, 42, '2017-02-16 09:35:47', 0),
('122222444', 'test', 6, 1, '2017-02-16 10:02:20', 0),
('1222eerr', 'asasas', 6, 12, '2017-02-16 09:59:43', 0),
('216578', 'NewEqp', 2, 123, '2017-02-16 09:35:47', 0),
('23131', 'test2', 3, 21, '2017-02-16 09:35:47', 0),
('2323', 'test5', 3, 34, '2017-02-16 09:35:47', 0),
('23231', 'test8', 2, 212, '2017-02-16 09:35:47', 0),
('23232', 'esired', 2, 333, '2017-02-16 09:35:47', 0),
('24678', 'test6', 3, 321, '2017-02-16 09:35:47', 0),
('323', 'test4', 1, 32, '2017-02-16 09:35:47', 0),
('3331', '', 1, 0, '2017-02-16 09:35:47', 0),
('443', 'myNew', 6, 2, '2017-02-16 09:35:47', 2),
('53', 'newtesting', 3, 31, '2017-02-16 09:35:47', 0),
('534534', 'new12', 2, 212, '2017-02-16 09:35:47', 0),
('6774', 'test7', 3, 12, '2017-02-16 09:35:47', 0),
('7582', 'test1', 1, 20, '2017-02-16 09:35:47', 0),
('888888', 'hio', 3, 122, '2017-02-16 09:35:47', 0),
('909009', 'myEquipment', 3, 300, '2017-02-16 09:35:47', 0),
('9090091', 'myEquipment2', 3, 3001, '2017-02-16 09:35:47', 0),
('eeeqq', 'rqrqr', 4, 12, '2017-02-16 09:35:47', 0),
('eeweqwe', 'wttr', 6, 4, '2017-02-16 09:35:47', 0),
('oooo', 'newEqp', 2, 22, '2017-02-16 09:35:47', 0),
('qadd', 'qqqq', 6, 1, '2017-02-16 09:35:47', 0),
('tttte', 'eee', 6, 122, '2017-02-16 09:35:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `labID` int(11) NOT NULL,
  `labName` varchar(20) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`labID`, `labName`, `description`) VALUES
(1, 'myLab', 'test '),
(2, 'myLab2', 'test2'),
(3, 'myLab3', 'test3'),
(4, 'myLab4', ''),
(6, 'test2', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logID` int(11) NOT NULL,
  `serialNum` varchar(100) DEFAULT NULL,
  `labID` varchar(100) DEFAULT NULL,
  `studentID` double DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logID`, `serialNum`, `labID`, `studentID`, `action`, `date`) VALUES
(54, 'tttte', 'test2', 0, 'add', '2017-02-16 09:33:00'),
(57, '1222eerr', 'test2', 0, 'add', '2017-02-16 09:59:45'),
(58, '122222444', 'test2', 0, 'add', '2017-02-16 10:02:21'),
(59, '122222444', 'test2', 13105873, 'damage', '2017-02-16 10:02:50'),
(60, '0967', 'myLab2', 0, 'repair', '2017-02-16 10:49:08'),
(61, '23231', 'myLab2', 0, 'repair', '2017-02-16 11:00:41'),
(62, '1230', 'test2', 0, 'move', '2017-02-16 12:01:25'),
(63, '1230', 'test2', 13105873, 'damage', '2017-02-16 12:21:24'),
(64, '65656', 'myLab', 13105873, 'damage', '2017-02-16 12:41:43'),
(65, '65656', 'myLab', 0, 'repair', '2017-02-16 12:47:57'),
(66, '65656', 'myLab', 0, 'repair', '2017-02-16 12:48:49'),
(67, '1', 'myLab', 0, 'repair', '2017-02-16 12:49:09'),
(68, '65656', 'myLab', 0, 'repair', '2017-02-16 12:50:10'),
(69, '65656', 'myLab', 0, 'repair', '2017-02-16 12:51:46'),
(70, '1238', 'myLab', 13105873, 'borrow', '2017-02-16 12:55:21'),
(71, '1238', 'myLab', 13105873, 'return', '2017-02-16 12:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentID` double NOT NULL,
  `studentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`) VALUES
(0, ''),
(11223344, 'Test'),
(12345678, 'Jayvee'),
(12345689, 'New'),
(13105872, 'J'),
(13105873, 'JV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_list`
--
ALTER TABLE `borrowed_list`
  ADD PRIMARY KEY (`bListID`),
  ADD KEY `lab_id` (`labID`),
  ADD KEY `borrower_id` (`borrowerIDNum`),
  ADD KEY `eqp_id` (`eqpSerialNum`),
  ADD KEY `comp_id` (`compSerialNum`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`compSerialNum`),
  ADD KEY `lab_id` (`labID`);

--
-- Indexes for table `damaged_list`
--
ALTER TABLE `damaged_list`
  ADD PRIMARY KEY (`dListID`),
  ADD UNIQUE KEY `dListID` (`dListID`),
  ADD KEY `damaged_list_ibfk_4` (`labID`),
  ADD KEY `eqpID` (`eqpSerialNum`),
  ADD KEY `compID` (`compSerialNum`),
  ADD KEY `damagerID` (`damagerIDNum`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eqpSerialNum`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`labID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `labID` (`labID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `log_ibfk_5` (`serialNum`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowed_list`
--
ALTER TABLE `borrowed_list`
  MODIFY `bListID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `damaged_list`
--
ALTER TABLE `damaged_list`
  MODIFY `dListID` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `labID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_list`
--
ALTER TABLE `borrowed_list`
  ADD CONSTRAINT `borrowed_list_ibfk_1` FOREIGN KEY (`borrowerIDNum`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `borrowed_list_ibfk_2` FOREIGN KEY (`labID`) REFERENCES `laboratory` (`labID`),
  ADD CONSTRAINT `borrowed_list_ibfk_3` FOREIGN KEY (`compSerialNum`) REFERENCES `component` (`compSerialNum`),
  ADD CONSTRAINT `borrowed_list_ibfk_4` FOREIGN KEY (`eqpSerialNum`) REFERENCES `equipment` (`eqpSerialNum`);

--
-- Constraints for table `component`
--
ALTER TABLE `component`
  ADD CONSTRAINT `component_ibfk_1` FOREIGN KEY (`labID`) REFERENCES `laboratory` (`labID`);

--
-- Constraints for table `damaged_list`
--
ALTER TABLE `damaged_list`
  ADD CONSTRAINT `damaged_list_ibfk_4` FOREIGN KEY (`labID`) REFERENCES `laboratory` (`labID`),
  ADD CONSTRAINT `damaged_list_ibfk_5` FOREIGN KEY (`eqpSerialNum`) REFERENCES `equipment` (`eqpSerialNum`),
  ADD CONSTRAINT `damaged_list_ibfk_6` FOREIGN KEY (`compSerialNum`) REFERENCES `component` (`compSerialNum`),
  ADD CONSTRAINT `damaged_list_ibfk_7` FOREIGN KEY (`damagerIDNum`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
