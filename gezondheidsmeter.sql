-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 11:50 AM
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
  `gebruiker_ID` int(11) NOT NULL,
  `werkplek` int(20) NOT NULL,
  `werkdruk` int(20) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arbeid`
--

INSERT INTO `arbeid` (`arbeid_ID`, `gebruiker_ID`, `werkplek`, `werkdruk`, `datum`) VALUES
(1, 10, 6, 8, '2019-10-28'),
(2, 10, 4, 9, '2019-10-29'),
(3, 10, 8, 2, '2019-10-30'),
(4, 10, 10, 8, '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `drinken`
--

CREATE TABLE `drinken` (
  `drinken_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `suiker` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL,
  `alcohol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinken`
--

INSERT INTO `drinken` (`drinken_ID`, `naam`, `kcal`, `suiker`, `schijf_ID`, `alcohol`) VALUES
(25, 'water', 50, 1.00, 0, '10'),
(26, 'water', 10, 0.00, 0, '0'),
(27, 'cola', 115, 15.00, 0, '0'),
(28, 'bier', 200, 30.00, 0, '6'),
(29, 'water', 0, 0.00, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drugs_ID` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `soort` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drugs_ID`, `naam`, `soort`) VALUES
(1, 'testdrugs1', 'softdrugs'),
(2, 'softdrugs', '5'),
(3, 'harddrugs', '2'),
(4, 'harddrugs', '0'),
(5, '', ''),
(6, 'softdrugs', '60'),
(7, 'softdrugs', '2'),
(8, 'softdrugs', '1'),
(9, 'softdrugs', '123'),
(10, 'harddrugs', '5'),
(11, 'softdrugs', '2'),
(12, 'harddrugs', '3'),
(13, 'softdrugs', '4'),
(14, 'test321', 'soft'),
(15, 'harddrugs', '5'),
(16, 'harddrugs', '8'),
(17, 'softdrugs', '2'),
(18, 'softdrugs', '2'),
(19, 'softdrugs', '2'),
(20, 'softdrugs', '2'),
(21, 'softdrugs', '10'),
(22, 'softdrugs', '1'),
(23, '', '0'),
(24, 'softdrugs', '2'),
(25, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

CREATE TABLE `eten` (
  `eten_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eten`
--

INSERT INTO `eten` (`eten_ID`, `naam`, `kcal`, `sugar`, `schijf_ID`) VALUES
(11, 'testkoppeltabel', 123, 99.99, 0),
(12, '5', 5, 5.00, 0),
(13, '2', 2, 2.00, 0),
(14, '3', 3, 3.00, 0),
(15, '4', 4, 4.00, 0),
(16, '5', 5, 5.00, 0),
(17, '8', 8, 8.00, 0),
(18, '2', 2, 2.00, 0),
(19, '2', 2, 2.00, 0),
(20, '2', 2, 2.00, 0),
(21, '2', 2, 2.00, 0),
(22, 'brood', 150, 20.00, 0),
(23, 'aardappels', 500, 30.00, 0),
(24, 'wortels', 300, 5.00, 0),
(25, 'biefstuk met aardappels', 1100, 50.00, 0),
(26, '3 gangen diner', 1800, 70.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruiker_ID` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `gewicht` decimal(10,0) NOT NULL,
  `lengte` decimal(10,0) NOT NULL,
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

INSERT INTO `gebruiker` (`gebruiker_ID`, `gebruikersnaam`, `email`, `wachtwoord`, `gewicht`, `lengte`, `geboortedatum`, `geslacht`, `geactiveerd`, `activeer_id`, `ww_vergeet_id`, `is_admin`) VALUES
(1, 'userew', '', 'user', '10', '10', '2004-06-09', 'dunno', 0, '', '', 1),
(2, 'miquel', 'miquelalessandro@gmail.com', '$2y$10$oDKaVNdwV4OjiOKM.SyPC.kOailffgTBkHWQ/UX0rUSdWUFVUk61e', '10', '10', '2001-04-24', 'male', 1, '0', '', 1),
(3, 'user', 'u@u', '$2y$10$WzIaEfM6.MZwS9/colA4b.gGS1YbT2gvlliAeqfLwsIIzB1./cBYW', '1', '1', '2019-10-01', 'femal', 0, '5d9716af4f2e8', '', 0),
(4, 'test', 'test@mail.com', '$2y$10$99RHDbaaPE93pKBlpmSq7uH./SJeG93jE/StCVG8N1./0cFbrbad2', '10', '10', '2019-10-20', 'femal', 0, '5da59e3867aa0', '', 0),
(5, 'rens', 'rens@mail.com', '$2y$10$gi5FnzCV8kJopqJl1SbPU.pR2sdMf3Xlded9Pb5vBMjNF71fpoD5S', '10', '10', '2019-10-18', 'male', 1, '5da6c0585939a', '', 0),
(6, 'pietje', 'lol@mail.com', '$2y$10$0MtubUZFhCrXSCmp/mgmaO7iiFGlGAXN8Dn2eAz3or2FBoWoo3PRO', '10', '10', '2019-10-12', 'femal', 0, '5da6c0773f10f', '', 0),
(7, 'test', 'test@mail', '$2y$10$SreEeYpdzQApCvV6jcDe6OP0dpIlxx67NiWhuuuJZMW34/roxh8pC', '10', '10', '2019-10-12', 'femal', 0, '5da6c1f542c47', '', 0),
(8, 'fwebbeb', 'yuaedyvb@gmail.com', '$2y$10$qgx8cQm0LEHOMllw1wZEVu.w9ux630gifFh7aUPknQYFlbjGNvTQ2', '87', '180', '2003-07-26', 'male', 1, '', '', 0),
(9, 'Hdhsshsndn', 'skdhsgb@gmail.com', '$2y$10$ibp3XoQIr6cxmfLIMVi.ie1CwTl27e4tVBW4REs8dtRuUxz.02fF.', '10', '10', '2002-11-27', 'male', 0, '5db6ad7210451', '', 0),
(10, 'testtest', 'testtest@gmail.com', '$2y$10$mCvnOpYGJW4jzCd9MLVOgu2V4/YQ/YT4nH8jSgCBABqdQWmIB/Sui', '78', '187', '2000-05-24', 'male', 1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drinks`
--

CREATE TABLE `koppel_user_drinks` (
  `gebruiker_ID` int(11) NOT NULL,
  `drinks_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_drinks`
--

INSERT INTO `koppel_user_drinks` (`gebruiker_ID`, `drinks_ID`, `datum`) VALUES
(10, 26, '2019-10-28'),
(10, 27, '2019-10-29'),
(10, 28, '2019-10-30'),
(10, 29, '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drugs`
--

CREATE TABLE `koppel_user_drugs` (
  `gebruiker_ID` int(11) NOT NULL,
  `drug_ID` int(11) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_drugs`
--

INSERT INTO `koppel_user_drugs` (`gebruiker_ID`, `drug_ID`, `hoeveelheid`, `datum`) VALUES
(10, 22, 1, '2019-10-28'),
(10, 23, 0, '2019-10-29'),
(10, 24, 2, '2019-10-30'),
(10, 25, 0, '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_eten`
--

CREATE TABLE `koppel_user_eten` (
  `gebruiker_ID` int(11) NOT NULL,
  `eten_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_eten`
--

INSERT INTO `koppel_user_eten` (`gebruiker_ID`, `eten_ID`, `datum`) VALUES
(10, 23, '2019-10-28'),
(10, 24, '2019-10-29'),
(10, 25, '2019-10-30'),
(10, 26, '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_sport`
--

CREATE TABLE `koppel_user_sport` (
  `gebruiker_ID` int(11) NOT NULL,
  `sport_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_sport`
--

INSERT INTO `koppel_user_sport` (`gebruiker_ID`, `sport_ID`, `datum`) VALUES
(10, 20, '2019-10-28'),
(10, 21, '2019-10-29'),
(10, 22, '2019-10-30'),
(10, 23, '2019-10-31');

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

--
-- Dumping data for table `melding`
--

INSERT INTO `melding` (`melding_ID`, `melding`, `datum`, `gebruiker_ID`) VALUES
(7, 'Voor 2019-10-28 is nog geen data ingevuld.', '2019-10-28', 8),
(9, 'Voor 2019-10-28 is nog geen data ingevuld.', '2019-10-28', 2);

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
  `gebruiker_ID` int(11) NOT NULL,
  `uren` int(20) NOT NULL,
  `beoordeling` varchar(50) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slaap`
--

INSERT INTO `slaap` (`slaap_ID`, `gebruiker_ID`, `uren`, `beoordeling`, `datum`) VALUES
(1, 10, 10, '6', '2019-10-28'),
(2, 10, 5, '7', '2019-10-29'),
(3, 10, 8, '10', '2019-10-30'),
(4, 10, 13, '8', '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `verbranding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_ID`, `naam`, `verbranding`) VALUES
(1, 'voetbal', '700'),
(2, 'voetbal', '400'),
(3, 'tennis', '505'),
(4, '', '0'),
(5, 'rennen', '1000'),
(6, '2', '2'),
(7, '1', '1'),
(8, '3213', '3123'),
(9, '5', '5'),
(10, '2', '2'),
(11, '3', '3'),
(12, '4', '4'),
(13, '5', '5'),
(14, '8', '8'),
(15, '2', '2'),
(16, '2', '2'),
(17, '2', '2'),
(18, '2', '2'),
(19, 'tennis', '800'),
(20, 'voetbal', '800'),
(21, 'basketball', '800'),
(22, 'tennis', '200'),
(23, 'cricket', '500');

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
  ADD KEY `user_ID_user_ID` (`gebruiker_ID`),
  ADD KEY `drinks_ID` (`drinks_ID`);

--
-- Indexes for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD KEY `drugs_ID_drugs_ID` (`drug_ID`),
  ADD KEY `drugs_user_ID_user_ID` (`gebruiker_ID`);

--
-- Indexes for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD KEY `eten_user_ID_user_ID` (`gebruiker_ID`),
  ADD KEY `eten_eten_ID_food_ID` (`eten_ID`);

--
-- Indexes for table `koppel_user_sport`
--
ALTER TABLE `koppel_user_sport`
  ADD KEY `gebruiker_ID` (`gebruiker_ID`),
  ADD KEY `sport_ID` (`sport_ID`);

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
  MODIFY `arbeid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `drinken`
--
ALTER TABLE `drinken`
  MODIFY `drinken_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drugs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `eten`
--
ALTER TABLE `eten`
  MODIFY `eten_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `melding`
--
ALTER TABLE `melding`
  MODIFY `melding_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schijf`
--
ALTER TABLE `schijf`
  MODIFY `schijf_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slaap`
--
ALTER TABLE `slaap`
  MODIFY `slaap_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD CONSTRAINT `user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD CONSTRAINT `drugs_ID_drugs_ID` FOREIGN KEY (`drug_ID`) REFERENCES `drugs` (`drugs_ID`),
  ADD CONSTRAINT `drugs_user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD CONSTRAINT `eten_eten_ID_food_ID` FOREIGN KEY (`eten_ID`) REFERENCES `eten` (`eten_ID`),
  ADD CONSTRAINT `eten_user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_sport`
--
ALTER TABLE `koppel_user_sport`
  ADD CONSTRAINT `koppel_user_sport_ibfk_1` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`),
  ADD CONSTRAINT `koppel_user_sport_ibfk_2` FOREIGN KEY (`sport_ID`) REFERENCES `sport` (`sport_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
