-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2017 at 07:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_proker`
--

CREATE TABLE `list_proker` (
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `pj` varchar(255) NOT NULL,
  `npm_pj` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `p_penilaian` int(11) NOT NULL,
  `tahun` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_proker`
--

INSERT INTO `list_proker` (`id_proker`, `nama_proker`, `deskripsi`, `tujuan`, `pj`, `npm_pj`, `waktu`, `tempat`, `bidang`, `divisi`, `p_penilaian`, `tahun`) VALUES
(5, 'Monitoring', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lorem lorem lorem', 'ade yusup permana', '10114203', ' April 2017', 'Kampus J1 Universitas Gunadarma', 'Bidang 1', 'akademik', 0, 2016),
(6, 'qwer', 'qwe', 'qwe', 'ade yusup permana', '10114203', 'qwe', 'qwe', 'Bidang 1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `objektif`
--

CREATE TABLE `objektif` (
  `id_objektif` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objektif`
--

INSERT INTO `objektif` (`id_objektif`, `id_proker`, `pertanyaan`, `nilai`, `periode`, `stat`) VALUES
(1, 6, 'qwe', 90, '12', 1),
(2, 6, 'ewq', 80, '12', 1),
(3, 6, 'req', 100, '12', 1),
(4, 6, 'satu', 90, '1', 1),
(5, 6, 'dua', 2121, '1', 1),
(6, 6, 'tiga', 982, '1', 1),
(7, 6, 'empat', 182, '1', 1),
(8, 6, 'lima', 128, '1', 1),
(9, 5, '2', 1000, '2', 1),
(10, 5, '1', 8888, '2', 1),
(11, 5, 'asdasd', 0, '1', 0),
(12, 5, '1212', 0, '1', 0),
(13, 5, 'lol', 0, '9', 0),
(14, 5, 'lol', 0, '9', 0),
(15, 5, 'lol', 0, '9', 0),
(16, 5, 'inini', 0, '9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjektif`
--

CREATE TABLE `subjektif` (
  `id_subjektif` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjektif`
--

INSERT INTO `subjektif` (`id_subjektif`, `id_proker`, `nilai`) VALUES
(3, 5, 90),
(4, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(255) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `bidang` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `npm`, `bidang`, `username`, `hash`, `level`, `status`) VALUES
('1', '1', 4, '1', '$2y$10$07xxrdGSDtHLf1A2Id6MAe5RCngaHxE5EVMozdopJA359VkOaOqna', 3, 1),
('2', '2', 0, '2', '$2y$10$DHGqNjuyRf0.X.A2AM4VBeYS5ahmk6OD4KeWRsxvzFgfm/JdUkkAW', 3, 1),
('ade', '10901212', 4, 'ade', '$2y$10$1XEzW3yoAVLOViALYKrXROBfEtjmNrz6yuP/oPDNJaszctptEW2BO', 3, 1),
('ade yusup permana', '10114203', 1, 'adeyusupp', '$2y$10$XmldJusjLvAllRz9aBPbe.lwwuztjW9XmQl0fDfwDEDrKI.01tjWS', 3, 1),
('admin', '10114203', 1, 'admin', '$2y$10$oMiAMhnYcSZBT9uxbG4rJuzM0yRc48DVMMSZtzxowNYna30xYDqt6', 0, 1),
('mk', '12121', 0, 'mk', '$2y$10$MUe1BUo9x1fAGIUykuf9e.wqiuRlMcH2sMCKB93.gUYUtivfFQvci', 1, 1),
('permana', '10101010', 3, 'permana', '$2y$10$wsaASR7OKJtORkVVO0YUMe7AZQX489B0k4knm/TnqyLTIi5fH.xGi', 3, 1),
('pusuy', '909090', 0, 'qwer', '$2y$10$Mu7Fb5Fgcx4.LFoLsjujiO6R4zT6afTi5zT3eM2xbPimaZ6D6C7q6', 1, 1),
('sopo', '121212', 1, 'sopo', '$2y$10$9So.AKgZBouphq/5pCfefe04x5CbhcUX5q6bIHfENk5TmxIWsy4Lm', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_proker`
--
ALTER TABLE `list_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `objektif`
--
ALTER TABLE `objektif`
  ADD PRIMARY KEY (`id_objektif`);

--
-- Indexes for table `subjektif`
--
ALTER TABLE `subjektif`
  ADD PRIMARY KEY (`id_subjektif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_proker`
--
ALTER TABLE `list_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `objektif`
--
ALTER TABLE `objektif`
  MODIFY `id_objektif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subjektif`
--
ALTER TABLE `subjektif`
  MODIFY `id_subjektif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
