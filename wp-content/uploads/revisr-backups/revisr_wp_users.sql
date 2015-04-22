
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
DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `user_login` varchar(60) NOT NULL default '',
  `user_pass` varchar(64) NOT NULL default '',
  `user_nicename` varchar(50) NOT NULL default '',
  `user_email` varchar(100) NOT NULL default '',
  `user_url` varchar(100) NOT NULL default '',
  `user_registered` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL default '',
  `user_status` int(11) NOT NULL default '0',
  `display_name` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'kfar.irur','$P$BqV/OT6JJJKn3vN.5pSFFKCGftBspy0','kfar-irur','kfar.irur@gmail.com','','2015-04-09 11:48:07','',0,'kfar.irur'),(2,'Naor_Levi','$P$B1wo0NpBi7BKmhNOg/T741zYiyIbGp1','naor_levi','naorlevi87@gmail.com','https://www.facebook.com/app_scoped_user_id/10205997937279957/','2015-04-18 02:05:04','',0,'Naor Levi'),(3,'Sean_Roisentul','$P$BJ.RsQmuhguT9VR5WV0MUXn5SmCPMF1','sean_roisentul','charonjr@gmail.com','https://www.facebook.com/app_scoped_user_id/10204763315457371/','2015-04-19 21:35:30','',0,'Sean Roisentul'),(4,'Shay_Kenigsberg','$P$BaeFnYIcCo8cFnG9tP9i035C5rVak/0','shay_kenigsberg','facebook_user_shay_kenigsberg@example.com','https://www.facebook.com/app_scoped_user_id/10206628450176647/','2015-04-20 05:55:26','',0,'Shay Kenigsberg'),(5,'Barak_Sabag','$P$BC3B.xvMLnmig8nw6XYpjg4GUL2BzR.','barak_sabag','baraksab@gmail.com','https://www.facebook.com/app_scoped_user_id/10153208936387770/','2015-04-20 11:59:28','',0,'Barak Sabag'),(6,'Yael_Ariel','$P$BjN.zxBDChhN74/KHsczOOx79Y/7Ep0','yael_ariel','yaelariel1@gmail.com','https://www.facebook.com/app_scoped_user_id/10206631792537361/','2015-04-21 21:04:53','',0,'Yael Ariel');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

