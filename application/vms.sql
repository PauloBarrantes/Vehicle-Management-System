CREATE TABLE usuarios (
    email varchar(120) NOT NULL PRIMARY KEY,
    password text NOT NULL,
    nombre varchar(50) NOT NULL,
    apellido1 varchar(60) NOT NULL,
    rol varchar(20) NOT NULL
);

CREATE TABLE vehiculos(
    placa varchar (6) NOT NULL PRIMARY KEY,
    kilometraje int (20) NOT NULL ,
    combustible float Not NULL -- 0% - 100%

);