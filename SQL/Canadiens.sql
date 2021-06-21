-- Base de données Canadiens

CREATE TABLE adversaires (
	code CHAR(3) PRIMARY KEY,
	nom TEXT NOT NULL
);

CREATE TABLE parties (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	date DATE NOT NULL,
	adversaire CHAR(3),
	pointage_canadiens INT DEFAULT 0,
	pointage_adversaire INT DEFAULT 0,
	
	CONSTRAINT fk_adversaire FOREIGN KEY (adversaire) REFERENCES adversaires(code)
);

INSERT INTO adversaires (code, nom)
				 VALUES ('TOR', 'Maple Leafs de Toronto'),
				 		('WPG', 'Jets de Winnipeg'),
				 		('VGK', 'Golden Knights de Vegas');
				 	
INSERT INTO parties (date, adversaire, pointage_canadiens, pointage_adversaire)
			 VALUES ('2021-05-20', 'TOR', 2, 1),
			 		('2021-05-22', 'TOR', 1, 5),
			 		('2021-05-24', 'TOR', 1, 2),
			 		('2021-05-25', 'TOR', 0, 4),
			 		('2021-05-27', 'TOR', 4, 3),
			 		('2021-05-29', 'TOR', 3, 2),
			 		('2021-05-31', 'TOR', 3, 1),
			 		('2021-06-02', 'WPG', 5, 3),
			 		('2021-06-04', 'WPG', 1, 0),
			 		('2021-06-06', 'WPG', 5, 1),
			 		('2021-06-07', 'WPG', 3, 2),
			 		('2021-06-14', 'VGK', 1, 4),
			 		('2021-06-16', 'VGK', 3, 2),
			 		('2021-06-18', 'VGK', 3, 2),
			 		('2021-06-20', 'VGK', 1, 2);
			 		
INSERT INTO parties (date, adversaire) VALUES('2021-06-22', 'VGK');
