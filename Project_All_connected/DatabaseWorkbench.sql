-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: den1.mysql2.gear.host    Database: phpcats
-- ------------------------------------------------------
-- Server version	5.6.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateRemoved` timestamp NULL DEFAULT NULL,
  `sold` tinyint(1) NOT NULL,
  `dateSold` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cats`
--

DROP TABLE IF EXISTS `cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartId` int(11) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `vaccineA` tinyint(1) NOT NULL DEFAULT '0',
  `vaccineB` tinyint(1) NOT NULL DEFAULT '0',
  `deworming` tinyint(1) NOT NULL DEFAULT '0',
  `availabilityDate` date DEFAULT NULL,
  `adoptionDate` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `description` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_orderId_idx` (`orderId`),
  KEY `fk_cartId_idx` (`cartId`),
  CONSTRAINT `fk_cartId` FOREIGN KEY (`cartId`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cats`
--

LOCK TABLES `cats` WRITE;
/*!40000 ALTER TABLE `cats` DISABLE KEYS */;
INSERT INTO `cats` VALUES (1,NULL,2,'Kitty','2018-04-03',0,0,1,'0000-00-00','0000-00-00','female','beautiful'),(2,NULL,NULL,'Kitty2','2018-04-04',0,1,1,'0000-00-00','0000-00-00','female','nice'),(3,NULL,NULL,'Bravo','2018-04-05',1,0,0,'2018-04-30','0000-00-00','male','smart'),(4,NULL,5,'Booga','2018-04-01',0,1,0,'2018-04-30','0000-00-00','male','fast'),(5,NULL,NULL,'NewTwo','2018-04-01',0,0,0,'2018-04-30','0000-00-00','male','big'),(6,NULL,NULL,'Karry','2018-04-04',0,0,0,'2018-05-10','0000-00-00','female','strong'),(7,NULL,NULL,'Null','2018-04-19',0,0,0,'0000-00-00','0000-00-00','male','nice'),(8,NULL,NULL,'Bull','2018-04-26',0,0,0,'0000-00-00','0000-00-00','male',NULL),(9,NULL,NULL,'Sewa','2018-04-08',0,0,0,'2018-05-10','0000-00-00','male',NULL),(10,NULL,NULL,'Big','2018-04-01',1,0,0,'0000-00-00','0000-00-00','male','My favourite '),(11,NULL,NULL,'Dolly','2018-04-02',0,0,0,'0000-00-00','0000-00-00','male',NULL),(12,NULL,NULL,'Deret','2018-04-22',0,0,0,'0000-00-00','0000-00-00','male',NULL),(13,NULL,NULL,'Volvo','2018-04-07',0,0,0,'2018-06-22','0000-00-00','male',NULL),(14,NULL,NULL,'Dee','2018-04-07',0,0,0,'0000-00-00','0000-00-00','female',NULL),(15,NULL,NULL,'Dww','2018-03-08',0,0,0,'0000-00-00','0000-00-00','female',NULL),(16,NULL,NULL,'Feere','2018-04-27',0,0,0,'0000-00-00','0000-00-00','male',NULL),(20,NULL,1,'Rege','2018-04-07',1,1,1,'2018-04-20','2018-04-28','female','nice'),(21,NULL,NULL,'Duk','2018-04-06',0,0,0,'0000-00-00','0000-00-00','male',NULL),(22,NULL,NULL,'Dwaew','2018-04-05',0,0,0,'0000-00-00','0000-00-00','female',NULL),(23,NULL,NULL,'Maerekt','2018-04-04',0,1,1,'0000-00-00','0000-00-00','female',' '),(24,NULL,NULL,'Nikos','2018-03-01',1,0,1,'2018-04-29','0000-00-00','male',NULL),(25,NULL,NULL,'Supoe','2017-12-06',0,0,1,'2018-05-26','0000-00-00','female','                  '),(26,NULL,NULL,'Boomer','2018-03-02',1,1,0,'2018-05-26','0000-00-00','male',NULL),(27,NULL,NULL,'Alibaba','2016-06-14',0,0,0,'2017-12-12','0000-00-00','female','       ');
/*!40000 ALTER TABLE `cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catsimages`
--

DROP TABLE IF EXISTS `catsimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catsimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catId_idx` (`catId`),
  CONSTRAINT `fk_catId` FOREIGN KEY (`catId`) REFERENCES `cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catsimages`
--

LOCK TABLES `catsimages` WRITE;
/*!40000 ALTER TABLE `catsimages` DISABLE KEYS */;
INSERT INTO `catsimages` VALUES (7,21,'images/ForAdoption/Bailey.jpg'),(8,22,'images/ForAdoption/Fromage.jpg'),(9,10,'images/ForAdoption/JohnSnow.jpg'),(10,3,'images/ForAdoption/Bravo.jpg'),(11,4,'images/ForAdoption/Booga.jpg'),(12,5,'images/ForAdoption/NewTwo.jpg'),(13,6,'images/ForAdoption/Karry.jpg'),(14,9,'images/ForAdoption/Sewa.jpg'),(15,13,'images/ForAdoption/Volvo.jpg'),(16,20,'images/ForAdoption/Rege.jpg'),(20,26,'images/_DSC4005 (1)');
/*!40000 ALTER TABLE `catsimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `catId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userId_idx` (`userId`),
  CONSTRAINT `fk_userId_orders` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,18,'2018-04-30 22:39:17',500.00,2),(2,18,'2018-04-30 22:43:00',550.00,3),(3,17,'2018-05-01 04:12:45',0.00,3),(4,18,'2018-05-01 13:57:22',0.00,3),(5,18,'2018-05-01 15:15:09',0.00,4);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `isBreeder` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `country` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John Doe','johndoe1',0,'new','john@example.com','','','','','',NULL,'2018-04-20 04:06:44'),(2,'Alex Smith','Doe',0,'q1','john@example.com','','','','','',NULL,'2018-04-20 04:06:44'),(3,'Peter Smith','myname',0,'zx','peter@example.com','','','','','',NULL,'0000-00-00 00:00:00'),(4,'Vilq Smith','mynamea',0,'zxq','peter@example.com','','','','','',NULL,'2018-04-20 04:11:03'),(5,'Bill','b',0,'b','bill@mail.com','','','','','',NULL,'2018-04-23 03:52:33'),(6,'Alex','a',0,'a','a@mail.com','','','','','',NULL,'2018-04-23 04:06:09'),(7,'John2','john',0,'j','ttt','','','','','',NULL,'2018-04-25 05:00:23'),(12,'mars','mar',0,'k','hhh@com.com','','','','','',NULL,'2018-04-25 05:22:22'),(13,'Bill Will','as',0,'s','ee@v.com','','','','','',NULL,'2018-04-25 05:24:08'),(14,'Any','qa',0,'q','ee@dd.dd','','','','','',NULL,'2018-04-25 05:28:36'),(16,'Marc Pere','mario',1,'qq','any@mail.com','77, any str.','Montreal','Qc','h4g2a9','Afghanistan','7777778888','2018-04-26 00:50:58'),(17,'admin','admin',0,'admin',' ',' ',' ',' ',' ',' ',' ','0000-00-00 00:00:00'),(18,'sss','sss',0,'sss','sss@sss.com','sss','sss','sss','sss','Afghanistan','514-505-5055','2018-04-30 19:17:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-02 15:49:27
