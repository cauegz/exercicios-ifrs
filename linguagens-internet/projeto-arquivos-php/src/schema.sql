USE login;

CREATE TABLE usuario (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(100),
	senha VARCHAR(255)
);

CREATE TABLE remember_tokens (
	id_token INT PRIMARY KEY AUTO_INCREMENT,
	id_usuario INT,
	validator_hash VARCHAR(255),
	selector VARCHAR(255),
	expires_at DATETIME
);

