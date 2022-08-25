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
    cooldown_password timestamp NULL,
    cooldown_username timestamp NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`)
);

INSERT INTO `users` VALUES('1', 'liberfedericomanuel@gmail.com', 'FeduuML', '$2y$10$nDIaj0iEP2PDoyqj2vwttex9UEhqoBOJMth43n1L0EYRXVVUbTMXC'/*Contraseña: federico1*/, NULL, NULL, NULL);
/*SOLO ESTA cuenta permite recuperar contraseña!*/
INSERT INTO `users` VALUES('2', 'matefer@outlook.com', 'MateFer', '$2y$10$9Cj9EiFXmTcH3ZXsGVMLjuU..RzfVWgsFS./oGpPPl7mTM/WBTnPu'/*Contraseña: ferchomate911*/, '1', NULL, NULL);
SELECT r.rol FROM roles r WHERE r.rol = 1;
INSERT INTO `users` VALUES('3', 'lorranktn@fortnite.com', 'Lorrrran', '$2y$10$We802Kpgy9gzRiYyttmM/eBeOhiXiRr6//htdWLpJdfjTWMzyItfG'/*Contraseña: AmoFortnite*/, '2', NULL, NULL);
SELECT r.rol FROM roles r WHERE r.rol = 2;
INSERT INTO `users` VALUES('4', 'pochichaves04@gmail.com', 'MaxiChaves18', '$2y$10$kCv3Xbd0HSa66qoHtaduEetWr0wmBjBbNmCu3q6xqZD/T7yOAOX3i'/*Contraseña: SoyPochi18*/, NULL, NULL, NULL);

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
    `id` int(2) NOT NULL AUTO_INCREMENT,
    `user` varchar(20) NOT NULL,
    `title` text NOT NULL,
    `content` text NOT NULL,
    `image` varchar (255) NOT NULL,
    `datetime` datetime NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `players` (
    id int(3) NOT NULL AUTO_INCREMENT,
    nombre varchar(75) NOT NULL,
    pais varchar(30) NOT NULL,
    numero int(2) NOT NULL,
    edad int(2) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `players` VALUES
('1', 'Hernán Galíndez', 'Ecuador', '1', '35'),('2', 'Alexander Domínguez', 'Ecuador', '22', '35'),('3', 'Piero Hincapié', 'Ecuador', '3', '20'),('4','Félix Torres', 'Ecuador', '2', '25'),
('5', 'Jackson Porozo', 'Ecuador', '14', '21'),('6', 'Robert Arboleda', 'Ecuador', '4', '30'),('7', 'Xavier Arreaga', 'Ecuador', '14', '27'),('8','Pervis Estupiñán', 'Ecuador', '7', '24'),
('9', 'Diego Palacios', 'Ecuador', '18', '23'),('10', 'Byron Castillo', 'Ecuador', '6', '23'),('11', 'Angelo Preciado', 'Ecuador', '17', '24'),('12','Carlos Gruezo', 'Ecuador', '8', '27'),
('13', 'Jhegson Méndez', 'Ecuador', '32', '25'),('14', 'Dixon Arroyo', 'Ecuador', '5', '30'),('15', 'José Cifuentes', 'Ecuador', '20', '23'),('16', 'Moisés Caicedo', 'Ecuador', '23', '20'),
('17', 'Alan Franco', 'Ecuador', '21', '23'),('18', 'Jeremy Sarmiento', 'Ecuador', '16', '20'),('19', 'Romario Ibarra', 'Ecuador', '10', '27'),('20','Alexander Alvarado', 'Ecuador', '5', '23'),
('21', 'Gonzalo Plata', 'Ecuador', '19', '21'),('22', 'Ángel Mena', 'Ecuador', '15', '34'),('23', 'Michael Estrada', 'Ecuador', '11', '26'),('24','Enner Valencia', 'Ecuador', '13', '32'),
('25', 'Jordy Caicedo', 'Ecuador', '11', '24'),('26', 'Leonardo Campana', 'Ecuador', '9', '22'),('27', 'Djorkaeff Reasco', 'Ecuador', '10', '23'),

('28', 'Mark Flekken', 'Holanda', '13', '29'),('29', 'Jasper Cillesen', 'Holanda', '1', '33'),('30', 'Kjell Scherpen', 'Holanda', '23', '22'),('31','Matthijs de Ligt', 'Holanda', '3', '22'),
('32', 'Jurrien Timber', 'Holanda', '2', '21'),('33', 'Stefan de Vrij', 'Holanda', '6', '30'),('34', 'Nathan Aké', 'Holanda', '6', '27'),('35','Jordan Teze', 'Holanda', '2', '22'),
('36', 'Bruno Martins Indi', 'Holanda', '4', '30'),('37', 'Tyrell Malacia','Holanda', '5', '22'),('38', 'Daley Blind', 'Holanda', '17', '32'),('39','Hans Hateboer', 'Holanda', '15', '28'),
('40', 'Teun Koopmeiners', 'Holanda', '20', '24'),('41', 'Jerdy Schouten', 'Holanda', '18', '25'),('42', 'Frenkie de Jong', 'Holanda', '21', '25'),('43', 'Denzel Dumfries',  'Holanda', '22', '26'),
('44', 'Steven Berghuis',  'Holanda', '11', '30'),('45', 'Davy Klaassen',  'Holanda', '14', '29'),('46', 'Guus Til',  'Holanda', '8', '24'),('47','Cody Gakpo',  'Holanda', '9', '23'),
('48', 'Noa Lang',  'Holanda', '12', '23'),('49', 'Steven Bergwijn',  'Holanda', '7', '24'),('50', 'Memphis Depay',  'Holanda', '10', '28'),('51','Wout Weghworst',  'Holanda', '19', '30'),
('52', 'Vincent Janssen',  'Holanda','16', '28'),

('53', 'Saad Abdullah Al Sheeb', 'Qatar', '1', '32'),('54', 'Yousef Hassan Mohamed Ali', 'Qatar', '21', '26'),('55', 'Meshaal Aissa Barsham', 'Qatar', '22', '24'),('56','Pedro Miguel Correia', 'Qatar', '2', '31'),
('57', 'Abdelkarim Hassan Al Haj Fadlalla', 'Qatar', '3', '28'),('58', 'Mohammed Waed Abdulwahhab Al Bayati', 'Qatar', '4', '22'),('59', 'Salem Ali Al Hajri', 'Qatar', '7', '26'),('60','Mosaab Khoder Jibril', 'Qatar', '13', '28'),
('61', 'Bassam Hisham Al Riwi', 'Qatar', '15', '24'),('62', 'Boualem Khoukhi', 'Qatar', '16', '32'),('63', 'Ahmed Fathy', 'Qatar', '8', '29'),('64','Terek Salman', 'Qatar', '5', '24'),
('65', 'Hazem Ahmed Shehata', 'Qatar', '6', '24'),('66', 'Ali Assadalla Thaimn Qambar', 'Qatar', '8', '29'),('67', 'Abdulrahman Mohamed Fahmi Moutafa', 'Qatar', '9', '25'),('68', 'Karim Boudiaf', 'Qatar', '12', '31'),
('69', 'Homam Alamin Ahmed', 'Qatar', '14', '22'),('70', 'Naif Abdulraheem Al Hadhrami', 'Qatar', '18', '22'),('71', 'Abdullah Abdulsalam Alahrak', 'Qatar', '20', '25'),('72','Assim Omer Al Haj Madibo', 'Qatar', '23', '25'),
('73', 'Mohammed Alaa Eldin Abdelmotaal', 'Qatar', '23', '28'),('74', 'Ahmed Alaa Eldin Abdelmotaal', 'Qatar', '7', '29'),('75', 'Khalid Muneer Mazeed', 'Qatar', '10', '29'),('76','Akram Hassan Afif', 'Qatar', '11', '25'),
('77', 'Ismael Mohammad Mohammad', 'Qatar', '17', '28'),('78', 'Yusuf Abdurisag', 'Qatar', '17', '22'),('79', 'Almoez Ali Zainalabiddin Abdulla', 'Qatar', '19', '25'),

('80', 'Edouard Mendy ', 'Senegal', '16', '30'),('81', 'Alfred Gomis', 'Senegal', '16', '28'),('82', 'Seny Dieng', 'Senegal', '1', '27'),('83','Kalidou Koulibaly', 'Senegal', '3', '31'),
('84', 'Abdou Diallo', 'Senegal', '22', '26'),('85', 'Pape Abou Cissé', 'Senegal', '4', '26'),('86', 'Abdoulaye Seck', 'Senegal', '14', '30'),('87','Alpha Dionkou ', 'Senegal', '2', '20'),
('88', 'Fodé Ballo-Touré', 'Senegal', '12', '25'),('89', 'Saliou Ciss', 'Senegal', '2', '32'),('90', 'Youssouf Sabaly', 'Senegal', '12', '29'),('91','Pape Gueye', 'Senegal', '26', '23'),
('92', 'Nampalys Mendy', 'Senegal', '6', '30'),('93', 'Cheikhou Kouyaté', 'Senegal', '8', '32'),('94', 'Mamadou Loum', 'Senegal', '25', '25'),('95', 'Moustapha Name', 'Senegal', '24', '27'),
('96', 'Pape Matar Sarr', 'Senegal', '17', '19'),('97', 'Idrissa Gueye', 'Senegal', '5', '32'),('98', 'Iliman Ndiaye', 'Senegal', '29', '22'),('99','Sadio Mané', 'Senegal', '10', '30'),
('100', 'Ismaïla Sarr', 'Senegal', '18', '24'),('101', 'Demba Seck', 'Senegal', '23', '21'),('102', 'Boulaye Dia', 'Senegal', '9', '25'),('103','Habib Diallo', 'Senegal', '11', '27'),
('104', 'Famara Diédhiou', 'Senegal', '19', '29'),('105', 'Keita Baldé', 'Senegal', '7', '27');