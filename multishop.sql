-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5187
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for multishop
CREATE DATABASE IF NOT EXISTS `multishop` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `multishop`;

-- Dumping structure for table multishop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.codes
CREATE TABLE IF NOT EXISTS `codes` (
  `id_code` int(3) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL DEFAULT '',
  `old_date` int(15) NOT NULL,
  `id_customer` int(3) NOT NULL,
  PRIMARY KEY (`id_code`),
  KEY `FK_id_customer_code` (`id_customer`),
  CONSTRAINT `FK_id_customer_code` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `comment` text COLLATE latin1_spanish_ci NOT NULL,
  `score` tinyint(1) NOT NULL,
  `mail` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `url` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_comment`),
  KEY `FK_id_customer_comment` (`id_customer`),
  KEY `FK_id_product_comment` (`id_product`),
  KEY `FK3_id_category_comment` (`id_category`),
  CONSTRAINT `FK3_id_category_comment` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  CONSTRAINT `FK_id_customer_comment` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  CONSTRAINT `FK_id_product_comment` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id_customer` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `surname` varchar(50) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `post_code` varchar(20) NOT NULL DEFAULT '',
  `region` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `validate` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.deliveries
CREATE TABLE IF NOT EXISTS `deliveries` (
  `id_delivery` int(5) NOT NULL AUTO_INCREMENT,
  `delivery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_customer` int(3) NOT NULL,
  `amount` double NOT NULL,
  `id_payment` int(11) DEFAULT NULL,
  `id_dispath` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_delivery`),
  KEY `FK_id_customer_delivery` (`id_customer`),
  KEY `FK_id_payment` (`id_payment`),
  KEY `FK_id_dispath` (`id_dispath`),
  KEY `FK_id_status` (`id_status`),
  CONSTRAINT `FK_id_customer_delivery` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  CONSTRAINT `FK_id_dispath` FOREIGN KEY (`id_dispath`) REFERENCES `dispatch_status` (`id_dispatch_status`),
  CONSTRAINT `FK_id_payment` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id_payment`),
  CONSTRAINT `FK_id_status` FOREIGN KEY (`id_status`) REFERENCES `delivery_status` (`id_delivery_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table multishop.delivery_details
CREATE TABLE IF NOT EXISTS `delivery_details` (
  `id_product` int(11) NOT NULL,
  `quantity` int(1) NOT NULL DEFAULT '0',
  `id_delivery` int(5) NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `FK_id_delivery` (`id_delivery`),
  CONSTRAINT `FK_id_delivery` FOREIGN KEY (`id_delivery`) REFERENCES `deliveries` (`id_delivery`) ON DELETE CASCADE,
  CONSTRAINT `FKdelivery_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.delivery_status
CREATE TABLE IF NOT EXISTS `delivery_status` (
  `id_delivery_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_delivery_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.dispatch_status
CREATE TABLE IF NOT EXISTS `dispatch_status` (
  `id_dispatch_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dispatch_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.images
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `priority` int(1) NOT NULL,
  `id_product` int(3) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `FK_id_product_image` (`id_product`),
  CONSTRAINT `FK_id_product_image` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(3) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL DEFAULT '',
  `price` double NOT NULL,
  `description` text NOT NULL,
  `id_category` int(2) NOT NULL,
  `id_subcategory` int(11) NOT NULL DEFAULT '-1',
  `start` int(1) NOT NULL DEFAULT '0',
  `quantity` smallint(6) NOT NULL DEFAULT '-1',
  `downloadable` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id_product`),
  KEY `FK_id_product_category` (`id_category`),
  CONSTRAINT `FK_id_product_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slide` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `text_footer` text COLLATE latin1_spanish_ci NOT NULL,
  `text_header` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.stock_message
CREATE TABLE IF NOT EXISTS `stock_message` (
  `id_stock_message` int(5) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `id_product` int(5) NOT NULL,
  PRIMARY KEY (`id_stock_message`),
  KEY `FK_id_stock_message_product` (`id_product`),
  CONSTRAINT `FK_id_stock_message_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.stock_switch
CREATE TABLE IF NOT EXISTS `stock_switch` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.subcategories
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id_subcategory` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategory`),
  KEY `FK_id_subcategory_category` (`id_category`),
  CONSTRAINT `FK_id_subcategory_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
-- Dumping structure for table multishop.switch
CREATE TABLE IF NOT EXISTS `switch` (
  `id_switch` int(11) NOT NULL AUTO_INCREMENT,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id_switch`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table multishop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `surname` varchar(50) DEFAULT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `rol` int(1) NOT NULL,
  `photo` text,
  `password` varchar(50) NOT NULL DEFAULT '',
  `counter` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table multishop.zip_files
CREATE TABLE IF NOT EXISTS `zip_files` (
  `id_files` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id_files`),
  KEY `FK_id_product_files` (`id_product`),
  CONSTRAINT `FK_id_product_files` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
