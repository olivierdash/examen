CREATE OR REPLACE DATABASE Takalo_takalo;

USE Takalo_takalo;

CREATE TABLE User(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(30),
    email VARCHAR(30),
    MotdePasse VARCHAR(255)
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
    Description VARCHAR(100)
);

CREATE TABLE Echanges(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    IdObjet1 INT,
    IdObjet2 INT,
    DateEchange DATE
);

CREATE TABLE Manager(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    MotdePasse VARCHAR(255)
);

-- 1. Insertion des Catégories
INSERT INTO Categorie (Nom, Description) VALUES 
('Électronique', 'Appareils high-tech et gadgets'),
('Vêtements', 'Habits pour hommes, femmes et enfants'),
('Maison', 'Articles de décoration et ameublement'),
('Sports', 'Équipements sportifs et loisirs');

-- 2. Insertion des Utilisateurs
INSERT INTO User (Nom, email, MotdePasse) VALUES 
('Jean Dupont', 'jean.dupont@email.com', 'pass123'),
('Marie Laza', 'marie.laza@email.com', 'soleil2024'),
('Luc Ratsi', 'luc.ratsi@email.com', 'securite99');

-- 3. Insertion des Objets
-- Note: Les IDs correspondent aux utilisateurs et catégories insérés ci-dessus
INSERT INTO Objet (Titre, Description, Prix, IdProprietaire, IdCategorie) VALUES 
('iPhone 13 Pro', 'État neuf, batterie 95%, couleur bleu.', 750.00, 1, 1),
('Veste en cuir', 'Veste vintage, taille L, marron.', 45.00, 1, 2),
('Table basse', 'Table en bois massif pour salon.', 120.00, 2, 3),
('Raquette de Tennis', 'Modèle pro, très légère.', 80.00, 3, 4);

-- 4. Insertion des Chemins d'Images
INSERT INTO Objet_image (Nom, IdObjet) VALUES 
('images/iphone13_front.jpg', 1),
('images/iphone13_back.jpg', 1),
('images/veste_cuir_1.png', 2),
('images/table_basse_design.jpg', 3),
('images/raquette_tennis.jpg', 4);

-- 5. Insertion des Échanges
INSERT INTO Echanges (IdObjet1, IdObjet2, DateEchange) VALUES 
(1, 3, '2024-05-01'),
(2, 4, '2024-05-10');