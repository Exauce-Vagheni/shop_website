-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Octobre 2023 à 05:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m_shoes`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE IF NOT EXISTS `achats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `statut` text NOT NULL,
  `livraison` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `achats`
--

INSERT INTO `achats` (`id`, `id_article`, `telephone`, `statut`, `livraison`) VALUES
(2, 2, 87642534, 'achete', ''),
(3, 3, 87642534, 'achete', 'yes'),
(4, 4, 87642534, 'achete', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `designation`, `description`, `photo`) VALUES
(1, 'Chaussures pour enfants', 'La categorie de tous les chaussures pour enfants du monde', 'b1da242aa6ccee3fb90355b287675c60dcc68b0a.jpg'),
(2, 'Chaussures pour Hommes', 'Ici tous les types de chaussures pour hommes qui existent', 'b75a0bf41a0b0f3842cca0b7a9b4ae374c08b78f.jpg'),
(3, 'Chaussures pour Dammes', 'toutes les chaussures des dames', 'decc259fa5bcfeb7a5584884bbb0c479f2de9392.jpg'),
(4, 'Chaussures pour bÃ©bÃ©s', 'chaussures pour bÃ©bÃ©s', '0451d21908618a36ec5eb73730425e478df27e4c.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `chaussures`
--

CREATE TABLE IF NOT EXISTS `chaussures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `photo` text NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `chaussures`
--

INSERT INTO `chaussures` (`id`, `nom`, `description`, `categorie`, `photo`, `prix`) VALUES
(2, 'Sandales', 'taille:10cm, couleur: noir', 4, '1958417f299805041c13894adccf1dc484a0d12a.jpg', 15),
(3, 'Nike Air Jordan', 'une belle chaussure pour les hommes', 1, 'd299ecfed340134bd9f7865d6b31c2fe65475071.jpg', 23),
(4, 'Puma Fenty', 'une belle chaussure pour hommes', 2, 'f8516bc4c822ec4d1bd463bf22a4bdbd156e898f.jpg', 200);

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE IF NOT EXISTS `identifiants` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `identifiants`
--

INSERT INTO `identifiants` (`username`, `password`) VALUES
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
