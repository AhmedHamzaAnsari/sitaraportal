-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 08:02 AM
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
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addform`
--

CREATE TABLE `addform` (
  `id_form` int(100) NOT NULL,
  `customRadioInline1` varchar(225) NOT NULL,
  `customRadioInline2` varchar(225) NOT NULL,
  `customCheck1` varchar(225) NOT NULL,
  `petrol` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `tank` varchar(225) NOT NULL,
  `slip` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `mode` varchar(225) NOT NULL,
  `fuel` varchar(225) NOT NULL,
  `qty` varchar(225) NOT NULL,
  `rate` varchar(225) NOT NULL,
  `meter` varchar(225) NOT NULL,
  `p1` varchar(225) NOT NULL,
  `p2` varchar(225) NOT NULL,
  `p3` varchar(225) NOT NULL,
  `p4` varchar(225) NOT NULL,
  `p5` varchar(225) NOT NULL,
  `p6` varchar(225) NOT NULL,
  `p7` varchar(225) NOT NULL,
  `p8` varchar(225) NOT NULL,
  `p9` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addform`
--

INSERT INTO `addform` (`id_form`, `customRadioInline1`, `customRadioInline2`, `customCheck1`, `petrol`, `city`, `tank`, `slip`, `date`, `mode`, `fuel`, `qty`, `rate`, `meter`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`) VALUES
(167, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', ''),
(169, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', ''),
(173, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', ''),
(177, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', ''),
(178, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', ''),
(179, 'on', 'on', 'on', 'PSO', 'Karachi', '5 gallon', '', '', 'PETROL', 'Diesel', '', '', ' ', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_data`
--

CREATE TABLE `add_data` (
  `id` int(100) NOT NULL,
  `trip_id` varchar(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `opr_cost_center` varchar(255) NOT NULL,
  `cost_center` varchar(255) NOT NULL,
  `dateTimeFlatpickr1` varchar(255) NOT NULL,
  `dateTimeFlatpickr2` varchar(255) NOT NULL,
  `dateTimeFlatpickr3` varchar(255) NOT NULL,
  `dateTimeFlatpickr4` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `client_ref` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `dateTimeFlatpickr` varchar(255) NOT NULL,
  `load2` varchar(255) NOT NULL,
  `empty` varchar(255) NOT NULL,
  `p_hour` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `loads` varchar(255) NOT NULL,
  `empty1` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `hour` varchar(255) NOT NULL,
  `load1` varchar(255) NOT NULL,
  `empty2` varchar(255) NOT NULL,
  `working` varchar(255) NOT NULL,
  `planned` varchar(255) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `diff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `basicinfo`
--

CREATE TABLE `basicinfo` (
  `id` int(100) NOT NULL,
  `e_code` varchar(255) NOT NULL,
  `a_code` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `h_date` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `l_no` varchar(255) NOT NULL,
  `expiry_on` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bank_ac` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `nic_no` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `exp_on` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basicinfo`
--

INSERT INTO `basicinfo` (`id`, `e_code`, `a_code`, `d_name`, `adress`, `h_date`, `dob`, `l_no`, `expiry_on`, `city`, `bank_ac`, `phone_no`, `cell_no`, `nic_no`, `vehicle`, `exp_on`, `desig`, `img`) VALUES
(124, '1', '', 'MURAD', '', '', '', '', '', '', '', '', '', '41409-8335639-1', '1-Mar-20', 'JU-1818', '', 0),
(125, '2', '', 'Afzal', '', '', '', '', '', '', '', '', '', '45201-4507427-5', '1-May-20', 'JU-2401', '', 0),
(126, '3', '', 'M.Amin', '', '', '', '', '', '', '', '', '', '45304-6435657-7', '1-Feb-20', 'JV-2034', '', 0),
(127, '4', '', 'Nadir Ali', '', '', '', '', '', '', '', '', '', '41203-6994317-7', '1-Oct-19', 'JV-1969', '', 0),
(128, '5', '', 'Barkat', '', '', '', '', '', '', '', '', '', '45304-4082849-9', '1-Jan-21', 'JV-1971', '', 0),
(129, '6', '', 'Akhtiyar', '', '', '', '', '', '', '', '', '', '43404-0347095-7', '1-Jun-20', 'JV-2029', '', 0),
(130, '7', '', 'Shabir', '', '', '', '', '', '', '', '', '', '43203-0279556-9', '1-Oct-19', 'TMA-829', '', 0),
(131, '8', '', 'Ghualm Rasool', '', '', '', '', '', '', '', '', '', '36103-0414980-5', '1-Feb-21', 'TMD-657', '', 0),
(132, '9', '', 'SOHAIL', '', '', '', '', '', '', '', '', '', '45203-1552183-9', '1-Jun-20', 'TMD-390', '', 0),
(133, '10', '', 'Wazeer', '', '', '', '', '', '', '', '', '', '41104-1674430-9', '1-Mar-20', 'TLK-056', '', 0),
(134, '11', '', 'Ehsan', '', '', '', '', '', '', '', '', '', '43301-0304293-5', '1-Sep-20', 'TLG-164', '', 0),
(135, '12', '', 'Jaffar', '', '', '', '', '', '', '', '', '', '45203-5535970-7', '1-Jun-19', 'TLK-060', '', 0),
(136, '13', '', 'Abdul Hayi', '', '', '', '', '', '', '', '', '', '36303-0952395-9', '1-Aug-19', 'TMA-600', '', 0),
(137, '14', '', 'Ali Baksh', '', '', '', '', '', '', '', '', '', '53204-1077707-7', '1-Apr-20', 'TMA-828', '', 0),
(138, '15', '', 'Yasir', '', '', '', '', '', '', '', '', '', '41702-0598857-5', '1-Aug-19', 'TMD-381', '', 0),
(139, '16', '', 'Ghulam Muhammad', '', '', '', '', '', '', '', '', '', '41409-1354140-3', '1-Dec-19', 'TMA-830', '', 0),
(140, '17', '', 'Munawar', '', '', '', '', '', '', '', '', '', '41506-0294079-1', '1-Apr-20', 'TMA-831', '', 0),
(141, '18', '', 'Bashir Ahmed', '', '', '', '', '', '', '', '', '', '43203-0497644-9', '1-Oct-19', 'TMA-839', '', 0),
(142, '19', '', 'Ayub', '', '', '', '', '', '', '', '', '', '45303-6594087-7', '1-Feb-20', 'TMA-840', '', 0),
(143, '20', '', 'Haroon', '', '', '', '', '', '', '', '', '', '21203-5022365-1', '28-May-20', 'TMA-841', '', 0),
(144, '21', '', 'Naseer', '', '', '', '', '', '', '', '', '', '42201-4908107-9', '1-Dec-19', 'TMB-246', '', 0),
(145, '22', '', 'Qamar', '', '', '', '', '', '', '', '', '', '44203-1497496-5', '1-May-20', 'TMB-247', '', 0),
(146, '23', '', 'Abdul Qadeer', '', '', '', '', '', '', '', '', '', '45304-3429799-1', '01-Mar', 'TMB-248', '', 0),
(147, '24', '', 'M.Zubair', '', '', '', '', '', '', '', '', '', '41401-1378532-1', '7-Mar-20', 'TMB-249', '', 0),
(148, '25', '', 'Zawar', '', '', '', '', '', '', '', '', '', '45208-7740254-9', '1-Mar-20', 'TMB-250', '', 0),
(149, '26', '', 'Nisar Khan', '', '', '', '', '', '', '', '', '', '21203-1307987-9', '1-Apr-20', 'TMD-316', '', 0),
(150, '27', '', 'Nisar', '', '', '', '', '', '', '', '', '', '45303-6049251-1', '1-Sep-20', 'TMD-318', '', 0),
(151, '28', '', 'Owais', '', '', '', '', '', '', '', '', '', '21203-5141820-5', '1-Jun-19', 'TMD-319', '', 0),
(152, '29', '', 'Aslam', '', '', '', '', '', '', '', '', '', '41401-1292597-9', '28-May-20', 'TMD-320', '', 0),
(153, '30', '', 'Mumtaz', '', '', '', '', '', '', '', '', '', '45304-7983490-1', '1-May-19', 'TMD-321', '', 0),
(154, '31', '', 'Ghaffar', '', '', '', '', '', '', '', '', '', '44203-4490669-9', '01-Oct', 'TMD-380', '', 0),
(155, '32', '', 'Ashraf', '', '', '', '', '', '', '', '', '', '41401-9606515-3', '1-Jan-20', 'Z-7968', '', 0),
(156, '33', '', 'Mashooq Ali', '', '', '', '', '', '', '', '', '', '45303-2899572-5', '01-Sep-20', 'TMD-391', '', 0),
(157, '34', '', 'Ghulam Rasool', '', '', '', '', '', '', '', '', '', '44201-3387972-1', '01-Aug-20', 'TMD-654', '', 0),
(158, '35', '', 'Nisar.', '', '', '', '', '', '', '', '', '', '45303-3520918-9', '01-Sep-20', 'JV-1968', '', 0),
(159, '36', '', 'Majid Hussain', '', '', '', '', '', '', '', '', '', '43403-0381621-1', '01-Oct-20', 'Z-7892', '', 0),
(160, '37', '', 'Naeem', '', '', '', '', '', '', '', '', '', '45304-9062424-3', '01-Oct-20', 'Z-7927', '', 0),
(161, '38', '', 'Samad Yaseen', '', '', '', '', '', '', '', '', '', '45304-3806089-5', '01-Aug-20', 'Z-7933', '', 0),
(162, '39', '', 'Yar Nabi', '', '', '', '', '', '', '', '', '', '21106-4923081-5', '01-Aug-20', 'Spare Driver', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bl_info`
--

CREATE TABLE `bl_info` (
  `int` int(100) NOT NULL,
  `bl_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `c_ref` varchar(255) NOT NULL,
  `consi` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `v_no` varchar(255) NOT NULL,
  `p_lod` varchar(255) NOT NULL,
  `p_dis` varchar(255) NOT NULL,
  `sr_no` varchar(255) NOT NULL,
  `con_no` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `kgs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bl_info`
--

INSERT INTO `bl_info` (`int`, `bl_no`, `date`, `c_ref`, `consi`, `vessel`, `v_no`, `p_lod`, `p_dis`, `sr_no`, `con_no`, `size`, `kgs`) VALUES
(1, '', '', '', '', '', '', '', '2020-09-04', '', '', '', ''),
(2, '2', '2', '2', '2', '2', '2', '22', '2020-09-04', '22', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cashsum`
--

CREATE TABLE `cashsum` (
  `id` int(100) NOT NULL,
  `adv` varchar(255) NOT NULL,
  `f_reciv` varchar(255) NOT NULL,
  `expence` varchar(255) NOT NULL,
  `f_setl` varchar(255) NOT NULL,
  `t_exp` varchar(255) NOT NULL,
  `f_by_cash` varchar(255) NOT NULL,
  `t_amount` varchar(255) NOT NULL,
  `n_amount` varchar(255) NOT NULL,
  `by_cash` varchar(255) NOT NULL,
  `by_salary` varchar(255) NOT NULL,
  `cash_paid` varchar(255) NOT NULL,
  `r_rr` varchar(255) NOT NULL,
  `r_cash` varchar(255) NOT NULL,
  `r_bill` varchar(255) NOT NULL,
  `r_cheq` varchar(255) NOT NULL,
  `l_fuel_exp` varchar(255) NOT NULL,
  `l_trip_exp` varchar(255) NOT NULL,
  `r_part_charg` varchar(255) NOT NULL,
  `ap_dep` varchar(255) NOT NULL,
  `ap_sal` varchar(255) NOT NULL,
  `p_exp` varchar(255) NOT NULL,
  `t_reve` varchar(255) NOT NULL,
  `total_exp` varbinary(255) NOT NULL,
  `p_l` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashsum`
--

INSERT INTO `cashsum` (`id`, `adv`, `f_reciv`, `expence`, `f_setl`, `t_exp`, `f_by_cash`, `t_amount`, `n_amount`, `by_cash`, `by_salary`, `cash_paid`, `r_rr`, `r_cash`, `r_bill`, `r_cheq`, `l_fuel_exp`, `l_trip_exp`, `r_part_charg`, `ap_dep`, `ap_sal`, `p_exp`, `t_reve`, `total_exp`, `p_l`) VALUES
(1, '399', '123', '12345', '1234', '234', '234', '2345', '234', '123', '123', '3456', '234', '1234', '234', '1234', '2134', '2345', '2345', '234', '234', '1234', '1234', 0x323334, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(100) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ntn` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `c_segment` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `c_name`, `type`, `address`, `ntn`, `phone`, `c_segment`, `dob`) VALUES
(179, 'Cherat ', 'Transportation ', '-', '-', '-', '', '28-May'),
(181, 'Amreli Steel', 'Transportation ', '-', '', '-', '', ''),
(196, 'Mughal ', 'Transportation ', '-', '-', '-', '', '28-May'),
(197, 'PPTC', 'Transportation ', '-', '-', '-', '', '28-May'),
(198, 'MICT', 'Transportation ', '-', '-', '-', '', '28-May'),
(199, 'AICT', 'Transportation ', '-', '-', '-', '', '28-May'),
(200, 'Supreme ', 'Transportation ', '-', '-', '-', '', '28-May'),
(201, 'Bay West', 'Transportation ', '-', '-', '-', '', '28-May'),
(202, 'Hapag Loydd', 'Transportation ', '-', '-', '-', '', '28-May'),
(203, 'Cherat ', 'Transportation ', '-', '-', '-', '', '28-May'),
(204, 'FF Steel', 'Transportation ', '-', '-', '-', '', '28-May'),
(205, 'Amreli Steel', 'Transportation ', '-', '-', '-', '', '28-May'),
(206, 'NLC ', 'Transportation ', '-', '-', '-', '', '28-May'),
(207, 'Naveena Steel', 'Transportation ', '-', '-', '-', '', '28-May'),
(208, 'OSL', 'Transportation ', '-', '-', '-', '', '28-May');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `trip_id` int(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `opr_cost_center` varchar(255) NOT NULL,
  `cost_center` varchar(255) NOT NULL,
  `dateTimeFlatpickr1` varchar(255) NOT NULL,
  `dateTimeFlatpickr2` varchar(255) NOT NULL,
  `dateTimeFlatpickr3` varchar(255) NOT NULL,
  `dateTimeFlatpickr4` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `client_ref` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `dateTimeFlatpickr` varchar(255) NOT NULL,
  `load2` varchar(255) NOT NULL,
  `empty` varchar(255) NOT NULL,
  `p_hour` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `loads` varchar(255) NOT NULL,
  `empty1` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `hour` varchar(255) NOT NULL,
  `load1` varchar(255) NOT NULL,
  `empty2` varchar(255) NOT NULL,
  `planned` varchar(255) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `diff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`trip_id`, `start_location`, `opr_cost_center`, `cost_center`, `dateTimeFlatpickr1`, `dateTimeFlatpickr2`, `dateTimeFlatpickr3`, `dateTimeFlatpickr4`, `vehicle_type`, `vehicle_id`, `type`, `sub_type`, `client_ref`, `supervisor`, `owner`, `client`, `dateTimeFlatpickr`, `load2`, `empty`, `p_hour`, `capacity`, `loads`, `empty1`, `total`, `hour`, `load1`, `empty2`, `planned`, `actual`, `diff`) VALUES
(1, 'q1', '1', '1', '1', '2020-09-04', '1', '1', '1', 1, '1', '1', '1', 'Supervisor', '1', '1', '1', '1', '1', '', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1'),
(0, '', '', '', '2020-09-04', '2020-09-04', '2020-09-04', '2020-09-04', '', 0, '', '', '', 'Supervisor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `trip_id` int(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `opr_cost_center` varchar(255) NOT NULL,
  `cost_center` varchar(255) NOT NULL,
  `dateTimeFlatpickr1` varchar(255) NOT NULL,
  `dateTimeFlatpickr2` varchar(255) NOT NULL,
  `dateTimeFlatpickr3` varchar(255) NOT NULL,
  `dateTimeFlatpickr4` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `client_ref` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `dateTimeFlatpickr` varchar(255) NOT NULL,
  `load2` varchar(255) NOT NULL,
  `empty` varchar(255) NOT NULL,
  `p_hour` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `loads` varchar(255) NOT NULL,
  `empty1` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `hour` varchar(255) NOT NULL,
  `load1` varchar(255) NOT NULL,
  `empty2` varchar(255) NOT NULL,
  `planned` varchar(255) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `diff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`trip_id`, `start_location`, `opr_cost_center`, `cost_center`, `dateTimeFlatpickr1`, `dateTimeFlatpickr2`, `dateTimeFlatpickr3`, `dateTimeFlatpickr4`, `vehicle_type`, `vehicle_id`, `type`, `sub_type`, `client_ref`, `supervisor`, `owner`, `client`, `dateTimeFlatpickr`, `load2`, `empty`, `p_hour`, `capacity`, `loads`, `empty1`, `total`, `hour`, `load1`, `empty2`, `planned`, `actual`, `diff`) VALUES
(0, 'w', 'w', 'w', 'w', 'w', 'ww', 'w', 'w', 0, 'w', 'w', 'w', 'Supervisor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `maininfo`
--

CREATE TABLE `maininfo` (
  `trip_id` int(225) DEFAULT NULL,
  `start_location` varchar(225) NOT NULL,
  `opr_cost_center` varchar(225) NOT NULL,
  `cost_center` varchar(225) NOT NULL,
  `dateTimeFlatpickr1` varchar(225) NOT NULL,
  `dateTimeFlatpickr2` varchar(225) NOT NULL,
  `dateTimeFlatpickr3` varchar(225) NOT NULL,
  `dateTimeFlatpickr4` varchar(225) NOT NULL,
  `vehicle_type` varchar(225) NOT NULL,
  `vehicle_id` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `sub_type` varchar(225) NOT NULL,
  `client_ref` varchar(225) NOT NULL,
  `supervisor` varchar(225) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `client` varchar(225) NOT NULL,
  `dateTimeFlatpickr` varchar(225) NOT NULL,
  `load2` varchar(225) NOT NULL,
  `empty` varchar(225) NOT NULL,
  `p_hour` varchar(225) NOT NULL,
  `capacity` varchar(225) NOT NULL,
  `loads` varchar(225) NOT NULL,
  `empty1` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `hour` varchar(225) NOT NULL,
  `load1` varchar(225) NOT NULL,
  `empty2` varchar(225) NOT NULL,
  `working` varchar(225) NOT NULL,
  `totals` varchar(225) NOT NULL,
  `planned` varchar(225) NOT NULL,
  `actual` varchar(225) NOT NULL,
  `diff` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pump`
--

CREATE TABLE `pump` (
  `mem_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_size` varchar(255) NOT NULL,
  `litre` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `tank1` varchar(255) NOT NULL,
  `tank2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pump`
--

INSERT INTO `pump` (`mem_id`, `p_name`, `t_name`, `t_size`, `litre`, `city`, `tank1`, `tank2`) VALUES
(17, '1', '12', '21', '1', '1', '1', '1'),
(21, '2', '2', '2', '2', '2', '2', '2');

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
(1, 'Spiral Filipino', 'Filipino for Grade 7 - Spiral Filipino', 3, '', 47, '2013-2014', 'First'),
(2, 'Spiral English', 'English for Grade 7', 3, '', 47, '2013-2014', 'First'),
(3, 'Spiral Mathematics', 'Mathematics for Grade 7 - Spiral Math', 3, '', 47, '2013-2014', 'First'),
(4, 'Spiral Science', 'Science for Grade 7', 3, '', 47, '2013-2014', 'First'),
(5, 'Spiral T.L.E', 'T.L.E for Grade 7', 3, '', 47, '2013-2014', 'First'),
(6, 'Spiral A.P', 'Araling Panlipunan for Grade 7', 3, '', 47, '2013-2014', 'First'),
(7, 'Spiral Religion', 'rekligion for Grade 7', 3, '', 47, '2013-2014', 'First'),
(8, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 47, '2013-2014', 'First'),
(9, 'MAPEH', 'MAPEH for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(10, 'MAPEH', 'MAPEH for Grade 7', 3, '', 47, '2013-2014', 'First'),
(11, 'Religion', 'Religion for Grade 8', 3, '', 48, '2013-2014', 'First'),
(12, 'Spiral Filipino', 'Filipino for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(13, 'Spiral English', 'English for Grade 8', 3, '', 48, '2013-2014', 'First'),
(14, 'Spiral Mathematics', 'Mathematics for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(15, 'Spiral Science', 'Science for Grade ', 3, '', 48, '2013-2014', 'First'),
(16, 'Spiral T.L.E.', 'T.L.E for Grade 7 ', 3, '', 48, '2013-2014', 'First'),
(17, 'Spiral A.P.', 'Araling Panlipunan for Grade 8', 3, '', 48, '2013-2014', 'First'),
(18, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 48, '2013-2014', 'First'),
(19, 'Spiral Filipino', 'Filipino for Grade 9', 3, '', 49, '2013-2014', 'First'),
(20, 'Spiral English', 'English for Grade 9', 3, '', 49, '2013-2014', 'First'),
(21, 'Spiral Mathematics', 'Mathematics for Grade 9', 3, '', 49, '2013-2014', 'First'),
(22, 'Spiral Science', 'Science for Grade 9', 3, '', 49, '2013-2014', 'First'),
(23, 'Spiral A.P.', 'Araling Panlipunan for Grade 9', 3, '', 49, '2013-2014', 'First'),
(24, 'Spiral T.L.E.', 'T.L.E for Grade 9', 3, '', 49, '2013-2014', 'First'),
(25, 'Spiral MAPEH', 'MAPEH for Grade 9', 3, '', 49, '2013-2014', 'First'),
(26, 'Values Education', 'Values Education for Grade 9', 3, '', 49, '2013-2014', 'First'),
(27, 'Computer', 'Computer for grade 9', 3, '', 49, '2013-2014', 'First'),
(28, 'Religion IV', 'Religion for Grade 10', 3, '', 50, '2013-2014', 'First'),
(29, 'Spiral Filipino', 'Filipino for Grade 10', 3, '', 50, '2013-2014', 'First'),
(30, 'Spiral Mathematics', 'Mathematics for Grade 10', 3, '', 50, '2013-2014', 'First'),
(31, 'Spiral Science', 'Science for Grade 10', 3, '', 50, '2013-2014', 'First'),
(32, 'Spiral T.L.E.', 'T.L.E for Grade 10', 3, '', 50, '2013-2014', 'First'),
(33, 'Spiral MAPEH', 'MAPEH for Grade 10', 3, '', 50, '2013-2014', 'First'),
(34, 'Values Education', 'Values Education for Grade 10', 3, '', 50, '2013-2014', 'First'),
(35, 'CAT', 'Citizens Advancement Training', 3, '', 50, '2013-2014', 'First'),
(36, 'Computer', 'Computer for grade 10', 3, '', 50, '2013-2014', 'First'),
(37, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First'),
(38, 'Engine no.', 'Chasis no.', 0, 'Type of Body', 0, '', ''),
(39, '78547472', 'LGAG4CY28HH190487', 0, 'Truck,Trailor', 0, '', ''),
(40, 'EH700214131', 'GT175K11154', 0, 'Oil Tanker,Trailor', 0, '', ''),
(41, 'EH700209268', 'GT175K10893', 0, 'Oil Tanker,Trailor', 0, '', ''),
(42, '075641', 'PKC311-01393', 0, 'Oil Tanker,Trailor', 0, '', ''),
(43, 'NE6-029968P', 'PKD311H-02426P', 0, 'Truck,Trailor', 0, '', ''),
(44, 'NE6-075908TP', 'PKC311E-01750P', 0, 'Truck,Trailor', 0, '', ''),
(45, 'EH700213904', 'GT175K11131', 0, 'Oil Tanker,Trailor', 0, '', ''),
(46, '78547471', 'LGAG4CY28HH190490', 0, 'Truck,Trailor', 0, '', ''),
(47, '686722', 'JALFVR34MG7000119', 0, 'Truck,Trailor', 0, '', ''),
(48, '51883327', '6160162', 0, 'Truck,Trailor', 0, '', ''),
(49, '689460', 'JALFVR34MG7000136', 0, 'Truck,Trailor', 0, '', ''),
(50, '51883323', '6160161', 0, 'Truck,Trailor', 0, '', ''),
(51, '51883341', '6160169', 0, 'Truck,Trailor', 0, '', ''),
(52, '466124', 'MMC-05-TC-00251', 0, 'Gas Bowzer Trailor', 0, '', ''),
(53, '78541130', 'LGAG4CY29HH190532', 0, 'Truck,Trailor', 0, '', ''),
(54, '686718', 'JALFVR34MG7000116', 0, 'Truck,Trailor', 0, '', ''),
(55, '78541122', 'LGAG4CY23HH190526', 0, 'Truck,Trailor', 0, '', ''),
(56, '78547469', 'LGAG4CY21HH190489', 0, 'Truck,Trailor', 0, '', ''),
(57, '78541125', 'LGAG4CY27HH190528', 0, 'Truck,Trailor', 0, '', ''),
(58, '78541129', 'LGAG4CY29HH190529', 0, 'Truck,Trailor', 0, '', ''),
(59, '466135', 'MMC-05-TC-00253', 0, 'Gas Bowzer Trailor', 0, '', ''),
(60, '78547467', 'LGAG4CY26HH190486', 0, 'Truck,Trailor', 0, '', ''),
(61, '78547470', 'LGAG4CY2XHH190488', 0, 'Truck,Trailor', 0, '', ''),
(62, '689453', 'JALFVR34MG7000132', 0, 'Truck,Trailor', 0, '', ''),
(63, '673888', 'JALFZ34TF-7000149', 0, 'Gas Bowzer Trailor', 0, '', ''),
(64, '686724', 'JALFVR34MG7000117', 0, 'Truck,Trailor', 0, '', ''),
(65, '673892', 'JALFZ34TF-7000148', 0, 'Gas Bowzer Trailor', 0, '', ''),
(66, '466136', 'MMC-05-TC-00252', 0, 'Gas Bowzer Trailor', 0, '', ''),
(67, '466128', 'MMC-05-TC-00250', 0, 'Gas Bowzer Trailor', 0, '', ''),
(68, '78541127', 'LGAG4CY27HH190531', 0, 'Truck,Trailor', 0, '', ''),
(69, '78541126', 'LGAG4CY2XHH190524', 0, 'Truck,Trailor', 0, '', ''),
(70, 'H0TCTA-14401', 'FD2HGA-10075', 0, 'Truck,Trailor', 0, '', ''),
(71, '678890', 'JALFZ34TF-7000146', 0, 'Gas Bowzer Trailor', 0, '', ''),
(72, '51883317', '6160168', 0, 'Truck,Trailor', 0, '', ''),
(73, 'NE6-075907TP', 'PKC311E-01749P', 0, 'Truck,Trailor', 0, '', ''),
(74, 'EH700212495', 'GT175K10979', 0, 'Truck,Trailor', 0, '', ''),
(75, 'NE6-075909TP', 'PKC311E-01751P', 0, 'Truck,Trailor', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `opr_cost_center` varchar(255) NOT NULL,
  `cost_center` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `start_location`, `opr_cost_center`, `cost_center`) VALUES
(1, 'kaarchiu', '12212', 'shahrah faisal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'asif', '$2y$10$ZDpaysTm5iheb8MkWPrzs.tJkKtoVuBL4YXjrufltcsMX8/xeYfTG', '2021-05-19 11:59:02'),
(2, 'samad', '$2y$10$45EkDyObGLK.lvUeMi34P.DsplMTnqKEkYVhts9L3zk0Q8ljIJMVm', '2021-05-19 12:01:21'),
(3, 'ali', '$2y$10$1yQpNtpX.Pjz7/quNM72/Oz9un02pnLnhLL8fVfXDrPx3eS48AYMG', '2021-05-19 12:02:36'),
(4, 'asif aslam', '$2y$10$lV11X.KX4Q42.7Wo0aM.Y.kzA4L4.HSW4zUBM9YJERc7x0kNl.Uqu', '2021-05-19 12:06:34'),
(5, 'shahzeb', '$2y$10$c1WlQARumk22vunoFmH.SeDZVT5ooBNpDZz7sgZtDGwsSnQM5Sdai', '2021-05-20 12:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `fullName`, `emailAddress`, `city`, `country`, `created_at`) VALUES
(1, 'asdas', 'asdas@gmail.com', 'asdas', '0aa1ea9a5a04b78d4581dd6d17742627', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `phone`, `city`) VALUES
(0, 'd', 'd', 'd', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(100) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `v_type` varchar(255) NOT NULL,
  `odo` varchar(255) NOT NULL,
  `tank` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `nic_no` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `t_body` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle`, `v_type`, `odo`, `tank`, `phone_no`, `cell_no`, `nic_no`, `make`, `t_body`, `city`) VALUES
(392, '78547472', 'LGAG4CY28HH190487', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(393, 'EH700214131', 'GT175K11154', 'HINO', 'Oil Tanker,Trailor', 'Peshawar PK', '', '', '', '', ''),
(394, 'EH700209268', 'GT175K10893', 'HINO', 'Oil Tanker,Trailor', 'Peshawar KPK', '', '', '', '', ''),
(395, '075641', 'PKC311-01393', 'NISSAN', 'Oil Tanker,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(396, 'NE6-029968P', 'PKD311H-02426P', 'NISSAN', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(397, 'NE6-075908TP', 'PKC311E-01750P', 'NISSAN', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(398, 'EH700213904', 'GT175K11131', 'HINO', 'Oil Tanker,Trailor', 'Peshawar KPK', '', '', '', '', ''),
(399, '78547471', 'LGAG4CY28HH190490', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(400, '686722', 'JALFVR34MG7000119', 'ISUZU', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(401, '51883327', '6160162', 'FAW', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(402, '689460', 'JALFVR34MG7000136', 'ISUZU', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(403, '51883323', '6160161', 'FAW', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(404, '51883341', '6160169', 'FAW', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(405, '466124', 'MMC-05-TC-00251', 'FUSU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(406, '78541130', 'LGAG4CY29HH190532', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(407, '686718', 'JALFVR34MG7000116', 'ISUZU', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(408, '78541122', 'LGAG4CY23HH190526', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(409, '78547469', 'LGAG4CY21HH190489', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(410, '78541125', 'LGAG4CY27HH190528', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(411, '78541129', 'LGAG4CY29HH190529', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(412, '466135', 'MMC-05-TC-00253', 'FUSU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(413, '78547467', 'LGAG4CY26HH190486', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(414, '78547470', 'LGAG4CY2XHH190488', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(415, '689453', 'JALFVR34MG7000132', 'ISUZU', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(416, '673888', 'JALFZ34TF-7000149', 'ISUZU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(417, '686724', 'JALFVR34MG7000117', 'ISUZU', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(418, '673892', 'JALFZ34TF-7000148', 'ISUZU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(419, '466136', 'MMC-05-TC-00252', 'FUSU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(420, '466128', 'MMC-05-TC-00250', 'FUSU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(421, '78541127', 'LGAG4CY27HH190531', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(422, '78541126', 'LGAG4CY2XHH190524', 'DONGFENG', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(423, 'H0TCTA-14401', 'FD2HGA-10075', 'HINO', 'Truck,Trailor', 'Karachi Sindh', '', '', '', '', ''),
(424, '678890', 'JALFZ34TF-7000146', 'ISUZU', 'Gas Bowzer Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(425, '51883317', '6160168', 'FAW', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(426, 'NE6-075907TP', 'PKC311E-01749P', 'NISSAN', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(427, 'EH700212495', 'GT175K10979', 'HINO', 'Truck,Trailor', 'Peshawar KPK', '', '', '', '', ''),
(428, 'NE6-075909TP', 'PKC311E-01751P', 'NISSAN', 'Truck,Trailor', 'Lasbela Blochistan', '', '', '', '', ''),
(429, 'MURAD', '41409-8335639-1', '1-Mar-20', 'JU-1818', '', '', '', '', '', ''),
(430, 'Afzal', '45201-4507427-5', '1-May-20', 'JU-2401', '', '', '', '', '', ''),
(431, 'M.Amin', '45304-6435657-7', '1-Feb-20', 'JV-2034', '', '', '', '', '', ''),
(432, 'Nadir Ali', '41203-6994317-7', '1-Oct-19', 'JV-1969', '', '', '', '', '', ''),
(433, 'Barkat', '45304-4082849-9', '1-Jan-21', 'JV-1971', '', '', '', '', '', ''),
(434, 'Akhtiyar', '43404-0347095-7', '1-Jun-20', 'JV-2029', '', '', '', '', '', ''),
(435, 'Shabir', '43203-0279556-9', '1-Oct-19', 'TMA-829', '', '', '', '', '', ''),
(436, 'Ghualm Rasool', '36103-0414980-5', '1-Feb-21', 'TMD-657', '', '', '', '', '', ''),
(437, 'SOHAIL', '45203-1552183-9', '1-Jun-20', 'TMD-390', '', '', '', '', '', ''),
(438, 'Wazeer', '41104-1674430-9', '1-Mar-20', 'TLK-056', '', '', '', '', '', ''),
(439, 'Ehsan', '43301-0304293-5', '1-Sep-20', 'TLG-164', '', '', '', '', '', ''),
(440, 'Jaffar', '45203-5535970-7', '1-Jun-19', 'TLK-060', '', '', '', '', '', ''),
(441, 'Abdul Hayi', '36303-0952395-9', '1-Aug-19', 'TMA-600', '', '', '', '', '', ''),
(442, 'Ali Baksh', '53204-1077707-7', '1-Apr-20', 'TMA-828', '', '', '', '', '', ''),
(443, 'Yasir', '41702-0598857-5', '1-Aug-19', 'TMD-381', '', '', '', '', '', ''),
(444, 'Ghulam Muhammad', '41409-1354140-3', '1-Dec-19', 'TMA-830', '', '', '', '', '', ''),
(445, 'Munawar', '41506-0294079-1', '1-Apr-20', 'TMA-831', '', '', '', '', '', ''),
(446, 'Bashir Ahmed', '43203-0497644-9', '1-Oct-19', 'TMA-839', '', '', '', '', '', ''),
(447, 'Ayub', '45303-6594087-7', '1-Feb-20', 'TMA-840', '', '', '', '', '', ''),
(448, 'Haroon', '21203-5022365-1', '28-May-20', 'TMA-841', '', '', '', '', '', ''),
(449, 'Naseer', '42201-4908107-9', '1-Dec-19', 'TMB-246', '', '', '', '', '', ''),
(450, 'Qamar', '44203-1497496-5', '1-May-20', 'TMB-247', '', '', '', '', '', ''),
(451, 'Abdul Qadeer', '45304-3429799-1', '01-Mar', 'TMB-248', '', '', '', '', '', ''),
(452, 'M.Zubair', '41401-1378532-1', '7-Mar-20', 'TMB-249', '', '', '', '', '', ''),
(453, 'Zawar', '45208-7740254-9', '1-Mar-20', 'TMB-250', '', '', '', '', '', ''),
(454, 'Nisar Khan', '21203-1307987-9', '1-Apr-20', 'TMD-316', '', '', '', '', '', ''),
(455, 'Nisar', '45303-6049251-1', '1-Sep-20', 'TMD-318', '', '', '', '', '', ''),
(456, 'Owais', '21203-5141820-5', '1-Jun-19', 'TMD-319', '', '', '', '', '', ''),
(457, 'Aslam', '41401-1292597-9', '28-May-20', 'TMD-320', '', '', '', '', '', ''),
(458, 'Mumtaz', '45304-7983490-1', '1-May-19', 'TMD-321', '', '', '', '', '', ''),
(459, 'Ghaffar', '44203-4490669-9', '01-Oct', 'TMD-380', '', '', '', '', '', ''),
(460, 'Ashraf', '41401-9606515-3', '1-Jan-20', 'Z-7968', '', '', '', '', '', ''),
(461, 'Mashooq Ali', '45303-2899572-5', '01-Sep-20', 'TMD-391', '', '', '', '', '', ''),
(462, 'Ghulam Rasool', '44201-3387972-1', '01-Aug-20', 'TMD-654', '', '', '', '', '', ''),
(463, 'Nisar.', '45303-3520918-9', '01-Sep-20', 'JV-1968', '', '', '', '', '', ''),
(464, 'Majid Hussain', '43403-0381621-1', '01-Oct-20', 'Z-7892', '', '', '', '', '', ''),
(465, 'Naeem', '45304-9062424-3', '01-Oct-20', 'Z-7927', '', '', '', '', '', ''),
(466, 'Samad Yaseen', '45304-3806089-5', '01-Aug-20', 'Z-7933', '', '', '', '', '', ''),
(467, 'Yar Nabi', '21106-4923081-5', '01-Aug-20', 'Spare Driver', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addform`
--
ALTER TABLE `addform`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `add_data`
--
ALTER TABLE `add_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basicinfo`
--
ALTER TABLE `basicinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bl_info`
--
ALTER TABLE `bl_info`
  ADD PRIMARY KEY (`int`);

--
-- Indexes for table `cashsum`
--
ALTER TABLE `cashsum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `pump`
--
ALTER TABLE `pump`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SUBJ_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addform`
--
ALTER TABLE `addform`
  MODIFY `id_form` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `add_data`
--
ALTER TABLE `add_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basicinfo`
--
ALTER TABLE `basicinfo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `bl_info`
--
ALTER TABLE `bl_info`
  MODIFY `int` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashsum`
--
ALTER TABLE `cashsum`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `pump`
--
ALTER TABLE `pump`
  MODIFY `mem_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
