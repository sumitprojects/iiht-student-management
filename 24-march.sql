-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2021 at 09:18 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clim44`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `unique_identifier`, `version`, `status`, `created_at`, `updated_at`, `about`) VALUES
(2, 'Course Certificate', 'certificate', '1.0', 1, 1395360000, NULL, 'This addon is for create expiry for each students.'),
(3, 'Paytm', 'paytm', '1.0', 1, 1395360000, NULL, 'Paytm is an Indian e-commerce payment system and financial technology company, based out of Noida, India.'),
(4, 'Razorpay', 'razorpay', '1.0', 1, 1395360000, NULL, 'Razorpay is an Indian e-commerce payment system and financial technology company, based out of Noida, India.');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `document` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_for_users`
--

CREATE TABLE `asset_for_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) UNSIGNED NOT NULL,
  `branch_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_code`, `branch_status`) VALUES
(1, 'SURAT', 'C864E9', 1),
(2, 'JAIPUR', '9B3811', 1),
(3, 'JASDAN', 'BDCF8F', 1),
(4, 'SOUTH AFRICA', '756A47', 1),
(5, 'NAMIBIA', '63FF4D', 1),
(6, 'ANGOLIA', '37DC7E', 1),
(7, 'BOTSWANA', 'CB3419', 1),
(8, 'NAVASARI', '90D7A2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `font_awesome_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `name`, `parent`, `slug`, `date_added`, `last_modified`, `font_awesome_class`, `thumbnail`) VALUES
(1, '20f88b1051', 'Dimond', 0, 'dimond', 1613952000, NULL, 'far fa-gem', 'category-thumbnail.png'),
(2, '9cfc99e322', 'Jewellery', 0, 'jewellery', 1613952000, NULL, 'fab fa-app-store', 'category-thumbnail.png'),
(3, '159ac3bb82', 'Gemmology', 0, 'gemmology', 1613952000, NULL, 'fas fa-at', 'category-thumbnail.png'),
(4, '650404a0e6', 'Dimond Category', 1, 'dimond-category', 1613952000, NULL, NULL, NULL),
(5, '6eb3835bbf', 'Jewellery Category', 2, 'jewellery-category', 1613952000, NULL, NULL, NULL),
(6, '2462fd2a7c', 'Gemmology Category', 3, 'gemmology-category', 1613952000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `shareable_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6dc780c0ece78c4b993080069b02d55f0137c508', '::1', 1615351285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353335313238353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('46851cc21163a19e4538f6a99603e9365b68f07a', '::1', 1615351671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353335313637313b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('5bf0249f2d45fcd5383bfcecb71c98bbdfe06e56', '::1', 1615351980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353335313938303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('ad9e404508269a8fafa766fdb3159a7d9e0202c8', '::1', 1615352177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353335313938303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('b52e4b6a6b448ad95dd5a2a3ac22edfbe0ee29f4', '::1', 1615631777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353633313735333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('4f5039c1107b74a74fa1436fdd1d9ae70f22b665', '::1', 1615654344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353635343334343b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('08727d3a06f30395c157cdf6cc73a0c07d8d7d0d', '::1', 1615654410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353635343334343b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('790bda67fe6d2dde155f646ca241a30fa5687abc', '::1', 1615690252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353639303235323b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('4821459a6ba7e6bbf1c3d23ecbd405760f88428c', '::1', 1615975785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937353738353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('3d852dd2cb83e0656712515d0767904fe46adba3', '::1', 1615976091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937363039313b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('30258370883e627cefe410b57e03d7cd46ec0bf3', '::1', 1615976430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937363433303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('f53bcb5d035340f2c7ee05f14a8864ef981659e4', '::1', 1615976753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937363735333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('c868d2995bae720b4ba6b5edfe46a29e39d79e2d', '::1', 1615977828, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937373832383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('528b4642302d705b9f4cb435beabd42c715c1c4b', '::1', 1615979333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937393333333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('40fd48b0291b6b673e4f468227fe6bae941bfd3c', '::1', 1615979345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631353937393333333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('03d28b269598c6be6894a1090f59112b7d09c0ca', '::1', 1616313176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363331333137363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('d0a2561aae8099276b4500395afeee91d827e7f7', '::1', 1616313381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363331333137363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('3422d389553196563079db6d703c14fd0a97415b', '::1', 1616320330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363332303330353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('b5958779e3b5304677ba405f3804a11f3e183b65', '::1', 1616471065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363437313036353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('498322310cb04fc6f631b38b866e183105fcd925', '::1', 1616471213, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363437313036353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('477960575d399ec7560b969d3b8a4d53c645b6f7', '::1', 1616485330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363438353332383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('0c348d56cadf890801a30aa72d02a71c004f72e4', '::1', 1616558219, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363535383231393b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('a7b087b7ea7b2810a055b93387ffa458d865d055', '::1', 1616559936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363535393933363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32333a2244617461206164646564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('d91dbe2f421bb49d5b871a82fb4f3f13fb03098d', '::1', 1616563056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363536333035363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('d03fa59ec7782fa204c5d058359a47ff0e7f5510', '::1', 1616563357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363536333335373b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32333a2244617461206164646564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('04a3507d5fa3ba611b471055af15b0bc87b24f1b', '::1', 1616563668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363536333636383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('1c1fea36e2a799bf5a1759077fcfdea76075a840', '::1', 1616563864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363536333636383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('452bacb7c5999b5ed71243d89a99fac633a1bffc', '::1', 1616574887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537343838373b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('a1d239b8b93b0bbdb87d69923cac9b96781a5ec8', '::1', 1616575339, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537353333393b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('09b203f00b952548f58f0092d9b1a5203bc84a64', '::1', 1616575641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537353634313b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32333a2244617461206164646564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('ca90fb1e002be8936aa927dbd46e9cd721630d85', '::1', 1616576116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537363131363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('fae0d5e15c7cd61e4815f978bd602453b5026327', '::1', 1616576433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537363433333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('2eea918151d55edf4880dd46b5fa4d908b552a2a', '::1', 1616576752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537363735323b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('e807d678075ac9f65bbf5b97c23dc66e69e403a8', '::1', 1616577126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537373132363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b),
('d4d6f3fba338841e55b085d81248b85ce15a58f7', '::1', 1616577188, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363537373132363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31333a2261646d696e206d616e61676572223b69735f696e7374727563746f727c733a313a2230223b61646d696e5f6c6f67696e7c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `outcomes` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `language` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `is_training` tinyint(1) NOT NULL DEFAULT '0',
  `hod_id` int(11) DEFAULT NULL,
  `section` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `requirements` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT '0',
  `discounted_price` int(11) DEFAULT NULL,
  `level` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `course_expiry` int(11) NOT NULL DEFAULT '30',
  `course_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_course` int(11) DEFAULT '0',
  `is_admin` int(11) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_overview_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_free_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`, `short_description`, `description`, `outcomes`, `language`, `category_id`, `sub_category_id`, `is_training`, `hod_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_expiry`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`) VALUES
(2, 'ROUGH DIAMOND GRADING', 'RDG', '', '', '[]', 'english', 1, 4, 0, NULL, '[5]', '[]', 18000, 1, 11000, 'beginner', 1, NULL, '', 1613952000, 1615075200, 90, 'general', 0, 1, 'active', '', '', '', NULL),
(3, 'ROUGH DIAMOND DESIGNING(PLANNING MARKING)', 'RPM', '', '', '[]', 'english', 1, 4, 0, NULL, '[6]', '[]', 20000, 1, 14000, 'beginner', 1, NULL, '', 1613952000, 1615939200, 90, 'general', 0, 1, 'active', '', '', '', NULL),
(4, 'DIAMOND MINES TO MARKERT COMPREHENSIVE COURSE', 'M2M', '', '', '[]', 'english', 1, 4, 0, NULL, '[7,8]', '[]', 45000, 1, 37000, 'beginner', 1, NULL, '', 1613952000, 1615939200, 150, 'general', 1, 1, 'active', '', '', '', NULL),
(5, 'GALAXY DIAMOND SCANNING(GDS)', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[9]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 21, 'general', 0, 1, 'active', '', '', '', NULL),
(6, 'GALAXY QC(GQC)', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[10]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 30, 'general', 0, 1, 'active', '', '', '', NULL),
(7, 'GALAXY PLANNING(GPL - Only Terminal)', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[11]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, NULL, 18, 'general', NULL, 1, 'active', '', '', '', NULL),
(8, 'DIA - MARK(DIAMOND MARKING)', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[12]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, NULL, 14, 'general', NULL, 1, 'active', '', '', '', NULL),
(9, 'SAWNING PROCESS', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[13]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 14, 'general', 0, 1, 'active', '', '', '', NULL),
(10, '3EX. CUT POLISHING', NULL, '', '', '[]', 'english', 1, 4, 0, NULL, '[14]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 61, 'general', 0, 1, 'active', '', '', '', NULL),
(11, 'DIPLOMA IN COLOR GEMSTONES IDENTIFICATIONS', NULL, '', '', '[]', 'english', 3, 6, 0, NULL, '[15]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 88, 'general', 0, 1, 'active', '', '', '', NULL),
(12, 'DIPLOMA IN COLOR GEMSTONES GRADING', NULL, '', '', '[]', 'english', 3, 6, 0, NULL, '[16]', '[]', 0, NULL, 0, 'beginner', 1, NULL, '', 1613952000, 1613952000, 59, 'general', 0, 1, 'active', '', '', '', NULL),
(13, 'Polish Diamond Grading Full', 'PDG', '', '', '[]', 'english', 1, 4, 0, NULL, '[]', '[]', 28000, 1, 21000, 'beginner', 1, NULL, '', 1615939200, 1615939200, 60, 'general', 1, 1, 'active', '', '', '', NULL),
(14, 'HR Training', 'HRT', '', '', '[]', 'english', 1, 4, 0, NULL, '[]', '[]', 500, NULL, 0, 'beginner', 1, NULL, '', 1616544000, NULL, 30, 'training', NULL, 1, 'active', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', '₹', 1, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 1, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dpid` int(11) NOT NULL,
  `dpname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dp_is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dpid`, `dpname`, `dp_is_delete`) VALUES
(1, 'ISSUE DEPARTMENT', 0),
(2, 'POLISH DEPARTMENT', 0),
(3, 'MAIN STOCK', 0),
(4, '2GR DEPARTMENT', 0),
(5, '2GR AS', 0),
(6, 'FUTURE', 0),
(7, 'GALAXY ', 0),
(8, 'LARGEMB GRADING', 0),
(9, 'CLIENT MANAGEMENT', 0),
(10, 'TRAINNING DEPARTMENT  ', 0),
(11, 'MR. SETH ', 0),
(12, 'FACTORY', 0),
(13, 'SAWING', 0),
(14, 'YANTRA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `education_list`
--

CREATE TABLE `education_list` (
  `eid` int(11) NOT NULL,
  `ename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_list`
--

INSERT INTO `education_list` (`eid`, `ename`) VALUES
(1, 'BBA- Bachelor of Business Administration'),
(2, 'BMS- Bachelor of Management Science'),
(3, 'BFA- Bachelor of Fine Arts'),
(4, 'BEM- Bachelor of Event Management'),
(5, 'Integrated Law Course- BA + LL.B'),
(6, 'BJMC- Bachelor of Journalism and Mass Communication'),
(7, 'BFD- Bachelor of Fashion Designing'),
(8, 'BSW- Bachelor of Social Work'),
(9, 'BBS- Bachelor of Business Studies'),
(10, 'BTTM- Bachelor of Travel and Tourism Management'),
(11, 'Aviation Courses'),
(12, 'B.Sc- Interior Design'),
(13, 'B.Sc.- Hospitality and Hotel Administration'),
(14, 'Bachelor of Design (B. Design)'),
(15, 'Bachelor of Performing Arts'),
(16, 'BA in History'),
(17, 'BE/B.Tech- Bachelor of Technology'),
(18, 'B.Arch- Bachelor of Architecture'),
(19, 'BCA- Bachelor of Computer Applications'),
(20, 'B.Sc.- Information Technology'),
(21, 'B.Sc- Nursing'),
(22, 'BPharma- Bachelor of Pharmacy'),
(23, 'B.Sc- Interior Design'),
(24, 'BDS- Bachelor of Dental Surgery'),
(25, 'Animation, Graphics and Multimedia'),
(26, 'B.Sc. '),
(27, 'BPT- Bachelor of Physiotherapy'),
(28, 'B.Sc- Applied Geology'),
(29, 'BA/B.Sc. Liberal Arts'),
(30, 'B.Sc.- Physics'),
(31, 'B.Sc. Chemistry'),
(32, 'B.Sc. Mathematics'),
(33, 'B.tech Aeronautical Engineering'),
(34, 'B.tech Automobile Engineering'),
(35, 'B.tech Civil Engineering'),
(36, 'B.tech Computer Science and Engineering'),
(37, 'B.tech Biotechnology Engineering'),
(38, 'B.tech Electrical and Electronics Engineering'),
(39, 'B.tech Electronics and Communication Engineering'),
(40, 'B.tech Automation and Robotics'),
(41, 'B.tech Petroleum Engineering'),
(42, 'B.tech Instrumentation Engineering'),
(43, 'B.tech Ceramic Engineering'),
(44, 'B.tech Chemical Engineering'),
(45, 'B.tech Structural Engineering'),
(46, 'B.tech Transportation Engineering'),
(47, 'B.tech Construction Engineering'),
(48, 'B.tech Power Engineering'),
(49, 'B.tech Robotics Engineering'),
(50, 'B.tech Textile Engineering'),
(51, 'B.tech Smart Manufacturing & Automation'),
(52, 'B.Com- Bachelor of Commerce'),
(53, 'BBA- Bachelor of Business Administration'),
(54, 'B.Com (Hons.)'),
(55, 'BA (Hons.) in Economics'),
(56, 'Integrated Law Program- B.Com LL.B.'),
(57, 'Integarted Law Program- BBA LL.B'),
(58, '9th Standard'),
(59, '10th Standard'),
(60, '11th Standard'),
(61, '12th Standard'),
(62, '8th Standard'),
(63, '7th Standard'),
(64, '6th Standard'),
(65, 'Diploma'),
(66, 'ITI');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `en_id` int(11) UNSIGNED NOT NULL,
  `en_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `en_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `en_gender` enum('male','femle','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'male',
  `en_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `en_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `source_id` int(11) NOT NULL,
  `source_other` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `branch_id` int(11) DEFAULT NULL,
  `mob_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alt_mob` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_status` enum('open','closed','completed','hold') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'open',
  `en_date` date NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `en_remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_added` int(11) NOT NULL,
  `last_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`en_id`, `en_code`, `en_name`, `en_gender`, `en_address`, `en_email`, `course_id`, `source_id`, `source_other`, `branch_id`, `mob_no`, `alt_mob`, `en_status`, `en_date`, `is_delete`, `user_id`, `en_remark`, `date_added`, `last_modified`) VALUES
(1, '3C9AC0', 'SAMPLE', 'male', 'SURAT', 'sample@sample.com', 2, 1, NULL, 1, '9874563210', '', 'open', '2021-03-24', 0, 1, '', 1616544000, 1616544000);

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

CREATE TABLE `enrol` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `final_price` double(10,2) NOT NULL DEFAULT '0.00',
  `dept_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `is_training` tinyint(1) NOT NULL DEFAULT '0',
  `expiry_time` int(11) NOT NULL DEFAULT '0',
  `enrol_status` enum('active','disable','drop','place','pending') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrol`
--

INSERT INTO `enrol` (`id`, `user_id`, `course_id`, `final_price`, `dept_id`, `date_added`, `is_training`, `expiry_time`, `enrol_status`, `last_modified`) VALUES
(1, 2, 2, 11000.00, NULL, 1616284800, 0, 1624060800, 'active', NULL),
(2, 2, 3, 14000.00, NULL, 1616284800, 0, 1624060800, 'active', NULL),
(3, 3, 14, 500.00, NULL, 1616544000, 1, 1619136000, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `id` int(11) NOT NULL,
  `en_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `followup_type` enum('admission','inquiry','installment') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'inquiry',
  `date_added` date NOT NULL,
  `next_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `key`, `value`) VALUES
(1, 'banner_title', 'Learn on your schedule'),
(2, 'banner_sub_title', 'Study any topic, anytime. Explore thousands of courses for the lowest price ever!'),
(4, 'about_us', '<p></p><h2><span xss=removed>This is about us</span></h2><p><span xss=\"removed\">Welcome to Academy. It will help you to learn in a new ways</span></p>'),
(10, 'terms_and_condition', '<h2>Terms and Condition</h2>This is the Terms and condition page for your companys'),
(11, 'privacy_policy', '<p></p><p></p><h2><span xss=\"removed\">Privacy Policy</span><br></h2>This is the Privacy Policy page for your companys<p></p><p><b>This is another</b> <u><a href=\"https://youtube.com/watch?v=PHgc8Q6qTjc\" target=\"_blank\">thing you will</a></u> <span xss=\"removed\">not understand</span>.</p>'),
(13, 'theme', 'elegant'),
(14, 'cookie_note', 'This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.'),
(15, 'cookie_status', 'active'),
(16, 'cookie_policy', '<h1>Cookie policy</h1><ol><li>Cookies are small text files that can be used by websites to make a user\'s experience more efficient.</li><li>The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</li><li>This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</li></ol>'),
(17, 'banner_image', 'home-banner.jpg'),
(18, 'light_logo', '7e1e22a62ee38a4a0fb3e0daf5be492e.png'),
(19, 'dark_logo', 'ce28c97dcd8381b7d5a093ffd1deae38.png'),
(20, 'small_logo', '2942549cb69c93f868f7294460a9befe.png'),
(21, 'favicon', 'cfe04034c4af619cfabd5f2c785131d2.png'),
(22, 'recaptcha_status', '0'),
(23, 'recaptcha_secretkey', 'recaptcha-secretkey'),
(24, 'recaptcha_sitekey', 'recaptcha-sitekey'),
(25, 'heading_line', 'Lorem Impsum ! \r\nLorem Impsum!\r\nLorem Impsum ! \r\nLorem Impsum!\r\nLorem Impsum ! \r\nLorem Impsum!\r\n'),
(26, 'invoice_template', '<ol class=\"\">\r\n                            <li><b>Maintain discipline in the institute is Must.</b></li>\r\n                            <li><b>Trainee will be awarded certificare only when he ontain minimum marks in the theory and practical examination separately.</b></li>\r\n                            <li><b>Fees once deposited will not be refunded and is non transferable.</b></li>\r\n                            <li><b>80% Attendance is compulsory in the class; otherwise student will not be permitted to appear in the exam.</b></li>\r\n                            <li><b>Student\'s not attending class for three (3) consecutive days will be required to submit a valid proof/documents for such absence and unless the absence is approved by Intitute head. He/She will not allowed to continue the course.</b></li>\r\n                            <li><b>Student will be responsible for the loss or breakage of genstones, equipment or any property of the institute during the training period. However, student will be help responsible for the damage to any equipement in the laboratory and will have to pay for the same. Students are requested not to plug any instrument into sockets are two different voltage lines (110/220 B) are being used in the laboratory.</b></li>\r\n                            <li><b>The Institute reserves the right to make changes in the rules and regulation which will be binding on the student.</b></li>\r\n                        </ol>');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` int(11) NOT NULL,
  `hod_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `hod_ext` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hod_dpid` int(11) DEFAULT NULL,
  `hod_is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `hod_name`, `hod_ext`, `hod_dpid`, `hod_is_delete`) VALUES
(1, 'MR.NITIN JI DHADDA', '100/101', 1, 0),
(2, 'MR.MANISH GOLECHHA', '400', 1, 0),
(3, 'MR.ROHITSING  SHEKHAVAT', '443', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `english` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Bengali` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `Bengali`) VALUES
(1, 'manage_profile', NULL, NULL),
(3, 'dashboard', NULL, NULL),
(4, 'categories', NULL, NULL),
(5, 'courses', NULL, NULL),
(6, 'students', NULL, NULL),
(7, 'enroll_history', NULL, NULL),
(8, 'message', NULL, NULL),
(9, 'settings', NULL, NULL),
(10, 'system_settings', NULL, NULL),
(11, 'frontend_settings', NULL, NULL),
(12, 'payment_settings', NULL, NULL),
(13, 'manage_language', NULL, NULL),
(14, 'edit_profile', NULL, NULL),
(15, 'log_out', NULL, NULL),
(16, 'first_name', NULL, NULL),
(17, 'last_name', NULL, NULL),
(18, 'email', NULL, NULL),
(19, 'facebook_link', NULL, NULL),
(20, 'twitter_link', NULL, NULL),
(21, 'linkedin_link', NULL, NULL),
(22, 'a_short_title_about_yourself', NULL, NULL),
(23, 'biography', NULL, NULL),
(24, 'photo', NULL, NULL),
(25, 'select_image', NULL, NULL),
(26, 'change', NULL, NULL),
(27, 'remove', NULL, NULL),
(28, 'update_profile', NULL, NULL),
(29, 'change_password', NULL, NULL),
(30, 'current_password', NULL, NULL),
(31, 'new_password', NULL, NULL),
(32, 'confirm_new_password', NULL, NULL),
(33, 'delete', NULL, NULL),
(34, 'cancel', NULL, NULL),
(35, 'are_you_sure_to_update_this_information', NULL, NULL),
(36, 'yes', NULL, NULL),
(37, 'no', NULL, NULL),
(38, 'system settings', NULL, NULL),
(39, 'system_name', NULL, NULL),
(40, 'system_title', NULL, NULL),
(41, 'slogan', NULL, NULL),
(42, 'system_email', NULL, NULL),
(43, 'address', NULL, NULL),
(44, 'phone', NULL, NULL),
(45, 'youtube_api_key', NULL, NULL),
(46, 'get_youtube_api_key', NULL, NULL),
(47, 'vimeo_api_key', NULL, NULL),
(48, 'purchase_code', NULL, NULL),
(49, 'language', NULL, NULL),
(50, 'text-align', NULL, NULL),
(51, 'update_system_settings', NULL, NULL),
(52, 'update_product', NULL, NULL),
(53, 'file', NULL, NULL),
(54, 'install_update', NULL, NULL),
(55, 'system_logo', NULL, NULL),
(56, 'update_logo', NULL, NULL),
(57, 'get_vimeo_api_key', NULL, NULL),
(58, 'add_category', NULL, NULL),
(59, 'category_title', NULL, NULL),
(60, 'sub_categories', NULL, NULL),
(61, 'actions', NULL, NULL),
(62, 'action', NULL, NULL),
(63, 'manage_sub_categories', NULL, NULL),
(64, 'edit', NULL, NULL),
(65, 'add_course', NULL, NULL),
(66, 'select_category', NULL, NULL),
(67, 'title', NULL, NULL),
(68, 'category', NULL, NULL),
(69, '#_section', NULL, NULL),
(70, '#_lesson', NULL, NULL),
(71, '#_enrolled_user', NULL, NULL),
(72, 'view_course_details', NULL, NULL),
(73, 'manage_section', NULL, NULL),
(74, 'manage_lesson', NULL, NULL),
(75, 'student', NULL, NULL),
(76, 'add_student', NULL, NULL),
(77, 'name', NULL, NULL),
(78, 'date_added', NULL, NULL),
(79, 'enrolled_courses', NULL, NULL),
(80, 'view_profile', NULL, NULL),
(81, 'admin_dashboard', NULL, NULL),
(82, 'total_courses', NULL, NULL),
(83, 'number_of_courses', NULL, NULL),
(84, 'total_lessons', NULL, NULL),
(85, 'number_of_lessons', NULL, NULL),
(86, 'total_enrollment', NULL, NULL),
(87, 'number_of_enrollment', NULL, NULL),
(88, 'total_student', NULL, NULL),
(89, 'number_of_student', NULL, NULL),
(90, 'manage_sections', NULL, NULL),
(91, 'manage sections', NULL, NULL),
(92, 'course', NULL, NULL),
(93, 'add_section', NULL, NULL),
(94, 'lessons', NULL, NULL),
(95, 'serialize_sections', NULL, NULL),
(96, 'add_lesson', NULL, NULL),
(97, 'edit_section', NULL, NULL),
(98, 'delete_section', NULL, NULL),
(99, 'course_details', NULL, NULL),
(100, 'course details', NULL, NULL),
(101, 'details', NULL, NULL),
(102, 'instructor', NULL, NULL),
(103, 'sub_category', NULL, NULL),
(104, 'enrolled_user', NULL, NULL),
(105, 'last_modified', NULL, NULL),
(106, 'manage language', NULL, NULL),
(107, 'language_list', NULL, NULL),
(108, 'add_phrase', NULL, NULL),
(109, 'add_language', NULL, NULL),
(110, 'option', NULL, NULL),
(111, 'edit_phrase', NULL, NULL),
(112, 'delete_language', NULL, NULL),
(113, 'phrase', NULL, NULL),
(114, 'value_required', NULL, NULL),
(115, 'frontend settings', NULL, NULL),
(116, 'banner_title', NULL, NULL),
(117, 'banner_sub_title', NULL, NULL),
(118, 'about_us', NULL, NULL),
(119, 'blog', NULL, NULL),
(120, 'update_frontend_settings', NULL, NULL),
(121, 'update_banner', NULL, NULL),
(122, 'banner_image', NULL, NULL),
(123, 'update_banner_image', NULL, NULL),
(124, 'payment settings', NULL, NULL),
(125, 'paypal_settings', NULL, NULL),
(126, 'client_id', NULL, NULL),
(127, 'sandbox', NULL, NULL),
(128, 'production', NULL, NULL),
(129, 'active', NULL, NULL),
(130, 'mode', NULL, NULL),
(131, 'stripe_settings', NULL, NULL),
(132, 'testmode', NULL, NULL),
(133, 'on', NULL, NULL),
(134, 'off', NULL, NULL),
(135, 'test_secret_key', NULL, NULL),
(136, 'test_public_key', NULL, NULL),
(137, 'live_secret_key', NULL, NULL),
(138, 'live_public_key', NULL, NULL),
(139, 'save_changes', NULL, NULL),
(140, 'category_code', NULL, NULL),
(141, 'update_phrase', NULL, NULL),
(142, 'check', NULL, NULL),
(143, 'settings_updated', NULL, NULL),
(144, 'checking', NULL, NULL),
(145, 'phrase_added', NULL, NULL),
(146, 'language_added', NULL, NULL),
(147, 'language_deleted', NULL, NULL),
(148, 'add course', NULL, NULL),
(149, 'add_courses', NULL, NULL),
(150, 'add_course_form', NULL, NULL),
(151, 'basic_info', NULL, NULL),
(152, 'short_description', NULL, NULL),
(153, 'description', NULL, NULL),
(154, 'level', NULL, NULL),
(155, 'beginner', NULL, NULL),
(156, 'advanced', NULL, NULL),
(157, 'intermediate', NULL, NULL),
(158, 'language_made_in', NULL, NULL),
(159, 'is_top_course', NULL, NULL),
(160, 'outcomes', NULL, NULL),
(161, 'category_and_sub_category', NULL, NULL),
(162, 'select_a_category', NULL, NULL),
(163, 'select_a_category_first', NULL, NULL),
(164, 'requirements', NULL, NULL),
(165, 'price_and_discount', NULL, NULL),
(166, 'price', NULL, NULL),
(167, 'has_discount', NULL, NULL),
(168, 'discounted_price', NULL, NULL),
(169, 'course_thumbnail', NULL, NULL),
(170, 'note', NULL, NULL),
(171, 'thumbnail_size_should_be_600_x_600', NULL, NULL),
(172, 'course_overview_url', NULL, NULL),
(173, '0%', NULL, NULL),
(174, 'manage profile', NULL, NULL),
(175, 'edit_course', NULL, NULL),
(176, 'edit course', NULL, NULL),
(177, 'edit_courses', NULL, NULL),
(178, 'edit_course_form', NULL, NULL),
(179, 'update_course', NULL, NULL),
(180, 'course_updated', NULL, NULL),
(181, 'number_of_sections', NULL, NULL),
(182, 'number_of_enrolled_users', NULL, NULL),
(183, 'add section', NULL, NULL),
(184, 'section', NULL, NULL),
(185, 'add_section_form', NULL, NULL),
(186, 'update', NULL, NULL),
(187, 'serialize_section', NULL, NULL),
(188, 'serialize section', NULL, NULL),
(189, 'submit', NULL, NULL),
(190, 'sections_have_been_serialized', NULL, NULL),
(191, 'select_course', NULL, NULL),
(192, 'search', NULL, NULL),
(193, 'thumbnail', NULL, NULL),
(194, 'duration', NULL, NULL),
(195, 'provider', NULL, NULL),
(196, 'add lesson', NULL, NULL),
(197, 'add_lesson_form', NULL, NULL),
(198, 'video_type', NULL, NULL),
(199, 'select_a_course', NULL, NULL),
(200, 'select_a_course_first', NULL, NULL),
(201, 'video_url', NULL, NULL),
(202, 'invalid_url', NULL, NULL),
(203, 'your_video_source_has_to_be_either_youtube_or_vimeo', NULL, NULL),
(204, 'for', NULL, NULL),
(205, 'of', NULL, NULL),
(206, 'edit_lesson', NULL, NULL),
(207, 'edit lesson', NULL, NULL),
(208, 'edit_lesson_form', NULL, NULL),
(209, 'login', NULL, NULL),
(210, 'password', NULL, NULL),
(211, 'forgot_password', NULL, NULL),
(212, 'back_to_website', NULL, NULL),
(213, 'send_mail', NULL, NULL),
(214, 'back_to_login', NULL, NULL),
(215, 'student_add', NULL, NULL),
(216, 'student add', NULL, NULL),
(217, 'add_students', NULL, NULL),
(218, 'student_add_form', NULL, NULL),
(219, 'login_credentials', NULL, NULL),
(220, 'social_information', NULL, NULL),
(221, 'facebook', NULL, NULL),
(222, 'twitter', NULL, NULL),
(223, 'linkedin', NULL, NULL),
(224, 'user_image', NULL, NULL),
(225, 'add_user', NULL, NULL),
(226, 'user_update_successfully', NULL, NULL),
(227, 'user_added_successfully', NULL, NULL),
(228, 'student_edit', NULL, NULL),
(229, 'student edit', NULL, NULL),
(230, 'edit_students', NULL, NULL),
(231, 'student_edit_form', NULL, NULL),
(232, 'update_user', NULL, NULL),
(233, 'enroll history', NULL, NULL),
(234, 'filter', NULL, NULL),
(235, 'user_name', NULL, NULL),
(236, 'enrolled_course', NULL, NULL),
(237, 'enrollment_date', NULL, NULL),
(238, 'biography2', NULL, NULL),
(239, 'home', NULL, NULL),
(240, 'search_for_courses', NULL, NULL),
(241, 'total', NULL, NULL),
(242, 'go_to_cart', NULL, NULL),
(243, 'your_cart_is_empty', NULL, NULL),
(244, 'log_in', NULL, NULL),
(245, 'sign_up', NULL, NULL),
(246, 'what_do_you_want_to_learn', NULL, NULL),
(247, 'online_courses', NULL, NULL),
(248, 'explore_a_variety_of_fresh_topics', NULL, NULL),
(249, 'expert_instruction', NULL, NULL),
(250, 'find_the_right_course_for_you', NULL, NULL),
(251, 'lifetime_access', NULL, NULL),
(252, 'learn_on_your_schedule', NULL, NULL),
(253, 'top_courses', NULL, NULL),
(254, 'last_updater', NULL, NULL),
(255, 'hours', NULL, NULL),
(256, 'add_to_cart', NULL, NULL),
(257, 'top', NULL, NULL),
(258, 'latest_courses', NULL, NULL),
(259, 'added_to_cart', NULL, NULL),
(260, 'admin', NULL, NULL),
(261, 'log_in_to_your_udemy_account', NULL, NULL),
(262, 'by_signing_up_you_agree_to_our', NULL, NULL),
(263, 'terms_of_use', NULL, NULL),
(264, 'and', NULL, NULL),
(265, 'privacy_policy', NULL, NULL),
(266, 'do_not_have_an_account', NULL, NULL),
(267, 'sign_up_and_start_learning', NULL, NULL),
(268, 'check_here_for_exciting_deals_and_personalized_course_recommendations', NULL, NULL),
(269, 'already_have_an_account', NULL, NULL),
(270, 'checkout', NULL, NULL),
(271, 'paypal', NULL, NULL),
(272, 'stripe', NULL, NULL),
(273, 'step', NULL, NULL),
(274, 'how_would_you_rate_this_course_overall', NULL, NULL),
(275, 'write_a_public_review', NULL, NULL),
(276, 'describe_your_experience_what_you_got_out_of_the_course_and_other_helpful_highlights', NULL, NULL),
(277, 'what_did_the_instructor_do_well_and_what_could_use_some_improvement', NULL, NULL),
(278, 'next', NULL, NULL),
(279, 'previous', NULL, NULL),
(280, 'publish', NULL, NULL),
(281, 'search_results', NULL, NULL),
(282, 'ratings', NULL, NULL),
(283, 'search_results_for', NULL, NULL),
(284, 'category_page', NULL, NULL),
(285, 'all', NULL, NULL),
(286, 'category_list', NULL, NULL),
(287, 'by', NULL, NULL),
(288, 'go_to_wishlist', NULL, NULL),
(289, 'hi', NULL, NULL),
(290, 'my_courses', NULL, NULL),
(291, 'my_wishlist', NULL, NULL),
(292, 'my_messages', NULL, NULL),
(293, 'purchase_history', NULL, NULL),
(294, 'user_profile', NULL, NULL),
(295, 'already_purchased', NULL, NULL),
(296, 'all_courses', NULL, NULL),
(297, 'wishlists', NULL, NULL),
(298, 'search_my_courses', NULL, NULL),
(299, 'students_enrolled', NULL, NULL),
(300, 'created_by', NULL, NULL),
(301, 'last_updated', NULL, NULL),
(302, 'what_will_i_learn', NULL, NULL),
(303, 'view_more', NULL, NULL),
(304, 'other_related_courses', NULL, NULL),
(305, 'updated', NULL, NULL),
(306, 'curriculum_for_this_course', NULL, NULL),
(307, 'about_the_instructor', NULL, NULL),
(308, 'reviews', NULL, NULL),
(309, 'student_feedback', NULL, NULL),
(310, 'average_rating', NULL, NULL),
(311, 'preview_this_course', NULL, NULL),
(312, 'includes', NULL, NULL),
(313, 'on_demand_videos', NULL, NULL),
(314, 'full_lifetime_access', NULL, NULL),
(315, 'access_on_mobile_and_tv', NULL, NULL),
(316, 'course_preview', NULL, NULL),
(317, 'instructor_page', NULL, NULL),
(318, 'buy_now', NULL, NULL),
(319, 'shopping_cart', NULL, NULL),
(320, 'courses_in_cart', NULL, NULL),
(321, 'student_name', NULL, NULL),
(322, 'amount_to_pay', NULL, NULL),
(323, 'payment_successfully_done', NULL, NULL),
(324, 'filter_by', NULL, NULL),
(325, 'instructors', NULL, NULL),
(326, 'reset', NULL, NULL),
(327, 'your', NULL, NULL),
(328, 'rating', NULL, NULL),
(329, 'course_detail', NULL, NULL),
(330, 'start_lesson', NULL, NULL),
(331, 'show_full_biography', NULL, NULL),
(332, 'terms_and_condition', NULL, NULL),
(333, 'about', NULL, NULL),
(334, 'terms_&_condition', NULL, NULL),
(335, 'sub categories', NULL, NULL),
(336, 'add_sub_category', NULL, NULL),
(337, 'sub_category_title', NULL, NULL),
(338, 'add sub category', NULL, NULL),
(339, 'add_sub_category_form', NULL, NULL),
(340, 'sub_category_code', NULL, NULL),
(341, 'data_deleted', NULL, NULL),
(342, 'edit_category', NULL, NULL),
(343, 'edit category', NULL, NULL),
(344, 'edit_category_form', NULL, NULL),
(345, 'font', NULL, NULL),
(346, 'awesome class', NULL, NULL),
(347, 'update_category', NULL, NULL),
(348, 'data_updated_successfully', NULL, NULL),
(349, 'edit_sub_category', NULL, NULL),
(350, 'edit sub category', NULL, NULL),
(351, 'sub_category_edit', NULL, NULL),
(352, 'update_sub_category', NULL, NULL),
(353, 'course_added', NULL, NULL),
(354, 'user_deleted_successfully', NULL, NULL),
(355, 'private_messaging', NULL, NULL),
(356, 'private messaging', NULL, NULL),
(357, 'messages', NULL, NULL),
(358, 'select_message_to_read', NULL, NULL),
(359, 'new_message', NULL, NULL),
(360, 'email_duplication', NULL, NULL),
(361, 'your_registration_has_been_successfully_done', NULL, NULL),
(362, 'profile', NULL, NULL),
(363, 'account', NULL, NULL),
(364, 'add_information_about_yourself_to_share_on_your_profile', NULL, NULL),
(365, 'basics', NULL, NULL),
(366, 'add_your_twitter_link', NULL, NULL),
(367, 'add_your_facebook_link', NULL, NULL),
(368, 'add_your_linkedin_link', NULL, NULL),
(369, 'credentials', NULL, NULL),
(370, 'edit_your_account_settings', NULL, NULL),
(371, 'enter_current_password', NULL, NULL),
(372, 'enter_new_password', NULL, NULL),
(373, 're-type_your_password', NULL, NULL),
(374, 'save', NULL, NULL),
(375, 'update_user_photo', NULL, NULL),
(376, 'update_your_photo', NULL, NULL),
(377, 'upload_image', NULL, NULL),
(378, 'updated_successfully', NULL, NULL),
(379, 'invalid_login_credentials', NULL, NULL),
(380, 'blank_page', NULL, NULL),
(381, 'no_section_found', NULL, NULL),
(382, 'select_a_message_thread_to_read_it_here', NULL, NULL),
(383, 'send', NULL, NULL),
(384, 'type_your_message', NULL, NULL),
(385, 'date', NULL, NULL),
(386, 'total_price', NULL, NULL),
(387, 'payment_type', NULL, NULL),
(388, 'edit section', NULL, NULL),
(389, 'edit_section_form', NULL, NULL),
(390, 'reply_message', NULL, NULL),
(391, 'reply', NULL, NULL),
(392, 'log_in_to_your_account', NULL, NULL),
(393, 'no_result_found', NULL, NULL),
(394, 'enrollment', NULL, NULL),
(395, 'enroll_a_student', NULL, NULL),
(396, 'report', NULL, NULL),
(397, 'admin_revenue', NULL, NULL),
(398, 'instructor_revenue', NULL, NULL),
(399, 'instructor_settings', NULL, NULL),
(400, 'view_frontend', NULL, NULL),
(401, 'number_of_active_courses', NULL, NULL),
(402, 'number_of_pending_courses', NULL, NULL),
(403, 'all_instructor', NULL, NULL),
(404, 'active_courses', NULL, NULL),
(405, 'pending_courses', NULL, NULL),
(406, 'no_data_found', NULL, NULL),
(407, 'view_course_on_frontend', NULL, NULL),
(408, 'mark_as_pending', NULL, NULL),
(409, 'add category', NULL, NULL),
(410, 'add_categories', NULL, NULL),
(411, 'category_add_form', NULL, NULL),
(412, 'icon_picker', NULL, NULL),
(413, 'enroll a student', NULL, NULL),
(414, 'enrollment_form', NULL, NULL),
(415, 'admin revenue', NULL, NULL),
(416, 'total_amount', NULL, NULL),
(417, 'instructor revenue', NULL, NULL),
(418, 'status', NULL, NULL),
(419, 'instructor settings', NULL, NULL),
(420, 'allow_public_instructor', NULL, NULL),
(421, 'instructor_revenue_percentage', NULL, NULL),
(422, 'admin_revenue_percentage', NULL, NULL),
(423, 'update_instructor_settings', NULL, NULL),
(424, 'payment_info', NULL, NULL),
(425, 'required_for_instructors', NULL, NULL),
(426, 'paypal_client_id', NULL, NULL),
(427, 'stripe_public_key', NULL, NULL),
(428, 'stripe_secret_key', NULL, NULL),
(429, 'mark_as_active', NULL, NULL),
(430, 'mail_subject', NULL, NULL),
(431, 'mail_body', NULL, NULL),
(432, 'paid', NULL, NULL),
(433, 'pending', NULL, NULL),
(434, 'this_instructor_has_not_provided_valid_paypal_client_id', NULL, NULL),
(435, 'pay_with_paypal', NULL, NULL),
(436, 'this_instructor_has_not_provided_valid_public_key_or_secret_key', NULL, NULL),
(437, 'pay_with_stripe', NULL, NULL),
(438, 'create_course', NULL, NULL),
(439, 'payment_report', NULL, NULL),
(440, 'instructor_dashboard', NULL, NULL),
(441, 'draft', NULL, NULL),
(442, 'view_lessons', NULL, NULL),
(443, 'course_title', NULL, NULL),
(444, 'update_your_payment_settings', NULL, NULL),
(445, 'edit_course_detail', NULL, NULL),
(446, 'edit_basic_informations', NULL, NULL),
(447, 'publish_this_course', NULL, NULL),
(448, 'save_to_draft', NULL, NULL),
(449, 'update_section', NULL, NULL),
(450, 'analyzing_given_url', NULL, NULL),
(451, 'select_a_section', NULL, NULL),
(452, 'update_lesson', NULL, NULL),
(453, 'website_name', NULL, NULL),
(454, 'website_title', NULL, NULL),
(455, 'website_keywords', NULL, NULL),
(456, 'website_description', NULL, NULL),
(457, 'author', NULL, NULL),
(458, 'footer_text', NULL, NULL),
(459, 'footer_link', NULL, NULL),
(460, 'update_backend_logo', NULL, NULL),
(461, 'update_favicon', NULL, NULL),
(462, 'favicon', NULL, NULL),
(463, 'active courses', NULL, NULL),
(464, 'product_updated_successfully', NULL, NULL),
(465, 'course_overview_provider', NULL, NULL),
(466, 'youtube', NULL, NULL),
(467, 'vimeo', NULL, NULL),
(468, 'html5', NULL, NULL),
(469, 'meta_keywords', NULL, NULL),
(470, 'meta_description', NULL, NULL),
(471, 'lesson_type', NULL, NULL),
(472, 'video', NULL, NULL),
(473, 'select_type_of_lesson', NULL, NULL),
(474, 'text_file', NULL, NULL),
(475, 'pdf_file', NULL, NULL),
(476, 'document_file', NULL, NULL),
(477, 'image_file', NULL, NULL),
(478, 'lesson_provider', NULL, NULL),
(479, 'select_lesson_provider', NULL, NULL),
(480, 'analyzing_the_url', NULL, NULL),
(481, 'attachment', NULL, NULL),
(482, 'summary', NULL, NULL),
(483, 'download', NULL, NULL),
(484, 'system_settings_updated', NULL, NULL),
(485, 'course_updated_successfully', NULL, NULL),
(486, 'please_wait_untill_admin_approves_it', NULL, NULL),
(487, 'pending courses', NULL, NULL),
(488, 'course_status_updated', NULL, NULL),
(489, 'smtp_settings', NULL, NULL),
(490, 'free_course', NULL, NULL),
(491, 'free', NULL, NULL),
(492, 'get_enrolled', NULL, NULL),
(493, 'course_added_successfully', NULL, NULL),
(494, 'update_frontend_logo', NULL, NULL),
(495, 'system_currency_settings', NULL, NULL),
(496, 'select_system_currency', NULL, NULL),
(497, 'currency_position', NULL, NULL),
(498, 'left', NULL, NULL),
(499, 'right', NULL, NULL),
(500, 'left_with_a_space', NULL, NULL),
(501, 'right_with_a_space', NULL, NULL),
(502, 'paypal_currency', NULL, NULL),
(503, 'select_paypal_currency', NULL, NULL),
(504, 'stripe_currency', NULL, NULL),
(505, 'select_stripe_currency', NULL, NULL),
(506, 'heads_up', NULL, NULL),
(507, 'please_make_sure_that', NULL, NULL),
(508, 'system_currency', NULL, NULL),
(509, 'are_same', NULL, NULL),
(510, 'smtp settings', NULL, NULL),
(511, 'protocol', NULL, NULL),
(512, 'smtp_host', NULL, NULL),
(513, 'smtp_port', NULL, NULL),
(514, 'smtp_user', NULL, NULL),
(515, 'smtp_pass', NULL, NULL),
(516, 'update_smtp_settings', NULL, NULL),
(517, 'phrase_updated', NULL, NULL),
(518, 'registered_user', NULL, NULL),
(519, 'provide_your_valid_login_credentials', NULL, NULL),
(520, 'registration_form', NULL, NULL),
(521, 'provide_your_email_address_to_get_password', NULL, NULL),
(522, 'reset_password', NULL, NULL),
(523, 'want_to_go_back', NULL, NULL),
(524, 'message_sent!', NULL, NULL),
(525, 'selected_icon', NULL, NULL),
(526, 'pick_another_icon_picker', NULL, NULL),
(527, 'show_more', NULL, NULL),
(528, 'show_less', NULL, NULL),
(529, 'all_category', NULL, NULL),
(530, 'price_range', NULL, NULL),
(531, 'price_range_withing', NULL, NULL),
(532, 'all_categories', NULL, NULL),
(533, 'all_sub_category', NULL, NULL),
(534, 'number_of_results', NULL, NULL),
(535, 'showing_on_this_page', NULL, NULL),
(536, 'welcome', NULL, NULL),
(537, 'my_account', NULL, NULL),
(538, 'logout', NULL, NULL),
(539, 'visit_website', NULL, NULL),
(540, 'navigation', NULL, NULL),
(541, 'add_new_category', NULL, NULL),
(542, 'enrolment', NULL, NULL),
(543, 'enrol_history', NULL, NULL),
(544, 'enrol_a_student', NULL, NULL),
(545, 'language_settings', NULL, NULL),
(546, 'congratulations', NULL, NULL),
(547, 'oh_snap', NULL, NULL),
(548, 'close', NULL, NULL),
(549, 'parent', NULL, NULL),
(550, 'none', NULL, NULL),
(551, 'category_thumbnail', NULL, NULL),
(552, 'the_image_size_should_be', NULL, NULL),
(553, 'choose_thumbnail', NULL, NULL),
(554, 'data_added_successfully', NULL, NULL),
(555, '', NULL, NULL),
(556, 'update_category_form', NULL, NULL),
(557, 'student_list', NULL, NULL),
(558, 'choose_user_image', NULL, NULL),
(559, 'finish', NULL, NULL),
(560, 'thank_you', NULL, NULL),
(561, 'you_are_almost_there', NULL, NULL),
(562, 'you_are_just_one_click_away', NULL, NULL),
(563, 'country', NULL, NULL),
(564, 'website_settings', NULL, NULL),
(565, 'write_down_facebook_url', NULL, NULL),
(566, 'write_down_twitter_url', NULL, NULL),
(567, 'write_down_linkedin_url', NULL, NULL),
(568, 'google_link', NULL, NULL),
(569, 'write_down_google_url', NULL, NULL),
(570, 'instagram_link', NULL, NULL),
(571, 'write_down_instagram_url', NULL, NULL),
(572, 'pinterest_link', NULL, NULL),
(573, 'write_down_pinterest_url', NULL, NULL),
(574, 'update_settings', NULL, NULL),
(575, 'upload_banner_image', NULL, NULL),
(576, 'update_light_logo', NULL, NULL),
(577, 'upload_light_logo', NULL, NULL),
(578, 'update_dark_logo', NULL, NULL),
(579, 'upload_dark_logo', NULL, NULL),
(580, 'update_small_logo', NULL, NULL),
(581, 'upload_small_logo', NULL, NULL),
(582, 'upload_favicon', NULL, NULL),
(583, 'logo_updated', NULL, NULL),
(584, 'favicon_updated', NULL, NULL),
(585, 'banner_image_update', NULL, NULL),
(586, 'frontend_settings_updated', NULL, NULL),
(587, 'setup_payment_informations', NULL, NULL),
(588, 'update_system_currency', NULL, NULL),
(589, 'setup_paypal_settings', NULL, NULL),
(590, 'update_paypal_keys', NULL, NULL),
(591, 'setup_stripe_settings', NULL, NULL),
(592, 'test_mode', NULL, NULL),
(593, 'update_stripe_keys', NULL, NULL),
(594, 'home_marquee_setting', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `video_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `lesson_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `attachment_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `video_type_for_mobile_application` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url_for_mobile_application` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_for_mobile_application` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `duration`, `course_id`, `section_id`, `video_type`, `video_url`, `date_added`, `last_modified`, `lesson_type`, `attachment`, `attachment_type`, `summary`, `order`, `video_type_for_mobile_application`, `video_url_for_mobile_application`, `duration_for_mobile_application`) VALUES
(8, 'Crystallography and Rough Model Sorting', NULL, 2, 2, NULL, NULL, 1613952000, NULL, 'other', '5b9503740fb1f9b8d0ebb9fe7399eede.txt', 'txt', '', 0, NULL, NULL, NULL),
(9, 'Grading in Rough and Polished Diamond', NULL, 2, 2, NULL, NULL, 1613952000, 1613952000, 'other', 'f8b764efac45d10ce1b19f56593762da.txt', 'txt', '', 0, NULL, NULL, NULL),
(10, 'Preparation of Rough Lots of Manufacturing', NULL, 2, 2, NULL, NULL, 1613952000, NULL, 'other', '9e3a23eaffb2338c72bb6a68ede05fe4.txt', 'txt', '', 0, NULL, NULL, NULL),
(11, 'Weight Estimation of Yield and Repairing ', NULL, 2, 2, NULL, NULL, 1613952000, NULL, 'other', 'd654cbe54c912faf6d0cd1644e90b67e.txt', 'txt', '', 0, NULL, NULL, NULL),
(12, 'Crystallography and Sorting of Rough Models', NULL, 3, 3, NULL, NULL, 1613952000, NULL, 'other', '4bca7fa73362a14f333359151e718ca8.txt', 'txt', '', 0, NULL, NULL, NULL),
(13, 'Manufacturing Process', NULL, 3, 3, NULL, NULL, 1613952000, NULL, 'other', 'c5654484de2330e1142a0f28cd437dd7.txt', 'txt', '', 0, NULL, NULL, NULL),
(14, 'Diamond Designing on Computer Machine', NULL, 3, 3, NULL, NULL, 1613952000, NULL, 'other', '8cd38ac20e19a7bcd03106fe67ddc042.txt', 'txt', '', 0, NULL, NULL, NULL),
(15, 'Rough Valuation and Random Sampling', NULL, 3, 3, NULL, NULL, 1613952000, NULL, 'other', 'a2a01eb5446e833d758ce1566117aa69.txt', 'txt', '', 0, NULL, NULL, NULL),
(16, 'International Grading System', NULL, 4, 4, NULL, NULL, 1613952000, NULL, 'other', 'd016db4010bf4b4e9e24b0021b36a044.txt', 'txt', '', 0, NULL, NULL, NULL),
(17, 'Identification of Synthetics', NULL, 4, 4, NULL, NULL, 1613952000, NULL, 'other', '91dfe6d1e168935d96418b6762187a2f.txt', 'txt', '', 0, NULL, NULL, NULL),
(18, 'Treatments and Modifications', NULL, 4, 4, NULL, NULL, 1613952000, 1613952000, 'other', '9b1332c7bfaa3113033e0809b928a681.txt', 'txt', '', 0, NULL, NULL, NULL),
(19, 'Jeweler Valuation, Bagging and Flute Assortment', NULL, 4, 4, NULL, NULL, 1613952000, NULL, 'other', '3eff4490b0b1a79dd0efd1017e9c4b27.txt', 'txt', '', 0, NULL, NULL, NULL),
(20, 'Diamond Valuations and Certification - Advance', NULL, 4, 4, NULL, NULL, 1613952000, NULL, 'other', 'dca58cd06310b89485df60ac30dd45c3.txt', 'txt', '', 0, NULL, NULL, NULL),
(21, 'Indian Grading System', NULL, 4, 5, NULL, NULL, 1613952000, NULL, 'other', 'a57b983319862241e3ba3532e4d86914.txt', 'txt', '', 0, NULL, NULL, NULL),
(22, 'Local Terminology', NULL, 4, 5, NULL, NULL, 1613952000, NULL, 'other', '385d07984f1b2009dcd501a70ff25103.txt', 'txt', '', 0, NULL, NULL, NULL),
(23, 'Knowledge of Diamond Sieves', NULL, 4, 5, NULL, NULL, 1613952000, NULL, 'other', '87ffed09f547350d5df0a6c3a5d8154b.txt', 'txt', '', 0, NULL, NULL, NULL),
(24, 'Diamond Valuations and Certification - Basic', NULL, 4, 5, NULL, NULL, 1613952000, NULL, 'other', '1c7e3d9bca98e3b55ac0a215400e0cb2.txt', 'txt', '', 0, NULL, NULL, NULL),
(25, 'Setup-Process', NULL, 5, 6, NULL, NULL, 1613952000, NULL, 'other', 'b04606766b913055bedd97788d2d1825.txt', 'txt', '', 0, NULL, NULL, NULL),
(26, 'Scanning Process', NULL, 5, 6, NULL, NULL, 1613952000, NULL, 'other', '5aa4e4d22108f4dff012d5da13925f81.txt', 'txt', '', 0, NULL, NULL, NULL),
(27, 'Machine Operation', NULL, 5, 6, NULL, NULL, 1613952000, NULL, 'other', '7d19142f4a05f5f2e6c63ce2797db7d8.txt', 'txt', '', 0, NULL, NULL, NULL),
(28, 'Introduction of QC', NULL, 6, 7, NULL, NULL, 1613952000, NULL, 'other', '59e69e8f29296eaa40ffd6c813c92089.txt', 'txt', '', 0, NULL, NULL, NULL),
(29, 'Importance of QC', NULL, 6, 7, NULL, NULL, 1613952000, NULL, 'other', 'a9bfe752f0d1688dea6dc5e050f4b22e.txt', 'txt', '', 0, NULL, NULL, NULL),
(30, 'Utilization of Software Functions', NULL, 6, 7, NULL, NULL, 1613952000, NULL, 'other', '8631aa7b2df9092f77c46e10a24e0ab9.txt', 'txt', '', 0, NULL, NULL, NULL),
(31, 'Utilization of Function', NULL, 7, 8, NULL, NULL, 1613952000, NULL, 'other', '47dea47f73b30cc870d5fd8d3b7041de.txt', 'txt', '', 0, NULL, NULL, NULL),
(32, 'Knowledge of Pointers', NULL, 7, 8, NULL, NULL, 1613952000, NULL, 'other', '12582373cf66d3f0709406616ad5456f.txt', 'txt', '', 0, NULL, NULL, NULL),
(33, 'Price - Calculation', NULL, 7, 8, NULL, NULL, 1613952000, 1613952000, 'other', '480c83e2d47e14907ce58dbd9bb4f363.txt', 'txt', '', 0, NULL, NULL, NULL),
(34, 'Planning method on Valuation', NULL, 7, 8, NULL, NULL, 1613952000, NULL, 'other', '60fbccdd9a871a47aa22edc8d05b6ac0.txt', 'txt', '', 0, NULL, NULL, NULL),
(35, 'Knowledge of Software (5.3/7.0/7.5)', NULL, 8, 9, NULL, NULL, 1613952000, 1613952000, 'other', '97be14bc799e9215a2a121ab4f28b1ff.txt', 'txt', '', 0, NULL, NULL, NULL),
(36, 'Utilization of Function', NULL, 8, 9, NULL, NULL, 1613952000, NULL, 'other', '35cc568aaf712f36ea535292b19700e4.txt', 'txt', '', 0, NULL, NULL, NULL),
(37, 'Importance of Dia - Mark', NULL, 8, 9, NULL, NULL, 1613952000, 1613952000, 'other', '6767294a44139144c9d4cdbe53cbba03.txt', 'txt', '', 0, NULL, NULL, NULL),
(38, 'Knowledge of Stress Detection', NULL, 9, 10, NULL, NULL, 1613952000, 1613952000, 'other', '312121bf2035aef62695772c66ce20f7.txt', 'txt', '', 0, NULL, NULL, NULL),
(39, 'Diamond Fixing and Set up', NULL, 9, 10, NULL, NULL, 1613952000, NULL, 'other', '4deb1b99ae9bfec096c43d033e030f2a.txt', 'txt', '', 0, NULL, NULL, NULL),
(40, 'Opeation of Machines', NULL, 9, 10, NULL, NULL, 1613952000, NULL, 'other', 'b3cb80b349d5ec6be69884e8613651a8.txt', 'txt', '', 0, NULL, NULL, NULL),
(41, 'Identification of Tools', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', 'caaaf02d10048c179c6c79d8e23be333.txt', 'txt', '', 0, NULL, NULL, NULL),
(42, 'Polishing Wheels and Types', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', '2813263d9aad0a37a56219e05ef9a444.txt', 'txt', '', 0, NULL, NULL, NULL),
(43, 'Knowledge of Parameters', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', '92c8d78ff4096fd43e6e10bcf2a7bb3d.txt', 'txt', '', 0, NULL, NULL, NULL),
(44, 'Preparation of Table, Top &amp; Bottom', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', 'e20a1b7f82b0289cb1799ae7be54a770.txt', 'txt', '', 0, NULL, NULL, NULL),
(45, 'Knowledge of Symmetry', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', '923cf6529ef898caf5ae8a3b8ec71cf6.txt', 'txt', '', 0, NULL, NULL, NULL),
(46, 'Knowledge of Cut', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', '161b1960210b7287edd15f08e11fa5f8.txt', 'txt', '', 0, NULL, NULL, NULL),
(47, 'Knowledge of Polish', NULL, 10, 11, NULL, NULL, 1613952000, NULL, 'other', '4edf7f1d28548b9cd883074b47ee5f12.txt', 'txt', '', 0, NULL, NULL, NULL),
(48, 'History of Gems', '', 11, 12, '', '', 1613952000, 1613952000, 'other', '9f1d3310501001a9b7a320dd217b694e.txt', 'txt', '', 0, '', '', ''),
(49, 'What is Gemology', '', 11, 12, '', '', 1613952000, 1613952000, 'other', '0805e33ae460624e32955846ff298f1a.txt', 'txt', '', 0, '', '', ''),
(50, 'Crystallography (Identification of Rough Gemstone)', '', 11, 12, '', '', 1613952000, 1613952000, 'other', '5ee57900d732d141244a7d0e905d65e9.txt', 'txt', '', 0, '', '', ''),
(51, 'Visual Observation(Identification of Stones by 10X)', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', '4025f24c6b1e31d214532a25b757d8be.txt', 'txt', '', 0, NULL, NULL, NULL),
(52, 'Properties of Gemstone(Physical and Optical)', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', '31582ec018eb6f0b039c8aa415d2a3a3.txt', 'txt', '', 0, NULL, NULL, NULL),
(53, 'Instruments used for Gem Identification', NULL, 11, 12, NULL, NULL, 1613952000, 1613952000, 'other', 'e94728c13dd25ab52a52a7550da4043e.txt', 'txt', '', 0, NULL, NULL, NULL),
(54, 'Gem Identification with and without Instruments (Special emphasis on Ruby, Sapphire, Emerald)', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', '2aee4332191de7d3a148e5bf1622ee56.txt', 'txt', '', 0, NULL, NULL, NULL),
(55, 'Identification of Synthetics and Gem Enhancements', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', '25d11825797ec50d48636b982c57bdd3.txt', 'txt', '', 0, NULL, NULL, NULL),
(56, 'Sources of Gemstones', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', 'd6685633ebe0a16302bed9ffc78c26c8.txt', 'txt', '', 0, NULL, NULL, NULL),
(57, 'Basic Knowledge of Mining', NULL, 11, 12, NULL, NULL, 1613952000, NULL, 'other', '9c323c71a38c56e4bab38d9ada8dfdae.txt', 'txt', '', 0, NULL, NULL, NULL),
(58, 'Grading / Assortment', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', 'dd54195ce0dbcd315f2b9e49ca428db5.txt', 'txt', '', 0, NULL, NULL, NULL),
(59, 'Color Grading', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', '14a6b9b7320e71f805a4d0f7f65319ff.txt', 'txt', '', 0, NULL, NULL, NULL),
(60, 'Clarity Grading', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', '25428ae42ea5f9c5427f81857867e5e0.txt', 'txt', '', 0, NULL, NULL, NULL),
(61, 'Cut Grading and Sizing Gemstones', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', 'a4e8fe35d87e20095377948eee72beda.txt', 'txt', '', 0, NULL, NULL, NULL),
(62, 'Assortment of Gemstones', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', '09e9733c60356007b6902dbb2fe98126.txt', 'txt', '', 0, NULL, NULL, NULL),
(63, 'Basic Knowledge of Cutting and Polishing of Gemstones', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', '3fc10864f6dcde8c1a392c8b10336a70.txt', 'txt', '', 0, NULL, NULL, NULL),
(64, 'Special emphasis on Rubby Sapphire and Emerald', NULL, 12, 13, NULL, NULL, 1613952000, NULL, 'other', '295eebba1be4ee78e6f4b589e6f247d4.txt', 'txt', '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `from` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sender` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `read_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `receiver` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_message_timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrol_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `invoice_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `next_due` date DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `admin_revenue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_revenue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_payment_status` int(11) DEFAULT '0',
  `transaction_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` enum('canceled','paid','unpaid','refunded','pending') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `payment_type`, `course_id`, `enrol_id`, `amount`, `payment_detail`, `invoice_type`, `date_added`, `next_due`, `last_modified`, `admin_revenue`, `instructor_revenue`, `instructor_payment_status`, `transaction_id`, `session_id`, `payment_status`) VALUES
(1, 2, 'cash', 3, 2, 500, '{\"cheque_number\":null,\"wallet_name\":null,\"bank_name\":null}', 'token', 1616284800, '2021-03-21', 1616284800, '0', NULL, 0, 'sds', 'd0a2561aae8099276b4500395afeee91d827e7f7', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE `payout` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `definition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perm_user`
--

CREATE TABLE `perm_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `pm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_options` int(11) DEFAULT NULL,
  `options` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `correct_answers` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ratable_id` int(11) DEFAULT NULL,
  `ratable_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `review` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `date_added`, `last_modified`) VALUES
(1, 'Admin', 1234567890, 1234567890),
(2, 'User', 1234567890, 1234567890),
(3, 'Department Admin', 1234567890, 1234567890),
(4, 'Coordinator', 1234567890, 1234567890),
(5, 'Accountant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `title`, `course_id`, `order`) VALUES
(1, 'Chapters', 4, 0),
(2, 'Chapters', 2, 0),
(3, 'Chapters', 3, 0),
(4, 'a. POLISHED DIAMOND GRADING - CERT', 13, 0),
(5, 'b. POLISHED DIAMOND GRADING - NON-CERT', 13, 0),
(6, 'Chapters', 5, 0),
(7, 'Chapters', 6, 0),
(8, 'Chapters', 7, 0),
(9, 'Chapters', 8, 0),
(10, 'Chapters', 9, 0),
(11, 'Chapters', 10, 0),
(12, 'Chapters', 11, 0),
(13, 'Chapters', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'language', 'english'),
(2, 'system_name', 'LMS'),
(3, 'system_title', 'Academy Learning Club'),
(4, 'system_email', 'sumit.templatic@gmail.com'),
(5, 'address', 'Surat'),
(6, 'phone', '9375527492'),
(7, 'purchase_code', 'your-purchase-code'),
(8, 'paypal', '[{\"active\":\"0\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AfGaziKslex-scLAyYdDYXNFaz2aL5qGau-SbDgE_D2E80D3AFauLagP8e0kCq9au7W4IasmFbirUUYc\",\"sandbox_secret_key\":\"EMa5pCTuOpmHkhHaCGibGhVUcKg0yt5-C3CzJw-OWJCzaXXzTlyD17SICob_BkfM_0Nlk7TWnN42cbGz\",\"production_client_id\":\"1234\",\"production_secret_key\":\"1234\"}]'),
(9, 'stripe_keys', '[{\"active\":\"0\",\"testmode\":\"on\",\"public_key\":\"pk_test_LnMXAA8Rox0ITcpDgkIjbcR600u09yZlhQ\",\"secret_key\":\"sk_test_9iN1igv6l9R5tolcyZLrIgMP00rcDJMVnJ\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(10, 'youtube_api_key', 'AIzaSyDILkMEICnb2FR2T9WIBK5I8vNQnM6CPic'),
(11, 'vimeo_api_key', 'vimeo-api-key'),
(12, 'slogan', 'A course based video CMS'),
(13, 'text_align', NULL),
(14, 'allow_instructor', '1'),
(15, 'instructor_revenue', '70'),
(16, 'system_currency', 'INR'),
(17, 'paypal_currency', 'INR'),
(18, 'stripe_currency', 'INR'),
(19, 'author', 'Sumit More'),
(20, 'currency_position', 'left'),
(21, 'website_description', 'Nice application'),
(22, 'website_keywords', 'LMS,Learning Management System'),
(23, 'footer_text', 'Admin'),
(24, 'footer_link', '#'),
(25, 'protocol', 'smtp'),
(26, 'smtp_host', 'ssl://smtp.googlemail.com'),
(27, 'smtp_port', '465'),
(28, 'smtp_user', 'Your email'),
(29, 'smtp_pass', 'Your email password'),
(30, 'version', '4.4'),
(31, 'student_email_verification', 'disable'),
(32, 'instructor_application_note', 'Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you as an instructor.'),
(33, 'certificate_template', 'This is to certify that Mr. / Ms. {student} successfully completed the course with on certificate for {course}.'),
(34, 'paytm_keys', '[{\"PAYTM_MERCHANT_KEY\":\"PAYTM_MERCHANT_KEY\",\"PAYTM_MERCHANT_MID\":\"PAYTM_MERCHANT_MID\",\"PAYTM_MERCHANT_WEBSITE\":\"DEFAULT\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\"}]'),
(35, 'razorpay_keys', '[{\"RAZORPAY_MODE\":\"test\",\"RAZORPAY_KEY\":\"RAZORPAY_KEY\",\"RAZORPAY_SECRET\":\"RAZORPAY_SECRET\",\"RAZORPAY_CURRENCY\":\"INR\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `source_id` int(11) UNSIGNED NOT NULL,
  `source_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `source_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`source_id`, `source_name`, `source_status`) VALUES
(1, 'WEBSITE', 1),
(2, 'EMPLOYEE REFERENCE', 1),
(3, 'TELECALLING', 1),
(4, 'WALKIN', 1),
(5, 'WHATSAPP', 1),
(6, 'EMAIL', 1),
(7, 'SMS', 1),
(8, 'NEWS PAPER', 1),
(9, 'ONE PAGER', 1),
(10, 'RADIO', 1),
(11, 'TV', 1),
(12, 'HOARDING', 1),
(13, 'FACEBOOK', 1),
(14, 'INSTAGRAM', 1),
(15, 'TELEGRAM', 1),
(16, 'YOUTUBE', 1),
(17, 'MAGAZINE', 1),
(18, 'OTHER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagable_id` int(11) DEFAULT NULL,
  `tagable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `biography` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `watch_history` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `wishlist` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `paypal_keys` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `stripe_keys` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `verification_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_instructor` int(11) DEFAULT '0',
  `process_mode` enum('online','offline') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'online',
  `marital_status` enum('single','married','widowed','divorced') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'single',
  `en_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `uid_or_adhaar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `education_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `mob_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_mob` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `social_links`, `biography`, `role_id`, `dob`, `date_added`, `last_modified`, `watch_history`, `wishlist`, `title`, `paypal_keys`, `stripe_keys`, `verification_code`, `image`, `status`, `is_instructor`, `process_mode`, `marital_status`, `en_id`, `branch_id`, `uid_or_adhaar`, `address_detail`, `education_detail`, `mob_no`, `alt_mob`, `added_by`, `is_delete`) VALUES
(1, 'admin', 'manager', 'admin@kgkacademy.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'online', 'single', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'sumit', 'more', 'sumit@sumit.com', 'b2a10a6c3dcadb10c8ffd734c1bab896d55cf0ec', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, '1922-03-02', 1616313248, NULL, '[]', '[]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', NULL, '18b806a4338b5e1b9d18fddb33948469', 1, 0, 'online', 'single', 0, 1, NULL, NULL, NULL, '9874563210', '', NULL, 0),
(3, 'sample', 'data', 'sample@sample.com', 'a60eb8aedd26e1870193e1df5be76f66b5043835', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, '2021-03-18', 1616576481, NULL, '[]', '[]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', NULL, '4b2e4b1b4f2647f97a3e36bf1ae33a91', 1, 0, 'online', 'single', NULL, 1, NULL, NULL, NULL, '9874563210', '', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_for_users`
--
ALTER TABLE `asset_for_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dpid`);

--
-- Indexes for table `education_list`
--
ALTER TABLE `education_list`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perm_user`
--
ALTER TABLE `perm_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_for_users`
--
ALTER TABLE `asset_for_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `education_list`
--
ALTER TABLE `education_list`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `en_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `hod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perm_user`
--
ALTER TABLE `perm_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `source_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
