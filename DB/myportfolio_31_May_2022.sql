-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2022 at 10:55 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `institute` varchar(191) NOT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date NOT NULL,
  `description` longtext,
  `graduation_status` enum('0','1') NOT NULL DEFAULT '1',
  `active_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user_id`, `title`, `institute`, `starting_date`, `ending_date`, `description`, `graduation_status`, `active_status`) VALUES
(1, 1, 'SSC', 'Govt. Girl\'s High School, Dinajpur', '2002-04-01', '2007-01-01', NULL, '1', '1'),
(3, 1, 'B.Sc in CSE', 'AUST, Dhaka', '2010-01-01', '2014-12-31', NULL, '1', '1'),
(4, 1, '', '', '2022-05-31', '2022-05-31', 'Primary School', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` longtext,
  `about` longtext,
  `avatar` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phone`, `address`, `about`, `avatar`) VALUES
(1, 1, '01790222222', 'Cantonment,Dhaka', 'This is Tajrin Zerin', '1764909997.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(191) NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'site_title', 'Tajrin Zerin'),
(2, 'site_slogan', 'Joy Bangla'),
(3, 'site_logo', 'defauly.png'),
(4, 'site_author', 'Tajrin Zerin'),
(5, 'site_url', 'http://www.tajrinzerin.com'),
(6, 'site_type', 'Website'),
(7, 'site_robot', 'Follow'),
(8, 'site_app_id', ''),
(9, 'site_twitter_author', 'Tajrin Zerin'),
(10, 'site_twitter_card', 'player'),
(11, 'site_keywords', ''),
(12, 'site_description', 'This is Tajrin Zerin and I am a web developer.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `user_name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'superadmin@email.com', 'admin', '3d2172418ce305c7d16d4b05597c6a59', '2022-04-05 08:29:49', '2022-04-05 08:29:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_user_id_foreign` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
