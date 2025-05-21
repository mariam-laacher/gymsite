CREATE DATABASE pegazup;
create Table options(
                        id INT PRIMARY KEY,
                        name varchar(10) NOT NULL,
                        price FLOAT
);
CREATE TABLE coachs(
                      id INT PRIMARY KEY auto_increment,
                      firstname varchar(20) NOT NULL,
                      lastname varchar(20) NOT NULL,
                      sex varchar(10) NOT NULL,
                      retire INT DEFAULT 0,
);
CREATE TABLE people(
                       id INT PRIMARY KEY auto_increment,
                       fname VARCHAR(30),
                       lname VARCHAR(30),
                       email VARCHAR(255) UN IQUE,
                       age VARCHAR(30),
                       inscription INT DEFAULT NULL,
                       paid_date DATE DEFAULT NULL,
                       expire_date DATE DEFAULT NULL,
                       coach_id INT DEFAULT NULL,
                       city VARCHAR(100) DEFAULT NULL,
                       password VARCHAR(255),
                       foreign key (inscription)
                           references options(id),
                       FOREIGN KEY (coach_id)
                           REFERENCES coach(id),
);
CREATE TABLE cards(
                      id INT PRIMARY KEY auto_increment,
                      name VARCHAR(255) NOT NULL,
                      number VARCHAR(255) NOT NULL UNIQUE,
                      exp_date VARCHAR(255) NOT NULL,
                      cvv VARCHAR(255) NOT NULL,
                      personid INT,
                      foreign key (personid)
                          REFERENCES people(id)
);
INSERT INTO options
VALUES(1, "LIGHT", 20),
      (2, "PLUS", 20),
      (3, "PRO", 20);
