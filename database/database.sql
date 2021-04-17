CREATE DATABASE administracion_empleados;
USE administracion_empleados;

CREATE TABLE areas(
    id  int(11) auto_increment not null,
    nombre varchar(255) not null,
    CONSTRAINT pk_areas PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO areas (`nombre`) VALUES ('Administracion');
INSERT INTO roles (`nombre`) VALUES ('Desarrollo');
INSERT INTO roles (`nombre`) VALUES ('Ventas');

CREATE TABLE empleado_rol(
    empleado_id int(11) not null,
    rol_id  int(11) not null
)ENGINE=InnoDb;

CREATE TABLE empleados(
    id int(11) auto_increment not null,
    nombre varchar(255) not null,
    email varchar(255) not null,
    sexo char(1) not null,
    area_id int(11) not null,
    descripcion text not null,
    CONSTRAINT pk_empleados PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE roles(
    id int(11) auto_increment not null,
    nombre varchar(255) not null,
    CONSTRAINT pk_roles PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO roles (`nombre`) VALUES ('Profesional de proyectos - Desarrollador');
INSERT INTO roles (`nombre`) VALUES ('Gerente estrategico');
INSERT INTO roles (`nombre`) VALUES ('Auxiliar administrativo');
