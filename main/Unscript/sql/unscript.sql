-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 09:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_form`
--

CREATE TABLE `client_form` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client_form`
--

INSERT INTO `client_form` (`id`, `name`, `email`, `password`, `location`, `user_type`) VALUES
(1, 'Sharvin', 'abc1@gmail', '827ccb0eea8a706c4c34a16891f84e7b', 'kand', 'user'),
(2, 'Sharvin', 'abc@gmail', '827ccb0eea8a706c4c34a16891f84e7b', 'bor', 'user'),
(3, 'aryan', 'abch@gmail', '731309c4bb223491a9f67eac5214fb2e', 'worli', 'user'),
(4, 'myron', 'myron@gmail', '3def184ad8f4755ff269862ea77393dd', 'bandar', 'client'),
(6, 'Sharvin', 'shar@gmail', '825f9cd5f0390bc77c1fed3c94885c87', 'Kandivali', 'admin'),
(7, 'Adi', 'adi@gmail.com', '49ae49a23f67c759bf4fc791ba842aa2', 'Ban', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_form`
--
ALTER TABLE `client_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_form`
--
ALTER TABLE `client_form`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
