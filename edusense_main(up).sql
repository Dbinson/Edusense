-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 04:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusense(main)`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `assign_date` date NOT NULL,
  `question` text NOT NULL,
  `submition_date` date NOT NULL,
  `assign_marks` int(50) NOT NULL,
  `submitted_file` varchar(255) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `demo_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `video_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`demo_id`, `subject_id`, `video_file`) VALUES
('DEMOSCIE10', 'SCIE10', '../../../demo-Recordings/626436sample-mp4-file.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `faculty_id` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_mobile` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_notes`
--

CREATE TABLE `faculty_notes` (
  `fac_notes_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `chapter_no` int(100) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `feedback_desc` text NOT NULL,
  `ratings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `student_id`, `feedback_desc`, `ratings`) VALUES
('fb12345', 'stud20220001', 'this was really good course', 4),
('feed23455', 'stud20220001', 'demo feedback', 2),
('feed45631', 'stud20220001', 'demo feedback 3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `mcq_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE `mst_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`id`, `email`, `password`) VALUES
(1, 'admin@mail.com', '$2y$10$B0VJJHf0SKnZYznpSUD4r.ulIHRK3chYN4xow1lBQA7rLt9f7Wuii');

-- --------------------------------------------------------

--
-- Table structure for table `mst_notes`
--

CREATE TABLE `mst_notes` (
  `mst_notes_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `chapter_no` int(100) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(255) NOT NULL,
  `stud_mobile` varchar(10) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `stud_name` varchar(199) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `stud_mobile`, `stud_email`, `password`, `profile_pic`, `stud_name`, `address`, `parent_name`, `parent_email`, `parent_mobile`) VALUES
('stud20220001', '987654321', 'binson@mail.com', '$2y$10$xeIrzcgdhDZXTVAk8wU5oOuKMIMgL.QCdwvXjazsC0yBuXsRx.99y', '', 'Binson', 'Nuvem Goa', 'anoymous', 'anoymous@mail.com', '7865432189');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `overall_ratings` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class`, `overall_ratings`) VALUES
('SCIE10', 'science', 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`demo_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `faculty_notes`
--
ALTER TABLE `faculty_notes`
  ADD PRIMARY KEY (`fac_notes_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_notes`
--
ALTER TABLE `mst_notes`
  ADD PRIMARY KEY (`mst_notes_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_admin`
--
ALTER TABLE `mst_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
