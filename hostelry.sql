CREATE DATABASE allstarhostel;

USE allstarhostel;

CREATE TABLE accommodations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL,
    description DECIMAL(5,2) NOT NULL,
    type VARCHAR(10) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    FOREIGN KEY (extras_id) REFERENCES extras(id)
);

CREATE TABLE extras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL,
    description DECIMAL(5,2) NOT NULL,
    price DECIMAL(6,2) NOT NULL 
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    role ENUM('user', 'admin') DEFAULT 'user'
);