-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 10:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover_image`, `file`, `book_name`, `description`, `author_name`, `_date`) VALUES
(1, 'Shree Krishna_20242702150016.jpg', 'Bhagwat Geeta_20242702150016.pdf', 'Bhagwat Geeta', 'hare Krishna', 'Shree Krishna', '0000-00-00 00:00:00'),
(2, 'Akash_20242702151527.jpg', 'Death Time_20242702151527.pdf', 'Death Time', 'Death  Book', 'Akash', '0000-00-00 00:00:00'),
(3, 'Chanakya_20242702151908.jpg', 'Success By Chanakya_20242702151908.pdf', 'Success By Chanakya', 'Chanakya\r\nAncient Indian statesman and philosopher', 'Chanakya', '0000-00-00 00:00:00'),
(4, 'Vyasa_20242702152422.jpg', '', 'MahaBharat', 'maha Bharat', 'Vyasa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `type`, `message`, `name`, `date_time`) VALUES
(1, 'NewBookAdded', 'Successful', 'Bhagwat Geeta Book', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for user and 1 for admin\r\n',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users` password is 123
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `contact_number`, `gender`, `address`, `state`, `profile_picture`, `hobbies`) VALUES
(3, 0, 'Akash', 'Sharma', 'akashshar985@gmail.com', '$2y$10$ebQwTHJQdmEIrNvT2ChRGunrzTqi0kSbLsOy4pE78wPUJ20cFiepq', '07900360024', 'Male', 'Gularia', 'UP', 'Akash-20240227145325.jpg', 'reading,writing'),
(4, 1, 'Akash', 'Sharma', 'akash@gmail.com', '$2y$10$D/8qvgPqzr.mtKLqxTTaIuhCelwCOkPEnXYVclj3vNP6Zk8hkTMNi', '07900360024', 'Male', 'Gularia', 'UP', 'Akash-20240227145902.jpg', 'reading,writing,coding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
