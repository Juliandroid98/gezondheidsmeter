-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 11:30 AM
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
-- Table structure for table `arbeid`
--

CREATE TABLE `arbeid` (
  `arbeid_ID` int(11) NOT NULL,
  `werkplek` int(20) NOT NULL,
  `werkdruk` int(20) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drinken`
--

CREATE TABLE `drinken` (
  `drinken_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL,
  `alcohol` varchar(20) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drugs_ID` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `soort` varchar(40) NOT NULL,
  `hoeveelheid` double(4,2) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

CREATE TABLE `eten` (
  `eten_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eten`
--

INSERT INTO `eten` (`eten_ID`, `naam`, `kcal`, `sugar`, `schijf_ID`, `datum`) VALUES
(3, 'zibbi', 13, 0.00, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruiker_ID` int(11) NOT NULL,
  `gebruiker` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `gewicht` double(3,2) NOT NULL,
  `lengte` double(3,2) NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` varchar(5) NOT NULL,
  `geactiveerd` tinyint(1) NOT NULL,
  `activeer_id` varchar(13) NOT NULL,
  `ww_vergeet_id` varchar(13) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`gebruiker_ID`, `gebruiker`, `email`, `wachtwoord`, `gewicht`, `lengte`, `geboortedatum`, `geslacht`, `geactiveerd`, `activeer_id`, `ww_vergeet_id`, `is_admin`) VALUES
(1, 'Henk', '', '', 9.90, 9.99, '2004-06-09', 'dunno', 0, '', '', 0),
(2, 'miquel', 'miquelalessandro@gmail.com', '$2y$10$oDKaVNdwV4OjiOKM.SyPC.kOailffgTBkHWQ/UX0rUSdWUFVUk61e', 9.99, 9.99, '2001-04-24', 'male', 1, '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drinks`
--

CREATE TABLE `koppel_user_drinks` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `drinks_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_drinks`
--

INSERT INTO `koppel_user_drinks` (`ID`, `user_ID`, `drinks_ID`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 1, 7),
(4, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drugs`
--

CREATE TABLE `koppel_user_drugs` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `drug_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_eten`
--

CREATE TABLE `koppel_user_eten` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `eten_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_eten`
--

INSERT INTO `koppel_user_eten` (`ID`, `user_ID`, `eten_ID`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_sport`
--

CREATE TABLE `koppel_user_sport` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `sport_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `melding`
--

CREATE TABLE `melding` (
  `melding_ID` int(11) NOT NULL,
  `melding` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schijf`
--

CREATE TABLE `schijf` (
  `schijf_ID` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slaap`
--

CREATE TABLE `slaap` (
  `slaap_ID` int(11) NOT NULL,
  `uren` int(20) NOT NULL,
  `beoordeling` varchar(50) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `verbranding` varchar(20) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arbeid`
--
ALTER TABLE `arbeid`
  ADD PRIMARY KEY (`arbeid_ID`);

--
-- Indexes for table `drinken`
--
ALTER TABLE `drinken`
  ADD PRIMARY KEY (`drinken_ID`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drugs_ID`);

--
-- Indexes for table `eten`
--
ALTER TABLE `eten`
  ADD PRIMARY KEY (`eten_ID`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruiker_ID`);

--
-- Indexes for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID_user_ID` (`user_ID`);

--
-- Indexes for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `drugs_ID_drugs_ID` (`drug_ID`),
  ADD KEY `drugs_user_ID_user_ID` (`user_ID`);

--
-- Indexes for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eten_user_ID_user_ID` (`user_ID`),
  ADD KEY `eten_eten_ID_food_ID` (`eten_ID`);

--
-- Indexes for table `koppel_user_sport`
--
ALTER TABLE `koppel_user_sport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `melding`
--
ALTER TABLE `melding`
  ADD PRIMARY KEY (`melding_ID`);

--
-- Indexes for table `schijf`
--
ALTER TABLE `schijf`
  ADD PRIMARY KEY (`schijf_ID`);

--
-- Indexes for table `slaap`
--
ALTER TABLE `slaap`
  ADD PRIMARY KEY (`slaap_ID`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arbeid`
--
ALTER TABLE `arbeid`
  MODIFY `arbeid_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drinken`
--
ALTER TABLE `drinken`
  MODIFY `drinken_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drugs_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eten`
--
ALTER TABLE `eten`
  MODIFY `eten_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `koppel_user_sport`
--
ALTER TABLE `koppel_user_sport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `melding`
--
ALTER TABLE `melding`
  MODIFY `melding_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schijf`
--
ALTER TABLE `schijf`
  MODIFY `schijf_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slaap`
--
ALTER TABLE `slaap`
  MODIFY `slaap_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD CONSTRAINT `user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD CONSTRAINT `drugs_ID_drugs_ID` FOREIGN KEY (`drug_ID`) REFERENCES `drugs` (`drugs_ID`),
  ADD CONSTRAINT `drugs_user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD CONSTRAINT `eten_eten_ID_food_ID` FOREIGN KEY (`eten_ID`) REFERENCES `eten` (`eten_ID`),
  ADD CONSTRAINT `eten_user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
