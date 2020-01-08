-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 08:54 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `job_create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `job_description`, `job_create_date`, `user_id`) VALUES
(1, 'Sr.php developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 10:15:10', 1),
(2, 'Sr. android developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 10:30:00', 1),
(3, 'Back office executive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 11:15:10', 2),
(4, 'Sales manager', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 11:30:00', 2),
(5, 'Marketing manager', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 12:15:10', 3),
(6, 'Sales head', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 12:30:00', 3),
(7, 'HR executive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 13:15:10', 4),
(8, 'Accountant', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\n  when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-08-18 13:30:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_discussion`
--

CREATE TABLE `job_discussion` (
  `jd_id` int(11) NOT NULL,
  `jd_msg_from` int(11) NOT NULL,
  `jd_msg_to` int(11) NOT NULL,
  `jd_job_id` int(11) NOT NULL,
  `jd_message` text NOT NULL,
  `jd_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'user1', 'user1@12'),
(2, 'user2', 'user2@12'),
(3, 'user3', 'user3@12'),
(4, 'user4', 'user4@12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `job_discussion`
--
ALTER TABLE `job_discussion`
  ADD PRIMARY KEY (`jd_id`),
  ADD KEY `jd_msg_from` (`jd_msg_from`),
  ADD KEY `jd_msg_to` (`jd_msg_to`),
  ADD KEY `jd_job_id` (`jd_job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `job_discussion`
--
ALTER TABLE `job_discussion`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `job_discussion`
--
ALTER TABLE `job_discussion`
  ADD CONSTRAINT `job_discussion_ibfk_1` FOREIGN KEY (`jd_msg_from`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `job_discussion_ibfk_2` FOREIGN KEY (`jd_msg_to`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `job_discussion_ibfk_3` FOREIGN KEY (`jd_job_id`) REFERENCES `job` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
