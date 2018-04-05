CREATE DATABASE  IF NOT EXISTS `ambeyo_test1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ambeyo_test1`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ambeyo_test1
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
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `role_scope` int(11) DEFAULT NULL,
  `role_scope_sub` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,1,1,1,1,1),(2,1,1,1,2,1),(3,1,1,1,3,1),(4,1,1,1,4,1),(5,1,1,2,6,1),(6,1,1,2,7,1),(7,1,1,2,8,1),(8,1,1,2,9,1),(9,2,1,1,2,1),(10,2,1,1,3,1),(11,2,1,1,4,1),(12,2,1,2,3,1),(13,3,1,8,19,1),(14,3,1,8,20,1),(15,3,1,5,0,1);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'superadmin'),(2,'admin'),(3,'developer'),(4,'manager'),(5,'editor'),(6,'encoder');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_scope`
--

DROP TABLE IF EXISTS `role_scope`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_scope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `has_sub` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_scope`
--

LOCK TABLES `role_scope` WRITE;
/*!40000 ALTER TABLE `role_scope` DISABLE KEYS */;
INSERT INTO `role_scope` VALUES (1,1,'Add',1),(2,1,'Edit',1),(3,1,'Delete',1),(4,1,'Edit User Account Status',0),(5,1,'Edit Agent Account Status',0),(6,1,'Edit Student Account Status',0),(7,1,'Asign Task',0),(8,1,'Approver',1);
/*!40000 ALTER TABLE `role_scope` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_scope_sub`
--

DROP TABLE IF EXISTS `role_scope_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_scope_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_scope_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_scope_sub`
--

LOCK TABLES `role_scope_sub` WRITE;
/*!40000 ALTER TABLE `role_scope_sub` DISABLE KEYS */;
INSERT INTO `role_scope_sub` VALUES (1,1,'Difficulty'),(2,1,'MCQ'),(3,1,'Topic'),(4,1,'Total Questions'),(5,1,'Subject'),(6,1,'User'),(7,2,'Difficulty'),(8,2,'MCQ'),(9,2,'Topic'),(10,2,'Total Questions'),(11,2,'Subject'),(12,2,'User'),(13,3,'Difficulty'),(14,3,'MCQ'),(15,3,'Topic'),(16,3,'Total Questions'),(17,3,'Subject'),(18,3,'User'),(19,8,'MCQ'),(20,8,'Agent');
/*!40000 ALTER TABLE `role_scope_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'King',1,NULL),(2,'Charles',1,NULL),(3,'March',1,NULL);
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

-- Dump completed on 2018-04-05 23:44:11
