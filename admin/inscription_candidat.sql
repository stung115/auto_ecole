

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `type_examen` varchar(50) NOT NULL,
  `nom_candidat` varchar(50) NOT NULL,
  `prenom_candidat` varchar(50) NOT NULL,
  `heure` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;



INSERT INTO `code` (`id`, `adresse`, `code_postal`, `ville`, `type_examen`, `nom_candidat`, `prenom_candidat`, `heure`) VALUES
(6, '20 boulevard du couchant', '92007', 'Nanterre ', 'Permis B ', 'Depardieu', 'Eric', '17:00');



DROP TABLE IF EXISTS `conduite`;
CREATE TABLE IF NOT EXISTS `conduite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_con` varchar(50) NOT NULL,
  `code_postal_con` varchar(50) NOT NULL,
  `ville_con` varchar(50) NOT NULL,
  `type_examen_con` varchar(50) NOT NULL,
  `nom_candidat_con` varchar(50) NOT NULL,
  `prenom_candidat_con` varchar(50) NOT NULL,
  `heure_con` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;



INSERT INTO `conduite` (`id`, `adresse_con`, `code_postal_con`, `ville_con`, `type_examen_con`, `nom_candidat_con`, `prenom_candidat_con`, `heure_con`) VALUES
(10, '4 rue des acacias ', '92000', 'Nanterre', 'B ', 'Ettarnichi', 'Faissal', '17:15');



DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `mel` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tel` char(10) CHARACTER SET utf8 NOT NULL,
  `obj` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mess` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;



INSERT INTO `login` (`id`, `username`, `password`) VALUES
(13, 'admin', '0c7540eb7e65b553ec1ba6b20de79608'),
(14, 'admin', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c'),
(16, 'azerty@hotmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(17, 'azerty@hotmail.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(18, 'azerty123@hotmail.fr', '3b004ac6d8a602681f5ee3587c924855679e21d9'),
(19, 'azertyuiop@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');



DROP TABLE IF EXISTS `moniteur`;
CREATE TABLE IF NOT EXISTS `moniteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;



INSERT INTO `moniteur` (`id`, `nom`, `prenom`, `mail`, `tel`) VALUES
(50, 'Ettarnichi', 'Faissal', 'faissal@hotmail.com', '0769175371'),
(51, 'Kiry Ilo ', 'Carson', 'kiry@gmail.com', '0652458525'),
(52, 'Dupond', 'Pierre', 'pierre@gmail.com', '0652145285'),
(53, 'Depardieu', 'Jeanne', 'jeanne928@yahoo.com', '0785459658'),
(55, 'Alaoui', 'Abdel', 'abdel.alaoui@outlook.com', '0652369856');


DROP TABLE IF EXISTS `moto`;
CREATE TABLE IF NOT EXISTS `moto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(255) CHARACTER SET utf8 NOT NULL,
  `annee` varchar(255) CHARACTER SET utf8 NOT NULL,
  `immatriculation` varchar(10) CHARACTER SET utf8 NOT NULL,
  `kilometrage` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;


INSERT INTO `moto` (`id`, `modele`, `annee`, `immatriculation`, `kilometrage`) VALUES
(3, 'kawazaki z800', '2018', 'QH-082-QS', '25000km'),
(4, 'kawazaki z800', '2014', 'SJ-092-JS', '98000km'),
(5, 'kawazaki z800', '2021', 'SJ-258-LC', '4504km'),
(6, 'kawazaki z800', '2005', 'HC-081-SB', '150487km'),
(7, 'kawazaki z800', '2012', 'QS-560-SD', '26555km');



DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_candidat` varchar(50) NOT NULL,
  `prenom_candidat` varchar(50) NOT NULL,
  `intitule_lecon` varchar(50) NOT NULL,
  `datep` varchar(10) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(255) CHARACTER SET utf8 NOT NULL,
  `heuref` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`id`, `nom_candidat`, `prenom_candidat`, `intitule_lecon`, `datep`, `heure`, `heuref`) VALUES
(30, 'PHAM', 'Tung', 'Lecon1 ', '2020-02-10', '10:00', '15:00');


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');


DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `sexe` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_de_naissance` varchar(10) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` char(20) NOT NULL,
  `adresse_mail` varchar(250) NOT NULL,
  `etablissement` varchar(250) NOT NULL,
  `formule` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;


INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `sexe`, `date_de_naissance`, `adresse`, `code_postal`, `ville`, `telephone`, `adresse_mail`, `etablissement`, `formule`) VALUES
(79, 'Dupont', 'Martin', 'M', '2000-01-15', '4 rue des acacias ', 92000, 'Nanterre', '7777777777', 'Martin@hotmail.com', 'Iris', 'Permis A');



DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(50) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `immatriculation` varchar(10) NOT NULL,
  `kilometrage` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;



INSERT INTO `voiture` (`id`, `modele`, `annee`, `immatriculation`, `kilometrage`) VALUES
(5, 'Citroen C3', '20012', 'CZ-071-YP', '63000km'),
(6, 'Citroen C3', '2016', 'DN-392-SG', '25604km'),
(7, 'Citroen C3', '2012', 'DZ-186-BD', '48520km'),
(8, 'Citroen C3', '2012', 'FH-927-BG', '114058km'),
(9, 'Citroen C3', '2010', 'AY-081-DF', '48648km'),
(13, 'ds3', '2018', 'AZ-785-QV', '25555km');
COMMIT;

