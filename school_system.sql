-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `parent_email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `grade`, `parent_email`, `subject`, `experience`, `department`, `employee_id`) VALUES
(1, 'Ankit', 'Ankit@gmail.com', '$2y$10$LC86lSS1l4Kh3XXWNMNQGORRAF8ky71FOHe07Wh7oy2d.tb9uwqyG', 'student', 'Class A', '', NULL, NULL, NULL, NULL),
(2, 'Admin', 'Admin@gmail.com', '$2y$10$4queoivWSf8hg62aylQ8KuaHMaDpdrTvWJ.L/qY9AWqr0orZ.Zoxi', 'admin', NULL, NULL, NULL, NULL, 'HOD', 'EMP-5462'),
(3, 'Teacher', 'Teacher@gmail.com', '$2y$10$FvtVwl.v267JBAIAaEzFDuMTRrLaN9n88t56jbjQL90G.bDo5Y5Yi', 'teacher', NULL, NULL, 'Computer ', 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
