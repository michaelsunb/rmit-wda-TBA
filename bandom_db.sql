DROP database IF EXISTS bandom_db;
CREATE database bandom_db;
USE bandom_db;

CREATE TABLE IF NOT EXISTS users (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  user_email varchar(255) NOT NULL,
  screen_name varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  f_name varchar(50) NOT NULL,
  l_name varchar(50) NOT NULL,
  PRIMARY KEY (user_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS user_subs (
  user_id int(11) NOT NULL,
  band_id int(11) NOT NULL,
  user_role varchar(50) NOT NULL,
  KEY `band_id` (band_id),
  KEY `user_id` (user_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (band_id) REFERENCES bands(band_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS bands (
  band_id int(11) NOT NULL AUTO_INCREMENT,
  band_name varchar(50) NOT NULL,
  band_info text NOT NULL,
  time_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (band_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS forums (
  thread_id int(11) NOT NULL AUTO_INCREMENT,
  band_id int(11) NOT NULL,
  thread_title varchar(50) NOT NULL,
  PRIMARY KEY (thread_id),
  KEY `band_id` (band_id),
  FOREIGN KEY (band_id) REFERENCES bands(band_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS posts (
  post_id int(11) NOT NULL AUTO_INCREMENT,
  thread_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  content text NOT NULL,
  time_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  time_updated timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (post_id),
  KEY `thread_id` (thread_id),
  KEY `user_id` (user_id),
  FOREIGN KEY (thread_id) REFERENCES forums(thread_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE=MyISAM;

GRANT ALL PRIVILEGES ON bandom_db.* TO 'webadmin'@'localhost';