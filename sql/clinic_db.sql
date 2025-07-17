-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- 
-- Host: 127.0.0.1
--Generation Time: Jul 18, 2025 at 12:00 AM
-- Generation Time: Jul 16, 2025 at 07:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: clinic_db
-- Database: `clinic_db`
--

-- --------------------------------------------------------

--  Table structure for table billing
--  Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
CREATE TABLE billing (
  id int(11) NOT NULL,
  checkup_id int(11) DEFAULT NULL,
  total_amount decimal(10,2) DEFAULT NULL,
  payment_status varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `checkups`
-- Table structure for table bills
--

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

CREATE TABLE bills (
  id int(11) NOT NULL,
  checkup_id int(11) NOT NULL,
  total_amount decimal(10,2) NOT NULL,
  billing_date datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
--Dumping data for table `checkups`
-- Dumping data for table bills
--

INSERT INTO `checkups` (`id`, `patient_id`, `symptoms`, `history`, `report_path`, `date`, `diagnosis`, `checkup_date`, `doctor_name`) VALUES
INSERT INTO bills (id, checkup_id, total_amount, billing_date) VALUES
(1, 1, 40.00, '2025-07-17 14:17:19');

-- --------------------------------------------------------

--
-- Table structure for table checkups
--

CREATE TABLE checkups (
  id int(11) NOT NULL,
  patient_id int(11) DEFAULT NULL,
  symptoms text DEFAULT NULL,
  history text DEFAULT NULL,
  report_path varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  diagnosis text DEFAULT NULL,
  checkup_date date DEFAULT NULL,
  doctor_name varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table checkups
--

INSERT INTO checkups (id, patient_id, symptoms, history, report_path, date, diagnosis, checkup_date, doctor_name) VALUES
(1, 1, 'Fever, cough, body ache', 'Allergic to penicillin\r\n\r\n', '', '2025-07-16 19:30:56', NULL, NULL, NULL),
(2, 1, 'sample', 'sample', '', '2025-07-16 01:07:00', NULL, NULL, NULL);

-- --------------------------------------------------------

-- Table structure for table `patients`
-- Table structure for table medicines
--

CREATE TABLE medicines (
  id int(11) NOT NULL,
  name varchar(100) DEFAULT NULL,
  price decimal(10,2) DEFAULT NULL,
  stock int(11) DEFAULT NULL,
  medicine_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table medicines
--

INSERT INTO medicines (id, name, price, stock, medicine_id) VALUES
(1, '	Amoxicillin', 40.00, 50, 0),
(2, 'Dolo', 75.00, 75, 0),
(3, 'Paracetamol', 100.00, 100, 0),
(4, 'Crosin', 55.00, 60, 0),
(5, 'Zerodol-P', 50.00, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table patients
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
CREATE TABLE patients (
  id int(11) NOT NULL,
  name varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  address text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `patients`
-- Dumping data for table patients
--
-
INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `address`) VALUES
INSERT INTO patients (id, name, email, phone, address) VALUES
(1, 'John Doe	', 'john@example.com', '	9876543210', '	Pune, MH');

-- --------------------------------------------------------
--
-- Table structure for table `prescriptions`
-- Table structure for table prescriptions
--
-
CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(100) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL
CREATE TABLE prescriptions (
  id int(11) NOT NULL,
  checkup_id int(11) DEFAULT NULL,
  medicine_id int(11) NOT NULL,
  medicine_name varchar(100) DEFAULT NULL,
  dosage varchar(50) DEFAULT NULL,
  duration varchar(50) DEFAULT NULL,
  quantity int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table prescriptions
--

INSERT INTO prescriptions (id, checkup_id, medicine_id, medicine_name, dosage, duration, quantity) VALUES
(1, 1, 1, NULL, NULL, NULL, 1),
(2, 2, 1, NULL, NULL, NULL, 1),
(3, 1, 2, NULL, NULL, NULL, 3);

-- --------------------------------------------------------
--
-- Table structure for table `reports`
-- Table structure for table reports
--
-
CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `checkup_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
CREATE TABLE reports (
  id int(11) NOT NULL,
  checkup_id int(11) DEFAULT NULL,
  file_path varchar(255) DEFAULT NULL,
  upload_date timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--
--
--Indexes for table `billing`
-- Indexes for table bills
--
ALTER TABLE bills
  ADD PRIMARY KEY (id);

--
-- Indexes for table checkups
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);
ALTER TABLE checkups
  ADD PRIMARY KEY (id);
--
-- Indexes for table `checkups`
-- Indexes for table medicines
--
ALTER TABLE `checkups`
  ADD PRIMARY KEY (`id`);
ALTER TABLE medicines
  ADD PRIMARY KEY (id);
--
--Indexes for table `patients`
-- Indexes for table patients
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);
ALTER TABLE patients
  ADD PRIMARY KEY (id);
--
--Indexes for table `prescriptions`
-- Indexes for table prescriptions
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);
ALTER TABLE prescriptions
  ADD PRIMARY KEY (id);

--Indexes for table `reports`
-- Indexes for table reports
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);
ALTER TABLE reports
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--
--
--AUTO_INCREMENT for table `billing`
-- AUTO_INCREMENT for table bills
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE bills
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
--AUTO_INCREMENT for table `checkups`
-- AUTO_INCREMENT for table checkups
--
ALTER TABLE `checkups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE checkups
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patients`
-- AUTO_INCREMENT for table medicines
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE medicines
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
--AUTO_INCREMENT for table `prescriptions`
-- AUTO_INCREMENT for table patients
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE patients
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
--AUTO_INCREMENT for table `reports`
-- AUTO_INCREMENT for table prescriptions
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE prescriptions
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table reports
--
ALTER TABLE reports
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
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