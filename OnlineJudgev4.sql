-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: OnlineJudge
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.12.04.2

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
INSERT INTO `admin` VALUES ('gopalkriagg','Gopal Krishan Aggarwal','password','gopal@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemAttempted`
--

DROP TABLE IF EXISTS `problemAttempted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemAttempted` (
  `solution_id` int(11) NOT NULL,
  `solvedintime` float DEFAULT NULL,
  `spacetaken` int(11) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `plagiarised` char(1) DEFAULT NULL,
  `timecompexity` varchar(30) DEFAULT NULL,
  `spacecomplexity` varchar(30) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`solution_id`),
  CONSTRAINT `problemAttempted_ibfk_1` FOREIGN KEY (`solution_id`) REFERENCES `solutionId` (`solution_id`)
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
INSERT INTO `problemTags` VALUES ('ET','Dynamic Programming'),('t11','Dynamic Programming'),('t12','Data Structures'),('t12','Dynamic Programming'),('t12','Recursive Programming'),('t4','Dynamic Programming'),('t5','Dynamic Programming'),('t6','Data Structures'),('t6','Divide and Conquer'),('t6','Dynamic Programming'),('t6','Greedy Algorithms'),('t6','Recursive Programming'),('t7','Dynamic Programming'),('t7','Recursive Programming'),('tc3','Dynamic Programming'),('tc4','Dynamic Programming'),('tc5','Dynamic Programming'),('tc6','Dynamic Programming'),('tCase2','Dynamic Programming'),('tCases1','Dynamic Programming'),('Test1','Dynamic Programming'),('Test1','Recursive Programming'),('Test2','Dynamic Programming'),('test3','Dynamic Programming'),('TestTest','Dynamic Programming'),('TestTest','Recursive Programming'),('THG','Data Structures'),('THG','Dynamic Programming'),('THG','Recursive Programming');
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
  `max_time` float DEFAULT NULL,
  `max_space_mb` float DEFAULT NULL,
  PRIMARY KEY (`problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES ('dsf','fsdf','e',0,0,NULL,NULL),('ET','Extra Terristrial','m',0,0,2,256),('HP','Harry Potter','h',0,0,3,512),('LOTR','Lord of the Rings','m',0,0,3,300),('t11','t11','h',0,0,1,1),('t12','t12','e',0,0,1,1),('t4','t4','e',0,0,1,1),('t5','t5','m',0,0,1,1),('t6','t6','h',0,0,1,1),('t7','t7','h',0,0,1,5),('tc3','sdfsd','e',0,0,3,32),('tc4','sdgdsfsd','e',0,0,5,23),('tc5','dsgds','d',0,0,1,43),('tc6','sfdaf','e',0,0,2,34),('tCase2','FRI','e',0,0,3,10),('tCases1','t','e',0,0,3,20),('Test1','Test1','e',0,0,1,10),('Test2','test2','e',0,0,1,1),('test3','test3','e',0,0,1,1),('TestTest','Exams','h',0,0,3,200),('THG','The Hunger Games','h',0,0,2,200);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solutionId`
--

DROP TABLE IF EXISTS `solutionId`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solutionId` (
  `solution_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) DEFAULT NULL,
  `problem_id` varchar(30) DEFAULT NULL,
  `solvedtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`solution_id`),
  KEY `user_id` (`user_id`),
  KEY `problem_id` (`problem_id`),
  CONSTRAINT `solutionId_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `solutionId_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solutionId`
--

LOCK TABLES `solutionId` WRITE;
/*!40000 ALTER TABLE `solutionId` DISABLE KEYS */;
/*!40000 ALTER TABLE `solutionId` ENABLE KEYS */;
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
INSERT INTO `user` VALUES ('gopalkriagg','password','Gopal Aggarwal','gopalkriagg@gmail.com','n'),('tushar','password','Tushar','tushar@gmail.com','n');
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

-- Dump completed on 2015-12-01  0:34:05
