-- kreiranje baze 
CREATE DATABASE blog;
-- kreiranje tabele blog
CREATE TABLE blog.posts (
	id INTEGER auto_increment NOT NULL,
	title VARCHAR(100) NULL,
	body VARCHAR(100) NULL,
	author VARCHAR(100) NULL,
	created_at datetime DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)
INSERT INTO blog.posts (title, body, author) VALUES('Naslov posta 1', 'Body posta 1','Author posta 1');