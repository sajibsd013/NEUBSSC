-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 07:41 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18745600_neubsscdb`
--
CREATE DATABASE IF NOT EXISTS `id18745600_neubsscdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id18745600_neubsscdb`;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `CommitteeID` int(11) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`CommitteeID`, `session`) VALUES
(9, '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `CommitteeID` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `name`, `CommitteeID`, `image`, `position`) VALUES
(1, 'Md. Nasir Uddin', 9, '1.png', 'Advisor'),
(2, 'Akteruzzaman Suhed', 9, 'sued.png', 'President'),
(3, 'Sajib Sutradhar', 9, 'Picture 001.jpg', 'Vice President'),
(4, 'Md.Didarul Islam', 9, 'didarul.png ', 'General Secretary'),
(16, 'Hridoy Kumar Das', 9, 'hridoy.png', 'Assistant General Secretary'),
(17, 'Samad Ahmed ', 9, 'samad_zE3T3Tr.png', 'Organizing Secretary'),
(18, 'Nuzhat Tabassum Nishi', 9, 'nishi.png ', 'Co-Organizing Secretary'),
(19, 'Tasbir Ahmed Chowdhury', 9, 'tasbir.png ', 'Treasurer'),
(20, 'Aminul Islam', 9, 'aminul_RSmmxG2.png ', 'Joint Treasurer'),
(21, 'Shahed Ahmed', 9, 'shahed.png', 'Publicity Secretary - 1'),
(22, 'Mazed Ahmed Sami', 9, 'sami.png', 'Publicity Secretary - 2'),
(23, 'Muntakim Mubin Emon', 9, 'emon.png', 'Communication Secretary'),
(24, 'Mahid Ahmed Farhan', 9, 'mahid.png', 'Executive Member'),
(25, '\r\nAtkia Labiba\r\n', 9, 'labiba.png', 'Executive Member '),
(26, 'Nasima Akter Roksana', 9, 'nasima.png', 'Executive Member'),
(27, 'Syeda Sayma Begum', 9, 'sayma.png', 'Executive Member'),
(28, 'Meherin Akter', 9, 'mehrin.png', 'Executive Member');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `RecordID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`RecordID`, `title`, `description`, `timestand`) VALUES
(1, 'Receive our honorable Vice Chancellor', 'Receiving our honorable chancellor Professor Dr.Md. Elias Uddin Biswas', '2022-04-02 00:36:15'),
(2, 'Provide Relief Materials', 'We try to bring a little relief to the lives of the poor and helpless people around us with relief materials', '2022-04-02 00:36:15'),
(3, 'Provide Winter Cloth', 'The best way to not feel hopeless is to get up and do something. Don’t wait for good things to happen to you. If you go out and make some good things happen, you will fill the world with hope, you will fill yourself with hope', '2022-04-02 00:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `r_images`
--

CREATE TABLE `r_images` (
  `ImageID` int(11) NOT NULL,
  `RecordID` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_images`
--

INSERT INTO `r_images` (`ImageID`, `RecordID`, `image`) VALUES
(5, 3, '1.png'),
(6, 3, '2.png'),
(7, 3, '3.png'),
(8, 3, '4.png'),
(9, 2, '1.png'),
(10, 2, '2.png'),
(12, 2, '4.png'),
(13, 2, '5.png'),
(14, 2, '6.png'),
(15, 2, '7.png'),
(18, 1, 'chairman-1.png'),
(19, 1, 'chairman-2.png'),
(20, 1, 'chairman-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `last_blood_donate` date NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `user_type` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `name`, `email`, `mobile`, `password`, `birthday`, `gender`, `last_blood_donate`, `blood_group`, `address`, `user_type`) VALUES
(83, 'Sajib Sutradhar', 'sajibsd013@gmail.com', '01771147384', '$2y$10$9VhDi.1fsjuCd66MKJsyzerMMx4oGuLSlPfRpTA05VCUomE.mNGkO', '1999-01-25', 'Male', '0000-00-00', 'B+', 'Osmaninagar, Sylhet', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `web_info`
--

CREATE TABLE `web_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_info`
--

INSERT INTO `web_info` (`id`, `title`, `email`, `mobile`, `address`) VALUES
(1, 'NEUBSSC', 'neubsocialserviceclub@gmail.com', '+8801735708642', 'Sheikhghat-Kazirbazar Road, Sylhet\r\nBangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`CommitteeID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `team_ibfk_1` (`CommitteeID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`RecordID`);

--
-- Indexes for table `r_images`
--
ALTER TABLE `r_images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `RecordID` (`RecordID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `web_info`
--
ALTER TABLE `web_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `CommitteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_images`
--
ALTER TABLE `r_images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `web_info`
--
ALTER TABLE `web_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`CommitteeID`) REFERENCES `committee` (`CommitteeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_images`
--
ALTER TABLE `r_images`
  ADD CONSTRAINT `r_images_ibfk_1` FOREIGN KEY (`RecordID`) REFERENCES `records` (`RecordID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
