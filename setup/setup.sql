CREATE DATABASE IF NOT EXISTS triptool;
USE triptool;

CREATE TABLE `member` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE `member_trip` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_trip` int(11) NOT NULL,
  `right_level` int(11) NOT NULL
);

CREATE TABLE `trip` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL
);

ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `member_trip`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `member`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `member_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `trip`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

