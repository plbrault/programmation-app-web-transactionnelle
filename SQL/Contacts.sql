CREATE TABLE contacts (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	nom TEXT DEFAULT '',
	prenom TEXT DEFAULT ''
);

CREATE TABLE types_adresse (
	code CHAR(3) PRIMARY KEY,
	description TEXT NOT NULL
);
INSERT INTO types_adresse (code, description) VALUES ('DOM', 'Domicile'), ('TRV', 'Travail');

CREATE TABLE types_courriel (
	code CHAR(3) PRIMARY KEY,
	description TEXT NOT NULL
);
INSERT INTO types_courriel (code, description) VALUES ('PER', 'Personnelle'), ('PRO', 'Professionnelle');

CREATE TABLE types_numero_tel (
	code CHAR(3) PRIMARY KEY,
	description TEXT NOT NULL
);
INSERT INTO types_numero_tel (code, description) VALUES ('DOM', 'Domicile'), ('CEL', 'Cellulaire'), ('TRV', 'Travail');

CREATE TABLE adresses (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	contact_id INTEGER,
	type_adresse CHAR(3),
	adresse TEXT,
	
	CONSTRAINT fk_contact_id FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE,
	CONSTRAINT fk_types_adresse FOREIGN KEY (type_adresse) REFERENCES types_adresse(code)
);

CREATE TABLE numeros_tel (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	contact_id INTEGER,
	type_numero_tel CHAR(3),
	numero_tel TEXT,
	
	CONSTRAINT fk_contact_id FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE,
	CONSTRAINT fk_type_numero_tell FOREIGN KEY (type_numero_tel) REFERENCES types_numero_tel(code)
);

CREATE TABLE courriels (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	contact_id INTEGER,
	type_courriel CHAR(3),
	courriel TEXT,
	
	CONSTRAINT fk_contact_id FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE,
	CONSTRAINT fk_type_courriel FOREIGN KEY (type_courriel) REFERENCES types_courriel(code)
);

INSERT INTO contacts (nom, prenom) VALUES
 	('Delisle', 'Gaétan'),				-- 1
 	('Delisle', 'Huguette'),			-- 2
 	('Paquette', 'Serge'),				-- 3
 	('Paquette', 'Micheline'),			-- 4
 	('Croteau', 'René'),				-- 5
 	('Rondeau', 'Denis'),				-- 6
 	('Bouchard', 'Patrick'),			-- 7
 	('Arcand', 'Marc'),					-- 8
 	('Cantin', 'Julie'),				-- 9
 	('Talbot', 'Louise'),				-- 10
 	('Boissonneau', 'Jean-Guy'),		-- 11
 	('Brodeur', 'Claudio'),				-- 12
 	('Michaud', 'Caroline'),			-- 13
 	('Laverdière', 'Anne-Sophie');		-- 14

INSERT INTO adresses (contact_id, type_adresse, adresse) VALUES
	(1, 'DOM', '432 Avenue Pennsylvanie'),
	(1, 'TRV', '286 Avenue Caroline du Nord'),
	(2, 'DOM', '432 Avenue Pacifique'),
	(7, 'DOM', '955 Place du Parc'),
	(9, 'DOM', '1212 Avenue Atlantique'),
	(10, 'TRV', '14 Place St-Charles'),
	(11, 'DOM', '99 Avenue Kentucky');
	
INSERT INTO numeros_tel (contact_id, type_numero_tel, numero_tel) VALUES
	(1, 'DOM', '819-555-1988'),
	(1, 'CEL', '819-555-1418'),
	(2, 'DOM', '819-555-1988'),
	(3, 'CEL', '819-555-3935'),
	(4, 'CEL', '819-555-6792'),
	(5, 'TRV', '819-555-2724'),
	(6, 'CEL', '819-555-0144'),
	(7, 'DOM', '819-555-0123'),
	(7, 'CEL', '819-555-9931'),
	(9, 'TRV', '819-555-2368'),
	(10, 'DOM', '819-555-4202'),
	(12, 'CEL', '819-555-9876'),
	(14, 'CEL', '819-555-5432');
	
INSERT INTO courriels (contact_id, type_courriel, courriel) VALUES
	(2, 'PER', 'hdelisle@example.org'),
	(3, 'PRO', 'spaquette@example.org'),
	(4, 'PER', 'mpaquette@example.org'),
	(6, 'PER', 'drondeau@example.org'),
	(7, 'PER', 'pbouchard@example.org'),
	(8, 'PRO', 'marcand@example.org'),
	(9, 'PER', 'jcantin@example.org'),
	(10, 'PER', 'ltalbot@example.org'),
	(10, 'PRO', 'ltalbot@example.com'),
	(12, 'PER', 'claudioencaval@hotmail.ca'),
	(13, 'PER', 'cmichaud@example.org'),
	(14, 'PRO', 'aslaverdiere@example.com');

