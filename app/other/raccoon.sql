CREATE USER 'Raccoon'@'localhost' IDENTIFIED BY 'Raccoon';


GRANT ALL PRIVILEGES ON *.* TO 'Raccoon'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `Raccoon`;
GRANT ALL PRIVILEGES ON `Raccoon`.* TO 'Raccoon'@'localhost';
GRANT ALL PRIVILEGES ON `Raccoon\_%`.* TO 'Raccoon'@'localhost'; 


CREATE TABLE `Raccoon`.`Users` (`id` INT NOT NULL AUTO_INCREMENT , `first_name` TEXT NOT NULL , `last_name` TEXT NULL , `password` INT NOT NULL COMMENT 'Hashed password' , `username` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `Raccoon`.`Comments` (`id` INT NOT NULL AUTO_INCREMENT , `text` TEXT NOT NULL , `author` INT NOT NULL , `created_at` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `Raccoon`.`Messages` (`id` INT NOT NULL AUTO_INCREMENT , `text` TEXT NOT NULL , `email` TEXT NOT NULL , `mobile` TEXT NULL , `author` INT NOT NULL , `created_at` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

