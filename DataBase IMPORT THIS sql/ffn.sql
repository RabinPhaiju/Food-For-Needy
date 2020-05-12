-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 08:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`, `id`) VALUES
('sdf', 'sd@sdf.com', 'sdf', 1),
('sdf', 'sd@sdf.com', 'sdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(6) DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `hits` int(6) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(6) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `hits` bigint(20) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `verified` tinyint(1) NOT NULL DEFAULT 1,
  `verifiedby_id` int(6) NOT NULL DEFAULT 0 COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `quantity` varchar(10) DEFAULT NULL,
  `ExpDate` timestamp NULL DEFAULT NULL,
  `Description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `served` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `updated_by`, `pic`, `name`, `location`, `created_at`, `updated_at`, `verified`, `verifiedby_id`, `remark`, `status`, `quantity`, `ExpDate`, `Description`, `type`, `served`) VALUES
(88, 44, 'Rice88.jpg', 'Rice', 'Bhaktapur', '2020-03-10 02:41:09', '2020-03-11 08:28:36', 1, 0, NULL, 1, '19', '2020-12-11 18:15:00', 'Basmati', 'Vegetable', NULL),
(89, 44, 'DalPulses89.jpg', 'Dal Pulses', 'Bhaktapur', '2020-03-10 02:46:36', '2020-03-10 08:31:36', 1, 0, NULL, 1, '40', '2019-12-31 18:15:00', 'pulses', 'Grains,Beans and Nuts', NULL),
(90, 44, 'oil90.jpg', 'oil', 'Bhaktapur', '2020-03-10 04:30:34', '2020-03-10 10:15:34', 1, 0, NULL, 1, '40', '2020-03-08 18:15:00', 'this is eadable oil', 'Dairy Foods', NULL),
(91, 44, 'milkpowder91.jpg', 'milk powder', 'Bhaktapur', '2020-03-10 04:31:43', '2020-03-10 10:16:43', 1, 0, NULL, 1, '30', '2020-03-09 18:15:00', 'this is milk powder', 'Dairy Foods', NULL),
(92, 44, 'nuts92.jpg', 'nuts', 'Bhaktapur', '2020-03-10 04:32:31', '2020-03-10 10:17:31', 1, 0, NULL, 1, '50', '2020-03-07 18:15:00', 'this is nuts', 'Grains,Beans and Nuts', NULL),
(93, 44, 'wheat93.jpg', 'wheat', 'Bhaktapur', '2020-03-10 04:39:16', '2020-03-10 10:24:16', 1, 0, NULL, 1, '60', '2020-03-16 18:15:00', 'this is wheat', 'Grains,Beans and Nuts', NULL),
(94, 44, 'honey94.jpg', 'honey', 'Bhaktapur', '2020-03-10 04:43:01', '2020-03-10 10:28:01', 1, 0, NULL, 1, '30', '2020-03-03 18:15:00', 'this is honey', 'Dairy Foods', NULL),
(95, 44, 'biscuit95.jpg', 'biscuit', 'Bhaktapur', '2020-03-10 04:48:48', '2020-03-10 10:33:48', 1, 0, NULL, 1, '80', '2020-03-09 18:15:00', 'marie biscuit', 'Dairy Foods', NULL),
(96, 44, 'noodle96.jpg', 'noodle', 'Bhaktapur', '2020-03-10 04:49:41', '2020-03-10 10:34:41', 1, 0, NULL, 1, '90', '2020-03-16 18:15:00', 'WAI WAI noodle', 'Grains,Beans and Nuts', NULL),
(97, 44, 'pickle97.jpg', 'pickle', 'Bhaktapur', '2020-03-10 04:51:23', '2020-03-10 10:36:23', 1, 0, NULL, 1, '35', '2020-03-17 18:15:00', 'this is pickle', 'Vegetable', NULL),
(98, 51, 'Dalmot98.jpg', 'Dalmot', 'Bhaktapur', '2020-05-11 04:57:44', '2020-05-11 10:42:44', 1, 0, NULL, 1, '12', '2020-05-27 18:15:00', 'dalmod', 'Vegetable', NULL);

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
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(14, 'sabin', 'roshan', 'good', 'evening', '2020-03-11 12:17:50'),
(15, 'roshan', 'rbnph', 'hello', 'hello', '2020-03-15 02:05:54'),
(16, 'rbnph', 'roshan', NULL, 'hello', '2020-05-11 01:53:18'),
(17, 'rbnph', 'roshan', NULL, 'k xa', '2020-05-11 01:54:02'),
(18, 'rbnph', 'roshan', NULL, 'ok', '2020-05-11 01:54:45'),
(19, 'rbnph', 'roshan', NULL, 'k xa rabin', '2020-05-11 01:57:27'),
(20, 'sabin', 'roshan', NULL, 'hello sabin', '2020-05-11 02:00:59'),
(21, 'rbnph', 'roshan', NULL, 'what about today?\r\n', '2020-05-11 02:01:21'),
(22, 'roshan', 'rbnph', NULL, 'Nothing special, what about you?', '2020-05-11 03:05:00'),
(23, 'sapana', 'roshan', NULL, 'hi', '2020-05-11 03:24:44'),
(24, 'Sarah', 'rbnph', NULL, 'hi', '2020-05-11 03:29:22'),
(25, 'roshan', 'rbnph', NULL, 'hello\r\n', '2020-05-12 04:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reg_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `description`, `reg_id`, `date`) VALUES
(121, 'rbnph schedule at Bhaktapur in Monday from 09:00 to 11:00', 0, '2020-03-15 20:16:16'),
(122, 'rbnph schedule at Bhaktapur in Sunday from 09:00 to 10:00', 0, '2020-03-15 20:16:55'),
(123, 'rbnph schedule at Bhaktapur in Sunday from 13:00 to 14:00 title: next sunday', 0, '2020-03-15 20:17:34'),
(124, 'rbnph schedule at Bhaktapur in Sunday from 13:00 to 14:00 title: next sunday', 0, '2020-03-15 20:19:37'),
(125, 'rbnph schedule at Bhaktapur in Wednesday from 11:00 to 13:00 title: wed', 0, '2020-03-15 20:20:02'),
(126, 'rbnph schedule at Bhaktapur in Tuesday from 09:00 to 10:00 title: tue', 0, '2020-03-15 20:39:20'),
(127, 'rbnph schedule at Bhaktapur in Friday from 15:00 to 17:00 title: fri', 0, '2020-03-15 20:39:40'),
(128, 'rbnph schedule at Bhaktapur in Saturday from 13:00 to 15:00 title: sat', 0, '2020-03-15 20:40:08'),
(129, 'rbnph schedule at Bhaktapur in Thursday from 11:00 to 12:00 title: thu', 0, '2020-03-15 20:40:25'),
(130, 'rbnph schedule at Bhaktapur in Sunday from 10:00 to 11:00 title: sun', 0, '2020-03-15 20:40:43'),
(131, 'rbnph schedule at Bhaktapur in Tuesday from 12:00 to 15:00 title: tue', 0, '2020-03-15 20:43:14'),
(132, 'rbnph schedule at Bhaktapur in Wednesday from 15:00 to 16:00 title: wed', 0, '2020-03-15 20:44:40'),
(133, 'rbnph schedule at Bhaktapur in Monday from 10:00 to 11:00 title: mon', 0, '2020-03-15 20:47:10'),
(134, 'rbnph schedule at Bhaktapur in Monday from 09:00 to 11:00 title: next monday', 0, '2020-03-15 21:55:31'),
(135, 'rbnph schedule at Bhaktapur in Tuesday from 13:00 to 14:00 title: april 14', 0, '2020-03-15 21:56:06'),
(136, 'roshan schedule at Bhaktapur in Wednesday from 10:00 to 13:00 title: This is first ok', 0, '2020-04-21 12:41:54'),
(137, 'roshan schedule at Bhaktapur in Thursday from 13:00 to 16:00 title: next one', 0, '2020-04-21 12:42:51'),
(138, 'roshan schedule at Bhaktapur in Tuesday from 13:00 to 14:00 title: today', 0, '2020-04-21 12:53:04'),
(139, 'roshan schedule at Bhaktapur in Thursday from 11:00 to 13:00 title: today, roshan', 0, '2020-04-30 11:36:21'),
(140, 'rbnph added Dalmot in Bhaktapur (12).', 51, '2020-05-11 10:42:44');

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
  `contact` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Contact No',
  `dob` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(6) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) NOT NULL DEFAULT 0 COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `username`, `pic`, `user_type`, `firstname`, `lastname`, `email`, `location`, `contact`, `dob`, `created_at`, `updated_at`, `password`, `secret_key`, `verified`, `verifiedby_id`, `remark`, `status`, `code`) VALUES
(44, 'roshan', 'roshan.jpg', 'Donor', 'Roshan', 'Dumaru', 'roshan@gmail.com', 'Kamalbinayek', '9999888877', NULL, '2020-03-10 02:26:25', '2020-05-11 11:24:25', 'b0ad80266fc30c141ff3f8734a3897cd', NULL, 1, 0, NULL, 1, NULL),
(51, 'rbnph', 'rbnph.jpg', 'Donor', 'rabin', 'phaiju', 'rabinphaiju15@gmail.com', NULL, NULL, NULL, '2020-03-16 02:50:49', '2020-05-11 11:22:05', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'phaiju2313'),
(52, 'sabin', '', 'Receiver', 'sabin', 'shrestha', 'sabinshrestha@gmail.com', NULL, NULL, NULL, '2020-03-10 02:26:25', '2020-05-11 11:15:32', 'b0ad80266fc30c141ff3f8734a3897cd', NULL, 1, 0, NULL, 1, NULL),
(53, 'sapana', '', 'Sponser', 'sapana', 'thapa', 'sapanathapa@gmail.com', NULL, NULL, NULL, '2020-03-16 02:50:49', '2020-05-11 13:08:27', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'sapana2313'),
(54, 'Sarah', '', 'Receiver', 'John', 'Marker', 'Markerjohn12@gmail.com', NULL, NULL, NULL, '2020-03-16 02:50:49', '2020-05-11 11:15:59', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'marker2313'),
(71, 'ram2', 'ram2.jpg', 'Volunteer', 'Ram', 'Kumar', 'ramkumar2@gmail.com', NULL, NULL, NULL, '2020-03-16 02:50:49', '2020-05-12 12:15:25', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'marker2313'),
(72, 'david3', 'david3.jpg', 'Volunteer', 'David', 'Cater', 'davidcarter2@gmail.com', NULL, NULL, NULL, '2020-03-16 02:50:49', '2020-05-12 12:15:32', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'marker2313');

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
  `date` date DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `updated_by`, `day`, `start_time`, `end_time`, `date`, `title`, `description`, `location`) VALUES
(39, 'roshan', 'Tuesday', '13:00:00', '14:00:00', '2020-06-20', 'today', 'Enter Schedule description.', 'Bhaktapur');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(11) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
