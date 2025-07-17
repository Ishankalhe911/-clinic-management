-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- 
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 12:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Character set settings
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

-- Table structure for table `billing`

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `checkups`

CREATE TABLE `checkups` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `report_path` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `checkup_date` date DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `checkups`

INSERT INTO `checkups` (`id`, `patient_id`, `symptoms`, `history`, `report_path`, `date`, `diagnosis`, `checkup_date`, `doctor_name`) VALUES
(1, 1, 'Fever, cough, body ache', 'Allergic to penicillin\r\n\r\n', '', '2025-07-16 19:30:56', NULL, NULL, NULL),
(2, 1, 'sample', 'sample', '', '2025-07-16 01:07:00', NULL, NULL, NULL);

-- --------------------------------------------------------

-- Table structure for table `patients`

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `patients`

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'John Doe', 'john@example.com', '9876543210', 'Pune, MH');

-- --------------------------------------------------------

-- Table structure for table `prescriptions`

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(100) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `reports`

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `medicines`

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `medicines`

INSERT INTO `medicines` (`name`, `type`, `dosage`) VALUES
('Dolo', 'Tablet', '650mg'),
('Paracetamol', 'Tablet', '500mg'),
('Crosin', 'Tablet', '500mg'),
('Zerodol-P', 'Tablet', '100mg');

-- --------------------------------------------------------

-- Indexes

ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `checkups`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

-- AUTO_INCREMENT setup

ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `checkups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

-- Restore character set settings
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
