-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 05:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `ball_sequence`
--

CREATE TABLE `ball_sequence` (
  `id` int(11) NOT NULL,
  `basketball` varchar(3) NOT NULL,
  `volleyball` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ball_sequence`
--

INSERT INTO `ball_sequence` (`id`, `basketball`, `volleyball`) VALUES
(1, 'bb1', 'vb1'),
(2, 'bb2', 'vb2'),
(3, 'bb3', 'vb3');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_machine_info`
--

CREATE TABLE `borrowing_machine_info` (
  `id` int(11) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `qr` varchar(100) NOT NULL,
  `typed` int(11) DEFAULT NULL,
  `equipment` varchar(20) NOT NULL,
  `ball_id` varchar(3) NOT NULL,
  `time_borrow` varchar(30) NOT NULL,
  `date_borrow` varchar(30) NOT NULL,
  `time_return` varchar(30) NOT NULL,
  `date_return` varchar(30) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `otp` int(11) NOT NULL,
  `id_no` varchar(20) DEFAULT NULL,
  `qr_path` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `course`, `department`, `image`, `password`, `qr`, `users`, `otp`, `id_no`, `qr_path`) VALUES
(2, 'Avor John', 'Atienza', 'Narag', 'ajnarag25@gmail.com', '09089637505', 'Male', 'N/A', 'OSA', 'uploads/16618353763135715.png', '$2y$10$IttA/.7kEBsdKLqiuTO6x.iGSlyYOHCgj3sQ.ZAlAEEdlKy56Zt.6', 'N/A', 'Teacher', 0, NULL, NULL),
(3, 'Liza', 'Soberano', 'Narag', 'liza@gmail.com', '09555498137', 'Female', 'BSCE', 'N/A', 'uploads/16618354423135715.png', '$2y$10$iarvYHCL1hS3ez7IdBlNaewiXQKHSwg57MjMlI347Rr1H7dHtzmrS', 'N/A', 'Student', 0, NULL, NULL),
(4, 'Michael', 'Suarez', 'Rilan', 'micorilan1999@gmail.com', '1999', 'Male', 'BET-COET', 'N/A', 'uploads/profile_pic/1665913812profile.PNG', '$2y$10$Hqo96R/vvpyGKkHva6d/heS7VedJA1BFu2lb3JymfYtD1b60l4lKi', 'TUPC-18-0638 RILAN MABET-COET-NS-C 5636', 'Student', 0, 'TUPC-18-0638', 'uploads/school_id_qr/16659138121662568810aaa.jpg');

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
-- Indexes for table `borrowing_machine_info`
--
ALTER TABLE `borrowing_machine_info`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `borrowing_machine_info`
--
ALTER TABLE `borrowing_machine_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
