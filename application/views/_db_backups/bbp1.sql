-- MySQL dump 10.11
--
-- Host: 173.201.217.38    Database: bbp1
-- ------------------------------------------------------
-- Server version	5.0.92-log

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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('admin','admin');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(100) NOT NULL auto_increment,
  `type` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property` (
  `uid` int(100) NOT NULL,
  `id` int(100) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `aa` varchar(50) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `pfrom` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `br` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (5,104,'Surya city','A.E.C.S. Layout','South Bangalore','bus depot','0 - 600','5 to 7 lakhs','BDA','Land','Owner','No','govt','Rent','18-3-2011','no.jpg'),(5,121,'White house','B.T.M. Layout','Central Bangalore','bus stop','1200','13 to 15 lakhs','Corporation','Residential House','Owner','Yes','obama','buy','5-4-2011','nc7o5k4n.jpg'),(8,124,'Land for sale','Anjanapura','South Bangalore','Near Metro','1200','9 to 11 lakhs','BMRDA','Land','Owner','Yes','hgdsje\r\nsdsjhs\r\n321472937','buy','10-4-2011','ewc2dohm.jpg'),(8,125,'House in Hebbal','Hebbal','North Bangalore','Amarjyothi layout','1200','Above 1 crore','Corporation','Residential House','Owner','Yes','Anand\r\n9845276059','buy','14-7-2011','no.jpg');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(100) NOT NULL auto_increment,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL,
  `con` varchar(40) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobi` varchar(10) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `site` varchar(40) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'johnson@srivatech.com','123456','Johnson','Ec2','Bangalore','India','560100','9482439921','9482439921','srivatech','web1','web2'),(8,'ark61279@gmail.com','welcome','Anand','Anekal','Banglore ','India','516334','04362','9482439921','cname','web6','web7'),(9,'johnson@srivatech.com','123456','johnson','sjsj','sjsj','jsjs','561230','','9482439921','','','22-11-2011'),(10,'z.h.o.ng.m.in.xr1.11.1.1.11.1@gmail.com\r','taishan2011','stiblyestilky','213 Rockwood Dr','|Hebron,Gaza City\r\n','','123456','123456','None','stiblyestilky','http://www.thenorthface-outlets.me.uk/\r\n','8-12-2011');
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

-- Dump completed on 2012-09-27  0:42:44
