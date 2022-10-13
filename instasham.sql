-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 09:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instasham`
--
CREATE DATABASE IF NOT EXISTS `instasham` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `instasham`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `publication_id`, `profile_id`, `comment`, `date_time`) VALUES
(14, 4, 3, 'I saw her at the zoo!', '2022-10-13 15:20:50'),
(15, 5, 1, 'I imagine that they are real.', '2022-10-13 15:21:44'),
(16, 6, 2, 'Bambi is my hero! He would carry the turtle on his back.', '2022-10-13 15:22:43'),
(17, 4, 2, 'Sooooooo cuuuuute!', '2022-10-13 15:22:58'),
(18, 4, 2, 'I would like to pet it!!!', '2022-10-13 15:24:35'),
(19, 6, 2, 'I really do believe it.', '2022-10-13 15:24:54'),
(20, 5, 2, 'I thought you were cool.', '2022-10-13 15:25:07'),
(21, 6, 1, 'I\'ve seen deer eat meat.', '2022-10-13 15:25:50'),
(22, 5, 1, 'I am cool!', '2022-10-13 15:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`, `user_id`) VALUES
(1, 'John', 'Love Jane', 'Clayton', 1),
(2, 'Jane', '', 'Goodall', 2),
(3, 'Bob', 'Le', 'Chef', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `caption` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `picture`, `caption`, `date_time`) VALUES
(4, 3, '63486506e143c.jpg', 'This giraffe is the cutest', '2022-10-13 15:20:38'),
(5, 1, '634865396ddf6.jpg', 'Baby animals are so cute! Even fake ones!', '2022-10-13 15:21:29'),
(6, 2, '6348656c027a5.jpg', 'A turtle and Bambi!', '2022-10-13 15:22:20'),
(7, 1, '634866e81b234.jpg', 'My new friends!', '2022-10-13 15:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(1, 'Tarzan', '$2y$10$sL/Zj4SWqGxcdHYgDXG7ieqdHk41UvzD525JWQz2WMtzdJbRCdOR2'),
(2, 'Jane', '$2y$10$pqESB1vH4fS75DXoRcgDGurxFeUONWtxVIr9KuQy34ahVSQGqE1au'),
(3, 'Bob', '$2y$10$KrfHMjLNzCt8tzHtcpAY9eCUYZ1yWjs3KvoeFYyM/41.GGO4nNa9e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_to_publication` (`publication_id`),
  ADD KEY `comment_to_profile` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `comment_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
