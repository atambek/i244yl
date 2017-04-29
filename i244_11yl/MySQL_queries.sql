--tabeli loomine
CREATE TABLE atambek_loomaaed (ID INTEGER PRIMARY KEY NOT NULL auto_increment, nimi VARCHAR(50) NOT NULL, vanus INTEGER, liik VARCHAR(30), puur INTEGER);

--tabeli täitmine
INSERT INTO atambek_loomaaed (nimi, vanus, liik, puur)
	VALUES('Mats', 12, 'pruunkaru', 1),
	('Valge-Mats', 8, 'jääkaru', 2),
	('Lumi', 7, 'hunt', 4),
	('Buratiino', 4, 'nokkloom', 3),
	('Tormi', 3, 'hunt', 4),
	('Helmi', 5, 'punahirv', 5),
	('Helmo', 6, 'punahirv', 5),
	('Juta', 2, 'jänes', 6),
	('Butch', 9, 'piison', 7),
	('Hermiine', 3, 'jänes', 6);

--kindlas puuris olevate loomade nimed ja puuri numbrid
SELECT nimi, puur FROM atambek_loomaaed WHERE puur=4;

--vanima ja noorima looma vanused
SELECT min(vanus), max(vanus) FROM atambek_loomaaed;

--puuri number koos selles elavate loomade arvuga
SELECT puur, count(id) FROM atambek_loomaaed group by puur;

--vanuse suurendamine 1 võrra
UPDATE atambek_loomaaed SET vanus=vanus+1;


