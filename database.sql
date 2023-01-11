CREATE DATABASE excellenttaste;

USE excellenttaste;

CREATE table gerechtcategorien (
    ID int(11) NOT NULL AUTO_INCREMENT, 
    Code VARCHAR(3),
    Naam VARCHAR(20),
    UNIQUE (ID, Code),
    PRIMARY KEY(ID)
);

CREATE table klanten (
    ID int(11) NOT NULL AUTO_INCREMENT, 
    Naam VARCHAR(20) NOT NULL,
    Telefoon VARCHAR(11) NOT NULL,
    Email VARCHAR(128) NOT NULL,
    UNIQUE (ID),
    PRIMARY KEY(ID)
);

CREATE table gerechtsoorten (
    ID int(11) NOT NULL AUTO_INCREMENT, 
    Code VARCHAR(3),
    Naam VARCHAR(20),
    Gerechtcategorie_ID int(11) NOT NULL,
    UNIQUE (ID),
    PRIMARY KEY(ID),
    FOREIGN KEY (Gerechtcategorie_ID) REFERENCES gerechtcategorien(ID)
);

CREATE INDEX idx_gerechtcategorien
ON gerechtsoorten (Gerechtcategorie_ID);

CREATE table menuitems (
    ID int(11) NOT NULL AUTO_INCREMENT, 
    Code VARCHAR(4),
    Naam VARCHAR(30),
    Gerechtsoort_ID int(11) NOT NULL,
    UNIQUE (ID, Code),
    PRIMARY KEY(ID),
    FOREIGN KEY (Gerechtsoort_ID) REFERENCES gerechtsoorten(ID)
);

CREATE INDEX idx_gerechtsoort_ID
ON menuitems (Gerechtsoort_ID);

CREATE table reserveringen (
    ID int(11) NOT NULL AUTO_INCREMENT, 
  	Tafel int(11) NOT NULL,
    Datum date NOT NULL,
    Tijd time NOT NULL,
    Klant_ID int(11) NOT NULL,
    Aantal int(11) NOT NULL,
    Status tinyint(4) NOT NULL DEFAULT 1,
    Datum_toegevoegd timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Aantal_k int(11) NOT NULL DEFAULT 0,
    Allergien text,
    Opmerkingen text,
    UNIQUE (ID, Datum, Tijd),
    PRIMARY KEY(ID),
    FOREIGN KEY (Klant_ID) REFERENCES klanten(ID)
);

CREATE UNIQUE INDEX idx_klant_ID
ON reserveringen (Klant_ID);

CREATE table bestellingen (
    ID int(11) NOT NULL AUTO_INCREMENT, 
  	Reservering_ID int(11) NOT NULL,
    Menuitem_ID int(11) NOT NULL,
    Aantal int(11),
    Geserveerd tinyint(4) DEFAULT 0,
    UNIQUE (ID),
    PRIMARY KEY(ID),
    FOREIGN KEY (Reservering_ID) REFERENCES reserveringen(ID),
    FOREIGN KEY (Menuitem_ID) REFERENCES menuitems(ID)
);

CREATE UNIQUE INDEX idx_reservering_ID
ON bestellingen (Reservering_ID);

CREATE UNIQUE INDEX idx_menuitem_ID
ON bestellingen (Menuitem_ID);

INSERT INTO `klanten` (`ID`, `Naam`, `Telefoon`, `Email`) 
VALUES (NULL, 'Jeroen Krabber', '0632659825', 'Jeroenkrabber@gmail.com'),
(NULL, 'Piet Hein', '0537726986', 'Piethein@gmail.com');

INSERT INTO `reserveringen` (`ID`, `Tafel`, `Datum`, `Tijd`, `Klant_ID`, `Aantal`, `Status`, `Datum_toegevoegd`, `Aantal_k`, `Allergien`, `Opmerkingen`) 
VALUES (NULL, '4', '2022-06-30', '10:11:30', '2', '4', '1', current_timestamp(), '8', NULL, 'Bij het raam'),
(NULL, '2', '2022-06-24', '09:15:00', '2', '3', '1', current_timestamp(), '3', 'Seafood', NULL);

INSERT INTO `gerechtcategorien` (`ID`, `Code`, `Naam`) 
VALUES (NULL, '1', 'Dranken'),
(NULL, '2', 'Hapjes'),
(NULL, '3', 'Voorgerechten'),
(NULL, '4', 'Hoofdgerechten'),
(NULL, '5', 'Nagerechten')
;

INSERT INTO `gerechtsoorten` (`ID`, `Code`, `Naam`, `Gerechtcategorie_ID`) 
VALUES (NULL, 'B', 'Bieren', '1'),
(NULL, 'F', 'Frisdranken', '1'),
(NULL, 'WD', 'Warme dranken', '1'),
(NULL, 'W', 'Wijnen', '1'),
(NULL, 'KH', 'Koude hapjes', '2'),
(NULL, 'WH', 'Warme hapjes', '2'),
(NULL, 'Veg', 'Vegetarisch', '4'),
(NULL, 'Vis', 'Vis', '4'),
(NULL, 'Vls', 'Vlees', '4'),
(NULL, 'Ijs', 'Ijs', '5'),
(NULL, 'Mou', 'Mousse', '5'),
(NULL, 'KV', 'Koud', '3'),
(NULL, 'WV', 'Warm', '3')
;

ALTER TABLE menuitems
ADD Prijs DECIMAL(10,2);

INSERT INTO `menuitems` (`ID`, `Code`, `Naam`, `Gerechtsoort_ID`, `Prijs`) 
VALUES (NULL, 'Pils', 'Pilsner', '2', '2.50'),
(NULL, 'Chau', 'Chaudfontaine rood', '17', '2.49'),
(NULL, 'Koff', 'Koffie', '18', '2.00'),
(NULL, 'Glas', 'Per glas', '19', '2.50'),
(NULL, 'KaMo', 'Portie kaas met mosterd', '20', '5.50'),
(NULL, 'BiMo', 'Portie bitterballetjes met mosterd', '21', '4.50'),
(NULL, 'GeBa', 'Gebakken banaan', '22', '7.50'),
(NULL, 'GeMa', 'Gebakken makreel', '23', '9.00'),
(NULL, 'Wien', 'Wienerschnitzel', '24', '8.50'),
(NULL, 'Vruc', 'Vruchtenijs', '25', '3.50'),
(NULL, 'Choc', 'Chocolademousse', '26', '3.50'),
(NULL, 'Sala', 'Salade met geitenkaas', '27', '11.50'),
(NULL, 'Toma', 'Tomatensoep', '28', '10.75')
;

CREATE TABLE users ( 
    id INT(11) NOT NULL AUTO_INCREMENT,
    Voornaam VARCHAR(255) NOT NULL,
    Voorvoegsel VARCHAR(255),
    Achternaam VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    UNIQUE (medewerkersid),
    PRIMARY KEY (medewerkersid)
);

ALTER TABLE users
ADD password char(32);




