-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2020 at 04:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11871854_ffd`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `id` int(8) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`, `id`, `date`) VALUES
('sdf', 'sd@sdf.com', 'sdf', 1, '2020-05-17 00:00:00'),
('sdf', 'sd@sdf.com', 'sdf', 2, '2020-05-17 00:00:00'),
('rabin', 'rabin@gmail.com', 'kehe xnea', 3, '2020-05-17 00:00:00'),
('dfghjkl;', 'dfgh@dfgh.com', 'sdfghjkl', 4, '2020-06-17 11:32:29'),
('arun', 'dkjfk@rkfg.com', 'kdjfkdjkfkldf', 5, '2020-11-06 15:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `postby_id` int(10) DEFAULT NULL,
  `is_verified` int(1) DEFAULT 0,
  `verifiedby_id` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `hits` int(6) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `hits`, `status`) VALUES
(7, 'brief', 'Food For Needy<br> \r\nis an online platform.<br>\r\nThat provides posting  and  \r\n<br> communicating platform for its user.<br>          ', '2020-05-17 16:33:48', 2, 0, NULL, '2020-11-19 13:00:11', NULL, 1),
(10, 'story', 'Food For Needy\'s primary goal is to provide such a platform to its user that allow to communication and  post information.', '2020-05-17 16:44:28', 2, 0, NULL, '2020-11-19 13:17:01', NULL, 1),
(11, 'hideWhoweare', '  In sort, The things we do is to share information to end-user/people about the information about foods :', '2020-05-17 16:46:05', 2, 0, NULL, NULL, NULL, 1),
(12, 'disc', ' <li>That the donor/provider have donated. </li>\r\n                            <li>That the receiver/distributor can get.</li>', '2020-05-17 16:47:04', 2, 0, NULL, NULL, NULL, 1),
(13, 'hideWhoweare1', ' And through this website we provide a chance to become volunteer who are willing to put their effort for the betterment of society.\r\n                            <br>\r\n                            <br>\r\n                            In overall, we are trying to make a small effort/difference that can prevent food waste and help people in need.', '2020-05-17 16:48:03', 2, 0, NULL, NULL, NULL, 1),
(14, 'donation', ' Are you an Organization  \r\n                            with excess perishable food to donate? ', '2020-05-17 16:48:59', 2, 0, NULL, NULL, NULL, 1),
(15, 'volunteer', '  Are you Person looking to rescue surplus food \r\n                            using our Site on your device?', '2020-05-17 16:49:33', 2, 0, NULL, NULL, NULL, 1),
(16, 'distributor', 'Are you a Non-Profit Organization who could \r\n                            feed the hungry?', '2020-05-17 16:50:12', 2, 0, NULL, NULL, NULL, 1),
(17, 'scheduletext', '  Want to add your own Schedules?<br>So, \r\n                            people can know when & where to join your program.\r\n                            click below for more info.', '2020-05-17 16:51:14', 2, 0, NULL, NULL, NULL, 1),
(18, 'aboutus', 'Food For Needy came from an idea in 2019 Nepal \r\n                        from the students of KHEC, having the aim to \r\n                        prohibits food waste by supermarkets throwing \r\n                        away or destroying unsold food and requesting \r\n                        them instead to donate it to charities and food \r\n                        banks.    ', '2020-05-17 16:52:21', 2, 0, NULL, '2020-11-19 13:25:20', NULL, 1),
(19, 'getintouch', 'If any problems or any suggestion you can contact us through our message box or using the contact information below.', '2020-05-17 16:55:40', 2, 0, NULL, NULL, NULL, 1),
(20, 'aboutus2', 'Food For Needy is Nepal\'s first dedicated online platform which lets its user to communicate and post information to food. This new platform takes a local approach, giving food donors a simple and fast system to connect directly with social               service programs in local communities.<br>Although we in our initial stage & there is still a \r\nlong way to achieve our aim. So, Food For Needy is ready and something big is coming!!.<br> \r\nThat\'s what Food For Needy is all about.', '2020-05-17 16:57:22', 2, 0, NULL, '2020-11-19 13:53:01', NULL, 1);

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
(90, 51, 'oil90.jpg', 'oil', 'Bhaktapur', '2020-03-10 04:30:34', '2020-11-11 07:33:22', 1, 0, NULL, 1, '40', '2020-03-08 18:15:00', 'this is eadable oil', 'Dairy Foods', NULL),
(91, 51, 'milkpowder91.jpg', 'milk powder', 'Bhaktapur', '2020-03-10 04:31:43', '2020-11-11 07:33:27', 1, 0, NULL, 1, '30', '2020-03-09 18:15:00', 'this is milk powder', 'Dairy Foods', NULL),
(92, 51, 'nuts92.jpg', 'nuts', 'Bhaktapur', '2020-03-10 04:32:31', '2020-11-11 07:33:32', 1, 0, NULL, 1, '50', '2020-03-07 18:15:00', 'this is nuts', 'Grains,Beans and Nuts', NULL),
(93, 51, 'wheat93.jpg', 'wheat', 'Bhaktapur', '2020-03-10 04:39:16', '2020-11-11 07:33:41', 1, 0, NULL, 1, '60', '2020-03-16 18:15:00', 'this is wheat', 'Grains,Beans and Nuts', NULL),
(94, 51, 'honey94.jpg', 'honey', 'Bhaktapur', '2020-03-10 04:43:01', '2020-11-11 07:33:50', 1, 0, NULL, 1, '30', '2020-03-03 18:15:00', 'this is honey', 'Dairy Foods', NULL),
(95, 51, 'biscuit95.jpg', 'biscuit', 'Bhaktapur', '2020-03-10 04:48:48', '2020-11-11 07:33:57', 1, 0, NULL, 1, '80', '2020-03-09 18:15:00', 'marie biscuit', 'Dairy Foods', NULL),
(96, 51, 'noodle96.jpg', 'noodle', 'Bhaktapur', '2020-03-10 04:49:41', '2020-11-11 07:33:16', 1, 0, NULL, 1, '90', '2020-03-16 18:15:00', 'WAI WAI noodle', 'Grains,Beans and Nuts', NULL),
(97, 51, 'pickle97.jpg', 'pickle', 'Bhaktapur', '2020-03-10 04:51:23', '2020-11-11 07:33:10', 1, 0, NULL, 1, '35', '2020-03-17 18:15:00', 'this is pickle', 'Vegetable', NULL),
(98, 51, 'Dalmot98.jpg', 'Dalmot', 'Bhaktapur', '2020-05-11 04:57:44', '2020-05-11 10:42:44', 1, 0, NULL, 1, '12', '2020-05-27 18:15:00', 'dalmod', 'Vegetable', NULL),
(105, 76, 'Pasta105.jpg', 'Pasta', 'Bhaktapur', '2020-11-10 13:20:31', '2020-11-11 07:59:07', 1, 0, NULL, 1, '15', '2021-02-02 00:00:00', 'unleavened dough of wheat flour', 'Vegetable', NULL),
(106, 76, 'masyaura106.jpg', 'masyaura', 'Bhaktapur', '2020-11-10 13:40:32', '2020-11-11 08:04:01', 1, 0, NULL, 1, '10', '2021-11-11 00:00:00', 'this is vegetable ', 'Vegetable', NULL),
(107, 76, 'BeatenRice107.jpg', 'Beaten Rice', 'Bhaktapur', '2020-11-10 14:04:22', '2020-11-11 08:04:50', 1, 0, NULL, 1, '21', '2022-02-02 00:00:00', 'This is beaten/flattened rice', 'Vegetable', NULL),
(108, 76, 'Papad108.jpg', 'Papad', 'Bhaktapur', '2020-11-10 14:08:11', '2020-11-11 07:28:10', 1, 0, NULL, 1, '14', '2021-08-20 00:00:00', 'made of dry lintel', 'Grains,Beans and Nuts', NULL),
(109, 76, 'Chawmein109.jpg', 'Chawmein', 'Kathmandu', '2020-11-10 14:11:07', '2020-11-11 07:28:15', 1, 0, NULL, 1, '19', '2021-02-23 00:00:00', 'It is similar to noodle', 'Grains,Beans and Nuts', NULL),
(110, 76, 'Gheu110.jpg', 'Gheu', 'Bhaktapur', '2020-11-10 14:34:35', '2020-11-11 07:28:19', 1, 0, NULL, 1, '4', '2021-04-15 00:00:00', 'this is milk fat', 'Dairy Foods', NULL),
(111, 76, 'Rice111.jpg', 'Rice', 'Kathmandu', '2020-11-10 14:36:51', '2020-11-11 07:28:25', 1, 0, NULL, 1, '50', '2022-03-17 00:00:00', 'This is rice ', 'Grains,Beans and Nuts', NULL),
(112, 76, 'Potato112.jpg', 'Potato', 'Bhaktapur', '2020-11-10 14:39:00', '2020-11-11 08:01:00', 1, 0, NULL, 1, '30', '2021-04-04 00:00:00', 'This is potato', 'Vegetable', NULL),
(113, 76, 'Onion113.jpg', 'Onion', 'Kathmandu', '2020-11-10 14:40:39', '2020-11-11 07:28:34', 1, 0, NULL, 1, '35', '2021-04-28 00:00:00', 'This is onion', 'Vegetable', NULL),
(114, 76, 'Ginger114.jpg', 'Ginger', 'Bhaktapur', '2020-11-10 14:41:40', '2020-11-11 08:02:45', 1, 0, NULL, 1, '7', '2021-08-08 00:00:00', 'This is ginger', 'Vegetable', NULL),
(115, 76, 'Garlic115.jpg', 'Garlic', 'Kathmandu', '2020-11-10 14:43:37', '2020-11-11 07:28:44', 1, 0, NULL, 1, '3', '2021-05-27 00:00:00', 'This is garlic', 'Vegetable', NULL),
(116, 76, 'Spices116.jpg', 'Spices', 'Kathmandu', '2020-11-10 14:55:07', '2020-11-11 07:28:48', 1, 0, NULL, 1, '13', '2021-08-27 00:00:00', 'turmeric, chili , coriander powder', 'Grains,Beans and Nuts', NULL),
(117, 76, 'Tea117.jpg', 'Tea', 'Lalitpur', '2020-11-10 14:58:19', '2020-11-11 07:31:20', 1, 0, NULL, 1, '9', '2021-07-21 00:00:00', 'This is tea ', 'Grains,Beans and Nuts', NULL),
(118, 76, 'Salt118.jpg', 'Salt ', 'Lalitpur', '2020-11-10 15:44:14', '2020-11-11 07:31:25', 1, 0, NULL, 1, '55', '2022-03-24 00:00:00', 'This is salt ', 'Vegetable', NULL),
(120, 76, 'Pulses120.jpg', 'Pulses', 'Bhaktapur', '2020-11-11 01:31:20', '2020-11-11 07:54:45', 1, 0, NULL, 1, '30', '2021-02-02 00:00:00', 'This is pulses commonly know as dal', 'Vegetable', NULL),
(121, 76, 'Maize121.jpg', 'Maize', 'Bhaktapur', '2020-11-11 03:56:27', '2020-11-11 07:31:33', 1, 0, NULL, 1, '20', '2021-08-27 00:00:00', 'This is maize', 'Grains,Beans and Nuts', NULL),
(122, 75, 'Curd122.jpg', 'Curd', 'Bhaktapur', '2020-11-19 06:20:53', '2020-11-19 06:20:53', 1, 0, NULL, 1, '20', '2020-11-25 00:00:00', 'Bhaktapur Ju Ju Curd.', 'Dairy Foods', NULL);

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
(25, 'roshan', 'rbnph', NULL, 'hello\r\n', '2020-05-12 04:07:09'),
(26, 'roshan', 'rbnph', NULL, 'hi', '2020-05-12 07:26:06'),
(27, 'rodip', 'roshan', NULL, 'Please visit pashupati area with your team on 23 nov 2020. We need your support. ', '2020-11-19 14:45:25');

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
(140, 'rbnph added Dalmot in Bhaktapur (12).', 51, '2020-05-11 10:42:44'),
(141, 'rbnph schedule at Bhaktapur in Thursday from 10:00 to 13:00 title: hello', 0, '2020-06-17 12:57:03'),
(142, 'rbnph schedule at Bhaktapur in Thursday from 09:01 to 11:00 title: hello', 0, '2020-06-19 13:59:22'),
(143, 'rbnph schedule at Bhaktapur in Saturday from 11:00 to 13:00 title: dfdf', 0, '2020-06-19 13:59:45'),
(144, 'roshan added Curd in Bhaktapur (20).', 75, '2020-11-19 06:20:53'),
(145, 'roshan schedule at Kathmandu in Monday from 10:00 to 14:30 title: Free Food', 0, '2020-11-19 14:21:42'),
(146, 'roshan schedule at Bhaktapur in Friday from 09:00 to 14:00 title: Aid for people affected by Corona ', 0, '2020-11-19 14:27:35');

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
  `lan` float DEFAULT NULL,
  `log` float DEFAULT NULL,
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

INSERT INTO `register` (`reg_id`, `username`, `pic`, `user_type`, `firstname`, `lastname`, `email`, `location`, `lan`, `log`, `contact`, `dob`, `created_at`, `updated_at`, `password`, `secret_key`, `verified`, `verifiedby_id`, `remark`, `status`, `code`) VALUES
(51, 'rbnph', 'rbnph.jpg', 'Donator', 'rabin', 'phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', 27.6748, 85.4389, '9988776654', '1996-07-21', '2020-03-16 02:50:49', '2020-11-11 07:20:30', '672fe60e8f79e1494810a78ac5bd8e12', NULL, 1, 0, NULL, 1, 'phaiju2313'),
(71, 'ram2', 'ram2.jpg', 'Volunteer', 'Ram', 'Kumar', 'ramkumar2@gmail.com', NULL, 27.6704, 85.4423, NULL, NULL, '2020-03-16 02:50:49', '2020-11-11 07:19:13', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'marker2313'),
(72, 'david3', 'david3.jpg', 'Volunteer', 'David', 'Cater', 'davidcarter2@gmail.com', NULL, 27.676, 85.446, NULL, NULL, '2020-03-16 02:50:49', '2020-06-16 12:32:39', '279cb0d7637c74a0a9db05f9957462d9', NULL, 1, 0, NULL, 1, 'marker2313'),
(75, 'roshan', 'roshan.jpg', 'Volunteer', 'roshan', 'dumaru', 'roshan@gmail.com', 'Bhaktapur', 27.677, 85.44, '9841215692', '1999-06-07', '2020-11-11 07:07:17', '2020-11-11 07:18:36', 'a31e065e6eb62b18c4a2c15fd7d6433e', NULL, 1, 0, NULL, 1, 'dumaru166'),
(76, 'rodip', 'rodip.jpg', 'Donator', 'rodip', 'duwal', 'rodip@gmail.com', 'Bhaktapur', 27.671, 85.439, '9845714589', '1998-08-09', '2020-11-11 07:23:24', '2020-11-11 07:26:45', '75cfeef422b0aec22a7d0ca593bb06c4', NULL, 1, 0, NULL, 1, 'duwal155'),
(77, 'arun', 'arun.jpg', 'Sponser', 'arun', 'prajapati', 'arunpra@gmail.com', 'Bhaktapur', 27.675, 85.439, '9841962548', '1999-02-22', '2020-11-11 09:17:44', '2020-11-11 09:55:02', '7cef197efd269d12de029497debd8813', NULL, 1, 0, NULL, 1, 'pra177'),
(78, 'babin', 'babin.jpg', 'Receiver', 'babin', 'datheputhe', 'babin@gmail.com', 'Bhaktapur', 27.672, 85.428, '9802458754', '2000-06-05', '2020-11-11 09:26:10', '2020-11-11 09:58:09', '0743f11219438268f93e4af5c210a97a', NULL, 1, 0, NULL, 1, 'dathe155'),
(79, 'nirumishra', 'Superadmin.jpg', 'Donator', 'Niru', 'Mishra', 'mpuja161@gmail.com', 'Bhaktapur', NULL, NULL, '9811865764', '2020-07-08', '2020-11-12 08:42:39', '2020-11-12 09:55:31', '595f950348f64555e6469fb6d3708b1f', NULL, 1, 0, NULL, 1, '1605170702'),
(80, 'roshan1', NULL, NULL, 'roshan', 'dumaru', 'roshan12@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-19 06:50:18', '2020-11-19 06:50:49', 'a31e065e6eb62b18c4a2c15fd7d6433e', NULL, 1, 0, NULL, 1, 'dumaru188');

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
(48, 'roshan', 'Saturday', '11:30:00', '14:00:00', '2020-11-21', 'Aid for people affected by Corona ', 'We the member of Khwopa Circle are sponsoring a event  which is going to held in Padma School, Durbar Square', 'Bhaktapur'),
(49, 'roshan', 'Monday', '10:00:00', '14:30:00', '2020-11-23', 'Free Food', 'Leo Club is organizing a food donation program which will be held in Pasupati area.For more info visit Leo.np', 'Kathmandu'),
(50, 'roshan', 'Friday', '09:00:00', '14:00:00', '2020-11-27', 'Aid for people affected by Corona ', 'Khwopa Circle is sponsoring an another event of food donation which will be held in padma school, Bhaktapur Durbar square. For more info Visit any Khwopa Circle sites.', 'Bhaktapur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'staff',
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(20) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(11) DEFAULT NULL,
  `is_verified` int(11) DEFAULT 1,
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `pic`, `usertype`, `email`, `phone`, `address`, `password`, `secret_key`, `remarks`, `dob`, `gender`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(0, 'Admin', 'Superadmin', NULL, 'admin', 'admin@foodforneedy.com', 1, 'system', 'a5a30bc4c47888cd59c4e9df68d80242', NULL, 'SuperAdmin', '2020-06-16', 2, '2020-01-28 10:21:36', NULL, 1, NULL, '2020-01-28 14:14:43', 1),
(1, 'system', 'system', NULL, 'admin', 'foodforneedy@gmail.com', 1, 'system', '25069a844a19b900c0e3efa525153472', NULL, 'system', '2019-07-01', 2, '2020-01-28 00:00:00', NULL, 1, NULL, '2020-01-28 14:14:22', 1),
(2, 'Rabin Phaiju', 'rabin', 'rabin.jpg', 'admin', 'rabinphaiju15@gmail.com', 9808215115, 'bkt', '672fe60e8f79e1494810a78ac5bd8e12', NULL, 'rabin', '2019-07-01', 0, '2020-01-28 00:00:00', NULL, 1, NULL, '2020-01-28 14:14:30', 1),
(11, 'sabina', 'sabin', 'sabin.jpg', 'Staff', 'sabin@gmail.com', 34343434, 'nepal', 'b12a7db8a9df15e19cdce7d30839dfb4', NULL, NULL, '2020-06-16', 1, '2020-06-19 12:12:31', NULL, 1, 2, '2020-06-19 12:12:31', 1);

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
