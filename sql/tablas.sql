CREATE DATABASE qatarclic;

USE qatarclic;

CREATE TABLE roles (
    id int(2) NOT NULL AUTO_INCREMENT,
    rol varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `roles` VALUES ('0', 'Hincha'),('1', 'Moderador'),('2', 'Administrador');

CREATE TABLE teams (
    id int(36) NOT NULL AUTO_INCREMENT,
    nombre varchar(30) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `teams` VALUES
('1', 'Qatar'),('2', 'Ecuador'),('3', 'Senegal'),('4','Paises Bajos'),
('5', 'Inglaterra'),('6', 'Iran'),('7', 'Estados Unidos'),('8','Gales'),
('9', 'Argentina'),('10', 'Arabia Saudita'),('11', 'Mexico'),('12','Polonia'),
('13', 'Francia'),('14', 'Australia'),('15', 'Dinamarca'),('16', 'Tunez'),
('17', 'España'),('18', 'Costa Rica'),('19', 'Alemania'),('20','Japon'),
('21', 'Belgica'),('22', 'Canada'),('23', 'Marruecos'),('24','Croacia'),
('25', 'Brasil'),('26', 'Serbia'),('27', 'Suiza'),('28','Camerun'),
('29', 'Portugal'),('30', 'Ghana'),('31', 'Uruguay'),('32','Corea del Sur');

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    username varchar(20) NOT NULL UNIQUE,
    password varchar(500),
    rol_id int(2),
    cooldown_password timestamp NULL,
    cooldown_username timestamp NULL,
    seleccion int NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`),
    FOREIGN KEY (`seleccion`) REFERENCES `teams`(`id`)
);

INSERT INTO `users` VALUES('1', 'liberfedericomanuel@gmail.com', 'FeduuML', '$2y$10$nDIaj0iEP2PDoyqj2vwttex9UEhqoBOJMth43n1L0EYRXVVUbTMXC'/*Contraseña: federico1*/, '0', NULL, NULL, NULL);
/*SOLO ESTA cuenta permite recuperar contraseña!*/
INSERT INTO `users` VALUES('2', 'matefer@outlook.com', 'MateFer', '$2y$10$9Cj9EiFXmTcH3ZXsGVMLjuU..RzfVWgsFS./oGpPPl7mTM/WBTnPu'/*Contraseña: ferchomate911*/, '1', NULL, NULL, NULL);
SELECT r.rol FROM roles r WHERE r.rol = 1;
INSERT INTO `users` VALUES('3', 'lorranktn@fortnite.com', 'Lorrrran', '$2y$10$We802Kpgy9gzRiYyttmM/eBeOhiXiRr6//htdWLpJdfjTWMzyItfG'/*Contraseña: AmoFortnite*/, '2', NULL, NULL, '9');
SELECT r.rol FROM roles r WHERE r.rol = 2;
INSERT INTO `users` VALUES('4', 'pochichaves04@gmail.com', 'MaxiChaves18', '$2y$10$kCv3Xbd0HSa66qoHtaduEetWr0wmBjBbNmCu3q6xqZD/T7yOAOX3i'/*Contraseña: SoyPochi18*/, '0', NULL, NULL, NULL);

CREATE TABLE `news` (
    `id` int(2) NOT NULL AUTO_INCREMENT,
    `user` varchar(20) NOT NULL,
    `title` text NOT NULL,
    `content` text NOT NULL,
    `image` varchar (255) NOT NULL,
    `datetime` datetime NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `news` VALUES('1', 'Lorrrran', 'Test1', 'Test1', '175104.jpg', '2022-09-08 14:10:29');
INSERT INTO `news` VALUES('2', 'Lorrrran', 'Test2', 'Test2', '224875.png', '2022-09-08 17:21:16');
INSERT INTO `news` VALUES('3', 'Lorrrran', 'Test3', 'Test3', '245070.jpg', '2022-09-08 22:55:27');
INSERT INTO `news` VALUES('4', 'Lorrrran', 'Test4', 'Test4', '367687.jpg', '2022-09-09 08:14:31');
INSERT INTO `news` VALUES('5', 'Lorrrran', 'Test5', 'Test5', '668926.jpg', '2022-09-09 15:36:12');

CREATE TABLE `encuestas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` text NOT NULL,
    `deadline` datetime NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `encuestas` VALUES('1', 'Final del mundial', '2022-11-20 00:00:00'),
('2', 'Repechajes', '2022-10-20 14:30:00'),
('3', 'Reconocientos individuales', '2022-11-20 00:00:00');

CREATE TABLE `preguntas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_encuesta` int NOT NULL,
    `pregunta` text NOT NULL,
    `tipo` text NOT NULL,
    `respuesta` text,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas`(`id`)
);

INSERT INTO `preguntas` VALUES ('1', '1', '¿Cuál será el primer equipo en llegar a la final?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 1;
INSERT INTO `preguntas` VALUES ('2', '1', '¿Cuál será el segundo equipo en llegar a la final?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 1;
INSERT INTO `preguntas` VALUES ('3', '1', '¿Quién ganará la final?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 1;
INSERT INTO `preguntas` VALUES ('4', '1', '¿Cuál será el tercer puesto?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 1;
INSERT INTO `preguntas` VALUES ('5', '1', '¿Cuál será el cuarto puesto?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 1;

INSERT INTO `preguntas` VALUES ('6', '2', '¿Quién será el ganador de Perú VS Australia?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 2;
INSERT INTO `preguntas` VALUES ('7', '2', '¿Quién será el ganador de Costa Rica VS Nueva Zelanda?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 2;
INSERT INTO `preguntas` VALUES ('8', '2', '¿Quién será el ganador de Gales VS Ucrania?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 2;
INSERT INTO `preguntas` VALUES ('9', '2', '¿Quién será el ganador de Portugal VS Macedonia del Norte?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 2;
INSERT INTO `preguntas` VALUES ('10', '2', '¿Quién será el ganador de Polonia VS Suecia?', 'Paises', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 2;

INSERT INTO `preguntas` VALUES ('11', '3', '¿Quién será el máximo goleador del torneo?', 'Jugadores', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 3;
INSERT INTO `preguntas` VALUES ('12', '3', '¿Quién será el máximo asistidor del torneo?', 'Jugadores', NULL);
SELECT e.id FROM encuestas e WHERE e.id = 3;

CREATE TABLE `respuestas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_usuario` int NOT NULL,
    `id_pregunta` int NOT NULL,
    `respuesta` text NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (`id_usuario`) REFERENCES `users`(`id`),
    FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas`(`id`)
);

CREATE TABLE `partidos_grupos` (
    id int NOT NULL AUTO_INCREMENT,
    pais int NOT NULL,
    rival int NOT NULL,
    grupo varchar(1) NOT NULL,
    fecha date NOT NULL,
    hora time NOT NULL,
    estadio varchar(50) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (`pais`) REFERENCES `teams`(`id`),
    FOREIGN KEY (`rival`) REFERENCES `teams`(`id`)
);

INSERT INTO `partidos_grupos` VALUES 
('1', '1', '2', 'A', '2022-11-20', '13:00:00', 'Al-Bayt'),
('2', '1', '3', 'A', '2022-11-25', '10:00:00', 'Al-Thumama'),
('3', '1', '4', 'A', '2022-11-29', '07:00:00', 'Al-Bayt'),

('4', '2', '1', 'A', '2022-11-20', '13:00:00', 'Al-Bayt'),
('5', '2', '4', 'A', '2022-11-25', '13:00:00', 'Internacional Khalifa'),
('6', '2', '3', 'A', '2022-11-29', '10:00:00', 'Internacional Khalifa'),

('7', '3', '4', 'A', '2022-11-21', '13:00:00', 'Al-Thumama'),
('8', '3', '1', 'A', '2022-11-25', '10:00:00', 'Al-Thumama'),
('9', '3', '2', 'A', '2022-11-29', '10:00:00', 'Internacional Khalifa'),

('10', '4', '3', 'A', '2022-11-21', '13:00:00', 'Al-Thumama'),
('11', '4', '2', 'A', '2022-11-25', '13:00:00', 'Internacional Khalifa'),
('12', '4', '1', 'A', '2022-11-29', '07:00:00', 'Al-Bayt'),

('13', '5', '6', 'B', '2022-11-21', '10:00:00', 'Internacional Khalifa'),
('14', '5', '7', 'B', '2022-11-25', '16:00:00', 'Al-Bayt'),
('15', '5', '8', 'B', '2022-11-29', '16:00:00', 'Ahmed bin Ali'),

('16', '6', '5', 'B', '2022-11-21', '10:00:00', 'Internacional Khalifa'),
('17', '6', '8', 'B', '2022-11-25', '07:00:00', 'Ahmed bin Ali'),
('18', '6', '7', 'B', '2022-11-29', '13:00:00', 'Al-Thumama'),

('19', '7', '8', 'B', '2022-11-21', '16:00:00', 'Ahmed bin Ali'),
('20', '7', '5', 'B', '2022-11-25', '16:00:00', 'Al-Bayt'),
('21', '7', '6', 'B', '2022-11-29', '13:00:00', 'Al-Thumama'),

('22', '8', '7', 'B', '2022-11-21', '16:00:00', 'Ahmed bin Ali'),
('23', '8', '6', 'B', '2022-11-25', '07:00:00', 'Ahmed bin Ali'),
('24', '8', '5', 'B', '2022-11-29', '16:00:00', 'Ahmed bin Ali'),

('25', '9', '10', 'C', '2022-11-22', '07:00:00', 'Lusail'),
('26', '9', '11', 'C', '2022-11-26', '16:00:00', 'Lusail'),
('27', '9', '12', 'C', '2022-11-30', '16:00:00', '974'),

('28', '10', '9', 'C', '2022-11-22', '07:00:00', 'Lusail'),
('29', '10', '12', 'C', '2022-11-26', '10:00:00', 'Education City'),
('30', '10', '11', 'C', '2022-11-30', '13:00:00', 'Lusail'),

('31', '11', '12', 'C', '2022-11-22', '13:00:00', '974'),
('32', '11', '9', 'C', '2022-11-26', '16:00:00', 'Lusail'),
('33', '11', '10', 'C', '2022-11-30', '13:00:00', 'Lusail'),

('34', '12', '11', 'C', '2022-11-22', '13:00:00', '974'),
('35', '12', '10', 'C', '2022-11-26', '10:00:00', 'Education City'),
('36', '12', '9', 'C', '2022-11-30', '16:00:00', '974'),

('37', '13', '14', 'D', '2022-11-22', '16:00:00', 'Al-Janoub'),
('38', '13', '15', 'D', '2022-11-26', '13:00:00', '974'),
('39', '13', '16', 'D', '2022-11-30', '07:00:00', 'Education'),

('40', '14', '13', 'D', '2022-11-22', '16:00:00', 'Al-Janoub'),
('41', '14', '16', 'D', '2022-11-26', '07:00:00', 'Al-Janoub'),
('42', '14', '15', 'D', '2022-11-30', '10:00:00', 'Al-Janoub'),

('43', '15', '16', 'D', '2022-11-22', '10:00:00', 'Education City'),
('44', '15', '13', 'D', '2022-11-26', '13:00:00', '974'),
('45', '15', '14', 'D', '2022-11-30', '10:00:00', 'Al-Janoub'),

('46', '16', '15', 'D', '2022-11-22', '10:00:00', 'Education City'),
('47', '16', '14', 'D', '2022-11-26', '07:00:00', 'Al-Janoub'),
('48', '16', '13', 'D', '2022-11-30', '07:00:00', 'Education'),

('49', '17', '18', 'E', '2022-11-23', '13:00:00', 'Al-Thumama'),
('50', '17', '19', 'E', '2022-11-27', '16:00:00', 'Ahmed bin Ali'),
('51', '17', '20', 'E', '2022-12-01', '13:00:00', 'Al-Bayt'),

('52', '18', '17', 'E', '2022-11-23', '13:00:00', 'Al-Thumama'),
('53', '18', '20', 'E', '2022-11-27', '07:00:00', 'Ahmed bin Ali'),
('54', '18', '19', 'E', '2022-12-01', '16:00:00', 'Internacional Khalifa'),

('55', '19', '20', 'E', '2022-11-23', '10:00:00', 'Internacional Khalifa'),
('56', '19', '17', 'E', '2022-11-27', '16:00:00', 'Ahmed bin Ali'),
('57', '19', '18', 'E', '2022-12-01', '16:00:00', 'Internacional Khalifa'),

('58', '20', '19', 'E', '2022-11-23', '10:00:00', 'Internacional Khalifa'),
('59', '20', '18', 'E', '2022-11-27', '07:00:00', 'Ahmed bin Ali'),
('60', '20', '17', 'E', '2022-12-01', '13:00:00', 'Al-Bayt'),

('61', '21', '22', 'F', '2022-11-23', '16:00:00', 'Ahmed bin Ali'),
('62', '21', '23', 'F', '2022-11-27', '10:00:00', 'Internacional Khalifa'),
('63', '21', '24', 'F', '2022-12-01', '10:00:00', 'Ahmed bin Ali'),

('64', '22', '21', 'F', '2022-11-23', '16:00:00', 'Ahmed bin Ali'),
('65', '22', '24', 'F', '2022-11-27', '13:00:00', 'Al-Thumama'),
('66', '22', '23', 'F', '2022-12-01', '07:00:00', 'Al-Thumama'),

('67', '23', '24', 'F', '2022-11-23', '07:00:00', 'Al-Bayt'),
('68', '23', '21', 'F', '2022-11-27', '10:00:00', 'Internacional Khalifa'),
('69', '23', '22', 'F', '2022-12-01', '07:00:00', 'Al-Thumama'),

('70', '24', '23', 'F', '2022-11-23', '07:00:00', 'Al-Bayt'),
('71', '24', '22', 'F', '2022-11-27', '13:00:00', 'Al-Thumama'),
('72', '24', '21', 'F', '2022-12-01', '10:00:00', 'Ahmed bin Ali'),

('73', '25', '26', 'G', '2022-11-24', '16:00:00', 'Lusail'),
('74', '25', '27', 'G', '2022-11-28', '13:00:00', '974'),
('75', '25', '28', 'G', '2022-12-02', '16:00:00', 'Lusail'),

('76', '26', '25', 'G', '2022-11-24', '16:00:00', 'Lusail'),
('77', '26', '28', 'G', '2022-11-28', '07:00:00', 'Al-Janoub'),
('78', '26', '27', 'G', '2022-12-02', '13:00:00', '974'),

('79', '27', '28', 'G', '2022-11-24', '07:00:00', 'Al-Janoub'),
('80', '27', '25', 'G', '2022-11-28', '13:00:00', '974'),
('81', '27', '26', 'G', '2022-12-02', '13:00:00', '974'),

('82', '28', '27', 'G', '2022-11-24', '07:00:00', 'Al-Janoub'),
('83', '28', '26', 'G', '2022-11-28', '07:00:00', 'Al-Janoub'),
('84', '28', '25', 'G', '2022-12-02', '16:00:00', 'Lusail'),

('85', '29', '30', 'H', '2022-11-24', '13:00:00', '974'),
('86', '29', '31', 'H', '2022-11-28', '16:00:00', 'Lusail'),
('87', '29', '32', 'H', '2022-12-02', '10:00:00', 'Education City'),

('88', '30', '29', 'H', '2022-11-24', '13:00:00', '974'),
('89', '30', '32', 'H', '2022-11-28', '10:00:00', 'Education City'),
('90', '30', '31', 'H', '2022-12-02', '07:00:00', 'Al-Janoub'),

('91', '31', '32', 'H', '2022-11-24', '10:00:00', 'Education City'),
('92', '31', '29', 'H', '2022-11-28', '16:00:00', 'Lusail'),
('93', '31', '30', 'H', '2022-12-02', '07:00:00', 'Al-Janoub'),

('94', '32', '31', 'H', '2022-11-24', '10:00:00', 'Education City'),
('95', '32', '30', 'H', '2022-11-28', '10:00:00', 'Education City'),
('96', '32', '29', 'H', '2022-12-02', '10:00:00', 'Education City');

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
('36', 'Virgin van Dijk', 'Holanda', '4', '31'),('37', 'Tyrell Malacia','Holanda', '5', '22'),('38', 'Daley Blind', 'Holanda', '17', '32'),('39','Hans Hateboer', 'Holanda', '15', '28'),
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
('104', 'Famara Diédhiou', 'Senegal', '19', '29'),('105', 'Keita Baldé', 'Senegal', '7', '27'),

('106', 'Aaron Ramsdale', 'Inglaterra', '1', '24'),('107', 'Jordan Pickford', 'Inglaterra', '1', '28'),('108', 'Nick Pope', 'Inglaterra', '22', '30'),('109','Fikayo Tomori', 'Inglaterra', '23', '24'),
('110', 'Ben White', 'Inglaterra', '4', '24'),('111', 'Harry Maguire', 'Inglaterra', '5', '29'),('112', 'Marc Guéhi', 'Inglaterra', '6', '22'),('113','John Stones', 'Inglaterra', '5', '28'),
('114', 'Conor Coady', 'Inglaterra', '30', '29'),('115', 'Trent Alexander-Arnold', 'Inglaterra', '66', '23'),('116', 'Reece James', 'Inglaterra', '24', '22'),('117','James Justin', 'Inglaterra', '2', '24'),
('118', 'Kyle Walker', 'Inglaterra', '2', '32'),('119', 'Kieran Trippier', 'Inglaterra', '2', '31'),('120', 'Declan Rice', 'Inglaterra', '41', '23'),('121', 'Kalvin Phillips', 'Inglaterra', '4', '26'),
('122', 'Phil Foden', 'Inglaterra', '47', '22'),('123', 'Jude Bellingham', 'Inglaterra', '22', '19'),('124', 'James Ward-Prowse', 'Inglaterra', '8', '27'),('125','Conor Gallagher', 'Inglaterra', '23', '22'),
('126', 'Bukayo Saka', 'Inglaterra', '7', '21'),('127', 'Mason Mount', 'Inglaterra', '19', '23'),('128', 'Raheem Sterling', 'Inglaterra', '17', '27'),('129','Jack Grealish', 'Inglaterra', '10', '26'),
('130', 'Jarrod Bowen', 'Inglaterra', '20', '25'),('131', 'Harry Kane', 'Inglaterra', '10', '29'),('132', 'Tammy Abraham', 'Inglaterra', '9', '24'),

('133', 'Amir Abedzabeh', 'Irán', '22', '29'),('134', 'Alireza Beiranvand', 'Irán', '1', '29'),('135', 'Payam Niazmad', 'Irán', '30', '27'),('136','Hossein Hosseini', 'Irán', '12', '30'),
('137', 'Majid Hosseini', 'Irán', '19', '26'),('138', 'Aref Gholami', 'Irán', '4', '25'),('139', 'Armin Sohrabian', 'Irán', '29', '27'),('140','Aref Aghasi', 'Irán', '13', '25'),
('141', 'Omid Noorafkan', 'Irán', '21', '25'),('142', 'Ehsan Hajsafi', 'Irán', '3', '32'),('143', 'Abolfazl Jalali', 'Irán', '16', '24'),('144','Sadegh Moharrami', 'Irán', '2', '26'),
('145', 'Saleh Hardani', 'Irán', '5', '23'),('146', 'Mehdi Shiri', 'Irán', '26', '31'),('147', 'Milad Sarlak', 'Irán', '18', '27'),('148', 'Saeid Ezatolahi', 'Irán', '6', '25'),
('149', 'Omid Ebrahimi', 'Irán', '14', '34'),('150', 'Ahmad Nourollahi', 'Irán', '8', '29'),('151', 'Mehdi Mehdipour', 'Irán', '23', '27'),('152','Seyed Mehdi Hosseini', 'Irán', '28', '28'),
('153', 'Amirhossein Hosseinzadeh', 'Irán', '15', '21'),('154', 'Soroosh Rafiei', 'Irán', '24', '32'),('155', 'Mehdi Torabi', 'Irán', '27', '27'),('156','Alireza Jahanbakhsh', 'Irán', '7', '29'),
('157', 'Ali Gholizadeh', 'Irán', '17', '26'),('158', 'Seid Sadeghi', 'Irán', '25', '28'),('159', 'Sardar Azmoun', 'Irán', '20', '27'),('160', 'Mehdi Taremi', 'Irán', '6', '30'),
('161', 'Allahyar Sayyadmanesh', 'Irán', '10', '21'),('162', 'Ali Alipour', 'Irán', '11', '26'),

('163', 'Matt Turner', 'EEUU', '1', '28'),('164', 'Sean Johnson', 'EEUU', '1', '33'),('165', 'Ethan Horvath', 'EEUU', '18', '27'),('166', 'Cameron Carter-Vickers', 'EEUU', '20', '24'),
('167', 'Walker Zimmerman', 'EEUU', '3', '29'),('168', 'Erik Palmer-Brown', 'EEUU', '12', '25'),('169', 'Aaron Long', 'EEUU', '15', '29'),('170','Antonee Robinson', 'EEUU', '5', '25'),
('171', 'George Bello', 'EEUU', '24', '20'),('172', 'Joe Scally', 'EEUU', '29', '19'),('173', 'Reggie Cannon', 'EEUU', '22', '24'),('174','DeAndre Yedlin', 'EEUU', '2', '29'),
('175', 'Tyler Adams', 'EEUU', '4', '23'),('176', 'Kellyn Acosta', 'EEUU', '23', '27'),('177', 'Weston McKennie', 'EEUU', '8', '24'),('178', 'Yunus Musah', 'EEUU', '6', '19'),
('179', 'Cristian Roldán', 'EEUU', '16', '27'),('180', 'Luca de la Torre', 'EEUU', '14', '24'),('181', 'Brenden Aaronson', 'EEUU', '11', '21'),('182','Malik Tillman', 'EEUU', '17', '20'),
('183', 'Jordan Morris', 'EEUU', '13', '27'),('184', 'Christian Pulisic', 'EEUU', '10', '23'),('185', 'Paul Arriola', 'EEUU', '7', '27'),('186','Timothy Weah', 'EEUU', '21', '22'),
('187', 'Jesús Ferreira', 'EEUU', '9', '21'),('188', 'Haji Wright', 'EEUU', '19', '24'),

('189', 'Danny Ward', 'Gales', '12', '29'),('190', 'Adam Davies', 'Gales', '21', '30'),('191', 'Wayne Hennessey', 'Gales', '1', '35'),('192', 'Tom King', 'Gales', '1', '27'),
('193', 'Ethan Ampadu', 'Gales', '15', '21'),('194', 'Joe Rodon', 'Gales', '6', '24'),('195', ' Chris Mepham', 'Gales', '5', '24'),('196',' Chris Mepham', 'Gales', '15', '20'),
('197', 'Ben Davies', 'Gales', '4', '29'),('198', 'Rhys Norrington-Davies', 'Gales', '17', '23'),('199', 'Neco Williams', 'Gales', '3', '21'),('200','Connor Roberts', 'Gales', '14', '26'),
('201', 'Chris Gunter', 'Gales', '2', '33'),('202', 'Matt Smith', 'Gales', '7', '22'),('203', 'Aaron Ramsey', 'Gales', '10', '31'),('204', 'Joe Allen', 'Gales', '7', '32'),
('205', 'Dylan Levitt', 'Gales', '19', '21'),('206', 'Joe Morrell', 'Gales', '16', '25'),('207', 'Wes Burns', 'Gales', '7', '27'),('208','Rubin Colwill', 'Gales', '27', '20'),
('209', 'Jonathan Williams', 'Gales', '18', '28'),('210', 'Daniel James', 'Gales', '20', '24'),('211', 'Harry Wilson', 'Gales', '8', '25'),('212','Rabbi Matondo', 'Gales', '23', '21'),
('213', 'Gareth Bale ', 'Gales', '11', '33'),('214', 'Sorba Thomas', 'Gales', '22', '23'), ('215', 'Brennan Johnson', 'Gales', '9', '21'), ('216', 'Kieffer Moore', 'Gales', '13', '30'),
('217', 'Mark Harris', 'Gales', '19', '23'),

('218', 'Emiliano Martínez', 'Argentina', '23', '30'),('219', 'Juan Musso', 'Argentina', '12', '18'),('220', 'Gerónimo Rulli', 'Argentina', '12', '30'),('221', 'Franco Armani', 'Argentina', '1', '35'),
('222', 'Cristian Romero', 'Argentina', '13', '24'),('223', 'Lisandro Martínez', 'Argentina', '16', '24'),('224', 'Lucas Martínez Cuarta', 'Argentina', '28', '26'),('225','Facundo Medina', 'Argentina', '14', '23'),
('226', 'Nehuén Pérez', 'Argentina', '19', '22'),('227', 'Germán Pezzella', 'Argentina', '6', '31'),('228', 'Nicolás Otamendi', 'Argentina', '19', '34'),('229','Marcos Acuña', 'Argentina', '8', '30'),
('230', 'Nicolás Tagliafico', 'Argentina', '3', '30'),('231', 'Nahuel Molina', 'Argentina', '26', '24'),('232', 'Gonzalo Montiel', 'Argentina', '4', '25'),('233', 'Guido Rodriguez', 'Argentina', '18', '28'),
('234', 'Leandro Paredes', 'Argentina', '5', '28'),('235', 'Rodrigo de Paul', 'Argentina', '7', '28'),('236', 'Giovani Lo Celso', 'Argentina', '20', '26'),('237','Enzo Fernández', 'Argentina', '27', '21'),
('238', 'Exequiel Palacios', 'Argentina', '14', '23'),('239', 'Alexis Mac Allister', 'Argentina', '5', '23'),('240', 'Thiago Almada', 'Argentina', '8', '21'),('241','Papu Gómez', 'Argentina', '17', '34'),
('242', 'Nicolás González', 'Argentina', '15', '24'),('243', 'Lionel Messi', 'Argentina', '10', '35'), ('244', 'Ángel Correa', 'Argentina', '21', '27'), ('245', 'Ángel Di María ', 'Argentina', '11', '34'),
('246', 'Paulo Dybala', 'Argentina', '21', '28'), ('247', 'Joaquín Correa', 'Argentina', '19', '28'),('248', 'Lautaro Martínez', 'Argentina', '22', '25'), ('249', 'Julián Álvarez', 'Argentina', '9', '22'),

('250', 'Mohammed Al-Rubaie', 'Arabia Saudita', '71', '25'),('251', 'Mohammed Al-Owais', 'Arabia Saudita', '21', '30'),('252', 'Fawaz Al-Qarni', 'Arabia Saudita', '22', '30'),('253', 'Amin Al-Bukhari', 'Arabia Saudita', '1', '25'),
('254', 'Ziyad Al-Sahafi', 'Arabia Saudita', '4', '27'),('255', 'Abdulelah Al-Amri', 'Arabia Saudita', '5', '25'),('256', 'Ali Al-Oujami', 'Arabia Saudita', '78', '26'),('257','Hassan Tambakti', 'Arabia Saudita', '12', '23'),
('258', 'Ali Al-Boleahi', 'Arabia Saudita', '5', '32'),('259', 'Yasser Al-Shahrani', 'Arabia Saudita', '12', '30'),('260', 'Sultan Al-Ghannam', 'Arabia Saudita', '2', '28'),('261','Mohammed Al-Burayk', 'Arabia Saudita', '2', '29'),
('262', 'Nasser Al-Dawsari', 'Arabia Saudita', '16', '23'),('263', 'Ali Al-Hassan', 'Arabia Saudita', '19', '25'),('264', 'Abdullah Otayf', 'Arabia Saudita', '8', '30'),('266', 'Mohamed Kanno', 'Arabia Saudita', '28', '27'),
('267', ' Salman Al-Faraj', 'Arabia Saudita', '7', '33'),('268', 'Sami Al-Najei', 'Arabia Saudita', '14', '25'),('269', 'Abdulrahman Ghareeb', 'Arabia Saudita', '29', '25'),('270','Salem Al-Dawsari', 'Arabia Saudita', '29', '31'),
('271', 'Khalid Al-Ghannam', 'Arabia Saudita', '11', '21'),('272', 'Abdulaziz Al-Bishi', 'Arabia Saudita', '11', '28'),('273', 'Abdulrahman Al-Obood', 'Arabia Saudita', '24', '27'),('274','Hattan Bahebri', 'Arabia Saudita', '11', '30'),
('275', 'Firas Al-Buraikan', 'Arabia Saudita', '9', '22'),('276', 'Abdullah Al-Hamdan', 'Arabia Saudita', '14', '22'),

('277', 'Carlos Acevedo', 'México', '1', '26'),('278', 'Luis Malagón', 'México', '1', '25'),('279', 'César Montes', 'México', '3', '25'),('280', 'Israel Reyes', 'México', '12', '22'),
('281', 'Jesús Angulo', 'México', '3', '24'),('282', 'Jesús Gallardo', 'México', '23', '28'),('283', 'Luis Reyes', 'México', '14', '31'),('284','Kevin Álvarez', 'México', '2', '23'),
('285', 'Andrés Guardado', 'México', '18', '36'),('286', 'Emilio Lara', 'México', '23', '20'),('287', 'Luis Chávez', 'México', '18', '26'),('288','Carlos Rodríguez', 'México', '19', '25'),
('289', 'Érick Sánchez', 'México', '6', '22'),('290', 'Luis Romo', 'México', '7', '27'),('291', 'Fernando Beltrán', 'México', '16', '24'),('292', 'Sebastián Córdova', 'México', '8', '25'),
('293', 'Rodolfo Pizarro', 'México', '20', '28'),('294', 'Alexis Vega', 'México', '10', '24'),('295', 'Roberto Alvarado', 'México', '25', '24'),('296','Uriel Antuna', 'México', '22', '25'),
('297', 'Henry Martín', 'México', '21', '29'),('298', 'Eduardo Aguirre', 'México', '19', '24'),

('299', 'Wojciech Szczesny', 'Polonia', '1', '32'),('300', 'Bartlomiej Dragowski', 'Polonia', '22', '25'),('301', 'Kamil Grabara', 'Polonia', '1', '23'),('302', 'Lukasz Skorupski', 'Polonia', '12', '31'),
('303', 'Jan Bednarek', 'Polonia', '5', '26'),('304', 'Jakub Kiwior', 'Polonia', '4', '22'),('305', 'Mateusz Wieteska', 'Polonia', '3', '25'),('306','Marcin Kaminski', 'Polonia', '35', '30'),
('307', 'Kamil Glik', 'Polonia', '15', '34'),('308', 'Tymoteusz Puchacz', 'Polonia', '19', '32'),('309', 'Kamil Pestka ', 'Polonia', '13', '24'),('310','Matty Cash', 'Polonia', '2', '25'),
('311', 'Tomasz Kedziora', 'Polonia', '4', '28'),('312', 'Bartosz Bereszynski', 'Polonia', '18', '30'),('313', 'Robert Gumny', 'Polonia', '25', '24'),('314', 'Grzegorz Krychowia', 'Polonia', '10', '32'),
('315', 'Krystian Bielik', 'Polonia', '31', '24'),('316', 'Jacek Goralski ', 'Polonia', '6', '29'),('317', 'Szymon Zurkowski', 'Polonia', '8', '24'),('318','Karol Linetty', 'Polonia', '8', '27'),
('319', 'Mateusz Klich', 'Polonia', '14', '32'),('320', 'Damian Szymanski', 'Polonia', '17', '27'),('321', 'Przemyslaw Frankowski', 'Polonia', '19', '27'),('322',' Patryk Kun', 'Polonia', '23', '27'),
('323', 'Piotr Zielinski', 'Polonia', '20', '28'),('324', 'Sebastian Szymanski', 'Polonia', '17', '23'), ('325', 'Nicola Zalewski', 'Polonia', '21', '20'), ('326', 'Jakub Kaminski', 'Polonia', '2', '20'),
('327', 'Kamil Józwiak', 'Polonia', '7', '24'), ('328', 'Przemyslaw Placheta', 'Polonia', '17', '24'),('329', 'Kamil Grosicki', 'Polonia', '11', '34'), ('330', 'Konrad Michalak', 'Polonia', '77', '24'),
('331', 'Robert Lewandowski', 'Polonia', '9', '34'), ('332', 'Arkadiusz Milik', 'Polonia', '23', '28'), ('333', 'Krzysztof Piatek', 'Polonia', '23', '27'), ('334', 'Adam Buksa', 'Polonia', '7', '26'),
('335', 'Karol Swiderski', 'Polonia', '16', '25'),

('336', 'Mike Maignan', 'Francia', '16', '27'),('337', 'Alphonse Areola', 'Francia', '23', '29'),('338', 'Hugo Lloris', 'Francia', '1', '35'),('339', 'Jules Koundé', 'Francia', '5', '23'),
('340', 'Lucas Hernández', 'Francia', '21', '26'),('341', 'Raphaël Varane', 'Francia', '4', '29'),('342', 'Presnel Kimpembe', 'Francia', '3', '27'),('343','Ibrahima Konaté', 'Francia', '4', '23'),
('344', 'William Saliba', 'Francia', '17', '21'),('345', 'Theo Hernández', 'Francia', '22', '24'),('346', 'Lucas Digne', 'Francia', '18', '29'),('347', 'Benjamin Pavard', 'Francia', '2', '26'),
('348', 'Jonathan Clauss', 'Francia', '15', '29'),('349', 'Aurélien Tchouamen', 'Francia', '8', '22'),('350', 'N`Golo Kanté', 'Francia', '13', '31'),('351', 'Boubacar Kamara', 'Francia', '13', '22'),
('352', 'Mattéo Guendouzi', 'Francia', '6', '23'),('353', 'Adrien Rabiot', 'Francia', '14', '27'),('354', 'Moussa Diaby', 'Francia', '20', '23'),('355','Kingsley Coman', 'Francia', '11', '26'),
('356', 'Christopher Nkunku', 'Francia', '12', '24'),('357', 'Antoine Griezmann', 'Francia', '7', '31'),('358', 'Kylian Mbappé', 'Francia', '10', '23'),('359','Karim Benzema', 'Francia', '19', '34'),
('360', 'Wissam Ben Yedder', 'Francia', '9', '32'),

('361', 'Mathew Ryan', 'Australia', '1', '30'),('362', 'Andrew Redmayne', 'Australia', '12', '33'),('363', 'Danny Vukovic', 'Australia', '18', '37'),('364', 'Harry Souttar', 'Australia', '19', '23'),
('365', 'Milos Degenek', 'Australia', '2', '28'),('366', 'Bailey Wright', 'Australia', '26', '30'),('367', 'Trent Sainsbury', 'Australia', '20', '30'),('368','Kye Rowles', 'Australia', '20', '24'),
('369', 'Gianni Stensness', 'Australia', '23', '23'),('370', 'Aziz Behich', 'Australia', '16', '31'),('371', 'Jason Davidson', 'Australia', '3', '31'),('372', 'Joel King', 'Australia', '25', '21'),
('373', 'Nathaniel Atkinson', 'Australia', '2', '23'),('374', 'Fran Karacic', 'Australia', '5', '26'),('375', 'Rhyan Grant', 'Australia', '4', '31'),('376', 'James Jeggo', 'Australia', '8', '30'),
('377', 'Connor Metcalfe', 'Australia', '8', '22'),('378', 'Kenny Dougall', 'Australia', '12', '29'),('379', 'Aaron Mooy', 'Australia', '13', '31'),('380','Riley McGree', 'Australia', '8', '23'),
('381', 'Jackson Irvine', 'Australia', '22', '29'),('382', 'Ajdin Hrustic', 'Australia', '10', '26'),('383', 'Tom Rogic', 'Australia', '23', '29'),('384','Denis Genreau', 'Australia', '17', '23'),
('385', 'Awer Mabil', 'Australia', '17', '26'),('386', 'Craig Goodwin', 'Australia', '19', '30'), ('387', 'Mathew Leckie', 'Australia', '7', '31'), ('388', 'Ben Folami', 'Australia', '11', '23'),
('390', 'Martin Boyle', 'Australia', '6', '29'), ('391', 'Marco Tilio', 'Australia', '21', '21'), ('392', 'Nick D`Agostino', 'Australia', '15', '24'), ('393', 'Jamie Maclaren', 'Australia', '9', '29'), 
('394', 'Adam Taggart', 'Australia', '9', '29'), ('395', 'Mitchell Duke', 'Australia', '15', '31'), ('396', 'Bruno Fornaroli', 'Australia', '14', '35'),

('397', 'Unai Simón', 'España', '23', '25'),('398', 'David Raya', 'España', '13', '26'),('399', 'Robert Sanchez', 'España', '1', '24'),('400', 'Pau Torres', 'España', '4', '25'),
('401', 'Iñigo Martínez', 'España', '3', '31'),('402', 'Eric García', 'España', '14', '21'),('403', 'Diego Llorente', 'España', '15', '29'),('404','Marcos Alonso', 'España', '17', '31'),
('405', 'Jordi Alba', 'España', '18', '33'),('406', 'Daniel Carvajal', 'España', '20', '30'),('407', 'César Azpilicueta', 'España', '2', '33'),('408', 'Rodri', 'España', '16', '26'),
('409', 'Sergio Busquets', 'España', '5', '34'),('410', 'Gavi', 'España', '9', '18'),('411', 'Carlos Soler', 'España', '19', '25'),('412', 'Marcos Llorente', 'España', '6', '27'),
('413', 'Koke', 'España', '8', '30'),('414', 'Dani Olmo', 'España', '21', '24'),('415', 'Ansu Fati', 'España', '12', '19'),('416','Ferran Torres', 'España', '11', '22'),
('417', 'Marco Asensio', 'España', '10', '26'),('418', 'Pablo Sarabia', 'España', '22', '30'),('419', 'Álvaro Morata', 'España', '7', '29'),('420','Raúl de Tomás', 'España', '14', '27'),

('421', 'Daniel Iversen', 'Dinamarca', '16', '25'),('422', 'Peter Vindahl', 'Dinamarca', '22', '24'),('423', 'Andreas Christensen', 'Dinamarca', '6', '26'),('424', 'Joachim Andersen', 'Dinamarca', '2', '26'),
('425', 'Jannik Vestergaard', 'Dinamarca', '3', '31'),('426', 'Simon Kjaer', 'Dinamarca', '4', '33'),('427', 'Nicolai Boilesen', 'Dinamarca', '20', '30'),('428','Rasmus Kristensen', 'Dinamarca', '13', '25'),
('429', 'Joakim Maehle', 'Dinamarca', '5', '25'),('430', 'Jens Stryger Larsen', 'Dinamarca', '17', '31'),('431', 'Morten Hjulmand', 'Dinamarca', '8', '23'),('432', 'Pierre-Emile Höjbjerg', 'Dinamarca', '23', '27'),
('433', 'Philip Billing', 'Dinamarca', '15', '26'),('434', 'Mathias Jensen', 'Dinamarca', '7', '26'),('435', 'Daniel Wass', 'Dinamarca', '18', '33'),('436', 'Andreas Skov Olsen', 'Dinamarca', '11', '22'),
('437', 'Christian Eriksen', 'Dinamarca', '10', '30'),('438', 'Mikkel Damsgaard', 'Dinamarca', '14', '22'),('439', 'Robert Skov', 'Dinamarca', '12', '26'),('440','Jonas Wind', 'Dinamarca', '19', '23'),
('441', 'Andreas Cornelius', 'Dinamarca', '21', '29'),('442', 'Martin Braithwaite', 'Dinamarca', '9', '31'),

('443', 'Keylor Navas', 'Costa Rica', '1', '35'),('444', 'Aaron Cruz', 'Costa Rica', '18', '31'),('445', 'Leonel Moreira', 'Costa Rica', '23', '32'),('446', 'Juan Pablo Vargas', 'Costa Rica', '3', '27'),
('447', 'Francisco Calvo', 'Costa Rica', '15', '30'),('450', 'Óscar Duarte', 'Costa Rica', '6', '33'),('451', 'Kendall Waston', 'Costa Rica', '19', '34'),('452','Ian Lawrence', 'Costa Rica', '16', '20'),
('453', 'Bryan Oviedo', 'Costa Rica', '8', '32'),('454', 'Keyshar Fuller', 'Costa Rica', '4', '28'),('455', 'Carlos Martínez', 'Costa Rica', '22', '23'),('456', 'Orlando Galo', 'Costa Rica', '14', '22'),
('457', 'Daniel Chacón', 'Costa Rica', '20', '21'),('458', 'Yeltsin Tejeda', 'Costa Rica', '17', '30'),('459', 'Celso Borges', 'Costa Rica', '5', '34'),('460', 'Gerson Torres', 'Costa Rica', '13', '25'),
('461', 'Brandon Aguilera', 'Costa Rica', '21', '19'),('462', 'Bryan Ruiz', 'Costa Rica', '10', '37'),('463', 'Jewison Bennette', 'Costa Rica', '9', '18'),('464','Joel Campbell', 'Costa Rica', '12', '30'),
('465', 'Carlos Mora', 'Costa Rica', '2', '21'),('466', 'Anthony Contreras', 'Costa Rica', '7', '22'),('467', 'Johan Venegas', 'Costa Rica', '11', '33'),

('468', 'Manuel Neuer', 'Alemania', '1', '36'),('469', 'Kevin Trapp', 'Alemania', '12', '32'),('470', 'Oliver Baumann', 'Alemania', '22', '32'),('471', 'Antonio Rüdiger', 'Alemania', '2', '29'),
('472', 'Niklas Süle', 'Alemania', '15', '27'),('473', 'Nico Schlotterbeck', 'Alemania', '23', '22'),('474', 'Jonathan Tah', 'Alemania', '4', '26'),('475','Thilo Kehrer', 'Alemania', '5', '25'),
('476', 'Lukas Klostermann', 'Alemania', '16', '26'),('477', 'David Raum', 'Alemania', '3', '24'),('478', 'Benjamin Henrichs', 'Alemania', '17', '25'),('479', 'Joshua Kimmich', 'Alemania', '6', '27'),
('480', 'Anton Stach', 'Alemania', '2', '23'),('481', 'Leon Goretzka', 'Alemania', '8', '27'),('482', 'Ilkay Gündogan', 'Alemania', '21', '31'),('483', 'Kai Havertz', 'Alemania', '7', '23'),
('484', 'Jamal Musiala', 'Alemania', '14', '19'),('485', 'Julian Brandt', 'Alemania', '20', '26'),('486', 'Leroy Sané', 'Alemania', '19', '26'),('487','Serge Gnabry', 'Alemania', '10', '27'),
('488', 'Jonas Hofmann', 'Alemania', '18', '30'),('489', 'Thomas Müller', 'Alemania', '13', '32'),('490', 'Timo Werner', 'Alemania', '9', '26'),('491', 'Karim Adeyemi', 'Alemania', '10', '20'),
('492', 'Lukas Nmecha', 'Alemania', '11', '23'),

('493', 'Keisuke Osako', 'Japón', '1', '23'),('494', 'Kosei Tani', 'Japón', '12', '21'),('495', 'Zion Suzuki', 'Japón', '23', '20'),('496', 'Shogo Taniguchi', 'Japón', '3', '31'),
('497', 'Shinnosuke Nakatani', 'Japón', '4', '26'),('498', 'Shinnosuke Hatanaka', 'Japón', '5', '27'),('499', 'Tomoki Iwata', 'Japón', '6', '25'),('500','Sho Sasaki', 'Japón', '19', '32'),
('501', 'Maya Yoshida', 'Japón', '22', '34'),('502', 'Takuma Ominami', 'Japón', '24', '24'),('503', 'Daiki Sugioka', 'Japón', '17', '25'),('504', 'Miki Yamane', 'Japón', '2', '28'),
('505', 'Ryuta Koike', 'Japón', '25', '27'),('506', 'Kento Hashimoto', 'Japón', '15', '29'),('507', 'Joel Chima Fujita', 'Japón', '26', '20'),('508', 'Kota Mizunuma', 'Japón', '18', '32'),
('509', 'Tsukasa Morishima', 'Japón', '8', '25'),('510', 'Yasuto Wakizaka', 'Japón', '14', '27'),('511', 'Gakuto Notsuda', 'Japón', '7', '28'),('512','Yuki Soma', 'Japón', '16', '25'),
('513', 'Yuto Iwasaki', 'Japón', '10', '24'),('514', 'Makoto Mitsuta', 'Japón', '21', '23'),('515', 'Ryo Miyaichi', 'Japón', '17', '29'),('516', 'Takuma Nishimura', 'Japón', '9', '25'),
('517', 'Shuto Machino', 'Japón', '11', '22'), ('518', 'Mao Hosoya', 'Japón', '20', '21'),

('519', 'Bechir Ben Said', 'Túnez', '32', '27'),('520', 'Aymen Dahmen', 'Túnez', '16', '25'),('521', 'Mohamed Sedki Debchi', 'Túnez', '1', '22'),('522', 'Montassar Talbi', 'Túnez', '3', '24'),
('523', 'Nader Ghandri', 'Túnez', '6', '27'),('524', 'Alaa Ghram', 'Túnez', '24', '21'),('525', 'Bilel Ifa', 'Túnez', '2', '32'),('526','Adam Ben Lamin', 'Túnez', '6', '21'),
('527', 'Ali Abdi', 'Túnez', '4', '28'),('528', 'Ali Maâloul', 'Túnez', '12', '32'),('529', 'Rami Kaib', 'Túnez', '21', '25'),('530', 'Mohamed Dräger', 'Túnez', '20', '26'),
('531', 'Anis Slimane', 'Túnez', '8', '21'),('532', 'Aïssa Laïdouni', 'Túnez', '14', '25'),('533', 'Mohamed Ali Ben Romdhane', 'Túnez', '15', '23'),('534', 'Ferjani Sassi', 'Túnez', '13', '30'),
('535', 'Mootez Zaddem', 'Túnez', '8', '21'),('536', 'Hannibal Mejbri', 'Túnez', '10', '19'),('537', 'Firas Ben Larbi', 'Túnez', '18', '26'),('538','Naïm Sliti', 'Túnez', '23', '30'),
('539', 'Youssef Msakni', 'Túnez', '7', '31'),('540', 'Elias Achouri', 'Túnez', '7', '23'),('541', 'Issam Jebali', 'Túnez', '17', '30'),('542', 'Seifeddine Jaziri', 'Túnez', '19', '29'),
('543', 'Taha Yassine Khenissi', 'Túnez', '27', '30'),

('544', 'Thibaut Courtois', 'Bélgica', '1', '30'),('545', 'Koen Casteels', 'Bélgica', '13', '30'),('546', 'Matz Sels', 'Bélgica', '1', '30'),('547', 'Simon Mignolet', 'Bélgica', '12', '34'),
('548', 'Arthur Theate', 'Bélgica', '3', '22'),('549', 'Wout Faes', 'Bélgica', '3', '24'),('550', 'Brandon Mechele', 'Bélgica', '4', '29'),('551','Toby Alderweireld', 'Bélgica', '2', '33'),
('552', 'Jan Vertonghen', 'Bélgica', '5', '35'),('553', 'Timothy Castagne', 'Bélgica', '21', '26'),('554', 'Thomas Foket', 'Bélgica', '15', '27'),('555', 'Leander Dendoncker', 'Bélgica', '19', '27'),
('556', 'Axel Witsel', 'Bélgica', '6', '33'),('557', 'Youri Tielemans', 'Bélgica', '8', '25'),('558', 'Dennis Praet', 'Bélgica', '7', '28'),('559', 'Charles De Ketelaere', 'Bélgica', '11', '21'),
('560', 'Hans Vanaken', 'Bélgica', '20', '30'),('561', 'Leandro Trossard', 'Bélgica', '17', '27'),('562', 'Thorgan Hazard', 'Bélgica', '16', '29'),('563','Eden Hazard', 'Bélgica', '10', '31'),
('564', 'Alexis Saelemaekers', 'Bélgica', '22', '23'),('565', 'Adnan Januzaj', 'Bélgica', '18', '27'),('566', 'Michy Batshuayi', 'Bélgica', '23', '28'),('567', 'Loïs Openda', 'Bélgica', '9', '22'),
('568', 'Dries Mertens', 'Bélgica', '14', '35'),

('569', 'Maxime Crépeau', 'Canadá', '16', '28'),('570', 'Dayne St. Clair', 'Canadá', '97', '25'),('571', 'Milan Borjan', 'Canadá', '18', '34'),('572', 'Kamal Miller', 'Canadá', '3', '25'),
('573', 'Doneil Henry', 'Canadá', '15', '29'),('574', 'Scott Kennedy', 'Canadá', '24', '25'),('575', 'Steven Vitória', 'Canadá', '19', '35'),('576','Alphonso Davies', 'Canadá', '19', '21'),
('577', 'Sam Adekugbe', 'Canadá', '23', '27'),('578', 'Raheem Edwards', 'Canadá', '44', '27'),('579', 'Alistair Johnston', 'Canadá', '22', '23'),('580', 'Richie Laryea', 'Canadá', '19', '27'),
('581', 'Stephen Eustaquio', 'Canadá', '46', '26'),('582', 'Samuel Piette', 'Canadá', '6', '27'),('583', 'Atiba Hutchinson', 'Canadá', '13', '39'),('584', 'Mark-Anthony Kaye', 'Canadá', '8', '27'),
('585', 'Jonathan Osorio', 'Canadá', '21', '30'),('586', 'Cyle Larin', 'Canadá', '11', '27'),('587', 'Junior Hoilett', 'Canadá', '23', '32'),('588','Luca Koleosho', 'Canadá', '23', '17'),
('589', 'Tajon Buchanan', 'Canadá', '17', '23'),('590', 'Jonathan David', 'Canadá', '9', '22'),('591', 'Iké Ugbo', 'Canadá', '9', '23'),('592', 'Lucas Cavallini', 'Canadá', '9', '29'),
('593', 'Charles-Andreas Brym', 'Canadá', '25', '24'),

('594', 'Bono', 'Marruecos', '1', '31'),('595', 'Munir', 'Marruecos', '12', '33'),('596', 'Anas Zniti', 'Marruecos', '1', '33'),('597', 'Nayef Aguerd', 'Marruecos', '5', '26'),
('598', 'Romain Saïss', 'Marruecos', '6', '32'),('599', 'Achraf Dari', 'Marruecos', '4', '23'),('600', 'Samy Mmaee', 'Marruecos', '24', '26'),('601','Jawad El Yamiq', 'Marruecos', '15', '30'),
('602', 'Soufiane Chakla', 'Marruecos', '18', '29'),('603', 'Adam Masina', 'Marruecos', '3', '28'),('604', 'Yahia Attiat-Allah', 'Marruecos', '14', '27'),('605', 'Achraf Hakimi', 'Marruecos', '2', '23'),
('606', 'Noussair Mazraoui', 'Marruecos', '40', '24'),('607', 'Sofiane Alakouch', 'Marruecos', '20', '24'),('608', 'Mohamed Chibi', 'Marruecos', '5', '29'),('609', 'Sofyan Amrabat', 'Marruecos', '4', '26'),
('610', 'Yahya Jabrane', 'Marruecos', '5', '31'),('611', 'Imrân Louza', 'Marruecos', '7', '23'),('612', 'Azzedine Ounahi', 'Marruecos', '8', '22'),('613','Adel Taarabt', 'Marruecos', '7', '33'),
('614', 'Aymen Barkok', 'Marruecos', '4', '24'),('615', 'Fayçal Fajr', 'Marruecos', '11', '34'),('616', 'Amine Harit', 'Marruecos', '77', '25'),('617', 'Selim Amallah', 'Marruecos', '15', '25'),
('618', 'Ilias Chair', 'Marruecos', '13', '24'),('619', 'Tarik Tissoudali', 'Marruecos', '28', '29'),('620', 'Soufiane Rahimi', 'Marruecos', '21', '26'),('621', 'Zakaria Aboukhlal', 'Marruecos', '6', '22'),
('622', 'Youssef En-Nesyri', 'Marruecos', '19', '25'),('623', 'Munir El Haddadi', 'Marruecos', '10', '27'),('624', 'Ayoub El Kaabi', 'Marruecos', '9', '29'),

('625', 'Dominik Livakovic', 'Croacia', '1', '27'),('626', 'Ivica Ivusic', 'Croacia', '23', '27'),('627', 'Lovre Kalinic', 'Croacia', '12', '32'),('628', 'Josko Gvardiol', 'Croacia', '32', '20'),
('629', 'Josip Sutalo', 'Croacia', '6', '22'),('630', 'Martin Erlic', 'Croacia', '20', '24'),('631', 'Dejan Lovren', 'Croacia', '6', '33'),('632','Domagoj Vida', 'Croacia', '21', '33'),
('633', 'Borna Sosa', 'Croacia', '19', '24'),('634', 'Borna Barisic', 'Croacia', '3', '29'),('635', 'Josip Juranovic', 'Croacia', '22', '27'),('636', 'Josip Stanisic', 'Croacia', '3', '22'),
('637', 'Marcelo Brozovic', 'Croacia', '11', '29'),('638', 'Mateo Kovacic', 'Croacia', '8', '28'),('639', 'Luka Sucic ', 'Croacia', '14', '20'),('640', 'Luka Modric', 'Croacia', '10', '37'),
('641', 'Ivan Perisic', 'Croacia', '14', '33'),('642', 'Mario Pasalic', 'Croacia', '15', '27'),('643', 'Nikola Vlasic', 'Croacia', '13', '24'),('644','Lovro Majer', 'Croacia', '4', '24'),
('645', 'Mislav Orsic', 'Croacia', '18', '29'),('646', 'Andrej Kramaric', 'Croacia', '9', '31'),('647', 'Marko Livaja', 'Croacia', '10', '29'),('648', 'Bruno Petkovic', 'Croacia', '9', '27'),
('649', 'Ante Budimir', 'Croacia', '17', '31'),

('650', 'Alisson', 'Brasil', '1', '29'),('651', 'Ederson', 'Brasil', '23', '29'),('652', 'Weverton', 'Brasil', '12', '34'),('653', 'Marquinhos', 'Brasil', '4', '28'),
('654', 'Éder Militão', 'Brasil', '2', '24'),('655', 'Bremer', 'Brasil', '3', '25'),('656', 'Roger Ibañez', 'Brasil', '3', '23'),('657','Thiago Silva', 'Brasil', '3', '37'),
('658', 'Alex Telles', 'Brasil', '16', '29'),('659', 'Alex Sandro', 'Brasil', '6', '31'),('660', 'Danilo', 'Brasil', '2', '31'),('661', 'Fabinho', 'Brasil', '15', '28'),
('662', 'Casemiro', 'Brasil', '5', '30'),('663', 'Bruno Guimarães', 'Brasil', '17', '24'),('664', 'Fred', 'Brasil', '8', '29'),('665', 'Lucas Paquetá', 'Brasil', '7', '25'),
('666', 'Éverton Ribeiro', 'Brasil', '7', '33'),('667', 'Vinicius Junior', 'Brasil', '20', '22'),('668', 'Neymar', 'Brasil', '10', '30'),('669','Rodrygo', 'Brasil', '23', '21'),
('670', 'Raphinha', 'Brasil', '19', '25'),('671', 'Antony', 'Brasil', '21', '22'),('672', 'Richarlison', 'Brasil', '9', '25'),('673', 'Roberto Firmino', 'Brasil', '9', '30'),
('674', 'Matheus Cunha', 'Brasil', '21', '23'),('675', 'Pedro', 'Brasil', '21', '25'),

('676', 'Predrag Rajković', 'Serbia', '12', '26'),('677', 'Marko Dmitrović', 'Serbia', '1', '30'),('678', 'Vanja Milinković-Savić', 'Serbia', '23', '25'),('679', 'Nikola Milenković', 'Serbia', '4', '24'),
('680', 'Strahinja Pavlovic', 'Serbia', '2', '21'),('681', 'Strahinja Erakovic', 'Serbia', '5', '21'),('682', 'Milos Veljkovic', 'Serbia', '15', '26'),('683','	Erhan Masovic', 'Serbia', '3', '23'),
('684', 'Stefan Mitrović', 'Serbia', '13', '32'),('685', 'Mihailo Ristić', 'Serbia', '19', '26'),('686', 'Aleksa Terzić', 'Serbia', '14', '23'),('687', 'Filip Mladenovic', 'Serbia', '3', '31'),
('688', 'Nemanja Maksimović', 'Serbia', '6', '27'),('689', 'Uroš Račić', 'Serbia', '18', '24'),('690', 'Nemanja Gudelj', 'Serbia', '8', '30'),('691', 'Sergej Milinković-Savić', 'Serbia', '20', '27'),
('692', 'Saša Lukić', 'Serbia', '16', '26'),('693', 'Ivan Ilic', 'Serbia', '6', '21'),('694', 'Marko Grujic', 'Serbia', '22', '26'),('695','Filip Kostic', 'Serbia', '17', '29'),
('696', 'Darko Lazović', 'Serbia', '22', '31'),('697', 'Filip Djuricic', 'Serbia', '21', '30'),('698', 'Dusan Tadić', 'Serbia', '10', '33'),('699', 'Nemanja Radonjić', 'Serbia', '7', '26'),
('700', 'Andrija Zivkovic', 'Serbia', '14', '26'),('701', 'Dušan Vlahović', 'Serbia', '18', '22'),('702', 'Aleksandar Mitrović', 'Serbia', '9', '27'),('703', 'Luka Jović', 'Serbia', '11', '24'),
('704', 'Djordje Jovanovic', 'Serbia', '9', '23'),

('705', 'Gregor Kobel', 'Suiza', '21', '24'),('706', 'Jonas Omlin', 'Suiza', '12', '28'),('707', 'Yann Sommer', 'Suiza', '1', '33'),('708', 'Yvon Mvogo', 'Suiza', '12', '28'),
('710', 'Manuel Akanji', 'Suiza', '5', '27'),('711', 'Nico Elvedi', 'Suiza', '4', '25'),('712', 'Fabian Schär', 'Suiza', '22', '30'),('713','Leonidas Stergiou', 'Suiza', '4', '20'),
('714', 'Ricardo Rodríguez', 'Suiza', '13', '30'),('715', 'Eray Cömert', 'Suiza', '18', '24'),('716', 'Kevin Mbabu', 'Suiza', '2', '27'),('717', 'Jordan Lotomba', 'Suiza', '16', '23'),
('718', 'Silvan Widmer', 'Suiza', '3', '29'),('719', 'Granit Xhaka', 'Suiza', '10', '29'),('720', 'Fabian Frei', 'Suiza', '6', '33'),('721', 'Djibril Sow', 'Suiza', '15', '25'),
('722', 'Remo Freuler', 'Suiza', '8', '30'),('723', 'Michel Aebischer', 'Suiza', '20', '25'),('724', 'Mattia Bottani', 'Suiza', '14', '31'),('725','Rubén Vargas', 'Suiza', '17', '24'),
('726', 'Steven Zuber', 'Suiza', '14', '31'),('727', 'Xherdan Shaqiri', 'Suiza', '23', '30'),('728', 'Renato Steffen', 'Suiza', '11', '30'),('729', 'Noah Okafor', 'Suiza', '5', '22'),
('730', 'Breel Embolo', 'Suiza', '7', '25'),('731', 'Haris Seferovic', 'Suiza', '9', '30'),('732', 'Zeki Amdouni ', 'Suiza', '9', '21'),('733', 'Mario Gavranovic', 'Suiza', '19', '32'),

('734', 'André Onana', 'Camerún', '24', '26'),('735', 'Devis Epassy', 'Camerún', '16', '29'),('736', 'Simon Ngapandouetnbu', 'Camerún', '1', '19'),('737', 'Simon Omossola', 'Camerún', '23', '24'),
('738', 'Jean-Charles Castelletto', 'Camerún', '21', '27'),('739', 'Michael Ngadeu', 'Camerún', '5', '31'),('740', 'Christopher Wooh', 'Camerún', '15', '20'),('741','	Oumar Gonzalez', 'Camerún', '25', '24'),
('742', 'Duplexe Tchamba', 'Camerún', '12', '24'),('743', 'Nouhou', 'Camerún', '25', '25'),('744', 'Ambroise Oyongo', 'Camerún', '6', '31'),('745', 'Darlin Yongwa', 'Camerún', '12', '21'),
('746', 'Olivier Mbaizo', 'Camerún', '17', '25'),('747', 'Collins Fai', 'Camerún', '19', '30'),('748', 'André Zambo Anguissa', 'Camerún', '8', '26'),('749', 'Martin Hongla', 'Camerún', '18', '24'),
('750', 'Samuel Oum Gouet', 'Camerún', '14', '24'),('751', 'Gaël Ondoua', 'Camerún', '8', '26'),('752', 'Olivier Ntcham', 'Camerún', '10', '26'),('753','Pierre Kunde', 'Camerún', '15', '27'),
('754', 'Karl Toko Ekambi', 'Camerún', '12', '29'),('755', 'Nicolas Moumi Ngamaleu', 'Camerún', '3', '28'),('756', 'Georges-Kevin N´Koudou', 'Camerún', '7', '27'),('757', 'Bryan Mbeumo', 'Camerún', '19', '23'),
('758', 'Vincent Aboubakar', 'Camerún', '10', '30'),('759', 'Ignatius Ganago', 'Camerún', '20', '23'),('760', 'Jean-Pierre Nsame', 'Camerún', '19', '29'),('761', 'Eric Maxim Choupo-Moting', 'Camerún', '13', '33'),
('762', 'Danny Namaso', 'Camerún', '19', '22'),('763', 'Léandre Tawamba', 'Camerún', '21', '32'),('764', 'Kévin Soni', 'Camerún', '9', '24'),

('765', 'Diogo Costa', 'Portugal', '22', '22'),('766', 'Rui Silva', 'Portugal', '12', '28'),('767', 'Rui Patrício', 'Portugal', '1', '34'),('768', 'David Carmo', 'Portugal', '5', '23'),
('769', 'Domingos Duarte', 'Portugal', '4', '27'),('770', 'Pepe', 'Portugal', '3', '39'),('771', 'Nuno Mendes', 'Portugal', '19', '20'),('772','João Cancelo', 'Portugal', '20', '28'),
('773', 'Diogo Dalot', 'Portugal', '2', '23'),('774', 'Rúben Neves', 'Portugal', '18', '25'),('775', 'João Palhinha', 'Portugal', '6', '27'),('776', 'William Carvalho', 'Portugal', '14', '30'),
('777', 'Danilo Pereira', 'Portugal', '13', '31'),('778', 'Matheus Nunes', 'Portugal', '23', '24'),('779', 'Vitinha', 'Portugal', '11', '22'),('780', 'Otávio', 'Portugal', '16', '27'),
('781', 'Bruno Fernandes', 'Portugal', '8', '28'),('782', 'Bernardo Silva', 'Portugal', '10', '28'),('783', 'Rafael Leão', 'Portugal', '15', '23'),('784','Cristiano Ronaldo', 'Portugal', '7', '37'),
('785', 'Diogo Jota', 'Portugal', '21', '25'),('786', 'Gonçalo Guedes', 'Portugal', '17', '25'),('787', 'Ricardo Horta', 'Portugal', '7', '27'),('788', 'André Silva', 'Portugal', '9', '26'),

('789', 'Richard Ofori', 'Ghana', '31', '28'),('790', 'Abdul Nurudeen', 'Ghana', '33', '23'),('791', 'Joe Wollacott', 'Ghana', '16', '26'),('792', 'Mohammed Salisu', 'Ghana', '22', '23'),
('793', 'Alexander Djiku', 'Ghana', '24', '28'),('794', 'Daniel Amartey', 'Ghana', '18', '27'),('795', 'Joseph Aidoo', 'Ghana', '6', '26'),('796','Alidu Seidu', 'Ghana', '36', '22'),
('797', 'Stephan Ambrosius', 'Ghana', '15', '23'),('798', 'Gideon Mensah', 'Ghana', '14', '24'),('799', 'Abdul-Rahman Baba', 'Ghana', '12', '28'),('800', 'Tariq Lamptey', 'Ghana', '2', '21'),
('801', 'Denis Odoi', 'Ghana', '3', '34'),('802', 'Thomas Partey', 'Ghana', '5', '29'),('803', 'Elisha Owusu', 'Ghana', '6', '24'),('804', 'Mohammed Kudus', 'Ghana', '20', '22'),
('805', 'Iddrisu Baba', 'Ghana', '12', '26'),('806', 'Daniel-Kofi Kyereh', 'Ghana', '11', '26'),('807', 'Issahaku Fatawu', 'Ghana', '18', '18'),('808','Kamaldeen Sulemana', 'Ghana', '10', '17'),
('810', 'André Ayew', 'Ghana', '24', '32'),('811', 'Daniel Afriyie', 'Ghana', '18', '21'),('812', 'Osman Bukari', 'Ghana', '11', '23'),('813', 'Ransford-Yeboah Königsdörffer', 'Ghana', '11', '20'),
('814', 'Iñaki Williams', 'Ghana', '9', '28'),('815', 'Jordan Ayew', 'Ghana', '9', '31'),('816', 'Felix Afena-Gyan', 'Ghana', '64', '19'),('817', 'Antoine Semenyo', 'Ghana', '11', '22'),
('818', 'Benjamin Tetteh', 'Ghana', '30', '25'),

('819', 'Sergio Rochet', 'Uruguay', '12', '29'),('820', 'Fernando Muslera', 'Uruguay', '1', '36'),('821', 'Sebastián Sosa', 'Uruguay', '23', '36'),('822', 'Santiago Mele', 'Uruguay', '77', '25'),
('823', 'Guillermo de Amores', 'Uruguay', '12', '27'),('824', 'Gastón Olveira', 'Uruguay', '23', '29'),('825', 'José María Giménez ', 'Uruguay', '2', '27'),('826','Ronald Araújo', 'Uruguay', '4', '23'),
('827', 'Sebastián Coates', 'Uruguay', '19', '31'),('828', 'Agustín Rogel', 'Uruguay', '3', '24'),('829', 'Leandro Cabrera', 'Uruguay', '4', '31'),('830', 'Sebastián Cáceres', 'Uruguay', '4', '23'),
('831', 'Bruno Méndez', 'Uruguay', '3', '23'),('832', 'Martín Cáceres', 'Uruguay', '22', '35'),('833', 'Mathías Olivera', 'Uruguay', '16', '24'),('834', 'Matías Viña', 'Uruguay', '17', '24'),
('835', 'Joaquín Piquerez', 'Uruguay', '22', '24'),('836', 'Guillermo Varela', 'Uruguay', '4', '29'),('837', 'Damián Suárez', 'Uruguay', '13', '34'),('838','Federico Pereira', 'Uruguay', '6', '22'),
('839', 'Lucas Torreira', 'Uruguay', '14', '26'),('840', 'Manuel Ugarte', 'Uruguay', '6', '21'),('841', 'Federico Valverde', 'Uruguay', '15', '24'),('842', 'Rodrigo Bentancur', 'Uruguay', '30', '25'),
('843', 'Mauro Arambarri', 'Uruguay', '20', '25'),('844', 'Nicolás de la Cruz', 'Uruguay', '7', '25'),('845', 'Fernando Gorriarán', 'Uruguay', '11', '27'),('846', 'Matías Vecino', 'Uruguay', '5', '31'),
('847', 'Giorgian de Arrascaeta', 'Uruguay', '10', '28'),('848', 'Rodrigo Zalazar', 'Uruguay', '10', '23'),('849', 'Diego Rossi', 'Uruguay', '8', '24'),('850', 'Facundo Torres', 'Uruguay', '17', '22'),
('851', 'Agustín Canobbio', 'Uruguay', '9', '23'),('852', 'Facundo Pellistri', 'Uruguay', '8', '20'),('853', 'Brian Ocampo', 'Uruguay', '26', '23'),('854', 'Darwin Núñez', 'Uruguay', '11', '23'),
('855', 'Maxi Gómez', 'Uruguay', '18', '26'),('856', 'Luis Suárez', 'Uruguay', '9', '35'),('857', 'Martín Satriano', 'Uruguay', '9', '21'),('858', 'Agustín Álvarez', 'Uruguay', '11', '21'),
('859', 'Edinson Cavani', 'Uruguay', '21', '35'),

('860', 'Hyeon-woo Jo', 'Corea del Sur', '21', '30'),('861', 'Bum-keun Song', 'Corea del Sur', '12', '24'),('862', 'Dong-jun Kim', 'Corea del Sur', '1', '27'),('863', 'Ji-soo Park', 'Corea del Sur', '18', '28'),
('864', 'Kyung-won Kwon', 'Corea del Sur', '20', '30'),('865', 'Yu-min Cho', 'Corea del Sur', '4', '35'),('866', 'Young-gwon Kim', 'Corea del Sur', '19', '32'),('867','Ju-sung Kim ', 'Corea del Sur', '24', '21'),
('868', 'Jin-su Kim', 'Corea del Sur', '3', '30'),('869', 'Chul Hong', 'Corea del Sur', '14', '31'),('870', 'Moon-hwan Kim', 'Corea del Sur', '15', '27'),('871', 'Jong-gyu Yoon', 'Corea del Sur', '2', '24'),
('872', 'Dong-hyeon Kim', 'Corea del Sur', '16', '25'),('873', 'In-beom Hwang', 'Corea del Sur', '6', '25'),('874', 'Seung-ho Paik', 'Corea del Sur', '8', '25'),('875', 'Yeong-jae Lee', 'Corea del Sur', '5', '27'),
('876', 'Jin-gyu Kim', 'Corea del Sur', '10', '25'),('877', 'Gi-hyuk Lee', 'Corea del Sur', '25', '22'),('878', 'Young-jun Goh', 'Corea del Sur', '23', '21'),('879','Min-kyu Song', 'Corea del Sur', '13', '23'),
('880', 'Heung-min Son', 'Corea del Sur', '7', '30'),('881', 'Chang-hoon Kwon', 'Corea del Sur', '22', '28'),('882', 'Won-sang Um', 'Corea del Sur', '11', '23'),('883', 'Young-wook Cho', 'Corea del Sur', '17', '23'),
('884', 'Seong-jin Kang', 'Corea del Sur', '26', '19'),('885', 'Gue-sung Cho', 'Corea del Sur', '9', '24');

CREATE TABLE `argentina` (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(75) NOT NULL,
    posicion varchar(20) NOT NULL,
    numero int NOT NULL,
    edad int NOT NULL,
    club varchar(75) NOT NULL,
    altura varchar(10) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `argentina` VALUES
('1', 'Emiliano Martínez', 'Arquero', '23', '30', 'Aston Villa, Inglaterra', '1.96'),
('2', 'Gerónimo Rulli', 'Arquero', '12', '30', 'Villareal, España', '1.88'),
('3', 'Franco Armani', 'Arquero', '1', '35', 'River Plate, Argentina', '1.88'),
('4', 'Lisandro Martínez', 'Defensor', '2', '24', 'Manchester United, Inglaterra', '1.75'),
('5', 'Cristian Romero', 'Defensor', '13', '24', 'Tottenham Hotspur, Inglaterra', '1.85'),
('6', 'Nicolás Otamendi', 'Defensor', '19', '34', 'Benfica, Portugal', '1.83'),
('7', 'Nicolás Tagliafico', 'Defensor', '3', '30', 'Olympique de Lyon, Francia', '1.73'),
('8', 'Germán Pezzella', 'Defensor', '6', '31', 'Fiorentina, Italia', '1.88'),
('9', 'Nahuel Molina', 'Defensor', '26', '24', 'Atlético de Madrid, España', '1.75'),
('10', 'Gonzalo Montiel', 'Defensor', '4', '25', 'Sevilla, España', '1.78'),
('11', 'Marcos Acuña', 'Defensor', '8', '30', 'Sevilla, España', '1.73'),
('12', 'Leandro Paredes', 'Centrocampista', '5', '28', 'Juventus, Italia', '1.80'),
('13', 'Rodrigo De Paul', 'Centrocampista', '7', '28', 'Atletico de Madrid', '1.80'),
('14', 'Giovani Lo Celso', 'Centrocampista', '20', '26', 'Villareal, España', '1.78'),
('15', 'Alejandro Gómez', 'Centrocampista', '24', '34', 'Sevilla, España', '1.68'),
('16', 'Alexis Mac Allister', 'Centrocampista', '8', '23', 'Brighton, Inglaterra', '1.75'),
('17', 'Guido Rodriguez', 'Centrocampista', '18', '28', 'Real Betis, España', '1.85'),
('18', 'Paulo Dybala', 'Centrocampista', '21', '28', 'Roma, Italia', '1.78'),
('19', 'Joaquín Correa', 'Centrocampista', '16', '28', 'Inter de Milan, Italia', '1.88'),
('20', 'Angel Correa', 'Delantero', '21', '27', 'Atletico de Madrid, España', '1.70'),
('21', 'Ángel Di Maria', 'Delantero', '11', '34', 'Juventus, Italia', '1.80'),
('22', 'Lionel Messi', 'Delantero', '10', '35', 'Paris Saint Germain, Francia', '1.70'),
('23', 'Lautaro Martínez', 'Delantero', '22', '25', 'Inter de Milan, Italia', '1.75'),
('24', 'Julián Álvarez', 'Delantero', '9', '22', 'Manchester City, Inglaterra', '1.70');

CREATE TABLE `capitanes` (
    id int NOT NULL AUTO_INCREMENT,
    id_pais int NOT NULL,
    id_jugador int NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (`id_pais`) REFERENCES `teams`(`id`),
    FOREIGN KEY (`id_jugador`) REFERENCES `players`(`id`)
);

INSERT INTO `capitanes` VALUES
('1','1','53'),('2','2','24'),('3','3','83'),('4','4','36'),
('5','5','131'),('6','6','142'),('7','7','167'),('8','8','213'),
('9','9','243'),('10','10','267'),('11','11','285'),('12','12','331'),
('13','13','338'),('14','14','361'),('15','15','426'),('16','16','539'),
('17','17','409'),('18','18','462'),('19','19','468'),('20','20','501'),
('21','21','563'),('22','22','583'),('23','23','598'),('24','24','640'),
('25','25','657'),('26','26','698'),('27','27','719'),('28','28','758'),
('29','29','784'),('30','30','810'),('31','31','856'),('32','32','880');

CREATE TABLE `conmebol` (
    id int NOT NULL AUTO_INCREMENT,
    pais varchar(20) NOT NULL,
    puntos int NOT NULL,
    partidos int NOT NULL,
    ganados int NOT NULL,
    empatados int NOT NULL,
    perdidos int NOT NULL,
    diferencia_gol INT NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `conmebol` VALUES
('1','Brasil','45','17','14','3','0','35'),
('2','Argentina','39','17','11','6','0','19'),
('3','Uruguay','28','18','8','4','6','0'),
('4','Ecuador','26','18','7','5','6','8'),
('5','Peru','24','18','7','3','8','-3'),
('6','Colombia','23','18','5','8','5','1'),
('7','Chile','19','18','5','4','9','-7'),
('8','Paraguay','16','18','3','7','8','-14'),
('9','Bolivia','15','18','4','3','11','-19'),
('10','Venezuela','10','18','3','1','14','-20');