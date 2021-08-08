-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Aug 2021 um 22:53
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `oppkristin_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accountsdb`
--

CREATE TABLE `accountsdb` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `accountsdb`
--

INSERT INTO `accountsdb` (`userid`, `username`, `password`) VALUES
(3, 'kristin', 'sta-cs');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `moneydb`
--

CREATE TABLE `moneydb` (
  `userid` int(11) NOT NULL,
  `buchungid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `betrag` varchar(1000) NOT NULL,
  `katid` int(11) NOT NULL,
  `verwendung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `moneydb`
--

INSERT INTO `moneydb` (`userid`, `buchungid`, `datum`, `betrag`, `katid`, `verwendung`) VALUES
(3, 49, '2021-08-04', '500', 14, 'Unterkunft Sommerurlaub Italien'),
(3, 51, '2021-07-29', '56', 12, 'gemeinsam mit Freunden Pizza essen'),
(3, 53, '2021-08-03', '65,83', 13, 'tanken');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accountsdb`
--
ALTER TABLE `accountsdb`
  ADD PRIMARY KEY (`userid`);

--
-- Indizes für die Tabelle `moneydb`
--
ALTER TABLE `moneydb`
  ADD PRIMARY KEY (`buchungid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `katname` (`katid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accountsdb`
--
ALTER TABLE `accountsdb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `moneydb`
--
ALTER TABLE `moneydb`
  MODIFY `buchungid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `moneydb`
--
ALTER TABLE `moneydb`
  ADD CONSTRAINT `moneydb_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `accountsdb` (`userid`),
  ADD CONSTRAINT `moneydb_ibfk_2` FOREIGN KEY (`katid`) REFERENCES `kategoriedb` (`katnr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
