
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
DROP TABLE IF EXISTS `wp_huge_it_share_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_huge_it_share_params` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) character set utf8 NOT NULL,
  `title` varchar(200) character set utf8 NOT NULL,
  `social` varchar(200) character set utf8 NOT NULL,
  `ordering` text character set utf8 NOT NULL,
  `value` varchar(200) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_huge_it_share_params` WRITE;
/*!40000 ALTER TABLE `wp_huge_it_share_params` DISABLE KEYS */;
INSERT INTO `wp_huge_it_share_params` VALUES (8,'share_facebook_button','Share Facebook Button','social','0','on'),(9,'share_twitter_button','Share Twitter Button','social','1','on'),(10,'share_pinterest_button','Share Pinterest Button','social','3','on'),(11,'share_google_plus_button','Share Google Plus Button','social','','on'),(12,'share_linkedin_button','Share Linkedin Button','social','2','on'),(13,'share_tumblr_button','Share Tumblr button','social','4','on'),(14,'share_digg_button','Share Digg button','social','5','on'),(15,'share_stumbleupon_button','Share StumbleUpon Button','social','6','on'),(16,'share_myspace_button','Share MySpace Button','social','16','on'),(17,'share_vkontakte_button','Share VKontakte button','social','7','off'),(18,'share_reddit_button','Share Reddit button','social','8','off'),(19,'share_bebo_button','Share Bebo button','social','9','off'),(20,'share_delicious_button','Share Delicious button','social','10','off'),(21,'share_odnoklassniki_button','Share Odnoklassniki button','social','11','off'),(22,'share_qzone_button','Share QZone Button','social','12','off'),(23,'share_sina_weibo_button','Share Sina Weibo Button','social','13','off'),(24,'share_renren_button','Share Renren Button','social','14','off'),(25,'share_n4g_button','Share N4G Button','social','15','off'),(26,'huge_it_share_button_position_post','Share Button Position','','','left-bottom'),(27,'huge_it_share_size','Share Button Size','','','30'),(28,'share_button_type','Share Button type','','','toolbar'),(29,'share_button_icons_style','Share Buttons icons style','','','4'),(30,'share_button_margin_between_buttons','Margin Between Buttons','','','3'),(31,'share_button_margin_from_content','Margin From Content','','','0'),(32,'share_button_buttons_background_padding','Buttons Background padding','','','0'),(33,'share_button_buttons_background_color','Buttons Background color','','','14CC9B'),(34,'share_button_buttons_border_size','Buttons Border Size','','','0'),(35,'share_button_buttons_border_style','Buttons border style','','','ridge'),(36,'share_button_buttons_border_radius','Buttons border radius','','','11'),(37,'share_button_buttons_border_color','Buttons border color','','','E6354C'),(38,'share_button_title_text','Title Text','','','Share This:'),(39,'share_button_title_position','Title position','','','top'),(40,'share_button_title_font_size','Title font size','','','25'),(41,'share_button_title_color','Title Color','','','666666'),(42,'share_button_block_background_color','Block background color','','','3BD8FF'),(43,'share_button_block_border_size','Block border size','','','0'),(44,'share_button_block_border_color','Block border color','','','0FB5D6'),(45,'share_button_block_border_radius','Block border radius','','','5'),(46,'share_button_buttons_has_background','Buttons has Background','','','off'),(47,'share_button_block_has_background','Block has background','','','off'),(48,'share_button_title_font_style_family','Title font style family','','','Arial,Helvetica Neue,Helvetica,sans-serif');
/*!40000 ALTER TABLE `wp_huge_it_share_params` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

