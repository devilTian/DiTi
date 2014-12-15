CREATE DATABASE  IF NOT EXISTS `diti` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `diti`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 192.168.1.103    Database: diti
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `diets`
--

DROP TABLE IF EXISTS `diets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diets` (
  `foodId` int(11) NOT NULL,
  `copies` int(10) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diets`
--

LOCK TABLES `diets` WRITE;
/*!40000 ALTER TABLE `diets` DISABLE KEYS */;
INSERT INTO `diets` VALUES (3,1,'2014-11-28 00:35:51'),(4,1,'2014-11-29 22:36:11'),(1,1,'2014-11-29 22:42:29'),(3,2,'2014-12-01 21:55:32'),(21,1,'2014-12-02 22:30:41'),(3,1,'2014-12-02 22:32:49'),(1,1,'2014-12-03 08:26:41'),(5,2,'2014-12-03 08:26:53'),(22,1,'2014-12-03 08:29:29'),(1,1,'2014-12-04 08:46:59'),(5,2,'2014-12-04 08:47:07'),(22,1,'2014-12-04 08:47:15'),(23,1,'2014-12-05 08:06:44'),(1,1,'2014-12-05 09:12:08'),(5,1,'2014-12-05 09:12:22'),(5,1,'2014-12-05 09:12:36'),(22,1,'2014-12-05 09:12:45'),(24,1,'2014-12-05 22:02:23'),(24,3,'2014-12-06 21:21:41'),(5,2,'2014-12-07 11:13:19'),(22,1,'2014-12-07 11:13:27'),(5,1,'2014-12-07 11:13:36'),(3,2,'2014-12-07 15:07:44'),(1,1,'2014-12-07 15:08:03'),(3,1,'2014-12-07 15:08:28'),(4,1,'2014-12-07 21:37:31'),(5,2,'2014-12-08 09:05:38'),(22,1,'2014-12-08 09:05:50'),(1,1,'2014-12-08 09:06:05'),(5,1,'2014-12-08 09:14:54'),(5,2,'2014-12-09 09:55:03'),(1,1,'2014-12-09 09:55:11'),(22,1,'2014-12-09 09:55:14'),(23,1,'2014-12-09 13:07:06'),(26,1,'2014-12-10 08:48:40'),(5,2,'2014-12-10 08:51:14'),(22,1,'2014-12-10 08:51:32'),(1,1,'2014-12-10 08:51:41'),(5,2,'2014-12-11 08:44:22'),(1,1,'2014-12-11 08:44:35'),(22,1,'2014-12-11 08:44:44'),(26,1,'2014-12-11 08:44:55'),(3,2,'2014-12-11 21:54:33'),(27,1,'2014-12-12 07:44:10'),(5,2,'2014-12-12 07:44:29'),(1,1,'2014-12-12 07:44:39'),(22,1,'2014-12-12 07:44:47'),(26,1,'2014-12-12 07:44:56'),(2,1,'2014-12-12 21:55:46'),(3,2,'2014-12-12 21:55:57'),(28,1,'2014-12-13 09:04:45'),(29,1,'2014-12-13 09:14:49'),(28,1,'2014-12-13 09:15:30'),(22,1,'2014-12-13 22:37:09'),(5,2,'2014-12-14 12:01:53'),(22,1,'2014-12-14 12:02:06'),(1,1,'2014-12-14 12:02:27'),(27,1,'2014-12-14 12:02:41'),(30,1,'2014-12-14 21:11:16'),(3,2,'2014-12-14 21:11:30'),(5,2,'2014-12-15 07:34:46'),(2,2,'2014-12-15 07:35:01'),(30,1,'2014-12-15 07:35:12'),(29,1,'2014-12-15 07:35:28'),(27,2,'2014-12-15 07:35:51'),(31,1,'2014-12-15 08:13:39');
/*!40000 ALTER TABLE `diets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `calorie` int(10) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'软袋装三元特品鲜牛奶',158,2.20),(2,'软袋装光明特品鲜牛奶',150,2.00),(3,'杯装蒙牛风味酸牛奶原味',76,NULL),(4,'100克加州原野精选腰果',491,8.00),(5,'切片系列曼可顿高纤维全麦面包',22,6.90),(21,'杯装三元成长优酪乳',86,3.80),(22,'百吉福减脂芝士片',38,20.00),(23,'养乐多',69,2.20),(24,'14克德芙黑巧克力',76,5.00),(26,'一勺雄鸡标葵花油浸金枪鱼块',408,17.40),(27,'一勺雄鸡标番茄汁焗豆',36,9.90),(28,'切片义利全麦吐司面包',92,7.90),(29,'一勺小胖子特级初榨橄榄油金枪鱼',88,15.00),(30,'德青源安心生态鲜鸡蛋',79,1.30),(31,'150克三元茯苓酸奶',140,2.50);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `t` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`t`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES ('2014-12-09 13:23:22','[TODO]注册/登录功能。',1),('2014-12-13 14:43:21','[TODO] 英语/复习五百句，只显示中/英文，或乱序显示。',1),('2014-12-14 00:36:57','[TODO] [JavaScript] tool, for example validation',1);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `createdTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tianye','123123','2014-12-14 01:52:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weight`
--

DROP TABLE IF EXISTS `weight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` float(5,2) DEFAULT NULL,
  `unit` char(10) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `datetime` (`datetime`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weight`
--

LOCK TABLES `weight` WRITE;
/*!40000 ALTER TABLE `weight` DISABLE KEYS */;
INSERT INTO `weight` VALUES (1,100.50,'kilograms','2014-11-21 08:56:29',1),(2,102.00,'kilograms','2014-11-23 08:56:29',1),(3,101.22,'kilograms','2014-11-22 08:56:29',1),(4,102.00,'kilograms','2014-11-24 18:35:35',1),(5,101.50,'kilograms','2014-11-25 08:50:22',1),(6,101.00,'kilograms','2014-11-26 09:46:33',1),(7,101.00,'kilograms','2014-11-27 09:56:08',1),(8,99.00,'kilograms','2014-11-28 09:35:05',1),(9,100.00,'kilograms','2014-11-29 10:08:41',1),(10,100.50,'kilograms','2014-11-30 10:09:52',1),(11,100.00,'kilograms','2014-12-01 13:26:04',1),(12,100.00,'kilograms','2014-12-02 20:45:51',1),(13,101.00,'kilograms','2014-12-03 08:32:08',1),(14,100.00,'kilograms','2014-12-03 09:06:39',1),(15,99.00,'kilograms','2014-12-04 09:09:13',1),(16,100.00,'kilograms','2014-12-05 09:22:01',1),(17,102.00,'kilograms','2014-12-06 09:42:11',1),(18,101.00,'kilograms','2014-12-07 11:13:03',1),(19,101.00,'kilograms','2014-12-08 09:14:30',1),(20,101.00,'kilograms','2014-12-08 20:08:02',1),(21,102.00,'kilograms','2014-12-08 20:08:17',1),(22,101.00,'kilograms','2014-12-08 20:14:17',1),(23,102.00,'kilograms','2014-12-09 11:56:05',1),(24,103.00,'kilograms','2014-12-09 12:45:57',1),(25,102.00,'kilograms','2014-12-09 12:48:11',1),(26,103.00,'kilograms','2014-12-09 12:48:38',1),(27,102.00,'kilograms','2014-12-10 09:05:27',1),(28,102.00,'kilograms','2014-12-11 08:44:07',1),(29,99.00,'kilograms','2014-12-12 08:49:26',1),(30,105.00,'kilograms','2014-12-13 22:36:49',1),(31,102.00,'kilograms','2014-12-14 12:01:44',1),(32,102.00,'kilograms','2014-12-15 08:44:37',1);
/*!40000 ALTER TABLE `weight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout`
--

DROP TABLE IF EXISTS `workout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `calorie` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout`
--

LOCK TABLES `workout` WRITE;
/*!40000 ALTER TABLE `workout` DISABLE KEYS */;
INSERT INTO `workout` VALUES (1,1,637,'跑步','2014-12-07 21:37:56'),(3,1,658,'跑步','2014-12-11 21:53:47'),(4,1,634,'跑步','2014-12-14 21:11:53');
/*!40000 ALTER TABLE `workout` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-15  9:00:03
