-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final edusense`
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
  `assign_date` datetime NOT NULL,
  `question` text NOT NULL,
  `submition_date` datetime NOT NULL,
  `assign_marks` int(50) NOT NULL,
  `submitted_file` varchar(255) DEFAULT NULL,
  `marks` int(50) DEFAULT NULL,
  `submited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `faculty_id`, `student_id`, `subject_id`, `assign_date`, `question`, `submition_date`, `assign_marks`, `submitted_file`, `marks`, `submited_date`) VALUES
('ASCIE21', 'fac2022158', 'stud20223387', 'SCIE2', '2022-05-17 11:05:48', 'Instructions Refer the Attached file and attached documentation format for submission.    Each student should submit 3 files : - .xcf file - .jpg file  - .doc or ,pdf file of Documentation ( For this a format is attached which you have to download and rename it according to your RollNo and name and enter required details and submit) ', '2022-05-19 12:06:00', 20, '../assignment-submission/71780719808-ecomm-report.pdf', NULL, '2022-05-17 14:39:00'),
('ASCIE22', 'fac2022158', 'stud20223387', 'SCIE2', '2022-05-17 14:44:37', 'upload  the audio file', '2022-05-12 14:42:00', 10, NULL, NULL, NULL);

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
('DEMOENGL1', 'ENGL1', '../../../demo-Recordings/805129feedbackback.mp4'),
('DEMOENGL2', 'ENGL2', '../../../demo-Recordings/566951feedbackback.mp4'),
('DEMOHIST3', 'HIST3', '../../../demo-Recordings/97007feedbackback.mp4'),
('DEMOSCIE1', 'SCIE1', '../../../demo-Recordings/509242feedbackback.mp4'),
('DEMOSCIE2', 'SCIE2', '../../../demo-Recordings/947098feedbackback.mp4'),
('DEMOSCIE3', 'SCIE3', '../../../demo-Recordings/22476feedbackback.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `subject_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`subject_id`, `faculty_id`, `student_id`, `status`) VALUES
('ENGL1', 'fac20222410', 'stud20222220', 'inProgress'),
('SCIE1', 'fac2022158', 'stud20222220', 'inProgress'),
('ENGL2', NULL, 'stud20223387', 'Request Pending'),
('SCIE2', 'fac2022158', 'stud20223387', 'inProgress'),
('HIST3', 'fac20224193', 'stud2022455', 'inProgress'),
('SCIE3', 'fac2022158', 'stud20224172', 'inProgress'),
('SCIE3', NULL, 'stud20226243', 'Request Pending');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_mobile` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `profile_pic`, `faculty_name`, `faculty_email`, `faculty_mobile`, `password`, `address`, `join_date`) VALUES
('fac2022158', 'istockphoto-1073475928-612x612.jpg', 'joseph vaz', 'joseph@gmail.com', 2147483647, '$2y$10$/BdHtybJT45D3nhrrAcPK.qdlN/9T7wVIq8w5WlCJjLWC.3n.nk/q', 'curpawaddo cortalim', '2022-05-25'),
('fac20222410', 'download.jpg', 'teena dsilva ', 'teena@gmail.com', 2147483647, '$2y$10$NqrJUknoA5F6ukMKrjw4OuQwfr1NR2YRtypGIPoU0JxtCUxOLYkNC', 'quelossim cortalim', '2022-05-13'),
('fac2022349', 'istockphoto-1073475928-612x612.jpg', 'cyron fernades', 'cyron@gmail.com', 2147483647, '$2y$10$WNQMa7zezv2qJ1NjtksghOrCvGu.kdM55/lHU70S4deZCnWT0KM3K', 'usgao ponda', '2022-05-21'),
('fac20224193', 'download.jpg', 'babita kumari', 'babita@gmail.com', 2147483647, '$2y$10$J2P4rrL28XoeNQ7MZmC17e7epetgt/sbVoGt5GgyFbmvL6Ai/FA9u', 'margao', '2022-05-25'),
('fac20225356', 'download.jpg', 'Seya Souza', 'seya@mail.in', 2147483647, '$2y$10$py/bGDpU6bcz30jnj/txS.Kt8OcozbYh0h47jMVgdMxCsGRvIuP7K', 'Ftggt', '2022-05-18');

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

--
-- Dumping data for table `faculty_notes`
--

INSERT INTO `faculty_notes` (`fac_notes_id`, `faculty_id`, `student_id`, `subject_id`, `chapter_no`, `file_name`) VALUES
('FNENGL2197', 'fac2022158', 'stud20223387', 'ENGL2', 1, '../../fac_notes/913283aa.pdf');

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
('feed001', 'stud2022455', 'This course was short but very informative and very helpful for an aspiring leader like myself. It also helped me understand how to view or understand when I receive feedback. I highly recommend it!!', 3),
('feed002', 'stud20222220', 'I enjoyed the course and learned a lot from it. The content is well organised and focused on practical situations. I particularly enjoyed the bits of psychological research shared in the content.', 4),
('feed003', 'stud2022455', 'This course was short but very informative and very helpful for an aspiring leader like myself. It also helped me understand how to view or understand when I receive feedback. I highly recommend it!!', 3),
('feed004', 'stud20224172', 'The course is very to the point and has a good structure. It does not only teach you how to provide proper feedback, but also how to provide feedback to different type of employees. ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `mcq_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `marks_scored` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`mcq_id`, `student_id`, `subject_id`, `faculty_id`, `marks_scored`) VALUES
('mcq62ab101556e15', 'stud20223387', 'SCIE2', 'fac2022158', NULL);

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
(1, 'admin@mail.in', '$2y$10$B0VJJHf0SKnZYznpSUD4r.ulIHRK3chYN4xow1lBQA7rLt9f7Wuii');

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

--
-- Dumping data for table `mst_notes`
--

INSERT INTO `mst_notes` (`mst_notes_id`, `subject_id`, `chapter_no`, `filename`) VALUES
('NENGL1467', 'ENGL1', 10, '../../mst_notes/953033ds(cer).pdf'),
('NHIST3325', 'HIST3', 3, '../../mst_notes/853401aa.pdf'),
('NHIST3574', 'HIST3', 5, '../../mst_notes/391188examsectionguide103_applicationform_2022-06-08-03-22.pdf'),
('NSCIE2570', 'SCIE2', 5, '../../mst_notes/622723aa.pdf'),
('NSCIE3152', 'SCIE3', 1, '../../mst_notes/350445aa.pdf');

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
('stud202210253', '987654321', 'ananya@gmail.com', '$2y$10$1e5YHX0z02MSOAOG6s7GpuYy8pcTholCTrRm8rRtAqV2N/ovXjDZu', '../../images/stud/4835b5f9c52fd733eb26fb2c2b47bdc7.jpg', 'ananya', 'margao,goa,india 403710', 'lina', 'lina@gmail.com', '7680987756'),
('stud202213382', '7655459585', 'shelton@mail.com', '$2y$10$aCSg29xKm5llLfsmjd04.eHVCw3YRymU2WVP/PE4JQXLi.IkrMeS6', '../../images/stud/download.jpg', 'Shelton rebello', 'Pune,Maharashtra,India 435433', 'julie dias', 'julie@gmail.com', '8655459585'),
('stud20222220', '9065443222', 'seya@gmail.com', '$2y$10$YWRotje6txvSH94ZoIXR/.zk4TUffgBFl9AIkzzpRfz/lxlRW7jH.', NULL, 'seya vaz', 'margao,goa,India 435438', 'ruhi vaz', 'ruhi@gmail.com', '9876767778'),
('stud20223387', '9809989998', 'danika@gmail.com', '$2y$10$XK4H3uVbN3rtJtbZXxCqD.Ie.gS6hOZKiabV6lP117jy2zmOAqrZ.', NULL, 'danika dsilva', 'ponda,goa,India 435431', 'baiyal dsilva', 'baiyal@gmail.com', '9747575828'),
('stud20224172', '9088775566', 'blaze@gmail.com', '$2y$10$0TsD3MPKFyNqWP7UGUABv.QW/frj6FoQbKrOT3aYdCTZcGXhVN8zq', NULL, 'blaze vaz', 'panjim,goa,india 435192', 'rolika vaz', 'rolika@gmail.com', '9747477838'),
('stud2022455', '7848779923', 'uriel@gmail.com', '$2y$10$b/ccin8C7W1i6TivwzS8ZuGHyYfGf7hoeRUxl7zyJQ0Tnkd1aYqAC', NULL, 'uriel fernades', 'panjim,goa,india 435412', 'valaka fernades', 'valaka@gmail.com', '7844239922'),
('stud20226243', '987654321', 'baviya@gmail.com', '$2y$10$bY7w4tk.LfwiBE./zjGZFuQJ27j6qfaRIO/b3v1Lt280nAS5K5JFa', '../../images/stud/4835b5f9c52fd733eb26fb2c2b47bdc7.jpg', 'baviya', 'margao,goa,india 403707', 'mona', 'mona@gmail.com', '7865432189'),
('stud20228373', '987654321', 'ananya@gmail.com', '$2y$10$t/y1nP5Ga0wuVEuhSgksjuMyS77nLxp5yPIxRrHcgHXYZKg8g.m2y', '../../images/stud/4835b5f9c52fd733eb26fb2c2b47bdc7.jpg', 'ananya', 'margao,goa,india 403710', 'lina', 'lina@gmail.com', '7680987756');

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
('ENGL1', 'english', 1, NULL),
('ENGL2', 'english', 2, NULL),
('HIST3', 'history', 3, NULL),
('SCIE1', 'science', 1, NULL),
('SCIE2', 'science', 2, NULL),
('SCIE3', 'science', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `faculty_notes`
--
ALTER TABLE `faculty_notes`
  ADD PRIMARY KEY (`fac_notes_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`mcq_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_notes`
--
ALTER TABLE `mst_notes`
  ADD PRIMARY KEY (`mst_notes_id`),
  ADD KEY `subject_id` (`subject_id`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demo`
--
ALTER TABLE `demo`
  ADD CONSTRAINT `demo_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_notes`
--
ALTER TABLE `faculty_notes`
  ADD CONSTRAINT `faculty_notes_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_notes_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_notes_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcq`
--
ALTER TABLE `mcq`
  ADD CONSTRAINT `mcq_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcq_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcq_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mst_notes`
--
ALTER TABLE `mst_notes`
  ADD CONSTRAINT `mst_notes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
