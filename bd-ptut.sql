-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 08 Mai 2019 à 15:48
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd-ptut`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `log` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `user`, `password`, `log`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0);

-- --------------------------------------------------------

--
-- Structure de la table `possibilitee`
--

CREATE TABLE `possibilitee` (
  `idPossibilitee` bigint(20) NOT NULL,
  `possibilitee` varchar(100) DEFAULT NULL,
  `idQuestion` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `possibilitee`
--

INSERT INTO `possibilitee` (`idPossibilitee`, `possibilitee`, `idQuestion`) VALUES
(5, 'choix 1', 6),
(6, 'test', 6),
(7, 'choix 3', 6),
(108, 'France', 26),
(109, 'Brésil', 26),
(140, 'Homme', 42),
(141, 'Femme', 42);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` bigint(20) NOT NULL,
  `question` varchar(600) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `question`, `type`) VALUES
(6, 'test choix', 'choix'),
(26, 'Quelle nationalités ?', 'choix'),
(42, 'Quelle est votre sexe ?', 'sexe');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `possibilitee`
--
ALTER TABLE `possibilitee`
  ADD PRIMARY KEY (`idPossibilitee`),
  ADD KEY `FK_possibilitee_idQuestion` (`idQuestion`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `possibilitee`
--
ALTER TABLE `possibilitee`
  MODIFY `idPossibilitee` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `possibilitee`
--
ALTER TABLE `possibilitee`
  ADD CONSTRAINT `FK_possibilitee_idQuestion` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`idQuestion`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
