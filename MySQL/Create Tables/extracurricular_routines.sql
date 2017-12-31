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
-- Temporary view structure for view `events_view`
--

DROP TABLE IF EXISTS `events_view`;
/*!50001 DROP VIEW IF EXISTS `events_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `events_view` AS SELECT 
 1 AS `Event_ID`,
 1 AS `Name`,
 1 AS `D1`,
 1 AS `Location`,
 1 AS `Start_Date`,
 1 AS `Start_Time`,
 1 AS `End_Date`,
 1 AS `End_Time`,
 1 AS `Dept_Name`,
 1 AS `D2`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `studentlogin_view`
--

DROP TABLE IF EXISTS `studentlogin_view`;
/*!50001 DROP VIEW IF EXISTS `studentlogin_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `studentlogin_view` AS SELECT 
 1 AS `Univ_ID`,
 1 AS `First_Name`,
 1 AS `Last_Name`,
 1 AS `Email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `studentevents_view`
--

DROP TABLE IF EXISTS `studentevents_view`;
/*!50001 DROP VIEW IF EXISTS `studentevents_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `studentevents_view` AS SELECT 
 1 AS `Event_ID`,
 1 AS `Name`,
 1 AS `Description`,
 1 AS `Location`,
 1 AS `Start_Date`,
 1 AS `Start_Time`,
 1 AS `Dept_Name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `facultylogin_view`
--

DROP TABLE IF EXISTS `facultylogin_view`;
/*!50001 DROP VIEW IF EXISTS `facultylogin_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `facultylogin_view` AS SELECT 
 1 AS `Univ_ID`,
 1 AS `First_Name`,
 1 AS `Last_Name`,
 1 AS `Email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `majors_view`
--

DROP TABLE IF EXISTS `majors_view`;
/*!50001 DROP VIEW IF EXISTS `majors_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `majors_view` AS SELECT 
 1 AS `Major_ID`,
 1 AS `Major_Name`,
 1 AS `Dept_Name`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `events_view`
--

/*!50001 DROP VIEW IF EXISTS `events_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `events_view` AS select `events`.`Event_ID` AS `Event_ID`,`events`.`Name` AS `Name`,`events`.`Description` AS `D1`,`events`.`Location` AS `Location`,`events`.`Start_Date` AS `Start_Date`,`events`.`Start_Time` AS `Start_Time`,`events`.`End_Date` AS `End_Date`,`events`.`End_Time` AS `End_Time`,`departments`.`Dept_Name` AS `Dept_Name`,`event_categories`.`Description` AS `D2` from ((`events` join `departments` on((`events`.`Dept_ID` = `departments`.`Dept_ID`))) join `event_categories` on((`events`.`Category_ID` = `event_categories`.`Category_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `studentlogin_view`
--

/*!50001 DROP VIEW IF EXISTS `studentlogin_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `studentlogin_view` AS select `students`.`Univ_ID` AS `Univ_ID`,`persons`.`First_Name` AS `First_Name`,`persons`.`Last_Name` AS `Last_Name`,`persons`.`Email` AS `Email` from (`persons` join `students` on((`persons`.`Univ_ID` = `students`.`Univ_ID`))) order by `persons`.`Last_Name`,`persons`.`First_Name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `studentevents_view`
--

/*!50001 DROP VIEW IF EXISTS `studentevents_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `studentevents_view` AS select `events`.`Event_ID` AS `Event_ID`,`events`.`Name` AS `Name`,`events`.`Description` AS `Description`,`events`.`Location` AS `Location`,`events`.`Start_Date` AS `Start_Date`,`events`.`Start_Time` AS `Start_Time`,`departments`.`Dept_Name` AS `Dept_Name` from (`events` join `departments` on((`events`.`Dept_ID` = `departments`.`Dept_ID`))) order by `events`.`Start_Date`,`events`.`Start_Time`,`events`.`Name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `facultylogin_view`
--

/*!50001 DROP VIEW IF EXISTS `facultylogin_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `facultylogin_view` AS select `faculty`.`Univ_ID` AS `Univ_ID`,`persons`.`First_Name` AS `First_Name`,`persons`.`Last_Name` AS `Last_Name`,`persons`.`Email` AS `Email` from (`persons` join `faculty` on((`persons`.`Univ_ID` = `faculty`.`Univ_ID`))) order by `persons`.`Last_Name`,`persons`.`First_Name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `majors_view`
--

/*!50001 DROP VIEW IF EXISTS `majors_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `majors_view` AS select `majors`.`Major_ID` AS `Major_ID`,`majors`.`Major_Name` AS `Major_Name`,`departments`.`Dept_Name` AS `Dept_Name` from (`majors` join `departments` on((`majors`.`Dept_ID` = `departments`.`Dept_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'extracurricular'
--

--
-- Dumping routines for database 'extracurricular'
--
/*!50003 DROP PROCEDURE IF EXISTS `num_events` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `num_events`(
OUT num_eve int)
BEGIN
	SELECT 	COUNT(*) INTO num_eve
	FROM	events;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `num_faculty` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `num_faculty`(
OUT num_fac int)
BEGIN
	SELECT 	COUNT(*) INTO num_fac
	FROM	faculty;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `num_students` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `num_students`(
OUT num_stu int)
BEGIN
	SELECT 	COUNT(*) INTO num_stu
	FROM	students;
END ;;
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

-- Dump completed on 2017-04-28 16:16:03
