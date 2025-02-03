-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2025 at 03:13 AM
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
-- Database: `mywaifulist`
--

-- --------------------------------------------------------

--
-- Table structure for table `waifu`
--

CREATE TABLE `waifu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `series` varchar(50) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waifu`
--

INSERT INTO `waifu` (`id`, `name`, `series`, `image_url`, `description`) VALUES
(3, 'Elaina', 'Re:Zero kara Hajimeru Isekai Seikatsu', 'https://i.pinimg.com/736x/6a/b5/8b/6ab58b639e782f074d519e676adc3a16.jpg', 'The main female protagonist. She is a silver-haired half-elf girl who is one of the candidates to become the next ruler in the royal election. Subaru first meets her when her insignia is stolen by Felt as she needs to possess it to be eligible to participate in the election. She introduces herself as Satella when she and Subaru met during the first timeline before introducing herself by her real name when she got her insignia back.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `waifu`
--
ALTER TABLE `waifu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `waifu`
--
ALTER TABLE `waifu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
