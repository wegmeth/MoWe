CREATE DATABASE IF NOT EXISTS triptool;
USE triptool;

CREATE TABLE `member` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) 

CREATE TABLE `member_trip` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_trip` int(11) NOT NULL,
  `right_level` int(11) NOT NULL
)

CREATE TABLE `trip` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `trip`
--

INSERT INTO `trip` (`id`, `title`, `destination`, `dateStart`, `dateEnd`) VALUES
(18, 'asdasd', 'asd', '1503329375', '1503674975'),
(19, 'asdasd', 'asdasd', '1503502333', '1503761533'),
(20, 'asdasd', 'asdasd', '1503329601', '1503761601');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `member_trip`
--
ALTER TABLE `member_trip`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `member`
--
ALTER TABLE `member`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT für Tabelle `member_trip`
--
ALTER TABLE `member_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT für Tabelle `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

