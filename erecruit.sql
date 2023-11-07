-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 02:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erecruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `lifechangerform`
--

CREATE TABLE `lifechangerform` (
  `id` int NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `preferredArea` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `referralBy` varchar(255) DEFAULT NULL,
  `onlineAd` varchar(255) DEFAULT NULL,
  `walkIn` varchar(255) DEFAULT NULL,
  `othersRef` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `placeOfBirth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bloodType` varchar(255) DEFAULT NULL,
  `homeAddress` varchar(255) DEFAULT NULL,
  `mobileNo` varchar(255) DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `othersCitizenship` varchar(255) DEFAULT NULL,
  `naturalizationInfo` varchar(255) DEFAULT NULL,
  `maritalStatus` varchar(255) DEFAULT NULL,
  `maidenName` varchar(255) DEFAULT NULL,
  `spouseName` varchar(255) DEFAULT NULL,
  `sssNo` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lifechangerform`
--

INSERT INTO `lifechangerform` (`id`, `position`, `preferredArea`, `referral`, `referralBy`, `onlineAd`, `walkIn`, `othersRef`, `fname`, `nickname`, `birthdate`, `placeOfBirth`, `gender`, `bloodType`, `homeAddress`, `mobileNo`, `landline`, `email`, `citizenship`, `othersCitizenship`, `naturalizationInfo`, `maritalStatus`, `maidenName`, `spouseName`, `sssNo`, `tin`) VALUES
(1, 'Software Engineer', 'Manila', 'Yes', 'John Doe', 'No', 'Yes', 'Social Media', 'John Smith', 'Johnny', '1990-01-01', 'Manila', 'Male', 'A+', '123 Main St', '1234567890', '9876543210', 'john@example.com', 'Filipino', 'N/A', 'N/A', 'Single', 'N/A', 'N/A', '123456789', '987654321'),
(2, 'Agent', 'asd', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(3, 'Agent', 'Calapan', '1', 'Jandel', 'N/A', 'N/A', 'N/A', 'asas', '231', '0000-00-00', 'Laguna', 'Male', '123', 'Lumangbayan calapan City', '123', '123', 'alejandrogino950@gmail.com', '1', 'N/A', 'N/A', 'single', 'N/A', 'N/A', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(16, 'jandeleido@gmail.com', '$2y$10$IDzZDi6tx5ZA4jgu7/H2HeVAPFK/1Y5nCYr4ipSj6IvKgZuC092EK', 3),
(31, 'tipiw', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lifechangerform`
--
ALTER TABLE `lifechangerform`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
