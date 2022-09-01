-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pe_dept_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `size_t` varchar(100) NOT NULL,
  `size_s` varchar(100) NOT NULL,
  `size_j` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `firstname`, `middlename`, `lastname`, `course`, `department`, `gender`, `teacher`, `size_t`, `size_s`, `size_j`, `email`, `image`, `status`, `note`, `date`) VALUES
(1, ' Avor John ', 'Atienza', 'Narag', 'N/A', 'OSA', 'Male', 'Eiman', 'small', 'N/A', 'XXL', 'ajnarag25@gmail.com', 'uploads/16618353763135715.png', 'CANCELED', 'N/A', '01/09/2022');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `qr` text NOT NULL,
  `users` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `course`, `department`, `image`, `password`, `qr`, `users`, `otp`) VALUES
(2, 'Avor John', 'Atienza', 'Narag', 'ajnarag25@gmail.com', '09089637505', 'Male', 'N/A', 'OSA', 'uploads/16618353763135715.png', '$2y$10$IttA/.7kEBsdKLqiuTO6x.iGSlyYOHCgj3sQ.ZAlAEEdlKy56Zt.6', 'N/A', 'Teacher', 0),
(3, 'Liza', 'Soberano', 'Narag', 'liza@gmail.com', '09555498137', 'Female', 'BSCE', 'N/A', 'uploads/16618354423135715.png', '$2y$10$iarvYHCL1hS3ez7IdBlNaewiXQKHSwg57MjMlI347Rr1H7dHtzmrS', 'N/A', 'Student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept_course` varchar(100) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `booking` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `participants` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `resched` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
