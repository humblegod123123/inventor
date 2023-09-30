-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 03:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `item_id` int(12) NOT NULL,
  `borrower_id` int(12) NOT NULL,
  `date_brwd` varchar(255) NOT NULL,
  `item_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(12) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `rfid` int(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `department` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `officeroom` varchar(255) NOT NULL,
  `issuedto` varchar(255) NOT NULL,
  `dateacq` varchar(255) NOT NULL,
  `licensed` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `rfid`, `barcode`, `sn`, `pcode`, `particular`, `description`, `qty`, `amount`, `department`, `building`, `officeroom`, `issuedto`, `dateacq`, `licensed`, `status`, `remark`) VALUES
(1, 0, '0000001', 'SBC0000001', 'A12345', 'Epson Printer', 'L3110, Color Black', 1, '10000.00', 'College', 'SMAO', 'SAO Office', 'Maria Grace D. Contreras', '2023-06-16', 2147483647, 'Not Available', 'Brand New Purchased'),
(3, 1, '0000002', 'SBC0000002', 'A10000', 'Epson Projector', '3 LCD Technology - ceiling type', 1, '27000.00', 'College', 'SJE', '101', 'Faculty', '2023-06-21', 2147483647, 'Not Applicable', 'Brand New Purchased'),
(4, 3, '0000003', 'SBC0000003', 'A12345', 'Epson Printer', 'EPSON L120 L-SERIES PRINTER (black)', 3, '7.00', 'High School', 'SMD', '601', 'Faculty', '2023-06-01', 123, 'Not Available', 'brand new purchased');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `num` int(12) NOT NULL,
  `empid` int(12) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `usertype` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`num`, `empid`, `lastname`, `firstname`, `middlename`, `suffix`, `usertype`, `username`, `password`) VALUES
(1, 1913, 'SBC', 'Bulak', 'AIMS', '', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, 'ITMSO', 'ITMSO', '', '', 'ITMSO', 'itmso', 'e284e9038cb4fb17dd6048e9e529c697'),
(3, 2, 'Borrower', 'Borrower', '', '', 'Borrower', 'borrower', 'a9e0ce5948901f85546701a53ea2c1f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `rfid` (`rfid`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`num`,`empid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `num` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
