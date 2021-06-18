-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 11:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_attendace`
--

-- --------------------------------------------------------

--
-- Table structure for table `assingment`
--

CREATE TABLE `assingment` (
  `id` int(11) NOT NULL,
  `assignment_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assingment_questions`
--

CREATE TABLE `assingment_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `mark` varchar(255) NOT NULL,
  `assingment_id` varchar(255) NOT NULL,
  `answer_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `class`, `attendance`) VALUES
(1, '1ebce8cf-bacf-696a-8551-6cc21774b98e', 'Malik', 'primary 1', '{\"monday\":[1,1],\"tuesday\":[0,1],\"wednesday\":[1,1],\"thursday\":[1],\"friday\":[1]}'),
(2, '1ebcec12-abd9-6c62-a8c0-6cc21774b98e', 'Gabriel', 'primary 1', '{\"monday\":[],\"tuesday\":[],\"wednesday\":[],\"thursday\":[],\"friday\":[]}'),
(3, '1ebcec13-43ce-6f22-8901-6cc21774b98e', 'Gabriel john', 'primary 1', '{\"monday\":[],\"tuesday\":[],\"wednesday\":[],\"thursday\":[],\"friday\":[]}'),
(4, '1ebcec48-a76d-64cc-b480-6cc21774b98e', 'Gabriel john', 'primary 2', '{\"monday\":[],\"tuesday\":[],\"wednesday\":[],\"thursday\":[],\"friday\":[]}');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teachers_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assinged_class` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teachers_id`, `name`, `email`, `assinged_class`, `password`) VALUES
(1, '1ebcead0-5bb7-6e0c-87d7-6cc21774b98e', 'Joy', 'teacher@example.com', 'primary 1', 'teacher'),
(2, '1ebcead1-9700-6788-8f09-6cc21774b98e', 'Joy', 'teacher2@example.com', 'primary 2', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assingment`
--
ALTER TABLE `assingment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assingment_questions`
--
ALTER TABLE `assingment_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assingment`
--
ALTER TABLE `assingment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assingment_questions`
--
ALTER TABLE `assingment_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
