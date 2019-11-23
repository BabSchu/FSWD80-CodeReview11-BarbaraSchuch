-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2019 um 17:16
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_barbaraschuch_travelmatic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adress`
--

CREATE TABLE `adress` (
  `ID` int(10) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `fk_city_ID` int(10) NOT NULL,
  `ZIP_code` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `adress`
--

INSERT INTO `adress` (`ID`, `street_name`, `fk_city_ID`, `ZIP_code`) VALUES
(1, 'Kreuzherrengasse 1', 1, 1040),
(3, 'Schönbrunner Schloßstraße 47', 1, 1130),
(4, 'Prater 7', 1, 1020),
(5, 'Untere Weißgerberstraße 13', 1, 1030),
(6, 'Karmeliterplatz 1', 1, 1020),
(7, 'Ullmannstraße 31', 1, 1150),
(8, 'Arbeitergasse 46', 1, 1050),
(9, 'Mariahilfer Straße 45', 1, 1060),
(10, 'Seilerstätte 9', 1, 1010),
(11, 'Roland-Rainer-Platz 1', 1, 1150),
(12, 'Mariahilfer Straße 81', 1, 1060),
(13, 'Museumsplatz 1', 1, 1070),
(14, 'Wiedner Hauptstraße 78', 1, 1040),
(15, 'Spittelauer Lände 12', 1, 1090),
(16, 'Obere Donaustraße 101', 1, 1020),
(17, 'Felberstraße 1', 1, 1150);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_city_ID` (`fk_city_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adress`
--
ALTER TABLE `adress`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`fk_city_ID`) REFERENCES `city` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
