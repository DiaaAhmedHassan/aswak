CREATE DATABASE aswakdb;

CREATE TABLE customer(
    id int,
    email varchar(50) UNIQUE NOT NULL,
    Name varchar(50) NOT NULL,
    password varchar(20) NOT NULL,
    image varchar(20),
    
    PRIMARY KEY(id)
);

CREATE TABLE seller(
    id int,
    email varchar(50) UNIQUE NOT NULL,
    password varchar(20) NOT NULL,
    Name varchar(50) NOT NULL, 
    image varchar(30),
    
    PRIMARY KEY(id)
);

CREATE TABLE `order`(
    order_id int,
    seller_id int Not NULL,
    customer_id int NOT NULL,
    total_price float NOT NULL,
    
    PRIMARY KEY(order_id)
);

CREATE TABLE order_item(
    order_id int Not NUll,
    item_id int NOT NULL,
    
    PRIMARY KEY(order_id, item_id)
);

CREATE TABLE item(
    id int,
    Name varchar(30) NOT NULL,
    image varchar(20) NOT NULL,
    price float NOT NULL,
    seller_id int NOT NULL,
    rating float,
    category_id int NOT NULL,
    
    PRIMARY KEY(id)
);

CREATE TABLE category(
    id int,
    Name varchar(25) NOT NULL,
    image varchar(30),
    
    PRIMARY KEY(id)
);

Alter TABLE `order`
ADD FOREIGN KEY(seller_id) REFERENCES seller(id);

ALTER TABLE `order`
ADD FOREIGN KEY(customer_id) REFERENCES customer(id);

ALTER TABLE item
ADD FOREIGN KEY(category_id) REFERENCES category(id);