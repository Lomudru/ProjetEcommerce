-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 19 jan. 2024 à 13:18
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `categorie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `categorie`) VALUES
(1, 'haut'),
(2, 'bas');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commande_id` int(10) UNSIGNED NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `commande_content` varchar(200) NOT NULL,
  `statut` enum('NEW','SENT','FINISHED','CANCELED','RETURN_USER') NOT NULL,
  `date` datetime NOT NULL,
  `date_maj` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`commande_id`, `adresse`, `commande_content`, `statut`, `date`, `date_maj`, `user_id`) VALUES
(2, '11 rue des petits chiens', '[\"4\",\"4\"]', 'NEW', '2024-01-18 10:44:22', NULL, 1),
(3, 'test', '[\"3\"]', 'NEW', '2024-01-18 10:45:56', NULL, 1),
(4, 'test2', '[\"1\"]', 'NEW', '2024-01-18 10:47:58', NULL, 1),
(6, 'aa', '[\"3\",\"4\"]', 'NEW', '2024-01-18 11:25:22', NULL, 1),
(7, '11 rue des petit chien', '[\"4\",\"4\"]', 'NEW', '2024-01-18 16:38:48', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `commentaire_note` int(11) DEFAULT NULL,
  `commentaire_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`commentaire_id`, `user_id`, `v_id`, `commentaire_note`, `commentaire_message`) VALUES
(1, 1, 4, 1, 'NUL NUL NUL'),
(2, 1, 4, 3, 'OK'),
(3, 1, 4, 5, 'Genial'),
(5, 1, 1, 4, 'zadzada');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `email`, `mdp`, `role`) VALUES
(1, 'test@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vetements`
--

CREATE TABLE `vetements` (
  `v_id` int(10) UNSIGNED NOT NULL,
  `taille` varchar(200) DEFAULT NULL,
  `couleur` varchar(200) DEFAULT NULL,
  `matiere` varchar(200) DEFAULT NULL,
  `prix` int(10) UNSIGNED DEFAULT NULL,
  `sexe` enum('HOMME','FEMME') DEFAULT NULL,
  `categorie_id` int(10) UNSIGNED DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetements`
--

INSERT INTO `vetements` (`v_id`, `taille`, `couleur`, `matiere`, `prix`, `sexe`, `categorie_id`, `stock`, `nom`) VALUES
(1, 'S', 'rouge', 'bois', 12, 'HOMME', 1, 10, 'T-Shirt'),
(2, 'M', 'gris', 'Coton', 150, 'HOMME', 1, 50, 'Sweat'),
(3, 'S', 'bleu', 'jean', 20, 'FEMME', 2, 98, 'jean'),
(4, 'S', 'gris', 'jean', 12, 'FEMME', 2, 1, 'Short');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`commentaire_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `vetements`
--
ALTER TABLE `vetements`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vetements`
--
ALTER TABLE `vetements`
  MODIFY `v_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vetements`
--
ALTER TABLE `vetements`
  ADD CONSTRAINT `vetements_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`categorie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
