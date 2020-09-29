	
CREATE DATABASE recruitment_task;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(20) NOT NULL AUTO_INCREMENT,
`login` char(50) NOT NULL UNIQUE,
`password` varchar(256) NOT NULL,
`name` char(10) NOT NULL,
`last_name` char(50) NOT NULL,
`sex` char(8) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
