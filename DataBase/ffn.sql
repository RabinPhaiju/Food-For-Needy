-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 09:30 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ffn`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postby_id` int(6) DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT '0',
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hits` int(6) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `remarks` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postby_id` int(6) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verifiedby_id` int(6) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `hits` bigint(20) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'Contact No',
  `dob` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(6) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `verifiedby_id` int(6) NOT NULL DEFAULT '0' COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `username`, `pic`, `user_type`, `firstname`, `lastname`, `email`, `location`, `contact`, `dob`, `created_at`, `updated_at`, `password`, `secret_key`, `verified`, `verifiedby_id`, `remark`, `status`) VALUES
(39, 'rbnph', 'rbnph.jpg', NULL, 'Rabin', 'Phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', '9808215115', NULL, '2020-01-15 09:15:26', '2020-01-28 14:12:53', '672fe60e8f79e1494810a78ac5bd8e12', NULL, 1, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'staff',
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(20) DEFAULT NULL,
  `remarks` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postby_id` int(11) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `usertype`, `email`, `phone`, `address`, `password`, `secret_key`, `remarks`, `dob`, `gender`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(0, 'Superadmin', 'Superadmin', 'admin', 'foodforneedy@gmail.com', 13456789, 'libali', '25069a844a19b900c0e3efa525153472', NULL, 'SuperAdmin', '2019-07-06', 1, '2020-01-28 10:21:36', NULL, 1, NULL, '2020-01-28 14:14:43', 1),
(1, 'system', 'system', 'admin', 'foodforneedy@gmail.com', 1, 'system', '25069a844a19b900c0e3efa525153472', NULL, 'system', '2019-07-01', 3, '2020-01-28 00:00:00', NULL, 1, NULL, '2020-01-28 14:14:22', 1),
(4, 'Rabin Phaiju', 'rabin', 'manager', 'rabinphaiju15@gmail.com', 9808215115, 'bkt', '672fe60e8f79e1494810a78ac5bd8e12', NULL, 'rabin', '2019-07-01', 1, '2020-01-28 00:00:00', NULL, 1, NULL, '2020-01-28 14:14:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
