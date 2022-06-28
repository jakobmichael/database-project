-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2022 um 10:48
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bibliothek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausleihe`
--

CREATE TABLE `ausleihe` (
  `AusleiheID` int(11) NOT NULL,
  `Leihdatum` datetime NOT NULL,
  `Rückgabedatum` datetime NOT NULL,
  `BuchID` int(11) NOT NULL,
  `KundenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autor`
--

CREATE TABLE `autor` (
  `AutorID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Geburtsdatum` datetime NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autorbuchzuordnung`
--

CREATE TABLE `autorbuchzuordnung` (
  `AbzID` int(11) NOT NULL,
  `AutorID` int(11) NOT NULL,
  `BuchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch`
--

CREATE TABLE `buch` (
  `BuchID` int(11) NOT NULL,
  `Titel` varchar(100) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Seitenzahl` int(11) NOT NULL,
  `Erschienen` datetime NOT NULL,
  `Beschreibung` varchar(500) NOT NULL,
  `LagerplatzID` int(11) NOT NULL,
  `VerlagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchgenrezuordnung`
--

CREATE TABLE `buchgenrezuordnung` (
  `BgzID` int(11) NOT NULL,
  `BuchID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `KundenID` int(11) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Straße` varchar(30) NOT NULL,
  `Hausnummer` int(11) NOT NULL,
  `PLZ` varchar(12) NOT NULL,
  `Geburtsdatum` datetime NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lagerplatz`
--

CREATE TABLE `lagerplatz` (
  `LagerplatzID` int(11) NOT NULL,
  `Stockwerksnummer` int(11) NOT NULL,
  `Regalnummer` int(11) NOT NULL,
  `Regalfach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `PLZ` varchar(12) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Land` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlag`
--

CREATE TABLE `verlag` (
  `VerlagID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefonnummer` varchar(25) NOT NULL,
  `Straße` varchar(30) NOT NULL,
  `Hausnummer` int(11) NOT NULL,
  `PLZ` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD PRIMARY KEY (`AusleiheID`),
  ADD KEY `ausleihe_fk_buch` (`BuchID`),
  ADD KEY `ausleihe_fk_kunde` (`KundenID`);

--
-- Indizes für die Tabelle `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`AutorID`);

--
-- Indizes für die Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  ADD PRIMARY KEY (`AbzID`),
  ADD KEY `abz_fk_autor` (`AutorID`),
  ADD KEY `abz_fk_buch` (`BuchID`);

--
-- Indizes für die Tabelle `buch`
--
ALTER TABLE `buch`
  ADD PRIMARY KEY (`BuchID`),
  ADD KEY `buch_fk_lagerplatz` (`LagerplatzID`),
  ADD KEY `buch_fk_verlag` (`VerlagID`);

--
-- Indizes für die Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  ADD PRIMARY KEY (`BgzID`),
  ADD KEY `bgz_fk_buch` (`BuchID`),
  ADD KEY `bgz_fk_genre` (`GenreID`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`KundenID`),
  ADD KEY `PLZ` (`PLZ`);

--
-- Indizes für die Tabelle `lagerplatz`
--
ALTER TABLE `lagerplatz`
  ADD PRIMARY KEY (`LagerplatzID`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`PLZ`);

--
-- Indizes für die Tabelle `verlag`
--
ALTER TABLE `verlag`
  ADD PRIMARY KEY (`VerlagID`),
  ADD KEY `verlag_fk_ort` (`PLZ`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  MODIFY `AusleiheID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `autor`
--
ALTER TABLE `autor`
  MODIFY `AutorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  MODIFY `AbzID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `buch`
--
ALTER TABLE `buch`
  MODIFY `BuchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  MODIFY `BgzID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `KundenID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `lagerplatz`
--
ALTER TABLE `lagerplatz`
  MODIFY `LagerplatzID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `verlag`
--
ALTER TABLE `verlag`
  MODIFY `VerlagID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD CONSTRAINT `ausleihe_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`),
  ADD CONSTRAINT `ausleihe_fk_kunde` FOREIGN KEY (`KundenID`) REFERENCES `kunde` (`KundenID`);

--
-- Constraints der Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  ADD CONSTRAINT `abz_fk_autor` FOREIGN KEY (`AutorID`) REFERENCES `autor` (`AutorID`),
  ADD CONSTRAINT `abz_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`);

--
-- Constraints der Tabelle `buch`
--
ALTER TABLE `buch`
  ADD CONSTRAINT `buch_fk_lagerplatz` FOREIGN KEY (`LagerplatzID`) REFERENCES `lagerplatz` (`LagerplatzID`),
  ADD CONSTRAINT `buch_fk_verlag` FOREIGN KEY (`VerlagID`) REFERENCES `verlag` (`VerlagID`);

--
-- Constraints der Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  ADD CONSTRAINT `bgz_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`),
  ADD CONSTRAINT `bgz_fk_genre` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`);

--
-- Constraints der Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `kunde_fk_ort` FOREIGN KEY (`PLZ`) REFERENCES `ort` (`PLZ`);

--
-- Constraints der Tabelle `verlag`
--
ALTER TABLE `verlag`
  ADD CONSTRAINT `verlag_fk_ort` FOREIGN KEY (`PLZ`) REFERENCES `ort` (`PLZ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
