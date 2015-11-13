-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: OnlineJudge
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` varchar(30) DEFAULT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemAttempted`
--

DROP TABLE IF EXISTS `problemAttempted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemAttempted` (
  `user_id` varchar(30) NOT NULL DEFAULT '',
  `problem_id` varchar(10) NOT NULL DEFAULT '',
  `solvedtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `solvedintime` float NOT NULL DEFAULT '0',
  `code` varchar(60000) DEFAULT NULL,
  `spacetaken` int(11) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `plagiarised` char(1) DEFAULT NULL,
  `timecomplexity` varchar(30) DEFAULT NULL,
  `spacecomlexity` varchar(30) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`problem_id`,`solvedintime`),
  KEY `problem_id` (`problem_id`),
  CONSTRAINT `problemAttempted_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `problemAttempted_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemAttempted`
--

LOCK TABLES `problemAttempted` WRITE;
/*!40000 ALTER TABLE `problemAttempted` DISABLE KEYS */;
/*!40000 ALTER TABLE `problemAttempted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemTags`
--

DROP TABLE IF EXISTS `problemTags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemTags` (
  `problem_id` varchar(10) NOT NULL DEFAULT '',
  `tags` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`problem_id`,`tags`),
  CONSTRAINT `problemTags_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemTags`
--

LOCK TABLES `problemTags` WRITE;
/*!40000 ALTER TABLE `problemTags` DISABLE KEYS */;
/*!40000 ALTER TABLE `problemTags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `problem_id` varchar(10) NOT NULL DEFAULT '',
  `problem_name` varchar(20) DEFAULT NULL,
  `problem_difficulty` char(1) DEFAULT NULL,
  `successfull_sub` int(11) DEFAULT NULL,
  `total_sub` int(11) DEFAULT NULL,
  PRIMARY KEY (`problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `blocked` char(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-14  0:11:40
