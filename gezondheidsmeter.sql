-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 sep 2019 om 01:41
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_tif`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `arbeid`
--

CREATE TABLE `arbeid` (
  `ID` int(11) NOT NULL,
  `werkplek` varchar(20) NOT NULL,
  `werkdruk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drinks`
--

CREATE TABLE `drinks` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL,
  `alcohol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `drinks`
--

INSERT INTO `drinks` (`ID`, `name`, `kcal`, `sugar`, `schijf_ID`, `alcohol`) VALUES
(1, 's', 0, 0.00, 0, ''),
(2, 'sa', 122, 0.00, 0, ''),
(3, 'sss', 1223, 0.00, 0, ''),
(4, 'sdasdas', 2324, 0.00, 0, ''),
(5, 'fdsfsdf', 123, 0.00, 0, ''),
(6, '', 0, 0.00, 0, ''),
(7, '', 0, 0.00, 0, ''),
(8, '', 0, 0.00, 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drugs`
--

CREATE TABLE `drugs` (
  `ID` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `soort` varchar(40) NOT NULL,
  `hoeveelheid` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `food`
--

INSERT INTO `food` (`ID`, `name`, `kcal`, `sugar`, `schijf_ID`) VALUES
(1, 'sss', 12, 0.00, 0),
(2, 'zibbi', 123, 0.00, 0),
(3, 'zibbi', 133, 0.00, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `koppel_user_drinks`
--

CREATE TABLE `koppel_user_drinks` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `drinks_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `koppel_user_drinks`
--

INSERT INTO `koppel_user_drinks` (`ID`, `user_ID`, `drinks_ID`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 1, 7),
(4, 1, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `koppel_user_drugs`
--

CREATE TABLE `koppel_user_drugs` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `drug_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `koppel_user_eten`
--

CREATE TABLE `koppel_user_eten` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `eten_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `koppel_user_eten`
--

INSERT INTO `koppel_user_eten` (`ID`, `user_ID`, `eten_ID`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schijf`
--

CREATE TABLE `schijf` (
  `ID` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slaap`
--

CREATE TABLE `slaap` (
  `ID` int(11) NOT NULL,
  `hoeveelheid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sport`
--

CREATE TABLE `sport` (
  `ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `verbranding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `weight` double(3,2) NOT NULL,
  `height` double(3,2) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`, `weight`, `height`, `age`, `gender`) VALUES
(1, 'Henk', 'HenkSuckDick@gmail.com', 'Zibbi', 9.99, 9.99, 102, 'dunno');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `arbeid`
--
ALTER TABLE `arbeid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID_user_ID` (`user_ID`);

--
-- Indexen voor tabel `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `drugs_ID_drugs_ID` (`drug_ID`),
  ADD KEY `drugs_user_ID_user_ID` (`user_ID`);

--
-- Indexen voor tabel `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eten_user_ID_user_ID` (`user_ID`),
  ADD KEY `eten_eten_ID_food_ID` (`eten_ID`);

--
-- Indexen voor tabel `schijf`
--
ALTER TABLE `schijf`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `slaap`
--
ALTER TABLE `slaap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `arbeid`
--
ALTER TABLE `arbeid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `drinks`
--
ALTER TABLE `drinks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `drugs`
--
ALTER TABLE `drugs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `schijf`
--
ALTER TABLE `schijf`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `slaap`
--
ALTER TABLE `slaap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `sport`
--
ALTER TABLE `sport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD CONSTRAINT `user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Beperkingen voor tabel `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD CONSTRAINT `drugs_ID_drugs_ID` FOREIGN KEY (`drug_ID`) REFERENCES `drugs` (`ID`),
  ADD CONSTRAINT `drugs_user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Beperkingen voor tabel `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD CONSTRAINT `eten_eten_ID_food_ID` FOREIGN KEY (`eten_ID`) REFERENCES `food` (`ID`),
  ADD CONSTRAINT `eten_user_ID_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
