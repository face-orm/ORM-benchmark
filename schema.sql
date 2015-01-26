CREATE DATABASE  IF NOT EXISTS `lemon-test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lemon-test`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: lemon-test
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `lemon`
--

DROP TABLE IF EXISTS `lemon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lemon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_id` int(11) NOT NULL,
  `mature` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lemon_tree1` (`tree_id`),
  CONSTRAINT `fk_lemon_tree1` FOREIGN KEY (`tree_id`) REFERENCES `tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lemon`
--

LOCK TABLES `lemon` WRITE;
/*!40000 ALTER TABLE `lemon` DISABLE KEYS */;
INSERT INTO `lemon` VALUES (18,5,'1'),(19,3,'1'),(20,3,'1'),(21,3,'0'),(22,3,'1'),(23,5,'1'),(24,1,'0'),(25,10,'1'),(26,7,'1'),(27,8,'0'),(28,7,'1'),(29,8,'0'),(30,9,'1'),(31,4,'1'),(32,5,'0'),(33,4,'1'),(34,8,'1');
/*!40000 ALTER TABLE `lemon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed`
--

DROP TABLE IF EXISTS `seed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lemon_id` int(11) NOT NULL,
  `fertil` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seed_lemon1` (`lemon_id`),
  CONSTRAINT `fk_seed_lemon1` FOREIGN KEY (`lemon_id`) REFERENCES `lemon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed`
--

LOCK TABLES `seed` WRITE;
/*!40000 ALTER TABLE `seed` DISABLE KEYS */;
INSERT INTO `seed` VALUES (1,18,1),(2,20,0),(3,20,0),(4,20,0),(5,32,1),(6,24,1),(7,25,0),(8,21,1),(9,30,1),(10,19,0),(11,27,1),(12,26,0),(13,25,1),(14,18,0),(15,26,1);
/*!40000 ALTER TABLE `seed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree`
--

LOCK TABLES `tree` WRITE;
/*!40000 ALTER TABLE `tree` DISABLE KEYS */;
INSERT INTO `tree` VALUES (1,1),(2,3),(3,20),(4,5),(5,200),(6,124),(7,86),(8,75),(9,52),(10,74);
/*!40000 ALTER TABLE `tree` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-26 12:05:52