-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 07:55 AM
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
(4, 'Avor john', 'Atienza', 'Narag', 'avorjohn25', '$2y$10$mHQC77k3Mmo.hQSV9l7Okun7sGNZaaplfr5w9xlOItuKmKXng2HyK', 'ajnarag25@gmail.com', 'default_profile/default_pic.jpg', 'Enabled', 'VERIFIED', 111),
(5, 'Mark', 'Atienza', 'Narag', 'marky25', '$2y$10$jWvcz4PV2c0fglGVsyuofefCaOE2kbWyFcDtteua6kS0gaxUj6w/a', 'markzelon@gmail.com', 'default_profile/default_pic.jpg', 'Enabled', 'UNVERIFIED', 9996);

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

--
-- Dumping data for table `borrowing_machine_info`
--

INSERT INTO `borrowing_machine_info` (`id`, `id_no`, `equipment`, `ball_id`, `time_borrow`, `date_borrow`, `time_return`, `date_return`, `status`, `qr`, `sort_date_time`) VALUES
(16, 'TUPC-18-0182', 'volleyball', 'vb3', '12:31am', '2022-11-16', '01:42am', '2022-11-16', 'RETURNED', 'TUPC-18-0182 NAZAIR A BET-COET-NS-C5180', '2022-11-16 00:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `dept_head`
--

CREATE TABLE `dept_head` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
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
(7, 'N/A', ' Mark ', 'Atienza', 'Narag', 'N/A', 'DED', 'Male', 'Eiman', 'small', 'medium', 'N/A', 'markzelon@gmail.com', 'uploads/profile_pic/1668662653Profile-PNG-Clipart.png', 'UNPAID', 'Approved', '23/11/2022', 'Thursday 24 November 2022 - 02:05', 'N/A');

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
  `actionn` varchar(20) DEFAULT NULL,
  `is_expired` varchar(1) NOT NULL
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
  `qr_path` varchar(300) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `course`, `department`, `image`, `password`, `qr`, `users`, `otp`, `id_no`, `qr_path`, `status`) VALUES
(4, 'Michael', 'Suarez', 'Rilan', 'micorilan1999@gmail.com', '09120282536', 'Male', 'BET-COET', 'N/A', 'uploads/profile_pic/1665913812profile.PNG', '$2y$10$j7QhsQSPcHBps8iCye9hBe7kqIW5fyibQec9YHV.FGmVKmhO6vhDO', 'TUPC-18-0638 RILAN MABET-COET-NS-C 5636', 'Student', 6366, 'TUPC-18-0638', 'uploads/school_id_qr/16659138121662568810aaa.jpg', 'UNVERIFIED'),
(9, 'Mark', 'Atienza', 'Narag', 'markzelon@gmail.com', '09555497138', 'Male', 'N/A', 'DED', 'uploads/profile_pic/1668662653Profile-PNG-Clipart.png', '$2y$10$E6eWZVebi8K/IcDmVhpRMuxkzUY3dKLuFq.ZRlkNXc5apB9WDYyHG', 'N/A', 'Teacher', 0, 'N/A', 'N/A', 'UNVERIFIED');

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

--
-- Dumping data for table `report_equip`
--

INSERT INTO `report_equip` (`id`, `id_no`, `equipment`, `ball_id`, `time_borrow`, `date_borrow`, `time_return`, `date_return`, `remarks`, `status`, `admin_name`, `sort_date_time`) VALUES
(6, 'TUPC-18-0638', 'volleyball', 'vb3', 'sdaf', 'fsdf', 'fsadf', 'fsadf', 'fasdfsdf', 'resolved', 'Michael Rilan', '2022-11-13 17:22:44'),
(7, 'TUPC-18-0182', 'volleyball', 'vb3', 'sdaf', 'fsdf', 'fsadf', 'fsadf', 'hdfhdfh', 'resolved', 'Michael Rilan', '2022-11-13 17:31:23'),
(8, 'TUPC-18-0182', 'volleyball', 'vb3', '12:13am', '2022-11-15', 'N/A', 'N/A', 'jhkjhkjh', 'resolved', 'Michael Rilan', '2022-11-15 22:30:22');

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
  `resched` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin123', 'pedepartment2@gmail.com', 'admin123');

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
-- Indexes for table `dept_head`
--
ALTER TABLE `dept_head`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowing_machine_info`
--
ALTER TABLE `borrowing_machine_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dept_head`
--
ALTER TABLE `dept_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `otp_requests`
--
ALTER TABLE `otp_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report_equip`
--
ALTER TABLE `report_equip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
