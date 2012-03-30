DROP DATABASE IF EXISTS `cyclerinfo`;
CREATE DATABASE IF NOT EXISTS `cyclerinfo`;
USE `cyclerinfo`;

GRANT ALL PRIVILEGES ON `cyclerinfo`.* TO 'admin'@'localhost' IDENTIFIED BY 'adminpw';

--
-- Defining table to hold game listings
--
	
DROP TABLE IF EXISTS `listings`;

--
CREATE TABLE `listings` (
	`listingID` INT(20) NOT NULL auto_increment,
	`title` VARCHAR(50) NOT NULL default '',
	`platform` VARCHAR(20) NOT NULL default '',
	`condition` ENUM('Pristine','Excellent','Good','Bad','Terrible'),
	`price` DECIMAL(6,2),
	`userID` INT(10),
	CONSTRAINT users_userID_fk
	FOREIGN KEY (`userID`)
	REFERENCES `users` (`userID`),
	PRIMARY KEY (`listingID`)
);

--
-- Defining tables to hold user information
--

DROP TABLE IF EXISTS `user ratings`;

--
CREATE TABLE `user ratings` (
	`ratingID` INT (10) NOT NULL auto_increment,
	`buyerrating` INT(3) NOT NULL default '0',
	`sellerrating` INT(3) NOT NULL default '0',
	`userID` INT(10) NOT NULL,
	CONSTRAINT users_userID_fk
	FOREIGN KEY (`userID`)
	REFERENCES `users` (`userID`),
	PRIMARY KEY (`ratingID`)
);

DROP TABLE IF EXISTS `user address`;

--
CREATE TABLE `user address` (
	-- The address lines are split because we'd planned on allowing
	-- searches by country and city, and possibly zipcode.
	`addressID` INT(10) NOT NULL auto_increment,
	`country` VARCHAR(35) NOT NULL default '',
	`city` VARCHAR(35) NOT NULL default '',
	`street` VARCHAR(140) NOT NULL default '',
	`zipcode` CHAR(5), -- if we were using a full zipcode we would split this off with city and street underneath it
	`userID` INT(10) NOT NULL,
	CONSTRAINT users_userID_fk
	FOREIGN KEY (`userID`)
	REFERENCES `users` (`userID`),
	PRIMARY KEY (`addressID`)
);

DROP TABLE IF EXISTS `users`;

--
CREATE TABLE `users` (
	`userID` INT(10) NOT NULL auto_increment,
	`email` VARCHAR(100) NOT NULL default 'unregistered@nothing.net',
	`password` CHAR(64), -- the SHA256 hash will always be 64 characters in length
	`firstname` VARCHAR(30) NOT NULL default '',
	`lastname` VARCHAR(30) NOT NULL default '',
	PRIMARY KEY (`userID`)
);

--
-- Defining a table of transactions
--

DROP TABLE IF EXISTS `transactions`;

--
CREATE TABLE `transactions` (
	`transactionID` INT(20) NOT NULL auto_increment,
	`sellerID` INT(10),
	`buyerID` INT(10),
	`listingID` INT(20),
	`sellerrating` INT(3), -- new rating applied to the seller by the buyer this transaction
	`buyerrating` INT(3), -- new rating applied to the buyer by the seller this transaction
	PRIMARY KEY(`transactionID`)
);
	
--
-- Test data
--

-- Make two users to mess around with
INSERT INTO `users` (
	`email`,`password`,`firstname`,`lastname`
)
VALUES (
	'test@test.com',
	SHA('test'),
	'test',
	'mctest'
), (
	'something@test.com',
	SHA('test'),
	'some',
	'guy'
);

INSERT INTO `user address` (
	`country`, `city`, `street`, `zipcode`, `userID`)
VALUES (
	'USA', 'Lakeridge', '6101 Somestreet Ln.', '90210', (SELECT `userID` FROM `users` WHERE `email` = 'test@test.com')
), (
	'USA', 'Woodbridge', '2101 Otherstreet Rd.', '90212', (SELECT `userID` FROM `users` WHERE `email` = 'something@test.com')
);


INSERT INTO `listings` (`title`,`platform`,`condition`,`price`,`userID`)
VALUES ('SomeGame', 'PSOne', 3, 3.50, 1),
('Metal Gear Solid', 'PSOne', 2, 12.21, 1),
('The Legend of Zelda Ocarina of Time', 'N64', 3, 26.32, 2),
('Super Mario Bros.', 'NES', 1, 8.34, 1),
('Lemmings', 'PC', 2, 2.54, 2),
('The Legend of Zelda', 'NES', 1, 6.31, 1),
('Monkey Island 2: LeChuck\'s Revenge', 'PC', 2, 31.47, 1),
('Yoshi\'s Story', 'N64', 4, 12.45, 2),
('Glover', 'N64', 5, 17.43, 1),
('Super Mario World', 'SNES', 4, 14.63, 1),
('Syphon Filter', 'PSOne', 2, 11.65, 2),
('Super Star Wars: The Empire Strikes Back', 'SNES', 3, 24.22, 2),
('Super Smash Bros.', 'N64', 2, 23.34, 2),
('Yoshi\'s Island', 'SNES', 5, 36.12, 1);
	

	

