DROP DATABASE IF EXISTS databasetest;
CREATE DATABASE IF NOT EXISTS databasetest;

USE immobilier;

DROP TABLE IF EXISTS Utilisateur ;
DROP TABLE IF EXISTS Annonce ;
DROP TABLE IF EXISTS Critere;

DROP TABLE IF EXISTS Annonce_Critere;

CREATE TABLE Utilisateur IF NOT EXISTS(
  id_utilisateur int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom varchar,
  prenom varchar,
  email varchar,
  mot_de_passe varchar,
  telephone int,
  date_creation_compte datetime,
  date_derniere_connexion datetime
);

INSERT INTO TABLE Utilisateur (nom,prenom,email,mot_de_passe,date_creation_compte,date_derniere_connexion)
VALUES 
('DuRire','Pierre','Pierre.DuRire@gmail.com','1234','2024-09-23T14:15:30','2024-09-25T10:26:00'),
('LeClown','Paul','Paul.LeClown@gmail.com','0000','2024-09-23T14:45:40','2024-09-25T14:21:20');

CREATE TABLE Annonce IF NOT EXISTS(
  id_annonce int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  titre varchar,
  image varchar,
  categorie varchar,
  taille int,
  adresse varchar,
  description varchar,
  prix int,
  confort varchar,
  date_creation_annonce datetime,
  date_derniere_mise_a_jour_annonce datetime,
  id_cree_par_utilisateur int,
  FOREIGN KEY (id_cree_par_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Critere IF NOT EXISTS(
  id_criteres int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  vente boolean,
  etat enum('ancien','neuf'),
  habitation enum('maison','appartement','terrain','loft','chateau','batiment','immeuble','boutique','divers'),
  ville varchar,
  prix int,
  surface int,
  surface_terrain int,
  piece int, #stocker le nombre de piece avec un nombre puis de mettre un critère de limite
  chambre int,
  meuble boolean,
  jardin boolean,
  
  caracteristique enum('piscine','terrasse','balcon','parking','box','garage','cave','sous_sol'),

  sans_vis_a_vis boolean,
  belle_vue boolean,

  orientation enum('orientation_nord','orientation_sud','orientation_ouest','orientation_est'),
  etage int,

  ascenseur boolean,
  acces_handicape boolean,

  mot_cles varchar,

  #limite maximum D et prend le reste C,B,A
  #faire un double slide petit et grand
  Energetique enum('a','b','c','d','e','f','g'),

  date_creation_criteres datetime,
  date_derniere_mise_a_jour_criteres datetime,
  id_cree_par_utilisateur int,
  FOREIGN KEY (id_cree_par_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Annonce_Critere IF NOT EXISTS(
  id_annonce_critere int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_annonce int,
  id_criteres int,
  FOREIGN KEY (id_annonce) REFERENCES Annonce(id_annonce),
  FOREIGN KEY (id_criteres) REFERENCES Criteres(id_criteres)
);
