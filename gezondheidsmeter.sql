-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 11:53 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gezondheidsmeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbeidsomstandigheden`
--

CREATE TABLE `arbeidsomstandigheden` (
  `werkplek` int(11) NOT NULL,
  `werkdruk` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drinken`
--

CREATE TABLE `drinken` (
  `drank_id` int(11) NOT NULL,
  `dranknaam` varchar(50) NOT NULL,
  `suiker_gram` int(11) NOT NULL,
  `alcoholpercentage` int(11) NOT NULL,
  `schijf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drugs_id` int(11) NOT NULL,
  `drugs_naam` varchar(50) NOT NULL,
  `soort_drugs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugsgebruik`
--

CREATE TABLE `drugsgebruik` (
  `drugs_id` int(11) NOT NULL,
  `aantal_milligram` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

CREATE TABLE `eten` (
  `eten_id` int(11) NOT NULL,
  `etennaam` varchar(50) NOT NULL,
  `schijf_id` int(11) NOT NULL,
  `suiker_gram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruiker_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `geboortedatum` date NOT NULL,
  `lengte` int(11) NOT NULL,
  `gewicht` int(11) NOT NULL,
  `geslacht` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_drinken`
--

CREATE TABLE `gebruiker_drinken` (
  `datum` date NOT NULL,
  `aantal_milliliter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_eten`
--

CREATE TABLE `gebruiker_eten` (
  `datum` date NOT NULL,
  `aantal_grammen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schijf`
--

CREATE TABLE `schijf` (
  `schijf_id` int(11) NOT NULL,
  `schijfnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slaapcyclus`
--

CREATE TABLE `slaapcyclus` (
  `aantal_uur` int(11) NOT NULL,
  `smiley` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `sportnaam` varchar(50) NOT NULL,
  `verbrandingswaarde` int(11) NOT NULL,
  `aantal_uur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sportplanning`
--

CREATE TABLE `sportplanning` (
  `sport_id` int(11) NOT NULL,
  `aantal_uur` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinken`
--
ALTER TABLE `drinken`
  ADD PRIMARY KEY (`drank_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drugs_id`);

--
-- Indexes for table `drugsgebruik`
--
ALTER TABLE `drugsgebruik`
  ADD PRIMARY KEY (`drugs_id`);

--
-- Indexes for table `eten`
--
ALTER TABLE `eten`
  ADD PRIMARY KEY (`eten_id`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruiker_id`);

--
-- Indexes for table `schijf`
--
ALTER TABLE `schijf`
  ADD PRIMARY KEY (`schijf_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sportplanning`
--
ALTER TABLE `sportplanning`
  ADD PRIMARY KEY (`sport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinken`
--
ALTER TABLE `drinken`
  MODIFY `drank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drugs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugsgebruik`
--
ALTER TABLE `drugsgebruik`
  MODIFY `drugs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eten`
--
ALTER TABLE `eten`
  MODIFY `eten_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schijf`
--
ALTER TABLE `schijf`
  MODIFY `schijf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sportplanning`
--
ALTER TABLE `sportplanning`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
