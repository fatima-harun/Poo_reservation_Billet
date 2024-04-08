-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 07 avr. 2024 à 22:22
-- Version du serveur : 8.0.36
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationbillet`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id` int NOT NULL,
  `prix` int NOT NULL,
  `dateReservation` date NOT NULL,
  `heureReservation` time NOT NULL,
  `id_trajet` int DEFAULT NULL,
  `id_datedepart` int DEFAULT NULL,
  `id_heuredepart` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL,
  `id_statut` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `prix`, `dateReservation`, `heureReservation`, `id_trajet`, `id_datedepart`, `id_heuredepart`, `id_classe`, `id_statut`) VALUES
(1, 15000, '2024-04-03', '14:59:22', 6, 2, 2, 4, 1),
(2, 1500, '2024-12-04', '17:00:01', 1, 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int NOT NULL,
  `libelle` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `libelle`) VALUES
(1, 'Première Classe'),
(2, 'Classe économique'),
(3, 'Classe affaires'),
(4, 'Classe premium');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` int NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `datedepart`
--

CREATE TABLE `datedepart` (
  `id` int NOT NULL,
  `libelle` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `datedepart`
--

INSERT INTO `datedepart` (`id`, `libelle`) VALUES
(1, '2024-04-18'),
(2, '2024-04-22'),
(3, '2024-04-30'),
(4, '2024-05-01'),
(5, '2024-05-12'),
(6, '2024-05-22'),
(7, '2024-05-10'),
(8, '2024-04-26'),
(9, '2024-05-13'),
(10, '2024-05-18'),
(11, '2024-05-03'),
(12, '2024-05-20'),
(13, '2024-06-11');

-- --------------------------------------------------------

--
-- Structure de la table `heuredepart`
--

CREATE TABLE `heuredepart` (
  `id` int NOT NULL,
  `libelle` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `heuredepart`
--

INSERT INTO `heuredepart` (`id`, `libelle`) VALUES
(1, '11:07:01'),
(2, '18:25:00'),
(3, '20:08:42'),
(4, '22:40:42'),
(5, '07:09:27'),
(6, '10:19:27'),
(7, '05:20:03'),
(8, '03:26:03'),
(9, '21:30:39'),
(10, '17:10:39');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int NOT NULL,
  `libelle` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`) VALUES
(1, 'Confirmé'),
(2, 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id` int NOT NULL,
  `libelle` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id`, `libelle`) VALUES
(1, 'Dakar-New York '),
(2, 'Dakar-Madrid '),
(3, 'Dakar-Casablanca'),
(4, 'Dakar-Bruxelles'),
(5, 'Dakar-Montréal'),
(6, 'Dakar-Milan'),
(7, 'Dakar-Lisbonne'),
(8, 'Dakar-Londres'),
(9, 'Dakar-Abidjan'),
(10, 'Dakar-Bamako'),
(11, 'Dakar-Banjul'),
(12, 'Dakar-Conakry'),
(13, 'Dakar-Nouakchott');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trajet` (`id_trajet`),
  ADD KEY `id_datedepart` (`id_datedepart`),
  ADD KEY `id_heuredepart` (`id_heuredepart`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `datedepart`
--
ALTER TABLE `datedepart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `heuredepart`
--
ALTER TABLE `heuredepart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `datedepart`
--
ALTER TABLE `datedepart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `heuredepart`
--
ALTER TABLE `heuredepart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`id_trajet`) REFERENCES `trajet` (`id`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`id_datedepart`) REFERENCES `datedepart` (`id`),
  ADD CONSTRAINT `billet_ibfk_3` FOREIGN KEY (`id_heuredepart`) REFERENCES `heuredepart` (`id`),
  ADD CONSTRAINT `billet_ibfk_4` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `billet_ibfk_5` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
