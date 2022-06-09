CREATE DATABASE qatarclic;

USE qatarclic;

CREATE TABLE roles (
    id int(2) NOT NULL AUTO_INCREMENT,
    rol varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `roles` VALUES ('1', 'Moderador'), ('2', 'Administrador');

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    username varchar(20) NOT NULL UNIQUE,
    password varchar(500),
    rol_id int(2),
    PRIMARY KEY(id),
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`)
);

create table users_roles (
    user_id int(10) NOT NULL,
    role_id int(10) NOT NULL,
    PRIMARY KEY (user_id,role_id)
);