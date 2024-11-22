CREATE USER 'Raccoon'@'localhost' IDENTIFIED BY 'Raccoon';


GRANT ALL PRIVILEGES ON *.* TO 'Raccoon'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `Raccoon`;
GRANT ALL PRIVILEGES ON `Raccoon`.* TO 'Raccoon'@'localhost';
GRANT ALL PRIVILEGES ON `Raccoon\_%`.* TO 'Raccoon'@'localhost'; 


CREATE TABLE `Raccoon`.`Users` (
    `id` INT NOT NULL AUTO_INCREMENT ,
     `first_name` TEXT NOT NULL ,
      `last_name` TEXT NULL ,
       `password` TEXT NOT NULL COMMENT 'Hashed password' ,
        `username` TEXT NOT NULL , 
         `role` INT NOT NULL DEFAULT 1 , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `Raccoon`.`Posts` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Raccoon`.`Messages` (
    `id` INT NOT NULL AUTO_INCREMENT ,
     `text` TEXT NOT NULL ,
      `email` TEXT NOT NULL ,
       `mobile` TEXT NULL ,
        `author` INT NOT NULL ,
         `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;


INSERT INTO `Users` (`id`, `first_name`, `last_name`, `password`, `username`, `role`) VALUES ('1', '', NULL, SHA1('admin'), 'admin', '2');
INSERT INTO `Users` (`id`, `first_name`, `last_name`, `password`, `username`, `role`) VALUES ('2', 'Janos', 'Vezeték', SHA1('user'), 'user', '1');


INSERT INTO `Posts` (`id`, `author`, `title`, `content`, `created_at`) VALUES
(2, 2, 'Adele halo', 'Hello, it\'s me\r\nI was wondering if after all these years you\'d like to meet\r\nTo go over everything\r\nThey say that time\'s supposed to heal ya, but I ain\'t done much healing\r\nHello, can you hear me?\r\nI\'m in California dreaming about who we used to be\r\nWhen we were younger and free\r\nI\'ve forgotten how it felt before the world fell at our feet\r\nThere\'s such a difference between us\r\nAnd a million miles\r\nHello from the other side\r\nI must\'ve called a thousand times\r\nTo tell you I\'m sorry for everything that I\'ve done\r\nBut when I call, you never seem to be home\r\nHello from the outside\r\nAt least I can say that I\'ve tried\r\nTo tell you I\'m sorry for breaking your heart\r\nBut it don\'t matter, it clearly doesn\'t tear you apart anymore\r\nHello, how are you?\r\nIt\'s so typical of me to talk about myself, I\'m sorry\r\nI hope that you\'re well\r\nDid you ever make it out of that town where nothing ever happened?\r\nIt\'s no secret that the both of us\r\nAre running out of time\r\nSo hello from the other side (other side)\r\nI must\'ve called a thousand times (thousand times)\r\nTo tell you I\'m sorry for everything that I\'ve done\r\nBut when I call, you never seem to be home\r\nHello from the outside (outside)\r\nAt least I can say that I\'ve tried (I\'ve tried)\r\nTo tell you I\'m sorry for breaking your heart\r\nBut it don\'t matter, it clearly doesn\'t tear you apart anymore\r\nOoh (lows, lows, lows, lows), anymore\r\n(Highs, highs, highs, highs)\r\nOoh (lows, lows, lows, lows), anymore\r\n(Highs, highs, highs, highs)\r\nOoh (lows, lows, lows, lows), anymore\r\n(Highs, highs, highs, highs)\r\nAnymore (lows, lows, lows, lows)\r\nHello from the other side (other side)\r\nI must\'ve called a thousand times (thousand times)\r\nTo tell you I\'m sorry for everything that I\'ve done\r\nBut when I call, you never seem to be home\r\nHello from the outside (outside)\r\nAt least I can say that I\'ve tried (I\'ve tried)\r\nTo tell you I\'m sorry for breaking your heart\r\nBut it don\'t matter, it clearly doesn\'t tear you apart anymore', '2024-11-20 11:51:06');

INSERT INTO `Messages` (`id`, `text`, `email`, `mobile`, `author`, `created_at`) VALUES
(1, 'The website is lagging. Stop. Don\'t do it. You can do much better if you actually try.', 'mymail@yourmail.nyc', '06033456789', 2, '2024-11-20 11:54:45');
