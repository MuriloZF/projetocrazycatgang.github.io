CREATE DATABASE crazycatgang;
USE crazycatgang;

CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
	funcao TEXT NOT NULL,
    disponibilidade TEXT,
    moradia_temp TEXT
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    endereco TEXT NOT NULL,
    foto BLOB,
    info TEXT
);