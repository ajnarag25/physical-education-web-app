-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 04:05 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `image`) VALUES
(1, 'Michael', 'Rilan', 'micorilan', '$2y$10$E5cjVUiAJeKwbWem/yaN6.zEHgUZih1mL48QvV0VS7RQmn7A1naNS', 'micorilan1999@gmail.com', 'default_profile/default_pic.jpg'),
(2, 'Avor john', 'Narag', 'ajnarag25', '$2y$10$8koP1Es26gts/r5xMsXdgusX4XSXVs.EhIWz4s9OmisxFQZ6Rwkyi', 'ajnarag25@gmail.com', 'default_profile/default_pic.jpg');

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
  `date` text NOT NULL,
  `sched_pay` varchar(100) NOT NULL,
  `sched_pickup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `firstname`, `middlename`, `lastname`, `course`, `department`, `gender`, `teacher`, `size_t`, `size_s`, `size_j`, `email`, `image`, `status`, `note`, `date`, `sched_pay`, `sched_pickup`) VALUES
(2, ' Aj ', 'Atienza', 'Narag', 'N/A', 'OSA', 'Male', 'Eiman', 'small', 'medium', 'N/A', 'ajnarag25@gmail.com', 'uploads/profile_pic/Admin-Profile-PNG-Clipart.png', 'PAID', 'Approved', '10/11/2022', 'Friday 11 November 2022 - 20:43', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `otp_requests`
--

CREATE TABLE `otp_requests` (
  `id` int(11) NOT NULL,
  `id_no` varchar(30) NOT NULL,
  `equipment_to_borrow` varchar(20) NOT NULL,
  `otp_generate` varchar(5) NOT NULL,
  `date_time_generate` datetime DEFAULT current_timestamp(),
  `typed` varchar(1) NOT NULL,
  `actionn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Aj', 'Atienza', 'Narag', 'ajnarag25@gmail.com', '09089637505', 'Male', 'N/A', 'OSA', 'uploads/profile_pic/Admin-Profile-PNG-Clipart.png', '$2y$10$7JQ1r36kgY3VAGVgI0VJp.LePZ0SzEUuRaVb9R4mOzpiE.7sTp2ZG', 'N/A', 'Teacher', 0, 'TUPC-18-0717', NULL),
(3, 'Liza', 'Soberano', 'Narag', 'liza@gmail.com', '09555498137', 'Female', 'BSCE', 'N/A', 'uploads/16618354423135715.png', '$2y$10$iarvYHCL1hS3ez7IdBlNaewiXQKHSwg57MjMlI347Rr1H7dHtzmrS', 'N/A', 'Student', 0, NULL, NULL),
(4, 'Michael', 'Suarez', 'Rilan', 'micorilan1999@gmail.com', '09120282536', 'Male', 'BET-COET', 'N/A', 'uploads/profile_pic/1665913812profile.PNG', '$2y$10$j7QhsQSPcHBps8iCye9hBe7kqIW5fyibQec9YHV.FGmVKmhO6vhDO', 'TUPC-18-0638 RILAN MABET-COET-NS-C 5636', 'Student', 6366, 'TUPC-18-0638', 'uploads/school_id_qr/16659138121662568810aaa.jpg');

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
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `email`, `name`, `dept_course`, `date`, `time`, `booking`, `purpose`, `participants`, `reason`, `status`, `resched`) VALUES
(1, 'ajnarag25@gmail.com', 'Aj Atienza Narag', 'OSA', '2022-11-11', '08:30', 'AVR & GYM', 'Event', 15, 'N/A', 'PENDING', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `v_code`
--

CREATE TABLE `v_code` (
  `id` int(11) NOT NULL,
  `verif_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_code`
--

INSERT INTO `v_code` (`id`, `verif_code`) VALUES
(1, 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `otp_requests`
--
ALTER TABLE `otp_requests`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrowing_machine_info`
--
ALTER TABLE `borrowing_machine_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otp_requests`
--
ALTER TABLE `otp_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
