CREATE TABLE druhy (
	id int PRIMARY KEY AUTO_INCREMENT,
    nazev varchar(255)
);

INSERT into druhy(nazev) VALUES
("Savci"),
("Ptáci"),
("Plazi"),
("Ryby");


CREATE TABLE jidlo (
	id int PRIMARY KEY AUTO_INCREMENT,
    nazev varchar(255) NOT NULL,
    druh int NOT NULL,
    FOREIGN KEY (druh) REFERENCES druhy(id)
);

INSERT into jidlo(nazev, druh) VALUES
("Maso", 1),
("Ryby", 1),
("Ovoce", 2),
("Hmyz", 3);