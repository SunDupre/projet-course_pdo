CREATE DATABASE AnnuaireToutou;
USE AnnuaireToutou;
CREATE USER "AdminToutou" @"localhost" IDENTIFIED BY "Annu@ireT0ut0u",
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO "AdminToutou" @"localhost",
FLUSH PRIVILEGES,
CREATE TABLE Maitres (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(200),
  telephone VARCHAR(20),
) 
CREATE TABLE Chiens (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255),
  age INT,
  race VARCHAR(200),
  id_maitre INT,
  FOREIGN KEY (id_maitre) REFERENCES Maitres(id),
)
-- Insérer un maitre
INSERT INTO Maitres (nom, telephone) VALUE ('Bob', '0795647620');
-- Insérer un chien
INSERT INTO Chiens (nom, age, race, id_maitre) VALUE ('Nolly',2 , 'bouledog', 1);
-- Sélectionner tous les chiens
SELECT id,nom,race FROM Chiens;
-- Sélectionner un chien avec lers information de son maitre
SELECT * FROM Chiens INNER JOIN Maitres ON Chiens.id_maitre = maitre.id
-- Autre methode
SELECT c.id, c.nom, c.race, m.nom AS nomMaitre, m.telephone 
FROM Chiens c INNER JOIN Maitres m ON Chiens.id_maitre = maitre.id -- list
WHERE c.id = 1 -- seulement un chien
-- Pour effacer un chien
DELETE  FROM `Chiens` WHERE id = 1
