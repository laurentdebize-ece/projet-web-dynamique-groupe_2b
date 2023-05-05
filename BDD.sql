DROP DATABASE IF EXISTS BDCOMMANDES;
CREATE DATABASE BDCOMMANDES;
USE BDCOMMANDES;
DROP TABLE IF EXISTS Eleve;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Prof;
DROP TABLE IF EXISTS Matiere;
DROP TABLE IF EXISTS Competence;
DROP TABLE IF EXISTS Classe;
DROP TABLE IF EXISTS Promo;
DROP TABLE IF EXISTS Ecole;
DROP TABLE IF EXISTS CompetenceTransverse;
DROP TABLE IF EXISTS Admin;

/*Création des différentes tables pour stocker les données*/
/*Les # sont modélisé par le fait que l'Id d'une table peut apparaître
à plusieurs endroits (dans d'autrestables), voir tp4 BDD*/

CREATE TABLE Utilisateur (
IdUtilisateur Numeric(2) NOT NULL primary key ,
statut VARCHAR(25) NOT NULL ,
mail VARCHAR(320) NOT NULL ,
mdp VARCHAR(25) NOT NULL
);

CREATE TABLE Eleve (
IdEleve Numeric(2) NOT NULL primary key ,
nomEleve VARCHAR(25) NOT NULL ,
prenomEleve VARCHAR(25) NOT NULL,
mail VARCHAR(320) NOT NULL ,
mdp VARCHAR(25) NOT NULL,
IdUtilisateur Numeric(2) NOT NULL ,
ecole VARCHAR(25) NOT NULL,
promo Numeric(4) NOT NULL ,
IdClasse Numeric(2) NOT NULL ,
nomClasse VARCHAR(25) NOT NULL,
);

CREATE TABLE Prof (
IdProf Numeric(2) NOT NULL primary key ,
nomProf VARCHAR(25) NOT NULL ,
prenomProf VARCHAR(25) NOT NULL ,
mail VARCHAR(320) NOT NULL ,
mdp VARCHAR(25) NOT NULL,
nomMatiere VARCHAR(25) NOT NULL,
IdUtilisateur Numeric(2) NOT NULL 
);

CREATE TABLE Admin (
IdAdmin Numeric(2) NOT NULL primary key ,
nomAdmin VARCHAR(25) NOT NULL ,
prenomAdmin VARCHAR(25) NOT NULL ,
mail VARCHAR(320) NOT NULL ,
mdp VARCHAR(25) NOT NULL,
IdUtilisateur Numeric(2) NOT NULL 
);

CREATE TABLE Matiere (
IdMatiere Numeric(2) NOT NULL primary key ,
nomMatiere VARCHAR(25) NOT NULL ,
nbHeures Numeric(3) NOT NULL ,
IdProf Numeric(2) NOT NULL ,
nomProf VARCHAR(25) NOT NULL ,
ecole VARCHAR(25) NOT NULL,
promo Numeric(4) NOT NULL 
);

CREATE TABLE Competence (
IdCompetence Numeric(2) NOT NULL primary key ,
nomCompetence VARCHAR(25) NOT NULL ,
description VARCHAR(1000) ,
IdMatiere Numeric(2) NOT NULL,
nomMatiere VARCHAR(25) NOT NULL,
ecole VARCHAR(25) NOT NULL,
promo Numeric(4) NOT NULL 
);

CREATE TABLE Classe (
IdClasse Numeric(2) NOT NULL primary key ,
nomClasse VARCHAR(25) NOT NULL ,
IdEcole Numeric(2) NOT NULL ,
ecole VARCHAR(25) NOT NULL,
promo Numeric(4) NOT NULL 
);

CREATE TABLE Promo (
IdPromo Numeric(2) NOT NULL primary key,
promo Numeric(4) NOT NULL ,
IdEcole Numeric(2) NOT NULL ,
ecole VARCHAR(25) NOT NULL 
);

CREATE TABLE Ecole (
IdEcole Numeric(2) NOT NULL primary key ,
ecole VARCHAR(25) NOT NULL
);

CREATE TABLE CompetenceTransverse (
IdCompetenceTransverse Numeric(2) NOT NULL primary key ,
nom VARCHAR(25) NOT NULL ,
description VARCHAR(1000)  
);

/*Ajout de données quelconques pour tester la structure et la viabilité
de la base de données*/

INSERT INTO Utilisateur (IdUtilisateur,statut,mail,mdp) VALUES
(01,"Prof","LD@gmail.com","LD"),(02,"Eleve","AS@gmail.com","AS"),
(03,"Admin","admin1@gmail.com","admin1"),(04,"Prof","SD@gmail.com","SD"),
(05,"Eleve","PB@gmail.com","PB"),(06,"Admin","admin2@gmail.com","admin2"),
(07,"Eleve","PND@gmail.com","PND"),(08,"Eleve","BH@gmail.com","BH");

INSERT INTO Ecole (IdEcole,ecole) VALUES
(01,"ECE"),(02,"HEIP"),(03,"INSEEC");

INSERT INTO Promo (IdPromo,promo,IdEcole,ecole) VALUES
(01,2025,01,"ECE"),(02,2026,01,"ECE"),(03,2027,01,"ECE"),
(04,2025,02,"HEIP"),(05,2026,02,"HEIP"),(06,2027,02,"HEIP"),
(07,2025,03,"INSEEC"),(08,2026,03,"INSEEC"),(09,2027,03,"INSEEC");

INSERT INTO Classe (IdClasse,nomClasse,IdEcole,ecole,promo) VALUES
(01,"Groupe 1",01,"ECE",2025),(02,"Groupe 2",01,"ECE",2025),
(03,"Groupe 1",01,"ECE",2026),(04,"Groupe 2",01,"ECE",2026),
(05,"Groupe 1",01,"ECE",2027),(06,"Groupe 2",01,"ECE",2027),
(07,"Groupe 1",02,"HEIP",2025),(08,"Groupe 2",02,"HEIP",2025),
(09,"Groupe 1",02,"HEIP",2026),(10,"Groupe 2",02,"HEIP",2026),
(11,"Groupe 1",02,"HEIP",2027),(12,"Groupe 2",02,"HEIP",2027),
(13,"Groupe 1",03,"INSEEC",2025),(14,"Groupe 2",03,"INSEEC",2025),
(15,"Groupe 1",03,"INSEEC",2026),(16,"Groupe 2",03,"INSEEC",2026),
(17,"Groupe 1",03,"INSEEC",2027),(18,"Groupe 2",03,"INSEEC",2027);

INSERT INTO Eleve (IdEleve,nomEleve,prenomEleve,mail,mdp,IdUtilisateur,ecole,promo,IdClasse,nomClasse) VALUES
(01,"Subra","Antoine","AS@gmail.com","AS",02,"ECE",2025,01,"Groupe 1"),
(02,"Busetta","Paul","PB@gmail.com","PB",05,"ECE",2026,04, "Groupe 2"),
(03,"Nouaille-Degorce","Paul","PND@gmail.com","PND",07,"HEIP",2027,11, "Groupe 1"),
(04,"Huvelle","Baptiste","BH@gmail.com","BH",08,"INSEEC",2026,16, "Groupe 1");

INSERT INTO Prof (IdProf,nomProf,prenomProf,mail,mdp,nomMatiere,IdUtilisateur) VALUES
(01,"Debize","Laurent","LD@gmail.com","LD","Informatique",01),
(02,"Dedecker","Samira","SD@gmail.com","SD","Physique",04);

INSERT INTO Admin (IdAdmin,nomAdmin,prenomAdmin,mail,mdp,IdUtilisateur) VALUES
(01,"ADMIN1","admin1","admin1@gmail.com","admin1",03),
(02,"ADMIN2","admin2","admin2@gmail.com","admin2",06);

INSERT INTO Matiere (IdMatiere,nomMatiere,nbHeures,IdProf,nomProf,ecole,promo) VALUES
(01,"Informatique",120,01,"Debize","ECE",2025),
(02,"Informatique",120,01,"Debize","ECE",2026),
(03,"Informatique",10,01,"Debize","INSEEC",2025),
(04,"Physique",120,02,"Dedecker","ECE",2025),
(05,"Physique",12,02,"Dedecker","HEIP",2026),
(06,"Physique",14,02,"Dedecker","INSEEC",2025);

INSERT INTO Competence (IdCompetence,nomCompetence,description,IdMatiere,nomMatiere,ecole,promo) VALUES
(01,"Savoir parler","Etre capable de mettre des mots à la suite",01,"Informatique","HEIP",2025);