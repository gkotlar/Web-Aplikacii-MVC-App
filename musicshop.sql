-- create and select the database
DROP DATABASE IF EXISTS musicshop;
CREATE DATABASE musicshop;
USE musicshop;

-- create the tables for the database
CREATE TABLE customers (
  customerID        INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddressID     INT                       DEFAULT NULL,
  billingAddressID  INT                       DEFAULT NULL,  
  PRIMARY KEY (customerID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE addresses (
  addressID         INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  line1             VARCHAR(60)    NOT NULL,
  line2             VARCHAR(60)               DEFAULT NULL,
  city              VARCHAR(40)    NOT NULL,
  state             VARCHAR(2)     NOT NULL,
  zipCode           VARCHAR(10)    NOT NULL,
  phone             VARCHAR(12)    NOT NULL,
  disabled          TINYINT(1)     NOT NULL   DEFAULT 0,
  PRIMARY KEY (addressID),
  INDEX customerID (customerID)
);

CREATE TABLE orders (
  orderID           INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  orderDate         DATETIME       NOT NULL,
  shipAmount        DECIMAL(10,2)  NOT NULL,
  taxAmount         DECIMAL(10,2)  NOT NULL,
  shipDate          DATETIME                  DEFAULT NULL,
  shipAddressID     INT            NOT NULL,
  cardType          INT            NOT NULL,
  cardNumber        CHAR(16)       NOT NULL,
  cardExpires       CHAR(7)        NOT NULL,
  billingAddressID  INT            NOT NULL,
  PRIMARY KEY (orderID), 
  INDEX customerID (customerID)
);

CREATE TABLE orderItems (
  itemID            INT            NOT NULL   AUTO_INCREMENT,
  orderID           INT            NOT NULL,
  productID         INT            NOT NULL,
  itemPrice         DECIMAL(10,2)  NOT NULL,
  quantity          INT NOT NULL,
  PRIMARY KEY (itemID), 
  INDEX orderID (orderID), 
  INDEX productID (productID)
);

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  categoryID        INT            NOT NULL,
  artistName       VARCHAR(100)    NOT NULL,
  productName       VARCHAR(255)   NOT NULL,
  listPrice         DECIMAL(10,2)  NOT NULL,
  imgURL            VARCHAR(255)   NOT NULL,
  description       TEXT           NOT NULL,
  dateAdded         DATETIME       NOT NULL,
  PRIMARY KEY (productID), 
  INDEX categoryID (categoryID)
);

CREATE TABLE categories (
  categoryID        INT            NOT NULL   AUTO_INCREMENT,
  categoryName      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);

-- Insert data into the tables
INSERT INTO categories VALUES
(1, 'Vinyl Records'),
(2, 'Cassettes'),
(3, 'CDs');

INSERT INTO products VALUES
-- vinyl
(1, 1, 'The Beatles', '1958-1962', 17.44, 'item1.jpg', '18 tracks of rare early Beatles material, including "In Spite Of All The Danger" (the only song ever co-written by Paul McCartney & George Harrison) recorded in Liverpool in 1958 when the Beatles (along with John Lowe on piano & Colin Hanton on drums) were still known as the Quarrymen; a 1960 home recording of McCartney''s "Cayenne" (with Stuart Sutcliffe); "Ain''t She Sweet" recorded in Hamburg in 1961; "Besame Mucho" featuring Pete Best on drums; "The One After 909", and "I Saw Her Standing There" recorded live at the Cavern Club in 1962, and much, much more!! ', '2024-02-25 09:32:40'),
(2, 1, 'Gorillaz', 'Demon Days', 22.86, 'item4.jpg', 'Demon Days, the group''s sophomore album, finds lineup changes and an unlikely featured artist. Gorillaz, who are known for their cartoon illustrations as much as for their music, exceeded expectations with their follow up to their successful debut album. The new line up is missing Dan "the Automator" Nakamura. In his place, Albarn has joined up with DJ Danger Mouse to keep things moving along. Featured guests include De La Soul, Roots Manuva, Martina Topley-Bird, Shaun Ryder, and surprisingly, the actor Dennis Hopper delivers narration on "Fire Coming Out of the Monkey''s Head".', '2023-12-15 10:48:51'),
(3, 1, 'Laibach', 'Love is Still Alive', 18.62, 'item9.jpg', 'The EP Love is Still Alive is a 40 minute ''hidden'' country, dance and electronic sound traveling, featuring different versions of the song Love Is Still Alive from the Iron Sky - The Coming Race film, which ends with the destruction of planet Earth and its satellite Moon - from where the exodus of the last surviving Earthlings, who until recently still lived on the Moon, are now forced to find a new planet suitable for life. In principle, they are aiming at Mars, but we do not know if they will succeed in getting there. Their spaceship is not in best shape, and their food and water supplies are also very limited. The original song is taken from Laibach''s soundtrack for the sci-fi dark comedy action film Iron Sky: The Coming Race, the sequel to Iron Sky, which Laibach were commissioned to compose the score for in 2012.', '2023-11-30 12:14:15'),
(4, 1, 'AC/DC', 'For Those About To Rock', 15.37, 'item7.jpg', 'The title pretty much sums it up - AC/DC''s music is all about the fans. And before you even press play, you KNOW what you''re getting yourself into. Pressured to 3- peat with super producer Mutt Lange, labored over the follow-up to the mega-selling Back In Black. Switching studios several times until the sound was finally just right, For Those About To Rock stands as a testament to the absolute dedication the band has to giving their fans only the best.', '2024-01-27 11:38:40'),
(5, 1, 'Joy Division', 'Unknown Pleasures', 22.99, 'item2.jpg', 'Unknown Pleasures is the debut studio album by English rock band Joy Division. It was recorded at Strawberry Studios in Stockport in April 1979, with Martin Hannett as producer, and was released on June 15, 1979 by Factory Records.', '2024-03-15 13:37:22'),
-- cassettes
(6, 2, 'ABBA', 'Greatest Hits', 13.50, 'item13.jpg', 'Greatest Hits Vol. 2 is a compilation album by Swedish pop group ABBA, released on 29 October 1979 to coincide with their tour of North America and Europe (taking place between September and November 1979). It was ABBA''s second chart-topping album of the year, the first being Voulez-Vous, and contained the brand new single "Gimme! Gimme! Gimme! (A Man After Midnight)", recorded in August 1979.', '2024-03-21 12:58:43'),
(7, 2, 'Bee Gees', 'Size Isn''t Everything', 16.25, 'item14.jpg', 'Size Isn''t Everything is the twentieth studio album by the Bee Gees, released in the UK on 13 September 1993, and the US on 2 November of the same year. The brothers abandoned the contemporary dance feel of the previous album High Civilization and went for what they would describe as "A return to our sound before Saturday Night Fever".', '2023-12-23 14:28:47'),
(8, 2, 'Def Lepard', 'Hysteria', 18.86, 'item19.jpg', 'Hysteria is the fourth studio album by English rock band Def Leppard, released on 3 August 1987, by Phonogram Records. The album is the follow-up to the band''s 1983 breakthrough, Pyromania. Hysteria''s creation took over three years and was plagued by delays, including the aftermath of drummer Rick Allen''s accident that cost him his left arm on 31 December 1984. Subsequent to the album''s release, Def Leppard published a book titled Animal Instinct: The Def Leppard Story, written by Rolling Stone magazine senior editor David Fricke, on the three-year recording process of Hysteria and the difficult times the band endured through the mid-1980s. Lasting 62 minutes and 32 seconds, it is the band''s longest studio album to date', '2024-04-15 09:12:40'),
(9, 2, 'The Cranberries', 'No Need To Argue', 15.33, 'item18.jpg', 'No Need to Argue is the second studio album by Irish alternative rock band the Cranberries, released on 3 October 1994 through Island Records. It is the band''s best-selling album, and has sold 17 million copies worldwide as of 2014. It contains one of the band''s most well-known songs, "Zombie". The album''s mood is considered to be darker and harsher than that on the band''s debut album Everybody Else Is Doing It, So Why Can''t We?, released a year prior.', '2024-02-28 11:38:17'),
(10, 2, 'Led Zeppelin', 'IV', 21.78, 'item15.jpg', 'The untitled fourth studio album by the English rock band Led Zeppelin, commonly known as Led Zeppelin IV, was released on 8 November 1971 by Atlantic Records. Produced by the band''s guitarist, Jimmy Page, it was recorded between December 1970 and February 1971, mostly in the country house Headley Grange. The album contains the band''s most well-known recording, the eight-minute-long "Stairway to Heaven".', '2024-06-12 15:58:31'),
-- cds
(11, 3, 'Blondie', 'Greatest Hits', 17.56, 'item31.jpg', 'Greatest Hits is a compilation album of recordings by the band Blondie released by EMI/Capitol Records in 2002. Following the re-issue of the six original studio albums in 2001, this was the first Blondie "Best of" compilation to be digitally remastered, the first Blondie "Best of" to be officially sanctioned by the band for over 20 years, and also the first to include their comeback hit "Maria", a UK #1 in February 1999.', '2024-09-01 14:46:00'),
(12, 3, 'Sex Pistols', 'Never Mind The Bollocks Here''s The Sex Pistols', 19.86, 'item36.jpg', 'Never Mind the Bollocks, Here''s the Sex Pistols is the only studio album by English punk rock band the Sex Pistols, released on 28 October 1977 through Virgin Records in the UK and on 11 November 1977 through Warner Bros. Records in the US. As a result of the Sex Pistols'' volatile internal relationships, the band''s lineup saw changes during the recording of the album.', '2024-04-30 10:09:47'),
(13, 3, 'Bon Jovi', 'These Days', 20.59, 'item34.jpg', 'These Days (stylized as (these Days)) is the sixth studio album by American rock band Bon Jovi, released on June 27, 1995, by Mercury Records. This was the first album Bon Jovi released after the dismissal of original bass guitarist Alec John Such, and their first album to be recorded officially as four-piece band (without an official bassist, but featured Hugh McDonald as a session/touring member on bass guitar). The album, produced by Peter Collins, Jon Bon Jovi and Richie Sambora, is praised by many critics and fans as their best album. These Days is overall a darker album in contrast to the band''s usual brand of feel-good, inspiring rock songs and love ballads.', '2023-11-28 16:02:34'),
(14, 3, 'Dead Can Dance', 'Dead Can Dance', 16.00, 'item29.jpg', 'The uncompromising eponymous debut, Dead Can Dance (1984), harnessed a bewitching barrage of sounds (including the distinct sound of the yangqin) with the then five-piece interchanging instruments to leave the vocals of Lisa Gerrard and Brendan Perry as the only constant. The albums cover was important as an introduction too, a Papua New Guinean mask that some believe when worn, a life force can be put into the inanimate wood - the dead can dance.', '2024-06-24 12:23:53'),
(15, 3, 'The Rolling Stones', 'Stripped', 15.37, 'item25.jpg', 'Stripped is a live album by the English rock band The Rolling Stones released in November 1995 after the Voodoo Lounge Tour. It contains six live tracks and eight studio recordings. The live tracks were taken from four 1995 performances, at three small venues, and include a cover of Bob Dylan''s "Like a Rolling Stone", which was the first single from the album. The remaining eight tracks were acoustic studio re-recordings of songs from the Stones'' previous catalogue, the exception being a cover of Willie Dixon''s "Little Baby". The studio performances were recorded "live," i.e., without overdubs.', '2023-10-30 09:32:40');

-- password za Test User e TestUser123
-- password za Allan Sherwood e AllanS123
INSERT INTO customers (customerID, emailAddress, password, firstName, lastName, shipAddressID, billingAddressID) VALUES
(1, 'allan.sherwood@yahoo.com', 'a0c90835bea36c448c50515a6fba912d1af8bbdb', 'Allan', 'Sherwood', 1, 2),
(2, 'barryz@gmail.com', '3f563468d42a448cb1e56924529f6e7bbe529cc7', 'Barry', 'Zimmer', 3, 4),
(3, 'christineb@solarone.com', 'ed19f5c0833094026a2f1e9e6f08a35d26037066', 'Christine', 'Brown', 5, 6),
(4, 'testuser@server.com', '9c20b7791d3070bbdbc2e1c3dda7abf633923bf4', 'Test', 'User', 7, 8);

INSERT INTO addresses (addressID, customerID, line1, line2, city, state, zipCode, phone, disabled) VALUES
(1, 1, '100 East Ridgewood Ave.', '', 'Paramus', 'NJ', '07652', '201-653-4472', 0),
(2, 1, '21 Rosewood Rd.', '', 'Woodcliff Lake', 'NJ', '07677', '201-653-4472', 0),
(3, 2, '16285 Wendell St.', '', 'Omaha', 'NE', '68135', '402-896-2576', 0),
(4, 2, '16285 Wendell St.', '', 'Omaha', 'NE', '68135', '402-896-2576', 0),
(5, 3, '19270 NW Cornell Rd.', '', 'Beaverton', 'OR', '97006', '503-654-1291', 0),
(6, 3, '19270 NW Cornell Rd.', '', 'Beaverton', 'OR', '97006', '503-654-1291', 0),
(7, 4, '2836 Folsom St.', '', 'San Francisco', 'CA', '94016', '503-654-1291', 0),
(8, 4, '2836 Folsom St', '', 'San Francisco', 'CA', '94016', '503-654-1291', 0);

INSERT INTO orders (orderID, customerID, orderDate, shipAmount, taxAmount, shipDate, shipAddressID, cardType, cardNumber, cardExpires, billingAddressID) VALUES
(1, 1, '2010-05-30 09:40:28', '5.00', '32.32', '2010-06-01 09:43:13', 1, 2, '4111111111111111', '04/2015', 2),
(2, 2, '2010-06-01 11:23:20', '5.00', '0.00', NULL, 3, 2, '4111111111111111', '08/2014', 4),
(3, 1, '2010-06-03 09:44:58', '10.00', '89.92', NULL, 1, 2, '4111111111111111', '04/2014', 2);

INSERT INTO orderItems (itemID, orderID, productID, itemPrice, quantity) VALUES
(1, 1, 2, '399.00', 1),
(2, 2, 4, '699.00', 1),
(3, 3, 3, '499.00', 1),
(4, 3, 6, '549.99', 1);


--password za admin user e AdminUser123
INSERT INTO administrators (adminID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@musicshop.com', '67a392b7987e973fd2374fb451f7cb8f0e75bc7b', 'Admin', 'User'),
(2, 'joel@murach.com', '971e95957d3b74d70d79c20c94e9cd91b85f7aae', 'Joel', 'Murach'),
(3, 'mike@murach.com', '3f2975c819cefc686282456aeae3a137bf896ee8', 'Mike', 'Murach');

