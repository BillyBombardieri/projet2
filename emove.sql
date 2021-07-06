-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : lun. 05 juil. 2021 à 08:53
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emove`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210531140034', '2021-06-28 12:37:02', 68),
('DoctrineMigrations\\Version20210531141734', '2021-06-28 12:37:02', 47),
('DoctrineMigrations\\Version20210531142504', '2021-06-28 12:37:02', 261),
('DoctrineMigrations\\Version20210531152025', '2021-06-28 12:37:02', 114),
('DoctrineMigrations\\Version20210629091327', '2021-06-29 09:13:31', 128),
('DoctrineMigrations\\Version20210629094203', '2021-06-29 09:43:27', 43),
('DoctrineMigrations\\Version20210629133423', '2021-07-01 13:07:35', 90);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idvehicule` int NOT NULL,
  `temps` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `iduser`, `idvehicule`, `temps`) VALUES
(15, 4, 1, 2),
(16, 4, 4, 2),
(17, 4, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datedenaissance` date NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` int NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `numeropermisconduire` varchar(11) NOT NULL,
  `id` int NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `prenom`, `datedenaissance`, `email`, `telephone`, `adresse`, `numeropermisconduire`, `id`, `password`, `roles`) VALUES
('Bombardieri', 'Billy', '2016-01-01', 'billy.bombardieri@hotmail.com', 646139662, '12 rue du clos girard', '7', 2, '$2y$13$svHFYP5jh4bAk0Agzu0zWenz/.QYMTjsXBlIMdItoGURW4QUGPhY2', '[1]'),
('bom', 'billy', '2016-01-01', 'bb@hotmail.Com', 123456789, '12 adress', '123', 4, '$2y$13$GyWTKaHa5LYrOBIlSGcIIu1BuGmeIma7TttrSoMqjYc.2IHHLoVim', '[2]');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `type` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `numeroserie` varchar(15) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `plaqueimmatriculation` varchar(9) NOT NULL,
  `nbkilometre` int NOT NULL,
  `dateachat` date NOT NULL,
  `prixachat` int NOT NULL,
  `id` int NOT NULL,
  `dureelocation` int NOT NULL,
  `disponible` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`type`, `marque`, `modele`, `numeroserie`, `couleur`, `plaqueimmatriculation`, `nbkilometre`, `dateachat`, `prixachat`, `id`, `dureelocation`, `disponible`) VALUES
('voiture', 'es', 'A3', 'ze', 'edfr', 'az-123-ER', 2, '2018-10-26', 4, 1, 4, 1),
('scooter', 'audi', 'azezr', 'aezrtyuiop', 'a', 'az-123-ER', 3, '2018-10-26', 5, 2, 4, 1),
('voiture', 'citroen', 'C5', 'ze', 'NOIR', 'az-123-ER', 2, '2018-10-26', 2, 3, 1, 1),
('voiture', 'citroen', 'C5', 'ze', 'NOIR', 'az-123-ER', 2, '2018-10-26', 2, 4, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`iduser`),
  ADD KEY `id_vehicule` (`idvehicule`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idvehicule`) REFERENCES `vehicule` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
