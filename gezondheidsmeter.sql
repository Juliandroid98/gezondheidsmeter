-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 sep 2019 om 09:14
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

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
-- Tabelstructuur voor tabel `arbeidsomstandigheden`
--

CREATE TABLE `arbeidsomstandigheden` (
  `gebruiker_id` int(11) NOT NULL,
  `werkplek` int(11) NOT NULL,
  `werkdruk` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drinken`
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
-- Tabelstructuur voor tabel `drugs`
--

CREATE TABLE `drugs` (
  `drugs_id` int(11) NOT NULL,
  `drugs_naam` varchar(50) NOT NULL,
  `soort_drugs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `drugs`
--

INSERT INTO `drugs` (`drugs_id`, `drugs_naam`, `soort_drugs`) VALUES
(1, 'testdrugs', 'softdrugs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drugsgebruik`
--

CREATE TABLE `drugsgebruik` (
  `gebruiker_id` int(11) NOT NULL,
  `drugs_id` int(11) NOT NULL,
  `aantal_milligram` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `eten`
--

CREATE TABLE `eten` (
  `eten_id` int(11) NOT NULL,
  `etennaam` varchar(50) NOT NULL,
  `schijf_id` int(11) NOT NULL,
  `suiker_gram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `is_admin` tinyint(1) NOT NULL,
  `gebruiker_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `geboortedatum` date NOT NULL,
  `lengte` int(11) NOT NULL,
  `gewicht` int(11) NOT NULL,
  `geslacht` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`is_admin`, `gebruiker_id`, `gebruikersnaam`, `wachtwoord`, `email`, `geboortedatum`, `lengte`, `gewicht`, `geslacht`) VALUES
(0, 1, 'testgebruiker', 'test123', 'test@emal.com', '2019-09-03', 99, 99, 'man');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_drinken`
--

CREATE TABLE `gebruiker_drinken` (
  `datum` date NOT NULL,
  `aantal_milliliter` int(11) NOT NULL,
  `drank_id` int(11) NOT NULL,
  `gebruiker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_eten`
--

CREATE TABLE `gebruiker_eten` (
  `gebruiker_id` int(11) NOT NULL,
  `eten_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `aantal_grammen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schijf`
--

CREATE TABLE `schijf` (
  `schijf_id` int(11) NOT NULL,
  `schijfnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `schijf`
--

INSERT INTO `schijf` (`schijf_id`, `schijfnaam`) VALUES
(1, 'groente en fruit'),
(2, 'smeer en bereidingsvetten'),
(3, 'zuivel noten vis peulvruchten vlees en ei'),
(4, 'brood graanproducten en aardappelen'),
(5, 'dranken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slaapcyclus`
--

CREATE TABLE `slaapcyclus` (
  `gebruiker_id` int(11) NOT NULL,
  `aantal_uur` int(11) NOT NULL,
  `smiley` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `slaapcyclus`
--

INSERT INTO `slaapcyclus` (`gebruiker_id`, `aantal_uur`, `smiley`, `datum`) VALUES
(1, 10, 10, '2019-09-11');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `sportnaam` varchar(50) NOT NULL,
  `verbrandingswaarde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `sport`
--

INSERT INTO `sport` (`sport_id`, `sportnaam`, `verbrandingswaarde`) VALUES
(1, 'testbasketball', 77);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sportplanning`
--

CREATE TABLE `sportplanning` (
  `gebruiker_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `aantal_uur` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `sportplanning`
--

INSERT INTO `sportplanning` (`gebruiker_id`, `sport_id`, `aantal_uur`, `datum`) VALUES
(1, 1, 0, '0000-00-00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `arbeidsomstandigheden`
--
ALTER TABLE `arbeidsomstandigheden`
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `drinken`
--
ALTER TABLE `drinken`
  ADD PRIMARY KEY (`drank_id`),
  ADD KEY `schijf_id` (`schijf_id`);

--
-- Indexen voor tabel `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drugs_id`);

--
-- Indexen voor tabel `drugsgebruik`
--
ALTER TABLE `drugsgebruik`
  ADD PRIMARY KEY (`drugs_id`),
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `eten`
--
ALTER TABLE `eten`
  ADD PRIMARY KEY (`eten_id`),
  ADD KEY `schijf_id` (`schijf_id`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruiker_id`);

--
-- Indexen voor tabel `gebruiker_drinken`
--
ALTER TABLE `gebruiker_drinken`
  ADD KEY `drank_id` (`drank_id`),
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `gebruiker_eten`
--
ALTER TABLE `gebruiker_eten`
  ADD PRIMARY KEY (`gebruiker_id`,`eten_id`,`datum`),
  ADD KEY `eten_id` (`eten_id`);

--
-- Indexen voor tabel `schijf`
--
ALTER TABLE `schijf`
  ADD PRIMARY KEY (`schijf_id`);

--
-- Indexen voor tabel `slaapcyclus`
--
ALTER TABLE `slaapcyclus`
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexen voor tabel `sportplanning`
--
ALTER TABLE `sportplanning`
  ADD PRIMARY KEY (`sport_id`),
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `drinken`
--
ALTER TABLE `drinken`
  MODIFY `drank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drugs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `drugsgebruik`
--
ALTER TABLE `drugsgebruik`
  MODIFY `drugs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `eten`
--
ALTER TABLE `eten`
  MODIFY `eten_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `schijf`
--
ALTER TABLE `schijf`
  MODIFY `schijf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `sportplanning`
--
ALTER TABLE `sportplanning`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `arbeidsomstandigheden`
--
ALTER TABLE `arbeidsomstandigheden`
  ADD CONSTRAINT `arbeidsomstandigheden_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`);

--
-- Beperkingen voor tabel `drinken`
--
ALTER TABLE `drinken`
  ADD CONSTRAINT `drinken_ibfk_1` FOREIGN KEY (`schijf_id`) REFERENCES `schijf` (`schijf_id`);

--
-- Beperkingen voor tabel `drugsgebruik`
--
ALTER TABLE `drugsgebruik`
  ADD CONSTRAINT `drugsgebruik_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`),
  ADD CONSTRAINT `drugsgebruik_ibfk_2` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`drugs_id`);

--
-- Beperkingen voor tabel `eten`
--
ALTER TABLE `eten`
  ADD CONSTRAINT `eten_ibfk_1` FOREIGN KEY (`schijf_id`) REFERENCES `schijf` (`schijf_id`);

--
-- Beperkingen voor tabel `gebruiker_drinken`
--
ALTER TABLE `gebruiker_drinken`
  ADD CONSTRAINT `gebruiker_drinken_ibfk_1` FOREIGN KEY (`drank_id`) REFERENCES `drinken` (`drank_id`),
  ADD CONSTRAINT `gebruiker_drinken_ibfk_2` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`);

--
-- Beperkingen voor tabel `gebruiker_eten`
--
ALTER TABLE `gebruiker_eten`
  ADD CONSTRAINT `gebruiker_eten_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`),
  ADD CONSTRAINT `gebruiker_eten_ibfk_2` FOREIGN KEY (`eten_id`) REFERENCES `eten` (`eten_id`);

--
-- Beperkingen voor tabel `slaapcyclus`
--
ALTER TABLE `slaapcyclus`
  ADD CONSTRAINT `slaapcyclus_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`);

--
-- Beperkingen voor tabel `sportplanning`
--
ALTER TABLE `sportplanning`
  ADD CONSTRAINT `sportplanning_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`gebruiker_id`),
  ADD CONSTRAINT `sportplanning_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
