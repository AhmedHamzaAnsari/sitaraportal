-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 11:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avtrackcrm`
--
CREATE DATABASE IF NOT EXISTS `avtrackcrm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `avtrackcrm`;

-- --------------------------------------------------------

--
-- Table structure for table `addasset`
--

CREATE TABLE `addasset` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imei` varchar(110) NOT NULL,
  `assetGroup` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
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

INSERT INTO `addasset` (`id`, `name`, `imei`, `assetGroup`, `phone`, `model`, `contact`, `category`, `make`, `colour`, `fuel`, `engine`, `yearOfManufacture`, `taxedDue`, `mot`) VALUES
(30, 'KP19JVS', '12345678987654321', 'Group1', ' 9873453634', 'A55', '12334455', 'Vehicle', 'AUDI', 'BLUE', 'DIESEL', '2967', '2019', '2021-09-01', 'No details held by DVLA');

-- --------------------------------------------------------

--
-- Table structure for table `addcustomer`
--

CREATE TABLE `addcustomer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `billingAdd` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `securityNo` varchar(255) NOT NULL,
  `joinDate` varchar(255) NOT NULL,
  `billingProfile` varchar(255) NOT NULL,
  `assign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcustomer`
--

INSERT INTO `addcustomer` (`id`, `name`, `email`, `number`, `currency`, `username`, `password`, `billingAdd`, `paddress`, `securityNo`, `joinDate`, `billingProfile`, `assign`) VALUES
(25, 'Demo', 'demo@gmail.com', '1212121', ' Dollar', 'admin', '2112112', 'abcdef', 'abcdef', '21212', '2021-02-28', 'abc', 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
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

INSERT INTO `complaint` (`id`, `complaint_no`, `type`, `vehicle_no`, `complaint_name`, `phone`, `party_acount`, `complaint_status`, `assign_to`, `assign_from`, `complaint`) VALUES
(3, '1002', 'type', '1234', 'abc', '9873453634', 'account', 'Completed', 'abc', 'efg', 'Tracker down'),
(5, '1103', 'type', 'BMB  943', 'abc', '9873453634', 'account', 'Active', 'Choose...', 'Choose...', 'auto@tracker'),
(6, '1004', 'type', '1234', 'abc', '9873453634', 'account', 'Pending', 'Choose...', 'Choose...', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'auto@tracker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addasset`
--
ALTER TABLE `addasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addcustomer`
--
ALTER TABLE `addcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addasset`
--
ALTER TABLE `addasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `addcustomer`
--
ALTER TABLE `addcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `chat`
--
CREATE DATABASE IF NOT EXISTS `chat` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chat`;

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
(42, 6, 7, 'hey', '2021-05-01 12:03:56', 0),
(43, 7, 6, 'hello', '2021-05-01 12:04:25', 0);

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
(6, 'bb', '$2y$10$KDPE5mDDvKyDHsjV9nqLsu2iLj/pepvB6lY/QjYDgJZ5FKpxC28kW'),
(7, 'tt', '$2y$10$54hzayXpYFYI2kN49kSzPerLhbBdMnPEZqV0.r0.I7B1i04dmpO/6');

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
(37, 1, '2021-04-30 09:24:09', 'no'),
(38, 6, '2021-05-01 12:05:58', 'no'),
(39, 7, '2021-05-01 12:04:56', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Database: `donor`
--
CREATE DATABASE IF NOT EXISTS `donor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `donor`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Account Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`, `Account Type`) VALUES
(1, 'Mohibullah Baig', 'mohibullah.baig727@gmail.com', '123456789', 'admin'),
(2, 'Mubashir Rehman', 'mubashir123@gmail.com', '123456789', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `donee`
--

CREATE TABLE `donee` (
  `Id` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Email` int(11) NOT NULL,
  `Address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donee`
--
ALTER TABLE `donee`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donee`
--
ALTER TABLE `donee`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Table structure for table `emp_register`
--

CREATE TABLE `emp_register` (
  `id` int(111) NOT NULL,
  `code` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `dob` varchar(225) NOT NULL,
  `m_status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cnic_no` varchar(255) NOT NULL,
  `mob_no` varchar(255) NOT NULL,
  `p_no` varchar(255) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `text_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `vehicl_reg`
--

CREATE TABLE `vehicl_reg` (
  `id` int(11) NOT NULL,
  `v_type` varchar(255) NOT NULL,
  `v_no` varchar(255) NOT NULL,
  `e_no` varchar(255) NOT NULL,
  `c_no` varchar(225) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicl_reg`
--

INSERT INTO `vehicl_reg` (`id`, `v_type`, `v_no`, `e_no`, `c_no`, `v_name`, `status`) VALUES
(3, '1', 'w', 'w', 'w,w', 'undefined', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_register`
--
ALTER TABLE `emp_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicl_reg`
--
ALTER TABLE `vehicl_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_register`
--
ALTER TABLE `emp_register`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicl_reg`
--
ALTER TABLE `vehicl_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'erp', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"avtrackcrm\",\"chat\",\"donor\",\"erp\",\"phpmyadmin\",\"test\",\"tmcstracuture\",\"traccar\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"erp\",\"table\":\"emp_register\"},{\"db\":\"erp\",\"table\":\"vehicl_reg\"},{\"db\":\"erp\",\"table\":\"vehicle_reg\"},{\"db\":\"erp\",\"table\":\"test\"},{\"db\":\"donor\",\"table\":\"donee\"},{\"db\":\"donor\",\"table\":\"admin\"},{\"db\":\"tmcstracuture\",\"table\":\"login\"},{\"db\":\"tmcstracuture\",\"table\":\"tc_users\"},{\"db\":\"tmcstracuture\",\"table\":\"chat_message\"},{\"db\":\"tmcstracuture\",\"table\":\"crmusers\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-06-07 09:12:48', '{\"Console\\/Mode\":\"show\",\"Console\\/Height\":-42.006518}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `tmcstracuture`
--
CREATE DATABASE IF NOT EXISTS `tmcstracuture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tmcstracuture`;

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
(289384, '358735070043132', '', '27.761756', '68.797268', '', '0', 'TLA-357', '+923172706334', '103597.58801300002', '', '', '', '2020-02-28 05:18:38', ''),
(289385, '358735070905280', '', '24.87567', '67.299745', '', '0', 'TLF-437', '+923030391033', '54329.998220999965', '', '', '', '2020-02-12 11:31:24', ''),
(289386, '358735070575075', '', '24.942805', '66.719892', '', '0', '5075', '+923080416965', '0', '', '', '', '2019-10-11 09:37:01', ''),
(289387, '358735070903988', '', '27.085362', '68.31954', '', '7', 'JQ-1236', '+923337960308', '45085.55236200003', '', '', '', '2020-01-30 06:43:41', ''),
(289388, '868003031114395', '', '28.693593', '70.422897', '', '0', 'TMG-211', '+923337960712', '266621.0802929934', '', '', '', '2021-05-08 07:22:28', ''),
(289389, '358735070903749', '', '31.685276', '73.229835', '', '42', 'JQ-8094', '+923030390730', '149134.1010989989', '', '', '', '2021-05-08 07:03:10', ''),
(289390, '868003031120780', '', '25.023643', '66.983584', '', '0', 'TMG-045', '+923030413505', '35794.018513000134', '', '', '', '2019-10-05 14:56:06', ''),
(289391, '868003031114106', '', '34.01547', '71.744038', '', '0', 'TMH-522', '+923030411455', '215405.44792700425', '', '', '', '2021-05-08 05:14:30', ''),
(289392, '868003031120152', '', '24.9406', '66.720678', '', '2', 'TMG-700', '+923030414707', '151590.30450200077', '', '', '', '2021-05-08 03:33:42', ''),
(289393, '352094080397117', '', '24.952018', '67.080528', '', '0', 'KW-8095', '+923337960817', '21754.548329999958', '', '', '', '2019-11-18 14:27:30', ''),
(289394, '358735070904275', '', '25.346161', '68.400317', '', '40', 'PTR-0198', '+923331034518', '6653.363357000062', '', '', '', '2019-07-06 09:01:06', ''),
(289395, '358511021644947', '', '24.882298', '67.063156', '', '24', 'TUD-595', '+923331034539', '73237.08536000115', '', '', '', '2021-02-22 06:22:41', ''),
(289396, '868003031522167', '', '31.198199', '72.726247', '', '0', 'BDC-457', '+923081245180', '212275.05620800465', '', '', '', '2021-05-08 08:06:26', ''),
(289397, '868003031519445', '', '24.817303', '66.993538', '', '2', 'TMF-990', '+923081245182', '30348.263288999737', '', '', '', '2019-10-25 10:31:29', ''),
(289398, '868003031520245', '', '27.801495', '68.309085', '', '30', 'TLQ-992', '+923081245170', '15310.474883999868', '', '', '', '2019-12-10 07:04:51', ''),
(289399, '868003031119774', '', '24.94185', '66.71983', '', '0', 'TUD-998', '+923030417067', '187786.3100810072', '', '', '', '2021-05-06 05:32:07', ''),
(289400, '358511022595015', '', '24.941843', '66.71983', '', '0', 'TUD-898', '+923018733716', '149640.41285200132', '', '', '', '2021-05-05 12:54:25', ''),
(289401, '358735070902030', '', '25.023634', '66.983588', '', '0', 'TMG-900', '+923337960564', '14225.495990999996', '', '', '', '2019-10-05 15:04:17', ''),
(289402, '868003031113991', '', '31.393772', '74.310567', '', '0', 'LES-14-4445', '+923030416838', '4034.0711460000007', '', '', '', '2019-03-14 07:36:30', ''),
(289403, '868003031120228', '', '31.275968', '74.163167', '', '0', 'JGI-18-114', '+923030414855', '14194.848859000089', '', '', '', '2019-09-18 19:09:37', ''),
(289404, '868003031119873', '', '31.533571', '74.344825', '', '0', 'MNS-07-2225', '+923030415036', '42439.15230599982', '', '', '', '2020-09-21 05:15:56', ''),
(289405, '358735070902386', '', '31.600562', '74.312174', '', '0', 'SDK-9721', '+923337960256', '29912.112741999976', '', '', '', '2019-09-12 16:19:26', ''),
(289406, '868003031120988', '', '31.4019', '74.249143', '', '44', 'LEI-16-3941', '+923030396459', '69156.50444299902', '', '', '', '2021-05-08 08:55:48', ''),
(289407, '868003031117901', '', '31.447215', '74.316363', '', '0', 'FDZ-3284', '+923030417030', '10599.480973000105', '', '', '', '2019-05-21 08:13:31', ''),
(289408, '358735070903137', '', '32.478525', '74.433458', '', '0', 'LES-16-6138', '+923337960259', '59908.51612199933', '', '', '', '2020-12-01 06:53:10', ''),
(289409, '358735070041482', '', '24.832934', '66.984697', '', '0', 'TLN-120', '+923172706346', '4139.098955000025', '', '', '', '2019-11-16 13:38:27', ''),
(289410, '868003031522449', '', '24.844728', '67.227015', '', '14', 'TLA-436', '+923081245195', '22.800613000000006', '', '', '', '2019-04-16 13:00:45', ''),
(289411, '868003031116242', '', '24.852135', '66.983912', '', '0', 'JU-4617', '+923030417718', '961.2641909999999', '', '', '', '2019-02-13 18:27:04', ''),
(289412, '868003031114288', '', '24.788613', '67.339366', '', '0', 'LT-5647', '+923030417677', '2363.191552999997', '', '', '', '2019-05-10 16:14:37', ''),
(289413, '868003031115319', '', '24.785668', '67.351522', '', '0', 'TLA-382', '+923030418325', '1090.1084329999999', '', '', '', '2019-05-16 20:29:57', ''),
(289414, '868003031114361', '', '24.801534', '67.324315', '', '0', 'JU-4869', '+923030399094', '1386.9015109999978', '', '', '', '2019-05-01 08:27:25', ''),
(289415, '868003031118529', '', '24.828048', '67.242208', '', '0', 'TMB-120', '+923030417618', '1868.326586999996', '', '', '', '2020-02-11 13:15:00', ''),
(289416, '868003031115053', '', '24.787683', '67.341656', '', '0', 'SPA-228', '+923030417648', '2932.459324000002', '', '', '', '2019-10-26 14:50:38', ''),
(289417, '868003031520641', '', '24.874724', '67.3052', '', '0', 'TUD-896', '+923331029611', '199542.1068489957', '', '', '', '2020-12-29 10:51:21', ''),
(289418, '868003031523900', '', '25.011437', '66.846607', '', '0', 'TUD-996', '+923331029609', '132757.5589529988', '', '', '', '2021-05-06 05:33:02', ''),
(289419, '358511020972687', '', '24.882282', '67.185746', '', '0', 'KQ-4232', '+923331029627', '6045.3915379999735', '', '', '', '2019-11-07 08:08:35', ''),
(289420, '868003031866945', '', '27.574495', '67.819033', '', '85', 'BQD-203', '+923182165158', '33475.577916999595', '', '', '', '2021-01-09 08:49:15', ''),
(289421, '358511021903640', '', '24.838125', '67.04726', '', '0', 'CU-8356', '+923028117043', '51642.14522399963', '', '', '', '2020-01-24 07:44:19', ''),
(289422, '868003032110053', '', '29.956323', '72.071368', '', '0', 'LE-6239', '+923083013212', '1443246.6064020293', '', '', '', '2021-05-06 18:43:31', ''),
(289423, '358735070904382', '', '33.910933', '72.505492', '', '0', 'JQ-9094', '+923030390712', '158814.27504999808', '', '', '', '2021-05-08 05:04:53', ''),
(289424, '868003031523108', '', '24.873025', '67.060635', '', '0', 'AXY-829', '+923018733624', '27209.399671000447', '', '', '', '2021-05-08 05:00:43', ''),
(289425, '868003031870210', '', '24.83242', '67.032787', '', '3', 'AFR0891859', '+923182165179', '359291.23041400366', '', '', '', '2021-05-08 09:17:29', ''),
(289426, '868003031114551', '', '25.003456', '66.834393', '', '17', 'TMH-498', '+923337960227', '152555.96851299272', '', '', '', '2021-05-07 10:51:31', ''),
(289427, '868003032821519', '', '24.902907', '66.998059', '', '0', 'TKA-002', '+923332748370', '50364.99252400157', '', '', '', '2021-05-06 22:28:34', ''),
(289428, '868003032835105', '', '24.90274', '66.998088', '', '0', 'TKY-443', '+923332748348', '50027.0267470008', '', '', '', '2021-05-07 16:04:30', ''),
(289429, '868003032825668', '', '24.986722', '67.044868', '', '0', 'TAC-649', '+923332748347', '99014.61402699901', '', '', '', '2021-05-08 06:31:12', ''),
(289430, '868003032834173', '', '24.90296', '66.998025', '', '0', 'TKJ-632', '+923332748364', '68831.06349500096', '', '', '', '2021-05-07 13:41:58', ''),
(289431, '868003032823838', '', '24.903112', '66.99791', '', '0', 'TKJ-809', '+923332748340', '33559.83864699953', '', '', '', '2021-05-07 18:40:02', ''),
(289432, '868003032821907', '', '24.902733', '66.997972', '', '0', 'TAL-625', '+923332748425', '99006.30347299928', '', '', '', '2021-05-07 22:46:03', ''),
(289433, '868003032821436', '', '24.902003', '66.997942', '', '0', 'TKG-685', '+923332748361', '69173.23993699941', '', '', '', '2021-05-08 01:26:00', ''),
(289434, '868003032832250', '', '24.902845', '66.998128', '', '0', 'TAK-067', '+923332748355', '97866.4784630015', '', '', '', '2021-05-06 21:09:22', ''),
(289435, '868003032829256', '', '24.903432', '66.982968', '', '0', 'JV-4813', '+923332748343', '34042.25750399965', '', '', '', '2021-05-08 09:03:27', ''),
(289436, '868003032833449', '', '24.903404', '66.997924', '', '0', 'TKA-031', '+923332748367', '81781.75927800221', '', '', '', '2021-05-07 10:16:57', ''),
(289437, '868003032823879', '', '24.902048', '66.997982', '', '0', 'TKZ-124', '+923332748359', '135086.82834300198', '', '', '', '2021-05-07 12:32:59', ''),
(289438, '868003032834793', '', '24.902735', '66.997967', '', '0', 'LS-9289', '+923332748360', '29582.786805999225', '', '', '', '2021-05-07 18:43:21', ''),
(289439, '868003032822657', '', '24.903382', '66.997919', '', '0', 'K-3708', '+923332772054', '57856.16346700013', '', '', '', '2021-05-07 13:42:45', ''),
(289440, '868003032834405', '', '24.902317', '66.984583', '', '13', 'TKA-768', '+923332748346', '65571.49922900046', '', '', '', '2021-05-08 09:18:15', ''),
(289441, '868003032829652', '', '24.892472', '66.987105', '', '0', 'TLF-334', '+923332772043', '73213.58434300168', '', '', '', '2021-05-08 07:39:57', ''),
(289442, '868003032835584', '', '24.869642', '66.956123', '', '0', 'P-9937', '+923332772041', '95933.57839500229', '', '', '', '2021-05-08 04:30:31', ''),
(289443, '868003032831252', '', '24.901885', '66.998085', '', '0', 'JV-2839', '+923332772048', '125579.22192999924', '', '', '', '2021-05-06 23:49:04', ''),
(289444, '868003032834686', '', '26.548785', '68.001222', '', '21', 'JV-3567', '+923332772057', '191163.04139200234', '', '', '', '2021-05-07 10:21:43', ''),
(289445, '868003032823457', '', '24.97825', '67.276287', '', '0', 'TLZ-989', '+923332772037', '102289.26868600077', '', '', '', '2021-02-20 10:43:09', ''),
(289446, '358735070001200', '', '24.899316', '66.997036', '', '0', '1200', '+923332758937', '825.8212799999998', '', '', '', '2020-02-27 11:36:04', ''),
(289447, '868003032833019', '', '24.990732', '68.39322', '', '0', 'TLB-263', '+923332772058', '102587.31320599985', '', '', '', '2021-05-07 17:11:43', ''),
(289448, '868003032822103', '', '24.864948', '66.942652', '', '0', 'TLK-731', '+923332772106', '136645.5224299982', '', '', '', '2021-05-07 00:23:18', ''),
(289449, '868003032822624', '', '24.901672', '66.982098', '', '0', 'TMF-218', '+923332772104', '85902.99595999942', '', '', '', '2021-05-08 09:17:58', ''),
(289450, '868003032114055', '', '28.024987', '68.815632', '', '45', 'LES-15-737', '+923083012859', '3893198.40861686', '', '', '', '2021-05-08 09:16:05', ''),
(289451, '868003031120913', '', '25.184523', '67.865813', '', '0', 'FWO-8388', '+923030396208', '261524.69857999496', '', '', '', '2021-05-07 11:05:43', ''),
(289452, '358735070902972', '', '24.894435', '67.001223', '', '0', '2972', '+923030389240', '28722.173580000024', '', '', '', '2019-09-24 13:58:08', ''),
(289453, '868003032109444', '', '30.086443', '66.932495', '', '0', 'NAC-323', '+923308569887', '73858.57160999978', '', '', '', '2020-02-26 02:42:47', ''),
(289454, '868003032494564', '', '27.81166', '66.605173', '', '0', 'TLZ-958', '+923012445623', '721.1230730000003', '', '', '', '2020-02-23 17:38:22', ''),
(289455, '868003032818945', '', '24.790868', '67.336489', '', '0', '8945', '+923332773506', '0', '', '', '', '2020-03-25 03:28:52', ''),
(289456, '868003032819737', '', '24.822332', '67.295412', '', '0', '9737', '+923332773510', '0', '', '', '', '2020-07-10 15:10:44', ''),
(289457, '868003032820479', '', '31.485366', '73.28546', '', '0', 'FDC-9465', '+923332773518', '4847.649854000014', '', '', '', '2021-04-02 17:38:35', ''),
(289458, '868003032834629', '', '30.559895', '72.085323', '', '16', '4629', '+923332773417', '0', '', '', '', '2021-04-12 22:04:24', ''),
(289459, '868003032822327', '', '30.324715', '71.916332', '', '0', 'E-4091', '+923332773458', '3860.811050999994', '', '', '', '2021-04-30 04:58:29', ''),
(289460, '868003032817871', '', '31.700183', '74.030007', '', '0', '1871', '+923332773576', '0', '', '', '', '2021-02-07 04:59:33', ''),
(289461, '868003032816212', '', '24.962292', '66.921922', '', '0', '6212', '+923332773579', '0', '', '', '', '2020-12-25 11:14:55', ''),
(289462, '868003032819620', '', '31.679813', '74.201982', '', '34', 'FDF-6084', '+923332773619', '4929.371363999937', '', '', '', '2021-02-27 14:15:21', ''),
(289463, '868003032817178', '', '24.792597', '67.523513', '', '40', 'JU-2118', '+923332773627', '207269.62279500184', '', '', '', '2021-03-18 19:10:10', ''),
(289464, '868003032818234', '', '28.044018', '69.661533', '', '0', 'TLK-322', '+923011154595', '1598.020517999995', '', '', '', '2021-03-08 18:01:46', ''),
(289465, '868003032817798', '', '25.446458', '68.373497', '', '3', 'TKB-644', '+923011154594', '50975.23285800067', '', '', '', '2021-05-08 09:00:04', ''),
(289466, '868003032818077', '', '26.43506', '68.014168', '', '0', 'C-2644', '+923011154593', '83903.4186330006', '', '', '', '2021-05-08 09:15:44', ''),
(289467, '868003032817434', '', '24.822593', '67.295137', '', '0', 'JW-7750', '+923011154635', '219722.74419599518', '', '', '', '2021-05-07 21:03:48', ''),
(289468, '868003032819984', '', '31.468163', '74.349741', '', '0', 'TLE-851', '+923011154609', '1997.5840749999998', '', '', '', '2020-06-28 18:10:04', ''),
(289469, '868003032817020', '', '29.589956', '71.665138', '', '35', 'JU-6023', '+923011154633', '3215.699122000029', '', '', '', '2020-03-27 07:16:10', ''),
(289470, '868003032821550', '', '31.596011', '74.318199', '', '3', 'RNC-9869', '+923332773163', '136298.07690100124', '', '', '', '2021-04-07 11:10:57', ''),
(289471, '868003032835089', '', '31.416397', '73.555105', '', '0', 'SLB-4292', '+923011154580', '98203.0095040016', '', '', '', '2021-05-06 04:58:22', ''),
(289472, '868003032827623', '', '31.596734', '74.325163', '', '0', 'LHJ-8375', '+923011154591', '47587.46134600007', '', '', '', '2021-05-08 00:44:36', ''),
(289473, '358735070904788', '', '24.955248', '67.135592', '', '0', 'JQ-1358', '+923030389059', '99391.2171340002', '', '', '', '2021-03-04 02:29:30', ''),
(289474, '868003032819166', '', '30.20422', '71.51058', '', '0', 'E-2118', '+923181142443', '138576.6413480013', '', '', '', '2020-12-07 10:02:29', ''),
(289475, '358511021646256', '', '30.752603', '73.446305', '', '0', 'LEI-14A-9299', '+923028517043', '183262.70713500067', '', '', '', '2021-05-08 09:07:59', ''),
(289476, '868003032817525', '', '30.991383', '73.804938', '', '0', 'TLG-256', '+923181142551', '2371.6025069999982', '', '', '', '2020-07-12 07:36:00', ''),
(289477, '868003032816204', '', '27.970473', '69.268863', '', '28', '6204', '+923181142545', '0', '', '', '', '2020-09-23 11:36:47', ''),
(289478, '358735070044916', '', '24.94957', '67.081419', '', '0', 'E-2117', '+923013794557', '24168.24882300009', '', '', '', '2021-01-18 04:14:02', ''),
(289479, '358735070902519', '', '33.685446', '72.843782', '', '0', 'TUD-587', '+923030392915', '81750.8903959978', '', '', '', '2020-12-07 07:05:53', ''),
(289480, '868003032816972', '', '24.920404', '67.105148', '', '0', 'JU-4058', '+923011154563', '14.769449', '', '', '', '2021-05-08 09:00:09', ''),
(289481, '868003032820982', '', '31.662672', '74.281773', '', '0', 'TMA-307', '+923181142495', '20502.82268200017', '', '', '', '2021-05-08 06:44:30', ''),
(289482, '868003032819653', '', '32.262818', '74.163555', '', '0', '9653', '+923181142496', '0', '', '', '', '2020-06-16 06:08:05', ''),
(289483, '868003032819927', '', '31.539737', '74.359379', '', '0', '9927', '+923181142466', '0', '', '', '', '2020-03-24 13:39:42', ''),
(289484, '868003032494093', '', '0', '0', '', '0', '4093', '+923181142473', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289485, '868003032819471', '', '28.291865', '70.07315', '', '0', 'TLP-369', '+923181142510', '208840.13829299915', '', '', '', '2020-12-13 03:50:59', ''),
(289486, '868003032816782', '', '25.377293', '68.22733', '', '0', 'TLA-049', '+923181142513', '2789.3450230000085', '', '', '', '2020-06-10 06:47:31', ''),
(289487, '868003032817723', '', '28.290117', '70.064948', '', '0', '7723', '+923181142481', '0', '', '', '', '2021-04-12 11:12:03', ''),
(289488, '868003032818572', '', '31.013527', '72.393478', '', '35', 'C-8540', '+923181142497', '12147.557351000032', '', '', '', '2021-03-01 19:04:10', ''),
(289489, '868003032817376', '', '30.144238', '71.479525', '', '0', 'LES-1212', '+923011154556', '3700.2216869999993', '', '', '', '2021-02-20 19:12:22', ''),
(289490, '868003032830817', '', '25.821368', '68.429428', '', '0', 'E-1009', '+923011154552', '25781.71788599981', '', '', '', '2021-02-07 13:30:28', ''),
(289491, '868003032819935', '', '24.816209', '67.027507', '', '0', '9935', '', '147.5811089999999', '', '', '', '2020-12-21 07:47:34', ''),
(289492, '868003032490901', '', '31.685456', '74.067803', '', '0', 'TLH-753', '+923012463060', '39702.61443899984', '', '', '', '2020-07-28 11:59:52', ''),
(289493, '868003032833985', '', '30.168998', '71.505722', '', '0', 'C-9021', '+923332772368', '100237.58542500094', '', '', '', '2021-04-19 14:57:13', ''),
(289494, '868003032819364', '', '26.589713', '68.299838', '', '0', '9364', '+923011154568', '0', '', '', '', '2021-04-24 03:44:08', ''),
(289495, '868003032822533', '', '31.581585', '73.722968', '', '0', 'KS-2550', '+923332772193', '89601.75651800096', '', '', '', '2021-05-06 01:33:33', ''),
(289496, '868003032488392', '', '24.854418', '67.117013', '', '0', 'TLK-090', '+923182165424', '3529.77068', '', '', '', '2020-12-28 20:42:31', ''),
(289497, '868003032819091', '', '33.655275', '73.04728', '', '0', 'RIS-2621', '+923181142468', '22056.580594000123', '', '', '', '2021-05-07 09:16:54', ''),
(289498, '868003033284881', '', '32.180375', '74.179702', '', '0', 'LET-8872', '+923011154715', '49549.44333299956', '', '', '', '2021-05-08 02:56:50', ''),
(289499, '868003032493459', '', '35.329416', '73.201432', '', '8', 'GLTE-2212', '+923012445958', '194897.2466040029', '', '', '', '2021-05-08 04:03:24', ''),
(289500, '868003032819174', '', '34.661885', '73.459918', '', '0', 'GLTE-2512', '+923011154642', '47541.012467000066', '', '', '', '2021-05-07 06:10:35', ''),
(289501, '868003033256632', '', '34.117388', '72.647328', '', '0', 'HNZ-151', '+923011154714', '2694.80390200001', '', '', '', '2021-04-30 20:15:14', ''),
(289502, '868003031120673', '', '24.912228', '66.990486', '', '0', 'TLY-850', '+923030414191', '266522.22756498837', '', '', '', '2021-05-08 08:36:22', ''),
(289503, '868003033252805', '', '31.510488', '73.154166', '', '41', 'TAN-112', '+923011154716', '8205.195808999995', '', '', '', '2021-05-02 02:45:22', ''),
(289504, '868003032833324', '', '33.671104', '72.887929', '', '0', 'HNZ-1512', '+923332772484', '138498.94412199574', '', '', '', '2021-05-05 11:15:32', ''),
(289505, '868003032820636', '', '33.692075', '72.831074', '', '0', 'STD-4057', '+923030388162', '23880.8102150002', '', '', '', '2021-04-24 09:42:17', ''),
(289506, '868003033284683', '', '0', '0', '', '0', 'TLZ-887', '+923182165218', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289507, '868003033254645', '', '25.23801', '62.374858', '', '60', 'TLV-708', '+923011154655', '897.3511480000025', '', '', '', '2020-06-25 18:18:09', ''),
(289508, '868003033259339', '', '30.900283', '71.5616', '', '0', 'PT-0717', '+923011154675', '52115.30333800111', '', '', '', '2021-05-08 04:53:50', ''),
(289509, '868003033253605', '', '35.330339', '73.201724', '', '7', 'HNZ-1812', '+923011154719', '56591.15318900122', '', '', '', '2021-05-07 22:39:29', ''),
(289510, '868003032819000', '', '35.295745', '73.198594', '', '33', 'HNZ-912', '+923011154549', '71571.42003500128', '', '', '', '2021-05-08 03:54:09', ''),
(289511, '356307040096561', '', '24.826763', '67.03405', '', '0', '3409763', '', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289512, '868003032817459', '', '31.594303', '74.32351', '', '0', 'SGC-9295', '+923011154606', '20475.741964999732', '', '', '', '2021-05-08 05:12:31', ''),
(289513, '868003033254470', '', '31.365383', '72.925706', '', '0', 'SAI-211', '+923303585068', '1574.7073820000012', '', '', '', '2020-08-20 09:13:15', ''),
(289514, '868003033256715', '', '31.296323', '74.067344', '', '0', 'LES-4509', '+923303585066', '19203.63894700001', '', '', '', '2021-05-07 23:57:29', ''),
(289515, '868003033257390', '', '27.475072', '68.673319', '', '18', 'EA-7170', '+923303585059', '7823.622824000016', '', '', '', '2020-08-24 10:32:46', ''),
(289516, '868003032487998', '', '29.748046', '66.823138', '', '49', 'TKQ-157', '+923012453877', '1764.1914710000037', '', '', '', '2020-06-30 09:52:47', ''),
(289517, '358511022790665', '', '30.926793', '71.222465', '', '0', 'GLTD-1955', '+923018434238', '371878.17450500396', '', '', '', '2021-05-08 06:53:33', ''),
(289518, '868003033289120', '', '31.246469', '73.979007', '', '0', 'MNI-314', '+923303585086', '12442.545119', '', '', '', '2021-05-08 04:18:46', ''),
(289519, '868003033255824', '', '33.857436', '72.854793', '', '0', 'TLG-514', '+923303585074', '732.9885259999998', '', '', '', '2021-04-09 03:43:26', ''),
(289520, '868003033286076', '', '28.317242', '70.10087', '', '0', '6076', '+923303585082', '0', '', '', '', '2021-05-02 15:42:34', ''),
(289521, '868003033291241', '', '33.661533', '73.045222', '', '0', '1241', '+923303585073', '0', '', '', '', '2021-04-23 03:53:50', ''),
(289522, '868003033253688', '', '29.248077', '71.042801', '', '40', 'E-7402', '+923303585083', '21585.181191999767', '', '', '', '2021-03-31 01:54:57', ''),
(289523, '868003033255451', '', '0', '0', '', '0', '5451', '+923030397827', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289524, '868003032824349', '', '25.039605', '66.869536', '', '0', 'TKP-845', '+923332772784', '58.79235400000005', '', '', '', '2020-07-15 08:00:15', ''),
(289525, '868003033289658', '', '31.59509', '74.484701', '', '0', '9658', '+923161205020', '0', '', '', '', '2020-07-29 13:54:43', ''),
(289526, '868003033258679', '', '33.617919', '73.067544', '', '0', 'LES-8463', '+923161205023', '18021.626104000166', '', '', '', '2021-05-08 06:22:33', ''),
(289527, '868003033260535', '', '24.841492', '67.227089', '', '0', 'JU-7681', '+923161204892', '1040.899663999999', '', '', '', '2020-07-28 09:59:42', ''),
(289528, '868003033259164', '', '29.715421', '71.710035', '', '0', 'GLTD-6775', '+923161205013', '13709.467050000188', '', '', '', '2020-08-25 13:08:49', ''),
(289529, '868003033258539', '', '24.919124', '67.016845', '', '0', 'PX-3677', '+923102822757', '4513.70097999997', '', '', '', '2020-10-09 03:51:17', ''),
(289530, '868003033257424', '', '24.897051', '66.992978', '', '0', 'RIL-5745', '+923011154021', '11653.746281999911', '', '', '', '2021-03-11 10:41:12', ''),
(289531, '868003033289583', '', '24.860267', '67.088956', '', '0', 'TAA-368', '+923102822648', '2987.197944000002', '', '', '', '2021-03-18 14:06:56', ''),
(289532, '868003033256137', '', '27.184183', '67.80947', '', '0', '6137', '+923102822683', '0', '', '', '', '2020-10-21 13:29:34', ''),
(289533, '868003033252169', '', '27.036201', '68.206033', '', '37', 'MII-5075', '+923102823103', '3800.6595500000153', '', '', '', '2020-12-13 06:49:21', ''),
(289534, '868003033286552', '', '0', '0', '', '0', '6552', '+923102823104', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289535, '86800303257986', '', '0', '0', '', '0', '7986', '+923102823126', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289536, '868003033284923', '', '26.251062', '68.150561', '', '0', 'XA-501', '+923102822713', '476.3973900000003', '', '', '', '2021-02-25 06:09:44', ''),
(289537, '868003033284535', '', '29.564899', '71.295759', '', '0', '4535', '+923102822425', '0', '', '', '', '2020-08-28 19:32:06', ''),
(289538, '868003033257770', '', '35.823304', '74.550183', '', '36', 'LES-9094', '+923102823433', '21031.973474000126', '', '', '', '2021-05-08 08:33:07', ''),
(289539, '868003032819323', '', '33.70794', '73.059473', '', '0', 'GLTB-2669', '+923011154559', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289540, '868003033256053', '', '30.34067', '72.036645', '', '0', '6053', '+923102825707', '0', '', '', '', '2020-11-24 04:18:39', ''),
(289541, '868003033252607', '', '25.257122', '67.965154', '', '0', 'TLP-948', '+923102825705', '6277.164803999995', '', '', '', '2020-09-03 08:56:26', ''),
(289542, '868003033284444', '', '33.654252', '73.042533', '', '0', 'RII-763', '+923102822174', '2.338225', '', '', '', '2021-05-08 06:43:30', ''),
(289543, '868003032834520', '', '24.87342', '67.009867', '', '0', 'JT-3572', '+923332748369', '72612.60173800084', '', '', '', '2021-05-08 06:53:27', ''),
(289544, '868003033258877', '', '28.434094', '70.230269', '', '0', 'SBA-095', '+923102823273', '6434.03557999998', '', '', '', '2020-11-25 08:11:35', ''),
(289545, '868003033257276', '', '0', '0', '', '0', '7276', '', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289546, '868003033251039', '', '32.213738', '74.228873', '', '0', 'C-2619', '+923102825940', '31496.292490000367', '', '', '', '2021-05-08 07:30:53', ''),
(289547, '868003033255618', '', '27.924701', '69.199353', '', '0', 'TLV-714', '+923102825937', '1195.621807000001', '', '', '', '2020-09-06 12:12:09', ''),
(289548, '868003033257341', '', '30.147695', '71.532027', '', '38', 'XA-519', '+923102825976', '26868.57719200007', '', '', '', '2020-10-24 05:48:39', ''),
(289549, '868003033285326', '', '28.437187', '70.215898', '', '0', '5326', '+923102825936', '0', '', '', '', '2020-09-23 11:06:00', ''),
(289550, '868003033281945', '', '31.678595', '73.969869', '', '0', 'SLH-4176', '+923102825579', '17180.790521000235', '', '', '', '2021-05-07 09:20:43', ''),
(289551, '868003033254850', '', '31.581625', '73.723262', '', '0', 'SLH-6041', '+923102823312', '23313.914211000218', '', '', '', '2021-05-06 05:43:41', ''),
(289552, '868003033259982', '', '29.277101', '67.838033', '', '0', 'C-2097', '+923011154690', '1763.4013699999987', '', '', '', '2020-12-28 04:06:21', ''),
(289553, '868003032109576', '', '33.616157', '72.99337', '', '0', 'LZR-6918', '+923082824073', '125169.00497600106', '', '', '', '2021-03-27 03:42:43', ''),
(289554, '868003032494655', '', '24.919231', '67.016932', '', '0', 'Ju-3999', '+923182986678', '0', '', '', '', '2021-05-08 09:16:24', ''),
(289555, '868003032820412', '', '30.048001', '72.354795', '', '0', '0412', '+923102784130', '0', '', '', '', '2020-12-03 13:27:21', ''),
(289556, '868003033290482', '', '34.117082', '72.648003', '', '0', 'TMA-908', '+923182999365', '2355.2592269999845', '', '', '', '2021-04-27 08:37:03', ''),
(289557, '868003033284154', '', '31.371344', '72.974608', '', '0', 'E-9986', '+923182999407', '5309.069567000032', '', '', '', '2020-10-28 13:55:05', ''),
(289558, '868003033255386', '', '24.836494', '67.281589', '', '0', 'SGI-1197', '+923182986676', '66992.00028200012', '', '', '', '2021-05-05 10:11:47', ''),
(289559, '868003033259347', '', '26.589993', '67.978805', '', '40', 'JV-5656', '+923083720541', '1607.1112180000007', '', '', '', '2021-05-08 09:06:10', ''),
(289560, '868003033257879', '', '30.374974', '71.881727', '', '0', 'JV-3800', '+923181296042', '45820.6403479994', '', '', '', '2021-05-08 08:22:27', ''),
(289561, '868003033255303', '', '30.74293', '73.311372', '', '0', 'JT-4804', '+923181296038', '20373.77217000026', '', '', '', '2021-04-20 23:18:42', ''),
(289562, '868003032818598', '', '30.212895', '71.47138', '', '0', 'LES-426', '+923011154630', '3575.792752000022', '', '', '', '2021-04-17 05:40:44', ''),
(289563, '868003033283875', '', '27.168556', '68.38883', '', '0', 'JU-7808', '+923428649788', '3554.3729020000105', '', '', '', '2021-02-21 00:14:37', ''),
(289564, '868003031519544', '', '31.463474', '74.277037', '', '0', 'LEB-20-74', '+923081245174', '125002.51993200042', '', '', '', '2021-05-03 12:45:58', ''),
(289565, '868003033290847', '', '24.809461', '67.314188', '', '0', 'JV-6848', '+923440023468', '2316.290284999999', '', '', '', '2020-12-24 03:01:17', ''),
(289566, '868003033260261', '', '31.28252', '74.187798', '', '0', 'SBB-045', '+923181296056', '23853.468812000054', '', '', '', '2020-11-29 11:15:53', ''),
(289567, '868003033282380', '', '34.117139', '72.648086', '', '0', 'TLY-491', '+923499204683', '2920.701918999996', '', '', '', '2021-05-03 02:43:27', ''),
(289568, '868003033254686', '', '24.944484', '67.043401', '', '0', '4686', '+923460678244', '0', '', '', '', '2020-10-31 04:05:33', ''),
(289569, '868003032818416', '', '24.835813', '67.306655', '', '0', '8416', '+923181142489', '0', '', '', '', '2021-04-28 08:42:37', ''),
(289570, '868003033251773', '', '24.919922', '67.035674', '', '0', '1773', '+923431037671', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289571, '868003033255444', '', '27.347061', '68.531225', '', '0', 'K-8242', '+923083720928', '19533.903584999884', '', '', '', '2021-04-19 10:08:28', ''),
(289572, '868003033290128', '', '24.919294', '67.016721', '', '0', 'JV-8196', '+923161150694', '0.073539', '', '', '', '2021-05-08 09:17:07', ''),
(289573, '868003033287348', '', '24.787913', '67.339504', '', '0', '7348', '+923474695284', '0', '', '', '', '2021-04-25 21:49:42', ''),
(289574, '358735070904887', '', '31.276372', '73.019168', '', '7', '4887', '+923030389243', '0', '', '', '', '2020-11-01 22:26:06', ''),
(289575, '358735070903103', '', '24.822431', '67.295132', '', '0', '3103', '+923030384540', '0', '', '', '', '2020-10-29 13:49:30', ''),
(289576, '868003032491321', '', '31.285272', '74.176211', '', '0', 'E-2292', '+923012455288', '247521.63088800065', '', '', '', '2021-05-07 16:28:13', ''),
(289577, '868003033252425', '', '29.323816', '71.564389', '', '33', 'SAI-206', '+923083716392', '31471.619735999964', '', '', '', '2021-05-08 08:34:34', ''),
(289578, '868003033283453', '', '30.170058', '71.490824', '', '0', 'TKY-288', '+923102390110', '5428.489233000018', '', '', '', '2020-12-15 02:02:26', ''),
(289579, '868003033252201', '', '28.292508', '70.07134', '', '0', '2201', '+923102784119', '0', '', '', '', '2021-05-03 15:07:20', ''),
(289580, '868003033256913', '', '28.445088', '69.606179', '', '0', 'TLQ-580', '+923102823413', '18166.632412000214', '', '', '', '2020-11-09 10:51:19', ''),
(289581, '868003032491750', '', '31.788093', '71.12238', '', '0', 'JU-9044', '+923161150752', '1592.768272999995', '', '', '', '2021-05-08 04:39:30', ''),
(289582, '868003032818820', '', '28.111119', '69.71668', '', '0', 'RIN-6765', '+923181142508', '1237.1542670000008', '', '', '', '2021-05-08 08:54:31', ''),
(289583, '868003033288460', '', '24.837116', '67.126934', '', '0', 'JZ-1788', '+923182988540', '155.46179699999993', '', '', '', '2021-05-08 08:02:51', ''),
(289584, '868003033254553', '', '30.722568', '73.281318', '', '20', 'JU-9515', '+923182988546', '2952.847247999992', '', '', '', '2021-02-14 09:18:43', ''),
(289585, '868003033289096', '', '31.29643', '74.180402', '', '0', 'Jv-8785', '+923182988547', '4736.876400000051', '', '', '', '2021-05-08 04:15:26', ''),
(289586, '358511022788628', '', '31.392292', '74.328337', '', '0', 'LOT-1773', '+923018434269', '0', '', '', '', '2021-04-20 08:11:26', ''),
(289587, '868003033286639', '', '24.771421', '67.337393', '', '0', 'E-7395', '+923182988542', '25852.422300000544', '', '', '', '2021-05-08 06:47:10', ''),
(289588, '352094085364807', '', '24.799518', '67.505498', '', '0', 'K-8622', '+923181296059', '20524.59420899977', '', '', '', '2021-05-08 08:06:30', ''),
(289589, '868003032490281', '', '25.331108', '68.136995', '', '26', '0281', '+923332758966', '49049.86526700067', '', '', '', '2020-10-02 10:36:45', ''),
(289590, '868003033289286', '', '31.117503', '73.909518', '', '35', 'TKL-869', '+923408382552', '6319.892316000021', '', '', '', '2021-05-08 08:13:59', ''),
(289591, '868003033257457', '', '33.988765', '72.009698', '', '0', 'GLTA-1173', '+923405204961', '3340.922851999997', '', '', '', '2020-12-10 15:04:23', ''),
(289592, '868003033256814', '', '31.552262', '74.29274', '', '0', 'LES-7422', '+923434569475', '1698.531041000001', '', '', '', '2021-04-08 05:15:53', ''),
(289593, '868003033251930', '', '30.241753', '72.068331', '', '0', 'TKU-618', '+923460942268', '19661.66064899988', '', '', '', '2021-05-05 15:10:41', ''),
(289594, '868003033287876', '', '24.988936', '67.191921', '', '0', 'TUE-544', '+923182999363', '11725.541657999971', '', '', '', '2021-05-08 04:42:49', ''),
(289595, '868003033254579', '', '24.805404', '67.507571', '', '0', 'JV-8413', '+923182986640', '115302.66096600094', '', '', '', '2021-05-08 07:15:28', ''),
(289596, '868003033287967', '', '24.805412', '67.50763', '', '0', 'JV-8406', '+923182986646', '96585.75278400033', '', '', '', '2021-05-08 07:12:16', ''),
(289597, '868003033253316', '', '24.805469', '67.507655', '', '0', 'JV-8408', '+923182988583', '73560.4028549996', '', '', '', '2021-05-08 06:47:26', ''),
(289598, '868003033260139', '', '24.805526', '67.507782', '', '0', 'JV-8409', '+923182988584', '87432.19913799853', '', '', '', '2021-05-08 07:36:16', ''),
(289599, '358511021902949', '', '24.805416', '67.507677', '', '0', 'JV-6082', '+923028384916', '55785.47245100058', '', '', '', '2021-05-08 06:53:55', ''),
(289600, '868003032114527', '', '28.052537', '69.676708', '', '0', 'P-6282', '+923083010595', '3380.5539099999883', '', '', '', '2021-05-08 07:39:23', ''),
(289601, '868003033291043', '', '31.593278', '74.32648', '', '0', 'SLE-2795', '+923480927595', '13563.33918899986', '', '', '', '2021-05-07 16:10:38', ''),
(289602, '868003031866259', '', '24.801669', '67.50521', '', '0', 'TLV-473', '+923040671315', '3.8613519999999992', '', '', '', '2021-05-08 08:27:59', ''),
(289603, '868003033253829', '', '32.003413', '74.217341', '', '0', 'JV-3777', '+923303585076', '5552.3453879999615', '', '', '', '2021-03-09 06:10:47', ''),
(289604, '868003031117927', '', '26.599844', '67.98168', '', '44', 'TLG-669', '+923030398819', '817.2639419999996', '', '', '', '2021-05-08 09:07:44', ''),
(289605, '868003031117026', '', '30.154644', '71.500085', '', '0', 'JU-1748', '+923030396861', '896.4390270000008', '', '', '', '2021-03-22 22:47:07', ''),
(289606, '358735070000491', '', '24.905782', '67.113524', '', '0', 'APW-718', '+923409505695', '38817.59061699995', '', '', '', '2021-05-07 16:41:20', ''),
(289607, '868003032494911', '', '24.839502', '67.098613', '', '0', 'TKJ-144', '+923012458655', '19.727139000000008', '', '', '', '2021-05-08 08:04:07', ''),
(289608, '868003032822137', '', '24.901983', '66.997953', '', '0', 'TKF-042', '+923495730200', '28237.374388999735', '', '', '', '2021-05-07 16:11:09', ''),
(289609, '868003032833936', '', '24.965267', '68.392888', '', '0', 'TLQ-071', '+923332772416', '146992.35209299834', '', '', '', '2021-05-07 13:05:48', ''),
(289610, '868003033255790', '', '24.870069', '66.956859', '', '0', 'TLG-881', '+923102822769', '30237.10267200052', '', '', '', '2021-05-06 09:05:46', ''),
(289611, '358735070236272', '', '24.793483', '67.381952', '', '0', 'JU-8742', '+923332773979', '25114.42569099971', '', '', '', '2021-04-12 03:13:29', ''),
(289612, '868003032486990', '', '24.869576', '66.956119', '', '0', 'JV-2777', '+923332748393', '225775.95625999323', '', '', '', '2021-05-08 04:22:25', ''),
(289613, '868003032831336', '', '24.869918', '66.956762', '', '0', 'JV-6777', '+923332772826', '230515.711654', '', '', '', '2021-05-07 01:45:12', ''),
(289614, '868003032831732', '', '24.793267', '67.382723', '', '0', 'TMD-857', '+923332772682', '69146.96210000085', '', '', '', '2021-05-07 22:09:42', ''),
(289615, '868003032828969', '', '24.869987', '66.95685', '', '0', 'TMA-881', '+923332772820', '116169.78653499935', '', '', '', '2021-05-06 14:53:15', ''),
(289616, '868003032491636', '', '24.699777', '70.194294', '', '46', 'TMA-390', '+923332758891', '233942.16264799034', '', '', '', '2021-05-07 18:45:52', ''),
(289617, '358511021404565', '', '27.301347', '68.516678', '', '0', 'TMA-346', '+923460080823', '80639.20897400043', '', '', '', '2021-05-08 07:28:06', ''),
(289618, '868003032821535', '', '24.867663', '66.952863', '', '0', 'JV-1167', '+923332773125', '168475.64239699254', '', '', '', '2021-04-20 10:55:12', ''),
(289619, '868003032490562', '', '24.985717', '67.04464', '', '0', 'TKD-740', '+923332758961', '22379.900751000117', '', '', '', '2021-05-07 14:23:26', ''),
(289620, '868003032828050', '', '24.653372', '68.569328', '', '36', 'GLT-4009', '+923332772819', '108506.38824700029', '', '', '', '2021-05-08 09:14:20', ''),
(289621, '868003033290896', '', '24.897617', '66.994673', '', '11', 'JV-6078', '+923473781465', '70686.61407899875', '', '', '', '2021-05-08 09:15:29', ''),
(289622, '868003033288098', '', '31.430993', '74.25294', '', '0', 'BRE-3256', '+923182999357', '3809.3904620000103', '', '', '', '2021-05-08 08:57:26', ''),
(289623, '358735070901909', '', '31.453831', '73.32202', '', '0', '1909', '+923030392436', '22.379891999999998', '', '', '', '2021-05-07 08:55:31', ''),
(289624, '868003031119352', '', '31.444263', '74.198995', '', '6', '9352', '+923330138580', '0', '', '', '', '2021-01-09 04:56:39', ''),
(289625, '358511021904416', '', '33.64063', '73.026571', '', '0', 'JX-7671', '+923337960662', '5.305954000000001', '', '', '', '2021-05-08 08:11:57', ''),
(289626, '868003033253274', '', '28.284295', '70.047492', '', '0', '3274', '+923182988579', '0', '', '', '', '2021-05-04 12:05:52', ''),
(289627, '868003033251435', '', '30.153056', '71.499391', '', '0', 'MIB-2602', '+923102825565', '645.4115240000001', '', '', '', '2020-12-31 17:41:05', ''),
(289628, '868003032818226', '', '25.570187', '68.438147', '', '41', '8226', '+923011154627', '13252.831597000026', '', '', '', '2021-04-21 01:11:32', ''),
(289629, '868003032495629', '', '31.683743', '73.96675', '', '0', 'TLS-033', '+923012442245', '2647.908322999991', '', '', '', '2021-02-07 13:49:37', ''),
(289630, '358511021903871', '', '35.295408', '73.212718', '', '12', 'HNZ-1012', '+923332773504', '26585.306918000162', '', '', '', '2021-05-07 17:16:49', ''),
(289631, '868003032818424', '', '34.478765', '72.569475', '', '0', 'GZRA-1212', '+923181142511', '62000.69584799983', '', '', '', '2021-05-07 11:23:55', ''),
(289632, '868003033252730', '', '33.667221', '72.880045', '', '0', 'GZRA-1112', '+923102825464', '1163.9347100000027', '', '', '', '2020-09-16 17:00:40', ''),
(289633, '868003032816675', '', '33.658724', '73.045392', '', '0', 'KBA-847', '+923011154604', '87879.74182700008', '', '', '', '2021-05-07 08:03:48', ''),
(289634, '868003032819406', '', '33.616166', '72.993317', '', '0', 'NL-8761', '+923011154632', '44451.89162299994', '', '', '', '2021-04-11 03:25:22', ''),
(289635, '868003032819901', '', '33.65558', '73.047252', '', '0', 'LES-7069', '+923011154620', '93102.85290900244', '', '', '', '2021-05-07 09:54:24', ''),
(289636, '868003032494598', '', '33.655724', '73.047493', '', '0', 'BNS-1730', '+923012438288', '89474.248163999', '', '', '', '2021-05-07 06:24:07', ''),
(289637, '868003033289138', '', '24.805368', '67.507546', '', '0', 'JV-6079', '+923418263091', '75577.555278998', '', '', '', '2021-05-08 07:08:20', ''),
(289638, '868003033287777', '', '24.805377', '67.507569', '', '0', 'JV-6081', '+923418371049', '88665.99092799927', '', '', '', '2021-05-08 08:28:05', ''),
(289639, '358735070902279', '', '24.805477', '67.507772', '', '0', 'JV-8410', '+923030392608', '46656.33891199997', '', '', '', '2021-05-08 05:50:50', ''),
(289640, '358735070235670', '', '24.866873', '66.945638', '', '0', 'JV-8411', '+923426373546', '14722.538363000007', '', '', '', '2021-05-03 04:33:30', ''),
(289641, '358735070574110', '', '24.805485', '67.50774', '', '0', 'JV-8414', '+923446416334', '41853.07146200005', '', '', '', '2021-05-08 06:18:45', ''),
(289642, '868003033251146', '', '31.592051', '74.322051', '', '0', 'SLH-6219', '+923182999413', '12981.857548999951', '', '', '', '2021-05-07 23:19:37', ''),
(289643, '358511022788123', '', '26.672145', '67.989328', '', '0', 'JT-5289', '+923168211434', '3525.4006670000026', '', '', '', '2021-04-18 02:18:15', ''),
(289644, '358511021904945', '', '24.813242', '67.312552', '', '0', '4945', '+923030384540', '0', '', '', '', '2021-04-28 08:04:24', ''),
(289645, '868003033286662', '', '29.182355', '71.360627', '', '29', 'JV-8586', '+923083715845', '3831.909332', '', '', '', '2021-05-08 08:43:27', ''),
(289646, '868003031119725', '', '31.55624', '74.419673', '', '0', 'LES-1597', '+923030416030', '7742.237164999978', '', '', '', '2021-05-08 03:54:51', ''),
(289647, '868003031120541', '', '31.335923', '73.014368', '', '29', 'LES-6709', '+923083715475', '1398.1610420000015', '', '', '', '2021-05-08 09:09:07', ''),
(289648, '868003033283164', '', '30.163599', '71.470278', '', '0', 'MND-6686', '+923182999327', '1978.8503000000035', '', '', '', '2021-01-29 17:45:29', ''),
(289649, '868003033258141', '', '33.454964', '71.971737', '', '0', 'Z-9094', '+923011154651', '1937.3577770000034', '', '', '', '2021-04-11 17:30:44', ''),
(289650, '868003031114981', '', '33.645555', '73.023373', '', '0', '4981', '+923181296492', '0', '', '', '', '2020-12-26 18:06:21', ''),
(289651, '868003032494531', '', '24.822487', '67.295402', '', '0', '4531', '+923182988560', '0', '', '', '', '2020-10-30 15:45:25', ''),
(289652, '868003032824455', '', '31.941663', '74.228553', '', '46', 'TLC-548', '+923332772958', '21389.75218600014', '', '', '', '2021-05-08 09:07:15', ''),
(289653, '868003033256541', '', '26.341664', '68.074674', '', '14', 'JU-6522', '+923102784415', '0', '', '', '', '2020-12-20 13:27:39', ''),
(289654, '868003031115046', '', '31.501973', '74.419603', '', '0', 'LRJ-8373', '+923028517038', '6366.030075000043', '', '', '', '2021-05-08 08:52:14', ''),
(289655, '868003033928461', '', '30.144736', '71.498196', '', '0', 'E-9446', '+923160379351', '33149.89513600054', '', '', '', '2021-05-07 15:05:04', ''),
(289656, '868003033289229', '', '24.805445', '67.50773', '', '0', 'JV-6080', '+923493771301', '86398.33579400119', '', '', '', '2021-05-08 06:41:17', ''),
(289657, '868003033282901', '', '31.599439', '74.295005', '', '0', 'JU-8734', '+923102825991', '2378.8815399999958', '', '', '', '2021-05-08 07:13:05', ''),
(289658, '868003032485802', '', '30.451976', '72.404163', '', '0', 'AKI-110', '+923332748249', '751.9747560000029', '', '', '', '2021-02-18 03:41:16', ''),
(289659, '868003033252599', '', '33.671246', '72.887922', '', '0', 'GLTG-612', '+923102825972', '4937.053704000016', '', '', '', '2021-05-08 06:05:31', ''),
(289660, '868003033259172', '', '31.393739', '74.145188', '', '0', 'LXU-3180', '+923181296494', '1.9088939999999999', '', '', '', '2021-02-16 10:30:52', ''),
(289661, '358511021334325', '', '33.658424', '73.043482', '', '0', '4325', '+923168210973', '0', '', '', '', '2021-04-28 05:25:25', ''),
(289662, '868003033257713', '', '0', '0', '', '0', '7713', '+923168210981', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289663, '868003031121218', '', '24.789997', '67.383143', '', '2', 'TLT-551', '+923030417065', '8410.815090999997', '', '', '', '2021-05-07 13:41:38', ''),
(289664, '868003033943353', '', '32.751202', '71.908569', '', '33', 'TMH-462', '+923160379069', '8034.303802000007', '', '', '', '2021-04-08 03:35:53', ''),
(289665, '868003033931731', '', '0', '0', '', '0', '1731', '+923160379046', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289666, '868003033931929', '', '24.912634', '67.000212', '', '0', 'JX-7752', '+923160379033', '51.93089200000008', '', '', '', '2021-05-08 07:55:37', ''),
(289667, '868003033945168', '', '33.656825', '73.049321', '', '0', 'JU-7878', '+923160379026', '0', '', '', '', '2021-03-06 11:19:47', ''),
(289668, '868003033944708', '', '31.295483', '74.066669', '', '0', 'SBB-258', '+923083715841', '15657.148662000109', '', '', '', '2021-04-29 10:53:17', ''),
(289669, '868003032109337', '', '33.656892', '73.04952', '', '0', 'ESZ-0261', '+923082828584', '2838.27669000001', '', '', '', '2021-04-20 17:33:53', ''),
(289670, '868003033931713', '', '24.855092', '67.108967', '', '0', '1713', '+923160379046', '0', '', '', '', '2021-04-05 11:29:21', ''),
(289671, '868003032817137', '', '24.879981', '67.067444', '', '0', '7137', '', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289672, '868003033945150', '', '31.686839', '74.066918', '', '0', 'C-2364', '+923160379050', '40866.119145000244', '', '', '', '2021-05-08 09:09:55', ''),
(289673, '868003033288387', '', '35.928182', '74.379516', '', '0', 'LES-9088', '+923102826053', '27302.29482699957', '', '', '', '2021-05-08 05:57:28', ''),
(289674, '358511023208089', '', '34.117193', '72.64681', '', '0', 'HNZ-495', '+923083717973', '1574.4106289999925', '', '', '', '2021-05-05 11:03:52', ''),
(289675, '868003032831799', '', '26.299271', '68.112357', '', '32', 'TLK-454', '+923332773082', '1265.7794950000002', '', '', '', '2021-05-08 08:06:19', ''),
(289676, '868003033260022', '', '28.284793', '70.051046', '', '31', '0022', '+923011154023', '0', '', '', '', '2021-05-03 12:14:19', ''),
(289677, '868003032816535', '', '30.145128', '71.491508', '', '0', '6535', '', '0', '', '', '', '2020-11-28 14:38:47', ''),
(289678, '868003033255675', '', '29.756065', '71.565308', '', '31', '5675', '+923102826054', '0', '', '', '', '2021-02-28 08:19:30', ''),
(289679, '868003033255626', '', '31.444117', '74.354806', '', '42', '5626', '+923490126010', '0', '', '', '', '2021-04-29 15:53:47', ''),
(289680, '868003033258927', '', '24.870095', '66.947005', '', '0', 'JU-0068', '+923102389716', '2357.5247879999847', '', '', '', '2021-05-07 11:03:06', ''),
(289681, '868003032834819', '', '24.857853', '67.122617', '', '0', 'JY-0583', '+923332773412', '500.98072699999955', '', '', '', '2021-05-08 07:24:48', ''),
(289682, '868003032818754', '', '24.832088', '67.098292', '', '0', 'JU-3229', '+923011154575', '44619.98115799956', '', '', '', '2021-04-17 09:28:13', ''),
(289683, '868003032817616', '', '31.244185', '74.180005', '', '0', 'JW-0733', '+923181142482', '2565.8411039999964', '', '', '', '2021-03-13 06:18:50', ''),
(289684, '868003032109485', '', '24.832508', '67.30659', '', '0', 'JU-7554', '+923120185516', '2.11464', '', '', '', '2021-02-24 10:59:30', ''),
(289685, '868003032111648', '', '34.11782', '72.648868', '', '0', 'JV-2329', '+923182172632', '1534.4606009999984', '', '', '', '2021-04-28 10:10:42', ''),
(289686, '358735070234731', '', '31.685507', '74.069635', '', '0', 'TLB-971', '+923030399311', '55885.54346499972', '', '', '', '2021-02-16 09:12:39', ''),
(289687, '358735070236363', '', '28.28649', '70.055547', '', '29', '6363', '+923040871703', '0', '', '', '', '2021-05-04 11:30:11', ''),
(289688, '868003032107497', '', '31.453168', '74.339114', '', '0', '7497', '+923499745311', '0', '', '', '', '2021-05-07 07:16:09', ''),
(289689, '868003031868370', '', '30.37419', '71.879837', '', '0', 'JU-7626', '+923499745566', '391847.580645994', '', '', '', '2021-02-23 14:19:14', ''),
(289690, '868003032109881', '', '28.783698', '70.514477', '', '0', 'TLE-589', '+923499744509', '6381.488080000014', '', '', '', '2021-04-18 00:57:14', ''),
(289691, '868003031116663', '', '31.670239', '74.201235', '', '41', '6663', '+923499743827', '0', '', '', '', '2021-04-22 13:17:46', ''),
(289692, '868003033284659', '', '32.08191', '72.665699', '', '9', 'LES-5548', '+923102389963', '408.7478329999998', '', '', '', '2021-05-08 09:19:03', ''),
(289693, '868003033931507', '', '34.117142', '72.648071', '', '0', 'TMA-391', '+923499752118', '2642.0124819999883', '', '', '', '2021-05-03 02:43:32', ''),
(289694, '868003033930905', '', '27.957394', '69.247814', '', '0', 'SDA-954', '+923499752404', '3588.120628999991', '', '', '', '2021-04-26 08:42:41', ''),
(289695, '868003033929816', '', '31.740691', '70.190644', '', '0', 'C-2979', '+923499752295', '4566.238951999998', '', '', '', '2021-05-01 17:58:58', ''),
(289696, '868003033934014', '', '27.1644', '66.283419', '', '37', 'RIK-3185', '+923499752171', '1809.7956029999955', '', '', '', '2021-03-02 03:51:17', ''),
(289697, '868003033937678', '', '34.117075', '72.648054', '', '0', 'NGR-1951', '+923499753318', '2661.6045380000055', '', '', '', '2021-05-01 03:23:41', ''),
(289698, '868003033929667', '', '27.134826', '68.359618', '', '0', 'JU-6522', '+923499753243', '6368.929343999973', '', '', '', '2021-03-08 10:37:26', ''),
(289699, '868003033934246', '', '28.033466', '69.612167', '', '0', 'TLZ-481', '+923499753379', '3378.6236429999894', '', '', '', '2021-02-24 04:51:54', ''),
(289700, '868003033933248', '', '34.117093', '72.648079', '', '0', 'TLT-245', '+923499753244', '2830.2235309999955', '', '', '', '2021-05-02 09:41:57', ''),
(289701, '868003033936704', '', '31.664069', '73.221053', '', '0', 'JU-7722', '+923499742679', '2022.4992940000006', '', '', '', '2021-05-08 09:03:15', ''),
(289702, '868003033281895', '', '34.662081', '73.460298', '', '0', 'NGR-1812', '+923496973271', '12686.038998000204', '', '', '', '2021-05-08 07:11:07', ''),
(289703, '868003033282042', '', '27.384403', '68.555362', '', '0', 'TLM-667', '923168211359', '3381.348705000015', '', '', '', '2021-05-08 08:00:40', ''),
(289704, '868003033933131', '', '31.389434', '71.230561', '', '0', 'JT-1900', '+923499753556', '18663.367308000026', '', '', '', '2021-05-07 13:40:18', ''),
(289705, '868003033929790', '', '30.374567', '71.87942', '', '0', 'TLF-649', '+923499753351', '769.1390109999982', '', '', '', '2021-02-20 16:03:35', ''),
(289706, '868003033258604', '', '24.919259', '67.016707', '', '0', 'PX-3773', '+923102784446', '0', '', '', '', '2021-05-01 05:58:59', ''),
(289707, '358735070906452', '', '30.147298', '71.495978', '', '0', 'PT-8989', '+923030390114', '430.90511200000014', '', '', '', '2021-03-25 22:00:02', ''),
(289708, '868003031119204', '', '24.92568', '67.017764', '', '0', 'JY-4986', '+923030399023', '409.91226500000016', '', '', '', '2021-05-08 07:18:20', ''),
(289709, '868003033255204', '', '31.282853', '74.087197', '', '0', 'CAB-7940', '+923102390211', '556.9983520000009', '', '', '', '2021-03-14 15:06:15', ''),
(289710, '868003033934196', '', '30.509397', '72.601929', '', '36', 'JV-7615', '+923499851190', '26738.050897000503', '', '', '', '2021-05-08 08:50:01', ''),
(289711, '868003033933230', '', '31.254867', '74.151364', '', '0', 'LES-8833', '+923499851794', '13874.995363999931', '', '', '', '2021-04-21 15:33:33', ''),
(289712, '868003033931747', '', '30.116927', '71.378919', '', '0', 'TAK-425', '+923499852651', '1615.2325840000026', '', '', '', '2021-03-11 18:39:13', ''),
(289713, '868003033934428', '', '33.960316', '72.212826', '', '0', 'GLT-9365', '+923499852757', '781.7647130000018', '', '', '', '2021-04-10 07:34:09', '');
INSERT INTO `bulkdata` (`id`, `imei`, `st_server`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `list`, `protocol`, `last_idle`, `last_move`, `last_stop`) VALUES
(289714, '868003033931481', '', '31.819431', '73.634726', '', '0', 'TLM-461', '+923499852797', '8354.635950999922', '', '', '', '2021-05-08 08:22:29', ''),
(289715, '868003033937082', '', '28.433178', '70.213272', '', '33', 'TKZ-195', '+923499853990', '11319.830588000044', '', '', '', '2021-05-08 07:47:18', ''),
(289716, '868003033935425', '', '30.887476', '72.62774', '', '29', 'LWC-6533', '+923499852004', '914.8574009999961', '', '', '', '2021-05-08 09:18:57', ''),
(289717, '868003033929212', '', '24.900944', '66.988606', '', '25', 'TLN-457', '+923499837199', '2395.2949679999992', '', '', '', '2021-05-08 09:05:48', ''),
(289718, '868003033934436', '', '31.466505', '73.195358', '', '0', 'BRXA-081', '+923499837216', '2333.472918000001', '', '', '', '2021-03-03 07:16:54', ''),
(289719, '868003033929931', '', '26.442895', '68.008691', '', '40', 'JX-0600', '+923499838278', '568.4006400000003', '', '', '', '2021-05-08 09:01:09', ''),
(289720, '868003033935185', '', '27.668331', '68.866077', '', '0', 'TLA-746', '+923499837833', '11101.597741999936', '', '', '', '2021-05-03 05:25:00', ''),
(289721, '868003033937801', '', '30.123085', '71.392854', '', '0', 'P-6992', '+923499834185', '535.2302090000009', '', '', '', '2021-03-19 17:57:15', ''),
(289722, '868003033929485', '', '24.998481', '67.155821', '', '0', 'TME-521', '+923499837494', '4685.5681259999565', '', '', '', '2021-05-08 07:55:01', ''),
(289723, '868003033936050', '', '24.933598', '67.085541', '', '31', 'JY-1938', '+923499834754', '100.38948599999989', '', '', '', '2021-05-08 09:15:33', ''),
(289724, '868003033931788', '', '33.595144', '73.138191', '', '39', '1788', '+923499837217', '0', '', '', '', '2021-05-07 13:27:17', ''),
(289725, '868003033930780', '', '24.857814', '67.122698', '', '0', 'JY-0708', '+923499842770', '421.0749739999998', '', '', '', '2021-05-08 07:25:27', ''),
(289726, '868003033935037', '', '24.847482', '67.310588', '', '0', 'LES-1614', '+923499840438', '32092.02786900002', '', '', '', '2021-05-08 04:24:47', ''),
(289727, '868003033937637', '', '24.787297', '67.355361', '', '9', 'GTI-1199', '+923499840568', '21067.534171999785', '', '', '', '2021-04-30 01:49:10', ''),
(289728, '868003033932240', '', '30.340939', '72.036522', '', '0', 'JW-5795', '+923499841117', '2262.4224739999913', '', '', '', '2021-05-08 09:18:01', ''),
(289729, '868003033932836', '', '31.393495', '74.145351', '', '0', 'JU-8787', '+923499839693', '2292.6694820000052', '', '', '', '2021-05-07 04:38:50', ''),
(289730, '868003033932257', '', '29.991028', '71.813448', '', '0', 'K-8255', '+923499837431', '328.5447669999996', '', '', '', '2021-05-08 04:28:54', ''),
(289731, '868003033255816', '', '30.614186', '71.241823', '', '20', 'Ju-7272', '+923083701459', '2156.7810339999965', '', '', '', '2021-05-08 07:39:32', ''),
(289732, '868003033287868', '', '34.117394', '72.64751', '', '0', 'TLV-705', '+923083702131', '2984.1697990000034', '', '', '', '2021-04-27 21:23:48', ''),
(289733, '868003033933271', '', '33.65567', '73.047618', '', '0', 'RIS-808', '+923083687422', '189.89248800000016', '', '', '', '2021-05-07 10:09:14', ''),
(289734, '868003033937363', '', '34.11705', '72.648157', '', '0', 'HNZ-295', '+923083687296', '2885.565951999997', '', '', '', '2021-04-27 19:51:16', ''),
(289735, '868003033928594', '', '30.574683', '72.82643', '', '40', 'JU-9458', '+923083687208', '382.16445199999964', '', '', '', '2021-05-08 09:13:47', ''),
(289736, '868003033936134', '', '31.356996', '73.418607', '', '0', 'LXP-9785', '+923083687206', '16456.496853000062', '', '', '', '2021-05-08 08:22:39', ''),
(289737, '868003033932810', '', '30.718299', '73.268826', '', '39', 'JU-9898', '+923083687196', '26402.087509000157', '', '', '', '2021-05-08 09:12:16', ''),
(289738, '868003033933586', '', '28.289682', '70.065184', '', '0', '3586', '+923083686927', '0', '', '', '', '2021-05-01 07:48:27', ''),
(289739, '868003033930491', '', '28.283777', '70.047364', '', '0', '0491', '+923083686314', '0', '', '', '', '2021-05-03 11:10:21', ''),
(289740, '868003033930004', '', '31.588456', '74.257174', '', '10', 'TLQ-064', '', '1.4551170000000002', '', '', '', '2021-05-03 14:09:58', ''),
(289741, '868003033936266', '', '24.830127', '67.298793', '', '0', 'JV-3473', '+923083686124', '23387.16909699993', '', '', '', '2021-05-08 08:58:07', ''),
(289742, '868003033940961', '', '24.871334', '66.960962', '', '0', 'Ju-8596', '+923083685948', '2344.7350680000013', '', '', '', '2021-05-04 14:58:55', ''),
(289743, '868003033946703', '', '25.375766', '68.393195', '', '0', 'JT-1486', '+923083685891', '3.588566000000001', '', '', '', '2021-03-27 09:09:01', ''),
(289744, '868003033928529', '', '28.284724', '70.050495', '', '0', '8529', '+923083685441', '0', '', '', '', '2021-05-04 15:33:13', ''),
(289745, '868003033933933', '', '24.789577', '67.338626', '', '0', 'FDJ-6176', '+923083685238', '4689.304365000007', '', '', '', '2021-03-27 12:43:23', ''),
(289746, '868003033934857', '', '24.873189', '66.906245', '', '0', 'JU-9797', '+923083685160', '4774.489241000033', '', '', '', '2021-03-29 15:17:03', ''),
(289747, '868003033932620', '', '34.003044', '71.554111', '', '0', '2620', '+923083685106', '9.783813', '', '', '', '2021-04-29 12:47:47', ''),
(289748, '868003033929527', '', '24.828237', '67.077924', '', '0', 'JY-2665', '+923083685020', '1762.830478999999', '', '', '', '2021-05-08 06:55:29', ''),
(289749, '868003033930053', '', '28.283877', '70.04778', '', '0', '0053', '+923083684840', '0', '', '', '', '2021-05-06 17:59:31', ''),
(289750, '868003033941647', '', '30.693119', '73.653788', '', '0', 'TLL-204', '+923083688038', '7944.029903000042', '', '', '', '2021-05-05 04:23:29', ''),
(289751, '868003033941712', '', '29.958834', '71.799443', '', '0', 'JU-5285', '+923083689001', '2773.749748999989', '', '', '', '2021-03-26 00:19:54', ''),
(289752, '868003033943726', '', '30.606369', '73.127334', '', '0', 'JU-0205', '+923083688009', '270.8402159999996', '', '', '', '2021-05-07 18:12:49', ''),
(289753, '868003033937611', '', '28.2888', '70.061128', '', '0', '7611', '+923083688901', '0', '', '', '', '2021-05-06 19:33:27', ''),
(289754, '868003033944401', '', '24.789652', '67.338478', '', '0', '4401', '+923083689016', '9.941271', '', '', '', '2021-05-04 12:42:02', ''),
(289755, '868003033946257', '', '24.86527', '66.928774', '', '0', 'GLT-5036', '+923083689025', '2286.4725619999995', '', '', '', '2021-03-26 01:23:42', ''),
(289756, '868003033932653', '', '34.116769', '72.648643', '', '0', 'TMF-795', '+923083689718', '2783.6821860000073', '', '', '', '2021-04-28 08:35:22', ''),
(289757, '868003033933651', '', '25.598543', '68.440038', '', '33', 'JU-8540', '+923083689639', '7781.128726000029', '', '', '', '2021-03-30 08:52:15', ''),
(289758, '868003033930376', '', '31.390385', '74.150068', '', '0', '0376', '+923083700216', '0', '', '', '', '2021-05-07 17:33:01', ''),
(289759, '868003033930343', '', '31.959871', '73.121935', '', '42', 'JV-8644', '+923083700694', '3139.8318350000027', '', '', '', '2021-05-08 08:39:18', ''),
(289760, '868003033934287', '', '28.12102', '69.726065', '', '0', 'PTR-0107', '+923083700684', '1047.3860110000014', '', '', '', '2021-04-26 03:50:41', ''),
(289761, '868003033933107', '', '24.782644', '67.335734', '', '0', 'JU-0185', '+923083700232', '5076.429456000002', '', '', '', '2021-03-28 09:42:07', ''),
(289762, '868003033258786', '', '28.283997', '70.047168', '', '0', '8786', '+923102390241', '0', '', '', '', '2021-05-02 07:20:40', ''),
(289763, '868003033286670', '', '28.040039', '69.310052', '', '0', 'TKW-592', '923182999391', '1398.782405999997', '', '', '', '2021-02-27 12:42:19', ''),
(289764, '868003032489887', '', '24.993103', '67.15964', '', '3', 'JV-5329', '+923308569921', '10935.794382000015', '', '', '', '2021-04-03 05:46:51', ''),
(289765, '868003033937769', '', '24.795142', '67.330656', '', '38', 'TLS-499', '+923499753494', '7257.608698999987', '', '', '', '2021-03-31 23:31:24', ''),
(289766, '868003033946349', '', '28.288221', '70.060209', '', '0', '6349', '+923083714527', '0', '', '', '', '2021-05-06 19:17:13', ''),
(289767, '868003033947487', '', '35.465657', '73.966639', '', '15', 'LES-9080', '+923083714004', '20433.81613200009', '', '', '', '2021-05-07 22:50:49', ''),
(289768, '868003033943247', '', '31.17084', '73.92199', '', '0', 'JU-1025', '+923083713773', '4768.41013899999', '', '', '', '2021-04-24 19:14:57', ''),
(289769, '868003033944757', '', '34.117481', '72.647679', '', '0', 'TML-155', '+923083713707', '2839.7534449999994', '', '', '', '2021-05-04 15:25:41', ''),
(289770, '868003033941787', '', '31.392', '74.148613', '', '0', 'LWN-1873', '+923083713620', '124.24503000000011', '', '', '', '2021-04-11 13:58:49', ''),
(289771, '868003033941142', '', '24.843632', '66.978487', '', '0', 'TLE-615', '+923083713447', '19776.865876000113', '', '', '', '2021-04-27 07:11:59', ''),
(289772, '868003033938452', '', '32.097721', '72.373473', '', '12', 'JV-9944', '+923083713291', '8515.549424000013', '', '', '', '2021-03-17 06:10:24', ''),
(289773, '868003033941985', '', '34.116159', '72.648424', '', '0', 'TLL-826', '+923083713254', '2912.1502509999846', '', '', '', '2021-04-29 07:44:54', ''),
(289774, '868003033942090', '', '26.335467', '68.078791', '', '42', 'JV-3795', '+923083713038', '2820.802909', '', '', '', '2021-03-14 04:45:59', ''),
(289775, '868003033944062', '', '24.85554', '66.985917', '', '0', 'AE-1174', '+923083712998', '2153.826033', '', '', '', '2021-05-08 07:35:40', ''),
(289776, '868003033944021', '', '33.222849', '72.696823', '', '52', 'JU-2292', '+923083712864', '14623.593820000066', '', '', '', '2021-04-19 09:57:39', ''),
(289777, '868003033942512', '', '24.812238', '67.315119', '', '0', 'FDI-7010', '+923083725244', '12695.068328000061', '', '', '', '2021-04-27 15:14:06', ''),
(289778, '868003033931846', '', '24.870794', '66.959826', '', '0', 'JU-5495', '+923083724408', '11882.547475000078', '', '', '', '2021-04-27 16:07:33', ''),
(289779, '868003033944666', '', '25.098471', '67.588739', '', '54', 'TLG-407', '+923083724397', '6742.769230000015', '', '', '', '2021-05-08 07:56:39', ''),
(289780, '868003033946109', '', '31.199421', '73.958954', '', '0', 'JT-2378', '+923083724318', '6174.316955999992', '', '', '', '2021-03-31 08:37:17', ''),
(289781, '868003033939971', '', '34.661353', '73.459838', '', '0', 'GLTB5200', '+923083724308', '2895.850235000006', '', '', '', '2021-05-07 16:04:45', ''),
(289782, '868003033946034', '', '28.289035', '70.062304', '', '0', '6034', '+923083724249', '0', '', '', '', '2021-03-30 16:51:22', ''),
(289783, '868003033939948', '', '30.047121', '71.495692', '', '0', 'TAB-236', '+923083724238', '1830.3317510000018', '', '', '', '2021-03-08 09:02:01', ''),
(289784, '868003033946554', '', '28.447937', '70.223256', '', '0', '6554', '+923083724023', '0', '', '', '', '2021-04-23 06:31:42', ''),
(289785, '868003033286878', '', '28.283733', '70.048711', '', '0', '6878', '+923403454633', '0', '', '', '', '2021-03-27 11:06:02', ''),
(289786, '868003033930624', '', '31.521771', '73.26001', '', '33', 'C-1014', '+923499850646', '1121.1932459999966', '', '', '', '2021-03-31 09:35:55', ''),
(289787, '868003033285672', '', '27.697327', '68.840005', '', '1', 'TLG-351', '+923182988537', '3403.2922159999875', '', '', '', '2021-03-11 12:45:39', ''),
(289788, '868003033252284', '', '32.038478', '72.826615', '', '0', 'LWN-2246', '+923182999406', '6436.739448000042', '', '', '', '2021-05-06 12:41:07', ''),
(289789, '868003033933644', '', '33.596087', '72.833373', '', '0', 'E-5969', '+923499720120', '638.1146079999991', '', '', '', '2021-03-15 08:39:59', ''),
(289790, '868003033936951', '', '33.660546', '73.05885', '', '0', '6951', '+923499720109', '0', '', '', '', '2021-05-07 16:18:05', ''),
(289791, '868003033928701', '', '30.242008', '71.578013', '', '40', 'PT-0322', '+923499719272', '15666.683297000085', '', '', '', '2021-03-27 19:20:53', ''),
(289792, '868003033934550', '', '31.261501', '74.033758', '', '2', '4550', '+923499718453', '0', '', '', '', '2021-03-16 10:24:31', ''),
(289793, '868003033932224', '', '24.839878', '67.099063', '', '0', 'JV-3077', '+923499718116', '31.724547', '', '', '', '2021-03-06 14:11:09', ''),
(289794, '868003033934469', '', '31.392979', '74.32849', '', '0', 'C-3093', '+923499717930', '366.1061559999995', '', '', '', '2021-04-06 06:15:58', ''),
(289795, '868003033929444', '', '24.917607', '67.393483', '', '33', 'TLE-599', '+923499717499', '2252.7296539999975', '', '', '', '2021-03-22 13:15:12', ''),
(289796, '868003033933354', '', '33.631061', '72.842769', '', '0', 'C-8385', '+923499717318', '16758.716432000238', '', '', '', '2021-05-08 08:58:55', ''),
(289797, '868003033934642', '', '29.991173', '71.813137', '', '0', 'JV-1465', '+923499717120', '503.3482409999998', '', '', '', '2021-05-08 04:29:02', ''),
(289798, '868003033937314', '', '31.474469', '73.063975', '', '0', 'TLW-544', '+923499727114', '4463.7279650000255', '', '', '', '2021-03-29 12:44:37', ''),
(289799, '868003033933164', '', '26.144494', '68.727407', '', '44', 'C-2235', '+923499727041', '1352.8508710000003', '', '', '', '2021-05-08 09:17:21', ''),
(289800, '868003033933412', '', '30.418661', '72.292357', '', '33', 'TLS-045', '+923499726904', '3158.8033059999907', '', '', '', '2021-05-08 08:50:12', ''),
(289801, '868003033944534', '', '24.876906', '66.861645', '', '0', 'TLN-885', '+923083712083', '11924.146275000037', '', '', '', '2021-05-08 08:11:23', ''),
(289802, '868003033929147', '', '24.870247', '66.961107', '', '0', 'Ju-7895', '+923083712027', '4439.052762999963', '', '', '', '2021-04-21 06:15:48', ''),
(289803, '868003033932232', '', '0', '0', '', '0', 'K-7860', '+923083711647', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289804, '868003033932471', '', '32.285608', '71.385568', '', '0', 'GLTE-1477', '+923083711374', '1852.0222269999929', '', '', '', '2021-04-17 04:50:18', ''),
(289805, '868003033938023', '', '32.887972', '71.551147', '', '0', 'Z-8472', '+923083711274', '14961.975297000221', '', '', '', '2021-05-06 23:51:19', ''),
(289806, '868003033939898', '', '0', '0', '', '0', 'TLZ-272', '+923083710994', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289807, '868003033935003', '', '33.984261', '71.575299', '', '0', 'TLH-377', '+923083710866', '14041.263640999954', '', '', '', '2021-05-05 02:02:55', ''),
(289808, '868003033947404', '', '34.027286', '71.615615', '', '0', 'LEI-4686', '+923083710578', '4523.310793000039', '', '', '', '2021-05-08 08:07:33', ''),
(289809, '868003033935110', '', '31.611393', '74.317481', '', '0', 'TLR-675', '+923083710230', '2431.9939049999953', '', '', '', '2021-03-19 19:12:27', ''),
(289810, '868003033946802', '', '31.688554', '74.071001', '', '0', 'C-2362', '+923083710162', '2664.6300529999926', '', '', '', '2021-05-08 09:15:36', ''),
(289811, '868003033937025', '', '30.498475', '72.565559', '', '35', 'TKF-885', '+923083709957', '3106.167342000016', '', '', '', '2021-03-31 16:05:50', ''),
(289812, '868003033939906', '', '26.803181', '68.099366', '', '47', 'MND-1488', '+923083709855', '3984.592250000007', '', '', '', '2021-05-08 08:57:47', ''),
(289813, '868003033945598', '', '28.284044', '70.048023', '', '0', '5598', '+923083709401', '0', '', '', '', '2021-05-05 10:24:33', ''),
(289814, '868003033946042', '', '24.791361', '67.331547', '', '0', 'JV-2792', '+923083708869', '1918.7232399999968', '', '', '', '2021-05-08 08:43:51', ''),
(289815, '868003033942033', '', '28.284006', '70.047664', '', '0', '2033', '+923083708620', '0', '', '', '', '2021-05-05 18:35:58', ''),
(289816, '868003033943361', '', '25.023753', '67.378059', '', '0', 'C-8119', '+923083708309', '228.44600300000016', '', '', '', '2021-03-18 08:23:14', ''),
(289817, '868003033935433', '', '32.892273', '71.616376', '', '0', 'P-6788', '+923083708149', '5882.011235999897', '', '', '', '2021-05-08 09:12:17', ''),
(289818, '868003033938876', '', '0', '0', '', '0', '8876', '+923083708056', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289819, '868003031116259', '', '30.303632', '71.670367', '', '34', 'SGD-7104', '+923030415634', '3799.8806600000125', '', '', '', '2021-05-08 08:26:39', ''),
(289820, '868003033282497', '', '31.340201', '74.118783', '', '0', 'JV-7744', '+923083717659', '3401.7327929999906', '', '', '', '2021-05-08 04:23:14', ''),
(289821, '868003033259602', '', '24.850515', '67.247996', '', '0', '9602', '+923083717538', '0', '', '', '', '2021-04-26 10:18:13', ''),
(289822, '868003033933305', '', '33.543706', '73.145592', '', '0', 'TLU-520', '+923499702817', '649.4695309999995', '', '', '', '2021-04-12 11:55:33', ''),
(289823, '868003033944153', '', '30.124825', '71.373654', '', '0', 'TLQ-783', '+923499701914', '595.3692339999982', '', '', '', '2021-03-20 10:00:57', ''),
(289824, '868003033936779', '', '32.576386', '74.084098', '', '0', 'XA-059', '+923499708210', '2438.9640130000125', '', '', '', '2021-05-05 03:41:36', ''),
(289825, '868003033933420', '', '34.117108', '72.648101', '', '0', 'TLL-945', '+923499704940', '7423.304467000058', '', '', '', '2021-04-28 23:34:18', ''),
(289826, '868003033928123', '', '34.117121', '72.648054', '', '0', 'TMB-691', '+923499701964', '1770.3201869999953', '', '', '', '2021-05-03 02:44:09', ''),
(289827, '868003033934568', '', '31.612616', '74.248489', '', '0', '4568', '+923499701984', '0', '', '', '', '2021-04-30 08:58:50', ''),
(289828, '868003033929469', '', '30.145104', '71.483546', '', '0', 'P-8135', '+923499702300', '1678.9681380000038', '', '', '', '2021-04-20 18:37:10', ''),
(289829, '868003033933081', '', '31.485218', '73.286861', '', '0', 'JU-4881', '+923499702337', '2166.642964000002', '', '', '', '2021-05-07 13:49:38', ''),
(289830, '868003033933149', '', '31.453216', '74.339088', '', '0', '3149', '+923499707759', '0', '', '', '', '2021-05-07 08:12:26', ''),
(289831, '868003033930848', '', '31.321794', '74.097574', '', '0', 'TMK-991', '+923499824989', '4634.271136999955', '', '', '', '2021-03-26 12:42:22', ''),
(289832, '868003033937710', '', '31.483262', '73.015907', '', '6', 'RII-327', '+923499815691', '2007.2139660000034', '', '', '', '2021-04-28 13:38:04', ''),
(289833, '868003033933545', '', '31.384143', '74.238726', '', '0', 'TLF-240', '+923499825273', '2379.568363999998', '', '', '', '2021-05-04 15:47:32', ''),
(289834, '868003033940748', '', '27.346918', '68.533926', '', '37', 'TLM-266', '+923499815664', '5631.000789999993', '', '', '', '2021-03-26 04:54:27', ''),
(289835, '868003033930046', '', '31.393467', '74.14537', '', '0', 'JV-7785', '+923499825788', '2243.18286099998', '', '', '', '2021-04-06 06:27:13', ''),
(289836, '868003033930822', '', '31.498916', '74.237722', '', '31', 'E-7202', '+923499815736', '4454.794585999968', '', '', '', '2021-05-08 08:35:58', ''),
(289837, '868003033931374', '', '25.607329', '68.456758', '', '0', 'JT-8165', '+923083717732', '1313.0002899999974', '', '', '', '2021-04-06 14:29:08', ''),
(289838, '868003033254744', '', '24.772398', '67.337394', '', '0', 'JV-5716', '+923083706348', '51036.50237199929', '', '', '', '2021-05-08 08:12:31', ''),
(289839, '868003033944682', '', '31.554897', '74.433665', '', '0', 'LES-1713', '+923160379243', '5725.999253000015', '', '', '', '2021-04-22 03:50:11', ''),
(289840, '868003033939542', '', '31.542649', '73.173079', '', '12', 'TLK-747', '+923160379221', '2256.0542890000115', '', '', '', '2021-03-12 08:28:59', ''),
(289841, '868003033937454', '', '31.443239', '74.283274', '', '0', 'LES-2554', '+923160379228', '9594.01088999991', '', '', '', '2021-05-08 09:15:54', ''),
(289842, '868003033932687', '', '31.449326', '73.321007', '', '0', 'TLE-776', '+923018581546', '2134.587732999996', '', '', '', '2021-03-20 04:57:48', ''),
(289843, '868003033934105', '', '28.432031', '70.251988', '', '0', 'TLL-673', '+923018581558', '1230.0777360000002', '', '', '', '2021-05-08 08:18:36', ''),
(289844, '868003033930657', '', '31.450202', '74.353517', '', '48', '0657', '+923018581557', '21.348276000000016', '', '', '', '2021-05-03 14:50:05', ''),
(289845, '868003033938411', '', '26.433462', '68.015161', '', '0', 'E-9404', '+923018581544', '6534.702714999958', '', '', '', '2021-04-05 15:01:20', ''),
(289846, '868003033934139', '', '27.660871', '68.89851', '', '30', 'JU-9844', '+923018581553', '976.5703289999993', '', '', '', '2021-05-08 08:51:56', ''),
(289847, '868003033934170', '', '24.82818', '67.285912', '', '0', 'TMF-667', '+923018581550', '1303.4742480000016', '', '', '', '2021-05-08 05:18:15', ''),
(289848, '868003033937538', '', '31.393487', '74.145468', '', '0', 'JU-6464', '+923018581502', '2259.4562510000073', '', '', '', '2021-04-08 14:12:57', ''),
(289849, '868003033928255', '', '24.798739', '67.402794', '', '5', 'JT-9444', '+923018581503', '14177.040134999963', '', '', '', '2021-05-08 09:18:53', ''),
(289850, '868003033933388', '', '24.837103', '67.280896', '', '23', '3388', '+923018581504', '0.22346', '', '', '', '2021-05-04 12:30:07', ''),
(289851, '868003033933875', '', '28.28353', '70.047303', '', '0', '3875', '+923018581505', '0', '', '', '', '2021-04-01 04:58:08', ''),
(289852, '868003033933461', '', '28.290333', '70.065737', '', '0', '3461', '+923018581506', '0', '', '', '', '2021-04-10 02:57:46', ''),
(289853, '868003033937405', '', '33.987325', '71.579085', '', '0', 'JV-5515', '+923018581508', '4934.036613000006', '', '', '', '2021-05-08 03:59:34', ''),
(289854, '868003033937165', '', '24.85473', '67.062619', '', '0', 'JY-7900', '+923018581509', '638.8748429999989', '', '', '', '2021-05-07 19:30:48', ''),
(289855, '868003033928735', '', '25.357113', '68.279995', '', '0', 'RIG-4698', '+923018581514', '335.4597429999995', '', '', '', '2021-05-08 08:42:21', ''),
(289856, '868003033932026', '', '32.797624', '74.105286', '', '0', 'FDI-304', '+923018581517', '4015.8432179999995', '', '', '', '2021-05-05 17:51:58', ''),
(289857, '868003033943197', '', '24.82659', '66.982482', '', '0', 'TLT-898', '+923018580520', '7.558381000000002', '', '', '', '2021-05-06 15:22:45', ''),
(289858, '868003033929808', '', '34.117169', '72.64808', '', '0', 'NGR-1886', '+923018580519', '2469.7677240000007', '', '', '', '2021-04-28 23:34:00', ''),
(289859, '868003033935029', '', '31.28466', '74.178464', '', '0', 'JV-7566', '+923018580517', '2279.03297900001', '', '', '', '2021-03-16 17:28:22', ''),
(289860, '868003033929246', '', '24.902365', '67.023949', '', '0', '9246', '+923018580515', '0', '', '', '', '2021-04-22 11:24:03', ''),
(289861, '868003033928602', '', '34.023117', '71.617101', '', '9', 'C-1193', '+923018581527', '10506.535161999962', '', '', '', '2021-05-08 09:18:25', ''),
(289862, '868003032818127', '', '33.55205', '72.860637', '', '0', 'LES-2421', '+923083719025', '1610.418362999996', '', '', '', '2021-04-10 07:18:58', ''),
(289863, '868003033258000', '', '28.009536', '69.306433', '', '33', 'TAG-673', '+923083718956', '87256.9836880015', '', '', '', '2021-05-08 06:18:11', ''),
(289864, '868003033283115', '', '30.374919', '71.881789', '', '0', 'MHI-130', '+923083718915', '16773.591734000125', '', '', '', '2021-05-08 05:49:06', ''),
(289865, '868003033935482', '', '28.285358', '70.049166', '', '0', '5482', '+923083718667', '0', '', '', '', '2021-04-23 02:39:15', ''),
(289866, '868003033946992', '', '33.989438', '71.591787', '', '0', 'JV-0826', '+923018580560', '1002.2450130000033', '', '', '', '2021-05-07 19:23:57', ''),
(289867, '868003033945556', '', '29.974128', '71.806045', '', '0', 'JU-9194', '+923018581233', '4250.697514999984', '', '', '', '2021-05-08 08:02:51', ''),
(289868, '868003033931903', '', '30.088007', '71.1837', '', '3', 'SAI-170', '+923018580561', '460.6850829999992', '', '', '', '2021-05-08 09:19:31', ''),
(289869, '868003033944799', '', '27.498901', '68.688182', '', '56', 'JY-3970', '+923018580563', '2838.0252150000088', '', '', '', '2021-05-08 09:02:06', ''),
(289870, '868003033928289', '', '31.276388', '74.172497', '', '0', 'TLF-761', '+923018580602', '9782.523901999935', '', '', '', '2021-04-17 02:20:45', ''),
(289871, '868003033933123', '', '24.849039', '67.308524', '', '0', 'TLE-278', '+923018580629', '5448.570475000032', '', '', '', '2021-05-08 09:14:29', ''),
(289872, '868003033944609', '', '24.872901', '66.906112', '', '0', 'Ju-8244', '+923018581244', '11051.474721999932', '', '', '', '2021-05-06 22:25:46', ''),
(289873, '868003033252524', '', '25.383783', '68.238907', '', '6', 'TLG-782', '+923182999381', '6555.887595000017', '', '', '', '2021-04-20 19:58:21', ''),
(289874, '358511022595585', '', '33.658363', '73.043625', '', '0', '5585', '+923161150883', '0', '', '', '', '2021-03-07 14:33:11', ''),
(289875, '868003033937603', '', '33.658783', '73.045219', '', '0', 'SAB-6228', '+923499816520', '5011.442490999936', '', '', '', '2021-05-07 09:37:36', ''),
(289876, '358735070237247', '', '25.347266', '68.284608', '', '0', 'GTI-175', '+923083719687', '19400.249013000088', '', '', '', '2021-04-19 17:12:00', ''),
(289877, '868003033258513', '', '31.39007', '74.149024', '', '0', 'BRXA-067', '+923083719590', '4167.669878999994', '', '', '', '2021-03-23 08:52:47', ''),
(289878, '868003032108347', '', '27.72061', '68.832793', '', '0', 'SAI-291', '+923083719545', '1129686.4144060102', '', '', '', '2021-03-29 16:16:06', ''),
(289879, '868003033928206', '', '31.588498', '74.260692', '', '0', '8206', '+923083719453', '0', '', '', '', '2021-05-03 14:02:32', ''),
(289880, '868003033257812', '', '31.484385', '73.139945', '', '0', 'JT-0010', '+923083719266', '2259.8173059999954', '', '', '', '2021-05-08 08:36:24', ''),
(289881, '868003032826690', '', '24.869735', '66.954826', '', '0', 'TMJ-262', '+923083719371', '6445.537971999982', '', '', '', '2021-04-26 10:24:43', ''),
(289882, '868003033946323', '', '25.753453', '68.503024', '', '35', 'TLM-291', '+923083687987', '327.00627700000086', '', '', '', '2021-04-29 11:46:31', ''),
(289883, '868003033252680', '', '31.486596', '74.342172', '', '0', '2680', '+923083720465', '0', '', '', '', '2021-05-05 18:28:37', ''),
(289884, '868003033288973', '', '31.349526', '74.125089', '', '0', 'TLF-570', '+923083720677', '9355.823931000006', '', '', '', '2021-05-08 07:58:38', ''),
(289885, '868003033932737', '', '31.577979', '73.526386', '', '0', '2737', '+923083720611', '197.96878600000008', '', '', '', '2021-05-08 08:46:53', ''),
(289886, '868003033258125', '', '31.073313', '73.612867', '', '0', 'LES-3797', '+923182988564', '3989.3169969999913', '', '', '', '2021-05-05 03:52:39', ''),
(289887, '868003033932760', '', '24.919258', '67.016756', '', '0', 'JY-9896', '+923083720730', '63.07494000000004', '', '', '', '2021-05-08 07:53:27', ''),
(289888, '868003033259842', '', '30.374839', '71.881831', '', '0', 'LXT-6673', '+923083715018', '1612.9416939999949', '', '', '', '2021-03-28 11:46:25', ''),
(289889, '868003033940201', '', '32.706463', '71.267064', '', '0', 'TKF-371', '+923497589305', '3545.818516999996', '', '', '', '2021-05-08 05:08:57', ''),
(289890, '868003033947495', '', '33.671533', '72.887748', '', '0', 'JV-1677', '+923497589382', '2175.903480999999', '', '', '', '2021-05-03 12:38:02', ''),
(289891, '868003033940243', '', '31.254471', '74.151188', '', '0', 'LRJ-1764', '+923497589106', '7939.891655999965', '', '', '', '2021-04-23 11:16:33', ''),
(289892, '868003033946174', '', '32.645078', '74.001087', '', '0', 'TAM-708', '+923497589377', '12805.81265000003', '', '', '', '2021-05-08 09:02:06', ''),
(289893, '868003033946059', '', '24.903658', '66.964874', '', '32', 'JV-6287', '+923497589294', '4400.684404000029', '', '', '', '2021-04-06 12:49:50', ''),
(289894, '868003033941837', '', '24.831622', '67.105003', '', '0', 'JV-3389', '+923497589293', '16307.882009000134', '', '', '', '2021-05-08 06:40:42', ''),
(289895, '868003033938015', '', '27.139199', '68.361888', '', '0', 'TME-239', '+923083714689', '1109.9142290000013', '', '', '', '2021-04-28 15:42:47', ''),
(289896, '868003033943635', '', '30.145398', '71.486866', '', '0', 'JU-4976', '+923083712488', '23610.323183999735', '', '', '', '2021-05-08 05:26:51', ''),
(289897, '358735070421965', '', '27.908568', '68.513573', '', '0', 'BMN-246', '+923168210660', '127086.5509840014', '', '', '', '2021-05-08 04:08:21', ''),
(289898, '358735070042449', '', '31.440003', '74.316875', '', '0', 'LZJ-7207', '+923172706289', '269014.09742300137', '', '', '', '2021-04-09 11:49:13', ''),
(289899, '868003033940433', '', '31.588558', '74.259848', '', '0', 'C-1458', '+923018581498', '2869.4437670000134', '', '', '', '2021-04-15 04:14:12', ''),
(289900, '868003033945648', '', '25.000586', '67.341186', '', '40', 'SA-3212', '+923018581497', '3530.2731619999818', '', '', '', '2021-04-01 03:05:39', ''),
(289901, '868003033947362', '', '26.431853', '68.016506', '', '0', 'TLD-870', '+923018581496', '4745.079821999993', '', '', '', '2021-04-23 14:17:25', ''),
(289902, '868003033946653', '', '31.466628', '73.195387', '', '0', 'LES-2885', '+923018581487', '16312.75373100007', '', '', '', '2021-05-08 08:59:59', ''),
(289903, '868003033938791', '', '33.587979', '71.207481', '', '13', 'Z-8168', '+923018581486', '5118.107241000008', '', '', '', '2021-05-08 09:13:00', ''),
(289904, '868003033940870', '', '24.836403', '67.281533', '', '0', 'JT-8410', '+923018581485', '17391.615285000044', '', '', '', '2021-05-06 22:57:32', ''),
(289905, '868003033945366', '', '25.367482', '68.211952', '', '41', 'TLG-799', '+923018581137', '2668.600702999992', '', '', '', '2021-04-09 10:56:52', ''),
(289906, '868003033942637', '', '33.544673', '73.151695', '', '0', 'Z-6630', '+923018581362', '13341.527553999924', '', '', '', '2021-05-08 04:20:33', ''),
(289907, '868003033942298', '', '33.212064', '72.360081', '', '0', 'JV-2020', '+923018581363', '13904.044048999935', '', '', '', '2021-05-08 05:24:32', ''),
(289908, '868003033945879', '', '28.283266', '70.050003', '', '0', '5879', '+923018580803', '0', '', '', '', '2021-04-19 02:45:11', ''),
(289909, '868003033940938', '', '31.053386', '72.981876', '', '33', 'SGD-787', '+923018580805', '2435.697531000004', '', '', '', '2021-04-19 22:26:29', ''),
(289910, '868003033946455', '', '31.432898', '74.357275', '', '0', 'TKW-622', '+923018580933', '1855.3094630000003', '', '', '', '2021-05-07 06:21:05', ''),
(289911, '868003033945069', '', '24.814562', '66.978338', '', '0', 'TLB-175', '+923018580956', '7238.098233000026', '', '', '', '2021-05-08 08:03:30', ''),
(289912, '868003033945192', '', '29.640708', '71.685994', '', '39', 'JU-6199', '+923497590500', '2494.7905600000036', '', '', '', '2021-04-07 11:29:32', ''),
(289913, '868003033947016', '', '26.048389', '68.334269', '', '29', 'JU-0071', '+923497590524', '17187.357507999783', '', '', '', '2021-05-08 09:17:58', ''),
(289914, '868003033937090', '', '30.754173', '73.559242', '', '0', 'JU-9393', '+923497590549', '2458.9107020000033', '', '', '', '2021-03-30 13:35:56', ''),
(289915, '868003033943171', '', '33.671213', '72.887884', '', '0', 'GLTE-2712', '+923497590515', '1060.998954', '', '', '', '2021-05-08 07:14:09', ''),
(289916, '868003033942785', '', '33.622963', '73.151534', '', '0', '2785', '+923497590544', '0', '', '', '', '2021-05-07 07:58:45', ''),
(289917, '868003033936142', '', '31.453186', '74.339172', '', '0', '6142', '+923497590565', '0', '', '', '', '2021-05-07 11:13:53', ''),
(289918, '868003033930103', '', '31.647776', '73.224504', '', '0', 'LWC-2196', '+923497590576', '2580.2711439999985', '', '', '', '2021-04-15 04:34:49', ''),
(289919, '868003033940441', '', '32.508443', '74.557098', '', '30', 'LWN-3349', '', '11685.837772999965', '', '', '', '2021-05-08 09:12:16', ''),
(289920, '868003032495736', '', '24.919287', '67.016471', '', '0', 'JU-2283', '+923332748422', '0.031824', '', '', '', '2021-05-08 06:33:07', ''),
(289921, '868003033943072', '', '25.149169', '67.797199', '', '0', 'JU-8093', '+923497590353', '3062.036363999984', '', '', '', '2021-05-08 03:35:36', ''),
(289922, '868003033947743', '', '25.327503', '68.128813', '', '69', 'TLA-916', '+923497590396', '404.4410589999999', '', '', '', '2021-04-01 14:15:39', ''),
(289923, '868003033943643', '', '34.010964', '71.784068', '', '0', '3643', '+923497589315', '0', '', '', '', '2021-04-17 04:54:41', ''),
(289924, '868003033945960', '', '33.654937', '73.042019', '', '0', '5960', '+923497590374', '3.255534000000001', '', '', '', '2021-05-06 08:34:02', ''),
(289925, '868003033944948', '', '31.638013', '74.207878', '', '0', 'PT-9544', '+923497589547', '7218.220837000016', '', '', '', '2021-04-25 11:21:38', ''),
(289926, '868003033943296', '', '24.849356', '66.982747', '', '0', 'JV-6280', '+923497589141', '1206.8197970000022', '', '', '', '2021-04-10 10:10:53', ''),
(289927, '868003033944088', '', '33.55794', '72.897231', '', '40', 'JU-6499', '+923497589137', '2621.5044160000007', '', '', '', '2021-04-09 15:22:44', ''),
(289928, '868003033929758', '', '33.671212', '72.887901', '', '0', 'GLTG-812', '+923497590184', '1002.5401129999997', '', '', '', '2021-05-08 06:00:30', ''),
(289929, '868003033945655', '', '29.346632', '71.594064', '', '0', 'PT-0675', '+923497590472', '3733.7087790000037', '', '', '', '2021-05-08 09:14:34', ''),
(289930, '868003033260154', '', '0', '0', '', '0', '0154', '+923497590147', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289931, '868003033941464', '', '33.574628', '73.209399', '', '0', 'AFR011580', '+923497590580', '980.6913809999976', '', '', '', '2021-05-07 11:43:11', ''),
(289932, '868003033941449', '', '26.166857', '68.235178', '', '33', 'JU-5564', '+923018580559', '1907.7539819999952', '', '', '', '2021-04-07 08:43:58', ''),
(289933, '868003032819075', '', '33.671288', '72.887612', '', '0', 'HNZ-1612', '+923083724322', '50665.99652099905', '', '', '', '2021-05-04 10:58:26', ''),
(289934, '868003033944963', '', '33.625577', '72.968812', '', '0', '4963', '+923332773611', '0', '', '', '', '2021-04-05 06:28:02', ''),
(289935, '868003033941282', '', '24.891946', '66.990966', '', '0', 'MNI-291', '+923497590237', '3827.6001830000064', '', '', '', '2021-04-26 01:29:09', ''),
(289936, '868003033947297', '', '31.4637', '74.223304', '', '0', 'LR-3585', '+923161150536', '4308.305820000022', '', '', '', '2021-04-30 04:50:32', ''),
(289937, '868003033940912', '', '31.127154', '73.916109', '', '42', 'TLF-677', '+923497590217', '4654.3759100000225', '', '', '', '2021-05-08 09:06:47', ''),
(289938, '868003033941563', '', '30.78738', '73.408372', '', '0', 'LES-2737', '+923497590243', '3102.870952999997', '', '', '', '2021-05-08 07:56:44', ''),
(289939, '868003033944526', '', '31.572537', '74.287935', '', '0', '4526', '+923497589584', '0', '', '', '', '2021-05-03 10:08:30', ''),
(289940, '868003033946521', '', '31.378761', '74.149178', '', '17', 'LES-4666', '+923182988573', '3356.6073040000015', '', '', '', '2021-05-06 09:16:04', ''),
(289941, '868003033940078', '', '33.90762', '72.842443', '', '0', 'JU-6564', '+923018581376', '690.0430489999994', '', '', '', '2021-05-08 08:05:07', ''),
(289942, '868003033944377', '', '24.355484', '69.358441', '', '0', 'TMC-820', '+923497589680', '2355.706374', '', '', '', '2021-05-08 01:30:55', ''),
(289943, '868003033947511', '', '31.531298', '74.321622', '', '11', '7511', '+923011154682', '14.828459999999994', '', '', '', '2021-05-03 14:35:15', ''),
(289944, '868003033947289', '', '30.662878', '73.142769', '', '0', 'TLV-235', '+923497589928', '324.3294560000005', '', '', '', '2021-05-06 11:59:03', ''),
(289945, '868003033944567', '', '27.642081', '68.831487', '', '35', 'TLG-934', '+923497589838', '7839.944703000017', '', '', '', '2021-05-08 09:00:52', ''),
(289946, '868003033946414', '', '31.658384', '74.022813', '', '0', 'LET-781', '+923497589926', '1967.2960349999873', '', '', '', '2021-05-07 23:04:27', ''),
(289947, '868003033942876', '', '28.04948', '69.674792', '', '32', 'JU-6548', '+923018581002', '4250.520672000018', '', '', '', '2021-05-08 07:41:49', ''),
(289948, '868003033936605', '', '31.556419', '74.419039', '', '0', 'LES-5234', '+923499843544', '7071.503981000031', '', '', '', '2021-05-08 06:26:11', ''),
(289949, '868003032816790', '', '33.98771', '72.171472', '', '0', 'LEI-8896', '+923011154629', '180608.7962170041', '', '', '', '2021-05-08 07:19:23', ''),
(289950, '868003033284592', '', '24.85689', '67.118648', '', '0', 'JV-5893', '+923083717392', '1427.870810999997', '', '', '', '2021-05-08 09:08:20', ''),
(289951, '868003033938676', '', '27.670695', '68.867628', '', '0', 'TW-667', '+923083708056', '3496.6762329999824', '', '', '', '2021-05-08 09:00:33', ''),
(289952, '868003033290771', '', '33.661757', '73.053025', '', '0', 'XA-272', '+923182999398', '2463.045377000028', '', '', '', '2021-05-06 12:50:09', ''),
(289953, '868003033930996', '', '33.657719', '73.046452', '', '0', 'C-2366', '+923083687312', '4045.9826189999962', '', '', '', '2021-05-07 21:59:53', ''),
(289954, '868003033286423', '', '31.528431', '74.284525', '', '0', 'SAC-4105', '+923497589837', '24329.211810999972', '', '', '', '2021-05-07 19:51:04', ''),
(289955, '868003033253589', '', '28.906647', '70.677917', '', '0', 'TLM-289', '+923303585085', '14776.932612999855', '', '', '', '2021-05-08 05:23:44', ''),
(289956, '868003033928776', '', '25.422884', '68.380991', '', '0', 'TKT-810', '+923028239109', '429.4359830000008', '', '', '', '2021-05-07 10:05:12', ''),
(289957, '868003033932430', '', '31.394362', '73.183559', '', '0', 'NAA-167', '+923028239112', '2135.9640869999917', '', '', '', '2021-05-02 00:24:12', ''),
(289958, '868003033930889', '', '29.450325', '71.641058', '', '0', 'FDJ-1877', '+923028239110', '3657.2101010000083', '', '', '', '2021-05-08 03:09:12', ''),
(289959, '868003033930236', '', '0', '0', '', '0', '0236', '+923028239107', '0', '', '', '', '0000-00-00 00:00:00', ''),
(289960, '868003033943148', '', '24.977313', '66.912188', '', '0', 'TMC-755', '+923028239130', '5012.976606999944', '', '', '', '2021-05-08 09:16:48', ''),
(289961, '868003033944641', '', '27.136725', '68.360108', '', '0', 'TLQ-106', '+923080411892', '470.9874940000014', '', '', '', '2021-05-08 08:56:28', ''),
(289962, '868003033947230', '', '28.294694', '70.080451', '', '0', '7230', '+923080411917', '0', '', '', '', '2021-05-05 12:28:55', ''),
(289963, '868003033937777', '', '32.212524', '71.536598', '', '0', 'HNR-4192', '+923080412082', '3469.60653799998', '', '', '', '2021-05-08 08:47:32', ''),
(289964, '868003033938981', '', '32.211936', '71.533355', '', '0', 'GZRA-992', '+923080412123', '3528.2114899999997', '', '', '', '2021-05-08 08:52:51', ''),
(289965, '868003033943049', '', '31.701969', '74.073579', '', '0', 'TLC-180', '+923497590103', '3631.3973999999885', '', '', '', '2021-05-08 07:59:09', ''),
(289966, '868003033941324', '', '33.657588', '73.046701', '', '0', 'RIN-8088', '+923499703585', '1391.9436649999977', '', '', '', '2021-05-08 03:15:09', ''),
(289967, '868003032817889', '', '27.167961', '68.388372', '', '0', 'JV-5199', '+923161205368', '4220.6191739999895', '', '', '', '2021-05-08 08:25:52', ''),
(289968, '868003033944310', '', '28.431238', '70.253813', '', '0', '4310', '+923497590521', '0', '', '', '', '2021-04-22 15:59:30', ''),
(289969, '868003033935151', '', '34.117089', '72.648077', '', '0', 'TMC-175', '+923499835216', '2881.976485', '', '', '', '2021-05-03 02:45:00', ''),
(289970, '868003033932216', '', '28.860472', '70.605596', '', '31', 'TKZ-546', '+923083687750', '5781.965300000046', '', '', '', '2021-05-08 08:49:01', ''),
(289971, '868003032495538', '', '31.541788', '74.352888', '', '0', '5538', '', '0', '', '', '', '2021-04-29 09:43:38', ''),
(289972, '868003033928792', '', '24.835241', '67.292466', '', '0', 'E-2698', '+923083725478', '239.85425199999972', '', '', '', '2021-05-08 07:22:32', ''),
(289973, '868003032822947', '', '31.436693', '72.939468', '', '51', 'TLH-178', '+923332772183', '204627.02697399908', '', '', '', '2021-05-08 09:00:42', '');

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
(41, 5, 1, 'hy', '2021-04-29 08:31:55', 1);

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
(2, 'Hamza', 'hamza@gmail.com', 'hamza123', 'TPL', 'Sales');

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
(10, 'Abdullah', '<h1><strong>Dear Sir .</strong></h1>\r\n\r\n<p><em><strong>Hello friends chai pelo.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Thank you.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n');

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
(42, 1, '2021-05-08 10:14:48', 'no'),
(43, 2, '2021-05-08 11:05:29', 'no'),
(44, 2, '2021-05-08 16:44:50', 'no');

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
(52, 'Abdullah', 'admin@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL);

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
(1, '', 'admin', 'admin', 'a2bcdad4b9bbaa7bfc1f95c3cc7a12fc', 1, 'Active', 'byco@go', 'karachi', '03137152168', 'abasit9119@gmail.com', 1, 1, '000111111111111100000000000000000000000000000', '1', NULL),
(2, '', 'Distributor', 'tmc', '0fd88a53fb4235c5a8a37ebeae719b0c', 1, 'Active', 'tmc@tracker', 'karachi', '03137152168', 'abasit9119@gmail.com', 1, 1, '000111111111111100000000000000000000000000000', '2', NULL),
(191, '', 'End-User', 'tpl', 'cbc00a7a4feca1fcbe7d43911c7ac49e', 1, 'Active', 'tpl@tracker', '', '', '', 1, 2, '000111111111111100000000000000000000000000000', '2', ''),
(192, '', 'End-User', 'resq', '951b48fe765d4200e48848047f91dc15', 1, 'Active', 'resq@tracker', '', '', '', 1, 2, '000111111111111100000000000000000000000000000', '2', ''),
(194, '', 'End-User', 'guest', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Active', '', '', '', '', 1, 2, '000010000100000000000000000000000000000000000', '2', ''),
(195, 'Hamza', 'Admin', 'hamza@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 0, '1', '12345678', '', '', 'hamza@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, 'Choose...'),
(52, 'Abdullah', 'Admin', 'admin@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 52, '1', '12345678', '', '', 'admin@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, 'Choose...');

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
-- Indexes for table `addasset`
--
ALTER TABLE `addasset`
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
-- AUTO_INCREMENT for table `addasset`
--
ALTER TABLE `addasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulkdata`
--
ALTER TABLE `bulkdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289974;

--
-- AUTO_INCREMENT for table `captain`
--
ALTER TABLE `captain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `crmusers`
--
ALTER TABLE `crmusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
--
-- Database: `traccar`
--
CREATE DATABASE IF NOT EXISTS `traccar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `traccar`;

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
  `id` varchar(255) DEFAULT NULL,
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `messsage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `userid`, `senderid`, `messsage`) VALUES
(1, 0, 0, 'han bhai'),
(2, 0, 0, 'oye'),
(3, 0, 0, 'han bhai'),
(4, 0, 0, 'hn');

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
(2, 'TPL', 'tpl@gmail.com', '1234567'),
(3, 'ResQ911 ', 'resq911@gmail.com', '123456789'),
(5, 'P2P Track', 'p2p@gmail.com', '1234567'),
(6, 'Basit', 'owner@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
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

INSERT INTO `complaint` (`id`, `complaint_no`, `type`, `vehicle_no`, `complaint_name`, `phone`, `party_acount`, `complaint_status`, `assign_to`, `assign_from`, `complaint`) VALUES
(3, '', 'Urgent', '4321', 'Samad', '9873453634', '', 'Completed', 'Choose...', 'Choose...', 'Tracker down problem'),
(5, '', 'Most Urgent', 'BMB  943', 'abc', '9873453634', '', 'Active', 'Choose...', 'Choose...', 'Data Not Show'),
(6, '', 'General', '11223', 'basit', '9873453634', '', 'Pending', 'Choose...', 'Choose...', 'Tracker not Start'),
(7, '', 'Most Urgent', 'BMB  943', 'Hamza', '9873453634', '', 'Active', 'Choose...', 'Choose...', 'Tracker'),
(8, '', 'Urgent', '112233', 'usman', '03009299649', '', 'Active', 'Choose...', 'Choose...', 'Tracker Lost'),
(12, '', '', '', '', '9873453634', '', '', '', '', ''),
(13, '', '', '', '', '9873453634', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `create_group`
--

CREATE TABLE `create_group` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_group`
--

INSERT INTO `create_group` (`id`, `user_id`, `name`) VALUES
(20, 1, 'AV TRACK'),
(21, 0, 'Autoveto Groups');

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
(2, 'Hamza', 'hamza@gmail.com', 'hamza123', 'TPL', 'Sales');

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
(8, 'Editor Test', '');

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
-- Table structure for table `imei`
--

CREATE TABLE `imei` (
  `id` int(22) NOT NULL,
  `imei` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imei`
--

INSERT INTO `imei` (`id`, `imei`) VALUES
(1, '2121233232431244232'),
(2, '44555624634725343');

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
  `id` int(11) NOT NULL,
  `dt_server` varchar(255) NOT NULL,
  `imei` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `angle` varchar(255) NOT NULL,
  `speed` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sim_number` varchar(255) NOT NULL,
  `odometer` varchar(255) NOT NULL,
  `params` varchar(25) NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `dt_last_idle` varchar(255) NOT NULL,
  `dt_last_move` varchar(255) NOT NULL,
  `dt_last_stop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `dt_server`, `imei`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `params`, `protocol`, `dt_last_idle`, `dt_last_move`, `dt_last_stop`) VALUES
(384417, '2020-02-28 06:15:12', '358735070043132', '27.761756', '68.797268', '', ' 0', 'TLA-357', '+923172706334', '103597.58801300002', '', '', '2020-02-28 05:18:38', '', ''),
(384418, '2020-08-18 07:22:54', '358735070905280', '24.87567', '67.299745', '', ' 0', 'TLF-437', '+923030391033', '54329.998220999965', '', '', '2020-02-12 11:31:24', '', ''),
(384419, '2019-10-17 07:07:34', '358735070575075', '24.942805', '66.719892', '', ' 0', '5075', '+923080416965', '0', '', '', '2019-10-11 09:37:01', '', ''),
(384420, '2020-01-30 06:43:41', '358735070903988', '27.085362', '68.31954', '', ' 7', 'JQ-1236', '+923337960308', '45085.55236200003', '', '', '2020-01-30 06:43:41', '', ''),
(384421, '2021-04-25 13:52:57', '868003031114395', '30.037865', '72.32455', '', ' 0', 'TMG-211', '+923337960712', '263628.0372939913', '', '', '2021-04-25 13:50:32', '', ''),
(384422, '2021-04-27 03:30:18', '358735070903749', '33.548183', '73.200595', '', ' 0', 'JQ-8094', '+923030390730', '146365.33564499934', '', '', '2021-04-27 03:21:37', '', ''),
(384423, '2019-10-07 09:20:46', '868003031120780', '25.023643', '66.983584', '', ' 0', 'TMG-045', '+923030413505', '35794.018513000134', '', '', '2019-10-05 14:56:06', '', ''),
(384424, '2021-04-27 11:14:59', '868003031114106', '24.94022', '66.721032', '', ' 0', 'TMH-522', '+923030411455', '212020.1735190035', '', '', '2021-04-27 06:07:05', '', ''),
(384425, '2021-04-27 11:16:05', '868003031120152', '24.919051', '66.705617', '', ' 0', 'TMG-700', '+923030414707', '149100.5763339998', '', '', '2021-04-27 10:38:47', '', ''),
(384426, '2019-11-18 23:31:32', '352094080397117', '24.952018', '67.080528', '', ' 0', 'KW-8095', '+923337960817', '21754.548329999958', '', '', '2019-11-18 14:27:30', '', ''),
(384427, '2019-07-06 09:51:39', '358735070904275', '25.346161', '68.400317', '', ' 40', 'PTR-0198', '+923331034518', '6653.363357000062', '', '', '2019-07-06 09:01:06', '', ''),
(384428, '2021-02-22 06:23:43', '358511021644947', '24.882298', '67.063156', '', ' 24', 'TUD-595', '+923331034539', '73237.08536000115', '', '', '2021-02-22 06:22:41', '', ''),
(384429, '2021-04-27 11:11:30', '868003031522167', '31.198177', '72.726235', '', ' 0', 'BDC-457', '+923081245180', '210804.20562300476', '', '', '2021-04-27 07:51:48', '', ''),
(384430, '2019-10-25 11:21:40', '868003031519445', '24.817303', '66.993538', '', ' 2', 'TMF-990', '+923081245182', '30348.263288999737', '', '', '2019-10-25 10:31:29', '', ''),
(384431, '2019-12-10 07:10:02', '868003031520245', '27.801495', '68.309085', '', ' 30', 'TLQ-992', '+923081245170', '15310.474883999868', '', '', '2019-12-10 07:04:51', '', ''),
(384432, '2021-04-27 07:12:36', '868003031119774', '28.035902', '68.839669', '', ' 0', 'TUD-998', '+923030417067', '186034.98293400832', '', '', '2021-04-27 07:10:03', '', ''),
(384433, '2021-04-27 11:14:46', '358511022595015', '28.035922', '68.839763', '', ' 0', 'TUD-898', '+923018733716', '148751.3105750015', '', '', '2021-04-27 09:40:17', '', ''),
(384434, '2019-10-07 09:35:33', '358735070902030', '25.023634', '66.983588', '', ' 0', 'TMG-900', '+923337960564', '14225.495990999996', '', '', '2019-10-05 15:04:17', '', ''),
(384435, '2019-03-14 13:12:31', '868003031113991', '31.393772', '74.310567', '', ' 0', 'LES-14-4445', '+923030416838', '4034.0711460000007', '', '', '2019-03-14 07:36:30', '', ''),
(384436, '2019-09-18 21:42:28', '868003031120228', '31.275968', '74.163167', '', ' 0', 'JGI-18-114', '+923030414855', '14194.848859000089', '', '', '2019-09-18 19:09:37', '', ''),
(384437, '2021-04-19 12:26:00', '868003031119873', '31.533571', '74.344825', '', ' 0', 'MNS-07-2225', '+923030415036', '42439.15230599982', '', '', '2020-09-21 05:15:56', '', ''),
(384438, '2019-09-13 06:34:27', '358735070902386', '31.600562', '74.312174', '', ' 0', 'SDK-9721', '+923337960256', '29912.112741999976', '', '', '2019-09-12 16:19:26', '', ''),
(384439, '2021-04-27 11:15:31', '868003031120988', '32.316502', '74.144343', '', ' 0', 'LEI-16-3941', '+923030396459', '67502.66717999888', '', '', '2021-04-27 10:48:43', '', ''),
(384440, '2019-05-21 11:15:58', '868003031117901', '31.447215', '74.316363', '', ' 0', 'FDZ-3284', '+923030417030', '10599.480973000105', '', '', '2019-05-21 08:13:31', '', ''),
(384441, '2020-12-02 09:43:05', '358735070903137', '31.614297', '74.291785', '', ' 0', 'LES-16-6138', '+923337960259', '59908.51612199933', '', '', '2020-12-01 06:53:10', '', ''),
(384442, '2019-11-16 14:07:00', '358735070041482', '24.832934', '66.984697', '', ' 0', 'TLN-120', '+923172706346', '4139.098955000025', '', '', '2019-11-16 13:38:27', '', ''),
(384443, '2019-04-16 13:40:08', '868003031522449', '24.844728', '67.227015', '', ' 14', 'TLA-436', '+923081245195', '22.800613000000006', '', '', '2019-04-16 13:00:45', '', ''),
(384444, '2019-02-27 14:49:25', '868003031116242', '24.852135', '66.983912', '', ' 0', 'JU-4617', '+923030417718', '961.2641909999999', '', '', '2019-02-13 18:27:04', '', ''),
(384445, '2019-05-10 17:09:08', '868003031114288', '24.788613', '67.339366', '', ' 0', 'LT-5647', '+923030417677', '2363.191552999997', '', '', '2019-05-10 16:14:37', '', ''),
(384446, '2019-05-16 20:34:43', '868003031115319', '24.785668', '67.351522', '', ' 0', 'TLA-382', '+923030418325', '1090.1084329999999', '', '', '2019-05-16 20:29:57', '', ''),
(384447, '2019-05-01 08:33:32', '868003031114361', '24.801534', '67.324315', '', ' 0', 'JU-4869', '+923030399094', '1386.9015109999978', '', '', '2019-05-01 08:27:25', '', ''),
(384448, '2020-02-11 13:22:54', '868003031118529', '24.828048', '67.242208', '', ' 0', 'TMB-120', '+923030417618', '1868.326586999996', '', '', '2020-02-11 13:15:00', '', ''),
(384449, '2019-10-26 15:01:32', '868003031115053', '24.787683', '67.341656', '', ' 0', 'SPA-228', '+923030417648', '2932.459324000002', '', '', '2019-10-26 14:50:38', '', ''),
(384450, '2020-12-29 10:55:30', '868003031520641', '24.874724', '67.3052', '', ' 0', 'TUD-896', '+923331029611', '199542.1068489957', '', '', '2020-12-29 10:51:21', '', ''),
(384451, '2021-04-27 11:15:27', '868003031523900', '25.831647', '68.42631', '', ' 48', 'TUD-996', '+923331029609', '130892.00920699869', '', '', '2021-04-27 07:22:07', '', ''),
(384452, '2019-11-08 02:34:32', '358511020972687', '24.882282', '67.185746', '', ' 0', 'KQ-4232', '+923331029627', '6045.3915379999735', '', '', '2019-11-07 08:08:35', '', ''),
(384453, '2021-01-09 09:08:36', '868003031866945', '27.574495', '67.819033', '', ' 85', 'BQD-203', '+923182165158', '33475.577916999595', '', '', '2021-01-09 08:49:15', '', ''),
(384454, '2020-01-24 09:40:10', '358511021903640', '24.838125', '67.04726', '', ' 0', 'CU-8356', '+923028117043', '51642.14522399963', '', '', '2020-01-24 07:44:19', '', ''),
(384455, '2021-04-27 11:16:05', '868003032110053', '30.20162', '71.455337', '', ' 21', 'LE-6239', '+923083013212', '1441649.3361200413', '', '', '2021-04-27 11:00:21', '', ''),
(384456, '2021-04-27 11:14:40', '358735070904382', '31.65381', '71.323613', '', ' 38', 'JQ-9094', '+923030390712', '156170.24205799802', '', '', '2021-04-27 10:21:05', '', ''),
(384457, '2021-04-27 11:15:19', '868003031523108', '24.872322', '67.06104', '', ' 0', 'AXY-829', '+923018733624', '26602.509704000313', '', '', '2021-04-27 06:25:36', '', ''),
(384458, '2021-04-27 11:15:10', '868003031870210', '30.194827', '71.479197', '', ' 0', 'AFR0891859', '+923182165179', '357722.05363000353', '', '', '2021-04-27 10:14:13', '', ''),
(384459, '2021-04-27 11:16:05', '868003031114551', '26.066672', '68.322119', '', ' 49', 'TMH-498', '+923337960227', '150110.8388659919', '', '', '2021-04-27 10:54:54', '', ''),
(384460, '2021-04-27 11:15:00', '868003032821519', '24.903073', '66.997952', '', ' 0', 'TKA-002', '+923332748370', '49891.79293600128', '', '', '2021-04-26 20:08:39', '', ''),
(384461, '2021-04-27 11:14:26', '868003032835105', '24.903693', '66.99898', '', ' 0', 'TKY-443', '+923332748348', '49265.97840700059', '', '', '2021-04-27 11:12:37', '', ''),
(384462, '2021-04-27 04:01:34', '868003032825668', '24.902834', '66.997996', '', ' 0', 'TAC-649', '+923332748347', '98097.56268199888', '', '', '2021-04-27 03:58:53', '', ''),
(384463, '2021-04-27 11:15:49', '868003032834173', '24.903023', '66.998433', '', ' 0', 'TKJ-632', '+923332748364', '67925.44226700114', '', '', '2021-04-27 10:42:33', '', ''),
(384464, '2021-04-27 11:15:05', '868003032823838', '24.90348', '66.99881', '', ' 0', 'TKJ-809', '+923332748340', '32343.35804099956', '', '', '2021-04-27 10:28:09', '', ''),
(384465, '2021-04-27 11:15:00', '868003032821907', '24.920908', '66.947733', '', ' 0', 'TAL-625', '+923332748425', '98052.16712799942', '', '', '2021-04-27 07:58:58', '', ''),
(384466, '2021-04-27 11:15:04', '868003032821436', '24.901987', '66.997992', '', ' 0', 'TKG-685', '+923332748361', '68096.13944299938', '', '', '2021-04-27 03:15:52', '', ''),
(384467, '2021-04-27 11:14:31', '868003032832250', '24.903273', '66.998416', '', ' 0', 'TAK-067', '+923332748355', '96848.759925001', '', '', '2021-04-27 10:52:10', '', ''),
(384468, '2021-04-27 11:15:34', '868003032829256', '24.902717', '66.998071', '', ' 0', 'JV-4813', '+923332748343', '33344.89696299946', '', '', '2021-04-27 11:04:34', '', ''),
(384469, '2021-04-27 11:16:00', '868003032833449', '24.938273', '66.999912', '', ' 0', 'TKA-031', '+923332748367', '65508.565132002324', '', '', '2021-04-27 11:15:14', '', ''),
(384470, '2021-04-26 13:31:41', '868003032823879', '24.90351', '66.997917', '', ' 0', 'TKZ-124', '+923332748359', '134098.881573003', '', '', '2021-04-25 02:03:12', '', ''),
(384471, '2021-04-27 11:13:15', '868003032834793', '24.902742', '66.998123', '', ' 0', 'LS-9289', '+923332748360', '28753.625548999287', '', '', '2021-04-27 10:02:06', '', ''),
(384472, '2021-04-27 11:14:57', '868003032822657', '24.90292', '66.998082', '', ' 0', 'K-3708', '+923332772054', '57026.231241000045', '', '', '2021-04-27 06:56:56', '', ''),
(384473, '2021-04-27 10:56:09', '868003032834405', '24.841402', '67.309773', '', ' 0', 'TKA-768', '+923332748346', '64297.20294600036', '', '', '2021-04-27 10:40:49', '', ''),
(384474, '2021-04-27 11:16:04', '868003032829652', '24.842327', '67.225183', '', ' 0', 'TLF-334', '+923332772043', '72356.1792610024', '', '', '2021-04-27 10:31:48', '', ''),
(384475, '2021-04-27 08:03:35', '868003032835584', '25.107376', '67.600072', '', ' 0', 'P-9937', '+923332772041', '94431.61843000141', '', '', '2021-04-27 03:14:51', '', ''),
(384476, '2021-04-26 15:30:46', '868003032831252', '24.901892', '66.998048', '', ' 0', 'JV-2839', '+923332772048', '124932.32155199931', '', '', '2021-04-26 15:30:18', '', ''),
(384477, '2021-04-27 11:16:02', '868003032834686', '25.037035', '66.872422', '', ' 28', 'JV-3567', '+923332772057', '187014.26431700354', '', '', '2021-04-27 10:54:21', '', ''),
(384478, '2021-02-22 08:57:26', '868003032823457', '24.97825', '67.276287', '', ' 0', 'TLZ-989', '+923332772037', '102289.26868600077', '', '', '2021-02-20 10:43:09', '', ''),
(384479, '2020-02-27 11:37:38', '358735070001200', '24.899316', '66.997036', '', ' 0', '1200', '+923332758937', '825.8212799999998', '', '', '2020-02-27 11:36:04', '', ''),
(384480, '2021-04-27 11:15:48', '868003032833019', '25.160953', '67.817653', '', ' 0', 'TLB-263', '+923332772058', '98792.87667399927', '', '', '2021-04-27 03:54:18', '', ''),
(384481, '2021-04-27 11:14:47', '868003032822103', '24.84079', '67.309453', '', ' 0', 'TLK-731', '+923332772106', '133033.43128599811', '', '', '2021-04-27 10:59:25', '', ''),
(384482, '2021-04-27 11:15:39', '868003032822624', '24.840904', '67.30952', '', ' 0', 'TMF-218', '+923332772104', '85233.39754699887', '', '', '2021-04-27 10:53:37', '', ''),
(384483, '2021-04-27 11:14:16', '868003032114055', '28.03768', '68.84306', '', ' 0', 'LES-15-737', '+923083012859', '3889262.7748408485', '', '', '2021-04-27 10:52:15', '', ''),
(384484, '2021-04-27 05:33:33', '868003031120913', '25.186588', '67.865428', '', ' 0', 'FWO-8388', '+923030396208', '259099.18870999455', '', '', '2021-04-26 13:53:53', '', ''),
(384485, '2019-09-24 14:06:11', '358735070902972', '24.894435', '67.001223', '', ' 0', '2972', '+923030389240', '28722.173580000024', '', '', '2019-09-24 13:58:08', '', ''),
(384486, '2020-02-26 11:02:33', '868003032109444', '30.086443', '66.932495', '', ' 0', 'NAC-323', '+923308569887', '73858.57160999978', '', '', '2020-02-26 02:42:47', '', ''),
(384487, '2020-02-23 19:08:44', '868003032494564', '27.81166', '66.605173', '', ' 0', 'TLZ-958', '+923012445623', '721.1230730000003', '', '', '2020-02-23 17:38:22', '', ''),
(384488, '2020-03-25 05:18:32', '868003032818945', '24.790868', '67.336489', '', ' 0', '8945', '+923332773506', '0', '', '', '2020-03-25 03:28:52', '', ''),
(384489, '2020-07-17 14:06:43', '868003032819737', '24.822332', '67.295412', '', ' 0', '9737', '+923332773510', '0', '', '', '2020-07-10 15:10:44', '', ''),
(384490, '2021-04-03 12:08:06', '868003032820479', '31.485366', '73.28546', '', ' 0', 'FDC-9465', '+923332773518', '4847.649854000014', '', '', '2021-04-02 17:38:35', '', ''),
(384491, '2021-04-12 22:04:34', '868003032834629', '30.559895', '72.085323', '', ' 16', 'FDE-3276', '+923332773417', '6500.599653000007', '', '', '2021-04-12 22:04:24', '', ''),
(384492, '2021-03-30 12:47:33', '868003032822327', '30.156298', '71.461265', '', ' 18', 'E-4091', '+923332773458', '1793.3688100000006', '', '', '2021-03-30 12:44:48', '', ''),
(384493, '2021-04-27 11:15:35', '358511020861872', '30.110257', '71.496803', '', ' 0', 'E-8361', '+923083715605', '12169.186881999989', '', '', '2021-04-27 11:15:02', '', ''),
(384494, '2021-02-07 05:51:17', '868003032817871', '31.700183', '74.030007', '', ' 0', '1871', '+923332773576', '0', '', '', '2021-02-07 04:59:33', '', ''),
(384495, '2020-12-26 02:39:45', '868003032816212', '24.962292', '66.921922', '', ' 0', '6212', '+923332773579', '0', '', '', '2020-12-25 11:14:55', '', ''),
(384496, '2021-02-27 14:27:33', '868003032819620', '31.679813', '74.201982', '', ' 34', 'FDF-6084', '+923332773619', '4929.371363999937', '', '', '2021-02-27 14:15:21', '', ''),
(384497, '2021-03-18 19:23:44', '868003032817178', '24.792597', '67.523513', '', ' 40', 'JU-2118', '+923332773627', '207269.62279500184', '', '', '2021-03-18 19:10:10', '', ''),
(384498, '2021-04-27 11:14:23', '868003032816451', '27.911708', '69.175487', '', ' 38', 'TLB-668', '+923011154617', '6113.334531000072', '', '', '2021-04-27 10:32:12', '', ''),
(384499, '2021-03-08 18:22:42', '868003032818234', '28.044018', '69.661533', '', ' 0', 'TLK-322', '+923011154595', '1598.020517999995', '', '', '2021-03-08 18:01:46', '', ''),
(384500, '2021-04-27 11:16:00', '868003032817798', '28.213135', '69.88442', '', ' 38', 'TKB-644', '+923011154594', '44110.88569900021', '', '', '2021-04-27 10:22:26', '', ''),
(384501, '2021-04-27 11:15:52', '868003032818077', '24.836235', '67.281636', '', ' 0', 'C-2644', '+923011154593', '79957.26476499965', '', '', '2021-04-27 04:33:42', '', ''),
(384502, '2021-04-27 11:16:01', '868003032817434', '29.51134', '71.636792', '', ' 5', 'JW-7750', '+923011154635', '217640.89119899506', '', '', '2021-04-27 11:07:05', '', ''),
(384503, '2020-06-28 18:12:03', '868003032819984', '31.468163', '74.349741', '', ' 0', 'TLE-851', '+923011154609', '1997.5840749999998', '', '', '2020-06-28 18:10:04', '', ''),
(384504, '2020-03-27 08:22:51', '868003032817020', '29.589956', '71.665138', '', ' 35', 'JU-6023', '+923011154633', '3215.699122000029', '', '', '2020-03-27 07:16:10', '', ''),
(384505, '2021-04-27 11:16:07', '868003032819554', '31.58867', '74.25969', '', ' 0', '9554', '+923011154616', '0', '', '', '2021-04-26 04:00:44', '', ''),
(384506, '2021-04-07 11:12:44', '868003032821550', '31.596011', '74.318199', '', ' 3', 'RNC-9869', '+923332773163', '136298.07690100124', '', '', '2021-04-07 11:10:57', '', ''),
(384507, '2021-04-27 11:14:53', '868003032835089', '31.595605', '74.319003', '', ' 0', 'SLB-4292', '+923011154580', '97594.60049900184', '', '', '2021-04-26 22:02:36', '', ''),
(384508, '2021-04-27 11:14:49', '868003032827623', '31.596205', '74.325362', '', ' 0', 'LHJ-8375', '+923011154591', '30122.74003900005', '', '', '2021-04-27 09:45:22', '', ''),
(384509, '2021-03-14 11:29:35', '358735070904788', '24.955248', '67.135592', '', ' 0', 'JQ-1358', '+923030389059', '99391.2171340002', '', '', '2021-03-04 02:29:30', '', ''),
(384510, '2020-12-28 08:51:32', '868003032819166', '30.20422', '71.51058', '', ' 0', 'E-2118', '+923181142443', '138576.6413480013', '', '', '2020-12-07 10:02:29', '', ''),
(384511, '2021-04-27 11:16:08', '358511021646256', '31.593917', '74.322467', '', ' 0', 'LEI-14A-9299', '+923028517043', '181913.1179550009', '', '', '2021-04-27 10:06:12', '', ''),
(384512, '2020-07-12 18:08:54', '868003032817525', '30.991383', '73.804938', '', ' 0', 'TLG-256', '+923181142551', '2371.6025069999982', '', '', '2020-07-12 07:36:00', '', ''),
(384513, '2020-09-23 11:37:51', '868003032816204', '27.970473', '69.268863', '', ' 28', '6204', '+923181142545', '0', '', '', '2020-09-23 11:36:47', '', ''),
(384514, '2021-01-28 11:03:25', '358735070044916', '24.94957', '67.081419', '', ' 0', 'E-2117', '+923013794557', '24168.24882300009', '', '', '2021-01-18 04:14:02', '', ''),
(384515, '2020-12-29 10:17:29', '358735070902519', '33.685446', '72.843782', '', ' 0', 'TUD-587', '+923030392915', '81750.8903959978', '', '', '2020-12-07 07:05:53', '', ''),
(384516, '2021-04-27 11:14:48', '868003032816972', '24.855025', '67.276565', '', ' 0', 'TLC-445', '+923011154563', '1761.7842660000044', '', '', '2021-04-26 12:38:15', '', ''),
(384517, '2021-04-27 11:15:30', '868003032820982', '33.587678', '73.05895', '', ' 0', 'LES-433', '+923181142495', '5359.459668000013', '', '', '2021-04-27 10:38:19', '', ''),
(384518, '2021-01-26 07:19:38', '868003032819653', '32.262818', '74.163555', '', ' 0', '9653', '+923181142496', '0', '', '', '2020-06-16 06:08:05', '', ''),
(384519, '2020-03-24 14:56:34', '868003032819927', '31.539737', '74.359379', '', ' 0', '9927', '+923181142466', '0', '', '', '2020-03-24 13:39:42', '', ''),
(384520, '0000-00-00 00:00:00', '868003032494093', '0', '0', '', ' 0', '4093', '+923181142473', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384521, '2020-12-13 06:32:47', '868003032819471', '28.291865', '70.07315', '', ' 0', 'TLP-369', '+923181142510', '208840.13829299915', '', '', '2020-12-13 03:50:59', '', ''),
(384522, '2020-06-10 07:02:33', '868003032816782', '25.377293', '68.22733', '', ' 0', 'TLA-049', '+923181142513', '2789.3450230000085', '', '', '2020-06-10 06:47:31', '', ''),
(384523, '2021-04-12 11:12:32', '868003032817723', '28.290117', '70.064948', '', ' 0', '7723', '+923181142481', '0', '', '', '2021-04-12 11:12:03', '', ''),
(384524, '2021-03-01 21:39:27', '868003032818572', '31.013527', '72.393478', '', ' 35', 'C-8540', '+923181142497', '12147.557351000032', '', '', '2021-03-01 19:04:10', '', ''),
(384525, '2021-02-23 06:42:52', '868003032817376', '30.144238', '71.479525', '', ' 0', 'LES-1212', '+923011154556', '3700.2216869999993', '', '', '2021-02-20 19:12:22', '', ''),
(384526, '2021-02-07 13:44:58', '868003032830817', '25.821368', '68.429428', '', ' 0', 'E-1009', '+923011154552', '25781.71788599981', '', '', '2021-02-07 13:30:28', '', ''),
(384527, '2021-04-03 12:24:34', '868003032832276', '24.925406', '67.01794', '', ' 0', '2276', '+923011154644', '0', '', '', '2021-04-03 11:22:15', '', ''),
(384528, '2021-04-27 11:16:03', '868003032821139', '32.632226', '71.737489', '', ' 8', 'GZR-249', '+923011154640', '111616.56944899898', '', '', '2021-04-27 10:11:41', '', ''),
(384529, '2020-12-26 07:21:49', '868003032819935', '24.816209', '67.027507', '', ' 0', '9935', '', '147.5811089999999', '', '', '2020-12-21 07:47:34', '', ''),
(384530, '2020-07-28 12:55:40', '868003032490901', '31.685456', '74.067803', '', ' 0', 'TLH-753', '+923012463060', '39702.61443899984', '', '', '2020-07-28 11:59:52', '', ''),
(384531, '2021-04-19 15:11:40', '868003032833985', '30.168998', '71.505722', '', ' 0', 'C-9021', '+923332772368', '100237.58542500094', '', '', '2021-04-19 14:57:13', '', ''),
(384532, '2021-04-24 04:11:11', '868003032819364', '26.589713', '68.299838', '', ' 0', 'OK-4788', '+923011154568', '295800.5594919902', '', '', '2021-04-24 03:44:08', '', ''),
(384533, '2021-04-27 11:15:01', '868003032822533', '31.598533', '74.326982', '', ' 0', 'KS-2550', '+923332772193', '88992.45563100147', '', '', '2021-04-27 10:24:46', '', ''),
(384534, '2020-12-30 09:18:29', '868003032488392', '24.854418', '67.117013', '', ' 0', 'TLK-090', '+923182165424', '3529.77068', '', '', '2020-12-28 20:42:31', '', ''),
(384535, '2021-04-27 11:15:40', '868003032819091', '33.65822', '73.043593', '', ' 0', 'RIS-2621', '+923181142468', '21477.272279000077', '', '', '2021-04-26 20:44:18', '', ''),
(384536, '2021-04-27 11:16:03', '868003033284881', '33.004384', '73.662156', '', ' 0', 'LET-8872', '+923011154715', '46862.197653999574', '', '', '2021-04-27 07:43:30', '', ''),
(384537, '2021-04-27 03:51:51', '868003032493459', '35.464982', '73.967193', '', ' 22', 'GLTE-2212', '+923012445958', '192894.06475900218', '', '', '2021-04-27 03:20:29', '', ''),
(384538, '2021-04-27 11:15:46', '868003032819174', '33.806718', '72.699522', '', ' 0', 'GLTE-2512', '+923011154642', '46265.562114000386', '', '', '2021-04-27 08:07:17', '', ''),
(384539, '2021-04-21 17:42:24', '868003033258265', '31.278449', '74.162202', '', ' 0', '8265', '+923011154694', '0', '', '', '2021-04-21 07:48:12', '', ''),
(384540, '2021-04-27 11:14:47', '868003033256632', '25.5382', '68.434511', '', ' 0', 'HNZ-151', '+923011154714', '293.2409389999996', '', '', '2021-04-27 10:52:57', '', ''),
(384541, '2021-04-27 11:15:37', '868003031120673', '24.882622', '66.968217', '', ' 0', 'TLY-850', '+923030414191', '263339.25691998855', '', '', '2021-04-27 11:06:10', '', ''),
(384542, '2021-04-27 11:16:06', '868003033252805', '25.066202', '67.495524', '', ' 44', 'TAN-112', '+923011154716', '7134.474917000021', '', '', '2021-04-27 10:57:58', '', ''),
(384543, '2021-04-27 11:14:40', '868003032833324', '34.38953', '73.205567', '', ' 0', 'HNZ-1512', '+923332772484', '137378.0764139972', '', '', '2021-04-27 03:24:23', '', ''),
(384544, '2021-04-24 09:42:26', '868003032820636', '33.661265', '73.045336', '', ' 2', 'STD-4057', '+923030388162', '23880.8102150002', '', '', '2021-04-24 09:42:17', '', ''),
(384545, '0000-00-00 00:00:00', '868003033284683', '0', '0', '', ' 0', 'TLZ-887', '+923182165218', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384546, '2020-06-25 18:22:25', '868003033254645', '25.23801', '62.374858', '', ' 60', 'TLV-708', '+923011154655', '897.3511480000025', '', '', '2020-06-25 18:18:09', '', ''),
(384547, '2021-04-27 11:14:06', '868003033259339', '32.241634', '72.486229', '', ' 0', 'PT-0717', '+923011154675', '48636.354990000706', '', '', '2021-04-27 10:05:56', '', ''),
(384548, '2021-04-27 03:51:50', '868003033253605', '35.465639', '73.966652', '', ' 18', 'HNZ-1812', '+923011154719', '54493.529822000935', '', '', '2021-04-27 03:20:06', '', ''),
(384549, '2021-04-27 11:14:42', '868003032819000', '33.67177', '72.887457', '', ' 0', 'HNZ-912', '+923011154549', '70256.60226700049', '', '', '2021-04-26 05:52:37', '', ''),
(384550, '2020-06-16 09:59:50', '356307040096561', '24.826763', '67.03405', '', ' 0', '3409763', '', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384551, '2021-04-27 11:15:19', '868003032817459', '31.59368', '74.325995', '', ' 0', 'SGC-9295', '+923011154606', '19955.748185999717', '', '', '2021-04-27 11:05:28', '', ''),
(384552, '2020-08-20 09:16:42', '868003033254470', '31.365383', '72.925706', '', ' 0', 'SAI-211', '+923303585068', '1574.7073820000012', '', '', '2020-08-20 09:13:15', '', ''),
(384553, '2021-04-27 11:15:18', '868003033256715', '31.254459', '74.151269', '', ' 0', 'LES-4509', '+923303585066', '15745.987619999929', '', '', '2021-04-26 15:10:02', '', ''),
(384554, '2020-08-24 11:00:06', '868003033257390', '27.475072', '68.673319', '', ' 18', 'EA-7170', '+923303585059', '7823.622824000016', '', '', '2020-08-24 10:32:46', '', ''),
(384555, '2020-06-30 11:19:52', '868003032487998', '29.748046', '66.823138', '', ' 49', 'TKQ-157', '+923012453877', '1764.1914710000037', '', '', '2020-06-30 09:52:47', '', ''),
(384556, '2021-04-27 11:14:47', '358511022790665', '28.790083', '70.521143', '', ' 0', 'GLTD-1955', '+923018434238', '368769.43598100304', '', '', '2021-04-27 09:37:26', '', ''),
(384557, '2021-04-27 11:16:02', '868003033289120', '31.270288', '74.105091', '', ' 5', 'MNI-314', '+923303585086', '8894.602887999989', '', '', '2021-04-27 11:15:42', '', ''),
(384558, '2021-04-09 03:45:39', '868003033255824', '33.857436', '72.854793', '', ' 0', 'TLG-514', '+923303585074', '732.9885259999998', '', '', '2021-04-09 03:43:26', '', ''),
(384559, '2021-04-27 10:56:28', '868003033286076', '29.089352', '71.037896', '', ' 17', 'MNI-773', '+923303585082', '47274.97213800024', '', '', '2021-04-27 09:03:44', '', ''),
(384560, '2021-04-23 04:56:32', '868003033291241', '33.661533', '73.045222', '', ' 0', '1241', '+923303585073', '0', '', '', '2021-04-23 03:53:50', '', ''),
(384561, '2021-03-31 02:00:08', '868003033253688', '29.248077', '71.042801', '', ' 40', 'E-7402', '+923303585083', '21585.181191999767', '', '', '2021-03-31 01:54:57', '', ''),
(384562, '0000-00-00 00:00:00', '868003033255451', '0', '0', '', ' 0', '5451', '+923030397827', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384563, '2020-07-15 10:56:36', '868003032824349', '25.039605', '66.869536', '', ' 0', 'TKP-845', '+923332772784', '58.79235400000005', '', '', '2020-07-15 08:00:15', '', ''),
(384564, '2020-08-10 08:21:19', '868003033289658', '31.59509', '74.484701', '', ' 0', '9658', '+923161205020', '0', '', '', '2020-07-29 13:54:43', '', ''),
(384565, '2021-04-27 04:46:10', '868003033258679', '31.573655', '74.283239', '', ' 0', 'LES-8463', '+923161205023', '14244.165245999995', '', '', '2021-04-27 02:02:36', '', ''),
(384566, '2020-07-28 15:45:05', '868003033260535', '24.841492', '67.227089', '', ' 0', 'JU-7681', '+923161204892', '1040.899663999999', '', '', '2020-07-28 09:59:42', '', ''),
(384567, '2020-08-25 14:35:03', '868003033259164', '29.715421', '71.710035', '', ' 0', 'GLTD-6775', '+923161205013', '13709.467050000188', '', '', '2020-08-25 13:08:49', '', ''),
(384568, '2020-10-09 07:21:48', '868003033258539', '24.919124', '67.016845', '', ' 0', 'PX-3677', '+923102822757', '4513.70097999997', '', '', '2020-10-09 03:51:17', '', ''),
(384569, '2021-03-11 10:57:22', '868003033257424', '24.897051', '66.992978', '', ' 0', 'RIL-5745', '+923011154021', '11653.746281999911', '', '', '2021-03-11 10:41:12', '', ''),
(384570, '2021-03-18 14:20:03', '868003033289583', '24.860267', '67.088956', '', ' 0', 'TAA-368', '+923102822648', '2987.197944000002', '', '', '2021-03-18 14:06:56', '', ''),
(384571, '2020-11-01 10:07:53', '868003033256137', '27.184183', '67.80947', '', ' 0', '6137', '+923102822683', '0', '', '', '2020-10-21 13:29:34', '', ''),
(384572, '2020-12-13 07:09:46', '868003033252169', '27.036201', '68.206033', '', ' 37', 'MII-5075', '+923102823103', '3800.6595500000153', '', '', '2020-12-13 06:49:21', '', ''),
(384573, '0000-00-00 00:00:00', '868003033286552', '0', '0', '', ' 0', '6552', '+923102823104', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384574, '0000-00-00 00:00:00', '86800303257986', '0', '0', '', ' 0', '7986', '+923102823126', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384575, '2021-02-25 07:51:24', '868003033284923', '26.251062', '68.150561', '', ' 0', 'XA-501', '+923102822713', '476.3973900000003', '', '', '2021-02-25 06:09:44', '', ''),
(384576, '2020-08-28 19:39:35', '868003033284535', '29.564899', '71.295759', '', ' 0', '4535', '+923102822425', '0', '', '', '2020-08-28 19:32:06', '', ''),
(384577, '2021-04-27 11:15:16', '868003033257770', '32.033227', '72.828001', '', ' 0', 'LES-9094', '+923102823433', '17695.15478200003', '', '', '2021-04-27 11:12:00', '', ''),
(384578, '2020-07-14 10:03:12', '868003032819323', '33.70794', '73.059473', '', ' 0', 'GLTB-2669', '+923011154559', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384579, '2020-11-24 05:45:20', '868003033256053', '30.34067', '72.036645', '', ' 0', '6053', '+923102825707', '0', '', '', '2020-11-24 04:18:39', '', ''),
(384580, '2020-09-03 10:03:10', '868003033252607', '25.257122', '67.965154', '', ' 0', 'TLP-948', '+923102825705', '6277.164803999995', '', '', '2020-09-03 08:56:26', '', ''),
(384581, '2021-04-27 11:15:03', '868003033284444', '33.654353', '73.043009', '', ' 0', 'LES-5548', '+923102822174', '14218.586365999818', '', '', '2021-04-27 11:10:23', '', ''),
(384582, '2021-04-27 06:34:59', '868003032834520', '24.840903', '67.310648', '', ' 0', 'JT-3572', '+923332748369', '71369.60948100117', '', '', '2021-04-26 18:59:25', '', ''),
(384583, '2020-11-25 08:25:36', '868003033258877', '28.434094', '70.230269', '', ' 0', 'SBA-095', '+923102823273', '6434.03557999998', '', '', '2020-11-25 08:11:35', '', ''),
(384584, '0000-00-00 00:00:00', '868003033257276', '0', '0', '', ' 0', '7276', '', '0', '', '', '0000-00-00 00:00:00', '', ''),
(384585, '2021-04-27 11:15:33', '868003033251039', '31.393667', '74.145347', '', ' 0', 'C-2619', '+923102825940', '25992.360377000216', '', '', '2021-04-27 10:10:55', '', ''),
(384586, '2020-09-06 12:42:41', '868003033255618', '27.924701', '69.199353', '', ' 0', 'TLV-714', '+923102825937', '1195.621807000001', '', '', '2020-09-06 12:12:09', '', '');

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
(1213, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First');

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
(49, 'Basit', 'abasit9119@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'a57a2f63e6bb3516bc8b6e78f6eb48d75499987353cd2e8b', b'1', b'1', NULL, 0, 0, 0, b'0', NULL, NULL, b'0', NULL, -1, NULL, 0, b'0', NULL, b'0', NULL, NULL);

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
(32, 6),
(1, 6),
(21, 32),
(21, 35),
(48, 148),
(1, 2),
(10, 2);

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
  `usergroup` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `privilege`, `login`, `password`, `usergroup`, `userSettings_id`, `status`, `description`, `address`, `telephone`, `email`, `notify`, `subacc_id`, `allowed_actions`, `independent_exist`, `image`) VALUES
(1, 'Admin', 'Choose...', 'admin@avtrack.co.uk', '2ba17a9fd2264cc327c24be7c0b3318f', 'Choose...', 1, '1', 'auto@tracker1', 'london', '03137152168', 'admin@avtrack.co.uk', 1, 0, '000000000000000000000000000000000000000000000', '1', NULL),
(4, 'Abbas', 'abbas', 'abbas@gmail.com', 'ed2aa8b54adf46b3e3f4d6d9d2188230\r\n', '', 4, '1', 'abbas123', 'london', '03137152168', 'abbas@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(10, 'Usman', 'Distributor', 'usmanhameed@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'Choose...', 10, '1', '123456789', '', '', 'usmanhameed@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(17, 'Abdul Samad', 'end_user', 'samad1@gmail.com', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', 'AVTRACK', 17, '1', '12345678', '', '', 'samad1@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(18, 'Hamza Ansari', 'end_user', 'Hamza Ansari', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', '', 13, '1', '12345678', '', '', 'Hamza Ansari', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(19, 'Abdullah', 'end_user', 'Abdullah', '675730ffc96c3cee0fec7db5ab8867c02c3fec4a1e689888', '', 13, '1', '12345678', '', '', 'Abdullah', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(48, 'demo', 'Admin', 'demo@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'Choose...', 48, '1', 'demo123456', '', '', 'demo@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(21, 'Naveed', 'Choose...', 'admin@carcreditsolutions.co.uk', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'Choose...', 21, '1', 'Naveed123', '', '', 'admin@carcreditsolutions.co.uk', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(32, 'Ali', 'Distributor', 'ali@alizeb.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', 'Choose...', 32, '1', 'Letmein123', '', '', 'ali@alizeb.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL),
(49, 'Basit', 'ResQ911 ', 'abasit9119@gmail.com', '112360d91e81336860629d08510570aa79b29a95d714be0b', '', 49, '1', 'basit123', '', '', 'abasit9119@gmail.com', 1, 0, '000000000000000000000000000000000000000000000', NULL, NULL);

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
-- Indexes for table `addasset`
--
ALTER TABLE `addasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captain`
--
ALTER TABLE `captain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checktime`
--
ALTER TABLE `checktime`
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
-- Indexes for table `create_group`
--
ALTER TABLE `create_group`
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
-- Indexes for table `imei`
--
ALTER TABLE `imei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imei` (`imei`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addasset`
--
ALTER TABLE `addasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `create_group`
--
ALTER TABLE `create_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `crmusers`
--
ALTER TABLE `crmusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `imei`
--
ALTER TABLE `imei`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384587;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1214;

--
-- AUTO_INCREMENT for table `tc_devices`
--
ALTER TABLE `tc_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
