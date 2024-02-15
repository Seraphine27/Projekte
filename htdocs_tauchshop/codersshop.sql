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
-- Datenbank: `codersshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderd` int(11) NOT NULL DEFAULT 0,
  `orderdate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `cartitems`
--

INSERT INTO `cartitems` (`id`, `cid`, `pid`, `quantity`, `orderd`, `orderdate`) VALUES
(125, 1, 4, 5, 0, '2023-01-30 14:27:34'),
(126, 1, 3, 1, 0, '2023-01-31 08:07:08'),
(127, 1, 5, 1, 0, '2023-01-31 09:04:35');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `carts`
--

INSERT INTO `carts` (`id`, `userid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`) VALUES
(1, 'Atemregler', 'Atemregler Pink von Cressi für Warmwasser', 175.99, 'Atemregler.jpg'),
(2, 'Flossen Mares Pink', 'Geräteflossen für Tauchen in Pink von Mares, dynamische fortbewegung.', 180.85, 'Flossen.jpg'),
(3, 'Logbuch', 'Das perfekte Logbuch zum eintragen der Tauchgänge mit Schildkröte am Cover', 19.99, 'Logbuch.jpg'),
(4, 'Starterset pink', 'Das Starterset besteht aus einer Tauchmaske und einem Schnorchel', 85.79, 'Masken und Schnorchel Set.jpg'),
(5, 'Neoprenfuesslinge schwarz ', 'Die Neoprenfuesslinge halten Ihre Fuesse auch im kalten Wasser warm', 65.5, 'Neoprenfuesslinge.jpg'),
(6, 'Tauchanzug mit Walhai Musterung ', 'Dieser Tauchanzug tarnt Sie perfekt für einen Walhai Tauchgang. Er wurde von der Hai Taucherin Ocean Ramsey entworfen.', 275.99, 'Tauchanzug.jpg'),
(7, 'Luftintegrierter Tauchcomputer', 'Dieser Tauchcomputer zeigt Ihnen zusaetslich zur Tiefe und zur Zeit auch Ihre Luftkapazität an.', 998.5, 'Tauchcomputer.jpg'),
(8, 'Jacket von Cressi', 'Dieses Jacket ist komfortable und hat Bleitaschen.', 565.9, 'Tauchjacket.jpg'),
(9, 'Taschenlampe Magenta', 'Diese Lampe ist perfekt um die Unterwasserwelt etwas zu belichten. Durch Ihre handliche Groesse ist es kein Stoerfaktor bei Ihrem Tauchgang', 99.1, 'Tauchlampe.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regSince` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `regSince`) VALUES
(1, 'admin', 'admin@admin.at', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2023-01-19 08:45:48'),
(2, 'test', 'test@test.at', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2023-01-23 13:18:43');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT für Tabelle `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
