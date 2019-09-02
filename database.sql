CREATE TABLE `customers` (
    `email` VARCHAR(255) PRIMARY KEY ,
    `firstName` VARCHAR(255) NOT NULL ,
    `lastName` VARCHAR(255) NOT NULL ,
    `country` VARCHAR(255) NOT NULL ,
    `areaOfInterest` VARCHAR(255) NOT NULL
);
CREATE TABLE `users` (
    `email` VARCHAR(255) PRIMARY KEY ,
    `name` VARCHAR(255) NOT NULL ,
    `password` VARCHAR(255) NOT NULL
);