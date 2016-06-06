-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 12:47 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lush`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `novost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `user`, `pass`, `novost`) VALUES
(100, 'amra', 'amra', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `datum` timestamp NOT NULL,
  `sadrzaj` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `user` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE `novost` (
  `id` int(11) NOT NULL,
  `kod` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `naslov` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `sadrzaj` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `datum` timestamp NOT NULL,
  `omoguceni` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `kod`, `naslov`, `sadrzaj`, `telefon`, `url`, `datum`, `omoguceni`, `komentar`) VALUES
(1, 'ba', 'frizure', 'najnovije za 2016', '+38761589777', NULL, '2016-06-01 16:23:00', '', NULL),
(2, 'ba', 'a', ' 123', '34565432', 'www.ba.ba', '2016-06-03 16:03:42', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novost` (`novost`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novost`
--
ALTER TABLE `novost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar` (`komentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `novost`
--
ALTER TABLE `novost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`novost`) REFERENCES `novost` (`id`);

--
-- Constraints for table `novost`
--
ALTER TABLE `novost`
  ADD CONSTRAINT `novost_ibfk_1` FOREIGN KEY (`komentar`) REFERENCES `komentar` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
