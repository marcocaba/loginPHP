CREATE TABLE users (
`id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  	PRIMARY KEY (`id`)
    );
    
    
    
INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Marco@gmail.com', 'root1234')