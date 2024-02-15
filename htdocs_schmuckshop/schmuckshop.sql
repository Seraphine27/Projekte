-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Feb 2024 um 08:39
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
-- Datenbank: `schmuckshop`
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
  `orderd` int(11) NOT NULL,
  `orderdate` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `cartitems`
--

INSERT INTO `cartitems` (`id`, `cid`, `pid`, `quantity`, `orderd`, `orderdate`) VALUES
(19, 3, 4, 1, 0, 2147483647),
(21, 5, 2, 4, 0, 2147483647);

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
(2, 4),
(3, 5),
(4, 3),
(5, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`) VALUES
(1, 'Brautdiadem', 'Ein Diadem zu passend zu jedem Brautkleid. \r\nEs ist mit Diamanten besetzt und ist somit ein echter Hingucker am Kopf einer Braut', 150.5, 'Brautdiadem_Diamant.jpg'),
(2, 'Brautschmuck in Silber ', 'Ein Brautschmuckset mit Ohrringen und passender Kette. \r\nDie Kette ist eine Art von Collier.\r\nDie Ohrringe sind hängende Stecke somit kann man sie nicht verlieren und halten den ganzen Abend. \r\n\r\nDiese Kette und Ohrringe sind mit Zirkonia besetzt und sorgen im richtigen Licht für einen Funkeleffekt.', 199.99, 'Brautschmuck.jpg'),
(3, 'Opalkette', 'Diese wunderschöne Kette ist mit einem großen Opalstein in blau, in einer schönen Fassung versehen aber auch mit mehreren kleineren Opalsteinen.\r\nDurch ihre besondere Form erinnert sie an Engelsflügel und ist auf jeden Fall ein Hingucker bei Abengalas oder auf Bällen.', 115.75, 'Opalkette.jpg'),
(4, 'Saphirring ', 'Ein Saphirring in einer schönen Silberfassung in dieser auch Diamanten sitzen. \r\nDer Saphir ist in einer runden Optik geschliffen. \r\n', 1500, 'saphirring.jpg'),
(5, 'Schmetterlingskette', 'Diese Kette wird jede Frau lieben die Barbie Fairytopia kennt!\r\n\r\nDer Grundriss des Schmetterlings besteht aus Diamanten und die Flügel im Grundriss aus verschiedenen Halbedelsteinen.\r\nDie Kette an die der Schmetterling befestigt ist besteht aus Gold', 75.89, 'Schmetterlingkette.jpg'),
(6, 'Armband aus Smaragd ', 'Dieses wunderschöne Armband besteht aus mehreren kleineren Smaragdsteinen. \r\n\r\nEs ist ein zierlicheres Armband und somit an jedem Handgelenk tragbar ohne das es gleich ein Boom-Effekt ist. ', 950, 'Smaragd_Armband.jpg'),
(7, 'Swarovski Ohrringe (Drops)', 'Diese Ohrringe sind mit mehreren weißen Swarovski-Steinen besetzt. \r\n\r\nDurch ihre Bauform sind sie sehr komfortable zu tragen.', 65.45, 'Swarovski_Ohrringe_Drops.jpg'),
(8, 'Verlobungsring Rubin', 'Dieser Verlobungsring hat eine wunderschöne Form.\r\n\r\nAuf der Vorderseite der Blätter befindet sich in jedem Blatt ein kleiner Diamant und als Blume fungiert das Rubinherz. \r\nDie geschwungene Form des Rings soll ein Rosenstamm darstellen der zur Rosenblüte(Rubin) aufschliesst.', 1850.99, 'Verlobungsring_Rubin.jpg'),
(9, 'Swarovski Kette', 'Eine Kette die an jedem Hals ein echter Hingucker ist ', 300, 'Swarovski_Kette.jpg\"'),
(10, 'Opal Ohrringe', 'Ohrringe in Drop Form mit einem wunderschönen Opal', 150, 'Opal_Ohrringe.jpg\"');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(3, 'test', 'test@test.at', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1),
(4, 'test1', 'test1@test.at', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0),
(5, 'test2', 'test2@test.at', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0),
(6, 'test3', 'test3@test.at', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
