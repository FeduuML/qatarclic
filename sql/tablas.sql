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

INSERT INTO `news` VALUES('1', 'Lorrrran', 'Test1', 'Test1', '175104.jpg', '2022-09-08 14:10:29');
INSERT INTO `news` VALUES('2', 'Lorrrran', 'Test2', 'Test2', '224875.png', '2022-09-08 17:21:16');
INSERT INTO `news` VALUES('3', 'Lorrrran', 'Test3', 'Test3', '245070.jpg', '2022-09-08 22:55:27');
INSERT INTO `news` VALUES('4', 'Lorrrran', 'Test4', 'Test4', '367687.jpg', '2022-09-09 08:14:31');
INSERT INTO `news` VALUES('5', 'Lorrrran', 'Test5', 'Test5', '668926.jpg', '2022-09-09 15:36:12');

CREATE TABLE `preguntas_mundialito` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` text NOT NULL,
    `pregunta1` text NOT NULL,
    `pregunta2` text,
    `pregunta3` text,
    `pregunta4` text,
    `pregunta5` text,
    `deadline` datetime NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `preguntas_mundialito` VALUES ('1', 'Final del Mundial',
'¿Cuál será el primer equipo en llegar a la final?', 
'¿Cuál será el segundo equipo en llegar a la final?',
'¿Quién ganará la final?',
'¿Cuál será el tercer puesto?',
'¿Cuál será el cuarto puesto?',
'2022-11-20 00:00:00'),

('2', 'Repechajes',
'¿Quién será el ganador de Perú VS Australia?',
'¿Quién será el ganador de Costa Rica VS Nueva Zelanda?',
'¿Quién será el ganador de Gales VS Ucrania?',
'¿Quién será el ganador de Portugal VS Macedonia del Norte?',
'¿Quién será el ganador de Polonia VS Suecia?',
'2022-10-20 14:30:00'),

('3', 'Reconocimientos individuales',
'¿Quién será el máximo goleador del torneo?',
'¿Quién será el máximo asistidor del torneo?',
NULL,NULL,NULL,'2022-11-20 00:00:00');

CREATE TABLE `respuestas_mundialito` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_encuesta` int NOT NULL,
    `id_usuario` int NOT NULL,
    `respuesta1` text NOT NULL,
    `respuesta2` text,
    `respuesta3` text,
    `respuesta4` text,
    `respuesta5` text,
    PRIMARY KEY(id)
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
('285', 'Julián Araujo', 'México', '5', '32'),('286', 'Emilio Lara', 'México', '23', '20'),('287', 'Luis Chávez', 'México', '18', '26'),('288','Carlos Rodríguez', 'México', '19', '25'),
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
('425', 'Jannik Vestergaard', 'Dinamarca', '3', '31'),('426', 'Victor Nelsson', 'Dinamarca', '4', '23'),('427', 'Nicolai Boilesen', 'Dinamarca', '20', '30'),('428','Rasmus Kristensen', 'Dinamarca', '13', '25'),
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
('501', 'Hayato Araki', 'Japón', '22', '26'),('502', 'Takuma Ominami', 'Japón', '24', '24'),('503', 'Daiki Sugioka', 'Japón', '17', '25'),('504', 'Miki Yamane', 'Japón', '2', '28'),
('505', 'Ryuta Koike', 'Japón', '25', '27'),('506', 'Kento Hashimoto', 'Japón', '15', '29'),('507', 'Joel Chima Fujita', 'Japón', '26', '20'),('508', 'Kota Mizunuma', 'Japón', '18', '32'),
('509', 'Tsukasa Morishima', 'Japón', '8', '25'),('510', 'Yasuto Wakizaka', 'Japón', '14', '27'),('511', 'Gakuto Notsuda', 'Japón', '7', '28'),('512','Yuki Soma', 'Japón', '16', '25'),
('513', 'Yuto Iwasaki', 'Japón', '10', '24'),('514', 'Makoto Mitsuta', 'Japón', '21', '23'),('515', 'Ryo Miyaichi', 'Japón', '17', '29'),('516', 'Takuma Nishimura', 'Japón', '9', '25'),
('517', 'Shuto Machino', 'Japón', '11', '22'), ('518', 'Mao Hosoya', 'Japón', '20', '21');