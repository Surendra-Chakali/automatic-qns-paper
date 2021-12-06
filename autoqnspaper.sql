-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2021 at 06:43 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoqnspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `Sr.No` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`Sr.No`, `username`, `password`) VALUES
(2, 'cse', 'cse@srit');

-- --------------------------------------------------------

--
-- Table structure for table `examsection`
--

CREATE TABLE `examsection` (
  `Sr.No` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examsection`
--

INSERT INTO `examsection` (`Sr.No`, `username`, `password`) VALUES
(2, 'srit', 'srit@123');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `question_level` varchar(255) NOT NULL,
  `cognitive_level` varchar(255) NOT NULL,
  `unit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject`, `question`, `marks`, `question_level`, `cognitive_level`, `unit`) VALUES
(2, 'mad', 'write about mad author', '10', 'medium', 'apply', '1'),
(3, 'mad', 'what is mad', '5', 'easy', 'understand', '2'),
(5, 'mad', 'write a program to print hello world', '10', 'difficult', 'remember', '1'),
(6, 'mad', 'write a program to print hello world', '10', 'difficult', 'remember', '3'),
(7, 'mad', 'write a program to hello world', '10', 'difficult', 'remember', '3'),
(8, 'mad', 'write a program to print hello world', '10', 'difficult', 'remember', '5'),
(9, 'mad', 'why mad', '5', 'easy', 'understand', '2'),
(10, 'mad', 'why mad', '5', 'easy', 'understand', '4'),
(11, 'mad', 'why need of mad', '5', 'easy', 'understand', '4'),
(12, 'mad', 'explain about mad', '10', 'easy', 'understand', '5'),
(27, 'mad', 'tell me abot your fav food', '10', 'easy', 'understand', '4'),
(28, 'mad', 'tell me your fav food', '10', 'easy', 'understand', '4'),
(37, 'wit', 'what is wit', '5', 'easy', 'understand', '1'),
(38, 'mad', 'a', '2', 'easy', 'understand', '1'),
(39, 'mad', 'b', '5', 'medium', 'apply', '2'),
(40, 'mad', 'c', '5', 'difficult', 'remember', '4');

-- --------------------------------------------------------

--
-- Table structure for table `question_papers`
--

CREATE TABLE `question_papers` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question_paper` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_papers`
--

INSERT INTO `question_papers` (`id`, `subject`, `question_paper`) VALUES
(1, 'mad', 'mad 4 2 sem paper.pdf'),
(2, 'mad', 'mad 4 2 mid.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_papers`
--
ALTER TABLE `question_papers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `question_papers`
--
ALTER TABLE `question_papers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
