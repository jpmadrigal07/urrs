-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 03:24 PM
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
(1, 'admin', 'admin', 'Administrator', '1', '2018-08-06 00:00:00', '2018-08-20 18:59:04', 1, 1),
(2, 'student', 'student', 'Student', '1', '2018-08-06 00:00:00', '2018-08-20 21:23:37', 2, 1),
(3, 'faculty', 'faculty', 'Faculty', '1', '2018-08-06 00:00:00', '2018-08-06 00:00:00', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urrs_user`
--
ALTER TABLE `urrs_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urrs_user`
--
ALTER TABLE `urrs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
