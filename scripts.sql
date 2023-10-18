create database TiendaAbarrotes;
use TiendaAbarrotes;

create table productos(
	id int auto_increment primary key,
    nombre varchar(100),
    precio decimal(10,2),
    stock int,
    proveedor varchar(100),
    fecha_ingreso date
);