-- SQL Dump for `clinic_db`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Drop existing tables if they exist

DROP TABLE IF EXISTS `billing`;
DROP TABLE IF EXISTS `checkups`;
DROP TABLE IF EXISTS `patients`;
DROP TABLE IF EXISTS `prescriptions`;
DROP TABLE IF EXISTS `reports`;
DROP TABLE IF EXISTS `medicines`;

-- --------------------------------------------------------
-- Table: billing

CREATE TABLE `billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkup_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: checkups

CREATE TABLE `checkups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `report_path` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `checkup_date` date DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `checkups` (`id`, `patient_id`, `symptoms`, `history`, `report_path`, `date`, `diagnosis`, `checkup_date`, `doctor_name`) VALUES
(1, 1, 'Fever, cough, body ache', 'Allergic to penicillin', '', '2025-07-16 19:30:56', NULL, NULL, NULL),
(2, 1, 'sample', 'sample', '', '2025-07-16 01:07:00', NULL, NULL, NULL);

-- --------------------------------------------------------
-- Table: patients

CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'John Doe', 'john@example.com', '9876543210', 'Pune, MH');

-- --------------------------------------------------------
-- Table: prescriptions

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkup_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(100) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: reports

CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkup_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: medicines

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `medicines` (`name`, `type`, `dosage`) VALUES
('Dolo', 'Tablet', '650mg'),
('Paracetamol', 'Tablet', '500mg'),
('Crosin', 'Tablet', '500mg'),
('Zerodol-P', 'Tablet', '100mg');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
