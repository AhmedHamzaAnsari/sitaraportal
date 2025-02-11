-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 12:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `oil_issues`
--

CREATE TABLE `oil_issues` (
  `id` int(111) NOT NULL,
  `oil_type` varchar(255) NOT NULL,
  `s_type` varchar(255) NOT NULL,
  `a_qty` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `op` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oil_issues`
--

INSERT INTO `oil_issues` (`id`, `oil_type`, `s_type`, `a_qty`, `issue_date`, `op`, `remark`) VALUES
(2, 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', ''),
(3, 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'yes'),
(4, 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oil_issues`
--
ALTER TABLE `oil_issues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oil_issues`
--
ALTER TABLE `oil_issues`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
