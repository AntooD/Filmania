-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 20 déc. 2021 à 21:13
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `films`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`, `prenom`) VALUES
(1, 'Di Caprio', 'Leonardo'),
(2, 'Winslet', 'Kate'),
(3, 'Gibson', 'Mel'),
(5, 'Depp', 'Johnny'),
(6, 'Cumbeerbatch', 'Benedict'),
(8, 'Swamp', 'Shrek');

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `id` int NOT NULL,
  `idFilm` int NOT NULL,
  `idActeur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `casting`
--

INSERT INTO `casting` (`id`, `idFilm`, `idActeur`) VALUES
(2, 6, 1),
(11, 1645, 1);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `annee` int NOT NULL,
  `score` float NOT NULL,
  `vote` int NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `annee`, `score`, `vote`, `path`) VALUES
(1, 'Star Wars', 1977, 8.9, 14182, ''),
(2, 'Pulp Fiction', 1994, 8.4, 11693, ''),
(4, 'Titanic', 1997, 9.2, 8129, ''),
(6, 'Empire Strikes Back, The', 1980, 10.5, 2, ''),
(7, 'Shawshank Redemption, The', 1994, 8.8, 7850, ''),
(8, 'Independence Day', 1996, 7, 7138, ''),
(9, 'Usual Suspects, The', 1995, 8.7, 6981, ''),
(10, 'Raiders of the Lost Ark', 1981, 8.4, 6488, ''),
(12, 'Forrest Gump', 1994, 7.8, 6269, ''),
(14, 'Silence of the Lambs, The', 1991, 8.3, 5715, ''),
(15, 'Princess Bride, The', 1987, 8.4, 5522, ''),
(16, 'Terminator 2: Judgment Day', 1991, 8, 5513, ''),
(18, 'Monty Python and the Holy Grail', 1974, 8.4, 5319, ''),
(19, 'Star Trek: First Contact', 1996, 8.2, 5298, ''),
(20, 'Fargo', 1996, 8.2, 5293, ''),
(21, 'Twelve Monkeys', 1995, 8, 5287, ''),
(22, 'Trainspotting', 1996, 8.1, 5233, ''),
(24, 'Se7en', 1995, 8.1, 5107, ''),
(26, 'Rock, The', 1996, 8, 4938, ''),
(27, 'Reservoir Dogs', 1992, 8.3, 4861, ''),
(31, 'Clockwork Orange, A', 1971, 11.4, 3, ''),
(32, 'Jurassic Park', 1993, 7.4, 4707, ''),
(33, 'English Patient, The', 1996, 8.1, 4689, ''),
(34, 'One Flew Over the Cuckoo\'s Nest', 1975, 8.5, 4545, ''),
(35, 'Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb', 1963, 8.6, 4451, ''),
(48, 'True Lies', 1994, 7.3, 3601, ''),
(94, 'Total Recall', 1990, 7.1, 2305, ''),
(180, 'Predator', 1987, 7.2, 1604, ''),
(263, 'Conan the Barbarian', 1981, 6.9, 1271, ''),
(334, 'Last Action Hero', 1993, 5.9, 1107, ''),
(410, 'Dave', 1993, 12.4, 5, ''),
(440, 'Kindergarten Cop', 1990, 6.2, 894, ''),
(471, 'Running Man, The', 1987, 6.3, 856, ''),
(629, 'Commando', 1985, 6.1, 673, ''),
(793, 'Money Pit, The', 1986, 5.8, 482, ''),
(932, 'Red Heat', 1988, 5.8, 402, ''),
(960, 'Terminator 2: 3-D', 1996, 8.7, 384, ''),
(975, 'Night Shift', 1982, 6.6, 377, ''),
(1339, 'Jingle All the Way', 1996, 6, 262, ''),
(1353, 'Outrageous Fortune', 1987, 6.1, 258, ''),
(1551, 'Raw Deal', 1986, 5, 215, ''),
(1644, 'Red Sonja', 1985, 4.6, 404, ''),
(1645, 'Dark City', 1998, 12, 3, 'upload/131225979851zIUQDAQtL._AC_.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `privilege` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `pwd`, `privilege`) VALUES
(11, 'admin@gmail.com', '$2y$10$ViAkXxXgA4lXyn35P1RUD.8JJfpLBFBLZvktI1gkzTo5AvMcNZM06', 1),
(13, 'user@gmail.com', '$2y$10$/BjME5UErZYx9vX0iS57t.99vsQZRhgOaQndCAykdSayqbMoJ1E6K', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casting_acteur` (`idActeur`),
  ADD KEY `fk_casting_film` (`idFilm`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`movie_id`,`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `casting`
--
ALTER TABLE `casting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1653;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `fk_casting_acteur` FOREIGN KEY (`idActeur`) REFERENCES `acteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_casting_film` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
