-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 30 sep. 2018 à 17:00
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_mit`
--

-- --------------------------------------------------------

--
-- Structure de la table `tm_user`
--

DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE IF NOT EXISTS `tm_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_nom` varchar(256) NOT NULL,
  `u_prenom` varchar(256) NOT NULL,
  `u_mail` varchar(256) NOT NULL,
  `u_password` varchar(256) NOT NULL,
  `u_salt` varchar(256) NOT NULL,
  `u_role` varchar(256) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tm_user`
--

INSERT INTO `tm_user` (`u_id`, `u_nom`, `u_prenom`, `u_mail`, `u_password`, `u_salt`, `u_role`) VALUES
(3, 'barkati', 'mouad', 'root', '$2y$12$1GpRrxqiUrDUw70MOODYk.4xPLEjBSHgYgbnhC87XK09aeUA2Sm6a', 'snglmzf5ycgg80co0sg4cokcs8sskco', 'N;');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
