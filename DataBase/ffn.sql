-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 06:28 PM
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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `updated_by` int(6) NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `verifiedby_id` int(6) NOT NULL DEFAULT '0' COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `quantity` varchar(10) DEFAULT NULL,
  `ExpDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`updated_by`, `food_id`, `pic`, `name`, `location`, `created_at`, `updated_at`, `verified`, `verifiedby_id`, `remark`, `status`, `quantity`, `ExpDate`, `Description`, `type`) VALUES
(1, 64, 'apple64.jpg', 'apple', 'Bhaktapur', '2020-01-28 15:13:33', '2020-01-28 20:58:34', 1, 0, NULL, 1, '1', '2020-01-08 18:15:00', 'apple', 'Vegetable'),
(1, 65, 'banana65.jpg', 'banana', 'Kathmandu', '2020-01-28 15:49:22', '2020-01-28 21:34:22', 1, 0, NULL, 1, '3', '2020-01-22 18:15:00', 'apple', 'Meet & Popultry'),
(1, 66, 'cat66.jpg', 'cat', 'Lalitpur', '2020-01-28 15:51:23', '2020-01-28 21:36:23', 1, 0, NULL, 1, '4', '2020-01-11 18:15:00', 'hello', 'Grains,Beans and Nuts'),
(1, 67, 'biscuit67.jpg', 'biscuit', 'Kathmandu', '2020-01-29 02:03:27', '2020-01-29 07:48:27', 1, 0, NULL, 1, '100', '2020-01-28 18:15:00', 'test', 'Grains,Beans and Nuts'),
(1, 68, 'carrot68.jpg', 'carrot', 'Kathmandu', '2020-01-29 02:16:22', '2020-01-29 08:01:22', 1, 0, NULL, 1, '20', '2020-01-14 18:15:00', 'fresh from libali bhaktapur', 'Vegetable'),
(1, 69, 'niru69.jpg', 'niru', 'Bhaktapur', '2020-01-29 02:28:03', '2020-01-29 08:13:03', 1, 0, NULL, 1, '1', '2020-01-22 18:15:00', 'kumari', 'Vegetable'),
(41, 70, 'apple70.jpg', 'apple', 'Bhaktapur', '2020-01-29 17:26:46', '2020-01-29 23:11:46', 1, 0, NULL, 1, '78', '2020-01-17 18:15:00', 'rabin', 'Vegetable');

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
(41, 'rbnph', 'rbnph', 'Donator', 'rabs', 'phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', '9808215115', '2020-01-15', '2020-01-29 16:19:58', '2020-01-29 23:09:32', 'babd4a84418fb04015ac773f7459727c', NULL, 1, 0, NULL, 1);

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
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

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
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
