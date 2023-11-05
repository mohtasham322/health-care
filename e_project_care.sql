-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 09:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_project_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_gender` varchar(100) NOT NULL,
  `patient_city` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `status`) VALUES
(1, 'Karachi', 0),
(2, 'Islamabad', 0),
(3, 'Peshawar', 0),
(4, 'Multan', 0),
(5, 'Sukkur', 0),
(6, 'Rawalpindi', 0),
(7, 'Hyderabad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `doctor_pic` varchar(500) NOT NULL,
  `doctor_exp` int(11) NOT NULL,
  `doctor_qualification` varchar(100) NOT NULL,
  `doctor_contact` bigint(20) NOT NULL,
  `doctor_degree_pic` varchar(500) NOT NULL,
  `doctor_nic_front_pic` varchar(100) NOT NULL,
  `doctor_nic_back_pic` varchar(100) NOT NULL,
  `doctor_city` int(11) NOT NULL,
  `doctor_whatsapp` bigint(20) NOT NULL,
  `doctor_gender` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `doctor_specialization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_email`, `doctor_password`, `doctor_pic`, `doctor_exp`, `doctor_qualification`, `doctor_contact`, `doctor_degree_pic`, `doctor_nic_front_pic`, `doctor_nic_back_pic`, `doctor_city`, `doctor_whatsapp`, `doctor_gender`, `status`, `doctor_specialization`) VALUES
(12, 'Johnson ', 'johnson@gmail.com', 'johnson123 ', '../doctors_images/istockphoto-1470505351-170667a.webp', 3, '4', 3226301906, '../degree_images/gettyimages-53289036-612x612.jpg', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 4, 3226301906, 'male', 'Declined', 10),
(13, 'Aliana ', 'aliana@gmail.com', 'aliana123 ', '../doctors_images/istockphoto-1189304032-612x612.jpg', 6, '3', 3226301906, '../degree_images/doctor-of-divinity-degree.png', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 1, 3226301906, 'female', 'Accepted', 7),
(14, 'john herry ', 'harry@gmail.com', 'harry123 ', '../doctors_images/depositphotos_80150956-Confident-female-doctor-at-office-desk.jpg', 0, '2', 3226301906, '../degree_images/7783365118_ceac1b72a7_b.jpg', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 7, 3226301906, 'female', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_contact` bigint(20) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `patient_gender` varchar(100) NOT NULL,
  `patient_pic` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification_name`, `status`) VALUES
(1, 'MBBS', 1),
(2, 'BMBS', 0),
(3, 'BmedSci', 0),
(4, 'DRSH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` int(11) NOT NULL,
  `specialization_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_id`, `specialization_name`, `status`) VALUES
(1, 'General Physician 1', 0),
(2, 'Pathologist', 0),
(3, 'Psychiatrist', 0),
(4, 'Orthopaedist', 0),
(5, 'Neurologist', 0),
(6, 'Urologist', 0),
(7, 'Pediatrician', 0),
(8, 'General surgeon', 0),
(9, 'Cardiologist', 0),
(10, 'Dermatologist', 0),
(11, 'Geriatrics', 0),
(12, 'Gynaecologist', 0),
(13, 'Ophthalmologist', 0),
(14, 'Anesthesiologist', 0),
(15, 'BMBS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(1001) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `status`) VALUES
(1, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(2, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(3, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(4, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(5, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(6, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(7, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(8, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(9, 'Mohtasham', 'mmohtasham322@gmail.com', '11111111', 1),
(10, 'Mohtasham', 'mmohtasham322@gmail.com', '55555', 1),
(11, 'Mohtasham', 'mmohtasham322@gmail.com', '55555', 1),
(12, 'Mohtasham', 'mmohtasham322@gmail.com', '11111', 1),
(13, 'Mohtasham', 'mmohtasham322@gmail.com', '11111', 1),
(14, 'Mohtasham', 'mmohtasham322@gmail.com', '11111', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fk` (`doctor_id`),
  ADD KEY `gk` (`patient_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `hk` (`doctor_city`),
  ADD KEY `jk` (`doctor_specialization`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `gk` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `jk` FOREIGN KEY (`doctor_specialization`) REFERENCES `specialization` (`specialization_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
