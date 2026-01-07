CREATE TABLE utenti (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(30) NOT NULL UNIQUE,
    codiceFiscale VARCHAR(16) NOT NULL UNIQUE,
    dataNascita DATE NOT NULL,
    data_registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Sedi (
    idSede INT AUTO_INCREMENT PRIMARY KEY,
    coordinataX FLOAT NOT NULL,
    coordinataY FLOAT NOT NULL,
    via VARCHAR(255) NOT NULL,
    citta VARCHAR(255) NOT NULL DEFAULT 'Genova',
    cap VARCHAR(10) NOT NULL
);

CREATE TABLE Biciclette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255) NOT NULL,
    modello VARCHAR(255) NOT NULL,
    prezzo_ora DECIMAL(10, 2) NOT NULL,
    descrizione TEXT,
    stato ENUM('disponibile', 'noleggiata', 'manutenzione') DEFAULT 'disponibile',
    idSede_appartenenza INT,
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idSede_appartenenza) REFERENCES Sedi(idSede) ON DELETE SET NULL
);