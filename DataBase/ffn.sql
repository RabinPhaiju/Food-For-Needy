-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 05:57 AM
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
(41, 71, 'Fish71.jpg', 'Fish', 'Bhaktapur', '2020-01-31 13:02:41', '2020-02-01 10:02:54', 1, 0, NULL, 1, '20', '2020-01-29 18:15:00', 'These are dry fish', 'Fish and Seafoods'),
(41, 72, 'Carrot72.jpg', 'Carrot', 'Bhaktapur', '2020-01-31 13:03:51', '2020-02-01 10:03:00', 1, 0, NULL, 1, '42', '2020-01-23 18:15:00', 'fresh carrot from kitchen.', 'Vegetable'),
(41, 73, 'Bread73.jpg', 'Bread', 'Bhaktapur', '2020-01-31 13:05:24', '2020-02-01 10:03:04', 1, 0, NULL, 1, '47', '2020-01-17 18:15:00', 'packaging mistake breads but fresh', 'Dairy Foods'),
(41, 74, 'potato74.jpg', 'potato', 'Bhaktapur', '2020-01-31 13:06:31', '2020-02-01 10:03:10', 1, 0, NULL, 1, '10kg', '2020-01-14 18:15:00', 'Fresh potato', 'Vegetable'),
(41, 75, 'biscuits75.jpg', 'biscuits', 'Bhaktapur', '2020-01-31 13:08:20', '2020-02-01 10:03:18', 1, 0, NULL, 1, '40packets', '2020-01-15 18:15:00', 'Donated biscuits from market.', 'Dairy Foods'),
(41, 76, 'Banana76.jpg', 'Banana', 'Bhaktapur', '2020-01-31 13:09:29', '2020-02-01 10:03:23', 1, 0, NULL, 1, '12', '2020-01-20 18:15:00', 'From my fram', 'Fruits'),
(41, 77, 'Muffins77.jpg', 'Muffins', 'Bhaktapur', '2020-02-01 04:04:33', '2020-02-01 10:03:28', 1, 0, NULL, 1, '45', '2020-04-03 18:15:00', 'Tasty muffins', 'Dairy Foods'),
(41, 81, 'GreenBeans81.jpg', 'Green Beans', 'Bhaktapur', '2020-02-01 04:25:32', '2020-02-01 10:17:06', 1, 0, NULL, 1, '67', '2020-02-10 18:15:00', 'These are green beans', 'Vegetable'),
(41, 82, 'apple82.jpg', 'apple', 'Bhaktapur', '2020-02-01 04:28:02', '2020-02-01 10:13:34', 1, 0, NULL, 1, '67', '2020-02-17 18:15:00', 'fresh apples', 'Vegetable'),
(41, 83, 'Orange83.jpg', 'Orange', 'Bhaktapur', '2020-02-01 04:32:58', '2020-02-01 10:17:58', 1, 0, NULL, 1, '23', '2020-03-02 18:15:00', 'Sweet orange', 'Fruits'),
(41, 84, 'corn84.jpg', 'corn', 'Bhaktapur', '2020-02-01 04:34:04', '2020-02-01 10:19:04', 1, 0, NULL, 1, '60', '2020-04-03 18:15:00', 'stored corn', 'Vegetable'),
(41, 85, 'eggs85.jpg', 'eggs', 'Bhaktapur', '2020-02-01 04:36:45', '2020-02-01 10:26:00', 1, 0, NULL, 1, '50', '2020-02-26 18:15:00', 'eggs', 'Vegetable'),
(41, 86, 'Biscuits86.jpg', 'Biscuits', 'Bhaktapur', '2020-02-01 04:37:58', '2020-02-01 10:22:58', 1, 0, NULL, 1, '23', '2020-03-02 18:15:00', 'Osmania biscuits', 'Vegetable'),
(41, 87, 'biscuits87.jpg', 'biscuits', 'Bhaktapur', '2020-02-01 04:39:58', '2020-02-01 10:24:58', 1, 0, NULL, 1, '45', '2020-05-04 18:15:00', 'biscuits', 'Dairy Foods');

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
(41, 'rbnph', 'rbnph.jpg', 'Donator', 'rabs', 'phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', '9808215115', '2020-01-15', '2020-01-29 16:19:58', '2020-02-01 00:22:31', 'c7a9c47b3a80b5d600747872dc702b80', NULL, 1, 0, NULL, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
