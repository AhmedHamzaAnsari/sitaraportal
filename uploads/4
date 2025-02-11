-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 02:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmcstracuture`
--

-- --------------------------------------------------------

--
-- Table structure for table `accinsurance`
--

CREATE TABLE `accinsurance` (
  `id` int(111) NOT NULL,
  `name` varchar(225) NOT NULL,
  `website` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `fax` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `ntn` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accinsurance`
--

INSERT INTO `accinsurance` (`id`, `name`, `website`, `email`, `phone`, `fax`, `address`, `ntn`, `file`, `size`, `privilege`, `a`, `b`, `c`, `d`) VALUES
(42, 'Ahmed Hamza Ansari', 'hamza.com', 'hamza@gmail.com', '12334454', 'fax.com', 'shahrah e faisal', 'NTN NTN', '', '', '', '', '', '', ''),
(43, 'Taha', 'website', 'taha@gmail.com', '12345677', 'fax1122', 'shahrah e faisal', 'NTN NTN', '', '', 'Insurance', '', '', '', ''),
(44, 'Saim', 'saim.com', 'saim@gmail.com', '122331212', 'fax', 'shahrah e faisal', 'NTN NTN', '', '', 'Insurance', '', '', '', ''),
(45, 'P2P Track', 'P2PTRACK.COM', 'p2p@gmail.com', '12343212', 'fax.com', 'shahrah e faisal', 'NTN NTN', '', '', 'Insurance', '', '', '', ''),
(46, 'P2P Track', 'P2PTRACK.COM', 'p2p@gmail.com', '12343212', 'fax.com', 'shahrah e faisal', 'NTN NTN', '', '', 'Insurance', '', '', '', ''),
(47, 'Asif', 'asif.com', 'asif@gmail.com', '1233324', 'fax', 'shahrah e faisal', 'NTN NTN', '', '', 'Insurance', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `accperson`
--

CREATE TABLE `accperson` (
  `id` int(111) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `nic` varchar(225) NOT NULL,
  `aphone` varchar(225) NOT NULL,
  `fax` varchar(225) NOT NULL,
  `mail` varchar(225) NOT NULL,
  `ava` varchar(225) NOT NULL,
  `other` varchar(225) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accperson`
--

INSERT INTO `accperson` (`id`, `fname`, `lname`, `email`, `phone`, `mobile`, `nic`, `aphone`, `fax`, `mail`, `ava`, `other`, `file`, `size`, `privilege`) VALUES
(37, 'Ahmed Hamza', 'Ansari', 'hamza@gmail.com', '1234567', '12345678', '111111111122222', '333322121', 'fax.com', 'MAILING', '1-4', 'qwerty@gmail.com', '', '', ''),
(38, 'Abdul Samad ', 'Samad', 'samad@gmail.com', '123456', '03123455666', '431129', '123445', 'fax', 'MAILING', '9-5', 'shahrah e faisal', '', '', 'Person');

-- --------------------------------------------------------

--
-- Table structure for table `addasset`
--

CREATE TABLE `addasset` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imei` varchar(110) NOT NULL,
  `assetGroup` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `yearOfManufacture` varchar(255) NOT NULL,
  `taxedDue` varchar(255) NOT NULL,
  `mot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addasset`
--

INSERT INTO `addasset` (`id`, `device_id`, `name`, `imei`, `assetGroup`, `phone`, `model`, `mileage`, `contact`, `category`, `make`, `colour`, `fuel`, `engine`, `yearOfManufacture`, `taxedDue`, `mot`) VALUES
(30, 4, 'KP19JVS', '12345678987654321', '', '', 'A5', '', '', 'Choose...', 'AUDI', 'BLUE', 'DIESEL', '2967', '2019', '2021-09-01', 'No details held by DVLA'),
(41, 6, 'LJ68OTZ', '354017116324795', '', '', '', '', '', 'Car', 'BMW', 'BLACK', 'DIESEL', '1995', '2018', '2021-11-01', 'No details held by DVLA'),
(45, 10, 'AJ69AUH', '354018115636924', 'Car', '', '', '', '', '', 'MERCEDES-BENZ', 'SILVER', 'PETROL	', '1332', '2020', '2022-01-01', 'No details held by DVLA'),
(46, 2, 'BMB-943', '352094080155242', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 8, 'AVTRACK-1', '354018114125093', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 11, 'AVTRACK-3', '354018115740064', '', '', '', '', '', 'Car', '', '', '', '', '', '', ''),
(50, 28, 'NAV2-1418', '354018114493236', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 29, 'NAV3-1439', '354018114125242', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 30, 'NAV-1378', '354018114488467', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, 31, 'NAV-2', '354018114488434', '', '', '', '', '', 'Choose...', '', '', '', '', '', '', ''),
(54, 32, 'NAV-3', '354018114485893', '', '', '', '', '', 'Choose...', '', '', '', '', '', '', ''),
(55, 33, 'NAV-1461', '354018114487923', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 34, 'NAV-1', '354018115685384', '', '', '', '', '', 'Choose...', '', '', '', '', '', '', ''),
(57, 35, 'NAV-5', '354018115636957', '', '', '', '', '', 'Choose...', '', '', '', '', '', '', ''),
(58, 36, 'NAV-1449', '354018115685319', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 124, '  YR16ZHK', '8944478300000114346', 'Choose...', ' 03219299649', 'Q7', '', '', 'Car', 'LAND ROVER', 'WHITE', 'DIESEL', '2993', '2016', '2022-02-01', 'Valid'),
(85, 148, 'AJ57OSV', '44555624634725343', 'AV TRACK', ' 112233', '12345678910000', 'M66', '', 'Car', 'MERCEDES', 'BLACK', 'DIESEL', '2148', '2007', '2022-02-01', 'Valid'),
(86, 149, 'KJ19LPC', 'Choose...', 'Autoveto Groups', ' ', 'Q7', '', '', 'Car', 'AUDI', 'BLACK', 'DIESEL', '2967', '2019', '2021-10-01', 'No details held by DVLA');

-- --------------------------------------------------------

--
-- Table structure for table `addperson`
--

CREATE TABLE `addperson` (
  `id` int(111) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `nic` varchar(225) NOT NULL,
  `aphone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ava` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `mainid` int(11) NOT NULL,
  `filedoc` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addperson`
--

INSERT INTO `addperson` (`id`, `fname`, `lname`, `email`, `phone`, `mobile`, `nic`, `aphone`, `fax`, `mail`, `ava`, `other`, `doc`, `mainid`, `filedoc`, `type`, `size`) VALUES
(216, 'abdul', 'basit', 'abdulbasit.hfinfo@gmail.com', '983832', '83298323982', '8643198643', '43894638494', '2138789843', 'north karachi power house L-532 sector 5-c-3', '9:30', 'north karachi power house L-532 sector 5-c-3', '', 395, 'am_pie_and_donutchart.html', '', ''),
(217, 'abdul', 'basit', 'abdulbasit.hfinfo@gmail.com', '983832', '83298323982', '8643198643', '43894638494', '2138789843', 'north karachi power house L-532 sector 5-c-3', '9:30', 'north karachi power house L-532 sector 5-c-3', '', 396, 'am_pie_and_donutchart.html', '', ''),
(218, 'abdul', 'basit', 'abdulbasit.hfinfo@gmail.com', '983832', '83298323982', '8643198643', '43894638494', '2138789843', 'north karachi power house L-532 sector 5-c-3', '9:30', 'north karachi power house L-532 sector 5-c-3', '', 400, 'charts_c3_api.html', '', ''),
(219, 'abdul', 'basit', 'abdulbasit.hfinfo@gmail.com', '983832', '83298323982', '8643198643', '43894638494', '2138789843', 'north karachi power house L-532 sector 5-c-3', '9:30', 'north karachi power house L-532 sector 5-c-3', '', 401, 'charts_c3_api.html', '', ''),
(220, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', '123456', '1234567', '12345678', '123456789', 'abc', '123', 'qwerty', '', 402, '', '', ''),
(221, 'ASIF22', 'ASLAM', 'ASIF@gmail.com', '12345', '123456', '1234567', '12345678', '112', '2', '123', 'qwerty', '', 403, '', '', ''),
(222, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', '123456', '1234567', '12345678', '112', 'abc', '123', 'qwerty', '', 404, '', '', ''),
(223, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', '123456', '1234567', '12345678', '112', 'abc', '123', 'qwerty', '', 405, '', '', ''),
(224, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', 'Q', '1234567', '12345678', '112', 'abc', '123', 'qwerty', '', 406, '', '', ''),
(225, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', 'Q', '1234567', '12345678', '112', 'abc', '123', 'qwerty', '', 407, '', '', ''),
(226, 'Hamza', 'ansari', 'hamza@gmail.com', '12345', 'Q', '1234567', '12345678', '112', 'abc', '123', 'qwerty', '', 408, '', '', ''),
(227, 'Ahmed', 'Hamza', 'hamza@gmail.com', '123456', '1234567', '11234453', '123456789`', 'p2p123', 'p2p@gmil.com', '1-3', 'sharah e faisal', '', 409, 'oil_invoice_detail.html', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `alert_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `alerts_message` varchar(45) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `watched` varchar(45) NOT NULL DEFAULT '0',
  `notified` varchar(45) NOT NULL DEFAULT '0',
  `icon` varchar(45) DEFAULT 'flag',
  `alert_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bulkdata`
--

CREATE TABLE `bulkdata` (
  `id` int(255) NOT NULL,
  `imei` varchar(255) DEFAULT NULL,
  `st_server` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `angle` varchar(255) DEFAULT NULL,
  `speed` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sim_number` varchar(255) DEFAULT NULL,
  `odometer` varchar(255) DEFAULT NULL,
  `list` varchar(355) DEFAULT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  `last_idle` varchar(255) DEFAULT NULL,
  `last_move` varchar(255) DEFAULT NULL,
  `last_stop` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulkdata`
--

INSERT INTO `bulkdata` (`id`, `imei`, `st_server`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `list`, `protocol`, `last_idle`, `last_move`, `last_stop`) VALUES
(425246, '358735070043132', '', '27.761756', '68.797268', '', '0', 'TLA-357', '+923172706334', '103597.58801300002', '', '', '', '2020-02-28 05:18:38', ''),
(425247, '358735070905280', '', '24.87567', '67.299745', '', '0', 'TLF-437', '+923030391033', '54329.998220999965', '', '', '', '2020-02-12 11:31:24', ''),
(425248, '358735070575075', '', '24.942805', '66.719892', '', '0', '5075', '+923080416965', '0', '', '', '', '2019-10-11 09:37:01', ''),
(425249, '358735070903988', '', '27.085362', '68.31954', '', '7', 'JQ-1236', '+923337960308', '45085.55236200003', '', '', '', '2020-01-30 06:43:41', ''),
(425250, '868003031114395', '', '28.69381', '70.422985', '', '0', 'TMG-211', '+923337960712', '286537.1255869958', '', '', '', '2021-07-17 05:41:22', ''),
(425251, '358735070903749', '', '32.373971', '71.798278', '', '0', 'JQ-8094', '+923030390730', '162482.50983099797', '', '', '', '2021-07-23 04:20:49', ''),
(425252, '868003031120780', '', '25.023643', '66.983584', '', '0', 'TMG-045', '+923030413505', '35794.018513000134', '', '', '', '2019-10-05 14:56:06', ''),
(425253, '868003031114106', '', '25.011132', '67.360972', '', '0', 'TMH-522', '+923030411455', '233909.4160310042', '', '', '', '2021-07-23 10:45:45', ''),
(425254, '868003031120152', '', '28.29637', '70.087993', '', '0', 'TMG-700', '+923030414707', '157725.06441200062', '', '', '', '2021-06-03 15:14:41', ''),
(425255, '352094080397117', '', '24.952018', '67.080528', '', '0', 'KW-8095', '+923337960817', '21754.548329999958', '', '', '', '2019-11-18 14:27:30', ''),
(425256, '358735070904275', '', '25.346161', '68.400317', '', '40', 'PTR-0198', '+923331034518', '6653.363357000062', '', '', '', '2019-07-06 09:01:06', ''),
(425257, '358511021644947', '', '24.882298', '67.063156', '', '24', 'TUD-595', '+923331034539', '73237.08536000115', '', '', '', '2021-02-22 06:22:41', ''),
(425258, '868003031522167', '', '31.145535', '72.15303', '', '0', 'BDC-457', '+923081245180', '233515.6954130046', '', '', '', '2021-07-23 10:29:13', ''),
(425259, '868003031519445', '', '24.817303', '66.993538', '', '2', 'TMF-990', '+923081245182', '30348.263288999737', '', '', '', '2019-10-25 10:31:29', ''),
(425260, '868003031520245', '', '27.801495', '68.309085', '', '30', 'TLQ-992', '+923081245170', '15310.474883999868', '', '', '', '2019-12-10 07:04:51', ''),
(425261, '868003031119774', '', '28.313377', '69.792325', '', '0', 'TUD-998', '+923030417067', '198966.02250600606', '', '', '', '2021-07-23 12:05:38', ''),
(425262, '358511022595015', '', '26.500883', '67.98189', '', '51', 'TUD-898', '+923018733716', '160540.7771480012', '', '', '', '2021-07-23 10:39:50', ''),
(425263, '358735070902030', '', '25.023634', '66.983588', '', '0', 'TMG-900', '+923337960564', '14225.495990999996', '', '', '', '2019-10-05 15:04:17', ''),
(425264, '868003031113991', '', '31.393772', '74.310567', '', '0', 'LES-14-4445', '+923030416838', '4034.0711460000007', '', '', '', '2019-03-14 07:36:30', ''),
(425265, '868003031120228', '', '31.275968', '74.163167', '', '0', 'JGI-18-114', '+923030414855', '14194.848859000089', '', '', '', '2019-09-18 19:09:37', ''),
(425266, '868003031119873', '', '31.533571', '74.344825', '', '0', 'MNS-07-2225', '+923030415036', '42439.15230599982', '', '', '', '2020-09-21 05:15:56', ''),
(425267, '358735070902386', '', '31.600562', '74.312174', '', '0', 'SDK-9721', '+923337960256', '29912.112741999976', '', '', '', '2019-09-12 16:19:26', ''),
(425268, '868003031120988', '', '31.35651', '74.138545', '', '0', 'LEI-16-3941', '+923030396459', '77147.2678639992', '', '', '', '2021-07-23 07:41:12', ''),
(425269, '868003031117901', '', '31.447215', '74.316363', '', '0', 'FDZ-3284', '+923030417030', '10599.480973000105', '', '', '', '2019-05-21 08:13:31', ''),
(425270, '358735070903137', '', '32.478525', '74.433458', '', '0', 'LES-16-6138', '+923337960259', '59908.51612199933', '', '', '', '2020-12-01 06:53:10', ''),
(425271, '358735070041482', '', '24.832934', '66.984697', '', '0', 'TLN-120', '+923172706346', '4139.098955000025', '', '', '', '2019-11-16 13:38:27', ''),
(425272, '868003031522449', '', '24.844728', '67.227015', '', '14', 'TLA-436', '+923081245195', '22.800613000000006', '', '', '', '2019-04-16 13:00:45', ''),
(425273, '868003031116242', '', '24.852135', '66.983912', '', '0', 'JU-4617', '+923030417718', '961.2641909999999', '', '', '', '2019-02-13 18:27:04', ''),
(425274, '868003031114288', '', '24.788613', '67.339366', '', '0', 'LT-5647', '+923030417677', '2363.191552999997', '', '', '', '2019-05-10 16:14:37', ''),
(425275, '868003031115319', '', '24.785668', '67.351522', '', '0', 'TLA-382', '+923030418325', '1090.1084329999999', '', '', '', '2019-05-16 20:29:57', ''),
(425276, '868003031114361', '', '24.801534', '67.324315', '', '0', 'JU-4869', '+923030399094', '1386.9015109999978', '', '', '', '2019-05-01 08:27:25', ''),
(425277, '868003031118529', '', '24.828048', '67.242208', '', '0', 'TMB-120', '+923030417618', '1868.326586999996', '', '', '', '2020-02-11 13:15:00', ''),
(425278, '868003031115053', '', '24.787683', '67.341656', '', '0', 'SPA-228', '+923030417648', '2932.459324000002', '', '', '', '2019-10-26 14:50:38', ''),
(425279, '868003031520641', '', '24.874724', '67.3052', '', '0', 'TUD-896', '+923331029611', '199542.1068489957', '', '', '', '2020-12-29 10:51:21', ''),
(425280, '868003031523900', '', '27.40038', '68.575003', '', '0', 'TUD-996', '+923331029609', '144053.6328999981', '', '', '', '2021-07-20 05:18:37', ''),
(425281, '358511020972687', '', '24.882282', '67.185746', '', '0', 'KQ-4232', '+923331029627', '6045.3915379999735', '', '', '', '2019-11-07 08:08:35', ''),
(425282, '868003031866945', '', '27.574495', '67.819033', '', '85', 'BQD-203', '+923182165158', '33475.577916999595', '', '', '', '2021-01-09 08:49:15', ''),
(425283, '868003032110053', '', '30.020726', '72.068192', '', '53', 'LE-6239', '+923083013212', '1474384.2986940588', '', '', '', '2021-07-23 12:01:01', ''),
(425284, '358735070904382', '', '32.355776', '71.852487', '', '0', 'JQ-9094', '+923030390712', '171557.26894399853', '', '', '', '2021-07-19 13:52:01', ''),
(425285, '868003031523108', '', '24.884333', '67.060378', '', '0', 'AXY-829', '+923018733624', '31580.59468000021', '', '', '', '2021-07-23 10:33:38', ''),
(425286, '868003031870210', '', '24.851352', '67.019708', '', '0', 'AFR0891859', '+923182165179', '360707.2413150051', '', '', '', '2021-07-23 09:29:53', ''),
(425287, '868003031114551', '', '29.203685', '71.110187', '', '37', 'TMH-498', '+923337960227', '170050.44164199382', '', '', '', '2021-07-23 11:35:34', ''),
(425288, '868003032821519', '', '24.902992', '66.997975', '', '0', 'TKA-002', '+923332748370', '69006.3694210023', '', '', '', '2021-07-23 09:29:18', ''),
(425289, '868003032835105', '', '24.902692', '66.998026', '', '0', 'TKY-443', '+923332748348', '70782.37887100162', '', '', '', '2021-07-23 09:09:47', ''),
(425290, '868003032825668', '', '24.902927', '66.998059', '', '0', 'TAC-649', '+923332748347', '104435.8541489996', '', '', '', '2021-07-23 10:04:24', ''),
(425291, '868003032834173', '', '24.901727', '66.998018', '', '0', 'TKJ-632', '+923332748364', '74773.32139900107', '', '', '', '2021-07-23 10:35:53', ''),
(425292, '868003032823838', '', '24.902062', '66.99804', '', '0', 'TKJ-809', '+923332748340', '43397.94973400055', '', '', '', '2021-07-23 09:22:53', ''),
(425293, '868003032821907', '', '24.901945', '66.997992', '', '0', 'TAL-625', '+923332748425', '121311.83059100018', '', '', '', '2021-07-23 09:32:21', ''),
(425294, '868003032821436', '', '24.901707', '66.997975', '', '0', 'TKG-685', '+923332748361', '88920.08274499854', '', '', '', '2021-07-23 10:42:25', ''),
(425295, '868003032832250', '', '24.902861', '66.998033', '', '0', 'TAK-067', '+923332748355', '104204.73087700222', '', '', '', '2021-07-23 10:49:08', ''),
(425296, '868003032829256', '', '24.901803', '66.998075', '', '0', 'JV-4813', '+923332748343', '39926.3583049997', '', '', '', '2021-07-23 10:41:31', ''),
(425297, '868003032833449', '', '24.901888', '66.998059', '', '0', 'TKA-031', '+923332748367', '87238.750742002', '', '', '', '2021-07-23 11:27:57', ''),
(425298, '868003032823879', '', '24.902684', '66.998082', '', '0', 'TKZ-124', '+923332748359', '144080.90262200413', '', '', '', '2021-07-23 10:51:13', ''),
(425299, '868003032834793', '', '24.902803', '66.99809', '', '0', 'LS-9289', '+923332748360', '34511.210026999', '', '', '', '2021-07-23 09:53:34', ''),
(425300, '868003032822657', '', '24.902975', '66.997978', '', '0', 'K-3708', '+923332772054', '63413.690648999764', '', '', '', '2021-07-23 09:40:45', ''),
(425301, '868003032834405', '', '24.83735', '67.307053', '', '13', 'TKA-768', '+923332748346', '70324.70124700166', '', '', '', '2021-07-14 15:34:57', ''),
(425302, '868003032829652', '', '24.990784', '68.393067', '', '0', 'TLF-334', '+923332772043', '83307.78495400205', '', '', '', '2021-07-18 11:20:41', ''),
(425303, '868003032835584', '', '24.869828', '66.971645', '', '0', 'P-9937', '+923332772041', '102315.87376200176', '', '', '', '2021-07-19 05:46:10', ''),
(425304, '868003032831252', '', '24.903552', '66.998007', '', '0', 'JV-2839', '+923332772048', '145833.44267000153', '', '', '', '2021-07-23 11:11:46', ''),
(425305, '868003032834686', '', '24.903693', '66.99845', '', '0', 'JV-3567', '+923332772057', '204580.31216200287', '', '', '', '2021-07-23 10:41:23', ''),
(425306, '868003032823457', '', '24.97825', '67.276287', '', '0', 'TLZ-989', '+923332772037', '102289.26868600077', '', '', '', '2021-02-20 10:43:09', ''),
(425307, '358735070001200', '', '24.899316', '66.997036', '', '0', '1200', '+923332758937', '825.8212799999998', '', '', '', '2020-02-27 11:36:04', ''),
(425308, '868003032833019', '', '24.870067', '66.957143', '', '0', 'TLB-263', '+923332772058', '119923.30398600076', '', '', '', '2021-07-13 05:54:02', ''),
(425309, '868003032822103', '', '24.87004', '66.971628', '', '0', 'TLK-731', '+923332772106', '178677.6128369979', '', '', '', '2021-07-18 01:23:18', ''),
(425310, '868003032822624', '', '24.870032', '66.971485', '', '0', 'TMF-218', '+923332772104', '97299.03255499857', '', '', '', '2021-07-19 06:14:22', ''),
(425311, '868003032114055', '', '27.74133', '68.813998', '', '0', 'LES-15-737', '+923083012859', '3919650.454060803', '', '', '', '2021-07-23 06:58:39', ''),
(425312, '868003031120913', '', '27.861515', '69.082873', '', '0', 'FWO-8388', '+923030396208', '285398.1697619989', '', '', '', '2021-07-23 11:18:41', ''),
(425313, '358735070902972', '', '24.894435', '67.001223', '', '0', '2972', '+923030389240', '28722.173580000024', '', '', '', '2019-09-24 13:58:08', ''),
(425314, '868003032109444', '', '30.086443', '66.932495', '', '0', 'NAC-323', '+923308569887', '73858.57160999978', '', '', '', '2020-02-26 02:42:47', ''),
(425315, '868003032494564', '', '27.81166', '66.605173', '', '0', 'TLZ-958', '+923012445623', '721.1230730000003', '', '', '', '2020-02-23 17:38:22', ''),
(425316, '868003032818945', '', '24.790868', '67.336489', '', '0', '8945', '+923332773506', '0', '', '', '', '2020-03-25 03:28:52', ''),
(425317, '868003032819737', '', '24.822332', '67.295412', '', '0', '9737', '+923332773510', '0', '', '', '', '2020-07-10 15:10:44', ''),
(425318, '868003032820479', '', '31.485366', '73.28546', '', '0', 'FDC-9465', '+923332773518', '4847.649854000014', '', '', '', '2021-04-02 17:38:35', ''),
(425319, '868003032834629', '', '30.559895', '72.085323', '', '16', '4629', '+923332773417', '0', '', '', '', '2021-04-12 22:04:24', ''),
(425320, '868003032822327', '', '28.50982', '70.240372', '', '0', 'E-4091', '+923332773458', '9050.518967', '', '', '', '2021-07-19 10:54:29', ''),
(425321, '868003032819620', '', '31.679813', '74.201982', '', '34', 'FDF-6084', '+923332773619', '4929.371363999937', '', '', '', '2021-02-27 14:15:21', ''),
(425322, '868003032818234', '', '32.939623', '72.678128', '', '0', 'PT-9544', '+923011154595', '3089.122169999989', '', '', '', '2021-07-19 13:34:35', ''),
(425323, '868003032817434', '', '34.060552', '72.434943', '', '0', 'GZRC-121', '+923011154635', '262563.1035179929', '', '', '', '2021-07-15 14:49:51', ''),
(425324, '868003032819984', '', '31.468163', '74.349741', '', '0', 'TLE-851', '+923011154609', '1997.5840749999998', '', '', '', '2020-06-28 18:10:04', ''),
(425325, '868003032835089', '', '31.600655', '74.401788', '', '0', 'SLB-4292', '+923011154580', '102077.99216900172', '', '', '', '2021-07-17 21:22:51', ''),
(425326, '868003032827623', '', '31.5964', '74.325255', '', '0', 'LHJ-8375', '+923011154591', '50074.65419100069', '', '', '', '2021-07-20 02:43:46', ''),
(425327, '358735070904788', '', '24.955248', '67.135592', '', '0', 'JQ-1358', '+923030389059', '99391.2171340002', '', '', '', '2021-03-04 02:29:30', ''),
(425328, '868003032819166', '', '30.20422', '71.51058', '', '0', 'E-2118', '+923181142443', '138576.6413480013', '', '', '', '2020-12-07 10:02:29', ''),
(425329, '358511021646256', '', '31.597182', '74.326335', '', '0', 'LEI-14A-9299', '+923028517043', '189433.85182000036', '', '', '', '2021-07-21 21:38:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `captain`
--

CREATE TABLE `captain` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `CNIC` varchar(255) DEFAULT NULL,
  `Contact` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `latlng` varchar(255) DEFAULT NULL,
  `salery` varchar(255) DEFAULT NULL,
  `joindate` datetime DEFAULT NULL,
  `resdate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 2, 1, 'heelo', '2021-04-13 06:32:03', 0),
(2, 1, 2, 'han jani kahn hai', '2021-04-13 06:34:59', 0),
(3, 2, 1, 'office', '2021-04-13 06:35:18', 0),
(4, 2, 1, 'han baloach', '2021-04-13 06:38:18', 0),
(5, 1, 2, 'kahn h jani', '2021-04-13 06:38:26', 0),
(7, 0, 4, '<p><img src=\"upload/car_travelling.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p><br>', '2021-04-13 07:47:36', 0),
(8, 2, 1, '?', '2021-04-13 08:36:58', 0),
(9, 2, 1, '?', '2021-04-13 08:37:08', 0),
(10, 2, 1, '??', '2021-04-13 08:45:53', 0),
(11, 2, 1, 'checking', '2021-04-13 08:46:49', 0),
(12, 2, 1, '???', '2021-04-13 08:47:19', 0),
(13, 2, 1, '??', '2021-04-13 08:47:52', 0),
(14, 1, 2, 'han beta', '2021-04-13 09:30:20', 0),
(15, 2, 1, 'g bhai', '2021-04-13 09:30:36', 0),
(16, 2, 1, 'kahlid', '2021-04-13 09:31:16', 0),
(17, 1, 3, 'hna jani khan h?', '2021-04-13 09:54:11', 0),
(18, 1, 3, '???', '2021-04-13 09:54:27', 0),
(19, 1, 3, '??', '2021-04-13 09:54:30', 0),
(20, 1, 3, '??', '2021-04-13 13:32:45', 0),
(21, 1, 3, 'han', '2021-04-13 13:34:02', 0),
(22, 1, 3, 'hn', '2021-04-13 13:43:47', 0),
(23, 1, 3, 'fgdshgs', '2021-04-13 13:45:06', 0),
(24, 1, 3, 'gggg', '2021-04-13 13:54:14', 0),
(25, 2, 1, 'basit bhai', '2021-04-14 06:07:48', 0),
(26, 2, 1, 'basit bhai', '2021-04-14 06:07:49', 0),
(27, 2, 1, 'gbhai', '2021-04-14 06:09:18', 0),
(28, 3, 1, 'jani', '2021-04-14 06:10:36', 0),
(29, 2, 1, 'bhai', '2021-04-14 06:11:02', 0),
(30, 2, 1, 'gbahi', '2021-04-14 06:11:12', 0),
(31, 1, 2, 'han bol kiya hwa', '2021-04-14 06:15:45', 0),
(32, 1, 2, '????', '2021-04-14 06:17:09', 0),
(33, 4, 2, 'kiya hwa', '2021-04-14 06:17:52', 0),
(34, 1, 3, 'kahn h', '2021-04-14 06:19:07', 0),
(35, 3, 1, 'office me hn', '2021-04-14 06:21:29', 0),
(36, 1, 3, 'acha kiya krha h', '2021-04-14 06:48:06', 0),
(37, 3, 1, 'kch nhi kaam', '2021-04-14 06:48:21', 0),
(38, 3, 1, 'asdsaf', '2021-04-14 07:42:20', 0),
(39, 4, 1, 'addullah ?', '2021-04-14 07:47:19', 0),
(40, 1, 4, 'etet', '2021-04-14 08:15:16', 0),
(41, 5, 1, 'hy', '2021-04-29 08:31:55', 1),
(42, 2, 1, 'g', '2021-05-18 06:12:35', 1),
(43, 52, 1, 'Where are you?', '2021-05-18 06:15:49', 1),
(44, 195, 1, 'How are you', '2021-05-18 06:16:00', 0),
(45, 1, 195, 'i am at office.', '2021-05-18 06:17:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checktime`
--

CREATE TABLE `checktime` (
  `id` int(11) NOT NULL,
  `alerttype` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `checkstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(111) NOT NULL,
  `claim` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `sur` varchar(255) NOT NULL,
  `insu` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `offer` int(255) NOT NULL,
  `set` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `create` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `claim`, `role`, `sur`, `insu`, `status`, `reason`, `offer`, `set`, `payment`, `create`, `file`, `size`) VALUES
(1, 'ADS', 'Policy Type', 'SADF', 'FDS', 'Pending on Surverer', 'DSAF', 0, 'ASFD', 'FSAD', 'as@f', '11417-', ''),
(2, 'ADS', 'Policy Type', 'SADF', 'FDS', 'Pending on Surverer', 'DSAF', 0, 'ASFD', 'FSAD', 'as@f', '50180-', ''),
(3, '123', 'Policy Type', 'SADF', 'FDS', 'New', 'DSAF', 3200, '1222', '12', 'as@f', '92346-Indemnifier.xlsx', '15730');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `phone`) VALUES
(191, 'TPL', 'tpl@gmail.com', '1234567'),
(192, 'ResQ911 ', 'resq911@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_no` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vehicle_no` varchar(110) NOT NULL,
  `complaint_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `party_acount` varchar(255) NOT NULL,
  `complaint_status` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `assign_from` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `user_id`, `complaint_no`, `type`, `vehicle_no`, `complaint_name`, `phone`, `party_acount`, `complaint_status`, `assign_to`, `assign_from`, `complaint`) VALUES
(3, 192, '', 'Urgent', '4321', 'Samad', '9873453634', '', 'Completed', 'Choose...', 'Choose...', 'Tracker down problem'),
(5, 191, '', 'Most Urgent', 'BMB  943', 'abc', '9873453634', '', 'Active', 'Choose...', 'Choose...', 'Data Not Show'),
(6, 192, '', 'General', '11223', 'basit', '9873453634', '', 'Pending', 'Choose...', 'Choose...', 'Tracker not Start'),
(7, 192, '', 'Most Urgent', 'BMB  943', 'Hamza', '9873453634', '', 'Active', 'Choose...', 'Choose...', 'Tracker'),
(8, 192, '', 'Urgent', '112233', 'usman', '03009299649', '', 'Active', 'Choose...', 'Choose...', 'Tracker Lost');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `short_desc`, `long_desc`) VALUES
(1, 'Editor Test', '<p>Hellow</p>\r\n', '<p><strong>han bhai</strong></p>\r\n'),
(2, 'Tracker Disabled', '<p>Han</p>\r\n', '<p><strong>Dear Sir.</strong></p>\r\n\r\n<p>Please Check your Device .</p>\r\n\r\n<p>Other Wise There is no issue .</p>\r\n\r\n<p><em><strong>Thank You.</strong></em></p>\r\n'),
(3, 'Editor Test', '<p>hn baloch</p>\r\n', '<h1><em><strong>hann</strong></em></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Han bhai</strong></em></p>\r\n'),
(4, 'new', '', '<p><strong>Dear Sir</strong></p>\r\n\r\n<p><em>Hello Chai Lelo.</em></p>\r\n\r\n<h1><em>Bye</em></h1>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` int(111) NOT NULL,
  `name` varchar(225) NOT NULL,
  `website` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `fax` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `ntn` varchar(225) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `name`, `website`, `email`, `phone`, `fax`, `address`, `ntn`, `file`, `size`, `privilege`, `a`, `b`, `c`, `d`) VALUES
(410, 'Ahmed Hamza Ansari', 'hamza.com', 'hamza@gmail.com', '1234567', 'fax.com', 'shahrah e faisal', 'NTN NTN', '', '', '', '', '', '', ''),
(411, 'Samad', 'samad.com', 'samad@gmail.com', '1122334455', 'fax.com', 'shahrah e faisal', 'NTN NTN', '', '', 'Corporate', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crmusers`
--

CREATE TABLE `crmusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crmusers`
--

INSERT INTO `crmusers` (`id`, `name`, `email`, `password`, `privilege`, `role`) VALUES
(1, 'Basit', 'abasit9119@gmail.com', 'basit123', 'ResQ911 ', 'Complainer'),
(2, 'Hamza', 'hamza@gmail.com', 'hamza123', 'TPL', 'Sales'),
(8, '', '', '', '', 'Policy Type');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `uniqueId` bigint(225) DEFAULT NULL,
  `latestPosition_id` bigint(20) DEFAULT NULL,
  `device_type` int(11) NOT NULL,
  `simno` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `licensepn` varchar(50) NOT NULL,
  `overspeed` int(11) DEFAULT 1000,
  `vehicle_make` varchar(45) DEFAULT NULL,
  `Vehicle_Model` varchar(45) DEFAULT NULL,
  `Vehicle_CC` varchar(45) DEFAULT NULL,
  `Vehicle_Color` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `vlocation` varchar(255) DEFAULT NULL,
  `vstatus1` varchar(255) DEFAULT NULL,
  `devicetype1` varchar(45) DEFAULT NULL,
  `devicescol` varchar(45) DEFAULT NULL,
  `groupname` varchar(255) DEFAULT NULL,
  `powerstatus` varchar(45) DEFAULT NULL,
  `fixf` varchar(45) DEFAULT NULL,
  `driver_id` varchar(45) DEFAULT NULL,
  `recorddate` varchar(45) DEFAULT NULL,
  `deviceid1` varchar(225) DEFAULT NULL,
  `odometer` varchar(225) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device_geo`
--

CREATE TABLE `device_geo` (
  `id` int(11) NOT NULL,
  `device` varchar(255) DEFAULT NULL,
  `geotype` varchar(45) DEFAULT NULL,
  `geoid` varchar(45) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `device_groups`
--

CREATE TABLE `device_groups` (
  `gid` int(11) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `dt_id` int(11) NOT NULL,
  `dt_name` varchar(20) NOT NULL,
  `dt_image` varchar(100) NOT NULL,
  `dt_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`dt_id`, `dt_name`, `dt_image`, `dt_status`) VALUES
(3, 'Truck/Lorry', 'truck', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `title`, `body`) VALUES
(1, 'test', 'testing for email'),
(2, 'Data Not Found', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?'),
(3, 'Tracker Disabled', 'Font subfamily identification: Text. Unique identifier: Macromedia Fontographer 4.1 Dome Text. Full font name: Dome Text. Version: Macromedia Fontographer ..'),
(8, 'Editor Test', ''),
(9, 'Editor Test', ''),
(10, 'Abdullah', '<h1><strong>Dear Sir .</strong></h1>\r\n\r\n<p><em><strong>Hello friends chai pelo.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Thank you.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, 'xyz', '<p>bxbxbx</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `geofence`
--

CREATE TABLE `geofence` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `center` varchar(100) NOT NULL,
  `zoom` varchar(45) NOT NULL,
  `points` longtext NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `geofence_type` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `address` varchar(500) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `visits` int(12) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_alerts_email_ids`
--

CREATE TABLE `geofence_alerts_email_ids` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `geofence_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_device`
--

CREATE TABLE `geofence_device` (
  `device_id` bigint(11) NOT NULL,
  `geofence_id` int(11) NOT NULL,
  `visits` int(11) DEFAULT 0,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_email_history`
--

CREATE TABLE `geofence_email_history` (
  `geofence_email_history_id` int(11) NOT NULL,
  `p_time` timestamp NULL DEFAULT NULL,
  `launch_time` timestamp NULL DEFAULT NULL,
  `geofence_email_history_count` varchar(45) NOT NULL DEFAULT '0',
  `e_type` varchar(45) DEFAULT 'twoHours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_history`
--

CREATE TABLE `geofence_history` (
  `geofence_history_id` int(11) NOT NULL,
  `time1` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_id` varchar(45) NOT NULL,
  `geofence_id` varchar(45) NOT NULL,
  `current_status` varchar(45) DEFAULT NULL,
  `geofence_history_latest_position` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_points`
--

CREATE TABLE `geofence_points` (
  `geofence_points_id` int(11) NOT NULL,
  `geofence_lat` varchar(45) NOT NULL,
  `geofence_long` varchar(45) NOT NULL,
  `geofence_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_tracking`
--

CREATE TABLE `geofence_tracking` (
  `geofence_tracking_id` int(50) NOT NULL,
  `geofence_tracking_geofence_id` int(11) NOT NULL,
  `geofence_tracking_device_id` varchar(45) NOT NULL,
  `geofence_tracking_status` varchar(45) DEFAULT NULL,
  `position_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geo_fence`
--

CREATE TABLE `geo_fence` (
  `gfid` int(11) NOT NULL,
  `gfuser_id` int(11) NOT NULL,
  `gfdevice_id` int(11) NOT NULL,
  `gfname` varchar(25) NOT NULL,
  `gfcenter_lat` double NOT NULL,
  `gfcenter_long` double NOT NULL,
  `gfradius` double NOT NULL,
  `gfstatus` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `geo_tracking`
--

CREATE TABLE `geo_tracking` (
  `id` int(11) NOT NULL,
  `geo_id` varchar(45) DEFAULT NULL,
  `device_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `position_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gf_alarm`
--

CREATE TABLE `gf_alarm` (
  `f_id` int(11) NOT NULL,
  `f_gfid` int(11) NOT NULL,
  `f_time` datetime NOT NULL,
  `f_gfname` varchar(25) NOT NULL,
  `f_positionid` bigint(20) NOT NULL,
  `f_gftype` varchar(10) NOT NULL,
  `f_tracid` varchar(15) NOT NULL,
  `f_status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_log`
--

CREATE TABLE `group_log` (
  `group_log_id` int(10) NOT NULL,
  `corresponding_id` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_id` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT 'create',
  `plate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_log`
--

INSERT INTO `group_log` (`group_log_id`, `corresponding_id`, `user_id`, `time`, `device_id`, `type`, `plate`) VALUES
(1, '0', '2', '2021-01-27 13:21:14', NULL, 'create', NULL),
(2, '', '2', '2021-01-27 13:21:41', '259', 'assign', 'LES-18-8826');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(1, 'Hamza', '$2y$10$4REfvTZpxLgkAR/lKG9QiOkSdahOYIR3MeoGJAyiWmRkEFfjH3396'),
(2, 'Basit', '$2y$10$4REfvTZpxLgkAR/lKG9QiOkSdahOYIR3MeoGJAyiWmRkEFfjH3396'),
(3, 'samad', '$2y$10$4REfvTZpxLgkAR/lKG9QiOkSdahOYIR3MeoGJAyiWmRkEFfjH3396'),
(4, 'Abdullah', '$2y$10$4REfvTZpxLgkAR/lKG9QiOkSdahOYIR3MeoGJAyiWmRkEFfjH3396'),
(5, 'Asif', '$2y$10$C1IVoqBBc7ngDTM4l9jsxuX1yLuPP3/OUfPQCa28nwS/eF1CQppzi'),
(6, 'Fanta', '$2y$10$CFyldAYLZT4.SM9UNHs2m.gob5kJJqTcp/1MejQtuSkOEli5FqxD6');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2021-04-13 07:03:48', 'no'),
(2, 2, '2021-04-13 07:34:18', 'no'),
(3, 1, '2021-04-13 07:30:35', 'no'),
(4, 4, '2021-04-13 08:33:02', 'no'),
(5, 1, '2021-04-13 08:37:23', 'no'),
(6, 1, '2021-04-13 08:55:59', 'no'),
(7, 2, '2021-04-13 09:33:52', 'no'),
(8, 1, '2021-04-13 09:53:00', 'no'),
(9, 1, '2021-04-13 09:53:48', 'no'),
(10, 1, '2021-04-13 09:54:37', 'no'),
(11, 3, '2021-04-13 09:54:43', 'no'),
(12, 1, '2021-04-13 10:25:52', 'no'),
(13, 1, '2021-04-13 10:57:47', 'no'),
(14, 1, '2021-04-13 13:48:42', 'no'),
(15, 3, '2021-04-13 13:48:46', 'no'),
(16, 1, '2021-04-13 13:54:16', 'no'),
(17, 3, '2021-04-13 13:53:52', 'no'),
(18, 3, '2021-04-13 13:54:21', 'no'),
(19, 1, '2021-04-14 06:14:53', 'no'),
(20, 3, '2021-04-14 06:07:22', 'no'),
(21, 2, '2021-04-14 06:12:26', 'no'),
(22, 2, '2021-04-14 06:18:03', 'no'),
(23, 3, '2021-04-14 06:19:12', 'no'),
(24, 1, '2021-04-14 06:41:25', 'no'),
(25, 1, '2021-04-14 08:01:47', 'no'),
(26, 3, '2021-04-14 07:47:29', 'no'),
(27, 4, '2021-04-14 08:28:06', 'no'),
(28, 1, '2021-04-14 08:21:27', 'no'),
(29, 1, '2021-04-14 09:07:59', 'no'),
(30, 1, '2021-04-28 10:29:55', 'no'),
(31, 1, '2021-04-28 10:59:15', 'yes'),
(32, 1, '2021-04-29 08:31:25', 'no'),
(33, 1, '2021-04-29 08:32:06', 'no'),
(34, 5, '2021-04-29 08:32:30', 'no'),
(35, 1, '2021-04-29 10:20:33', 'no'),
(36, 1, '2021-04-29 11:33:56', 'no'),
(37, 1, '2021-05-03 10:00:46', 'no'),
(38, 6, '2021-05-03 10:10:15', 'no'),
(39, 1, '2021-05-06 06:20:02', 'no'),
(40, 2, '2021-05-06 06:20:46', 'no'),
(41, 1, '2021-05-08 09:26:46', 'no'),
(42, 1, '2021-05-08 10:14:48', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `maintainance`
--

CREATE TABLE `maintainance` (
  `id` int(11) NOT NULL,
  `vid` varchar(45) DEFAULT NULL,
  `cid` varchar(45) DEFAULT NULL,
  `Actualdate` datetime DEFAULT NULL,
  `insertdate` datetime DEFAULT NULL,
  `insertmilage` varchar(255) DEFAULT NULL,
  `checkdate` datetime DEFAULT NULL,
  `checkmilage` varchar(255) DEFAULT NULL,
  `runningodo` varchar(255) DEFAULT NULL,
  `donedatetime` datetime DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poly_fence`
--

CREATE TABLE `poly_fence` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `points` varchar(3555) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(40) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `altitude` double DEFAULT NULL,
  `course` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `power` double(20,0) DEFAULT NULL,
  `speed` double(20,0) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `AlarmStatus` int(11) NOT NULL DEFAULT 0,
  `imileage` varchar(255) DEFAULT NULL,
  `ikey` varchar(45) DEFAULT NULL,
  `ireason` varchar(255) DEFAULT NULL,
  `ireasoncode` varchar(45) DEFAULT NULL,
  `syscode` varchar(45) DEFAULT NULL,
  `vehicle_id` varchar(255) DEFAULT NULL,
  `dtype` varchar(45) DEFAULT NULL,
  `chk1` varchar(45) DEFAULT NULL,
  `vlocation` varchar(355) DEFAULT NULL,
  `overspeed` varchar(45) DEFAULT NULL,
  `record_creation_time` timestamp NULL DEFAULT current_timestamp(),
  `recorddate` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_h`
--

CREATE TABLE `products_h` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_h`
--

INSERT INTO `products_h` (`id`, `name`, `status`, `family`, `code`) VALUES
(2, 'Trackers', '1', '1', '0011');

-- --------------------------------------------------------

--
-- Table structure for table `product_family`
--

CREATE TABLE `product_family` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_family`
--

INSERT INTO `product_family` (`id`, `name`, `status`) VALUES
(1, 'Trackers', '1'),
(9, 'Motor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SUBJ_ID` int(11) NOT NULL,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_ID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJ_ID`, `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`) VALUES
(1177, 'Spiral Filipino', 'Filipino for Grade 7 - Spiral Filipino', 3, '', 47, '2013-2014', 'First'),
(1178, 'Spiral English', 'English for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1179, 'Spiral Mathematics', 'Mathematics for Grade 7 - Spiral Math', 3, '', 47, '2013-2014', 'First'),
(1180, 'Spiral Science', 'Science for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1181, 'Spiral T.L.E', 'T.L.E for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1182, 'Spiral A.P', 'Araling Panlipunan for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1183, 'Spiral Religion', 'rekligion for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1184, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1185, 'MAPEH', 'MAPEH for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1186, 'MAPEH', 'MAPEH for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1187, 'Religion', 'Religion for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1188, 'Spiral Filipino', 'Filipino for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1189, 'Spiral English', 'English for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1190, 'Spiral Mathematics', 'Mathematics for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1191, 'Spiral Science', 'Science for Grade ', 3, '', 48, '2013-2014', 'First'),
(1192, 'Spiral T.L.E.', 'T.L.E for Grade 7 ', 3, '', 48, '2013-2014', 'First'),
(1193, 'Spiral A.P.', 'Araling Panlipunan for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1194, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 48, '2013-2014', 'First'),
(1195, 'Spiral Filipino', 'Filipino for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1196, 'Spiral English', 'English for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1197, 'Spiral Mathematics', 'Mathematics for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1198, 'Spiral Science', 'Science for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1199, 'Spiral A.P.', 'Araling Panlipunan for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1200, 'Spiral T.L.E.', 'T.L.E for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1201, 'Spiral MAPEH', 'MAPEH for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1202, 'Values Education', 'Values Education for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1203, 'Computer', 'Computer for grade 9', 3, '', 49, '2013-2014', 'First'),
(1204, 'Religion IV', 'Religion for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1205, 'Spiral Filipino', 'Filipino for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1206, 'Spiral Mathematics', 'Mathematics for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1207, 'Spiral Science', 'Science for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1208, 'Spiral T.L.E.', 'T.L.E for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1209, 'Spiral MAPEH', 'MAPEH for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1210, 'Values Education', 'Values Education for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1211, 'CAT', 'Citizens Advancement Training', 3, '', 50, '2013-2014', 'First'),
(1212, 'Computer', 'Computer for grade 10', 3, '', 50, '2013-2014', 'First'),
(1213, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First'),
(1214, 'Spiral Filipino', 'Filipino for Grade 7 - Spiral Filipino', 3, '', 47, '2013-2014', 'First'),
(1215, 'Spiral English', 'English for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1216, 'Spiral Mathematics', 'Mathematics for Grade 7 - Spiral Math', 3, '', 47, '2013-2014', 'First'),
(1217, 'Spiral Science', 'Science for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1218, 'Spiral T.L.E', 'T.L.E for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1219, 'Spiral A.P', 'Araling Panlipunan for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1220, 'Spiral Religion', 'rekligion for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1221, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1222, 'MAPEH', 'MAPEH for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1223, 'MAPEH', 'MAPEH for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1224, 'Religion', 'Religion for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1225, 'Spiral Filipino', 'Filipino for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1226, 'Spiral English', 'English for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1227, 'Spiral Mathematics', 'Mathematics for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1228, 'Spiral Science', 'Science for Grade ', 3, '', 48, '2013-2014', 'First'),
(1229, 'Spiral T.L.E.', 'T.L.E for Grade 7 ', 3, '', 48, '2013-2014', 'First'),
(1230, 'Spiral A.P.', 'Araling Panlipunan for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1231, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 48, '2013-2014', 'First'),
(1232, 'Spiral Filipino', 'Filipino for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1233, 'Spiral English', 'English for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1234, 'Spiral Mathematics', 'Mathematics for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1235, 'Spiral Science', 'Science for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1236, 'Spiral A.P.', 'Araling Panlipunan for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1237, 'Spiral T.L.E.', 'T.L.E for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1238, 'Spiral MAPEH', 'MAPEH for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1239, 'Values Education', 'Values Education for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1240, 'Computer', 'Computer for grade 9', 3, '', 49, '2013-2014', 'First'),
(1241, 'Religion IV', 'Religion for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1242, 'Spiral Filipino', 'Filipino for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1243, 'Spiral Mathematics', 'Mathematics for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1244, 'Spiral Science', 'Science for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1245, 'Spiral T.L.E.', 'T.L.E for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1246, 'Spiral MAPEH', 'MAPEH for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1247, 'Values Education', 'Values Education for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1248, 'CAT', 'Citizens Advancement Training', 3, '', 50, '2013-2014', 'First'),
(1249, 'Computer', 'Computer for grade 10', 3, '', 50, '2013-2014', 'First'),
(1250, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First'),
(1251, 'Spiral Filipino', 'Filipino for Grade 7 - Spiral Filipino', 3, '', 47, '2013-2014', 'First'),
(1252, 'Spiral English', 'English for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1253, 'Spiral Mathematics', 'Mathematics for Grade 7 - Spiral Math', 3, '', 47, '2013-2014', 'First'),
(1254, 'Spiral Science', 'Science for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1255, 'Spiral T.L.E', 'T.L.E for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1256, 'Spiral A.P', 'Araling Panlipunan for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1257, 'Spiral Religion', 'rekligion for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1258, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1259, 'MAPEH', 'MAPEH for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1260, 'MAPEH', 'MAPEH for Grade 7', 3, '', 47, '2013-2014', 'First'),
(1261, 'Religion', 'Religion for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1262, 'Spiral Filipino', 'Filipino for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1263, 'Spiral English', 'English for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1264, 'Spiral Mathematics', 'Mathematics for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(1265, 'Spiral Science', 'Science for Grade ', 3, '', 48, '2013-2014', 'First'),
(1266, 'Spiral T.L.E.', 'T.L.E for Grade 7 ', 3, '', 48, '2013-2014', 'First'),
(1267, 'Spiral A.P.', 'Araling Panlipunan for Grade 8', 3, '', 48, '2013-2014', 'First'),
(1268, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 48, '2013-2014', 'First'),
(1269, 'Spiral Filipino', 'Filipino for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1270, 'Spiral English', 'English for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1271, 'Spiral Mathematics', 'Mathematics for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1272, 'Spiral Science', 'Science for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1273, 'Spiral A.P.', 'Araling Panlipunan for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1274, 'Spiral T.L.E.', 'T.L.E for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1275, 'Spiral MAPEH', 'MAPEH for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1276, 'Values Education', 'Values Education for Grade 9', 3, '', 49, '2013-2014', 'First'),
(1277, 'Computer', 'Computer for grade 9', 3, '', 49, '2013-2014', 'First'),
(1278, 'Religion IV', 'Religion for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1279, 'Spiral Filipino', 'Filipino for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1280, 'Spiral Mathematics', 'Mathematics for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1281, 'Spiral Science', 'Science for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1282, 'Spiral T.L.E.', 'T.L.E for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1283, 'Spiral MAPEH', 'MAPEH for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1284, 'Values Education', 'Values Education for Grade 10', 3, '', 50, '2013-2014', 'First'),
(1285, 'CAT', 'Citizens Advancement Training', 3, '', 50, '2013-2014', 'First'),
(1286, 'Computer', 'Computer for grade 10', 3, '', 50, '2013-2014', 'First'),
(1287, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First');

-- --------------------------------------------------------

--
-- Table structure for table `tc_devices`
--

CREATE TABLE `tc_devices` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `uniqueid` varchar(128) NOT NULL,
  `lastupdate` timestamp NULL DEFAULT NULL,
  `positionid` int(11) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `attributes` varchar(4000) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `model` varchar(128) DEFAULT NULL,
  `contact` varchar(512) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `disabled` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_devices`
--

INSERT INTO `tc_devices` (`id`, `name`, `uniqueid`, `lastupdate`, `positionid`, `groupid`, `attributes`, `phone`, `model`, `contact`, `category`, `disabled`) VALUES
(2, 'SUZUKI  BMB-943', '352094080155242', '2021-03-24 04:17:14', 730604, NULL, '{}', '', '', '', NULL, b'0'),
(4, 'KP19JVS', '12345678987654321', '2021-03-18 08:45:54', 689742, NULL, '{}', 'BLACK', '', '', NULL, b'0'),
(6, 'BMW  LJ68OTZ', '354017115794022', '2021-03-24 04:23:30', 730617, NULL, '{}', '', '', '', NULL, b'0'),
(7, 'LAND_ROVER  FL18NCA', '354017116324795', '2021-03-24 04:22:48', 730616, NULL, '{}', '', '', '', NULL, b'0'),
(8, '  AVTRACK-1', '354018114125093', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(10, 'MERCEDES-BENZ  AJ69AUH', '354018115636924', '2021-03-15 18:32:24', 638252, NULL, '{}', '', '', '', NULL, b'0'),
(11, 'AVTRACK-3', '354018115740064', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(32, 'NAV-3', '354018114485893', '2021-03-16 14:00:22', 657491, NULL, '{}', '', '', '', NULL, b'0'),
(35, 'NAV-5', '354018115636957', '2021-03-16 13:36:01', 657175, NULL, '{}', '', '', '', NULL, b'0'),
(36, '  NAV-1449', '354018115685319', '2021-03-15 20:14:26', 640297, NULL, '{}', '', '', '', NULL, b'0'),
(37, '  NAV3-1439', '354018114125242', '2021-03-16 12:55:23', 656489, NULL, '{}', '', '', '', NULL, b'0'),
(41, '  NAV2-1418', '354018114493236', '2021-03-16 13:28:47', 657005, NULL, '{}', '', '', '', NULL, b'0'),
(42, '  NAV-1461', '354018114487923', '2021-03-16 13:49:40', 657283, NULL, '{}', '', '', '', NULL, b'0'),
(43, '  NAV-1378', '354018114488467', '2021-03-16 14:49:45', 658218, NULL, '{}', '', '', '', NULL, b'0'),
(44, '  NAV-1111', '354018115573713', '2021-03-16 15:49:52', 659182, NULL, '{}', '', '', '', NULL, b'0'),
(45, '  NAV1-1450', '354018115687000', '2021-03-16 14:44:13', 658167, NULL, '{}', '', '', '', NULL, b'0'),
(46, '  NAV-1446', '354018114488434', '2021-03-16 14:43:56', 658159, NULL, '{}', '', '', '', NULL, b'0'),
(47, '  NAV-1462', '354018115685384', '2021-03-16 15:18:07', 658836, NULL, '{}', '', '', '', NULL, b'0'),
(49, '  NAV-2222', '354018115731691', '2021-03-16 17:14:54', 660083, NULL, '{}', '', '', '', NULL, b'0'),
(105, '8944478300000114163', '8944478300000114163', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(106, '8944478300000114171', '8944478300000114171', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(107, '8944478300000114189', '8944478300000114189', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(108, '8944478300000114197', '8944478300000114197', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(109, '8944478300000114205', '8944478300000114205', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(110, '8944478300000114213', '8944478300000114213', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(111, '8944478300000114221', '8944478300000114221', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(112, '8944478300000114239', '8944478300000114239', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(113, '8944478300000114247', '8944478300000114247', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(114, '8944478300000114254', '8944478300000114254', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(115, '8944478300000114262', '8944478300000114262', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(116, '8944478300000114270', '8944478300000114270', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(117, '8944478300000114288', '8944478300000114288', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(118, '8944478300000114296', '8944478300000114296', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(119, '8944478300000114304', '8944478300000114304', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(120, '8944478300000114312', '8944478300000114312', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(121, '8944478300000114320', '8944478300000114320', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(122, '8944478300000114338', '8944478300000114338', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(123, '8944478300000114346', '8944478300000114346', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(124, '8944478300000114353', '8944478300000114353', NULL, NULL, NULL, '{}', '', '', '', NULL, b'0'),
(148, 'AJ57OSV', '44555624634725343', NULL, NULL, NULL, '{}', '', 'M6', '', 'Car', b'1'),
(149, 'KJ19LPC', 'Choose...', NULL, NULL, NULL, '{}', '', 'Q7', '', 'Car', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tc_users`
--

CREATE TABLE `tc_users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hashedpassword` varchar(128) DEFAULT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `readonly` bit(1) NOT NULL DEFAULT b'0',
  `administrator` bit(1) DEFAULT NULL,
  `map` varchar(128) DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `zoom` int(11) NOT NULL DEFAULT 0,
  `twelvehourformat` bit(1) NOT NULL DEFAULT b'0',
  `attributes` varchar(4000) DEFAULT NULL,
  `coordinateformat` varchar(128) DEFAULT NULL,
  `disabled` bit(1) DEFAULT b'0',
  `expirationtime` timestamp NULL DEFAULT NULL,
  `devicelimit` int(11) DEFAULT -1,
  `token` varchar(128) DEFAULT NULL,
  `userlimit` int(11) DEFAULT 0,
  `devicereadonly` bit(1) DEFAULT b'0',
  `phone` varchar(128) DEFAULT NULL,
  `limitcommands` bit(1) DEFAULT b'0',
  `login` varchar(128) DEFAULT NULL,
  `poilayer` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`id`, `name`, `email`, `hashedpassword`, `salt`, `readonly`, `administrator`, `map`, `latitude`, `longitude`, `zoom`, `twelvehourformat`, `attributes`, `coordinateformat`, `disabled`, `expirationtime`, `devicelimit`, `token`, `userlimit`, `devicereadonly`, `phone`, `limitcommands`, `login`, `poilayer`) VALUES
(1, 'admin', 'admin', 'D33DCA55ABD4CC5BC76F2BC0B4E603FE2C6F61F4C1EF2D47', '000000000000000000000000000000000000000000000000', b'0', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(3, 'samad', 'samad@gmail.com', '0fe2d43b371e262a74260eeaf95902b9b9d1cacbe9ae005e', '70cdfa0720d6e11bd0e4e0c232d0d9f7e79eef3e943c4a9d', b'0', b'0', NULL, 0, 0, 0, b'0', '{}', NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(4, 'Abbas', 'abbas', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'0', b'0', '', 0, 0, 0, b'0', '{}', '', b'0', NULL, -1, NULL, 0, b'0', '', b'0', '', ''),
(5, 'abbas', 'abbbas@gmail.com', '7f11ee9544249c844fd10e36539b2f7abaa278efeb9ef3da', '08799832f01ed2a287724e2bbae9fc58597c8f9a9d4aa7a0', b'0', b'0', '', 0, 0, 0, b'0', '{}', '', b'0', NULL, -1, NULL, 0, b'0', '', b'0', '', ''),
(7, 'abdullah', 'adbullah@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(8, 'basit', 'basit@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(9, 'Abdul Basit', 'abdulbasit@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(10, 'Usman', 'usman@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(12, 'naveed1', 'naveed1@avtrack.co.uk', '55cc96c49274e490f7c122b53304f54ef41c97d00bbd903a', 'a27c9bcba2ca01a2adc14830364db016e01cc338399adaa4', b'0', b'0', '', 0, 0, 0, b'0', '{}', '', b'0', NULL, -1, NULL, 0, b'0', '', b'0', '', ''),
(17, 'Abdul Samad', 'abdulsamadq67@gmail.com', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', '20e5592fe7c9499cab37c6662f3c3dfb449c1ace0992402d', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(18, 'Hamza Ansari', 'ahmedhamzaansari.99@gmail.com', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', '20e5592fe7c9499cab37c6662f3c3dfb449c1ace0992402d', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(19, 'Abdullah', 'abdullah@gmail.com', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', '20e5592fe7c9499cab37c6662f3c3dfb449c1ace0992402d', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(21, 'Naveed', 'admin@carcreditsolutions.co.uk', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(22, 'khalid', 'khalid@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(23, 'Asif', 'asif@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(32, 'Ali', 'ali@alizeb.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(48, 'demo', 'demo@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(49, 'Basit', 'abasit9119@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(52, 'Abdullah', 'admin@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(60, 'asif', 'w@g', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL),
(66, 'Tracker', '', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tc_user_device`
--

CREATE TABLE `tc_user_device` (
  `userid` int(11) NOT NULL,
  `deviceid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_user_device`
--

INSERT INTO `tc_user_device` (`userid`, `deviceid`) VALUES
(4, 8),
(4, 10),
(4, 11),
(18, 36),
(18, 42),
(18, 36),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 7),
(1, 4),
(21, 32),
(21, 35),
(48, 148),
(55, 7),
(58, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `privilege` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userSettings_id` bigint(20) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL DEFAULT 1,
  `subacc_id` int(11) NOT NULL,
  `allowed_actions` varchar(45) NOT NULL DEFAULT '000000000000000000000000000000000000000000000',
  `independent_exist` varchar(45) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `privilege`, `login`, `password`, `userSettings_id`, `status`, `description`, `address`, `telephone`, `email`, `notify`, `subacc_id`, `allowed_actions`, `independent_exist`, `image`) VALUES
(1, 'Admin', 'admin', 'admin', 'a2bcdad4b9bbaa7bfc1f95c3cc7a12fc', 1, 'Active', 'byco@go', 'karachi', '03137152168', 'abasit9119@gmail.com', 1, 1, '000111111111111100000000000000000000000000000', '1', NULL),
(2, 'TMC', 'Distributor', 'tmc', '0fd88a53fb4235c5a8a37ebeae719b0c', 1, 'Active', 'tmc@tracker', 'karachi', '03137152168', 'abasit9119@gmail.com', 1, 1, '000111111111111100000000000000000000000000000', '2', NULL),
(191, 'TPL', 'End-User', 'tpl', 'cbc00a7a4feca1fcbe7d43911c7ac49e', 1, 'Active', 'tpl@tracker', '', '', '', 1, 2, '000111111111111100000000000000000000000000000', '2', ''),
(192, 'RESQ', 'End-User', 'resq', '951b48fe765d4200e48848047f91dc15', 1, 'Active', 'resq@tracker', '', '', '', 1, 2, '000111111111111100000000000000000000000000000', '2', ''),
(194, 'Guest', 'End-User', 'guest', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Active', '', '', '', '', 1, 2, '000010000100000000000000000000000000000000000', '2', ''),
(195, 'Hamza', 'Admin', 'hamza@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 0, '1', '12345678', '', '', 'hamza@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, 'Choose...'),
(52, 'Abdullah', 'Admin', 'admin@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 52, '1', '12345678', '', '', 'admin@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, 'Choose...'),
(60, 'asif', '', 'w@g', '112360d91e81336860629d08510570aa79b29a95d714be0b', 60, '1', '', '', '', 'w@g', 1, 0, '000000000000000000000000000000000000000000000', NULL, ''),
(66, 'Tracker', '', '', '112360d91e81336860629d08510570aa79b29a95d714be0b', 66, '1', '', '', '', '', 1, 0, '000000000000000000000000000000000000000000000', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_devices`
--

CREATE TABLE `users_devices` (
  `users_id` bigint(20) NOT NULL,
  `devices_id` bigint(20) NOT NULL,
  `subacc_id` int(11) NOT NULL DEFAULT 0,
  `group_id` varchar(45) DEFAULT NULL,
  `users_devices_id` bigint(20) NOT NULL,
  `show_authority` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_devices`
--

INSERT INTO `users_devices` (`users_id`, `devices_id`, `subacc_id`, `group_id`, `users_devices_id`, `show_authority`) VALUES
(1, 1, 0, NULL, 1, '0'),
(2, 1, 1, NULL, 2, '0'),
(192, 1, 2, NULL, 3, '1'),
(1, 2, 0, NULL, 4, '0'),
(2, 2, 1, NULL, 5, '0'),
(192, 2, 2, NULL, 6, '1'),
(1, 3, 0, NULL, 7, '0'),
(2, 3, 1, NULL, 8, '0'),
(192, 3, 2, NULL, 9, '1'),
(1, 4, 0, NULL, 10, '0'),
(2, 4, 1, NULL, 11, '0'),
(192, 4, 2, NULL, 12, '1'),
(1, 5, 0, NULL, 13, '0'),
(2, 5, 1, NULL, 14, '0'),
(192, 5, 2, NULL, 15, '1'),
(1, 6, 0, NULL, 16, '0'),
(2, 6, 1, NULL, 17, '0'),
(192, 6, 2, NULL, 18, '1'),
(1, 7, 0, NULL, 19, '0'),
(2, 7, 1, NULL, 20, '0'),
(192, 7, 2, NULL, 21, '1'),
(1, 8, 0, NULL, 22, '0'),
(2, 8, 1, NULL, 23, '0'),
(192, 8, 2, NULL, 24, '1'),
(1, 9, 0, NULL, 25, '0'),
(2, 9, 1, NULL, 26, '0'),
(192, 9, 2, NULL, 27, '1'),
(1, 10, 0, NULL, 28, '0'),
(2, 10, 1, NULL, 29, '0'),
(192, 10, 2, NULL, 30, '1'),
(1, 11, 0, NULL, 31, '0'),
(2, 11, 1, NULL, 32, '0'),
(192, 11, 2, NULL, 33, '1'),
(1, 12, 0, NULL, 34, '0'),
(2, 12, 1, NULL, 35, '0'),
(192, 12, 2, NULL, 36, '1'),
(1, 13, 0, NULL, 37, '0'),
(2, 13, 1, NULL, 38, '0'),
(192, 13, 2, NULL, 39, '1'),
(1, 14, 0, NULL, 40, '0'),
(2, 14, 1, NULL, 41, '0'),
(192, 14, 2, NULL, 42, '1'),
(1, 15, 0, NULL, 43, '0'),
(2, 15, 1, NULL, 44, '0'),
(192, 15, 2, NULL, 45, '1'),
(1, 16, 0, NULL, 46, '0'),
(2, 16, 1, NULL, 47, '0'),
(192, 16, 2, NULL, 48, '1'),
(1, 17, 0, NULL, 49, '0'),
(2, 17, 1, NULL, 50, '0'),
(192, 17, 2, NULL, 51, '1'),
(1, 18, 0, NULL, 52, '0'),
(2, 18, 1, NULL, 53, '0'),
(192, 18, 2, NULL, 54, '1'),
(1, 19, 0, NULL, 55, '0'),
(2, 19, 1, NULL, 56, '0'),
(192, 19, 2, NULL, 57, '1'),
(1, 20, 0, NULL, 58, '0'),
(2, 20, 1, NULL, 59, '0'),
(192, 20, 2, NULL, 60, '1'),
(1, 21, 0, NULL, 61, '0'),
(2, 21, 1, NULL, 62, '0'),
(192, 21, 2, NULL, 63, '1'),
(1, 22, 0, NULL, 64, '0'),
(2, 22, 1, NULL, 65, '0'),
(192, 22, 2, NULL, 66, '1'),
(1, 23, 0, NULL, 67, '0'),
(2, 23, 1, NULL, 68, '0'),
(192, 23, 2, NULL, 69, '1'),
(1, 24, 0, NULL, 70, '0'),
(2, 24, 1, NULL, 71, '0'),
(192, 24, 2, NULL, 72, '1'),
(1, 25, 0, NULL, 73, '0'),
(2, 25, 1, NULL, 74, '0'),
(192, 25, 2, NULL, 75, '1'),
(1, 26, 0, NULL, 76, '0'),
(2, 26, 1, NULL, 77, '0'),
(192, 26, 2, NULL, 78, '1'),
(1, 27, 0, NULL, 79, '0'),
(2, 27, 1, NULL, 80, '0'),
(192, 27, 2, NULL, 81, '1'),
(1, 28, 0, NULL, 82, '0'),
(2, 28, 1, NULL, 83, '0'),
(192, 28, 2, NULL, 84, '1'),
(1, 29, 0, NULL, 85, '0'),
(2, 29, 1, NULL, 86, '0'),
(192, 29, 2, NULL, 87, '1'),
(1, 30, 0, NULL, 88, '0'),
(2, 30, 1, NULL, 89, '0'),
(192, 30, 2, NULL, 90, '1'),
(1, 31, 0, NULL, 91, '0'),
(2, 31, 1, NULL, 92, '0'),
(192, 31, 2, NULL, 93, '1'),
(1, 32, 0, NULL, 94, '0'),
(2, 32, 1, NULL, 95, '0'),
(192, 32, 2, NULL, 96, '1'),
(1, 33, 0, NULL, 97, '0'),
(2, 33, 1, NULL, 98, '0'),
(192, 33, 2, NULL, 99, '1'),
(1, 34, 0, NULL, 100, '0'),
(2, 34, 1, NULL, 101, '0'),
(192, 34, 2, NULL, 102, '1'),
(1, 35, 0, NULL, 103, '0'),
(2, 35, 1, NULL, 104, '0'),
(192, 35, 2, NULL, 105, '1'),
(1, 36, 0, NULL, 106, '0'),
(2, 36, 1, NULL, 107, '0'),
(192, 36, 2, NULL, 108, '1'),
(1, 37, 0, NULL, 109, '0'),
(2, 37, 1, NULL, 110, '0'),
(192, 37, 2, NULL, 111, '1'),
(1, 38, 0, NULL, 112, '0'),
(2, 38, 1, NULL, 113, '0'),
(192, 38, 2, NULL, 114, '1'),
(1, 39, 0, NULL, 115, '0'),
(2, 39, 1, NULL, 116, '0'),
(192, 39, 2, NULL, 117, '1'),
(1, 40, 0, NULL, 118, '0'),
(2, 40, 1, NULL, 119, '0'),
(192, 40, 2, NULL, 120, '1'),
(1, 41, 0, NULL, 121, '0'),
(2, 41, 1, NULL, 122, '0'),
(192, 41, 2, NULL, 123, '1'),
(1, 42, 0, NULL, 124, '0'),
(2, 42, 1, NULL, 125, '0'),
(192, 42, 2, NULL, 126, '1'),
(1, 43, 0, NULL, 127, '0'),
(2, 43, 1, NULL, 128, '0'),
(192, 43, 2, NULL, 129, '1'),
(1, 44, 0, NULL, 130, '0'),
(2, 44, 1, NULL, 131, '0'),
(192, 44, 2, NULL, 132, '1'),
(1, 45, 0, NULL, 133, '0'),
(2, 45, 1, NULL, 134, '0'),
(192, 45, 2, NULL, 135, '1'),
(1, 46, 0, NULL, 136, '0'),
(2, 46, 1, NULL, 137, '0'),
(192, 46, 2, NULL, 138, '1'),
(1, 47, 0, NULL, 139, '0'),
(2, 47, 1, NULL, 140, '0'),
(192, 47, 2, NULL, 141, '1'),
(1, 48, 0, NULL, 142, '0'),
(2, 48, 1, NULL, 143, '0'),
(192, 48, 2, NULL, 144, '1'),
(1, 49, 0, NULL, 145, '0'),
(2, 49, 1, NULL, 146, '0'),
(192, 49, 2, NULL, 147, '1'),
(1, 50, 0, NULL, 148, '0'),
(2, 50, 1, NULL, 149, '0'),
(192, 50, 2, NULL, 150, '1'),
(1, 51, 0, NULL, 151, '0'),
(2, 51, 1, NULL, 152, '0'),
(192, 51, 2, NULL, 153, '1'),
(1, 52, 0, NULL, 154, '0'),
(2, 52, 1, NULL, 155, '0'),
(192, 52, 2, NULL, 156, '1'),
(1, 53, 0, NULL, 157, '0'),
(2, 53, 1, NULL, 158, '0'),
(192, 53, 2, NULL, 159, '1'),
(1, 54, 0, NULL, 160, '0'),
(2, 54, 1, NULL, 161, '0'),
(192, 54, 2, NULL, 162, '1'),
(1, 55, 0, NULL, 163, '0'),
(2, 55, 1, NULL, 164, '0'),
(192, 55, 2, NULL, 165, '1'),
(1, 56, 0, NULL, 166, '0'),
(2, 56, 1, NULL, 167, '0'),
(192, 56, 2, NULL, 168, '1'),
(1, 57, 0, NULL, 169, '0'),
(2, 57, 1, NULL, 170, '0'),
(192, 57, 2, NULL, 171, '1'),
(1, 58, 0, NULL, 172, '0'),
(2, 58, 1, NULL, 173, '0'),
(192, 58, 2, NULL, 174, '1'),
(1, 59, 0, NULL, 175, '0'),
(2, 59, 1, NULL, 176, '0'),
(192, 59, 2, NULL, 177, '1'),
(1, 60, 0, NULL, 178, '0'),
(2, 60, 1, NULL, 179, '0'),
(192, 60, 2, NULL, 180, '1'),
(1, 61, 0, NULL, 181, '0'),
(2, 61, 1, NULL, 182, '0'),
(192, 61, 2, NULL, 183, '1'),
(1, 62, 0, NULL, 184, '0'),
(2, 62, 1, NULL, 185, '0'),
(192, 62, 2, NULL, 186, '1'),
(1, 63, 0, NULL, 187, '0'),
(2, 63, 1, NULL, 188, '0'),
(192, 63, 2, NULL, 189, '1'),
(1, 64, 0, NULL, 190, '0'),
(2, 64, 1, NULL, 191, '0'),
(192, 64, 2, NULL, 192, '1'),
(1, 65, 0, NULL, 193, '0'),
(2, 65, 1, NULL, 194, '0'),
(192, 65, 2, NULL, 195, '1'),
(1, 66, 0, NULL, 196, '0'),
(2, 66, 1, NULL, 197, '0'),
(192, 66, 2, NULL, 198, '1'),
(1, 67, 0, NULL, 199, '0'),
(2, 67, 1, NULL, 200, '0'),
(192, 67, 2, NULL, 201, '1'),
(1, 68, 0, NULL, 202, '0'),
(2, 68, 1, NULL, 203, '0'),
(192, 68, 2, NULL, 204, '1'),
(1, 69, 0, NULL, 205, '0'),
(2, 69, 1, NULL, 206, '0'),
(192, 69, 2, NULL, 207, '1'),
(1, 70, 0, NULL, 208, '0'),
(2, 70, 1, NULL, 209, '0'),
(192, 70, 2, NULL, 210, '1'),
(1, 71, 0, NULL, 211, '0'),
(2, 71, 1, NULL, 212, '0'),
(192, 71, 2, NULL, 213, '1'),
(1, 72, 0, NULL, 214, '0'),
(2, 72, 1, NULL, 215, '0'),
(192, 72, 2, NULL, 216, '1'),
(1, 73, 0, NULL, 217, '0'),
(2, 73, 1, NULL, 218, '0'),
(192, 73, 2, NULL, 219, '1'),
(1, 74, 0, NULL, 220, '0'),
(2, 74, 1, NULL, 221, '0'),
(192, 74, 2, NULL, 222, '1'),
(1, 75, 0, NULL, 223, '0'),
(2, 75, 1, NULL, 224, '0'),
(192, 75, 2, NULL, 225, '1'),
(1, 76, 0, NULL, 226, '0'),
(2, 76, 1, NULL, 227, '0'),
(192, 76, 2, NULL, 228, '1'),
(1, 77, 0, NULL, 229, '0'),
(2, 77, 1, NULL, 230, '0'),
(192, 77, 2, NULL, 231, '1'),
(1, 78, 0, NULL, 232, '0'),
(2, 78, 1, NULL, 233, '0'),
(192, 78, 2, NULL, 234, '1'),
(1, 79, 0, NULL, 235, '0'),
(2, 79, 1, NULL, 236, '0'),
(192, 79, 2, NULL, 237, '1'),
(1, 80, 0, NULL, 238, '0'),
(2, 80, 1, NULL, 239, '0'),
(192, 80, 2, NULL, 240, '1'),
(1, 81, 0, NULL, 241, '0'),
(2, 81, 1, NULL, 242, '0'),
(192, 81, 2, NULL, 243, '1'),
(1, 82, 0, NULL, 244, '0'),
(2, 82, 1, NULL, 245, '0'),
(192, 82, 2, NULL, 246, '1'),
(1, 83, 0, NULL, 247, '0'),
(2, 83, 1, NULL, 248, '0'),
(192, 83, 2, NULL, 249, '1'),
(1, 84, 0, NULL, 250, '0'),
(2, 84, 1, NULL, 251, '0'),
(192, 84, 2, NULL, 252, '1'),
(1, 85, 0, NULL, 253, '0'),
(2, 85, 1, NULL, 254, '0'),
(192, 85, 2, NULL, 255, '1'),
(1, 86, 0, NULL, 256, '0'),
(2, 86, 1, NULL, 257, '0'),
(192, 86, 2, NULL, 258, '1'),
(1, 87, 0, NULL, 259, '0'),
(2, 87, 1, NULL, 260, '0'),
(192, 87, 2, NULL, 261, '1'),
(1, 88, 0, NULL, 262, '0'),
(2, 88, 1, NULL, 263, '0'),
(192, 88, 2, NULL, 264, '1'),
(1, 89, 0, NULL, 265, '0'),
(2, 89, 1, NULL, 266, '0'),
(192, 89, 2, NULL, 267, '1'),
(1, 90, 0, NULL, 268, '0'),
(2, 90, 1, NULL, 269, '0'),
(192, 90, 2, NULL, 270, '1'),
(1, 91, 0, NULL, 271, '0'),
(2, 91, 1, NULL, 272, '0'),
(192, 91, 2, NULL, 273, '1'),
(1, 92, 0, NULL, 274, '0'),
(2, 92, 1, NULL, 275, '0'),
(192, 92, 2, NULL, 276, '1'),
(1, 93, 0, NULL, 277, '0'),
(2, 93, 1, NULL, 278, '0'),
(192, 93, 2, NULL, 279, '1'),
(1, 94, 0, NULL, 280, '0'),
(2, 94, 1, NULL, 281, '0'),
(192, 94, 2, NULL, 282, '1'),
(1, 95, 0, NULL, 283, '0'),
(2, 95, 1, NULL, 284, '0'),
(192, 95, 2, NULL, 285, '1'),
(1, 96, 0, NULL, 286, '0'),
(2, 96, 1, NULL, 287, '0'),
(192, 96, 2, NULL, 288, '1'),
(1, 97, 0, NULL, 289, '0'),
(2, 97, 1, NULL, 290, '0'),
(192, 97, 2, NULL, 291, '1'),
(1, 98, 0, NULL, 292, '0'),
(2, 98, 1, NULL, 293, '0'),
(192, 98, 2, NULL, 294, '1'),
(1, 99, 0, NULL, 295, '0'),
(2, 99, 1, NULL, 296, '0'),
(192, 99, 2, NULL, 297, '1'),
(1, 100, 0, NULL, 298, '0'),
(2, 100, 1, NULL, 299, '0'),
(192, 100, 2, NULL, 300, '1'),
(1, 101, 0, NULL, 301, '0'),
(2, 101, 1, NULL, 302, '0'),
(192, 101, 2, NULL, 303, '1'),
(1, 102, 0, NULL, 304, '0'),
(2, 102, 1, NULL, 305, '0'),
(192, 102, 2, NULL, 306, '1'),
(1, 103, 0, NULL, 307, '0'),
(2, 103, 1, NULL, 308, '0'),
(192, 103, 2, NULL, 309, '1'),
(1, 104, 0, NULL, 310, '0'),
(2, 104, 1, NULL, 311, '0'),
(192, 104, 2, NULL, 312, '1'),
(1, 105, 0, NULL, 313, '0'),
(2, 105, 1, NULL, 314, '0'),
(192, 105, 2, NULL, 315, '1'),
(1, 106, 0, NULL, 316, '0'),
(2, 106, 1, NULL, 317, '0'),
(192, 106, 2, NULL, 318, '1'),
(1, 107, 0, NULL, 319, '0'),
(2, 107, 1, NULL, 320, '0'),
(192, 107, 2, NULL, 321, '1'),
(1, 108, 0, NULL, 322, '0'),
(2, 108, 1, NULL, 323, '0'),
(192, 108, 2, NULL, 324, '1'),
(1, 109, 0, NULL, 325, '0'),
(2, 109, 1, NULL, 326, '0'),
(192, 109, 2, NULL, 327, '1'),
(1, 110, 0, NULL, 328, '0'),
(2, 110, 1, NULL, 329, '0'),
(192, 110, 2, NULL, 330, '1'),
(1, 111, 0, NULL, 331, '0'),
(2, 111, 1, NULL, 332, '0'),
(192, 111, 2, NULL, 333, '1'),
(1, 112, 0, NULL, 334, '0'),
(2, 112, 1, NULL, 335, '0'),
(192, 112, 2, NULL, 336, '1'),
(1, 113, 0, NULL, 337, '0'),
(2, 113, 1, NULL, 338, '0'),
(192, 113, 2, NULL, 339, '1'),
(1, 114, 0, NULL, 340, '0'),
(2, 114, 1, NULL, 341, '0'),
(192, 114, 2, NULL, 342, '1'),
(1, 115, 0, NULL, 343, '0'),
(2, 115, 1, NULL, 344, '0'),
(192, 115, 2, NULL, 345, '1'),
(1, 116, 0, NULL, 346, '0'),
(2, 116, 1, NULL, 347, '0'),
(192, 116, 2, NULL, 348, '1'),
(1, 117, 0, NULL, 349, '0'),
(2, 117, 1, NULL, 350, '0'),
(192, 117, 2, NULL, 351, '1'),
(1, 118, 0, NULL, 352, '0'),
(2, 118, 1, NULL, 353, '0'),
(192, 118, 2, NULL, 354, '1'),
(1, 119, 0, NULL, 355, '0'),
(2, 119, 1, NULL, 356, '0'),
(192, 119, 2, NULL, 357, '1'),
(1, 120, 0, NULL, 358, '0'),
(2, 120, 1, NULL, 359, '0'),
(192, 120, 2, NULL, 360, '1'),
(1, 121, 0, NULL, 361, '0'),
(2, 121, 1, NULL, 362, '0'),
(192, 121, 2, NULL, 363, '1'),
(1, 122, 0, NULL, 364, '0'),
(2, 122, 1, NULL, 365, '0'),
(192, 122, 2, NULL, 366, '1'),
(1, 123, 0, NULL, 367, '0'),
(2, 123, 1, NULL, 368, '0'),
(192, 123, 2, NULL, 369, '1'),
(1, 124, 0, NULL, 370, '0'),
(2, 124, 1, NULL, 371, '0'),
(192, 124, 2, NULL, 372, '1'),
(1, 125, 0, NULL, 373, '0'),
(2, 125, 1, NULL, 374, '0'),
(192, 125, 2, NULL, 375, '1'),
(1, 126, 0, NULL, 376, '0'),
(2, 126, 1, NULL, 377, '0'),
(192, 126, 2, NULL, 378, '1'),
(1, 127, 0, NULL, 379, '0'),
(2, 127, 1, NULL, 380, '0'),
(192, 127, 2, NULL, 381, '1'),
(1, 128, 0, NULL, 382, '0'),
(2, 128, 1, NULL, 383, '0'),
(192, 128, 2, NULL, 384, '1'),
(1, 129, 0, NULL, 385, '0'),
(2, 129, 1, NULL, 386, '0'),
(192, 129, 2, NULL, 387, '1'),
(1, 130, 0, NULL, 388, '0'),
(2, 130, 1, NULL, 389, '0'),
(192, 130, 2, NULL, 390, '1'),
(1, 131, 0, NULL, 391, '0'),
(2, 131, 1, NULL, 392, '0'),
(192, 131, 2, NULL, 393, '1'),
(1, 132, 0, NULL, 394, '0'),
(2, 132, 1, NULL, 395, '0'),
(192, 132, 2, NULL, 396, '1'),
(1, 133, 0, NULL, 397, '0'),
(2, 133, 1, NULL, 398, '0'),
(192, 133, 2, NULL, 399, '1'),
(1, 134, 0, NULL, 400, '0'),
(2, 134, 1, NULL, 401, '0'),
(192, 134, 2, NULL, 402, '1'),
(1, 135, 0, NULL, 403, '0'),
(2, 135, 1, NULL, 404, '0'),
(192, 135, 2, NULL, 405, '1'),
(1, 136, 0, NULL, 406, '0'),
(2, 136, 1, NULL, 407, '0'),
(192, 136, 2, NULL, 408, '1'),
(1, 137, 0, NULL, 409, '0'),
(2, 137, 1, NULL, 410, '0'),
(192, 137, 2, NULL, 411, '1'),
(1, 138, 0, NULL, 412, '0'),
(2, 138, 1, NULL, 413, '0'),
(192, 138, 2, NULL, 414, '1'),
(1, 139, 0, NULL, 415, '0'),
(2, 139, 1, NULL, 416, '0'),
(192, 139, 2, NULL, 417, '1'),
(1, 140, 0, NULL, 418, '0'),
(2, 140, 1, NULL, 419, '0'),
(192, 140, 2, NULL, 420, '1'),
(1, 141, 0, NULL, 421, '0'),
(2, 141, 1, NULL, 422, '0'),
(192, 141, 2, NULL, 423, '1'),
(1, 142, 0, NULL, 424, '0'),
(2, 142, 1, NULL, 425, '0'),
(192, 142, 2, NULL, 426, '1'),
(1, 143, 0, NULL, 427, '0'),
(2, 143, 1, NULL, 428, '0'),
(192, 143, 2, NULL, 429, '1'),
(1, 144, 0, NULL, 430, '0'),
(2, 144, 1, NULL, 431, '0'),
(192, 144, 2, NULL, 432, '1'),
(1, 145, 0, NULL, 433, '0'),
(2, 145, 1, NULL, 434, '0'),
(192, 145, 2, NULL, 435, '1'),
(1, 146, 0, NULL, 436, '0'),
(2, 146, 1, NULL, 437, '0'),
(192, 146, 2, NULL, 438, '1'),
(1, 147, 0, NULL, 439, '0'),
(2, 147, 1, NULL, 440, '0'),
(192, 147, 2, NULL, 441, '1'),
(1, 148, 0, NULL, 442, '0'),
(2, 148, 1, NULL, 443, '0'),
(192, 148, 2, NULL, 444, '1'),
(1, 149, 0, NULL, 445, '0'),
(2, 149, 1, NULL, 446, '0'),
(192, 149, 2, NULL, 447, '1'),
(1, 150, 0, NULL, 448, '0'),
(2, 150, 1, NULL, 449, '0'),
(192, 150, 2, NULL, 450, '1'),
(1, 151, 0, NULL, 451, '0'),
(2, 151, 1, NULL, 452, '0'),
(192, 151, 2, NULL, 453, '1'),
(1, 152, 0, NULL, 454, '0'),
(2, 152, 1, NULL, 455, '0'),
(192, 152, 2, NULL, 456, '1'),
(1, 153, 0, NULL, 457, '0'),
(2, 153, 1, NULL, 458, '0'),
(192, 153, 2, NULL, 459, '1'),
(1, 154, 0, NULL, 460, '0'),
(2, 154, 1, NULL, 461, '0'),
(192, 154, 2, NULL, 462, '1'),
(1, 155, 0, NULL, 463, '0'),
(2, 155, 1, NULL, 464, '0'),
(192, 155, 2, NULL, 465, '1'),
(1, 156, 0, NULL, 466, '0'),
(2, 156, 1, NULL, 467, '0'),
(192, 156, 2, NULL, 468, '1'),
(1, 157, 0, NULL, 469, '0'),
(2, 157, 1, NULL, 470, '0'),
(192, 157, 2, NULL, 471, '1'),
(1, 158, 0, NULL, 472, '0'),
(2, 158, 1, NULL, 473, '0'),
(192, 158, 2, NULL, 474, '1'),
(1, 159, 0, NULL, 475, '0'),
(2, 159, 1, NULL, 476, '0'),
(192, 159, 2, NULL, 477, '1'),
(1, 160, 0, NULL, 478, '0'),
(2, 160, 1, NULL, 479, '0'),
(192, 160, 2, NULL, 480, '1'),
(1, 161, 0, NULL, 481, '0'),
(2, 161, 1, NULL, 482, '0'),
(192, 161, 2, NULL, 483, '1'),
(1, 162, 0, NULL, 484, '0'),
(2, 162, 1, NULL, 485, '0'),
(192, 162, 2, NULL, 486, '1'),
(1, 163, 0, NULL, 487, '0'),
(2, 163, 1, NULL, 488, '0'),
(192, 163, 2, NULL, 489, '1'),
(1, 164, 0, NULL, 490, '0'),
(2, 164, 1, NULL, 491, '0'),
(192, 164, 2, NULL, 492, '1'),
(1, 165, 0, NULL, 493, '0'),
(2, 165, 1, NULL, 494, '0'),
(192, 165, 2, NULL, 495, '1'),
(1, 166, 0, NULL, 496, '0'),
(2, 166, 1, NULL, 497, '0'),
(192, 166, 2, NULL, 498, '1'),
(1, 167, 0, NULL, 499, '0'),
(2, 167, 1, NULL, 500, '0'),
(192, 167, 2, NULL, 501, '1'),
(1, 168, 0, NULL, 502, '0'),
(2, 168, 1, NULL, 503, '0'),
(192, 168, 2, NULL, 504, '1'),
(1, 169, 0, NULL, 505, '0'),
(2, 169, 1, NULL, 506, '0'),
(192, 169, 2, NULL, 507, '1'),
(1, 170, 0, NULL, 508, '0'),
(2, 170, 1, NULL, 509, '0'),
(192, 170, 2, NULL, 510, '1'),
(1, 171, 0, NULL, 511, '0'),
(2, 171, 1, NULL, 512, '0'),
(192, 171, 2, NULL, 513, '1'),
(1, 172, 0, NULL, 514, '0'),
(2, 172, 1, NULL, 515, '0'),
(192, 172, 2, NULL, 516, '1'),
(1, 173, 0, NULL, 517, '0'),
(2, 173, 1, NULL, 518, '0'),
(192, 173, 2, NULL, 519, '1'),
(1, 174, 0, NULL, 520, '0'),
(2, 174, 1, NULL, 521, '0'),
(192, 174, 2, NULL, 522, '1'),
(1, 175, 0, NULL, 523, '0'),
(2, 175, 1, NULL, 524, '0'),
(192, 175, 2, NULL, 525, '1'),
(1, 176, 0, NULL, 526, '0'),
(2, 176, 1, NULL, 527, '0'),
(192, 176, 2, NULL, 528, '1'),
(1, 177, 0, NULL, 529, '0'),
(2, 177, 1, NULL, 530, '0'),
(192, 177, 2, NULL, 531, '1'),
(1, 178, 0, NULL, 532, '0'),
(2, 178, 1, NULL, 533, '0'),
(192, 178, 2, NULL, 534, '1'),
(1, 179, 0, NULL, 535, '0'),
(2, 179, 1, NULL, 536, '0'),
(192, 179, 2, NULL, 537, '1'),
(1, 180, 0, NULL, 538, '0'),
(2, 180, 1, NULL, 539, '0'),
(192, 180, 2, NULL, 540, '1'),
(1, 181, 0, NULL, 541, '0'),
(2, 181, 1, NULL, 542, '0'),
(192, 181, 2, NULL, 543, '1'),
(1, 182, 0, NULL, 544, '0'),
(2, 182, 1, NULL, 545, '0'),
(192, 182, 2, NULL, 546, '1'),
(1, 183, 0, NULL, 547, '0'),
(2, 183, 1, NULL, 548, '0'),
(192, 183, 2, NULL, 549, '1'),
(1, 184, 0, NULL, 550, '0'),
(2, 184, 1, NULL, 551, '0'),
(192, 184, 2, NULL, 552, '1'),
(1, 185, 0, NULL, 553, '0'),
(2, 185, 1, NULL, 554, '0'),
(192, 185, 2, NULL, 555, '1'),
(1, 186, 0, NULL, 556, '0'),
(2, 186, 1, NULL, 557, '0'),
(192, 186, 2, NULL, 558, '1'),
(1, 187, 0, NULL, 559, '0'),
(2, 187, 1, NULL, 560, '0'),
(192, 187, 2, NULL, 561, '1'),
(1, 188, 0, NULL, 562, '0'),
(2, 188, 1, NULL, 563, '0'),
(192, 188, 2, NULL, 564, '1'),
(1, 189, 0, NULL, 565, '0'),
(2, 189, 1, NULL, 566, '0'),
(192, 189, 2, NULL, 567, '1'),
(1, 190, 0, NULL, 568, '0'),
(2, 190, 1, NULL, 569, '0'),
(192, 190, 2, NULL, 570, '1'),
(1, 191, 0, NULL, 571, '0'),
(2, 191, 1, NULL, 572, '0'),
(192, 191, 2, NULL, 573, '1'),
(1, 192, 0, NULL, 574, '0'),
(2, 192, 1, NULL, 575, '0'),
(192, 192, 2, NULL, 576, '1'),
(1, 193, 0, NULL, 577, '0'),
(2, 193, 1, NULL, 578, '0'),
(192, 193, 2, NULL, 579, '1'),
(1, 194, 0, NULL, 580, '0'),
(2, 194, 1, NULL, 581, '0'),
(192, 194, 2, NULL, 582, '1'),
(1, 195, 0, NULL, 583, '0'),
(2, 195, 1, NULL, 584, '0'),
(192, 195, 2, NULL, 585, '1'),
(1, 196, 0, NULL, 586, '0'),
(2, 196, 1, NULL, 587, '0'),
(192, 196, 2, NULL, 588, '1'),
(1, 197, 0, NULL, 589, '0'),
(2, 197, 1, NULL, 590, '0'),
(192, 197, 2, NULL, 591, '1'),
(1, 198, 0, NULL, 592, '0'),
(2, 198, 1, NULL, 593, '0'),
(192, 198, 2, NULL, 594, '1'),
(1, 199, 0, NULL, 595, '0'),
(2, 199, 1, NULL, 596, '0'),
(192, 199, 2, NULL, 597, '1'),
(1, 200, 0, NULL, 598, '0'),
(2, 200, 1, NULL, 599, '0'),
(192, 200, 2, NULL, 600, '1'),
(1, 201, 0, NULL, 601, '0'),
(2, 201, 1, NULL, 602, '0'),
(192, 201, 2, NULL, 603, '1'),
(1, 202, 0, NULL, 604, '0'),
(2, 202, 1, NULL, 605, '0'),
(192, 202, 2, NULL, 606, '1'),
(1, 203, 0, NULL, 607, '0'),
(2, 203, 1, NULL, 608, '0'),
(192, 203, 2, NULL, 609, '1'),
(1, 204, 0, NULL, 610, '0'),
(2, 204, 1, NULL, 611, '0'),
(192, 204, 2, NULL, 612, '1'),
(1, 205, 0, NULL, 613, '0'),
(2, 205, 1, NULL, 614, '0'),
(192, 205, 2, NULL, 615, '1'),
(1, 206, 0, NULL, 616, '0'),
(2, 206, 1, NULL, 617, '0'),
(192, 206, 2, NULL, 618, '1'),
(1, 207, 0, NULL, 619, '0'),
(2, 207, 1, NULL, 620, '0'),
(192, 207, 2, NULL, 621, '1'),
(1, 208, 0, NULL, 622, '0'),
(2, 208, 1, NULL, 623, '0'),
(192, 208, 2, NULL, 624, '1'),
(1, 209, 0, NULL, 625, '0'),
(2, 209, 1, NULL, 626, '0'),
(192, 209, 2, NULL, 627, '1'),
(1, 210, 0, NULL, 628, '0'),
(2, 210, 1, NULL, 629, '0'),
(192, 210, 2, NULL, 630, '1'),
(1, 211, 0, NULL, 631, '0'),
(2, 211, 1, NULL, 632, '0'),
(192, 211, 2, NULL, 633, '1'),
(1, 212, 0, NULL, 634, '0'),
(2, 212, 1, NULL, 635, '0'),
(192, 212, 2, NULL, 636, '1'),
(1, 213, 0, NULL, 637, '0'),
(2, 213, 1, NULL, 638, '0'),
(192, 213, 2, NULL, 639, '1'),
(1, 214, 0, NULL, 640, '0'),
(2, 214, 1, NULL, 641, '0'),
(192, 214, 2, NULL, 642, '1'),
(1, 215, 0, NULL, 643, '0'),
(2, 215, 1, NULL, 644, '0'),
(192, 215, 2, NULL, 645, '1'),
(1, 216, 0, NULL, 646, '0'),
(2, 216, 1, NULL, 647, '0'),
(192, 216, 2, NULL, 648, '1'),
(1, 217, 0, NULL, 649, '0'),
(2, 217, 1, NULL, 650, '0'),
(192, 217, 2, NULL, 651, '1'),
(1, 218, 0, NULL, 652, '0'),
(2, 218, 1, NULL, 653, '0'),
(192, 218, 2, NULL, 654, '1'),
(1, 219, 0, NULL, 655, '0'),
(2, 219, 1, NULL, 656, '0'),
(192, 219, 2, NULL, 657, '1'),
(1, 220, 0, NULL, 658, '0'),
(2, 220, 1, NULL, 659, '0'),
(192, 220, 2, NULL, 660, '1'),
(1, 221, 0, NULL, 661, '0'),
(2, 221, 1, NULL, 662, '0'),
(192, 221, 2, NULL, 663, '1'),
(1, 222, 0, NULL, 664, '0'),
(2, 222, 1, NULL, 665, '0'),
(192, 222, 2, NULL, 666, '1'),
(1, 223, 0, NULL, 667, '0'),
(2, 223, 1, NULL, 668, '0'),
(192, 223, 2, NULL, 669, '1'),
(1, 224, 0, NULL, 670, '0'),
(2, 224, 1, NULL, 671, '0'),
(192, 224, 2, NULL, 672, '1'),
(1, 225, 0, NULL, 673, '0'),
(2, 225, 1, NULL, 674, '0'),
(192, 225, 2, NULL, 675, '1'),
(1, 226, 0, NULL, 676, '0'),
(2, 226, 1, NULL, 677, '0'),
(192, 226, 2, NULL, 678, '1'),
(1, 227, 0, NULL, 679, '0'),
(2, 227, 1, NULL, 680, '0'),
(192, 227, 2, NULL, 681, '1'),
(1, 228, 0, NULL, 682, '0'),
(2, 228, 1, NULL, 683, '0'),
(192, 228, 2, NULL, 684, '1'),
(1, 229, 0, NULL, 685, '0'),
(2, 229, 1, NULL, 686, '0'),
(192, 229, 2, NULL, 687, '1'),
(1, 230, 0, NULL, 688, '0'),
(2, 230, 1, NULL, 689, '0'),
(192, 230, 2, NULL, 690, '1'),
(1, 231, 0, NULL, 691, '0'),
(2, 231, 1, NULL, 692, '0'),
(192, 231, 2, NULL, 693, '1'),
(1, 232, 0, NULL, 694, '0'),
(2, 232, 1, NULL, 695, '0'),
(192, 232, 2, NULL, 696, '1'),
(1, 233, 0, NULL, 697, '0'),
(2, 233, 1, NULL, 698, '0'),
(192, 233, 2, NULL, 699, '1'),
(1, 234, 0, NULL, 700, '0'),
(2, 234, 1, NULL, 701, '0'),
(192, 234, 2, NULL, 702, '1'),
(1, 235, 0, NULL, 703, '0'),
(2, 235, 1, NULL, 704, '0'),
(192, 235, 2, NULL, 705, '1'),
(1, 236, 0, NULL, 706, '0'),
(2, 236, 1, NULL, 707, '0'),
(192, 236, 2, NULL, 708, '1'),
(1, 237, 0, NULL, 709, '0'),
(2, 237, 1, NULL, 710, '0'),
(192, 237, 2, NULL, 711, '1'),
(1, 238, 0, NULL, 712, '0'),
(2, 238, 1, NULL, 713, '0'),
(192, 238, 2, NULL, 714, '1'),
(1, 239, 0, NULL, 715, '0'),
(2, 239, 1, NULL, 716, '0'),
(192, 239, 2, NULL, 717, '1'),
(1, 240, 0, NULL, 718, '0'),
(2, 240, 1, NULL, 719, '0'),
(192, 240, 2, NULL, 720, '1'),
(1, 241, 0, NULL, 721, '0'),
(2, 241, 1, NULL, 722, '0'),
(192, 241, 2, NULL, 723, '1'),
(1, 242, 0, NULL, 724, '0'),
(2, 242, 1, NULL, 725, '0'),
(192, 242, 2, NULL, 726, '1'),
(1, 243, 0, NULL, 727, '0'),
(2, 243, 1, NULL, 728, '0'),
(192, 243, 2, NULL, 729, '1'),
(1, 244, 0, NULL, 730, '0'),
(2, 244, 1, NULL, 731, '0'),
(192, 244, 2, NULL, 732, '1'),
(1, 245, 0, NULL, 733, '0'),
(2, 245, 1, NULL, 734, '0'),
(192, 245, 2, NULL, 735, '1'),
(1, 246, 0, NULL, 736, '0'),
(2, 246, 1, NULL, 737, '0'),
(192, 246, 2, NULL, 738, '1'),
(1, 247, 0, NULL, 739, '0'),
(2, 247, 1, NULL, 740, '0'),
(192, 247, 2, NULL, 741, '1'),
(1, 248, 0, NULL, 742, '0'),
(2, 248, 1, NULL, 743, '0'),
(192, 248, 2, NULL, 744, '1'),
(1, 249, 0, NULL, 745, '0'),
(2, 249, 1, NULL, 746, '0'),
(192, 249, 2, NULL, 747, '1'),
(1, 250, 0, NULL, 748, '0'),
(2, 250, 1, NULL, 749, '0'),
(192, 250, 2, NULL, 750, '1'),
(1, 251, 0, NULL, 751, '0'),
(2, 251, 1, NULL, 752, '0'),
(192, 251, 2, NULL, 753, '1'),
(1, 252, 0, NULL, 754, '0'),
(2, 252, 1, NULL, 755, '0'),
(192, 252, 2, NULL, 756, '1'),
(1, 253, 0, NULL, 757, '0'),
(2, 253, 1, NULL, 758, '0'),
(192, 253, 2, NULL, 759, '1'),
(1, 254, 0, NULL, 760, '0'),
(2, 254, 1, NULL, 761, '0'),
(192, 254, 2, NULL, 762, '1'),
(1, 255, 0, NULL, 763, '0'),
(2, 255, 1, NULL, 764, '0'),
(192, 255, 2, NULL, 765, '1'),
(1, 256, 0, NULL, 766, '0'),
(2, 256, 1, NULL, 767, '0'),
(192, 256, 2, NULL, 768, '1'),
(1, 257, 0, NULL, 769, '0'),
(2, 257, 1, NULL, 770, '0'),
(192, 257, 2, NULL, 771, '1'),
(1, 258, 0, NULL, 772, '0'),
(2, 258, 1, NULL, 773, '0'),
(192, 258, 2, NULL, 774, '1'),
(1, 259, 0, NULL, 775, '0'),
(2, 259, 1, NULL, 776, '0'),
(192, 259, 2, NULL, 777, '1'),
(1, 260, 0, NULL, 778, '0'),
(2, 260, 1, NULL, 779, '0'),
(192, 260, 2, NULL, 780, '1'),
(1, 261, 0, NULL, 781, '0'),
(2, 261, 1, NULL, 782, '0'),
(192, 261, 2, NULL, 783, '1'),
(1, 262, 0, NULL, 784, '0'),
(2, 262, 1, NULL, 785, '0'),
(192, 262, 2, NULL, 786, '1'),
(1, 263, 0, NULL, 787, '0'),
(2, 263, 1, NULL, 788, '0'),
(192, 263, 2, NULL, 789, '1'),
(1, 264, 0, NULL, 790, '0'),
(2, 264, 1, NULL, 791, '0'),
(192, 264, 2, NULL, 792, '1'),
(1, 265, 0, NULL, 793, '0'),
(2, 265, 1, NULL, 794, '0'),
(192, 265, 2, NULL, 795, '1'),
(1, 266, 0, NULL, 796, '0'),
(2, 266, 1, NULL, 797, '0'),
(192, 266, 2, NULL, 798, '1'),
(1, 267, 0, NULL, 799, '0'),
(2, 267, 1, NULL, 800, '0'),
(192, 267, 2, NULL, 801, '1'),
(1, 268, 0, NULL, 802, '0'),
(2, 268, 1, NULL, 803, '0'),
(192, 268, 2, NULL, 804, '1'),
(1, 269, 0, NULL, 805, '0'),
(2, 269, 1, NULL, 806, '0'),
(192, 269, 2, NULL, 807, '1'),
(1, 270, 0, NULL, 808, '0'),
(2, 270, 1, NULL, 809, '0'),
(192, 270, 2, NULL, 810, '1'),
(1, 271, 0, NULL, 811, '0'),
(2, 271, 1, NULL, 812, '0'),
(192, 271, 2, NULL, 813, '1'),
(1, 272, 0, NULL, 814, '0'),
(2, 272, 1, NULL, 815, '0'),
(192, 272, 2, NULL, 816, '1'),
(1, 273, 0, NULL, 817, '0'),
(2, 273, 1, NULL, 818, '0'),
(192, 273, 2, NULL, 819, '1'),
(1, 274, 0, NULL, 820, '0'),
(2, 274, 1, NULL, 821, '0'),
(192, 274, 2, NULL, 822, '1'),
(1, 275, 0, NULL, 823, '0'),
(2, 275, 1, NULL, 824, '0'),
(192, 275, 2, NULL, 825, '1'),
(1, 276, 0, NULL, 826, '0'),
(2, 276, 1, NULL, 827, '0'),
(192, 276, 2, NULL, 828, '1'),
(1, 277, 0, NULL, 829, '0'),
(2, 277, 1, NULL, 830, '0'),
(192, 277, 2, NULL, 831, '1'),
(1, 278, 0, NULL, 832, '0'),
(2, 278, 1, NULL, 833, '0'),
(192, 278, 2, NULL, 834, '1'),
(1, 279, 0, NULL, 835, '0'),
(2, 279, 1, NULL, 836, '0'),
(192, 279, 2, NULL, 837, '1'),
(1, 280, 0, NULL, 838, '0'),
(2, 280, 1, NULL, 839, '0'),
(192, 280, 2, NULL, 840, '1'),
(1, 281, 0, NULL, 841, '0'),
(2, 281, 1, NULL, 842, '0'),
(192, 281, 2, NULL, 843, '1'),
(1, 282, 0, NULL, 844, '0'),
(2, 282, 1, NULL, 845, '0'),
(192, 282, 2, NULL, 846, '1'),
(1, 283, 0, NULL, 847, '0'),
(2, 283, 1, NULL, 848, '0'),
(192, 283, 2, NULL, 849, '1'),
(1, 284, 0, NULL, 850, '0'),
(2, 284, 1, NULL, 851, '0'),
(192, 284, 2, NULL, 852, '1'),
(1, 285, 0, NULL, 853, '0'),
(2, 285, 1, NULL, 854, '0'),
(192, 285, 2, NULL, 855, '1'),
(1, 286, 0, NULL, 856, '0'),
(2, 286, 1, NULL, 857, '0'),
(192, 286, 2, NULL, 858, '1'),
(1, 287, 0, NULL, 859, '0'),
(2, 287, 1, NULL, 860, '0'),
(192, 287, 2, NULL, 861, '1'),
(1, 288, 0, NULL, 862, '0'),
(2, 288, 1, NULL, 863, '0'),
(192, 288, 2, NULL, 864, '1'),
(1, 289, 0, NULL, 865, '0'),
(2, 289, 1, NULL, 866, '0'),
(192, 289, 2, NULL, 867, '1'),
(1, 290, 0, NULL, 868, '0'),
(2, 290, 1, NULL, 869, '0'),
(192, 290, 2, NULL, 870, '1'),
(1, 291, 0, NULL, 871, '0'),
(2, 291, 1, NULL, 872, '0'),
(192, 291, 2, NULL, 873, '1'),
(1, 292, 0, NULL, 874, '0'),
(2, 292, 1, NULL, 875, '0'),
(192, 292, 2, NULL, 876, '1'),
(1, 293, 0, NULL, 877, '0'),
(2, 293, 1, NULL, 878, '0'),
(192, 293, 2, NULL, 879, '1'),
(1, 294, 0, NULL, 880, '0'),
(2, 294, 1, NULL, 881, '0'),
(192, 294, 2, NULL, 882, '1'),
(1, 295, 0, NULL, 883, '0'),
(2, 295, 1, NULL, 884, '0'),
(192, 295, 2, NULL, 885, '1'),
(1, 296, 0, NULL, 886, '0'),
(2, 296, 1, NULL, 887, '0'),
(192, 296, 2, NULL, 888, '1'),
(1, 297, 0, NULL, 889, '0'),
(2, 297, 1, NULL, 890, '0'),
(192, 297, 2, NULL, 891, '1'),
(1, 298, 0, NULL, 892, '0'),
(2, 298, 1, NULL, 893, '0'),
(192, 298, 2, NULL, 894, '1'),
(1, 299, 0, NULL, 895, '0'),
(2, 299, 1, NULL, 896, '0'),
(192, 299, 2, NULL, 897, '1'),
(1, 300, 0, NULL, 898, '0'),
(2, 300, 1, NULL, 899, '0'),
(192, 300, 2, NULL, 900, '1'),
(1, 301, 0, NULL, 901, '0'),
(2, 301, 1, NULL, 902, '0'),
(192, 301, 2, NULL, 903, '1'),
(1, 302, 0, NULL, 904, '0'),
(2, 302, 1, NULL, 905, '0'),
(192, 302, 2, NULL, 906, '1'),
(1, 303, 0, NULL, 907, '0'),
(2, 303, 1, NULL, 908, '0'),
(192, 303, 2, NULL, 909, '1'),
(1, 304, 0, NULL, 910, '0'),
(2, 304, 1, NULL, 911, '0'),
(192, 304, 2, NULL, 912, '1'),
(1, 305, 0, NULL, 913, '0'),
(2, 305, 1, NULL, 914, '0'),
(192, 305, 2, NULL, 915, '1'),
(1, 306, 0, NULL, 916, '0'),
(2, 306, 1, NULL, 917, '0'),
(192, 306, 2, NULL, 918, '1'),
(1, 307, 0, NULL, 919, '0'),
(2, 307, 1, NULL, 920, '0'),
(192, 307, 2, NULL, 921, '1'),
(1, 308, 0, NULL, 922, '0'),
(2, 308, 1, NULL, 923, '0'),
(192, 308, 2, NULL, 924, '1'),
(1, 309, 0, NULL, 925, '0'),
(2, 309, 1, NULL, 926, '0'),
(192, 309, 2, NULL, 927, '1'),
(1, 310, 0, NULL, 928, '0'),
(2, 310, 1, NULL, 929, '0'),
(192, 310, 2, NULL, 930, '1'),
(1, 311, 0, NULL, 931, '0'),
(2, 311, 1, NULL, 932, '0'),
(192, 311, 2, NULL, 933, '1'),
(1, 312, 0, NULL, 934, '0'),
(2, 312, 1, NULL, 935, '0'),
(192, 312, 2, NULL, 936, '1'),
(1, 313, 0, NULL, 937, '0'),
(2, 313, 1, NULL, 938, '0'),
(192, 313, 2, NULL, 939, '1'),
(1, 314, 0, NULL, 940, '0'),
(2, 314, 1, NULL, 941, '0'),
(192, 314, 2, NULL, 942, '1'),
(1, 315, 0, NULL, 943, '0'),
(2, 315, 1, NULL, 944, '0'),
(192, 315, 2, NULL, 945, '1'),
(1, 316, 0, NULL, 946, '0'),
(2, 316, 1, NULL, 947, '0'),
(192, 316, 2, NULL, 948, '1'),
(1, 317, 0, NULL, 949, '0'),
(2, 317, 1, NULL, 950, '0'),
(192, 317, 2, NULL, 951, '1'),
(1, 318, 0, NULL, 952, '0'),
(2, 318, 1, NULL, 953, '0'),
(192, 318, 2, NULL, 954, '1'),
(1, 319, 0, NULL, 955, '0'),
(2, 319, 1, NULL, 956, '0'),
(192, 319, 2, NULL, 957, '1'),
(1, 320, 0, NULL, 958, '0'),
(2, 320, 1, NULL, 959, '0'),
(192, 320, 2, NULL, 960, '1'),
(1, 321, 0, NULL, 961, '0'),
(2, 321, 1, NULL, 962, '0'),
(192, 321, 2, NULL, 963, '1'),
(1, 322, 0, NULL, 964, '0'),
(2, 322, 1, NULL, 965, '0'),
(192, 322, 2, NULL, 966, '1'),
(1, 323, 0, NULL, 967, '0'),
(2, 323, 1, NULL, 968, '0'),
(192, 323, 2, NULL, 969, '1'),
(1, 324, 0, NULL, 970, '0'),
(2, 324, 1, NULL, 971, '0'),
(192, 324, 2, NULL, 972, '1'),
(1, 325, 0, NULL, 973, '0'),
(2, 325, 1, NULL, 974, '0'),
(192, 325, 2, NULL, 975, '1'),
(1, 326, 0, NULL, 976, '0'),
(2, 326, 1, NULL, 977, '0'),
(192, 326, 2, NULL, 978, '1'),
(1, 327, 0, NULL, 979, '0'),
(2, 327, 1, NULL, 980, '0'),
(192, 327, 2, NULL, 981, '1'),
(1, 328, 0, NULL, 982, '0'),
(2, 328, 1, NULL, 983, '0'),
(192, 328, 2, NULL, 984, '1'),
(1, 329, 0, NULL, 985, '0'),
(2, 329, 1, NULL, 986, '0'),
(192, 329, 2, NULL, 987, '1'),
(1, 330, 0, NULL, 988, '0'),
(2, 330, 1, NULL, 989, '0'),
(192, 330, 2, NULL, 990, '1'),
(1, 331, 0, NULL, 991, '0'),
(2, 331, 1, NULL, 992, '0'),
(192, 331, 2, NULL, 993, '1'),
(1, 332, 0, NULL, 994, '0'),
(2, 332, 1, NULL, 995, '0'),
(192, 332, 2, NULL, 996, '1'),
(1, 333, 0, NULL, 997, '0'),
(2, 333, 1, NULL, 998, '0'),
(192, 333, 2, NULL, 999, '1'),
(1, 334, 0, NULL, 1000, '0'),
(2, 334, 1, NULL, 1001, '0'),
(192, 334, 2, NULL, 1002, '1'),
(1, 335, 0, NULL, 1003, '0'),
(2, 335, 1, NULL, 1004, '0'),
(192, 335, 2, NULL, 1005, '1'),
(1, 336, 0, NULL, 1006, '0'),
(2, 336, 1, NULL, 1007, '0'),
(192, 336, 2, NULL, 1008, '1'),
(1, 337, 0, NULL, 1009, '0'),
(2, 337, 1, NULL, 1010, '0'),
(192, 337, 2, NULL, 1011, '1'),
(1, 338, 0, NULL, 1012, '0'),
(2, 338, 1, NULL, 1013, '0'),
(192, 338, 2, NULL, 1014, '1'),
(1, 339, 0, NULL, 1015, '0'),
(2, 339, 1, NULL, 1016, '0'),
(192, 339, 2, NULL, 1017, '1'),
(1, 340, 0, NULL, 1018, '0'),
(2, 340, 1, NULL, 1019, '0'),
(192, 340, 2, NULL, 1020, '1'),
(1, 341, 0, NULL, 1021, '0'),
(2, 341, 1, NULL, 1022, '0'),
(192, 341, 2, NULL, 1023, '1'),
(1, 342, 0, NULL, 1024, '0'),
(2, 342, 1, NULL, 1025, '0'),
(192, 342, 2, NULL, 1026, '1'),
(1, 343, 0, NULL, 1027, '0'),
(2, 343, 1, NULL, 1028, '0'),
(192, 343, 2, NULL, 1029, '1'),
(1, 344, 0, NULL, 1030, '0'),
(2, 344, 1, NULL, 1031, '0'),
(192, 344, 2, NULL, 1032, '1'),
(1, 345, 0, NULL, 1033, '0'),
(2, 345, 1, NULL, 1034, '0'),
(192, 345, 2, NULL, 1035, '1'),
(1, 346, 0, NULL, 1036, '0'),
(2, 346, 1, NULL, 1037, '0'),
(192, 346, 2, NULL, 1038, '1'),
(1, 347, 0, NULL, 1039, '0'),
(2, 347, 1, NULL, 1040, '0'),
(192, 347, 2, NULL, 1041, '1'),
(1, 348, 0, NULL, 1042, '0'),
(2, 348, 1, NULL, 1043, '0'),
(192, 348, 2, NULL, 1044, '1'),
(1, 349, 0, NULL, 1045, '0'),
(2, 349, 1, NULL, 1046, '0'),
(192, 349, 2, NULL, 1047, '1'),
(1, 350, 0, NULL, 1048, '0'),
(2, 350, 1, NULL, 1049, '0'),
(192, 350, 2, NULL, 1050, '1'),
(1, 351, 0, NULL, 1051, '0'),
(2, 351, 1, NULL, 1052, '0'),
(192, 351, 2, NULL, 1053, '1'),
(1, 352, 0, NULL, 1054, '0'),
(2, 352, 1, NULL, 1055, '0'),
(192, 352, 2, NULL, 1056, '1'),
(1, 353, 0, NULL, 1057, '0'),
(2, 353, 1, NULL, 1058, '0'),
(192, 353, 2, NULL, 1059, '1'),
(1, 354, 0, NULL, 1060, '0'),
(2, 354, 1, NULL, 1061, '0'),
(192, 354, 2, NULL, 1062, '1'),
(1, 355, 0, NULL, 1063, '0'),
(2, 355, 1, NULL, 1064, '0'),
(192, 355, 2, NULL, 1065, '1'),
(1, 356, 0, NULL, 1066, '0'),
(2, 356, 1, NULL, 1067, '0'),
(192, 356, 2, NULL, 1068, '1'),
(1, 357, 0, NULL, 1069, '0'),
(2, 357, 1, NULL, 1070, '0'),
(192, 357, 2, NULL, 1071, '1'),
(1, 358, 0, NULL, 1072, '0'),
(2, 358, 1, NULL, 1073, '0'),
(192, 358, 2, NULL, 1074, '1'),
(1, 359, 0, NULL, 1075, '0'),
(2, 359, 1, NULL, 1076, '0'),
(192, 359, 2, NULL, 1077, '1'),
(1, 360, 0, NULL, 1078, '0'),
(2, 360, 1, NULL, 1079, '0'),
(192, 360, 2, NULL, 1080, '1'),
(1, 361, 0, NULL, 1081, '0'),
(2, 361, 1, NULL, 1082, '0'),
(192, 361, 2, NULL, 1083, '1'),
(1, 362, 0, NULL, 1084, '0'),
(2, 362, 1, NULL, 1085, '0'),
(192, 362, 2, NULL, 1086, '1'),
(1, 363, 0, NULL, 1087, '0'),
(2, 363, 1, NULL, 1088, '0'),
(192, 363, 2, NULL, 1089, '1'),
(1, 364, 0, NULL, 1090, '0'),
(2, 364, 1, NULL, 1091, '0'),
(192, 364, 2, NULL, 1092, '1'),
(1, 365, 0, NULL, 1093, '0'),
(2, 365, 1, NULL, 1094, '0'),
(192, 365, 2, NULL, 1095, '1'),
(1, 366, 0, NULL, 1096, '0'),
(2, 366, 1, NULL, 1097, '0'),
(192, 366, 2, NULL, 1098, '1'),
(1, 367, 0, NULL, 1099, '0'),
(2, 367, 1, NULL, 1100, '0'),
(192, 367, 2, NULL, 1101, '1'),
(1, 368, 0, NULL, 1102, '0'),
(2, 368, 1, NULL, 1103, '0'),
(192, 368, 2, NULL, 1104, '1'),
(1, 369, 0, NULL, 1105, '0'),
(2, 369, 1, NULL, 1106, '0'),
(192, 369, 2, NULL, 1107, '1'),
(1, 370, 0, NULL, 1108, '0'),
(2, 370, 1, NULL, 1109, '0'),
(192, 370, 2, NULL, 1110, '1'),
(1, 371, 0, NULL, 1111, '0'),
(2, 371, 1, NULL, 1112, '0'),
(192, 371, 2, NULL, 1113, '1'),
(1, 372, 0, NULL, 1114, '0'),
(2, 372, 1, NULL, 1115, '0'),
(192, 372, 2, NULL, 1116, '1'),
(1, 373, 0, NULL, 1117, '0'),
(2, 373, 1, NULL, 1118, '0'),
(192, 373, 2, NULL, 1119, '1'),
(1, 374, 0, NULL, 1120, '0'),
(2, 374, 1, NULL, 1121, '0'),
(192, 374, 2, NULL, 1122, '1'),
(1, 375, 0, NULL, 1123, '0'),
(2, 375, 1, NULL, 1124, '0'),
(192, 375, 2, NULL, 1125, '1'),
(1, 376, 0, NULL, 1126, '0'),
(2, 376, 1, NULL, 1127, '0'),
(192, 376, 2, NULL, 1128, '1'),
(1, 377, 0, NULL, 1129, '0'),
(2, 377, 1, NULL, 1130, '0'),
(192, 377, 2, NULL, 1131, '1'),
(1, 378, 0, NULL, 1132, '0'),
(2, 378, 1, NULL, 1133, '0'),
(192, 378, 2, NULL, 1134, '1'),
(1, 379, 0, NULL, 1135, '0'),
(2, 379, 1, NULL, 1136, '0'),
(192, 379, 2, NULL, 1137, '1'),
(1, 380, 0, NULL, 1138, '0'),
(2, 380, 1, NULL, 1139, '0'),
(192, 380, 2, NULL, 1140, '1'),
(1, 381, 0, NULL, 1141, '0'),
(2, 381, 1, NULL, 1142, '0'),
(192, 381, 2, NULL, 1143, '1'),
(1, 382, 0, NULL, 1144, '0'),
(2, 382, 1, NULL, 1145, '0'),
(192, 382, 2, NULL, 1146, '1'),
(1, 383, 0, NULL, 1147, '0'),
(2, 383, 1, NULL, 1148, '0'),
(192, 383, 2, NULL, 1149, '1'),
(1, 384, 0, NULL, 1150, '0'),
(2, 384, 1, NULL, 1151, '0'),
(192, 384, 2, NULL, 1152, '1'),
(1, 385, 0, NULL, 1153, '0'),
(2, 385, 1, NULL, 1154, '0'),
(192, 385, 2, NULL, 1155, '1'),
(1, 386, 0, NULL, 1156, '0'),
(2, 386, 1, NULL, 1157, '0'),
(192, 386, 2, NULL, 1158, '1'),
(1, 387, 0, NULL, 1159, '0'),
(2, 387, 1, NULL, 1160, '0'),
(192, 387, 2, NULL, 1161, '1'),
(1, 388, 0, NULL, 1162, '0'),
(2, 388, 1, NULL, 1163, '0'),
(192, 388, 2, NULL, 1164, '1'),
(1, 389, 0, NULL, 1165, '0'),
(2, 389, 1, NULL, 1166, '0'),
(192, 389, 2, NULL, 1167, '1'),
(1, 390, 0, NULL, 1168, '0'),
(2, 390, 1, NULL, 1169, '0'),
(192, 390, 2, NULL, 1170, '1'),
(1, 391, 0, NULL, 1171, '0'),
(2, 391, 1, NULL, 1172, '0'),
(192, 391, 2, NULL, 1173, '1'),
(1, 392, 0, NULL, 1174, '0'),
(2, 392, 1, NULL, 1175, '0'),
(192, 392, 2, NULL, 1176, '1'),
(1, 393, 0, NULL, 1177, '0'),
(2, 393, 1, NULL, 1178, '0'),
(192, 393, 2, NULL, 1179, '1'),
(1, 394, 0, NULL, 1180, '0'),
(2, 394, 1, NULL, 1181, '0'),
(192, 394, 2, NULL, 1182, '1'),
(1, 395, 0, NULL, 1183, '0'),
(2, 395, 1, NULL, 1184, '0'),
(192, 395, 2, NULL, 1185, '1'),
(1, 396, 0, NULL, 1186, '0'),
(2, 396, 1, NULL, 1187, '0'),
(192, 396, 2, NULL, 1188, '1'),
(1, 397, 0, NULL, 1189, '0'),
(2, 397, 1, NULL, 1190, '0'),
(192, 397, 2, NULL, 1191, '1'),
(1, 398, 0, NULL, 1192, '0'),
(2, 398, 1, NULL, 1193, '0'),
(192, 398, 2, NULL, 1194, '1'),
(1, 399, 0, NULL, 1195, '0'),
(2, 399, 1, NULL, 1196, '0'),
(192, 399, 2, NULL, 1197, '1'),
(1, 400, 0, NULL, 1198, '0'),
(2, 400, 1, NULL, 1199, '0'),
(192, 400, 2, NULL, 1200, '1'),
(1, 401, 0, NULL, 1201, '0'),
(2, 401, 1, NULL, 1202, '0'),
(192, 401, 2, NULL, 1203, '1'),
(1, 402, 0, NULL, 1204, '0'),
(2, 402, 1, NULL, 1205, '0'),
(192, 402, 2, NULL, 1206, '1'),
(1, 403, 0, NULL, 1207, '0'),
(2, 403, 1, NULL, 1208, '0'),
(192, 403, 2, NULL, 1209, '1'),
(1, 404, 0, NULL, 1210, '0'),
(2, 404, 1, NULL, 1211, '0'),
(192, 404, 2, NULL, 1212, '1'),
(1, 405, 0, NULL, 1213, '0'),
(2, 405, 1, NULL, 1214, '0'),
(192, 405, 2, NULL, 1215, '1'),
(1, 406, 0, NULL, 1216, '0'),
(2, 406, 1, NULL, 1217, '0'),
(192, 406, 2, NULL, 1218, '1'),
(1, 407, 0, NULL, 1219, '0'),
(2, 407, 1, NULL, 1220, '0'),
(192, 407, 2, NULL, 1221, '1'),
(1, 408, 0, NULL, 1222, '0'),
(2, 408, 1, NULL, 1223, '0'),
(192, 408, 2, NULL, 1224, '1'),
(1, 409, 0, NULL, 1225, '0'),
(2, 409, 1, NULL, 1226, '0'),
(192, 409, 2, NULL, 1227, '1'),
(1, 410, 0, NULL, 1228, '0'),
(2, 410, 1, NULL, 1229, '0'),
(192, 410, 2, NULL, 1230, '1'),
(1, 411, 0, NULL, 1231, '0'),
(2, 411, 1, NULL, 1232, '0'),
(192, 411, 2, NULL, 1233, '1'),
(1, 412, 0, NULL, 1234, '0'),
(2, 412, 1, NULL, 1235, '0'),
(192, 412, 2, NULL, 1236, '1'),
(1, 413, 0, NULL, 1237, '0'),
(2, 413, 1, NULL, 1238, '0'),
(192, 413, 2, NULL, 1239, '1'),
(1, 414, 0, NULL, 1240, '0'),
(2, 414, 1, NULL, 1241, '0'),
(192, 414, 2, NULL, 1242, '1'),
(1, 415, 0, NULL, 1243, '0'),
(2, 415, 1, NULL, 1244, '0'),
(192, 415, 2, NULL, 1245, '1'),
(1, 416, 0, NULL, 1246, '0'),
(2, 416, 1, NULL, 1247, '0'),
(192, 416, 2, NULL, 1248, '1'),
(1, 417, 0, NULL, 1249, '0'),
(2, 417, 1, NULL, 1250, '0'),
(192, 417, 2, NULL, 1251, '1'),
(1, 418, 0, NULL, 1252, '0'),
(2, 418, 1, NULL, 1253, '0'),
(192, 418, 2, NULL, 1254, '1'),
(1, 419, 0, NULL, 1255, '0'),
(2, 419, 1, NULL, 1256, '0'),
(192, 419, 2, NULL, 1257, '1'),
(1, 420, 0, NULL, 1258, '0'),
(2, 420, 1, NULL, 1259, '0'),
(192, 420, 2, NULL, 1260, '1'),
(1, 421, 0, NULL, 1261, '0'),
(2, 421, 1, NULL, 1262, '0'),
(192, 421, 2, NULL, 1263, '1'),
(1, 422, 0, NULL, 1264, '0'),
(2, 422, 1, NULL, 1265, '0'),
(192, 422, 2, NULL, 1266, '1'),
(1, 423, 0, NULL, 1267, '0'),
(2, 423, 1, NULL, 1268, '0'),
(192, 423, 2, NULL, 1269, '1'),
(1, 424, 0, NULL, 1270, '0'),
(2, 424, 1, NULL, 1271, '0'),
(192, 424, 2, NULL, 1272, '1'),
(1, 425, 0, NULL, 1273, '0'),
(2, 425, 1, NULL, 1274, '0'),
(192, 425, 2, NULL, 1275, '1'),
(1, 426, 0, NULL, 1276, '0'),
(2, 426, 1, NULL, 1277, '0'),
(192, 426, 2, NULL, 1278, '1'),
(1, 427, 0, NULL, 1279, '0'),
(2, 427, 1, NULL, 1280, '0'),
(192, 427, 2, NULL, 1281, '1'),
(1, 428, 0, NULL, 1282, '0'),
(2, 428, 1, NULL, 1283, '0'),
(192, 428, 2, NULL, 1284, '1'),
(1, 429, 0, NULL, 1285, '0'),
(2, 429, 1, NULL, 1286, '0'),
(192, 429, 2, NULL, 1287, '1'),
(1, 430, 0, NULL, 1288, '0'),
(2, 430, 1, NULL, 1289, '0'),
(192, 430, 2, NULL, 1290, '1'),
(1, 431, 0, NULL, 1291, '0'),
(2, 431, 1, NULL, 1292, '0'),
(192, 431, 2, NULL, 1293, '1'),
(1, 432, 0, NULL, 1294, '0'),
(2, 432, 1, NULL, 1295, '0'),
(192, 432, 2, NULL, 1296, '1'),
(1, 433, 0, NULL, 1297, '0'),
(2, 433, 1, NULL, 1298, '0'),
(192, 433, 2, NULL, 1299, '1'),
(1, 434, 0, NULL, 1300, '0'),
(2, 434, 1, NULL, 1301, '0'),
(192, 434, 2, NULL, 1302, '1'),
(1, 435, 0, NULL, 1303, '0'),
(2, 435, 1, NULL, 1304, '0'),
(192, 435, 2, NULL, 1305, '1'),
(1, 436, 0, NULL, 1306, '0'),
(2, 436, 1, NULL, 1307, '0'),
(192, 436, 2, NULL, 1308, '1'),
(1, 437, 0, NULL, 1309, '0'),
(2, 437, 1, NULL, 1310, '0'),
(192, 437, 2, NULL, 1311, '1'),
(1, 438, 0, NULL, 1312, '0'),
(2, 438, 1, NULL, 1313, '0'),
(192, 438, 2, NULL, 1314, '1'),
(1, 439, 0, NULL, 1315, '0'),
(2, 439, 1, NULL, 1316, '0'),
(192, 439, 2, NULL, 1317, '1'),
(1, 440, 0, NULL, 1318, '0'),
(2, 440, 1, NULL, 1319, '0'),
(192, 440, 2, NULL, 1320, '1'),
(1, 441, 0, NULL, 1321, '0'),
(2, 441, 1, NULL, 1322, '0'),
(192, 441, 2, NULL, 1323, '1'),
(1, 442, 0, NULL, 1324, '0'),
(2, 442, 1, NULL, 1325, '0'),
(192, 442, 2, NULL, 1326, '1'),
(1, 443, 0, NULL, 1327, '0'),
(2, 443, 1, NULL, 1328, '0'),
(192, 443, 2, NULL, 1329, '1'),
(1, 444, 0, NULL, 1330, '0'),
(2, 444, 1, NULL, 1331, '0'),
(192, 444, 2, NULL, 1332, '1'),
(1, 445, 0, NULL, 1333, '0'),
(2, 445, 1, NULL, 1334, '0'),
(192, 445, 2, NULL, 1335, '1'),
(1, 446, 0, NULL, 1336, '0'),
(2, 446, 1, NULL, 1337, '0'),
(192, 446, 2, NULL, 1338, '1'),
(1, 447, 0, NULL, 1339, '0'),
(2, 447, 1, NULL, 1340, '0'),
(192, 447, 2, NULL, 1341, '1'),
(1, 448, 0, NULL, 1342, '0'),
(2, 448, 1, NULL, 1343, '0'),
(192, 448, 2, NULL, 1344, '1'),
(1, 449, 0, NULL, 1345, '0'),
(2, 449, 1, NULL, 1346, '0'),
(192, 449, 2, NULL, 1347, '1'),
(1, 450, 0, NULL, 1348, '0'),
(2, 450, 1, NULL, 1349, '0'),
(192, 450, 2, NULL, 1350, '1'),
(1, 451, 0, NULL, 1351, '0'),
(2, 451, 1, NULL, 1352, '0'),
(192, 451, 2, NULL, 1353, '1'),
(194, 7, 2, NULL, 1362, '1'),
(194, 1, 2, NULL, 1361, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accinsurance`
--
ALTER TABLE `accinsurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accperson`
--
ALTER TABLE `accperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addasset`
--
ALTER TABLE `addasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addperson`
--
ALTER TABLE `addperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulkdata`
--
ALTER TABLE `bulkdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captain`
--
ALTER TABLE `captain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `checktime`
--
ALTER TABLE `checktime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crmusers`
--
ALTER TABLE `crmusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK5CF8ACDD7C6208C3` (`latestPosition_id`);

--
-- Indexes for table `device_geo`
--
ALTER TABLE `device_geo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geofence`
--
ALTER TABLE `geofence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geofence_alerts_email_ids`
--
ALTER TABLE `geofence_alerts_email_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geofence_device`
--
ALTER TABLE `geofence_device`
  ADD PRIMARY KEY (`device_id`,`geofence_id`);

--
-- Indexes for table `geofence_email_history`
--
ALTER TABLE `geofence_email_history`
  ADD PRIMARY KEY (`geofence_email_history_id`);

--
-- Indexes for table `geofence_history`
--
ALTER TABLE `geofence_history`
  ADD PRIMARY KEY (`geofence_history_id`);

--
-- Indexes for table `geofence_points`
--
ALTER TABLE `geofence_points`
  ADD PRIMARY KEY (`geofence_points_id`);

--
-- Indexes for table `geofence_tracking`
--
ALTER TABLE `geofence_tracking`
  ADD PRIMARY KEY (`geofence_tracking_id`);

--
-- Indexes for table `geo_fence`
--
ALTER TABLE `geo_fence`
  ADD PRIMARY KEY (`gfid`);

--
-- Indexes for table `geo_tracking`
--
ALTER TABLE `geo_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gf_alarm`
--
ALTER TABLE `gf_alarm`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `group_log`
--
ALTER TABLE `group_log`
  ADD PRIMARY KEY (`group_log_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `maintainance`
--
ALTER TABLE `maintainance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poly_fence`
--
ALTER TABLE `poly_fence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK65C08C6ADB0C3B8A` (`device_id`),
  ADD KEY `positionsIndex` (`device_id`,`time`);

--
-- Indexes for table `products_h`
--
ALTER TABLE `products_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_family`
--
ALTER TABLE `product_family`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SUBJ_ID`);

--
-- Indexes for table `tc_devices`
--
ALTER TABLE `tc_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueid` (`uniqueid`),
  ADD KEY `fk_devices_groupid` (`groupid`);

--
-- Indexes for table `tc_users`
--
ALTER TABLE `tc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tc_user_device`
--
ALTER TABLE `tc_user_device`
  ADD KEY `fk_user_device_deviceid` (`deviceid`),
  ADD KEY `user_device_user_id` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK6A68E0862018CAA` (`userSettings_id`);

--
-- Indexes for table `users_devices`
--
ALTER TABLE `users_devices`
  ADD PRIMARY KEY (`users_devices_id`),
  ADD KEY `FK81E459A68294BA3` (`devices_id`),
  ADD KEY `FK81E459A6712480D` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accinsurance`
--
ALTER TABLE `accinsurance`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `accperson`
--
ALTER TABLE `accperson`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `addasset`
--
ALTER TABLE `addasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `addperson`
--
ALTER TABLE `addperson`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulkdata`
--
ALTER TABLE `bulkdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425330;

--
-- AUTO_INCREMENT for table `captain`
--
ALTER TABLE `captain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `crmusers`
--
ALTER TABLE `crmusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_geo`
--
ALTER TABLE `device_geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `geofence`
--
ALTER TABLE `geofence`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_alerts_email_ids`
--
ALTER TABLE `geofence_alerts_email_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_email_history`
--
ALTER TABLE `geofence_email_history`
  MODIFY `geofence_email_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_history`
--
ALTER TABLE `geofence_history`
  MODIFY `geofence_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_points`
--
ALTER TABLE `geofence_points`
  MODIFY `geofence_points_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_tracking`
--
ALTER TABLE `geofence_tracking`
  MODIFY `geofence_tracking_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geo_fence`
--
ALTER TABLE `geo_fence`
  MODIFY `gfid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geo_tracking`
--
ALTER TABLE `geo_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gf_alarm`
--
ALTER TABLE `gf_alarm`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_log`
--
ALTER TABLE `group_log`
  MODIFY `group_log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `maintainance`
--
ALTER TABLE `maintainance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poly_fence`
--
ALTER TABLE `poly_fence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(40) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_h`
--
ALTER TABLE `products_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_family`
--
ALTER TABLE `product_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1288;

--
-- AUTO_INCREMENT for table `tc_devices`
--
ALTER TABLE `tc_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `users_devices`
--
ALTER TABLE `users_devices`
  MODIFY `users_devices_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1363;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
