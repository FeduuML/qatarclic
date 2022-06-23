CREATE DATABASE qatarclic;

USE qatarclic;

CREATE TABLE roles (
    id int(2) NOT NULL AUTO_INCREMENT,
    rol varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `roles` VALUES ('1', 'Moderador'),('2', 'Administrador'),('3', 'Hincha');

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    username varchar(20) NOT NULL UNIQUE,
    password varchar(500),
    rol_id int(2),
    PRIMARY KEY(id),
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`)
);

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