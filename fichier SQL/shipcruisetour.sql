-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 jan. 2023 à 11:35
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shipcruisetour`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `ID_user` int(144) DEFAULT NULL,
  `ID_chambre` int(100) NOT NULL,
  `ID_navire` int(100) NOT NULL,
  `ID_type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `croisiere`
--

CREATE TABLE `croisiere` (
  `ID_croisiere` int(100) NOT NULL,
  `ID_navire` int(144) NOT NULL,
  `ID_user` int(144) DEFAULT NULL,
  `prix_croisiere` int(100) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `nbr_nuits` int(100) NOT NULL,
  `Port_dep` varchar(255) NOT NULL,
  `Port_Pause` varchar(255) NOT NULL,
  `Port_Finale` varchar(255) NOT NULL,
  `Date_dep` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `navire`
--

CREATE TABLE `navire` (
  `ID_user` int(144) DEFAULT NULL,
  `ID_navire` int(100) NOT NULL,
  `Nom_navire` varchar(255) NOT NULL,
  `nbr_chambre` int(100) NOT NULL,
  `nbr_place` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `navire`
--

INSERT INTO `navire` (`ID_user`, `ID_navire`, `Nom_navire`, `nbr_chambre`, `nbr_place`) VALUES
(2, 8, 'Enchantment of the Seas', 34, 70),
(2, 9, 'Voyager of the Seas', 12, 100),
(2, 10, 'Enchantment of the Seas', 19, 24),
(2, 11, 'Oasis of the Seas', 45, 200);

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `ID_user` int(144) DEFAULT NULL,
  `ID_port` int(100) NOT NULL,
  `Nom_port` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `ID_user` int(144) NOT NULL,
  `ID_Reservation` int(100) NOT NULL,
  `ID_croisiere` int(100) NOT NULL,
  `date_reservation` date NOT NULL DEFAULT current_timestamp(),
  `Prix_reservation` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

CREATE TABLE `type_chambre` (
  `ID_type` int(11) NOT NULL,
  `Nom_type` varchar(255) NOT NULL,
  `prix_type` int(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_chambre`
--

INSERT INTO `type_chambre` (`ID_type`, `Nom_type`, `prix_type`) VALUES
(1, 'ROOM DOUBLE DELUXE', 1000),
(2, 'ROOM DOUBLE ECONOMIQUE', 800),
(3, 'ROOM INDIVIDUELLE DELUXE', 500),
(4, 'ROOM INDIVIDUELLE ECONOMIQUE', 0),
(5, 'ROOM FAMILLIALE', 500);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(100) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `Role` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `Nom`, `Prenom`, `Email`, `password_user`, `Role`) VALUES
(2, 'fadwa', '', 'Salma@gmail.com', '$2y$10$mLgFazVKxaGtSC72AOtOy.5G88Gi9.njKI/goc.6bnra8lyIxCzU.', 1),
(3, 'salma', '', 'fgfds@gmail.com', '$2y$10$KbgdfJzp1/BYedgmoZHUh.3lWrQICI/iupS.dzD71EsMQNh4.QFIG', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`ID_chambre`),
  ADD KEY `ID_navire` (`ID_navire`),
  ADD KEY `ID_type` (`ID_type`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD PRIMARY KEY (`ID_croisiere`),
  ADD KEY `ID_navire` (`ID_navire`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `navire`
--
ALTER TABLE `navire`
  ADD PRIMARY KEY (`ID_navire`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`ID_port`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID_Reservation`),
  ADD KEY `ID_croisiere` (`ID_croisiere`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  ADD PRIMARY KEY (`ID_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `ID_chambre` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `croisiere`
--
ALTER TABLE `croisiere`
  MODIFY `ID_croisiere` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `navire`
--
ALTER TABLE `navire`
  MODIFY `ID_navire` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `ID_port` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID_Reservation` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`ID_navire`) REFERENCES `navire` (`ID_navire`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`ID_type`) REFERENCES `type_chambre` (`ID_type`),
  ADD CONSTRAINT `chambre_ibfk_3` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD CONSTRAINT `croisiere_ibfk_1` FOREIGN KEY (`ID_navire`) REFERENCES `navire` (`ID_navire`),
  ADD CONSTRAINT `croisiere_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `navire`
--
ALTER TABLE `navire`
  ADD CONSTRAINT `navire_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `port`
--
ALTER TABLE `port`
  ADD CONSTRAINT `port_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ID_croisiere`) REFERENCES `croisiere` (`ID_croisiere`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
