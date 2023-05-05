-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mai 2023 à 07:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` decimal(2,0) NOT NULL,
  `nomAdmin` varchar(25) NOT NULL,
  `prenomAdmin` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL,
  PRIMARY KEY (`IdAdmin`),
  KEY `Admin-Utilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `nomAdmin`, `prenomAdmin`, `mail`, `mdp`, `IdUtilisateur`) VALUES
('1', 'ADMIN1', 'admin1', 'admin1@gmail.com', 'admin1', '3'),
('2', 'ADMIN2', 'admin2', 'admin2@gmail.com', 'admin2', '6');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `IdClasse` decimal(2,0) NOT NULL,
  `nomClasse` varchar(25) NOT NULL,
  `IdEcole` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  PRIMARY KEY (`IdClasse`),
  KEY `Classe-Ecole` (`IdEcole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`IdClasse`, `nomClasse`, `IdEcole`, `ecole`, `promo`) VALUES
('1', 'Groupe 1', '1', 'ECE', '2025'),
('2', 'Groupe 2', '1', 'ECE', '2025'),
('3', 'Groupe 1', '1', 'ECE', '2026'),
('4', 'Groupe 2', '1', 'ECE', '2026'),
('5', 'Groupe 1', '1', 'ECE', '2027'),
('6', 'Groupe 2', '1', 'ECE', '2027'),
('7', 'Groupe 1', '2', 'HEIP', '2025'),
('8', 'Groupe 2', '2', 'HEIP', '2025'),
('9', 'Groupe 1', '2', 'HEIP', '2026'),
('10', 'Groupe 2', '2', 'HEIP', '2026'),
('11', 'Groupe 1', '2', 'HEIP', '2027'),
('12', 'Groupe 2', '2', 'HEIP', '2027'),
('13', 'Groupe 1', '3', 'INSEEC', '2025'),
('14', 'Groupe 2', '3', 'INSEEC', '2025'),
('15', 'Groupe 1', '3', 'INSEEC', '2026'),
('16', 'Groupe 2', '3', 'INSEEC', '2026'),
('17', 'Groupe 1', '3', 'INSEEC', '2027'),
('18', 'Groupe 2', '3', 'INSEEC', '2027');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `IdCompetence` decimal(2,0) NOT NULL,
  `nomCompetence` varchar(25) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `IdMatiere` decimal(2,0) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  PRIMARY KEY (`IdCompetence`),
  KEY `Compétence-Matière` (`IdMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`IdCompetence`, `nomCompetence`, `description`, `IdMatiere`, `nomMatiere`, `ecole`, `promo`) VALUES
('1', 'Savoir parler', 'Etre capable de mettre des mots à la suite', '1', 'Informatique', 'HEIP', '2025');

-- --------------------------------------------------------

--
-- Structure de la table `competencetransverse`
--

DROP TABLE IF EXISTS `competencetransverse`;
CREATE TABLE IF NOT EXISTS `competencetransverse` (
  `IdCompetenceTransverse` decimal(2,0) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`IdCompetenceTransverse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `IdEcole` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  PRIMARY KEY (`IdEcole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`IdEcole`, `ecole`) VALUES
('1', 'ECE'),
('2', 'HEIP'),
('3', 'INSEEC');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `IdEleve` decimal(2,0) NOT NULL,
  `nomEleve` varchar(25) NOT NULL,
  `prenomEleve` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  `IdClasse` decimal(2,0) NOT NULL,
  `nomClasse` varchar(25) NOT NULL,
  PRIMARY KEY (`IdEleve`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `Elève-Classe` (`IdClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`IdEleve`, `nomEleve`, `prenomEleve`, `mail`, `mdp`, `IdUtilisateur`, `ecole`, `promo`, `IdClasse`, `nomClasse`) VALUES
('1', 'Subra', 'Antoine', 'AS@gmail.com', 'AS', '2', 'ECE', '2025', '1', 'Groupe 1'),
('2', 'Busetta', 'Paul', 'PB@gmail.com', 'PB', '5', 'ECE', '2026', '4', 'Groupe 2'),
('3', 'Nouaille-Degorce', 'Paul', 'PND@gmail.com', 'PND', '7', 'HEIP', '2027', '11', 'Groupe 1'),
('4', 'Huvelle', 'Baptiste', 'BH@gmail.com', 'BH', '8', 'INSEEC', '2026', '16', 'Groupe 1');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `IdMatiere` decimal(2,0) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `nbHeures` decimal(3,0) NOT NULL,
  `IdProf` decimal(2,0) NOT NULL,
  `nomProf` varchar(25) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  PRIMARY KEY (`IdMatiere`),
  KEY `Matière-Prof` (`IdProf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`IdMatiere`, `nomMatiere`, `nbHeures`, `IdProf`, `nomProf`, `ecole`, `promo`) VALUES
('1', 'Informatique', '120', '1', 'Debize', 'ECE', '2025'),
('2', 'Informatique', '120', '1', 'Debize', 'ECE', '2026'),
('3', 'Informatique', '10', '1', 'Debize', 'INSEEC', '2025'),
('4', 'Physique', '120', '2', 'Dedecker', 'ECE', '2025'),
('5', 'Physique', '12', '2', 'Dedecker', 'HEIP', '2026'),
('6', 'Physique', '14', '2', 'Dedecker', 'INSEEC', '2025');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `IdProf` decimal(2,0) NOT NULL,
  `nomProf` varchar(25) NOT NULL,
  `prenomProf` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL,
  PRIMARY KEY (`IdProf`),
  KEY `Prof-utilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`IdProf`, `nomProf`, `prenomProf`, `mail`, `mdp`, `nomMatiere`, `IdUtilisateur`) VALUES
('1', 'Debize', 'Laurent', 'LD@gmail.com', 'LD', 'Informatique', '1'),
('2', 'Dedecker', 'Samira', 'SD@gmail.com', 'SD', 'Physique', '4');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `IdPromo` decimal(2,0) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  `IdEcole` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  PRIMARY KEY (`IdPromo`),
  KEY `Promo-Ecole` (`IdEcole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`IdPromo`, `promo`, `IdEcole`, `ecole`) VALUES
('1', '2025', '1', 'ECE'),
('2', '2026', '1', 'ECE'),
('3', '2027', '1', 'ECE'),
('4', '2025', '2', 'HEIP'),
('5', '2026', '2', 'HEIP'),
('6', '2027', '2', 'HEIP'),
('7', '2025', '3', 'INSEEC'),
('8', '2026', '3', 'INSEEC'),
('9', '2027', '3', 'INSEEC');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisateur` decimal(2,0) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisateur`, `statut`, `mail`, `mdp`) VALUES
('1', 'Prof', 'LD@gmail.com', 'LD'),
('2', 'Eleve', 'AS@gmail.com', 'AS'),
('3', 'Admin', 'admin1@gmail.com', 'admin1'),
('4', 'Prof', 'SD@gmail.com', 'SD'),
('5', 'Eleve', 'PB@gmail.com', 'PB'),
('6', 'Admin', 'admin2@gmail.com', 'admin2'),
('7', 'Eleve', 'PND@gmail.com', 'PND'),
('8', 'Eleve', 'BH@gmail.com', 'BH');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin-Utilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `Classe-Ecole` FOREIGN KEY (`IdEcole`) REFERENCES `ecole` (`IdEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `Compétence-Matière` FOREIGN KEY (`IdMatiere`) REFERENCES `matiere` (`IdMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `Elève-Classe` FOREIGN KEY (`IdClasse`) REFERENCES `classe` (`IdClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdUtilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `Matière-Prof` FOREIGN KEY (`IdProf`) REFERENCES `prof` (`IdProf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `Prof-utilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `Promo-Ecole` FOREIGN KEY (`IdEcole`) REFERENCES `ecole` (`IdEcole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
