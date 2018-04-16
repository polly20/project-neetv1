CREATE DATABASE  IF NOT EXISTS `ambeyo_neet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ambeyo_neet`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ambeyo_neet
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
-- Table structure for table `tbl_sub_topics`
--

DROP TABLE IF EXISTS `tbl_sub_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sub_topics` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_uid` int(11) DEFAULT NULL,
  `sub_topic_name` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_topics`
--

LOCK TABLES `tbl_sub_topics` WRITE;
/*!40000 ALTER TABLE `tbl_sub_topics` DISABLE KEYS */;
INSERT INTO `tbl_sub_topics` VALUES (3,1,'Integer pretium quam et nisi finibus, ut interdum mi posuere. Maecenas eget fermentum lorem. Maecenas vitae ex ligula',1,'2018-04-12 08:09:44','2018-04-12 13:09:44'),(4,1,'Test 2',1,'2018-04-12 09:09:44','2018-04-12 13:09:44'),(6,4,'Test 4 example',1,'2018-04-12 11:09:44','2018-04-12 14:23:38'),(7,1,'test area',1,'2018-04-12 12:09:44','2018-04-12 13:09:44'),(8,1,'example page for this function xxx',1,'2018-04-12 13:10:36','2018-04-12 14:05:14');
/*!40000 ALTER TABLE `tbl_sub_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects`
--

DROP TABLE IF EXISTS `tbl_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(45) DEFAULT NULL,
  `subject_name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects`
--

LOCK TABLES `tbl_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
INSERT INTO `tbl_subjects` VALUES (2,'BIO','Biology',1,'2018-04-10 10:58:02','2018-04-10 11:02:07'),(3,'CHE','Chemistry',1,'2018-04-10 11:02:37','2018-04-10 11:02:37'),(4,'PHY','Physics',1,'2018-04-10 11:13:44','2018-04-10 11:13:44');
/*!40000 ALTER TABLE `tbl_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_syllabus`
--

DROP TABLE IF EXISTS `tbl_syllabus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_syllabus` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `class_number` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = Not Active\n1 = Active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_syllabus`
--

LOCK TABLES `tbl_syllabus` WRITE;
/*!40000 ALTER TABLE `tbl_syllabus` DISABLE KEYS */;
INSERT INTO `tbl_syllabus` VALUES (1,'CLASS XI',1,NULL,NULL),(2,'CLASS XII',1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_syllabus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_topics`
--

DROP TABLE IF EXISTS `tbl_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_topics` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_uid` int(11) DEFAULT NULL,
  `syllabus_uid` int(11) DEFAULT NULL,
  `unit_number` varchar(45) DEFAULT NULL,
  `topic_name` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = Not Active\n1 = Active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_topics`
--

LOCK TABLES `tbl_topics` WRITE;
/*!40000 ALTER TABLE `tbl_topics` DISABLE KEYS */;
INSERT INTO `tbl_topics` VALUES (1,3,1,'UNIT I','Some Basic Concepts of Chemistry',1,NULL,NULL),(2,3,1,'UNIT II','Structure of Atom',1,NULL,NULL),(3,2,1,'UNIT III','Classification of Elements and Periodicity in Properties',1,NULL,NULL),(4,4,2,'UNIT IV','Chemical Bonding and Molecular Structure',1,'2018-04-11 14:37:03','2018-04-12 06:27:53');
/*!40000 ALTER TABLE `tbl_topics` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'charles','cha@y.com','123','2',NULL,NULL),(2,'king paulo aquino','kingpauloaquino@gmail.com','$2y$10$CvB2lpt/HPOgFaohAL.AZ.tMLbMO/weBrLEyKlSfFUzFxfQv537Ai','qnY6ViEmb1QEmsdP3iez5ZvB4OVBUg13OOBYQez1EJLlKTivBQOb9k2MA6Wi','2018-03-11 04:55:04','2018-03-11 04:55:04'),(3,'March','march@ambeyo.com','$2y$10$xJ94NwkxUVsRY2K8mph/du701.Z9gpAo5jf1oaVjpE8B6qLPclTnK','LAMGsWzUvJGu6otkt6zjrdkVqaKWBKGDuL8CopBHiuwaxg3WgQ1xpuC9XCMb','2018-04-10 02:40:48','2018-04-10 02:40:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ambeyo_neet'
--

--
-- Dumping routines for database 'ambeyo_neet'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-12 22:24:38
