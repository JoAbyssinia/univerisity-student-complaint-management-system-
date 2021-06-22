-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 10:23 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rvuscms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `gender`, `email`, `phone`, `password`) VALUES
('Admin/1942/20', 'danel', 'kassa', 'male', 'genet.tefere@gmail.com', '0920935653', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `code` varchar(16) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` varchar(10) NOT NULL,
  `dep_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
('cs', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `gender_complaint`
--

CREATE TABLE `gender_complaint` (
  `id` int(11) NOT NULL,
  `st_id` varchar(45) DEFAULT NULL,
  `dep` varchar(45) DEFAULT NULL,
  `div` varchar(45) NOT NULL,
  `year` varchar(45) DEFAULT NULL,
  `lec_id` varchar(45) DEFAULT NULL,
  `disc` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT 'submited',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `replay` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender_complaint`
--

INSERT INTO `gender_complaint` (`id`, `st_id`, `dep`, `div`, `year`, `lec_id`, `disc`, `state`, `timestamp`, `date`, `replay`) VALUES
(0, 'rvu/123/16', 'cs', 'R', '4rh', 'endoris', 'df;df;vjs;dvj;a', 'close', '2020-08-26 23:02:28', '2020-08-07', 'sdvsdv');

-- --------------------------------------------------------

--
-- Table structure for table `grade_complaints`
--

CREATE TABLE `grade_complaints` (
  `id` int(11) NOT NULL,
  `st_id` varchar(45) DEFAULT NULL,
  `dep` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `sem` varchar(45) DEFAULT NULL,
  `div` varchar(45) DEFAULT NULL,
  `cr_code` varchar(45) DEFAULT NULL,
  `disc` varchar(100) DEFAULT NULL,
  `deep_head` varchar(45) DEFAULT '0',
  `state` varchar(45) DEFAULT 'submit',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `replay` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_complaints`
--

INSERT INTO `grade_complaints` (`id`, `st_id`, `dep`, `year`, `sem`, `div`, `cr_code`, `disc`, `deep_head`, `state`, `timestamp`, `replay`) VALUES
(2, 'rvu/123/16', 'cs', '4rh', '2nd', 'R', 'California', 'sdsdvsdv', '0', 'submit', '2020-08-26 12:46:37', NULL),
(3, 'rvu/123/16', 'cs', '4rh', '2nd', 'R', 'California', 'sdvsdvd', '1', 'submit', '2020-08-27 07:46:38', NULL),
(4, 'rvu/123/16', 'cs', '4rh', '2nd', 'R', 'Delaware', 'vsvdsv', '1', 'close', '2020-08-27 07:45:46', 'ascascacsasc');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` varchar(20) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dep` varchar(45) DEFAULT NULL,
  `rolle` varchar(20) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `fname`, `lname`, `dep`, `rolle`, `gender`, `email`, `phone`, `password`) VALUES
('lec/123', 'Yohannes', 'kassa', 'cs', 'head', 'M', 'yohanneskassa.yimam@gmail.com', '0920215487', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `year` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '123456',
  `phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `department`, `division`, `gender`, `year`, `password`, `phone`) VALUES
('Stud/2756/20', 'amanuel', 'kasa', 'cs', 'regular', 'male', '1st', '123456', '0920935653');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `gender_complaint`
--
ALTER TABLE `gender_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_complaints`
--
ALTER TABLE `grade_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade_complaints`
--
ALTER TABLE `grade_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
