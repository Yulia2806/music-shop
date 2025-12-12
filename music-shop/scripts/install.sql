
CREATE DATABASE IF NOT EXISTS music_shop CHARACTER SET utf8mb4;
USE music_shop;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin','user') DEFAULT 'user'
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  price DECIMAL(10,2),
  stock INT
);

CREATE TABLE news (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  body TEXT
);

CREATE TABLE pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(100),
  title VARCHAR(255),
  content TEXT
);

CREATE TABLE gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255)
);
