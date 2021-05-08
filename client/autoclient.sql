

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



DROP TABLE IF EXISTS `contactinfo`;
CREATE TABLE IF NOT EXISTS `contactinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



INSERT INTO `contactinfo` (`id`, `name`, `email`, `message`) VALUES
(1, 'Pham Son tung', 'phamsontung@hotmail.com', 'Bonjour'),
(2, 'giscard nasalan', 'giscardnasalan@gmail.com', 'Bonjour'),
(7, 'Laure', 'sa@hotmail.com', 'Bonjour'),
(8, 'Delacroix', 'Eugene@hotmail.com', 'Bonjour');



DROP TABLE IF EXISTS `password_recover`;
CREATE TABLE IF NOT EXISTS `password_recover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_user` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `date_recover` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO `password_recover` (`id`, `token_user`, `token`, `date_recover`) VALUES
(1, '', '23523bb888ebb8afb5f209bcef2e942b92a310bc68d92d4c', '2021-03-20 20:29:55'),
(2, '', 'f12d48f86793ae185d5af3a7a9191111c147b5e9a6ad50d9', '2021-03-20 20:31:34'),
(3, '', '4e656fa1da19ef9e055f530cf9bccd24fd6d6af080d16e89', '2021-03-20 20:35:48'),
(4, '', 'd48fdcf349877d09a6c8d5967f0c71295644798da5c37c70', '2021-03-20 20:39:42'),
(5, '', 'c3736403ed45f2138419cd17e9c9382132e677095630d294', '2021-03-21 18:24:43');



DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;



INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(29, 0, 'Bonne pÃƒÆ’Ã‚Â©dagogie !!!!', 'Chouaki ', '2021-03-05 13:21:02'),
(30, 0, 'Bonne ÃƒÆ’Ã‚Â©cole ', 'Martin', '2021-03-05 13:21:29'),
(31, 30, 'Merci de votre commentaire !', 'Moniteur', '2021-03-05 13:21:55'),
(32, 31, 'kkkkkkkkkkkkkkkkkkkkkkkkkk', 'Moniteur', '2021-03-05 13:22:05'),
(33, 0, 'Bonne ÃƒÆ’Ã‚Â©cole', 'Luc', '2021-03-05 14:00:23'),
(34, 33, 'merci !', 'Moniteur', '2021-03-05 14:00:39'),
(35, 0, 'Bonne ecole \r\n', 'Jean', '2021-04-16 00:19:54'),
(36, 0, 'azertugfepd', 'AZERTY', '2021-04-16 00:20:15'),
(37, 0, 'azertyuopjhgfdxfcgvhbjnk,l', 'AZERTY', '2021-04-16 00:21:42');



DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;



INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `ip`, `date_inscription`) VALUES
(2, 'sontungpham', 'sontungpham@hotmail.com', '$2y$12$MrCyP7MtLXBRbwoPTIDmHeldlh416b7sbles680xDQMUkVxdEj/SG', '::1', '2021-03-20 19:50:18'),
(3, 'giscardnasalan', 'giscardnasalan@yahoo.com', '$2y$12$BBBdiedsWraTzjiY/fxC0.R.oEYLdRFsANdgRNjjYY7XFcFF2JAwm', '::1', '2021-03-21 18:09:41'),
(4, 'linhchi', 'linhchi@moniris.com', '$2y$12$MyDG/M4hdSxFGq9IOetoqOtLqzPGJioi5e4hVfY1jLvfhlH02bn3W', '::1', '2021-03-21 19:18:29'),
(5, 'tom', 'tom@hotmail.com', '$2y$12$orhIS5iJTc2xX4URb9r2/O9pTzysNRtQsT/.eJdcrfctYsDo0LefS', '::1', '2021-03-23 10:26:13'),
(6, 'rominage', 'rominage@hotmail.com', '$2y$12$zqwfhY2KKLqyxfIqKkwhZuvivEcqjDTJ5nu1LecE65yXaaBMswV8K', '::1', '2021-03-24 09:04:32'),
(7, 'dcuhj', 'azis@hotmail.com', '$2y$12$mh4JeGfcFHX/1BHc2t0M9eDiBHFfP7JnU9o3Dmi7Sfj1.lph0t7dW', '::1', '2021-04-01 20:35:54'),
(8, 'rominage115', 'rominage115@hotmail.com', '$2y$12$SdC9lNds.rCSYrCcZaVjbOk9Td5o8lrdE2aM0GFwYF6mZrFUSaJxi', '::1', '2021-04-09 19:50:03'),
(9, 'rominage0511', 'rominage0511@htmail.com', '$2y$12$LUzUTx4AEg6gG.P4phTwL.p0SjZodlnkUBBZ9SzRvKuOAcNXSYcjm', '::1', '2021-04-09 19:57:06'),
(10, 'Chouaki75017', 'chouaki75@gmail.com', '$2y$12$Zt4onqs2440qNlELT2cn1uER0Q2DmzunHxn4OJ/c9FBF69xLxHhL.', '::1', '2021-04-14 17:03:26'),
(11, 'Spenzoooo', 'spenzo@hotmail.com', '$2y$12$QT5GZsW3HZa5m5VohcFuDuc94v66vLjb1UjpTALnN8P6KOhBD7HWm', '::1', '2021-04-16 02:23:31'),
(12, 'Chouaki75017', 'chouaki@yahoo.com', '$2y$12$6PKUB60qlv.M5LdXcDgSheGXdAMUZtSg1fVvX0xmUuZIpLyhZ6iqW', '::1', '2021-04-16 02:33:08');
COMMIT;
