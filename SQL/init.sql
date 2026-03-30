CREATE DATABASE IF NOT EXISTS revieweo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE revieweo;

CREATE TABLE `User` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL DEFAULT 0 
);

CREATE TABLE Categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE Critique (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    note INT NOT NULL,
    date_creation DATE NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES `User`(id) ON DELETE CASCADE
);

CREATE TABLE `Like` (
    id_user INT NOT NULL,
    id_critique INT NOT NULL,
    PRIMARY KEY (id_user, id_critique),
    FOREIGN KEY (id_user) REFERENCES `User`(id) ON DELETE CASCADE,
    FOREIGN KEY (id_critique) REFERENCES Critique(id) ON DELETE CASCADE
);

CREATE TABLE Critique_Categorie (
    id_critique INT NOT NULL,
    id_categorie INT NOT NULL,
    PRIMARY KEY (id_critique, id_categorie),
    FOREIGN KEY (id_critique) REFERENCES Critique(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id) ON DELETE CASCADE
);

USE revieweo;

INSERT INTO Categorie (nom) VALUES 
('Action'), ('Science-Fiction'), ('Drame'), ('Comédie'), ('Horreur');

INSERT INTO `User` (pseudo, email, password, role) VALUES 
('Cinephile99', 'test@test.fr', '$2y$10$YOURHASHGUESTHERE...', 1);

INSERT INTO Critique (titre, contenu, note, date_creation, id_user) VALUES 
('Dune : Partie 2', 'Un chef d''œuvre visuel absolu. Denis Villeneuve a réussi un pari impossible.', 5, '2026-03-30', 1);

INSERT INTO Critique_Categorie (id_critique, id_categorie) VALUES (1, 2);