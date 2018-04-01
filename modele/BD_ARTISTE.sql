DROP DATABASE IF EXISTS site_artiste;
CREATE DATABASE site_artiste;
USE site_artiste;

CREATE TABLE OEUVRE (
  id int(11) primary key AUTO_INCREMENT,
  titre varchar(20) NOT NULL,
  annee varchar(20) NOT NULL,
  technique varchar(20) NOT NULL,
  support varchar(20) NOT NULL,
  largeur int(3) NOT NULL,
  hauteur int(3) NOT NULL,
  prix int(6) NOT NULL,
  petiteImage varchar(20) NOT NULL,
  grandeImage varchar(20) NOT NULL
) ENGINE=InnoDB;

Insert into OEUVRE values (NULL, 'titre1','2016', 'huile', 'toile', 40, 50, 500, 'titre1_petit.jpeg', 'titre1_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre2','2016', 'acrylique', 'toile', 30, 60, 500, 'titre2_petit.jpeg', 'titre2_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre3','2016', 'pastel à l\'huile', 'papier', 100, 120, 1000, 'titre3_petit.jpeg', 'titre3_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre4','2017', 'huile', 'bois', 40, 50, 800, 'titre4_petit.jpeg', 'titre4_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre5','2017', 'huile', 'toile', 20, 15, 200, 'titre5_petit.jpeg', 'titre5_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre6','2017', 'pastel à l\'huile', 'papier', 40, 50, 400, 'titre6_petit.jpeg', 'titre6_grand.jpeg');
Insert into OEUVRE values (NULL, 'titre7','2018', 'acrylique', 'toile', 40, 50, 600, 'titre7_petit.jpeg', 'titre7_grand.jpeg');

CREATE TABLE EXPOSITION (
  id int(5) primary key AUTO_INCREMENT,
  nom varchar(20) NOT NULL,
  lieu varchar(20) NOT NULL,
  adresse varchar(50) NOT NULL,
  dateDebut date NOT NULL,
  dateFin date NOT NULL,
  dateVernissage datetime NOT NULL
) ENGINE=InnoDB;

Insert into EXPOSITION values (NULL, 'expo1','centre 1', 'rue machin', '2016-06-10', '2016-06-24', '2016-06-10-18:00:00');
Insert into EXPOSITION values (NULL, 'expo2','centre 2', 'rue chose', '2017-09-03', '2016-09-24', '2016-09-05-19:00:00');
Insert into EXPOSITION values (NULL, 'expo3','centre 3', 'rue truc', '2018-02-25', '2018-03-10', '2016-02-10-18:00:00');

CREATE TABLE OEUVRE_EXPOSEE (
  id_exposition int(5),
  id_oeuvre int(11),
  prix int(6) NOT NULL,
  primary key(id_oeuvre, id_exposition),
  foreign key (id_oeuvre) references oeuvre(id),
  foreign key (id_exposition) references exposition(id)
) ENGINE=InnoDB;

Insert into OEUVRE_EXPOSEE values (1, 1, 500);
Insert into OEUVRE_EXPOSEE values (1, 2, 500);
Insert into OEUVRE_EXPOSEE values (1, 3, 1000);
Insert into OEUVRE_EXPOSEE values (2, 2, 550);
Insert into OEUVRE_EXPOSEE values (2, 3, 1100);
Insert into OEUVRE_EXPOSEE values (2, 4, 880);
Insert into OEUVRE_EXPOSEE values (2, 5, 220);
Insert into OEUVRE_EXPOSEE values (2, 6, 440);
Insert into OEUVRE_EXPOSEE values (3, 2, 450);
Insert into OEUVRE_EXPOSEE values (3, 4, 800);
Insert into OEUVRE_EXPOSEE values (3, 6, 400);
Insert into OEUVRE_EXPOSEE values (3, 7, 600);


ALTER TABLE `OEUVRE_EXPOSEE` DROP FOREIGN KEY `oeuvre_exposee_ibfk_1`; ALTER TABLE `OEUVRE_EXPOSEE` ADD CONSTRAINT `oeuvre_exposee_ibfk_1` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `OEUVRE_EXPOSEE` DROP FOREIGN KEY `oeuvre_exposee_ibfk_2`; ALTER TABLE `OEUVRE_EXPOSEE` ADD CONSTRAINT `oeuvre_exposee_ibfk_2` FOREIGN KEY (`id_exposition`) REFERENCES `exposition`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;




