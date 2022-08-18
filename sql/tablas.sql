CREATE DATABASE qatarclic;

USE qatarclic;

CREATE TABLE roles (
    id int(2) NOT NULL AUTO_INCREMENT,
    rol varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `roles` VALUES ('1', 'Moderador'),('2', 'Administrador');

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    username varchar(20) NOT NULL UNIQUE,
    password varchar(500),
    rol_id int(2),
    PRIMARY KEY(id),
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`)
);

INSERT INTO `users` VALUES('1', 'liberfedericomanuel@gmail.com', 'FeduuML', '$2y$10$nDIaj0iEP2PDoyqj2vwttex9UEhqoBOJMth43n1L0EYRXVVUbTMXC'/*Contraseña: federico1*/, NULL);
/*SOLO ESTA cuenta permite recuperar contraseña!*/
INSERT INTO `users` VALUES('2', 'matefer@outlook.com', 'MateFer', '$2y$10$9Cj9EiFXmTcH3ZXsGVMLjuU..RzfVWgsFS./oGpPPl7mTM/WBTnPu'/*Contraseña: ferchomate911*/, '1');
SELECT r.rol FROM roles r WHERE r.rol = 1;
INSERT INTO `users` VALUES('3', 'lorranktn@fortnite.com', 'Lorrrran', '$2y$10$We802Kpgy9gzRiYyttmM/eBeOhiXiRr6//htdWLpJdfjTWMzyItfG'/*Contraseña: AmoFortnite*/, '2');
SELECT r.rol FROM roles r WHERE r.rol = 2;
INSERT INTO `users` VALUES('4', 'pochichaves04@gmail.com', 'MaxiChaves18', '$2y$10$kCv3Xbd0HSa66qoHtaduEetWr0wmBjBbNmCu3q6xqZD/T7yOAOX3i'/*Contraseña: SoyPochi18*/, NULL);

CREATE TABLE teams (
    id int(36) NOT NULL AUTO_INCREMENT,
    nombre varchar(30) NOT NULL,
    grupo varchar(1) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `teams` VALUES
('1', 'Qatar', 'A'),('2', 'Ecuador', 'A'),('3', 'Senegal', 'A'),('4','Paises Bajos', 'A'),
('5', 'Inglaterra', 'B'),('6', 'Iran', 'B'),('7', 'Estados Unidos', 'B'),('8','Gales', 'B'),
('9', 'Argentina', 'C'),('10', 'Arabia Saudita', 'C'),('11', 'Mexico', 'C'),('12','Polonia', 'C'),
('13', 'Francia', 'D'),('14', 'Australia', 'D'),('15', 'Dinamarca', 'D'),('16', 'Tunez', 'D'),
('17', 'España', 'E'),('18', 'Costa Rica', 'E'),('19', 'Alemania', 'E'),('20','Japon', 'E'),
('21', 'Belgica', 'F'),('22', 'Canada', 'F'),('23', 'Marruecos', 'F'),('24','Croacia', 'F'),
('25', 'Brasil', 'G'),('26', 'Serbia', 'G'),('27', 'Suiza', 'G'),('28','Camerun', 'G'),
('29', 'Portugal', 'H'),('30', 'Ghana', 'H'),('31', 'Uruguay', 'H'),('32','Corea del Sur', 'H');

CREATE TABLE `news` (
    `id` int(2) NOT NULL,
    `user` varchar(20) NOT NULL,
    `title` text NOT NULL,
    `content` text NOT NULL,
    `image` varchar (255) NOT NULL,
    `date` date NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE players-ecuador (
    id int(2) NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    numero int(2) NOT NULL,
    edad int(2) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `players-ecuador` VALUES
('1', 'Hernán Galíndez', '1', '35'),('2', 'Alexander Domínguez', '22', '35'),('3', 'Piero Hincapié', '3', '20'),('4','Félix Torres', '2', '25'),
('5', 'Jackson Porozo', '14', '21'),('6', 'Robert Arboleda', '4', '30'),('7', 'Xavier Arreaga', '14', '27'),('8','Pervis Estupiñán', '7', '24'),
('9', 'Diego Palacios', '18', '23'),('10', 'Byron Castillo', '6', '23'),('11', 'Angelo Preciado', '17', '24'),('12','Carlos Gruezo', '8', '27'),
('13', 'Jhegson Méndez', '32', '25'),('14', 'Dixon Arroyo', '5', '30'),('15', 'José Cifuentes', '20', '23'),('16', 'Moisés Caicedo', '23', '20'),
('17', 'Alan Franco', '21', '23'),('18', 'Jeremy Sarmiento', '16', '20'),('19', 'Romario Ibarra', '10', '27'),('20','Alexander Alvarado', '5', '23'),
('21', 'Gonzalo Plata', '19', '21'),('22', 'Ángel Mena', '15', '34'),('23', 'Michael Estrada', '11', '26'),('24','Enner Valencia', '13', '32'),
('25', 'Jordy Caicedo', '11', '24'),('26', 'Leonardo Campana', '9', '22'),('27', 'Djorkaeff Reasco', '10', '23');

CREATE TABLE players-holanda (
    id int(2) NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    numero int(2) NOT NULL,
    edad int(2) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `players-holanda` VALUES
('1', 'Mark Flekken', '13', '29'),('2', 'Jasper Cillesen', '1', '33'),('3', 'Kjell Scherpen', '23', '22'),('4','Matthijs de Ligt', '3', '22'),
('5', 'Jurrien Timber', '2', '21'),('6', 'Stefan de Vrij', '6', '30'),('7', 'Nathan Aké', '6', '27'),('8','Jordan Teze', '2', '22'),
('9', 'Bruno Martins Indi', '4', '30'),('10', 'Tyrell Malacia', '5', '22'),('11', 'Daley Blind', '17', '32'),('12','Hans Hateboer', '15', '28'),
('13', 'Jhegson Méndez', '32', '25'),('14', 'Dixon Arroyo', '5', '30'),('15', 'José Cifuentes', '20', '23'),('16', 'Moisés Caicedo', '23', '20'),
('17', 'Alan Franco', '21', '23'),('18', 'Jeremy Sarmiento', '16', '20'),('19', 'Romario Ibarra', '10', '27'),('20','Alexander Alvarado', '5', '23'),
('21', 'Gonzalo Plata', '19', '21'),('22', 'Ángel Mena', '15', '34'),('23', 'Michael Estrada', '11', '26'),('24','Enner Valencia', '13', '32'),
('25', 'Jordy Caicedo', '11', '24'),('26', 'Leonardo Campana', '9', '22'),('27', 'Djorkaeff Reasco', '10', '23');