#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS imiesphere_dev;
CREATE DATABASE imiesphere_dev;
USE imiesphere_dev;


#------------------------------------------------------------
# Table: grade
#------------------------------------------------------------

CREATE TABLE grade(
        id_grade   int (11) Auto_increment  NOT NULL ,
        grade_name Varchar (25) NOT NULL ,
        promotion  Varchar (25) NOT NULL ,
        PRIMARY KEY (id_grade )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for grade
#------------------------------------------------------------

INSERT INTO grade VALUES(1,'GEN','2016'),(2,'ITStart','2016-2017'),(3,'DL','2016-2017'),(4,'ITStart','2015-2016');
INSERT INTO grade VALUES(5,'CPCSI','2016-2017'),(6,'CDPNL3','2016-2017'),(7,'CDPNM1','2016-2017'),(8,'RISRL3','2015-2016'),(9,'CPCSI','2014-2015'),(10,'CDPNL3','2015-2016');


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role   int (11) Auto_increment  NOT NULL ,
        role_name Varchar (25) NOT NULL ,
        PRIMARY KEY (id_role )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for role
#------------------------------------------------------------

INSERT INTO role VALUES
(1,'administrateur'),
(2,'adherent'),
(3,'non-adherent')
;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user           int (11) Auto_increment  NOT NULL ,
        membership_number Varchar (25) ,
        firstname         Varchar (30) NOT NULL ,
        lastname          Varchar (30) NOT NULL ,
        email             Varchar (60) NOT NULL ,
        phone             Varchar (10) ,
        password          Varchar (25) NOT NULL ,
        id_grade          Int ,
        id_role           Int ,
        PRIMARY KEY (id_user ) ,
        UNIQUE (membership_number )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for user
#------------------------------------------------------------

INSERT INTO user VALUES 
(1,NULL,'dereck','daniel','daniel.dereck@gmail.com','0658631306','bonjoir',1,3),
(2,NULL,'delphine','bourdelle','delphine.bourdelle@hotmail.fr','0625586726','bonjoir',1,3),
(3,NULL,'emeline','hourmand','shiro-x3@hotmail.fr','0619601483','bonjoir',1,3),
(4,NULL,'maxime','theard','maxime.theard@gmail.com','0643975419','salut',1,3),
(5,NULL,'maxime','gabriel','gabriel.maxime@gmail.com','0620145842','coucou',1,3),
(6,NULL,'jerome','alincourt','jerome.alincourt@gmail.com','0659569508','blouge',1,3),
(7,NULL,'jerome','pavic','jeromepavic@gmail.com','0634908636','bonjoir',1,2),
(8,NULL,'boris','drouin','boris.drouin@gmail.com','0663445401','salut',1,2),
(9,NULL,'antoine','liegard','@gmail.com','0299360990','Ar042Px _xXx_ b',1,3),
(10,NULL,'fabian','inial','fabian.inial@gmail.com','0684660729','heisenberg',1,3),
(11,NULL,'kevin','henkes','kevhenkes@gmail.com','0762762256','password',1,2),
(12,NULL,'antoine','cronier','antoinecronier@github.com','0606060606','pwDfmlmp65DG',NULL,1)
;


#------------------------------------------------------------
# Table: city
#------------------------------------------------------------

CREATE TABLE city(
        id_city     int (11) Auto_increment  NOT NULL ,
        city_name   Varchar (30) NOT NULL ,
        postal_code Mediumint ,
        PRIMARY KEY (id_city )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for city
#------------------------------------------------------------

INSERT INTO city VALUES
(1,'rennes','35000'),
(2,'bruz','35170'),
(3,'lorient','56100'),
(4,'pace','35740'),
(5,'nantes','44000'),
(6,'vannes','56000'),
(7,'st gregoire','35760'),
(8,'montauban-de-bretagne','35360'),
(9,'la meziere','35520'),
(10,'acigne','35690')
;


#------------------------------------------------------------
# Table: address
#------------------------------------------------------------

CREATE TABLE address(
        id_address    int (11) Auto_increment  NOT NULL ,
        street        Varchar (50) ,
        street_number Varchar (8) ,
        building      Varchar (35) ,
        address_name  Varchar (25) ,
        id_city       Int NOT NULL ,
        PRIMARY KEY (id_address )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for address
#------------------------------------------------------------

INSERT INTO address VALUES
(1,'rue st helier','14',NULL,'le shamrock',1),
(2,'la haie gautrais',NULL,NULL,'kart-expo',2),
(3,'zone de millet',NULL,NULL,'bowling',9),
(4,'zone de millet',NULL,NULL,'mega cgr',9),
(5,'rue d\'antrain','34',NULL,'bar A vos mousses',1),
(6,'rue de lorient','222','parking','V and B',1)
;


#------------------------------------------------------------
# Table: event
#------------------------------------------------------------

CREATE TABLE event(
        id_event          int (11) Auto_increment  NOT NULL ,
        event_name        Varchar (30) NOT NULL ,
        event_description Text ,
        event_start       Datetime NOT NULL ,
        event_end         Datetime ,
        id_address        Int NOT NULL ,
        PRIMARY KEY (id_event )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Insert for event
#------------------------------------------------------------

INSERT INTO event VALUES
(1,'soiree cine','ca va etre trop cool','2016-10-01 20:30:00','2016-10-01 22:30:00',4),
(2,'bowling','aller faisons du bowling','2016-12-01 21:30:00','2016-12-01 23:30:00',3),
(3,'au bar','ca va etre trop cool','2016-09-25 17:30:00','2016-09-25 23:45:00',1),
(4,'bowling','ouaaaaaaaaaaaaaaaaaiiiiiiii','2016-11-01 21:30:00','2016-11-01 23:30:00',3),
(5,'soiree cine','super film','2016-11-10 20:30:00','2016-11-10 22:30:00',4),
(6,'au bistrot','on va etre saoul','2016-1-05 19:30:00','2016-11-05 23:30:00',1),
(7,'au bistrot','on va etre encore saoul','2016-1-06 19:30:00','2016-11-06 23:30:00',5),
(8,'au bistrot','encore...','2016-1-07 19:30:00','2016-11-07 23:30:00',5),
(9,'au bistrot','et ouai...','2016-1-08 19:30:00','2016-11-08 23:30:00',6),
(10,'au bistrot','courage...','2016-1-09 19:30:00','2016-11-09 23:30:00',5)
;


#------------------------------------------------------------
# Table: type_event
#------------------------------------------------------------

CREATE TABLE type_event(
        id_type_event          int (11) Auto_increment  NOT NULL ,
        type_event_name        Varchar (25) NOT NULL ,
        type_event_description Text ,
        PRIMARY KEY (id_type_event )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for type_event
#------------------------------------------------------------

INSERT INTO type_event VALUES
(1,'bar','aller boire un coup'),
(2,'karting','aller faire du karting'),
(3,'cine','aller au cinema'),
(4,'bowling','aller faire du bowling')
;


#------------------------------------------------------------
# Table: payment
#------------------------------------------------------------

CREATE TABLE payment(
        id_payment int (11) Auto_increment  NOT NULL ,
        price      Decimal (6,2) ,
        PRIMARY KEY (id_payment )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for payment
#------------------------------------------------------------

INSERT INTO payment VALUES
(1,0.00),
(2,15.00),
(3,20.00),
(4,30.00)
;


#------------------------------------------------------------
# Table: registration
#------------------------------------------------------------

CREATE TABLE registration(
        id_registration    int (11) Auto_increment  NOT NULL ,
        max_place          Int ,
        registration_start Datetime NOT NULL ,
        registration_end   Datetime ,
        pre_registration   Bool NOT NULL ,
        id_event           Int NOT NULL ,
        PRIMARY KEY (id_registration )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for registration
#------------------------------------------------------------

INSERT INTO registration VALUES
(1,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',true,1),
(2,10,'2016-08-31 10:30:00','2016-09-05 10:30:00',false,2),
(3,50,'2016-08-31 10:30:00','2016-09-05 10:30:00',true,3),
(4,350,'2016-08-31 10:30:00','2016-09-05 10:30:00',true,4),
(5,150,'2016-08-31 10:30:00','2016-09-05 10:30:00',true,5),
(6,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',true,6),
(7,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',false,7),
(8,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',false,8),
(9,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',false,9),
(10,100,'2016-08-31 10:30:00','2016-09-05 10:30:00',false,10)
;


#------------------------------------------------------------
# Table: event_type_event
#------------------------------------------------------------

CREATE TABLE event_type_event(
        id_event      Int NOT NULL ,
        id_type_event Int NOT NULL ,
        PRIMARY KEY (id_event ,id_type_event )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for event_type_event
#------------------------------------------------------------

INSERT INTO event_type_event VALUES
(1,1),
(2,2),
(3,1),
(4,4),
(5,4),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1)
;


#------------------------------------------------------------
# Table: cost
#------------------------------------------------------------

CREATE TABLE cost(
        id_registration Int NOT NULL ,
        id_payment      Int NOT NULL ,
        id_role         Int NOT NULL ,
        PRIMARY KEY (id_registration ,id_payment ,id_role )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for cost
#------------------------------------------------------------

INSERT INTO cost VALUES
(1,1,2),
(2,2,2),
(3,1,2),
(4,2,2),
(4,3,3),
(6,1,3),
(7,1,3)
;


#------------------------------------------------------------
# Table: user_registration
#------------------------------------------------------------

CREATE TABLE user_registration(
        id_user                Int NOT NULL ,
        id_registration        Int NOT NULL ,
        unsubscribe            Bool,
        date_time_registration Datetime,
        PRIMARY KEY (id_user ,id_registration )
)ENGINE=InnoDB;

#------------------------------------------------------------
#Insert for user_registration
#------------------------------------------------------------

INSERT INTO user_registration VALUES
(1,1,false,'2016-09-01 10:30:00'),
(2,2,false,'2016-09-01 10:32:00'),
(3,1,false,'2016-09-01 11:30:00'),
(4,2,false,'2016-09-01 12:30:00'),
(4,3,false,'2016-09-01 10:33:00'),
(10,1,false,'2016-09-02 10:30:00'),
(7,1,true,'2016-09-02 10:40:00'),
(1,7,false,'2016-09-01 10:35:00');



ALTER TABLE user ADD CONSTRAINT FK_user_id_grade FOREIGN KEY (id_grade) REFERENCES grade(id_grade);
ALTER TABLE user ADD CONSTRAINT FK_user_id_role FOREIGN KEY (id_role) REFERENCES role(id_role);
ALTER TABLE address ADD CONSTRAINT FK_address_id_city FOREIGN KEY (id_city) REFERENCES city(id_city);
ALTER TABLE event ADD CONSTRAINT FK_event_id_address FOREIGN KEY (id_address) REFERENCES address(id_address);
ALTER TABLE registration ADD CONSTRAINT FK_registration_id_event FOREIGN KEY (id_event) REFERENCES event(id_event);
ALTER TABLE event_type_event ADD CONSTRAINT FK_event_type_event_id_event FOREIGN KEY (id_event) REFERENCES event(id_event);
ALTER TABLE event_type_event ADD CONSTRAINT FK_event_type_event_id_type_event FOREIGN KEY (id_type_event) REFERENCES type_event(id_type_event);
ALTER TABLE cost ADD CONSTRAINT FK_cost_id_registration FOREIGN KEY (id_registration) REFERENCES registration(id_registration);
ALTER TABLE cost ADD CONSTRAINT FK_cost_id_payment FOREIGN KEY (id_payment) REFERENCES payment(id_payment);
ALTER TABLE cost ADD CONSTRAINT FK_cost_id_role FOREIGN KEY (id_role) REFERENCES role(id_role);
ALTER TABLE user_registration ADD CONSTRAINT FK_user_registration_id_user FOREIGN KEY (id_user) REFERENCES user(id_user);
ALTER TABLE user_registration ADD CONSTRAINT FK_user_registration_id_registration FOREIGN KEY (id_registration) REFERENCES registration(id_registration);























# Requètes SQL :

-- Sélectionner tous les événements entre une date et une 2e date.

SELECT event.event_name, event.event_start, event.event_end FROM event
WHERE event.event_start BETWEEN '01-01-16 00:00:00' AND '31-12-16 23:59:59';

SELECT event.event_name, event.event_description, event.event_start, address.street_number, address.street, address.address_name, city.city_name 
FROM event
INNER JOIN address ON event.id_address = address.id_address
INNER JOIN city ON address.id_city = city.id_city
WHERE DATE(event.event_sart) > '31-12-16 23:59:59'
ORDER BY event.event_start

-- Sélectionner tous les événements d’un type.

SELECT event.event_name, event.event_start FROM event
INNER JOIN event_type_event ON event.id_event=event_type_event.id_event
INNER JOIN type_event ON event_type_event.id_type_event=type_event.id_type_event
WHERE type_event.type_event_name LIKE '%bar%';

-- Sélectionner tous les événements dans une ville.
-- Sélectionner un utilisateur.
-- Sélectionner tous les utilisateurs d’un grade.
-- Sélectionner tous les utilisateurs d’un rôle.
-- Sélectionner tous les utilisateurs ayant une réservation pour un événement.
-- Sélectionner tous les utilisateurs d’un rôle ayant une réservation pour un événement.
-- Sélectionner tous les utilisateurs d’un rôle ayant participé à un événement.

-- Sélectionner toutes les réservations d’un utilisateur.
-- Sélectionner tous les événements auxquels un utilisateur a participé.
-- Sélectionner le CA pour un événement.


SELECT registration.id_registration, registration.max_place, registration.registration_start, registration.registration_end, registration.pre_registration, payment.price  FROM registration
        INNER JOIN cost ON registration.id_registration = cost.id_registration
        INNER JOIN payment ON cost.id_payment = payment.id_payment
        WHERE registration.id_registration = 2 AND cost.id_role = 2;


-- Ajouter un nouvel événement.
-- Mettre à jour un événement.
-- Ajouter un nouvel utilisateur.
-- Mettre à jour un utilisateur.
-- Ajouter  une adresse.
-- Mettre à jour une adresse.
-- Ajouter une ville.
-- Mettre à jour une ville.
-- Ajouter une réservation
-- Mettre à jour une réservation.
-- Ajouter un prix
-- Associer un prix à un événement.




