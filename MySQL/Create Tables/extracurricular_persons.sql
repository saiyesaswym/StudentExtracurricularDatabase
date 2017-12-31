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
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `Univ_ID` mediumint(8) unsigned NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Phone` char(12) NOT NULL,
  `Street` varchar(70) NOT NULL,
  `City` varchar(70) NOT NULL,
  `State` char(2) NOT NULL,
  `Zip` char(5) NOT NULL,
  PRIMARY KEY (`Univ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (5001001,'Andrea','Jackson','a.jackson@uni.edu','202-555-0193','19 Pennsylvania Ave.','Boston','MA','01841'),(5001002,'Kelly','Clark','k.clark@uni.edu','202-555-0199','689 Prairie Ct.','Boston','MA','02110'),(5001003,'Jeffrey','Henderson','j.henderson@uni.edu','202-555-0175','9237 South Cottage St.','Boston','MA','02114'),(5001004,'Jeremy','Brooks','j.brooks@uni.edu','202-555-0195','9739 S. Birthwood Dr.','Boston','MA','02120'),(5001005,'Betty','Lee','b.lee@uni.edu','202-555-0114','956 Newcastle St.','Boston','MA','02121'),(5001006,'Jimmy','Williams','j.williams@uni.edu','202-555-0191','116 Colonial St.','Boston','MA','01841'),(5001007,'Ashley','King','a.king@uni.edu','202-555-0123','18 Spruce Dr.','Boston','MA','02110'),(5001008,'John','Sanchez','j.sanchez@uni.edu','202-555-0363','890 Snake Hill St.','Boston','MA','02114'),(5001009,'Jason','Phillips','j.phillips@uni.edu','202-555-0555','9401 Sycamore St.','Boston','MA','02120'),(5001010,'Brandon','Murphy','b.murphy@uni.edu','202-555-0888','9 Southampton Dr.','Boston','MA','02121'),(5001011,'Joyce','Turner','j.turner@uni.edu','202-555-0987','95 Bradford St.','Boston','MA','01841'),(5001012,'Angela','Russell','a.russell@uni.edu','202-555-0567','754 North Piper St.','Boston','MA','02110'),(5001013,'Arthur','Stewart','a.stewart@uni.edu','202-555-0654','8842 Cemetery St.','Boston','MA','02114'),(5001014,'Mildred','Patterson','m.patterson@uni.edu','202-555-0999','758 Big Rock Cove Ln.','Boston','MA','02120'),(5001015,'Adam','Torres','a.torres@uni.edu','202-555-0111','550 Griffin Dr.','Boston','MA','02121'),(9001001,'Jeffrey','Miller','j.miller@uni.edu','202-481-9964','123 6th St.','Melbourne','FL','32904'),(9001002,'Nancy','Gonzalez','n.gonzalez@uni.edu','605-431-1181','4 Goldfield Rd.','Honolulu','HI','96815'),(9001003,'Sandra','Wright','s.wright@uni.edu','618-691-9304','71 Pilgrim Ave.','Chevy Chase','MD','20815'),(9001004,'Marilyn','Jones','m.jones@uni.edu','251-655-5808','44 Shirley Ave.','Chicago','IL','60185'),(9001005,'Joseph','Perry','j.perry@uni.edu','440-410-5901','70 Bowman St.','South Windsor','CT','06074'),(9001006,'William','Richardson','w.richardson@uni.edu','343-362-2278','514 S. Magnolia St.','Orlando','FL','32806'),(9001007,'Frank','Powell','f.powell@uni.edu','409-289-7188','556 Saxon St.','Ashtabula','OH','44004'),(9001008,'Wayne','Flores','w.flores@uni.edu','616-883-2038','9291 University Ln.','Acworth','GA','30101'),(9001009,'Particia','Allen','p.allen@uni.edu','251-327-6530','21 Smith St.','Granger','IN','46530'),(9001010,'Juan','Jenkins','j.jenkins@uni.edu','334-305-9826','7388 Creek Ln.','Wilkes Barre','PA','18702'),(9001011,'Carl','Thomas','c.thomas@uni.edu','432-297-6314','32 Shipley Rd.','Ballston Spa','NY','12020'),(9001012,'Ernest','Bailey','e.bailey@uni.edu','339-613-2696','73 Bridle Dr.','West New York','NJ','07093'),(9001013,'Eugene','Butler','e.butler@uni.edu','305-656-7071','99 Franklin St.','Mountain View','CA','94043'),(9001014,'Aaron','Hall','a.hall@uni.edu','530-270-6935','29 Old York St.','Tucson','AZ','85718'),(9001015,'Craig','Carter','c.carter@uni.edu','203-825-5931','8320 S. Silver Spear Ave.','Stuart','FL','34997'),(9001016,'Raymond','Cox','r.cox@uni.edu','541-248-8452','78 Stonybrook St.','Kenosha','WI','53140'),(9001017,'Martin','Lewis','m.lewis@uni.edu','413-588-5331','668 Saxon Ln.','Waterbury','CT','06705'),(9001018,'Harold','Cooper','h.cooper@uni.edu','417-276-8297','710 Bay Meadows Dr.','Lawrence','MA','01841'),(9001019,'Nicholas','Ramirez','n.ramirez@uni.edu','314-319-1758','78 Harrison St.','Stoughton','MA','02072'),(9001020,'Irene','Brown','i.brown@uni.edu','203-294-2346','816 S. Edgewater Ave.','Fair Lawn','NJ','07410'),(9001021,'Heather','Perry','h.perry@uni.edu','267-454-9351','89 Rosewood Rd.','Lake Zurich','IL','60047'),(9001022,'Jerry','Morgan','j.morgan@uni.edu','231-925-4933','8884 W. Hawthorne St.','Culpeper','VA','22701');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 16:15:57
