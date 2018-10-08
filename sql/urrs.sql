-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 03:25 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `urrs_department`
--

CREATE TABLE `urrs_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_date_created` datetime NOT NULL,
  `department_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urrs_department`
--

INSERT INTO `urrs_department` (`id`, `department_name`, `department_date_created`, `department_status`) VALUES
(1, 'CAS', '2018-10-08 00:00:00', 1),
(2, 'CFOS', '2018-10-08 00:00:00', 1),
(3, 'SoTech', '2018-10-08 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `urrs_event_booking`
--

CREATE TABLE `urrs_event_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_booking_title` varchar(255) NOT NULL,
  `event_booking_date` datetime NOT NULL,
  `department_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `event_booking_organizer` varchar(100) NOT NULL,
  `event_booking_email` varchar(100) NOT NULL,
  `event_booking_phone` varchar(100) NOT NULL,
  `event_booking_from_time` int(11) NOT NULL,
  `event_booking_to_time` int(11) NOT NULL,
  `event_booking_date_created` datetime NOT NULL,
  `event_booking_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urrs_room`
--

CREATE TABLE `urrs_room` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `room_name` varchar(11) NOT NULL,
  `room_date_created` datetime NOT NULL,
  `room_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urrs_room`
--

INSERT INTO `urrs_room` (`id`, `department_id`, `room_name`, `room_date_created`, `room_status`) VALUES
(1, 1, 'B1-CL2', '2018-10-08 00:00:00', 1),
(2, 1, 'B6', '2018-10-08 00:00:00', 1),
(3, 1, 'B11-CL3', '2018-10-08 00:00:00', 1),
(4, 1, 'B21', '2018-10-08 00:00:00', 1),
(5, 1, 'MILC', '2018-10-08 00:00:00', 1),
(6, 1, 'MILC-AVR', '2018-10-08 00:00:00', 1),
(7, 1, '102', '2018-10-08 00:00:00', 1),
(8, 1, '103', '2018-10-08 00:00:00', 1),
(9, 1, '104', '2018-10-08 00:00:00', 1),
(10, 1, '105', '2018-10-08 00:00:00', 1),
(11, 1, '106', '2018-10-08 00:00:00', 1),
(12, 1, '107', '2018-10-08 00:00:00', 1),
(13, 1, '108', '2018-10-08 00:00:00', 1),
(14, 1, '109-CL4', '2018-10-08 00:00:00', 1),
(15, 1, '110', '2018-10-08 00:00:00', 1),
(16, 1, '111', '2018-10-08 00:00:00', 1),
(17, 1, '112', '2018-10-08 00:00:00', 1),
(18, 1, '117', '2018-10-08 00:00:00', 1),
(19, 1, '119', '2018-10-08 00:00:00', 1),
(20, 1, '120', '2018-10-08 00:00:00', 1),
(21, 1, '123', '2018-10-08 00:00:00', 1),
(22, 1, '125', '2018-10-08 00:00:00', 1),
(23, 1, '201', '2018-10-08 00:00:00', 1),
(24, 1, '202', '2018-10-08 00:00:00', 1),
(25, 1, '203', '2018-10-08 00:00:00', 1),
(26, 1, '204', '2018-10-08 00:00:00', 1),
(27, 1, '205', '2018-10-08 00:00:00', 1),
(28, 1, '206', '2018-10-08 00:00:00', 1),
(29, 1, '207', '2018-10-08 00:00:00', 1),
(30, 1, '209', '2018-10-08 00:00:00', 1),
(31, 1, '217', '2018-10-08 00:00:00', 1),
(32, 1, '218', '2018-10-08 00:00:00', 1),
(33, 2, 'AV 101', '2018-10-08 00:00:00', 1),
(34, 2, 'AV 102', '2018-10-08 00:00:00', 1),
(35, 2, 'AV 103', '2018-10-08 00:00:00', 1),
(36, 2, 'AV 104', '2018-10-08 00:00:00', 1),
(37, 2, 'AV 105', '2018-10-08 00:00:00', 1),
(38, 2, 'AV 106', '2018-10-08 00:00:00', 1),
(39, 2, 'AV 107', '2018-10-08 00:00:00', 1),
(40, 2, 'AV Hall (Au', '2018-10-08 00:00:00', 1),
(41, 2, 'Conference ', '2018-10-08 00:00:00', 1),
(42, 3, 'AL (Analyti', '2018-10-08 00:00:00', 1),
(43, 3, 'CL (Compute', '2018-10-08 00:00:00', 1),
(44, 3, 'EE Lab', '2018-10-08 00:00:00', 1),
(45, 3, 'FPL (Food P', '2018-10-08 00:00:00', 1),
(46, 3, 'FRR', '2018-10-08 00:00:00', 1),
(47, 3, 'Lecture Roo', '2018-10-08 00:00:00', 1),
(48, 3, 'Lecture Roo', '2018-10-08 00:00:00', 1),
(49, 3, 'Lecture Roo', '2018-10-08 00:00:00', 1),
(50, 3, 'PF 5', '2018-10-08 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `urrs_user`
--

CREATE TABLE `urrs_user` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_date_created` datetime NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urrs_user`
--

INSERT INTO `urrs_user` (`id`, `user_username`, `user_pass`, `user_full_name`, `user_ip`, `user_date_created`, `user_last_login`, `user_level`, `user_status`) VALUES
(1, 'admin', 'admin', 'Administrator', '1', '2018-08-06 00:00:00', '2018-10-08 20:04:42', 1, 1),
(2, 'student', 'student', 'Student', '1', '2018-08-06 00:00:00', '2018-10-07 22:54:43', 2, 1),
(3, 'faculty', 'faculty', 'Faculty', '1', '2018-08-06 00:00:00', '2018-08-06 00:00:00', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urrs_department`
--
ALTER TABLE `urrs_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urrs_event_booking`
--
ALTER TABLE `urrs_event_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urrs_room`
--
ALTER TABLE `urrs_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urrs_user`
--
ALTER TABLE `urrs_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urrs_department`
--
ALTER TABLE `urrs_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `urrs_event_booking`
--
ALTER TABLE `urrs_event_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urrs_room`
--
ALTER TABLE `urrs_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `urrs_user`
--
ALTER TABLE `urrs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
