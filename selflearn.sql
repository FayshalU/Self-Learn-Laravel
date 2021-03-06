-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 11:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selflearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
('aa', 'Admin1', 'admin@gmail.com', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `content`) VALUES
('1', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. It keeps fluctuating at number one scale of popularity along with '),
('2', 'C is a general-purpose, high-level language that was originally developed by Dennis M. Ritchie to develop the UNIX operating system at Bell Labs. C was originally first implemented on the DEC PDP-11 computer in 1972.\r\n\r\nIn 1978, Brian Kernighan and Dennis Ritchie produced the first publicly availabl');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_info`
--

CREATE TABLE `chapter_info` (
  `chapter_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter_info`
--

INSERT INTO `chapter_info` (`chapter_id`, `name`, `course_id`, `content`, `image`) VALUES
(1, 'Home', '1', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. It keeps fluctuating at number one scale of popularity along with', '1544973185.jpg'),
(2, 'Overview', '1', 'C is a general-purpose, high-level language that was originally developed by Dennis M. Ritchie to develop the UNIX operating system at Bell Labs. C was originally first implemented on the DEC PDP-11 computer in 1972.  In 1978, Brian Kernighan and Dennis Ritchie produced the first publicly availabl', NULL),
(3, 'About', '10', 'Java is a general-purpose computer-programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers \"write once, run anywhere\", meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.', '1544973226.png'),
(5, 'About', '11', 'In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content. Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced.', NULL),
(6, 'History', '10', 'In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content. Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced.', NULL),
(9, 'edbrgb', '14', 'aaaaaaaaaaaa', '1544972818.png'),
(10, 'New', '14', 'rbgrgfb gfrb', '1544973115.jpg'),
(11, 'Iteration', '1', 'Loop', '1545024645.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `course_id`, `user_id`, `text`, `date`) VALUES
(1, '1', 'bb', 'New Comment', '2018-12-15'),
(2, '1', 'cc', 'Great Course!', '2018-12-15'),
(3, '1', 'dd', 'Thanks', '2018-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(50) NOT NULL,
  `instructor_id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `instructor_id`, `name`, `info`) VALUES
(1, 'dd', 'Programming Language 1', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. It keeps fluctuating at number one scale of popularity along with '),
(2, 'ee', 'Programming Language 2', ''),
(6, 'ff', 'Data Structure', ''),
(8, 'ee', 'Web Technologies ', ''),
(10, 'dd', 'Java Programming', 'Java is a general-purpose computer-programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers \"write once, run anywhere\", meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.'),
(11, 'dd', 'New course', 'In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content.'),
(14, 'dd', 'New course2', 'b fdb fdgn');

-- --------------------------------------------------------

--
-- Table structure for table `courses_taken`
--

CREATE TABLE `courses_taken` (
  `id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_taken`
--

INSERT INTO `courses_taken` (`id`, `course_id`, `student_id`, `status`) VALUES
(1, 1, 'bb', 'running'),
(5, 1, 'cc', 'finished'),
(6, 6, 'bb', 'running'),
(7, 10, 'cc', 'running'),
(8, 1, 'test', 'finished');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `joined` date NOT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `email`, `password`, `joined`, `image`) VALUES
('dd', 'John', 'john@outlook.com', 'dd', '2018-12-05', '1544959545.png'),
('ee', 'Instructor2', 'Instructor2@mail.com', 'ee', '2018-12-14', NULL),
('ff', 'Instructor', 'ff@some.com', 'ff', '2018-12-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` varchar(50) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `type`) VALUES
('aa', 'aa', 'admin'),
('bb', 'bb', 'student'),
('cc', 'cc', 'student'),
('dd', 'dd', 'instructor'),
('ee', 'ee', 'instructor'),
('fsl', 'ffff', 'student'),
('test', 'test', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `user_name`, `text`, `date`) VALUES
(3, 'cc', 'Student', 'I have scored 2 on Home of Programming Language 1', '2018-12-04'),
(5, 'bb', 'Adam Levine', 'I have scored 2 on Home of Programming Language 1', '2018-12-09'),
(6, 'test', 'Test', 'I have scored 2 on Home of Programming Language 1', '2018-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(50) NOT NULL,
  `chapter_id` int(50) NOT NULL,
  `question` varchar(300) NOT NULL,
  `op1` varchar(300) NOT NULL,
  `op2` varchar(300) NOT NULL,
  `op3` varchar(300) NOT NULL,
  `op4` varchar(300) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `chapter_id`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`) VALUES
(1, 1, 'Which is valid C expression?', 'int my_num = 100,000;', 'int my_num = 100000;', 'int my num = 1000;', 'int $my_num = 10000;', 'int my_num = 100000;'),
(2, 1, 'Which among the following is NOT a logical or relational operator?', '!=', '==', '||', '=', '='),
(3, 3, 'evbebvebve', 'svs', 'vsdbdfb', 'svsfd', 'svfdb', 'svs'),
(4, 11, 'djnvldsvjn', 'dknvlsd', 'kjdvnsdk', 'dbfbdf', 'fbfgnf', 'dbfbdf');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(100) NOT NULL,
  `chapter_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `score` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `chapter_id`, `student_id`, `score`) VALUES
(3, '1', 'bb', '2'),
(4, '1', 'test', '2'),
(5, '2', 'test', '0'),
(6, '11', 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `user_id` varchar(50) NOT NULL,
  `points` int(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `chapter_complete` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `joined` date NOT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `joined`, `image`) VALUES
('bb', 'Adam Levine', 'adam@gmail.com', 'bb', '2018-12-06', '1544959018.png'),
('cc', 'New Student', 'student2@gmail.com', 'cc', '2018-12-01', NULL),
('fsl', 'Faysal', 'faysal@gmail.com', 'ffff', '2018-12-15', NULL),
('test', 'Test', 'test@something.com', 'test', '2018-12-17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `chapter_info`
--
ALTER TABLE `chapter_info`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courses_taken`
--
ALTER TABLE `courses_taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter_info`
--
ALTER TABLE `chapter_info`
  MODIFY `chapter_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses_taken`
--
ALTER TABLE `courses_taken`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
