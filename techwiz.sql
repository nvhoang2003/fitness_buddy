CREATE DATABASE IF NOT EXISTS `techwiz` ;
USE `techwiz`;

CREATE TABLE IF NOT EXISTS `color` (
  `colorID` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) NOT NULL,
  PRIMARY KEY (`colorID`)
) ;

CREATE TABLE IF NOT EXISTS `size` (
  `sizeID` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`sizeID`)
);

CREATE TABLE IF NOT EXISTS `style` (
  `styleID` int(11) NOT NULL AUTO_INCREMENT,
  `style_name` varchar(255) NOT NULL,
   `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`styleID`)
);

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` char(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `launch_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `SID` int(11) DEFAULT NULL,
  `sizeID` int(11) DEFAULT NULL,
  `ColorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `product_style__fk` (`SID`),
  KEY `product_size__fk` (`sizeID`),
  KEY `product_color__fk` (`ColorID`),
  CONSTRAINT `product_color__fk` FOREIGN KEY (`ColorID`) REFERENCES `color` (`colorID`),
  CONSTRAINT `product_size__fk` FOREIGN KEY (`sizeID`) REFERENCES `size` (`sizeID`),
  CONSTRAINT `product_style__fk` FOREIGN KEY (`SID`) REFERENCES `style` (`styleID`)
);

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` INT(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`customerID`)
);


CREATE TABLE IF NOT EXISTS `admin` (
  `username` VARCHAR(255) NOT NULL ,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ;

CREATE TABLE IF NOT EXISTS `address` (
  `AddressID` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`AddressID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`)
) ;

CREATE TABLE IF NOT EXISTS `feed_back` (
  `feed_backID` int(11) NOT NULL AUTO_INCREMENT,
  `date_feedback` varchar(18) NOT NULL,
  `Noi_dung` varchar(18) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`feed_backID`),
  KEY `productID` (`productID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `feed_back_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  CONSTRAINT `feed_back_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`)
);


CREATE TABLE IF NOT EXISTS `order_product` (
  `OrderId` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`OrderId`),
  KEY `productID` (`productID`),
  CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`)
);

CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  KEY `Order_customer__fk` (`CustomerId`),
  KEY `order_order_product__fk` (`OrderId`),
  CONSTRAINT `Order_customer__fk` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`customerID`),
  CONSTRAINT `order_order_product__fk` FOREIGN KEY (`OrderId`) REFERENCES `order_product` (`OrderId`)
);

INSERT INTO `color` (ColorID, color_name) VALUES 
	(1, 'dark'),
	(2, 'yellow'),
	(3, 'red'),
	(4, 'light gray'),
	(5, 'purple'),
	(6, 'brown'),
	(7, 'pink'),
	(8, 'gray'),
	(9, 'green'),
	(10, 'blue'),
	(11, 'dark gray')
	
INSERT INTO `size` (`sizeID`, `size_name`) VALUES
	(1, 'S'),
	(2, 'M'),
	(3, 'L'),
	(4, 'XL')
 
INSERT INTO `style` (`styleID`, `style_name`,`image`, `description`) VALUES 
	(1, 'spring','springfashion.jpg', 'This style will give you t-shirts or long-sleeved shirts or pants' ),
	(2, 'summer','summerfashion.jpg','This style will give you an outfit with shorts and a blazer')
	


INSERT INTO `product` (`productID`, `product_name`, `product_status`, `price`, `launch_date`, `image`, `brand`, `material`, `SID`, `sizeID`, `ColorID`) VALUES
	(1, 'MD_AO_1', 'stocking', 50, '2022/08/11', 'MD_AO_1_1.jpg', 'Louis Vuitton', 'cotton',1, 3, 3 ),
	(2, 'MD_AO_2', 'outofstock',75, '2022/01/15', 'MD_AO_2_1.jpg', 'Chanel', 'kaki' ,1,2,3 )

INSERT INTO `customer` (`customerID`, `username`, `password`, `fullname`, `email`, `phonenumber`, `gender`) VALUES 
	(1, 'hoang2k3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hoang nguyen', 'hoang.nv.1970@aptechlearning.edu.vn', '0867558467', 'male')

INSERT INTO `admin` (`username`, `password`, `contact`, `email`) VALUES
	('admin01', 'cb0ef4c7be04ff1bf4cfcd104ef8df03251266ab', '0123456789', 'admin01@gmail.com')
	
INSERT INTO `address`(`AddressID`, `city`, `state`, `zip_code`, `customerID`) VALUES 
	(1, 'NewYork','North America' ,'10001', 1)