-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2021 at 05:54 AM
-- Server version: 10.3.24-MariaDB-cll-lve
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
-- Database: `u377111027_mpayapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`, `cname`, `mobile`, `domain`, `balance`) VALUES
(1, 'admin', '123456', 'MPay Api', '9876543210', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_wallet`
--

CREATE TABLE `ad_wallet` (
  `id` int(11) NOT NULL,
  `open` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_wallet`
--

INSERT INTO `ad_wallet` (`id`, `open`, `amount`, `type`, `date`, `time`, `trid`) VALUES
(1, 0, 100, 'Debit', '2021-06-28', '05:42:10 PM', '02121'),
(2, -100, 50100, 'Credit', '2021-06-28', '07:05:59 PM', '00000'),
(3, 50000, 100, 'Debit', '2021-06-28', '11:07:23 PM', '25659856'),
(4, 49900, 100, 'Credit', '2021-06-28', '11:08:21 PM', '25659856'),
(5, 50000, 100000, 'Debit', '2021-06-29', '02:17:11 PM', '00000'),
(6, -50000, 100000, 'Credit', '2021-06-29', '02:17:45 PM', '00000'),
(7, 50000, 50000, 'Debit', '2021-06-30', '10:55:12 AM', '545454'),
(8, 0, 10000, 'Credit', '2021-07-10', '08:32:57 PM', '000'),
(9, 10000, 10000, 'Debit', '2021-07-10', '08:33:07 PM', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `api_name` varchar(30) NOT NULL,
  `token` varchar(30) NOT NULL,
  `api_token` varchar(50) NOT NULL,
  `url` varchar(200) CHARACTER SET ascii NOT NULL,
  `curl_data` varchar(200) NOT NULL,
  `resmsg` varchar(15) NOT NULL,
  `msgdesc` varchar(40) NOT NULL,
  `ressuccess` varchar(15) NOT NULL,
  `respending` varchar(15) NOT NULL,
  `resfailed` varchar(15) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `api_name`, `token`, `api_token`, `url`, `curl_data`, `resmsg`, `msgdesc`, `ressuccess`, `respending`, `resfailed`, `status`) VALUES
(1, 'M ROBOTICS', 'luThyLrGThpulTGGJZTt', '', 'https://mrobotics.in/api/recharge_get?', 'api_token=$api_token&mobile_no=$number&amount=$amount&company_id=$provider_id&order_id=$req&is_stv=$is_stv', 'status', 'response', 'success', 'pending', 'failure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `device_id` varchar(20) NOT NULL,
  `client_id` varchar(10) NOT NULL,
  `api_key` varchar(30) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `pin` int(6) NOT NULL,
  `reg_date` varchar(15) DEFAULT current_timestamp(),
  `balance` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_wallet`
--

CREATE TABLE `client_wallet` (
  `id` int(11) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `op_bal` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `cl_bal` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `pmode` varchar(20) NOT NULL,
  `tr_id` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_wallet`
--
-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `op_id` int(5) NOT NULL,
  `op_type` varchar(15) NOT NULL,
  `provider_id` varchar(5) NOT NULL,
  `op_name` varchar(20) NOT NULL,
  `starter` varchar(8) NOT NULL,
  `basic` varchar(10) NOT NULL,
  `api_id` varchar(8) NOT NULL,
  `is_stv` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `op_id`, `op_type`, `provider_id`, `op_name`, `starter`, `basic`, `api_id`, `is_stv`, `status`) VALUES
(1, 1, 'MOBILE', '2', 'Airtel', '3', '2', '1', 'false', 1),
(2, 2, 'MOBILE', '5', 'Jio', '4', '3', '1', 'false', 1),
(3, 3, 'MOBILE', '1', 'VI', '3', '2', '1', 'false', 1),
(4, 4, 'MOBILE', '4', 'BSNL', '4', '3', '1', 'false', 1),
(5, 5, 'MOBILE', '5', 'Jio Prime', '4', '3', '1', 'true', 1),
(6, 6, 'Dish Tv', '6', 'DTH', '3', '2', '1', 'false', 1),
(7, 7, 'DTH', '7', 'Tata Sky', '3', '2', '1', 'false', 1),
(8, 8, 'MOBILE', '4', 'BSNL STV', '3', '2', '1', 'true', 1),
(9, 9, 'DTH', '9', 'Airtel DTH', '3', '2', '1', 'false', 1),
(10, 10, 'MOBILE', '17', 'Jio Lite', '3', '2', '1', 'false', 1),
(11, 11, 'MOBILE', '17', 'Jio Lite Prime', '3', '2', '1', 'true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `req_id` varchar(30) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `op_id` varchar(5) NOT NULL,
  `amount` varchar(4) NOT NULL,
  `comm` varchar(8) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_wallet`
--
ALTER TABLE `ad_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_wallet`
--
ALTER TABLE `client_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_wallet`
--
ALTER TABLE `ad_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_wallet`
--
ALTER TABLE `client_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2352;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
