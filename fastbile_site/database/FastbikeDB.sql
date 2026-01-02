CREATE TABLE utenti (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telefono varchar(30) NOT NULL UNIQUE,
    dataNascita date,
    data_registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);