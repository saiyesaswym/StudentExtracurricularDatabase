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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `Event_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Start_Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Date` date DEFAULT NULL,
  `End_Time` time DEFAULT NULL,
  `Category_ID` tinyint(3) unsigned NOT NULL,
  `Dept_ID` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`Event_ID`),
  KEY `Category_ID` (`Category_ID`),
  KEY `Dept_ID` (`Dept_ID`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `event_categories` (`Category_ID`) ON UPDATE CASCADE,
  CONSTRAINT `events_ibfk_2` FOREIGN KEY (`Dept_ID`) REFERENCES `departments` (`Dept_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1001,'Finance Speaker Series 1','Dr. Smith from MIT presents research on inflation','Business Building 123','2017-01-15','10:00:00','2017-01-15','12:00:00',1,6),(1002,'Finance Speaker Series 2','Dr. Johnson from NYU presents research on unemployment','Business Building 321','2017-02-15','10:00:00','2017-02-15','12:00:00',1,6),(1003,'Local Artist Spotlight 1','Local artist J Jackson presents on his current art projects','Art Building 101','2017-01-22','13:00:00','2017-01-22','15:00:00',1,8),(1004,'English Club Meeting','First monthly meeting for the English Club','English Building 222','2017-01-05','17:00:00','2017-01-05','18:00:00',2,3),(1005,'Art Club Meeting','First monthly meeting for the Art Club','Art Building 200','2017-02-01','18:00:00','2017-02-01','19:00:00',2,8),(1006,'Arts Department Soccer Game','Yearly soccer game between Art professors and students','Rec Fields','2017-03-15','12:00:00','2017-03-15','16:00:00',3,8),(1008,'Engineering Career Fair','Career Fair specifically for engineering employers and students','University Arena','2017-05-01','09:00:00','2017-06-01','17:00:00',5,1),(1009,'Art Career Fair','Career Fair specifically for art employers and students','University Arena','2017-07-02','09:00:00','2017-08-02','17:00:00',5,8),(1010,'Jazz Ensemble','Art (Music) studnets put on a concert for a senior project','University Theater','2017-03-27','18:00:00','2017-03-27','20:00:00',6,8),(1011,'Economics Forum','Local business leaders hold round-table discussions with students on local economic problems','Business Building 301','2017-01-27','10:00:00','2017-01-27','12:00:00',7,7),(1012,'Arts in Politics Forum','Political artist Ashley Williams hosts a round-table discussion with art students interested in using art for politics','Art Building 333','2017-03-01','11:00:00','2017-03-01','13:00:00',7,8),(1013,'Rent-A-Puppy','For $5, play with a puppy for 15 minutes','University Lawn','2017-05-08','14:00:00','2017-05-08','16:00:00',8,8),(1014,'Fundraiser for Theatre','Art (Theatre) students sell baked goods to raise money for new costumes','Student Union','2017-02-22','10:00:00','2017-02-22','16:00:00',9,8),(1015,'How To Use a 3-D Printer','Engineering professors teach students how to use a 3-D printer','Engineering Building 1111','2017-03-17','13:00:00','2017-03-17','16:00:00',10,1),(1016,'Joy of Painting','Art Professor Bob Ross teaches students his signature painting technique','Art Building 101','2017-02-26','15:00:00','2017-02-26','17:00:00',10,8);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `extracurricular`.`Checks_BEFORE_INSERT` BEFORE INSERT ON `events` FOR EACH ROW
BEGIN
if new.End_Date IS NOT NULL and new.End_Time IS NOT NULL then
	
    if new.End_Date = new.Start_Date and new.End_Time <= new.Start_Time then
			set new.End_Time = NULL;
		elseif new.End_Date < new.Start_Date then
			set new.End_Date = NULL, new.End_Time = NULL;
		else
			set new.End_Date = new.End_Date;
		end if;
	elseif new.End_Date IS NULL and new.End_Time IS NOT NULL then
		if new.End_Time <= new.Start_Time then
			set new.End_Time = NULL;
		else
			set new.ENd_Time = new.End_Time;
		end if;
	end if;
    
    	IF new.Category_ID > (SELECT MAX(Category_ID) FROM event_categories) OR new.Category_ID < 1 THEN
    		set new.Category_ID = 0;
    	END IF;
    
    	IF new.Dept_ID > (SELECT MAX(Dept_ID) FROM departments) OR new.Dept_ID < 1 THEN
    		set new.Dept_ID = 0;
    	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `extracurricular`.`Checks_BEFORE_UPDATE` BEFORE UPDATE ON `events` FOR EACH ROW
BEGIN
	if new.End_Date IS NOT NULL and new.End_Time IS NOT NULL then
		if new.End_Date = new.Start_Date and new.End_Time <= new.Start_Time then
			set new.End_Time = NULL;
		elseif new.End_Date < new.Start_Date then
			set new.End_Date = NULL, new.End_Time = NULL;
		else
			set new.End_Date = new.End_Date;
		end if;
	elseif new.End_Date IS NULL and new.End_Time IS NOT NULL then
		if new.End_Time <= new.Start_Time then
			set new.End_Time = NULL;
		else
			set new.ENd_Time = new.End_Time;
		end if;
    end if;

	IF new.Category_ID > (SELECT MAX(Category_ID) FROM event_categories) OR new.Category_ID < 1 THEN
    	set new.Category_ID = 0;
    END IF;
    
    IF new.Dept_ID > (SELECT MAX(Dept_ID) FROM departments) OR new.Dept_ID < 1 THEN
    	set new.Dept_ID = 0;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 16:16:00
