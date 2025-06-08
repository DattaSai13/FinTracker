CREATE DATABASE IF NOT EXISTS expense_tracker;
USE expense_tracker;
CREATE TABLE admin (
    Name VARCHAR(100) NOT NULL,
    DOB DATE NOT NULL,
    Phone VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    PRIMARY KEY (Email)
);


CREATE TABLE income (
    Sno INT AUTO_INCREMENT,
    Names VARCHAR(100) NOT NULL,
    Source VARCHAR(100) NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL,
    Date DATE NOT NULL,
    Description TEXT,
    PRIMARY KEY (Sno),
    FOREIGN KEY (Names) REFERENCES admin(Email) ON DELETE CASCADE
);


CREATE TABLE expenses (
    Sno INT AUTO_INCREMENT,
    Names VARCHAR(100) NOT NULL,
    Category VARCHAR(100) NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL,
    Date DATE NOT NULL,
    Description TEXT,
    PRIMARY KEY (Sno),
    FOREIGN KEY (Names) REFERENCES admin(Email) ON DELETE CASCADE
);