-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 avr. 2019 à 08:50
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `construction`
--

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE `choix` (
  `idchoix` int(11) NOT NULL,
  `nomchoix` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `choix`
--

INSERT INTO `choix` (`idchoix`, `nomchoix`) VALUES
(1, 'maison cocody'),
(2, 'maison bingerville'),
(3, 'terrain bingerville'),
(4, 'terrain cocody'),
(5, 'appartement cocody'),
(6, 'appartement marcory');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_utilisateur`
--

CREATE TABLE `groupe_utilisateur` (
  `idgrp` int(11) NOT NULL,
  `nomgrp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe_utilisateur`
--

INSERT INTO `groupe_utilisateur` (`idgrp`, `nomgrp`) VALUES
(1, 'administrateur'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutil` int(11) NOT NULL,
  `idgrputil` int(11) NOT NULL,
  `nomutil` varchar(100) NOT NULL,
  `prenomutil` varchar(100) NOT NULL,
  `emailutil` varchar(100) NOT NULL,
  `motdepasseutil` varchar(100) NOT NULL,
  `date_crea` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutil`, `idgrputil`, `nomutil`, `prenomutil`, `emailutil`, `motdepasseutil`, `date_crea`) VALUES
(1, 1, 'guelade', 'kevin', 'kevin@gmail.com', '123456', '2019-04-09 23:00:00'),
(2, 2, 'fousseni', 'bill', 'bill@gmail.com', 'HHHHH', '2019-04-23 19:42:42'),
(3, 2, 'fousseni', 'bill', 'bill@gmail.com', 'HHHHH', '2019-04-23 19:46:15'),
(4, 2, 'mamamam', 'mamamama', 'mama@gmail.com', 'llll', '2019-04-23 19:46:45'),
(5, 2, 'mamamam', 'mamamama', 'mama@gmail.com', 'llll', '2019-04-23 19:50:15'),
(6, 2, 'mamamam', 'mamamama', 'mama@gmail.com', 'llll', '2019-04-23 19:50:47'),
(7, 2, 'dooooo', 'dooooodooo', 'doooo@yahoo.fr', 'dddd', '2019-04-23 19:51:14'),
(8, 2, 'lala', 'lili', 'lili@gmail.com', 'kkkk', '2019-04-26 06:06:02'),
(9, 2, 'lou', 'gaspard', 'lou@yahoo.com', 'llll', '2019-04-26 06:36:14');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `idvisite` int(11) NOT NULL,
  `idchoix` int(11) NOT NULL,
  `idutil` int(11) NOT NULL,
  `heureVisite` time NOT NULL,
  `datevisite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`idvisite`, `idchoix`, `idutil`, `heureVisite`, `datevisite`) VALUES
(1, 2, 1, '23:00:00', '2019-04-05'),
(2, 2, 1, '23:00:00', '2019-04-05'),
(3, 2, 1, '13:02:00', '2019-04-02'),
(4, 1, 9, '12:00:00', '2019-04-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`idchoix`);

--
-- Index pour la table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
  ADD PRIMARY KEY (`idgrp`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutil`),
  ADD KEY `utilisateur_groupe_utilisateur_fk` (`idgrputil`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`idvisite`),
  ADD KEY `visite_utilisateur_fk` (`idutil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `choix`
--
ALTER TABLE `choix`
  MODIFY `idchoix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
  MODIFY `idgrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `idvisite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_groupe_utilisateur_fk` FOREIGN KEY (`idgrputil`) REFERENCES `groupe_utilisateur` (`idgrp`);

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `visite_utilisateur_fk` FOREIGN KEY (`idutil`) REFERENCES `utilisateur` (`idutil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
