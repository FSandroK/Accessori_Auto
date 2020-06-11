DROP DATABASE IF EXISTS ACCESSORI_AUTO;
CREATE DATABASE ACCESSORI_AUTO;
USE ACCESSORI_AUTO;

CREATE TABLE Automobile(
	Id INT AUTO_INCREMENT PRIMARY KEY,
	Casa_Automobilistica VARCHAR(16) NOT NULL,
    Modello VARCHAR(16) NOT NULL,
    Anno YEAR NOT NULL,
    Numero_Porte INT NOT NULL,
	CHECK( Numero_Porte IN (3,5))
);

CREATE TABLE Accessorio(
	Id INT AUTO_INCREMENT PRIMARY KEY,
	Nome VARCHAR(16) NOT NULL,
	Descrizione VARCHAR(64) NOT NULL,
	Automobile INT NOT NULL,
	FOREIGN KEY (Automobile) REFERENCES Automobile(Id)
);

CREATE TABLE Magazzino(
	Id INT AUTO_INCREMENT PRIMARY KEY,
	Nome VARCHAR(16) NOT NULL,
	Città VARCHAR(16) NOT NULL
);

CREATE TABLE Fornitura(
	MagazzinoId INT NOT NULL,
	AccessorioId INT NOT NULL,
	Quanto INT(5) NOT NULL,
	PRIMARY KEY(MagazzinoId,AccessorioId),
	CONSTRAINT FK_Magazzino FOREIGN KEY (MagazzinoId)
    	REFERENCES Magazzino(Id),
	CONSTRAINT FK_Accessorio FOREIGN KEY (AccessorioId)
    	REFERENCES Accessorio(Id)
);
	
