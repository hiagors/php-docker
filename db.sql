CREATE DATABASE `api`;

CREATE TABLE `Tokens_autorizados` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `token` varchar(150) NOT NULL,
  `status` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Usuarios` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;