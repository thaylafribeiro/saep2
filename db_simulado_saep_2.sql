CREATE DATABASE simulado_saep2;
USE simulado_saep2;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    endereco VARCHAR(150)
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    placa VARCHAR(10) NOT NULL,
    ano INT,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    veiculo_id INT NOT NULL,
    data_agendamento DATETIME NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'Pendente',

    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);


INSERT INTO users (name, email, password) VALUES
('Administrador', 'admin@oficina.com', '$2y$12$HASH_GERADO_PELO_LARAVEL'),
('Joao Silva', 'joao@oficina.com', '$2y$12$HASH_GERADO_PELO_LARAVEL'),
('Maria Souza', 'maria@oficina.com', '$2y$12$HASH_GERADO_PELO_LARAVEL');

INSERT INTO clientes (nome, cpf, telefone, email, endereco) VALUES
('Carlos Oliveira', 'CPF_CRIPTOGRAFADO_1', '11999990001', 'carlos@email.com', 'Rua A, 100'),
('Ana Pereira', 'CPF_CRIPTOGRAFADO_2', '11999990002', 'ana@email.com', 'Rua B, 200'),
('Pedro Santos', 'CPF_CRIPTOGRAFADO_3', '11999990003', 'pedro@email.com', 'Rua C, 300');

INSERT INTO veiculos (cliente_id, marca, modelo, placa, ano) VALUES
(1, 'Volkswagen', 'Gol', 'ABC1234', 2018),
(2, 'Chevrolet', 'Onix', 'DEF5678', 2020),
(3, 'Fiat', 'Argo', 'GHI9012', 2022);

INSERT INTO agendamentos (veiculo_id, data_agendamento, descricao, status) VALUES
(1, '2026-12-01 08:00:00', 'Troca de oleo', 'Pendente'),
(2, '2026-12-02 10:00:00', 'Revisao dos freios', 'Pendente'),
(3, '2026-12-03 14:00:00', 'Alinhamento e balanceamento', 'Pendente');

SELECT * FROM users;

SELECT * FROM clientes;

SELECT * FROM veiculos;

