
CREATE DATABASE `anothertodolist` ;

use `anothertodolist`;

CREATE TABLE `workspaces` (
`workspace` VARCHAR( 32 ) NOT NULL ,
`selectedCategory` VARCHAR( 16 ) NOT NULL ,
PRIMARY KEY ( `workspace` )
) ENGINE = MYISAM ;

CREATE TABLE `lists` (
`workspace` VARCHAR( 32 ) NOT NULL ,
`id` INT NOT NULL ,
`content` TEXT NOT NULL ,
PRIMARY KEY ( `workspace` , `id` )
) ENGINE = MYISAM ;

CREATE USER 'anothertodolist'@'localhost';

GRANT USAGE ON * . * TO 'anothertodolist'@'localhost' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT SELECT , INSERT , UPDATE , DELETE ON `anothertodolist` . * TO 'anothertodolist'@'localhost';
