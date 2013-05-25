CREATE TABLE article
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	type int,
	title varchar(255),
	content text,
	created timestamp
)