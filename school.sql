-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2026 at 09:50 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `c_code` varchar(10) DEFAULT NULL,
  `c_type` varchar(30) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_student` int(11) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_code`, `c_type`, `duration`, `semester`, `description`, `max_student`, `department`, `fee`, `status`) VALUES
(6, 'Bachelor of Computer Applications', 'BCA-001', 'Undergraduate', '3', 6, 'A computer application course that provides knowledge of programming, databases, web development, software development, and information technology.', 120, 'Computer Science', 45000, 'Open'),
(9, 'Master of Computer Applications (MCA)', 'MCA-001', 'Postgraduate', '2', 4, 'An advanced computer science course focusing on software development, programming, database management, cloud computing, and modern technologies.', 80, 'Computer Science', 65000, 'Open'),
(10, 'Bachelor of Business Administration', 'BBA-001', 'Undergraduate', '3', 6, 'A management course covering business management, marketing, finance, human resources, entrepreneurship, and organizational skills.', 150, 'Management', 40000, 'Open'),
(11, 'Bachelor of Commerce', 'BCOM-001', 'Undergraduate', '3', 6, 'A commerce course covering accounting, economics, business law, taxation, finance, and business management.', 100, 'Commerce', 30000, 'Open'),
(12, 'MBA in Information Technology', 'MBA-IT-001', 'Postgraduate', '2', 4, 'A professional management program combining business administration with information technology, including IT management, ERP, business analytics, and project management.', 50, 'Information Technology', 75000, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `user_name`, `password`) VALUES
(1, 'university', 'university123');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_id` int(11) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `f_name`, `email`, `contact`, `course`) VALUES
(5, 'Aarav Patel', 'aarav.patel@gmail.com', '9876543210', '6'),
(6, 'Riya Shah', 'riya.shah@gmail.com', '9876501234', '10'),
(7, 'Krish   Mehta', 'krish.mehta@gmail.com', '9898123456', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
