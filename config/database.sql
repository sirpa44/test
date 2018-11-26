CREATE DATABASE users;
USE users;
CREATE TABLE users
(
  id INT unsigned NOT NULL AUTO_INCREMENT primary key,
  login VARCHAR(150) NOT NULL,
  password VARCHAR(150) NOT NULL,
  title VARCHAR(150) NOT NULL,
  lastname VARCHAR(150) NOT NULL,
  firstname VARCHAR(150) NOT NULL,
  gender  VARCHAR(6) NOT NULL,
  email VARCHAR(150) NOT NULL,
  picture VARCHAR(150) NOT NULL,
  address VARCHAR(150) NOT NULL
);