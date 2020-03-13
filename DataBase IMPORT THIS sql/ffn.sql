-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 06:52 AM
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
  `food_id` int(10) UNSIGNED NOT NULL,
  `updated_by` int(6) NOT NULL,
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
  `ExpDate` timestamp NULL DEFAULT NULL,
  `Description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `updated_by`, `pic`, `name`, `location`, `created_at`, `updated_at`, `verified`, `verifiedby_id`, `remark`, `status`, `quantity`, `ExpDate`, `Description`, `type`) VALUES
(88, 44, 'Rice88.jpg', 'Rice', 'Bhaktapur', '2020-03-10 02:41:09', '2020-03-11 08:28:36', 1, 0, NULL, 1, '19', '2020-12-11 18:15:00', 'Basmati', 'Vegetable'),
(89, 44, 'DalPulses89.jpg', 'Dal Pulses', 'Bhaktapur', '2020-03-10 02:46:36', '2020-03-10 08:31:36', 1, 0, NULL, 1, '40', '2019-12-31 18:15:00', 'pulses', 'Grains,Beans and Nuts'),
(90, 44, 'oil90.jpg', 'oil', 'Bhaktapur', '2020-03-10 04:30:34', '2020-03-10 10:15:34', 1, 0, NULL, 1, '40', '2020-03-08 18:15:00', 'this is eadable oil', 'Dairy Foods'),
(91, 44, 'milkpowder91.jpg', 'milk powder', 'Bhaktapur', '2020-03-10 04:31:43', '2020-03-10 10:16:43', 1, 0, NULL, 1, '30', '2020-03-09 18:15:00', 'this is milk powder', 'Dairy Foods'),
(92, 44, 'nuts92.jpg', 'nuts', 'Bhaktapur', '2020-03-10 04:32:31', '2020-03-10 10:17:31', 1, 0, NULL, 1, '50', '2020-03-07 18:15:00', 'this is nuts', 'Grains,Beans and Nuts'),
(93, 44, 'wheat93.jpg', 'wheat', 'Bhaktapur', '2020-03-10 04:39:16', '2020-03-10 10:24:16', 1, 0, NULL, 1, '60', '2020-03-16 18:15:00', 'this is wheat', 'Grains,Beans and Nuts'),
(94, 44, 'honey94.jpg', 'honey', 'Bhaktapur', '2020-03-10 04:43:01', '2020-03-10 10:28:01', 1, 0, NULL, 1, '30', '2020-03-03 18:15:00', 'this is honey', 'Dairy Foods'),
(95, 44, 'biscuit95.jpg', 'biscuit', 'Bhaktapur', '2020-03-10 04:48:48', '2020-03-10 10:33:48', 1, 0, NULL, 1, '80', '2020-03-09 18:15:00', 'marie biscuit', 'Dairy Foods'),
(96, 44, 'noodle96.jpg', 'noodle', 'Bhaktapur', '2020-03-10 04:49:41', '2020-03-10 10:34:41', 1, 0, NULL, 1, '90', '2020-03-16 18:15:00', 'WAI WAI noodle', 'Grains,Beans and Nuts'),
(97, 44, 'pickle97.jpg', 'pickle', 'Bhaktapur', '2020-03-10 04:51:23', '2020-03-10 10:36:23', 1, 0, NULL, 1, '35', '2020-03-17 18:15:00', 'this is pickle', 'Vegetable'),
(98, 41, 'rabin98.jpg', 'rabin', 'Bhaktapur', '2020-03-12 10:45:25', '2020-03-12 16:45:55', 1, 0, NULL, 1, '12', '2020-12-11 18:15:00', 'hello', 'Vegetable');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `msg_to` varchar(20) DEFAULT NULL,
  `msg_from` varchar(20) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `msg_to`, `msg_from`, `subject`, `message`, `date`) VALUES
(2, 'sabin', 'roshan', 'hello', 'i am fine', '2020-03-03 18:15:00'),
(5, 'sabin', 'roshan', 'hello sabin', 'hello', '2020-03-12 18:15:00'),
(6, 'sabin', 'roshan', 'hello', 'how are you', '2020-03-11 11:20:22'),
(9, 'sabin', 'roshan', 'ok ', 'din', '2020-03-11 12:16:54'),
(10, 'rbnph', 'roshan', 'k xa', 'fine', '2020-03-11 12:17:02'),
(11, 'sabin', 'roshan', 'hello ', 'world', '2020-03-11 12:17:17'),
(12, 'sabin', 'roshan', 'urgent', 'funny', '2020-03-11 12:17:30'),
(13, 'sabin', 'roshan', 'timi', 'bina', '2020-03-11 12:17:40'),
(14, 'sabin', 'roshan', 'good', 'evening', '2020-03-11 12:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reg_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `description`, `reg_id`, `date`) VALUES
(101, 'hello', 2, '2020-03-11 08:02:46'),
(102, 'hello', 2, '2020-03-11 08:02:50'),
(103, 'hello', 2, '2020-03-11 08:02:53'),
(104, 'done', 4, '2020-03-11 08:06:00'),
(105, 'done', 4, '2020-03-11 08:09:20'),
(106, 'roshan updated Rice in Bhaktapur (19).', 0, '2020-03-11 08:28:36'),
(107, 'rbnph added rabin in Bhaktapur (12).', 41, '2020-03-12 16:30:25'),
(108, 'rbnph updated rabin in Bhaktapur (12).', 0, '2020-03-12 16:34:17'),
(109, 'rbnph updated rabin in Bhaktapur (12).', 0, '2020-03-12 16:45:55'),
(110, 'rbnph schedule at Bhaktapur in Monday from 09:30 to .10:30 title: rabin', 0, '2020-03-12 19:21:20'),
(111, 'rbnph schedule at Bhaktapur in Sunday from 09:00 to 10:00 title: sdf', 0, '2020-03-12 20:36:06'),
(112, 'rbnph schedule at Bhaktapur in Saturday from 13:00 to 15:00 title: satru', 0, '2020-03-13 10:37:22'),
(113, 'rbnph schedule at Bhaktapur in Thursday from 06:00 to 09:00 title: hello', 0, '2020-03-13 10:46:53');

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
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verifiedby_id` int(6) NOT NULL DEFAULT '0' COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `username`, `pic`, `user_type`, `firstname`, `lastname`, `email`, `location`, `contact`, `dob`, `created_at`, `updated_at`, `password`, `secret_key`, `verified`, `verifiedby_id`, `remark`, `status`, `code`) VALUES
(41, 'rbnph', 'rbnph.jpg', 'Donator', 'rabs', 'phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', '9808215115', '2020-01-15', '2020-01-29 16:19:58', '2020-03-11 19:42:43', 'c7a9c47b3a80b5d600747872dc702b80', NULL, 1, 0, NULL, 1, '1580577014'),
(43, 'sabin', NULL, NULL, 'sabin', 'sabin', 'sabin@sabin.com', NULL, NULL, NULL, '2020-02-01 12:12:37', '2020-02-01 18:00:20', '0f4c5675bf0cf972ae7362fe08b39516', NULL, 1, 0, NULL, 1, 'abcabc'),
(44, 'roshan', NULL, NULL, 'roshan', 'ok', 'roshan@gmail.com', NULL, NULL, NULL, '2020-03-10 02:26:25', NULL, 'b0ad80266fc30c141ff3f8734a3897cd', NULL, 1, 0, NULL, 1, NULL),
(46, 'babin', 'babin.jpg', 'Donator', 'babin', 'suwal', 'babinsuwal@gmail.com', 'Bhaktapur', '1234567890', '1212-12-12', '2020-03-11 14:03:58', '2020-03-11 20:04:48', 'ab9d16285f61409933d37b6e754d4611', NULL, 0, 0, NULL, 1, 'suwal2010');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(10) NOT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `updated_by`, `day`, `start_time`, `end_time`, `date`, `title`, `description`, `location`) VALUES
(1, '44', 'Sunday', '11:00:00', '12:00:00', '2020-04-08 15:04:24', 'lunch', 'best snacks', 'bhaktapur'),
(11, 'rbnph', 'Monday', '09:30:00', '10:30:00', '2020-03-23 00:00:00', 'rabin', 'Enter Schedule description.', 'Bhaktapur'),
(12, 'rbnph', 'Sunday', '09:00:00', '10:00:00', '2020-03-23 00:00:00', 'sdf', 'Enter Schedule description.', 'Bhaktapur'),
(13, 'rbnph', 'Saturday', '13:00:00', '15:00:00', '2020-03-14 00:00:00', 'satru', 'Enter Schedule description.', 'Bhaktapur');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

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
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
