create database banco_de_usuarios;

CREATE TABLE usuario (
  id int auto_increment primary key,
  nome varchar(40),
  email varchar(80) unique key,
  usuario varchar(40) unique key,
  senha varchar(100)
);
