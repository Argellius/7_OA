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

CREATE TABLE zvirata (
	id int PRIMARY KEY AUTO_INCREMENT,
    jmeno varchar(255) NOT NULL,
    druh_id int NOT NULL,
    datum_prichodu date NOT NULL,
    FOREIGN KEY (druh_id) REFERENCES druhy(id)
);

INSERT INTO zvirata (jmeno, druh_id, datum_prichodu) VALUES
("Lev", 1, "2025-02-02"),
("Slon", 1, "2024-05-12"),
("Papoušek", 2, "2024-03-12"),
("Krajta", 3, "2024-06-20"),
("Sumec", 4, "2024-07-20");

CREATE TABLE krmeni (
    id int PRIMARY KEY AUTO_INCREMENT,
    id_zvirete int NOT NULL,
    id_jidla int NOT NULL,
    mnozstvi int default 1,
   datum_krmeni datetime NOT NULL
);

INSERT INTO krmeni (id_zvirete, id_jidla, mnozstvi, datum_krmeni) VALUES
(1,1,10,'2023-05-04 10:00:00'),
(2,2,20,'2023-05-02 10:00:00'),
(3,3,20,'2023-05-11 10:00:00'),
(4,4,10,'2023-05-12 10:00:00');

ALTER TABLE krmeni ADD CONSTRAINT FOREIGN KEY (id_zvirete) REFERENCES zvirata(id);
ALTER TABLE krmeni ADD CONSTRAINT FOREIGN KEY (id_jidla) REFERENCES jidlo(id);