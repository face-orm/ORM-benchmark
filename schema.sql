CREATE DATABASE  IF NOT EXISTS `lemon-bench` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lemon-bench`;
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
INSERT INTO `tree` (`id`,`age`) VALUES (1,22),(2,333),(3,937),(4,461),(5,191),(6,132),(7,784),(8,553),(9,375),(10,104);
INSERT INTO `tree` (`id`,`age`) VALUES (11,534),(12,80),(13,899),(14,466),(15,670),(16,1000),(17,677),(18,957),(19,25),(20,542);
INSERT INTO `tree` (`id`,`age`) VALUES (21,823),(22,240),(23,834),(24,877),(25,394),(26,966),(27,538),(28,609),(29,375),(30,739);
INSERT INTO `tree` (`id`,`age`) VALUES (31,853),(32,414),(33,20),(34,581),(35,31),(36,527),(37,686),(38,649),(39,24),(40,534);
INSERT INTO `tree` (`id`,`age`) VALUES (41,165),(42,427),(43,302),(44,778),(45,616),(46,469),(47,62),(48,14),(49,981),(50,41);
INSERT INTO `tree` (`id`,`age`) VALUES (51,859),(52,756),(53,169),(54,686),(55,961),(56,853),(57,823),(58,592),(59,65),(60,717);
INSERT INTO `tree` (`id`,`age`) VALUES (61,96),(62,239),(63,830),(64,203),(65,452),(66,697),(67,578),(68,25),(69,737),(70,186);
INSERT INTO `tree` (`id`,`age`) VALUES (71,125),(72,310),(73,939),(74,732),(75,478),(76,117),(77,618),(78,332),(79,312),(80,163);
INSERT INTO `tree` (`id`,`age`) VALUES (81,225),(82,9),(83,234),(84,933),(85,809),(86,319),(87,743),(88,119),(89,816),(90,205);
INSERT INTO `tree` (`id`,`age`) VALUES (91,231),(92,324),(93,70),(94,465),(95,697),(96,147),(97,304),(98,232),(99,265),(100,741);
INSERT INTO `tree` (`id`,`age`) VALUES (101,902),(102,456),(103,354),(104,81),(105,207),(106,937),(107,392),(108,90),(109,755),(110,642);
INSERT INTO `tree` (`id`,`age`) VALUES (111,608),(112,298),(113,572),(114,903),(115,904),(116,528),(117,653),(118,216),(119,703),(120,450);
INSERT INTO `tree` (`id`,`age`) VALUES (121,362),(122,934),(123,635),(124,990),(125,579),(126,872),(127,128),(128,2),(129,711),(130,278);
INSERT INTO `tree` (`id`,`age`) VALUES (131,630),(132,764),(133,571),(134,287),(135,405),(136,569),(137,267),(138,692),(139,606),(140,411);
INSERT INTO `tree` (`id`,`age`) VALUES (141,487),(142,219),(143,398),(144,191),(145,776),(146,170),(147,484),(148,368),(149,420),(150,484);
INSERT INTO `tree` (`id`,`age`) VALUES (151,439),(152,878),(153,858),(154,828),(155,292),(156,257),(157,948),(158,296),(159,51),(160,793);
INSERT INTO `tree` (`id`,`age`) VALUES (161,355),(162,189),(163,278),(164,822),(165,530),(166,209),(167,492),(168,533),(169,746),(170,864);
INSERT INTO `tree` (`id`,`age`) VALUES (171,29),(172,953),(173,878),(174,356),(175,879),(176,593),(177,204),(178,939),(179,466),(180,289);
INSERT INTO `tree` (`id`,`age`) VALUES (181,690),(182,287),(183,558),(184,13),(185,812),(186,454),(187,737),(188,955),(189,641),(190,193);
INSERT INTO `tree` (`id`,`age`) VALUES (191,471),(192,84),(193,63),(194,663),(195,582),(196,222),(197,451),(198,200),(199,789),(200,520);
/*!40000 ALTER TABLE `tree` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;



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
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (1,1,43),(2,0,97),(3,0,107),(4,1,135),(5,1,57),(6,0,145),(7,1,79),(8,1,120),(9,1,64),(10,0,88);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (11,0,103),(12,0,196),(13,1,186),(14,0,166),(15,0,157),(16,0,58),(17,0,16),(18,0,48),(19,0,88),(20,0,130);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (21,0,129),(22,0,196),(23,0,125),(24,0,106),(25,1,21),(26,0,107),(27,1,80),(28,1,29),(29,1,188),(30,1,51);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (31,1,26),(32,1,9),(33,1,104),(34,0,25),(35,0,132),(36,1,75),(37,0,161),(38,1,55),(39,1,180),(40,0,61);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (41,1,69),(42,0,174),(43,0,135),(44,1,166),(45,1,114),(46,1,172),(47,0,150),(48,0,76),(49,1,158),(50,1,93);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (51,1,157),(52,0,175),(53,0,53),(54,1,96),(55,1,81),(56,0,52),(57,0,118),(58,0,168),(59,0,85),(60,0,189);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (61,1,68),(62,0,103),(63,1,57),(64,0,95),(65,1,197),(66,1,12),(67,1,179),(68,0,102),(69,0,169),(70,0,93);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (71,0,119),(72,1,179),(73,0,30),(74,1,92),(75,1,118),(76,0,153),(77,1,121),(78,0,22),(79,0,125),(80,0,26);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (81,1,183),(82,0,93),(83,1,186),(84,1,173),(85,0,100),(86,1,96),(87,0,99),(88,0,168),(89,1,187),(90,0,43);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (91,1,67),(92,0,117),(93,0,174),(94,1,107),(95,1,25),(96,0,131),(97,1,76),(98,1,132),(99,0,99),(100,0,107);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (101,1,143),(102,0,142),(103,0,62),(104,1,183),(105,0,7),(106,1,101),(107,1,158),(108,0,172),(109,0,47),(110,1,105);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (111,1,116),(112,0,3),(113,0,174),(114,0,162),(115,1,194),(116,0,193),(117,0,58),(118,0,159),(119,0,30),(120,1,151);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (121,1,143),(122,1,16),(123,1,163),(124,0,57),(125,0,122),(126,1,154),(127,0,5),(128,0,135),(129,1,123),(130,0,70);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (131,1,94),(132,0,98),(133,1,182),(134,0,138),(135,0,122),(136,0,185),(137,1,166),(138,1,113),(139,0,19),(140,1,159);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (141,1,125),(142,0,173),(143,1,137),(144,1,49),(145,1,139),(146,0,47),(147,1,154),(148,0,76),(149,0,4),(150,1,73);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (151,0,158),(152,0,116),(153,1,113),(154,0,8),(155,1,167),(156,0,39),(157,1,9),(158,0,130),(159,0,145),(160,0,115);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (161,1,112),(162,0,19),(163,1,177),(164,0,124),(165,0,152),(166,1,130),(167,0,114),(168,0,43),(169,1,122),(170,0,77);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (171,0,51),(172,1,51),(173,0,87),(174,1,63),(175,0,7),(176,1,68),(177,1,30),(178,0,154),(179,0,93),(180,1,184);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (181,1,64),(182,1,150),(183,0,154),(184,0,146),(185,1,76),(186,0,136),(187,1,106),(188,1,49),(189,0,160),(190,1,28);
INSERT INTO `lemon` (`id`,`mature`,`tree_id`) VALUES (191,0,119),(192,0,186),(193,1,144),(194,1,132),(195,0,182),(196,0,95),(197,0,110),(198,1,40),(199,1,127),(200,1,113);
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
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (1,1,170),(2,0,106),(3,1,128),(4,0,50),(5,0,143),(6,0,170),(7,0,82),(8,0,137),(9,1,181),(10,0,130);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (11,0,66),(12,0,141),(13,0,119),(14,0,147),(15,0,69),(16,0,145),(17,1,186),(18,0,64),(19,0,173),(20,1,29);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (21,1,74),(22,1,107),(23,0,69),(24,1,183),(25,0,51),(26,1,22),(27,0,114),(28,0,27),(29,0,145),(30,1,178);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (31,1,59),(32,1,175),(33,0,180),(34,1,112),(35,1,110),(36,0,140),(37,0,24),(38,0,22),(39,0,62),(40,0,126);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (41,0,97),(42,1,114),(43,1,177),(44,0,33),(45,0,34),(46,1,38),(47,0,190),(48,1,5),(49,1,134),(50,0,100);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (51,0,56),(52,0,156),(53,0,145),(54,0,112),(55,0,29),(56,0,105),(57,1,39),(58,0,109),(59,1,143),(60,1,10);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (61,0,114),(62,1,140),(63,1,15),(64,0,148),(65,0,91),(66,1,128),(67,1,47),(68,1,28),(69,1,191),(70,1,47);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (71,1,29),(72,0,169),(73,1,107),(74,0,140),(75,1,97),(76,1,142),(77,0,77),(78,0,25),(79,0,68),(80,1,58);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (81,1,158),(82,1,113),(83,1,95),(84,1,125),(85,1,100),(86,0,139),(87,0,177),(88,1,140),(89,0,190),(90,0,153);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (91,0,58),(92,0,180),(93,0,160),(94,0,163),(95,1,27),(96,1,61),(97,1,97),(98,1,82),(99,0,200),(100,1,147);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (101,1,4),(102,1,74),(103,1,180),(104,1,61),(105,0,100),(106,0,147),(107,1,187),(108,0,117),(109,0,57),(110,1,194);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (111,1,50),(112,1,82),(113,1,71),(114,1,20),(115,1,12),(116,0,153),(117,0,145),(118,1,145),(119,0,127),(120,0,12);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (121,0,120),(122,0,5),(123,0,117),(124,1,150),(125,1,11),(126,1,22),(127,1,103),(128,0,182),(129,1,40),(130,0,60);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (131,0,107),(132,1,179),(133,1,185),(134,0,92),(135,0,68),(136,0,155),(137,0,175),(138,0,51),(139,1,79),(140,0,183);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (141,1,60),(142,1,19),(143,0,52),(144,0,32),(145,1,132),(146,1,129),(147,1,10),(148,1,56),(149,0,65),(150,1,82);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (151,1,105),(152,0,168),(153,0,127),(154,0,13),(155,1,193),(156,0,80),(157,1,109),(158,1,161),(159,1,12),(160,0,72);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (161,1,79),(162,1,134),(163,1,13),(164,1,86),(165,1,95),(166,1,23),(167,1,4),(168,0,137),(169,1,57),(170,0,119);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (171,1,124),(172,1,151),(173,1,190),(174,1,186),(175,1,100),(176,1,95),(177,1,33),(178,0,147),(179,0,49),(180,1,26);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (181,0,57),(182,1,120),(183,1,128),(184,0,112),(185,1,22),(186,0,6),(187,1,75),(188,0,16),(189,1,124),(190,0,70);
INSERT INTO `seed` (`id`,`fertil`,`lemon_id`) VALUES (191,0,198),(192,1,51),(193,0,69),(194,0,98),(195,1,68),(196,0,93),(197,0,143),(198,1,195),(199,0,140),(200,1,68);

/*!40000 ALTER TABLE `seed` ENABLE KEYS */;
UNLOCK TABLES;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-26 12:05:52