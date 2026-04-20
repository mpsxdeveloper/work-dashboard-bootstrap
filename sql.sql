CREATE DATABASE workdashboard;

CREATE TABLE setores (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,    
    PRIMARY KEY(id),
    UNIQUE(nome)
);

CREATE TABLE status (
    id INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(25) NOT NULL,    
    PRIMARY KEY(id),
    UNIQUE(descricao)
);

CREATE TABLE funcionarios (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    matricula VARCHAR(12) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    foto VARCHAR(40) NOT NULL DEFAULT 'semfoto.jpg',
    setor_id INT NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(matricula),
    FOREIGN KEY (setor_id) REFERENCES setores(id)
);

CREATE TABLE funcionarios_status (
    id INT NOT NULL AUTO_INCREMENT,
    datastatus DATE NOT NULL,
    funcionario_id INT NOT NULL,
    status_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (funcionario_id) REFERENCES funcionarios(id),
    FOREIGN KEY (status_id) REFERENCES status(id)
);