-- create and select the database
/*DROP DATABASE IF EXISTS my_guitar_shop1;
CREATE DATABASE my_guitar_shop1;
USE my_guitar_shop1;  -- MySQL command

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  productCode      VARCHAR(10)    NOT NULL   UNIQUE,
  productName      VARCHAR(255)   NOT NULL,
  listPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database
INSERT INTO categories VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums');

INSERT INTO products VALUES
(1, 1, 'strat', 'Fender Stratocaster', '699.00'),
(2, 1, 'les_paul', 'Gibson Les Paul', '1199.00'),
(3, 1, 'sg', 'Gibson SG', '2517.00'),
(4, 1, 'fg700s', 'Yamaha FG700S', '489.99'),
(5, 1, 'washburn', 'Washburn D10S', '299.00'),
(6, 1, 'rodriguez', 'Rodriguez Caballero 11', '415.00'),
(7, 2, 'precision', 'Fender Precision', '799.99'),
(8, 2, 'hofner', 'Hofner Icon', '499.99'),
(9, 3, 'ludwig', 'Ludwig 5-piece Drum Set with Cymbals', '699.99'),
(10, 3, 'tama', 'Tama 5-Piece Drum Set with Cymbals', '799.99');
*/

DROP DATABASE IF EXISTS maindb;
CREATE DATABASE maindb;
USE maindb;

CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  productName      VARCHAR(255)   NOT NULL,
  listPrice        DECIMAL(10,2)  NOT NULL,
  photoURL         VARCHAR(255),
  product_desc     VARCHAR(255)
  PRIMARY KEY (productID)
);

CREATE TABLE users (
  userID    INT(11) NOT NULL AUTO_INCREMENT,
  username  VARCHAR(20) NOT NULL,
  pass      VARCHAR(20) NOT NULL,
  email     VARCHAR(100) NOT NULL,
  slikaURL  VARCHAR(255),
  isAdmin   BIT
  PRIMARY KEY (userID)
);

CREATE TABLE userproduct (
    upID    INT(11) NOT NULL AUTO_INCREMENT,
    userID  INT(11) NOT NULL,
    productID   INT(11) NOT NULL,
    PRIMARY KEY (upID)
);

INSERT INTO categories VALUES
(1, 'Vinyl Records'),
(2, 'CDs'),
(3, 'Cassettes');

INSERT INTO products VALUES
(1, 1, 'Joy Division - Unknown Pleasures', '25.79', '', 'Description 1'),
(2, 1, 'Gorillaz - Demon Days', '31.88', '', 'Description 2'),
(3, 1, 'Eric Clapton - Slowhand', '18.24', '', 'Description 3'),
(4, 2, 'The Cranberries - No Need To Argue', '33.17', '', 'Description 4'),
(5, 2, 'Def Leppard - HYSTERIA', '22.98', '', 'Description 5'),
(6, 2, 'Bee Gees - Size Isn''t Everything', '10.66', '', 'Description 6'),
(7, 3, 'The Smiths - The Smiths', '12.49', '', 'Description 7'),
(8, 3, 'Blondie - Greatest Hits', '23.59', '', 'Description 8'),
(9, 3, 'Bon Jovi - These Days', '32.88', '', 'Description 9');