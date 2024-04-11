-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:24 PM
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
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_staff`
--

CREATE TABLE `login_staff` (
  `employid` varchar(30) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_staff`
--

INSERT INTO `login_staff` (`employid`, `email`, `password`) VALUES
('22481A0510', 'syam@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `login_student`
--

CREATE TABLE `login_student` (
  `rollnumber` varchar(10) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_student`
--

INSERT INTO `login_student` (`rollnumber`, `email`, `password`) VALUES
('22481A0510', 'yaswanthjk580@gmail.com', 'joker'),
('22481A0518', 'saikarthiknehru1411@gmail.com', 'bskn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_staff`
--
ALTER TABLE `login_staff`
  ADD PRIMARY KEY (`employid`);

--
-- Indexes for table `login_student`
--
ALTER TABLE `login_student`
  ADD PRIMARY KEY (`rollnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
