-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 11:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turisticka_agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `aranzmani`
--

CREATE TABLE `aranzmani` (
  `id_aranzmana` int(11) NOT NULL,
  `mesto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datum_polaska` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datum_povratka` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cena_u_evrima` int(11) NOT NULL,
  `nacin_prevoza` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tip_smestaja` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_drzave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aranzmani`
--

INSERT INTO `aranzmani` (`id_aranzmana`, `mesto`, `datum_polaska`, `datum_povratka`, `cena_u_evrima`, `nacin_prevoza`, `tip_smestaja`, `id_drzave`) VALUES
(1, 'Istanbul', '24.05.2022.', '29.05.2022.', 105, 'autobus', 'hotel 3*', 3),
(2, 'Rim', '20.05.2022.', '25.05.2022.', 189, 'autobus', 'hotel 3*', 4),
(3, 'Budimpesta', '27.05.2022.', '29.05.2022.', 75, 'autobus', 'hotel 3*', 8),
(4, 'Bec', '19.05.2022.', '23.05.2022.', 89, 'autobus', 'hotel 3*', 7),
(5, 'Atina', '18.10.2022.', '23.10.2022.', 129, 'autobus', 'hotel 3*', 2),
(6, 'Barselona', '29.09.2022.', '02.10.2022.', 529, 'avion', 'hotel 3*', 5);

-- --------------------------------------------------------

--
-- Table structure for table `drzave`
--

CREATE TABLE `drzave` (
  `id_drzave` int(11) NOT NULL,
  `naziv_drzave` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzave`
--

INSERT INTO `drzave` (`id_drzave`, `naziv_drzave`) VALUES
(1, 'Crna Gora'),
(2, 'Grcka'),
(3, 'Turska'),
(4, 'Italija'),
(5, 'Spanija'),
(6, 'Francuska'),
(7, 'Austrija'),
(8, 'Madjarska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aranzmani`
--
ALTER TABLE `aranzmani`
  ADD PRIMARY KEY (`id_aranzmana`),
  ADD KEY `id_drzave` (`id_drzave`);

--
-- Indexes for table `drzave`
--
ALTER TABLE `drzave`
  ADD PRIMARY KEY (`id_drzave`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aranzmani`
--
ALTER TABLE `aranzmani`
  MODIFY `id_aranzmana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aranzmani`
--
ALTER TABLE `aranzmani`
  ADD CONSTRAINT `aranzmani_ibfk_1` FOREIGN KEY (`id_drzave`) REFERENCES `drzave` (`id_drzave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
