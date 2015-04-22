
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
DROP TABLE IF EXISTS `wp_wslusersprofiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wslusersprofiles` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `object_sha` varchar(45) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(150) character set utf8 NOT NULL,
  `description` varchar(255) character set utf8 NOT NULL,
  `firstname` varchar(150) character set utf8 NOT NULL,
  `lastname` varchar(150) character set utf8 NOT NULL,
  `gender` varchar(10) NOT NULL,
  `language` varchar(20) character set utf8 NOT NULL,
  `age` varchar(10) NOT NULL,
  `birthday` int(11) NOT NULL,
  `birthmonth` int(11) NOT NULL,
  `birthyear` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(75) NOT NULL,
  `address` varchar(255) character set utf8 NOT NULL,
  `country` varchar(75) character set utf8 NOT NULL,
  `region` varchar(50) character set utf8 NOT NULL,
  `city` varchar(50) character set utf8 NOT NULL,
  `zip` varchar(25) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  KEY `provider` (`provider`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_wslusersprofiles` WRITE;
/*!40000 ALTER TABLE `wp_wslusersprofiles` DISABLE KEYS */;
INSERT INTO `wp_wslusersprofiles` VALUES (2,1,'Facebook','88fb136ebf95482fbabd19d75cffd8e7a5cfac37','405991516247052','https://www.facebook.com/app_scoped_user_id/405991516247052/','','https://graph.facebook.com/405991516247052/picture?width=150&height=150','כפר הירעור','','כפר','הירעור','male','en_US','',0,0,0,'kfar.irur@gmail.com','kfar.irur@gmail.com','','','','','',''),(3,2,'Facebook','055a327465a898300c50fb787b2783f7080a190a','10205997937279957','https://www.facebook.com/app_scoped_user_id/10205997937279957/','','https://graph.facebook.com/10205997937279957/picture?width=150&height=150','Naor Levi','','Naor','Levi','male','en_US','',0,0,0,'naorlevi87@gmail.com','naorlevi87@gmail.com','','','','','',''),(4,3,'Facebook','e95bd8c6d958bf162ecde339c035739087cc3b2f','10204763315457371','https://www.facebook.com/app_scoped_user_id/10204763315457371/','','https://graph.facebook.com/10204763315457371/picture?width=150&height=150','Sean Roisentul','','Sean','Roisentul','male','en_US','',0,0,0,'charonjr@gmail.com','charonjr@gmail.com','','','','','',''),(5,2,'Google','70ca9477137375878043d907fa3777e1f5345cfb','102158610241550153457','https://plus.google.com/102158610241550153457','','https://lh4.googleusercontent.com/-soq5wWyKUCM/AAAAAAAAAAI/AAAAAAAAAM0/OZo2tqN-eWI/photo.jpg?sz=200','Naor Levi','','Naor','Levi','male','','',0,0,0,'naorlevi87@gmail.com','naorlevi87@gmail.com','','','','','',''),(6,4,'Facebook','fe66a945b0b6a32bd727bad6daa5acae9f4c42e4','10206628450176647','https://www.facebook.com/app_scoped_user_id/10206628450176647/','','https://graph.facebook.com/10206628450176647/picture?width=150&height=150','Shay Kenigsberg','','Shay','Kenigsberg','male','en_US','',0,0,0,'','','','','','','',''),(7,5,'Facebook','d473f813a08dc663f689f6dc3e602f64a7f4d4c7','10153208936387770','https://www.facebook.com/app_scoped_user_id/10153208936387770/','','https://graph.facebook.com/10153208936387770/picture?width=150&height=150','Barak Sabag','','Barak','Sabag','male','en_US','',0,0,0,'baraksab@gmail.com','baraksab@gmail.com','','','','','',''),(8,6,'Facebook','a3c9040ec56a78f5de9257503ff43278888fbfc2','10206631792537361','https://www.facebook.com/app_scoped_user_id/10206631792537361/','','https://graph.facebook.com/10206631792537361/picture?width=150&height=150','Yael Ariel','','Yael','Ariel','female','he_IL','',0,0,0,'yaelariel1@gmail.com','yaelariel1@gmail.com','','','','','',''),(9,1,'Google','8aaecacf4b6570991cd7c056d13625965ea143d3','104050410668439515420','https://plus.google.com/104050410668439515420','','https://lh4.googleusercontent.com/-PvGpioD0Uzw/AAAAAAAAAAI/AAAAAAAAAVs/sBtTcO7UZKY/photo.jpg?sz=200','Kfar Irur','','Kfar','Irur','other','','',0,0,0,'kfar.irur@gmail.com','kfar.irur@gmail.com','','','','','','');
/*!40000 ALTER TABLE `wp_wslusersprofiles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

