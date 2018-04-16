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
-- Table structure for table `tbl_answer`
--

DROP TABLE IF EXISTS `tbl_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `choices` varchar(10) DEFAULT NULL,
  `answer` text,
  `right_answer` varchar(10) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_answer`
--

LOCK TABLES `tbl_answer` WRITE;
/*!40000 ALTER TABLE `tbl_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_answer` ENABLE KEYS */;
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
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_question`
--

LOCK TABLES `tbl_question` WRITE;
/*!40000 ALTER TABLE `tbl_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_question` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_topics`
--

LOCK TABLES `tbl_sub_topics` WRITE;
/*!40000 ALTER TABLE `tbl_sub_topics` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects`
--

LOCK TABLES `tbl_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
INSERT INTO `tbl_subjects` VALUES (1,'BIO','BIOLOGY',1,'2018-04-14 08:06:47','2018-04-14 08:06:47'),(2,'CHEM','CHEMISTRY',1,'2018-04-14 08:07:31','2018-04-14 08:07:31'),(3,'PHY','PHYSICS',1,'2018-04-14 08:08:21','2018-04-14 08:08:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_topics`
--

LOCK TABLES `tbl_topics` WRITE;
/*!40000 ALTER TABLE `tbl_topics` DISABLE KEYS */;
INSERT INTO `tbl_topics` VALUES (1,1,1,'I','Diversity in Living World',1,'2018-04-14 08:10:24','2018-04-14 08:10:24'),(2,1,1,'II','Structural Organisation in Animals and Plants',1,'2018-04-14 08:11:04','2018-04-14 08:11:04'),(3,1,1,'III','Cell Structure and Function',1,'2018-04-14 08:11:29','2018-04-14 08:11:29'),(4,1,1,'IV','Plant Physiology',1,'2018-04-14 08:11:52','2018-04-14 08:11:52'),(5,1,1,'V','Human Physiology',1,'2018-04-14 08:12:16','2018-04-14 08:12:16'),(6,1,2,'I','Reproduction',1,'2018-04-14 08:12:50','2018-04-14 08:12:50'),(7,1,2,'II','Genetics and Evolution',1,'2018-04-14 08:13:08','2018-04-14 08:13:08'),(8,1,2,'III','Biology and Human Welfare',1,'2018-04-14 08:14:03','2018-04-14 08:14:03'),(9,1,2,'IV','Biotechnology and Its Applications',1,'2018-04-14 08:14:29','2018-04-14 08:14:29'),(10,1,2,'V','Ecology and environment',1,'2018-04-14 08:14:44','2018-04-14 08:14:44'),(11,2,1,'I','Some Basic Concepts of Chemistry',1,'2018-04-14 08:28:17','2018-04-14 08:28:17'),(12,2,1,'II','Structure of Atom',1,'2018-04-14 08:29:58','2018-04-14 08:29:58'),(13,2,1,'III','Classification of Elements and Periodicity in Properties',1,'2018-04-14 08:30:22','2018-04-14 08:30:22'),(14,2,1,'IV','Chemical Bonding and Molecular Structure',1,'2018-04-14 08:30:44','2018-04-14 08:30:44'),(15,2,1,'V','States of Matter: Gases and Liquids',1,'2018-04-14 08:31:01','2018-04-14 08:31:01'),(16,2,1,'VI','Thermodynamics',1,'2018-04-14 08:31:19','2018-04-14 08:31:19'),(17,2,1,'VII','Equilibrium',1,'2018-04-14 08:31:54','2018-04-14 08:31:54'),(18,2,1,'VIII','Redox Reactions',1,'2018-04-14 08:32:11','2018-04-14 08:32:11'),(19,2,1,'IX','Hydrogen',1,'2018-04-14 08:32:38','2018-04-14 08:32:38'),(20,2,1,'X','s-Block Element (Alkali and Alkaline earth metals)',1,'2018-04-14 08:33:02','2018-04-14 08:33:02'),(21,2,1,'XI','Some p-Block Elements',1,'2018-04-14 08:33:23','2018-04-14 08:33:23'),(22,2,1,'XII','Organic Chemistry- Some Basic Principles and Techniques',1,'2018-04-14 08:33:40','2018-04-14 08:33:40'),(23,2,1,'XIII','Hydrocarbons',1,'2018-04-14 08:33:55','2018-04-14 08:33:55'),(24,2,1,'XIV','Environmental Chemistry',1,'2018-04-14 08:34:15','2018-04-14 08:34:15'),(25,2,2,'I','Solid State',1,'2018-04-14 08:37:09','2018-04-14 08:37:09'),(26,2,2,'II','Solutions',1,'2018-04-14 08:37:25','2018-04-14 08:37:25'),(27,2,2,'III','Electrochemistry',1,'2018-04-14 08:38:21','2018-04-14 08:38:21'),(28,2,2,'IV','Chemical Kinetics',1,'2018-04-14 08:38:46','2018-04-14 08:38:46'),(29,2,2,'V','Surface Chemistry',1,'2018-04-14 08:38:59','2018-04-14 08:38:59'),(30,2,2,'VI','General Principles and Processes of Isolation of Elements',1,'2018-04-14 08:39:13','2018-04-14 08:39:13'),(31,2,2,'VII','p- Block Elements',1,'2018-04-14 08:39:28','2018-04-14 08:39:28'),(32,2,2,'VIII','d and f Block Elements',1,'2018-04-14 08:39:46','2018-04-14 08:39:46'),(33,2,2,'IX','Coordination Compounds',1,'2018-04-14 08:40:02','2018-04-14 08:40:02'),(34,2,2,'X','Haloalkanes and Haloarenes',1,'2018-04-14 08:40:16','2018-04-14 08:40:16'),(35,2,2,'XI','Alcohols, Phenols and Ethers',1,'2018-04-14 08:40:33','2018-04-14 08:40:33'),(36,2,2,'XII','Aldehydes, Ketones and Carboxylic Acids',1,'2018-04-14 08:40:49','2018-04-14 08:40:49'),(37,2,2,'XIII','Organic Compounds Containing Nitrogen',1,'2018-04-14 08:41:04','2018-04-14 08:41:04'),(38,2,2,'XIV','Biomolecules',1,'2018-04-14 08:41:25','2018-04-14 08:41:25'),(39,2,2,'XV','Polymers',1,'2018-04-14 08:41:40','2018-04-14 08:41:40'),(40,2,2,'XVI','Chemistry in Everyday Life',1,'2018-04-14 08:41:57','2018-04-14 08:41:57'),(41,3,1,'I','Physical world and measurement',1,'2018-04-14 08:42:50','2018-04-14 08:42:50'),(42,3,1,'II','Kinematics',1,'2018-04-14 08:43:03','2018-04-14 08:43:03'),(43,3,1,'III','Laws of Motion',1,'2018-04-14 08:43:19','2018-04-14 08:43:19'),(44,3,1,'IV','Work, Energy and Power',1,'2018-04-14 08:43:35','2018-04-14 08:43:35'),(45,3,1,'VI','Gravitation',1,'2018-04-14 08:44:26','2018-04-14 08:44:26'),(46,3,1,'VII','Properties of Bulk Matter',1,'2018-04-14 08:45:59','2018-04-14 08:45:59'),(47,3,1,'VIII','Thermodynamics',1,'2018-04-14 08:46:12','2018-04-14 08:46:12'),(48,3,1,'IX','Behaviour of Perfect Gas and Kinetic Theory',1,'2018-04-14 08:46:28','2018-04-14 08:46:28'),(49,3,1,'X','Oscillations and Waves',1,'2018-04-14 08:46:42','2018-04-14 08:46:42'),(50,3,2,'I','Electrostatics',1,'2018-04-14 08:46:54','2018-04-14 08:46:54'),(51,3,2,'II','Current Electricity',1,'2018-04-14 08:47:09','2018-04-14 08:47:09'),(52,3,2,'III','Magnetic Effects of Current and Magnetism',1,'2018-04-14 08:47:26','2018-04-14 08:47:26'),(53,3,2,'IV','Electromagnetic Induction and Alternating Currents',1,'2018-04-14 08:47:40','2018-04-14 08:47:40'),(54,3,2,'V','Electromagnetic Waves',1,'2018-04-14 08:47:52','2018-04-14 08:47:52'),(55,3,2,'VI','Optics',1,'2018-04-14 08:48:04','2018-04-14 08:48:04'),(56,3,2,'VII','Dual Nature of Matter and Radiation',1,'2018-04-14 08:48:20','2018-04-14 08:48:20'),(57,3,2,'VIII','Atoms and Nuclei',1,'2018-04-14 08:48:33','2018-04-14 08:48:33'),(58,3,2,'IX','Electronic Devices',1,'2018-04-14 08:48:49','2018-04-14 08:48:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'king paulo aquino','kingpauloaquino@gmail.com','$2y$10$CvB2lpt/HPOgFaohAL.AZ.tMLbMO/weBrLEyKlSfFUzFxfQv537Ai','qnY6ViEmb1QEmsdP3iez5ZvB4OVBUg13OOBYQez1EJLlKTivBQOb9k2MA6Wi','2018-03-11 04:55:04','2018-03-11 04:55:04'),(3,'March','march@ambeyo.com','$2y$10$xJ94NwkxUVsRY2K8mph/du701.Z9gpAo5jf1oaVjpE8B6qLPclTnK','LAMGsWzUvJGu6otkt6zjrdkVqaKWBKGDuL8CopBHiuwaxg3WgQ1xpuC9XCMb','2018-04-10 02:40:48','2018-04-10 02:40:48'),(4,'Charles Fontanilla','charles@ambeyo.com','$2y$10$EKBU020GVcsYtDjK4xezQ.qTs.Xr3X4QcRVEaGjZIaBB95eA24Z22',NULL,'2018-04-13 23:48:21','2018-04-13 23:48:21');
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

-- Dump completed on 2018-04-14 21:21:56
