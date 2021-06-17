CREATE TABLE tasks (
	id INTEGER PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
	description TEXT NOT NULL,
	is_checked BOOLEAN NOT NULL DEFAULT false
);

INSERT INTO tasks (description) VALUES ('Nourrir le chat');
INSERT INTO tasks (description) VALUES ('Faire la vaisselle');
INSERT INTO tasks (description) VALUES ('Tondre la pelouse');
