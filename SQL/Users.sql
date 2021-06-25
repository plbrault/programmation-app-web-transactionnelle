CREATE TABLE users (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	username TEXT NOT NULL,
	hashed_password TEXT NOT NULL,
	first_name TEXT NOT NULL,
	last_name TEXT NOT NULL
);

INSERT INTO users (username, hashed_password, first_name, last_name)
		  VALUES  ('marcand', '$2y$10$N7UN3N.ELnKCFrvvql.bROJzM5DqDRDEscw0JGXE4GjHPy9YSdWBy', 'Marc', 'Arcand'), -- Mot de passe: marcarcandworld
		  		  ('ccliche', '$2y$10$9Glili1mnX2mYy/pLeUK6uNdzrWbs./UmzCM/02MqIK4J0IPgBu1e', 'Claire', 'Cliche'); -- Mot de passe: password1234
