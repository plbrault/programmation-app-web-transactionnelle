CREATE TABLE diffuseurs (
	code CHAR(5) PRIMARY KEY,
	nom TEXT
);

INSERT INTO diffuseurs (code, nom) VALUES
	('NTFLX', 'Netflix'),
	('PRIME', 'Amazon Prime Video'),
	('TOUTV', 'Ici Tou.tv'),
	('DISN+', 'Disney+'),
	('APPTV', 'Apple TV+'),
	('CRAVE', 'CraveTV'),
	('ILLIC', 'Club Illico');

CREATE TABLE series (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	titre TEXT NOT NULL,
	diffuseur CHAR(5) NOT NULL,
	nbSaisons INTEGER,
	nbEpisodes INTEGER,
	nbEpisodesVus INTEGER,
	
	CONSTRAINT fk_diffuseur FOREIGN KEY (diffuseur) REFERENCES diffuseurs(code)
);

INSERT INTO series (titre, diffuseur, nbSaisons, nbEpisodes, nbEpisodesVus) VALUES
	('Stranger Things', 'NTFLX', 3, 25, 25),
	('The Last Kingdom', 'NTFLX', 4, 36, 31),
	('Série noire', 'TOUTV', 2, 22, 22),
	('C''est comme ça que je t''aime', 'TOUTV', 1, 10, 10),
	('The Mandalorian', 'DISN+', 2, 16, 10);
