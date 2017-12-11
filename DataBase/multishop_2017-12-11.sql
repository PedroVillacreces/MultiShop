# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Base de datos: multishop
# Tiempo de Generaci�n: 2017-12-11 22:04:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id_category` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id_category`, `category`)
VALUES
	(7,'Zapatos de Fiesta'),
	(8,'Ropa Deportiva'),
	(11,'Abrigos');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text COLLATE latin1_spanish_ci NOT NULL,
  `score` tinyint(1) NOT NULL,
  `url` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_comment`),
  KEY `FK_id_customer_comment` (`id_customer`),
  KEY `FK_id_product_comment` (`id_product`),
  KEY `FK3_id_category_comment` (`id_category`),
  CONSTRAINT `FK3_id_category_comment` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  CONSTRAINT `FK_id_customer_comment` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  CONSTRAINT `FK_id_product_comment` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



# Volcado de tabla customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
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
  `counter` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id_customer`, `name`, `surname`, `mail`, `address`, `post_code`, `region`, `phone`, `password`, `validate`, `counter`)
VALUES
	(42,'joti joti','jotijoti','jotijoti@gmail.com','calle del joti','28080','Madrid','666998855','bW9tbw==',1,NULL),
	(44,'pedrokjlkj','villacreceslkjklj','villacreceslkjklj','calle fuente 6lkñlklñ','1350098797','Ciudad Real,.mljk','65593585590809','WVdSdGFXND0=',1,NULL),
	(45,'pedro','villacreces','pedrovillacreces@gmail.ewdasd','calle fuente 6','13500','Ciudad Real','655935855','admin',1,NULL),
	(46,'pedro','villacreces','dsapedrovillacreces@gmail.ewdasd','calle fuente 6','13500','Ciudad Real','655935855','admin',1,NULL),
	(47,'pedro','ciudad','pedrovillacreces@gmail.xn--comlklklklklk-kkbdccc','llkñlklñk','13500','Ciudad Real','655935855','1',1,NULL),
	(48,'pedro','ciudad','pedrovillacreces@gmail.xn--comlklklklklkdasdasd-56','llkñlklñk','13500','Ciudad Real','655935855','1',1,NULL),
	(49,'pedro','ciudad','pedrovillacreces@gmail.comkljljkljl','lñklñkñlkñlkñ','13500','Ciudad Real','655935855','1',1,NULL),
	(50,'pedro','villacreces','francisca.limon.nieva.51@gmail.com','calle victori 34','13500','ciudad real','699887744','YWRtaW4=',1,NULL),
	(51,'pedro','ciudad','pedrovillacreces@gmail.com','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,0),
	(52,'pedro','ciudad','pedrovillacreces@gmail.comprueba1','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(53,'pedro','ciudad','pedrovillacreces@gmail.comprueba2','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(54,'pedro','ciudad','pedrovillacreces@gmail.comprueba3','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(55,'pedro','ciudad','pedrovillacreces@gmail.comprueba4','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(56,'pedro','ciudad','pedrovillacreces@gmail.comprueba5','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(57,'pedro','ciudad','pedrovillacreces@gmail.comprueba7','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(58,'pedro','ciudad','pedrovillacreces@gmail.comprueba8','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(59,'pedro','ciudad','pedrovillacreces@gmail.comprueba9','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(60,'pedro','ciudad','prueb9edrovillacreces@gmail.com','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(61,'pedro','ciudad','pedrovillacreces@gmail.com10','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(62,'pedro','ciudad','pedrovillacreces@gmail.com11','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(63,'pedro','ciudad','pedrovillacreces@gmail.com12','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(64,'pedro','ciudad','pedrovillacreces@gmail.comauu','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(65,'pedro','ciudad','pedrovillacreces@gmail.comdadadsasd','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(66,'pedro','ciudad','pedrovillacreces@gmail.comczxczxc','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(67,'pedro','ciudad','pedrovillacreces@gmail.com<asghfdfg','carrion 15, bajo b, bajo b, bajo b, bajo b, bajo b','13500','Ciudad Real','655935855','YWRtaW4=',0,NULL),
	(68,'','','','. . ','','','','',0,NULL);

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla deliveries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deliveries`;

CREATE TABLE `deliveries` (
  `id_delivery` int(5) NOT NULL AUTO_INCREMENT,
  `delivery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_customer` int(3) NOT NULL,
  `amount` double NOT NULL,
  `id_payment` int(11) DEFAULT NULL,
  `id_dispath` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `id_method` int(11) NOT NULL,
  PRIMARY KEY (`id_delivery`),
  KEY `FK_id_customer_delivery` (`id_customer`),
  KEY `FK_id_payment` (`id_payment`),
  KEY `FK_id_dispath` (`id_dispath`),
  KEY `FK_id_status` (`id_status`),
  KEY `FK_id_method` (`id_method`),
  CONSTRAINT `FK_id_customer_delivery` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  CONSTRAINT `FK_id_dispath` FOREIGN KEY (`id_dispath`) REFERENCES `dispatch_status` (`id_dispatch_status`),
  CONSTRAINT `FK_id_method` FOREIGN KEY (`id_method`) REFERENCES `dispatch_method` (`id_method`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_payment` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id_payment`),
  CONSTRAINT `FK_id_status` FOREIGN KEY (`id_status`) REFERENCES `delivery_status` (`id_delivery_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;

INSERT INTO `deliveries` (`id_delivery`, `delivery_date`, `id_customer`, `amount`, `id_payment`, `id_dispath`, `id_status`, `id_method`)
VALUES
	(23,'0000-00-00 00:00:00',51,80,2,2,1,3),
	(24,'0000-00-00 00:00:00',51,80,2,2,1,3),
	(25,'0000-00-00 00:00:00',51,40,2,2,1,3),
	(26,'0000-00-00 00:00:00',51,40,2,2,1,3),
	(27,'0000-00-00 00:00:00',51,40,1,2,1,3),
	(28,'0000-00-00 00:00:00',51,80,2,2,1,3),
	(29,'0000-00-00 00:00:00',51,40,2,2,1,3),
	(30,'0000-00-00 00:00:00',51,40,2,2,1,3),
	(33,'2017-12-11 18:58:12',51,40,2,2,1,3),
	(34,'2017-12-11 18:59:00',51,80,2,2,1,3),
	(35,'2017-12-11 18:59:29',51,40,2,2,1,3),
	(36,'2017-12-11 19:00:20',51,40,2,2,1,3),
	(37,'2017-12-11 19:01:13',51,40,2,2,1,3),
	(38,'2017-12-11 19:01:31',51,40,2,2,1,3),
	(39,'2017-12-11 19:01:49',51,50,2,2,1,3),
	(40,'2017-12-11 19:14:31',51,80,2,2,1,3),
	(41,'2017-12-11 19:15:05',51,160,2,2,1,3),
	(42,'2017-12-11 20:01:24',51,40,2,2,1,3),
	(43,'2017-12-11 20:23:50',51,240,2,2,1,3),
	(44,'2017-12-11 22:46:42',51,160,2,2,1,1);

/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla delivery_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_details`;

CREATE TABLE `delivery_details` (
  `id_product` int(11) NOT NULL,
  `quantity` int(1) NOT NULL DEFAULT '0',
  `id_delivery` int(5) NOT NULL,
  KEY `PK_delivery` (`id_delivery`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `delivery_details` WRITE;
/*!40000 ALTER TABLE `delivery_details` DISABLE KEYS */;

INSERT INTO `delivery_details` (`id_product`, `quantity`, `id_delivery`)
VALUES
	(9,2,23),
	(10,1,29),
	(11,1,39),
	(11,2,39),
	(9,2,40),
	(9,2,41),
	(10,2,41),
	(12,1,42),
	(9,5,43),
	(10,1,43),
	(9,2,44),
	(10,2,44);

/*!40000 ALTER TABLE `delivery_details` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla delivery_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_status`;

CREATE TABLE `delivery_status` (
  `id_delivery_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_delivery_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `delivery_status` WRITE;
/*!40000 ALTER TABLE `delivery_status` DISABLE KEYS */;

INSERT INTO `delivery_status` (`id_delivery_status`, `status`)
VALUES
	(1,'Pagado'),
	(2,'Pendiente'),
	(3,'Cancelado');

/*!40000 ALTER TABLE `delivery_status` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla dispatch_method
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dispatch_method`;

CREATE TABLE `dispatch_method` (
  `id_method` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `price_method` double(10,2) NOT NULL,
  PRIMARY KEY (`id_method`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `dispatch_method` WRITE;
/*!40000 ALTER TABLE `dispatch_method` DISABLE KEYS */;

INSERT INTO `dispatch_method` (`id_method`, `method`, `price_method`)
VALUES
	(1,'Pedido Express',9.90),
	(2,'Pedido Normal',5.90),
	(3,'Recogida Tienda',0.00);

/*!40000 ALTER TABLE `dispatch_method` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla dispatch_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dispatch_status`;

CREATE TABLE `dispatch_status` (
  `id_dispatch_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dispatch_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `dispatch_status` WRITE;
/*!40000 ALTER TABLE `dispatch_status` DISABLE KEYS */;

INSERT INTO `dispatch_status` (`id_dispatch_status`, `status`)
VALUES
	(1,'Despachado'),
	(2,'En camino'),
	(3,'Entregado');

/*!40000 ALTER TABLE `dispatch_status` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

INSERT INTO `payments` (`id_payment`, `type`)
VALUES
	(1,'Tarjeta de Crédito'),
	(2,'Transferencia Bancaria');

/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(3) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL DEFAULT '',
  `price` double NOT NULL,
  `description` text NOT NULL,
  `id_category` int(2) NOT NULL,
  `id_subcategory` int(11) NOT NULL DEFAULT '-1',
  `start` int(1) NOT NULL DEFAULT '0',
  `quantity` smallint(6) NOT NULL DEFAULT '-1',
  `downloadable` bit(1) NOT NULL DEFAULT b'0',
  `topsales` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `FK_id_product_category` (`id_category`),
  CONSTRAINT `FK_id_product_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id_product`, `product_name`, `price`, `description`, `id_category`, `id_subcategory`, `start`, `quantity`, `downloadable`, `topsales`, `picture`)
VALUES
	(9,'Chandal Real Madrid',40,'Un chandal del Madrid de niño',8,10,1,2,b'0',NULL,NULL),
	(10,'Chandal del Barcelona',40,'Un chandal del barcelona de niño',8,10,1,5,b'0',NULL,NULL),
	(11,'Chandal del Bilbao',50,'un chandal de niño del bilbao',8,10,1,5,b'0',NULL,NULL),
	(12,'Chandal Betis',40,'Chandal betis de niño',8,10,1,2,b'0',NULL,NULL),
	(13,'Chandal Valencia',40,'Un chandal del valencia de niño',8,10,1,2,b'0',NULL,'multimedia/images/products/Chandal Valencia/Captura de pantalla 2017-11-17 a las 23.53.57.png');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id_role`, `role`)
VALUES
	(6,'Administrador'),
	(7,'Editor Contenido');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id_slide` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `text_footer` text COLLATE latin1_spanish_ci NOT NULL,
  `text_header` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;

INSERT INTO `slider` (`id_slide`, `url`, `text_footer`, `text_header`)
VALUES
	(19,'multimedia/images/slide/blackfriday.jpg','Acude a nuestra tienda para obtener las mejores ofertas','Ofertas del Black Friday');

/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla stock_switch
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_switch`;

CREATE TABLE `stock_switch` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Volcado de tabla subcategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subcategories`;

CREATE TABLE `subcategories` (
  `id_subcategory` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategory`),
  KEY `FK_id_subcategory_category` (`id_category`),
  CONSTRAINT `FK_id_subcategory_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;

INSERT INTO `subcategories` (`id_subcategory`, `subcategory_name`, `id_category`)
VALUES
	(7,'Zapatos de Fiesta',7),
	(10,'Chandal NBA',8),
	(12,'Zapatos Nauticos',7),
	(13,'Zapatos Deportivos',7);

/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `surname` varchar(50) DEFAULT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `id_role` int(1) NOT NULL,
  `photo` text,
  `password` varchar(50) NOT NULL DEFAULT '',
  `counter` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_role` (`id_role`),
  CONSTRAINT `FK_id_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `surname`, `user_name`, `email`, `id_role`, `photo`, `password`, `counter`)
VALUES
	(22,'pedro','ciudad','pope','pedrovillacreces@gmail.com',6,'multimedia/images/profile/pope/IMG_20170121_135436.jpg','YWRtaW4=',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
