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
INSERT INTO `diets` VALUES (3,1,'2014-11-28 00:35:51'),(4,1,'2014-11-29 22:36:11'),(1,1,'2014-11-29 22:42:29'),(3,2,'2014-12-01 21:55:32'),(21,1,'2014-12-02 22:30:41'),(3,1,'2014-12-02 22:32:49'),(1,1,'2014-12-03 08:26:41'),(5,2,'2014-12-03 08:26:53'),(22,1,'2014-12-03 08:29:29'),(1,1,'2014-12-04 08:46:59'),(5,2,'2014-12-04 08:47:07'),(22,1,'2014-12-04 08:47:15'),(23,1,'2014-12-05 08:06:44'),(1,1,'2014-12-05 09:12:08'),(5,1,'2014-12-05 09:12:22'),(5,1,'2014-12-05 09:12:36'),(22,1,'2014-12-05 09:12:45'),(24,1,'2014-12-05 22:02:23'),(24,3,'2014-12-06 21:21:41'),(5,2,'2014-12-07 11:13:19'),(22,1,'2014-12-07 11:13:27'),(5,1,'2014-12-07 11:13:36'),(3,2,'2014-12-07 15:07:44'),(1,1,'2014-12-07 15:08:03'),(3,1,'2014-12-07 15:08:28'),(4,1,'2014-12-07 21:37:31'),(5,2,'2014-12-08 09:05:38'),(22,1,'2014-12-08 09:05:50'),(1,1,'2014-12-08 09:06:05'),(5,1,'2014-12-08 09:14:54'),(5,2,'2014-12-09 09:55:03'),(1,1,'2014-12-09 09:55:11'),(22,1,'2014-12-09 09:55:14'),(23,1,'2014-12-09 13:07:06'),(26,1,'2014-12-10 08:48:40'),(5,2,'2014-12-10 08:51:14'),(22,1,'2014-12-10 08:51:32'),(1,1,'2014-12-10 08:51:41'),(5,2,'2014-12-11 08:44:22'),(1,1,'2014-12-11 08:44:35'),(22,1,'2014-12-11 08:44:44'),(26,1,'2014-12-11 08:44:55'),(3,2,'2014-12-11 21:54:33'),(27,1,'2014-12-12 07:44:10'),(5,2,'2014-12-12 07:44:29'),(1,1,'2014-12-12 07:44:39'),(22,1,'2014-12-12 07:44:47'),(26,1,'2014-12-12 07:44:56'),(2,1,'2014-12-12 21:55:46'),(3,2,'2014-12-12 21:55:57'),(28,1,'2014-12-13 09:04:45'),(29,1,'2014-12-13 09:14:49'),(28,1,'2014-12-13 09:15:30'),(22,1,'2014-12-13 22:37:09'),(5,2,'2014-12-14 12:01:53'),(22,1,'2014-12-14 12:02:06'),(1,1,'2014-12-14 12:02:27'),(27,1,'2014-12-14 12:02:41'),(30,1,'2014-12-14 21:11:16'),(3,2,'2014-12-14 21:11:30'),(5,2,'2014-12-15 07:34:46'),(2,2,'2014-12-15 07:35:01'),(30,1,'2014-12-15 07:35:12'),(29,1,'2014-12-15 07:35:28'),(27,2,'2014-12-15 07:35:51'),(31,1,'2014-12-15 08:13:39'),(31,1,'2014-12-15 22:07:02'),(31,3,'2014-12-16 23:40:59'),(5,2,'2014-12-17 08:37:40'),(1,1,'2014-12-17 08:37:55'),(27,2,'2014-12-17 08:38:07'),(29,1,'2014-12-17 08:38:20'),(32,1,'2014-12-17 08:40:11'),(1,1,'2014-12-18 22:00:23'),(33,1,'2014-12-18 22:30:19'),(5,2,'2014-12-19 23:22:45'),(1,1,'2014-12-19 23:22:50'),(22,1,'2014-12-19 23:22:55'),(31,2,'2014-12-19 23:47:53'),(27,2,'2014-12-19 23:48:12'),(29,1,'2014-12-19 23:48:24'),(32,1,'2014-12-20 09:15:27'),(27,2,'2014-12-20 09:15:32'),(5,2,'2014-12-20 09:15:39'),(1,2,'2014-12-20 09:15:45'),(29,1,'2014-12-20 09:15:51'),(36,1,'2014-12-21 13:37:22'),(5,2,'2014-12-22 08:41:45'),(22,1,'2014-12-22 08:41:58'),(27,3,'2014-12-22 08:42:07'),(37,1,'2014-12-22 08:44:40'),(38,1,'2014-12-22 08:46:10'),(36,1,'2014-12-22 08:46:32'),(5,2,'2014-12-24 08:24:16'),(1,1,'2014-12-24 08:24:23'),(37,1,'2014-12-24 08:24:37'),(32,1,'2014-12-24 08:24:46'),(39,1,'2014-12-24 20:31:05'),(28,2,'2014-12-25 08:51:04'),(32,1,'2014-12-25 08:51:21'),(39,1,'2014-12-25 08:51:35'),(27,2,'2014-12-25 08:51:47'),(37,1,'2014-12-25 08:52:00'),(30,1,'2014-12-25 08:52:19'),(38,1,'2014-12-25 08:52:33'),(39,2,'2014-12-26 13:55:47'),(24,1,'2014-12-26 15:46:41'),(40,1,'2014-12-27 13:24:00'),(40,1,'2014-12-27 13:24:37'),(40,22,'2014-12-27 13:28:32'),(24,1,'2014-12-27 18:18:12'),(36,1,'2014-12-28 10:05:06'),(27,2,'2014-12-28 10:05:17'),(28,2,'2014-12-28 10:05:34'),(38,1,'2014-12-28 10:05:44'),(32,1,'2014-12-28 10:05:54'),(37,1,'2014-12-28 10:06:18'),(24,1,'2014-12-28 15:24:48'),(41,1,'2014-12-28 15:55:45'),(39,1,'2014-12-28 22:50:33'),(5,2,'2014-12-29 19:51:47'),(41,1,'2014-12-29 19:51:59'),(27,1,'2014-12-29 19:52:07'),(32,1,'2014-12-29 19:52:19'),(37,1,'2014-12-29 19:52:39'),(5,2,'2014-12-30 08:58:48'),(37,1,'2014-12-30 08:59:11'),(38,1,'2014-12-30 08:59:17'),(41,1,'2014-12-30 09:00:56'),(5,2,'2014-12-31 09:12:04'),(27,2,'2014-12-31 09:12:17'),(30,1,'2014-12-31 09:12:27'),(37,1,'2014-12-31 09:12:41'),(32,1,'2014-12-31 09:12:50'),(41,1,'2014-12-31 09:13:00'),(38,1,'2014-12-31 09:13:15'),(5,2,'2015-01-05 13:12:01'),(27,3,'2015-01-05 13:12:06'),(37,1,'2015-01-05 13:12:15'),(38,1,'2015-01-05 13:12:26'),(30,1,'2015-01-05 13:12:33'),(32,1,'2015-01-05 13:12:42'),(39,2,'2015-01-05 13:13:02'),(5,2,'2015-01-06 09:13:03'),(32,1,'2015-01-06 09:13:09'),(27,2,'2015-01-06 09:13:17'),(38,1,'2015-01-06 09:13:25'),(1,1,'2015-01-06 09:13:35'),(5,1,'2015-01-07 09:01:11'),(5,1,'2015-01-07 09:01:16'),(27,2,'2015-01-07 09:01:24'),(1,1,'2015-01-07 09:01:30'),(32,2,'2015-01-07 09:01:38'),(37,1,'2015-01-07 09:01:46'),(38,1,'2015-01-07 09:01:58'),(30,1,'2015-01-07 09:02:24'),(5,2,'2015-01-08 07:09:54'),(32,1,'2015-01-08 07:10:05'),(1,1,'2015-01-08 07:10:37'),(37,1,'2015-01-08 07:10:50'),(27,1,'2015-01-08 07:11:01'),(38,1,'2015-01-08 07:11:16'),(42,1,'2015-01-08 07:12:46'),(30,1,'2015-01-08 07:31:56'),(5,2,'2015-01-09 08:05:40'),(27,2,'2015-01-09 08:05:45'),(1,1,'2015-01-09 08:05:48'),(30,1,'2015-01-09 08:05:53'),(32,1,'2015-01-09 08:05:57'),(38,1,'2015-01-09 08:06:03'),(5,2,'2015-01-10 10:19:40'),(32,1,'2015-01-10 10:19:43'),(38,1,'2015-01-10 10:19:47'),(27,4,'2015-01-10 10:19:52'),(43,1,'2015-01-10 10:21:25'),(5,2,'2015-01-11 15:07:56'),(27,2,'2015-01-11 15:08:01'),(29,1,'2015-01-11 15:08:15'),(32,1,'2015-01-11 15:08:23'),(38,1,'2015-01-11 15:08:28'),(1,1,'2015-01-11 15:08:34'),(44,1,'2015-01-11 16:18:51'),(5,2,'2015-01-12 08:59:33'),(32,2,'2015-01-12 08:59:37'),(27,3,'2015-01-12 08:59:41'),(29,1,'2015-01-12 08:59:51'),(30,1,'2015-01-12 09:00:00'),(5,2,'2015-01-15 10:24:23'),(27,2,'2015-01-15 10:24:26'),(36,1,'2015-01-15 10:24:34'),(26,1,'2015-01-15 10:25:03'),(32,1,'2015-01-15 10:26:21'),(38,1,'2015-01-15 10:26:27'),(30,1,'2015-01-15 10:33:38'),(31,1,'2015-01-15 10:38:25'),(5,2,'2015-01-16 08:57:36'),(27,2,'2015-01-16 08:57:54'),(36,1,'2015-01-16 08:58:08'),(32,1,'2015-01-16 08:58:19'),(38,1,'2015-01-16 08:58:33'),(29,1,'2015-01-16 08:58:47'),(30,1,'2015-01-16 08:59:25'),(31,1,'2015-01-16 08:59:37'),(45,1,'2015-01-16 23:15:50'),(1,1,'2015-01-17 10:11:47'),(30,1,'2015-01-17 10:11:51'),(46,1,'2015-01-17 10:13:43'),(5,2,'2015-01-18 10:45:00'),(27,2,'2015-01-18 10:45:05'),(1,1,'2015-01-18 10:45:08'),(32,1,'2015-01-18 10:45:14'),(30,1,'2015-01-18 10:45:20'),(29,1,'2015-01-18 10:45:25'),(38,1,'2015-01-18 10:45:35'),(31,1,'2015-01-18 10:46:52'),(47,1,'2015-01-18 10:47:45'),(5,2,'2015-01-19 09:25:52'),(38,1,'2015-01-19 09:25:59'),(1,1,'2015-01-19 09:26:05'),(48,1,'2015-01-20 07:59:25'),(49,1,'2015-01-20 08:02:48'),(5,2,'2015-01-20 08:02:58'),(27,2,'2015-01-20 08:03:09'),(38,1,'2015-01-20 08:03:17'),(30,1,'2015-01-20 08:03:28'),(29,1,'2015-01-20 08:03:38'),(31,1,'2015-01-20 08:03:47'),(32,1,'2015-01-21 07:47:22'),(38,1,'2015-01-21 07:47:27'),(30,1,'2015-01-21 07:47:31'),(27,2,'2015-01-21 07:47:54'),(50,1,'2015-01-21 07:48:31'),(5,2,'2015-01-21 07:50:01'),(29,1,'2015-01-21 07:54:43'),(27,2,'2015-01-23 11:04:17'),(50,1,'2015-01-23 11:04:25'),(5,2,'2015-01-23 11:04:30'),(29,1,'2015-01-23 11:04:35'),(32,1,'2015-01-23 11:04:40'),(31,1,'2015-01-23 11:04:46'),(30,1,'2015-01-23 11:04:59'),(38,1,'2015-01-23 11:05:04'),(5,2,'2015-01-24 10:47:09'),(27,2,'2015-01-24 10:47:12'),(38,1,'2015-01-24 10:47:17'),(32,1,'2015-01-24 10:47:27'),(26,1,'2015-01-24 10:47:45'),(31,1,'2015-01-24 10:47:51'),(5,2,'2015-01-25 09:43:49'),(27,2,'2015-01-25 09:43:52'),(1,1,'2015-01-25 09:43:56'),(38,1,'2015-01-25 09:44:01'),(32,1,'2015-01-25 09:44:05'),(31,1,'2015-01-25 09:44:17'),(29,1,'2015-01-25 09:44:21');
/*!40000 ALTER TABLE `diets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_book`
--

DROP TABLE IF EXISTS `en_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `state` enum('N','W','R','C') NOT NULL DEFAULT 'N',
  `category` char(20) DEFAULT NULL,
  `description` mediumtext,
  `imgPath` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_book`
--

LOCK TABLES `en_book` WRITE;
/*!40000 ALTER TABLE `en_book` DISABLE KEYS */;
INSERT INTO `en_book` VALUES (1,'NEW CONCEPT ENGLISH 1 (New Edition)','N','特色/品牌英语','朗文•外研社•新概念英语1:英语初阶(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能——理解、口语、阅读和写作——方面最大限度地发挥自己的潜能。新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学。','book1.jpg'),(2,'NEW CONCEPT ENGLISH 2 (New Edition)','N','特色/品牌英语','《朗文•外研社•新概念英语2:实践与进步(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能--理解、口语、阅读和写作--方面最大限度地发挥自己的潜能。 新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学','book2.jpg'),(3,'NEW CONCEPT ENGLISH 3 (New Edition)','N','特色/品牌英语','《朗文•外研社•新概念英语3:培养技能(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能--理解、口语、阅读和写作--方面最大限度地发挥自己的潜能。 新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学','book3.jpg'),(4,'NEW CONCEPT ENGLISH 4 (New Edition)','N','特色/品牌英语','作为一套世界闻名的英语教程，《新概念英语》以其全新的教学理念，有趣的课文内容和全面的技能训练，深受广大英语学习者的欢迎和喜爱。进入中国以后，《新概念英语》历经了数次重印，而为了最大限度地满足不同层次、不同类型英语学习者的需求，与本教程相配套的系列辅导用书和音像产品也是林林总总，不一而足。','book4.jpg'),(5,'英语初级听力教师用书','N','Listen To This','《英语初级听力教师用书》整套教程共分为三册。第一册适合大学一年级学生或英语初学者使用；第二册的对象是大学二年级学生和有中等英语水平的自学者；第三册可供大学三、四年级学生和有较高英语水平的自学者使用。每册均含《学生用书》（Student\'s Book）和《教师用书》（Teacher\'s Book）,功用不同，相辅相成。《学生用书》以录音材料中的生词表、文化背景注释和配套的练习为主。《教师用书》则包含录音的书面材料、练习答案和相关文化背景知识的补充读物。','book5.jpg'),(6,'英语中级听力教师用书','N','Listen To This','整套教程共分为三册。第一册适合大学一年级学生或英语初学者使用；第二册的对象是大学二年级学生和有中等英语水平的自学者；第三册可供大学三、四年级学生和有较高英语水平的自学者使用。每册均含《学生用书》（Student\'s Book）和《教师用书》（Teacher\'s Book）,功用不同，相辅相成。《学生用书》以录音材料中的生词表、文化背景注释和配套的练习为主。《教师用书》则包含录音的书面材料、练习答案和相关文化背景知识的补充读物。','book6.jpg');
/*!40000 ALTER TABLE `en_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_lesson`
--

DROP TABLE IF EXISTS `en_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_lesson` (
  `les_id` int(11) NOT NULL DEFAULT '0',
  `les_num` int(11) NOT NULL,
  `les_name` char(100) NOT NULL,
  `les_unit` char(50) DEFAULT NULL,
  `les_score` int(11) DEFAULT NULL,
  `les_bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_lesson`
--

LOCK TABLES `en_lesson` WRITE;
/*!40000 ALTER TABLE `en_lesson` DISABLE KEYS */;
INSERT INTO `en_lesson` VALUES (1,1,'A private conversation','1',NULL,2),(2,2,'Breakfast or lunch?','1',NULL,2),(3,3,'Please send me a card','1',NULL,2),(4,4,'An exciting trip','1',NULL,2),(5,5,'No wrong numbers','1',NULL,2),(6,6,'Percy Buttons','1',NULL,2),(7,7,'Too late','1',NULL,2),(8,8,'The best and the worst','1',NULL,2),(9,9,'A cold welcome','1',NULL,2),(10,10,'Not for jazz','1',NULL,2),(11,11,'One good turn deserves another','1',NULL,2),(12,12,'Goodbye and good luck','1',NULL,2),(13,13,'The Greenwood Boys','1',NULL,2),(14,14,'Do you speak English?','1',NULL,2),(15,15,'Good news','1',NULL,2),(16,16,'A polite request','1',NULL,2),(17,17,'Always young','1',NULL,2),(18,18,'He often does this!','1',NULL,2),(19,19,'Sold out','1',NULL,2),(20,20,'One man in a boat','1',NULL,2),(21,21,'Mad or','1',NULL,2),(22,22,'A glass envelope','1',NULL,2),(23,23,'A new house','1',NULL,2),(24,24,'If could be worse','1',NULL,2),(25,25,'Do the English speak English?','2',5,2),(26,26,'The best art critics','2',NULL,2),(27,27,'A wet night','2',NULL,2),(28,28,'No parking','2',NULL,2),(29,29,'Taxi!','2',NULL,2),(30,30,'Football or polo?','2',NULL,2),(31,31,'Success story','2',NULL,2),(32,32,'Shopping made easy','2',NULL,2),(33,33,'Out of the darkness','2',NULL,2),(34,34,'Quick work','2',NULL,2),(35,35,'Stop thief!','2',NULL,2),(36,36,'Across the Channel','2',NULL,2),(37,37,'The Olympic Games','2',NULL,2),(38,38,'Everything except the weather','2',NULL,2),(39,39,'Am I all right?','2',NULL,2),(40,40,'Food and talk','2',NULL,2),(41,41,'Do you call that a hat?','2',NULL,2),(42,42,'Not very musical','2',NULL,2),(43,43,'Over the South Pole','2',NULL,2),(44,44,'Through the forest','2',NULL,2),(45,45,'A clear conscience','2',NULL,2),(46,46,'Expensive and uncomfortable','2',NULL,2),(47,47,'A thirsty ghost','2',NULL,2),(48,48,'Did you want to tell me something?','2',NULL,2),(49,49,'The end of a dream','3',NULL,2),(50,50,'Taken for a ride','3',NULL,2),(51,51,'Reward for virtue','3',NULL,2),(52,52,'A pretty carpet','3',NULL,2),(53,53,'Hot snake','3',NULL,2),(54,54,'Sticky fingers','3',NULL,2),(55,55,'Not a gold mine','3',NULL,2),(56,56,'Faster than sound!','3',NULL,2),(57,57,'Can I help you, madam?','3',4,2),(58,58,'A blessing in disguise?','3',NULL,2),(59,59,'In or out?','3',NULL,2),(60,60,'The future','3',NULL,2),(61,61,'Trouble with the Hubble','3',NULL,2),(62,62,'After the fire','3',NULL,2),(63,63,'She was not amused','3',NULL,2),(64,64,'The Channel Tunnel','3',NULL,2),(65,65,'Jumbo versus the police','3',NULL,2),(66,66,'Sweet as honey!','3',NULL,2),(67,67,'Volcanoes','3',NULL,2),(68,68,'Persistent','3',NULL,2),(69,69,'But not murder!','3',NULL,2),(70,70,'Red for danger','3',NULL,2),(71,71,'A famous clock','3',NULL,2),(72,72,'A car called bluebird','3',NULL,2),(73,73,'The record-holder','4',NULL,2),(74,74,'Out of the limelight','4',NULL,2),(75,75,'SOS','4',NULL,2),(76,76,'April Fools\' Day','4',NULL,2),(77,77,'A successful operation','4',NULL,2),(78,78,'The last one?','4',NULL,2),(79,79,'By air','4',NULL,2),(80,80,'The Crystal Palace','4',NULL,2),(81,81,'Escape','4',NULL,2),(82,82,'Monster or fish?','4',NULL,2),(83,83,'After the elections','4',NULL,2),(84,84,'On strike','4',NULL,2),(85,85,'Never too old to learn','4',NULL,2),(86,86,'Out of control','4',NULL,2),(87,87,'A perfect alibi','4',NULL,2),(88,88,'Trapped in a mine','4',NULL,2),(89,89,'A slip of the tongue','4',NULL,2),(90,90,'What\'s for supper?','4',NULL,2),(91,91,'Three men in a basket','4',NULL,2),(92,92,'Asking for trouble','4',NULL,2),(93,93,'A noble gift','4',NULL,2),(94,94,'Future champions','4',NULL,2),(95,95,'A fantasy','4',NULL,2),(96,96,'The dead return','4',NULL,2);
/*!40000 ALTER TABLE `en_lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_recordTime`
--

DROP TABLE IF EXISTS `en_recordTime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_recordTime` (
  `les_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  KEY `les_id` (`les_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_recordTime`
--

LOCK TABLES `en_recordTime` WRITE;
/*!40000 ALTER TABLE `en_recordTime` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_recordTime` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'软袋装三元特品鲜牛奶',158,2.20),(2,'软袋装光明特品鲜牛奶',150,2.00),(3,'杯装蒙牛风味酸牛奶原味',76,NULL),(4,'100克加州原野精选腰果',491,8.00),(5,'切片系列曼可顿高纤维全麦面包',22,6.90),(21,'杯装三元成长优酪乳',86,3.80),(22,'百吉福减脂芝士片',38,20.00),(23,'养乐多',69,2.20),(24,'14克德芙黑巧克力',76,5.00),(26,'一勺雄鸡标葵花油浸金枪鱼块',97,17.40),(27,'一勺雄鸡标番茄汁焗豆',36,9.90),(28,'切片义利全麦吐司面包',92,7.90),(29,'一勺小胖子特级初榨橄榄油金枪鱼',88,15.00),(30,'德青源安心生态鲜鸡蛋',79,1.30),(31,'150克三元茯苓酸奶',140,2.50),(32,'百吉福全脂芝士片',46,1.80),(33,'450克伊利无蔗糖风味发酵乳',234,10.00),(36,'200ml羊奶',116,4.00),(37,'小胖子矿泉水浸金枪鱼罐头',31,20.00),(38,'23克舒华特蓝莓果酱',53,29.60),(39,'100克三元脱脂风味酸牛奶',58,3.00),(40,'湾仔码头虾仁三鲜手工水饺',42,36.00),(41,'200ml三元高钙奶',62,2.50),(42,'一勺鹰嘴豆',33,1.00),(43,'200ml蒙牛纯牛奶',129,1.50),(44,'三元纸屋风味酸乳',417,5.50),(45,'雀巢咖啡丝滑拿铁',160,5.50),(46,'60克桃李黄金起酥面包',214,4.60),(47,'100克台湾特色香肠',280,15.00),(48,'190ml蒙牛儿童成长牛奶',150,3.50),(49,'三元减脂芝士片',46,2.00),(50,'200ml三元纯牛奶',125,1.50);
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
INSERT INTO `notes` VALUES ('2014-12-14 00:36:57','[TODO] [JavaScript] tool, for example validation',7),('2014-12-27 08:57:13','加入BMI数值',NULL),('2014-12-28 20:12:43','[TODO][healthy] 饮食热量记录功能合并“类型”选项.',7),('2014-12-28 20:13:05','[TODO] 英语/复习五百句，只显示中/英文，或乱序显示.',7),('2014-12-28 20:18:07','[TODO][healthy] 把当天吃了的食物列表换成table样式.',7),('2014-12-31 22:25:36','注册/登录功能。',7),('2015-01-06 22:32:17','[TODO] 单元测试',7),('2015-01-11 23:13:14','[TODO] 目录信息存入数据库.',7);
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
  `nickname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `height` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'13581999594','4297f44b13955235245b2497399d7a93','2014-12-21 15:16:24','海贼之王',190),(12,'13581999595','4297f44b13955235245b2497399d7a93','2014-12-27 16:38:04','我是田野',222);
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weight`
--

LOCK TABLES `weight` WRITE;
/*!40000 ALTER TABLE `weight` DISABLE KEYS */;
INSERT INTO `weight` VALUES (1,100.50,'kilograms','2014-11-21 08:56:29',7),(2,102.00,'kilograms','2014-11-23 08:56:29',7),(3,101.22,'kilograms','2014-11-22 08:56:29',7),(4,102.00,'kilograms','2014-11-24 18:35:35',7),(5,101.50,'kilograms','2014-11-25 08:50:22',7),(6,101.00,'kilograms','2014-11-26 09:46:33',7),(7,101.00,'kilograms','2014-11-27 09:56:08',7),(8,99.00,'kilograms','2014-11-28 09:35:05',7),(9,100.00,'kilograms','2014-11-29 10:08:41',7),(10,100.50,'kilograms','2014-11-30 10:09:52',7),(11,100.00,'kilograms','2014-12-01 13:26:04',7),(12,100.00,'kilograms','2014-12-02 20:45:51',7),(13,101.00,'kilograms','2014-12-03 08:32:08',7),(14,100.00,'kilograms','2014-12-03 09:06:39',7),(15,99.00,'kilograms','2014-12-04 09:09:13',7),(16,100.00,'kilograms','2014-12-05 09:22:01',7),(17,102.00,'kilograms','2014-12-06 09:42:11',7),(18,101.00,'kilograms','2014-12-07 11:13:03',7),(19,101.00,'kilograms','2014-12-08 09:14:30',7),(20,101.00,'kilograms','2014-12-08 20:08:02',7),(21,102.00,'kilograms','2014-12-08 20:08:17',7),(22,101.00,'kilograms','2014-12-08 20:14:17',7),(23,102.00,'kilograms','2014-12-09 11:56:05',7),(24,103.00,'kilograms','2014-12-09 12:45:57',7),(25,102.00,'kilograms','2014-12-09 12:48:11',7),(26,103.00,'kilograms','2014-12-09 12:48:38',7),(27,102.00,'kilograms','2014-12-10 09:05:27',7),(28,102.00,'kilograms','2014-12-11 08:44:07',7),(29,99.00,'kilograms','2014-12-12 08:49:26',7),(30,105.00,'kilograms','2014-12-13 22:36:49',7),(31,102.00,'kilograms','2014-12-14 12:01:44',7),(32,102.00,'kilograms','2014-12-15 08:44:37',7),(33,100.00,'kilograms','2014-12-16 22:08:13',7),(34,101.00,'kilograms','2014-12-17 08:37:29',7),(35,101.00,'kilograms','2014-12-18 09:31:07',7),(36,103.00,'kilograms','2014-12-19 23:47:57',7),(37,101.00,'kilograms','2014-12-20 09:27:14',7),(38,103.00,'kilograms','2014-12-21 00:26:21',7),(39,102.00,'kilograms','2014-12-21 09:47:11',7),(40,102.00,'kilograms','2014-12-22 09:13:13',7),(41,102.00,'kilograms','2014-12-23 08:31:29',7),(42,101.00,'kilograms','2014-12-23 22:54:23',7),(43,101.00,'kilograms','2014-12-24 08:25:54',7),(44,102.00,'kilograms','2014-12-25 08:50:51',7),(45,103.00,'kilograms','2014-12-26 15:47:39',7),(46,101.00,'kilograms','2014-12-26 22:08:12',7),(47,100.00,'kilograms','2014-12-27 08:56:05',7),(48,102.00,'kilograms','2014-12-28 09:47:19',7),(49,101.00,'kilograms','2014-12-29 19:51:23',7),(50,102.00,'kilograms','2014-12-29 19:51:32',7),(51,101.00,'kilograms','2014-12-30 09:00:08',7),(52,100.00,'kilograms','2014-12-30 22:45:55',7),(53,90.00,'kilograms','2014-12-31 09:11:22',7),(54,99.00,'kilograms','2014-12-31 09:11:35',7),(55,100.00,'kilograms','2014-12-31 09:13:49',7),(56,100.00,'kilograms','2015-01-01 09:55:06',7),(57,102.00,'kilograms','2015-01-03 09:41:32',7),(58,103.00,'kilograms','2015-01-04 09:00:42',7),(59,102.00,'kilograms','2015-01-05 13:11:56',7),(60,101.00,'kilograms','2015-01-06 09:12:54',7),(61,100.00,'kilograms','2015-01-06 21:48:52',7),(62,100.00,'kilograms','2015-01-07 09:01:05',7),(63,102.00,'kilograms','2015-01-08 07:09:44',7),(64,101.00,'kilograms','2015-01-09 08:05:36',7),(65,101.00,'kilograms','2015-01-10 10:19:36',7),(66,101.00,'kilograms','2015-01-11 15:07:53',7),(67,103.00,'kilograms','2015-01-12 08:59:28',7),(68,102.00,'kilograms','2015-01-14 08:52:02',7),(69,102.00,'kilograms','2015-01-15 10:26:12',7),(70,102.00,'kilograms','2015-01-16 08:57:27',7),(71,104.00,'kilograms','2015-01-17 10:11:40',7),(72,102.00,'kilograms','2015-01-18 10:44:46',7),(73,105.00,'kilograms','2015-01-19 09:05:13',7),(74,104.00,'kilograms','2015-01-19 09:26:17',7),(75,102.00,'kilograms','2015-01-20 07:59:31',7),(76,102.00,'kilograms','2015-01-21 07:47:08',7),(77,102.00,'kilograms','2015-01-22 08:53:31',7),(78,100.00,'kilograms','2015-01-23 11:04:12',7),(79,101.00,'kilograms','2015-01-24 08:47:03',7),(80,101.00,'kilograms','2015-01-25 09:43:46',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout`
--

LOCK TABLES `workout` WRITE;
/*!40000 ALTER TABLE `workout` DISABLE KEYS */;
INSERT INTO `workout` VALUES (1,1,637,'跑步','2014-12-07 21:37:56'),(3,1,658,'跑步','2014-12-11 21:53:47'),(4,1,634,'跑步','2014-12-14 21:11:53'),(5,1,645,'跑步','2014-12-16 22:05:51'),(6,1,635,'跑步','2014-12-21 00:26:41'),(7,1,634,'跑步','2014-12-21 17:42:45'),(8,1,634,'跑步','2014-12-23 23:48:42'),(9,1,672,'跑步','2014-12-28 22:50:53'),(10,1,636,'跑步','2014-12-30 22:45:43'),(11,1,671,'跑步','2015-01-06 21:48:32'),(12,1,634,'跑步','2015-01-08 23:14:25'),(13,1,1113,'跑步','2015-01-10 19:14:24'),(14,1,632,'跑步','2015-01-16 23:16:58'),(15,1,1243,'跑步','2015-01-17 21:08:41'),(16,1,622,'跑步','2015-01-19 21:46:28'),(17,1,1356,'跑步13KM','2015-01-24 21:17:14');
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

-- Dump completed on 2015-01-25 15:48:30
