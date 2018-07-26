
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE usuarios (
    email varchar(120) NOT NULL PRIMARY KEY,
    password text NOT NULL,
    nombre varchar(50) NOT NULL,
    apellido1 varchar(60) NOT NULL,
    rol varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE   vehiculos(
    placa varchar (6) NOT NULL PRIMARY KEY,
    kilometraje int (20) NOT NULL ,
    combustible int Not NULL -- 0% - 100%

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
