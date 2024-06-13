CREATE DATABASE allstarhostel;

CREATE TABLE accommodation (
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