CREATE OR REPLACE DATABASE Takalo_takalo;

USE Takalo_takalo;

CREATE TABLE User(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(30),
    email VARCHAR(30),
    MotdePasse VARCHAR(30)
);

CREATE TABLE Objet(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(30),
    Description VARCHAR(250),
    Prix DECIMAL(10, 2),
    IdProprietaire INT,
    IdCategorie INT
);

CREATE TABLE Objet_image(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    IdObjet INT
);

CREATE TABLE Categorie(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    Description VARCHAR(100),
    Date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
