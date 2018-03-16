-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 07:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `sno` int(100) NOT NULL,
  `eid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`sno`, `eid`, `username`, `password`, `category`) VALUES
(1, 1200, 'abc', '900150983cd24fb0d6963f7d28e17f72', 'N'),
(2, 1201, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `details1`
--

CREATE TABLE `details1` (
  `sno` int(100) NOT NULL,
  `uid` bigint(150) NOT NULL,
  `problem` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `fileupload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details1`
--

INSERT INTO `details1` (`sno`, `uid`, `problem`, `date`, `status`, `fileupload`) VALUES
(1, 6464, 'hfcth', '2018-03-15 15:29:23', 'closed', ''),
(2, 658765, ',jmghfgx', '2018-03-15 15:30:39', 'closed', ''),
(3, 56365354, 'hvsdhvbjhfv', '2018-03-15 15:32:44', 'closed', ''),
(4, 34534, 'jgdfj', '2018-03-15 15:39:12', 'pending', ''),
(6, 23467, 'dj', '2018-03-15 15:46:14', 'pending', ''),
(8, 978, 'HKVHVD', '2018-03-15 16:04:29', 'pending', 'uploads/8.jpg'),
(9, 3423, 'fdf', '2018-03-15 16:24:46', 'pending', ''),
(10, 0, '', '2018-03-15 17:38:09', 'pending', ''),
(11, 243, 'fjsdjf', '2018-03-15 17:39:27', 'pending', ''),
(12, 32, 'gfdg', '2018-03-15 17:45:54', 'pending', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `eid` (`eid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `details1`
--
ALTER TABLE `details1`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `details1`
--
ALTER TABLE `details1`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
