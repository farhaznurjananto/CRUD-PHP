-- create Database and Table
CREATE DATABASE crud_db;

USE crud_db;

CREATE TABLE users (
    id int(11) NOT NULL auto_increment,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    mobile varchar(100) NOT NULL,
    PRIMARY KEY (id)
);