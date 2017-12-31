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
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `Univ_ID` mediumint(8) unsigned NOT NULL,
  `Highest_Degree` enum('Doctorate','Masters') NOT NULL,
  `Position_Title` enum('Lecturer','Assistant Professor','Associate Professor','Professor') NOT NULL,
  `Dept_ID` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `Univ_ID` (`Univ_ID`),
  KEY `Dept_ID` (`Dept_ID`),
  CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Univ_ID`) REFERENCES `persons` (`Univ_ID`) ON UPDATE CASCADE,
  CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`Dept_ID`) REFERENCES `departments` (`Dept_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (5001001,'Doctorate','Professor',1),(5001002,'Doctorate','Assistant Professor',1),(5001003,'Masters','Lecturer',1),(5001004,'Doctorate','Associate Professor',2),(5001005,'Doctorate','Assistant Professor',2),(5001006,'Doctorate','Professor',3),(5001007,'Doctorate','Professor',4),(5001008,'Masters','Lecturer',5),(5001009,'Doctorate','Associate Professor',5),(5001010,'Doctorate','Professor',6),(5001011,'Doctorate','Assistant Professor',6),(5001012,'Doctorate','Associate Professor',7),(5001013,'Masters','Lecturer',8),(5001014,'Masters','Lecturer',9),(5001015,'Doctorate','Professor',10);
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 16:16:01
