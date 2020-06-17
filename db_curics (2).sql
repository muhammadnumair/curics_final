-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2020 at 01:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_curics`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_invoices`
--

DROP TABLE IF EXISTS `appointment_invoices`;
CREATE TABLE IF NOT EXISTS `appointment_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_invoices`
--

INSERT INTO `appointment_invoices` (`id`, `appointment_id`, `invoice_amount`, `invoice_status`, `patient_id`, `clinic_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(44, '87', '1000', 'Paid', NULL, 9, 21, '2020-06-15 05:43:32', '2020-06-15 05:43:32'),
(43, '86', '1000', 'Paid', 17, 9, 21, '2020-06-15 05:34:33', '2020-06-15 05:35:29'),
(42, '85', '1000', 'Paid', 12, 9, 19, '2020-06-15 05:14:25', '2020-06-15 05:14:54'),
(41, '84', '2000', 'Paid', 12, 9, 20, '2020-06-15 01:25:28', '2020-06-15 01:25:49'),
(40, '83', '1000', 'Paid', 12, 9, 19, '2020-04-23 06:25:40', '2020-04-23 06:32:02'),
(39, '82', '1000', 'Paid', 16, 9, 20, '2020-04-21 08:42:17', '2020-04-21 08:44:57'),
(38, '81', '1000', 'Unpaid', NULL, 9, 20, '2020-04-21 08:41:44', '2020-04-21 08:41:44'),
(37, '80', '1000', 'Unpaid', NULL, 9, 20, '2020-04-21 08:40:52', '2020-04-21 08:40:52'),
(36, '79', '1000', 'Unpaid', NULL, 9, 20, '2020-04-21 08:40:03', '2020-04-21 08:40:03'),
(45, '88', '1000', 'Paid', NULL, 9, 21, '2020-06-15 05:57:43', '2020-06-15 05:57:43'),
(46, '89', '1000', 'Paid', NULL, 9, 21, '2020-06-15 05:58:07', '2020-06-15 05:58:07'),
(47, '90', '1000', 'Paid', 20, 9, 21, '2020-06-15 05:58:31', '2020-06-15 05:58:31'),
(48, '91', '1000', 'Paid', 21, 9, 21, '2020-06-15 05:59:35', '2020-06-15 05:59:35'),
(49, '92', '1000', 'Paid', 21, 9, 19, '2020-06-15 09:52:44', '2020-06-15 09:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_payments`
--

DROP TABLE IF EXISTS `appointment_payments`;
CREATE TABLE IF NOT EXISTS `appointment_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `cashback` double(8,2) NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_payments`
--

INSERT INTO `appointment_payments` (`id`, `appointment_id`, `payable_amount`, `paid_amount`, `cashback`, `invoice_number`, `doctor_id`, `clinic_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(31, '90', 1000.00, 1000.00, 0.00, '47', 21, 9, 20, '2020-06-15 05:58:31', '2020-06-15 05:58:31'),
(30, '89', 1000.00, 1000.00, 0.00, '46', 21, 9, NULL, '2020-06-15 05:58:07', '2020-06-15 05:58:07'),
(29, '88', 1000.00, 1000.00, 0.00, '45', 21, 9, NULL, '2020-06-15 05:57:43', '2020-06-15 05:57:43'),
(28, '87', 1000.00, 1000.00, 0.00, '44', 21, 9, NULL, '2020-06-15 05:43:32', '2020-06-15 05:43:32'),
(27, '86', 1000.00, 1000.00, 0.00, '43', 21, 9, 17, '2020-06-15 05:35:29', '2020-06-15 05:35:29'),
(26, '85', 1000.00, 1000.00, 0.00, '42', 19, 9, 12, '2020-06-15 05:14:54', '2020-06-15 05:14:54'),
(25, '84', 2000.00, 2000.00, 0.00, '41', 20, 9, 12, '2020-06-15 01:25:49', '2020-06-15 01:25:49'),
(24, '83', 1000.00, 1000.00, 0.00, '40', 19, 9, 12, '2020-04-23 06:32:02', '2020-04-23 06:32:02'),
(23, '82', 1000.00, 1000.00, 0.00, '39', 20, 9, 16, '2020-04-21 08:44:57', '2020-04-21 08:44:57'),
(32, '91', 1000.00, 1000.00, 0.00, '48', 21, 9, 21, '2020-06-15 05:59:35', '2020-06-15 05:59:35'),
(33, '92', 1000.00, 1000.00, 0.00, '49', 19, 9, 21, '2020-06-15 09:53:58', '2020-06-15 09:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE IF NOT EXISTS `beds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `bed_number` int(11) NOT NULL,
  `description` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `clinic_id`, `category_id`, `bed_number`, `description`, `updated_at`, `created_at`) VALUES
(2, 9, 2, 12, 'Near ICU Ward Private Center', '2020-04-23 11:52:23', '2020-04-23 11:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `bed_allotments`
--

DROP TABLE IF EXISTS `bed_allotments`;
CREATE TABLE IF NOT EXISTS `bed_allotments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `allocated_time` datetime NOT NULL,
  `discharge_time` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed_allotments`
--

INSERT INTO `bed_allotments` (`id`, `clinic_id`, `bed_id`, `patient_id`, `allocated_time`, `discharge_time`, `created_at`, `updated_at`) VALUES
(2, 9, 2, 12, '2020-04-24 00:00:00', '2020-04-29 00:00:00', '2020-04-23 11:53:18', '2020-04-23 11:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `bed_categories`
--

DROP TABLE IF EXISTS `bed_categories`;
CREATE TABLE IF NOT EXISTS `bed_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed_categories`
--

INSERT INTO `bed_categories` (`id`, `clinic_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 9, 'Icu', 'Near', '2020-04-23 11:51:58', '2020-04-23 11:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

DROP TABLE IF EXISTS `blood_banks`;
CREATE TABLE IF NOT EXISTS `blood_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `blood_group` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `clinic_id`, `blood_group`, `status`, `created_at`, `updated_at`) VALUES
(3, 9, 'A+', '10 Bags', '2020-04-23 11:43:57', '2020-04-23 11:43:57'),
(4, 9, 'A-', '20 Bags', '2020-04-23 11:44:29', '2020-04-23 11:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

DROP TABLE IF EXISTS `blood_donors`;
CREATE TABLE IF NOT EXISTS `blood_donors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `blood_group` text NOT NULL,
  `age` text NOT NULL,
  `last_donation_date` date NOT NULL,
  `phone` text NOT NULL,
  `sex` text NOT NULL,
  `email` text,
  `clinic_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `name`, `blood_group`, `age`, `last_donation_date`, `phone`, `sex`, `email`, `clinic_id`, `created_at`, `updated_at`) VALUES
(2, 'Naveed Rahman', 'B+', '27', '2020-03-29', '03217763121', 'Male', 'naveed_rahman@gmail.com', 9, '2020-04-23 11:51:10', '2020-04-23 11:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Lahore', 'lahore', '2019-09-07 19:00:00', '2019-09-07 19:00:00'),
(2, 'Rahim Yar Khan', 'rahim-yar-khan', '2019-09-07 19:00:00', '2019-09-07 19:00:00'),
(3, 'Karachi', 'karachi', '2019-11-02 19:00:00', '2019-11-02 19:00:00'),
(4, 'Islamabad', 'islamabad', '2019-11-02 19:00:00', '2019-11-02 19:00:00'),
(5, 'Hyderabad', 'hyderabad', '2019-11-02 19:00:00', '2019-11-02 19:00:00'),
(6, 'Faisalabad', 'faisalabad', '2019-11-02 19:00:00', '2019-11-02 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

DROP TABLE IF EXISTS `clinics`;
CREATE TABLE IF NOT EXISTS `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `alias` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `name`, `email`, `description`, `address`, `phone`, `alias`, `status`, `user_id`, `package_id`, `created_at`, `updated_at`) VALUES
(9, 'Mayo Hospital Lahore', 'hospital2@gmail.com', NULL, 'Near New Anarkali،, Neela Gumbad Lahore, Punjab', '(042) 99211129', 'mayo-hospital-lahore', 1, 31, 3, '2020-04-19 22:43:53', '2020-04-19 22:43:53'),
(8, 'Sheikh Zaid Medical Hospital', 'hospital1@gmail.com', NULL, 'Hospital Road, Wireless Pull, Rahim Yar Khan', '03216702013', 'sheikh-zaid-medical-hospital', 1, 30, 3, '2020-04-19 22:42:52', '2020-04-19 22:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_companies`
--

DROP TABLE IF EXISTS `clinic_companies`;
CREATE TABLE IF NOT EXISTS `clinic_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `api_url` text,
  `discount_percent` text NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_tests`
--

DROP TABLE IF EXISTS `diagnosis_tests`;
CREATE TABLE IF NOT EXISTS `diagnosis_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis_tests`
--

INSERT INTO `diagnosis_tests` (`id`, `test_name`, `updated_at`, `created_at`) VALUES
(5, 'Urine Test', '2020-06-15', '2020-06-15'),
(4, 'Litmus Test', '2020-04-23', '2020-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name _urdu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name_english`, `name _urdu`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'Bawaseer', 'بواسیر', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'bawaseer'),
(2, 'Dengue Fever', 'ڈینگی', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'dengue_fever'),
(3, 'Diabetes', 'شوگر کا مرض', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'diabetes'),
(4, 'Hernia', 'ہرنیا', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'hernia'),
(5, 'Blood Pressure', 'بلڈ پریشر', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'blood_pressure'),
(6, 'Heart Attack', 'ہارٹ اٹیک', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'heart_attack');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `experience_years` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_address_latitude` text COLLATE utf8mb4_unicode_ci,
  `doctor_address_longitude` text COLLATE utf8mb4_unicode_ci,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci,
  `online_presense` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `about`, `experience_years`, `doctor_address`, `doctor_address_latitude`, `doctor_address_longitude`, `designation`, `doctor_fee`, `user_id`, `city_id`, `alias`, `online_presense`, `created_at`, `updated_at`, `gender`) VALUES
(23, 'Muhammad Numair', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, 'muhammad-numair', 0, '2020-06-17 06:54:09', '2020-06-17 06:54:09', NULL),
(21, 'Umar Farooq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35', NULL, 'umar-farooq', 0, '2020-06-15 05:21:26', '2020-06-15 05:21:26', NULL),
(22, 'Asad Zalim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '38', NULL, 'asad-zalim', 0, '2020-06-17 05:49:08', '2020-06-17 05:49:08', NULL),
(20, 'Alia Liaqat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', NULL, 'alia-liaqat', 0, '2020-04-20 00:39:12', '2020-04-20 00:39:12', NULL),
(19, 'Summen Zahid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5', 'Near New Anarkali،, Neela Gumbad Lahore, Punjab', '31.5667', '74.3097', NULL, NULL, '33', '1', 'summen-zahid', 1, '2020-04-20 00:38:24', '2020-06-15 05:09:31', 'male'),
(18, 'Menahal Hassan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', NULL, 'menahal-hassan', 0, '2020-04-20 00:37:40', '2020-04-20 00:37:40', NULL),
(24, 'Alia Alia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40', NULL, 'alia-alia', 0, '2020-06-17 06:55:29', '2020-06-17 06:55:29', NULL),
(25, 'Alia Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '41', NULL, 'alia-ali', 0, '2020-06-17 06:56:02', '2020-06-17 06:56:02', NULL),
(26, 'Aliaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '42', NULL, 'aliaaaa', 0, '2020-06-17 06:56:40', '2020-06-17 06:56:40', NULL),
(27, 'Aliaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '43', NULL, 'aliaaaa', 0, '2020-06-17 06:56:53', '2020-06-17 06:56:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_specializations`
--

DROP TABLE IF EXISTS `doctors_specializations`;
CREATE TABLE IF NOT EXISTS `doctors_specializations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_specializations`
--

INSERT INTO `doctors_specializations` (`id`, `doctor_id`, `specialization_id`, `updated_at`, `created_at`) VALUES
(34, 19, 6, '2020-06-15', '2020-06-15'),
(31, 19, 2, '2020-06-15', '2020-06-15'),
(30, 19, 1, '2020-06-15', '2020-06-15'),
(33, 19, 4, '2020-06-15', '2020-06-15'),
(32, 19, 3, '2020-06-15', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_achievements`
--

DROP TABLE IF EXISTS `doctor_achievements`;
CREATE TABLE IF NOT EXISTS `doctor_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_achievements`
--

INSERT INTO `doctor_achievements` (`id`, `description`, `doctor_id`, `created_at`, `updated_at`) VALUES
(4, 'Albany Medical Center Prize', '19', '2020-06-15 05:07:52', '2020-06-15 05:07:52'),
(5, 'March of Dimes Prize in Developmental Biology', '19', '2020-06-15 05:08:05', '2020-06-15 05:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

DROP TABLE IF EXISTS `doctor_appointments`;
CREATE TABLE IF NOT EXISTS `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` time DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `blood_pressure` text COLLATE utf8mb4_unicode_ci,
  `diabetes` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `payable_amount` text COLLATE utf8mb4_unicode_ci,
  `notification_status` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) DEFAULT NULL,
  `company_employee_id` int(11) DEFAULT NULL,
  `company_employee_position` text COLLATE utf8mb4_unicode_ci,
  `discount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `doctor_id`, `clinic_id`, `patient_id`, `patient_name`, `patient_number`, `appointment_date`, `time_slot`, `weight`, `blood_pressure`, `diabetes`, `status`, `payable_amount`, `notification_status`, `company_id`, `company_employee_id`, `company_employee_position`, `discount`, `created_at`, `updated_at`) VALUES
(91, '21', '9', '21', 'Usman Ghazi', '090078701', '06/22/2020', '14:45:00', 67, '120/80', '180', 'Treated', '1000', 1, NULL, NULL, NULL, 0, '2020-06-15 05:59:35', '2020-06-15 06:33:31'),
(92, '19', '9', '21', 'Usman Ghazi', '090078701', '2020-06-16', '10:00:00', 67, '120/80', '180', 'Approved', '1000', 1, NULL, NULL, NULL, 0, '2020-06-15 09:52:44', '2020-06-15 09:53:58'),
(86, '21', '9', '17', 'Asphand Behroz', '090078601', '06/22/2020', '13:30:00', 67, '120/80', '120', 'Treated', '1000', 1, NULL, NULL, 'student', 0, '2020-06-15 05:34:33', '2020-06-15 06:30:32'),
(85, '19', '9', '12', 'Khalida Yousaf', '03043641920', '06/20/2020', '13:15:00', 67, '120/80', '180', 'Treated', '1000', 1, NULL, NULL, NULL, 0, '2020-06-15 05:14:25', '2020-06-15 05:15:22'),
(82, '20', '9', '16', 'Ramla Yousaf', '0321720913', '04/22/2020', '16:15:00', NULL, NULL, NULL, 'Treated', '1000', 0, NULL, NULL, 'student', 0, '2020-04-21 08:42:17', '2020-04-21 08:48:47'),
(84, '20', '9', '12', 'Khalida Yousaf', '03043641920', '06/15/2020', '17:00:00', 67, '80/120', '180', 'Approved', '2000', 0, NULL, NULL, 'student', 0, '2020-06-15 01:25:28', '2020-06-15 01:25:49'),
(83, '19', '9', '12', 'Khalida Yousaf', '03043641920', '04/27/2020', '15:30:00', 67, '120/80', '120', 'Treated', '1000', 1, NULL, NULL, 'student', 0, '2020-04-23 06:25:40', '2020-06-15 05:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_clinics`
--

DROP TABLE IF EXISTS `doctor_clinics`;
CREATE TABLE IF NOT EXISTS `doctor_clinics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_active` int(11) NOT NULL DEFAULT '1',
  `clinic_comission` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_clinics`
--

INSERT INTO `doctor_clinics` (`id`, `doctor_id`, `clinic_id`, `doctor_fee`, `clinic_active`, `clinic_comission`, `created_at`, `updated_at`) VALUES
(15, '18', '9', '1000', 1, 10, '2020-04-20 00:37:40', '2020-04-20 00:37:40'),
(16, '19', '9', '1000', 1, 10, '2020-04-20 00:38:24', '2020-04-20 00:38:24'),
(17, '20', '9', '1000', 1, 5, '2020-04-20 00:39:12', '2020-04-20 00:39:12'),
(18, '21', '9', '1000', 1, 20, '2020-06-15 05:21:26', '2020-06-15 05:21:26'),
(19, '22', '9', '1000', 1, 20, '2020-06-17 05:49:08', '2020-06-17 05:49:08'),
(20, '24', '9', '1000', 1, 10, '2020-06-17 06:55:29', '2020-06-17 06:55:29'),
(21, '25', '9', '1000', 1, 50, '2020-06-17 06:56:02', '2020-06-17 06:56:02'),
(22, '26', '9', '1000', 1, 100, '2020-06-17 06:56:40', '2020-06-17 06:56:40'),
(23, '27', '9', '1000', 1, 100, '2020-06-17 06:56:53', '2020-06-17 06:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

DROP TABLE IF EXISTS `doctor_departments`;
CREATE TABLE IF NOT EXISTS `doctor_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `clinic_id`, `doctor_id`, `department_id`, `updated_at`, `created_at`) VALUES
(4, 9, 19, 16, '2020-04-20 05:38:24', '2020-04-20 05:38:24'),
(3, 9, 18, 17, '2020-04-20 05:37:40', '2020-04-20 05:37:40'),
(5, 9, 20, 14, '2020-04-20 05:39:12', '2020-04-20 05:39:12'),
(6, 9, 21, 17, '2020-06-15 10:21:26', '2020-06-15 10:21:26'),
(7, 9, 22, 12, '2020-06-17 10:49:08', '2020-06-17 10:49:08'),
(8, 9, 23, 16, '2020-06-17 11:54:09', '2020-06-17 11:54:09'),
(9, 9, 24, 16, '2020-06-17 11:55:29', '2020-06-17 11:55:29'),
(10, 9, 25, 15, '2020-06-17 11:56:02', '2020-06-17 11:56:02'),
(11, 9, 26, 14, '2020-06-17 11:56:40', '2020-06-17 11:56:40'),
(12, 9, 27, 17, '2020-06-17 11:56:53', '2020-06-17 11:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_diseases`
--

DROP TABLE IF EXISTS `doctor_diseases`;
CREATE TABLE IF NOT EXISTS `doctor_diseases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_expenses`
--

DROP TABLE IF EXISTS `doctor_expenses`;
CREATE TABLE IF NOT EXISTS `doctor_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_experiences`
--

DROP TABLE IF EXISTS `doctor_experiences`;
CREATE TABLE IF NOT EXISTS `doctor_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_experiences`
--

INSERT INTO `doctor_experiences` (`id`, `field`, `institute`, `doctor_id`, `created_at`, `updated_at`) VALUES
(11, 'BMBS', 'Jiangsu University', '19', '2020-06-15 05:07:16', '2020-06-15 05:07:16'),
(10, 'MBBS', 'China Medical University', '19', '2020-06-15 05:07:00', '2020-06-15 05:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_patients`
--

DROP TABLE IF EXISTS `doctor_patients`;
CREATE TABLE IF NOT EXISTS `doctor_patients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_patients`
--

INSERT INTO `doctor_patients` (`id`, `clinic_id`, `doctor_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(10, '9', '20', '14', '2020-04-21 08:40:52', '2020-04-21 08:40:52'),
(9, '9', '20', '13', '2020-04-21 08:40:03', '2020-04-21 08:40:03'),
(12, '9', '20', '16', '2020-04-21 08:42:17', '2020-04-21 08:42:17'),
(15, '9', '21', '21', '2020-06-15 05:59:35', '2020-06-15 05:59:35'),
(16, '9', NULL, '24', '2020-06-17 07:13:09', '2020-06-17 07:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_prescriptions`
--

DROP TABLE IF EXISTS `doctor_prescriptions`;
CREATE TABLE IF NOT EXISTS `doctor_prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_pressure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_prescriptions`
--

INSERT INTO `doctor_prescriptions` (`id`, `name`, `gender`, `mobile`, `birthday`, `age`, `height`, `weight`, `blood_pressure`, `diabetes`, `address`, `appointment_id`, `patient_id`, `doctor_id`, `clinic_id`, `symptoms`, `created_at`, `updated_at`) VALUES
(33, 'Asphand Behroz', 'Male', '090078601', NULL, '22', NULL, '67', '120/80', '120', NULL, '86', NULL, '21', '9', 'There are no special notes', '2020-06-15 06:29:11', '2020-06-15 06:29:11'),
(32, 'Usman Ghazi', 'Female', '090078701', NULL, '27', NULL, '67', '120/80', '80', NULL, '91', NULL, '21', '9', 'There are no special notes', '2020-06-15 06:25:46', '2020-06-15 06:25:46'),
(31, 'Khalida Yousaf', 'Female', '03043641920', NULL, '22', NULL, '63', '120/80', '120', NULL, '83', NULL, '19', '9', 'Abnormal Patient', '2020-04-23 06:31:11', '2020-04-23 06:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_qualifications`
--

DROP TABLE IF EXISTS `doctor_qualifications`;
CREATE TABLE IF NOT EXISTS `doctor_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_qualifications`
--

INSERT INTO `doctor_qualifications` (`id`, `degree`, `institute`, `doctor_id`, `created_at`, `updated_at`) VALUES
(11, 'BMBS', 'Huazhong University of Science and Technology', '19', '2020-06-15 05:06:20', '2020-06-15 05:06:20'),
(10, 'MBBS', 'Xi\'an Jiaotong University', '19', '2020-06-15 05:05:47', '2020-06-15 05:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

DROP TABLE IF EXISTS `doctor_schedules`;
CREATE TABLE IF NOT EXISTS `doctor_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_clinic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `per_patient_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `doctor_clinic_id`, `day`, `date`, `start_time`, `end_time`, `open`, `per_patient_time`, `created_at`, `updated_at`) VALUES
(38, '20', '9', 'Monday', NULL, '17:00:00', '18:15:00', 1, '15', '2020-04-21 08:11:18', '2020-04-21 08:11:18'),
(39, '20', '9', 'Tuesday', NULL, '16:15:00', '18:15:00', 1, '15', '2020-04-21 08:12:06', '2020-04-21 08:12:06'),
(40, '20', '9', 'Wednesday', NULL, '16:15:00', '18:15:00', 1, '15', '2020-04-21 08:13:05', '2020-04-21 08:13:05'),
(41, '20', '9', 'Thursday', NULL, '15:15:00', '19:15:00', 1, '15', '2020-04-21 08:13:59', '2020-04-21 08:13:59'),
(49, '19', '9', 'Wednesday', NULL, '12:00:00', '14:15:00', 1, '15', '2020-06-15 04:08:01', '2020-06-15 04:08:01'),
(48, '19', '9', 'Tuesday', NULL, '10:00:00', '12:00:00', 1, '15', '2020-06-15 04:07:42', '2020-06-15 04:07:42'),
(47, '19', '9', 'Monday', NULL, '08:00:00', '12:00:00', 1, '15', '2020-06-15 04:07:05', '2020-06-15 04:07:05'),
(44, '20', '9', 'Sunday', NULL, '18:30:00', '18:30:00', 0, '15', '2020-04-21 08:17:17', '2020-04-21 08:17:17'),
(43, '20', '9', 'Saturday', NULL, '17:15:00', '18:15:00', 1, '15', '2020-04-21 08:17:01', '2020-04-21 08:17:01'),
(42, '20', '9', 'Friday', NULL, '16:15:00', '20:15:00', 1, '15', '2020-04-21 08:14:45', '2020-04-21 08:14:45'),
(50, '19', '9', 'Thursday', NULL, '10:00:00', '12:00:00', 1, '15', '2020-06-15 04:08:54', '2020-06-15 04:08:54'),
(51, '19', '9', 'Friday', NULL, '14:15:00', '15:15:00', 1, '15', '2020-06-15 04:09:13', '2020-06-15 04:09:13'),
(52, '19', '9', 'Saturday', NULL, '13:15:00', '14:15:00', 1, '30', '2020-06-15 04:09:26', '2020-06-15 04:09:26'),
(53, '19', '9', 'Sunday', NULL, '14:15:00', '14:15:00', 0, '15', '2020-06-15 04:09:42', '2020-06-15 04:38:26'),
(54, '21', '9', 'Monday', NULL, '13:30:00', '15:30:00', 1, '15', '2020-06-15 05:26:57', '2020-06-15 05:26:57'),
(55, '21', '9', 'Sunday', NULL, '15:45:00', '15:45:00', 0, '15', '2020-06-15 05:31:46', '2020-06-15 05:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_services`
--

DROP TABLE IF EXISTS `doctor_services`;
CREATE TABLE IF NOT EXISTS `doctor_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `clinic_id`, `category_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(3, 9, 3, '5000', 'Wow', '2020-04-20 06:37:37', '2020-04-20 06:37:37'),
(4, 9, 4, '1000', 'Mango Juice', '2020-04-23 11:40:37', '2020-04-23 11:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `clinic_id`, `category`, `description`, `created_at`, `updated_at`) VALUES
(3, 9, 'Electricity Bill', 'Hello', '2020-04-20 06:37:22', '2020-04-20 06:37:22'),
(4, 9, 'General Expenses', 'General', '2020-04-23 11:40:16', '2020-04-23 11:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_departments`
--

DROP TABLE IF EXISTS `hospital_departments`;
CREATE TABLE IF NOT EXISTS `hospital_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` text NOT NULL,
  `department_description` text NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_departments`
--

INSERT INTO `hospital_departments` (`id`, `department_name`, `department_description`, `clinic_id`, `updated_at`, `created_at`) VALUES
(17, 'Physiotherapy', 'Physiotherapists promote body healing, for example after surgery, through therapies such as exercise and manipulation.', 9, '2020-04-20', '2020-04-20'),
(18, 'Pain management Clinics', 'Usually run by consultant anaesthetists, these clinics aim to help treat patients with severe long-term pain that appears resistant to normal treatments.', 9, '2020-04-20', '2020-04-20'),
(15, 'Renal unit', 'Closely linked with nephrology teams at hospitals, these units provide haemodialysis treatment for patients with kidney failure. Many of these patients are on waiting lists for a kidney transplant.', 9, '2020-04-20', '2020-04-20'),
(14, 'Rheumatology', 'Specialist doctors called rheumatologists run the unit and are experts in the field of musculoskeletal disorders (bones, joints, ligaments, tendons, muscles and nerves).', 9, '2020-04-20', '2020-04-20'),
(13, 'Sexual health (genitourinary medicine)', 'This department provides a free and confidential service offering: advice, testing and treatment for all sexually transmitted infections (STIs) family planning care (including emergency contraception and free condoms) pregnancy testing and advice. It also provides care and support for other sexual and genital problems. Patients are usually able to phone the department directly for an appointment and don\'t need a referral letter from their GP.', 9, '2020-04-20', '2020-04-20'),
(12, 'Urology', 'The urology department is run by consultant urology surgeons and their surgical teams. It investigates all areas linked to kidney and bladder-based problems.', 9, '2020-04-20', '2020-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_medicines`
--

DROP TABLE IF EXISTS `hospital_medicines`;
CREATE TABLE IF NOT EXISTS `hospital_medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `store_box` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `generic_name` text NOT NULL,
  `company` text NOT NULL,
  `effects` text NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_medicines`
--

INSERT INTO `hospital_medicines` (`id`, `clinic_id`, `name`, `medicine_category_id`, `purchase_price`, `sale_price`, `store_box`, `quantity`, `generic_name`, `company`, `effects`, `expiry_date`, `created_at`, `updated_at`) VALUES
(2, 9, 'Napa', 2, 5, 10, 'Store Box1', 994, 'Paracetamol', 'Beximco', 'Effects1', '1970-01-01', '2020-04-22 17:22:46', '2020-04-22 17:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_payments`
--

DROP TABLE IF EXISTS `hospital_payments`;
CREATE TABLE IF NOT EXISTS `hospital_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `gross_total` double NOT NULL,
  `deposited_amount` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_payments`
--

INSERT INTO `hospital_payments` (`id`, `clinic_id`, `doctor_id`, `patient_id`, `sub_total`, `discount`, `gross_total`, `deposited_amount`, `created_at`, `updated_at`) VALUES
(4, 9, 20, 12, 13000, 920, 12080, 0, '2020-04-22 23:37:16', '2020-04-22 23:37:16'),
(5, 9, 18, 12, 18500, 1230, 17270, 17270, '2020-04-23 11:35:45', '2020-04-23 11:35:45'),
(6, 9, 0, 12, 6300, 0, 6300, 6300, '2020-06-15 06:26:43', '2020-06-15 06:26:43'),
(7, 9, 18, 17, 5400, 0, 5400, 5400, '2020-06-15 11:40:43', '2020-06-15 11:40:43'),
(8, 9, 18, 12, 5400, 0, 5400, 0, '2020-06-17 12:00:14', '2020-06-17 12:00:14'),
(9, 9, 0, 23, 21600, 12000, 9600, 9600, '2020-06-17 12:13:58', '2020-06-17 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_payment_items`
--

DROP TABLE IF EXISTS `hospital_payment_items`;
CREATE TABLE IF NOT EXISTS `hospital_payment_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_payment_id` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_payment_items`
--

INSERT INTO `hospital_payment_items` (`id`, `hospital_payment_id`, `procedure_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 3, 7, 5, '2020-04-22 23:27:11', '2020-04-22 23:27:11'),
(3, 3, 4, 1, '2020-04-22 23:27:11', '2020-04-22 23:27:11'),
(5, 4, 4, 1, '2020-04-22 23:37:16', '2020-04-22 23:37:16'),
(6, 4, 7, 5, '2020-04-22 23:37:16', '2020-04-22 23:37:16'),
(7, 5, 4, 3, '2020-04-23 11:35:45', '2020-04-23 11:35:45'),
(8, 5, 5, 5, '2020-04-23 11:35:45', '2020-04-23 11:35:45'),
(9, 5, 6, 10, '2020-04-23 11:35:45', '2020-04-23 11:35:45'),
(10, 6, 4, 3, '2020-06-15 06:26:43', '2020-06-15 06:26:43'),
(11, 6, 6, 3, '2020-06-15 06:26:43', '2020-06-15 06:26:43'),
(12, 7, 4, 1, '2020-06-15 11:40:43', '2020-06-15 11:40:43'),
(13, 7, 5, 1, '2020-06-15 11:40:43', '2020-06-15 11:40:43'),
(14, 7, 6, 1, '2020-06-15 11:40:43', '2020-06-15 11:40:43'),
(15, 7, 7, 1, '2020-06-15 11:40:43', '2020-06-15 11:40:43'),
(16, 8, 4, 1, '2020-06-17 12:00:14', '2020-06-17 12:00:14'),
(17, 8, 5, 1, '2020-06-17 12:00:14', '2020-06-17 12:00:14'),
(18, 8, 6, 1, '2020-06-17 12:00:14', '2020-06-17 12:00:14'),
(19, 8, 7, 1, '2020-06-17 12:00:14', '2020-06-17 12:00:14'),
(20, 9, 4, 4, '2020-06-17 12:13:58', '2020-06-17 12:13:58'),
(21, 9, 5, 4, '2020-06-17 12:13:58', '2020-06-17 12:13:58'),
(22, 9, 6, 4, '2020-06-17 12:13:58', '2020-06-17 12:13:58'),
(23, 9, 7, 4, '2020-06-17 12:13:58', '2020-06-17 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_reports`
--

DROP TABLE IF EXISTS `hospital_reports`;
CREATE TABLE IF NOT EXISTS `hospital_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_reports`
--

DROP TABLE IF EXISTS `lab_reports`;
CREATE TABLE IF NOT EXISTS `lab_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `report` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_reports`
--

INSERT INTO `lab_reports` (`id`, `clinic_id`, `patient_id`, `date`, `report`, `created_at`, `updated_at`) VALUES
(2, 9, 12, '2020-04-24', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" summary=\"Result Of Lipid Profile \">\r\n	<caption>Lipid Profile Result</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>?SL</td>\r\n			<td>? ? Test Name</td>\r\n			<td>? ?Test Result</td>\r\n			<td>? Reference Valur</td>\r\n			<td>? Comment</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?1</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?2</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?3</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?4</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Norma</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2020-04-22 23:57:42', '2020-04-22 23:57:42'),
(3, 9, 12, '2020-04-30', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" summary=\"Result Of Lipid Profile \">\r\n	<caption>Lipid Profile Result</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>SL</td>\r\n			<td>&nbsp;Test Name</td>\r\n			<td>Test Result</td>\r\n			<td>&nbsp;Reference Valur</td>\r\n			<td>&nbsp;Comment</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?1</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?2</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?3</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?4</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Norma</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2020-04-23 11:42:53', '2020-04-23 11:42:53'),
(4, 9, 17, '1970-01-01', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" summary=\"Result Of Lipid Profile \">\r\n	<caption>Lipid Profile Result</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>SL</td>\r\n			<td>&nbsp;Test Name</td>\r\n			<td>Test Result</td>\r\n			<td>&nbsp;Reference Valur</td>\r\n			<td>&nbsp;Comment</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?1</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?2</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?3</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?4</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Norma</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2020-06-15 11:42:33', '2020-06-15 11:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `lab_templates`
--

DROP TABLE IF EXISTS `lab_templates`;
CREATE TABLE IF NOT EXISTS `lab_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `template` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `clinic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_templates`
--

INSERT INTO `lab_templates` (`id`, `name`, `template`, `created_at`, `updated_at`, `clinic_id`) VALUES
(2, 'Lipid Profile Result', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" summary=\"Result Of Lipid Profile \">\r\n	<caption>Lipid Profile Result</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>SL</td>\r\n			<td>&nbsp;Test Name</td>\r\n			<td>Test Result</td>\r\n			<td>&nbsp;Reference Valur</td>\r\n			<td>&nbsp;Comment</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?1</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?2</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ? &gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?3</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ??100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Normal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>?4</td>\r\n			<td>? ?Lipid Profile?</td>\r\n			<td>? ? 100</td>\r\n			<td>? ??&gt;10 &lt; 150</td>\r\n			<td>? ?Norma</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2020-04-22 23:57:12', '2020-04-23 11:41:32', 9);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` text NOT NULL,
  `rtl` int(11) NOT NULL DEFAULT '0',
  `pre_added` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `rtl`, `pre_added`, `user_id`, `updated_at`, `created_at`) VALUES
(8, 'New', 1, 0, 31, '2020-06-15', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `language_transcripts`
--

DROP TABLE IF EXISTS `language_transcripts`;
CREATE TABLE IF NOT EXISTS `language_transcripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `english_syntax` text NOT NULL,
  `translation` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_services`
--

DROP TABLE IF EXISTS `medical_services`;
CREATE TABLE IF NOT EXISTS `medical_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_services`
--

INSERT INTO `medical_services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Andrologist', '2019-09-07 19:00:00', '2019-09-07 19:00:00'),
(2, 'Stones Of Urinary Tract', '2019-09-07 19:00:00', '2019-09-07 19:00:00'),
(3, 'Bladder Cancer', '2019-09-07 19:00:00', '2019-09-07 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_name` text,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `updated_at`, `created_at`) VALUES
(1, 'Panadol', '2019-12-01', '2019-12-01'),
(2, 'Brufin', '2019-12-01', '2019-12-01'),
(3, 'Leflox', '2019-12-03', '2019-12-03'),
(4, 'Lexobran', '2020-06-15', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_categories`
--

DROP TABLE IF EXISTS `medicine_categories`;
CREATE TABLE IF NOT EXISTS `medicine_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_categories`
--

INSERT INTO `medicine_categories` (`id`, `name`, `description`, `clinic_id`, `created_at`, `updated_at`) VALUES
(1, 'yati', 'pundir1', 7, '2020-04-20 02:01:10', '2020-04-20 02:01:20'),
(2, 'yati', 'pundir', 9, '2020-04-22 17:21:49', '2020-04-22 17:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_08_104909_create_doctors_table', 1),
(5, '2019_09_08_114545_create_specializations_table', 2),
(6, '2019_09_08_165910_create_doctor_qualifications_table', 3),
(7, '2019_09_08_173235_create_doctor_experiences_table', 4),
(8, '2019_09_08_175208_create_doctor_achievements_table', 5),
(9, '2019_09_09_071221_create_clinics_table', 6),
(10, '2019_09_09_071249_create_doctor_clinics_table', 6),
(11, '2019_09_09_073127_create_doctor_schedules_table', 7),
(12, '2019_09_09_082158_create_medical_services_table', 8),
(13, '2019_09_09_082224_create_doctor_services_table', 8),
(14, '2019_09_09_085300_create_reviews_table', 9),
(15, '2019_09_09_085910_create_patients_table', 10),
(16, '2019_09_09_152401_create_doctor_appointments_table', 11),
(17, '2019_09_09_205451_create_countries_table', 12),
(18, '2019_09_09_205923_create_cities_table', 13),
(19, '2019_11_03_083604_create_diseases_table', 14),
(20, '2019_10_12_085648_doctor_patients', 15),
(21, '2019_11_17_085505_create_specialization_diseases_table', 16),
(22, '2019_11_29_154654_create_appointment_payments_table', 17),
(23, '2019_11_29_160518_create_appointment_invoices_table', 18),
(24, '2019_11_29_163305_create_doctor_expenses_table', 19),
(25, '2019_12_01_084606_create_doctor_prescriptions_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Appointment', '2020-01-22', '2020-01-22'),
(3, 'Accountant', '2020-01-22', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` text NOT NULL,
  `patient_limit` text NOT NULL,
  `doctor_limit` text NOT NULL,
  `price` text NOT NULL,
  `online_presence` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `patient_limit`, `doctor_limit`, `price`, `online_presence`, `updated_at`, `created_at`) VALUES
(3, 'One Feature', '100', '20', '2500', 1, '2020-01-22', '2020-01-22'),
(4, 'Half Features', 'Unlimited', 'Unlimited', '3000', 1, '2020-01-22', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `package_modules`
--

DROP TABLE IF EXISTS `package_modules`;
CREATE TABLE IF NOT EXISTS `package_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_modules`
--

INSERT INTO `package_modules` (`id`, `module_id`, `package_id`, `updated_at`, `created_at`) VALUES
(7, 3, 4, '2020-01-22', '2020-01-22'),
(5, 4, 3, '2020-01-22', '2020-01-22'),
(3, 4, 4, '2020-01-22', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathername` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `gender` text COLLATE utf8mb4_unicode_ci,
  `presentaddress` text COLLATE utf8mb4_unicode_ci,
  `permanentaddress` text COLLATE utf8mb4_unicode_ci,
  `phonenum` text COLLATE utf8mb4_unicode_ci,
  `dateofbirth` date DEFAULT NULL,
  `bloodgroup` text COLLATE utf8mb4_unicode_ci,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `blood_pressure` text COLLATE utf8mb4_unicode_ci,
  `diabetes` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `fathername`, `email`, `gender`, `presentaddress`, `permanentaddress`, `phonenum`, `dateofbirth`, `bloodgroup`, `height`, `weight`, `blood_pressure`, `diabetes`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 'Umar Hello World', 'Hello World', 'umar@hwryk.com', 'Male', NULL, NULL, '030011111111', '2020-06-26', 'AB+', NULL, NULL, NULL, NULL, NULL, '2020-06-17 07:12:48', '2020-06-17 07:12:48'),
(24, 'Umar Hello World', 'Hello World', 'umar@hwryk.com', 'Male', NULL, NULL, '030011111111', '2020-06-26', 'AB+', NULL, NULL, NULL, NULL, NULL, '2020-06-17 07:13:09', '2020-06-17 07:13:09'),
(16, 'Ramla Yousaf', NULL, NULL, NULL, NULL, NULL, '0321720913', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-21 08:42:17', '2020-04-21 08:42:17'),
(22, 'Umar Hello World', 'Hello World', 'umar@hwryk.com', 'Male', NULL, NULL, '030011111111', '2020-06-26', 'AB+', NULL, NULL, NULL, NULL, NULL, '2020-06-17 07:09:25', '2020-06-17 07:09:25'),
(12, 'Khalida Yousaf', NULL, NULL, NULL, NULL, NULL, '03043641920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-21 08:33:30', '2020-04-21 08:33:30'),
(13, 'Abida Rafique', NULL, NULL, NULL, NULL, NULL, '03043641921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-21 08:40:03', '2020-04-21 08:40:03'),
(14, 'Khadim Hussain', NULL, NULL, NULL, NULL, NULL, '03043641922', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-21 08:40:52', '2020-04-21 08:40:52'),
(21, 'Usman Ghazi', NULL, NULL, NULL, NULL, NULL, '090078701', NULL, NULL, NULL, NULL, NULL, NULL, 37, '2020-06-15 05:59:35', '2020-06-15 09:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_case_managers`
--

DROP TABLE IF EXISTS `patient_case_managers`;
CREATE TABLE IF NOT EXISTS `patient_case_managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `case_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_case_managers`
--

INSERT INTO `patient_case_managers` (`id`, `clinic_id`, `patient_id`, `title`, `date`, `case_description`, `created_at`, `updated_at`) VALUES
(1, 9, 12, 'Test123', '2020-04-24', '<p>My name is Numair</p>', '2020-04-22 21:30:29', '2020-04-22 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_procedures`
--

DROP TABLE IF EXISTS `payment_procedures`;
CREATE TABLE IF NOT EXISTS `payment_procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `comission_rate` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_procedures`
--

INSERT INTO `payment_procedures` (`id`, `clinic_id`, `name`, `description`, `price`, `comission_rate`, `created_at`, `updated_at`) VALUES
(4, 9, 'Blood Bottle 200 ML (B+)', 'B+ Blood Bottle', '1000', '10', '2020-04-22 23:22:27', '2020-04-22 23:22:27'),
(5, 9, 'Blood Bottle 200 ML (B-)', 'B- Blood', '900', '5', '2020-04-22 23:22:58', '2020-04-22 23:22:58'),
(6, 9, 'Blood Bottle 200 ML (AB+)', 'AB+ Blood', '1100', '15', '2020-04-22 23:23:31', '2020-04-22 23:23:31'),
(7, 9, 'Single Bed Private (24 Hours)', 'For 24 Hours', '2400', '10', '2020-04-22 23:24:15', '2020-04-22 23:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_sales`
--

DROP TABLE IF EXISTS `pharmacy_sales`;
CREATE TABLE IF NOT EXISTS `pharmacy_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `gross_total` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_sales`
--

INSERT INTO `pharmacy_sales` (`id`, `clinic_id`, `sub_total`, `discount`, `gross_total`, `created_at`, `updated_at`) VALUES
(3, 9, 500, 45, 455, '2020-04-22 17:38:08', '2020-04-22 17:38:08'),
(4, 9, 100, 30, 70, '2020-04-23 11:55:33', '2020-04-23 11:55:33'),
(5, 9, 30, 0, 30, '2020-06-15 11:43:06', '2020-06-15 11:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_sale_medicines`
--

DROP TABLE IF EXISTS `pharmacy_sale_medicines`;
CREATE TABLE IF NOT EXISTS `pharmacy_sale_medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_sale_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_sale_medicines`
--

INSERT INTO `pharmacy_sale_medicines` (`id`, `pharmacy_sale_id`, `medicine_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 50, '2020-04-22 17:38:08', '2020-04-22 17:38:08'),
(2, 4, 2, 10, '2020-04-23 11:55:33', '2020-04-23 11:55:33'),
(3, 5, 2, 3, '2020-06-15 11:43:06', '2020-06-15 11:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicines`
--

DROP TABLE IF EXISTS `prescription_medicines`;
CREATE TABLE IF NOT EXISTS `prescription_medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) NOT NULL,
  `medicine_type` text,
  `medicine_instruction` text,
  `medicine_days` text,
  `prescription_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_medicines`
--

INSERT INTO `prescription_medicines` (`id`, `medicine_id`, `medicine_type`, `medicine_instruction`, `medicine_days`, `prescription_id`, `updated_at`, `created_at`) VALUES
(13, 2, '400mg', '1+0+0', '5', 32, '2020-06-15', '2020-06-15'),
(11, 2, '500mg', 'After Food', '1+0+1', 31, '2020-04-23', '2020-04-23'),
(12, 1, '500mg', '1+1+1', '3', 32, '2020-06-15', '2020-06-15'),
(14, 2, '500mg', '1+1+1', '7', 33, '2020-06-15', '2020-06-15'),
(15, 4, '200mg', '0+0+7', '30', 33, '2020-06-15', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tests`
--

DROP TABLE IF EXISTS `prescription_tests`;
CREATE TABLE IF NOT EXISTS `prescription_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `diagnosis_test_id` int(11) NOT NULL,
  `test_instruction` text,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_tests`
--

INSERT INTO `prescription_tests` (`id`, `prescription_id`, `diagnosis_test_id`, `test_instruction`, `updated_at`, `created_at`) VALUES
(9, 33, 5, 'Shalamar Hospital Lab, Dr. Spider Man', '2020-06-15', '2020-06-15'),
(8, 31, 4, 'Aga Khan Institute', '2020-04-23', '2020-04-23'),
(7, 27, 3, 'Referred To Salman Surgical Hospital', '2019-12-03', '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `review`, `stars`, `doctor_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(9, 'Best Doctor Ever', 'I have never such humble doctor in my life before.', '5', '9', '11', '2020-01-27 14:55:06', '2020-01-27 14:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
CREATE TABLE IF NOT EXISTS `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_urdu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name_english`, `name_urdu`, `description`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'Urologist', 'نطام اخراج کا ڈاکٹر', 'A urologist is a specialist who deals with urinary tract diseases and malfunctions in both men and women. Also, they are the ones who diagnose, treat and manage conditions affecting reproductive health in men. They can sometime perform surgeries as well such as opening urinary tract obstructions. You will find them working in various settings that include hospitals, clinics, diabetic centers, and specialized urology clinics. You will be referred to a urologist if you are diagnosed with any condition affecting kidneys, ureter, urethra, bladder, and adrenal glands. Men might also need to consult a urologist if there is any disease or condition related to penis, prostate, and testicles. Most common diseases treated by a {{gender} }urologist include UTIs, sexually transmitted diseases, and infertility in men. Here is the list of best Urologists in Lahore. Find complete details, timings, patient reviews and contact information. Book appointment or take online video consultation with the listed doctors. Call at Marham helpline: 042-32591427 to schedule your appointment.', '2019-09-07 19:00:00', '2019-09-07 19:00:00', 'urologist'),
(2, 'Dermatologist', 'امراض جلد سپیشلسٹ ڈاکٹر', 'Best Dermatologists/Skin Specialists', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'dermatologist'),
(3, 'Psychiatrist', 'ماہر نفسیات', 'Best Psychiatrists', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'psychiatrist'),
(4, 'Gastroenterologist', 'معدےکے سپیشلسٹ ڈاکٹر', 'Best Gastroenterologists', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'gastroenterologist'),
(5, 'Gynecologist', 'ماہر امراض نسواں', 'Best Gynecologists', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'gynecologist'),
(6, 'Neurologist', 'دماغ کے سپیشلسٹ ڈاکٹر', 'Best Neurologists', '2019-11-02 19:00:00', '2019-11-02 19:00:00', 'neurologist');

-- --------------------------------------------------------

--
-- Table structure for table `specialization_diseases`
--

DROP TABLE IF EXISTS `specialization_diseases`;
CREATE TABLE IF NOT EXISTS `specialization_diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `specialization_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userrole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `userrole`, `profile_picture`, `mobile`, `office_phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(38, 'Asad Zalim', 'doctor5@gmail.com', NULL, '$2y$10$2H6hA7h2UlW5m7/5rEnVdOHS.IDtUj6BugVKzk/d4Xs0hjOd/N.LS', 'doctor', NULL, '03041401469', NULL, NULL, '2020-06-17 05:49:08', '2020-06-17 05:49:08'),
(39, 'Muhammad Numair', 'numair@alia.com', NULL, '$2y$10$5uxLYE7GJB5x66UmFrd2Me5KHafEUDY49pjSHA50mG7knStAjquo2', 'doctor', NULL, '090078601', NULL, NULL, '2020-06-17 06:54:09', '2020-06-17 06:54:09'),
(37, 'Usman Ghazi', 'usman@gmail.com', NULL, '$2y$10$dz7IhEEOCJHknbWiJ1A1EeHzW7a45YM6Ejq9LhVeM7Q56gojfMPgu', 'patient', NULL, '090078701', '090078701', NULL, '2020-06-15 09:49:58', '2020-06-15 09:49:58'),
(33, 'Summen Zahid', 'doctor2@gmail.com', NULL, '$2y$10$bqHsXPnTjKBOTlE/ItIfo.csAuyt3NWbloGW67inCelYRk3sCn.sK', 'doctor', NULL, '03214448141', NULL, NULL, '2020-04-20 00:38:24', '2020-04-20 00:38:24'),
(34, 'Alia Liaqat', 'doctor3@gmail.com', NULL, '$2y$10$6KFefF1dYkBabXkUWUcE9u0TBwv4g/NjyLpWinteeOybFQI18HRbK', 'doctor', NULL, '0333444841', NULL, NULL, '2020-04-20 00:39:12', '2020-04-20 00:39:12'),
(35, 'Umar Farooq', 'doctor4@gmail.com', NULL, '$2y$10$yZFyQYotH4CuLxNoSVeZwux4WTXADNfrOW9pSaSrzbX5AOa0IkYaW', 'doctor', NULL, '03126162142', NULL, NULL, '2020-06-15 05:21:26', '2020-06-15 05:21:26'),
(13, 'Muhammad Numair', 'numair.cs@gmail.com', NULL, '$2y$10$teS5ty9F/KiFxXOheuK99uFI06e2ivP5Dm/QyJJw7VDYCB/3DQIdS', 'admin', NULL, '03041401469', '090078601', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(36, 'Saad Rahman', 'saad@gmail.com', NULL, '$2y$10$Dxz7E.DONtqa.rKGoXEiXu/Srj1mniVjUKWNZ59WZNRsR/UusJS72', 'patient', NULL, '090077601', '090077601', NULL, '2020-06-15 09:39:23', '2020-06-15 09:39:23'),
(31, 'Mayo Hospital Lahore', 'hospital2@gmail.com', NULL, '$2y$10$bVz8e9yuzKc.0Yt86rrE/OgeKBFF.8S9fiFvETdnOwbdDukxJLYv2', 'hospital', NULL, '(042) 99211129', NULL, NULL, '2020-04-19 22:43:53', '2020-04-19 22:43:53'),
(32, 'Menahal Hassan', 'doctor1@gmail.com', NULL, '$2y$10$igRmc1nNylL03EX1CR9QwO.fodr6D2VyGTDMNJY5NnayJz/CdpFTy', 'doctor', NULL, '03364411841', NULL, NULL, '2020-04-20 00:37:40', '2020-04-20 00:37:40'),
(30, 'Sheikh Zaid Medical Hospital', 'hospital1@gmail.com', NULL, '$2y$10$ijyn6T7cZ4gvo440VD8JAeKiK25C0cQeg4Oef0eEn.B17VTZICqx2', 'hospital', NULL, '03216702013', NULL, NULL, '2020-04-19 22:42:52', '2020-04-19 22:42:52'),
(40, 'Alia Alia', 'alia@hhh.com', NULL, '$2y$10$atG3u3Nnl9ClrL5DndVbvuMRoOrNwOQCCVHyIXes/H9MQOVzHmlYi', 'doctor', NULL, '030078601', NULL, NULL, '2020-06-17 06:55:29', '2020-06-17 06:55:29'),
(41, 'Alia Ali', 'alia@mmmm.com', NULL, '$2y$10$b4sSiQa8qmxQVb8jP1T8tuwyLsMmqvR83vZeR1gRgFrKlTP0OB/xe', 'doctor', NULL, '090078601', NULL, NULL, '2020-06-17 06:56:02', '2020-06-17 06:56:02'),
(42, 'Aliaaaa', 'jjj@mmm.com', NULL, '$2y$10$zTHGQua1OLyLdkfZodfyWORsqPELR20NNR0gt3UjhUvrnrhQ3jcu6', 'doctor', NULL, '99989323', NULL, NULL, '2020-06-17 06:56:40', '2020-06-17 06:56:40'),
(43, 'Aliaaaa', 'kklklkl@mmm.com', NULL, '$2y$10$.s5pB9iyNPmXriy.IUYxKuRn4MzTcmqIVgqAlKX3/Yc4JBcGyP0By', 'doctor', NULL, '99989323', NULL, NULL, '2020-06-17 06:56:53', '2020-06-17 06:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

DROP TABLE IF EXISTS `user_languages`;
CREATE TABLE IF NOT EXISTS `user_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
