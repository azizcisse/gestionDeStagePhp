drop database if not exists gestionstage,
create database if not exists gestionstage,

use gestionstage;

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    prenom varchar(50),
    nom varchar(50),
    civilite varchar(50),
    photo varchar(100), 
    idFiliere int(4)
);

create table filiere(
    idFiliere int(4) auto_increment primary key,
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table utilisateur(
    idUser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),
    etat int(1), 
    pwd varchar(255)
);

Alter table stagiaire add constraint foreign key(idFiliere) references filiere(idFiliere);

INSERT INTO filiere(nomFiliere,niveau) VALUES
	('DEVELOPPEUR WEB','TECHNICIEN SPECIALISE'),
	('IT SECURITE','MASTER'),
	('TECHNICIEN RESEAUX','BREVET DE TECHNICIEN SUPERIEUR'),
	('COMPTABILITE','LICENCE'),
	('RESSOURCES HUMAINES','DOCTORAT'),

    ('DEVELOPPEUR MOBILE','TECHNICIEN SPECIALISE'),
	('SECURITE SYSTEME','MASTER'),
	('TRADUCTEUR LINGUISTIQUE','BREVET DE TECHNICIEN SUPERIEUR'),
	('BANQUE FINANCE','LICENCE'),
	('FORMATEUR','DOCTORAT'),

    ('ARCHITECTURE RESEAUX','TECHNICIEN SPECIALISE'),
	('CHARGE DE PROJET','MASTER'),
	('CONEPTEUR WEB','BREVET DE TECHNICIEN SUPERIEUR'),
	('INFIRMIER','LICENCE'),
	('CHARGE DE COMMUNICATION','DOCTORAT')
    ;	
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	

INSERT INTO stagiaire(prenom,nom,civilite,photo,idFiliere) VALUES
    ('Fatou','DIOUF','F','Chrysantheme.jpg',1),
	('Abdou','SARR','M','Desert.jpg',2),
	('Coumba','FALL','F','Hortensias.jpg',3),
	('Khadija','SENE','F','Meduses.jpg',1),
	('Omar','SY','M','Penguins.jpg',2),
	('Cheikh','SECK','M','Tulipes.jpg',3),
    
     ('Djim','LO','M','Chrysantheme.jpg',1),
	('ADJA','GUEYE','F','Desert.jpg',2),
	('Astou','MBAYE','F','Hortensias.jpg',3),
	('Anta','NDACK','F','Meduses.jpg',1),
	('Khady','NDOM','F','Penguins.jpg',2),
	('Omar','FALL','M','Tulipes.jpg',3),

    ('Didier','TINE','M','Chrysantheme.jpg',1),
	('Sokhna','Ciss','F','Desert.jpg',2),
	('Alima','GUISSE','F','Hortensias.jpg',3),
	('Aziz','CISSE','M','Meduses.jpg',1),
	('Bineta','KAMARA','F','Penguins.jpg',2),
	('Djibi','DIOUF','M','Tulipes.jpg',3);
  

select * from filiere;
select * from stagiaire;
select * from utilisateur;



