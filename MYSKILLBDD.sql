-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 08 mai 2023 à 16:01
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BDCOMMANDES`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `IdAdmin` decimal(2,0) NOT NULL,
  `nomAdmin` varchar(25) NOT NULL,
  `prenomAdmin` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`IdAdmin`, `nomAdmin`, `prenomAdmin`, `mail`, `mdp`, `IdUtilisateur`) VALUES
('1', 'ADMIN1', 'admin1', 'admin1@gmail.com', 'admin1', '3'),
('2', 'ADMIN2', 'admin2', 'admin2@gmail.com', 'admin2', '6');

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `IdClasse` decimal(2,0) NOT NULL,
  `nomClasse` varchar(25) NOT NULL,
  `IdPromo` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`IdClasse`, `nomClasse`, `IdPromo`, `ecole`, `promo`) VALUES
('1', 'Groupe 1', '1', 'ECE', '2025'),
('2', 'Groupe 2', '1', 'ECE', '2025'),
('3', 'Groupe 1', '2', 'ECE', '2026'),
('4', 'Groupe 2', '2', 'ECE', '2026'),
('5', 'Groupe 1', '3', 'ECE', '2027'),
('6', 'Groupe 2', '3', 'ECE', '2027'),
('7', 'Groupe 1', '4', 'HEIP', '2025'),
('8', 'Groupe 2', '4', 'HEIP', '2025'),
('9', 'Groupe 1', '5', 'HEIP', '2026'),
('10', 'Groupe 2', '5', 'HEIP', '2026'),
('11', 'Groupe 1', '6', 'HEIP', '2027'),
('12', 'Groupe 2', '6', 'HEIP', '2027'),
('13', 'Groupe 1', '7', 'INSEEC', '2025'),
('14', 'Groupe 2', '7', 'INSEEC', '2025'),
('15', 'Groupe 1', '8', 'INSEEC', '2026'),
('16', 'Groupe 2', '8', 'INSEEC', '2026'),
('17', 'Groupe 1', '9', 'INSEEC', '2027'),
('18', 'Groupe 2', '9', 'INSEEC', '2027');

-- --------------------------------------------------------

--
-- Structure de la table `Competence`
--

CREATE TABLE `Competence` (
  `IdCompetence` decimal(2,0) NOT NULL,
  `nomCompetence` varchar(25) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `IdMatiere` decimal(2,0) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Competence`
--

INSERT INTO `Competence` (`IdCompetence`, `nomCompetence`, `description`, `IdMatiere`, `nomMatiere`, `ecole`, `promo`) VALUES
('1', 'Savoir parler', 'Etre capable de mettre des mots à la suite', '1', 'Informatique', 'HEIP', '2025'),
('2', 'Python', 'Je sais déclarer une variable', '1', 'Informatique', 'ECE', '2025');

-- --------------------------------------------------------

--
-- Structure de la table `CompetenceTransverse`
--

CREATE TABLE `CompetenceTransverse` (
  `IdCompetenceTransverse` decimal(2,0) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CompetenceTransverse`
--

INSERT INTO `CompetenceTransverse` (`IdCompetenceTransverse`, `nom`, `description`) VALUES
('1', 'Presentation', 'Je sais faire un powerpoint');

-- --------------------------------------------------------

--
-- Structure de la table `Ecole`
--

CREATE TABLE `Ecole` (
  `IdEcole` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Ecole`
--

INSERT INTO `Ecole` (`IdEcole`, `ecole`) VALUES
('1', 'ECE'),
('2', 'HEIP'),
('3', 'INSEEC');

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `IdEleve` decimal(2,0) NOT NULL,
  `nomEleve` varchar(25) NOT NULL,
  `prenomEleve` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  `IdClasse` decimal(2,0) NOT NULL,
  `nomClasse` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`IdEleve`, `nomEleve`, `prenomEleve`, `mail`, `mdp`, `IdUtilisateur`, `ecole`, `promo`, `IdClasse`, `nomClasse`) VALUES
('1', 'Subra', 'Antoine', 'AS@gmail.com', 'AS', '2', 'ECE', '2025', '1', 'Groupe 1'),
('2', 'Busetta', 'Paul', 'PB@gmail.com', 'PB', '5', 'ECE', '2026', '4', 'Groupe 2'),
('3', 'Nouaille-Degorce', 'Paul', 'PND@gmail.com', 'PND', '7', 'HEIP', '2027', '11', 'Groupe 1'),
('4', 'Huvelle', 'Baptiste', 'BH@gmail.com', 'BH', '8', 'INSEEC', '2026', '16', 'Groupe 1');

-- --------------------------------------------------------

--
-- Structure de la table `Matiere`
--

CREATE TABLE `Matiere` (
  `IdMatiere` decimal(2,0) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `nbHeures` decimal(3,0) NOT NULL,
  `IdProf` decimal(2,0) NOT NULL,
  `nomProf` varchar(25) NOT NULL,
  `ecole` varchar(25) NOT NULL,
  `promo` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Matiere`
--

INSERT INTO `Matiere` (`IdMatiere`, `nomMatiere`, `nbHeures`, `IdProf`, `nomProf`, `ecole`, `promo`) VALUES
('1', 'Informatique', '120', '1', 'Debize', 'ECE', '2025'),
('2', 'Informatique', '120', '1', 'Debize', 'ECE', '2026'),
('3', 'Informatique', '10', '1', 'Debize', 'INSEEC', '2025'),
('4', 'Physique', '120', '2', 'Dedecker', 'ECE', '2025'),
('5', 'Physique', '12', '2', 'Dedecker', 'HEIP', '2026'),
('6', 'Physique', '14', '2', 'Dedecker', 'INSEEC', '2025');

-- --------------------------------------------------------

--
-- Structure de la table `MatiereClasse`
--

CREATE TABLE `MatiereClasse` (
  `idClasse` decimal(2,0) NOT NULL,
  `idMatiere` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `idEleve` decimal(2,0) NOT NULL,
  `idMatiere` decimal(2,0) NOT NULL,
  `idCompetence` decimal(2,0) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Note`
--

INSERT INTO `Note` (`idEleve`, `idMatiere`, `idCompetence`, `note`) VALUES
('1', '1', '2', 1),
('1', '1', '2', 1),
('1', '1', '2', 1),
('1', '1', '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Prof`
--

CREATE TABLE `Prof` (
  `IdProf` decimal(2,0) NOT NULL,
  `nomProf` varchar(25) NOT NULL,
  `prenomProf` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `nomMatiere` varchar(25) NOT NULL,
  `IdUtilisateur` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Prof`
--

INSERT INTO `Prof` (`IdProf`, `nomProf`, `prenomProf`, `mail`, `mdp`, `nomMatiere`, `IdUtilisateur`) VALUES
('1', 'Debize', 'Laurent', 'LD@gmail.com', 'LD', 'Informatique', '1'),
('2', 'Dedecker', 'Samira', 'SD@gmail.com', 'SD', 'Physique', '4');

-- --------------------------------------------------------

--
-- Structure de la table `Promo`
--

CREATE TABLE `Promo` (
  `IdPromo` decimal(2,0) NOT NULL,
  `promo` decimal(4,0) NOT NULL,
  `IdEcole` decimal(2,0) NOT NULL,
  `ecole` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Promo`
--

INSERT INTO `Promo` (`IdPromo`, `promo`, `IdEcole`, `ecole`) VALUES
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
-- Structure de la table `TransverseEcole`
--

CREATE TABLE `TransverseEcole` (
  `idEcole` decimal(2,0) NOT NULL,
  `idCompetenceTransverse` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TransverseEcole`
--

INSERT INTO `TransverseEcole` (`idEcole`, `idCompetenceTransverse`) VALUES
('1', '1'),
('2', '1');

-- --------------------------------------------------------

--
-- Structure de la table `TransverseNote`
--

CREATE TABLE `TransverseNote` (
  `idCompetenceTransverse` decimal(2,0) NOT NULL,
  `idEleve` decimal(2,0) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TransverseNote`
--

INSERT INTO `TransverseNote` (`idCompetenceTransverse`, `idEleve`, `note`) VALUES
('1', '2', 1),
('1', '1', 0),
('1', '3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `IdUtilisateur` decimal(2,0) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `mdp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`IdUtilisateur`, `statut`, `mail`, `mdp`) VALUES
('1', 'Prof', 'LD@gmail.com', 'LD'),
('2', 'Eleve', 'AS@gmail.com', 'AS'),
('3', 'Admin', 'admin1@gmail.com', 'admin1'),
('4', 'Prof', 'SD@gmail.com', 'SD'),
('5', 'Eleve', 'PB@gmail.com', 'PB'),
('6', 'Admin', 'admin2@gmail.com', 'admin2'),
('7', 'Eleve', 'PND@gmail.com', 'PND'),
('8', 'Eleve', 'BH@gmail.com', 'BH');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`IdAdmin`),
  ADD KEY `utilisateurAdmin` (`IdUtilisateur`);

--
-- Index pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`IdClasse`),
  ADD KEY `classePromo` (`IdPromo`);

--
-- Index pour la table `Competence`
--
ALTER TABLE `Competence`
  ADD PRIMARY KEY (`IdCompetence`),
  ADD KEY `competenceMatiere` (`IdMatiere`);

--
-- Index pour la table `CompetenceTransverse`
--
ALTER TABLE `CompetenceTransverse`
  ADD PRIMARY KEY (`IdCompetenceTransverse`);

--
-- Index pour la table `Ecole`
--
ALTER TABLE `Ecole`
  ADD PRIMARY KEY (`IdEcole`);

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`IdEleve`),
  ADD KEY `utilisateur` (`IdUtilisateur`),
  ADD KEY `eleveClasse` (`IdClasse`);

--
-- Index pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD PRIMARY KEY (`IdMatiere`),
  ADD KEY `matiereProf` (`IdProf`);

--
-- Index pour la table `MatiereClasse`
--
ALTER TABLE `MatiereClasse`
  ADD KEY `matiere` (`idMatiere`),
  ADD KEY `classe` (`idClasse`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD KEY `noteCompetence` (`idCompetence`),
  ADD KEY `noteEleve` (`idEleve`),
  ADD KEY `noteMatiere` (`idMatiere`);

--
-- Index pour la table `Prof`
--
ALTER TABLE `Prof`
  ADD PRIMARY KEY (`IdProf`),
  ADD KEY `utilisateurProf` (`IdUtilisateur`);

--
-- Index pour la table `Promo`
--
ALTER TABLE `Promo`
  ADD PRIMARY KEY (`IdPromo`),
  ADD KEY `promoEcole` (`IdEcole`);

--
-- Index pour la table `TransverseEcole`
--
ALTER TABLE `TransverseEcole`
  ADD KEY `transverseEcole` (`idEcole`),
  ADD KEY `transverseCompetence` (`idCompetenceTransverse`);

--
-- Index pour la table `TransverseNote`
--
ALTER TABLE `TransverseNote`
  ADD KEY `transverseNote` (`idCompetenceTransverse`),
  ADD KEY `transverseEleve` (`idEleve`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`IdUtilisateur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `utilisateurAdmin` FOREIGN KEY (`IdUtilisateur`) REFERENCES `Utilisateur` (`IdUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD CONSTRAINT `classePromo` FOREIGN KEY (`IdPromo`) REFERENCES `Promo` (`IdPromo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Competence`
--
ALTER TABLE `Competence`
  ADD CONSTRAINT `competenceMatiere` FOREIGN KEY (`IdMatiere`) REFERENCES `Matiere` (`IdMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD CONSTRAINT `eleveClasse` FOREIGN KEY (`IdClasse`) REFERENCES `Classe` (`IdClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `Utilisateur` (`IdUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD CONSTRAINT `matiereProf` FOREIGN KEY (`IdProf`) REFERENCES `Prof` (`IdProf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `MatiereClasse`
--
ALTER TABLE `MatiereClasse`
  ADD CONSTRAINT `classe` FOREIGN KEY (`idClasse`) REFERENCES `Classe` (`IdClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matiere` FOREIGN KEY (`idMatiere`) REFERENCES `Matiere` (`IdMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `noteCompetence` FOREIGN KEY (`idCompetence`) REFERENCES `Competence` (`IdCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noteEleve` FOREIGN KEY (`idEleve`) REFERENCES `Eleve` (`IdEleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noteMatiere` FOREIGN KEY (`idMatiere`) REFERENCES `Matiere` (`IdMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Prof`
--
ALTER TABLE `Prof`
  ADD CONSTRAINT `utilisateurProf` FOREIGN KEY (`IdUtilisateur`) REFERENCES `Utilisateur` (`IdUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Promo`
--
ALTER TABLE `Promo`
  ADD CONSTRAINT `promoEcole` FOREIGN KEY (`IdEcole`) REFERENCES `Ecole` (`IdEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `TransverseEcole`
--
ALTER TABLE `TransverseEcole`
  ADD CONSTRAINT `transverseCompetence` FOREIGN KEY (`idCompetenceTransverse`) REFERENCES `CompetenceTransverse` (`IdCompetenceTransverse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transverseEcole` FOREIGN KEY (`idEcole`) REFERENCES `Ecole` (`IdEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `TransverseNote`
--
ALTER TABLE `TransverseNote`
  ADD CONSTRAINT `transverseEleve` FOREIGN KEY (`idEleve`) REFERENCES `Eleve` (`IdEleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transverseNote` FOREIGN KEY (`idCompetenceTransverse`) REFERENCES `CompetenceTransverse` (`IdCompetenceTransverse`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
