-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: bf2tr8x8e0uvlwfawzxr-mysql.services.clever-cloud.com:3306
-- Generation Time: Aug 02, 2021 at 08:08 AM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bf2tr8x8e0uvlwfawzxr`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int NOT NULL,
  `complaintNumber` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `remarkDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `oid` int NOT NULL,
  `otp` int DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `exp` int DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`oid`, `otp`, `email`, `exp`) VALUES
(1, 956076, 'anibilu@gmail.com', 1),
(3, 649882, 'sayanika.dutta07@gmail.com', 1),
(4, 290211, 'stark@avengers.com', 0),
(5, 778403, 'mayankk159@gmail.com', 1),
(6, 648501, 'supriya.kumari.cse21@heritageit.edu.in', 1),
(7, 844246, 'salu@gmail.com', 0),
(8, 237688, 'mayankk1499@gmail.com', 1),
(9, 223754, 'mmayankk420@gmail.com', 1),
(10, 228510, 'supriya.305.kumari@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int NOT NULL,
  `userId` int DEFAULT NULL,
  `category` varchar(225) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `complaintType`, `complaintDetails`, `complaintFile`, `status`, `lastUpdationDate`) VALUES
(9, 9, 'Electrical', 'Personal', 'Not working.', 'quiz2_sol.pdf', NULL, NULL),
(10, 11, 'Plumbing', 'Personal', 'broken tap', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `tower` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `flatno` tinytext,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ref` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `tower`, `flatno`, `userImage`, `updationDate`, `ref`) VALUES
(1, NULL, 'admin', 'admin', NULL, '', NULL, NULL, NULL, 1),
(6, 'Anirban Roy', 'anibilu@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Sayanika Dutta', 'sayanika.dutta07@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Supriya', 'supriya.kumari.cse21@heritageit.edu.in', 'Sup123', 6184646644, '12', '15', '68d5535b971d558f594f10a5affd0a71jpeg', NULL, 0),
(10, 'Mayank Kumar', 'mayankk1499@gmail.com', '123', 8240715997, '1', '101', '29a95beed8cf4a444ef43b3e9e42dfb6.jpg', '2021-07-08 14:24:00', 0),
(11, 'Mayan Sharma', 'mmayankk420@gmail.com', '123', 8240715997, '1', '206', '29a95beed8cf4a444ef43b3e9e42dfb6.jpg', NULL, 0),
(13, 'Mayank Kumar', 'mayankk159@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `oid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
