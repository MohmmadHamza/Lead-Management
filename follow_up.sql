-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `follow_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"f\";s:10:\"group_name\";s:1:\"g\";s:11:\"module_name\";}s:11:\"permissions\";a:40:{i:0;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"user.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:4:\"user\";s:1:\"g\";s:15:\"Followup Module\";}i:1;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"user.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:4:\"user\";s:1:\"g\";s:15:\"Followup Module\";}i:2;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"user.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:4:\"user\";s:1:\"g\";s:15:\"Followup Module\";}i:3;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"user.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:4:\"user\";s:1:\"g\";s:15:\"Followup Module\";}i:4;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:9:\"user.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:4:\"user\";s:1:\"g\";s:15:\"Followup Module\";}i:5;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"follow_up.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"follow_up\";s:1:\"g\";s:15:\"Followup Module\";}i:6;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"follow_up.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"follow_up\";s:1:\"g\";s:15:\"Followup Module\";}i:7;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"follow_up.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"follow_up\";s:1:\"g\";s:15:\"Followup Module\";}i:8;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:16:\"follow_up.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"follow_up\";s:1:\"g\";s:15:\"Followup Module\";}i:9;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:16:\"follow_up.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"follow_up\";s:1:\"g\";s:15:\"Followup Module\";}i:10;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"student.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:7:\"student\";s:1:\"g\";s:15:\"Followup Module\";}i:11;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:14:\"student.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:7:\"student\";s:1:\"g\";s:15:\"Followup Module\";}i:12;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"student.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:7:\"student\";s:1:\"g\";s:15:\"Followup Module\";}i:13;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:14:\"student.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:7:\"student\";s:1:\"g\";s:15:\"Followup Module\";}i:14;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:14:\"student.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:7:\"student\";s:1:\"g\";s:15:\"Followup Module\";}i:15;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:14:\"admission.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"admission\";s:1:\"g\";s:15:\"Followup Module\";}i:16;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:16:\"admission.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"admission\";s:1:\"g\";s:15:\"Followup Module\";}i:17;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:14:\"admission.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"admission\";s:1:\"g\";s:15:\"Followup Module\";}i:18;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:16:\"admission.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"admission\";s:1:\"g\";s:15:\"Followup Module\";}i:19;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:16:\"admission.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:9:\"admission\";s:1:\"g\";s:15:\"Followup Module\";}i:20;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:17:\"student-fees.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:12:\"student-fees\";s:1:\"g\";s:11:\"Fees Module\";}i:21;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:19:\"student-fees.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:12:\"student-fees\";s:1:\"g\";s:11:\"Fees Module\";}i:22;a:5:{s:1:\"a\";i:47;s:1:\"b\";s:17:\"student-fees.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:12:\"student-fees\";s:1:\"g\";s:11:\"Fees Module\";}i:23;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:19:\"student-fees.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:12:\"student-fees\";s:1:\"g\";s:11:\"Fees Module\";}i:24;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:19:\"student-fees.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:12:\"student-fees\";s:1:\"g\";s:11:\"Fees Module\";}i:25;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:27:\"student-fees-dashboard.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:22:\"student-fees-dashboard\";s:1:\"g\";s:11:\"Fees Module\";}i:26;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:29:\"student-fees-dashboard.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:22:\"student-fees-dashboard\";s:1:\"g\";s:11:\"Fees Module\";}i:27;a:5:{s:1:\"a\";i:52;s:1:\"b\";s:27:\"student-fees-dashboard.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:22:\"student-fees-dashboard\";s:1:\"g\";s:11:\"Fees Module\";}i:28;a:5:{s:1:\"a\";i:53;s:1:\"b\";s:29:\"student-fees-dashboard.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:22:\"student-fees-dashboard\";s:1:\"g\";s:11:\"Fees Module\";}i:29;a:5:{s:1:\"a\";i:54;s:1:\"b\";s:29:\"student-fees-dashboard.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:22:\"student-fees-dashboard\";s:1:\"g\";s:11:\"Fees Module\";}i:30;a:5:{s:1:\"a\";i:55;s:1:\"b\";s:10:\"event.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:5:\"event\";s:1:\"g\";s:11:\"Fees Module\";}i:31;a:5:{s:1:\"a\";i:56;s:1:\"b\";s:12:\"event.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:5:\"event\";s:1:\"g\";s:11:\"Fees Module\";}i:32;a:5:{s:1:\"a\";i:57;s:1:\"b\";s:10:\"event.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:5:\"event\";s:1:\"g\";s:11:\"Fees Module\";}i:33;a:5:{s:1:\"a\";i:58;s:1:\"b\";s:12:\"event.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:5:\"event\";s:1:\"g\";s:11:\"Fees Module\";}i:34;a:5:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"event.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:5:\"event\";s:1:\"g\";s:11:\"Fees Module\";}i:35;a:5:{s:1:\"a\";i:60;s:1:\"b\";s:13:\"calendar.view\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:8:\"calendar\";s:1:\"g\";s:11:\"Fees Module\";}i:36;a:5:{s:1:\"a\";i:61;s:1:\"b\";s:15:\"calendar.create\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:8:\"calendar\";s:1:\"g\";s:11:\"Fees Module\";}i:37;a:5:{s:1:\"a\";i:62;s:1:\"b\";s:13:\"calendar.edit\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:8:\"calendar\";s:1:\"g\";s:11:\"Fees Module\";}i:38;a:5:{s:1:\"a\";i:63;s:1:\"b\";s:15:\"calendar.delete\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:8:\"calendar\";s:1:\"g\";s:11:\"Fees Module\";}i:39;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"calendar.update\";s:1:\"c\";s:3:\"web\";s:1:\"f\";s:8:\"calendar\";s:1:\"g\";s:11:\"Fees Module\";}}s:5:\"roles\";a:0:{}}', 1739959506);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `backgroundColor` varchar(255) NOT NULL DEFAULT '#007bff',
  `borderColor` varchar(255) NOT NULL DEFAULT '#007bff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `title`, `start`, `end`, `backgroundColor`, `borderColor`, `created_at`, `updated_at`, `company_id`, `created_by`) VALUES
(15, 'Lunch', '2025-02-23 00:00:00', NULL, 'rgb(6, 214, 160)', 'rgb(6, 214, 160)', '2025-02-12 08:07:39', '2025-02-12 08:07:39', 1, NULL),
(16, 'hy', '2025-02-05 00:00:00', NULL, 'rgb(6, 214, 160)', 'rgb(6, 214, 160)', '2025-02-13 06:12:14', '2025-02-13 06:12:14', 3, NULL),
(17, 'hy', '2025-02-11 00:00:00', NULL, 'rgb(6, 214, 160)', 'rgb(6, 214, 160)', '2025-02-13 06:14:37', '2025-02-13 06:14:37', 3, NULL),
(18, 'hy', '2025-02-04 00:00:00', NULL, 'rgb(6, 214, 160)', 'rgb(6, 214, 160)', '2025-02-13 06:15:02', '2025-02-13 06:15:02', 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'North and Middle Andaman', 32, NULL, NULL),
(2, 'South Andaman', 32, NULL, NULL),
(3, 'Nicobar', 32, NULL, NULL),
(4, 'Adilabad', 1, NULL, NULL),
(5, 'Anantapur', 1, NULL, NULL),
(6, 'Chittoor', 1, NULL, NULL),
(7, 'East Godavari', 1, NULL, NULL),
(8, 'Guntur', 1, NULL, NULL),
(9, 'Hyderabad', 1, NULL, NULL),
(10, 'Kadapa', 1, NULL, NULL),
(11, 'Karimnagar', 1, NULL, NULL),
(12, 'Khammam', 1, NULL, NULL),
(13, 'Krishna', 1, NULL, NULL),
(14, 'Kurnool', 1, NULL, NULL),
(15, 'Mahbubnagar', 1, NULL, NULL),
(16, 'Medak', 1, NULL, NULL),
(17, 'Nalgonda', 1, NULL, NULL),
(18, 'Nellore', 1, NULL, NULL),
(19, 'Nizamabad', 1, NULL, NULL),
(20, 'Prakasam', 1, NULL, NULL),
(21, 'Rangareddi', 1, NULL, NULL),
(22, 'Srikakulam', 1, NULL, NULL),
(23, 'Vishakhapatnam', 1, NULL, NULL),
(24, 'Vizianagaram', 1, NULL, NULL),
(25, 'Warangal', 1, NULL, NULL),
(26, 'West Godavari', 1, NULL, NULL),
(27, 'Anjaw', 3, NULL, NULL),
(28, 'Changlang', 3, NULL, NULL),
(29, 'East Kameng', 3, NULL, NULL),
(30, 'Lohit', 3, NULL, NULL),
(31, 'Lower Subansiri', 3, NULL, NULL),
(32, 'Papum Pare', 3, NULL, NULL),
(33, 'Tirap', 3, NULL, NULL),
(34, 'Dibang Valley', 3, NULL, NULL),
(35, 'Upper Subansiri', 3, NULL, NULL),
(36, 'West Kameng', 3, NULL, NULL),
(37, 'Barpeta', 2, NULL, NULL),
(38, 'Bongaigaon', 2, NULL, NULL),
(39, 'Cachar', 2, NULL, NULL),
(40, 'Darrang', 2, NULL, NULL),
(41, 'Dhemaji', 2, NULL, NULL),
(42, 'Dhubri', 2, NULL, NULL),
(43, 'Dibrugarh', 2, NULL, NULL),
(44, 'Goalpara', 2, NULL, NULL),
(45, 'Golaghat', 2, NULL, NULL),
(46, 'Hailakandi', 2, NULL, NULL),
(47, 'Jorhat', 2, NULL, NULL),
(48, 'Karbi Anglong', 2, NULL, NULL),
(49, 'Karimganj', 2, NULL, NULL),
(50, 'Kokrajhar', 2, NULL, NULL),
(51, 'Lakhimpur', 2, NULL, NULL),
(52, 'Marigaon', 2, NULL, NULL),
(53, 'Nagaon', 2, NULL, NULL),
(54, 'Nalbari', 2, NULL, NULL),
(55, 'North Cachar Hills', 2, NULL, NULL),
(56, 'Sibsagar', 2, NULL, NULL),
(57, 'Sonitpur', 2, NULL, NULL),
(58, 'Tinsukia', 2, NULL, NULL),
(59, 'Araria', 4, NULL, NULL),
(60, 'Aurangabad', 4, NULL, NULL),
(61, 'Banka', 4, NULL, NULL),
(62, 'Begusarai', 4, NULL, NULL),
(63, 'Bhagalpur', 4, NULL, NULL),
(64, 'Bhojpur', 4, NULL, NULL),
(65, 'Buxar', 4, NULL, NULL),
(66, 'Darbhanga', 4, NULL, NULL),
(67, 'Purba Champaran', 4, NULL, NULL),
(68, 'Gaya', 4, NULL, NULL),
(69, 'Gopalganj', 4, NULL, NULL),
(70, 'Jamui', 4, NULL, NULL),
(71, 'Jehanabad', 4, NULL, NULL),
(72, 'Khagaria', 4, NULL, NULL),
(73, 'Kishanganj', 4, NULL, NULL),
(74, 'Kaimur', 4, NULL, NULL),
(75, 'Katihar', 4, NULL, NULL),
(76, 'Lakhisarai', 4, NULL, NULL),
(77, 'Madhubani', 4, NULL, NULL),
(78, 'Munger', 4, NULL, NULL),
(79, 'Madhepura', 4, NULL, NULL),
(80, 'Muzaffarpur', 4, NULL, NULL),
(81, 'Nalanda', 4, NULL, NULL),
(82, 'Nawada', 4, NULL, NULL),
(83, 'Patna', 4, NULL, NULL),
(84, 'Purnia', 4, NULL, NULL),
(85, 'Rohtas', 4, NULL, NULL),
(86, 'Saharsa', 4, NULL, NULL),
(87, 'Samastipur', 4, NULL, NULL),
(88, 'Sheohar', 4, NULL, NULL),
(89, 'Sheikhpura', 4, NULL, NULL),
(90, 'Saran', 4, NULL, NULL),
(91, 'Sitamarhi', 4, NULL, NULL),
(92, 'Supaul', 4, NULL, NULL),
(93, 'Siwan', 4, NULL, NULL),
(94, 'Vaishali', 4, NULL, NULL),
(95, 'Pashchim Champaran', 4, NULL, NULL),
(96, 'Bastar', 36, NULL, NULL),
(97, 'Bilaspur', 36, NULL, NULL),
(98, 'Dantewada', 36, NULL, NULL),
(99, 'Dhamtari', 36, NULL, NULL),
(100, 'Durg', 36, NULL, NULL),
(101, 'Jashpur', 36, NULL, NULL),
(102, 'Janjgir-Champa', 36, NULL, NULL),
(103, 'Korba', 36, NULL, NULL),
(104, 'Koriya', 36, NULL, NULL),
(105, 'Kanker', 36, NULL, NULL),
(106, 'Kawardha', 36, NULL, NULL),
(107, 'Mahasamund', 36, NULL, NULL),
(108, 'Raigarh', 36, NULL, NULL),
(109, 'Rajnandgaon', 36, NULL, NULL),
(110, 'Raipur', 36, NULL, NULL),
(111, 'Surguja', 36, NULL, NULL),
(112, 'Diu', 29, NULL, NULL),
(113, 'Daman', 29, NULL, NULL),
(114, 'Central Delhi', 25, NULL, NULL),
(115, 'East Delhi', 25, NULL, NULL),
(116, 'New Delhi', 25, NULL, NULL),
(117, 'North Delhi', 25, NULL, NULL),
(118, 'North East Delhi', 25, NULL, NULL),
(119, 'North West Delhi', 25, NULL, NULL),
(120, 'South Delhi', 25, NULL, NULL),
(121, 'South West Delhi', 25, NULL, NULL),
(122, 'West Delhi', 25, NULL, NULL),
(123, 'North Goa', 26, NULL, NULL),
(124, 'South Goa', 26, NULL, NULL),
(125, 'Ahmedabad', 5, NULL, NULL),
(126, 'Amreli District', 5, NULL, NULL),
(127, 'Anand', 5, NULL, NULL),
(128, 'Banaskantha', 5, NULL, NULL),
(129, 'Bharuch', 5, NULL, NULL),
(130, 'Bhavnagar', 5, NULL, NULL),
(131, 'Dahod', 5, NULL, NULL),
(132, 'The Dangs', 5, NULL, NULL),
(133, 'Gandhinagar', 5, NULL, NULL),
(134, 'Jamnagar', 5, NULL, NULL),
(135, 'Junagadh', 5, NULL, NULL),
(136, 'Kutch', 5, NULL, NULL),
(137, 'Kheda', 5, NULL, NULL),
(138, 'Mehsana', 5, NULL, NULL),
(139, 'Narmada', 5, NULL, NULL),
(140, 'Navsari', 5, NULL, NULL),
(141, 'Patan', 5, NULL, NULL),
(142, 'Panchmahal', 5, NULL, NULL),
(143, 'Porbandar', 5, NULL, NULL),
(144, 'Rajkot', 5, NULL, NULL),
(145, 'Sabarkantha', 5, NULL, NULL),
(146, 'Surendranagar', 5, NULL, NULL),
(147, 'Surat', 5, NULL, NULL),
(148, 'Vadodara', 5, NULL, NULL),
(149, 'Valsad', 5, NULL, NULL),
(150, 'Ambala', 6, NULL, NULL),
(151, 'Bhiwani', 6, NULL, NULL),
(152, 'Faridabad', 6, NULL, NULL),
(153, 'Fatehabad', 6, NULL, NULL),
(154, 'Gurgaon', 6, NULL, NULL),
(155, 'Hissar', 6, NULL, NULL),
(156, 'Jhajjar', 6, NULL, NULL),
(157, 'Jind', 6, NULL, NULL),
(158, 'Karnal', 6, NULL, NULL),
(159, 'Kaithal', 6, NULL, NULL),
(160, 'Kurukshetra', 6, NULL, NULL),
(161, 'Mahendragarh', 6, NULL, NULL),
(162, 'Mewat', 6, NULL, NULL),
(163, 'Panchkula', 6, NULL, NULL),
(164, 'Panipat', 6, NULL, NULL),
(165, 'Rewari', 6, NULL, NULL),
(166, 'Rohtak', 6, NULL, NULL),
(167, 'Sirsa', 6, NULL, NULL),
(168, 'Sonepat', 6, NULL, NULL),
(169, 'Yamuna Nagar', 6, NULL, NULL),
(170, 'Palwal', 6, NULL, NULL),
(171, 'Bilaspur', 7, NULL, NULL),
(172, 'Chamba', 7, NULL, NULL),
(173, 'Hamirpur', 7, NULL, NULL),
(174, 'Kangra', 7, NULL, NULL),
(175, 'Kinnaur', 7, NULL, NULL),
(176, 'Kulu', 7, NULL, NULL),
(177, 'Lahaul and Spiti', 7, NULL, NULL),
(178, 'Mandi', 7, NULL, NULL),
(179, 'Shimla', 7, NULL, NULL),
(180, 'Sirmaur', 7, NULL, NULL),
(181, 'Solan', 7, NULL, NULL),
(182, 'Una', 7, NULL, NULL),
(183, 'Anantnag', 8, NULL, NULL),
(184, 'Badgam', 8, NULL, NULL),
(185, 'Bandipore', 8, NULL, NULL),
(186, 'Baramula', 8, NULL, NULL),
(187, 'Doda', 8, NULL, NULL),
(188, 'Jammu', 8, NULL, NULL),
(189, 'Kargil', 8, NULL, NULL),
(190, 'Kathua', 8, NULL, NULL),
(191, 'Kupwara', 8, NULL, NULL),
(192, 'Leh', 8, NULL, NULL),
(193, 'Poonch', 8, NULL, NULL),
(194, 'Pulwama', 8, NULL, NULL),
(195, 'Rajauri', 8, NULL, NULL),
(196, 'Srinagar', 8, NULL, NULL),
(197, 'Samba', 8, NULL, NULL),
(198, 'Udhampur', 8, NULL, NULL),
(199, 'Bokaro', 34, NULL, NULL),
(200, 'Chatra', 34, NULL, NULL),
(201, 'Deoghar', 34, NULL, NULL),
(202, 'Dhanbad', 34, NULL, NULL),
(203, 'Dumka', 34, NULL, NULL),
(204, 'Purba Singhbhum', 34, NULL, NULL),
(205, 'Garhwa', 34, NULL, NULL),
(206, 'Giridih', 34, NULL, NULL),
(207, 'Godda', 34, NULL, NULL),
(208, 'Gumla', 34, NULL, NULL),
(209, 'Hazaribagh', 34, NULL, NULL),
(210, 'Koderma', 34, NULL, NULL),
(211, 'Lohardaga', 34, NULL, NULL),
(212, 'Pakur', 34, NULL, NULL),
(213, 'Palamu', 34, NULL, NULL),
(214, 'Ranchi', 34, NULL, NULL),
(215, 'Sahibganj', 34, NULL, NULL),
(216, 'Seraikela and Kharsawan', 34, NULL, NULL),
(217, 'Pashchim Singhbhum', 34, NULL, NULL),
(218, 'Ramgarh', 34, NULL, NULL),
(219, 'Bidar', 9, NULL, NULL),
(220, 'Belgaum', 9, NULL, NULL),
(221, 'Bijapur', 9, NULL, NULL),
(222, 'Bagalkot', 9, NULL, NULL),
(223, 'Bellary', 9, NULL, NULL),
(224, 'Bangalore Rural District', 9, NULL, NULL),
(225, 'Bangalore Urban District', 9, NULL, NULL),
(226, 'Chamarajnagar', 9, NULL, NULL),
(227, 'Chikmagalur', 9, NULL, NULL),
(228, 'Chitradurga', 9, NULL, NULL),
(229, 'Davanagere', 9, NULL, NULL),
(230, 'Dharwad', 9, NULL, NULL),
(231, 'Dakshina Kannada', 9, NULL, NULL),
(232, 'Gadag', 9, NULL, NULL),
(233, 'Gulbarga', 9, NULL, NULL),
(234, 'Hassan', 9, NULL, NULL),
(235, 'Haveri District', 9, NULL, NULL),
(236, 'Kodagu', 9, NULL, NULL),
(237, 'Kolar', 9, NULL, NULL),
(238, 'Koppal', 9, NULL, NULL),
(239, 'Mandya', 9, NULL, NULL),
(240, 'Mysore', 9, NULL, NULL),
(241, 'Raichur', 9, NULL, NULL),
(242, 'Shimoga', 9, NULL, NULL),
(243, 'Tumkur', 9, NULL, NULL),
(244, 'Udupi', 9, NULL, NULL),
(245, 'Uttara Kannada', 9, NULL, NULL),
(246, 'Ramanagara', 9, NULL, NULL),
(247, 'Chikballapur', 9, NULL, NULL),
(248, 'Yadagiri', 9, NULL, NULL),
(249, 'Alappuzha', 10, NULL, NULL),
(250, 'Ernakulam', 10, NULL, NULL),
(251, 'Idukki', 10, NULL, NULL),
(252, 'Kollam', 10, NULL, NULL),
(253, 'Kannur', 10, NULL, NULL),
(254, 'Kasaragod', 10, NULL, NULL),
(255, 'Kottayam', 10, NULL, NULL),
(256, 'Kozhikode', 10, NULL, NULL),
(257, 'Malappuram', 10, NULL, NULL),
(258, 'Palakkad', 10, NULL, NULL),
(259, 'Pathanamthitta', 10, NULL, NULL),
(260, 'Thrissur', 10, NULL, NULL),
(261, 'Thiruvananthapuram', 10, NULL, NULL),
(262, 'Wayanad', 10, NULL, NULL),
(263, 'Alirajpur', 11, NULL, NULL),
(264, 'Anuppur', 11, NULL, NULL),
(265, 'Ashok Nagar', 11, NULL, NULL),
(266, 'Balaghat', 11, NULL, NULL),
(267, 'Barwani', 11, NULL, NULL),
(268, 'Betul', 11, NULL, NULL),
(269, 'Bhind', 11, NULL, NULL),
(270, 'Bhopal', 11, NULL, NULL),
(271, 'Burhanpur', 11, NULL, NULL),
(272, 'Chhatarpur', 11, NULL, NULL),
(273, 'Chhindwara', 11, NULL, NULL),
(274, 'Damoh', 11, NULL, NULL),
(275, 'Datia', 11, NULL, NULL),
(276, 'Dewas', 11, NULL, NULL),
(277, 'Dhar', 11, NULL, NULL),
(278, 'Dindori', 11, NULL, NULL),
(279, 'Guna', 11, NULL, NULL),
(280, 'Gwalior', 11, NULL, NULL),
(281, 'Harda', 11, NULL, NULL),
(282, 'Hoshangabad', 11, NULL, NULL),
(283, 'Indore', 11, NULL, NULL),
(284, 'Jabalpur', 11, NULL, NULL),
(285, 'Jhabua', 11, NULL, NULL),
(286, 'Katni', 11, NULL, NULL),
(287, 'Khandwa', 11, NULL, NULL),
(288, 'Khargone', 11, NULL, NULL),
(289, 'Mandla', 11, NULL, NULL),
(290, 'Mandsaur', 11, NULL, NULL),
(291, 'Morena', 11, NULL, NULL),
(292, 'Narsinghpur', 11, NULL, NULL),
(293, 'Neemuch', 11, NULL, NULL),
(294, 'Panna', 11, NULL, NULL),
(295, 'Rewa', 11, NULL, NULL),
(296, 'Rajgarh', 11, NULL, NULL),
(297, 'Ratlam', 11, NULL, NULL),
(298, 'Raisen', 11, NULL, NULL),
(299, 'Sagar', 11, NULL, NULL),
(300, 'Satna', 11, NULL, NULL),
(301, 'Sehore', 11, NULL, NULL),
(302, 'Seoni', 11, NULL, NULL),
(303, 'Shahdol', 11, NULL, NULL),
(304, 'Shajapur', 11, NULL, NULL),
(305, 'Sheopur', 11, NULL, NULL),
(306, 'Shivpuri', 11, NULL, NULL),
(307, 'Sidhi', 11, NULL, NULL),
(308, 'Singrauli', 11, NULL, NULL),
(309, 'Tikamgarh', 11, NULL, NULL),
(310, 'Ujjain', 11, NULL, NULL),
(311, 'Umaria', 11, NULL, NULL),
(312, 'Vidisha', 11, NULL, NULL),
(313, 'Ahmednagar', 12, NULL, NULL),
(314, 'Akola', 12, NULL, NULL),
(315, 'Amrawati', 12, NULL, NULL),
(316, 'Aurangabad', 12, NULL, NULL),
(317, 'Bhandara', 12, NULL, NULL),
(318, 'Beed', 12, NULL, NULL),
(319, 'Buldhana', 12, NULL, NULL),
(320, 'Chandrapur', 12, NULL, NULL),
(321, 'Dhule', 12, NULL, NULL),
(322, 'Gadchiroli', 12, NULL, NULL),
(323, 'Gondiya', 12, NULL, NULL),
(324, 'Hingoli', 12, NULL, NULL),
(325, 'Jalgaon', 12, NULL, NULL),
(326, 'Jalna', 12, NULL, NULL),
(327, 'Kolhapur', 12, NULL, NULL),
(328, 'Latur', 12, NULL, NULL),
(329, 'Mumbai City', 12, NULL, NULL),
(330, 'Mumbai suburban', 12, NULL, NULL),
(331, 'Nandurbar', 12, NULL, NULL),
(332, 'Nanded', 12, NULL, NULL),
(333, 'Nagpur', 12, NULL, NULL),
(334, 'Nashik', 12, NULL, NULL),
(335, 'Osmanabad', 12, NULL, NULL),
(336, 'Parbhani', 12, NULL, NULL),
(337, 'Pune', 12, NULL, NULL),
(338, 'Raigad', 12, NULL, NULL),
(339, 'Ratnagiri', 12, NULL, NULL),
(340, 'Sindhudurg', 12, NULL, NULL),
(341, 'Sangli', 12, NULL, NULL),
(342, 'Solapur', 12, NULL, NULL),
(343, 'Satara', 12, NULL, NULL),
(344, 'Thane', 12, NULL, NULL),
(345, 'Wardha', 12, NULL, NULL),
(346, 'Washim', 12, NULL, NULL),
(347, 'Yavatmal', 12, NULL, NULL),
(348, 'Bishnupur', 13, NULL, NULL),
(349, 'Churachandpur', 13, NULL, NULL),
(350, 'Chandel', 13, NULL, NULL),
(351, 'Imphal East', 13, NULL, NULL),
(352, 'Senapati', 13, NULL, NULL),
(353, 'Tamenglong', 13, NULL, NULL),
(354, 'Thoubal', 13, NULL, NULL),
(355, 'Ukhrul', 13, NULL, NULL),
(356, 'Imphal West', 13, NULL, NULL),
(357, 'East Garo Hills', 14, NULL, NULL),
(358, 'East Khasi Hills', 14, NULL, NULL),
(359, 'Jaintia Hills', 14, NULL, NULL),
(360, 'Ri-Bhoi', 14, NULL, NULL),
(361, 'South Garo Hills', 14, NULL, NULL),
(362, 'West Garo Hills', 14, NULL, NULL),
(363, 'West Khasi Hills', 14, NULL, NULL),
(364, 'Aizawl', 15, NULL, NULL),
(365, 'Champhai', 15, NULL, NULL),
(366, 'Kolasib', 15, NULL, NULL),
(367, 'Lawngtlai', 15, NULL, NULL),
(368, 'Lunglei', 15, NULL, NULL),
(369, 'Mamit', 15, NULL, NULL),
(370, 'Saiha', 15, NULL, NULL),
(371, 'Serchhip', 15, NULL, NULL),
(372, 'Dimapur', 16, NULL, NULL),
(373, 'Kohima', 16, NULL, NULL),
(374, 'Mokokchung', 16, NULL, NULL),
(375, 'Mon', 16, NULL, NULL),
(376, 'Phek', 16, NULL, NULL),
(377, 'Tuensang', 16, NULL, NULL),
(378, 'Wokha', 16, NULL, NULL),
(379, 'Zunheboto', 16, NULL, NULL),
(380, 'Angul', 17, NULL, NULL),
(381, 'Boudh', 17, NULL, NULL),
(382, 'Bhadrak', 17, NULL, NULL),
(383, 'Bolangir', 17, NULL, NULL),
(384, 'Bargarh', 17, NULL, NULL),
(385, 'Baleswar', 17, NULL, NULL),
(386, 'Cuttack', 17, NULL, NULL),
(387, 'Debagarh', 17, NULL, NULL),
(388, 'Dhenkanal', 17, NULL, NULL),
(389, 'Ganjam', 17, NULL, NULL),
(390, 'Gajapati', 17, NULL, NULL),
(391, 'Jharsuguda', 17, NULL, NULL),
(392, 'Jajapur', 17, NULL, NULL),
(393, 'Jagatsinghpur', 17, NULL, NULL),
(394, 'Khordha', 17, NULL, NULL),
(395, 'Kendujhar', 17, NULL, NULL),
(396, 'Kalahandi', 17, NULL, NULL),
(397, 'Kandhamal', 17, NULL, NULL),
(398, 'Koraput', 17, NULL, NULL),
(399, 'Kendrapara', 17, NULL, NULL),
(400, 'Malkangiri', 17, NULL, NULL),
(401, 'Mayurbhanj', 17, NULL, NULL),
(402, 'Nabarangpur', 17, NULL, NULL),
(403, 'Nuapada', 17, NULL, NULL),
(404, 'Nayagarh', 17, NULL, NULL),
(405, 'Puri', 17, NULL, NULL),
(406, 'Rayagada', 17, NULL, NULL),
(407, 'Sambalpur', 17, NULL, NULL),
(408, 'Subarnapur', 17, NULL, NULL),
(409, 'Sundargarh', 17, NULL, NULL),
(410, 'Karaikal', 27, NULL, NULL),
(411, 'Mahe', 27, NULL, NULL),
(412, 'Puducherry', 27, NULL, NULL),
(413, 'Yanam', 27, NULL, NULL),
(414, 'Amritsar', 18, NULL, NULL),
(415, 'Bathinda', 18, NULL, NULL),
(416, 'Firozpur', 18, NULL, NULL),
(417, 'Faridkot', 18, NULL, NULL),
(418, 'Fatehgarh Sahib', 18, NULL, NULL),
(419, 'Gurdaspur', 18, NULL, NULL),
(420, 'Hoshiarpur', 18, NULL, NULL),
(421, 'Jalandhar', 18, NULL, NULL),
(422, 'Kapurthala', 18, NULL, NULL),
(423, 'Ludhiana', 18, NULL, NULL),
(424, 'Mansa', 18, NULL, NULL),
(425, 'Moga', 18, NULL, NULL),
(426, 'Mukatsar', 18, NULL, NULL),
(427, 'Nawan Shehar', 18, NULL, NULL),
(428, 'Patiala', 18, NULL, NULL),
(429, 'Rupnagar', 18, NULL, NULL),
(430, 'Sangrur', 18, NULL, NULL),
(431, 'Ajmer', 19, NULL, NULL),
(432, 'Alwar', 19, NULL, NULL),
(433, 'Bikaner', 19, NULL, NULL),
(434, 'Barmer', 19, NULL, NULL),
(435, 'Banswara', 19, NULL, NULL),
(436, 'Bharatpur', 19, NULL, NULL),
(437, 'Baran', 19, NULL, NULL),
(438, 'Bundi', 19, NULL, NULL),
(439, 'Bhilwara', 19, NULL, NULL),
(440, 'Churu', 19, NULL, NULL),
(441, 'Chittorgarh', 19, NULL, NULL),
(442, 'Dausa', 19, NULL, NULL),
(443, 'Dholpur', 19, NULL, NULL),
(444, 'Dungapur', 19, NULL, NULL),
(445, 'Ganganagar', 19, NULL, NULL),
(446, 'Hanumangarh', 19, NULL, NULL),
(447, 'Juhnjhunun', 19, NULL, NULL),
(448, 'Jalore', 19, NULL, NULL),
(449, 'Jodhpur', 19, NULL, NULL),
(450, 'Jaipur', 19, NULL, NULL),
(451, 'Jaisalmer', 19, NULL, NULL),
(452, 'Jhalawar', 19, NULL, NULL),
(453, 'Karauli', 19, NULL, NULL),
(454, 'Kota', 19, NULL, NULL),
(455, 'Nagaur', 19, NULL, NULL),
(456, 'Pali', 19, NULL, NULL),
(457, 'Pratapgarh', 19, NULL, NULL),
(458, 'Rajsamand', 19, NULL, NULL),
(459, 'Sikar', 19, NULL, NULL),
(460, 'Sawai Madhopur', 19, NULL, NULL),
(461, 'Sirohi', 19, NULL, NULL),
(462, 'Tonk', 19, NULL, NULL),
(463, 'Udaipur', 19, NULL, NULL),
(464, 'East Sikkim', 20, NULL, NULL),
(465, 'North Sikkim', 20, NULL, NULL),
(466, 'South Sikkim', 20, NULL, NULL),
(467, 'West Sikkim', 20, NULL, NULL),
(468, 'Ariyalur', 21, NULL, NULL),
(469, 'Chennai', 21, NULL, NULL),
(470, 'Coimbatore', 21, NULL, NULL),
(471, 'Cuddalore', 21, NULL, NULL),
(472, 'Dharmapuri', 21, NULL, NULL),
(473, 'Dindigul', 21, NULL, NULL),
(474, 'Erode', 21, NULL, NULL),
(475, 'Kanchipuram', 21, NULL, NULL),
(476, 'Kanyakumari', 21, NULL, NULL),
(477, 'Karur', 21, NULL, NULL),
(478, 'Madurai', 21, NULL, NULL),
(479, 'Nagapattinam', 21, NULL, NULL),
(480, 'The Nilgiris', 21, NULL, NULL),
(481, 'Namakkal', 21, NULL, NULL),
(482, 'Perambalur', 21, NULL, NULL),
(483, 'Pudukkottai', 21, NULL, NULL),
(484, 'Ramanathapuram', 21, NULL, NULL),
(485, 'Salem', 21, NULL, NULL),
(486, 'Sivagangai', 21, NULL, NULL),
(487, 'Tiruppur', 21, NULL, NULL),
(488, 'Tiruchirappalli', 21, NULL, NULL),
(489, 'Theni', 21, NULL, NULL),
(490, 'Tirunelveli', 21, NULL, NULL),
(491, 'Thanjavur', 21, NULL, NULL),
(492, 'Thoothukudi', 21, NULL, NULL),
(493, 'Thiruvallur', 21, NULL, NULL),
(494, 'Thiruvarur', 21, NULL, NULL),
(495, 'Tiruvannamalai', 21, NULL, NULL),
(496, 'Vellore', 21, NULL, NULL),
(497, 'Villupuram', 21, NULL, NULL),
(498, 'Dhalai', 22, NULL, NULL),
(499, 'North Tripura', 22, NULL, NULL),
(500, 'South Tripura', 22, NULL, NULL),
(501, 'West Tripura', 22, NULL, NULL),
(502, 'Almora', 33, NULL, NULL),
(503, 'Bageshwar', 33, NULL, NULL),
(504, 'Chamoli', 33, NULL, NULL),
(505, 'Champawat', 33, NULL, NULL),
(506, 'Dehradun', 33, NULL, NULL),
(507, 'Haridwar', 33, NULL, NULL),
(508, 'Nainital', 33, NULL, NULL),
(509, 'Pauri Garhwal', 33, NULL, NULL),
(510, 'Pithoragharh', 33, NULL, NULL),
(511, 'Rudraprayag', 33, NULL, NULL),
(512, 'Tehri Garhwal', 33, NULL, NULL),
(513, 'Udham Singh Nagar', 33, NULL, NULL),
(514, 'Uttarkashi', 33, NULL, NULL),
(515, 'Agra', 23, NULL, NULL),
(516, 'Allahabad', 23, NULL, NULL),
(517, 'Aligarh', 23, NULL, NULL),
(518, 'Ambedkar Nagar', 23, NULL, NULL),
(519, 'Auraiya', 23, NULL, NULL),
(520, 'Azamgarh', 23, NULL, NULL),
(521, 'Barabanki', 23, NULL, NULL),
(522, 'Badaun', 23, NULL, NULL),
(523, 'Bagpat', 23, NULL, NULL),
(524, 'Bahraich', 23, NULL, NULL),
(525, 'Bijnor', 23, NULL, NULL),
(526, 'Ballia', 23, NULL, NULL),
(527, 'Banda', 23, NULL, NULL),
(528, 'Balrampur', 23, NULL, NULL),
(529, 'Bareilly', 23, NULL, NULL),
(530, 'Basti', 23, NULL, NULL),
(531, 'Bulandshahr', 23, NULL, NULL),
(532, 'Chandauli', 23, NULL, NULL),
(533, 'Chitrakoot', 23, NULL, NULL),
(534, 'Deoria', 23, NULL, NULL),
(535, 'Etah', 23, NULL, NULL),
(536, 'Kanshiram Nagar', 23, NULL, NULL),
(537, 'Etawah', 23, NULL, NULL),
(538, 'Firozabad', 23, NULL, NULL),
(539, 'Farrukhabad', 23, NULL, NULL),
(540, 'Fatehpur', 23, NULL, NULL),
(541, 'Faizabad', 23, NULL, NULL),
(542, 'Gautam Buddha Nagar', 23, NULL, NULL),
(543, 'Gonda', 23, NULL, NULL),
(544, 'Ghazipur', 23, NULL, NULL),
(545, 'Gorkakhpur', 23, NULL, NULL),
(546, 'Ghaziabad', 23, NULL, NULL),
(547, 'Hamirpur', 23, NULL, NULL),
(548, 'Hardoi', 23, NULL, NULL),
(549, 'Mahamaya Nagar', 23, NULL, NULL),
(550, 'Jhansi', 23, NULL, NULL),
(551, 'Jalaun', 23, NULL, NULL),
(552, 'Jyotiba Phule Nagar', 23, NULL, NULL),
(553, 'Jaunpur District', 23, NULL, NULL),
(554, 'Kanpur Dehat', 23, NULL, NULL),
(555, 'Kannauj', 23, NULL, NULL),
(556, 'Kanpur Nagar', 23, NULL, NULL),
(557, 'Kaushambi', 23, NULL, NULL),
(558, 'Kushinagar', 23, NULL, NULL),
(559, 'Lalitpur', 23, NULL, NULL),
(560, 'Lakhimpur Kheri', 23, NULL, NULL),
(561, 'Lucknow', 23, NULL, NULL),
(562, 'Mau', 23, NULL, NULL),
(563, 'Meerut', 23, NULL, NULL),
(564, 'Maharajganj', 23, NULL, NULL),
(565, 'Mahoba', 23, NULL, NULL),
(566, 'Mirzapur', 23, NULL, NULL),
(567, 'Moradabad', 23, NULL, NULL),
(568, 'Mainpuri', 23, NULL, NULL),
(569, 'Mathura', 23, NULL, NULL),
(570, 'Muzaffarnagar', 23, NULL, NULL),
(571, 'Pilibhit', 23, NULL, NULL),
(572, 'Pratapgarh', 23, NULL, NULL),
(573, 'Rampur', 23, NULL, NULL),
(574, 'Rae Bareli', 23, NULL, NULL),
(575, 'Saharanpur', 23, NULL, NULL),
(576, 'Sitapur', 23, NULL, NULL),
(577, 'Shahjahanpur', 23, NULL, NULL),
(578, 'Sant Kabir Nagar', 23, NULL, NULL),
(579, 'Siddharthnagar', 23, NULL, NULL),
(580, 'Sonbhadra', 23, NULL, NULL),
(581, 'Sant Ravidas Nagar', 23, NULL, NULL),
(582, 'Sultanpur', 23, NULL, NULL),
(583, 'Shravasti', 23, NULL, NULL),
(584, 'Unnao', 23, NULL, NULL),
(585, 'Varanasi', 23, NULL, NULL),
(586, 'Birbhum', 24, NULL, NULL),
(587, 'Bankura', 24, NULL, NULL),
(588, 'Bardhaman', 24, NULL, NULL),
(589, 'Darjeeling', 24, NULL, NULL),
(590, 'Dakshin Dinajpur', 24, NULL, NULL),
(591, 'Hooghly', 24, NULL, NULL),
(592, 'Howrah', 24, NULL, NULL),
(593, 'Jalpaiguri', 24, NULL, NULL),
(594, 'Cooch Behar', 24, NULL, NULL),
(595, 'Kolkata', 24, NULL, NULL),
(596, 'Malda', 24, NULL, NULL),
(597, 'Midnapore', 24, NULL, NULL),
(598, 'Murshidabad', 24, NULL, NULL),
(599, 'Nadia', 24, NULL, NULL),
(600, 'North 24 Parganas', 24, NULL, NULL),
(601, 'South 24 Parganas', 24, NULL, NULL),
(602, 'Purulia', 24, NULL, NULL),
(603, 'Uttar Dinajpur', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `team_size` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `company_name`, `email`, `phone`, `team_size`, `industry`, `user_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Salim', 'Crazybox Studio', 'crazyboxstudio@gmail.com', '9510895637', '1-10', 'IT / ITES', '2', 'active', '2', NULL, NULL, NULL, '2025-01-07 06:00:30', '2025-01-07 06:00:30', NULL),
(5, 'new company', 'new company', 'bhavik22232@bcreative.in', '9979975411', '1-10', 'IT / ITES', '13', 'active', '13', NULL, NULL, NULL, '2025-02-14 04:32:33', '2025-02-14 04:32:33', NULL),
(6, 'new company', 'new company', 'newcompany@gmail.com', '9979975411', '1-10', 'IT / ITES', '14', 'active', '14', NULL, NULL, NULL, '2025-02-14 05:26:23', '2025-02-14 05:26:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `domain_classes`
--

CREATE TABLE `domain_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `fees` decimal(10,2) DEFAULT NULL COMMENT 'Fees for the domain class',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sequence_number` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#0000FF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domain_classes`
--

INSERT INTO `domain_classes` (`id`, `company_id`, `created_by`, `name`, `fees`, `status`, `created_at`, `updated_at`, `sequence_number`, `color`) VALUES
(1, 1, 8, 'Mathematics', 15000.00, '1', '2025-01-07 11:36:40', '2025-01-16 07:25:14', 1, 'badge-primary'),
(2, 1, 8, 'Science', 12000.00, '1', '2025-01-07 11:36:40', '2025-01-16 07:25:47', 2, 'badge-secondary'),
(3, 1, 3, 'History', 15000.00, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 3, 'badge-success'),
(4, 1, 3, 'English', NULL, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 4, 'badge-danger'),
(5, NULL, 8, 'Geography', NULL, '1', '2025-01-07 11:36:40', '2025-01-12 23:37:43', 5, 'badge-info'),
(6, 1, 3, 'Physics', NULL, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 6, 'badge-light'),
(7, 1, 8, 'Chemistry', NULL, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 7, 'badge-dark'),
(8, 1, 3, 'Biology', NULL, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 8, 'badge-primary'),
(9, 1, 3, 'Computer Science', NULL, '1', '2025-01-07 11:36:40', '2025-01-10 08:13:38', 9, 'badge-secondary'),
(10, 1, 8, 'Economics', NULL, '1', '2025-01-07 11:36:40', '2025-01-07 11:36:40', 10, 'badge-success'),
(11, 1, 1, 'Ghori Yahya', NULL, '1', '2025-01-09 07:02:53', '2025-01-09 07:02:53', 15, 'badge-success'),
(13, 1, 1, 'Test Domain New', 81000.00, '1', '2025-02-06 04:21:33', '2025-02-06 04:21:33', 3, 'badge-primary');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `sequence_number` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `status`, `company_id`, `sequence_number`, `color`) VALUES
(1, 'Lunch', 'Lunchhy', '2025-02-12 05:05:33', '2025-02-12 05:29:18', NULL, 1, 1, 1, 'bg-success'),
(2, 'Remainder', 'Remainder', '2025-02-12 05:32:50', '2025-02-12 05:32:50', NULL, 1, 1, 2, 'bg-warning'),
(3, 'Tour', 'Tour', '2025-02-12 05:33:27', '2025-02-12 05:33:27', NULL, 1, 1, 3, 'bg-info'),
(4, 'hy', 'hello', '2025-02-13 06:11:26', '2025-02-13 06:11:26', NULL, 1, 3, 1, 'bg-success');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `follow_up_date` date NOT NULL,
  `follow_up_time` time NOT NULL,
  `follow_up_status` enum('today','pending','upcoming') NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `key`, `name`, `company_id`, `created_at`, `updated_at`, `group_menu`) VALUES
(1, 'user', 'User', NULL, NULL, NULL, 'User'),
(2, 'follow_up', 'Follow Up', NULL, NULL, NULL, 'Follow up'),
(3, 'create_follow_up', 'Create Follow Up', NULL, NULL, '2025-02-17 04:53:50', 'Follow up'),
(4, 'priority', 'Priority', NULL, NULL, NULL, 'Follow up'),
(5, 'student', 'Student', NULL, NULL, NULL, 'Follow up'),
(6, 'admission', 'Admission', NULL, NULL, NULL, 'Follow up'),
(7, 'student_fees', 'Manage Fees', NULL, NULL, NULL, 'Fees'),
(8, 'student_fees_dashboard_create', 'Outstanding Fees', NULL, NULL, NULL, 'Fees'),
(9, 'calendar', 'Calendar', NULL, NULL, NULL, 'Fees'),
(10, 'event', 'Add Event', NULL, NULL, NULL, 'Fees'),
(11, 'user_6', 'user', 6, '2025-02-14 05:26:23', '2025-02-18 04:48:10', 'User'),
(12, 'follow_up_6', 'Follow Up', 6, '2025-02-14 05:26:23', '2025-02-18 07:20:34', 'Follow up'),
(13, 'create_follow_up_6', 'Create Follow Up', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Follow up'),
(14, 'priority_6', 'Priority', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Follow up'),
(15, 'student_6', 'Student', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Follow up'),
(16, 'admission_6', 'Admission', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Follow up'),
(17, 'student_fees_6', 'manage Fees', 6, '2025-02-14 05:26:23', '2025-02-18 04:46:05', 'Fees'),
(18, 'student_fees_dashboard_create_6', 'Outstanding Fees', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Fees'),
(19, 'calendar_6', 'Calendar', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Fees'),
(20, 'event_6', 'Add Event', 6, '2025-02-14 05:26:23', '2025-02-18 04:38:13', 'Fees'),
(21, 'domain_class', 'Add Domain / Class', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_11_054644_add_status_to_users_table', 2),
(5, '2024_12_11_095259_create_permission_tables', 3),
(6, '2024_12_11_130137_add_role_id_to_users_table', 4),
(7, '2024_12_11_130829_add_group_name_to_permissions_table', 5),
(8, '2024_12_13_053905_add_soft_deletes_to_users_table', 6),
(9, '2024_12_13_070507_create_states_table', 7),
(10, '2024_12_13_070800_create_cities_table', 8),
(11, '2024_12_13_091645_create_cities_table', 9),
(12, '2024_12_13_101605_add_fields_to_users_table', 10),
(13, '2024_12_13_124556_create_domain_classes_table', 11),
(14, '2024_12_13_125825_add_fields_to_domain_classes_table', 12),
(15, '2024_12_16_044905_create_students_table', 13),
(16, '2024_12_16_045927_create_students_table', 14),
(17, '2024_12_16_050504_create_follow_ups_table', 15),
(18, '2024_12_16_053046_add_fields_to_follow_ups_table', 16),
(19, '2024_12_16_090654_add_fields_to_students_table', 17),
(20, '2024_12_16_090855_create_prioritys_table', 18),
(21, '2024_12_17_092115_create_company_table', 19),
(22, '2024_12_17_095112_create_company_table', 20),
(23, '2024_12_17_122122_create_company_table', 21),
(24, '2024_12_17_122231_create_company_table', 22),
(25, '2024_12_18_065047_add_fields_to_users_table', 23),
(26, '2024_12_20_054042_add_company_id_to_prioritys_table', 24),
(27, '2024_12_20_110848_add_company_id_to_domain_classes_table', 25),
(28, '2024_12_23_053219_add_company_id_to_follow_ups_table', 26),
(29, '2024_12_23_112631_add_photo_to_company_table', 27),
(30, '2024_12_30_100353_add_message_to_students_table', 28),
(31, '2024_12_30_101627_add_follow_up_date_to_students_table', 29),
(32, '2024_12_31_091833_add_company_id_to_students_table', 30),
(33, '2025_01_01_061420_add_color_to_domain_classes_table', 31),
(34, '2025_01_01_064430_add_color_to_prioritys_table', 32),
(35, '2025_01_08_060618_add_followup_status_to_students_table', 33),
(36, '2025_01_08_060816_remove_followup_status_from_students_table', 34),
(37, '2025_01_08_060839_add_text_followup_status_to_students_table', 35),
(38, '2025_01_09_094412_add_fields_to_students_table', 36),
(39, '2025_01_16_055651_create_domain_class_types_table', 37),
(40, '2025_01_16_072432_add_domain_class_type_to_students_table', 38),
(41, '2025_01_16_125334_add_fees_to_domain_classes_table', 39),
(42, '2025_01_17_071351_create_modules_table', 40),
(43, '2025_01_17_094813_add_module_name_to_permissions_table', 41),
(44, '2025_01_17_095142_add_is_active_to_modules_table', 42),
(45, '2025_01_17_095808_create_purchase_module_company_table', 43),
(46, '2025_01_17_102734_add_user_limit_to_purchase_module_company_table', 44),
(47, '2025_02_05_070253_add_session_id_to_users_table', 45),
(48, '2025_02_06_045639_create_student_fees_table', 46),
(49, '2025_02_06_050228_create_student_fee_installments_table', 46),
(50, '2025_02_06_051645_update_student_fees_table', 47),
(51, '2025_02_10_052210_add_discounted_fees_to_student_fees', 48),
(52, '2025_02_12_100459_create_events_table', 49),
(53, '2025_02_12_100647_add_status_to_events', 50),
(54, '2025_02_12_100828_add_company_id_to_events', 51),
(55, '2025_02_12_102848_add_sequence_number_to_events', 52),
(56, '2025_02_12_105125_add_color_to_events', 53),
(57, '2025_02_12_110515_create_calendar_events_table', 54),
(58, '2025_02_12_123856_add_company_id_to_calendar_events', 55),
(59, '2025_02_13_092131_add_created_by_to_student_fee_installments', 56),
(60, '2025_02_14_051444_create_menus_table', 57),
(61, '2025_02_14_070042_add_group_menu_to_menus', 58),
(62, '2025_02_17_054141_add_start_date_to_purchase_module_company', 59),
(63, '2025_02_17_054258_add_end_date_to_purchase_module_company', 60),
(64, '2025_02_17_054550_add_subscription_period_to_purchase_module_company', 61),
(65, '2025_02_17_060608_add_status_to_purchase_module_company', 62),
(66, '2025_02_17_111022_add_day_price_to_modules', 63);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 13),
(7, 'App\\Models\\User', 14),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 13),
(8, 'App\\Models\\User', 14),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 3),
(9, 'App\\Models\\User', 11),
(9, 'App\\Models\\User', 13),
(9, 'App\\Models\\User', 14),
(10, 'App\\Models\\User', 11),
(10, 'App\\Models\\User', 13),
(10, 'App\\Models\\User', 14),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 2),
(12, 'App\\Models\\User', 3),
(12, 'App\\Models\\User', 11),
(12, 'App\\Models\\User', 13),
(12, 'App\\Models\\User', 14),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 2),
(15, 'App\\Models\\User', 3),
(15, 'App\\Models\\User', 8),
(15, 'App\\Models\\User', 11),
(15, 'App\\Models\\User', 13),
(15, 'App\\Models\\User', 14),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 2),
(16, 'App\\Models\\User', 3),
(16, 'App\\Models\\User', 8),
(16, 'App\\Models\\User', 11),
(16, 'App\\Models\\User', 13),
(16, 'App\\Models\\User', 14),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 2),
(17, 'App\\Models\\User', 3),
(17, 'App\\Models\\User', 8),
(17, 'App\\Models\\User', 11),
(17, 'App\\Models\\User', 13),
(17, 'App\\Models\\User', 14),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 2),
(18, 'App\\Models\\User', 3),
(18, 'App\\Models\\User', 8),
(18, 'App\\Models\\User', 11),
(18, 'App\\Models\\User', 13),
(18, 'App\\Models\\User', 14),
(19, 'App\\Models\\User', 11),
(19, 'App\\Models\\User', 13),
(19, 'App\\Models\\User', 14),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 2),
(33, 'App\\Models\\User', 3),
(33, 'App\\Models\\User', 7),
(33, 'App\\Models\\User', 8),
(33, 'App\\Models\\User', 11),
(33, 'App\\Models\\User', 13),
(33, 'App\\Models\\User', 14),
(34, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 2),
(34, 'App\\Models\\User', 3),
(34, 'App\\Models\\User', 7),
(34, 'App\\Models\\User', 8),
(34, 'App\\Models\\User', 11),
(34, 'App\\Models\\User', 13),
(34, 'App\\Models\\User', 14),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 2),
(35, 'App\\Models\\User', 3),
(35, 'App\\Models\\User', 7),
(35, 'App\\Models\\User', 8),
(35, 'App\\Models\\User', 11),
(35, 'App\\Models\\User', 13),
(35, 'App\\Models\\User', 14),
(36, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 2),
(36, 'App\\Models\\User', 3),
(36, 'App\\Models\\User', 7),
(36, 'App\\Models\\User', 8),
(36, 'App\\Models\\User', 11),
(36, 'App\\Models\\User', 13),
(36, 'App\\Models\\User', 14),
(37, 'App\\Models\\User', 11),
(37, 'App\\Models\\User', 13),
(37, 'App\\Models\\User', 14),
(39, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 2),
(39, 'App\\Models\\User', 3),
(39, 'App\\Models\\User', 6),
(39, 'App\\Models\\User', 7),
(39, 'App\\Models\\User', 11),
(39, 'App\\Models\\User', 13),
(39, 'App\\Models\\User', 14),
(40, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 2),
(40, 'App\\Models\\User', 3),
(40, 'App\\Models\\User', 6),
(40, 'App\\Models\\User', 7),
(40, 'App\\Models\\User', 11),
(40, 'App\\Models\\User', 13),
(40, 'App\\Models\\User', 14),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 2),
(41, 'App\\Models\\User', 3),
(41, 'App\\Models\\User', 6),
(41, 'App\\Models\\User', 7),
(41, 'App\\Models\\User', 11),
(41, 'App\\Models\\User', 13),
(41, 'App\\Models\\User', 14),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 2),
(42, 'App\\Models\\User', 3),
(42, 'App\\Models\\User', 6),
(42, 'App\\Models\\User', 7),
(42, 'App\\Models\\User', 11),
(42, 'App\\Models\\User', 13),
(42, 'App\\Models\\User', 14),
(43, 'App\\Models\\User', 6),
(43, 'App\\Models\\User', 11),
(43, 'App\\Models\\User', 13),
(43, 'App\\Models\\User', 14),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 11),
(45, 'App\\Models\\User', 13),
(45, 'App\\Models\\User', 14),
(46, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 11),
(46, 'App\\Models\\User', 13),
(46, 'App\\Models\\User', 14),
(47, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 11),
(47, 'App\\Models\\User', 13),
(47, 'App\\Models\\User', 14),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 11),
(48, 'App\\Models\\User', 13),
(48, 'App\\Models\\User', 14),
(49, 'App\\Models\\User', 11),
(49, 'App\\Models\\User', 13),
(49, 'App\\Models\\User', 14),
(50, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 11),
(50, 'App\\Models\\User', 13),
(50, 'App\\Models\\User', 14),
(51, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 11),
(51, 'App\\Models\\User', 13),
(51, 'App\\Models\\User', 14),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 11),
(52, 'App\\Models\\User', 13),
(52, 'App\\Models\\User', 14),
(53, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 11),
(53, 'App\\Models\\User', 13),
(53, 'App\\Models\\User', 14),
(54, 'App\\Models\\User', 11),
(54, 'App\\Models\\User', 13),
(54, 'App\\Models\\User', 14),
(55, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 11),
(55, 'App\\Models\\User', 13),
(55, 'App\\Models\\User', 14),
(56, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 11),
(56, 'App\\Models\\User', 13),
(56, 'App\\Models\\User', 14),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 11),
(57, 'App\\Models\\User', 13),
(57, 'App\\Models\\User', 14),
(58, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 11),
(58, 'App\\Models\\User', 13),
(58, 'App\\Models\\User', 14),
(59, 'App\\Models\\User', 11),
(59, 'App\\Models\\User', 13),
(59, 'App\\Models\\User', 14),
(60, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 11),
(60, 'App\\Models\\User', 13),
(60, 'App\\Models\\User', 14),
(61, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 11),
(61, 'App\\Models\\User', 13),
(61, 'App\\Models\\User', 14),
(62, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 11),
(62, 'App\\Models\\User', 13),
(62, 'App\\Models\\User', 14),
(63, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 11),
(63, 'App\\Models\\User', 13),
(63, 'App\\Models\\User', 14),
(64, 'App\\Models\\User', 11),
(64, 'App\\Models\\User', 13),
(64, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price_per_user` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `day_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `price_per_user`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `day_price`) VALUES
(1, 'Followup Module', 'Includes followup, users, students, and admission permissions.', 50.00, 1, '2025-01-17 04:22:01', '2025-01-17 04:22:01', NULL, '8'),
(2, 'Fees Module', 'Enables fees management features.', 30.00, 1, '2025-01-17 04:22:01', '2025-01-17 04:22:01', NULL, '8');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ajay@gmail.com', '$2y$12$ssZDSI5SASkBbtkJUO36f.yiRjkG24z0YQs2Oe8BOb4hy95KKRvmC', '2024-12-26 00:34:14'),
('asad@gmail.com', '$2y$12$dgYaTxOaifHmInUkKQXY2eIOLBdb5aMZaSuyVStMzLX5gAbqiMlhq', '2024-12-20 06:02:35'),
('ayanghori@gmail.com', '$2y$12$v71MP8YdPZXqp8evj3svu.sujiF7MtJZTlIqODkgZquniOoAZpTi2', '2025-01-02 07:03:03'),
('bhavik22232@bcreative.in', '$2y$12$5L1413tjWoSd4EFowj0XC.n6ioK6r4pdWimFzuY19bsmu6MPhPBIW', '2025-02-14 04:32:33'),
('crazyboxstudio@gmail.com', '$2y$12$yo6IpWbprxqRAqlUv5K.TuS3cm6CV3pYWu68bnzDMrIGQHK3REyrW', '2025-01-07 06:00:31'),
('hamza@crazyboxstudio.com', '$2y$12$cVjdFXR6c0Hy/V/XgrFJZ.p9qwo7MGMlXvv675uWjWY.2EG2M/qWS', '2024-12-18 01:26:02'),
('hamza@gmail.com', '$2y$12$UeuRnQcvb89UC4LFsKWvU.y5V3IW.0R4vg2VJT9AIo4b39d8o2qz2', '2024-12-19 05:27:16'),
('imran12432@bcreative.in', '$2y$12$/IaveD8qB7QXDWgEQYIRZOfj7fgPy4yBE8HfGG4v569pNh0ICuTcC', '2024-12-17 07:51:13'),
('kamran223@gmail.com', '$2y$12$CIvf3Wss5xZ6.PWKP6frbubEILnL1uvacFz6w8cUj.bwL5ON5Z6Gu', '2025-01-02 06:16:59'),
('newcompany@gmail.com', '$2y$12$uGmzp0IX5XvFidii/UZOAe43tMFeVLJ8LXb4gyjo47X/G.bvBGlyq', '2025-02-14 05:26:24'),
('salim@crazyboxstudio.com', '$2y$12$dr6xhZG10Di3lVBNXJeJgeJRgN7lKGZ8RRcsdQ5/hLI6AKXsL8dH2', '2025-01-02 06:45:48'),
('shaikh.mo.hamza18@gmail.com', '$2y$12$ABDRPJzmNuuiROV2/gL1wepp5GNlFTnQZMqs/hcgzX2fYaevJWJJK', '2024-12-17 06:54:21'),
('test123@gmail.com', '$2y$12$j3CM40445HM8S7TwzGTH0O9Vtz5JNb1I6.rQPpcvX.9S6e0oGL9da', '2025-02-13 05:37:19'),
('yahya@gmail.com', '$2y$12$ISjEpVCL6xUwgkvnVWBPf.omqC7rSKiPMadMClFQe6ImGqJDMiV6i', '2024-12-19 05:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `group_name`, `module_name`) VALUES
(7, 'user.create', 'web', '2024-12-11 07:45:15', '2024-12-11 07:45:15', 'user', 'Followup Module'),
(8, 'user.edit', 'web', '2024-12-11 07:45:15', '2024-12-11 07:45:15', 'user', 'Followup Module'),
(9, 'user.delete', 'web', '2024-12-11 07:45:15', '2024-12-11 07:45:15', 'user', 'Followup Module'),
(10, 'user.update', 'web', '2024-12-11 07:45:15', '2024-12-11 07:45:15', 'user', 'Followup Module'),
(12, 'user.view', 'web', '2024-12-12 05:39:46', '2024-12-12 05:39:49', 'user', 'Followup Module'),
(15, 'follow_up.view', 'web', '2024-12-19 23:12:38', '2024-12-19 23:12:38', 'follow_up', 'Followup Module'),
(16, 'follow_up.create', 'web', '2024-12-19 23:12:38', '2024-12-19 23:12:38', 'follow_up', 'Followup Module'),
(17, 'follow_up.edit', 'web', '2024-12-19 23:12:38', '2024-12-19 23:12:38', 'follow_up', 'Followup Module'),
(18, 'follow_up.delete', 'web', '2024-12-19 23:12:38', '2024-12-19 23:12:38', 'follow_up', 'Followup Module'),
(19, 'follow_up.update', 'web', '2024-12-19 23:12:38', '2024-12-19 23:12:38', 'follow_up', 'Followup Module'),
(33, 'student.view', 'web', '2025-01-08 01:00:14', '2025-01-08 01:00:14', 'student', 'Followup Module'),
(34, 'student.create', 'web', '2025-01-08 01:00:14', '2025-01-08 01:00:14', 'student', 'Followup Module'),
(35, 'student.edit', 'web', '2025-01-08 01:00:14', '2025-01-08 01:00:14', 'student', 'Followup Module'),
(36, 'student.delete', 'web', '2025-01-08 01:00:14', '2025-01-08 01:00:14', 'student', 'Followup Module'),
(37, 'student.update', 'web', '2025-01-08 01:00:14', '2025-01-08 01:00:14', 'student', 'Followup Module'),
(39, 'admission.view', 'web', '2025-01-09 06:40:36', '2025-01-09 06:40:36', 'admission', 'Followup Module'),
(40, 'admission.create', 'web', '2025-01-09 06:40:36', '2025-01-09 06:40:36', 'admission', 'Followup Module'),
(41, 'admission.edit', 'web', '2025-01-09 06:40:36', '2025-01-09 06:40:36', 'admission', 'Followup Module'),
(42, 'admission.delete', 'web', '2025-01-09 06:40:36', '2025-01-09 06:40:36', 'admission', 'Followup Module'),
(43, 'admission.update', 'web', '2025-01-09 06:40:36', '2025-01-09 06:40:36', 'admission', 'Followup Module'),
(45, 'student-fees.view', 'web', '2025-01-17 04:24:30', '2025-01-17 04:24:30', 'student-fees', 'Fees Module'),
(46, 'student-fees.create', 'web', '2025-01-17 04:24:30', '2025-01-17 04:24:30', 'student-fees', 'Fees Module'),
(47, 'student-fees.edit', 'web', '2025-01-17 04:24:30', '2025-01-17 04:24:30', 'student-fees', 'Fees Module'),
(48, 'student-fees.delete', 'web', '2025-01-17 04:24:30', '2025-01-17 04:24:30', 'student-fees', 'Fees Module'),
(49, 'student-fees.update', 'web', '2025-01-17 04:24:30', '2025-01-17 04:24:30', 'student-fees', 'Fees Module'),
(50, 'student-fees-dashboard.view', 'web', '2025-02-11 11:18:47', '2025-02-11 11:18:50', 'student-fees-dashboard', 'Fees Module'),
(51, 'student-fees-dashboard.create', 'web', '2025-02-11 11:18:28', '2025-02-11 11:18:28', 'student-fees-dashboard', 'Fees Module'),
(52, 'student-fees-dashboard.edit', 'web', '2025-02-11 11:23:50', '2025-02-11 11:23:53', 'student-fees-dashboard', 'Fees Module'),
(53, 'student-fees-dashboard.delete', 'web', '2025-02-11 11:21:01', '2025-02-11 11:21:01', 'student-fees-dashboard', 'Fees Module'),
(54, 'student-fees-dashboard.update', 'web', '2025-02-11 11:21:01', '2025-02-11 11:21:01', 'student-fees-dashboard', 'Fees Module'),
(55, 'event.view', 'web', '2025-02-12 05:16:16', '2025-02-12 05:16:16', 'event', 'Fees Module'),
(56, 'event.create', 'web', '2025-02-12 05:16:16', '2025-02-12 05:16:16', 'event', 'Fees Module'),
(57, 'event.edit', 'web', '2025-02-12 05:16:16', '2025-02-12 05:16:16', 'event', 'Fees Module'),
(58, 'event.delete', 'web', '2025-02-12 05:16:16', '2025-02-12 05:16:16', 'event', 'Fees Module'),
(59, 'event.update', 'web', '2025-02-12 05:16:16', '2025-02-12 05:16:16', 'event', 'Fees Module'),
(60, 'calendar.view', 'web', '2025-02-12 06:19:34', '2025-02-12 06:19:34', 'calendar', 'Fees Module'),
(61, 'calendar.create', 'web', '2025-02-12 06:19:34', '2025-02-12 06:19:34', 'calendar', 'Fees Module'),
(62, 'calendar.edit', 'web', '2025-02-12 06:19:34', '2025-02-12 06:19:34', 'calendar', 'Fees Module'),
(63, 'calendar.delete', 'web', '2025-02-12 06:19:34', '2025-02-12 06:19:34', 'calendar', 'Fees Module'),
(64, 'calendar.update', 'web', '2025-02-12 06:19:34', '2025-02-12 06:19:34', 'calendar', 'Fees Module');

-- --------------------------------------------------------

--
-- Table structure for table `prioritys`
--

CREATE TABLE `prioritys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sequence_number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prioritys`
--

INSERT INTO `prioritys` (`id`, `company_id`, `name`, `sequence_number`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `color`) VALUES
(1, NULL, 'High', 1, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-13 00:28:20', 'badge-danger'),
(2, 1, 'Medium', 2, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-warning'),
(3, NULL, 'Low', 3, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-12 23:37:43', 'badge-success'),
(4, 1, 'Critical', 4, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-13 00:31:28', 'badge-dark'),
(5, 1, 'Urgent', 5, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-info'),
(6, 1, 'Optional', 6, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-primary'),
(7, 1, 'Routine', 7, 1, 8, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-secondary'),
(8, 1, 'Immediate', 8, 1, 3, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-danger'),
(9, 1, 'Deferred', 9, 1, 3, 3, NULL, '2025-01-07 11:38:48', '2025-01-07 11:38:48', 'badge-light'),
(10, 1, 'Planned', 10, 1, 3, 3, NULL, '2025-01-07 11:38:48', '2025-01-10 08:13:38', 'badge-success'),
(11, 1, 'new', 11, 1, 1, NULL, NULL, '2025-01-07 07:52:15', '2025-01-07 07:52:29', 'badge-primary'),
(12, 1, 'Test Priority', 6, 1, 1, NULL, NULL, '2025-02-06 04:22:59', '2025-02-06 04:22:59', 'badge-secondary');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_module_company`
--

CREATE TABLE `purchase_module_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `user_limit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `subscription_period` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_module_company`
--

INSERT INTO `purchase_module_company` (`id`, `company_id`, `module_id`, `user_limit`, `created_at`, `updated_at`, `deleted_at`, `start_date`, `end_date`, `subscription_period`, `status`) VALUES
(1, 1, 1, 3, '2025-01-17 10:01:48', '2025-02-13 11:30:26', NULL, NULL, NULL, 0, 1),
(2, 3, 1, 5, '2025-02-13 05:37:18', '2025-02-13 05:37:18', NULL, NULL, NULL, 0, 1),
(3, 3, 2, 5, '2025-02-13 05:37:18', '2025-02-13 05:37:18', NULL, NULL, NULL, 0, 1),
(4, 5, 1, 5, '2025-02-14 04:32:33', '2025-02-14 04:32:33', NULL, NULL, NULL, 0, 1),
(5, 5, 2, 5, '2025-02-14 04:32:33', '2025-02-14 04:32:33', NULL, NULL, NULL, 0, 1),
(6, 6, 1, 5, '2025-02-14 05:26:23', '2025-02-14 05:26:23', NULL, '2025-01-01 11:14:37', '2025-01-31 11:14:46', 15, 1),
(7, 6, 2, 5, '2025-02-14 05:26:23', '2025-02-14 05:26:23', NULL, '2025-01-11 11:14:51', '2025-02-11 11:14:57', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-12-11 07:29:20', '2024-12-12 04:27:35'),
(2, 'admin', 'web', '2024-12-11 07:30:58', '2024-12-12 04:27:14'),
(4, 'super-admin', 'web', '2024-12-18 04:00:17', '2024-12-18 04:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ANDHRA PRADESH', NULL, NULL),
(2, 'ASSAM', NULL, NULL),
(3, 'ARUNACHAL PRADESH', NULL, NULL),
(4, 'BIHAR', NULL, NULL),
(5, 'GUJRAT', NULL, NULL),
(6, 'HARYANA', NULL, NULL),
(7, 'HIMACHAL PRADESH', NULL, NULL),
(8, 'JAMMU & KASHMIR', NULL, NULL),
(9, 'KARNATAKA', NULL, NULL),
(10, 'KERALA', NULL, NULL),
(11, 'MADHYA PRADESH', NULL, NULL),
(12, 'MAHARASHTRA', NULL, NULL),
(13, 'MANIPUR', NULL, NULL),
(14, 'MEGHALAYA', NULL, NULL),
(15, 'MIZORAM', NULL, NULL),
(16, 'NAGALAND', NULL, NULL),
(17, 'ORISSA', NULL, NULL),
(18, 'PUNJAB', NULL, NULL),
(19, 'RAJASTHAN', NULL, NULL),
(20, 'SIKKIM', NULL, NULL),
(21, 'TAMIL NADU', NULL, NULL),
(22, 'TRIPURA', NULL, NULL),
(23, 'UTTAR PRADESH', NULL, NULL),
(24, 'WEST BENGAL', NULL, NULL),
(25, 'DELHI', NULL, NULL),
(26, 'GOA', NULL, NULL),
(27, 'PONDICHERY', NULL, NULL),
(28, 'LAKSHDWEEP', NULL, NULL),
(29, 'DAMAN & DIU', NULL, NULL),
(30, 'DADRA & NAGAR', NULL, NULL),
(31, 'CHANDIGARH', NULL, NULL),
(32, 'ANDAMAN & NICOBAR', NULL, NULL),
(33, 'UTTARANCHAL', NULL, NULL),
(34, 'JHARKHAND', NULL, NULL),
(35, 'CHATTISGARH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `gender` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `priority_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `followup_status` varchar(255) NOT NULL DEFAULT 'Follow-up' COMMENT 'Follow-up / Admission',
  `parents_mobile` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `student_profile` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `company_id`, `name`, `email`, `mobile`, `address`, `status`, `gender`, `state`, `city`, `domain`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `priority_id`, `message`, `follow_up_date`, `followup_status`, `parents_mobile`, `qualification`, `college`, `student_profile`, `resume`, `admission_date`) VALUES
(1, 1, 'Morgan Kirk', 'moqedyx@mailinator.com', '9979975411', 'JamalPur', '1', 'other', '1', 'Labore ducimus cons', '3', '8', NULL, NULL, '2025-01-13 00:30:38', '2025-01-16 01:55:49', 4, 'Veniam sunt reprehe', '1979-12-09', 'Admission', '9979975411', 'MCA-2024', 'Lj Univercity', NULL, NULL, '2025-01-16'),
(7, 1, 'Adminsdf', 'hamzdsfsda@gmail.com', '1234567100', NULL, '1', 'male', NULL, 'dsfsdfs', '13', '1', NULL, NULL, '2025-02-06 04:25:28', '2025-02-06 04:25:28', 12, 'sdfdsf', '2025-02-06', 'Follow-up', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 'Test Yahya', 'test12@gmail.com', '9510895638', NULL, '1', 'male', NULL, 'Ahmedabad', '1', '1', NULL, NULL, '2025-02-06 04:27:47', '2025-02-06 04:27:47', 2, 'dasdsaasdas', '2025-01-27', 'Follow-up', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 'Allen Sawyer', 'kogyxunan@mailinator.com', '2923658741', '371 Gomtipur', '1', 'female', NULL, 'Accusamus veniam al', '2', '1', NULL, NULL, '2025-02-06 04:28:26', '2025-02-06 04:31:29', 5, 'Quo dolorem nulla ve', '2025-02-06', 'Admission', '1236547890', 'MCA-2024', 'Lj Univercity', NULL, NULL, '2025-02-06'),
(10, 1, 'Quon Blankenship', 'rezel@mailinator.com', '6223658941', NULL, '1', 'other', NULL, 'Ut quod sit modi ne', '2', '1', NULL, NULL, '2025-02-06 04:29:28', '2025-02-06 04:29:28', 4, 'Officia praesentium', '1993-09-17', 'Follow-up', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 'Carlos Trujillo', 'hopyg@mailinator.com', '5823658974', NULL, '1', 'male', NULL, 'Beatae at eveniet i', '2', '1', NULL, NULL, '2025-02-06 04:29:59', '2025-02-06 04:29:59', 4, 'Sapiente consequat', '2025-02-06', 'Follow-up', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `domain_class_id` bigint(20) UNSIGNED NOT NULL,
  `total_fees` bigint(10) NOT NULL,
  `discounted_amount` bigint(10) DEFAULT NULL,
  `discounted_fees` bigint(10) DEFAULT NULL,
  `paid_amount` bigint(10) DEFAULT NULL,
  `remaining_amount` bigint(10) NOT NULL,
  `payment_type` enum('full','installment') NOT NULL DEFAULT 'installment',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `student_id`, `domain_class_id`, `total_fees`, `discounted_amount`, `discounted_fees`, `paid_amount`, `remaining_amount`, `payment_type`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 1, 3, 15000, 5000, 10000, 5000, 5000, 'installment', 1, NULL, NULL, '2025-02-17 07:51:33', '2025-02-17 07:51:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_installments`
--

CREATE TABLE `student_fee_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fee_id` bigint(20) UNSIGNED NOT NULL,
  `installment_amount` bigint(10) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `paid_by` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fee_installments`
--

INSERT INTO `student_fee_installments` (`id`, `student_fee_id`, `installment_amount`, `due_date`, `status`, `paid_by`, `paid_at`, `created_at`, `updated_at`, `company_id`, `created_by`) VALUES
(1, 1, 5000, '2025-02-17', 'paid', NULL, NULL, '2025-02-17 07:51:33', '2025-02-17 07:51:33', 1, 1),
(2, 1, 5000, '2025-03-28', 'pending', NULL, NULL, '2025-02-17 07:51:33', '2025-02-17 07:51:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `city` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `session_id`, `status`, `role_id`, `mobile`, `dob`, `gender`, `address`, `landmark`, `pin_code`, `state`, `city`, `photo`, `created_at`, `updated_at`, `deleted_at`, `role`, `company_id`) VALUES
(1, 1, 'Hamza', 'hamza@gmail.com', NULL, '$2y$12$9vW7Nr070Shjg.WCeYTYx.7BewfF/E4Hv52FfYtWyJbv.PJBfTyAm', 'j17GJWpRnBlLH93iuY2tQtynJkppgSzvOBlcqPbbq6xBi6CoAxeGHNmP5IL3', 'u0IW6cXZYQm0le3rehQQscOL5U5s8NjXzl8aZ2lX', '1', 4, '9979975411', '2002-02-18', 'male', '371 Gomtipur', 'jamalpur', '380021', 5, 125, NULL, '2025-01-07 11:26:46', '2025-02-19 04:29:25', NULL, 'super-admin', NULL),
(2, NULL, 'Salim', 'crazyboxstudio@gmail.com', NULL, '$2y$12$ldxQmxE6sxLkCyqcrp8KsOffkjbI94IT/Q5WF6wD5gsDZe2llcaYa', NULL, 'suDxPlseIXpMZDNr4Z44ZogzwEEpNoYb6M1XmhcD', '1', NULL, '9979975411', '1998-02-19', 'male', '371 Gomtipur', 'Juhapura', '380051', 5, 134, NULL, '2025-01-07 06:00:30', '2025-02-19 01:26:40', NULL, 'admin', NULL),
(3, 2, 'Yahya', 'yahya@gmail.com', NULL, '$2y$12$bBTkbHuK1FpbccDYyGm1dOmWqRL9EarNrAqZGYV.oRe8NXLcvxQ.a', 'hW8o5avERN03o3VOuAHxqXij3guJjx1JAxOZ3LUrxgwYvBl5YCjwvht0vrxA', NULL, '1', NULL, '1234567891', '2003-01-07', 'male', '371 Gomtipur', 'Juhapura', '380021', 5, 131, NULL, '2025-01-07 06:03:53', '2025-02-14 01:39:20', NULL, 'user', 1),
(6, NULL, 'Scarlet Sexton', 'nihuf@mailinator.com', NULL, '$2y$12$/mZARL2t3K07S8DouhiDuOM6C3aDDdzBn/M.OCWpqLBQ4Z.h.sYui', NULL, NULL, '1', NULL, '9979975411', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 01:14:49', '2025-01-10 01:16:12', '2025-01-10 01:16:12', 'user', NULL),
(7, 1, 'Ava Walters', 'hymo@mailinator.com', NULL, '$2y$12$/RFxInDRzr3qypIe33aJN.l8Qr9ito.qIAMPeb23bUCM1zzal2/rm', NULL, NULL, '1', NULL, '1234567891', '1981-02-09', 'male', 'Ut numquam sed beata', 'Amet est quia cons', NULL, 17, 396, NULL, '2025-01-10 01:16:46', '2025-01-10 01:23:44', NULL, 'user', NULL),
(8, 2, 'Hamza', 'info@rahat.in', NULL, '$2y$12$We040z2sIF/S2d/GSms17e3icBaYrTAiLOI01y9iLyB.SzdrQ6tS.', NULL, NULL, '1', NULL, '1234567891', '2002-02-02', 'male', '371 Gomtipur', 'amrpali', '380021', 13, 348, NULL, '2025-01-10 07:52:57', '2025-01-10 07:52:57', NULL, 'user', 1),
(9, 2, 'Anwar Deafah Hotel', 'shaikdfh.mo.hamza18@gmail.com', NULL, '$2y$12$EYwVOrHSv6Gm5TBfk8V3AeELtw6icILJ649uo1xGawH/ZP0Actvbq', NULL, NULL, '1', NULL, '1234567891', '2025-01-14', 'male', '371 Gomtipur', 'new Ranip', '380021', 15, 364, NULL, '2025-01-17 05:15:24', '2025-01-17 05:15:24', NULL, 'user', 1),
(10, NULL, 'admin', 'kamran18@gmail.com', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-13 05:36:11', '2025-02-13 05:36:11', NULL, 'admin', 5),
(11, NULL, 'test', 'test123@gmail.com', NULL, '$2y$12$EYwVOrHSv6Gm5TBfk8V3AeELtw6icILJ649uo1xGawH/ZP0Actvbq', NULL, 'TZidC26j6vEMU7lCZb1F22XGRnqwDoyY1fb1vIZe', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-13 05:37:18', '2025-02-13 05:38:25', NULL, 'admin', 5),
(12, NULL, 'new company', 'bhavik2232@bcreative.in', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-14 04:30:18', '2025-02-14 04:30:18', NULL, 'admin', NULL),
(13, NULL, 'new company', 'bhavik22232@bcreative.in', NULL, '$2y$12$EYwVOrHSv6Gm5TBfk8V3AeELtw6icILJ649uo1xGawH/ZP0Actvbq', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-14 04:32:33', '2025-02-14 05:26:02', NULL, 'admin', NULL),
(14, NULL, 'new company', 'newcompany@gmail.com', NULL, '$2y$12$Kt7adfJpR0WMiUYAqhSARu19U6dZF8atxe328vNwQL4xMeMRWWhbe', NULL, 'J5hS0Qkrqdsg1i6OxY7RqT7EUCvSsEnAlOYXUvuF', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-14 05:26:23', '2025-02-18 04:36:14', NULL, 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_classes`
--
ALTER TABLE `domain_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_classes_company_id_foreign` (`company_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_ups_company_id_foreign` (`company_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_key_unique` (`key`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prioritys`
--
ALTER TABLE `prioritys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prioritys_company_id_foreign` (`company_id`);

--
-- Indexes for table `purchase_module_company`
--
ALTER TABLE `purchase_module_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_company_id_foreign` (`company_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fees_student_id_foreign` (`student_id`),
  ADD KEY `student_fees_domain_class_id_foreign` (`domain_class_id`);

--
-- Indexes for table `student_fee_installments`
--
ALTER TABLE `student_fee_installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fee_installments_student_fee_id_foreign` (`student_fee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_foreign` (`role_id`),
  ADD KEY `users_state_foreign` (`state`),
  ADD KEY `users_city_foreign` (`city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `domain_classes`
--
ALTER TABLE `domain_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `prioritys`
--
ALTER TABLE `prioritys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_module_company`
--
ALTER TABLE `purchase_module_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_fee_installments`
--
ALTER TABLE `student_fee_installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domain_classes`
--
ALTER TABLE `domain_classes`
  ADD CONSTRAINT `domain_classes_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD CONSTRAINT `follow_ups_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prioritys`
--
ALTER TABLE `prioritys`
  ADD CONSTRAINT `prioritys_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_domain_class_type_foreign` FOREIGN KEY (`domain_class_type`) REFERENCES `domain_class_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_domain_class_id_foreign` FOREIGN KEY (`domain_class_id`) REFERENCES `domain_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_fee_installments`
--
ALTER TABLE `student_fee_installments`
  ADD CONSTRAINT `student_fee_installments_student_fee_id_foreign` FOREIGN KEY (`student_fee_id`) REFERENCES `student_fees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
