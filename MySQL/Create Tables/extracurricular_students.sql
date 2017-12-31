-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: extracurricular
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `Univ_ID` mediumint(8) unsigned NOT NULL,
  `On_Campus` enum('Y','N') NOT NULL,
  `Year` enum('1','2','3','4') NOT NULL,
  `Major_Code` smallint(5) unsigned NOT NULL,
  `Minor_Code` smallint(5) unsigned DEFAULT NULL,
  `Advisor_ID` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `Univ_ID` (`Univ_ID`),
  KEY `Major_Code` (`Major_Code`),
  KEY `Minor_Code` (`Minor_Code`),
  KEY `Advisor_ID` (`Advisor_ID`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Univ_ID`) REFERENCES `persons` (`Univ_ID`) ON UPDATE CASCADE,
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`Major_Code`) REFERENCES `majors` (`Major_ID`) ON UPDATE CASCADE,
  CONSTRAINT `students_ibfk_3` FOREIGN KEY (`Minor_Code`) REFERENCES `minors` (`Minor_ID`) ON UPDATE CASCADE,
  CONSTRAINT `students_ibfk_4` FOREIGN KEY (`Advisor_ID`) REFERENCES `faculty` (`Univ_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (9001001,'Y','2',101,NULL,5001002),(9001002,'Y','2',102,NULL,5001003),(9001003,'N','3',103,501,5001003),(9001004,'Y','4',201,502,5001005),(9001005,'N','1',201,502,5001005),(9001006,'N','3',301,803,5001006),(9001007,'N','4',401,301,5001007),(9001008,'Y','2',501,901,5001008),(9001009,'Y','1',501,NULL,5001008),(9001010,'N','1',502,701,5001008),(9001011,'Y','3',503,NULL,5001009),(9001012,'N','4',504,701,5001009),(9001013,'Y','4',601,503,5001011),(9001014,'Y','4',701,502,5001012),(9001015,'N','2',801,301,5001013),(9001016,'N','2',802,301,5001013),(9001017,'Y','1',803,NULL,5001013),(9001018,'Y','2',804,1001,5001013),(9001019,'Y','3',901,802,5001014),(9001020,'N','4',902,802,5001014),(9001021,'Y','3',903,804,5001014),(9001022,'Y','2',1001,801,5001015);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 16:15:58
