DROP database IF EXISTS bandom_db;
CREATE database bandom_db;
USE bandom_db;

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_email varchar(255) NOT NULL,
  username varchar(50) NOT NULL,
  password char(128) NOT NULL,
  f_name varchar(50) NOT NULL,
  l_name varchar(50) NOT NULL,
  admin boolean DEFAULT false,
  PRIMARY KEY (id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS albums (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  band_id int(11) NOT NULL,
  year date NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (band_id) REFERENCES bands(id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS genres (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;


CREATE TABLE IF NOT EXISTS subscriptions (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  band_id int(11) NOT NULL,
  role_id int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY `band_id` (band_id),
  KEY `user_id` (user_id),
  KEY `role_id` (role_id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (band_id) REFERENCES bands(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  role varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS bands (
  id int(11) NOT NULL AUTO_INCREMENT,
  band_name varchar(50) NOT NULL,
  band_info text NOT NULL,
  genre_id int(11) NOT NULL,
  facebook varchar(2083) DEFAULT NULL,
  twitter varchar(2083) DEFAULT NULL,
  official_site varchar(2083) DEFAULT NULL,
  created DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (genre_id) REFERENCES genres(id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS forums (
  id int(11) NOT NULL AUTO_INCREMENT,
  band_id int(11) NOT NULL,
  thread_title varchar(50) NOT NULL,
  views int(11) DEFAULT 0,
  creator int(11) NOT NULL,
  created DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  KEY `band_id` (band_id),
  FOREIGN KEY (band_id) REFERENCES bands(id),
  FOREIGN KEY (creator) REFERENCES users(id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS posts (
  id int(11) NOT NULL AUTO_INCREMENT,
  thread_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  content text NOT NULL,
  created DATETIME DEFAULT NULL,
  modified DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  KEY `thread_id` (thread_id),
  KEY `user_id` (user_id),
  FOREIGN KEY (thread_id) REFERENCES forums(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=MyISAM;

GRANT ALL PRIVILEGES ON bandom_db.* TO 'webadmin'@'localhost';

INSERT INTO genres(name) Values('Accapella');
INSERT INTO genres(name) Values('Acoustic');
INSERT INTO genres(name) Values('Alternative');
INSERT INTO genres(name) Values('Ambient');
INSERT INTO genres(name) Values('Americana');
INSERT INTO genres(name) Values('Blues');
INSERT INTO genres(name) Values('Classic Rock');
INSERT INTO genres(name) Values('Comedy');
INSERT INTO genres(name) Values('Country');
INSERT INTO genres(name) Values('Folk');
INSERT INTO genres(name) Values('Garage');
INSERT INTO genres(name) Values('Groove');
INSERT INTO genres(name) Values('Grunge');
INSERT INTO genres(name) Values('Hard Rock');
INSERT INTO genres(name) Values('Indie');
INSERT INTO genres(name) Values('Instrumental');
INSERT INTO genres(name) Values('Jazz');
INSERT INTO genres(name) Values('Metal');
INSERT INTO genres(name) Values('MetalCore');
INSERT INTO genres(name) Values('Modern Rock');
INSERT INTO genres(name) Values('Pop Rock');
INSERT INTO genres(name) Values('Punk Rock');
INSERT INTO genres(name) Values('Reggae');
INSERT INTO genres(name) Values('Rock');
INSERT INTO genres(name) Values('Swing');

INSERT INTO roles(role) Values('USER');
INSERT INTO roles(role) Values('ADMIN');
