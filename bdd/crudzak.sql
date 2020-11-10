-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 nov. 2020 à 16:06
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crudzak`
--

-- --------------------------------------------------------

--
-- Structure de la table `produitzak`
--

CREATE TABLE `produitzak` (
  `id_prod` int(11) NOT NULL,
  `lieux_achat` varchar(100) NOT NULL,
  `nom_prod` varchar(100) NOT NULL,
  `ref_prod` varchar(50) NOT NULL,
  `cate_prod` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `fin_garantie` date NOT NULL,
  `prix_prod` decimal(7,2) NOT NULL,
  `ticket_prod` varchar(255) NOT NULL,
  `manuel_prod` varchar(255) NOT NULL,
  `conseil_util` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produitzak`
--

INSERT INTO `produitzak` (`id_prod`, `lieux_achat`, `nom_prod`, `ref_prod`, `cate_prod`, `date_achat`, `fin_garantie`, `prix_prod`, `ticket_prod`, `manuel_prod`, `conseil_util`) VALUES
(1, 'Evry', 'tv samsung', 'ref123', 'hifi', '2020-11-01', '2022-11-01', '99.99', '', '', 'ne pas laver'),
(2, 'corbeil', 'pc samsung', 'ref456', 'informatique', '2020-10-01', '2022-10-01', '100.99', '', '', 'ne pas casser');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `email`, `password`) VALUES
(1, 'azer@zak', '1234'),
(2, 'qsdf@zak', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produitzak`
--
ALTER TABLE `produitzak`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produitzak`
--
ALTER TABLE `produitzak`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
