-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 02:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datapenyimpanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatrans`
--

CREATE TABLE `datatrans` (
  `id` int(11) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(50) NOT NULL,
  `nm_org` varchar(50) NOT NULL,
  `tgl_klr` datetime NOT NULL,
  `stk` int(11) NOT NULL,
  `stkout` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datatrans`
--

INSERT INTO `datatrans` (`id`, `nm_brg`, `jenis_brg`, `nm_org`, `tgl_klr`, `stk`, `stkout`, `status`) VALUES
(1, 'Baterai AA', 'Elektronik', 'Joko Supritno', '2021-08-10 21:52:07', 4, 0, 'Masuk'),
(2, 'Pensil 2B', 'ATK', 'Joko Supritno', '2021-08-10 21:56:23', 6, 0, 'Keluar'),
(3, 'Penggaris', 'ATK', 'Joko Supritno', '0000-00-00 00:00:00', 3, 0, 'Masuk'),
(4, 'Penggaris', 'ATK', 'Aan sutarna', '2021-08-11 02:04:00', 2, 0, 'Masuk'),
(5, 'Baterai AA', 'ATK', 'Wiliiam subroto', '2021-08-11 02:04:00', 1, 0, 'Keluar'),
(6, 'Penghapus', 'ATK', 'Aan sutarna', '2021-08-11 02:14:00', 2, 0, 'Keluar'),
(7, 'Penghapus', 'ATK', 'Aan Sutarna', '2021-08-11 02:14:00', 2, 0, 'Masuk'),
(8, 'Baterai Aa', 'ATK', 'Aan Sutarna', '2021-08-11 02:16:00', 2, 0, 'Keluar'),
(9, 'Penghapus', 'ATK', 'Aan Sutarna', '2021-08-11 02:25:00', 0, 2, 'Keluar'),
(10, 'Penghapus', 'ATK', 'Aan Sutarna', '2021-08-11 02:25:00', 2, 0, 'Masuk'),
(11, 'Penghapus', 'ATK', 'Aan Sutarna', '2021-08-11 03:37:00', 25, 0, 'Masuk'),
(12, 'Pulpen', 'ATK', 'Joko Sutrisno', '2021-08-11 03:37:00', 52, 0, 'Masuk'),
(13, 'Pulpen', 'ATK', 'Aan Sutarna', '2021-08-11 03:38:00', 0, 12, 'Keluar'),
(14, 'Penghapus', 'ATK', 'Aan Sutarna', '2021-08-11 03:39:00', 2, 0, 'Masuk'),
(15, 'Baskom', 'Perabotan', 'Wiliiam Subroto', '2021-08-11 03:39:00', 5, 0, 'Masuk'),
(16, 'Penggaris', 'ATK', 'Wiliiam Subroto', '2021-08-11 03:40:00', 0, 5, 'Keluar'),
(17, 'Pensil 4b', 'ATK', 'Aan Sutarna', '2021-08-11 03:40:00', 5, 0, 'Masuk'),
(18, 'Stabilo', 'ATK', 'Joko Sutrisno', '2021-08-11 03:40:00', 52, 0, 'Masuk'),
(19, 'Stabilo', 'ATK', 'Wiliiam Subroto', '2021-08-11 03:40:00', 0, 15, 'Keluar'),
(20, 'Baskom', 'ATK', 'Aan Sutarna', '2021-08-11 03:41:00', 0, 1, 'Keluar'),
(21, 'Jangka', 'ATK', 'Wiliiam Subroto', '2021-08-11 05:43:00', 12, 4, 'Masuk'),
(24, 'Penggaris', 'ATK', 'Aan Sutarna', '2021-08-11 07:11:00', 3, 0, 'Masuk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatrans`
--
ALTER TABLE `datatrans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datatrans`
--
ALTER TABLE `datatrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
