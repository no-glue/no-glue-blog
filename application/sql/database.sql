DROP DATABASE IF EXISTS noglue_blog;

CREATE DATABASE noglue_blog;

USE noglue_blog;

DROP TABLE IF EXISTS posts;

CREATE TABLE posts(
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255),
	title VARCHAR(255),
	body TEXT,
	created_at INT(11),
	modified_at INT(11),
	PRIMARY KEY(id)
);

DROP TABLE IF EXISTS users;

CREATE TABLE users(
	id INT(11) NOT NULL AUTO_INCREMENT,
	username VARCHAR(255),
	password VARCHAR(255),
	`level` INT(11),
	created_at INT(11),
	modified_at INT(11),
	PRIMARY KEY(id),
	UNIQUE(username)
);

DROP TABLE IF EXISTS sessions;

CREATE TABLE sessions(
	id VARCHAR(32) NOT NULL,
	body TEXT,
	created_at INT(11),
	modified_at INT(11),
	PRIMARY KEY(id)
);
