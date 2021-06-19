CREATE TABLE rendezvous (
	no_confirmation TEXT NOT NULL PRIMARY KEY,
	date DATE NOT NULL,
	heure TIME NOT NULL,
	nom TEXT NOT NULL,
	prenom TEXT NOT NULL,
	no_tel TEXT NOT NULL,
	courriel TEXT NOT NULL
);

INSERT INTO rendezvous (no_confirmation, date, heure, nom, prenom, no_tel, courriel)
				VALUES ('385EF9', '2021-06-23', '08:30', 'Alarie', 'Roger', '819-555-1234', 'ralarie@example.org'),
					   ('93C2FF', '2021-06-23', '15:00', 'Grenier', 'Janine', '819-555-5678', 'jgrenier@example.org'),
					   ('A1B2C3', '2021-06-25', '13:30', 'Cliche', 'Claire', '819-555-9101', 'ccliche@example.org');
