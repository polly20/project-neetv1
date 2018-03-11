CREATE DATABASE  IF NOT EXISTS `ambeyo_neet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ambeyo_neet`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ambeyo_neet
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `number`
--

DROP TABLE IF EXISTS `number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `number` (
  `samp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `number`
--

LOCK TABLES `number` WRITE;
/*!40000 ALTER TABLE `number` DISABLE KEYS */;
INSERT INTO `number` VALUES (NULL),(NULL),('0.35299780066404285'),('0.1169272867189043'),('0.525643062336038'),('0.27743348225712167'),('0.8102382550111397'),('0.21889085901797828');
/*!40000 ALTER TABLE `number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('kingpauloaquino@gmail.com','$2y$10$s/722POkVSMaBaZCwLnao.QPn1S16A4qcLATxK.u8DjC.TUYw/ZIW','2018-03-11 04:55:27');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_answer`
--

DROP TABLE IF EXISTS `tbl_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choices` varchar(20) DEFAULT NULL,
  `answer` text,
  `right_answer` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `unq_tbl_answer_subject_id` (`subject_id`),
  KEY `idx_tbl_answer_question_id` (`question_id`),
  CONSTRAINT `fk_tbl_answer_tbl_question` FOREIGN KEY (`question_id`) REFERENCES `tbl_question` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_answer_tbl_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_answer`
--

LOCK TABLES `tbl_answer` WRITE;
/*!40000 ALTER TABLE `tbl_answer` DISABLE KEYS */;
INSERT INTO `tbl_answer` VALUES (29,NULL,11,'0','25',1,0,'2018-01-19 11:27:39','2018-01-19 11:27:39'),(30,NULL,11,'1','7',1,0,'2018-01-19 11:27:39','2018-01-19 11:27:39'),(31,NULL,11,'2','-7',1,0,'2018-01-19 11:27:39','2018-01-19 11:27:39'),(32,NULL,11,'3','-25',1,0,'2018-01-19 11:27:39','2018-01-19 11:27:39'),(33,NULL,NULL,'0','4',1,0,'2018-01-25 12:32:18','2018-01-25 12:32:18'),(34,NULL,NULL,'1','6',1,0,'2018-01-25 12:32:18','2018-01-25 12:32:18'),(35,NULL,NULL,'2','8',1,0,'2018-01-25 12:32:18','2018-01-25 12:32:18'),(36,NULL,NULL,'3','10',1,0,'2018-01-25 12:32:18','2018-01-25 12:32:18'),(37,NULL,14,'0','phagocytosis (pron: fag-eh-seh-toe-sis)',3,0,'2018-01-25 12:42:04','2018-01-25 12:42:04'),(38,NULL,14,'1','hemolysis',3,0,'2018-01-25 12:42:04','2018-01-25 12:42:04'),(39,NULL,14,'2','mechanical damage',3,0,'2018-01-25 12:42:04','2018-01-25 12:42:04'),(40,NULL,14,'3','all of the above',3,0,'2018-01-25 12:42:04','2018-01-25 12:42:04'),(41,NULL,15,'0','2',2,0,'2018-01-25 14:05:54','2018-01-25 14:05:54'),(42,NULL,15,'1','5',2,0,'2018-01-25 14:05:54','2018-01-25 14:05:54'),(43,NULL,15,'2','52',2,0,'2018-01-25 14:05:54','2018-01-25 14:05:54'),(44,NULL,15,'3','When $a \\ne 0$, there are two \\(\\theta  \\ge a\\sum {52}\\) solutions to \\(ax^2 + bx + c = 0\\) and they are\n  $$x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}.$$',2,0,'2018-03-07 13:53:02','2018-01-25 14:05:54');
/*!40000 ALTER TABLE `tbl_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `percentage` decimal(18,4) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `idx_tbl_category_subject_id` (`subject_id`),
  CONSTRAINT `fk_tbl_category_tbl_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,1,'Extremely Hard',0.1500,'1',NULL,NULL),(2,1,'Hard',0.2200,'1',NULL,NULL),(3,1,'Moderate',0.2800,'1',NULL,NULL),(4,1,'Easy',0.3500,'1',NULL,NULL),(5,2,'Extremely Hard',0.3500,'1',NULL,NULL),(6,2,'Hard',0.2800,'1',NULL,NULL),(7,2,'Moderate',0.2200,'1',NULL,NULL),(8,2,'Easy',0.1500,'1',NULL,NULL),(9,3,'Extremely Hard',0.3500,'1',NULL,NULL),(10,3,'Hard',0.1500,'1',NULL,NULL),(11,3,'Moderate',0.2200,'1',NULL,NULL),(12,3,'Easy',0.2800,'1',NULL,NULL);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_criteria`
--

DROP TABLE IF EXISTS `tbl_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_criteria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  `created` varchar(45) DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `updated` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_criteria`
--

LOCK TABLES `tbl_criteria` WRITE;
/*!40000 ALTER TABLE `tbl_criteria` DISABLE KEYS */;
INSERT INTO `tbl_criteria` VALUES (1,1,'Level 1',0.15,NULL,NULL,NULL,NULL),(3,2,'Level 2',0.22,NULL,NULL,NULL,NULL),(4,3,'Level 3',0.28,NULL,NULL,NULL,NULL),(5,4,'Level 4',0.35,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_criteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_diagram`
--

DROP TABLE IF EXISTS `tbl_diagram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_diagram` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `image_url` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_diagram`
--

LOCK TABLES `tbl_diagram` WRITE;
/*!40000 ALTER TABLE `tbl_diagram` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_diagram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_level_settings`
--

DROP TABLE IF EXISTS `tbl_level_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_level_settings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `percentage` decimal(18,4) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `idx_tbl_level_settings_subject_id` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_level_settings`
--

LOCK TABLES `tbl_level_settings` WRITE;
/*!40000 ALTER TABLE `tbl_level_settings` DISABLE KEYS */;
INSERT INTO `tbl_level_settings` VALUES (1,1,1,0.2500,NULL,1,NULL,NULL),(2,1,2,0.2500,NULL,1,NULL,NULL),(3,1,3,0.2500,NULL,1,NULL,NULL),(4,1,4,0.2500,NULL,1,NULL,NULL),(5,2,1,0.2500,NULL,1,NULL,NULL),(6,2,2,0.3500,NULL,1,NULL,NULL),(7,2,3,0.2500,NULL,1,NULL,NULL),(8,2,4,0.1500,NULL,1,NULL,NULL),(9,3,1,0.2500,NULL,1,NULL,NULL),(10,3,2,0.2500,NULL,1,NULL,NULL),(11,3,3,0.2500,NULL,1,NULL,NULL),(12,3,4,0.2500,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_level_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preset_question`
--

DROP TABLE IF EXISTS `tbl_preset_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preset_question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` tinyint(4) NOT NULL,
  `total` mediumint(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preset_question`
--

LOCK TABLES `tbl_preset_question` WRITE;
/*!40000 ALTER TABLE `tbl_preset_question` DISABLE KEYS */;
INSERT INTO `tbl_preset_question` VALUES (1,1,700),(2,2,600),(3,3,500),(4,4,400);
/*!40000 ALTER TABLE `tbl_preset_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_question`
--

DROP TABLE IF EXISTS `tbl_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `question` longtext,
  `status` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `idx_tbl_question_category_id` (`category_id`),
  KEY `idx_tbl_question_subject_id` (`subject_id`),
  CONSTRAINT `fk_tbl_question_tbl_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_question_tbl_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_question`
--

LOCK TABLES `tbl_question` WRITE;
/*!40000 ALTER TABLE `tbl_question` DISABLE KEYS */;
INSERT INTO `tbl_question` VALUES (11,3,1,'2+5',0,'2018-01-19 11:26:58','2018-01-19 11:26:58'),(12,1,1,'The adult human of average age and size has approximately how many quarts of\r\nblood? Is it:',0,'2018-01-25 12:31:28','2018-01-25 12:31:28'),(13,2,2,'3+1',0,'2018-01-25 12:32:44','2018-01-25 12:32:44'),(14,1,2,'Of the following, which mechanisms are important in the death of erythrocytes (pron:\r\neh-rith-reh-sites) in human blood? Is it',0,'2018-01-25 12:41:13','2018-01-25 12:41:13'),(15,1,3,'21231651561',0,'2018-01-25 14:05:35','2018-01-25 14:05:35'),(16,1,3,'adsadasdad',0,'2018-01-25 14:12:09','2018-01-25 14:12:09'),(17,1,4,'adsadasdad',0,'2018-01-25 14:12:09','2018-01-25 14:12:09'),(18,3,4,'adsadasdad',0,'2018-01-25 14:12:09','2018-01-25 14:12:09');
/*!40000 ALTER TABLE `tbl_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_results`
--

DROP TABLE IF EXISTS `tbl_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `l1_result` decimal(10,0) DEFAULT NULL,
  `l2_result` decimal(10,0) DEFAULT NULL,
  `l3_result` decimal(10,0) DEFAULT NULL,
  `l4_result` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_results`
--

LOCK TABLES `tbl_results` WRITE;
/*!40000 ALTER TABLE `tbl_results` DISABLE KEYS */;
INSERT INTO `tbl_results` VALUES (1,1,1,200,150,160,130),(2,1,2,200,150,160,130),(3,1,3,200,150,160,130);
/*!40000 ALTER TABLE `tbl_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tbl_student_info`
--

DROP TABLE IF EXISTS `tbl_student_info`;
/*!50001 DROP VIEW IF EXISTS `tbl_student_info`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_student_info` AS SELECT 
 1 AS `First Name`,
 1 AS `Last Name`,
 1 AS `Subject`,
 1 AS `Level 1`,
 1 AS `Level 2`,
 1 AS `Level 3`,
 1 AS `Level 4`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_student_total_result`
--

DROP TABLE IF EXISTS `tbl_student_total_result`;
/*!50001 DROP VIEW IF EXISTS `tbl_student_total_result`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_student_total_result` AS SELECT 
 1 AS `First_Name`,
 1 AS `Last_Name`,
 1 AS `L1_Total_Results`,
 1 AS `L2_Total_Results`,
 1 AS `L3_Total_Results`,
 1 AS `L4_Total_Results`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(60) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `target_percentage` int(11) DEFAULT NULL,
  `l1_tot_ques` int(11) DEFAULT '0',
  `l2_tot_ques` int(11) DEFAULT '0',
  `l3_tot_ques` int(11) DEFAULT '0',
  `l4_tot_ques` int(11) DEFAULT '0',
  `target_days` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` VALUES (1,'N/A','paopao','aquino','1977-05-25 00:00:00','sampl3@gmail.com','09171236985','123456',1,80,630,540,450,360,30,NULL,NULL,2,'2018-01-16 10:53:29','2018-01-16 10:53:29'),(2,'N/A','paopao1','aquino1','1977-05-25 00:00:00','sampl3@gmail.com','09171236985','123456',1,80,0,0,0,0,25,NULL,NULL,2,'2018-01-16 11:47:14','2018-01-16 11:47:14'),(3,'N/A','paopao','aquino','1977-05-25 00:00:00','sampl3@gmail.com','09171236985','123456',1,70,0,0,0,0,20,NULL,NULL,2,'2018-01-18 11:27:18','2018-01-18 11:27:18'),(4,'N/A','paopao1','aquino1','1977-05-25 00:00:00','sampl3@gmail.com','09171236985','123456',1,90,0,0,0,0,30,NULL,NULL,2,'2018-01-25 11:50:39','2018-01-25 11:50:39'),(5,'N/A','cahrles','pogi','1977-05-25 00:00:00','sampl3@gmail.com','09171236985','123456',1,90,0,0,0,0,30,NULL,NULL,2,'2018-01-25 11:50:55','2018-01-25 11:50:55'),(6,'N/A','charles','fontanilla','1991-06-26 00:00:00','sample1@yahoo.com','09995794720','123456',1,90,0,0,0,0,20,NULL,NULL,2,'2018-01-25 12:21:33','2018-01-25 12:21:33');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subject` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(500) DEFAULT NULL,
  `descriptions` text,
  `status` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `idx_tbl_subject_id_0` (`Id`),
  UNIQUE KEY `unq_tbl_subject_subject` (`subject`),
  KEY `idx_tbl_subject_id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subject`
--

LOCK TABLES `tbl_subject` WRITE;
/*!40000 ALTER TABLE `tbl_subject` DISABLE KEYS */;
INSERT INTO `tbl_subject` VALUES (1,'BIOLOGY','NA',1,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(2,'CHEMISTRY','NA',1,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(3,'PHYSICS','NA',1,'2018-01-25 00:00:00','2018-01-25 00:00:00');
/*!40000 ALTER TABLE `tbl_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_target_question_count`
--

DROP TABLE IF EXISTS `tbl_target_question_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_target_question_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `level_id` tinyint(4) NOT NULL,
  `question_total` mediumint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_target_question_count`
--

LOCK TABLES `tbl_target_question_count` WRITE;
/*!40000 ALTER TABLE `tbl_target_question_count` DISABLE KEYS */;
INSERT INTO `tbl_target_question_count` VALUES (1,1,1,600),(2,1,2,222),(3,1,3,345),(4,1,4,334);
/*!40000 ALTER TABLE `tbl_target_question_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tbl_total_questions_all`
--

DROP TABLE IF EXISTS `tbl_total_questions_all`;
/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_total_questions_all` AS SELECT 
 1 AS `total_count_L1`,
 1 AS `total_count_L2`,
 1 AS `total_count_L3`,
 1 AS `total_count_L4`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_total_questions_bio`
--

DROP TABLE IF EXISTS `tbl_total_questions_bio`;
/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_bio`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_total_questions_bio` AS SELECT 
 1 AS `total_count_L1`,
 1 AS `total_count_L2`,
 1 AS `total_count_L3`,
 1 AS `total_count_L4`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_total_questions_chem`
--

DROP TABLE IF EXISTS `tbl_total_questions_chem`;
/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_chem`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_total_questions_chem` AS SELECT 
 1 AS `total_count_L1`,
 1 AS `total_count_L2`,
 1 AS `total_count_L3`,
 1 AS `total_count_L4`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_total_questions_physics`
--

DROP TABLE IF EXISTS `tbl_total_questions_physics`;
/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_physics`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_total_questions_physics` AS SELECT 
 1 AS `total_count_L1`,
 1 AS `total_count_L2`,
 1 AS `total_count_L3`,
 1 AS `total_count_L4`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'charles','cha@y.com','123','2',NULL,NULL),(2,'king paulo aquino','kingpauloaquino@gmail.com','$2y$10$CvB2lpt/HPOgFaohAL.AZ.tMLbMO/weBrLEyKlSfFUzFxfQv537Ai','qnY6ViEmb1QEmsdP3iez5ZvB4OVBUg13OOBYQez1EJLlKTivBQOb9k2MA6Wi','2018-03-11 04:55:04','2018-03-11 04:55:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `tbl_student_info`
--

/*!50001 DROP VIEW IF EXISTS `tbl_student_info`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_student_info` AS select `tbl_students`.`firstname` AS `First Name`,`tbl_students`.`lastname` AS `Last Name`,`tbl_subject`.`subject` AS `Subject`,`tbl_results`.`l1_result` AS `Level 1`,`tbl_results`.`l2_result` AS `Level 2`,`tbl_results`.`l3_result` AS `Level 3`,`tbl_results`.`l4_result` AS `Level 4` from ((`tbl_students` join `tbl_results` on((`tbl_results`.`student_id` = `tbl_students`.`Id`))) join `tbl_subject` on((`tbl_subject`.`Id` = `tbl_results`.`subject_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_student_total_result`
--

/*!50001 DROP VIEW IF EXISTS `tbl_student_total_result`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_student_total_result` AS select `tbl_students`.`firstname` AS `First_Name`,`tbl_students`.`lastname` AS `Last_Name`,sum(`tbl_results`.`l1_result`) AS `L1_Total_Results`,sum(`tbl_results`.`l2_result`) AS `L2_Total_Results`,sum(`tbl_results`.`l3_result`) AS `L3_Total_Results`,sum(`tbl_results`.`l4_result`) AS `L4_Total_Results` from (`tbl_students` join `tbl_results`) where (`tbl_results`.`student_id` = 1) group by `tbl_students`.`firstname`,`tbl_students`.`lastname`,`tbl_results`.`l1_result`,`tbl_results`.`l2_result`,`tbl_results`.`l3_result`,`tbl_results`.`l4_result` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_total_questions_all`
--

/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_total_questions_all` AS select (select count(0) from `tbl_question` where (`tbl_question`.`category_id` = 1)) AS `total_count_L1`,(select count(0) from `tbl_question` where (`tbl_question`.`category_id` = 2)) AS `total_count_L2`,(select count(0) from `tbl_question` where (`tbl_question`.`category_id` = 3)) AS `total_count_L3`,(select count(0) from `tbl_question` where (`tbl_question`.`category_id` = 4)) AS `total_count_L4` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_total_questions_bio`
--

/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_bio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_total_questions_bio` AS select (select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 1) and (`tbl_question`.`subject_id` = 1))) AS `total_count_L1`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 2) and (`tbl_question`.`subject_id` = 1))) AS `total_count_L2`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 3) and (`tbl_question`.`subject_id` = 1))) AS `total_count_L3`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 4) and (`tbl_question`.`subject_id` = 1))) AS `total_count_L4` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_total_questions_chem`
--

/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_chem`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_total_questions_chem` AS select (select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 1) and (`tbl_question`.`subject_id` = 2))) AS `total_count_L1`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 2) and (`tbl_question`.`subject_id` = 2))) AS `total_count_L2`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 3) and (`tbl_question`.`subject_id` = 2))) AS `total_count_L3`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 4) and (`tbl_question`.`subject_id` = 2))) AS `total_count_L4` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_total_questions_physics`
--

/*!50001 DROP VIEW IF EXISTS `tbl_total_questions_physics`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ambeyo`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_total_questions_physics` AS select (select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 1) and (`tbl_question`.`subject_id` = 3))) AS `total_count_L1`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 2) and (`tbl_question`.`subject_id` = 3))) AS `total_count_L2`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 3) and (`tbl_question`.`subject_id` = 3))) AS `total_count_L3`,(select count(0) from `tbl_question` where ((`tbl_question`.`category_id` = 4) and (`tbl_question`.`subject_id` = 3))) AS `total_count_L4` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-11 21:06:59
