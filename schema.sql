CREATE DATABASE yetigave;

USE yetigave;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  category_name CHAR(128)
);
CREATE UNIQUE INDEX category_name ON categories(category_name);

CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_of_creation TIMESTAMP,
  lot_title VARCHAR(60),
  description TEXT,
  image VARCHAR(32),
  starting_price INT,
  date_of_completion TIMESTAMP,
  bid_rate INT,
  additions_to_favorites SMALLINT,
  user_id INT,
  winner_id INT,
  category_id INT
);

CREATE INDEX lot_title ON lots(lot_title);
CREATE UNIQUE INDEX image ON lots(image);


CREATE TABLE costs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_of_cost TIMESTAMP,
  cost INT,
  user_id INT,
  lot_id INT
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_of_sign_in TIMESTAMP,
  email  VARCHAR(64),
  username  VARCHAR(32),
  password VARCHAR(100),
  avatar  VARCHAR(32),
  contacts  VARCHAR(32)
);

CREATE UNIQUE INDEX email ON users(email);
CREATE UNIQUE INDEX username ON users(username);
