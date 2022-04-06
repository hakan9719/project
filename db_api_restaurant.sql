-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2022 at 02:23 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_api_restaurant`
--
CREATE DATABASE IF NOT EXISTS `db_api_restaurant` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_api_restaurant`;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `carte` varchar(255) DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `nom`, `prenom`, `telephone`, `mail`, `carte`, `statut`) VALUES
(1, 'hello', 'Jeff', 'qssdqsdqsd', 'azeaze@aze', 'aqzsedrf', 0),
(3, 'aze', 'rty', 'qsdfgh', 'aze@qsd', '321321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `liencommande`
--

DROP TABLE IF EXISTS `liencommande`;
CREATE TABLE `liencommande` (
  `id` int(11) NOT NULL,
  `plat` int(11) NOT NULL,
  `commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liencommande`
--

INSERT INTO `liencommande` (`id`, `plat`, `commande`, `quantite`) VALUES
(1, 1, 3, 3),
(2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plat`
--

INSERT INTO `plat` (`id`, `nom`, `prix`, `image`) VALUES
(1, 'poulet', 10, NULL),
(2, 'riz', 1, 'azeaze');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `carte` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `prenom`, `telephone`, `mail`, `carte`, `statut`) VALUES
(1, 'hello', 'world', '321', 'aze@qsd', '654654', 0),
(2, 'good', 'night', '321', 'aze@qsd', '654654', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `taille`, `reservation_id`) VALUES
(1, 4, NULL),
(2, 4, NULL),
(3, 4, 1),
(4, 4, 1),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Jeff', '$2y$10$kG1kw37sNlEZB5gD7bTaceCay5/V3FS5LoTScWs5TthE4D1uzuQRa'),
(3, 'Jeffqsd', '$2y$10$LBGl1NxWQMlZTmpmby8IYOlYqv9tKqVAOzkRa8m.E4bdRrTB6EV5O'),
(4, 'Jeffqsdaze', '$2y$10$NMLvj7wlV50q.12h/2XW2uF/8wM/FLv05clKgZDl0QLImlS5yWDZy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liencommande`
--
ALTER TABLE `liencommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande` (`commande`),
  ADD KEY `plat` (`plat`);

--
-- Indexes for table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `liencommande`
--
ALTER TABLE `liencommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `liencommande`
--
ALTER TABLE `liencommande`
  ADD CONSTRAINT `liencommande_ibfk_1` FOREIGN KEY (`commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `liencommande_ibfk_2` FOREIGN KEY (`plat`) REFERENCES `plat` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
