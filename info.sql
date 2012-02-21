DROP DATABASE IF EXISTS `cyclerinfo`;
CREATE DATABASE IF NOT EXISTS `cyclerinfo`;
USE `info`;

--
-- Defining a table to hold game listings
--

DROP TABLE IF EXISTS `listings`;

--
CREATE TABLE `listings` (
	`listingID` INT(20) NOT NULL auto_increment,
	`title` VARCHAR(50) NOT NULL default '',
	`platform` VARCHAR(20) NOT NULL default '',
	-- condition is a reserved word. fancy that.
	-- apparently, that's why you're supposed to use graves (`)
	-- to quote things. so that's a good hour wasted.
	`condition` ENUM('Pristine','Excellent','Good','Bad','Terrible'),
	`price` DECIMAL(6,2),
	`userID` INT(10),
	PRIMARY KEY (`listingID`)
);

--
-- Defining a table to hold user information
--

DROP TABLE IF EXISTS `users`;

--
CREATE TABLE `users` (
	`userID` INT(10) NOT NULL auto_increment,
	`email` VARCHAR(100) NOT NULL default 'unregistered@nothing.net',
	`password` CHAR(64), -- the SHA256 hash will always be 64 characters in length
	`sellerrating` INT(3) NOT NULL default '0',
	`buyerrating` INT(3) NOT NULL default '0',
	`firstname` VARCHAR(30) NOT NULL default '',
	`lastname` VARCHAR(30) NOT NULL default '',
	`country` VARCHAR(35) NOT NULL default '',
	`city` VARCHAR(35) NOT NULL default '',
	`street` VARCHAR(140) NOT NULL default '',
	`apt` VARCHAR(100),
	`zipcode` CHAR(5),
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
	`sellerrating` INT(3),
	`buyerrating` INT(3),
	PRIMARY KEY(`transactionID`)
);
	
--
-- Test data
--

-- Make two users to mess around with
INSERT INTO `users` (
	`email`,`password`,`firstname`,`lastname`,`country`,`city`,`street`,`zipcode`
)
VALUES (
	'test@test.com',
	SHA('testpassword'),
	'test',
	'mctest',
	'usa',
	'woodbridge',
	'123 street',
	'90210'
), (
	'something@test.com',
	SHA('somepassword'),
	'guy',
	'mcguy',
	'usa',
	'hoodbridge',
	'321 street',
	'90210'
);

-- The first guy posts this game for sale
INSERT INTO `listings` (
	`title`,`platform`,`condition`,`price`,`userID`
)
VALUES (
	'SomeGame',
	'Playstation',
	3,
	3.50,
	1
);

-- The game sells to the second guy. They both rated the experience as medium shitty.
INSERT INTO `transactions` (
	`sellerID`, `buyerID`, `listingID`, `sellerrating`, `buyerrating`
)
VALUES (
	1,
	2,
	1,
	60,
	50
);
	

	

