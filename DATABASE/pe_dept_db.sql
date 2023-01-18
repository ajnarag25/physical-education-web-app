-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 10:57 AM
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
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `acc_status` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `email`, `image`, `status`, `acc_status`, `otp`) VALUES
(1, 'Avor John', 'Atienza', 'Narag', 'avorjohn25', '$2y$10$L99GywFdRyp5cqcbgFEIJO0CpNWSJeSB3jmYAbLLJ.j4GR0J4a2xi', 'ajnarag25@gmail.com', 'default_profile/default_pic.jpg', 'Enabled', 'VERIFIED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ball_sequence`
--

CREATE TABLE `ball_sequence` (
  `id` int(11) NOT NULL,
  `volleyball` varchar(3) NOT NULL,
  `basketball` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ball_sequence`
--

INSERT INTO `ball_sequence` (`id`, `volleyball`, `basketball`) VALUES
(1, 'vb1', 'bb1'),
(2, 'vb2', 'bb2'),
(3, 'vb3', 'bb3');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_machine_info`
--

CREATE TABLE `borrowing_machine_info` (
  `id` int(11) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `equipment` varchar(20) NOT NULL,
  `ball_id` varchar(3) NOT NULL,
  `time_borrow` varchar(30) NOT NULL,
  `date_borrow` varchar(30) NOT NULL,
  `time_return` varchar(30) NOT NULL,
  `date_return` varchar(30) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `qr` varchar(200) DEFAULT NULL,
  `sort_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `id_no` varchar(100) NOT NULL,
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

INSERT INTO `inquire` (`id`, `id_no`, `firstname`, `middlename`, `lastname`, `course`, `department`, `gender`, `teacher`, `size_t`, `size_s`, `size_j`, `email`, `image`, `status`, `note`, `date`, `sched_pay`, `sched_pickup`) VALUES
(19, 'TUPC-18-0638', 'Michael ', 'Suarez', 'Rilan', 'BET-COET', 'N/A', 'Male', 'Janlee T. Sarmiento', 'small', 'small', 'N/A', 'michaelangelo.rilan@gsfe.tupcavite.edu.ph', 'uploads/profile_pic/1672879665profile.PNG', 'UNPAID', 'Approved', '13/01/2023', '13/01/2023 15:22', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `otp_requests`
--

CREATE TABLE `otp_requests` (
  `id` int(11) NOT NULL,
  `id_no` varchar(30) NOT NULL,
  `equipment_to_borrow` varchar(20) NOT NULL,
  `otp_generate` varchar(6) NOT NULL,
  `date_time_generate` datetime DEFAULT current_timestamp(),
  `typed` varchar(1) NOT NULL,
  `actionn` varchar(20) DEFAULT NULL,
  `is_expired` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peteachers`
--

CREATE TABLE `peteachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peteachers`
--

INSERT INTO `peteachers` (`id`, `name`) VALUES
(1, 'Janlee T. Sarmiento'),
(2, 'Jester C. Eiman'),
(3, 'Micah Joyce J. Manalo'),
(4, 'try'),
(5, 'Neil Narciso');

-- --------------------------------------------------------

--
-- Table structure for table `ping_pong_stat`
--

CREATE TABLE `ping_pong_stat` (
  `id` int(11) NOT NULL,
  `is_emptyy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ping_pong_stat`
--

INSERT INTO `ping_pong_stat` (`id`, `is_emptyy`) VALUES
(1, 0);

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
  `qr_path` varchar(300) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `dt_log` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `course`, `department`, `image`, `password`, `qr`, `users`, `otp`, `id_no`, `qr_path`, `status`, `dt_log`) VALUES
(1, 'Michael', 'Suarez', 'Rilan', 'michaelangelo.rilan@gsfe.tupcavite.edu.ph', '09123456789', 'Male', 'BET-COET', 'N/A', 'uploads/profile_pic/1672879665profile.PNG', '$2y$10$kZ6Y8mJ1cDZJG638qJZ3hu11tIydjGDPng23aotro7/ITPTIoeR7i', 'TUPC-18-0638 RILAN MABET-COET-NS-C 5636', 'Student', 0, 'TUPC-18-0638', 'uploads/school_id_qr/1672879665aaa.jpg', 'VERIFIED', '2023-01-13 17:30:02'),
(2, 'Nigelle Jarred', 'Martinez', 'Salvador', 'nigellejarred.salvador@gsfe.tupcavite.edu.ph', '09988828217', 'Male', 'BET-COET', 'N/A', 'uploads/profile_pic/1673602493323206502_502994615041368_975479866190563230_n.jpg', '$2y$10$Yo.szxVfSVLoyT76Q2tto.moUwPfu4d6R5y9C.IV2Iv/4nWDHd5SK', 'TUPC-18-0412 SALVADOR N.BET-COET-C 5410', 'Student', 0, 'TUPC-18-0412', 'uploads/school_id_qr/1673602493naj.jpg', 'VERIFIED', '2023-01-13 17:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `report_equip`
--

CREATE TABLE `report_equip` (
  `id` int(11) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `equipment` varchar(20) NOT NULL,
  `ball_id` varchar(3) NOT NULL,
  `time_borrow` varchar(20) NOT NULL,
  `date_borrow` varchar(20) NOT NULL,
  `time_return` varchar(20) NOT NULL,
  `date_return` varchar(20) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `sort_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `id_no` varchar(100) NOT NULL,
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
  `resched` text NOT NULL,
  `stat_sound` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `id_no`, `email`, `name`, `dept_course`, `date`, `time`, `booking`, `purpose`, `participants`, `reason`, `status`, `resched`, `stat_sound`) VALUES
(8, 'TUPC-18-0638', 'michaelangelo.rilan@gsfe.tupcavite.edu.ph', 'Michael Suarez Rilan', 'BET-COET', '2023-01-13', '17:30', 'ConferenceRoom', 'Event', 150, 'N/A', 'ACCEPTED', 'N/A', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `sound_coordinator`
--

CREATE TABLE `sound_coordinator` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sound_coordinator`
--

INSERT INTO `sound_coordinator` (`id`, `name`, `email`, `status`) VALUES
(5, 'aj narag', 'ajnarag25@gmail.com', 'Enabled'),
(6, 'Juliet', 'juliet@gmail.com', 'Disabled');

-- --------------------------------------------------------

--
-- Table structure for table `superuser_acc`
--

CREATE TABLE `superuser_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superuser_acc`
--

INSERT INTO `superuser_acc` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin123', 'pedepartment2@gmail.com', 'physicaleducation');

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
-- Indexes for table `ball_sequence`
--
ALTER TABLE `ball_sequence`
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
-- Indexes for table `peteachers`
--
ALTER TABLE `peteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_equip`
--
ALTER TABLE `report_equip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sound_coordinator`
--
ALTER TABLE `sound_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superuser_acc`
--
ALTER TABLE `superuser_acc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ball_sequence`
--
ALTER TABLE `ball_sequence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrowing_machine_info`
--
ALTER TABLE `borrowing_machine_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `otp_requests`
--
ALTER TABLE `otp_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `peteachers`
--
ALTER TABLE `peteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_equip`
--
ALTER TABLE `report_equip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sound_coordinator`
--
ALTER TABLE `sound_coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
