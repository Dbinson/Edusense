-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 09:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusense`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(20) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `aid` int(20) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` datetime DEFAULT NULL,
  `adesc` varchar(2000) NOT NULL,
  `rfilename` varchar(255) DEFAULT NULL,
  `rfile` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `assi_submit_id` int(20) NOT NULL,
  `aid` int(20) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `filename` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign_assignment`
--

CREATE TABLE `assign_assignment` (
  `assign_a_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `aid` int(20) NOT NULL,
  `sched_id` int(20) NOT NULL,
  `assig_submission_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign_mcq_paper`
--

CREATE TABLE `assign_mcq_paper` (
  `assign_mcq_paper_id` int(20) NOT NULL,
  `mcq_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `mks_scored` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign_written_paper`
--

CREATE TABLE `assign_written_paper` (
  `assign_paper_id` int(25) NOT NULL,
  `written_paper_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `mks_scored` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(20) NOT NULL,
  `board_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(20) NOT NULL,
  `subject_id` int(20) DEFAULT NULL,
  `book_image` longblob DEFAULT NULL,
  `class_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(20) NOT NULL,
  `chapter_name` varchar(50) NOT NULL,
  `chapter_number` int(10) NOT NULL,
  `chapter_file` longblob DEFAULT NULL,
  `book_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(20) NOT NULL,
  `class_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(20) NOT NULL,
  `course_name` varchar(20) DEFAULT NULL,
  `board_id` int(20) NOT NULL,
  `course_desc` text DEFAULT NULL,
  `course_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `demo_id` int(20) NOT NULL,
  `demo_date_time` timestamp NULL DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `subject_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `sched_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demo_registration`
--

CREATE TABLE `demo_registration` (
  `name` varchar(25) DEFAULT NULL,
  `subject_id` int(24) NOT NULL,
  `demo_status` text DEFAULT NULL,
  `demo_reg_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enroll_subject`
--

CREATE TABLE `enroll_subject` (
  `enroll_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `subject_id` int(20) NOT NULL,
  `exam_date_time` timestamp NULL DEFAULT NULL,
  `Exam_type_id` int(20) NOT NULL,
  `sched_id` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `Exam_type` varchar(50) NOT NULL,
  `Exam_type_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(20) NOT NULL,
  `faculty_name` varchar(20) DEFAULT NULL,
  `faculty_address` int(20) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `faculty_join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_attendance`
--

CREATE TABLE `faculty_attendance` (
  `faculty_attend_id` int(20) NOT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT 0,
  `attendee_id` int(20) NOT NULL,
  `attend_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_book_request`
--

CREATE TABLE `faculty_book_request` (
  `faculty_book_req_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `request_status` varchar(30) NOT NULL,
  `chapter_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `feedback_rating` int(11) DEFAULT NULL,
  `feedback_desc` text DEFAULT NULL,
  `student_id` int(20) NOT NULL,
  `feedback_type` varchar(20) NOT NULL,
  `subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(20) NOT NULL,
  `lecture_name` varchar(20) DEFAULT NULL,
  `subject_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  `sched_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lectures_videos`
--

CREATE TABLE `lectures_videos` (
  `lec_vid_id` int(20) NOT NULL,
  `lec_id` int(11) NOT NULL,
  `vid_file` varchar(255) NOT NULL,
  `vid_filename` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_paper`
--

CREATE TABLE `mcq_paper` (
  `mcq_id` int(25) NOT NULL,
  `exam_id` int(25) NOT NULL,
  `total_marks` int(20) DEFAULT NULL,
  `subject_id` int(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_quest`
--

CREATE TABLE `mcq_quest` (
  `mcq_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `options1` text NOT NULL,
  `options2` text NOT NULL,
  `options3` text NOT NULL,
  `mcq_quest_id` int(20) NOT NULL,
  `marks` int(20) NOT NULL,
  `solution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_solution`
--

CREATE TABLE `mcq_solution` (
  `mcq_solution_id` int(25) NOT NULL,
  `mcq_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `solution` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(20) NOT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `parent_mobile` bigint(15) DEFAULT NULL,
  `parent_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `quest_id` int(20) NOT NULL,
  `question_no` int(20) NOT NULL,
  `written_paper_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `subject_id` int(20) NOT NULL,
  `overall_rating` int(20) NOT NULL,
  `rating_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(20) NOT NULL,
  `start_date_time` timestamp NULL DEFAULT NULL,
  `end_date_time` timestamp NULL DEFAULT NULL,
  `sched_desc` text NOT NULL,
  `sched_type` varchar(20) NOT NULL,
  `sched_status` int(20) NOT NULL,
  `sched_name` varchar(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(20) NOT NULL,
  `status_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(20) NOT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `parent_id` int(20) NOT NULL,
  `student_photo` blob DEFAULT NULL,
  `student_address_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `stud_attend_id` int(20) NOT NULL,
  `attend_date_time` timestamp NULL DEFAULT NULL,
  `attendee_id` int(20) NOT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT 0,
  `class_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_book_request`
--

CREATE TABLE `student_book_request` (
  `student_book_req_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `request_status` varchar(30) NOT NULL,
  `chapter_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(20) NOT NULL,
  `subject_name` varchar(25) NOT NULL,
  `course_id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_mobile` bigint(20) DEFAULT NULL,
  `user_email` varchar(20) DEFAULT NULL,
  `role_id` int(20) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `written_paper`
--

CREATE TABLE `written_paper` (
  `exam_id` varchar(20) NOT NULL,
  `written_paper_id` int(25) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total_mks` int(25) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `written_solution`
--

CREATE TABLE `written_solution` (
  `written_solution_id` int(25) NOT NULL,
  `student_id` int(20) NOT NULL,
  `solution` blob DEFAULT NULL,
  `written_paper_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD PRIMARY KEY (`assi_submit_id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `assign_assignment`
--
ALTER TABLE `assign_assignment`
  ADD PRIMARY KEY (`assign_a_id`),
  ADD KEY `aid` (`aid`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `assig_submission_id` (`assig_submission_id`);

--
-- Indexes for table `assign_mcq_paper`
--
ALTER TABLE `assign_mcq_paper`
  ADD PRIMARY KEY (`assign_mcq_paper_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mcq_id` (`mcq_id`);

--
-- Indexes for table `assign_written_paper`
--
ALTER TABLE `assign_written_paper`
  ADD PRIMARY KEY (`assign_paper_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `written_paper_id` (`written_paper_id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `subject_id` (`class_id`),
  ADD KEY `subject_id_2` (`subject_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `courses_ibfk_1` (`board_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `demo` (`subject_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `demo_registration`
--
ALTER TABLE `demo_registration`
  ADD PRIMARY KEY (`demo_reg_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `enroll_subject`
--
ALTER TABLE `enroll_subject`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `examination_ibfk_2` (`Exam_type_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`Exam_type_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `faculty_ibfk_1` (`faculty_address`),
  ADD KEY `faculty_ibfk_2` (`user_id`);

--
-- Indexes for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  ADD PRIMARY KEY (`faculty_attend_id`),
  ADD KEY `attendance_ibfk_1` (`attendee_id`);

--
-- Indexes for table `faculty_book_request`
--
ALTER TABLE `faculty_book_request`
  ADD PRIMARY KEY (`faculty_book_req_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `lectures_videos`
--
ALTER TABLE `lectures_videos`
  ADD PRIMARY KEY (`lec_vid_id`);

--
-- Indexes for table `mcq_paper`
--
ALTER TABLE `mcq_paper`
  ADD PRIMARY KEY (`mcq_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `mcq_quest`
--
ALTER TABLE `mcq_quest`
  ADD PRIMARY KEY (`mcq_quest_id`),
  ADD KEY `mcq_id` (`mcq_id`);

--
-- Indexes for table `mcq_solution`
--
ALTER TABLE `mcq_solution`
  ADD PRIMARY KEY (`mcq_solution_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mcq_id` (`mcq_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`quest_id`),
  ADD KEY `written_paper_id` (`written_paper_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `students_ibfk_1` (`user_id`),
  ADD KEY `student_ibfk_3` (`student_address_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`stud_attend_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `attendee_id` (`attendee_id`);

--
-- Indexes for table `student_book_request`
--
ALTER TABLE `student_book_request`
  ADD PRIMARY KEY (`student_book_req_id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `subject_ibfk_1` (`course_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `written_paper`
--
ALTER TABLE `written_paper`
  ADD PRIMARY KEY (`written_paper_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `written_solution`
--
ALTER TABLE `written_solution`
  ADD PRIMARY KEY (`written_solution_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `written_paper_id` (`written_paper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `aid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  MODIFY `assi_submit_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_assignment`
--
ALTER TABLE `assign_assignment`
  MODIFY `assign_a_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_mcq_paper`
--
ALTER TABLE `assign_mcq_paper`
  MODIFY `assign_mcq_paper_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_written_paper`
--
ALTER TABLE `assign_written_paper`
  MODIFY `assign_paper_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `demo_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demo_registration`
--
ALTER TABLE `demo_registration`
  MODIFY `demo_reg_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enroll_subject`
--
ALTER TABLE `enroll_subject`
  MODIFY `enroll_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exam_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `Exam_type_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  MODIFY `faculty_attend_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_book_request`
--
ALTER TABLE `faculty_book_request`
  MODIFY `faculty_book_req_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lectures_videos`
--
ALTER TABLE `lectures_videos`
  MODIFY `lec_vid_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_paper`
--
ALTER TABLE `mcq_paper`
  MODIFY `mcq_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_quest`
--
ALTER TABLE `mcq_quest`
  MODIFY `mcq_quest_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_solution`
--
ALTER TABLE `mcq_solution`
  MODIFY `mcq_solution_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `quest_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `stud_attend_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_book_request`
--
ALTER TABLE `student_book_request`
  MODIFY `student_book_req_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `written_paper`
--
ALTER TABLE `written_paper`
  MODIFY `written_paper_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `written_solution`
--
ALTER TABLE `written_solution`
  MODIFY `written_solution_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assignment_submission_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `assignment` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_assignment`
--
ALTER TABLE `assign_assignment`
  ADD CONSTRAINT `assign_assignment_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `assignment` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_assignment_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_assignment_ibfk_3` FOREIGN KEY (`sched_id`) REFERENCES `schedule` (`sched_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_assignment_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_assignment_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_assignment_ibfk_6` FOREIGN KEY (`assig_submission_id`) REFERENCES `assignment_submission` (`assi_submit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_mcq_paper`
--
ALTER TABLE `assign_mcq_paper`
  ADD CONSTRAINT `assign_mcq_paper_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_mcq_paper_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_mcq_paper_ibfk_3` FOREIGN KEY (`mcq_id`) REFERENCES `mcq_paper` (`mcq_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_written_paper`
--
ALTER TABLE `assign_written_paper`
  ADD CONSTRAINT `assign_written_paper_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_written_paper_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_written_paper_ibfk_3` FOREIGN KEY (`written_paper_id`) REFERENCES `written_paper` (`written_paper_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `board` (`board_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demo`
--
ALTER TABLE `demo`
  ADD CONSTRAINT `demo_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `demo_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `demo_registration`
--
ALTER TABLE `demo_registration`
  ADD CONSTRAINT `demo_registration_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll_subject`
--
ALTER TABLE `enroll_subject`
  ADD CONSTRAINT `enroll_subject_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_subject_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_subject_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `examination_ibfk_2` FOREIGN KEY (`Exam_type_id`) REFERENCES `exam_type` (`Exam_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_3` FOREIGN KEY (`sched_id`) REFERENCES `schedule` (`sched_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`faculty_address`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attendee_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_book_request`
--
ALTER TABLE `faculty_book_request`
  ADD CONSTRAINT `faculty_book_request_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_book_request_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_ibfk_4` FOREIGN KEY (`sched_id`) REFERENCES `schedule` (`sched_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcq_paper`
--
ALTER TABLE `mcq_paper`
  ADD CONSTRAINT `mcq_paper_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam_type` (`Exam_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcq_paper_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcq_quest`
--
ALTER TABLE `mcq_quest`
  ADD CONSTRAINT `mcq_quest_ibfk_1` FOREIGN KEY (`mcq_id`) REFERENCES `mcq_paper` (`mcq_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcq_solution`
--
ALTER TABLE `mcq_solution`
  ADD CONSTRAINT `mcq_solution_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcq_solution_ibfk_2` FOREIGN KEY (`mcq_id`) REFERENCES `mcq_paper` (`mcq_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`written_paper_id`) REFERENCES `written_paper` (`written_paper_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`student_address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_attendance_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_attendance_ibfk_3` FOREIGN KEY (`attendee_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_book_request`
--
ALTER TABLE `student_book_request`
  ADD CONSTRAINT `student_book_request_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_book_request_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `written_paper`
--
ALTER TABLE `written_paper`
  ADD CONSTRAINT `written_paper_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `written_paper_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `examination` (`exam_id`);

--
-- Constraints for table `written_solution`
--
ALTER TABLE `written_solution`
  ADD CONSTRAINT `written_solution_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `written_solution_ibfk_2` FOREIGN KEY (`written_paper_id`) REFERENCES `written_paper` (`written_paper_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
