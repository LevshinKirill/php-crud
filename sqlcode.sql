-- SQL DB code:

    CREATE DATABASE php-crud;

    USE php-crud;

-- SQL Table code:

   CREATE TABLE post(
        id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_name TEXT,
        message TEXT,
        changes_date: DATETIME
   )