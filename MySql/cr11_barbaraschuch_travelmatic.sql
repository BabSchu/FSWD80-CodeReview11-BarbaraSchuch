-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2019 um 17:13
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogpost`
--

CREATE TABLE `blogpost` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `webadress` varchar(200) NOT NULL,
  `fk_adress_ID` int(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `blogpost`
--

INSERT INTO `blogpost` (`ID`, `name`, `description`, `img`, `webadress`, `fk_adress_ID`, `last_update`) VALUES
(5, 'Karlskirche', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://cdn.pixabay.com/photo/2019/08/05/22/38/st-charless-church-4387053_1280.jpg', '', 1, '2019-11-22 15:58:34'),
(6, 'Harvest', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'http://harvest-bistrot.at/wp-content/uploads/2016/12/15283942_1282982658410826_1276668334099643096_n.jpg', 'http://harvest-bistrot.at/', 6, '2019-11-22 15:58:34'),
(7, 'Cat', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://www.musicalvienna.at/media/image/original/17069.jpg', 'https://www.musicalvienna.at/de/spielplan-und-tickets/spielplan/production/858/CATS/calendar', 10, '2019-11-22 15:58:34'),
(8, 'Hawidere', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://bier-guide.net/sites/beer/files/styles/largest/public/2018-08/Hawidere_1150_Wien.jpg?itok=fDoAyMdx', 'http://hawidere.at/', 7, '2019-11-22 16:52:32'),
(9, 'Rupps', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://image.jimcdn.com/app/cms/image/transf/dimension=1920x10000:format=jpg/path/sec60a097c5429b90/image/i04e1498e0c0f4e06/version/1474456983/image.jpg', 'https://www.rupps.at/', 8, '2019-11-22 22:35:31'),
(10, 'Secret Garden', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://media-cdn.tripadvisor.com/media/photo-s/0a/b1/a1/c1/secret-garden.jpg', 'https://secret-garden-cafe.at/', 9, '2019-11-22 22:35:31'),
(11, 'test', 'test', 'test', 'test', 3, '2019-11-23 00:11:36'),
(12, 'Seeed', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://images.derstandard.at/img/2019/10/29/seee.jpg?w=750&s=05f9360a', 'https://www.stadthalle.com/de/schauen/events/622/SEEED--LIVE-2019', 11, '2019-11-23 00:42:59'),
(13, 'Willi Resetarits & Basbaritenori', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'http://s1.wohintipp.at/uploads/events/transformed/496669-451426-7.jpg', 'http://www.stadtsaal.com/kuenstler/WilliResetaritsBasbaritenori.html', 9, '2019-11-23 00:42:59'),
(14, 'Unspelling', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://tqw.at/101/wp-content/uploads/2019/09/andrea-maurer_unspelling_c_andrea-maurer_wvs-845x531.jpg', 'https://tqw.at/event/unspelling-maurer/', 13, '2019-11-23 00:46:30'),
(15, 'Schloss Schönbrunn', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://cdn.pixabay.com/photo/2014/10/26/13/40/schoenbrunn-503846_1280.jpg', 'https://www.schoenbrunn.at/', 3, '2019-11-23 00:59:39'),
(16, 'Prater', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://cdn.pixabay.com/photo/2015/09/23/11/49/night-953541_1280.jpg', 'http://www.prater.at/', 4, '2019-11-23 01:01:02'),
(17, 'KUNST HAUS WIEN. Museum Hundertwasser', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 'https://www.wienholding.at/tools/uploads/full/26461.jpg', 'https://www.kunsthauswien.com/de/', 5, '2019-11-23 01:03:39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `city`
--

CREATE TABLE `city` (
  `ID` int(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `fk_country_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `city`
--

INSERT INTO `city` (`ID`, `city`, `fk_country_ID`) VALUES
(1, 'Vienna', 1),
(2, 'Berlin', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `country`
--

CREATE TABLE `country` (
  `ID` int(10) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `country`
--

INSERT INTO `country` (`ID`, `country`) VALUES
(1, 'Austria'),
(3, 'Germany'),
(4, 'France'),
(5, 'Spain'),
(6, 'Italy'),
(7, 'Hungary');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` datetime NOT NULL,
  `ticket_price` decimal(4,2) NOT NULL,
  `fk_blogpost_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `event`
--

INSERT INTO `event` (`ID`, `name`, `event_date`, `event_time`, `ticket_price`, `fk_blogpost_ID`) VALUES
(1, 'Cats', '2019-11-13', '2019-11-13 18:30:00', '49.00', 7),
(2, 'Seeed', '2019-11-01', '2019-11-23 20:00:00', '55.80', 12),
(3, '', '2019-12-17', '2019-11-23 19:30:00', '22.90', 13),
(4, '', '2019-11-12', '2019-11-23 19:00:00', '17.00', 14);

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `streetart`
--

CREATE TABLE `streetart` (
  `ID` int(10) NOT NULL,
  `curator` varchar(50) NOT NULL,
  `production_year` year(4) NOT NULL,
  `fk_blogpost_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todo`
--

CREATE TABLE `todo` (
  `ID` int(10) NOT NULL,
  `type` enum('museum','historical site','must see') NOT NULL,
  `fk_blogpost_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `todo`
--

INSERT INTO `todo` (`ID`, `type`, `fk_blogpost_ID`) VALUES
(1, 'historical site', 5),
(2, 'historical site', 15),
(3, 'museum', 17),
(4, 'must see', 16),
(5, 'must see', 16);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `role`) VALUES
(3, 'admin', 'admin@admin.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

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
-- Indizes für die Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_adress_ID` (`fk_adress_ID`);

--
-- Indizes für die Tabelle `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_blogpost_ID` (`fk_blogpost_ID`);

--
-- Indizes für die Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `restaurant_ibfk_1` (`fk_blogpost_ID`);

--
-- Indizes für die Tabelle `streetart`
--
ALTER TABLE `streetart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_blogpost_ID` (`fk_blogpost_ID`);

--
-- Indizes für die Tabelle `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_blogpost_ID` (`fk_blogpost_ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adress`
--
ALTER TABLE `adress`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `streetart`
--
ALTER TABLE `streetart`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `todo`
--
ALTER TABLE `todo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`fk_city_ID`) REFERENCES `city` (`ID`);

--
-- Constraints der Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`fk_adress_ID`) REFERENCES `adress` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`fk_blogpost_ID`) REFERENCES `blogpost` (`ID`);

--
-- Constraints der Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`fk_blogpost_ID`) REFERENCES `blogpost` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `streetart`
--
ALTER TABLE `streetart`
  ADD CONSTRAINT `streetart_ibfk_1` FOREIGN KEY (`fk_blogpost_ID`) REFERENCES `blogpost` (`ID`);

--
-- Constraints der Tabelle `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`fk_blogpost_ID`) REFERENCES `blogpost` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
