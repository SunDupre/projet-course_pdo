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
  FOREIGN KEY (id-maitre) REFERENCES Maitres(id),
)