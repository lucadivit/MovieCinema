DROP DATABASE IF EXISTS cinema;
CREATE DATABASE cinema;
USE cinema;

CREATE TABLE utente (
  username varchar(20) NOT NULL,
  nome varchar(40) NOT NULL,
  cognome varchar(40) NOT NULL,
  data_nascita date DEFAULT NULL,
  password varchar(30) NOT NULL,
  sesso varchar(2) DEFAULT NULL,
  numero_biglietti varchar(2) DEFAULT 0,
  email varchar(80) NOT NULL,
  citta varchar(20) DEFAULT NULL,
  provincia varchar(20) DEFAULT NULL,
  CAP varchar(5) DEFAULT NULL,
  omaggio varchar(2) DEFAULT 0,
  stato enum('non attivo','attivo') DEFAULT 'non attivo',
  PRIMARY KEY (username)
);

CREATE TABLE amministratore(
    username varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    email varchar(40) NOT NULL,
    nome varchar(20) NOT NULL,
    cognome varchar(30) NOT NULL,
    data_nascita varchar(30)NOT NULL,
    PRIMARY KEY(username)
);

CREATE TABLE carta_credito(
    username varchar(20) NOT NULL,
    numero_carta varchar(20) NOT NULL,
    data_scadenza date NOT NULL,
    credit_validation_value varchar (4) NOT NULL,
    PRIMARY KEY(numero_carta),
    FOREIGN KEY(username) REFERENCES utente(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE film(
    titolo varchar(40) NOT NULL,
    autore varchar(30) NOT NULL,
    durata varchar(4) NOT NULL,
    genere varchar(20) NOT NULL,
    codice_film varchar(6) NOT NULL,
    trama varchar(2048) NOT NULL,
    locandina varchar(100) NOT NULL,
    PRIMARY KEY(codice_film)
);

CREATE TABLE commento(
id_commento int(6) NOT NULL AUTO_INCREMENT,
codice_film varchar(40) NOT NULL,
commento varchar(2048) NOT NULL,
voto int(1) DEFAULT 0,
PRIMARY KEY (id_commento),
FOREIGN KEY (codice_film) REFERENCES film(codice_film) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE sala(
id_sala varchar(5) NOT NULL,
codice_film varchar(40),
numero_posti int(3) DEFAULT 150,
numero_posti2 int(3) DEFAULT 150,
numero_posti3 int(3) DEFAULT 150,
titolo_film varchar(30) NOT NULL,
orario1 time,
orario2 time,
orario3 time,
PRIMARY KEY(id_sala),
FOREIGN KEY (codice_film) REFERENCES film(codice_film) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE tariffe(
id_tariffa int(1) NOT NULL DEFAULT 0,
prezzo_adulto varchar(5) NOT NULL,
prezzo_ridotto varchar(5) NOT NULL,
PRIMARY KEY (id_tariffa)
);
