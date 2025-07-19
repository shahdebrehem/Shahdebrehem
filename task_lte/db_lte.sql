-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 05:04 PM
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
-- Database: `db_lte`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_lte`
--

CREATE TABLE `data_lte` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Id` int(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_lte`
--

INSERT INTO `data_lte` (`user_name`, `password`, `Id`, `role_id`) VALUES
('qwert', '$2y$10$ksPGthhsX.Gamx1iv9hl2uzEz11WuyM8EzHXyoYMDId8NYv3hfvMm', 1, 0),
('shahd', '$2y$10$2NxWTPU.JGpdowYBJf3ykeEs6wsxzDfrkU8F7P4oDzLJAV2LAardK', 2, 0),
('qwe asd', '$2y$10$7DBj3vEwopqyH/qOlK7bYuuP2nzLi19UGMnC2VXO4MSwJBkLi4HH.', 9, 0),
('asd zxc', '$2y$10$OPGBQjuKAkKRtPvVa.nZRuv4ya5cE/JWufjkGYZ17D.Qzweh7nax.', 10, 0),
('qwer asdf', '$2y$10$0PfzwK5DblrDFm7KoZVrGeGiqTClZfrVtTsW2h1H8eVSiGlgyvukm', 11, 0),
('qwert asdfg', '$2y$10$OwzO.FkxExXSzkgXGkL6KOwt1cFFyxa2PThlm2IIM314ortSssmDi', 12, 0),
('Ali Ahmed', '$2y$10$cgu3DBNCPnhvNxxYwoBg9OvKYgDnv5L/qO94WSub39q5/XpHeld76', 13, 2),
('asdf zxcv', '$2y$10$CL98dv0PgUOaBxnW/2GJJ.5W3dOcS3a8q.tWZ4mDB/uEZAW/bjBNW', 14, 3),
('zxcv bnm', '$2y$10$/nGb.engNrQHT59SGNTKT.1mEbSngdUYR4NSmkY0YBIlQ35ShpyXq', 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tab_role`
--

CREATE TABLE `tab_role` (
  `id_role` int(100) NOT NULL,
  `name_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_role`
--

INSERT INTO `tab_role` (`id_role`, `name_role`) VALUES
(2, 'user'),
(3, 'admin'),
(4, 'viewer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lte`
--
ALTER TABLE `data_lte`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tab_role`
--
ALTER TABLE `tab_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lte`
--
ALTER TABLE `data_lte`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tab_role`
--
ALTER TABLE `tab_role`
  MODIFY `id_role` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
