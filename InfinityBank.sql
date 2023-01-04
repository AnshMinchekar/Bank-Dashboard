-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 06:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `InfinityBank`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchId` int(11) NOT NULL,
  `branchNo` varchar(111) NOT NULL,
  `branchName` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchId`, `branchNo`, `branchName`) VALUES
(1, '400074', 'Mumbai'),
(2, '265721', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `message` text NOT NULL,
  `userId` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `message`, `userId`, `date`) VALUES
(1, 'Debit Card not recieved yet.', 1, '2022-03-17 02:27:48'),
(3, 'My transaction failed but mt account was still debited', 2, '2022-04-20 07:30:02'),
(4, 'Lost my passbook.', 1, '2022-03-25 11:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `type` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`, `date`) VALUES
(1, 'cashier@cashier.com', 'cashier', 'cashier', '2017-12-15 04:36:27'),
(2, 'manager@manager.com', 'manager', 'manager', '2017-12-15 04:36:27'),
(3, 'sadfas@gmail.com', 'sdfas', 'type', '2017-12-16 07:13:12'),
(4, 'fkgeo@gmail.com', 'asdfsa', 'type', '2017-12-16 07:13:18'),
(6, 'cashier2@cashier.com', 'cashier2', 'cashier', '2017-12-16 07:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `userId` varchar(111) NOT NULL,
  `notice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `userId`, `notice`, `date`) VALUES
(1, '1', 'Dear Customer! <br> The bank will never ask you for your UPI PIN. Do not share it with anyone', '10-04-2022 15:21:06'),
(6, '2', 'Dear Customer,<br>\r\Our privacy policies will be updated soon, please keep an eye on your email for the notice.', '11-04-2022 12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `otheraccounts`
--

CREATE TABLE `otheraccounts` (
  `id` int(11) NOT NULL,
  `accountNum` varchar(111) NOT NULL,
  `bankName` varchar(111) NOT NULL,
  `holderName` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otheraccounts`
--

INSERT INTO `otheraccounts` (`id`, `accountNum`, `bankName`, `holderName`, `balance`, `date`) VALUES
(1, '12001122', 'SBI', 'Nirav Modi', '40800', '2019-12-21 06:30:07'),
(2, '12001123', 'HDFC', 'Harshad Mehta', '71000', '2021-06-17 12:55:42'),
(3, '12001124', 'Axis', 'Vijay Mallya', '71000', '2020-03-19 08:32:57');
-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `action` varchar(111) NOT NULL,
  `credit` varchar(111) NOT NULL,
  `debit` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `beneId` varchar(111) NOT NULL,
  `other` varchar(111) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `action`, `credit`, `debit`, `balance`, `beneId`, `other`, `userId`, `date`) VALUES
(4, 'Transfer', '', '200', '', '', '12001122', 1, '2019-06-17 09:55:59'),
(5, 'Transfer', '', '200', '', '', '10054777', 1, '2019-08-27 12:55:42'),
(6, 'Transfer', '', '333', '', '', '10054777', 1, '2020-04-17 08:15:07'),
(7, 'Transfer', '', '222', '', '', '10054777', 1, '2020-03-22 12:55:16'),
(8, 'Transfer', '', '333', '', '', '10054777', 1, '2020-07-17 11:50:32'),
(16, 'Withdraw', '', '100', '', '', '23423', 1, '2021-06-27 02:50:12'),
(17, 'Deposit', '1200', '', '', '', '234232', 1, '2021-09-13 22:32:22'),
(18, 'Transfer', '', '467', '', '', '12001122', 1, '2021-01-14 27:07:42'),
(22, 'Deposit', '1200', '', '', '', '32424', 2, '2021-05-19 04:42:00'),
(23, 'Withdraw', '', '12', '', '', '23423', 2, '2021-03-16 15:05:17'),
(24, 'Deposit', '12', '', '', '', '21321', 2, '2022-09-17 13:27:05'),
(25, 'Transfer', '', '1200', '', '', '10054777', 1, '2022-11-25 12:30:30'),
(26, 'Deposit', '600', '', '', '', '342342', 2, '2022-04-13 11:07:22'),
(27, 'Withdraw', '', '1012', '', '', '23423', 2, '2022-07-03 17:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `Aadhar` varchar(111) NOT NULL,
  `number` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `source` varchar(111) NOT NULL,
  `accountNum` varchar(111) NOT NULL,
  `branch` varchar(111) NOT NULL,
  `accountType` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `email`, `password`, `name`, `balance`, `Aadhar`, `number`, `city`, `address`, `source`, `accountNum`, `branch`, `accountType`, `date`) VALUES
(1, 'NishantG@gmail.com', 'Princeton', 'Nishant Gupta', '9800', '3210375555426', '012345678', 'Mumbai', 'Chembur', 'Programmer', '1005469', '1', 'Current', '2018-03-22 12:55:16'),
(2, 'Tanmay@gmail.com', 'Moscow', 'Tanmay Sharma', '16000', '77903732655343', '012345678', 'Kolkata', 'Lal Chowk', 'Businessman ', '10054777', '1', 'Saving', '2018-04-13 11:07:22'),
(6, 'RameshS@gmail.com', 'Portugal', 'Ramesh Shah', '234234', '1240405834902', '123456780', 'Pune', 'NIBM', 'Govt. job', '1513410739', '1', 'saving', '2018-09-17 13:27:05'),
(7, 'Hardik@gmail.com', 'Rio', 'Hardik Mehta', '12121', '9900337234902', '123456780', 'Solapur', 'MG Road', 'Govt. job', '1513410837', '1', 'current','2018-07-03 17:07:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
