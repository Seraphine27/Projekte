-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Feb 2024 um 08:38
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `uisce`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lendmovies`
--

CREATE TABLE `lendmovies` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `lendat` timestamp NOT NULL DEFAULT current_timestamp(),
  `backat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `lendmovies`
--

INSERT INTO `lendmovies` (`id`, `userid`, `movieid`, `lendat`, `backat`) VALUES
(1, 5, 0, '2023-07-25 06:52:46', NULL),
(2, 6, 0, '2023-07-25 06:53:40', NULL),
(3, 7, 0, '2023-07-25 06:54:08', NULL),
(4, 8, 0, '2023-07-25 06:55:16', NULL),
(5, 9, 0, '2023-07-25 06:58:20', NULL),
(6, 10, 0, '2023-07-25 07:16:38', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL,
  `category` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `regSince` timestamp NOT NULL DEFAULT current_timestamp(),
  `userImage` varchar(255) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `regSince`, `userImage`) VALUES
(10, 'admin', 'admin@admin.at', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2023-07-25 07:16:38', 'genshin.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `lendmovies`
--
ALTER TABLE `lendmovies`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `lendmovies`
--
ALTER TABLE `lendmovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
