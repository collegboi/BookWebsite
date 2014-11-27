DROP TABLE Users;
DROP TABLE Books;
DROP TABLE Catagories;
DROP TABLE Reservations;

CREATE TABLE Users (
	Username VARCHAR(30) NOT NULL,
	Password VARCHAR(30) NOT NULL,
	FirstName VARCHAR(30) NOT NULL,
	LastName VARCHAR(30) NOT NULL,
	AddressLine1 VARCHAR(40) NOT NULL,
	AddressLine2 VARCHAR(40) NOT NULL,
	City VARCHAR(10) NOT NULL,
	Telephone VARCHAR(15) NOT NULL,
	Mobile VARCHAR(15),
	PRIMARY KEY(Username)
);

CREATE TABLE Books (
	ISBN VARCHAR(20) NOT NULL,
	BookTitle VARCHAR(50) NOT NULL,
	Author VARCHAR(40) NOT NULL,
	Edition INT(2) NOT NULL,
	Year INT(4) unsigned NOT NULL,
	CategoryID INT unsigned NOT NULL,
	Reservation VARCHAR(1) NOT NULL,
	PRIMARY KEY(ISBN)
);

CREATE TABLE Catagories (
	CategoryID INT unsigned AUTO_INCREMENT NOT NULL,
	CategoryDesc VARCHAR(30) NOT NULL,
	PRIMARY KEY(CategoryID)
);

CREATE TABLE Reservations (
	ISBN VARCHAR(20) NOT NULL,
	Username VARCHAR(30) NOT NULL,
	RervationDate DATE NOT NULL,
	PRIMARY KEY(Username)
	
);


ALTER TABLE Catagories ADD CONSTRAINT categoryID_fk FOREIGN KEY(CategoryID) REFERENCES Catagories(CategoryID) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Reservations ADD CONSTRAINT ISBN_fk FOREIGN KEY(ISBN) REFERENCES Books(ISBN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Reservations ADD CONSTRAINT Username_fk FOREIGN KEY(Username) REFERENCES Users(Username) ON UPDATE CASCADE ON DELETE CASCADE;

--Inputting data into books tables  14 different books
--1
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('093-403992',  'Computers in Business',    'Alicia ONeil',   3, 1997, 003, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('23472-8729',  'Exploring Peru',           'Stephen Birchie',4, 2005, 005, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('237-34823',   'Business Strategy',        'Joe Peppard',    2, 2002, 002, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('23u8-923849', 'A Guide to Nutrition',     'John Thorpe',    2, 1997, 001, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('2983-3494',   'Cooking for Children',     'Anabelle Sharpe',1, 2003, 007, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('82n8-308',    'Computers for Idiots',     'Susan ONeil',    5, 1998, 004, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('9823-23984',  'My Life in Picture',       'Kevin Graham',   8, 2004, 001, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('9823-2403-0', 'DaVinci Code',             'Dan Brown',      1, 2003, 008, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('98234-029384','My Ranch in Texas',        'George Bush',    1, 2005, 001, 'Y');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('9823-98345',  'How to Cook Italian Food', 'Jamie Oliver',   2, 2005, 007, 'Y');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('9823-98487',  'Optimising your Business', 'Cleo Blair',     1, 2001, 002, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('988745-234',  'Tara Road',                'Maeve Blinchy',  4, 2002, 008, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('993-004-00',  'My Life in bits',          'John Smith',     1, 2001, 001, 'N');
INSERT INTO Books(ISBN, BookTitle, Author, Edition, Year, CategoryID, Reservation) VALUES ('9987-0039882','Shooting History',         'Jon Snow',       1, 2003, 001, 'N');

--Inputting User for default for testing
INSERT INTO Users(Username, Password, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES('collegboi','pass1234', 'Timothy', 'Barnard', 'Millrace Rd', 'Castleknock', 'Dublin', '015476134','');


INSERT INTO Reservations(ISBN,Username,RervationDate) VALUES ();


INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(001,'Health');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(002,'Business');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(003,'Biography');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(004,'Technology');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(005,'Travel');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(006,'Self-Help');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(007,'Cookery');
INSERT INTO Catagories(CategoryID, CategoryDesc) VALUES(008,'Fiction');


