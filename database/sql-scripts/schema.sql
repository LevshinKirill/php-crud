CREATE DATABASE db;

USE db;

CREATE TABLE post(
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name TEXT,
    message TEXT,
    changes_date DATETIME
)