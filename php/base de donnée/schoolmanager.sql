-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 juin 2021 à 14:54
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `schoolmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `mail`) VALUES
(1, 'Mohamed Bah', 'mohamed1234', 'badtobad@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `duration`, `image`, `description`) VALUES
(1, 'Web developement', '3 ans', 'web.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard '),
(2, 'Reseaux Telecom\'', '2 ans', 'network.png\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard ');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'En attente',
  `password` varchar(255) NOT NULL,
  `faculty` int(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `name`, `date_of_birth`, `mail`, `status`, `password`, `faculty`, `year`) VALUES
(1, 'Abdou Aziz Ndiaye', '15/06/2000', 'abdouaziznjay@gmail.com', 'En attente', 'pes123456', 1, 'Licence 2'),
(2, 'Salimata Gueye', '25/08/2008', 'sali@gmail.com', 'En attente', 'akunamatata123', 2, 'Licence 1'),
(3, 'Yacine Ndiaye', '09/12/2001', 'yassine@gmail', 'En attente', 'myd234', 1, 'license 3'),
(6, 'Abdou Ndiaye', '05/12/2003', 'abdouaziz@gmail.com', 'En attente', 'darkcode', 1, 'License 3'),
(7, 'Babacar Diop', '06/01/1995', 'babs@gmail.com', 'En attente', 'babacar123456', 1, 'Licence 3'),
(8, 'Bathie Faye', '24/12/1999', 'thiba@gmail.com', 'En attente', 'gta1234', 1, 'Licence 3'),
(12, 'Jule NDiaye Diop', '24/12/2005', 'souley@yahoo.fr', 'En attente', 'passer12345', 1, 'Licence 2'),
(13, 'Wahab Ly', '24/12/2005', 'wahab@yahoo.fr', 'En attente', 'passer12345', 1, 'Licence 2'),
(14, 'Ibou ', '1999-06-02', 'bsjsala@gmail.com', 'En attente', 'pes123456', 1, 'License 17'),
(16, 'ABDOU AZIZ MBODJ', '', '', 'En attente', '', 1, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty` (`faculty`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
