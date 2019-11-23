-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2019 um 17:17
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
-- Tabellenstruktur für Tabelle `restaurant`
--

CREATE TABLE `restaurant` (
  `ID` int(10) NOT NULL,
  `type` enum('vegan','vegetarian','veg-friendly') NOT NULL,
  `tel_nr` varchar(15) NOT NULL,
  `type_icon` varchar(250) NOT NULL,
  `fk_blogpost_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `restaurant`
--

INSERT INTO `restaurant` (`ID`, `type`, `tel_nr`, `type_icon`, `fk_blogpost_ID`) VALUES
(1, 'vegan', '0676 4927790', 'https://www.happycow.net/img/category/category_vegan.svg', 6),
(2, 'veg-friendly', '0664 1508429', 'https://www.happycow.net/img/category/category_veg-friendly.svg', 8),
(4, 'vegetarian', '01 5452284', 'https://www.happycow.net/img/category/category_vegetarian.svg', 9),
(5, 'vegetarian', '01 5862839', 'https://www.happycow.net/img/category/category_vegetarian.svg', 10);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `restaurant_ibfk_1` (`fk_blogpost_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`fk_blogpost_ID`) REFERENCES `blogpost` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
