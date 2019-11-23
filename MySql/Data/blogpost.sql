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

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_adress_ID` (`fk_adress_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`fk_adress_ID`) REFERENCES `adress` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
