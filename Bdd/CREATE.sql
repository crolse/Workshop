create database workshop

create table ROLE (
	idRole int NOT NULL,
	libelleRole varchar(50) NOT NULL,
	CONSTRAINT pk_ROLE PRIMARY KEY (idRole)
);

create table PERSONNES (
	idPersonnes int NOT NULL,
	nomPersonnes varchar(50) NOT NULL,
	prenomPersonnes varchar(50) NOT NULL,
	emailPersonnes varchar(50) NOT NULL,
	mdpPersonnes varchar(50) NOT NULL,
	idRole int NOT NULL,
	CONSTRAINT pk_PERSONNES PRIMARY KEY (idPersonnes),
	CONSTRAINT fk_PERSONNES_ROLE FOREIGN KEY (idRole) REFERENCES ROLE(idRole)
	);

create table TOPIC (
	idTopic int NOT NULL,
	titreTopic varchar(100) NOT NULL,
	corpsTopic varchar(255) NOT NULL,
	dateCreationTopic datetime NOT NULL,
	compteurJaimeTopic int NOT NULL,
	idPersonnes int NOT NULL,
	CONSTRAINT pk_TOPIC PRIMARY KEY (idTopic),
	CONSTRAINT fk_TOPIC_PERSONNES FOREIGN KEY (idPersonnes) REFERENCES PERSONNES(idPersonnes)
	);

create table ECRIRE (
	idPersonnes int NOT NULL,
	idTopic int NOT NULL,
	jaime bit,
	CONSTRAINT pk_ECRIRE PRIMARY KEY (idPersonnes, idTopic),
	CONSTRAINT fk_ECRIRE_PERSONNES FOREIGN KEY (idPersonnes) REFERENCES PERSONNES(idPersonnes),
	CONSTRAINT fk_ECRIRE_TOPIC FOREIGN KEY (idTopic) REFERENCES TOPIC(idTopic)
	);

create table COMMENTAIRES (
	idCommentaires int NOT NULL,
	corpsCommentaires varchar(255) NOT NULL,
	dateCommentaires dateTime NOT NULL,
	idTopic int NOT NULL,
	idPersonnes int NOT NULL,
	CONSTRAINT pk_COMMENTAIRES PRIMARY KEY (idCommentaires),
	CONSTRAINT fk_COMMENTAIRES_TOPIC FOREIGN KEY (idTopic) REFERENCES TOPIC(idTopic),
	CONSTRAINT fk_COMMENTAIRES_PERSONNES FOREIGN KEY (idPersonnes) REFERENCES PERSONNES(idPersonnes)
);