-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2024 at 10:14 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u749335993_ch_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `kalender`
--

CREATE TABLE `kalender` (
  `id` int(11) NOT NULL,
  `description` varchar(222) NOT NULL,
  `erinnerung` varchar(222) NOT NULL,
  `datum` varchar(50) DEFAULT NULL,
  `dattag` varchar(50) DEFAULT NULL,
  `datyear` varchar(50) DEFAULT NULL,
  `fulldate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `kalender`
--

INSERT INTO `kalender` (`id`, `description`, `erinnerung`, `datum`, `dattag`, `datyear`, `fulldate`) VALUES
(368, 'Ich habe einen Termin beim Arzt', '3 Tag', '11', '12', '2022', '2022-11-12'),
(369, 'Send Message', '2 Tag', '11', '12', '2024', '2024-11-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kalender`
--
ALTER TABLE `kalender`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalender`
--
ALTER TABLE `kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
